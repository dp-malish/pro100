<?php
/**
 * Created by PhpStorm.
 * User: WinTeh
 * Date: 06.09.2021
 * Time: 12:53
 */

namespace incl\pro100\User;

use lib\Def as Def;

use incl\pro100\Def as Def100;

class User{

    static $selfUser='';//экземпляр самого себя

    static $u_id=0;
    //protected $pass='';
    static $ip='';
    static $cookie_name=[
        'u_id'=>'u_id',//id пользователя
        'u_id_md5'=>'au',//id пользователя хеш
        'pass_md5'=>'bu',//pass пользователя хеш
        'ip_md5'=>'cu',//ip пользователя хеш
        'u_agent_md5'=>'du',//user agent пользователя хеш
        'trash'=>'PHPSESSID'//PHPSESSID мусор в куках
    ];
    static $arrDBUser='';


    function __construct(){
        //**************************
        //echo 'Level 5<br>';
        //Без входа в базу данных
        self::$ip=Def\Validator::getIp();//всегда нужна
        //проверка сессии пользователя (без пароля и бан аккаунта)
        self::$u_id=Def\Validator::issetCookie(self::$cookie_name['u_id']);
        if(self::$u_id && self::$u_id>0){
            //echo 'Level 1';
            if(self::cryptCookieValue(self::$u_id)==Def\Validator::issetCookie(self::$cookie_name['u_id_md5'])){
                //echo 'Level 2';
                //проверим ip
                if(self::cryptCookieValue(self::$ip)==Def\Validator::issetCookie(self::$cookie_name['ip_md5'])){
                    //echo 'Level 3';
                    //проверяем браузер
                    if(self::cryptCookieValue(Def\Validator::getUserAgent())==Def\Validator::issetCookie(self::$cookie_name['u_agent_md5'])){
                        //echo 'Level 4<br>';
                        Def\Opt::$live_user=1;
                        //echo 'easyCheckingUserCookies++';
                    }
                }
            }
        }

    }

    function validPassCookie(){
        //$pass_md5=   ПАРОЛЬ ПРОВЕРЯТЬ ПРИ ОТДЕЛЬНОЙ ХРЕНИ ПРО БАН
        $DB=new Def\SQLi();
        self::$arrDBUser=$DB->strSQL('SELECT * FROM t_users WHERE uid='.$DB->realEscapeStr(self::$u_id).' LIMIT 1;');
        if($this->cryptCookieValue(self::$arrDBUser['pas'])==Def\Validator::issetCookie(self::$cookie_name['pass_md5'])){
            if(!empty(self::$arrDBUser['ban'])){self::exitLogin();}//если забанен делать проверку при входе
            Def\Opt::$live_user_id=self::$u_id;
            return 1;
            //echo '<br>pass valid<br>';
        }else{self::exitLogin();Def\Opt::$live_user=0;return 0;}
        //**************************
    }


    static function setCookieUserLogin($id,$id_md5,$pass_md5,$ip_md5,$u_agent_md5,$trash_md5,$time_live_cookie=84000){
        Def\Cookie::setCookie(self::$cookie_name['u_id'],$id,$time_live_cookie);
        Def\Cookie::setCookie(self::$cookie_name['u_id_md5'],$id_md5,$time_live_cookie);
        Def\Cookie::setCookie(self::$cookie_name['pass_md5'],$pass_md5,$time_live_cookie);
        Def\Cookie::setCookie(self::$cookie_name['ip_md5'],$ip_md5,$time_live_cookie);
        Def\Cookie::setCookie(self::$cookie_name['u_agent_md5'],$u_agent_md5,$time_live_cookie);
        Def\Cookie::setCookie(self::$cookie_name['trash'],$trash_md5,$time_live_cookie);
    }
    static function cryptCookieValue($val){return md5(md5($val.Def\Opt::SOLT).Def\Opt::COOKIE_SALT);}

    //выйти из аккаунта
    static function exitLogin(){
       self::setCookieUserLogin(0,0,0,0,0,0,-100);
        //Def\Route::location($exit_url);
        echo 'Вышел';
    }


    function loginUser(){
        //Довести проверку входа

        //Проверить куку mob
        if(!Def\Validator::issetCookie('mob')){
            echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_LOGIN[Def\Opt::$lang]['bad_data'],'code'=>4]);
        }elseif(isset($_POST['login'])&&isset($_POST['pass'])){
            $login=Def\Validator::html_cod($_POST['login']);
            $pass=Def\Validator::html_cod($_POST['pass']);

            $l_log=mb_strlen($login, 'UTF-8');
            $l_pass=mb_strlen($pass, 'UTF-8');
            if($l_log<5||$l_log>15||$l_pass<5||$l_pass>20){
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_LOGIN[Def\Opt::$lang]['bad_data'],'code'=>6]);
            }else{
            //допилить запрос проверку
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                $DB=$DB=new Def\SQLi();
                $res=$DB->strSQL('SELECT uid,log,pas,ban FROM t_users WHERE log='.$DB->realEscapeStr($login).' AND pas='.$DB->realEscapeStr(md5(md5($pass))).' LIMIT 1;');
                if($res){
                    if(!empty($res['ban'])){//Забанен echo code '2';
                        echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_LOGIN[Def\Opt::$lang]['banned'],'code'=>2]);
                    }else{
                        self::$u_id=$res['uid'];
                        $DB->boolSQL('UPDATE `t_users` SET `lastip` = '.$DB->realEscapeStr(self::$ip).', `last` = '.time().' WHERE uid='.self::$u_id.' LIMIT 1');
                        self::setCookieUserLogin(
                        self::$u_id,
                        $this->cryptCookieValue(self::$u_id),
                        $this->cryptCookieValue($res['pas']),
                        $this->cryptCookieValue(Def\Validator::getIp()),
                        $this->cryptCookieValue(Def\Validator::getUserAgent()),
                        $this->cryptCookieValue(self::$u_id.Def\Validator::getIp())
                    );
                        //echo 'Ты зашёл!!!)))))))))))))'.self::$u_id.' ';//echo 1;
                        echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_LOGIN[Def\Opt::$lang]['login'],'code'=>1]);
                    }
                }else{
                    //echo 3;//Не введён логин или пароль
                    //echo 'Вход не выполнен!!!';
                    echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_LOGIN[Def\Opt::$lang]['bad_data'],'code'=>3]);
                }

            }

        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_LOGIN[Def\Opt::$lang]['bad_data'],'code'=>5]);
        //echo 3;//Не введён логин или пароль


        //$this->u_id=11;//4955
        //$this->pass='03c64b48f1aa3670c3a1ccc36aa07415';


        //Сделать редирект

    }


}