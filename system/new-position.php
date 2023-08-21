<?php
// Підключення до бази даних
$servername = "localhost";
$username = "amshrxqk_roof";
$password = "********";
$dbname = "amshrxqk_roof";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Помилка підключення до бази даних: " . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');
if (isset($_POST['form-name']) && $_POST['form-name'] == 'bean') {
$name = $_POST['name'];
$region = $_POST['region'];
$country = $_POST['country'];
$height = $_POST['height'];
$process = $_POST['process'];
$roast = $_POST['roast'];
$description = $_POST['description'];
$cost = $_POST['cost'];
$redirectUrl = $_POST['redirect'];
$sql = "INSERT INTO price (name, country, region, height, process, roast, descriptions, cost) VALUES ('$name', '$country', '$region', '$height', '$process', '$roast', '$description', '$cost')";
}

else if (isset($_POST['form-name']) && $_POST['form-name'] == 'drip') {
$name = $_POST['name'];
$items = $_POST['items'];
$description = $_POST['description'];
$cost = $_POST['cost'];
$redirectUrl = $_POST['redirect'];
$sql = "INSERT INTO drips (name, items, description, cost) VALUES ('$name', '$items', '$description', '$cost')";

}

session_start();
if (mysqli_query($conn, $sql)) {
    $_SESSION['notice'] = 'Позиція ' . $name . ' створена!';
    header("Location: $redirectUrl");
} else {
    $_SESSION['notice'] = "Помилка при створенні запису: " . mysqli_error($conn);
    header("Location: $redirectUrl");
}
