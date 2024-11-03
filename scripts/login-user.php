<?php
session_start();

$email = trim($_REQUEST['email']);
$password = trim($_REQUEST['password']);

require("connect.php");

$select_sql = sprintf(
    "SELECT user_id, first_name FROM users WHERE email = '%s' AND password = '%s'",
    $mysqli->real_escape_string($email),
    $mysqli->real_escape_string($password)
);

$result = $mysqli->query($select_sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Сохранение ID пользователя в сессии
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['email'] = $email;

    // Перенаправление на главную страницу
    header("Location: ../index.php");
    exit;
} else {
    $_SESSION['error_message2'] = 'Неверный email или пароль';
    header("Location: ../index.php#openModal1");
    exit;
}
?>