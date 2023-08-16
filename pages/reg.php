  <div class="user_panel_first_screen">
    <div class="user_panel_block">
      <? if ($_SESSION['auth'] === true) {
      ?>
        <button onclick="logout()">LOGOUT</button>
      <?
        echo $_SESSION['email'];
      } else { ?>

        <h2 class="user_panel_title">Особистий кабінет</h2>
        <h2 class="user_panel_subtitle">Реєстрація</h2>
        <div class="user_panel_content">
          <div class="user_panel_content_left">

            <form action="/system/reg.php" method="POST">
              <input class="input" placeholder="Email" type="email" name="email" required><br>
              <input class="input" placeholder="Пароль" type="password" name="password" required><br>
              <input class="input" placeholder="Ім'я" type="text" name="first_name" required><br>
              <input class="input" placeholder="Фамілія" type="text" name="last_name" required><br>
              <div class="user_panel_btns">
                <input class="input" type="submit" value="Реєстрація">
                <input class="input" type="button" value="Увійти" onclick="window.location.href = '/coffeeman'">
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
  </div>