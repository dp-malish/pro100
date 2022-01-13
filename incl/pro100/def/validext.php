<?php

namespace incl\pro100\Def;


class ValidExt extends \lib\Def\Validator{

    //preg_match  true:хорошо  false:плохо
    static function paternSymbol($s){
        return(preg_match('/[!@#$%\^&*\(\)\+\=:;?\/\`\~]/',$s))?true:false;
    }
    static function paternDateHTMLForm($s){
        return(preg_match('/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/',$s))?true:false;
    }



}