<div class="user_panel_block">
    <h2 class="user_panel_title">Статус замовлення</h2>
    <h2 id="user_panel_subtitle" class="user_panel_subtitle">№<?php echo $order_id['id'] ?></h2>

    <div class="order_status">
        <?php if ($order_id['status'] === 'NEW') {echo 'Замовлення прийнято, очікуйте дзвінка!';} ?>
    </div>
 </div>
 <style>
    .order_status {
        margin: 60px auto;
        color: #FCC000;
        font-size: 16px;
    }
 </style>