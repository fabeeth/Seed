<?php
require("connect.php"); // Подключение к базе данных

// Получаем данные из POST
$product_id = $_POST['product_id'];
$user_id = $_POST['user_id'];
$quantity = $_POST['quantity'];

// Проверяем, есть ли уже такой товар в корзине пользователя
$check_query = sprintf(
    "SELECT * FROM cart WHERE product_id = %d AND user_id = %d",
    $product_id,
    $user_id
);
$check_result = $mysqli->query($check_query);

if ($check_result->num_rows > 0) {
    // Товар уже есть в корзине, увеличиваем количество
    $update_query = sprintf(
        "UPDATE cart SET quantity = quantity + %d WHERE product_id = %d AND user_id = %d",
        $quantity,
        $product_id,
        $user_id
    );
    if (!$mysqli->query($update_query)) {
        $response = array('status' => 'error', 'message' => 'Ошибка обновления количества в корзине.');
    } else {
        $response = array('status' => 'success', 'message' => 'Количество товара в корзине увеличено.');
    }
} else {
    // Товара нет в корзине, добавляем новую запись
    $insert_query = sprintf(
        "INSERT INTO cart (product_id, user_id, quantity) VALUES (%d, %d, %d)",
        $product_id,
        $user_id,
        $quantity
    );
    if (!$mysqli->query($insert_query)) {
        $response = array('status' => 'error', 'message' => 'Ошибка добавления товара в корзину.');
    } else {
        $response = array('status' => 'success', 'message' => 'Товар успешно добавлен в корзину.');
    }
}

// Отправляем JSON-ответ
header('Content-Type: application/json');
echo json_encode($response);

// Закрываем соединение с базой данных
$mysqli->close();
?>