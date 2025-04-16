<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '/../php/src/helpers.php';
include_once __DIR__ . '/../php/element.php';
include_once __DIR__ . '/../php/src/config.php';

//register
$nickname = $_POST["nickname"];
$email = $_POST["email"];
$password = $_POST["password"];

// Подготовка запроса для проверки существующего пользователя с такой же почтой
$checkQuery = "SELECT * FROM users WHERE email='$email'";
$checkResult = mysqli_query($conn, $checkQuery);

// Проверка, если пользователь с такой же почтой уже существует
if (mysqli_num_rows($checkResult) > 0) {
    unset($_SESSION["nickname"]);
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    unset($_COOKIE['sensor']);
    unset($_SESSION['sensor']);
    $_SESSION["tom"] = false;
    header("Location: traker.php");
    exit;
}

$pdo = getPDO();

$query = "INSERT INTO users (nickname, email, password, psd, icon) VALUES (:nickname, :email, :password, :psd, :icon)";

$params = [
    'nickname' => $nickname,
    'email' => $email,
    'icon' => '/../images/icon/noauth.jpg',
    'psd' => pass_send($password),
    'password' => password_hash($password, PASSWORD_DEFAULT)
];

$stmt = $pdo->prepare($query);

try {
    $stmt->execute($params);
    echo "<script>window.location.href = 'log-in.php';</script>";
} catch (\Exception $e) {
    die($e->getMessage());
}