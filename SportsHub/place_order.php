<?php

header("Content-Type: application/json");

require_once "db.php";


/*
|--------------------------------------------------------------------------
| ONLY ACCEPT POST REQUESTS
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    echo json_encode([
        "success" => false,
        "message" => "Invalid request method."
    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| READ JSON DATA
|--------------------------------------------------------------------------
*/

$input = json_decode(
    file_get_contents("php://input"),
    true
);


if (!$input) {

    echo json_encode([
        "success" => false,
        "message" => "Invalid order data."
    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| CUSTOMER INFORMATION
|--------------------------------------------------------------------------
*/

$fullName = trim($input["fullName"] ?? "");
$email = trim($input["email"] ?? "");
$phone = trim($input["phone"] ?? "");
$county = trim($input["county"] ?? "");


/*
|--------------------------------------------------------------------------
| DELIVERY INFORMATION
|--------------------------------------------------------------------------
*/

$address = trim($input["address"] ?? "");
$town = trim($input["town"] ?? "");
$landmark = trim($input["landmark"] ?? "");

$deliveryMethod =
    trim(
        $input["deliveryMethod"]
        ?? "Standard Delivery"
    );


/*
|--------------------------------------------------------------------------
| PAYMENT INFORMATION
|--------------------------------------------------------------------------
*/

$mpesaPhone =
    trim(
        $input["mpesaPhone"]
        ?? ""
    );


/*
|--------------------------------------------------------------------------
| OTHER INFORMATION
|--------------------------------------------------------------------------
*/

$notes =
    trim(
        $input["notes"]
        ?? ""
    );


$cart =
    $input["cart"]
    ?? [];


/*
|--------------------------------------------------------------------------
| VALIDATION
|--------------------------------------------------------------------------
*/

if (
    $fullName === "" ||
    $email === "" ||
    $phone === "" ||
    $county === "" ||
    $address === "" ||
    $town === "" ||
    $mpesaPhone === ""
) {

    echo json_encode([
        "success" => false,
        "message" =>
            "Please complete all required fields."
    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| EMAIL VALIDATION
|--------------------------------------------------------------------------
*/

if (
    !filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    )
) {

    echo json_encode([
        "success" => false,
        "message" =>
            "Please enter a valid email address."
    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| M-PESA VALIDATION
|--------------------------------------------------------------------------
*/

if (
    !preg_match(
        '/^7\d{8}$/',
        $mpesaPhone
    )
) {

    echo json_encode([
        "success" => false,
        "message" =>
            "Please enter a valid M-Pesa number in the format 7XXXXXXXX."
    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| CART VALIDATION
|--------------------------------------------------------------------------
*/

if (
    !is_array($cart) ||
    count($cart) === 0
) {

    echo json_encode([
        "success" => false,
        "message" =>
            "Your cart is empty."
    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| START DATABASE TRANSACTION
|--------------------------------------------------------------------------
*/

$conn->begin_transaction();


try {


    /*
    |--------------------------------------------------------------------------
    | 1. CREATE CUSTOMER
    |--------------------------------------------------------------------------
    */

    $customerSQL = "

        INSERT INTO customers
        (
            full_name,
            email,
            phone,
            county
        )

        VALUES (?, ?, ?, ?)

    ";


    $customerStmt =
        $conn->prepare(
            $customerSQL
        );


    if (!$customerStmt) {

        throw new Exception(
            "Could not prepare customer query."
        );
    }


    $customerStmt->bind_param(
        "ssss",
        $fullName,
        $email,
        $phone,
        $county
    );


    if (
        !$customerStmt->execute()
    ) {

        throw new Exception(
            "Could not save customer information."
        );
    }


    $customerId =
        $conn->insert_id;


    $customerStmt->close();


    /*
    |--------------------------------------------------------------------------
    | 2. VALIDATE PRODUCTS
    |--------------------------------------------------------------------------
    */

    $subtotal = 0;

    $validatedItems = [];


    foreach ($cart as $item) {
        /*
        |--------------------------------------------------------------------------
        | PRODUCT IDENTIFICATION
        |--------------------------------------------------------------------------
        |
        | Accept the normal cart ID, product_id, or fall back to the
        | product name for older cart entries that were saved without ID.
        | The actual product, price and stock are always verified in MySQL.
        |--------------------------------------------------------------------------
        */

        $productId =
            isset($item["id"])
            ? intval($item["id"])
            : 0;

        if ($productId <= 0 && isset($item["product_id"])) {
            $productId = intval($item["product_id"]);
        }

        $productNameFromCart =
            trim(
                $item["name"]
                ?? $item["product_name"]
                ?? ""
            );

        $quantity =
            isset($item["quantity"])
            ? intval($item["quantity"])
            : 1;

        $size =
            trim(
                $item["size"]
                ?? ""
            );

        if ($quantity < 1) {
            throw new Exception(
                "Invalid product quantity."
            );
        }

        /*
        |--------------------------------------------------------------------------
        | GET PRODUCT FROM DATABASE
        |--------------------------------------------------------------------------
        */

        if ($productId > 0) {

            $productSQL = "
                SELECT
                    id,
                    name,
                    price,
                    stock
                FROM products
                WHERE id = ?
                LIMIT 1
            ";

            $productStmt =
                $conn->prepare(
                    $productSQL
                );

            if (!$productStmt) {
                throw new Exception(
                    "Could not prepare product query."
                );
            }

            $productStmt->bind_param(
                "i",
                $productId
            );

        } elseif ($productNameFromCart !== "") {

            $productSQL = "
                SELECT
                    id,
                    name,
                    price,
                    stock
                FROM products
                WHERE name = ?
                LIMIT 1
            ";

            $productStmt =
                $conn->prepare(
                    $productSQL
                );

            if (!$productStmt) {
                throw new Exception(
                    "Could not prepare product name query."
                );
            }

            $productStmt->bind_param(
                "s",
                $productNameFromCart
            );

        } else {

            throw new Exception(
                "Cart item is missing a product ID and product name."
            );
        }


        if (
            !$productStmt->execute()
        ) {

            $productStmt->close();

            throw new Exception(
                "Could not verify product."
            );
        }


        $result =
            $productStmt->get_result();


        $product =
            $result->fetch_assoc();


        $productStmt->close();


        /*
        |--------------------------------------------------------------------------
        | PRODUCT EXISTS?
        |--------------------------------------------------------------------------
        */

        if (!$product) {

            throw new Exception(
                "A product in your cart no longer exists."
            );
        }


        /*
        |--------------------------------------------------------------------------
        | STOCK CHECK
        |--------------------------------------------------------------------------
        */

        $stock =
            intval(
                $product["stock"]
            );


        if ($quantity > $stock) {

            throw new Exception(

                $product["name"] .
                " does not have enough stock."

            );
        }


        /*
        |--------------------------------------------------------------------------
        | USE DATABASE PRICE
        |--------------------------------------------------------------------------
        */

        $price =
            floatval(
                $product["price"]
            );


        $lineTotal =
            $price * $quantity;


        $subtotal +=
            $lineTotal;


        /*
        |--------------------------------------------------------------------------
        | SAVE VALIDATED ITEM
        |--------------------------------------------------------------------------
        */

        $validatedItems[] = [

            "id" =>
                intval(
                    $product["id"]
                ),

            "name" =>
                $product["name"],

            "price" =>
                $price,

            "quantity" =>
                $quantity,

            "size" =>
                $size

        ];

    }


    /*
    |--------------------------------------------------------------------------
    | 3. CALCULATE DELIVERY
    |--------------------------------------------------------------------------
    */

    if (
        $deliveryMethod ===
        "Store Pickup"
    ) {

        $deliveryFee = 0;

    } else {

        if ($subtotal >= 5000) {

            $deliveryFee = 0;

        } else {

            $deliveryFee = 300;

        }

    }


    /*
    |--------------------------------------------------------------------------
    | 4. CALCULATE FINAL TOTAL
    |--------------------------------------------------------------------------
    */

    $total =
        $subtotal +
        $deliveryFee;


    /*
    |--------------------------------------------------------------------------
    | 5. CREATE ORDER
    |--------------------------------------------------------------------------
    */

    $orderSQL = "

        INSERT INTO orders
        (
            customer_id,
            delivery_address,
            town,
            landmark,
            delivery_method,
            delivery_fee,
            subtotal,
            total,
            mpesa_phone,
            order_notes,
            status
        )

        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
        )

    ";


    $orderStmt =
        $conn->prepare(
            $orderSQL
        );


    if (!$orderStmt) {

        throw new Exception(
            "Could not prepare order query."
        );
    }


    $status =
        "Pending";


    /*
    |--------------------------------------------------------------------------
    | IMPORTANT
    |--------------------------------------------------------------------------
    |
    | i = integer
    | s = string
    | d = decimal/double
    |
    | customer_id       = i
    | delivery_address  = s
    | town              = s
    | landmark          = s
    | delivery_method   = s
    | delivery_fee      = d
    | subtotal          = d
    | total             = d
    | mpesa_phone       = s
    | order_notes       = s
    | status            = s
    |
    */

    $orderStmt->bind_param(
        "issssdddsss",
        $customerId,
        $address,
        $town,
        $landmark,
        $deliveryMethod,
        $deliveryFee,
        $subtotal,
        $total,
        $mpesaPhone,
        $notes,
        $status
    );


    if (
        !$orderStmt->execute()
    ) {

        throw new Exception(
            "Could not create order."
        );
    }


    $orderId =
        $conn->insert_id;


    $orderStmt->close();


    /*
    |--------------------------------------------------------------------------
    | 6. CREATE ORDER ITEMS
    |--------------------------------------------------------------------------
    */

    $itemSQL = "

        INSERT INTO order_items
        (
            order_id,
            product_id,
            product_name,
            price,
            quantity,
            size
        )

        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
        )

    ";


    $itemStmt =
        $conn->prepare(
            $itemSQL
        );


    if (!$itemStmt) {

        throw new Exception(
            "Could not prepare order item query."
        );
    }


    foreach (
        $validatedItems
        as $item
    ) {

        $productId =
            $item["id"];

        $productName =
            $item["name"];

        $price =
            $item["price"];

        $quantity =
            $item["quantity"];

        $size =
            $item["size"];


        /*
        |--------------------------------------------------------------------------
        | THIS IS THE CORRECT VERSION
        |--------------------------------------------------------------------------
        |
        | i = order_id
        | i = product_id
        | s = product_name
        | d = price
        | i = quantity
        | s = size
        |
        */

        $itemStmt->bind_param(
            "iisdis",
            $orderId,
            $productId,
            $productName,
            $price,
            $quantity,
            $size
        );


        if (
            !$itemStmt->execute()
        ) {

            throw new Exception(
                "Could not save order item."
            );
        }

    }


    $itemStmt->close();


    /*
    |--------------------------------------------------------------------------
    | 7. COMMIT TRANSACTION
    |--------------------------------------------------------------------------
    */

    $conn->commit();


    /*
    |--------------------------------------------------------------------------
    | 8. SEND SUCCESS RESPONSE
    |--------------------------------------------------------------------------
    */

    echo json_encode([

        "success" =>
            true,

        "message" =>
            "Order placed successfully.",

        "order_id" =>
            $orderId,

        "total" =>
            $total

    ]);


} catch (Exception $e) {


    /*
    |--------------------------------------------------------------------------
    | ROLLBACK
    |--------------------------------------------------------------------------
    */

    $conn->rollback();


    echo json_encode([

        "success" =>
            false,

        "message" =>
            $e->getMessage()

    ]);

}

?>