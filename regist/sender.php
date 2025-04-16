<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__ . '/../php/src/helpers.php';
require_once __DIR__ . '/../php/element.php';
require_once __DIR__ . '/send.php';
require 'vendor/autoload.php'; // Загружает все зависимости

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Проверка валидности почты и ника
$email_post = strtolower($_POST['email']);
$nickname_post = htmlspecialchars($_POST["nickname"]);

// Регистрация
$_SESSION["nickname"] = $_POST["nickname"] ?? null;
$_SESSION["email"] = $_POST["email"] ?? null;
$_SESSION["password"] = $_POST["password"] ?? null;
$_SESSION["icon"] = $_POST["icon"] ?? null;

// Назначаем дату
$date = date('d.m.Y');
$time = date('h:i');

$mail = new PHPMailer(true);  // Создаем экземпляр PHPMailer

try {
  // Настройка сервера
  $mail->isSMTP();                                      // Устанавливаем использование SMTP
  $mail->Host = 'smtp.gmail.com';               // Укажите сервер SMTP
  $mail->SMTPAuth = true;                             // Включаем аутентификацию SMTP
  $mail->Username = 'timqwees@gmail.com';               // Ваше имя пользователя SMTP
  $mail->Password = 'bgxj oyzo hszw ydwv';                   // Ваш пароль
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Включаем шифрование TLS
  $mail->Port = 587;                              // Укажите порт TLS, используемый для подключения

  // Устанавливаем адрес отправителя
  $mail->setFrom('envpolytech@envpolytech.ru', 'Московский Политех');

  // Устанавливаем адресата
  $mail->addAddress("$email_post", 'Имя Получателя'); // основной получатель
  $mail->addCC('envpolytech@envpolytech.ru');                       // Копия для другого адресата

  // Устанавливаем формат
  $mail->isHTML(true);                                  // Устанавливаем формат электронной почты в HTML
  $mail->CharSet = 'UTF-8';

  // Тема и содержание письма
  $mail->Subject = 'Код подтверждения для регистрации на мероприятия [московский политех]';
  $mail->msgHTML($nickname_post);
  $mail->Body = "<body style='margin: 0; padding: 0;border-box: box-sizing;border: none'>
  <!-- image -->
  <div style='transition: all 1s ease; 
  width: -webkit-fill-available;
      margin-bottom: 10px;
      margin-top: 10px;
      margin-left: 2%;
      margin-right: 2%;
      '>
      <img src='https://sun9-54.userapi.com/c836737/v836737758/46cca/pSDEt6PyzDg.jpg' style='transition: all 1s ease; 
      border-radius: 15px 0px 15px 0px;
      width: 100%;
      height: auto;
      '></img>
  </div>
  <!-- finish -->

  <div style='transition: all 1s ease;
   display: block;
      justify-content: center;
      align-items: center;
      align-content: center;
      text-align: center;
      font-size: (.5re + .5rem);
      margin-top: 1rem;'>

      <div style='
      display: grid;
      align-items: center;
      justify-content: center;
      text-align: center;
      '>
      <p style='
      transition: all 1s ease; 
      font-size: 30px;
      color: black;
      font-weight: 700;
      font-family: Verdana;
      margin-bottom: 1rem;
      display: flex;
      margin-left:auto;
      margin-right: auto;'>
          Первая встреча на пути к мероприятиям!
      </p>


      <p style='
      display: flex;
      justify-content: center;
      align-items: center;
      transition: all 1s ease; 
      text-align: center;
      font-size: 20px;
      color: black;
      margin-left:auto;
      margin-right: auto;
      '>Пройдите регистрацию, чтобы получить доступ!</p>
</div>

      <br> <br>
      <hr style='transition: all 1s ease; margin-bottom: 1rem;opacity: 0.8'>

      <p style='transition: all 1s ease; 
      font-size: (.5re + .5rem);
      color: #090909;
      margin-bottom: 0;
      font-family: Arial;
      font-weight: 400;
      justify-content: flex-start;
      align-items: start;
      text-align: left;
      margin-left: 5%;
      margin-right: 2.5%;
      '>

          》Привет, <font style='transition: all 1s ease; 
      color: #7a75f7;
      '>$nickname_post</font> | Вы проходите регистрацию на сайте мероприятий московского политеха! Ваша регистрация
          проходит: <font color='#7a75f7'>$time, $date</font>
          <br> <br>
      </p>
      <span style='transition: all 1s ease; border: 1.5px solid gray;'>
          <p style='transition: all 1s ease; 
      font-size: (.5re + .5rem);
      color: #090909;
      margin-bottom: 0;
      font-family: Arial;
      font-weight: 400;
      justify-content: flex-start;
      align-items: start;
      text-align: left;
      margin-left: 5%;
      margin-right: 2.5%;
      '>
              》1) Перед началом прохождения регистрации профиля вначале заполняете анкету данных, в которые будут
              с вами до конца!
              <br> <br>
          </p>
      </span>
      <p style='transition: all 1s ease; 
      font-size: (.5re + .5rem);
      color: #090909;
      font-family: Arial;
      font-weight: 400;
      justify-content: flex-start;
      align-items: start;
      text-align: left;
      margin-left: 5%;
      margin-right: 2.5%;
      '>
          》2) Вторым действием — это верефикация вашей почты на указанный адрес, в котором после успешного
          прохождения вы будете перенаправлены на страницу <font color='#7a75f7'>авторизации!</font>
          <br> <br>
      </p>


      <!--        AUTIFICATION BLOCK        -->


      <div style='transition: all 1s ease; 
        background: #000;
        overflow: hidden;
        border-radius: 10px;
        padding-top: 1px !important;
        display: block;
        position: relative;
        '>

          <!-- начала заполнения -->
          <div style='transition: all 1s ease; 
          display: list-item;
          margin: 1rem 0;
        position: relative;
        text-align: center;
        '>
              <!-- контрольный блок для размера -->


              <div style='transition: all 1s ease; 
        display: auto;
        position: relative;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 10px 10px 0px 10px;
        font-size: 20px;
        color: white;
        font-weight: 700;
        font-family: Verdana;
        '>

                  <span>
                      Регистрация - Events Polytech
                  </span>

              </div>

              <hr style='                margin: 1.5rem 5%'>
              <!-- заголовок -->


              <!--            SSSSTTTAAARTTT            -->


              <div style='transition: all 1s ease; 
      display: flex;
      flex-direction: row;
      column-gap: 10%;
      margin-top: 1rem;
      margin-right: 2%;
      '>

                  <div style='transition: all 1s ease; 
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-left: 5%;
        '>

                      <img style='transition: all 1s ease; width: 60px;height: 60px'
                          src='https://i.postimg.cc/rmWNtnrT/IMG-0695.png'></img>

                  </div>

                  <div style='transition: all 1s ease; 
        font-size: (.5re + .5rem);
        color: gray;
        width: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        text-align: center;
        font-weight: 500;
        '>
                      <p style='transition: all 1s ease; 
          color: white;
          margin: 0;
          margin-bottom: 0.5rem;
          '>Чтобы пройти регистрацию в сервисе, скопируйте полностью код сгенерированный снизу и вставьте его в поле
                          верефикации!
                  </div>


              </div>

              <hr style='transition: all 1s ease;
              margin: 1.5rem 5%;
              opacity: 0.4;'>


              <!--             EEENNNNDDDD             -->


              <!-- описание -->

              <div style='transition: all 1s ease; 
        margin: 0 5%;
  transition: all 1s ease;
  display: block;
  justify-content: space-between;
  align-items: center;
  background: #262626ba;
  padding: 3.5px;
        '>
                  <!-- block -->

                  <p style='transition: all 1s ease; 
        font-size: .85rem;
        color: #f9f9f9;
        align-items: space-between;
        justify-content: center;
        font-family: Verdana;
        '>Пожалуйста, вставтье код сгенерированный снизу и нажмите кнопку 'Зарегестрироваться'!</p>
                  </p>


                  <p style='
                      transition: all 1s ease;
  color: #7a75f7;
  background: rgb(0, 0, 0, 0.5);
  border-radius: 2px;
  font-family: Verdana;
  letter-spacing: 5px;
  margin: 0 1rem;
  padding: .5rem;
        '>$import</p>

              </div><!-- end block -->


              <!--               FOOTER                -->

              <hr style='transition: all 1s ease; 
  margin: 1.5rem 5%;
  opacity: 0.4;
      '>

          </div> <!-- контаинер блока -->
      </div> <!-- контроилер блоков -->


      <!--             EEENNNNDDDD          -->

  </div>

  <!--            END LOGO             -->

  <!--             NEEEWWWW             -->
  <p style='transition: all 1s ease; 
      font-size: 20px;
      color: #090909;
      justify-content: flex-start;
      align-items: start;
      text-align: left;
      margin-left: 2%;
      font-weight: 700;
      '>Быстрые записи на мероприятия московского политеха!</font>
  </p>


  <div style='transition: all 1s ease; 
      display: flex;
      flex-direction: row;
      column-gap: 10%;
      margin-top: 1rem;
      margin-bottom: 1rem;
      margin-right: 2%;
      '>

      <div style='transition: all 1s ease; 
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-left: 5%;
        '>

          <img style='transition: all 1s ease; width: 60px;height: 60px'
              src='https://i.postimg.cc/rmWNtnrT/IMG-0695.png'></img>

      </div>

      <div style='transition: all 1s ease; 
        font-size: (.5re + .5rem);
        color: black;
        width: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        text-align: center;
        font-weight: 500;
        '>
          <p style='transition: all 1s ease; 
          font-size: 100%;
          margin-top: 1rem;
          '>Отслеживание всех новых событий месяца!</p>
      </div>


  </div>

  <hr style='transition: all 1s ease; opacity: 0.5'>

  <!--              #2                  -->


  <div style='transition: all 1s ease; 
      display: flex;
      flex-direction: row;
      column-gap: 10%;
      margin-top: 1rem;
      margin-bottom: 1rem;
      margin-right: 2%;
      '>

      <div style='transition: all 1s ease; 
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-left: 5%;
        '>
          <img style='transition: all 1s ease; width: 60px;height: 60px'
              src='https://i.postimg.cc/7hkM1332/IMG-0696.png'></img>

      </div>

      <div style='transition: all 1s ease; 
        font-size: (.5re + .5rem);
        color: black;
        width: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        text-align: center;
        font-weight: 500;
        '>
          <p style='transition: all 1s ease; 
          font-size: 100%;
          margin-top: 1rem;
          '>Напоминания записанных мероприятий!</p>
      </div>


  </div>

  <hr style='transition: all 1s ease; opacity: 0.5'>


  <!--              #3                  -->


  <div style='transition: all 1s ease; 
      display: flex;
      flex-direction: row;
      column-gap: 10%;
      margin-top: 1rem;
      margin-bottom: 1rem;
      margin-right: 2%;
      '>

      <div style='transition: all 1s ease; 
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-left: 5%;
        '>
          <img style='transition: all 1s ease; width: 60px;height: 60px'
              src='https://i.postimg.cc/zfYCYwQP/IMG-0701.png'></img>

      </div>

      <div style='transition: all 1s ease; 
        font-size: (.5re + .5rem);
        color: black;
        width: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        text-align: center;
        font-weight: 500;
        '>
          <p style='transition: all 1s ease; 
          font-size: 100%;
          margin-top: 1rem;
          '>Быстрая регистрация на событие без каких-либо оформлений по нажатию на 'Записаться'</p>

      </div>


  </div>

  <a href='mospolytech.ru' style='background-color: #2b2a2a;border-radius:10px;display:flex;justify-content:space-between;padding:10px 1rem;margin-top: 1rem;'>
    <img style='height:40px;transform:translateY(5px);'
      src='https://ci3.googleusercontent.com/meips/ADKq_NaRem55aWdKkZxBiqyeOh4ufSj6I242n3bgnXnEwrzkpxwILeeD4P5mOa-A5RluDkncpIDl1fl-OAQaTgXTheWhshnv4uDVxA7T=s0-d-e1-ft#https://old.mospolytech.ru/img_new/top_bn/top_sh.png'>
      <p style='color:white;font-size:14px;margin-left:auto;'>mospolytech@gmail.com</p>
  </a>

</body><!-- конец тела -->";
  $mail->AltBody = 'Первая встреча на пути к мероприятиям!';

  $mail->send();
} catch (Exception $e) {
  echo "Сообщение не может быть отправлено. Ошибка: {$mail->ErrorInfo}";
}
?>