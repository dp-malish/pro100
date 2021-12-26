<?php
namespace lib\Def;

use \incl\pro100\Def as Def100;
use \incl\pro100\User as User;
//Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',0);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new Opt('pro100');//Def opt

User\User::$selfUser=new User\User();//первый вход не в кабинет !!!! важно
User\User::$selfUser->validPassCookie();

Cache_File::$cash=new Cache_File(['pro100'],true);
$DB=new SQLi();
Opt::$lang='en';

//$refs_all=0;

$next_level=User\User::$arrDBUser['level']+1;

$LU=new User\LevelUp();

echo '<br><br><br>Пытаемся активировать уровень: '.$next_level.'<br><br><br>';

//Сделать проверку баланса пользователя
/*if(User\User::$arrDBUser['bal']>=Def100\OptCab::LEVEL_COST[$next_level]){
    echo '<br>текущий баланс '.User\User::$arrDBUser['bal'].' соответствует уровню '.Def100\OptCab::LEVEL_COST[$next_level].'<br>';
}else{
    echo '<br>!!!!!!!!низкий баланс '.User\User::$arrDBUser['bal'].' не соответствует уровню '.Def100\OptCab::LEVEL_COST[$next_level].'<br>';
}*/
/*
echo '<br><br>';


echo '<br><br><br>если реферер (папа) имеет левел 0 то кидать админу<br>';

$papa=$DB->strSQL('SELECT * FROM t_users WHERE uid='.User\User::$arrDBUser['ref'].' LIMIT 1');
    if($papa['level']>0){
        $arrPapa=$papa;

        echo '<br>реферер (папа) имеет левел '.$papa['level'];

    }else{
        if($DB->boolSQL('UPDATE `t_users` SET `ref` = '.Def100\OptCab::ID_ADMIN.' WHERE uid = '.
            User\User::$arrDBUser['uid'].' LIMIT 1')){
            //изменил реф на админа
            echo '<br>изменил реф на админа<br>';
            User\User::$arrDBUser['ref']=Def100\OptCab::ID_ADMIN;
            echo User\User::$arrDBUser['ref'];
            echo '<br>и зарегать человека первой линией от админа !!!!!!!!!!!!!!!!!!!!!!!!<br>';
            regUser();
        }
    }

echo '<br>***************************************************************';
echo '<br>***************************************************************';*/


if($next_level==1){

    echo '<br><br>Если $next_level='.$next_level;


    echo '<br><br>сначала если папа имеет меньше 3 рефералов';
    $res=$DB->arrSQL('SELECT uid FROM t_users WHERE ref='.$papa['uid'].' AND `level`>0 LIMIT 3');

    echo '<pre>';
    var_dump($res);
    echo '</pre>';

    if(count($res)<3){
        echo 'регистрируем человека - просто спивав с него деньги, а папе зачислили';
        regUser();
    }else{
        $refs_all=0;
        echo 'начинаем следующий поиск по дереву';
        $reflist_1 = '';
        $arrIdLine1=[];
        foreach ($res as $k =>$val) {
            $reflist_1 .= $val['uid'].', ';
            array_push($arrIdLine1,$val['uid']);
            $refs_all++;
        }$reflist_1 = substr($reflist_1,0,-2);//Отрезать запятую

        echo '<br>$refs_all - '.$refs_all.'<br>'.'<br>$reflist_1 - '.$reflist_1.'******************************************************<br>';

        $res=$DB->arrSQL('SELECT uid,log,ref,dt FROM t_users WHERE ref IN ('.$reflist_1.') AND level >0');

        echo '<pre>';
        var_dump($res);
        echo '</pre>';
        echo '<pre>';
        var_dump($arrIdLine1);
        echo '</pre>';

        if(count($res)<9){
            foreach ($res as $k =>$val) {
                echo '<br>'.$val['uid'].'<br>';
                //if($val['ref']=)

            }

        echo '<br>fe<br>';

        }





    }








    echo '<br><br>';
}




function regUser(){

    echo '<br><br>регаем человека с №'.User\User::$arrDBUser['uid'].' и раскидуем по всем таблицам<br>';

}











