<?php
namespace incl\pro100\Profile;

use incl\pro100\Support\Support;
use lib\Def as Def;
use lib\Post\Post as Post;
use incl\pro100\Def as Def100;
use incl\pro100\User as User;






class PersonalData{


    static function updatePersonal(){
        if(Post::issetPostKey(['name','surname','gender','birthday'])){

            $name=Def\Validator::html_cod($_POST['name']);
            $surname=Def\Validator::html_cod($_POST['surname']);
            $gender=Def\Validator::html_cod($_POST['gender']);
            $birthday=Def\Validator::html_cod($_POST['birthday']);

            if(Def100\ValidExt::paternSymbol($name)|| mb_strlen($name,'UTF-8')>21){
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['name_err'].'name','l'=>1]);
            }elseif(Def100\ValidExt::paternSymbol($surname)|| mb_strlen($surname,'UTF-8')>26){
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['surname_err'].'name_','l'=>1]);
            }elseif(!Def\Validator::paternInt($gender) && $gender!=''){
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['post_null'].'gender','l'=>1]);
            }elseif($gender>2 && $gender!=''){
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['post_null'].'gender2','l'=>1]);
            }elseif(!Def100\ValidExt::paternDateHTMLForm($birthday) && $birthday!=''){
                //echo json_encode(['err'=>false,'answer'=>$birthday,'l'=>1]);
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['post_null'],'l'=>1]);
            }else{
                $DB=new Def\SQLi();
                $good_answer='<p>'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['save_data'].'</p>';

                $sql='UPDATE t_users SET lastip='.$DB->realEscapeStr(User\User::$ip).',last='.time();
                if($name!=User\User::$arrDBUser['prf_name']){$sql.=',prf_name='.$DB->realEscapeStr($name);
                    $good_answer.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['name'].': '.$name.'.</p>';
                }
                if($surname!=User\User::$arrDBUser['prf_fam']){$sql.=',prf_fam='.$DB->realEscapeStr($surname);
                    $good_answer.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['surname'].': '.$surname.'.</p>';
                }
                if($gender!=User\User::$arrDBUser['sex']){
                    $sql.=',sex='.$DB->realEscapeStr($gender);
                    if($gender!=''){
                    $good_answer.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['sex'].': '.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['sex_db'][$gender].'.</p>';
                    }else $good_answer.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['sex_null'].'.</p>';
                }
                if($birthday!=User\User::$arrDBUser['birthday']){$sql.=',birthday='.$DB->realEscapeStr($birthday);
                    $good_answer.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['birthday'].': '.$birthday.'.</p>';
                }
                $sql.=' WHERE uid='.User\User::$u_id;

                if($DB->boolSQL($sql)){//'<p>'.$sql.'</p>'.
                    echo json_encode(['err'=>false,'answer'=>$good_answer,'l'=>2]);
                }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['post_null'].'sql','l'=>1]);
            }
        }
    }


    static function getProfilePersonalInfo(){
        $btn=(User\User::$arrDBUser['prf_name']=='' && User\User::$arrDBUser['prf_fam']=='' && User\User::$arrDBUser['sex']=='' && User\User::$arrDBUser['birthday']==''?'save':'update');


        $txt='<div class="d_inp">
<span class="d_inp_l required">'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['name'].'</span>
<span class="d_inp_r">
<input type="text" id="name_user" placeholder="'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['name_place'].'" value="'.(User\User::$arrDBUser['prf_name']==''?'':User\User::$arrDBUser['prf_name']).'">
</span>
<div class="cl"></div>
</div>


<div class="d_inp">
<span class="d_inp_l required">'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['surname'].'</span>
<span class="d_inp_r">
<input type="text" id="surname_user" placeholder="'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['surname_place'].'" value="'.(User\User::$arrDBUser['prf_fam']==''?'':User\User::$arrDBUser['prf_fam']).'">
</span>
<div class="cl"></div>
</div>


<div class="d_inp"><span class="d_inp_l">'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['sex'].'</span>
<span class="d_inp_r"><select id="gender_user"><option value="">'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['sex_select'].'</option>';
foreach(Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['sex_db'] as $k=>$v){
    $txt.='<option value="'.$k.'"'.(User\User::$arrDBUser['sex']==$k && User\User::$arrDBUser['sex']!=''?' selected':'').'>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['sex_db'][$k].'</option>';
}
    $txt.='</select></span><div class="cl"></div></div>


<div class="d_inp">
<span class="d_inp_l">'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['birthday'].'</span>
<span class="d_inp_r">
<input type="date" id="birthday_user" value="'.(User\User::$arrDBUser['birthday']==''?'':User\User::$arrDBUser['birthday']).'" min="1910-01-01" max="2013-12-31">
</span>
<div class="cl"></div>
</div>

<div id="personal_upd_btn" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Def\Opt::$lang][$btn].'</div>


<p class="note ac five_"><br>'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['star'].'</p>

<script type="text/javascript">
var pers_upd_btn=true;
document.getElementById("personal_upd_btn").addEventListener("click",function(){
    
    
    
    var name=document.getElementById("name_user").value;
    var surname=document.getElementById("surname_user").value;
    var gender=document.getElementById("gender_user").value;
    var birthday=document.getElementById("birthday_user").value;
    
    
    if(name.length<2 || name.length>20){
        $.jGrowl("'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['name_err'].'",{theme:"growl-error",life:4000});
    }else if(surname.length<2 || surname.length>25){
        $.jGrowl("'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['surname_err'].'",{theme:"growl-error",life:4000});
    }else{
        if(pers_upd_btn){
        ajaxPostSend("personal_upd=1&name="+name+"&surname="+surname+"&gender="+gender+"&birthday="+birthday,formPersonalUpdate,true,true,"/ajax/cabinet/profile.php");
        pers_upd_btn=false;
        }
    }
});

function formPersonalUpdate(arr){if(arr.l==1){
    $.jGrowl(arr.answer,{theme:"growl-error",life:4000});pers_upd_btn=true;
}else if(arr.l==2){
    document.getElementById("aj_p_person").innerHTML="<p>"+arr.answer+"</p>";}
}

</script>


';

        return $txt;

    }


    static function getIndexInfo(){
        if(User\User::$arrDBUser['prf_name']!=''){
            $txt='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['name'].': '.User\User::$arrDBUser['prf_name'].'.</p>';
        }else{
            $txt='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['name_null'].' <a href="/cabinet/profile">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null_link'].'</a></p>';
        }
        if(User\User::$arrDBUser['prf_fam']!=''){
            $txt.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['surname'].': '.User\User::$arrDBUser['prf_fam'].'.</p>';
        }else{
            $txt.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['surname_null'].' <a href="/cabinet/profile">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null_link'].'</a></p>';
        }
        if(User\User::$arrDBUser['sex']!=''){
            $txt.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['sex'].': '.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['sex_db'][User\User::$arrDBUser['sex']].'.</p>';
        }else{
            $txt.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['sex_null'].' <a href="/cabinet/profile">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null_link'].'</a></p>';
        }
        if(User\User::$arrDBUser['birthday']!=''){
            $txt.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['birthday'].': '.User\User::$arrDBUser['birthday'].'.</p>';
        }else{
            $txt.='<p>'.Def100\LangLibCabMain::ARR_INDEX[Def\Opt::$lang]['birthday_null'].' <a href="/cabinet/profile">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null_link'].'</a></p>';
        }
        return $txt;
    }
}