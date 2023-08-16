<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/userpanel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- HTML Meta Tags -->
    <title>ROOF Specialty Coffee</title>
    <meta name="description" content="ROOF – Проєкт, який об'єднує! Тематичні вечори, бариста батли, капінги, навчання, і звичайно ж смачна кава">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://roofcoffee.com.ua/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="ROOF Specialty Coffee">
    <meta property="og:description" content="ROOF – Проєкт, який об'єднує! Тематичні вечори, бариста батли, капінги, навчання, і звичайно ж смачна кава">
    <meta property="og:image" content="https://roofcoffee.com.ua/img/opengraph.png">
    <meta property=«og:image:width» content=«1200» />
    <meta property=«og:image:height» content=«630» />

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="roofcoffee.com.ua">
    <meta property="twitter:url" content="https://roofcoffee.com.ua/">
    <meta name="twitter:title" content="ROOF Specialty Coffee">
    <meta name="twitter:description" content="ROOF – Проєкт, який об'єднує! Тематичні вечори, бариста батли, капінги, навчання, і звичайно ж смачна кава">
    <meta name="twitter:image" content="https://roofcoffee.com.ua/img/opengraph.png">
    <meta property=«og:image:width» content=«1200» />
    <meta property=«og:image:height» content=«630» />
</head>

<body>
    <div class="header">
        <div class="header_left">
            <img onclick="menuswipe()" src="img/MenuBTN.svg" class="menu_btn"></img>
        </div>

        <div class="header_center">
            <div id="header_center_sviper" class="header_center_sviper">

                <div class="header_center_sviper_box">
                    <img onclick="location.href='/'" src="img/Logo.svg" id="mainlogo" class="logo"></img>
                </div>

                <div class="header_center_sviper_box">
                    <a href="/"><span>Головна</span></a>
                    <a href="/price"><span>Магазин</span></a>
                    <a href="/drip"><span>Колекції</span></a>
                    <? if (isset($_SESSION['user']['user_level']) && ($_SESSION['user']['user_level'] > 1)) {
                    ?><a href="/coffeeman"><span>Мій Roof</span></a><?php } ?>
                </div>

            </div>
        </div>

        <div class="header_right">
            <?php
            $cart_quantity = 0;
            if (isset($_SESSION["selected_positions"])) {
                $cart_quantity = count($_SESSION["selected_positions"]);
            } ?>
            <a href="/cart" class="cart_ico">
                <img src="img/ShoppingCART.svg" class="shopping_CART"></img>
                <span class="cart_quantity"> <?php
                                                if ($cart_quantity >= 1) {
                                                    echo $cart_quantity;
                                                } ?></span>
            </a>
        </div>
    </div>