<?php
/**
 * Created by PhpStorm.
 * User: WinTeh
 * Date: 05.09.2021
 * Time: 12:21
 */
namespace incl\pro100\Ref;
use lib\Def as Def;
class Ref_link{
    function __construct(){
        $DB=new Def\SQLi();
        $res=$DB->boolSQL('UPDATE `t_users` SET `hits` = `hits`+1 WHERE log = '.$DB->realEscapeStr(Def\Route::$uri_parts[1]).' LIMIT 1');
        if($res) Def\Cookie::setCookie('referer',Def\Route::$uri_parts[1],2678400);
        Def\Route::location();
    }
}