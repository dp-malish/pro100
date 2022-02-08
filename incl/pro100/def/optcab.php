<?php
namespace incl\pro100\Def;

class OptCab{

    const MAIL_WARNING='winipuh@gmail.com';

    const MAIL_ON=true;

    const MAIL_SMTP='mail.';

    const MAIL_AUTO=[
        'user'=>'support@sochelping.com',
        'pass'=>'Mistartuem',
        'ssl'=>'',
        'port'=>25,
        'from'=>'support@sochelping.com',
        'from_name'=>'no-reply'
    ];


    const ARR_HI_PRIVILEGE=[300,301,302,303];
    static $hi_privilege=false;

    const MAX_PROMO =300;//300

    const ID_ADMIN = 300;//300

    const MIN_PASS = 5;//ДЛИНА
    const MAX_PASS = 30;


    const  MIN_OUT = 10;//Минималка на вывод
    const  MAX_OUT = 10000;//Максималка на вывод

    static $Pay_On = 1;

    static $neo_tree = false;

    static $arr_sanction_list=[];//Login

    const  LEVEL_COST=[
        '1' => '30',
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
    const PM_NUMBER='U12345678';
    const PM_UNITS='USD';
    const PM_ID='1234567';
    const PM_PASS='3016248';
    const PM_ALT_PHRASE='hjkksdbnHKJHiu89899089';//$perfect_alt_phrase = strtoupper(md5('hjkksdbnHKJHiu89899089'));
    const PM_COMMISSION=2;//КОМИССИЯ СИСТЕМЫ В ПРОЦЕНТАХ

}