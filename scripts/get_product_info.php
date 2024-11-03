<?php 
include 'connect.php'; 
 
// Выполните запрос к базе данных для получения информации о товаре 
$sql = "SELECT Name FROM product WHERE id = 1"; // Предположим, что товар с id=1 
$result = $conn->query($sql); 
 
if ($result->num_rows > 0) { 
    $row = $result->fetch_assoc(); 
    echo $row["Name"]; 
} else { 
    echo "Товар не найден"; 
} 
 
$conn->close(); 
?> 