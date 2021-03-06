<?php

namespace incl\pro100\Def;



class LangLibPay{

    const ARR_ERR_PAY=[
        'ru'=>[
            'openning_url_null'=>'Ошибка платёжной системы. Повторите попытку позже...',
            'file_null'=>'Файл не найден',
            'post_null'=>'Неизвестная ошибка',
            'sum_null'=>'Вы не указали сумму к выводу',
            'sum_min'=>'Введите сумму превышающую минимальный порог к выводу ',
            'sum_max'=>'Превышена максимальная сумма к выводу',
            'wallet_null'=>'Номер кашелька отсутствует',
            'low_balance'=>'Низкий баланс кашелька',
            'low_balance_w_commis'=>'Низкий баланс кашелька c учётом комисси',

            'level_0'=>'На Вашем уровне выплаты невозможны',
            'level_n'=>'На Вашем уровне выплаты ограничены суммой: ',

            'interface_lang'=>'ru_RU'//из таблицы API Perfect Money

        ],
        'en'=>[
            'openning_url_null'=>'Payment system error. Please try again later...',
            'file_null'=>'File is not found',
            'post_null'=>'Unknown error',
            'sum_null'=>'You have not entered a withdrawal amount',
            'sum_min'=>'Enter an amount above the minimum withdrawal threshold',
            'sum_max'=>'The maximum withdrawal amount has been exceeded',
            'wallet_null'=>'No wallet number',
            'low_balance'=>'Low wallet balance',
            'low_balance_w_commis'=>'Low wallet balance including commission',

            'level_0'=>'Payouts are not possible at your level',
            'level_n'=>'The payout is limited to an amount at your level: ',

            'interface_lang'=>'en_US'//из таблицы API Perfect Money
        ]
    ];

    const ARR_ERR_LOGIN=[
        'ru'=>[
            'post_null'=>'Неизвестная ошибка',
            'banned'=>'Пользователь забанен',
            'login'=>'Вы вошли',
            'bad_data'=>'Не верный логин или пароль',

        ],
        'en'=>[
            'post_null'=>'Unknown error',
            'banned'=>'User is banned',
            'login'=>'You are logged in',
            'bad_data'=>'Incorrect login or password',
        ]
    ];

    const ARR_ERR_REG=[
        'ru'=>[
            'post_null'=>'Неизвестная ошибка',
            'banned'=>'Пользователь забанен',
            'login'=>'Вы вошли',
            'bad_data'=>'Не верный логин или пароль',
            'connect_err'=>'Ошибка соединения',
            'login_small'=>'Короткий логин',
            'login_err'=>'Поле логин имеет запрещённые символы',
            'mail_err'=>'Не верно заполненно поле E-mail',
            'pass_err'=>'Поле пароль имеет запрещённые символы',
            'pass_small'=>'Короткий пароль',
            'offer'=>'Офёрта не принята',
            'usrmail'=>'Логин и E-mail заняты',
            'usr_reg'=>'Логин заняты',
            'mail_reg'=>'Данный E-mail уже зарегистрирован',
            'user_reg'=>'Пользователь зарегистрирован, войдите в кабинет используя логин и пароль...'
        ],
        'en'=>[
            'post_null'=>'Unknown error',
            'banned'=>'User is banned',
            'login'=>'You are logged in',
            'bad_data'=>'Incorrect login or password',
            'connect_err'=>'Connection error',
            'login_small'=>'The shot login',
            'login_err'=>'Login field has unlegal characters',
            'mail_err'=>'E-mail field is not filled in correctly',
            'pass_err'=>'Password field has unlegal characters',
            'pass_small'=>'The shot password',
            'offer'=>'Offer not accepted',
            'usrmail'=>'Login and e-mail are busy',
            'usr_reg'=>'Login is busy',
            'mail_reg'=>'E-mail details already registered',
            'user_reg'=>'User is logged in, log in using your username and password...'
        ]
    ];








    const ARR_ERR_RESET_PASS=[
        'ru'=>[
            'post_null'=>'Неизвестная ошибка',
            'banned'=>'Пользователь забанен',
            'mail_bad'=>'Неверный формат E-mail',
            'mail_data'=>'Инструкция отправлена',

        ],
        'en'=>[
            'post_null'=>'Unknown error',
            'banned'=>'User is banned',
            'mail_bad'=>'Incorrect E-mail format',
            'mail_data'=>'Instruction sent',
        ]
    ];



    const ARR_WORKS_ON_THE_SITE=[
        'ru'=>[
            'maintenance'=>'Раздел на техническом обслуживании',
            'development'=>'Раздел в разработке'
        ],
        'en'=>[
            'maintenance'=>'Section is under maintenance',
            'development'=>'The section is in development'
        ]
    ];

}