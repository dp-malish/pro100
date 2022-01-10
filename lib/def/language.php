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
            Opt::$lang=$this->validLng($setLngManually,$arrLng);
            Cookie::setCookie('lng',Opt::$lang);
        }else{$this->takeCookieLng($arrLng);}
    }

    private function takeCookieLng($arrLng){
        $cookie=Validator::issetCookie('lng');
        if($cookie){//если есть куки языка
            Opt::$lang=$this->validLng($cookie,$arrLng);
            Cookie::setCookie('lng',Opt::$lang);
        }else{//если нет куков языка
            $lng=substr(Validator::html_cod($_SERVER['HTTP_ACCEPT_LANGUAGE']), 0, 2);
            if($lng!=''){
                Opt::$lang=$this->validLng($lng,$arrLng);
                Cookie::setCookie('lng',Opt::$lang);
            }else{//Ставим дефолтом
                Opt::$lang=$arrLng[0];
                Cookie::setCookie('lng',Opt::$lang);
            }
        }
    }

    private function validLng($lng,$arrLng){
        if(in_array($lng,$arrLng,true)){
            return $lng;
        }else return $arrLng[0];
    }
}