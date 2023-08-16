<style>
    body {
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.80), rgba(0, 0, 0, 0.80)), url(img/bg2.png);
    }

    .sale {
        color: white;
        text-align: center;
        margin: 35px auto 15px auto;
        font-size: 14px;
    }

    .coffeeposition {
        position: relative;
        margin: 0 auto 30px auto;
        ;
        padding: 22px 60px;
        width: 85%;
        background-color: rgba(217, 217, 217, 0.1);
        border-radius: 35px;
        transition: filter 0.4s, scale 0.4s;
    }

    .coffeeposition:hover {
        filter: drop-shadow(2px 4px 6px black);
        scale: 1.005;
    }

    .coffeeposition_top {
        display: grid;
        grid-template-columns: calc(100% * 1.15/3) auto calc(100% * 1.15/3);
        justify-content: space-between;
    }

    .coffeeposition_title {
        justify-content: start;
    }


    .coffeeposition_name {
        color: #FFCC00;
        font-weight: 600;
        font-size: 24px;
        line-height: 29px;
    }

    .coffeeposition_subtitle {
        font-weight: 500;
        font-size: 16px;
        line-height: 20px;
        color: rgba(255, 255, 255, 0.3);
    }


    .coffeeposition_subtitle_element {
        margin-right: 25px;
    }

    .coffeeposition_stages {
        display: flex;
        justify-content: space-around;
    }


    .coffeeposition_stage:first-child {
        margin-right: 15px;
    }

    .coffeeposition_stage:last-child {
        margin-right: 0;
    }

    .coffeeposition_stage_title {
        font-weight: 500;
        font-size: 20px;
        line-height: 24px;
    }

    .coffeeposition_stage_option {
        display: flex;
        align-items: flex-end;
        height: 40px;
    }


    .coffeeposition_stage_option_name {
        margin: auto auto auto 5px;
        font-weight: 500;
        font-size: 14px;
    }

    .coffeeposition_prices {
        display: flex;
        justify-content: flex-end;
        grid-row: span 2;
        grid-column: 3;
    }

    .dripposition_prices {
        display: flex;
        justify-content: flex-end;
        grid-row: span 2;
        grid-column: 3;
    }


    .coffeeposition_price {
        display: flex;
        flex-direction: column;
        height: 80px;
        justify-content: space-around;
    }

    .coffeeposition_price:last-child {
        margin-right: 0;
    }

    .coffeeposition_price_quantity {
        font-weight: 600;
        font-size: 28px;
        color: rgba(255, 255, 255, 0.16);
        text-align: center;
        white-space: nowrap;
    }

    .coffeeposition_price_cost {
        font-weight: 600;
        font-size: 22px;
        color: #FFFFFF;
        text-align: center;
        white-space: nowrap;
    }

    .coffeeposition_price_sale {
        position: relative;
        font-weight: 400;
        font-size: 12px;
        color: #FFCC00;
        text-align: center;
        white-space: nowrap;
    }

    .coffeeposition_description {
        margin-top: 17px;
        display: inline-flex;
        grid-column: span 2;
        flex-wrap: wrap;
    }

    .coffeeposition_description_element {
        display: flex;
        align-items: flex-end;
        flex-direction: row;
        margin-right: 20px;
        margin-top: 5px;
    }

    .coffeeposition_description_element:last-child {
        margin-right: 0px;
    }

    .coffeeposition_description_ico {
        margin-right: 5px;
    }

    .coffeeposition_description_name {
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
    }






    .price-category-swicher {
        width: auto;
        height: auto;
        position: relative;
        filter: grayscale(0.8);
        transition: scale 0.5s ease, filter 0.5s ease;
    }

    .price-category-swicher:hover {
        filter: grayscale(0);
        scale: 1.03;
    }

    .price-category-swicher-active {
        filter: none;
        scale: 1.03;
    }

    .price-category_title {
        position: absolute;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: 500;
        width: 100%;
        height: 15%;
        background-color: #00000090;
    }

    .price-category_img {
        width: 100%;
        box-shadow: inset 0 0 100px 5px rgba(0, 0, 0, 1), 0 4px 4px 0 rgba(0, 0, 0, 0.25);
    }

    .price-category-block {
        display: none;
    }


    .price-category {
        width: 85%;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(4, 20%);
        justify-content: space-around;
    }

    @media screen and (max-width: 900px) {
        .coffeeposition_stages {
            flex-direction: column;
            white-space: nowrap;
            height: 120px;
        }

        .coffeeposition_price {
            height: 120px;
        }

        .coffeeposition_description {
            grid-column: span 3;
        }


        .price-category_title {
            font-size: 16px;
        }
    }

    @media screen and (max-width: 780px) {
        .coffeeposition_top {
            grid-template-columns: calc(100% * 0.6/2) calc(100% * 1.4/2);
        }

        .coffeeposition_title {
            grid-column: span 2;
        }

        .coffeeposition_stages {
            grid-column: 1;
            padding-top: 10px;
            height: auto;
        }

        .coffeeposition_prices {
            grid-column: 2;
            grid-row: 2;
        }

        .dripposition_prices {
            grid-column: 2;
            grid-row: 3;
        }

        .coffeeposition_name {
            font-size: 20px;
            line-height: 24px;
        }

        .coffeeposition_subtitle_element {
            font-size: 11px;
            line-height: 13px;
        }

        .coffeeposition_stage_title {
            text-align: left;
        }

        .coffeeposition_stage {
            margin-bottom: 7px;
        }

        .coffeeposition_stage_option_name {
            margin-left: 5px;
        }

        .coffeeposition_price {
            height: auto;
            justify-content: space-evenly;
        }

        .coffeeposition_price_quantity {
            font-size: 16px;
            line-height: 20px;
            white-space: nowrap;
        }

        .coffeeposition_price_cost {
            font-size: 16px;
            line-height: 17px;
            white-space: nowrap;
        }

        .coffeeposition_price_sale {
            font-size: 11px;
            line-height: 13px;
            white-space: nowrap;
        }

        .coffeeposition {
            padding: 14px 22px;
        }

        .price-category_title {
            font-size: 14px;
        }
    }


    @media screen and (max-width: 780px) {
        .price-category {
            display: grid;
            grid-template-columns: repeat(2, 40%);
            grid-row-gap: calc((100vw * 0.15) * 0.3);
        }
    }
</style>
<div class="price-category">
    <div onclick="showCategory('coffee', this)" class="price-category-swicher price-category-swicher-active">
        <img class="price-category_img" src="/img/product/CATEGORY-coffee.png" alt="coffee">
        <div class="price-category_title"> <span>Кава</span></div>
    </div>
    <div onclick="showCategory('drip', this)" class="price-category-swicher">
        <img class="price-category_img" src="/img/product/CATEGORY-drip.png" alt="drip">
        <div class="price-category_title"> <span>Дріпи</span></div>
    </div>
    <div class="price-category-swicher">
        <img class="price-category_img" src="/img/product/CATEGORY-merch.png" alt="merch">
        <div class="price-category_title"> <span>Мерч</span></div>
    </div>
    <div class="price-category-swicher">
        <img class="price-category_img" src="/img/product/CATEGORY-acs.png" alt="school">
        <div class="price-category_title"> <span>Навчання</span></div>
    </div>
</div>


<div class="price-category-block" id="coffee" style="display:block">
    <p class="sale">При замовленні від 2 кг діє знижка 20%*</p>

    <?php foreach ($_SESSION['price'] as $position_data) { ?>

        <div onclick="showModal(this)" class="coffeeposition" start-quantity="250" position-cost="<?php echo round($position_data['cost'] * 0.25) ?>" position-name="<?php echo $position_data['name'] ?>" position-id="<?php echo "coffee:" . $position_data['id'] ?>">
            <div class="coffeeposition_top">
                <div class="coffeeposition_title">
                    <p class="coffeeposition_name"><?php echo $position_data['name'] ?></p>
                    <div class="coffeeposition_subtitle">
                        <span class="coffeeposition_subtitle_element"><?php echo $position_data['region'] ?></span>
                        <span class="coffeeposition_subtitle_element"><?php echo $position_data['height'] ?></span>
                    </div>
                </div>

                <div class="coffeeposition_stages">

                    <div class="coffeeposition_stage">
                        <p class="coffeeposition_stage_title">Process</p>
                        <div class="coffeeposition_stage_option">
                            <!-- <img src="img/process/<?php echo $position_data['process'] ?>.svg" class="position_stage_option_ico"> -->
                            <span class="coffeeposition_stage_option_name"><?php echo $position_data['process'] ?></span>
                        </div>
                    </div>

                    <div class="coffeeposition_stage">

                        <p class="coffeeposition_stage_title">Roast</p>
                        <div class="coffeeposition_stage_option">
                            <!-- <img src="img/roast/<?php echo $position_data['roast'] ?>.svg" class="position_stage_option_ico"> -->
                            <span class="coffeeposition_stage_option_name"><?php echo $position_data['roast'] ?></span>
                        </div>
                    </div>
                </div>

                <div class="coffeeposition_prices">
                    <div class="coffeeposition_price">
                        <span class="coffeeposition_price_quantity">250g</span>
                        <span class="coffeeposition_price_cost"><?php echo round($position_data['cost'] * 0.25) ?> UAH</span>
                        <span tooltip="При замовленні від 2 кг" flow="right" class="coffeeposition_price_sale"><?php echo round($position_data['cost'] * 0.25 * 0.8) ?> UAH*</span>
                    </div>

                </div>

                <div class="coffeeposition_description">

                    <?php foreach ($position_data['descriptions'] as $description) { ?>

                        <div class="coffeeposition_description_element">
                            <!-- <img src="img/descriptions/<?php echo $description ?>.svg" class="position_description_ico"> -->
                            <span class="coffeeposition_description_name"><?php echo $description ?></span>
                        </div>
                    <?php } ?>


                </div>

            </div>


        </div>

    <?php
    }
    ?>
</div>


<div class="price-category-block" id="drip">

    <p class="sale">Набором вигідніше*</p>
    <?php foreach ($_SESSION['drips'] as $position_data) { ?>

        <div onclick="showModal(this)" class="coffeeposition" start-quantity="1" position-cost="<?php echo $position_data['cost'] ?>" position-name="<?php echo $position_data['name'] ?>" position-id="<?php echo "drip:" . $position_data['id'] ?>">
            <div class="coffeeposition_top">
                <div class="coffeeposition_title">
                    <p class="coffeeposition_name"><?php echo $position_data['name'] ?></p>
                    <div class="coffeeposition_subtitle">
                        <span class="coffeeposition_subtitle_element"><?php echo $position_data['description'] ?></span>
                    </div>
                </div>


                <div class="dripposition_prices">
                    <div class="coffeeposition_price">
                        <span class="coffeeposition_price_quantity">1 pcs</span>
                        <span class="coffeeposition_price_cost"><?php echo round($position_data['cost']) ?> UAH</span>
                    </div>
                </div>

                <div class="coffeeposition_description">

                    <?php foreach ($position_data['items'] as $items) { ?>

                        <div class="coffeeposition_description_element">
                            <span class="coffeeposition_description_name"><?php echo $items ?></span>
                        </div>
                    <?php } ?>


                </div>

            </div>


        </div>

    <?php
    }
    ?>
</div>

<!-- Модальне вікно -->
<div id="modal" class="modal">
    <div onclick="closeModal()" class="modal_bg"></div>
    <div class="modal_content">

        <div class="modal_box_one">
            <h2 id="modal_title" class="modal_title"></h2>
        </div>

        <div class="modal_box_two ">
            <img onclick="subtractQuantity()" class="modal_arrow" src="/img/slider/arrow_left.svg" alt="-">
            <div class="modal_quantity"> <span id="modal_quantity"></span> <span id="modal_quantity_unit"></span></div>
            <img onclick="addQuantity()" class="modal_arrow" src="/img/slider/arrow_right.svg" alt="+">
        </div>

        <span class="modal_cost" id="modal_cost"></span>
        <input type="hidden" id="modal_cost_start" value="">

        <div class="user_panel_btns">
            <button onclick="addToCart()">Додати в корзину</button>
            <button onclick="closeModal()">Закрити</button>
        </div>
        <?php if (isset($_SESSION['user']['user_level']) && ($_SESSION['user']['user_level'] > 1)) { ?>
            <div class="admin_panel_btns_box">
                <form action="/edit-position" method="post">
                      <input type="image" src="/img/edit.svg" alt="Редагувати" style="height: 30px;">
                      <input type="hidden" id="edit-position-id" name="positionId"  >
                </form>

                <form action="/delete-position" method="post">
                    <input type="image" src="/img/trash.svg" alt="Видалити" style="height: 30px;">
                    <input type="hidden" id="delete-position-id" name="positionId">
                </form>
            </div>
        <?php } ?>
    </div>
</div>