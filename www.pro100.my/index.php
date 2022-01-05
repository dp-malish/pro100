<?php
namespace lib\Def;

use \incl\pro100\User as User;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',0);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new Opt('pro100');//Def opt

User\User::$selfUser=new User\User();//первый вход не в кабинет !!!! важно

Cache_File::$cash=new Cache_File(['pro100'],true);

Opt::$lang='en';

if($_SERVER['REQUEST_URI']!='/'){
    if(Route::requestURI(3)){
        switch(Route::$uri_parts[0]){
            //case 'sota'.Data::DatePass():$AdminCook->setCookieAdmin();Route::$index=1;break;

            //верхнее меню
            case'marketing':include'../modul/site/marketing.php';break;//стр. маркетинга
            case'news':include'../modul/site/news.php';break;//стр. news
            case'offer':include'../modul/site/offer.php';break;//стр. offer
            case'faq':include'../modul/site/faq.php';break;//стр. faq
            //верхнее меню конец


            //case'logdown':User\User::$selfUser->loginUser();break;//отключить платежи


            //case'login':User\User::$selfUser->loginUser();break;//Вход в акаунт
            case'exit':User\User::exitLogin();break;//Выход из акаунта
            //case'reg':new User\Reg();break;//регистрация

            case'cabinet':include'../modul/cabinet/rout_cabinet.php';break;//главный кабинет
            case'perfect':
                $pm=new \incl\pro100\Pay\Pay_PM();
                /*$pm->valid_post_request=true;//temp
                $pm->arrPM['PAYMENT_ID']='12_156774275079';
                $pm->arrPM['PAYMENT_AMOUNT']='1';
                $pm->arrPM['PAYMENT_BATCH_NUM']='7777777';*/
                $pm->processPayment();
                //$pm->fileErr();//Temp
                break;//ответ perfect money платёжки кабинет



            case'p':new \incl\pro100\Ref\Ref_link();break;//реф ссылка / учёт переходов






            case'banned':$Opt::$main_content='<br>!!!!';break;//Страницу бана сделать при входе



            default:Route::$module404=true;
            //default:new \incl\burger\Index\IndexContent();;
        }
    }
}else{Route::$index=1;}
if(Route::$module404==true){Route::modul404();}
if(Route::$index){
    include'../modul/site/index.php';
}

if($Opt::$template==1){
    include '../blocks/pro100/t1/common/head.php';
    include '../blocks/pro100/t1/common/header.php';
    include '../blocks/pro100/t1/common/body.php';
    include '../blocks/pro100/t1/common/foot.php';
}else{
    include '../blocks/pro100/t2/common/head.php';
    include '../blocks/pro100/t2/common/header.php';
    include '../blocks/pro100/t2/common/l_menu.php';
    include '../blocks/pro100/t2/common/body.php';
    include '../blocks/pro100/t2/common/foot.php';
}