<div class="user_panel_block">
    <? if (isset($_SESSION['user'])) {
    ?>

        <h2 class="user_panel_title">Особистий кабінет</h2>
        <h2 class="user_panel_subtitle auth">Меню</h2>
        <button class="input" onclick="window.location.href='/new-position'">Додати нову позицію</button>
        <button class="input" onclick="window.location.href='/orders-admin'">Замовлення </button>
        <button class="input" onclick="logout()">Вихід</button>
    <?
    } else { ?>

        <h2 class="user_panel_title">Особистий кабінет</h2>
        <h2 class="user_panel_subtitle auth">Вхід</h2>
        <h2 class="user_panel_subtitle reg">Реєстрація</h2>
        <div class="user_panel_content">
            <div class="user_panel_content_left">

                <form class="auth" action="/system/login.php" method="POST">
                    <input class="input" type="email" placeholder="Email" name="email" required><br>
                    <input class="input" type="password" placeholder="Пароль" name="password" required><br>
                    <div class="user_panel_btns">
                        <input type="submit" value="Увійти">
                        <input type="button" value="Реєстрація" onclick="Reg_Auth_Swipe()">
                    </div>
                    <input type="hidden" name="redirect" value="<? echo $_SERVER['REQUEST_URI'] ?>">
                </form>

                <form class="reg" action="/system/reg.php" method="POST">
                    <input class="input" placeholder="Email" type="email" name="email" required><br>
                    <input class="input" placeholder="Пароль" type="password" name="password" required><br>
                    <input class="input" placeholder="Ім'я" type="text" name="first_name" required><br>
                    <input class="input" placeholder="Фамілія" type="text" name="last_name" required><br>
                    <div class="user_panel_btns">
                        <input type="submit" value="Реєстрація">
                        <input type="button" value="Увійти" onclick="Reg_Auth_Swipe()">
                    </div>
                </form>

            </div>
            <div class="user_panel_content_right">

                <img src="/img/user_panel/have_fun.svg" class="user_panel_buttom_img" alt="">
            </div>
        </div>
    <?
    } ?>


</div>