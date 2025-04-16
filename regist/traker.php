<?php
// Запуск сеанса
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Генерация криптографически безопасного датчика
if (!isset($_SESSION['sensor'])) {
    unset($_SESSION['sensor']);
    $grsw = "Mos_Env_Polytech_Reg=";
    $checker = "::@Env_Polytech";
    $_SESSION['sensor'] = $grsw . bin2hex(random_bytes(16)) . $checker;
}

// Создание ссылки на страницу регистрации с датчиком в качестве параметра
$registrationUrl = "sign-up.php?sensor=" . $_SESSION['sensor'];

// Отправка куки с уникальным идентификатором сессии
setcookie('sensor', $_SESSION['sensor'], time() + 900, '/'); // Кука истекает через 10 минут

header("Location: $registrationUrl");
exit;
?>