/* =========================================================
   SPORTS HUB - MAIN JAVASCRIPT
   ========================================================= */


/* =========================================================
   SHARED SHOPPING CART
   ========================================================= */

const CART_KEY = "sportsHubCart";


function getCart() {
    try {
        return JSON.parse(localStorage.getItem(CART_KEY)) || [];
    } catch (error) {
        return [];
    }
}


function saveCart(cart) {
    localStorage.setItem(CART_KEY, JSON.stringify(cart));
    updateCartCount();
}


function updateCartCount() {

    const cart = getCart();

    const count = cart.reduce(
        (total, item) => total + Number(item.quantity || 1),
        0
    );

    document.querySelectorAll(".cart-count").forEach(counter => {
        counter.textContent = count;
    });
}


/* =========================================================
   ADD TO CART
   ========================================================= */

function addToCart(product) {

    const cart = getCart();

    const existingProduct = cart.find(item =>
        item.name === product.name &&
        (item.size || "") === (product.size || "")
    );

    if (existingProduct) {

        existingProduct.quantity =
            Number(existingProduct.quantity || 1) +
            Number(product.quantity || 1);

    } else {

        cart.push({
            name: product.name,
            price: Number(product.price),
            quantity: Number(product.quantity || 1),
            image: product.image || "",
            category: product.category || "",
            size: product.size || ""
        });

    }

    saveCart(cart);

    showCartMessage(
        `${product.name} added to cart`
    );
}


/* =========================================================
   ADD-CART BUTTONS
   ========================================================= */

document.querySelectorAll(".add-cart").forEach(button => {

    button.addEventListener("click", function(event) {

        event.preventDefault();

        event.stopPropagation();

        const product = {

            name: this.dataset.name,

            price: Number(
                this.dataset.price || 0
            ),

            image:
                this.dataset.image || "",

            category:
                this.dataset.category || "",

            quantity: 1

        };

        addToCart(product);

        this.classList.add("added");

        const originalText =
            this.textContent;

        this.textContent = "✓";

        setTimeout(() => {

            this.textContent =
                originalText;

            this.classList.remove("added");

        }, 900);

    });

});


/* =========================================================
   CART MESSAGE
   ========================================================= */

function showCartMessage(message) {

    let notification =
        document.getElementById("cartNotification");

    if (!notification) {

        notification =
            document.createElement("div");

        notification.id =
            "cartNotification";

        notification.style.position =
            "fixed";

        notification.style.right =
            "25px";

        notification.style.bottom =
            "25px";

        notification.style.zIndex =
            "99999";

        notification.style.padding =
            "14px 20px";

        notification.style.background =
            "#baff00";

        notification.style.color =
            "#050705";

        notification.style.borderRadius =
            "10px";

        notification.style.fontSize =
            "12px";

        notification.style.fontWeight =
            "900";

        notification.style.boxShadow =
            "0 15px 40px rgba(0,0,0,.35)";

        document.body.appendChild(
            notification
        );
    }

    notification.textContent =
        "✓ " + message;

    notification.style.opacity = "1";

    clearTimeout(
        window.cartNotificationTimer
    );

    window.cartNotificationTimer =
        setTimeout(() => {

            notification.style.opacity =
                "0";

        }, 1800);
}


/* =========================================================
   WISHLIST
   ========================================================= */

document
    .querySelectorAll(".wishlist-button")
    .forEach(button => {

        button.addEventListener(
            "click",
            function(event) {

                event.preventDefault();

                event.stopPropagation();

                this.classList.toggle(
                    "active"
                );

                this.textContent =
                    this.classList.contains(
                        "active"
                    )
                    ? "♥"
                    : "♡";

            }
        );

    });


/* =========================================================
   CATALOGUE FILTERING
   ========================================================= */

const filterButtons =
    document.querySelectorAll(
        ".filter-button"
    );

const catalogueProducts =
    document.querySelectorAll(
        ".catalogue-grid .product-card"
    );


filterButtons.forEach(button => {

    button.addEventListener(
        "click",
        function() {

            filterButtons.forEach(
                item =>
                    item.classList.remove(
                        "active"
                    )
            );

            this.classList.add("active");

            const filter =
                this.dataset.filter;

            catalogueProducts.forEach(
                product => {

                    const category =
                        product.dataset.category;

                    if (
                        filter === "all" ||
                        category === filter
                    ) {

                        product.style.display =
                            "";

                        setTimeout(() => {

                            product.style.opacity =
                                "1";

                            product.style.transform =
                                "translateY(0)";

                        }, 10);

                    } else {

                        product.style.opacity =
                            "0";

                        product.style.transform =
                            "translateY(15px)";

                        setTimeout(() => {

                            product.style.display =
                                "none";

                        }, 200);

                    }

                }
            );

        }
    );

});


/* =========================================================
   CATEGORY CARDS
   ========================================================= */

document
    .querySelectorAll(".category-card")
    .forEach(card => {

        card.addEventListener(
            "click",
            function() {

                const category =
                    this.dataset.category;

                if (!category) return;

                const filterButton =
                    document.querySelector(
                        `.filter-button[data-filter="${category}"]`
                    );

                if (filterButton) {

                    filterButton.click();

                }

            }
        );

    });


/* =========================================================
   SEARCH PANEL
   ========================================================= */

const searchPanel =
    document.getElementById(
        "searchPanel"
    );

const openSearch =
    document.getElementById(
        "openSearch"
    );

const closeSearch =
    document.getElementById(
        "closeSearch"
    );


if (openSearch && searchPanel) {

    openSearch.addEventListener(
        "click",
        () => {

            searchPanel.classList.add(
                "active"
            );

            const input =
                document.getElementById(
                    "productSearch"
                );

            if (input) {

                setTimeout(
                    () => input.focus(),
                    250
                );

            }

        }
    );

}


if (closeSearch && searchPanel) {

    closeSearch.addEventListener(
        "click",
        () => {

            searchPanel.classList.remove(
                "active"
            );

        }
    );

}


/* =========================================================
   PRODUCT SEARCH
   ========================================================= */

const searchInput =
    document.getElementById(
        "productSearch"
    );


if (searchInput) {

    searchInput.addEventListener(
        "input",
        function() {

            const query =
                this.value
                    .trim()
                    .toLowerCase();

            const products =
                document.querySelectorAll(
                    ".product-card"
                );

            products.forEach(product => {

                const name =
                    product
                        .querySelector(
                            ".product-name"
                        )
                        ?.textContent
                        .toLowerCase() || "";

                const category =
                    product
                        .querySelector(
                            ".product-category"
                        )
                        ?.textContent
                        .toLowerCase() || "";

                if (
                    !query ||
                    name.includes(query) ||
                    category.includes(query)
                ) {

                    product.style.display =
                        "";

                } else {

                    product.style.display =
                        "none";

                }

            });

        }
    );

}


/* =========================================================
   HERO MOUSE PARALLAX
   ========================================================= */

const hero =
    document.querySelector(".hero");

const heroImage =
    document.querySelector(
        ".hero-main-image"
    );


if (
    hero &&
    heroImage &&
    window.innerWidth > 760
) {

    hero.addEventListener(
        "mousemove",
        event => {

            const rect =
                hero.getBoundingClientRect();

            const x =
                (event.clientX -
                    rect.left) /
                rect.width -
                0.5;

            const y =
                (event.clientY -
                    rect.top) /
                rect.height -
                0.5;

            heroImage.style.transform =
                `translate(${x * 14}px, ${y * 10}px) scale(1.02)`;

        }
    );


    hero.addEventListener(
        "mouseleave",
        () => {

            heroImage.style.transform =
                "";

        }
    );

}


/* =========================================================
   PRODUCT 3D HOVER
   ========================================================= */

document
    .querySelectorAll(".product-card")
    .forEach(card => {

        card.addEventListener(
            "mousemove",
            event => {

                if (
                    window.innerWidth <= 760
                ) return;

                const rect =
                    card.getBoundingClientRect();

                const x =
                    event.clientX -
                    rect.left;

                const y =
                    event.clientY -
                    rect.top;

                const rotateY =
                    ((x / rect.width) -
                        0.5) * 5;

                const rotateX =
                    ((y / rect.height) -
                        0.5) * -5;

                card.style.transform =
                    `perspective(900px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-5px)`;

            }
        );


        card.addEventListener(
            "mouseleave",
            () => {

                card.style.transform =
                    "";

            }
        );

    });


/* =========================================================
   SCROLL REVEAL
   ========================================================= */

const revealElements =
    document.querySelectorAll(
        ".category-card, .product-card, .performance-item, .promo-box"
    );


if (
    "IntersectionObserver" in window
) {

    const observer =
        new IntersectionObserver(
            entries => {

                entries.forEach(entry => {

                    if (
                        entry.isIntersecting
                    ) {

                        entry.target.classList.add(
                            "visible"
                        );

                        observer.unobserve(
                            entry.target
                        );

                    }

                });

            },
            {
                threshold: 0.12
            }
        );


    revealElements.forEach(
        element =>
            observer.observe(element)
    );

}


/* =========================================================
   PRODUCT PAGE NAVIGATION
   ========================================================= */

document
    .querySelectorAll(".product-link")
    .forEach(card => {

        card.addEventListener(
            "click",
            event => {

                if (
                    event.target.closest(
                        ".add-cart"
                    ) ||
                    event.target.closest(
                        ".wishlist-button"
                    )
                ) {
                    return;
                }

                const productPage =
                    card.dataset.productPage;

                if (productPage) {

                    window.location.href =
                        productPage;

                }

            }
        );

    });


/* =========================================================
   SMOOTH INTERNAL LINKS
   ========================================================= */

document
    .querySelectorAll(
        'a[href^="#"]'
    )
    .forEach(link => {

        link.addEventListener(
            "click",
            function(event) {

                const targetID =
                    this.getAttribute("href");

                if (
                    targetID === "#" ||
                    !targetID
                ) {
                    return;
                }

                const target =
                    document.querySelector(
                        targetID
                    );

                if (target) {

                    event.preventDefault();

                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start"
                    });

                }

            }
        );

    });


/* =========================================================
   INITIALIZE
   ========================================================= */

updateCartCount();