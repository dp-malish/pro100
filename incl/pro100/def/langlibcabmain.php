<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 19.12.2021
 * Time: 20:22
 */

namespace incl\pro100\Def;


class LangLibCabMain{
    const ARR_INDEX=[
        'ru'=>[
            'info_index'=>'ИНФОРМАЦИЯ ОБ АККАУНТЕ',
            'general'=>'Общие',
            'contact'=>'Контактные данные',
            'payment'=>'Платёжные данные',


            'gen_l1'=>'Уровень: ',
            'gen_l2'=>'Партнёрская ссылка: ',
            'gen_l3'=>'станет доступна по достижению первого уровня.',
            'gen_l4'=>'Повысить уровень...',


        ],
        'en'=>[
            'info_index'=>'ACCOUNT INFORMATION',
            'general'=>'General',
            'contact'=>'Contact info',
            'payment'=>'Payment details',


            'gen_l1'=>'Level: ',
            'gen_l2'=>'Partner link: ',
            'gen_l3'=>'will become available when the first line is reached.',
            'gen_l4'=>'Level up...',
        ]
    ];

    const ARR_BALANS=[
        'ru'=>[
            'name'=>'БАЛАНС',
            'name_1'=>'Пополнение средств',
            'name_2'=>'Вывод средств',

            'bal_hist_out'=>'История вывода',
            'tabl_out_sum'=>'Сумма',
            'tabl_out_pay_system'=>'Платёжная система',
            'tabl_out_date'=>'Дата выплаты',
            'tabl_out_null'=>'История выплат пуста.',


            'bal_hist_in'=>'История пополнения',
            'tabl_in_sum'=>'Сумма',
            'tabl_in_kind'=>'Тип зачисления',
            'tabl_in_date'=>'Дата зачисления',
            'tabl_in_null'=>'История зачислений пуста.',
            'tabl_in_kind_rep'=>'Пополнение баланса',
            'tabl_in_kind_ref'=>'Партнёрские начисления',


            'form_add_bal'=>'Форма пополнения баланса',
            'sum_add'=>'Сумма к пополнению',

            'form_out_bal'=>'Форма вывода средств',
            'sum_out'=>'Сумма к выводу',


        ],
        'en'=>[
            'name'=>'BALANCE',
            'name_1'=>'Money add',
            'name_2'=>'Money out',

            'bal_hist_out'=>'Withdrawal history',
            'tabl_out_sum'=>'Amount',
            'tabl_out_pay_system'=>'Payment system',
            'tabl_out_date'=>'Payment date',
            'tabl_out_null'=>'The payment history is empty.',

            'bal_hist_in'=>'Replenishment history',
            'tabl_in_sum'=>'Amount',
            'tabl_in_kind'=>'Admission type',
            'tabl_in_date'=>'Admission date',
            'tabl_in_null'=>'The admission history is empty.',
            'tabl_in_kind_rep'=>'Balance replenishment',
            'tabl_in_kind_ref'=>'Partner accruals',


            'form_add_bal'=>'Deposit form',
            'sum_add'=>'Deposit amount',

            'form_out_bal'=>'Withdrawal form',
            'sum_out'=>'Withdrawal amount',
        ]
    ];

    const ARR_PARTNERS=[
        'ru'=>[
            'name'=>'ПАРТНЁРЫ',
            'l1'=>'ПЕРВАЯ ЛИНИЯ',
            'l2'=>'ВТОРАЯ ЛИНИЯ',
            'l3'=>'ТРЕТЬЯ ЛИНИЯ',
            'l4'=>'ЧЕТВЁРТАЯ ЛИНИЯ',
            'l0'=>'НЕАКТИВНЫЕ',
            'ref_map'=>'КАРТА РЕФЕРАЛОВ',
            'ref_no'=>'Партнёры отсутствуют'

        ],
        'en'=>[
            'name'=>'PARTNERS',
            'l1'=>'FIRST LINE',
            'l2'=>'SECOND LINE',
            'l3'=>'THIRD LINE',
            'l4'=>'FORTH LINE',
            'l0'=>'INACTIVE',
            'ref_map'=>'REFERRAL MAP',
            'ref_no'=>'No partners'
        ]
    ];

    const ARR_LEVEL_UP=[
        'ru'=>[
            'name'=>'ПОВЫСИТЬ УРОВЕНЬ',
            'current_level'=>'Ваш текущий уровень: ',
            'next_level'=>'Ваш следующий уровень: ',
            'max_level'=>'Вы достигли максимального уровня!',
            'level_note'=>'Для повышения уровня пополните баланс аккаунта на необходимую сумму и нажмите на кнопку "Повысить уровень".',
            'level_cost'=>'Стоимость уровня: $',
            'live_user_null'=>'Необходима авторизация',
//ошибки в классе
            'low_balance'=>'Низкий баланс',

        ],
        'en'=>[
            'name'=>'LEVEL UP',
            'current_level'=>'Your current level: ',
            'next_level'=>'Your next level: ',
            'max_level'=>'You have reached the maximum level!',
            'level_note'=>'To level up, top up Your account with the required amount and click on the "Level up\' button".',
            'level_cost'=>'Level cost: $',
            'live_user_null'=>'Authorization required',

            'low_balance'=>'Low balance',
        ]
    ];

    const ARR_SUPPORT=[
        'ru'=>[
            'name'=>'СЛУЖБА ПОДДЕРЖКИ',

        ],
        'en'=>[
            'name'=>'SUPPORT SERVICE',

        ]
    ];

    const ARR_PROMO=[
        'ru'=>[
            'name'=>'ПРОМО МАТЕРИАЛЫ',
            'size_baner_start'=>'HTML-код для вставки баннера ',
            'size_baner_end'=>''],
        'en'=>[
            'name'=>'PROMO MATERIALS',
            'size_baner_start'=>'HTML code for inserting a ',
            'size_baner_end'=>' banner']
    ];

    const ARR_PROFILE=[
        'ru'=>[
            'name'=>'Профиль',

        ],
        'en'=>[
            'name'=>'PROFILE',

        ]
    ];




    const ARR_L_MENU_PC=[
        'ru'=>[
            'account'=>'Аккаунт',
            'balance'=>'Баланс',
            'cash_add'=>'Пополнить',
            'cash_out'=>'Вывести',
            'partners'=>'Партнёры',
            'level_up'=>'Повысить уровень',

            'support'=>'Служба поддержки',
            'promo'=>'Промо материалы',

            'news'=>'Новости',
            'exit'=>'Выход'



        ],
        'en'=>[
            'account'=>'Account',
            'balance'=>'Balance',
            'cash_add'=>'Cash add',
            'cash_out'=>'Cash out',
            'partners'=>'Partners',
            'level_up'=>'Level up',

            'support'=>'Support service',
            'promo'=>'Promo materials',

            'news'=>'News',
            'exit'=>'Exit'
        ]
    ];

    const ARR_ADM_MENU_PC=[
        'ru'=>[
            'profile'=>'Профиль',
            'exit'=>'Выход'
        ],
        'en'=>[
            'profile'=>'Profile',
            'exit'=>'Exit'
        ]
    ];


}