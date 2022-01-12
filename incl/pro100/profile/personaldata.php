<?php
namespace incl\pro100\Profile;

use lib\Def as Def;
use lib\Post\Post as Post;
use incl\pro100\Def as Def100;
use incl\pro100\User as User;


class PersonalData{

    static function getIndexInfo(){
        $txt='<p>'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null'].'<a href="/cabinet/profile">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null_link'].'</a></p>';

        $txt='';

        if(User\User::$arrDBUser['prf_name']!=''){
            $txt.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['name'].': '.User\User::$arrDBUser['prf_name'].'.</p>';

        }else {
            $txt.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['name_null'].' <a href="/cabinet/profile">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null_link'].'</a></p>';
        }

        if(User\User::$arrDBUser['prf_fam']!=''){
            $txt.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['name'].'</p>';

        }else {
            $txt.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['surname_null'].' <a href="/cabinet/profile">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null_link'].'</a></p>';
        }

        if(User\User::$arrDBUser['sex']!=''){
            $txt.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['name'].'</p>';

        }else {
            $txt.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['sex_null'].' <a href="/cabinet/profile">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null_link'].'</a></p>';
        }





        return $txt;
    }

}