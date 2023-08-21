<?php

// Підключення до бази даних
$servername = "localhost";
$username = "amshrxqk_roof";
$password = "1k2Ae!16iRGC;f";
$dbname = "amshrxqk_roof";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Помилка підключення до бази даних: " . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');
session_start();
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$post = $_POST['post'];
$redirectUrl = $_POST['redirect'];
$positions = ''; // Ініціалізація змінної $positions
$totalcost = 0;
foreach ($_SESSION['selected_positions'] as $position) {
    $positions .= $position['name'] . ' - ' . $position['quantity'] . 'g - ' . $position['cost'] . '; '; // Додавання рядка до $positions з роздільниками
    $totalcost += $position['cost'];
}

$sql = "INSERT INTO orders (first_name, last_name, phone, city, post, positions, totalcost) VALUES ('$first_name', '$last_name', '$phone', '$city', '$post', '$positions', $totalcost)";

if (mysqli_query($conn, $sql)) {
    $_SESSION['notice'] = 'Дякуємо за замовлення!';
    $order_id = mysqli_insert_id($conn);
    unset($_SESSION['selected_positions']);
    header("Location: /?order=$order_id");
} else {
    $_SESSION['notice'] = "Помилка при створенні запису: " . mysqli_error($conn);
    header("Location: $redirectUrl");
}
?>