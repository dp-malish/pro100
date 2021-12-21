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
                $answer.='<div><div>'.$v["sum"].' $ </div><div>'.Def100\OptCab::paysSystems($v["ps"]).'</div><div>'.date("d.m.Y   H:i",$v["dt"]).'</div></div>';
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
            $answer='<table><thead><tr align="center"><th>Сумма</th><th>Тип зачисления</th><th>Дата зачисления</th></tr></thead><tbody>';
            foreach($res as $k=>$v){
                $answer.='<tr><td>'.$v["sum"].' $ </td>';
                if($v["ty"]==0){
                    $answer.='<td>Пополнение баланса</td>';
                }else{
                    $answer.='<td>Реферальные начисления</td>';
                }
                $answer.='<td>'.date("d.m.Y в H:i",$v["dt"]).'</td></tr>';
            }
            $answer.='</tbody></table>';
        }else $answer='<div>История зачислений пуста.</div>';;
        return $answer;
    }
}