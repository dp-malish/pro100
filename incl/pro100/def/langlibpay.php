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

        ],
        'en'=>[
            'post_null'=>'Unknown error'
        ]
    ];
}