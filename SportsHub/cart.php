<?php
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shopping Cart | Sports Hub</title>

    <link rel="stylesheet" href="style.css">

    <style>
        .cart-page {
            min-height: 100vh;
            padding: 130px 6% 80px;
            background:
                radial-gradient(
                    circle at 15% 15%,
                    rgba(190,255,0,.08),
                    transparent 32%
                ),
                var(--bg);
        }

        .cart-header {
            max-width: 1200px;
            margin: 0 auto 40px;
        }

        .cart-kicker {
            color: var(--lime);
            font-size: .75rem;
            font-weight: 900;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .cart-header h1 {
            margin: 10px 0;
            font-size: clamp(2.8rem, 6vw, 5rem);
            line-height: .95;
        }

        .cart-header p {
            color: var(--muted);
            max-width: 650px;
            font-size: .98rem;
        }

        .cart-layout {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 28px;
            align-items: start;
        }

        /* CART ITEMS */

        .cart-items {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 115px 1fr auto;
            gap: 20px;
            align-items: center;

            padding: 18px;

            border: 1px solid var(--border);
            border-radius: 20px;

            background: rgba(255,255,255,.025);

            transition: .3s ease;
        }

        .cart-item:hover {
            border-color: rgba(190,255,0,.35);
            transform: translateY(-2px);
        }

        .cart-image {
            width: 115px;
            height: 115px;

            border-radius: 16px;
            overflow: hidden;

            background: #111;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .cart-category {
            color: var(--lime);
            font-size: .68rem;
            font-weight: 900;
            letter-spacing: .14em;
            text-transform: uppercase;
            margin-bottom: 7px;
        }

        .cart-name {
            font-size: 1.15rem;
            font-weight: 800;
            margin: 0 0 8px;
        }

        .cart-size {
            display: inline-block;
            padding: 5px 9px;

            border-radius: 7px;

            background: rgba(255,255,255,.06);
            color: var(--muted);

            font-size: .75rem;
        }

        .cart-unit-price {
            margin-top: 12px;
            font-weight: 800;
        }

        .cart-actions {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .quantity-control {
            display: flex;
            align-items: center;

            border: 1px solid var(--border);
            border-radius: 10px;

            overflow: hidden;
        }

        .quantity-control button {
            width: 36px;
            height: 36px;

            border: 0;
            background: transparent;

            color: var(--text);
            cursor: pointer;

            font-size: 1.1rem;
        }

        .quantity-control button:hover {
            background: rgba(190,255,0,.1);
            color: var(--lime);
        }

        .quantity-number {
            min-width: 38px;
            text-align: center;
            font-weight: 800;
        }

        .remove-button {
            border: 0;
            background: transparent;

            color: #888;

            cursor: pointer;
            font-size: .78rem;
        }

        .remove-button:hover {
            color: #ff6868;
        }

        /* SUMMARY */

        .cart-summary {
            position: sticky;
            top: 100px;

            padding: 26px;

            border: 1px solid var(--border);
            border-radius: 22px;

            background: rgba(255,255,255,.035);

            backdrop-filter: blur(15px);
        }

        .cart-summary h2 {
            margin: 0 0 25px;
            font-size: 1.35rem;
        }

        .summary-line {
            display: flex;
            justify-content: space-between;

            margin: 16px 0;

            color: var(--muted);
        }

        .summary-line strong {
            color: var(--text);
        }

        .summary-total {
            border-top: 1px solid var(--border);

            margin-top: 22px;
            padding-top: 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .summary-total span {
            color: var(--muted);
        }

        .summary-total strong {
            color: var(--lime);
            font-size: 1.55rem;
        }

        .checkout-button {
            width: 100%;

            margin-top: 25px;
            padding: 15px;

            border: 0;
            border-radius: 12px;

            background: var(--lime);
            color: #050505;

            font-weight: 900;

            cursor: pointer;
            transition: .3s ease;
        }

        .checkout-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(190,255,0,.2);
        }

        .continue-button {
            display: block;

            margin-top: 17px;

            text-align: center;
            text-decoration: none;

            color: var(--muted);

            font-size: .88rem;
        }

        .continue-button:hover {
            color: var(--lime);
        }

        .clear-button {
            width: 100%;

            margin-top: 15px;
            padding: 11px;

            border: 1px solid var(--border);
            border-radius: 10px;

            background: transparent;
            color: var(--muted);

            cursor: pointer;
        }

        .clear-button:hover {
            border-color: rgba(255,100,100,.4);
            color: #ff6868;
        }

        .delivery-note {
            margin-top: 18px;
            padding: 12px;

            border-radius: 10px;

            background: rgba(190,255,0,.06);

            color: var(--muted);

            font-size: .75rem;
            line-height: 1.5;
        }

        /* EMPTY CART */

        .empty-cart {
            max-width: 750px;
            margin: 20px auto 0;

            padding: 70px 30px;

            text-align: center;

            border: 1px solid var(--border);
            border-radius: 25px;

            background: rgba(255,255,255,.025);
        }

        .empty-icon {
            width: 80px;
            height: 80px;

            margin: 0 auto 25px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: rgba(190,255,0,.08);

            font-size: 2.4rem;
        }

        .empty-cart h2 {
            margin: 0 0 12px;
            font-size: 1.7rem;
        }

        .empty-cart p {
            max-width: 480px;
            margin: 0 auto 28px;

            color: var(--muted);
            line-height: 1.6;
        }

        .shop-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            padding: 14px 23px;

            border-radius: 11px;

            background: var(--lime);
            color: #050505;

            text-decoration: none;

            font-weight: 900;

            transition: .3s ease;
        }

        .shop-button:hover {
            transform: translateY(-2px);
        }

        /* NAV CART */

        .cart-nav {
            position: relative;
            text-decoration: none;
            color: var(--text);

            font-size: 1.15rem;
        }

        .cart-count {
            position: absolute;

            top: -9px;
            right: -12px;

            min-width: 18px;
            height: 18px;

            padding: 0 5px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: var(--lime);
            color: #050505;

            font-size: .65rem;
            font-weight: 900;
        }

        @media (max-width: 850px) {

            .cart-layout {
                grid-template-columns: 1fr;
            }

            .cart-summary {
                position: static;
            }
        }

        @media (max-width: 600px) {

            .cart-page {
                padding: 110px 4% 60px;
            }

            .cart-item {
                grid-template-columns: 80px 1fr;
            }

            .cart-image {
                width: 80px;
                height: 80px;
            }

            .cart-actions {
                grid-column: 1 / -1;
                justify-content: space-between;
            }
        }
    </style>
</head>

<body>

<!-- NAVIGATION -->

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

            <a href="cart.php" class="cart-nav" aria-label="Shopping cart">
                🛒
                <span id="navCartCount" class="cart-count">0</span>
            </a>

        </div>

    </div>

</header>


<!-- CART -->

<main class="cart-page">

    <div class="cart-header">

        <div class="cart-kicker">
            Shopping Bag
        </div>

        <h1>Your Cart</h1>

        <p>
            Review your selected sportswear and equipment
            before moving to checkout.
        </p>

    </div>

    <div id="cartContainer"></div>

</main>


<script>

const CART_KEY = "sportsHubCart";


/* GET CART */

function getCart() {

    try {

        const saved = localStorage.getItem(CART_KEY);

        if (!saved) {
            return [];
        }

        const cart = JSON.parse(saved);

        return Array.isArray(cart) ? cart : [];

    } catch (error) {

        console.error("Cart error:", error);

        return [];
    }
}


/* SAVE CART */

function saveCart(cart) {

    localStorage.setItem(
        CART_KEY,
        JSON.stringify(cart)
    );
}


/* FORMAT MONEY */

function formatMoney(amount) {

    return "KSh " +
        Number(amount || 0).toLocaleString("en-KE");
}


/* IMAGE FALLBACK */

function getImage(item) {

    if (item.image && item.image.trim() !== "") {
        return item.image;
    }

    const imageMap = {

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

    return imageMap[item.name] || "hero-sports.png";
}


/* ESCAPE HTML */

function escapeHTML(value) {

    const div = document.createElement("div");

    div.textContent = value ?? "";

    return div.innerHTML;
}


/* UPDATE NAV COUNT */

function updateNavCount() {

    const cart = getCart();

    const count = cart.reduce(
        (total, item) =>
            total + Number(item.quantity || 1),
        0
    );

    const counter =
        document.getElementById("navCartCount");

    if (counter) {

        counter.textContent = count;

        counter.style.display =
            count > 0 ? "flex" : "none";
    }
}


/* RENDER CART */

function renderCart() {

    const container =
        document.getElementById("cartContainer");

    if (!container) {
        return;
    }

    const cart = getCart();


    /* EMPTY */

    if (cart.length === 0) {

        container.innerHTML = `

            <div class="empty-cart">

                <div class="empty-icon">
                    🛒
                </div>

                <h2>
                    Your cart is empty
                </h2>

                <p>
                    You haven't added any gear yet.
                    Explore our collection and find
                    equipment built for your next performance.
                </p>

                <a
                    href="index.php#catalogue"
                    class="shop-button"
                >
                    Start Shopping →
                </a>

            </div>

        `;

        updateNavCount();

        return;
    }


    /* TOTALS */

    let subtotal = 0;

    cart.forEach(item => {

        const price =
            Number(item.price || 0);

        const quantity =
            Number(item.quantity || 1);

        subtotal += price * quantity;

    });


    const delivery =
        subtotal >= 5000 ? 0 : 300;

    const total =
        subtotal + delivery;


    const totalItems =
        cart.reduce(
            (sum, item) =>
                sum + Number(item.quantity || 1),
            0
        );


    /* ITEMS */

    const itemsHTML = cart.map(
        (item, index) => {

            const quantity =
                Number(item.quantity || 1);

            const price =
                Number(item.price || 0);

            return `

                <article class="cart-item">

                    <div class="cart-image">

                        <img
                            src="${escapeHTML(
                                getImage(item)
                            )}"
                            alt="${escapeHTML(
                                item.name ||
                                "Sports Hub product"
                            )}"
                            onerror="
                                this.onerror=null;
                                this.src='hero-sports.png';
                            "
                        >

                    </div>


                    <div>

                        <div class="cart-category">
                            ${escapeHTML(
                                item.category ||
                                "Sports Gear"
                            )}
                        </div>

                        <h3 class="cart-name">
                            ${escapeHTML(
                                item.name ||
                                "Sports Hub Product"
                            )}
                        </h3>

                        ${
                            item.color
                            ?
                            `
                            <span class="cart-size">
                                Colour: ${escapeHTML(
                                    item.color
                                )}
                            </span>
                            `
                            :
                            ""
                        }

                        ${
                            item.size
                            ?
                            `
                            <span class="cart-size">
                                Size: ${escapeHTML(
                                    item.size
                                )}
                            </span>
                            `
                            :
                            ""
                        }

                        <div class="cart-unit-price">
                            ${formatMoney(price)}
                        </div>

                    </div>


                    <div class="cart-actions">

                        <div class="quantity-control">

                            <button
                                type="button"
                                onclick="changeQuantity(
                                    ${index},
                                    -1
                                )"
                            >
                                −
                            </button>

                            <span class="quantity-number">
                                ${quantity}
                            </span>

                            <button
                                type="button"
                                onclick="changeQuantity(
                                    ${index},
                                    1
                                )"
                            >
                                +
                            </button>

                        </div>


                        <button
                            type="button"
                            class="remove-button"
                            onclick="removeItem(${index})"
                        >
                            Remove
                        </button>

                    </div>

                </article>

            `;

        }
    ).join("");


    container.innerHTML = `

        <div class="cart-layout">


            <section class="cart-items">

                ${itemsHTML}

            </section>


            <aside class="cart-summary">

                <h2>
                    Order Summary
                </h2>


                <div class="summary-line">

                    <span>
                        Items
                    </span>

                    <strong>
                        ${totalItems}
                    </strong>

                </div>


                <div class="summary-line">

                    <span>
                        Subtotal
                    </span>

                    <strong>
                        ${formatMoney(subtotal)}
                    </strong>

                </div>


                <div class="summary-line">

                    <span>
                        Delivery
                    </span>

                    <strong>
                        ${
                            delivery === 0
                            ? "FREE"
                            : formatMoney(delivery)
                        }
                    </strong>

                </div>


                <div class="summary-total">

                    <span>
                        Total
                    </span>

                    <strong>
                        ${formatMoney(total)}
                    </strong>

                </div>


                <button
                    type="button"
                    class="checkout-button"
                    onclick="checkout()"
                >
                    Proceed to Checkout →
                </button>


                <a
                    href="index.php#catalogue"
                    class="continue-button"
                >
                    ← Continue Shopping
                </a>


                <button
                    type="button"
                    class="clear-button"
                    onclick="clearCart()"
                >
                    Clear Cart
                </button>


                <div class="delivery-note">

                    🚚 Delivery estimate:
                    KSh 300 for orders below
                    KSh 5,000.

                    Orders of KSh 5,000+
                    qualify for free delivery.

                </div>

            </aside>

        </div>

    `;


    updateNavCount();
}


/* CHANGE QUANTITY */

function changeQuantity(index, change) {

    const cart = getCart();

    if (!cart[index]) {
        return;
    }

    let quantity =
        Number(cart[index].quantity || 1);

    quantity += change;


    if (quantity <= 0) {

        cart.splice(index, 1);

    } else {

        cart[index].quantity = quantity;

    }


    saveCart(cart);

    renderCart();
}


/* REMOVE */

function removeItem(index) {

    const cart = getCart();

    if (!cart[index]) {
        return;
    }

    cart.splice(index, 1);

    saveCart(cart);

    renderCart();
}


/* CLEAR */

function clearCart() {

    const cart = getCart();

    if (cart.length === 0) {
        return;
    }

    const confirmed =
        confirm(
            "Are you sure you want to clear your cart?"
        );

    if (!confirmed) {
        return;
    }

    localStorage.removeItem(CART_KEY);

    renderCart();
}


/* CHECKOUT */

function checkout() {

    const cart = getCart();

    if (cart.length === 0) {

        alert(
            "Your cart is empty."
        );

        return;
    }

    window.location.href =
        "checkout.php";
}


/* START */

document.addEventListener(
    "DOMContentLoaded",
    function() {

        renderCart();

        updateNavCount();

    }
);


/* SYNC BETWEEN TABS */

window.addEventListener(
    "storage",
    function() {

        renderCart();

        updateNavCount();

    }
);

</script>

</body>
</html>