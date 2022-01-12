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

        if(User\User::$arrDBUser['pay_pm']!=''){

        }

        //if(User\User::$arrDBUser['pay_payeer']=='')$txt='';
        //Для PerfectMoney
        if(User\User::$arrDBUser['pay_pm']!=''){
            $txt='<p>'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['ps'].' '.Def100\OptCab::paysSystems(1).'.'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['pm_answer_index'].User\User::$arrDBUser['pay_pm'].'</p>';
        }return $txt;
    }

}