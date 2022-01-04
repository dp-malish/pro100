<?php
namespace incl\pro100\Support;
use lib\Def as Def;
use lib\Post\Post as Post;
use incl\pro100\Def as Def100;
use incl\pro100\User as User;
class Support{


    function __construct(){

        if(Post::issetPostKey(['theme','txt'])){
            $err=0;

            $theme=Def\Validator::html_cod($_POST['theme']);
            $txt=Def\Validator::html_cod($_POST['txt']);
            $l_txt=mb_strlen($txt,'UTF-8');

            if(!array_key_exists($theme,Def100\LangLibCabMain::ARR_SUPPORT[Def\Opt::$lang]['theme'])){
                //$err=1;'No key'
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null'],'l'=>1]);
            }elseif($l_txt>13 && $l_txt<1000){


             /*   CREATE TABLE IF NOT EXISTS support(
            //        id int(11) NOT NULL AUTO_INCREMENT,
  id_user int(11) NOT NULL,
  log varchar(100) NOT NULL,
  em varchar(100) DEFAULT NULL COMMENT 'Почта эл.',
  readed tinyint(1) DEFAULT NULL,
  theme varchar(130) NOT NULL,
  text text NOT NULL,
  ip varchar(50) NOT NULL,
  data int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY id_user(id_user)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;*/

                $sql='INSERT INTO support(`id_user`,`log`,`em`,`readed`,`theme`,`text`,`ip`,`data`) VALUES ('.User\User::$u_id.',"'.User\User::$arrDBUser['log'].'",[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])';

                echo json_encode(['err'=>false,'answer'=>'Yes key','l'=>1]);





            }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null'],'l'=>1]);
        }else echo json_encode(['err'=>false,'answer'=>'1','l'=>1]);
    }
}