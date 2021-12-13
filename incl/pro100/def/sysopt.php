<?php
/**
 * Created by PhpStorm.
 * User: WinTeh
 * Date: 22.10.2021
 * Time: 10:30
 */

namespace incl\pro100\Def;

use lib\Def as Def;


class SysOpt{

    function __construct(){
        if($_SERVER['REQUEST_URI']!='/'){
            if(Def\Route::requestURI(3)){
                switch(Def\Route::$uri_parts[0]){
                    //case 'sota'.Data::DatePass():$AdminCook->setCookieAdmin();Route::$index=1;break;

                    case'logdown':User\User::$selfUser->loginUser();break;//отключить платежи


                    case'login':User\User::$selfUser->loginUser();break;//Вход в акаунт
                    case'exit':User\User::exitLogin();break;//Выход из акаунта
                    case'reg':new User\Reg();break;//регистрация

                    case'cabinet':include'../modul/cabinet/rout_cabinet.php';break;//главный кабинет

                    //default:new \incl\burger\Index\IndexContent();;
                }
            }
        }



    }

    private function payStop(){
        $filename = '/path/to/foo.txt';

        if (file_exists($filename)) {
            echo "Файл $filename существует";
        }else{
            echo "Файл $filename не существует";
        }

        /*file_put_contents('../../../log_pm/'.$payment_id.'.txt', file_get_contents($f));
        fclose($f);*/

    }


}