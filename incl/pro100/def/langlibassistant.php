<?php
namespace incl\pro100\Def;


class LangLibАssistant{
    const ARR_ASSISTANT=[
        'ru'=>[
            'name'=>'ПОМОЩНИК',
            'les0'=>'Здравствуйте! Приветствуем Вас на проекте. Я помогу Вам разобраться с системой, в этом нет ничего сложного.',
            'les1'=>'<b>Шаг 1.</b> Заполните в профиле контактные и платёжные данные. Это нужно, чтобы Ваши партнёры могли связаться с Вами. <a href="/cabinet/profile">Заполнить</a>',
            'les2'=>'<b>Шаг 2.</b> Перейдите на страницу Пополнить, затем Повысить уровень и система переведёт сумму (соответствующую стоимости покупаемого уровня) Вашему куратору данного уровня. <a href="/cabinet/up">Перейти</a>',
            'les3'=>'<b>Шаг 3.</b> После перевода уровень будет повышен автоматически.',
            'les4'=>'<b>Шаг 4.</b> Теперь Вы можете приглашать партнёров по своей реферальной ссылке и получать денежные подарки.',
            'les5'=>'Вы освоились на проекте и поняли принцип работы. Приглашайте партнёров, заполняйте линии и не забывайте вовремя повышать свой уровень. Удачной работы!',
            'no_message'=>'Для Вас нет сообщений...'
        ],
        'en'=>[
            'name'=>'ASSISTANT',

            'openning_url_null'=>'Payment system error. Please try again later...',
            'file_null'=>'File is not found',
            'post_null'=>'Unknown error',
            'sum_null'=>'You have not entered a withdrawal amount',
            'sum_min'=>'Enter an amount above the minimum withdrawal threshold',
            'sum_max'=>'The maximum withdrawal amount has been exceeded',
            'wallet_null'=>'No wallet number',
            'low_balance'=>'Low wallet balance',
            'low_balance_w_commis'=>'Low wallet balance including commission',
        ]
    ];

}