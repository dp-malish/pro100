<?php
namespace lib\Def;

use \incl\pro100\User as User;
//Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',0);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new Opt('pro100');//Def opt

User\User::$selfUser=new User\User();//первый вход не в кабинет !!!! важно
User\User::$selfUser->validPassCookie();

Cache_File::$cash=new Cache_File(['pro100'],true);
$DB=new SQLi();
//Opt::$lang='en';




//*************************
//$next_level = $nowusr['level']+1;
$next_level=User\User::$arrDBUser['level']+1;
echo '<br>Тестовый вывод $next_level  - '.$next_level.'<br>';
//Lvl 1
if ($next_level == 1) {// $ref_pay надо понять где используют  и зачем if()
    $ref_pay = User\User::$arrDBUser['ref'];
}

echo '<br>Тестовый вывод $ref_pay  - '.$ref_pay.'<br>';

if($next_level == 1) {

    //почему лимит 2 - не понятно

    $users_z=$DB->arrSQL('SELECT uid FROM t_users WHERE ref='.$ref_pay.' AND level > 0 LIMIT 2');


    echo '<br>Тестовый вывод $users_z - почему лимит 2 - не понятно???<br>';
    var_dump($users_z);

    if ($users_z >= 3) {//тут всегда да
        echo '<br>Тестовый вывод $users_z true<br>';

//************************************************************************
//************************************************************************
        //Построение дерева
        $tree =[];


        //тут понять функцию function tree_view($index)

        //global $tree;
        //global $connect_db; - это не надо мне
        //напоминает поиск места у реферала в его дереве

        //Temp
        $index=$ref_pay;
        //типа все рефы этого папы $ref_pay реферала тут 5 шт даже с левел 0
        $q = $DB->arrSQL("SELECT uid,level FROM t_users WHERE ref='$index'");

        var_dump($q);

        if (!$q){
            return;
        }else        {$arr=$q;
            $users_d = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$arr[uid]' LIMIT 4"));
            if ($arr['level'] > 0) { $tree[$arr['uid']] = $users_d; }
            tree_view($arr['uid']);
        }










    }else echo '<br>Тестовый вывод $users_z false<br>';

}













