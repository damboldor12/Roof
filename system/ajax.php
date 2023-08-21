<?
session_start();

if (isset($_POST['reset_notice'])) {
    unset($_SESSION['notice']);
}



if (isset($_POST['add_to_cart'])) {
    $positionName = $_POST['positionName'];
    $positionQuantity = $_POST['positionQuantity'];
    $positionQuantityUnit = $_POST['positionQuantityUnit'];
    if (isset($_SESSION['price'][$positionName])) {
        $positionCost = $_SESSION['price'][$positionName]['cost'] * $positionQuantity * 0.001;
    };
    if (isset($_SESSION['drips'][$positionName])) {
        $positionCost = $_SESSION['drips'][$positionName]['cost'] * $positionQuantity;
    };
    if (isset($_SESSION['selected_positions']) && in_array($positionName, $_SESSION['selected_positions'])) {
        $_SESSION['notice'] = 'В вашій корзині вже є ця позиція';
        echo json_encode(['status' => 'success', 'notice' => $_SESSION['notice']]);
    } else {
        // Додавання інформації до сесії
        $_SESSION['selected_positions'][$positionName] = array(
            'name' => $positionName,
            'quantity' => $positionQuantity,
            'quantityUnit' => $positionQuantityUnit,
            'cost' => $positionCost
        );
        $_SESSION['notice'] = 'Додано в корзину!';
        echo json_encode(['status' => 'success', 'notice' => $_SESSION['notice']]);
    }
}


if (isset($_POST['remove_from_cart'])) {
    $positionName = $_POST['positionName'];
    if (isset($_SESSION['selected_positions'][$positionName])) {
        unset($_SESSION['selected_positions'][$positionName]);
        $_SESSION['notice'] = 'Позицію видалено з корзини!';
        if (empty($_SESSION['selected_positions'])) {
            $_SESSION['notice'] = 'Корзина порожня';
            echo json_encode(['status' => 'empty', 'notice' => $_SESSION['notice']]);
            exit;
        }
        echo json_encode(['status' => 'success', 'notice' => $_SESSION['notice']]);
    } else {
        $_SESSION['notice'] = 'Неочікувана помилка';
        echo json_encode(['status' => 'error', 'notice' => $_SESSION['notice']]);
    }
}


if (isset($_POST['edit_Basket_Quantity'])) {
    $positionName = $_POST['positionName'];
    $_SESSION['selected_positions'][$positionName]['quantity'] = $_POST['newQuantity'];
    $_SESSION['selected_positions'][$positionName]['cost'] = $_POST['newCost'];

    echo json_encode(['status' => 'success']);
}


if (isset($_POST['get_total_cost'])) {
    $totalcost = 0;
    if (!empty($_SESSION['selected_positions'])) {
        foreach ($_SESSION['selected_positions'] as $position) {
            $totalcost += floatval($position['cost']); // Додаємо вартість кожної позиції до загальної вартості
        }
    }
    echo json_encode(['status' => 'success', 'totalcost' => "$totalcost"]);
}

if (isset($_POST['deletePosition'])) {
    // Підключення до бази даних
    $servername = "localhost";
    $username = "amshrxqk_roof";
    $password = "*******";
    $dbname = "amshrxqk_roof";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $position_id = $_POST['positionId'];

    // Підготовка і виконання SQL-запиту з використанням підготовлених заявок
    if ($_POST['positionType'] == 'drip') {
        $sql = "DELETE FROM drips WHERE id = ?";
    } elseif ($_POST['positionType'] == 'coffee') {
        $sql = "DELETE FROM price WHERE id = ?";
    };

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $position_id);
    $stmt->execute();

    // Опціонально: перевірка, скільки рядків було видалено
    if ($stmt->affected_rows > 0) {
        echo json_encode(['status' => 'success', 'deleted' => $stmt->affected_rows]);
    } else {
        echo json_encode(['status' => 'error', 'deleted' => $stmt->affected_rows]);
    }

    // Закриття підготовленого заявку і з'єднання з базою даних
    $stmt->close();
    $conn->close();
}
