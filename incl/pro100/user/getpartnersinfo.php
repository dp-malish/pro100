<?php
namespace incl\pro100\user;

use lib\Def as Def;
use \incl\pro100\Def as Def100;

class GetPartnersInfo{


    function __construct($line){

        switch($line){
            case 0:$this->getLine0();break;//Не активные пользователи

            //******************************************
            //default:Route::$module404=1;
        }


    }

    private function getLine0(){
        $answer='<p>'.Def100\LangLibCabMain::ARR_PARTNERS[Def\Opt::$lang]['ref_inactive_no'].'</p>';
        $DB=new Def\SQLi();
        $res=$DB->arrSQL('SELECT `log`,`level`,`dt` FROM t_users WHERE ref='.User::$arrDBUser['uid'].' AND `level`=0');
        if($res){
            $answer='<div class="cab_table"><div><div>'.Def100\LangLibCabMain::ARR_PARTNERS[Def\Opt::$lang]['t_f_partners'].'</div><div>'.Def100\LangLibCabMain::ARR_PARTNERS[Def\Opt::$lang]['t_f_level'].'</div><div>'.Def100\LangLibCabMain::ARR_PARTNERS[Def\Opt::$lang]['t_f_data'].'</div></div>';
            foreach ($res as $k=>$v){
                $answer.='<div><div>'.$v['log'].'</div><div>'.$v['level'].'</div><div>'.date("d.m.Y    H:i:s",$v["dt"]).'</div></div>';
            }
            $answer.='</div>';
        }
        echo json_encode(['err'=>false,'answer'=>$answer,'l'=>0]);
    }
}