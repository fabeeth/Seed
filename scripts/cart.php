
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
 
// Получение user_id из запроса (например, из $_GET или $_POST) 
$user_id = $_GET['user_id']; // Пример, измените в соответствии с вашими требованиями 
 
// Запрос для получения данных из таблицы cart 
$sql = "SELECT c.*, p.Name, p.Вид, p.Группа, p.Цикл, p.img, p.price, p.About, p.Бренд 
        FROM cart c 
        JOIN product p ON c.product_id = p.id 
        WHERE c.user_id = ?"; 
 
$stmt = $conn->prepare($sql); 
$stmt->bind_param("i", $user_id); 
$stmt->execute(); 
$result = $stmt->get_result(); 
 
// Вывод данных 
if ($result->num_rows > 0) { 
  echo "<table> 
          <thead> 
            <tr> 
              <th>Название</th> 
              <th>Вид</th> 
              <th>Группа</th> 
              <th>Цикл</th> 
              <th>Изображение</th> 
              <th>Цена</th> 
              <th>Описание</th> 
              <th>Бренд</th> 
              <th>Количество</th> 
              <th>Изменить</th> 
            </tr> 
          </thead> 
          <tbody>"; 
 
  while ($row = $result->fetch_assoc()) { 
    echo "<tr> 
            <td>" . $row['Name'] . "</td> 
            <td>" . $row['Вид'] . "</td> 
            <td>" . $row['Группа'] . "</td> 
            <td>" . $row['Цикл'] . "</td> 
            <td><img src='" . $row['img'] . "' width='50' height='50'></td> 
            <td>" . $row['price'] . "</td> 
            <td>" . $row['About'] . "</td> 
            <td>" . $row['Бренд'] . "</td> 
            <td><input type='number' id='quantity_" . $row['id'] . "' value='" . $row['quantity'] . "'></td> 
            <td> 
              <button onclick='updateQuantity(" . $row['id'] . ")'>Обновить</button> 
            </td> 
          </tr>"; 
  } 
 
  echo "</tbody> 
        </table>"; 
 
  // JavaScript для обновления количества 
  echo "<script> 
  function updateQuantity(cartId) { 
    var quantity = document.getElementById('quantity_' + cartId).value; 
  } 
  </script>"; 
} else { 
  echo "Нет товаров в корзине"; 
} 
 
// Закрытие соединения 
$conn->close(); 
?> 