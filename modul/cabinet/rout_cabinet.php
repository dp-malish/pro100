<?php
namespace lib\Def;
use incl\pro100\Def as Def100;
use \incl\pro100\User as User;

User\User::$selfUser->validPassCookie();

if(Opt::$live_user!=0){Opt::$template=2;

    Def100\OptCab::$hi_privilege=in_array(Opt::$live_user_id,Def100\OptCab::ARR_HI_PRIVILEGE);

    if(!empty(Route::$uri_parts[1])){

    switch(Route::$uri_parts[1]){
        case 'balance':include'../modul/cabinet/pay/balance.php';break;//главная баланс
        case'cash-add':include'../modul/cabinet/pay/cashadd.php';break;//пополнить $
        case'cash-out':include'../modul/cabinet/pay/cashout.php';break;//вывести $
        //case'cash-in':include'../modul/cabinet/pay/cashin.php';break;//пополняшка пересылка на кошелёк
        case'history-in':include'../modul/cabinet/pay/historyin.php';break;//пополняшка история ввода
        case'history-out':include'../modul/cabinet/pay/historyout.php';break;//пополняшка история вывода
//******************************************
        case'partners':include'../modul/cabinet/partners.php';break;
        case'level-up':include'../modul/cabinet/level-up.php';break;
        case'support':include'../modul/cabinet/support.php';break;
        case'promo':include'../modul/cabinet/promo.php';break;
//******************************************
        case'profile':include'../modul/cabinet/profile.php';break;
//******************************************
        default:Route::$module404=1;
    }
    }else
        //echo 'Кабинет';
        include'../modul/cabinet/index.php';//просто кабинет
}//else echo 'Надо зайти';