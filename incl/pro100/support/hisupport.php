<?php
namespace incl\pro100\Support;
use \lib\Def as Def;
class HiSupport{
    static function getCountSupport(){
        $DB=new Def\SQLi();
        $res=$DB->intSQL('SELECT COUNT(id) FROM support WHERE readed IS NULL');
        $txt=0;
        if($res){$txt=$res;}
        return '<p>Number of new support calls: '.$txt.'</p>';
    }
}