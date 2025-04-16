<?php

// PDO
const DB_HOST = 'server32.hosting.reg.ru'; /*имя хостинга*/
const DB_PORT = '3306'; /*порт хостинга */
const DB_NAME = 'u2959048_polytech'; /* имя папки базы данных */
const DB_USERNAME = 'u2959048_envpoly'; /* логин от БД */
const DB_PASSWORD = 'timqwees2018'; /* Пароль от БД */

// Без PDO
$servername = "server32.hosting.reg.ru";
$dbname = "u2959048_polytech";
$username = "u2959048_envpoly";
$password = "timqwees2018";

$conn = new mysqli(
    $servername,
    $username,
    $password,
    $dbname
);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}
?>