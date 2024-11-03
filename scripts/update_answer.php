<?php
session_start();
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
    $id_appeal = $_POST['id_appeal'];
    $answer = $_POST['answer'];

    // Подготовка и выполнение SQL запроса для обновления поля answer
    $stmt = $conn->prepare("UPDATE appeals SET answer = ? WHERE id_appeal = ?");
    if ($stmt === false) {
        echo json_encode(["status" => "error", "message" => "Prepare failed: " . $conn->error]);
        exit();
    }
    $stmt->bind_param("si", $answer, $id_appeal);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Ответ успешно обновлен."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Ошибка: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>