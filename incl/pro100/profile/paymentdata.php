<?php
namespace incl\pro100\Profile;

use lib\Def as Def;
use incl\pro100\Def as Def100;
use incl\pro100\User as User;


class PaymentData{



    static function getProfilePerfectInfo(){


        return '<div class="d_inp">        
            <span class="d_inp_l">'.Def100\LangLibCabMain::ARR_BALANS[Def\Opt::$lang]['tabl_in_sum'].'</span>
            <span class="d_inp_r"><input type="number" id="bal_sum" placeholder="'.Def100\LangLibCabMain::ARR_BALANS[Def\Opt::$lang]['sum_add'].'"></span><div class="cl"></div>
        </div>
        <div id="bal_cash_in_btn" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Def\Opt::$lang]['bal_cash_in'].'</div><div id="d_answ"></div>';







    }

    static function getIndexInfo(){
        $txt='<p>'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null'].'<a href="/cabinet/profile">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null_link'].'</a></p>';

        //if(User\User::$arrDBUser['pay_payeer']=='')$txt='';
        //Для PerfectMoney
        if(User\User::$arrDBUser['pay_pm']!=''){
            $txt='<p>'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['ps'].' '.Def100\OptCab::paysSystems(1).'.'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['pm_answer_index'].User\User::$arrDBUser['pay_pm'].'</p>';
        }return $txt;
    }

}