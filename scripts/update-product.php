<?php
// Подключение к базе данных 
include 'connect.php';

if(isset($_POST['product_id']) && isset($_POST['name']) && isset($_POST['type']) && isset($_POST['group']) && isset($_POST['cycle']) && isset($_POST['img']) && isset($_POST['price']) && isset($_POST['about']) && isset($_POST['brand'])) {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $group = $_POST['group'];
    $cycle = $_POST['cycle'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $about = $_POST['about'];
    $brand = $_POST['brand'];

    $sql = "UPDATE Semena1.product 
            SET Name='$name', Вид='$type', Группа='$group', Цикл='$cycle', img='$img', price='$price', About='$about', Бренд='$brand' 
            WHERE id='$product_id'";

    if ($mysqli->query($sql) === TRUE) {
        // Перенаправление с параметром success
        header('Location: ../index.php?success=true#UpdateProduct');
        
        exit();
    } else {
        echo "Ошибка при изменение: " . $mysqli->error;
    }

    $mysqli->close();
}
?>