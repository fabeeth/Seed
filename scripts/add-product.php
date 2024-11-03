<?php 
// Подключение к базе данных 
include 'connect.php';

if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['group']) && isset($_POST['cycle']) && isset($_POST['img']) && isset($_POST['price']) && isset($_POST['about']) && isset($_POST['brand'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $group = $_POST['group'];
    $cycle = $_POST['cycle'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $about = $_POST['about'];
    $brand = $_POST['brand'];

    $sql = "INSERT INTO Semena1.product (Name, Вид, Группа, Цикл, img, price, About, Бренд) VALUES ('$name', '$type', '$group', '$cycle', '$img', '$price', '$about', '$brand')";

    if ($mysqli->query($sql) === TRUE) {
        // Перенаправление с параметром success
        header('Location: ../index.php?success=true#AddProduct');
        
        exit();
    } else {
        echo "Ошибка при добавление: " . $mysqli->error;
    }

    $mysqli->close();
}
?>