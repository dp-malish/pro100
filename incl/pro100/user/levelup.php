<?php
namespace incl\pro100\User;
use lib\Def as Def;
use \incl\pro100\Def as Def100;

class LevelUp{


    public $next_level=1;

    function __construct(){
        if(User::$arrDBUser['level']<=4){//если уровень соответствует диапазону

            $this->next_level=User::$arrDBUser['level']+1;

            if($this->next_level==1)$this->firstLine();




        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null']]);

        //echo json_encode(['err'=>false,'answer'=>'Fuck You!!! '.Def100\LangLibCabMain::ARR_LEVEL_UP[Def\Opt::$lang]['live_user_null']]);
    }


    private function firstLine(){

        $ref_pay =User::$arrDBUser['ref'];
        $DB=new Def\SQLi();


        //почему лимит 2 - не понятно

        $users_z=$DB->arrSQL('SELECT uid FROM t_users WHERE ref='.$ref_pay.' AND level > 0 LIMIT 2');


        /*function tree_view($index)
        {
            global $tree;
            global $connect_db;
            $q = mysqli_query($connect_db, "SELECT uid,level FROM t_users WHERE ref='$index'");
            if (!mysqli_num_rows($q))
                return;
            while ($arr = mysqli_fetch_assoc($q))
            {
                $users_d = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$arr[uid]' LIMIT 4"));
                if ($arr['level'] > 0) { $tree[$arr['uid']] = $users_d; }
                tree_view($arr['uid']);
            }
        }
        tree_view($ref_pay);*/

        echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Def\Opt::$lang]['current_level']]);

    }


}