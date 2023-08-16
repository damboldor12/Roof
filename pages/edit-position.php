<div class="user_panel_block">
    <? if ($_SESSION['user']['user_level'] > 1) {
        $partsID = explode(':', $_POST['positionId']);
        $position_type = $partsID[0];
        $position_id = $partsID[1];

        if ($position_type == "coffee") {
            foreach ($_SESSION['price'] as $position) {
                if ($position['id'] == $position_id) {
                    $edited_position = $position;
                    break;
                }
            }
        }

        if ($position_type == "drip") {
            foreach ($_SESSION['drips'] as $position) {
                if ($position['id'] == $position_id) {
                    $edited_position = $position;
                    break;
                }
            }
        }

    ?>



        <h2 class="user_panel_title">Редагувати</h2>
        <h2 class="user_panel_subtitle"><?php echo $edited_position['name'] ?></h2>
        <div class="user_panel_content">

            <?php if ($position_type == "coffee") { ?>
                <form style="width: 100%; margin-top: 15px" method="POST" action="/system/edit-position.php">
                    <?php $descriptions = $edited_position['descriptions']; ?>
                    <input type="text" class="input" name="name" placeholder="Назва" value="<?php echo $edited_position['name'] ?>">
                    <input type="text" class="input" name="country" placeholder="Країна" value="<?php echo $edited_position['country'] ?>">
                    <input type="text" class="input" name="region" placeholder="Регіон" value="<?php echo $edited_position['region'] ?>">
                    <input type="text" class="input" name="height" placeholder="Висота" value="<?php echo $edited_position['height'] ?>">
                    <input type="text" class="input" name="process" placeholder="Обробка" value="<?php echo $edited_position['process'] ?>">
                    <input type="text" class="input" name="roast" placeholder="Обсмажка" value="<?php echo $edited_position['roast'] ?>">
                    <textarea class="input" style="resize: none;" name="description" rows="4" cols="50" placeholder="Дескриптори"><?php echo implode(', ', $descriptions) ?></textarea>
                    <input type="text" class="input" name="cost" placeholder="Ціна за кг" pattern="[0-9]*" maxlength="4" minlength="3" value="<?php echo round($edited_position['cost']) ?>">
                    <input type="hidden" name="redirect" value="/price">
                    <input type="hidden" name="form-name" value="bean">
                    <input type="hidden" name="id" value="<?php echo $edited_position['id'] ?>">
                    <div class="user_panel_btns">
                        <input type="submit" value="Зберегти">
                    </div>
                </form> <?php } ?>

            <?php if ($position_type == "drip") { ?>

                <?php $items = $edited_position['items']; ?>
                <form style="width: 100%; margin-top: 15px" method="POST" action="/system/edit-position.php">
                    <input type="text" class="input" name="name" placeholder="Назва" value="<?php echo $edited_position['name'] ?>">
                    <input type="text" class="input" name="description" placeholder="Підпис" value="<?php echo $edited_position['description'] ?>">
                    <textarea class="input" style="resize: none;" name="items" rows="4" cols="50" placeholder="Вміст в форматі:
2x Guatemala Finca Canaque, 2x El Salvador La Esperanza, 2x Kenya Meru County"><?php echo implode(', ', $items) ?></textarea>
                    <input type="text" class="input" name="cost" placeholder="Ціна" pattern="[0-9]*" maxlength="4" minlength="3" value="<?php echo round($edited_position['cost']) ?>">
                    <input type="hidden" name="redirect" value="/price">
                    <input type="hidden" name="form-name" value="drip">
                    <input type="hidden" name="id" value="<?php echo $edited_position['id'] ?>">
                    <div class="user_panel_btns">
                        <input type="submit" value="Зберегти">
                    </div>
                </form> <?php } ?>
        </div>

    <?


    } else {
        header('Location: /coffeeman');
        exit();;
    } ?>


</div>