<?php
// Подключение к базе данных 
include 'connect.php';

if(isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

 $sql = "DELETE FROM Semena1.product WHERE id = '$product_id'";

    if ($mysqli->query($sql) === TRUE) {
        // Перенаправление с параметром success
        header('Location: ../index.php?success=true#DeleteProduct');
        
        exit();
    } else {
        echo "Ошибка при удалении: " . $mysqli->error;
    }

    $mysqli->close();
}
?>