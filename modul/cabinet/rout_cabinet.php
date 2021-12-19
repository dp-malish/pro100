<?php
namespace lib\Def;
use \incl\pro100\User as User;

User\User::$selfUser->validPassCookie();

/*echo '<br>ты в кабинете<br>';
Opt::$main_content.='<br><br><a href="/exit">Выход</a>';
Opt::$main_content.='<br><br><a href="/">Главная</a>';
Opt::$main_content.='<br><br><a href="/cabinet/">Кабинет</a>';
Opt::$main_content.='<br><br><a href="/cabinet/cashadd">Кабинет cashadd</a>';
Opt::$main_content.='<br><br><a href="/cabinet/cashout">Кабинет cashout</a>';*/
//Opt::$main_content.='<br><br><a href="/cabinet/cashout">Кабинет cashout</a>';




if(Opt::$live_user!=0){

    Opt::$template=2;

    if(!empty(Route::$uri_parts[1])){

    switch(Route::$uri_parts[1]){
        case'cashadd':include'../modul/cabinet/pay/cashadd.php';break;//пополнить $
        case'cashout':include'../modul/cabinet/pay/cashout.php';break;//вывести $
        case'cashin':include'../modul/cabinet/pay/cashin.php';break;//пополняшка пересылка на кошелёк




        default:Route::$module404=1;
    }
    }else{
        //просто кабинет
         //Opt::$main_content.='просто кабинет';
         include'../modul/cabinet/index.php';
    }
} else echo '<br>Надо зайти';