<?php
    session_start();
    
    // Получение ID пользователя из сессии
    $user_id = $_SESSION['user_id'];
    
    // Использование ID пользователя в других частях вашего приложения
    echo "ID текущего пользователя: " . $user_id;
    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="Tovar.css" />
    <script>
        // Функция для замены текста на странице
        function replaceText() {
            var userName = "<?php echo isset($_GET['first_name']) ? $_GET['first_name'] : 'Вход/Регистрация'; ?>";
            var textToReplace = document.getElementById('text-to-replace');
            textToReplace.innerHTML = userName;
        }
    </script>
  </head>
  <body>
    <div class="main-page">
      <div class="div">
        <div class="overlap">
          <div class="rectangle"></div>
          <div class="top-line">
            <div class="overlap-group">
              <div class="navbar">
                <div class="text-wrapper">О нас</div>
                <div class="text-wrapper-2">Акции</div>
                <div class="text-wrapper-3">Контакты</div>
                <div class="text-wrapper-4">Как оформить заказ</div>
                <div class="text-wrapper-5">Оплата</div>
                <div class="text-wrapper-6">Доставка</div>
              </div>
              <div class="top-line-account">
              <div class="text-wrapper-7">
                <body onload="replaceText()">
                <a href="scripts/reglog.php" style="text-decoration: none; color: inherit;">
                <div id="text-to-replace">Вход/Регистрация</div>
                </a>
                <body>
              </div>
                <a href="url_другой_страницы">
                <img class="vector" src="img/account.png" />
                </a>
                <img class="img" src="img/Vector2.png" />
              </div>
              <div class="text-wrapper-8">СЕМЕНА</div>
            </div>
          </div>
          <p class="p">Садоводство – шаг к здоровому образу жизни</p>
        <div class="button-catalog"><div class="text-wrapper-9">КАТАЛОГ СЕМЯН</div></div>
          <div class="down-line">
            <img class="line-2" src="img/line-2.svg" />
            <img class="line-3" src="img/line-4.svg" />
            <img class="line-4" src="img/line-3.svg" />
            <img class="line-5" src="img/line-5.svg" />
          </div>
          <img class="icon-park-outline" src="img/icon-park-outline_hold-seeds.png" />
        </div>
        <div class="group-wrapper">
          <div class="group">
            <p class="div-2">
              <span class="span">Не знаете что выбрать? </span>

            </p>
            <p class="div-3">
              <span class="text-wrapper-10">Посетите наши магазины в смоленске</span>
            </p>
            <div class="overlap-group-wrapper">
              <div class="div-wrapper"><div class="text-wrapper-11">Наши Магазины</div></div>
            </div>
          </div>
        </div>
        <div class="group-2" style="top: 700px">
          <a href="Tovar/zatek.php">
          <div class="group-9">
            <div class="overlap-3"><div class="text-wrapper-19"></div></div>
          </div>
      </a>
      <form action="add_to_cart.php" method="post">
          <div class="group-10">
            <div class="text-wrapper-20">F1 Зятёк</div>
            <div class="opisZatek">Тип: Семена<br>
Вид посадочного материала: Огурцы<br>
Назначение посадочного материала: Для диетического питания, Для консервирования, Для огорода <br>
Сорт семян: ЗЯТЕК F1<br>
Жизненный цикл: Однолетник<br><br>
<div class="hide" visibility: hidden>
<label for="product_id">Product ID:</label>
          <input type="text" name="product_id" id="product_id" readonly value="1">
      </div>
          <label for="quantity">Количество:</label>
          <input type="text" name="quantity" id="quantity">

          <div class="hide" visibility: hidden>
          <label for="user_id">Пользователь:</label>
          <input type="text" name="user_id" id="user_id" readonly value="99999">
          </div>
    
          <button type="submit">Добавить в корзину</button>
          </div>



          </div>
          <form>
        </div>
        <div class="group-17">
          <div class="text-wrapper-27">Доставка</div>
          <div class="text-wrapper-28">Политика Конфиленциальности</div>
          <div class="text-wrapper-29">8 (908) 283-14-72</div>
          <div class="text-wrapper-30">8 (904) 368-00-15</div>
          <div class="fomichyov-ANDREJ">fomichyov.andrej@yandex.ru</div>
          <div class="text-wrapper-31">Акции</div>
          <div class="text-wrapper-32">Оплата</div>
          <div class="overlap-11">
            <div class="group-18">
              <div class="overlap-group-4">
                <div class="text-wrapper-33">ПОЛЕЗНЫЕ ССЫЛКИ</div>
                <img class="line-6" src="img/line62323-1ir4.svg" />
              </div>
            </div>
            <div class="group-18">
              <div class="overlap-group-4">
                <div class="text-wrapper-33">ПОЛЕЗНЫЕ ССЫЛКИ</div>
                <img class="line-6" src="img/line62323-1ir4.svg" />
              </div>
            </div>
          </div>
          <div class="group-19">
            <div class="overlap-group-4">
              <div class="text-wrapper-33">ОПЛАТА</div>
              <img class="line-6" src="img/line62323-1ir4.svg" />
            </div>
          </div>
          <div class="group-20">
            <div class="overlap-group-4">
              <div class="text-wrapper-33">КОНТАКТЫ</div>
              <img class="line-6" src="img/line62323-1ir4.svg" />
            </div>
          </div>
          <div class="group-21">
            <div class="overlap-group-4">
              <div class="text-wrapper-33">СОЦИАЛЬНЫЕ СЕТИ</div>
              <img class="line-6" src="img/line62323-1ir4.svg" />
            </div>
          </div>
          <div class="ellipse"></div>
          <div class="ellipse-2"></div>
          <div class="ellipse-3"></div>
          <div class="ellipse-4"></div>
          <img class="material-symbols" src="img/materialsymbolsmail2629-84ao.svg" />
          <img class="phone" src="img/phone2.png" />
          <img class="phone-2" src="img/phone2.png" />
          <div class="ellipse-5"></div>
          <p class="div-4">
            <span class="text-wrapper-34">Так же мы в социальных сетях</span>
          </p>
        </div>
      </div>
    </div>
  </body>
</html>

