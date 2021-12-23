<?php
/**
 * Created by PhpStorm.
 * User: WinTeh
 * Date: 16.09.2021
 * Time: 14:39
 */

namespace incl\pro100\Def;


class OptCab{

    const MAX_PROMO =2;//300

    const ID_ADMIN = 300;//300


    const  MIN_OUT = 10;//Минималка на вывод
    const  MAX_OUT = 50000;//Максималка на вывод

    static $Pay_On = 1;

    static $neo_tree = false;

    static $arr_sanction_list=[];

    const  LEVEL_COST=[
        '1' => '100',
        '2' => '200',
        '3' => '1000',
        '4' => '7000'];

    static function paysSystems($id) {
        switch($id){
            case'1':$x='Perfect Money';break;
            default:$x='BTC';
        }return $x;
    }

    //Perfect Money
    const PM_NUMBER='U30627771';//$perfect_number = 'U30627771';
    const PM_UNITS='USD';
    const PM_ID='1517385';//$perfect_id = '1517385';
    const PM_PASS='3016248';//$perfect_pass = '3016248';
    const PM_ALT_PHRASE='????????????????';//$perfect_alt_phrase = strtoupper(md5('7krqhnFh5Hb239brGPZvfTEOy'));
    const PM_COMMISSION=2;//КОМИССИЯ СИСТЕМЫ В ПРОЦЕНТАХ

















}