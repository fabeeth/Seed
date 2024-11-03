<style> 
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
    font-family: Genshin;
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
    .payment-option img{ 
        width: 60%;
    } 
    .payment-details { 
        display: none; 
    } 
</style>
<?php   session_start();
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Semena1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение user_id из GET запроса
$user_id = $_GET['user_id'];
$totalSum = isset($_SESSION['totalSum']) ? $_SESSION['totalSum'] : 0; // Пример суммы заказа, может быть динамически вычислена

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_method = $_POST['payment_method'];
    $Date = date("Y-m-d H:i:s");

    if ($payment_method == "Карта") {
        $Carta = $_POST['Carta'];
        $Data = $_POST['Data'];
        $CVV = $_POST['CVV'];

        $sql = "UPDATE users SET Carta = ?, Data = ?, CVV = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $Carta, $Data, $CVV, $user_id);
        $stmt->execute();

        $sql = "UPDATE orders SET Carta = 'Оплачено картой', Date = ?, SummaCarta = ? WHERE user_id = ? AND Date IS NULL";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdi", $Date, $totalSum, $user_id);
        $stmt->execute();
    } elseif ($payment_method == "Наличные") {
        $Nal = $totalSum;

        $sql = "UPDATE users SET Nal = 'Оплата при получение' WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $sql = "UPDATE orders SET Nal = 'Оплата при получение', Date = ?, SummaNal = ? WHERE user_id = ? AND Date IS NULL";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdi", $Date, $totalSum, $user_id);
        $stmt->execute();
    } elseif ($payment_method == "SBP") {
        $CBP = 'Оплачено';

        $sql = "UPDATE users SET CBP = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $CBP, $user_id);
        $stmt->execute();

        $sql = "UPDATE orders SET CBP = 'Оплачено по СБП', Date = ?, SummaCBP = ? WHERE user_id = ? AND Date IS NULL";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdi", $Date, $totalSum, $user_id);
        $stmt->execute();
    }

    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Оплата заказа</title>
    <style>
        .payment-details {
            display: none;
        }
    </style>
    <script>
        function showPaymentDetails(method) {
            document.querySelectorAll('.payment-details').forEach(div => div.style.display = 'none');
            document.getElementById(method).style.display = 'block';
        }
    </script>
</head>
<body>
<div class="container"> 
      <div id="successMessage" class="hidden success-message">
        <a href="index.php">
        <button class="automenu">На главную</button>
        </a>
      </div>
    <h2>Способ оплаты</h2>
    <p>Итоговая сумма: <?php echo $totalSum; ?></p>
    <form method="post">
    <div class="payment-options"> 
    <div class="payment-option"> 
        <label>Выберите способ оплаты:</label><br>
        <input type="radio" name="payment_method" value="Карта" onclick="showPaymentDetails('card')"> Карта<br>
        <input type="radio" name="payment_method" value="Наличные" onclick="showPaymentDetails('cash')"> Наличные<br>
        <input type="radio" name="payment_method" value="SBP" onclick="showPaymentDetails('sbp')"> СБП<br>

        <div id="card" class="payment-details">
            <label>Номер карты: <input type="text" name="Carta"></label><br>
            <label>Дата: <input type="text" name="Data"></label><br>
            <label>CVV: <input type="text" name="CVV"></label><br>
            <button type="submit" class="automenu">Оплатить</button>
        </div>
</div>
<div class="payment-option">
        <div id="cash" class="payment-details">
            <label>Сумма к оплате: <input type="text" name="Nal" value="<?php echo $totalSum; ?>" readonly></label><br>
            <button type="submit" class="automenu">При получение</button>
        </div>
        </div>
        <div class="payment-option">
        <div id="sbp" class="payment-details">
            <img src="img/qr.jpg" alt="SBP QR Code"><br>
            <button type="submit" class="automenu">Оплачено</button>
        </div>
        </div>
        </div>
    </form>

    <script>
        function copyToClipboard() {
            // Копирование ссылки в буфер обмена
            navigator.clipboard.writeText("http://tinkoff.ru/rm/fomichev.kirill96/veqfG71083").then(function() {
                alert("Link copied to clipboard");
            });
        }
    </script>
</body>
</html>