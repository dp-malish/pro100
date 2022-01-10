<?php
namespace lib\Def;
use lib\Get as Get;

/*
*Входной параметр для языка cookie 'lng'
*Входной параметр для языка $setLngManually - установить язык принудительно
*Входной параметр для языка $arrLng - массив возможных языков на сайте, первое значение - будет по умолчанию
*/

class Language{
    function __construct($setLngManually=false,$arrLng=['ru']){
        if($setLngManually){
            Opt::$lang=$setLngManually;
            Cookie::setCookie('lng',Opt::$lang);
        }else{$this->takeCookieLng();}
    }

    private function takeCookieLng(){
        $cookie=Validator::issetCookie('lng');
        if($cookie){//если есть куки языка
            Opt::$lang=$cookie;
        }else{//если нет куков языка
            $lng=substr(Validator::html_cod($_SERVER['HTTP_ACCEPT_LANGUAGE']), 0, 2);
            if($lng!=''){
                Opt::$lang=$lng;
                Cookie::setCookie('lng',$lng);
            }
        }
    }

    private function validLng($lng,$arrLng){
        in_array()

    }
}