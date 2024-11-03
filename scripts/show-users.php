<?php
// подключение к серверу
require("connect.php");
require("authorize.php");
// если есть параметр msg в строке запроса
// получаем его значение и встраиваем его в строку html
if (isset($_REQUEST['msg'])) {
  $msg = sprintf("<div id='messages'><div
class='success'><p>%s</p></div></div>", $_REQUEST['msg']);
};
// создание строки инструкции SELECT
$select_sql = "SELECT `user_id`, `last_name`, `first_name`, `email`
FROM `users`";
// выполнение запроса
$res = $mysqli->query($select_sql);
// если запрос выполнен выводим список пользователей
if ($res) {
  while ($row = $res->fetch_array()) {
    $html .= sprintf(
      "<li>
<a href='show-user.php?user_id=%d'>%s %s</a>
(<a href='mailto:%s'>%s</a>)
<!-- ссылка на javascript функцию delete_user() -->
<a href='javascript:delete_user(%d)'><img class='delete_user'
src='../images/delete.png' width=15px /></a>
</li>",
      $row['user_id'],
      $row['first_name'],
      $row['last_name'],
      $row['email'],
      $row['email'],
      $row['user_id']
    );
  }
} else {
  header("Location: show-error.php?error_message=Ошибка вывода
  списка пользователей&system_error_message=" . $mysqli->error);
  exit;
}
?>
<html>

<head>
  <link href="../css/phpMM.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
      function delete_user(user_id) {
        if (confirm("Вы уверены, что хотите удалить этого пользователя ? \nВернуть его уже не удастся!")) {
            window.location = "delete-user.php?user_id=" + user_id;
          }
        }
    </script>
</head>

<body>
  <div class="wrap">
    <div id="header">
      <h1>PHP & MySQL: The Missing Manual</h1>
    </div>
    <div id="example">Список</div>
    <!—- подключаем файл меню -->
      <?php require("menu.php"); ?>
      <div id="content">
        <?php
        echo $msg;
        echo $html;
        ?>
      </div>
      <div id="footer"></div>
  </div>
</body>

</html>