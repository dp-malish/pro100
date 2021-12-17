<?php
/**
 * Created by PhpStorm.
 * User: WinTeh
 * Date: 17.12.2021
 * Time: 13:35
 */

namespace incl\pro100\User;


use \lib\Def as Def;
use \incl\pro100\Def as Def100;


class ResetPass{

    function __construct(){
        //'code'=>1 - хорошо
        if(!Def\Validator::issetCookie('mob')){
            echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_RESET_PASS[Def\Opt::$lang]['mail_data'],'code'=>1]);
        }else



        echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_RESET_PASS[Def\Opt::$lang]['mail_data'],'code'=>1]);
    }


}