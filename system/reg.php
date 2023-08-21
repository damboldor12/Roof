<?php
// Підключення до бази даних
$servername = "localhost";
$username = "amshrxqk_roof";
$password = "1k2Ae!16iRGC;f";
$dbname = "amshrxqk_roof";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

mysqli_set_charset($conn, 'utf8mb4');
// Отримання даних з форми або іншого джерела
$email = $_POST['email'];
$password = $_POST['password']; // Пароль перед хешуванням
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_level = '1';

// Хешування пароля
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Підготовка та виконання запиту на вставку
$stmt = $conn->prepare("INSERT INTO users (email, password, first_name, last_name, user_level) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $email, $hashedPassword, $first_name, $last_name, $user_level);
if ($stmt->execute()) {
    echo "Новий користувач успішно створений.";

    // Зворотній відлік і редирект через 3 секунди
    header("Refresh: 3; URL=/coffeeman");
    exit();
}
 else {
    echo "Помилка при створенні користувача: " . $conn->error;
}

$stmt->close();
$conn->close();
