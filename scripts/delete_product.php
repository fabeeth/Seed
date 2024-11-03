<?php 
// Подключение к базе данных 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "Semena1"; 
 
$conn = new mysqli($servername, $username, $password, $dbname); 
 
// Проверка соединения 
if ($conn->connect_error) { 
  die("Connection failed: " . $conn->connect_error); 
} 
 
$cartId = $_POST['cartId']; 
 
// Запрос на удаление товара из корзины 
$sql = "DELETE FROM cart WHERE id = ?"; 
 
$stmt = $conn->prepare($sql); 
$stmt->bind_param("i", $cartId); 
 
if ($stmt->execute()) { 
  echo "Товар успешно удален.";  
} else { 
  echo "Ошибка при удалении товара."; 
} 
 
$conn->close(); 
?> 