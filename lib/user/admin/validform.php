<?php
namespace lib\user\Admin;

class ValidForm extends \lib\Def\Validator{
    static function link($s,$f='ссылка'){
        $s=self::html_cod($s);
        $l=self::LengthStr($s,255);
        if($l==0){self::$ErrorForm[]='Незаполненное поле '.$f;return false;}
        elseif($l==2){self::$ErrorForm[]='Максимальная длина поля '.$f.' - 255 символов';return false;}
        else{
    if(self::paternStrLink($s)){return $s;}else{self::$ErrorForm[]='В поле '.$f.' используются недопустимые символы';return false;}
        }
    }
    static function int($s,$f='меню'){
        $s=self::html_cod($s);
        $l=self::LengthStr($s,7);
        if($l==0){return'';}
        elseif($l==2){self::$ErrorForm[]='Максимальная длина поля '.$f.' - превышена';return false;}
        else{
            if(self::paternInt($s)){return $s;}else{self::$ErrorForm[]='В поле '.$f.' используются недопустимые символы';return false;}
        }
    }
    static function str($s,$f,$dlina=255){
        $s=self::html_cod($s);
        $l=self::LengthStr($s,$dlina);
        if($l==0){return'';}
        elseif($l==2){self::$ErrorForm[]='Максимальная длина поля '.$f.' - '.$dlina.' символов';return false;}
        else{
            if(self::paternStrRusText($s)){return $s;}else{self::$ErrorForm[]='В поле '.$f.' используются недопустимые символы';return false;}
        }
    }
    static function text($s,$f,$dlina=1000){
        $s=self::html_cod($s);
        $l=self::LengthStr($s,$dlina);
        if($l==0){return'';}
        elseif($l==2){self::$ErrorForm[]='Максимальная длина поля '.$f.' - '.$dlina.' символов';return false;}
        else{return	$s;}
    }
    static function tel($s,$dlina=13){
        $s=self::html_cod($s);
        $l=self::LengthStr($s,$dlina);
        if($l==0){return'';}
        elseif($l==2){self::$ErrorForm[]='Максимальная длина поля телефон - '.$dlina.' символов';return false;}
        else{
            if(self::paternMobTel($s)){return $s;}else{self::$ErrorForm[]='В поле телефон используются недопустимые символы';return false;}
            //return	$s;
        }
    }
    static function pass($s,$l=30,$f='пароль'){
        $s=self::html_cod($s);
        $l=self::LengthStr($s,$l);
        if($l==0){self::$ErrorForm[]='Незаполненное поле '.$f;return false;}
        elseif($l==2){self::$ErrorForm[]='Максимальная длина поля '.$f.' - 255 символов';return false;}
        else{
            if(self::paternStrLink($s)){return $s;}else{self::$ErrorForm[]='В поле '.$f.' используются недопустимые символы';return false;}
        }
    }
}