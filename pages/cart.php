<div class="user_panel_block">
    <h2 class="user_panel_title">Оформлення замовлення</h2>
    <h2 id="user_panel_subtitle" class="user_panel_subtitle">Корзина</h2>

    <div class="user_panel_box">
        <?
        $totalcost = 0; // Ініціалізуємо змінну для загальної вартості

        if (isset($_SESSION['selected_positions']) && !empty($_SESSION['selected_positions'])) {
            foreach ($_SESSION['selected_positions'] as $position) {
                $totalcost += floatval($position['cost']); // Додаємо вартість кожної позиції до загальної вартості
                if (isset($_SESSION['price'][$position['name']])) {
                    $pricecost = intval($_SESSION['price'][$position['name']]['cost'] / 4);
                }
                if (isset($_SESSION['drips'][$position['name']])) {
                    $pricecost = intval($_SESSION['drips'][$position['name']]['cost']);
                }
        ?>
                <div class="busket_position_box">
                    <span class="busket_position_name"><? echo $position['name'] ?></span>
                    <div class="busket_position_quantity_box">
                        <img onclick="subtractCartQuantity(this.closest('.busket_position_box'), <?php echo $pricecost ?>)" class="busket_position_modal_arrow" src="/img/slider/arrow_left.svg" alt="-">
                        <div class="busket_position_quantity"> <span class="quantity"><? echo $position['quantity'] ?></span> <span class="quantity_unit"><? echo $position['quantityUnit'] ?></span> </div>
                        <img onclick="addCartQuantity(this.closest('.busket_position_box'), <?php echo $pricecost ?>)" class="busket_position_modal_arrow" src="/img/slider/arrow_right.svg" alt="+">
                    </div>
                    <div class="busket_position_cost"><span class="cost"><? echo $position['cost'] ?></span> <span>UAH</span></div>
                </div>
            <?
            }
            ?>

            <form style="width: 100%; margin-top: 15px; display:none" method="POST" id="order_form" action="/system/new-order.php">
                <input type="text" class="input" name="first_name" placeholder="Ім'я">
                <input type="text" class="input" name="last_name" placeholder="Прізвище">
                <input type="tel" class="input" name="phone" placeholder="Номер телефону">
                <input type="text" class="input" name="city" placeholder="Місто">
                <input type="text" class="input" name="post" placeholder="Поштове відділення">
                <input type="hidden" name="redirect" value="<? echo $_SERVER['REQUEST_URI'] ?>">

                <p style="
    text-align: center;
    margin-top: 40px;
    color: #FCC000;
">До сплати <span id="totalcost"></span> UAH</p>

                <div class="btns">
                    <div class="btn_box ">
                        <input class="btn_main btn_text" type="submit" value="Замовити">
                    </div>
                </div>
            </form>
            <div class="btns" id="order_btn">
                <div class="btn_box">
                    <div class="btn_main" onclick="order()">
                        <span class="btn_text">Продовжити</span>
                    </div>
                </div>
            </div>

        <?
        } else { ?><h2 style="font-size: 28px; text-align: center; margin-top: 100px; margin-bottom: 100px;">Корзина порожня</h2><? } ?>
    </div>
</div>

<style>
    .user_panel_box {
        margin: 15px 15px auto 15px;

    }

    .busket_position_box {
        position: relative;
        margin-top: 15px;
        padding: 10px;
        display: grid;
        grid-template-columns: 50% 25% 25%;
        align-items: center;
        border-bottom: solid 1px #fcc00082;
    }

    .busket_position_box:first-child {
        border-top: solid 1px #fcc00082;
    }

    .busket_position_delete {
        position: absolute;
        left: -15px;
        color: red;
    }

    .busket_position_quantity_box {
        display: flex;
        align-items: center;
        margin: auto;
    }

    .busket_position_quantity {
        color: #FCC000;
        white-space: nowrap;
    }

    .busket_position_modal_arrow {
        height: 30px;
        margin-left: 10px;
    }

    .busket_position_modal_arrow:first-child {
        margin-left: 0px;
        margin-right: 10px;
    }

    .busket_position_name {
        color: #FCC000;
        font-size: 18px;
    }

    .busket_position_cost {
        text-align: end;
        font-size: 18px;
    }

    @media (max-width:900px) {
        .busket_position_box {
            grid-template-columns: 70% 30%
        }
        .busket_position_quantity_box {
            grid-row: 2;
            margin-top: 10px;
        }
        .busket_position_cost {
            grid-row: 1/3;
        }
    }
</style>