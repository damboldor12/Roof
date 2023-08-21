function logout() {
  // Виконуємо AJAX-запит на файл, що виконує вихід з сесії
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../system/logout.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send();

  // Обробка результату AJAX-запиту
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Опціонально, виконуємо додаткові дії після виходу з сесії
      // Наприклад, перезавантаження сторінки або перенаправлення на іншу сторінку
      window.location.reload();
    }
  };
}

function Reg_Auth_Swipe() {
  var regElements = document.getElementsByClassName("reg");
  var authElements = document.getElementsByClassName("auth");

  // Перевіряємо стиль першого елемента з класом "reg"
  var isHidden = regElements[0].style.display === "none";

  // Змінюємо стиль елементів залежно від поточного стану
  for (var i = 0; i < regElements.length; i++) {
    regElements[i].style.display = isHidden ? "block" : "none";
  }

  for (var j = 0; j < authElements.length; j++) {
    authElements[j].style.display = isHidden ? "none" : "block";
  }
}

function showModal(element) {
  var positionId = element.getAttribute('position-id');
  var positionName = element.getAttribute('position-name');
  var positionCost = element.getAttribute('position-cost');
  var positionStartQuantity = element.getAttribute('start-quantity');
  var modal_title = document.getElementById('modal_title');
  var edit_position_id = document.getElementById('edit-position-id');
  var delete_position_id = document.getElementById('delete-position-id');
  var modal_cost_start = document.getElementById('modal_cost_start');
  var modal_cost = document.getElementById('modal_cost');
  var modal_start_quantity = document.getElementById('modal_quantity');
  var modal_quantity_unit = document.getElementById('modal_quantity_unit');
  if (edit_position_id) { edit_position_id.value = positionId; };
  if (delete_position_id) { delete_position_id.value = positionId; };
  modal_cost_start.value = positionCost;
  modal_cost.textContent = Math.round(positionCost) + " UAH";
  modal_title.textContent = positionName;
  modal_start_quantity.textContent = positionStartQuantity;
  var modal = document.getElementById('modal');
  modal.style.display = 'block';
  if (positionStartQuantity == 250) {
    modal_quantity_unit.textContent = 'g'
  }
  if (positionStartQuantity == 1) {
    modal_quantity_unit.textContent = 'pcs'
  }
}

function closeModal() {
  var modal = document.getElementById('modal');
  modal.style.display = 'none';
}

function subtractQuantity() {
  var quantityElement = document.getElementById('modal_quantity');
  var cost = document.getElementById('modal_cost');
  var currentQuantity = parseInt(quantityElement.textContent);
  var modal_quantity_unit = document.getElementById('modal_quantity_unit');
  if (modal_quantity_unit.textContent == 'g') {
    var newQuantity = currentQuantity - 250;
    if (newQuantity >= 250) {
      quantityElement.textContent = newQuantity;
      cost.textContent = newQuantity / 250 * modal_cost_start.value + " UAH";
    }
  }
  if (modal_quantity_unit.textContent == 'pcs') {
    var newQuantity = currentQuantity - 1;
    if (newQuantity >= 1) {
      quantityElement.textContent = newQuantity;
      cost.textContent = newQuantity * modal_cost_start.value + " UAH";
    }
  }
}

function addQuantity() {
  var quantityElement = document.getElementById('modal_quantity');
  var cost = document.getElementById('modal_cost');
  var currentQuantity = parseInt(quantityElement.textContent);
  var modal_quantity_unit = document.getElementById('modal_quantity_unit');

  if (modal_quantity_unit.textContent == 'g') {
    var newQuantity = currentQuantity + 250;
    quantityElement.textContent = newQuantity;
    cost.textContent = newQuantity / 250 * modal_cost_start.value + " UAH";
  }
  if (modal_quantity_unit.textContent == 'pcs') {
    var newQuantity = currentQuantity + 1;
    quantityElement.textContent = newQuantity;
    cost.textContent = newQuantity * modal_cost_start.value + " UAH";
  }
}

function addCartQuantity(parentNode, startCost) {
  var quantity_unit = parentNode.querySelector('.quantity_unit');
  var quantityElement = parentNode.querySelector('.quantity');
  var positionName = parentNode.querySelector('.busket_position_name');
  var positionNameValue = positionName.textContent;
  var costElement = parentNode.querySelector('.cost');
  var currentQuantity = parseInt(quantityElement.textContent);

  if (quantity_unit.textContent == 'g') {
    var newQuantity = currentQuantity + 250;
    var newCost = (newQuantity / 250 * startCost);
    quantityElement.textContent = newQuantity;
    costElement.textContent = newCost;
  }
  else if (quantity_unit.textContent == 'pcs') {
    var newQuantity = currentQuantity + 1;
    var newCost = (newQuantity * startCost);
    quantityElement.textContent = newQuantity;
    costElement.textContent = newCost;
  }

  $.ajax({
    url: '../system/ajax.php',
    type: 'POST',
    data: { positionName: positionNameValue, newQuantity, newCost, edit_Basket_Quantity: true },
    success: function (response) {
      var data = JSON.parse(response);

    },
    error: function (response) {
      var data = JSON.parse(response);
      var notice = data.notice;
      noticeshow(notice);
    }
  });
}

function subtractCartQuantity(parentNode, startCost) {
  var quantity_unit = parentNode.querySelector('.quantity_unit');
  var quantityElement = parentNode.querySelector('.quantity');
  var positionName = parentNode.querySelector('.busket_position_name');
  var positionNameValue = positionName.textContent;
  var costElement = parentNode.querySelector('.cost');
  var currentQuantity = parseInt(quantityElement.textContent);

  if (quantity_unit.textContent == 'g') {
    var newQuantity = currentQuantity - 250;
    if (newQuantity >= 250) {
      var newCost = (newQuantity / 250 * startCost);
      quantityElement.textContent = newQuantity;
      costElement.textContent = newCost;
      $.ajax({
        url: '../system/ajax.php',
        type: 'POST',
        data: { positionName: positionNameValue, newQuantity, newCost, edit_Basket_Quantity: true },
        success: function (response) {
          var data = JSON.parse(response);

        },
        error: function (response) {
          var data = JSON.parse(response);
          var notice = data.notice;
          noticeshow(notice);
        }
      });
    }
    else if (newQuantity < 250) {
      removeFromCart(parentNode);
    }
  }
  else if (quantity_unit.textContent == 'pcs') {
    var newQuantity = currentQuantity - 1;
    if (newQuantity >= 1) {
      var newCost = (newQuantity * startCost);
      quantityElement.textContent = newQuantity;
      costElement.textContent = newCost;
      $.ajax({
        url: '../system/ajax.php',
        type: 'POST',
        data: { positionName: positionNameValue, newQuantity, newCost, edit_Basket_Quantity: true },
        success: function (response) {
          var data = JSON.parse(response);

        },
        error: function (response) {
          var data = JSON.parse(response);
          var notice = data.notice;
          noticeshow(notice);
        }
      });
    }
    else if (newQuantity < 1) {
      removeFromCart(parentNode);
    }
  }

}




function noticeshow(content) {
  var notice = document.querySelector('.notice');
  var closeButton = document.querySelector('.notice_close');

  // Додати клас 'show' для показу блоку при завантаженні сторінки
  notice.classList.add = 'show';
  notice.style.display = 'block'; // Приховати блок
  // Оновіть вміст елемента "notification" зі значенням сповіщення
  if (typeof content !== 'undefined') {
    document.getElementById('notice_content_text').textContent = content;
  }

  setTimeout(function () {
    notice.style.opacity = '1';
  }, 400);




  // Обробка закриття
  closeButton.addEventListener('click', function () {
    notice.style.opacity = '0';
    setTimeout(function () {
      notice.style.display = 'none'; // Приховати блок
      $.ajax({
        url: '../system/ajax.php', // Шлях до файлу, який обробляє запит на обнулення
        type: 'POST',
        data: { reset_notice: true },
      });
    }, 400); // Зачекати 400 мс (тривалість анімації) перед приховуванням
  });
}

function addToCart() {
  var positionName = document.getElementById('modal_title').textContent;
  var positionQuantity = document.getElementById('modal_quantity').textContent;
  var positionQuantityUnit = document.getElementById('modal_quantity_unit').textContent;
  // Відправка AJAX-запиту на сервер для додавання в корзину
  $.ajax({
    url: '../system/ajax.php', // Шлях до файлу, який додає позицію в корзину
    type: 'POST',
    data: { positionName: positionName, positionQuantity: positionQuantity, positionQuantityUnit: positionQuantityUnit, add_to_cart: true },

    success: function (response) {
      // Успішна відповідь від сервера
      closeModal(); // Закрити модальне вікно після додавання в корзину
      var data = JSON.parse(response);
      var notice = data.notice;
      noticeshow(notice);

    },
    error: function (xhr, status, error) {
      // Успішна відповідь від сервера
      closeModal(); // Закрити модальне вікно після додавання в корзину
      var data = JSON.parse(response);
      var notice = data.notice;
      noticeshow(notice);
    }
  });
}

function removeFromCart(parentNode) {
  var positionNameElement = parentNode.querySelector('.busket_position_name');
  var positionNameValue = positionNameElement.textContent;

  // Відправка AJAX-запиту на сервер для видалення з корзини
  $.ajax({
    url: '../system/ajax.php',
    type: 'POST',
    data: { positionName: positionNameValue, remove_from_cart: true },
    success: function (response) {
      var data = JSON.parse(response);
      parentNode.style.display = "none";
      var notice = data.notice;
      noticeshow(notice);
      if (data.status === 'empty') {
        window.location.reload(); // Перезавантаження сторінки
      }
    },
    error: function (response) {
      var data = JSON.parse(response);
      var notice = data.notice;
      noticeshow(notice);
    }
  });
}


function edit_position() {
  var positionName = document.getElementById('modal_title').textContent;
  // Відправка AJAX-запиту на сервер для додавання в корзину
  $.ajax({
    url: '../pages/edit-position.php', // Шлях до файлу, який додає позицію в корзину
    type: 'POST',
    data: { edit_position: true, positionName: positionName },

    success: function (response) {
      // Успішна відповідь від сервера
      closeModal(); // Закрити модальне вікно після додавання в корзину
      var data = JSON.parse(response);
      var notice = data.notice;
      noticeshow(notice);

    },
    error: function (xhr, status, error) {
      // Успішна відповідь від сервера
      closeModal(); // Закрити модальне вікно після додавання в корзину
      var data = JSON.parse(response);
      var notice = data.notice;
      noticeshow(notice);
    }
  });
}

function deletePosition(positionType, positionId) {
  $.ajax({
    url: '../system/ajax.php',
    type: 'POST',
    dataType: 'json',
    data: {
      deletePosition: true, positionType: positionType, positionId: positionId
    },
    success: function (response) {
      if (response.status === 'success') {
        var notice = "Видалено позицій: " + response.deleted;
        noticeshow(notice);
      } else {
        noticeshow('Позицію не знайдено');
      }
    },
    error: function (response) {
      noticeshow('Проблема при виконанні скрипта');
    }
  });
}

function order() {
  var user_panel_subtitle = document.getElementById('user_panel_subtitle');
  var order_btn = document.getElementById('order_btn');
  var order_form = document.getElementById('order_form');
  var order_positions = document.getElementsByClassName('busket_position_box');
  var totalcost = document.getElementById('totalcost');
  user_panel_subtitle.textContent = 'Данні отримувача'

  order_btn.style.display = 'none';

  order_form.style.display = 'block';

  for (var i = 0; i < order_positions.length; i++) {
    order_positions[i].style.display = 'none';
  }
  $.ajax({
    url: '../system/ajax.php',
    type: 'POST',
    data: {
      get_total_cost: true
    },
    success: function (response) {
      var data = JSON.parse(response);
      totalcost.textContent = data.totalcost;

    },
    error: function (response) {
      var data = JSON.parse(response);
      var notice = data.notice;
      noticeshow(notice);
    }
  });
};
function showCategory(categoryId, thisSwicher) {
  var elements = document.getElementsByClassName("price-category-block");
  var categorySwichers = document.getElementsByClassName("price-category-swicher");
  var categoryElement = document.getElementById(categoryId);
  for (var i = 0; i < elements.length; i++) {
    elements[i].style.display = "none";
  }
  if (categoryElement) {
    categoryElement.style.display = "block";
  }
  for (var i = 0; i < categorySwichers.length; i++) {
    categorySwichers[i].classList.remove("price-category-swicher-active");
  }
  thisSwicher.classList.add("price-category-swicher-active");
}

function showSidebar(btn) {
  const side_panel = document.getElementById("side_panel");
  var authForm = document.getElementById("auth");
  var regForm = document.getElementById("reg");
  var shadow = document.getElementById("shadow");
  var btnValue = btn.getAttribute("value");;
  shadow.style.display = "block";
  shadow.style.opacity = "1";
  shadow.style.pointerEvents = "all";
  side_panel.style.transform = "translate(0px, -50%)";
  side_panel.style.transition = "transform 1s";
  var allSidePanelShowBnt = document.getElementsByClassName("side_panel_show_btn");

  for (var i = 0; i < allSidePanelShowBnt.length; i++) {
    var element = allSidePanelShowBnt[i];
    element.style.fontWeight = "normal";
  }


  if (btnValue == "reg") {
    authForm.style.display = "none";
    regForm.style.display = "flex";
    btn.style.fontWeight = "bold";

  }
  else if (btnValue == "auth") {
    regForm.style.display = "none";
    authForm.style.display = "flex";
    btn.style.fontWeight = "bold";
  }
  else {
    btn.style.fontWeight = "bold";
  }
  
}
function hideSidebar() {
  var regBtn = document.getElementById("reg_btn");
  var authBtn = document.getElementById("auth_btn");
  side_panel.style.transform = "translate(-300px, -50%)";
  shadow.style.opacity = "0";
  shadow.style.pointerEvents = "none";
  var allSidePanelShowBnt = document.getElementsByClassName("side_panel_show_btn");

  for (var i = 0; i < allSidePanelShowBnt.length; i++) {
    var element = allSidePanelShowBnt[i];
    element.style.fontWeight = "normal";
  }

}
