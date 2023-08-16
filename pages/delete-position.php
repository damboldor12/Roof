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



        <h2 class="user_panel_title">Видалити</h2>
        <h2 class="user_panel_subtitle"><?php echo $position['name'] . "?" ?></h2>
        <div class="user_panel_content">
            <div class="user_panel_btns">
                <button onclick="deletePosition('<?php echo $position_type; ?>', '<?php echo $position_id; ?>')">Видалити</button>
                <button onclick="history.back()">Відміна</button>
            </div>
        </div>

    <?


    } else {
        header('Location: /coffeeman');
        exit();;
    } ?>


</div>