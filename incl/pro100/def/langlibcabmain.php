<?php
namespace incl\pro100\Def;


class LangLibCabMain{
    const ARR_INDEX=[
        'ru'=>[
            'info_index'=>'ИНФОРМАЦИЯ ОБ АККАУНТЕ',
            'general'=>'Общие',
            'contact'=>'Контактные данные',
            'payment'=>'Платёжные данные',

            'personal'=>'Личные данные',

            'name'=>'Имя',
            'name_place'=>'Ваше имя',
            'name_null'=>'Ваше имя не указано.',
            'surname'=>'Фамилия',
            'surname_place'=>'Ваша фамилия',
            'surname_null'=>'Ваша фамилия не указана.',
            'sex'=>'Пол',
            'sex_select'=>'Выбрать пол',
            'sex_null'=>'Ваш пол не указан.',

            'sex_db'=>['Женский','Мужской','Другой'],

            'birthday'=>'Дата рождения',
            'birthday_null'=>'День рождения не указан.',



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

            'personal'=>'Personal data',

            'name'=>'First Name',
            'name_place'=>'Your name',
            'name_null'=>'Your First  Name is not specified.',
            'surname'=>'Last Name',
            'surname_place'=>'Your surname',
            'surname_null'=>'Your Last Name is not specified.',
            'sex'=>'Gender',
            'sex_select'=>'Select gender',
            'sex_null'=>'Your Gender is not specified.',
            'sex_db'=>['Female','Male','Other'],
            'birthday'=>'Date of Birth',
            'birthday_null'=>'Your Date of  Birth is not specified.',


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
            'name_1'=>'Deposit',
            'name_2'=>'Withdraw',

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
            'ref_no'=>'Партнёры отсутствуют',
            'ref_inactive_no'=>'Нет неактивных партнеров...',

            't_f_partners'=>'Партнёры',
            't_f_level'=>'Уровень',
            't_f_data'=>'Дата',


        ],
        'en'=>[
            'name'=>'PARTNERS',
            'l1'=>'FIRST LINE',
            'l2'=>'SECOND LINE',
            'l3'=>'THIRD LINE',
            'l4'=>'FOURTH LINE',
            'l0'=>'INACTIVE',
            'ref_map'=>'REFERRAL MAP',
            'ref_no'=>'No partners',
            'ref_inactive_no'=>'No inactive partners...',

            't_f_partners'=>'Partners',
            't_f_level'=>'Level',
            't_f_data'=>'Date',
        ]
    ];

    const ARR_LEVEL_UP=[
        'ru'=>[
            'name'=>'УРОВЕНЬ',
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
            'name'=>'LEVEL',
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
            'support_form'=>'Форма поддержки',


            'field_1'=>'Тема',

            'theme'=>[
                'general'=>'Основные вопросы',
                'technical'=>'Технические вопросы',
                'marketing'=>'Маркетинг',
                'deposit'=>'Депозит',
                'withdraw'=>'Вывод',
            ],

            'field_2'=>'Вопрос',

            'js_err'=>'Опишите Ваш вопрос подробнее...',

            'answer_good'=>'Ваше сообщение отправлено в службу поддержки. В ближайшее время мы свяжемся с Вами...'
    ],
        'en'=>[
            'name'=>'SUPPORT SERVICE',
            'support_form'=>'Support form',


            'field_1'=>'Theme',

            'theme'=>[
                'general'=>'General Questions',
                'technical'=>'Technical Questions',
                'marketing'=>'Marketing',
                'deposit'=>'Deposit',
                'withdraw'=>'Withdraw',
            ],

            'field_2'=>'Question',

            'js_err'=>'Describe your question in more detail...',

            'answer_good'=>'Your message has been sent to support. We will contact you shortly...'
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
            'data_pay_null'=>'Платёжные данные не указаны.',
            'data_pay_null_link'=>' Заполнить данные...',

            'ps'=>'Платёжная система',
            'pm_answer_index'=>' Указан кошелёк: ',

            'wallet'=>'Кошелёк',
            'wallet_err'=>'Кошелёк указан не верно',
            'wallet_update'=>'Кошелёк изменён',

            'post_null'=>'Неизвестная ошибка',

            //personal
            'name_err'=>'Имя пользователя указано не корректно...',
            'surname_err'=>'Фамилия пользователя указано не корректно...',

            'save_data'=>'Данные сохранены.',

            'star'=>'Поля, обозначенные звездочкой, обязательны для заполнения, остальные поля заполняются по желанию.',

            'settings'=>'Настройки',
            'upd_pas'=>'Сменить пароль',

            'old_pas'=>'Старый пароль',
            'old_pas_plac'=>'Старый пароль',
            'new_pas'=>'Новый пароль',
            'new_pas_plac'=>'Новый пароль',
            'confirm_pas'=>'Подтверждение пароля',
            'confirm_pas_plac'=>'Подтверждение пароля',

            'pas_good'=>'Пароль изменён...',
            'old_pas_bad'=>'Не верный пароль...',
            'new_pas_bad'=>'Новый пароль содержит запрещённые символы...',
            'new_pas_conf_bad'=>'Новый пароль не совпадает...',



            'upd_em'=>'Сменить email',
            'cur_em'=>'Текущий email:',
            'new_em'=>'Новый email:',
            'new_em_plac'=>'Ваш новый email',
            'new_em_answer'=>'Заявка на смену электронной почты создана. Инструкция для активации нового электронного ящика выслана Вам на новый электронный адрес.',


        ],
        'en'=>[
            'name'=>'PROFILE',
            'data_pay_null'=>'Payment details are not specified.',
            'data_pay_null_link'=>' Fill in the data...',

            'ps'=>'Payment system',
            'pm_answer_index'=>' The wallet is indicated: ',

            'wallet'=>'Wallet',
            'wallet_err'=>'The wallet is not correct',
            'wallet_update'=>'Wallet changed',

            'post_null'=>'Unknown error',

            //personal
            'name_err'=>'The First Name is not correct...',
            'surname_err'=>'The Last Name is not correct...',

            'save_data'=>'Data saved.',

            'star'=>'The fields indicated with an asterisk are required to complete this transaction; other fields are optional.',

            'settings'=>'Settings',
            'upd_pas'=>'Change password',

            'old_pas'=>'Old password',
            'old_pas_plac'=>'Your Old Password ',
            'new_pas'=>'New password',
            'new_pas_plac'=>'Your New Password',
            'confirm_pas'=>'Password confirm',
            'confirm_pas_plac'=>'Your Password Confirmation',

            'pas_good'=>'Password changed...',
            'old_pas_bad'=>'Invalid password...',
            'new_pas_bad'=>'The new password contains invalid characters...',
            'new_pas_conf_bad'=>'The new password does not match...',



            'upd_em'=>'Change email',
            'cur_em'=>'Current email:',
            'new_em'=>'New email:',
            'new_em_plac'=>'Your new email',
            'new_em_answer'=>'Заявка на смену электронной почты создана. Инструкция для активации нового электронного ящика выслана Вам на новый электронный адрес.',

        ]
    ];




    const ARR_L_MENU_PC=[
        'ru'=>[
            'account'=>'Аккаунт',
            'balance'=>'Баланс',
            'cash_add'=>'Пополнить',
            'cash_out'=>'Вывести',
            'partners'=>'Партнёры',
            'level_up'=>'Уровень',

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
            'level_up'=>'Level',

            'support'=>'Support',
            'promo'=>'Promotion',

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