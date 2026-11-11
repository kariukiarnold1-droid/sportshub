<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "db.php";

try {

    /*
    |--------------------------------------------------------------------------
    | ONLY ACCEPT POST REQUESTS
    |--------------------------------------------------------------------------
    */

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {

        http_response_code(405);

        echo json_encode([
            "success" => false,
            "message" => "Invalid request method."
        ]);

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | READ REQUEST
    |--------------------------------------------------------------------------
    */

    $input = json_decode(
        file_get_contents("php://input"),
        true
    );


    if (!is_array($input)) {

        echo json_encode([
            "success" => false,
            "message" => "Invalid request data."
        ]);

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | GET ORDER ID
    |--------------------------------------------------------------------------
    */

    $orderId =
        (int)($input["order_id"] ?? 0);


    if ($orderId <= 0) {

        echo json_encode([
            "success" => false,
            "message" => "Invalid order ID."
        ]);

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | GET PAYMENT STATUS
    |--------------------------------------------------------------------------
    */

    $stmt = $conn->prepare("
        SELECT
            id,
            status,
            payment_status,
            mpesa_receipt
        FROM orders
        WHERE id = ?
        LIMIT 1
    ");


    if (!$stmt) {

        throw new Exception(
            "Could not prepare payment status query."
        );
    }


    $stmt->bind_param(
        "i",
        $orderId
    );


    if (!$stmt->execute()) {

        $stmt->close();

        throw new Exception(
            "Could not check payment status."
        );
    }


    $result =
        $stmt->get_result();


    $order =
        $result->fetch_assoc();


    $stmt->close();


    /*
    |--------------------------------------------------------------------------
    | ORDER NOT FOUND
    |--------------------------------------------------------------------------
    */

    if (!$order) {

        echo json_encode([
            "success" => false,
            "message" => "Order not found."
        ]);

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | RETURN STATUS
    |--------------------------------------------------------------------------
    */

    echo json_encode([

        "success" => true,

        "order_id" =>
            (int)$order["id"],

        "status" =>
            $order["status"] ?? "",

        "payment_status" =>
            $order["payment_status"] ?? "Pending",

        "mpesa_receipt" =>
            $order["mpesa_receipt"] ?? null

    ]);


} catch (Throwable $e) {

    error_log(
        "Sports Hub Payment Status Error: " .
        $e->getMessage()
    );


    echo json_encode([

        "success" => false,

        "message" =>
            "Could not check payment status."

    ]);
}


exit;

?>