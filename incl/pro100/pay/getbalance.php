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
    public $free_level=0;//Саободные средства сумма по уровню
    public $free_limit=[];//Саободные средства на уровне
    public $free_limit_residue=0;//Общий возможный доход/остаток именно пользователя с учётом всех выщетов

    public $current_limit=0;//Затраты на овышения уровня

    function FullView(){

        $sql='SELECT t_users.uid,t_users.bal,t_users.level,sp.sp,sm.sm FROM t_users LEFT JOIN sp ON t_users.uid = sp.p LEFT JOIN sm ON t_users.uid = sm.p WHERE uid='.User\User::$u_id.' LIMIT 1';

        $DB=new SQLi();
        $res=$DB->strSQL($sql);

        $txt='';

        $partners=[0,3,9,27,81];

        for($index=1;$index<=User\User::$arrDBUser['level'];$index++){
            //100*Def100\OptCab::COMMISSION
            $txt.=$index.' - '.  Def100\OptCab::LEVEL_COST[$index] .'-'.(Def100\OptCab::LEVEL_COST[$index]*$partners[$index]-(Def100\OptCab::LEVEL_COST[$index]*$partners[$index]/100*Def100\OptCab::COMMISSION)).  '<br>';

            //Саободные средства на уровне
            $this->free_limit[$index]=Def100\OptCab::LEVEL_COST[$index]*$partners[$index]-(Def100\OptCab::LEVEL_COST[$index]*$partners[$index]/100*Def100\OptCab::COMMISSION);
            //Саободные средства сумма по уровню
            $this->free_level+=$this->free_limit[$index];
            //Общий возможный доход/остаток именно пользователя с учётом всех выщетов
            $this->free_limit_residue+=Def100\OptCab::LEVEL_COST[$index+1]-$this->free_limit[$index];


            //$free_limit[$index]=

        }



        //array_push($this->all_m=$res['sm'],);

        //$this->level_limit



        return $res['uid'].'<br>'
            .$res['level'].'<br>'
            //$res['bal'].
            .'<br>Всего плучено в проекте: '.$res['sp']
            .'<br>Всего выведено из проекта:'.$res['sm'].'<br><br><br><br>'
            .$txt.
            '<br><br>Общий доход на уровне: '.($index-1). ' - '.$this->free_level

            .'<br><br>Общий возможный доход/остаток: '.$this->free_limit_residue.'<br><br>'.User\User::$arrDBUser['level'];


    }


}