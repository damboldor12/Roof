<div class="user_panel_block">
    <? if ($_SESSION['user']['user_level'] > 1) {
    ?>


        <h2 class="user_panel_title">Нова позиція</h2>
        <h2 class="user_panel_subtitle">Roof</h2>
        <div class="user_panel_content">
            <div style="width: 100%;">
                <select style="margin-top: 20px;" class="input" name="position_Type" id="position_Type" onchange="showElement()">
                    <option selected value="drip">Дріп кава</option>
                    <option value="bean">Кава в зернах</option>
                </select>

                <form id="bean" style="width: 100%; margin-top: 15px; display:none" method="POST" action="/system/new-position.php">
                    <input type="text" class="input" name="name" placeholder="Назва">
                    <input type="text" class="input" name="country" placeholder="Країна">
                    <input type="text" class="input" name="region" placeholder="Регіон">
                    <input type="text" class="input" name="height" placeholder="Висота">
                    <input type="text" class="input" name="process" placeholder="Обробка">
                    <input type="text" class="input" name="roast" placeholder="Обсмажка">
                    <textarea class="input" style="resize: none;" name="description" rows="4" cols="50" placeholder="Дескриптори"></textarea>
                    <input type="text" class="input" name="cost" placeholder="Ціна за кг" pattern="[0-9]*" maxlength="4" minlength="3">
                    <input type="hidden" name="redirect" value="<? echo $_SERVER['REQUEST_URI'] ?>">
                    <input type="hidden" name="form-name" value="bean">
                    <div class="user_panel_btns">
                        <input type="submit" value="Додати">
                    </div>
                </form>

                <form id="drip" style="width: 100%; margin-top: 15px" method="POST" action="/system/new-position.php">
                    <input type="text" class="input" name="name" placeholder="Назва">
                    <textarea class="input" style="resize: none;" name="items" rows="4" cols="50" placeholder="Вміст в форматі:
2x Guatemala Finca Canaque, 2x El Salvador La Esperanza, 2x Kenya Meru County"></textarea>
                    <textarea class="input" style="resize: none;" name="description" rows="4" cols="50" placeholder="Опис"></textarea>
                    <input type="text" class="input" name="cost" placeholder="Ціна" pattern="[0-9]*" maxlength="4" minlength="2">
                    <input type="hidden" name="redirect" value="<? echo $_SERVER['REQUEST_URI'] ?>">
                    <input type="hidden" name="form-name" value="drip">
                    <div class="user_panel_btns">
                        <input type="submit" value="Додати">
                    </div>
                </form>
            </div>
        </div>
    <?


    } else {
        header('Location: /coffeeman');
        exit();;
    } ?>

    <script>
        function showElement() {
            var selectElement = document.getElementById("position_Type");
            var selectedOption = selectElement.options[selectElement.selectedIndex].value;

            var dripElement = document.getElementById("drip");
            var beanElement = document.getElementById("bean");

            if (selectedOption === "drip") {
                dripElement.style.display = "block";
                beanElement.style.display = "none";
            } else if (selectedOption === "bean") {
                dripElement.style.display = "none";
                beanElement.style.display = "block";
            }
        }
    </script>

</div>