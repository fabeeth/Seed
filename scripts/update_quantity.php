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
$quantity = $_POST['quantity'];  
 
// Запрос на обновление количества в базе данных 
$sql = "UPDATE cart SET quantity = ? WHERE id = ?";  
 
$stmt = $conn->prepare($sql);  
$stmt->bind_param("ii", $quantity, $cartId);  
 
if ($stmt->execute()) {  
  // Обновляем данные в сессии на сервере
  session_start();
  if (isset($_SESSION['cart_products'])) {
    foreach ($_SESSION['cart_products'] as &$product) {
        if ($product['id'] == $cartId) {
            $product['quantity'] = $quantity;
            break;
        }
    }
  }

  echo "success";  
} else {  
  echo "error";  
}  
 
$conn->close();  
?>