<?php
namespace lib\Post;
use lib\Def as Def;
use lib\Mail as Mail;
class CallBack extends Post{

    static function CallBackFun($to){$err=false;
        if(self::issetPostKey(['name','tel'/*,'captcha'*/])){
                $name=Def\Validator::auditFIO($_POST['name']);
                if(!$name){$err=true;}
                $tel=Def\Validator::auditText($_POST['tel'],'телефон',13);
                if(!$tel){$err=true;}
                if(!$err){//добавить в БД
                    $ip=Def\Validator::getIp();
                    $DB=new Def\SQLi();
                        $sql='INSERT INTO callback(username,tel,ip)VALUES(?,?,?)';
                        $param=[$name,$tel,$ip];
                        $sql=$DB->realEscape($sql,$param);
                        if(!$DB->boolSQL($sql)){
                          $err=true;
                          Def\Validator::$ErrorForm[]='Ошибка соединения, повторите попытку позже...';
                        }else{
                            //if(!mail('win@i.ua','Call Me',$name.'\n'.$tel.'\n'.$ip))
                              if(!Mail\Mail::sendMail($to,'Автоответчик <admin@'.$_SERVER['SERVER_NAME'].'>','Перезвоните Мне','Имя '.$name.'<br>Тел. '.$tel.'<br>ip adress: '.$ip))
                                Def\Validator::$ErrorForm[]='Хрен с почтой';
                        }
                }
        }else{$err=true;}
        return($err)?false:true;
    }
}