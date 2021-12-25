<?php
namespace incl\pro100\User;
use lib\Def as Def;
use \incl\pro100\Def as Def100;

class LevelUp{


    public $next_level=1;

    function __construct(){
        if(User::$arrDBUser['level']<=4){//если уровень соответствует диапазону

            $this->next_level=User::$arrDBUser['level']+1;

            //Сделать проверку баланса пользователя
            if(User::$arrDBUser['bal']>=Def100\OptCab::LEVEL_COST[$this->next_level]){

                echo '<br>текущий баланс '.User\User::$arrDBUser['bal'].' соответствует уровню '.Def100\OptCab::LEVEL_COST[$next_level].'<br>';

            }else{
                echo '<br>!!!!!!!!низкий баланс '.User\User::$arrDBUser['bal'].' не соответствует уровню '.Def100\OptCab::LEVEL_COST[$next_level].'<br>';
            }

            if($this->next_level==1)$this->firstLine();




        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null']]);

    }


    private function firstLine(){

        $ref_pay=User::$arrDBUser['ref'];
        $DB=new Def\SQLi();






        //echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Def\Opt::$lang]['current_level']]);

    }




}