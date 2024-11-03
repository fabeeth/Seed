<?php
// Подключение к базе данных 
include 'connect.php';

if(isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $sql = "SELECT * FROM Semena1.product WHERE id = '$product_id'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Возвращаем данные о товаре в формате JSON
        echo json_encode($row);
    } else {
        echo "Товар не найден";
    }

    $mysqli->close();
}
?>