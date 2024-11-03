<?php
session_start();
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "Semena1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения 
if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $question = $_POST['question'];

    // Подготовка и выполнение SQL запроса для вставки данных в таблицу appeals
    $stmt = $conn->prepare("INSERT INTO appeals (email, first_name, question) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $first_name, $question);

    if ($stmt->execute()) {
        header("Location: ../index.php");
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>