<style> 
    /* Стили для формы */ 
    body { 
        font-family: Genshin; 
        background-color: black;
    } 
    .container { 
        max-width: 500px; 
        margin: 0 auto; 
        padding: 20px; 
        border: 1px solid #ccc; 
        background-color: #56ab2f;
        border-radius: 25px;
        box-shadow: 0 5px 15px rgba(0, 128, 0, 1);
    } 
    p {
        font-weight: bold;
        
    }
    h2 { 
        color: #050505;
        font-family: Genshin;  /* Зеленый цвет для заголовка */
    } 
    h3 { 
        color: #050505;
        font-family: Genshin;  /* Зеленый цвет для заголовка */
    } 
    label { 
        display: block; 
        margin-bottom: 5px; 
        color: #333; /* Цвет текста метки */
        font-family: Genshin; 
        font-weight: bold;
    } 
    input[type="text"] , 
    input[type="number"], 
    input[type="email"], 
    select { 
        width: 100%; 
        padding: 10px; 
        margin-bottom: 10px; 
        border: 1px solid #ccc; 
        border-radius: 4px; 
        box-sizing: border-box; 
        
        
    } 
    .automenu {
    width: 150px;
    height: 40px;
    color: white;
    font-family: fonts/Genshin;
    border-radius: 30px;
    background-color: black;
    border: 2px solid #D9FC00;
    letter-spacing: 2px;
    cursor: pointer;
    text-decoration: none; /* Отключение подчеркивания для ссылок */ 
    
}
.automenu:hover {
    background-color: #D9FC00;
    color: #050505;
    transition: 0.5s;
}
    button:hover { 
        background-color: #45a049; /* Темно-зеленый фон при наведении */
    } 
    .payment-options { 
        margin-top: 20px; 
    } 
    .payment-option { 
        margin-bottom: 10px; 
    } 
    .payment-details { 
        display: none; 
    } 
</style>
<?php
session_start();

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Semena1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение user_id из GET или POST запроса
$user_id = $_SESSION['user_id'] ?? $_POST['user_id'] ?? null;
$user_data = [];

if ($user_id) {
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();
}

$totalSum = isset($_SESSION['totalSum']) ? $_SESSION['totalSum'] : 0; // Общая сумма заказа

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $Tele = $_POST['Tele'];
    $Gorod = $_POST['Gorod'];
    $Dex = $_POST['Dex'];
    $Ylica = $_POST['Ylica'];
    $Dom = $_POST['Dom'];
    $Kvartira = $_POST['Kvartira'];

    if ($user_data) {
        $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, Tele = ?, Gorod = ?, Dex = ?, Ylica = ?, Dom = ?, Kvartira = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssi", $first_name, $last_name, $email, $Tele, $Gorod, $Dex, $Ylica, $Dom, $Kvartira, $user_id);
    } else {
        $sql = "INSERT INTO users (first_name, last_name, email, Tele, Gorod, Dex, Ylica, Dom, Kvartira) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $first_name, $last_name, $email, $Tele, $Gorod, $Dex, $Ylica, $Dom, $Kvartira);
    }
    $stmt->execute();

    if (!$user_id) {
        $user_id = $conn->insert_id;
    }

    // Сохранение данных в orders
    if (isset($_SESSION['cart_products'])) {
        $zakaz = ""; // Переменная для хранения данных о заказе в нужном формате

        foreach ($_SESSION['cart_products'] as $product) {
            $zakaz .= htmlspecialchars($product['Name']) . " - Количество: " . htmlspecialchars($product['quantity']) . "\n";
        }

        $sql = "INSERT INTO orders (user_id, Tele, Gorod, Dex, Ylica, Dom, Kvartira, first_name, last_name, zakaz) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssssss", $user_id, $Tele, $Gorod, $Dex, $Ylica, $Dom, $Kvartira, $first_name, $last_name, $zakaz);
        $stmt->execute();
    }

    header("Location: step2.php?user_id=$user_id");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Оформление заказа</title>
</head>
<body>
<div class="container"> 
    <h2>Оформление заказа</h2>
    <p>Итоговая сумма: <?php echo $totalSum; ?></p>
    <h3>Товары в корзине:</h3>
    <ul>
        <?php
        if (isset($_SESSION['cart_products'])) {
            foreach ($_SESSION['cart_products'] as $product) {
                echo "<li>" . htmlspecialchars($product['Name']) . " - Количество: " . htmlspecialchars($product['quantity']) . "</li>";
            }
        }
        ?>
    </ul>
    <form method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <label>Имя: <input type="text" name="first_name" value="<?php echo htmlspecialchars($user_data['first_name'] ?? ''); ?>"></label><br>
        <label>Фамилия: <input type="text" name="last_name" value="<?php echo htmlspecialchars($user_data['last_name'] ?? ''); ?>"></label><br>
        <label>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($user_data['email'] ?? ''); ?>"></label><br>
        <label>Телефон: <input type="text" name="Tele" value="<?php echo htmlspecialchars($user_data['Tele'] ?? ''); ?>"></label><br>
        <label>Город: <input type="text" name="Gorod" value="<?php echo htmlspecialchars($user_data['Gorod'] ?? ''); ?>"></label><br>
        <label>Район: <input type="text" name="Dex" value="<?php echo htmlspecialchars($user_data['Dex'] ?? ''); ?>"></label><br>
        <label>Улица: <input type="text" name="Ylica" value="<?php echo htmlspecialchars($user_data['Ylica'] ?? ''); ?>"></label><br>
        <label>Дом: <input type="text" name="Dom" value="<?php echo htmlspecialchars($user_data['Dom'] ?? ''); ?>"></label><br>
        <label>Квартира: <input type="text" name="Kvartira" value="<?php echo htmlspecialchars($user_data['Kvartira'] ?? ''); ?>"></label><br>
        <button class="automenu" type="submit">Далее</button>
    </form>
</div>
</body>
</html>