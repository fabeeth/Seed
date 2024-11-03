<?php
$totalSum = isset($_SESSION['totalSum']) ? $_SESSION['totalSum'] : 0;  
// Подключение к базе данных
$conn = new mysqli("localhost", "root", "", "Semena1");
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получение данных из POST-запроса
$user_id = $_POST['user_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$tele = $_POST['tele'];
$gorod = $_POST['gorod'];
$dex = $_POST['dex'];
$ylica = $_POST['ylica'];
$dom = $_POST['dom'];
$kvartira = $_POST['kvartira'];
$payment_method = $_POST['payment_method'];

// Обработка данных карты, если выбран способ оплаты картой
if ($payment_method == 'card') {
    $carta = $_POST['carta'];
    $data = $_POST['data'];
    $cvv = $_POST['cvv'];
    // Добавьте здесь логику обработки платежей картой
}

// Рассчет итоговой суммы заказа
$totalSum = 0; // Замените на реальный расчет суммы

// Обновление данных пользователя в базе данных
$update_sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, Tele = ?, Gorod = ?, Dex = ?, Ylica = ?, Dom = ?, Kvartira = ? WHERE user_id = ?";
$stmt = $conn->prepare($update_sql);
$stmt->bind_param("sssssssssi", $first_name, $last_name, $email, $tele, $gorod, $dex, $ylica, $dom, $kvartira, $user_id);
$stmt->execute();

// Проверка успешности обновления данных
if ($stmt->affected_rows > 0) {
    echo "Данные успешно обновлены.";
} else {
    echo "Ошибка обновления данных.";
}

// Закрытие соединения
$stmt->close();
$conn->close();
?>