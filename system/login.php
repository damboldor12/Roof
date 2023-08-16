<?php
// Підключення до бази даних
$servername = "localhost";
$username = "amshrxqk_roof";
$password = "********";
$dbname = "amshrxqk_roof";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

mysqli_set_charset($conn, 'utf8mb4');
// Отримання даних з форми
$email = $_POST['email'];
$password = $_POST['password'];
$redirectUrl = $_POST['redirect'];

// Підготовка та виконання запиту для отримання користувача за email
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $email, $hashed_password, $first_name, $last_name, $user_level);
    $stmt->fetch();
    // Використовуйте змінні $id, $email, $hashed_password, $first_name, $last_name, $user_level
    // та інші поля таблиці

    // Перевірка збігу пароля
    if (password_verify($password, $hashed_password)) {
        // Авторизація успішна
        session_start();
        $userData = array(
            'id' => $id,
            'email' => $email,
            'hashed_password' => $hashed_password,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'user_level' => $user_level
        );
        $_SESSION['user'] = $userData;

        header("Location: $redirectUrl");
        exit();
    } else {
        // Неправильний email або пароль
        echo "Неправильний email або пароль. Спробуйте знову.";
    }
} else {
    // Рядок не знайдено
    echo "Користувача з таким email не знайдено.";
}

$stmt->close();
$conn->close();

?>