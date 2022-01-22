<?php
// Файлы phpmailer
require '../lib/phpmailer/PHPMailer.php';
require '../lib/phpmailer/SMTP.php';
//require '../lib/phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
//$name = $_POST['name'];
$name = 'Vasyliy';
//$email = $_POST['email'];
$email = $_GET['email'];
//$text = $_POST['text'];
$text = 'textik';

// Формирование самого письма
$title = "Заголовок письма";
$body = "
<h2>Новое письмо</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $email<br><br>
<b>Сообщение:</b><br>
";

// Настройки PHPMailer
//$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail = new lib\PHPMailer\PHPMailer();

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false, //Проверка используемого SSL-сертификата
        'verify_peer_name' => false, //Проверка имени узла
        'allow_self_signed' => true //Разрешение на самоподписанные сертификаты
    )
);

try {
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты  support@sochelping.com
    $mail->Host       = 'smtp.sochelping.com'; // SMTP сервера вашей почты
    $mail->Username   = 'support'; // Логин на почте
    $mail->Password   = 'Mistartuem20212021'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('support@sochelping.com', 'Vasay'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress($email);
    //$mail->addAddress('youremail@gmail.com'); // Ещё один, если нужен


    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;

    // Проверяем отравленность сообщения
    if ($mail->send()) {$result = "success";}
    else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "status" => $status]);
