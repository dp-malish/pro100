<?php
namespace incl\pro100\Pay;

use incl\pro100\Def as Def100;
use incl\pro100\User as User;
use lib\Def\SQLi;

class GetBalance{

    public $all_p=0;
    public $all_m=0;
    public $reserve=0;
    public $free=0;
    public $free_level=0;
    public $free_limit=[];
    public $free_limit_residue=0;

    public $current_limit=0;//Затраты на овышения уровня

    function FullView(){

        $sql='SELECT t_users.uid,t_users.bal,t_users.level,sp.sp,sm.sm FROM t_users LEFT JOIN sp ON t_users.uid = sp.p LEFT JOIN sm ON t_users.uid = sm.p WHERE uid='.User\User::$u_id.' LIMIT 1';

        $DB=new SQLi();
        $res=$DB->strSQL($sql);

        //$cur_level_m;
        //$this->current_limit=

        $this->all_p=$res['sp']-Def100\OptCab::LEVEL_COST[1];

        $txt='';

        $partners=[0,3,9,27,81];

        //$elements = count ($goroda);
        for($index=1;$index<=User\User::$arrDBUser['level'];$index++){
            //100*Def100\OptCab::COMMISSION
            $txt.=$index.' - '.  Def100\OptCab::LEVEL_COST[$index] .'-'.(Def100\OptCab::LEVEL_COST[$index]*$partners[$index]-(Def100\OptCab::LEVEL_COST[$index]*$partners[$index]/100*Def100\OptCab::COMMISSION)).  '<br>';

            $this->free_limit[$index]=Def100\OptCab::LEVEL_COST[$index]*$partners[$index]-(Def100\OptCab::LEVEL_COST[$index]*$partners[$index]/100*Def100\OptCab::COMMISSION);
            $this->free_level+=$this->free_limit[$index];
            $this->free_limit_residue+=Def100\OptCab::LEVEL_COST[$index+1]-$this->free_limit[$index];


            //$free_limit[$index]=

        }



        //array_push($this->all_m=$res['sm'],);

        //$this->level_limit



        return $res['uid'].'<br>'.$res['level'].'<br>'.$res['bal'].'<br>'.$res['sp'].'<br>'.$res['sm'].'<br><br><br><br>'
            .$txt.
            '<br><br>Общий доход на уровне: '.($index-1). ' - '.$this->free_level

            .'<br><br>Общий возможный остаток: '.$this->free_limit_residue.'<br><br>'.User\User::$arrDBUser['level'];


    }


}