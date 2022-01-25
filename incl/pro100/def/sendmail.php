<?php
namespace incl\pro100\def;

use lib\PHPMailer as Mail;

class SendMail{

    static function sendTextMail($email,$title,$body){

        $mail = new Mail\PHPMailer();
        //отмена проверки сертификатов
        $mail->SMTPOptions = [
            'ssl'=>[
                'verify_peer' => false, //Проверка используемого SSL-сертификата
                'verify_peer_name' => false, //Проверка имени узла
                'allow_self_signed' => true //Разрешение на самоподписанные сертификаты
            ]
        ];


        try{
            $mail->isSMTP();
            $mail->CharSet = "UTF-8";
            $mail->SMTPAuth   = true;
            //$mail->SMTPDebug = 2;
            //$mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

            // Настройки вашей почты
            $mail->Host       =OptCab::MAIL_SMTP;//SMTP сервера вашей почты
            $mail->Username   =OptCab::MAIL_AUTO['user'];// Логин на почте
            $mail->Password   =OptCab::MAIL_AUTO['pass'];// Пароль на почте
            $mail->SMTPSecure =OptCab::MAIL_AUTO['ssl'];
            $mail->Port       =OptCab::MAIL_AUTO['port'];
            $mail->setFrom(OptCab::MAIL_AUTO['from'], OptCab::MAIL_AUTO['from_name']); // Адрес самой почты и имя отправителя

            // Получатель письма
            $mail->addAddress($email);
            //$mail->addAddress('youremail@gmail.com'); // Ещё один, если нужен


            // Отправка сообщения
            $mail->isHTML(true);
            $mail->Subject=$title;
            $mail->Body=$body;

            // Проверяем отравленность сообщения
            if ($mail->send()) {$result = "success";}
            else {$result = "error";}

        } catch (Exception $e) {
            $result = "error";
            $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
        }

// Отображение результата
        echo json_encode(["result" => $result, "status" => $status]);


        return true;
    }

}