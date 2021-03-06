<?php
namespace incl\pro100\Pay;
use lib\Def as Def;
use incl\pro100\User as User;
use incl\pro100\Def as Def100;

class viewTransaction{

    function getTransactionOut(){
        $DB=new Def\SQLi();
        $res=$DB->arrSQL('SELECT id,sum,ps,dt FROM `t_out` WHERE usr = '.$DB->realEscapeStr(User\User::$u_id).' ORDER BY id DESC');
        if($res){
            $answer='<div class="cab_table"><div><div>'.Def100\LangLibCabMain::ARR_BALANS[Def\Opt::$lang]['tabl_out_sum'].'</div><div>'.Def100\LangLibCabMain::ARR_BALANS[Def\Opt::$lang]['tabl_out_pay_system'].'</div><div>'.Def100\LangLibCabMain::ARR_BALANS[Def\Opt::$lang]['tabl_out_date'].'</div></div>';
            foreach($res as $k=>$v){
                $answer.='<div><div>$ '.$v["sum"].'</div><div>'.Def100\OptCab::paysSystems($v["ps"]).'</div><div>'.date("d.m.Y   H:i",$v["dt"]).'</div></div>';
            }
            $answer.='</div>';
        }else $answer='<div class="five_"><p>'.Def100\LangLibCabMain::ARR_BALANS[Def\Opt::$lang]['tabl_out_null'].'</p></div>';
        return $answer;
    }

    function getTransactionIn(){
        $DB=new Def\SQLi();
        $sql = 'SELECT id,sum,ty,dt FROM `t_in` WHERE usr = '.$DB->realEscapeStr(User\User::$u_id).' AND st =1 ORDER BY id DESC';
        $res=$DB->arrSQL($sql);
        if($res){
            $answer='
<div class="cab_table"><div><div>'.Def100\LangLibCabMain::ARR_BALANS[Def\Opt::$lang]['tabl_in_sum'].'</div><div>'.Def100\LangLibCabMain::ARR_BALANS[Def\Opt::$lang]['tabl_in_kind'].'</div><div>'.Def100\LangLibCabMain::ARR_BALANS[Def\Opt::$lang]['tabl_in_date'].'</div></div>';
            foreach($res as $k=>$v){
                $answer.='<div><div>$ '.$v["sum"].'</div>';
                if($v["ty"]==0){
                    $answer.='<div>'.Def100\LangLibCabMain::ARR_BALANS[Def\Opt::$lang]['tabl_in_kind_rep'].'</div>';
                }else{
                    $answer.='<div>'.Def100\LangLibCabMain::ARR_BALANS[Def\Opt::$lang]['tabl_in_kind_ref'].'</div>';
                }
                $answer.='<div>'.date("d.m.Y   H:i",$v["dt"]).'</div></div>';
            }
            $answer.='</div>';
        }else $answer='<div class="five_"><p>'.Def100\LangLibCabMain::ARR_BALANS[Def\Opt::$lang]['tabl_in_null'].'</p></div>';
        return $answer;
    }
}