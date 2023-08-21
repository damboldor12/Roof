<?php
$_SESSION['last_update'] = 555;
// Перевірка, чи існує час останнього оновлення бази даних в сесії
if (!isset($_SESSION['last_update']) || (time() - $_SESSION['last_update']) > 300) {
    // Час оновлення перевищив 5 хвилин або відсутній
    // Підключення до бази даних
    $servername = "localhost";
    $username = "amshrxqk_roof";
    $password = "1k2Ae!16iRGC;f";
    $dbname = "amshrxqk_roof";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Перевірка підключення до бази даних
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    mysqli_set_charset($conn, 'utf8mb4');
    // SQL-запит для отримання даних з таблиці
    $sqlPrice = "SELECT * FROM price";

    // Виконання запиту і отримання результату
    $sqlPrice_result = $conn->query($sqlPrice);

    // Масив для зберігання результатів
    $price = array();

    // Перевірка наявності результатів
    if ($sqlPrice_result->num_rows > 0) {
        // Прохід по кожному рядку результату
        while ($row = $sqlPrice_result->fetch_assoc()) {
            // Додавання рядка в масив з даними
            $price[$row['name']] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'country' => $row['country'],
                'region' => $row['region'],
                'process' => $row['process'],
                'roast' => $row['roast'],
                'height' => $row['height'],
                'descriptions' => explode(", ", $row['descriptions']),
                'cost' => $row['cost']
            );
        }
        $_SESSION['price'] = $price;
    }

        // SQL-запит для отримання даних з таблиці
        $sqlDrips = "SELECT * FROM drips";

        // Виконання запиту і отримання результату
        $sqlDrips_result = $conn->query($sqlDrips);
    
        // Масив для зберігання результатів
        $drips = array();
    
        // Перевірка наявності результатів
        if ($sqlDrips_result->num_rows > 0) {
            // Прохід по кожному рядку результату
            while ($row = $sqlDrips_result->fetch_assoc()) {
                // Додавання рядка в масив з даними
                $drips[$row['name']] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'description' => $row['description'],
                    'items' => explode(", ", $row['items']),
                    'cost' => $row['cost']
                );
            }
            $_SESSION['drips'] = $drips;
        }


    if (isset($_SESSION['user']['user_level']) && $_SESSION['user']['user_level'] >= 2) {

        $sqlOrders = "SELECT * FROM orders";
        $sqlOrders_result = $conn->query($sqlOrders);
        $orders = array();
        if ($sqlOrders_result->num_rows > 0) {
            while ($row = $sqlOrders_result->fetch_assoc()) {
                $orders[$row['id']] = array(
                    'id' => $row['id'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'phone' => $row['phone'],
                    'city' => $row['city'],
                    'post' => $row['post'],
                    'date' => $row['date'],
                    'positions' => explode("; ", $row['positions']),
                    'totalcost' => $row['totalcost']
                );
            }
            $_SESSION['orders'] = $orders;
        };
    }

    if (isset($_GET['order'])) {
        $order_id = $_GET['order'];
        $sqlOrder = "SELECT * FROM orders WHERE id = $order_id";
        $sqlOrder_result = $conn->query($sqlOrder);
        $order_id = array();
        if ($sqlOrder_result->num_rows > 0) {
            while ($row = $sqlOrder_result->fetch_assoc()) {
                $order_id = array(
                    'id' => $row['id'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'phone' => $row['phone'],
                    'city' => $row['city'],
                    'post' => $row['post'],
                    'date' => $row['date'],
                    'positions' => explode("; ", $row['positions']),
                    'totalcost' => $row['totalcost'],
                    'status' => $row['status'],
                );
            }
        };
    }

    $_SESSION['last_update'] = time();
    $conn->close();
}
