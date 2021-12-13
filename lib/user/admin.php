<?php
/**
 * User->Admin общие настройки для всех сайтов
 */
namespace lib\User;
use lib\Def as Def;

class Admin extends User{

  function loginAdminForm($login,$pass){
    $cook=Def\Validator::issetCookie($this->admin_form_login_cookie);
    if($cook){return($cook==$this->adminCookieForm($login,$pass)?true:false);}else return false;
  }

  function setCookieAdminForm($login,$pass,$time=172800){
    setcookie($this->admin_form_login_cookie,$this->adminCookieForm($login,$pass),time()+$time,'/','.'.Def\Opt::$site);//два дня
  }

  private function adminCookieForm($login,$pass){//микс md5 куки для входа админа
    return md5(md5($login.Def\Opt::COOKIE_SALT.$pass));
  }

  public function loginAdminFormIn($l,$p){$err=false;
    if(\lib\Post\Post::issetPostKey(['name','pass'])){
      $login=Def\Validator::auditText($_POST['name'],'логин',100);
      if(!$login){$err=true;}
      $pass=Def\Validator::auditText($_POST['pass'],'пароль',100);
      if(!$pass){$err=true;}
      if(!$err){//добавить как в БД
        if($l!=$login || $p!=$pass){$err=true;}else{$this->setCookieAdminForm($login,$pass);}
      }
    }else{$err=true;}
    return($err?false:true);
  }
  public function loginAdminFormExit(){
    $this->setCookieAdminForm(0,0,0);
    Def\Route::location();
  }


}