<?php
/**
 * User: общие настройки для всех сайтов
 */
namespace lib\User;
use lib\Def as Def;

class User{

  public $admin_form_login_cookie='aflc';

  function __construct(){if(Def\Opt::$site===''){new Def\Opt();}}
  //*********************************************************
  //**********куки для входа админа в set панель*************
  //*********************************************************
  function loginAdmin(){//проверить наличие md5 куки для входа админа в set панель
    $cook=Def\Validator::issetCookie('min');
    if($cook){return($cook==$this->adminCookie()?true:false);}else return false;
  }
  function setCookieAdmin(){//установить md5 куки для входа админа в set панель
    $val=$this->adminCookie();
    if($val)setcookie('min',$val,time()+604800,'/','.'.Def\Opt::$site);//неделя
  }
  private function adminCookie(){//микс md5 куки для входа админа в set панель
    $ip=Def\Validator::getIp();
    if($ip){$ip=md5($ip.Def\Opt::COOKIE_SALT);return md5($ip);}else{return false;}
  }
  //*********************************************************
  //*********************************************************
  //*********************************************************



}