<?php
namespace lib\Def;
class Optsql{
    const DB_HOST="localhost";
    //const DB_PREFIX="xxx_";
    const DB_CHARSET="utf8";
    public $db_con;
    function __construct($ext){
        if(!$ext){
            switch($_SERVER['SERVER_NAME']){
            case 'pro100.my':$this->db_con=['root','root','pro100'];break;
            default:Route::location();
            }
        }else{
            switch($_SERVER['SERVER_NAME']){
                case 'cab.my':$this->db_con=['root','root','pro100pro_soc'];break;
                default:Route::location();
            }
        }
    }
}