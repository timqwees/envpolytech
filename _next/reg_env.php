<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

include_once __DIR__ . '/../php/src/helpers.php';
include_once __DIR__ . '/../php/src/config.php';
$user = currentUser();
$user_id = $user['id'] ?? null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['event_id'])) {
  $event_id = $_POST['event_id']; // Проверка на наличие существующей записи о регистрации
  $checkSql = "SELECT COUNT(*) FROM registrations WHERE user_id = ? AND event_id = ?";
  $checkStmt = $conn->prepare($checkSql);
  $checkStmt->bind_param("ii", $user_id, $event_id);
  $checkStmt->execute();
  $checkStmt->bind_result($count);
  $checkStmt->fetch();
  $checkStmt->close();

  // Если запись существует выводим сообщение
  if ($count > 0) {
    echo "<script>alert('Вы уже зарегистрировались на это мероприятие.');</script>";
    echo "<script>window.location.href = '/../index.php';</script>";
  } else if (empty($user['id']) or !isset($user['id'])) {
    echo "<script>window.location.href = '/../regist/sign-up.php';</script>";
  } else {
    // Запрос на регистрацию
    $sql = "INSERT INTO registrations (user_id, event_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $event_id);
    if ($stmt->execute()) {
      echo "<script>alert('Вы успешно зарегистрировались на мероприятие!');</script>";
      echo "<script>window.location.href = '/../index.php';</script>";
    } else {
      echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
  }
}

$conn->close();