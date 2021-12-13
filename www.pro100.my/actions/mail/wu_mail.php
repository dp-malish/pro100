<?php
require 'PHPMailerAutoload.php';

/*
Отправка E-mail осуществляется через вызов функции esend('E-mail получателя', 'Имя получателя', 'Тема', 'Сообщение', 'Тип');
Для отправки писем через SMTP (гарантирует доставку)
раскомментируйте "$mail->isSMTP();" (удалите //) и введите свои данные,
это хост (Host) вашего почтовика, логин (Username) и пароль от аккаунта (Password),
так же заполните SMTPSecure и Port. По умолчанию стоят настройки Яндекса,
Вам нужно лишь раскомментировать $mail->isSMTP(); и ввести Username, setFrom (то же что и Username) и Password,
вы можете создать новый аккаунт для отправки писем на yandex.ru, обратите внимание,
что при отправке через SMTP, Username и setFrom должны быть одинаковы.
При затруднении обратитесь в поддержку CMS WebUpper
*/

function esend($send_to, $send_to_name, $theme, $msg, $type) {
$mail = new PHPMailer;
//$mail->isSMTP();                                      // Отправка через SMTP
$mail->Host = 'smtp.yandex.ru'; 						 // Хост
$mail->SMTPAuth = true;                               // Аутентификация
$mail->Username = 'mail@yandex.ru';                 // Ваш логин
$mail->Password = 'pass';                           // Ваш пароль
$mail->SMTPSecure = 'ssl';                            // tls/ssl
$mail->Port = 465;                                    // порт

$mail->setFrom('mail@yandex.ru', 'Cash-Like');
$mail->addAddress($send_to, $send_to_name);     // Получатель
$mail->isHTML(true);                                  // HTML формат

$mail->CharSet = 'UTF-8';
$mail->Subject = $theme;

//Типы сообщений
if ($type == 'notif') { //Уведомление
$mail->Body    = '
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Minty-Multipurpose Responsive Email Template</title>
</head>
<body>
<style type="text/css">
/* Client-specific Styles */
#outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
/* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
.ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */
#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
a {text-decoration: none;color: #10a8d4;}
.image_fix {display:block;}
p {margin: 0px 0px !important;}
table td {border-collapse: collapse;}
table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
/*a {color: #e95353;text-decoration: none;text-decoration:none!important;}*/
/*STYLES*/
table[class=full] { width: 100%; clear: both; }
/*################################################*/
/*IPAD STYLES*/
/*################################################*/
@media only screen and (max-width: 640px) {
a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: #ffffff; /* or whatever your want */
pointer-events: none;
cursor: default;
}
.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: #ffffff !important;
pointer-events: auto;
cursor: default;
}
table[class=devicewidth] {width: 440px!important;text-align:center!important;}
table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
table[class="sthide"]{display: none!important;}
td[class="menu"]{text-align:center !important; padding: 0 0 10px 0 !important;}
td[class="logo"]{padding:10px 0 5px 0!important;margin: 0 auto !important;}
}
/*##############################################*/
/*IPHONE STYLES*/
/*##############################################*/
@media only screen and (max-width: 480px) {
a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: #ffffff; /* or whatever your want */
pointer-events: none;
cursor: default;
}
.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: #ffffff !important; 
pointer-events: auto;
cursor: default;
}
table[class=devicewidth] {width: 280px!important;text-align:center!important;}
table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
table[class="sthide"]{display: none!important;}
img[class="bigimage"]{width: 260px!important;height:136px!important;}
img[class="col2img"]{width: 260px!important;height:160px!important;}
img[class="image-banner"]{width: 280px!important;height:68px!important;}
}
</style>
<div class="block">
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header">
<tbody>
<tr>
<td>
<table width="580" bgcolor="#0db9ea" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hlitebg="edit" shadow="edit">
<tbody>
<tr>
<td>
<table width="280" cellpadding="0" cellspacing="0" border="0" align="left" class="devicewidth">
<tbody>
<tr>
<td valign="middle" width="270" style="padding: 10px 0 10px 20px;line-height: 24px; text-transform: uppercase;" class="logo">
<b><a href="'.$Opt::$protocol.SITE.'" style="color: #ffffff;font-family: Helvetica, Arial, sans-serif;font-size: 14px;text-decoration: none;">'.SITE.'</a></b>
</td>
</tr>
</tbody>
</table>
<table width="280" cellpadding="0" cellspacing="0" border="0" align="right" class="devicewidth">
<tbody>
<tr>
<td width="270" valign="middle" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px; color: #ffffff;line-height: 24px; padding: 10px 0;" align="right" class="menu" st-content="menu">
<a href="'.$Opt::$protocol.SITE.'" style="text-decoration: none; color: #ffffff;">НА ГЛАВНУЮ</a>
&nbsp;|&nbsp;
<a href="'.$Opt::$protocol.SITE.'/account/" style="text-decoration: none; color: #ffffff;">В АККАУНТ</a>
</td>
<td width="20"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<div class="block">
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="bigimage">
<tbody>
<tr>
<td>
<table style="border: 1px solid #9fd5e4;" width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" modulebg="edit">
<tbody>
<tr>
<td width="100%" height="20"></td>
</tr>
<tr>
<td>
<table width="540" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner">
<tbody>
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; color: #383838; text-align:left;line-height: 24px;" st-content="rightimage-paragraph">
'.$msg.'
</td>
</tr>
<tr>
<td width="100%" height="20"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<div class="block">
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="postfooter">
<tbody>
<tr>
<td width="100%">
<table width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
<tbody>
<tr>
<td width="100%" height="5"></td>
</tr>
<tr>
<td align="center" valign="middle" style="font-family: Helvetica, arial, sans-serif; font-size: 10px;color: #999999" st-content="preheader">
Если вы не хотите получать уведомления, пожалуйста, отключите данную функцию в <a class="hlite" href="'.$Opt::$protocol.SITE.'/account/" style="text-decoration: none; color: #0db9ea">профиле</a> 
</td>
</tr>
<tr>
<td width="100%" height="5"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</body>
</html>
';
}
if ($type == 'clear') { //Чистый шаблон без ссылок в личный кабинет
$mail->Body    = '
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Minty-Multipurpose Responsive Email Template</title>
</head>
<body>
<style type="text/css">
/* Client-specific Styles */
#outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
/* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
.ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */
#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
a {text-decoration: none;color: #10a8d4;}
.image_fix {display:block;}
p {margin: 0px 0px !important;}
table td {border-collapse: collapse;}
table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
/*a {color: #e95353;text-decoration: none;text-decoration:none!important;}*/
/*STYLES*/
table[class=full] { width: 100%; clear: both; }
/*################################################*/
/*IPAD STYLES*/
/*################################################*/
@media only screen and (max-width: 640px) {
a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: #ffffff; /* or whatever your want */
pointer-events: none;
cursor: default;
}
.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: #ffffff !important;
pointer-events: auto;
cursor: default;
}
table[class=devicewidth] {width: 440px!important;text-align:center!important;}
table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
table[class="sthide"]{display: none!important;}
td[class="menu"]{text-align:center !important; padding: 0 0 10px 0 !important;}
td[class="logo"]{padding:10px 0 5px 0!important;margin: 0 auto !important;}
}
/*##############################################*/
/*IPHONE STYLES*/
/*##############################################*/
@media only screen and (max-width: 480px) {
a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: #ffffff; /* or whatever your want */
pointer-events: none;
cursor: default;
}
.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: #ffffff !important; 
pointer-events: auto;
cursor: default;
}
table[class=devicewidth] {width: 280px!important;text-align:center!important;}
table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
table[class="sthide"]{display: none!important;}
img[class="bigimage"]{width: 260px!important;height:136px!important;}
img[class="col2img"]{width: 260px!important;height:160px!important;}
img[class="image-banner"]{width: 280px!important;height:68px!important;}
}
</style>
<div class="block">
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header">
<tbody>
<tr>
<td>
<table width="580" bgcolor="#0db9ea" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hlitebg="edit" shadow="edit">
<tbody>
<tr>
<td>
<table width="280" cellpadding="0" cellspacing="0" border="0" align="left" class="devicewidth">
<tbody>
<tr>
<td valign="middle" width="270" style="padding: 10px 0 10px 20px;line-height: 24px; text-transform: uppercase;" class="logo">
<b><a href="'.$Opt::$protocol.SITE.'" style="color: #ffffff;font-family: Helvetica, Arial, sans-serif;font-size: 14px;text-decoration: none;">'.SITE.'</a></b>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
<div class="block">
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="bigimage">
<tbody>
<tr>
<td>
<table style="border: 1px solid #9fd5e4;" width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" modulebg="edit">
<tbody>
<tr>
<td width="100%" height="20"></td>
</tr>
<tr>
<td>
<table width="540" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner">
<tbody>
<tr>
<td style="font-family: Helvetica, arial, sans-serif; font-size: 14px; color: #383838; text-align:left;line-height: 24px;" st-content="rightimage-paragraph">
'.$msg.'
</td>
</tr>
<tr>
<td width="100%" height="20"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</body>
</html>
';
}
if(!$mail->send()) {
//echo 'Message could not be sent.';
//echo 'Mailer Error: ' . $mail->ErrorInfo;
}
}