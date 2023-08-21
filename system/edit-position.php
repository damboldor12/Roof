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
    $id = $_POST['id'];
    $name = $_POST['name'];
    $region = $_POST['region'];
    $country = $_POST['country'];
    $height = $_POST['height'];
    $process = $_POST['process'];
    $roast = $_POST['roast'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $redirectUrl = $_POST['redirect'];

    $sql = "UPDATE price SET name='$name', country='$country', region='$region', height='$height', process='$process', roast='$roast', descriptions='$description', cost='$cost' WHERE id='$id'";
}

if (isset($_POST['form-name']) && $_POST['form-name'] == 'drip') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $items = $_POST['items'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $redirectUrl = $_POST['redirect'];

    $sql = "UPDATE drips SET name='$name', items='$items', description='$description', cost='$cost' WHERE id='$id'";
}


session_start();
if (mysqli_query($conn, $sql)) {
    $_SESSION['notice'] = 'Позиція ' . $name . ' створена!';
    header("Location: $redirectUrl");
    exit();
} else {
    $_SESSION['notice'] = "Помилка при створенні запису: " . mysqli_error($conn);
    header("Location: $redirectUrl");
    exit();
}
