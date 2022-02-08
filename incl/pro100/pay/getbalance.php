<?php
namespace incl\pro100\Pay;

use incl\pro100\Def as Def100;
use incl\pro100\User as User;
use lib\Def\SQLi;

class GetBalance{

    function FullView(){

        $sql='SELECT t_users.uid,t_users.bal,sp.sp,sm.sm FROM t_users LEFT JOIN sp ON t_users.uid = sp.p LEFT JOIN sm ON t_users.uid = sm.p WHERE uid='.User\User::$u_id.' LIMIT 1';

        $DB=new SQLi();

        $res=$DB->strSQL($sql);

        //$cur_level_m;



        //return Def100\OptCab::LEVEL_COST[1];

        return $res['uid'].'<br>'.$res['bal'].'<br>'.$res['sp'].'<br>'.$res['sm'];


    }


}