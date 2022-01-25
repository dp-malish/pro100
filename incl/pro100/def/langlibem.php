<?php
namespace incl\pro100\def;


class LangLibEm{

    const ARR_MAIL=[
        'ru'=>[
            //Письмо на старую почту с уведомлнием о смене почты
            'notice_old_em'=>'Заявка на смену адреса электронной почты',
            'notice_old_em_text'=>'<br>Вы подали заявку на смену адреса электронной почты.<br>
            <p>Ссылка для подтверждения была отправлена на указанный Вами адрес: ',
            'notice_old_em_text_1'=>'<br>Если это были не Вы, срочно обратитесь в службу технической поддержки support@sochelping.com .</p>
            <br><p>С уважением, Социальная сеть финансовой взаимоподдержки SocHelping.</p>
            <br><p>Внимание!<br>Пожалуйста, не отвечайте на это письмо. Оно было отправлено автоматически.</p>',

            //Письмо на новую почту с уведомлнием о смене почты
            'notice_new_em'=>'Подтверждение нового адреса электронной почты',
            'notice_new_em_text'=>'<p>Заявка на смену электронного адреса создана. </p><p>Для подтверждения смены и завершения процесса перейдите по ссылке: ',
            'notice_new_em_text_1'=>'</p><br><p>С уважением, SocHelping Team</p><br><p>Внимание!<br>Пожалуйста, не отвечайте на это письмо. Оно было отправлено автоматически.</p>',

        ],

        'en'=>[
            'notice_old_em'=>'Application for change of e-mail address',
            'notice_old_em_text'=>'<p>You have applied to change your email address.</p>
<p>A link for confirmation has been sent to the address you provided: ',
            'notice_old_em_text_1'=>'<br>If this was not you, please contact our technical support team support@sochelping.com immediately.</p>
            <br><p>Sincerely, Social network of financial support SocHelping.</p>
            <br><p>Warning!<br>Please, do not reply to this email. It was sent automatically.</p>',

            'notice_new_em'=>'Confirmation of new email address',
            'notice_new_em_text'=>'<p>An application to change your e-mail address has been created.</p><p>Follow the link provided in this email to confirm the change and complete the process: ',
            'notice_new_em_text_1'=>'</p><br><p>Regards, SocHelping Team</p><br><p>Warning!<br>Please,  do not reply to this email. It was sent automatically.</p>',
        ]

    ];







}