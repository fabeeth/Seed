<div class="header-center">
<?php
session_start();

// Получение ID пользователя и имени из сессии
$user_id = $_SESSION['user_id'];
$first_name = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'Аккаунт';

// Использование ID пользователя в других частях вашего приложения
echo "ID текущего пользователя: " . $user_id;

?>

<script>
    // Функция для замены текста на странице
    function replaceText() {
        var userName = "<?php echo $first_name; ?>";
        var textToReplace = document.getElementById('menuButton');
        textToReplace.innerHTML = userName;
    }

    // Вызов функции при загрузке страницы
    window.onload = replaceText;
</script>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="custom-cursor">
    <title>SemenaPlus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <style>
        .error-message {
            display: none;
            color: red;
        }
    </style>
    <script>
        function validateForm(event) {
            const email = document.querySelector('input[name="email"]').value;
            const password = document.querySelector('input[name="password"]').value;
            let valid = true;
            let errorMessage = '';

            // Email validation
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                valid = false;
                errorMessage += 'Неправильный формат email.<br>';
            }

            // Password validation
            const passwordPattern = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,24}$/;
            if (!passwordPattern.test(password)) {
                valid = false;
                errorMessage += 'Пароль должен быть длиной от 8 до 24 символов, содержать минимум 1 заглавную букву и 1 цифру.<br>';
            }

            if (!valid) {
                event.preventDefault();
                document.getElementById('error-message').innerHTML = errorMessage;
                document.getElementById('error-message').style.display = 'block';
            }
        }
    </script>
<div id="openModal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Зарегистрироваться</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    
      <form action="/scripts/create-user.php" method="POST" enctype="multipart/form-data" onsubmit="validateForm(event)">
        <label for="first_name">Имя:</label> <input type="text" size="52" name="first_name" size="20"><br><br>
        <label for="last_name">Фамилия :</label> <input type="text" name="last_name" size="45"><br><br>
        <label for="email">Email:</label> <input type="text" name="email" size="50"><br><br>
        <label for="password">Пароль:</label> <input type="password" name="password" size="48"><br><br>
        <div id="error-message" class="error-message">
            <?php
            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo $error . '<br>';
                }
                unset($_SESSION['errors']);
            }
            ?>
        </div><br>
        <input type="submit" value="Регистрация" class="automenu">
        <input type="reset" value="Очистить" class="automenu">
    </form>
      </div>
    </div>
  </div>
</div>
<style> 
    body { 
        font-family: Genshin; /* Изменение шрифта */ 
        color: #333; /* Изменение цвета текста */ 
    } 
 
    label { 
        font-weight: bold; /* Жирный текст для меток */ 
        color: #000; /* Цвет текста меток */ 
    } 
 
    input[type="text"], 
    input[type="password"] { 
        font-family: Arial, sans-serif; /* Изменение шрифта для текстовых полей */ 
        color: #333; /* Цвет текста для текстовых полей */ 
        padding: 5px; /* Добавление отступа вокруг текстовых полей */ 
    } 
 
    
</style> 

<style>
        .error2 {
            display: none;
            color: red;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const errorDiv = document.getElementById("error-message2");
            if (errorDiv.textContent.trim() !== "") {
                errorDiv.style.display = "block";
            }
        });
    </script>
          <?php
    $errorMessage2 = isset($_SESSION['error_message2']) ? $_SESSION['error_message2'] : '';
    unset($_SESSION['error_message2']);
    ?>


<div id="openModal1" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Войти</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    

      <div id="error-message2" class="error2"><?php echo $errorMessage2; ?></div>
    <form action="/scripts/login-user.php" method="POST" enctype="multipart/form-data">
        <label for="email">Email:</label> <input type="text" name="email" size="50"><br><br>
        <label for="password">Пароль:</label> <input type="password" name="password" size="48"><br><br>
        <input type="submit" value="Войти" class="auto">
        <input type="reset" value="Очистить" class="auto">
        
    </form>
    
      </div>
    </div>
  </div>
</div>
<?php $email = $_SESSION['email'];
?>
<style> 
    body { 
        font-family: Genshin; /* Изменение шрифта */ 
        color: #333; /* Изменение цвета текста */ 
    } 
 
    label { 
        font-weight: bold; /* Жирный текст для меток */ 
        color: #000; /* Цвет текста меток */ 
    } 
 
    input[type="email"], 
    input[type="first_name"],
    input[type="question"] { 
        font-family: Arial, sans-serif; /* Изменение шрифта для текстовых полей */ 
        color: #333; /* Цвет текста для текстовых полей */ 
        padding: 5px; /* Добавление отступа вокруг текстовых полей */ 
    } 
 
    
</style> 
<div id="svaz" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Обратная связь</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    

      <div id="error-message" class="error"><?php echo $errorMessage; ?></div>
      <form action="scripts/submit_appeal.php" method="post">
        <label for="email">Email:&nbsp &nbsp</label>
        <input type="email" id="email" name="email" <?php echo ' value="'.$email.'"' ?> required><br>

        <label for="first_name">Имя:&nbsp &nbsp&nbsp&nbsp</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" <?php if($first_name) echo ''; ?> required><br>

        <label for="question">Вопрос:</label>
        <textarea id="question" name="question" width:="" 588px;="" height:="" 430px;="" required="" style="width: 477px; height: 315px;"></textarea><br>

        <input type="submit" value="Отправить" class="automenu">
    </form>
    
      </div>
    </div>
  </div>
</div>


<div id="Podderzkha" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Обратная связь</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    
      <?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "Semena1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Запрос на получение всех обращений
$sql = "SELECT id_appeal, email, first_name, question, answer FROM appeals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table border="1">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Имя</th>
                <th>Вопрос</th>
                <th>Ответ</th>
            </tr>';
    // Вывод данных каждой строки
    while($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row["id_appeal"] . '</td>
                <td>' . $row["email"] . '</td>
                <td>' . $row["first_name"] . '</td>
                <td>' . $row["question"] . '</td>
                <td>
                    <select name="answer" onchange="updateAnswer(' . $row["id_appeal"] . ', this.value)">
                        <option value="Нет"' . ($row["answer"] == "Нет" ? ' selected' : '') . '>Нет</option>
                        <option value="Да"' . ($row["answer"] == "Да" ? ' selected' : '') . '>Да</option>
                    </select>
                </td>
              </tr>';
    }
    echo '</table>';
} else {
    echo "Нет обращений.";
}

$conn->close();
?>

<script>
function updateAnswer(id, value) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_answer.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send("id_appeal=" + id + "&answer=" + value);
}
</script>
    
      </div>
    </div>
  </div>
</div>





<div id="akcii" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Акции</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    

      <h3>В данный момент действующие акции отсутствуют</h3>
    
      </div>
    </div>
  </div>
</div>
<style>
        .container3 {
            display: flex;
            align-items: flex-start;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            max-width: 600px;
            margin: 50px auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .profile-pic {
            flex-shrink: 0;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
        .info3 {
            margin-left: 20px;
        }
        .name3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .text3 {
            color: #555;
        }
    </style>

<div id="otzv" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Отзывы</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    

    <div class="container3">
        <img src="img/avatar.png" alt="Profile Picture" class="profile-pic">
        <div class="info3">
            <div class="name3">Евгений Иванов</div>
            <div class="text3">
                Все отлично! Товар пришел!
            </div>
        </div>
    </div>
    <div class="container3">
        <img src="img/avatar.png" alt="Profile Picture" class="profile-pic">
        <div class="info3">
            <div class="name3">Руслан Афанасьев</div>
            <div class="text3">
                Все очень удобно и понятно
            </div>
        </div>
    </div>
    <div class="container3">
        <img src="img/avatar.png" alt="Profile Picture" class="profile-pic">
        <div class="info3">
            <div class="name3">Анатолия Мишкин</div>
            <div class="text3">
                Буду продолжать покупать у вас семена!
            </div>
        </div>
    </div>
      </div>
    </div>
  </div>
</div>


<div id="polit" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Политика конфиденциальности</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    
<p>Настоящая Политика конфиденциальности персональных данных (далее – «Политика конфиденциальности») представляет собой правила использования персональных данных Пользователя и действует в отношении всей информации, размещенной на Сайте, которую Администрация Сайта и/или посетители Сайта могут получить о Пользователе во время использования Сайта, его сервисов, программ и продуктов.<br>

Использование Сайта означает свободное, своей волей и в своих интересах согласие Пользователя с настоящей Политикой и указанными в ней условиями обработки его персональных данных; в случае несогласия с этими условиями Пользователь должен воздержаться от использования Сайта.<br>
<br>
<h3>1. ТЕРМИНЫ</h3>
<br>
В настоящем документе используются следующие термины:<br>
<br>
«Пользователь» – физическое лицо, имеющее доступ к Сайту посредством сети Интернет и использующее Сайт и/или его Сервисы в соответствии с их функционалом.<br>
«Персональные данные» – любая информация, относящаяся к прямо или косвенно определенному или определяемому физическому лицу (субъекту персональных данных). Анонимные технические данные, такие как IP-адрес, данные о web-браузере Пользователя (или иной программе, с помощью которой осуществляется доступ к Сайту), данные файлов cookies, технические характеристики оборудования и программного обеспечения Пользователя, дата и время доступа к Сайту, адреса запрашиваемых страниц и иная подобная информация, автоматически запрашиваемые и обрабатываемые серверами Сайта, не являются персональными данными.<br>
«Сайт» – совокупность программного обеспечения, визуального и информационного наполнения, доступ к которым обеспечивается посредством сети «Интернет» по доменному имени https://seedplus.ru<br>
«Сервис» – доступный Пользователю обособленный раздел Сайта, в т.ч. персонифицированный, имеющий определенный функционал.<br>
«Конфиденциальность персональных данных» – обязательное для выполнения Администрацией требование не передавать персональные данные Пользователя третьим лицам без согласия Пользователя либо без достаточного правового основания.<br>
«Обработка персональных данных» – любое действие (операция) или совокупность действий (операций), совершаемых с использованием средств автоматизации или без использования таких средств с персональными данными, включая сбор, запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение персональных данных.<br>
«Администрация» – Общество с ограниченной ответственностью «Семена почтой» в лице своих сотрудников, уполномоченных на управление Сайтом, организацию и/или осуществление обработки персональных данных, а также иные физические и юридические лица, осуществляющие указанные действия.<br>
«Cookies» – фрагмент данных, отправленный веб-сервером и хранимый на компьютере Пользователя, который веб-клиент или веб-браузер каждый раз пересылает веб-серверу в HTTP-запросе при попытке открыть страницу Сайта.<br>
«IP-адрес» – уникальный сетевой адрес узла в компьютерной сети, построенной по протоколу IP.<br>
Правовым основанием для деятельности по обработке персональных данных Пользователей Администрацией является Федеральный закон от 27.07.2006г. № 152-ФЗ «О персональных данных» (далее – «Закон»).<br>

<br>

<h3>2. ЦЕЛИ И СПОСОБЫ ОБРАБОТКИ ПЕРСОНАЛЬНЫХ ДАННЫХ</h3>

<br>
2.1. Обработка Администрацией Персональных данных Пользователя производится всеми законными способами, включая сбор, запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение Персональных данных как с использованием средств автоматизации, так и без них.
<br>
2.2. Сайт обрабатывает только те Персональные данные, которые необходимы для предоставления сервисов или исполнения соглашений с Пользователем, за исключением случаев, когда законодательством предусмотрено обязательное хранение Персональных данных в течение определенного законом срока.
<br>
Администрация не обрабатывает специальные категории Персональных данных Пользователя.
<br>
2.3. Персональные данные Пользователя Сайт обрабатывает в следующих целях:
<br>
2.3.1. Регистрация и дальнейшая идентификация Пользователя на Сайте для электронной и SMS рассылки;
<br>
2.3.2. Установления с Пользователем обратной связи, включая направление уведомлений, запросов, оказания услуг, обработку запросов и заявок от Пользователя;
<br>
2.3.3. Определения места нахождения Пользователя для обеспечения безопасности, предотвращения мошенничества;
<br>
2.3.4. Подтверждения достоверности и полноты персональных данных, предоставленных Пользователем;
<br>
2.3.5. Уведомления Пользователя Сайта о новостях компании;
<br>
2.3.6. Осуществления рекламной деятельности с согласия Пользователя;
<br>
2.3.7. Проведения статистических и иных исследований на основе обезличенных данных;
<br>
2.3.8. Улучшения качества работы Сайта;

<br>
<br>
<h3>3. УСЛОВИЯ ОБРАБОТКИ ПЕРСОНАЛЬНЫХ ДАННЫХ</h3>
<br>

3.1. Защита Персональных данных:
<br>
3.1.1. Администрация Сайта принимает все необходимые и достаточные правовые, организационные и технические меры для защиты Персональных данных Пользователей от несанкционированного доступа, уничтожения, изменения, блокирования, копирования, распространения, а также от иных неправомерных действий со стороны третьих лиц.
<br>
3.1.2. Принимаемые Администрацией меры по защите Персональных данных, в числе прочих, включают в себя:
<br>
- ограничение числа работников (с регламентацией их должностей), которым открыт доступ к персональным данным.
<br>
- назначение ответственного лица, обеспечивающего исполнение организацией законодательства в рассматриваемой сфере;
<br>
- утверждение перечня документов, содержащих персональные данные;
<br>
- издание внутренних документов по защите персональных данных, осуществление контроля за их соблюдением;
<br>
- утверждение списка лиц, имеющих право доступа в помещения, в которых хранятся персональные данные;
<br>
- утверждение порядка уничтожения информации;
<br>
- выявление и устранение нарушений требований по защите персональных данных;
<br>
- проведение профилактической работы с сотрудниками по предупреждению разглашения ими персональных данных.
<br>
3.2. В отношении Персональных данных Пользователя сохраняется их конфиденциальность, за исключением случаев добровольного предоставления Пользователем информации о себе неограниченному кругу лиц.
<br>
3.3. Сайт вправе с соблюдением требований законодательства передать Персональные данные Пользователя третьим лицам в следующих случаях:
<br>
3.3.1. Пользователь выразил согласие на такие действия;
<br>
3.3.2. Передача необходима для использования Пользователем определенного Сервиса либо для исполнения определенного соглашения с Пользователем;
<br>
3.3.3. Передача предусмотрена законодательством в рамках установленной законодательством процедуры;
<br>
3.3.4. В случае перехода прав и обязанностей Администрации к другому лицу ему также передаются все обязательства по соблюдению условий настоящей Политики применительно к полученным им персональным данным.
<br>
3.4. Обработка персональных данных Пользователя осуществляется без ограничения срока любым законным способом, в том числе в информационных системах персональных данных с использованием средств автоматизации или без использования таких средств. Обработка персональных данных Пользователей осуществляется в соответствии с Федеральным законом от 27.07.2006г. № 152-ФЗ «О персональных данных».
<br>
3.5. При утрате или разглашении персональных данных Администрация информирует Пользователя об утрате или разглашении персональных данных. При этом Администрация совместно с Пользователем принимает все необходимые меры по предотвращению убытков или иных отрицательных последствий, вызванных утратой или разглашением персональных данных Пользователя.
<br>
3.6. Администрация Сайта не проверяет достоверность персональных данных, предоставленных Пользователем. При этом Администрация исходит из того, что Пользователь предоставляет достоверные и достаточные персональные данные и поддерживает их в актуальном состоянии.
<br>
3.7. Обработка персональных данных производится с согласия Пользователя. Текст согласия – Приложение № 1 к настоящей Политике конфиденциальности.
<br>

<br>
<h3>4. ПРАВА И ОБЯЗАННОСТИ СТОРОН</h3>
<br>

4.1. Пользователь обязан:
<br>
4.1.1. Предоставить информацию о персональных данных необходимую для пользования Сайтом, 4.2. Пользователь вправе:
<br>
4.2.1. В любой момент отозвать согласие на обработку своих персональных данных (приложение № 1 к настоящей Политике конфиденциальности). Отзыв производится путем обращения на электронную почту fomichyov.andrej@yandex.ru
<br>
4.2.2. В любой момент изменять, обновлять, дополнять предоставленную информацию о персональных данных в случае изменения данной информации. Такие действия производятся путем отправления обращения на адрес fomichyov.andrej@yandex.ru
<br>
4.2.3. Получать информацию, касающуюся обработки его Персональных данных, в том числе предусмотренную ч. 7 ст. 14 Закона.
<br>
4.3. Администрация Сайта обязана:
<br>
4.3.1. Использовать полученную информацию исключительно для целей, указанных в п. 2.3 настоящей Политики конфиденциальности.
<br>
4.3.2. Обеспечить хранение персональных данных в тайне, не разглашать их без предварительного письменного разрешения Пользователя, а также не осуществлять их распространение любыми способами, за исключением случаев, предусмотренных настоящей Политикой конфиденциальности и законодательством РФ.
<br>
4.3.3. Принимать меры предосторожности для защиты конфиденциальности персональных данных Пользователя.
<br>
4.3.4. Осуществить либо обеспечить блокирование Персональных данных Пользователя, в случае выявления их неправомерной обработки.
<br>
4.3.5. В случае отзыва Пользователем данного им согласия на обработку своих персональных данных незамедлительно прекратить такую обработку. При наличии оснований, указанных в п.п. 2-11 ч. 1 ст. 6, ч. 2 ст. 10 и ч. 2 ст. 11 Закона, Администрация вправе продолжить обработку персональных данных. В случае, если сохранение Персональных данных более не требуется для целей их обработки, Администрация обязана уничтожить такие данные.
<br>
4.3.6. Предоставить Пользователю по его просьбе информацию, касающуюся обработки его персональных данных, в том числе предусмотренную ч. 7 ст. 14 Закона.
<br>
4.3.7. При обращении Пользователя внести необходимые изменения в его Персональные данные в том случае, если они являются неполными, неточными или неактуальными в срок, установленный Законом.
<br>
4.3.8. При обращении Пользователя и при представлении им сведений, подтверждающих, что Персональные данные являются незаконно полученными или не являются необходимыми для заявленной цели обработки уничтожить такие персональные данные в срок, установленный Законом.

<br>
<br>
<h3>5. ОТВЕТСТВЕННОСТЬ</h3>

<br>
5.1. Администрация Сайта несет ответственность за убытки, причиненные Пользователю в связи с неправомерным использованием персональных данных, в соответствии с законодательством Российской Федерации.
<br>
5.2. В случае утраты или разглашения персональных данных Администрация Сайта не несет ответственности, если такие данные:
<br>
5.2.1. Стали публичным достоянием до ее утраты или разглашения;
<br>
5.2.2. Были получены от третьей стороны до момента ее получения Администрацией Сайта;
<br>
5.2.3. Были разглашены с согласия Пользователя.
<br>

<br>
<h3>6. РАЗРЕШЕНИЕ СПОРОВ</h3>

<br>
6.1. Соблюдение претензионного порядка до обращения в суд по спорам, возникающим между Администрацией и Пользователями, является обязательным.
<br>
6.2. Получатель претензии в течение 10 рабочих дней со дня ее получения письменно уведомляет заявителя претензии о результатах ее рассмотрения.
<br>
6.3. При невозможности урегулирования спора в досудебном порядке, он подлежит передаче на рассмотрение в суд города Москвы.
<br>
6.4. К отношениям между Пользователем и Администрацией Сайта в связи с вопросами обработки Персональных данных применяется законодательство Российской Федерации.
<br>

<br>
<h3>7. ПРОЧЕЕ</h3>
<br>

7.1. Администрация Сайта вправе вносить изменения в настоящую Политику конфиденциальности без согласия Пользователей. Указанные изменения вступают в силу с момента их размещения на Сайте и действуют в отношении всех Пользователей.
<br>
7.2. Действующая редакция настоящей Политики конфиденциальности размещена и постоянно доступна на веб-странице по адресу: https://seedplus.ru/polit/
<br>
7.2. Настоящая Политика конфиденциальности является неотъемлемой частью Соглашения об использовании Сайта, размещенного на странице по адресу: https://seedplus.ru/polit/
<br>
7.3. Согласие Пользователя на обработку персональных данных является неотъемлемой частью настоящей Политики конфиденциальности (Приложение № 1).
<br>
<br>
Дата размещения: «26» июня 2024 г.</p>
      </div>
    </div>
  </div>
</div>



<style>

  .hidden2 {
    display: none;
  }
  .success-message2 {
    padding: 10px;
    margin-top: 10px;
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    border: 1px solid transparent;
    border-radius: .25rem;
  }
</style>
<div id="UpdateProduct" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Изменить товар</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    
        <form id="updateForm" method="post" action="scripts/update-product.php">
          <label for="product_id">Выберите товар:</label>
          <select id="product_id" name="product_id" required>
            <?php
            // Подключение к базе данных 
            include 'scripts/connect.php';

            $sql = "SELECT id, Name FROM Semena1.product";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<option value=\"{$row['id']}\">{$row['Name']}</option>";
              }
            }

            $mysqli->close();
            ?>
          </select><br><br>

          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required><br><br>

          <label for="type">Вид:</label>
          <select id="type" name="type" required>
          <option value="Огурец">Огурец</option>
            <option value="Томат">Томат</option>
            <option value="Морковь">Морковь</option>
            <option value="Горох">Горох</option>
            <option value="Капуста">Капуста</option>
            <option value="Перец">Перец</option>
            <option value="Укроп">Укроп</option>
            <option value="Свекла">Свекла</option>
            <option value="Горчица">Горчица</option>
          </select><br><br>

          <label for="group">Группа:</label>
          <select id="group" name="group" required>
            <option value="Овощи">Овощи</option>
          </select><br><br>

          <label for="cycle">Цикл:</label>
          <select id="cycle" name="cycle" required>
            <option value="Однолетник">Однолетник</option>
            <option value="Многолетник">Многолетник</option>
          </select><br><br>

          <label for="img">Изображение:</label>
          <input type="text" id="img" name="img" required><br><br>

          <label for="price">Цена:</label>
          <input type="text" id="price" name="price" required><br><br>

          <label for="about">Описание:</label>
          <input type="text" id="about" name="about" required><br><br>

          <label for="brand">Бренд:</label>
          <select id="brand" name="brand" required>
          <option value="Агрофирма">Агрофирма</option>
            <option value="Гавриш">Гавриш</option>
            <option value="Аэлита">Аэлита</option>
            <option value="СеДеК">СеДеК</option>
            <option value="Сибирский сад">Сибирский сад</option>
          </select><br><br>

          <button type="submit" class="automenu">Изменить продукт</button>
        </form>
        <div id="successMessage2" class="hidden2 success-message2">Продукт успешно изменен.</div>
      </div>
    </div>
  </div>
</div>

<script>
  <?php
  // Если есть параметр 'success' в URL, отобразить сообщение об успешном удалении
  if (isset($_GET['success'])) {
    echo 'document.getElementById("successMessage2").classList.remove("hidden2");';
    echo 'setTimeout(function() {
      document.getElementById("successMessage2").classList.add("hidden2");
    }, 2000);'; // Скрытие через 2 секунды
  }
  ?>
</script>

<script>
  function getProductDetails() {
    var productId = document.getElementById('product_id').value;
    // AJAX запрос для получения данных о товаре
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'scripts/get-product-details.php?id=' + productId, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var product = JSON.parse(xhr.responseText);
        document.getElementById('name').value = product.Name;
        document.getElementById('type').value = product.Вид;
        document.getElementById('group').value = product.Группа;
        document.getElementById('cycle').value = product.Цикл;
        document.getElementById('img').value = product.img;
        document.getElementById('price').value = product.price;
        document.getElementById('about').value = product.About;
        document.getElementById('brand').value = product.Бренд;
      }
    };
    xhr.send();
  }

  // Вызов функции при изменении выбранного товара
  document.getElementById('product_id').addEventListener('change', getProductDetails);
</script>

<div id="profile" class="modal">
  <div class="modal-dialog2">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Корзина</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    

  

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
$user_id = $_SESSION['user_id']; // Пример, измените в соответствии с вашими требованиями

// Запрос для получения данных из таблицы cart 
$sql = "SELECT c.*, p.Name, p.Вид, p.Группа, p.Цикл, p.img, p.price, p.About, p.Бренд  
        FROM cart c  
        JOIN product p ON c.product_id = p.id  
        WHERE c.user_id = ?";

$stmt = $conn->prepare($sql);  
$stmt->bind_param("i", $user_id);  
$stmt->execute();  
$result = $stmt->get_result();

$totalSum = 0; // Переменная для хранения общей суммы 
$_SESSION['cart_products'] = []; // Initialize the session variable for cart products

// Вывод данных 
if ($result->num_rows > 0) {  
    echo "<table id='cartTable'>";  
    echo "<thead>";  
    echo "<tr>";  
    echo "<th>Название</th>";  
    echo "<th>Вид</th>";  
    echo "<th>Группа</th>";  
    echo "<th>Цикл</th>";  
    echo "<th>Изображение</th>";  
    echo "<th>Цена</th>";  
    echo "<th>Бренд</th>";  
    echo "<th>Количество</th>";  
    echo "</tr>";  
    echo "</thead>";  
    echo "<tbody>";  

    while ($row = $result->fetch_assoc()) {  
        echo "<tr>";  
        echo "<td>" . $row['Name'] . "</td>";  
        echo "<td>" . $row['Вид'] . "</td>";  
        echo "<td>" . $row['Группа'] . "</td>";  
        echo "<td>" . $row['Цикл'] . "</td>";  
        echo "<td><img src='" . $row['img'] . "' width='50' height='50'></td>";  
        echo "<td>" . $row['price'] . "</td>";

        $totalSum += $row['price'] * $row['quantity']; // Суммируем цены товаров
        echo "<td>" . $row['Бренд'] . "</td>";  
        echo "<td><input type='number' class='quantity_input' data-cart-id='" . $row['id'] . "' value='" . $row['quantity'] . "'></td>";  
        echo "<td style='border-top-style: hidden; border-bottom-style: hidden; border-right-style: hidden;'><button onclick='deleteProduct(" . $row['id'] . ")' class='automenu'>Удалить</button></td>";  
        echo "</tr>";  

        // Store product name and quantity in the session
        $_SESSION['cart_products'][] = [
            'Name' => $row['Name'],
            'quantity' => $row['quantity']
        ];
    }  

    echo "</tbody>";  
    echo "</table>";  
    echo "<div class='sum'> Итого: $totalSum.00 руб </div> <br>" ; // Выводим общую сумму рядом с кнопкой
    $_SESSION['totalSum'] = $totalSum; // Save the total sum in the session
    
    // Кнопки "Оформить заказ" и "Очистить корзину" 
    echo "<a href='oformlenie.php'>";
    echo "<button onclick='checkout()' class='automenu'>Оформить заказ</button>";  
    echo "</a>";
} else {  
    echo "Нет товаров в корзине";  
}

// Закрытие соединения  
$conn->close();  
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Находим все элементы input с классом quantity_input
        var quantityInputs = document.querySelectorAll('.quantity_input');

        // Для каждого такого элемента добавляем обработчик input
        quantityInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                var cartId = input.dataset.cartId; // Получаем cartId из data-атрибута
                var quantity = input.value; // Получаем новое количество

                updateQuantity(cartId, quantity); // Вызываем функцию обновления количества
            });
        });
    });

    function updateQuantity(cartId, quantity) {
        // Отправка AJAX-запроса для обновления количества в базе данных
        var xhr = new XMLHttpRequest();
        var url = 'scripts/update_quantity.php'; // Ссылка на файл, обрабатывающий обновление количества
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Обработка ответа
                var response = xhr.responseText;
                if (response.trim() === 'success') {
                    // Обновляем итоговую сумму на странице
                    updateTotalSum();
                } else {
                    console.error('Произошла ошибка при обновлении количества.');
                }
            } else {
                console.error('Произошла ошибка при отправке AJAX-запроса.');
            }
        };
        xhr.onerror = function() {
            console.error('Ошибка при отправке AJAX-запроса.');
        };
        xhr.send('cartId=' + cartId + '&quantity=' + quantity);
    }

    function updateTotalSum() {
        // Обновление итоговой суммы на странице без перезагрузки
        var cartTable = document.getElementById('cartTable');
        var totalSum = 0;
        for (var i = 1; i < cartTable.rows.length; i++) { // Начинаем с 1, т.к. 0-я строка - заголовок
            var row = cartTable.rows[i];
            var price = parseFloat(row.cells[5].textContent); // Индекс столбца с ценой
            var quantity = parseInt(row.cells[7].querySelector('input').value); // Индекс столбца с количеством
            totalSum += price * quantity;
        }
        
        document.querySelector('.sum').innerHTML = 'Итого: ' + totalSum.toFixed(2) + ' руб'; // Обновляем итоговую сумму
    }
</script>

<script>
    // Пример AJAX-запроса для удаления товара  
function deleteProduct(cartId) { 
    var xhr = new XMLHttpRequest(); 
    var url = 'scripts/delete_product.php'; // Ссылка на файл, обрабатывающий удаление 
  xhr.open('POST', url, true); 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
  xhr.onload = function() { 
      if (xhr.status === 200) { 
        // Обработка ответа (например, вывести сообщение об успехе) 
        // console.log(xhr.responseText);  
        location.reload(); // Перезагрузить страницу после успешного удаления 
      } else { 
        // Обработка ошибки 
        console.error('Произошла ошибка при удалении товара.'); 
      } 
    }; 
  xhr.onerror = function() { 
      // Обработка ошибки 
      console.error('Ошибка при отправке AJAX-запроса.'); 
    }; 
  xhr.send('cartId=' + cartId); 
  } 
    </script>
      </div>
    </div>
  </div>
</div>


<style>

  .hidden3 {
    display: none;
  }
  .success-message3 {
    padding: 10px;
    margin-top: 10px;
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    border: 1px solid transparent;
    border-radius: .25rem;
  }
</style>

<div id="AddProduct" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Добавить товар</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    
      <form method="post" action="scripts/add-product.php">
        <label for="name">Название:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="type">Вид:</label>
        <select id="type" name="type" required>
            <option value="Огурец">Огурец</option>
            <option value="Томат">Томат</option>
            <option value="Морковь">Морковь</option>
            <option value="Горох">Горох</option>
            <option value="Капуста">Капуста</option>
            <option value="Перец">Перец</option>
            <option value="Укроп">Укроп</option>
            <option value="Свекла">Свекла</option>
            <option value="Горчица">Горчица</option>
        </select><br><br>

        <label for="group">Группа:</label>
        <select id="group" name="group" required>
            <option value="Овощи">Овощи</option>
            <option value="Овощи">Цветы</option>
        </select><br><br>

        <label for="cycle">Цикл:</label>
        <select id="cycle" name="cycle" required>
            <option value="Однолетник">Однолетник</option>
            <option value="Многолетник">Многолетник</option>
        </select><br><br>

        <label for="img">Изображение:</label>
        <input type="text" id="img" name="img" required><br><br>

        <label for="price">Цена:</label>
        <input type="text" id="price" name="price" required><br><br>

        <label for="about">Описание:</label>
        <input type="text" id="about" name="about" required><br><br>

        <label for="brand">Бренд:</label>
        <select id="brand" name="brand" required>
            <option value="Агрофирма">Агрофирма</option>
            <option value="Гавриш">Гавриш</option>
            <option value="Аэлита">Аэлита</option>
            <option value="СеДеК">СеДеК</option>
            <option value="Сибирский сад">Сибирский сад</option>

        </select><br><br>

        <button type="submit" class="automenu">Добавить продукт</button>
    </form>
    <div id="successMessage3" class="hidden3 success-message3">Продукт успешно добавлен.</div>
      </div>
    </div>
  </div>
</div>
<script>
  <?php
  // Если есть параметр 'success' в URL, отобразить сообщение об успешном удалении
  if (isset($_GET['success'])) {
    echo 'document.getElementById("successMessage3").classList.remove("hidden3");';
    echo 'setTimeout(function() {
      document.getElementById("successMessage3").classList.add("hidden3");
    }, 2000);'; // Скрытие через 2 секунды
  }
  ?>
</script>
<style>

  .hidden {
    display: none;
  }
  .success-message {
    padding: 10px;
    margin-top: 10px;
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    border: 1px solid transparent;
    border-radius: .25rem;
  }
</style>
<div id="DeleteProduct" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Удалить товар</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    
      <form id="deleteForm" method="post" action="scripts/delete-product.php">
    <label for="product_id">Выберите товар для удаления:</label>
    <select id="product_id" name="product_id" required>
      <?php
      // Подключение к базе данных 
      include 'scripts/connect.php';

      $sql = "SELECT id, Name FROM Semena1.product";
      $result = $mysqli->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<option value=\"{$row['id']}\">{$row['Name']}</option>";
        }
      }

      $mysqli->close();
      ?>
    </select><br><br>

    <button type="submit" class="automenu">Удалить товар</button>
  </form>
  <div id="successMessage" class="hidden success-message">Продукт успешно удален.</div>
      </div>
    </div>
  </div>
</div>
<script>
  <?php
  // Если есть параметр 'success' в URL, отобразить сообщение об успешном удалении
  if (isset($_GET['success'])) {
    echo 'document.getElementById("successMessage").classList.remove("hidden");';
    echo 'setTimeout(function() {
      document.getElementById("successMessage").classList.add("hidden");
    }, 2000);'; // Скрытие через 2 секунды
  }
  ?>
</script>




<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        select {
            font-family: Arial, sans-serif;
            color: #333;
            padding: 5px;
        }
        .status-new {
            background-color: #FFFFFF;
        }
        .status-in-transit {
            background-color: #FFFF00;
        }
        .status-delivered {
            background-color: #00FF00;
        }
    </style>

    <div id="Zakazi" class="modal">
        <div class="modal-dialog1">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Заказы</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Заказ</th>
                            <th>Пользователь</th>
                            <th>Телефон</th>
                            <th>Город, индекс, улица, дом, квартира</th>
                            <th>Статус</th>
                            <th>Имя и Фамилия</th>
                            <th>Дата заказа</th>
                            <th>Цена</th>
                            <th>Состав</th>
                            <th>Статус заказа(Формируется, В пути, Доставлено)</th>
                        </tr>
                        <?php
                        // Параметры подключения к базе данных
$servername = "localhost"; // Имя сервера базы данных
$username = "root";    // Имя пользователя базы данных
$password = "";    // Пароль базы данных
$dbname = "Semena1";       // Имя базы данных

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка обновления статуса
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST["order_id"];
    $new_status = $_POST["status"];
    $update_sql = "UPDATE orders SET status='$new_status' WHERE order_id='$order_id'";
    $conn->query($update_sql);
}

// SQL запрос для выборки данных из таблицы orders
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

// Вывод данных
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["order_id"]."</td>";
        echo "<td>".$row["user_id"]."</td>";
        echo "<td>".$row["Tele"]."</td>";
        echo "<td>".$row["Gorod"].", ".$row["Dex"].", ".$row["Ylica"].", ".$row["Dom"].", ".$row["Kvartira"]."</td>";
        echo "<td>".$row["Carta"]." ".$row["CBP"]." ".$row["Nal"]."</td>";
        echo "<td>".$row["first_name"]." ".$row["last_name"]."</td>";
        echo "<td>".$row["Date"]."</td>";
        echo "<td>".$row["SummaCarta"]." ".$row["SummaNal"]." ".$row["SummaCBP"]."</td>";
        echo "<td>".$row["zakaz"]."</td>";
        echo "<td>";
        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='order_id' value='".$row["order_id"]."'>";
        echo "<select name='status' onchange='this.form.submit()'>";
        $statuses = array("Формируется", "В пути", "Доставлено");
        foreach ($statuses as $status) {
            $selected = ($row["status"] == $status) ? "selected" : "";
            echo "<option value='$status' $selected>$status</option>";
        }
        echo "</select>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
    select {
        font-family: Arial, sans-serif;
        color: #333;
        padding: 5px;
    }
    .status-new {
        background-color: #FFFFFF;
    }
    .status-in-transit {
        background-color: #FFFF00;
    }
    .status-delivered {
        background-color: #00FF00;
    }
</style>

<div id="History" class="modal">
    <div class="modal-dialog1">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Заказы</h3>
                <a href="#close" title="Close" class="close">×</a>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                    <th>Имя и Фамилия</th>
                    <th>Город, индекс, улица, дом, квартира</th>
                    <th>Телефон</th>
                    <th>Заказ</th>
                    <th>Цена</th>
                    <th>Статус</th>
                    <th>Дата заказа</th>  
                    <th>Статус заказа</th>   
                        
                 
                    </tr>
                    <?php
                    // Начало сессии
                    session_start();

                    // Параметры подключения к базе данных
                    $servername = "localhost"; // Имя сервера базы данных
                    $username = "root";    // Имя пользователя базы данных
                    $password = "";    // Пароль базы данных
                    $dbname = "Semena1";       // Имя базы данных

                    // Создание подключения
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Проверка соединения
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Получение user_id из сессии
                    $user_id = $_SESSION['user_id'];

                    // SQL запрос для выборки данных из таблицы orders для текущего пользователя
                    $sql = "SELECT * FROM orders WHERE user_id='$user_id'";
                    $result = $conn->query($sql);

                    // Вывод данных
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row["first_name"]." ".$row["last_name"]."</td>";
                            echo "<td>".$row["Gorod"].", ".$row["Dex"].", ".$row["Ylica"].", ".$row["Dom"].", ".$row["Kvartira"]."</td>";
                            echo "<td>".$row["Tele"]."</td>";
                            echo "<td>".$row["zakaz"]."</td>";
                            echo "<td>".$row["SummaCarta"]." ".$row["SummaNal"]." ".$row["SummaCBP"]."</td>";
                            echo "<td>".$row["Carta"]." ".$row["CBP"]." ".$row["Nal"]."</td>";
                            echo "<td>".$row["Date"]."</td>";
                            echo "<td>".$row["status"]."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>Вы еще не совершили заказ</td></tr>";
                    }
                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>





<style> 
    body { 
        font-family: Genshin; /* Изменение шрифта */ 
        color: #333; /* Изменение цвета текста */ 
    } 
 
    label { 
        font-weight: bold; /* Жирный текст для меток */ 
        color: #000; /* Цвет текста меток */ 
    } 
 
    input[type="text"], 
    input[type="password"] { 
        font-family: Arial, sans-serif; /* Изменение шрифта для текстовых полей */ 
        color: #333; /* Цвет текста для текстовых полей */ 
        padding: 5px; /* Добавление отступа вокруг текстовых полей */ 
    } 
 
    
</style> 




 
 

    <header>
        <div class="header-left">
            <h1>SEED</h1>
        </div>
        <div class="header-center">
         <button onclick="HomeSelection()"><p>главная</p></button>
        <button onclick="AboutUsSelection()"><p>о нас</p></button>
        <button onclick="Catalog()"><p>каталог</p></button>
        </div>
        <div class="header-right">
        <div class="notification" id="notification">Успешное добавление в корзину</div>
         <body onload="replaceText()">
        <button id="menuButton"  class="auto">Аккаунт</button> 
        </body>
        <div id="menu" style="opacity: 0; display: none;">  
    <?php   
    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 1) {   
        // Если user_id больше 1, скрываем кнопки "Войти" и "Регистрация" и выводим кнопку "Профиль"  
    ?>  
    <button class="automenu" style="display: none;">Войти</button>  
    <button class="automenu" style="display: none;">Регистрация</button>  
    

    <a href="#profile">  
        <button class="automenu">Корзина</button>  
    </a> 
    <a href="#History">  
        <button class="automenu">История заказов</button>  
    </a> 
    <!-- <button class="automenu">Настройки</button>  -->
    <a href="session_end.php">  
        <button class="automenu">Выйти</button>  
    </a> 
    <?php   
        
        if (isset($_SESSION['first_name']) && $_SESSION['first_name'] === '&nbsp') {  
    ?>  

<!-- Админ меню -->

        <button class="auto" id="adminButton">Админ</button> 

        <div id="adminmenu" style="opacity: 0; display: none;">  
            <a href =#AddProduct>
        <button class="automenu" >Добавить товар</button>  
        </a>
        <a href =#UpdateProduct>
        <button class="automenu" >Изменить товар</button>  
        </a>
        <a href =#DeleteProduct>
        <button class="automenu" >Удалить товар</button>  
        </a>
        <a href =#Zakazi>
        <button class="automenu" >Заказы</button>  
        </a>
        <a href =#Podderzkha>
        <button class="automenu" >Поддержка</button>  
        </a>
        </div>

<!--  -->

    <?php } ?> 
    <?php   
    } else {   
        // Если user_id меньше или равен 1, показываем кнопки "Войти" и "Регистрация"  
    ?>  
    <a href="#openModal1">  
        <button class="automenu">Войти</button>  
    </a>  
    <a href="#openModal">  
        <button class="automenu">Регистрация</button>  
    </a>  
    <?php   
    }   
    ?>  
     
  
</div> 
<script> 
     var adminButton = document.getElementById('adminButton'); 
     var adminmenu = document.getElementById('adminmenu'); 
  
     adminButton.addEventListener('click', function() { 
         if (adminmenu.style.display === 'none') { 
             adminmenu.style.display = 'block'; 
             setTimeout(function() { 
                 adminmenu.style.opacity = 1; 
             }, 100); 
         } else { 
             adminmenu.style.opacity = 0; 
             setTimeout(function() { 
                 adminmenu.style.display = 'none'; 
             }, 500); 
         } 
     }); 
 </script> 
  
 <style> 
     #adminmenu { 
         position: absolute; 
         opacity: 0; 
         display: none; 
         transition: opacity 0.5s ease; 
         bottom: 0%;
         right: 100%;
         background: black; /* Позиционирование еще ниже */ 
     } 
  
     #menu button { 
         display: block; 
         margin-bottom: 5px; 
     } 
 </style> 
  
 <script> 
     var menuButton = document.getElementById('menuButton'); 
     var menu = document.getElementById('menu'); 
  
     menuButton.addEventListener('click', function() { 
         if (menu.style.display === 'none') { 
             menu.style.display = 'block'; 
             setTimeout(function() { 
                 menu.style.opacity = 1; 
             }, 100); 
         } else { 
             menu.style.opacity = 0; 
             setTimeout(function() { 
                 menu.style.display = 'none'; 
             }, 500); 
         } 
     }); 
 </script> 
  
 <style> 
     #menu { 
         position: absolute; 
         opacity: 0; 
         display: none; 
         transition: opacity 0.5s ease; 
         top: 100%;
         background: black; /* Позиционирование еще ниже */ 
     } 
  
     #menu button { 
         display: block; 
         margin-bottom: 5px; 
     } 
 </style> 
 

  
    </header>
    <main>
      <h2 id="HomeSelection">Ваше маленькое начало для будущего сада </h2>
      <h1 id="text">SEED</h1>
      <div class="main-left " >
        <img src="img/class.png">
        <p>Здесь вы можете ознакомитьс с отзывами наших покупателей</p>
        <a href="#otzv">
        <p id="comment">Отзывы<img src="img/Arrow 1.png"></p>
        </a>
      </div>
      <div class="main-center">
      <img src="img/Group 22 (3).png">
      
    </div>
    <div class="main-right">
        <img src="img/Group 20.png">
        
      </div>
      <div class="social" id="AboutUs">
        <h1>Наши магазины</h1>
        <hr>
        <div class="social-conteiner">
        <button >Кашена 1</button>
        <button >Кашена 24</button>
        <button >Рыленкова 8</button>
        <button >Николаева 32</button>
        <button >Кирова 19</button>
        <button >Гагарина 18</button>
        </div>
        <style>
            .social-conteiner button {
    width: 220px;
    height: 68px;
    border: 2px solid black;
    border-radius: 10px;
    background-color: #D9FC00;
    font-family: Genshin;
    font-size: 24px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    letter-spacing: 2px;
    cursor: pointer;
    margin-right: 80px;
    
}
        </style>
      </div>
      <div class="uslug">
        <div class="uslug-1">
         <h1>Каталог<br></h1>
        </div>
        
        <div class="card-conteiner" id="Catalog">
        <?php 
$dbUser = 'root'; 
$dbName = 'Semena1'; 
$dbPass = ''; 
$mysqli = new mysqli('localhost', $dbUser, $dbPass, $dbName); 
$query = "set names utf8"; 
$mysqli->query($query); 
 
// Поиск по Name 
$search_name = isset($_GET['search_name']) ? $_GET['search_name'] : ''; 
$where_name = ''; 
if (!empty($search_name)) { 
    $where_name = "WHERE Name LIKE '%" . $search_name . "%'"; 
} 
 
// Фильтрация по Вид, Группа, Цикл, Бренд 
$вид = isset($_GET['вид']) ? $_GET['вид'] : ''; 
$группа = isset($_GET['группа']) ? $_GET['группа'] : ''; 
$цикл = isset($_GET['цикл']) ? $_GET['цикл'] : ''; 
$бренд = isset($_GET['бренд']) ? $_GET['бренд'] : ''; 
$where_filters = ''; 
if (!empty($вид) || !empty($группа) || !empty($цикл) || !empty($бренд)) { 
    $where_filters = "WHERE "; 
    $conditions = []; 
    if (!empty($вид)) { 
        $conditions[] = "Вид = '$вид'"; 
    } 
    if (!empty($группа)) { 
        $conditions[] = "Группа = '$группа'"; 
    } 
    if (!empty($цикл)) { 
        $conditions[] = "Цикл = '$цикл'"; 
    } 
    if (!empty($бренд)) { 
        $conditions[] = "Бренд = '$бренд'"; 
    } 
    $where_filters .= implode(" AND ", $conditions); 
} 
 
// Формирование запроса 
$query = "SELECT * FROM product " . $where_name . $where_filters; 
$results = $mysqli->query($query); 
 
// Получение уникальных значений для выпадающих списков 
$query_вид = "SELECT DISTINCT Вид FROM product"; 
$results_вид = $mysqli->query($query_вид); 
$options_вид = []; 
while ($row_вид = $results_вид->fetch_assoc()) { 
    $options_вид[] = $row_вид['Вид']; 
} 
 
// Аналогично для Группа, Цикл, Бренд 
$query_группа = "SELECT DISTINCT Группа FROM product"; 
$results_группа = $mysqli->query($query_группа); 
$options_группа = []; 
while ($row_группа = $results_группа->fetch_assoc()) { 
    $options_группа[] = $row_группа['Группа']; 
} 
 
$query_цикл = "SELECT DISTINCT Цикл FROM product"; 
$results_цикл = $mysqli->query($query_цикл); 
$options_цикл = []; 
while ($row_цикл = $results_цикл->fetch_assoc()) { 
    $options_цикл[] = $row_цикл['Цикл']; 
} 
 
$query_бренд = "SELECT DISTINCT Бренд FROM product"; 
$results_бренд = $mysqli->query($query_бренд); 
$options_бренд = []; 
while ($row_бренд = $results_бренд->fetch_assoc()) { 
    $options_бренд[] = $row_бренд['Бренд']; 
} 
 
// Вывод результатов 
if ($results->num_rows > 0) { 
    while ($row = $results->fetch_assoc()) { 
        // ... ваш код вывода карточки товара ... 
        // Вывод карточки товара только если все условия фильтрации совпадают 
        if (!empty($вид) && $row['Вид'] != $вид) { 
            continue; // Пропустить эту карточку 
        } 
        if (!empty($группа) && $row['Группа'] != $группа) { 
            continue; // Пропустить эту карточку 
        } 
        if (!empty($цикл) && $row['Цикл'] != $цикл) { 
            continue; // Пропустить эту карточку 
        } 
        if (!empty($бренд) && $row['Бренд'] != $бренд) { 
            continue; // Пропустить эту карточку 
        } $user_id = $_SESSION['user_id'];
        echo ' 
        <form id="add-to-cart-form" class="add-to-cart-form" action="scripts/add_to_cart.php" method="post">  
          <div class="hide" visibility: hidden>  
            <input type="text" name="product_id" id="product_id" readonly value="'.$row["id"].'">  
          </div>  
          <div class="hide" visibility: hidden>  
            <label for="user_id">Пользователь:</label>  
            <input type="text" name="user_id" id="user_id" readonly value="'.$user_id.'"> 
            <label for="quantity">Количество:</label>
            <input type="text" name="quantity" id="quantity" readonly value="1">
          </div>  
          <div class="card">  
            <button class="card-button1" disabled>'.$row["Вид"].'</button> 
            <a href="#profile">
            <img src="'.$row["img"].'"> 
            </a>
            <div class="buttons">  
              <button class="buttons-left add-to-cart" type="submit">Добавить в корзину</button>  
              <button class="buttons-right" disabled>'.$row["price"].' руб</button> 
            </div>  
          </div>   
        </form>  
        '; 
    } 
} else { 
    echo "Товары не найдены."; 
} 
 
    // Вывод форм для поиска и фильтрации 
    echo '<div class="uslug" id="filter">';
    echo '<form method="get" class="filter-form">'; 
    echo '<input type="text" name="search_name" placeholder="Поиск по имени" value="' . $search_name . '">'; 
    echo '<button type="submit" class="automenu">Искать</button>'; 
    echo '</form>'; 
    
    echo '<form method="get" class="filter-form">'; 
    echo '<div class="filter-row">';
    echo '<div class="filter-column">';
    echo '<select name="вид">'; 
    echo '<option value="">Вид не выбран</option>'; 
    foreach ($options_вид as $option) { 
        echo '<option value="' . $option . '" ' . ($вид == $option ? 'selected' : '') . '>' . $option . '</option>'; 
    } 
    echo '</select>'; 
    
    echo '<select name="группа">'; 
    echo '<option value="">Группа не выбрана</option>'; 
    foreach ($options_группа as $option) { 
        echo '<option value="' . $option . '" ' . ($группа == $option ? 'selected' : '') . '>' . $option . '</option>'; 
    } 
    echo '</select>'; 
    echo '</div>';
    
    echo '<div class="filter-column">';
    echo '<select name="цикл">'; 
    echo '<option value="">Цикл не выбран</option>'; 
    foreach ($options_цикл as $option) { 
        echo '<option value="' . $option . '" ' . ($цикл == $option ? 'selected' : '') . '>' . $option . '</option>'; 
    } 
    echo '</select>'; 
    
    echo '<select name="бренд">'; 
    echo '<option value="">Бренд не выбран</option>'; 
    foreach ($options_бренд as $option) { 
        echo '<option value="' . $option . '" ' . ($бренд == $option ? 'selected' : '') . '>' . $option . '</option>'; 
    } 
    echo '</select>'; 
    echo '</div>';
    echo '</div>';
    
    echo '<button type="submit" class="automenu">Фильтровать</button>'; 
    echo '</form>'; 
    echo '</div>';
    
    $mysqli->close();  
?> 
        </div>
        <div class="footer">
    <div class="column">
        <div class="column-title">ПОЛЕЗНЫЕ ССЫЛКИ</div>
        <img class="line-6" src="img/line62323-1ir4.svg" />
        <a href="#svaz">
        <div class="text-item">Обратная связь</div>
        </a>
        <a href="#akcii">
        <div class="text-item">Акции</div>
        </a>
        <a href="#polit">
        <div class="text-item">Политика конфиденциальности</div>
    </a>
        
    </div>
    
    <div class="column">
        <div class="column-title">КОНТАКТЫ</div>
        <img class="line-6" src="img/line62323-1ir4.svg" />
        <div class="text-item">8 (908) 283-14-72</div>
        <div class="text-item">8 (904) 368-00-15</div>
        <div class="text-item">fomichyov.andrej@yandex.ru</div>
        
    </div>
    <div class="column">
        <div class="column-title">СОЦИАЛЬНЫЕ СЕТИ</div>
        <img class="line-6" src="img/line62323-1ir4.svg" />
        <div class="social-icons">
            <div class="ellipse"></div>
            <div class="ellipse-2"></div>
            <div class="ellipse-3"></div>
            <div class="ellipse-4"></div>
            <p>
            <a href="https://t.me/kirtytytyt">
            <img class="phone" src="img/telega.png" />
</p>
        </a>
        <p>
        <a href="https://vk.com/kfomichyov0">
            <img class="phone-2" src="img/vkonta.png" />
            </a>
</p>
            <div class="ellipse-5"></div>
        </div>
    </div>
      </div>
      

      <style>
        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            font-family: Genshin;
            background-color: #D9FC00;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: none;
        }
    </style>
<body>
    <!-- Ваш основной контент -->
    

    <script>
        document.querySelectorAll('.add-to-cart-form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Остановить отправку формы
                
                // Создать объект FormData из формы
                const formData = new FormData(this);
                
                // Отправить запрос с помощью Fetch API
                fetch(this.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        showNotification('Успешное добавление в корзину');
                    } else {
                        showNotification('Ошибка добавления в корзину');
                    }
                })
                .catch(error => {
                    showNotification('Ошибка добавления в корзину');
                });
            });
        });

        function showNotification(message) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.style.display = 'block';
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }
    </script>
    
</body>


      <style>
select { 
    width: 100%; 
    padding: 10px; 
    margin-bottom: 10px; 
    border: 1px solid #ccc; 
    border-radius: 4px; 
    box-sizing: border-box; 
} 
#filter {
    margin-top: -1418px;
    margin-left: 500px;
    width: 400px;
    height: 240px;
    align: center;
    border: 3px solid #D9FC00; 
    border-radius: 4px; 
    box-sizing: border-box; 
    display: flex;
    flex-direction: column;
}
.filter-form {
    display: flex;
    flex-direction: column;
}
.filter-row {
    display: flex;
    justify-content: space-between;
}
.filter-column {
    display: flex;
    flex-direction: column;
    width: 48%;
}
    .card { 
    width: 453px;
    height: 666px;
    background-color: #76CFD7;
    border: 20px solid #1B1C1E;
    border-radius: 20px;
    margin-left: 50px;
    transform: translate();  
    margin-bottom: 60px; /* Отступ снизу */   
        } 
        .card-conteiner {
    margin-top: 80px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-direction: row; 
    width: 1500px;
            flex-wrap: wrap; 
        } 
 
        @media (max-width: 768px) { 
            .card { 
                flex-direction: column; 
                width: 100%; 
                margin-left: 0; 
                
            } 
        } 



.card p{
    position: absolute;
    opacity: 0%;
    z-index: 10;
    width: 34%;
    background: #76CFD7;
}
.card p:hover {
    transition: 0.5s;
    opacity: 100%;
      
}


        .card img {
    width: 300px;
    height: 495px;
    margin-top: 0px;
   
}
.card {
    width: 380px;
    height: 580px;
    background-color: #76CFD7;
    border: 20px solid #1B1C1E;
    border-radius: 20px;
    margin-left: 50px;
    cursor: pointer;
}
.card-button1 {
    background-image: url(img/Rectangle\ 12.png);
    background-color: transparent;
    border: 0px;
    width: 40%;
    height: 85px;
    color: white;
    font-family: Genshin;
    font-size: 16px;
   transform: translateX(130px);
}
.buttons-left {
    background-image: url(img/Rectangle\ 13.png);
    color: white;
    font-family: Genshin;
    font-size: 16px;
    background-color: transparent;
    border: 0px;
    width: 194px;
    height: 71px;
    cursor: pointer;
    margin-right: 20px;
   
}
.buttons-right {
    background-image: url(img/Rectangle\ 14.png);
    color: #1B1C1E;
    font-family: Genshin;
    font-size: 16px;
    background-color: transparent;
    border: 0px;
    width: 194px;
    height: 71px;
    cursor: pointer;
}
      </style>
  

<style> 
    body { 
        font-family: Genshin; /* Изменение шрифта */ 
        color: black;
        font-weight: bold;
         /* Изменение цвета текста */ 
    } 
 
    .lab { 
        font-weight: bold; /* Жирный текст для меток */ 
        color: #000; /* Цвет текста меток */ 
        display: inline-block; 
    width: 200px; /* Ширина метки */ 
    text-align: left; /* Выравнивание текста по правому краю */ 
    margin-left: 400px; /* Отступ справа */ 
    margin-top: -700px;
    } 
 
    input[type="text"], 
    input[type="password"] { 
        font-family: Arial, sans-serif; /* Изменение шрифта для текстовых полей */ 
        color: #333; /* Цвет текста для текстовых полей */ 
        padding: 5px; /* Добавление отступа вокруг текстовых полей */ 
    } 

    .modal-content {
        width: 700px;

    }
 
    
</style> 



    </main>
    <script>
           var text = document.getElementById('text');
        var letters = text.textContent.split('');
        text.innerHTML = '';

        letters.forEach(function(letter) {
            var span = document.createElement('span');
            span.textContent = letter;
            span.classList.add('color-change');

            span.addEventListener('mouseover', function() {
                this.style.color = '#D9FC00';
            });

            span.addEventListener('mouseout', function() {
                this.style.color = '';
            });

            text.appendChild(span);
        });

function AboutUsSelection() {
  const targetSection = document.getElementById('AboutUs');
  targetSection.scrollIntoView({ behavior: 'smooth' });
}
function HomeSelection() {
  const targetSection = document.getElementById('HomeSelection');
  targetSection.scrollIntoView({ behavior: 'smooth' });
}
function Catalog() {
  const targetSection = document.getElementById('Catalog');
  targetSection.scrollIntoView({ behavior: 'smooth' });
}
    </script>
    
</body>
</html>

<style>
.footer {
            background-color: black;
            padding: 20px;
            display: flex;
            justify-content: space-around;
            text-align: left;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 128, 0, 1);
        }
        .footer .column {
            display: flex;
            flex-direction: column;
            margin: 0 10px;
        }
        .footer .column-title {
            font-size: 16px;
            font-weight: bold;
            color: white;
            margin-bottom: 10px;
        }
        .footer .text-item {
            font-size: 14px;
            color: white;
            margin: 5px 0;
        }
        .footer .line-6 {
            width: 100px;
            margin: 10px 0;
            filter: invert(100%); 
            -webkit-filter:invert(100%); 
        }
        .footer .social-icons {
            display: flex;
            flex-wrap: wrap;
            margin-top: 10px;
        }
        .footer .social-icons img{
            width: 45px;
            height: 45px;
            
            filter: invert(100%); 
            -webkit-filter:invert(100%); 
        }
        .footer .social-icons p{
            margin-left: -35%;

        }
        .footer .ellipse,
        .footer .ellipse-2,
        .footer .ellipse-3,
        .footer .ellipse-4,
        .footer .ellipse-5 {
            width: 24px;
            height: 24px;
            margin: 5px;
        }
        .footer p.div-4 {
            font-size: 14px;
            color: white;
            margin-top: 20px;
        }
        .footer p.div-4 .text-wrapper-34 {
            font-weight: bold;
        }
/* Стили всплывающего окна по-умолчанию */
.modal {
    position: fixed; /* фиксированное положение */
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0,0,0,0.5); /* фон */
    z-index: 1050;
    opacity: 0; /* по умолчанию модальное окно прозрачно */
    -webkit-transition: opacity 200ms ease-in; 
    -moz-transition: opacity 200ms ease-in;
    transition: opacity 200ms ease-in; /* анимация перехода */
    pointer-events: none; /* элемент невидим для событий мыши */
    margin: 0;
    padding: 0;
}
/* При отображении модального окно */
.modal:target {
    opacity: 1; /* делаем окно видимым */
   pointer-events: auto; /* элемент видим для событий мыши */
    overflow-y: auto; /* добавляем прокрутку по y, когда элемент не помещается на страницу */
}
/* ширина модального окна и его отступы от экрана */
.modal-dialog {
    position: relative;
    width: auto;
    margin: 10px;
}
@media (min-width: 576px) {
  .modal-dialog {
      max-width: 500px;
      margin: 30px auto; /* отображение окна по центру */
  }
}

.modal-dialog2 {
   
    margin: auto;
    width: auto;
    max-width: 90%;
}
@media (min-width: 576px) {
  .modal-dialog2 {
      max-width: 500px;
  }
}
.modal-content {
    position: absolute;
    left: 50%;
    top:0%;
    transform: translate(-50%);

   
    display: flex;
    flex-direction: column;
    background-color: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(0, 128, 0, 0.2);
    border-radius: .3rem;
    outline: 0;
    box-shadow: 0 5px 15px rgba(0, 128, 0, 0.5);
    width: 100%;
    max-width: 1500px; /* Set a max-width for the content */
    padding: 20px;
    background-image: linear-gradient(to right, #a8e063, #56ab2f);
}

.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px;
    border-bottom: 1px solid #eceeef;
    background-color: #2e7d32;
    color: white;
    border-top-left-radius: .3rem;
    border-top-right-radius: .3rem;
}
.modal-title {
    margin: 0;
    line-height: 1.5;
    font-size: 1.5rem;
    font-weight: 500;
}

.close {
    font-size: 24px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 1px 0 #000;
    opacity: .75;
    text-decoration: none;
    transition: 0.5s;
}
.close:focus, .close:hover {
    color: #000;
    cursor: pointer;
    opacity: 1;
}

.modal-body {
    position: relative;
    flex: 1 1 auto;
    padding: 15px;
    overflow: auto;
    transition: 0.5s;
}

table#cartTable {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    transition: 0.5s;
}
table#cartTable th, table#cartTable td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    transition: 0.5s;
}
table#cartTable th {
    background-color: #388e3c;
    color: white;
    transition: 0.5s;
}
table#cartTable tr:nth-child(even) {
    background-color: #f2f2f2;
    transition: 0.5s;
}
table#cartTable tr:hover {
    background-color: #ddd;
    transition: 0.5s;
}

.quantity_input {
    width: 50px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
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

.sum {
    font-size: 1.25rem;
    font-weight: bold;
    color: #2e7d32;
}
.auto {
    width: 200px;
    height: 40px;
    color: white;
    font-family: Genshin;
    border-radius: 30px;
    background-color: black;
    border: 2px solid #D9FC00;
    letter-spacing: 2px;
    cursor: pointer;
}
.auto:hover {
    transition: 0.5s;
    background-color: #D9FC00;
    letter-spacing: 10px;
    color: #050505;
}
</style>
