<?php
namespace incl\pro100\Pay;

use incl\pro100\Def as Def100;
use incl\pro100\User as User;
use lib\Def\SQLi;

class GetBalance{

    public $all_p=0;//Вся прибыль (Вычитать стоимость активации на уровнях)
    public $all_m=0;
    public $reserve=0;
    public $free=0;
    public $free_level=0;//Саободные средства сумма по уровню
    public $free_limit=[];//Всего возможно средства на уровне именно пользователя с учётом всех выщетов
    public $free_limit_residue=0;//Общий возможный доход/остаток именно пользователя с учётом всех выщетов

    public $current_limit=0;//Затраты на овышения уровня

    function FullView(){

        $sql='SELECT t_users.uid,t_users.bal,t_users.level,sp.sp,sm.sm FROM t_users LEFT JOIN sp ON t_users.uid = sp.p LEFT JOIN sm ON t_users.uid = sm.p WHERE uid='.User\User::$u_id.' LIMIT 1';

        $DB=new SQLi();
        $res=$DB->strSQL($sql);

        $txt='';

        $this->all_p=$res['sp'];
        $partners=[0,3,9,27,81];

        for($index=1;$index<=User\User::$arrDBUser['level'];$index++){
            //100*Def100\OptCab::COMMISSION
            //$txt.=$index.' - '.  Def100\OptCab::LEVEL_COST[$index] .'-'.(Def100\OptCab::LEVEL_COST[$index]*$partners[$index]-(Def100\OptCab::LEVEL_COST[$index]*$partners[$index]/100*Def100\OptCab::COMMISSION)).  '<br>';


            //Всего плучено в проекте (таблица sql минус активация уровней соглавсно твоему)
            $this->all_p-=Def100\OptCab::LEVEL_COST[$index];
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



        return '<br>Uid: '.$res['uid'].'<br>'.
            '<br>Level: '.$res['level'].'<br>'
            //$res['bal'].
            .'<br>Всего плучено в проекте (таблица sql): '.$res['sp']
            .'<br>Всего плучено в проекте (таблица sql минус активация уровней соглавсно твоему): '.$this->all_p
            .'<br>Всего выведено из проекта:'.$res['sm'].'<br><br><br><br>'.
            '<br>Всего возможно средства на уровне 1: '.$this->free_limit[1].
            '<br>Саободные средства на уровне 2: '.$this->free_limit[2].
            '<br>Саободные средства на уровне 3: '.$this->free_limit[3].
            '<br>Саободные средства на уровне 4: '.$this->free_limit[4].
            '<br><br>Общий доход на уровне: '.$this->free_level

            .'<br><br>Общий возможный доход/остаток: '.$this->free_limit_residue.'<br><br>'.User\User::$arrDBUser['level'];


    }


}