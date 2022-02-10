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

    public $current_limit=0;

    function FullView(){

        $sql='SELECT t_users.uid,t_users.bal,t_users.level,sp.sp,sm.sm FROM t_users LEFT JOIN sp ON t_users.uid = sp.p LEFT JOIN sm ON t_users.uid = sm.p WHERE uid='.User\User::$u_id.' LIMIT 1';

        $DB=new SQLi();

        $res=$DB->strSQL($sql);

        //$cur_level_m;


        $this->current_limit=

        $this->all_p=$res['sp']-Def100\OptCab::LEVEL_COST[1];


        //array_push($this->all_m=$res['sm'],);

        //$this->level_limit



        return $res['uid'].'<br>'.$res['level'].'<br>'.$res['bal'].'<br>'.$res['sp'].'<br>'.$res['sm'].'<br>';


    }


}