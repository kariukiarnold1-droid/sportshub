<?php

require_once "db.php";

/*
|--------------------------------------------------------------------------
| Helper
|--------------------------------------------------------------------------
*/

function e($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}


/*
|--------------------------------------------------------------------------
| Get product
|--------------------------------------------------------------------------
|
| Supports:
| product.php?id=1
|
| and keeps compatibility with the old:
| product.php?product=jersey
|--------------------------------------------------------------------------
*/

$product = null;


/*
|--------------------------------------------------------------------------
| First try numeric ID
|--------------------------------------------------------------------------
*/

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {

    $id = (int)$_GET["id"];

    $stmt = $conn->prepare(
        "SELECT * FROM products WHERE id = ? LIMIT 1"
    );

    $stmt->bind_param("i", $id);

    $stmt->execute();

    $result = $stmt->get_result();

    $product = $result->fetch_assoc();

    $stmt->close();
}


/*
|--------------------------------------------------------------------------
| Compatibility with old product names
|--------------------------------------------------------------------------
*/

if (!$product && isset($_GET["product"])) {

    $productKey = strtolower(trim($_GET["product"]));

    $oldProducts = [

        "jersey" => "Performance Jersey",

        "boots" => "Pro Football Boots",

        "shorts" => "Training Shorts",

        "cap" => "Sports Performance Cap"

    ];


    if (isset($oldProducts[$productKey])) {

        $productName = $oldProducts[$productKey];

        $stmt = $conn->prepare(
            "SELECT * FROM products WHERE name = ? LIMIT 1"
        );

        $stmt->bind_param("s", $productName);

        $stmt->execute();

        $result = $stmt->get_result();

        $product = $result->fetch_assoc();

        $stmt->close();

    }

}


/*
|--------------------------------------------------------------------------
| Product not found
|--------------------------------------------------------------------------
*/

if (!$product) {

    http_response_code(404);

    ?>

    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >

        <title>Product Not Found | Sports Hub</title>

        <link rel="stylesheet" href="style.css">

    </head>

    <body>

        <section
            class="section"
            style="text-align:center;padding-top:150px;"
        >

            <div class="section-kicker">
                SPORTS HUB
            </div>

            <h1 class="section-title">
                PRODUCT NOT FOUND
            </h1>

            <p class="section-subtitle">
                The product you are looking for does not exist.
            </p>

            <br>

            <a
                href="index.php"
                class="primary-button"
            >
                BACK TO SHOP
            </a>

        </section>

    </body>

    </html>

    <?php

    exit;
}


/*
|--------------------------------------------------------------------------
| Product information
|--------------------------------------------------------------------------
*/

$productId = (int)$product["id"];

$name = $product["name"];

$category = $product["category"];

$price = (float)$product["price"];

$image = trim($product["image"]);

$description = trim($product["description"]);

$stock = (int)$product["stock"];

$rating = (float)$product["rating"];


/*
|--------------------------------------------------------------------------
| Image fallback
|--------------------------------------------------------------------------
*/

if (
    $image === "" ||
    !is_file(__DIR__ . DIRECTORY_SEPARATOR . $image)
) {

    $image = "hero-sports.png";

}


/*
|--------------------------------------------------------------------------
| Description fallback
|--------------------------------------------------------------------------
*/

if ($description === "") {

    $description =
        "Premium sports gear designed for comfort, performance and everyday training.";

}


/*
|--------------------------------------------------------------------------
| Stock status
|--------------------------------------------------------------------------
*/

if ($stock <= 0) {

    $stockText = "Out of stock";

} elseif ($stock <= 10) {

    $stockText = "Only " . $stock . " left";

} else {

    $stockText = "In stock";

}


/*
|--------------------------------------------------------------------------
| Accessories
|--------------------------------------------------------------------------
*/

$isAccessory =
    strtolower($category) === "accessories";

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="<?= e($name) ?> - Sports Hub premium sports gear."
    >

    <title>
        <?= e($name) ?> | Sports Hub
    </title>

    <link
        rel="stylesheet"
        href="style.css"
    >


    <style>

        /*
        |--------------------------------------------------------------------------
        | PRODUCT PAGE
        |--------------------------------------------------------------------------
        */

        .product-detail-page {

            min-height: 100vh;

            padding:
                120px
                5%
                80px;

        }


        .product-breadcrumb {

            max-width: 1200px;

            margin:
                0
                auto
                30px;

            color:
                var(--muted);

            font-size:
                14px;

        }


        .product-breadcrumb a {

            color:
                var(--text);

            text-decoration:
                none;

        }


        .product-detail {

            max-width:
                1200px;

            margin:
                0
                auto;

            display:
                grid;

            grid-template-columns:
                1fr
                1fr;

            gap:
                70px;

            align-items:
                center;

        }


        .product-detail-image {

            position:
                relative;

            min-height:
                560px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            background:
                radial-gradient(
                    circle at center,
                    rgba(184,255,0,.15),
                    transparent 60%
                );

            border:
                1px solid
                var(--border);

            border-radius:
                30px;

            overflow:
                hidden;

        }


        .product-detail-image::before {

            content:
                "";

            position:
                absolute;

            width:
                420px;

            height:
                420px;

            border-radius:
                50%;

            background:
                rgba(184,255,0,.08);

            filter:
                blur(40px);

        }


        .product-detail-image img {

            position:
                relative;

            z-index:
                2;

            width:
                85%;

            height:
                500px;

            object-fit:
                contain;

            animation:
                productFloat 5s ease-in-out infinite;

            transition:
                transform .5s ease;

        }


        .product-detail-image:hover img {

            transform:
                scale(1.06)
                rotate(1deg);

        }


        @keyframes productFloat {

            0%,
            100% {

                transform:
                    translateY(0);

            }

            50% {

                transform:
                    translateY(-14px);

            }

        }


        .product-detail-info {

            padding:
                10px
                0;

        }


        .product-detail-category {

            display:
                inline-block;

            color:
                var(--lime);

            font-size:
                13px;

            font-weight:
                800;

            letter-spacing:
                2px;

            text-transform:
                uppercase;

            margin-bottom:
                15px;

        }


        .product-detail-title {

            font-size:
                clamp(
                    42px,
                    5vw,
                    72px
                );

            line-height:
                .95;

            margin:
                0
                0
                25px;

            letter-spacing:
                -3px;

        }


        .product-detail-rating {

            display:
                flex;

            align-items:
                center;

            gap:
                12px;

            margin-bottom:
                20px;

        }


        .product-detail-rating span {

            color:
                var(--lime);

            letter-spacing:
                3px;

        }


        .product-detail-rating small {

            color:
                var(--muted);

        }


        .product-detail-price {

            font-size:
                34px;

            font-weight:
                900;

            margin-bottom:
                25px;

        }


        .product-detail-description {

            color:
                var(--muted);

            line-height:
                1.8;

            max-width:
                600px;

            margin-bottom:
                30px;

        }


        .stock-status {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                8px;

            margin-bottom:
                25px;

            font-size:
                14px;

            font-weight:
                700;

        }


        .stock-dot {

            width:
                9px;

            height:
                9px;

            border-radius:
                50%;

            background:
                var(--lime);

        }


        .stock-out .stock-dot {

            background:
                #ff4d4d;

        }


        .size-title {

            font-size:
                13px;

            font-weight:
                800;

            letter-spacing:
                1px;

            text-transform:
                uppercase;

            margin-bottom:
                12px;

        }


        .size-options {

            display:
                flex;

            flex-wrap:
                wrap;

            gap:
                10px;

            margin-bottom:
                25px;

        }


        .size-option {

            min-width:
                50px;

            padding:
                12px
                15px;

            border:
                1px solid
                var(--border);

            background:
                transparent;

            color:
                var(--text);

            border-radius:
                10px;

            cursor:
                pointer;

            font-weight:
                700;

            transition:
                .25s ease;

        }


        .size-option:hover,
        .size-option.active {

            background:
                var(--lime);

            color:
                #000;

            border-color:
                var(--lime);

        }


        .quantity-row {

            display:
                flex;

            align-items:
                center;

            gap:
                15px;

            margin-bottom:
                25px;

        }


        .quantity-control {

            display:
                flex;

            align-items:
                center;

            border:
                1px solid
                var(--border);

            border-radius:
                10px;

            overflow:
                hidden;

        }


        .quantity-control button {

            width:
                42px;

            height:
                42px;

            border:
                none;

            background:
                var(--panel);

            color:
                var(--text);

            cursor:
                pointer;

            font-size:
                20px;

        }


        .quantity-control input {

            width:
                45px;

            height:
                42px;

            text-align:
                center;

            border:
                none;

            outline:
                none;

            background:
                var(--bg);

            color:
                var(--text);

            font-weight:
                700;

        }


        .product-actions {

            display:
                flex;

            flex-wrap:
                wrap;

            gap:
                12px;

        }


        .product-add-button {

            flex:
                1;

            min-width:
                220px;

            border:
                none;

            cursor:
                pointer;

            padding:
                17px
                25px;

            border-radius:
                12px;

            background:
                var(--lime);

            color:
                #000;

            font-weight:
                900;

            font-size:
                14px;

            transition:
                .25s ease;

        }


        .product-add-button:hover {

            transform:
                translateY(-3px);

            box-shadow:
                0 15px 35px
                rgba(184,255,0,.2);

        }


        .product-add-button:disabled {

            opacity:
                .4;

            cursor:
                not-allowed;

            transform:
                none;

            box-shadow:
                none;

        }


        .view-cart-button {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            padding:
                17px
                25px;

            border:
                1px solid
                var(--border);

            border-radius:
                12px;

            color:
                var(--text);

            text-decoration:
                none;

            font-weight:
                800;

        }


        .product-benefits {

            max-width:
                1200px;

            margin:
                70px
                auto
                0;

            display:
                grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap:
                15px;

        }


        .benefit {

            border:
                1px solid
                var(--border);

            background:
                var(--panel);

            padding:
                25px;

            border-radius:
                18px;

        }


        .benefit-icon {

            font-size:
                25px;

            margin-bottom:
                12px;

        }


        .benefit strong {

            display:
                block;

            margin-bottom:
                7px;

        }


        .benefit span {

            color:
                var(--muted);

            font-size:
                13px;

        }


        @media (max-width: 850px) {

            .product-detail {

                grid-template-columns:
                    1fr;

                gap:
                    35px;

            }


            .product-detail-image {

                min-height:
                    400px;

            }


            .product-detail-image img {

                height:
                    370px;

            }


            .product-benefits {

                grid-template-columns:
                    1fr;

            }

        }


        @media (max-width: 500px) {

            .product-detail-page {

                padding:
                    100px
                    20px
                    50px;

            }


            .product-detail-title {

                font-size:
                    42px;

            }


            .product-detail-image {

                min-height:
                    330px;

            }


            .product-detail-image img {

                height:
                    300px;

            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     NAVIGATION
========================================================= -->

<header class="main-nav">

    <div class="nav-inner">


        <a
            href="index.php"
            class="brand"
        >

            <span class="brand-mark">
                S
            </span>

            <span>
                SPORTS HUB
            </span>

        </a>


        <nav class="nav-menu">

            <a href="index.php">
                Home
            </a>

            <a href="index.php#catalogue">
                Sportswear
            </a>

            <a href="index.php#catalogue">
                Footwear
            </a>

            <a href="index.php#catalogue">
                Equipment
            </a>

            <a href="index.php#catalogue">
                Accessories
            </a>

            <a href="index.php#deals">
                Deals
            </a>

        </nav>


        <div class="nav-actions">

            <a
                href="cart.php"
                class="cart-link"
            >

                🛒

                <span class="cart-count">
                    0
                </span>

            </a>

        </div>

    </div>

</header>


<!-- =========================================================
     PRODUCT DETAIL
========================================================= -->

<main class="product-detail-page">


    <!-- BREADCRUMB -->

    <div class="product-breadcrumb">

        <a href="index.php">
            Home
        </a>

        <span>
            /
        </span>

        <a href="index.php#catalogue">
            <?= e($category) ?>
        </a>

        <span>
            /
        </span>

        <span>
            <?= e($name) ?>
        </span>

    </div>


    <div class="product-detail">


        <!-- =================================================
             PRODUCT IMAGE
        ================================================== -->

        <div class="product-detail-image">

            <img
                src="<?= e($image) ?>"
                alt="<?= e($name) ?>"
            >

        </div>


        <!-- =================================================
             PRODUCT INFORMATION
        ================================================== -->

        <div class="product-detail-info">


            <div class="product-detail-category">
                <?= e($category) ?>
            </div>


            <h1 class="product-detail-title">
                <?= e($name) ?>
            </h1>


            <div class="product-detail-rating">

                <span>
                    ★★★★★
                </span>

                <small>
                    <?= number_format($rating, 1) ?> / 5
                </small>

            </div>


            <div class="product-detail-price">

                KSh <?= number_format($price, 0) ?>

            </div>


            <p class="product-detail-description">

                <?= e($description) ?>

            </p>


            <!-- STOCK -->

            <div
                class="stock-status <?= $stock <= 0 ? 'stock-out' : '' ?>"
            >

                <span class="stock-dot"></span>

                <span>
                    <?= e($stockText) ?>
                </span>

            </div>


            <!-- SIZE -->

            <?php if (!$isAccessory): ?>

                <div class="size-title">
                    Select Size
                </div>


                <div class="size-options">

                    <button
                        type="button"
                        class="size-option active"
                        data-size="S"
                    >
                        S
                    </button>

                    <button
                        type="button"
                        class="size-option"
                        data-size="M"
                    >
                        M
                    </button>

                    <button
                        type="button"
                        class="size-option"
                        data-size="L"
                    >
                        L
                    </button>

                    <button
                        type="button"
                        class="size-option"
                        data-size="XL"
                    >
                        XL
                    </button>

                    <button
                        type="button"
                        class="size-option"
                        data-size="XXL"
                    >
                        XXL
                    </button>

                </div>

            <?php else: ?>

                <div class="size-title">
                    Size
                </div>


                <div class="size-options">

                    <button
                        type="button"
                        class="size-option active"
                        data-size="One Size"
                    >
                        One Size
                    </button>

                </div>

            <?php endif; ?>


            <!-- QUANTITY -->

            <div class="size-title">
                Quantity
            </div>


            <div class="quantity-row">

                <div class="quantity-control">

                    <button
                        type="button"
                        id="decreaseQuantity"
                    >
                        −
                    </button>


                    <input
                        type="number"
                        id="productQuantity"
                        value="1"
                        min="1"
                        max="<?= max(1, $stock) ?>"
                    >


                    <button
                        type="button"
                        id="increaseQuantity"
                    >
                        +
                    </button>

                </div>

            </div>


            <!-- ACTIONS -->

            <div class="product-actions">


                <button
                    type="button"
                    class="product-add-button"
                    id="addProductToCart"
                    data-id="<?= $productId ?>"
                    data-name="<?= e($name) ?>"
                    data-price="<?= $price ?>"
                    data-image="<?= e($image) ?>"
                    data-category="<?= e($category) ?>"
                    <?= $stock <= 0 ? "disabled" : "" ?>
                >

                    <?= $stock > 0 ? "ADD TO CART" : "OUT OF STOCK" ?>

                </button>


                <a
                    href="cart.php"
                    class="view-cart-button"
                >
                    VIEW CART
                </a>

            </div>

        </div>

    </div>


    <!-- =================================================
         BENEFITS
    ================================================== -->

    <div class="product-benefits">


        <div class="benefit">

            <div class="benefit-icon">
                🚚
            </div>

            <strong>
                Fast Delivery
            </strong>

            <span>
                Delivery available across Kenya.
            </span>

        </div>


        <div class="benefit">

            <div class="benefit-icon">
                ✓
            </div>

            <strong>
                Quality Guaranteed
            </strong>

            <span>
                Carefully selected sports gear.
            </span>

        </div>


        <div class="benefit">

            <div class="benefit-icon">
                🔒
            </div>

            <strong>
                Secure Shopping
            </strong>

            <span>
                Your shopping experience stays protected.
            </span>

        </div>

    </div>


</main>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

const productId =
    <?= $productId ?>;


const productName =
    <?= json_encode($name) ?>;


const productPrice =
    <?= json_encode($price) ?>;


const productImage =
    <?= json_encode($image) ?>;


const productCategory =
    <?= json_encode($category) ?>;


let selectedSize =
    <?= json_encode($isAccessory ? "One Size" : "S") ?>;


/*
|--------------------------------------------------------------------------
| Cart
|--------------------------------------------------------------------------
*/

const CART_KEY =
    "sportsHubCart";


function getCart()
{

    try {

        return JSON.parse(
            localStorage.getItem(CART_KEY)
        ) || [];

    } catch (error) {

        return [];

    }

}


function saveCart(cart)
{

    localStorage.setItem(
        CART_KEY,
        JSON.stringify(cart)
    );

}


function updateCartCount()
{

    const cart =
        getCart();


    const count =
        cart.reduce(
            (total, item) =>
                total + Number(item.quantity || 0),
            0
        );


    document
        .querySelectorAll(".cart-count")
        .forEach(element => {

            element.textContent =
                count;

        });

}


updateCartCount();


/*
|--------------------------------------------------------------------------
| Size selection
|--------------------------------------------------------------------------
*/

document
    .querySelectorAll(".size-option")
    .forEach(button => {

        button.addEventListener(
            "click",
            () => {

                document
                    .querySelectorAll(".size-option")
                    .forEach(item => {

                        item.classList.remove(
                            "active"
                        );

                    });


                button.classList.add(
                    "active"
                );


                selectedSize =
                    button.dataset.size;

            }
        );

    });


/*
|--------------------------------------------------------------------------
| Quantity
|--------------------------------------------------------------------------
*/

const quantityInput =
    document.getElementById(
        "productQuantity"
    );


document
    .getElementById(
        "decreaseQuantity"
    )
    .addEventListener(
        "click",
        () => {

            let quantity =
                parseInt(
                    quantityInput.value
                ) || 1;


            if (quantity > 1) {

                quantity--;

            }


            quantityInput.value =
                quantity;

        }
    );


document
    .getElementById(
        "increaseQuantity"
    )
    .addEventListener(
        "click",
        () => {

            let quantity =
                parseInt(
                    quantityInput.value
                ) || 1;


            const max =
                parseInt(
                    quantityInput.max
                );


            if (quantity < max) {

                quantity++;

            }


            quantityInput.value =
                quantity;

        }
    );


/*
|--------------------------------------------------------------------------
| Add to cart
|--------------------------------------------------------------------------
*/

document
    .getElementById(
        "addProductToCart"
    )
    .addEventListener(
        "click",
        () => {

            const quantity =
                parseInt(
                    quantityInput.value
                ) || 1;


            let cart =
                getCart();


            const existing =
                cart.find(
                    item =>
                        Number(item.id) === productId &&
                        item.size === selectedSize
                );


            if (existing) {

                existing.quantity +=
                    quantity;

            } else {

                cart.push({

                    id:
                        productId,

                    name:
                        productName,

                    price:
                        productPrice,

                    image:
                        productImage,

                    category:
                        productCategory,

                    size:
                        selectedSize,

                    quantity:
                        quantity

                });

            }


            saveCart(cart);

            updateCartCount();


            const button =
                document.getElementById(
                    "addProductToCart"
                );


            const originalText =
                button.textContent;


            button.textContent =
                "✓ ADDED TO CART";


            button.style.transform =
                "scale(1.03)";


            setTimeout(
                () => {

                    button.textContent =
                        originalText;

                    button.style.transform =
                        "";

                },
                1200
            );

        }
    );


</script>


</body>

</html>