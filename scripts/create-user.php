<?php
session_start();

// Function to validate email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate password
function validatePassword($password) {
    return preg_match('/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,24}$/', $password);
}

// Retrieving and trimming input data
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Validation checks
$errors = [];

if (!validateEmail($email)) {
    $errors[] = 'Неправильный формат email';
}

if (!validatePassword($password)) {
    $errors[] = 'Пароль должен быть длиной от 8 до 24 символов, содержать минимум 1 заглавную букву и 1 цифру';
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: ../index.php");
    exit;
}

// Database connection
require("connect.php");

// Insert user into the database
$insert_sql = sprintf(
    "INSERT INTO users (first_name, last_name, email, password) VALUES ('%s', '%s', '%s', '%s')",
    $mysqli->real_escape_string($first_name),
    $mysqli->real_escape_string($last_name),
    $mysqli->real_escape_string($email),
    $mysqli->real_escape_string($password)
);

if (!$mysqli->query($insert_sql)) {
    header("Location: show-error.php?error_message=Ошибка вставки данных&system_error_message=" . $mysqli->error);
    exit;
}

$user_id = $mysqli->insert_id;

// Save user ID and name in session
$_SESSION['user_id'] = $user_id;
$_SESSION['first_name'] = $first_name;
$_SESSION['email'] = $email;

header("Location: ../index.php");
exit;
?>