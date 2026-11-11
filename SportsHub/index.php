<?php
/*
|--------------------------------------------------------------------------
| SPORTS HUB - MAIN STORE
|--------------------------------------------------------------------------
| Premier League focused sports catalogue
| Cart: localStorage -> sportsHubCart
|--------------------------------------------------------------------------
*/

$products = [

    // =========================================================
    // PREMIER LEAGUE JERSEYS
    // =========================================================

    [
        "id" => 21,
        "name" => "Arsenal Home Club Jersey",
        "category" => "Premier League",
        "type" => "Jerseys",
        "club" => "Arsenal",
        "price" => 2800,
        "oldPrice" => 3500,
        "image" => "arsenal-home.png",
        "badge" => "Popular",
        "description" => "Arsenal-inspired home club jersey for supporters, football sessions and casual wear.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "Red / White", "image" => "arsenal-home.png"],
            ["name" => "Black", "image" => "arsenal-black.png"]
        ]
    ],

    [
        "id" => 22,
        "name" => "Arsenal Away Club Jersey",
        "category" => "Premier League",
        "type" => "Jerseys",
        "club" => "Arsenal",
        "price" => 2800,
        "oldPrice" => 3500,
        "image" => "arsenal-away.png",
        "badge" => "New",
        "description" => "Arsenal-inspired away club jersey with a modern supporter design.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "White / Red", "image" => "arsenal-away.png"],
            ["name" => "Black", "image" => "arsenal-black.png"]
        ]
    ],

    [
        "id" => 23,
        "name" => "Manchester United Home Club Jersey",
        "category" => "Premier League",
        "type" => "Jerseys",
        "club" => "Manchester United",
        "price" => 2800,
        "oldPrice" => 3500,
        "image" => "man-united-home.png",
        "badge" => "Popular",
        "description" => "Manchester United-inspired home club jersey for supporters and football fans.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "Red", "image" => "man-united-home.png"],
            ["name" => "Black", "image" => "man-united-black.png"]
        ]
    ],

    [
        "id" => 24,
        "name" => "Manchester United Away Club Jersey",
        "category" => "Premier League",
        "type" => "Jerseys",
        "club" => "Manchester United",
        "price" => 2800,
        "oldPrice" => 3500,
        "image" => "man-united-away.png",
        "badge" => "",
        "description" => "Manchester United-inspired away club jersey with a clean supporter look.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "White", "image" => "man-united-away.png"],
            ["name" => "Black", "image" => "man-united-black.png"]
        ]
    ],

    [
        "id" => 25,
        "name" => "Manchester City Home Club Jersey",
        "category" => "Premier League",
        "type" => "Jerseys",
        "club" => "Manchester City",
        "price" => 2800,
        "oldPrice" => 3500,
        "image" => "man-city-home.png",
        "badge" => "Popular",
        "description" => "Manchester City-inspired home club jersey for supporters and football activities.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "Sky Blue", "image" => "man-city-home.png"],
            ["name" => "Black", "image" => "man-city-black.png"]
        ]
    ],

    [
        "id" => 26,
        "name" => "Liverpool Home Club Jersey",
        "category" => "Premier League",
        "type" => "Jerseys",
        "club" => "Liverpool",
        "price" => 2800,
        "oldPrice" => 3500,
        "image" => "liverpool-home.png",
        "badge" => "Best Seller",
        "description" => "Liverpool-inspired home club jersey for supporters and football fans.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "Red", "image" => "liverpool-home.png"],
            ["name" => "Black", "image" => "liverpool-black.png"]
        ]
    ],

    [
        "id" => 27,
        "name" => "Liverpool Away Club Jersey",
        "category" => "Premier League",
        "type" => "Jerseys",
        "club" => "Liverpool",
        "price" => 2800,
        "oldPrice" => 3500,
        "image" => "liverpool-away.png",
        "badge" => "New",
        "description" => "Liverpool-inspired away club jersey with a modern supporter design.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "White", "image" => "liverpool-away.png"],
            ["name" => "Black", "image" => "liverpool-black.png"]
        ]
    ],

    [
        "id" => 28,
        "name" => "Chelsea Home Club Jersey",
        "category" => "Premier League",
        "type" => "Jerseys",
        "club" => "Chelsea",
        "price" => 2800,
        "oldPrice" => 3500,
        "image" => "chelsea-home.png",
        "badge" => "Popular",
        "description" => "Chelsea-inspired home club jersey for supporters and football activities.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "Blue", "image" => "chelsea-home.png"],
            ["name" => "Black", "image" => "chelsea-black.png"]
        ]
    ],

    [
        "id" => 29,
        "name" => "Tottenham Home Club Jersey",
        "category" => "Premier League",
        "type" => "Jerseys",
        "club" => "Tottenham",
        "price" => 2800,
        "oldPrice" => 3500,
        "image" => "tottenham-home.png",
        "badge" => "",
        "description" => "Tottenham-inspired home club jersey for supporters and football fans.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "White", "image" => "tottenham-home.png"],
            ["name" => "Navy", "image" => "tottenham-navy.png"]
        ]
    ],

    [
        "id" => 30,
        "name" => "Newcastle Home Club Jersey",
        "category" => "Premier League",
        "type" => "Jerseys",
        "club" => "Newcastle United",
        "price" => 2800,
        "oldPrice" => 3500,
        "image" => "newcastle-home.png",
        "badge" => "New",
        "description" => "Newcastle-inspired home club jersey with the classic black and white look.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "Black / White", "image" => "newcastle-home.png"],
            ["name" => "Black", "image" => "newcastle-black.png"]
        ]
    ],

    [
        "id" => 31,
        "name" => "Aston Villa Home Club Jersey",
        "category" => "Premier League",
        "type" => "Jerseys",
        "club" => "Aston Villa",
        "price" => 2800,
        "oldPrice" => 3500,
        "image" => "aston-villa-home.png",
        "badge" => "",
        "description" => "Aston Villa-inspired home club jersey for supporters and football fans.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "Claret / Blue", "image" => "aston-villa-home.png"],
            ["name" => "Black", "image" => "aston-villa-black.png"]
        ]
    ],

    [
        "id" => 32,
        "name" => "West Ham Home Club Jersey",
        "category" => "Premier League",
        "type" => "Jerseys",
        "club" => "West Ham United",
        "price" => 2800,
        "oldPrice" => 3500,
        "image" => "west-ham-home.png",
        "badge" => "",
        "description" => "West Ham-inspired home club jersey for supporters and football fans.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "Claret / Blue", "image" => "west-ham-home.png"],
            ["name" => "Black", "image" => "west-ham-black.png"]
        ]
    ],


    // =========================================================
    // SPORTSWEAR
    // =========================================================

    [
        "id" => 1,
        "name" => "Performance Jersey",
        "category" => "Sportswear",
        "type" => "Jerseys",
        "price" => 1800,
        "oldPrice" => 2200,
        "image" => "jersey.png",
        "badge" => "Popular",
        "description" => "Lightweight performance jersey designed for football, training and competitive play.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "Black", "image" => "jersey.png"],
            ["name" => "Red", "image" => "jersey.png"],
            ["name" => "Blue", "image" => "jersey.png"]
        ]
    ],

    [
        "id" => 2,
        "name" => "Training Shorts",
        "category" => "Sportswear",
        "type" => "Shorts",
        "price" => 1200,
        "oldPrice" => 1500,
        "image" => "training-shorts.png",
        "badge" => "Sale",
        "description" => "Comfortable training shorts suitable for football, gym sessions and everyday workouts.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "Black", "image" => "training-shorts.png"],
            ["name" => "Blue", "image" => "training-shorts.png"],
            ["name" => "Red", "image" => "training-shorts.png"]
        ]
    ],

    [
        "id" => 3,
        "name" => "Elite Training T-Shirt",
        "category" => "Sportswear",
        "type" => "T-Shirts",
        "price" => 1500,
        "oldPrice" => 1800,
        "image" => "jersey.png",
        "badge" => "New",
        "description" => "Breathable athletic T-shirt built for training, running and active lifestyles.",
        "sizes" => ["S", "M", "L", "XL"],
        "colors" => [
            ["name" => "Black", "image" => "jersey.png"],
            ["name" => "White", "image" => "jersey.png"],
            ["name" => "Green", "image" => "jersey.png"]
        ]
    ],

    [
        "id" => 4,
        "name" => "Pro Training Tracksuit",
        "category" => "Sportswear",
        "type" => "Tracksuits",
        "price" => 4200,
        "oldPrice" => 4800,
        "image" => "hero-sports.png",
        "badge" => "Premium",
        "description" => "Complete training tracksuit for warm-ups, travel and outdoor sports activities.",
        "sizes" => ["S", "M", "L", "XL", "XXL"],
        "colors" => [
            ["name" => "Black", "image" => "hero-sports.png"],
            ["name" => "Blue", "image" => "hero-sports.png"]
        ]
    ],

    [
        "id" => 5,
        "name" => "Performance Sports Socks",
        "category" => "Sportswear",
        "type" => "Socks",
        "price" => 600,
        "oldPrice" => 800,
        "image" => "training-shorts.png",
        "badge" => "",
        "description" => "Comfortable sports socks designed for training and match-day performance.",
        "sizes" => ["M", "L", "XL"],
        "colors" => [
            ["name" => "Black", "image" => "training-shorts.png"],
            ["name" => "White", "image" => "training-shorts.png"]
        ]
    ],


    // =========================================================
    // FOOTWEAR
    // =========================================================

    [
        "id" => 6,
        "name" => "Pro Football Boots",
        "category" => "Footwear",
        "type" => "Football Boots",
        "price" => 4800,
        "oldPrice" => 5500,
        "image" => "football-boots.png",
        "badge" => "Best Seller",
        "description" => "Football boots designed for grip, acceleration and confident movement on the pitch.",
        "sizes" => ["39", "40", "41", "42", "43", "44", "45"],
        "colors" => [
            ["name" => "Black / Gold", "image" => "football-boots.png"],
            ["name" => "Blue / White", "image" => "football-boots.png"],
            ["name" => "Red / Black", "image" => "football-boots.png"]
        ]
    ],

    [
        "id" => 7,
        "name" => "Speed Running Shoes",
        "category" => "Footwear",
        "type" => "Running Shoes",
        "price" => 5200,
        "oldPrice" => 6000,
        "image" => "football-boots.png",
        "badge" => "New",
        "description" => "Lightweight running shoes for road running, fitness and daily training.",
        "sizes" => ["39", "40", "41", "42", "43", "44"],
        "colors" => [
            ["name" => "Black", "image" => "football-boots.png"],
            ["name" => "White", "image" => "football-boots.png"],
            ["name" => "Blue", "image" => "football-boots.png"]
        ]
    ],

    [
        "id" => 8,
        "name" => "Court Basketball Shoes",
        "category" => "Footwear",
        "type" => "Basketball Shoes",
        "price" => 6500,
        "oldPrice" => 7200,
        "image" => "football-boots.png",
        "badge" => "Premium",
        "description" => "Supportive court shoes designed for basketball movement, jumping and quick changes of direction.",
        "sizes" => ["40", "41", "42", "43", "44", "45"],
        "colors" => [
            ["name" => "Black", "image" => "football-boots.png"],
            ["name" => "White", "image" => "football-boots.png"]
        ]
    ],

    [
        "id" => 9,
        "name" => "Training Sneakers",
        "category" => "Footwear",
        "type" => "Training Shoes",
        "price" => 3900,
        "oldPrice" => 4500,
        "image" => "football-boots.png",
        "badge" => "",
        "description" => "Versatile training sneakers suitable for gym sessions, fitness and everyday activities.",
        "sizes" => ["39", "40", "41", "42", "43", "44"],
        "colors" => [
            ["name" => "Black", "image" => "football-boots.png"],
            ["name" => "Grey", "image" => "football-boots.png"]
        ]
    ],


    // =========================================================
    // EQUIPMENT
    // =========================================================

    [
        "id" => 10,
        "name" => "Match Football",
        "category" => "Equipment",
        "type" => "Football",
        "price" => 2500,
        "oldPrice" => 3000,
        "image" => "football.png",
        "badge" => "Popular",
        "description" => "Durable match football suitable for training sessions, recreational games and competitive play.",
        "sizes" => ["Size 5"],
        "colors" => [
            ["name" => "White / Black", "image" => "football.png"],
            ["name" => "Blue / White", "image" => "football.png"]
        ]
    ],

    [
        "id" => 11,
        "name" => "Training Basketball",
        "category" => "Equipment",
        "type" => "Basketball",
        "price" => 2800,
        "oldPrice" => 3200,
        "image" => "football.png",
        "badge" => "",
        "description" => "Reliable basketball for training, school sports and recreational games.",
        "sizes" => ["Size 7"],
        "colors" => [
            ["name" => "Orange", "image" => "football.png"],
            ["name" => "Black", "image" => "football.png"]
        ]
    ],

    [
        "id" => 12,
        "name" => "Professional Volleyball",
        "category" => "Equipment",
        "type" => "Volleyball",
        "price" => 2600,
        "oldPrice" => 3000,
        "image" => "football.png",
        "badge" => "New",
        "description" => "Quality volleyball designed for training, school competitions and recreational play.",
        "sizes" => ["Official"],
        "colors" => [
            ["name" => "White", "image" => "football.png"],
            ["name" => "Blue / White", "image" => "football.png"]
        ]
    ],

    [
        "id" => 13,
        "name" => "Goalkeeper Gloves",
        "category" => "Equipment",
        "type" => "Goalkeeper Gear",
        "price" => 2200,
        "oldPrice" => 2600,
        "image" => "training-bag.png",
        "badge" => "Popular",
        "description" => "Goalkeeper gloves designed for comfortable handling and training sessions.",
        "sizes" => ["7", "8", "9", "10", "11"],
        "colors" => [
            ["name" => "Black / Green", "image" => "training-bag.png"],
            ["name" => "Black / Red", "image" => "training-bag.png"]
        ]
    ],

    [
        "id" => 14,
        "name" => "Speed Training Cones",
        "category" => "Equipment",
        "type" => "Training Equipment",
        "price" => 1200,
        "oldPrice" => 1500,
        "image" => "training-bag.png",
        "badge" => "",
        "description" => "Training cones for agility drills, speed exercises and football training.",
        "sizes" => ["Set of 10"]
    ],

    [
        "id" => 15,
        "name" => "Skipping Rope",
        "category" => "Equipment",
        "type" => "Fitness Equipment",
        "price" => 800,
        "oldPrice" => 1000,
        "image" => "training-bag.png",
        "badge" => "Sale",
        "description" => "Adjustable skipping rope suitable for cardio, fitness and warm-up exercises.",
        "sizes" => ["One Size"]
    ],

    [
        "id" => 16,
        "name" => "Resistance Bands Set",
        "category" => "Equipment",
        "type" => "Fitness Equipment",
        "price" => 1800,
        "oldPrice" => 2200,
        "image" => "training-bag.png",
        "badge" => "New",
        "description" => "Resistance band set for strength training, mobility and home workouts.",
        "sizes" => ["5 Piece Set"]
    ],


    // =========================================================
    // ACCESSORIES
    // =========================================================

    [
        "id" => 17,
        "name" => "Sports Performance Cap",
        "category" => "Accessories",
        "type" => "Caps",
        "price" => 900,
        "oldPrice" => 1200,
        "image" => "sports-cap.png",
        "badge" => "Popular",
        "description" => "Lightweight sports cap suitable for outdoor training, running and casual wear.",
        "sizes" => ["Adjustable"],
        "colors" => [
            ["name" => "Black", "image" => "sports-cap.png"],
            ["name" => "White", "image" => "sports-cap.png"],
            ["name" => "Blue", "image" => "sports-cap.png"]
        ]
    ],

    [
        "id" => 18,
        "name" => "Sports Training Bag",
        "category" => "Accessories",
        "type" => "Sports Bags",
        "price" => 2800,
        "oldPrice" => 3300,
        "image" => "training-bag.png",
        "badge" => "Best Seller",
        "description" => "Spacious sports bag for carrying shoes, clothing, equipment and personal items.",
        "sizes" => ["Medium"],
        "colors" => [
            ["name" => "Black", "image" => "training-bag.png"],
            ["name" => "Blue", "image" => "training-bag.png"],
            ["name" => "Red", "image" => "training-bag.png"]
        ]
    ],

    [
        "id" => 19,
        "name" => "Athletic Water Bottle",
        "category" => "Accessories",
        "type" => "Bottles",
        "price" => 700,
        "oldPrice" => 900,
        "image" => "sports-cap.png",
        "badge" => "",
        "description" => "Reusable sports bottle for hydration during training and outdoor activities.",
        "sizes" => ["750ml"],
        "colors" => [
            ["name" => "Black", "image" => "sports-cap.png"],
            ["name" => "Blue", "image" => "sports-cap.png"]
        ]
    ],

    [
        "id" => 20,
        "name" => "Training Wristbands",
        "category" => "Accessories",
        "type" => "Sports Accessories",
        "price" => 500,
        "oldPrice" => 700,
        "image" => "sports-cap.png",
        "badge" => "",
        "description" => "Comfortable wristbands suitable for training, running and competitive sports.",
        "sizes" => ["One Size"],
        "colors" => [
            ["name" => "Black", "image" => "sports-cap.png"],
            ["name" => "White", "image" => "sports-cap.png"]
        ]
    ]
];

$totalProducts = count($products);
?>

<!DOCTYPE html>

<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sports Hub | Premier League Jerseys & Sports Gear</title>

<meta name="description"
   content="Sports Hub - Premier League club jerseys, sportswear, footwear, equipment and accessories.">

<style>

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

:root {
    --dark: #070707;
    --card: #151515;
    --card-2: #1c1c1c;
    --text: #ffffff;
    --muted: #a7a7a7;
    --lime: #c8ff00;
    --border: rgba(255,255,255,.10);
}

html {
    scroll-behavior: smooth;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background: var(--dark);
    color: var(--text);
    line-height: 1.5;
}

a {
    color: inherit;
    text-decoration: none;
}

button,
input,
select {
    font: inherit;
}

button {
    cursor: pointer;
}

/* NAV */

.main-nav {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: rgba(7,7,7,.96);
    border-bottom: 1px solid var(--border);
    backdrop-filter: blur(14px);
}

.nav-inner {
    width: min(1200px,92%);
    margin: auto;
    min-height: 76px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
}

.brand {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 900;
    letter-spacing: 1px;
    white-space: nowrap;
}

.brand-mark {
    width: 38px;
    height: 38px;
    display: grid;
    place-items: center;
    border-radius: 10px;
    background: var(--lime);
    color: #000;
    font-size: 20px;
    font-weight: 900;
}

.nav-menu {
    display: flex;
    gap: 22px;
}

.nav-menu a {
    color: #ddd;
    font-size: 14px;
    font-weight: 700;
    transition: .25s;
}

.nav-menu a:hover {
    color: var(--lime);
}

.cart-nav {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border: 1px solid var(--border);
    border-radius: 12px;
    font-size: 20px;
}

.cart-count {
    position: absolute;
    top: -7px;
    right: -7px;
    min-width: 21px;
    height: 21px;
    padding: 0 5px;
    border-radius: 50px;
    background: var(--lime);
    color: #000;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 900;
}

/* HERO */

.hero {
    min-height: 620px;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;

    background:
        linear-gradient(
            90deg,
            rgba(0,0,0,.96),
            rgba(0,0,0,.78) 48%,
            rgba(0,0,0,.25)
        ),
        url("hero-sports.png") center/cover no-repeat;
}

.hero-content {
    position: relative;
    z-index: 2;
    width: min(1200px,92%);
    margin: auto;
}

.hero-kicker,
.section-kicker {
    color: var(--lime);
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: 12px;
    font-weight: 900;
}

.hero-kicker {
    margin-bottom: 18px;
}

.hero h1 {
    max-width: 760px;
    font-size: clamp(45px,7vw,82px);
    line-height: .98;
    letter-spacing: -3px;
    margin-bottom: 25px;
}

.hero h1 span {
    color: var(--lime);
}

.hero p {
    max-width: 610px;
    color: #d0d0d0;
    font-size: 18px;
    margin-bottom: 30px;
}

.hero-buttons {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
}

.primary-btn,
.secondary-btn {
    display: inline-block;
    border-radius: 10px;
    padding: 14px 23px;
    font-weight: 900;
    border: 1px solid transparent;
    transition: .25s;
}

.primary-btn {
    background: var(--lime);
    color: #000;
}

.secondary-btn {
    border-color: var(--border);
    background: rgba(255,255,255,.05);
}

/* FEATURES */

.feature-strip {
    background: var(--card);
    border-top: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
}

.features {
    width: min(1200px,92%);
    margin: auto;
    display: grid;
    grid-template-columns: repeat(4,1fr);
}

.feature {
    padding: 25px 20px;
    border-right: 1px solid var(--border);
}

.feature:last-child {
    border-right: none;
}

.feature-icon {
    font-size: 24px;
    margin-bottom: 7px;
}

.feature strong {
    display: block;
}

.feature span {
    color: var(--muted);
    font-size: 13px;
}

/* CATALOGUE */

.catalogue {
    width: min(1200px,92%);
    margin: auto;
    padding: 90px 0;
}

.section-heading {
    display: flex;
    justify-content: space-between;
    align-items: end;
    gap: 30px;
    margin-bottom: 35px;
}

.section-heading h2 {
    font-size: clamp(32px,5vw,48px);
    line-height: 1;
    margin-top: 8px;
}

.section-heading p {
    color: var(--muted);
    max-width: 430px;
}

/* EPL FEATURE */

.epl-feature {
    margin-bottom: 35px;
    padding: 30px;
    border: 1px solid rgba(200,255,0,.25);
    border-radius: 18px;
    background:
        linear-gradient(
            120deg,
            rgba(200,255,0,.12),
            rgba(255,255,255,.025)
        );
}

.epl-feature h3 {
    font-size: 28px;
    margin: 5px 0;
}

.epl-feature p {
    color: var(--muted);
}

/* TOOLS */

.catalogue-tools {
    display: grid;
    grid-template-columns: 1fr auto auto;
    gap: 12px;
    margin-bottom: 20px;
}

.search-box input,
.filter-select {
    width: 100%;
    height: 50px;
    border-radius: 10px;
    border: 1px solid var(--border);
    background: var(--card);
    color: white;
    padding: 0 15px;
    outline: none;
}

.filter-select {
    min-width: 170px;
}

/* CATEGORY */

.category-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 9px;
    margin-bottom: 35px;
}

.category-btn {
    border: 1px solid var(--border);
    background: var(--card);
    color: #ddd;
    padding: 10px 17px;
    border-radius: 50px;
    font-weight: 800;
    font-size: 13px;
    transition: .25s;
}

.category-btn:hover,
.category-btn.active {
    background: var(--lime);
    color: #000;
    border-color: var(--lime);
}

/* PRODUCTS */

.product-grid {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 20px;
}

.product-card {
    position: relative;
    overflow: hidden;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    transition: .35s;
    animation: productIn .6s ease both;
}

.product-card:hover {
    transform: translateY(-8px);
    border-color: rgba(200,255,0,.35);
    box-shadow: 0 20px 45px rgba(0,0,0,.28);
}

@keyframes productIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.product-image {
    height: 245px;
    position: relative;
    overflow: hidden;
    background: #111;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .55s ease, filter .55s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.08);
    filter: brightness(1.08);
}

.product-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 6px 10px;
    border-radius: 50px;
    background: var(--lime);
    color: #000;
    font-size: 10px;
    font-weight: 900;
    text-transform: uppercase;
}

.wishlist-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 38px;
    height: 38px;
    border: 1px solid rgba(255,255,255,.15);
    border-radius: 50%;
    background: rgba(0,0,0,.65);
    color: white;
    font-size: 18px;
}

.wishlist-btn.saved {
    background: var(--lime);
    color: #000;
}

.product-info {
    padding: 18px;
}

.product-category {
    color: var(--lime);
    font-size: 11px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.product-club {
    color: #888;
    font-size: 11px;
    margin-top: 3px;
}

.product-name {
    font-size: 17px;
    margin: 5px 0 7px;
}

.product-description {
    color: var(--muted);
    font-size: 12px;
    min-height: 38px;
}

.product-price-row {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-top: 15px;
}

.product-price {
    font-size: 19px;
    font-weight: 900;
}

.old-price {
    color: #777;
    text-decoration: line-through;
    font-size: 12px;
}

.product-actions {
    display: grid;
    grid-template-columns: 1fr;
    gap: 8px;
    margin-top: 15px;
}

.add-btn,
.details-btn {
    width: 100%;
    min-height: 43px;
    border-radius: 9px;
    border: 1px solid var(--border);
    font-weight: 900;
    font-size: 13px;
}

.add-btn {
    background: var(--lime);
    color: #000;
    border-color: var(--lime);
}

.details-btn {
    background: transparent;
    color: white;
}

/* MODAL */

.modal {
    position: fixed;
    inset: 0;
    z-index: 3000;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgba(0,0,0,.82);
    backdrop-filter: blur(10px);
}

.modal.show {
    display: flex;
}

.modal-card {
    width: min(800px,100%);
    max-height: 90vh;
    overflow-y: auto;
    background: #121212;
    border: 1px solid var(--border);
    border-radius: 18px;
    position: relative;
}

.modal-close {
    position: absolute;
    right: 15px;
    top: 15px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 1px solid var(--border);
    background: #000;
    color: white;
    font-size: 20px;
    z-index: 3;
}

.modal-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
}

.modal-image {
    min-height: 420px;
    background: #0d0d0d;
}

.modal-image img {
    width: 100%;
    height: 100%;
    min-height: 420px;
    object-fit: cover;
}

.modal-details {
    padding: 40px 30px;
}

.modal-details h2 {
    font-size: 30px;
    margin: 7px 0 12px;
}

.modal-details p {
    color: var(--muted);
    font-size: 14px;
    margin-bottom: 20px;
}

.modal-price {
    font-size: 25px;
    font-weight: 900;
    margin-bottom: 20px;
}

.select-label {
    display: block;
    margin: 15px 0 8px;
    font-weight: 800;
    font-size: 13px;
}

.size-select {
    width: 100%;
    height: 46px;
    background: #0b0b0b;
    color: white;
    border: 1px solid var(--border);
    border-radius: 9px;
    padding: 0 12px;
}

.color-options {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.color-btn {
    border: 1px solid var(--border);
    background: #0b0b0b;
    color: white;
    border-radius: 8px;
    padding: 9px 12px;
    font-size: 12px;
    font-weight: 800;
}

.color-btn.active,
.color-btn:hover {
    border-color: var(--lime);
    color: var(--lime);
}

.modal-add {
    width: 100%;
    min-height: 48px;
    margin-top: 20px;
    border: none;
    border-radius: 9px;
    background: var(--lime);
    color: #000;
    font-weight: 900;
}

/* DEAL */

.deal-banner {
    width: min(1200px,92%);
    margin: 0 auto 80px;
    padding: 45px;
    border-radius: 20px;
    border: 1px solid rgba(200,255,0,.22);
    background: linear-gradient(
        120deg,
        rgba(200,255,0,.13),
        rgba(255,255,255,.03)
    );
}

.deal-banner h2 {
    font-size: clamp(28px,4vw,45px);
    margin: 8px 0;
}

.deal-banner p {
    color: #bbb;
    margin-bottom: 20px;
}

/* FOOTER */

footer {
    border-top: 1px solid var(--border);
    background: #050505;
}

.footer-inner {
    width: min(1200px,92%);
    margin: auto;
    padding: 55px 0 30px;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr;
    gap: 40px;
}

.footer-brand p {
    color: var(--muted);
    max-width: 350px;
    margin-top: 15px;
    font-size: 13px;
}

footer h4 {
    margin-bottom: 15px;
}

footer a {
    display: block;
    color: var(--muted);
    font-size: 13px;
    margin-bottom: 9px;
}

/* TOAST */

.toast {
    position: fixed;
    right: 20px;
    bottom: 20px;
    z-index: 5000;
    max-width: 330px;
    padding: 14px 18px;
    border-radius: 10px;
    background: var(--lime);
    color: #000;
    font-size: 13px;
    font-weight: 900;
    transform: translateY(130px);
    opacity: 0;
    transition: .3s;
}

.toast.show {
    transform: translateY(0);
    opacity: 1;
}

/* RESPONSIVE */

@media (max-width:1050px) {
    .product-grid {
        grid-template-columns: repeat(3,1fr);
    }
}

@media (max-width:800px) {

    .nav-menu {
        display: none;
    }

    .features {
        grid-template-columns: repeat(2,1fr);
    }

    .catalogue-tools {
        grid-template-columns: 1fr;
    }

    .product-grid {
        grid-template-columns: repeat(2,1fr);
    }

    .modal-content {
        grid-template-columns: 1fr;
    }

    .modal-image {
        min-height: 280px;
        max-height: 300px;
    }

    .modal-image img {
        min-height: 280px;
        max-height: 300px;
    }

    .footer-inner {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width:550px) {

    .hero {
        min-height: 560px;
    }

    .hero h1 {
        letter-spacing: -2px;
    }

    .hero p {
        font-size: 15px;
    }

    .features,
    .product-grid,
    .footer-inner {
        grid-template-columns: 1fr;
    }

    .feature {
        border-right: none;
        border-bottom: 1px solid var(--border);
    }

    .product-image {
        height: 280px;
    }

    .section-heading {
        display: block;
    }

    .section-heading p {
        margin-top: 12px;
    }

    .deal-banner {
        padding: 28px 22px;
    }
}

</style>

</head>

<body>

<!-- NAVIGATION -->

<header class="main-nav">

```
<div class="nav-inner">

    <a href="index.php" class="brand">
        <span class="brand-mark">S</span>
        <span>SPORTS HUB</span>
    </a>

    <nav class="nav-menu">
        <a href="#home">Home</a>
        <a href="#catalogue">Premier League</a>
        <a href="#catalogue">Sportswear</a>
        <a href="#catalogue">Footwear</a>
        <a href="#catalogue">Equipment</a>
        <a href="#deals">Deals</a>
    </nav>

    <a href="cart.php" class="cart-nav" aria-label="Shopping cart">
        🛒
        <span id="navCartCount" class="cart-count">0</span>
    </a>

</div>
```

</header>

<!-- HERO -->

<section class="hero" id="home">

```
<div class="hero-content">

    <div class="hero-kicker">
        Sports Hub Football Collection
    </div>

    <h1>
        Your Club.
        <span>Your Colours.</span>
    </h1>

    <p>
        Explore Premier League club jerseys, football boots,
        sportswear and equipment built for supporters,
        training and match-day energy.
    </p>

    <div class="hero-buttons">

        <a href="#premier-league" class="primary-btn">
            Shop Club Jerseys →
        </a>

        <a href="#catalogue" class="secondary-btn">
            View All Gear
        </a>

    </div>

</div>
```

</section>

<!-- FEATURES -->

<section class="feature-strip">

```
<div class="features">

    <div class="feature">
        <div class="feature-icon">⚽</div>
        <strong>Club Jerseys</strong>
        <span>Premier League-inspired supporter designs.</span>
    </div>

    <div class="feature">
        <div class="feature-icon">🚚</div>
        <strong>Fast Delivery</strong>
        <span>Standard delivery available across Kenya.</span>
    </div>

    <div class="feature">
        <div class="feature-icon">🛒</div>
        <strong>Easy Shopping</strong>
        <span>Select colour, size and add to cart.</span>
    </div>

    <div class="feature">
        <div class="feature-icon">🔒</div>
        <strong>M-Pesa Checkout</strong>
        <span>Real M-Pesa payment at checkout.</span>
    </div>

</div>
```

</section>

<!-- CATALOGUE -->

<main class="catalogue" id="catalogue">

```
<div class="section-heading">

    <div>
        <div class="section-kicker">
            Sports Hub Collection
        </div>

        <h2>
            Shop The Gear
        </h2>
    </div>

    <p>
        From Premier League jerseys to football boots,
        training gear and sports equipment.
    </p>

</div>


<!-- PREMIER LEAGUE FEATURE -->

<section class="epl-feature" id="premier-league">

    <div class="section-kicker">
        Premier League
    </div>

    <h3>
        Represent Your Club
    </h3>

    <p>
        Choose your club, colour and size before adding
        your jersey to the shopping cart.
    </p>

</section>


<!-- SEARCH -->

<div class="catalogue-tools">

    <div class="search-box">
        <input
            type="search"
            id="productSearch"
            placeholder="Search Arsenal, Liverpool, boots, footballs..."
            autocomplete="off"
        >
    </div>

    <select id="categoryFilter" class="filter-select">

        <option value="All">All Categories</option>
        <option value="Premier League">Premier League</option>
        <option value="Sportswear">Sportswear</option>
        <option value="Footwear">Footwear</option>
        <option value="Equipment">Equipment</option>
        <option value="Accessories">Accessories</option>

    </select>

    <select id="sortFilter" class="filter-select">

        <option value="featured">Featured</option>
        <option value="low">Price: Low to High</option>
        <option value="high">Price: High to Low</option>
        <option value="name">Name A-Z</option>

    </select>

</div>


<!-- CATEGORY BUTTONS -->

<div class="category-buttons">

    <button class="category-btn active" data-category="All">
        All Products
    </button>

    <button class="category-btn" data-category="Premier League">
        ⚽ Premier League
    </button>

    <button class="category-btn" data-category="Sportswear">
        👕 Sportswear
    </button>

    <button class="category-btn" data-category="Footwear">
        👟 Footwear
    </button>

    <button class="category-btn" data-category="Equipment">
        🏋️ Equipment
    </button>

    <button class="category-btn" data-category="Accessories">
        🎒 Accessories
    </button>

</div>


<!-- PRODUCT GRID -->

<div class="product-grid" id="productGrid">

    <?php foreach ($products as $product): ?>

        <article
            class="product-card"
            data-id="<?php echo $product["id"]; ?>"
            data-category="<?php echo htmlspecialchars($product["category"]); ?>"
            data-name="<?php echo htmlspecialchars(strtolower($product["name"] . " " . ($product["club"] ?? ""))); ?>"
            data-price="<?php echo $product["price"]; ?>"
        >

            <div class="product-image">

                <img
                    src="<?php echo htmlspecialchars($product["image"]); ?>"
                    alt="<?php echo htmlspecialchars($product["name"]); ?>"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='jersey.png';"
                >

                <?php if (!empty($product["badge"])): ?>

                    <span class="product-badge">
                        <?php echo htmlspecialchars($product["badge"]); ?>
                    </span>

                <?php endif; ?>

                <button
                    type="button"
                    class="wishlist-btn"
                    onclick="toggleWishlist(<?php echo $product["id"]; ?>,this)"
                    aria-label="Add to wishlist"
                >
                    ♡
                </button>

            </div>

            <div class="product-info">

                <div class="product-category">
                    <?php echo htmlspecialchars($product["category"]); ?>
                </div>

                <?php if (!empty($product["club"])): ?>

                    <div class="product-club">
                        <?php echo htmlspecialchars($product["club"]); ?>
                    </div>

                <?php endif; ?>

                <h3 class="product-name">
                    <?php echo htmlspecialchars($product["name"]); ?>
                </h3>

                <p class="product-description">
                    <?php echo htmlspecialchars($product["description"]); ?>
                </p>

                <div class="product-price-row">

                    <span class="product-price">
                        KSh <?php echo number_format($product["price"]); ?>
                    </span>

                    <?php if ($product["oldPrice"] > $product["price"]): ?>

                        <span class="old-price">
                            KSh <?php echo number_format($product["oldPrice"]); ?>
                        </span>

                    <?php endif; ?>

                </div>

                <div class="product-actions">

                    <button
                        type="button"
                        class="add-btn"
                        onclick="openProduct(<?php echo $product["id"]; ?>)"
                    >
                        Choose Options
                    </button>

                    <button
                        type="button"
                        class="details-btn"
                        onclick="openProduct(<?php echo $product["id"]; ?>)"
                    >
                        View Details
                    </button>

                </div>

            </div>

        </article>

    <?php endforeach; ?>

</div>

<div class="no-results" id="noResults">
    <h3>No products found</h3>
    <p>Try another search or category.</p>
</div>
```

</main>

<!-- DEALS -->

<section class="deal-banner" id="deals">

```
<div class="section-kicker">
    Sports Hub Deals
</div>

<h2>
    More Gear. Better Value.
</h2>

<p>
    Orders of KSh 5,000 or more qualify for free standard delivery.
</p>

<a href="#catalogue" class="primary-btn">
    Shop Deals →
</a>
```

</section>

<!-- PRODUCT MODAL -->

<div class="modal" id="productModal">

```
<div class="modal-card">

    <button
        type="button"
        class="modal-close"
        onclick="closeProduct()"
        aria-label="Close"
    >
        ×
    </button>

    <div id="modalContent" class="modal-content"></div>

</div>
```

</div>

<!-- FOOTER -->

<footer>

```
<div class="footer-inner">

    <div class="footer-brand">

        <a href="index.php" class="brand">
            <span class="brand-mark">S</span>
            <span>SPORTS HUB</span>
        </a>

        <p>
            Your destination for Premier League-inspired
            club jerseys, sportswear, footwear, equipment
            and accessories.
        </p>

    </div>

    <div>
        <h4>Shop</h4>
        <a href="#premier-league">Premier League</a>
        <a href="#catalogue">Sportswear</a>
        <a href="#catalogue">Footwear</a>
        <a href="#catalogue">Equipment</a>
    </div>

    <div>
        <h4>Customer</h4>
        <a href="cart.php">Shopping Cart</a>
        <a href="checkout.php">Checkout</a>
        <a href="#deals">Deals</a>
    </div>

    <div>
        <h4>Sports Hub</h4>
        <a href="#home">About</a>
        <a href="#catalogue">Products</a>
        <a href="#home">Contact</a>
    </div>

</div>

<div class="footer-bottom">
    © <?php echo date("Y"); ?> Sports Hub. All rights reserved.
</div>
```

</footer>

<div class="toast" id="toast"></div>

<script>

/* =========================================================
   PRODUCTS
========================================================= */

const products = <?php echo json_encode(
    $products,
    JSON_UNESCAPED_SLASHES |
    JSON_UNESCAPED_UNICODE
); ?>;


/* =========================================================
   CART
========================================================= */

const CART_KEY = "sportsHubCart";

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

function saveCart(cart) {

    localStorage.setItem(
        CART_KEY,
        JSON.stringify(cart)
    );

}

function updateCartCount() {

    const cart = getCart();

    const count = cart.reduce(
        (total,item) =>
            total + Number(item.quantity || 1),
        0
    );

    const counter =
        document.getElementById("navCartCount");

    if (!counter) {
        return;
    }

    counter.textContent = count;

    counter.style.display =
        count > 0 ? "inline-flex" : "none";

}


/* =========================================================
   TOAST
========================================================= */

let toastTimer;

function showToast(message) {

    const toast =
        document.getElementById("toast");

    toast.textContent = message;

    toast.classList.add("show");

    clearTimeout(toastTimer);

    toastTimer = setTimeout(
        () => toast.classList.remove("show"),
        2500
    );

}


/* =========================================================
   ADD TO CART
========================================================= */

function addToCart(product, size = "", color = "", image = "") {

    const cart = getCart();

    const selectedImage =
        image ||
        product.image ||
        "jersey.png";

    const existingIndex =
        cart.findIndex(
            item =>
                Number(item.productId) === Number(product.id)
                &&
                String(item.size || "") === String(size || "")
                &&
                String(item.color || "") === String(color || "")
        );

    if (existingIndex !== -1) {

        cart[existingIndex].quantity =
            Number(cart[existingIndex].quantity || 1) + 1;

    } else {

        cart.push({

            productId: product.id,

            name: product.name,

            category: product.category,

            type: product.type,

            club: product.club || "",

            price: product.price,

            image: selectedImage,

            color: color,

            size: size,

            quantity: 1

        });

    }

    saveCart(cart);

    updateCartCount();

    showToast(
        product.name +
        (color ? " • " + color : "") +
        " added to cart ✓"
    );

}


/* =========================================================
   PRODUCT MODAL
========================================================= */

function openProduct(productId) {

    const product =
        products.find(
            item =>
                Number(item.id) === Number(productId)
        );

    if (!product) {
        return;
    }

    const modal =
        document.getElementById("productModal");

    const content =
        document.getElementById("modalContent");

    const sizes = product.sizes || [];

    const colors =
        product.colors && product.colors.length
            ? product.colors
            : [
                {
                    name: "Default",
                    image: product.image
                }
            ];

    const firstColor = colors[0];

    content.innerHTML = `

        <div class="modal-image">

            <img
                id="modalProductImage"
                src="${escapeHTML(firstColor.image)}"
                alt="${escapeHTML(product.name)}"
                onerror="
                    this.onerror=null;
                    this.src='jersey.png';
                "
            >

        </div>

        <div class="modal-details">

            <div class="section-kicker">
                ${escapeHTML(product.category)}
            </div>

            ${
                product.club
                ? `<div style="color:#888;font-size:13px;margin-top:5px;">
                    ${escapeHTML(product.club)}
                   </div>`
                : ""
            }

            <h2>
                ${escapeHTML(product.name)}
            </h2>

            <p>
                ${escapeHTML(product.description)}
            </p>

            <div class="modal-price">
                KSh ${Number(product.price).toLocaleString("en-KE")}
            </div>

            <label class="select-label">
                Select Colour
            </label>

            <div class="color-options">

                ${colors.map(
                    (color,index) => `

                        <button
                            type="button"
                            class="color-btn ${index === 0 ? "active" : ""}"
                            data-color="${escapeHTML(color.name)}"
                            data-image="${escapeHTML(color.image)}"
                            onclick="selectColor(this)"
                        >
                            ${escapeHTML(color.name)}
                        </button>

                    `
                ).join("")}

            </div>

            <label
                class="select-label"
                for="modalSize"
            >
                Select Size
            </label>

            <select
                class="size-select"
                id="modalSize"
            >

                ${sizes.map(
                    size => `
                        <option value="${escapeHTML(size)}">
                            ${escapeHTML(size)}
                        </option>
                    `
                ).join("")}

            </select>

            <button
                type="button"
                class="modal-add"
                onclick="addFromModal(${product.id})"
            >
                Add to Cart →
            </button>

        </div>

    `;

    modal.classList.add("show");

    document.body.style.overflow = "hidden";

}


/* =========================================================
   COLOUR SELECTION
========================================================= */

function selectColor(button) {

    document
        .querySelectorAll(".color-btn")
        .forEach(
            btn => btn.classList.remove("active")
        );

    button.classList.add("active");

    const image =
        button.dataset.image;

    const modalImage =
        document.getElementById(
            "modalProductImage"
        );

    if (modalImage && image) {

        modalImage.src = image;

        modalImage.onerror = function() {

            this.onerror = null;

            this.src = "jersey.png";

        };

    }

}


/* =========================================================
   ADD FROM MODAL
========================================================= */

function addFromModal(productId) {

    const product =
        products.find(
            item =>
                Number(item.id) === Number(productId)
        );

    if (!product) {
        return;
    }

    const sizeElement =
        document.getElementById("modalSize");

    const size =
        sizeElement
        ? sizeElement.value
        : "";

    const selectedColor =
        document.querySelector(
            ".color-btn.active"
        );

    const color =
        selectedColor
        ? selectedColor.dataset.color
        : "";

    const image =
        selectedColor
        ? selectedColor.dataset.image
        : product.image;

    addToCart(
        product,
        size,
        color,
        image
    );

    closeProduct();

}


/* =========================================================
   CLOSE MODAL
========================================================= */

function closeProduct() {

    const modal =
        document.getElementById("productModal");

    modal.classList.remove("show");

    document.body.style.overflow = "";

}

document
    .getElementById("productModal")
    .addEventListener(
        "click",
        function(event) {

            if (event.target === this) {
                closeProduct();
            }

        }
    );

document.addEventListener(
    "keydown",
    function(event) {

        if (event.key === "Escape") {
            closeProduct();
        }

    }
);


/* =========================================================
   SEARCH + FILTER
========================================================= */

const searchInput =
    document.getElementById("productSearch");

const categoryFilter =
    document.getElementById("categoryFilter");

const sortFilter =
    document.getElementById("sortFilter");

const productGrid =
    document.getElementById("productGrid");

const noResults =
    document.getElementById("noResults");


function filterProducts() {

    const search =
        searchInput.value
            .trim()
            .toLowerCase();

    const category =
        categoryFilter.value;

    const cards =
        Array.from(
            productGrid.querySelectorAll(
                ".product-card"
            )
        );

    let visibleCount = 0;

    cards.forEach(card => {

        const name =
            card.dataset.name || "";

        const cardCategory =
            card.dataset.category || "";

        const matchesSearch =
            name.includes(search);

        const matchesCategory =
            category === "All" ||
            cardCategory === category;

        const visible =
            matchesSearch &&
            matchesCategory;

        card.style.display =
            visible ? "" : "none";

        if (visible) {
            visibleCount++;
        }

    });

    noResults.style.display =
        visibleCount === 0
        ? "block"
        : "none";

}


/* =========================================================
   SORT
========================================================= */

function sortProducts() {

    const cards =
        Array.from(
            productGrid.querySelectorAll(
                ".product-card"
            )
        );

    const sort =
        sortFilter.value;

    cards.sort(
        (a,b) => {

            if (sort === "low") {

                return (
                    Number(a.dataset.price) -
                    Number(b.dataset.price)
                );

            }

            if (sort === "high") {

                return (
                    Number(b.dataset.price) -
                    Number(a.dataset.price)
                );

            }

            if (sort === "name") {

                return a.dataset.name.localeCompare(
                    b.dataset.name
                );

            }

            return (
                Number(a.dataset.id) -
                Number(b.dataset.id)
            );

        }
    );

    cards.forEach(
        card => productGrid.appendChild(card)
    );

    filterProducts();

}


/* =========================================================
   CATEGORY BUTTONS
========================================================= */

document
    .querySelectorAll(".category-btn")
    .forEach(button => {

        button.addEventListener(
            "click",
            function() {

                document
                    .querySelectorAll(".category-btn")
                    .forEach(
                        btn =>
                            btn.classList.remove("active")
                    );

                this.classList.add("active");

                categoryFilter.value =
                    this.dataset.category;

                filterProducts();

            }
        );

    });


searchInput.addEventListener(
    "input",
    filterProducts
);


categoryFilter.addEventListener(
    "change",
    function() {

        document
            .querySelectorAll(".category-btn")
            .forEach(button => {

                button.classList.toggle(
                    "active",
                    button.dataset.category ===
                    categoryFilter.value
                );

            });

        filterProducts();

    }
);


sortFilter.addEventListener(
    "change",
    sortProducts
);


/* =========================================================
   WISHLIST
========================================================= */

const WISHLIST_KEY =
    "sportsHubWishlist";

function getWishlist() {

    try {

        const saved =
            localStorage.getItem(WISHLIST_KEY);

        if (!saved) {
            return [];
        }

        const list = JSON.parse(saved);

        return Array.isArray(list) ? list : [];

    } catch (error) {

        return [];

    }

}

function saveWishlist(list) {

    localStorage.setItem(
        WISHLIST_KEY,
        JSON.stringify(list)
    );

}

function toggleWishlist(productId,button) {

    let list = getWishlist();

    const id = Number(productId);

    const index = list.indexOf(id);

    if (index === -1) {

        list.push(id);

        button.classList.add("saved");

        button.textContent = "♥";

        showToast("Added to wishlist ♥");

    } else {

        list.splice(index,1);

        button.classList.remove("saved");

        button.textContent = "♡";

        showToast("Removed from wishlist");

    }

    saveWishlist(list);

}


/* =========================================================
   RESTORE WISHLIST
========================================================= */

function restoreWishlist() {

    const list = getWishlist();

    document
        .querySelectorAll(".wishlist-btn")
        .forEach(button => {

            const card =
                button.closest(".product-card");

            if (!card) {
                return;
            }

            const id =
                Number(card.dataset.id);

            if (list.includes(id)) {

                button.classList.add("saved");

                button.textContent = "♥";

            }

        });

}


/* =========================================================
   HTML ESCAPE
========================================================= */

function escapeHTML(value) {

    const div =
        document.createElement("div");

    div.textContent =
        value ?? "";

    return div.innerHTML;

}


/* =========================================================
   INITIALIZE
========================================================= */

document.addEventListener(
    "DOMContentLoaded",
    function() {

        updateCartCount();

        restoreWishlist();

        filterProducts();

    }
);


window.addEventListener(
    "storage",
    function(event) {

        if (event.key === CART_KEY) {
            updateCartCount();
        }

    }
);

</script>

</body>
</html>
