<?php
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout | Sports Hub</title>

    <link rel="stylesheet" href="style.css">

    <style>
        .checkout-page {
            min-height: 100vh;
            padding: 130px 6% 80px;
            background:
                radial-gradient(
                    circle at 85% 10%,
                    rgba(190,255,0,.07),
                    transparent 30%
                ),
                var(--bg);
        }

        .checkout-header {
            max-width: 1200px;
            margin: 0 auto 40px;
        }

        .checkout-kicker {
            color: var(--lime);
            font-size: .75rem;
            font-weight: 900;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .checkout-header h1 {
            margin: 10px 0;
            font-size: clamp(2.7rem, 6vw, 4.8rem);
            line-height: .95;
        }

        .checkout-header p {
            color: var(--muted);
        }

        .checkout-layout {
            max-width: 1200px;
            margin: auto;

            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 28px;
            align-items: start;
        }

        .checkout-card {
            padding: 28px;

            border: 1px solid var(--border);
            border-radius: 22px;

            background: rgba(255,255,255,.025);
        }

        .checkout-section {
            margin-bottom: 32px;
        }

        .checkout-section:last-child {
            margin-bottom: 0;
        }

        .checkout-section-title {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 20px;
        }

        .checkout-number {
            width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: var(--lime);
            color: #050505;

            font-size: .8rem;
            font-weight: 900;
        }

        .checkout-section-title h2 {
            margin: 0;
            font-size: 1.15rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: .78rem;
            color: var(--muted);
            font-weight: 700;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            box-sizing: border-box;

            padding: 13px 14px;

            border: 1px solid var(--border);
            border-radius: 10px;

            background: rgba(255,255,255,.035);
            color: var(--text);

            outline: none;

            font-family: inherit;
            font-size: .9rem;

            transition: .25s ease;
        }

        .form-group textarea {
            min-height: 95px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--lime);
            box-shadow: 0 0 0 3px rgba(190,255,0,.08);
        }

        .form-group select option {
            background: #111;
            color: white;
        }

        .delivery-options {
            display: grid;
            gap: 12px;
        }

        .delivery-option {
            position: relative;
        }

        .delivery-option input {
            position: absolute;
            opacity: 0;
        }

        .delivery-label {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 15px;

            border: 1px solid var(--border);
            border-radius: 12px;

            cursor: pointer;
            transition: .25s ease;
        }

        .delivery-label:hover {
            border-color: rgba(190,255,0,.35);
        }

        .delivery-option input:checked + .delivery-label {
            border-color: var(--lime);
            background: rgba(190,255,0,.06);
        }

        .delivery-info strong {
            display: block;
            margin-bottom: 4px;
        }

        .delivery-info span {
            color: var(--muted);
            font-size: .75rem;
        }

        .delivery-price {
            font-weight: 900;
            color: var(--lime);
        }

        /* PAYMENT */

        .payment-box {
            padding: 18px;

            border: 1px solid rgba(190,255,0,.25);
            border-radius: 15px;

            background: rgba(190,255,0,.045);
        }

        .mpesa-title {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-bottom: 10px;
        }

        .mpesa-badge {
            padding: 6px 9px;

            border-radius: 7px;

            background: #55c83f;
            color: white;

            font-size: .72rem;
            font-weight: 900;
        }

        .payment-box h3 {
            margin: 0;
            font-size: 1rem;
        }

        .payment-box p {
            margin: 8px 0 15px;

            color: var(--muted);
            font-size: .8rem;
            line-height: 1.5;
        }

        .phone-field {
            display: flex;
            gap: 10px;
        }

        .phone-field span {
            display: flex;
            align-items: center;

            padding: 0 12px;

            border: 1px solid var(--border);
            border-radius: 10px;

            color: var(--muted);
            font-weight: 700;
        }

        .phone-field input {
            flex: 1;
        }

        /* SUMMARY */

        .order-summary {
            position: sticky;
            top: 100px;

            padding: 25px;

            border: 1px solid var(--border);
            border-radius: 22px;

            background: rgba(255,255,255,.035);

            backdrop-filter: blur(15px);
        }

        .order-summary h2 {
            margin: 0 0 22px;
            font-size: 1.35rem;
        }

        .summary-products {
            display: flex;
            flex-direction: column;
            gap: 13px;

            max-height: 300px;
            overflow-y: auto;
        }

        .summary-product {
            display: grid;
            grid-template-columns: 58px 1fr auto;
            gap: 10px;
            align-items: center;
        }

        .summary-product-image {
            width: 58px;
            height: 58px;

            border-radius: 10px;
            overflow: hidden;

            background: #111;
        }

        .summary-product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .summary-product-name {
            font-size: .82rem;
            font-weight: 800;
        }

        .summary-product-meta {
            margin-top: 4px;

            color: var(--muted);
            font-size: .7rem;
        }

        .summary-product-price {
            font-size: .82rem;
            font-weight: 800;
        }

        .summary-divider {
            height: 1px;
            background: var(--border);
            margin: 22px 0;
        }

        .summary-line {
            display: flex;
            justify-content: space-between;

            margin: 13px 0;

            color: var(--muted);
            font-size: .9rem;
        }

        .summary-line strong {
            color: var(--text);
        }

        .summary-final {
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding-top: 18px;
            margin-top: 18px;

            border-top: 1px solid var(--border);
        }

        .summary-final span {
            color: var(--muted);
        }

        .summary-final strong {
            color: var(--lime);
            font-size: 1.55rem;
        }

        .place-order {
            width: 100%;

            margin-top: 24px;
            padding: 16px;

            border: 0;
            border-radius: 12px;

            background: var(--lime);
            color: #050505;

            font-weight: 900;
            font-size: .95rem;

            cursor: pointer;
            transition: .3s ease;
        }

        .place-order:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(190,255,0,.2);
        }

        .secure-note {
            margin-top: 15px;

            text-align: center;

            color: var(--muted);
            font-size: .7rem;
            line-height: 1.5;
        }

        .back-cart {
            display: block;

            margin-top: 15px;

            text-align: center;
            color: var(--muted);

            text-decoration: none;
            font-size: .82rem;
        }

        .back-cart:hover {
            color: var(--lime);
        }

        .empty-checkout {
            max-width: 650px;
            margin: 50px auto;
            text-align: center;
            padding: 60px 25px;

            border: 1px solid var(--border);
            border-radius: 22px;
            background: rgba(255,255,255,.025);
        }

        .empty-checkout h2 {
            margin-bottom: 10px;
        }

        .empty-checkout p {
            color: var(--muted);
            margin-bottom: 25px;
        }

        .empty-checkout a {
            display: inline-block;

            padding: 13px 22px;

            border-radius: 10px;

            background: var(--lime);
            color: #050505;

            text-decoration: none;
            font-weight: 900;
        }

        @media (max-width: 900px) {

            .checkout-layout {
                grid-template-columns: 1fr;
            }

            .order-summary {
                position: static;
                order: -1;
            }
        }

        @media (max-width: 600px) {

            .checkout-page {
                padding: 110px 4% 60px;
            }

            .checkout-card,
            .order-summary {
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

<header class="main-nav">

    <div class="nav-inner">

        <a href="index.php" class="brand">
            <span class="brand-mark">S</span>
            <span>SPORTS HUB</span>
        </a>

        <nav class="nav-menu">

            <a href="index.php">Home</a>

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

            <a href="index.php#catalogue">
                Deals
            </a>

        </nav>

        <div class="nav-actions">

            <a href="cart.php" class="cart-link">
                🛒
                <span class="cart-count">0</span>
            </a>

        </div>

    </div>

</header>


<main class="checkout-page">

    <div class="checkout-header">

        <div class="checkout-kicker">
            Secure Checkout
        </div>

        <h1>Complete Your Order</h1>

        <p>
            Enter your delivery details and choose your preferred
            payment method.
        </p>

    </div>


    <div id="checkoutContainer"></div>

</main>


<script>

const CART_KEY = "sportsHubCart";


/* CART */

function getCart() {

    try {

        const cart =
            JSON.parse(
                localStorage.getItem(CART_KEY)
            );

        return Array.isArray(cart) ? cart : [];

    } catch (error) {

        return [];
    }
}


/* MONEY */

function money(value) {

    return "KSh " +
        Number(value || 0).toLocaleString("en-KE");
}


/* ESCAPE */

function escapeHTML(value) {

    const div =
        document.createElement("div");

    div.textContent = value ?? "";

    return div.innerHTML;
}


/* IMAGE */

function getImage(item) {

    if (
        item.image &&
        item.image.trim() !== ""
    ) {
        return item.image;
    }

    const images = {

        "Performance Jersey":
            "jersey.png",

        "Pro Football Boots":
            "football-boots.png",

        "Training Shorts":
            "training-shorts.png",

        "Sports Performance Cap":
            "sports-cap.png",

        "Match Football":
            "football.png",

        "Sports Training Bag":
            "training-bag.png"

    };

    return images[item.name] ||
        "hero-sports.png";
}


/* NAV COUNT */

function updateCartCount() {

    const cart = getCart();

    const count =
        cart.reduce(
            (sum, item) =>
                sum +
                Number(item.quantity || 1),
            0
        );

    document.querySelectorAll(
        ".cart-count"
    ).forEach(element => {

        element.textContent = count;

        element.style.display =
            count > 0 ? "inline-flex" : "none";

    });
}


/* RENDER */

function renderCheckout() {

    const container =
        document.getElementById(
            "checkoutContainer"
        );

    const cart = getCart();


    if (cart.length === 0) {

        container.innerHTML = `

            <div class="empty-checkout">

                <div style="font-size:3rem;">
                    🛒
                </div>

                <h2>
                    Your cart is empty
                </h2>

                <p>
                    Add some sports gear before
                    proceeding to checkout.
                </p>

                <a href="index.php#catalogue">
                    Browse Products →
                </a>

            </div>

        `;

        return;
    }


    let subtotal = 0;

    cart.forEach(item => {

        subtotal +=
            Number(item.price || 0) *
            Number(item.quantity || 1);

    });


    const delivery =
        subtotal >= 5000 ? 0 : 300;

    const total =
        subtotal + delivery;


    const productsHTML =
        cart.map(item => {

            const quantity =
                Number(item.quantity || 1);

            const price =
                Number(item.price || 0);

            return `

                <div class="summary-product">

                    <div class="summary-product-image">

                        <img
                            src="${escapeHTML(
                                getImage(item)
                            )}"
                            alt="${escapeHTML(
                                item.name
                            )}"
                            onerror="
                                this.onerror=null;
                                this.src='hero-sports.png';
                            "
                        >

                    </div>

                    <div>

                        <div class="summary-product-name">
                            ${escapeHTML(
                                item.name ||
                                "Sports Hub Product"
                            )}
                        </div>

                        <div class="summary-product-meta">

                            Qty: ${quantity}

                            ${
                                item.color
                                ? " · Colour: " +
                                  escapeHTML(
                                      item.color
                                  )
                                : ""
                            }
                            ${
                                item.size
                                ? " · Size: " +
                                  escapeHTML(
                                      item.size
                                  )
                                : ""
                            }

                        </div>

                    </div>

                    <div class="summary-product-price">

                        ${money(
                            price * quantity
                        )}

                    </div>

                </div>

            `;

        }).join("");


    container.innerHTML = `

        <div class="checkout-layout">


            <!-- CUSTOMER FORM -->

            <section class="checkout-card">


                <!-- CUSTOMER -->

                <div class="checkout-section">

                    <div class="checkout-section-title">

                        <span class="checkout-number">
                            1
                        </span>

                        <h2>
                            Customer Information
                        </h2>

                    </div>


                    <div class="form-grid">

                        <div class="form-group">

                            <label for="fullName">
                                Full Name *
                            </label>

                            <input
                                type="text"
                                id="fullName"
                                placeholder="Enter your full name"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label for="email">
                                Email Address *
                            </label>

                            <input
                                type="email"
                                id="email"
                                placeholder="you@example.com"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label for="phone">
                                Phone Number *
                            </label>

                            <input
                                type="tel"
                                id="phone"
                                placeholder="07XXXXXXXX"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label for="county">
                                County *
                            </label>

                            <select id="county" required>

                                <option value="">
                                    Select County
                                </option>

                                <option>
                                    Nairobi
                                </option>

                                <option>
                                    Kiambu
                                </option>

                                <option>
                                    Murang'a
                                </option>

                                <option>
                                    Kirinyaga
                                </option>

                                <option>
                                    Nyeri
                                </option>

                                <option>
                                    Nakuru
                                </option>

                                <option>
                                    Mombasa
                                </option>

                                <option>
                                    Kisumu
                                </option>

                                <option>
                                    Machakos
                                </option>

                                <option>
                                    Meru
                                </option>

                                <option>
                                    Other
                                </option>

                            </select>

                        </div>

                    </div>

                </div>


                <!-- DELIVERY -->

                <div class="checkout-section">

                    <div class="checkout-section-title">

                        <span class="checkout-number">
                            2
                        </span>

                        <h2>
                            Delivery Information
                        </h2>

                    </div>


                    <div class="form-grid">

                        <div class="form-group full">

                            <label for="address">
                                Delivery Address *
                            </label>

                            <textarea
                                id="address"
                                placeholder="Enter your estate, building, street or detailed delivery location"
                                required
                            ></textarea>

                        </div>


                        <div class="form-group">

                            <label for="town">
                                Town / City *
                            </label>

                            <input
                                type="text"
                                id="town"
                                placeholder="e.g. Nairobi"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label for="landmark">
                                Nearby Landmark
                            </label>

                            <input
                                type="text"
                                id="landmark"
                                placeholder="Optional"
                            >

                        </div>

                    </div>


                    <div
                        class="delivery-options"
                        style="margin-top:18px;"
                    >

                        <div class="delivery-option">

                            <input
                                type="radio"
                                name="delivery"
                                id="standardDelivery"
                                value="300"
                                checked
                            >

                            <label
                                for="standardDelivery"
                                class="delivery-label"
                            >

                                <div class="delivery-info">

                                    <strong>
                                        Standard Delivery
                                    </strong>

                                    <span>
                                        Estimated delivery:
                                        1–3 business days
                                    </span>

                                </div>

                                <div
                                    class="delivery-price"
                                    id="standardPrice"
                                >
                                    ${money(delivery)}
                                </div>

                            </label>

                        </div>


                        <div class="delivery-option">

                            <input
                                type="radio"
                                name="delivery"
                                id="pickup"
                                value="0"
                            >

                            <label
                                for="pickup"
                                class="delivery-label"
                            >

                                <div class="delivery-info">

                                    <strong>
                                        Store Pickup
                                    </strong>

                                    <span>
                                        Pick up from a
                                        Sports Hub location
                                    </span>

                                </div>

                                <div class="delivery-price">
                                    FREE
                                </div>

                            </label>

                        </div>

                    </div>

                </div>


                <!-- PAYMENT -->

                <div class="checkout-section">

                    <div class="checkout-section-title">

                        <span class="checkout-number">
                            3
                        </span>

                        <h2>
                            Payment Method
                        </h2>

                    </div>


                    <div class="payment-box">

                        <div class="mpesa-title">

                            <span class="mpesa-badge">
                                M-PESA
                            </span>

                            <h3>
                                Pay with M-Pesa
                            </h3>

                        </div>

                        <p>
                            Enter the M-Pesa number you will
                            use for payment. The actual payment
                            request will be connected later.
                        </p>


                        <div class="phone-field">

                            <span>
                                +254
                            </span>

                            <input
                                type="tel"
                                id="mpesaPhone"
                                placeholder="7XXXXXXXX"
                                maxlength="9"
                            >

                        </div>

                    </div>

                </div>


                <!-- NOTES -->

                <div class="checkout-section">

                    <div class="checkout-section-title">

                        <span class="checkout-number">
                            4
                        </span>

                        <h2>
                            Order Notes
                        </h2>

                    </div>


                    <div class="form-group">

                        <label for="notes">
                            Additional instructions
                        </label>

                        <textarea
                            id="notes"
                            placeholder="Any special delivery instructions? (Optional)"
                        ></textarea>

                    </div>

                </div>


            </section>


            <!-- SUMMARY -->

            <aside class="order-summary">

                <h2>
                    Your Order
                </h2>


                <div class="summary-products">

                    ${productsHTML}

                </div>


                <div class="summary-divider"></div>


                <div class="summary-line">

                    <span>
                        Subtotal
                    </span>

                    <strong id="summarySubtotal">
                        ${money(subtotal)}
                    </strong>

                </div>


                <div class="summary-line">

                    <span>
                        Delivery
                    </span>

                    <strong id="summaryDelivery">
                        ${
                            delivery === 0
                            ? "FREE"
                            : money(delivery)
                        }
                    </strong>

                </div>


                <div class="summary-final">

                    <span>
                        Total
                    </span>

                    <strong id="summaryTotal">
                        ${money(total)}
                    </strong>

                </div>


                <button
                    type="button"
                    class="place-order"
                    onclick="placeOrder()"
                >
                    Place Order →
                </button>


                <div class="secure-note">
                    🔒 Your order information is handled
                    securely by Sports Hub.
                </div>


                <a
                    href="cart.php"
                    class="back-cart"
                >
                    ← Back to Cart
                </a>

            </aside>

        </div>

    `;


    setupDelivery(
        subtotal
    );

    updateCartCount();
}


/* DELIVERY */

function setupDelivery(subtotal) {

    const radios =
        document.querySelectorAll(
            'input[name="delivery"]'
        );

    const deliveryElement =
        document.getElementById(
            "summaryDelivery"
        );

    const totalElement =
        document.getElementById(
            "summaryTotal"
        );

    const standardPrice =
        document.getElementById(
            "standardPrice"
        );


    function updateDelivery() {

        const selected =
            document.querySelector(
                'input[name="delivery"]:checked'
            );

        if (!selected) return;

        let delivery =
            Number(selected.value);

        /*
         * Orders above KSh 5,000 get free
         * standard delivery.
         */

        if (
            selected.id ===
            "standardDelivery"
        ) {

            delivery =
                subtotal >= 5000
                ? 0
                : 300;

        }


        deliveryElement.textContent =
            delivery === 0
            ? "FREE"
            : money(delivery);


        totalElement.textContent =
            money(
                subtotal + delivery
            );


        if (standardPrice) {

            standardPrice.textContent =
                subtotal >= 5000
                ? "FREE"
                : "KSh 300";

        }

    }


    radios.forEach(radio => {

        radio.addEventListener(
            "change",
            updateDelivery
        );

    });


    updateDelivery();
}


/* PLACE ORDER + M-PESA STK PUSH */

async function placeOrder() {

    const name =
        document.getElementById("fullName").value.trim();

    const email =
        document.getElementById("email").value.trim();

    const phone =
        document.getElementById("phone").value.trim();

    const county =
        document.getElementById("county").value;

    const address =
        document.getElementById("address").value.trim();

    const town =
        document.getElementById("town").value.trim();

    const landmark =
        document.getElementById("landmark").value.trim();

    const mpesa =
        document.getElementById("mpesaPhone").value.trim();

    const notes =
        document.getElementById("notes").value.trim();

    const cart = getCart();

    const selectedDelivery =
        document.querySelector(
            'input[name="delivery"]:checked'
        );

    /*
    |--------------------------------------------------------------------------
    | VALIDATION
    |--------------------------------------------------------------------------
    */

    if (!name) {
        alert("Please enter your full name.");
        return;
    }

    if (!email) {
        alert("Please enter your email address.");
        return;
    }

    if (!phone) {
        alert("Please enter your phone number.");
        return;
    }

    if (!county) {
        alert("Please select your county.");
        return;
    }

    if (!address) {
        alert("Please enter your delivery address.");
        return;
    }

    if (!town) {
        alert("Please enter your town or city.");
        return;
    }

    if (!mpesa) {
        alert("Please enter your M-Pesa number.");
        return;
    }

    if (!/^7\d{8}$/.test(mpesa)) {
        alert(
            "Enter a valid M-Pesa number in the format 7XXXXXXXX."
        );
        return;
    }

    if (!Array.isArray(cart) || cart.length === 0) {
        alert("Your cart is empty.");
        return;
    }

    /*
    |--------------------------------------------------------------------------
    | DELIVERY METHOD
    |--------------------------------------------------------------------------
    */

    let deliveryMethod = "Standard Delivery";

    if (
        selectedDelivery &&
        selectedDelivery.id === "pickup"
    ) {
        deliveryMethod = "Store Pickup";
    }

    /*
    |--------------------------------------------------------------------------
    | BUTTON STATE
    |--------------------------------------------------------------------------
    */

    const button =
        document.querySelector(".place-order");

    if (!button) {
        alert("Place Order button could not be found.");
        return;
    }

    button.disabled = true;
    button.textContent = "Creating Order...";

    try {

        /*
        |--------------------------------------------------------------------------
        | 1. CREATE ORDER
        |--------------------------------------------------------------------------
        */

        const orderResponse =
            await fetch(
                "place_order.php",
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        fullName: name,
                        email: email,
                        phone: phone,
                        county: county,
                        address: address,
                        town: town,
                        landmark: landmark,
                        deliveryMethod: deliveryMethod,
                        mpesaPhone: mpesa,
                        notes: notes,
                        cart: cart
                    })
                }
            );

        const orderText =
            await orderResponse.text();

        let orderData;

        try {
            orderData = JSON.parse(orderText);
        } catch (error) {
            throw new Error(
                "The order server returned an invalid response."
            );
        }

        if (!orderData.success) {
            throw new Error(
                orderData.message ||
                "Unable to create order."
            );
        }

        const orderId =
            orderData.order_id;

        if (!orderId) {
            throw new Error(
                "Order was created but no Order ID was returned."
            );
        }

        /*
        |--------------------------------------------------------------------------
        | 2. SEND M-PESA STK PUSH
        |--------------------------------------------------------------------------
        */

        button.textContent =
            "Sending M-Pesa Prompt...";

        const mpesaResponse =
            await fetch(
                "mpesa_stk_push.php",
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        order_id: orderId,
                        phone: mpesa
                    })
                }
            );

        const mpesaText =
            await mpesaResponse.text();

        let mpesaData;

        try {
            mpesaData = JSON.parse(mpesaText);
        } catch (error) {
            throw new Error(
                "M-Pesa server returned an invalid response."
            );
        }

        if (!mpesaData.success) {
            throw new Error(
                mpesaData.message ||
                "M-Pesa payment request failed."
            );
        }

        /*
        |--------------------------------------------------------------------------
        | 3. STK PUSH SENT
        |--------------------------------------------------------------------------
        */

        button.textContent =
            "M-Pesa Prompt Sent ✓";

        alert(
            "Order #" +
            orderId +
            " created successfully.\n\n" +
            "An M-Pesa payment prompt has been sent to +254" +
            mpesa +
            ".\n\n" +
            "Complete the payment on your phone."
        );

        /*
        | Payment is still Pending at this point.
        | mpesa_callback.php will update the order after Safaricom
        | confirms the payment.
        |
        | Do not clear the cart yet.
        */

    } catch (error) {

        console.error(
            "Checkout Error:",
            error
        );

        alert(
            "Checkout failed.\n\n" +
            error.message
        );

        button.disabled = false;
        button.textContent = "Place Order →";
    }
}


document.addEventListener(
    "DOMContentLoaded",
    function() {

        renderCheckout();

        updateCartCount();

    }
);

</script>

</body>
</html>