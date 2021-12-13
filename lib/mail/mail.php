<?php
/**
 * Класс по умолчанию
 * Date: 17.10.2019
 * Time: 18:26
 */
namespace lib\Mail;

class Mail{

    /**
     * $to - кому: получатель, или получатели письма
     * $subject - Тема отправляемого письма
     * $message - Текст письма
     */

    static function sendMail($to,$from,$subject,$message){
        //$subject="=?utf-8?B?". base64_encode($subject). "?=";
        $header="From: ".$from;
        $header.="\nContent-type: text/html; charset=\"utf-8\"";
        //$message = "Текст письма";
        return mail($to, $subject, $message, $header);
    }

}