<?php
namespace lib\Def;
use incl\pro100\Def as Def100;
use incl\pro100\User as User;
$arr_img_promo=[
    [
        'img_name'=>'sochelping.jpg',
        'img_h'=>'91',
        'img_w'=>'730'
    ],[
        'img_name'=>'sochelping_470.jpg',
        'img_h'=>'61',
        'img_w'=>'470'
    ],[
        'img_name'=>'sochelping_300.jpg',
        'img_h'=>'251',
        'img_w'=>'301'
    ],[
        'img_name'=>'sochelping_160.jpg',
        'img_h'=>'601',
        'img_w'=>'161'
    ]
];
Opt::$main_content.='<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_PROMO[Opt::$lang]['name'].'</h3></div>';
foreach ($arr_img_promo as $v){
Opt::$main_content.='
<div class="text_fon rel">
    <div class="h_fon_min">'.Def100\LangLibCabMain::ARR_PROMO[Opt::$lang]['size_baner_start'].$v['img_w'].'x'.$v['img_h'].Def100\LangLibCabMain::ARR_PROMO[Opt::$lang]['size_baner_end'].'</div>
    <div class="d_promo"><img src="/img/promo/'.$v['img_name'].'" alt="'.Opt::$site.'"></div>
        <div class="d_promo_txt">
            &lt;a href= "'.Opt::$protocol.Opt::$site.'/p/'.User\User::$arrDBUser["log"].'" target= "_blank"&gt;
            &lt;img width="'.$v['img_w'].'" height="'.$v['img_h'].'" border="0" alt= "'.Opt::$site.'" src= "'.Opt::$protocol.Opt::$site.'/img/promo/'.$v['img_name'].'" /&gt;&lt;/a&gt;
             <textarea class="d_promo_code" readonly>&lt;a href= "'.Opt::$protocol.Opt::$site.'/p/'.User\User::$arrDBUser["log"].'" target= "_blank"&gt;
            &lt;img width="'.$v['img_w'].'" height="'.$v['img_h'].'" border="0" alt= "'.Opt::$site.'" src= "'.Opt::$protocol.Opt::$site.'/img/promo/'.$v['img_name'].'" /&gt;&lt;/a&gt;            
            </textarea>
        </div>
</div>';
}
Opt::$main_content.='<script type="text/javascript">var promoTxt=document.getElementsByClassName("d_promo_code");function copyPromoCode(){$(this).focus();$(this).select();document.execCommand("copy");$.jGrowl("Copied to clipboard",{theme:"growl-error",life:3000});};for(var i=0;i<promoTxt.length;i++){promoTxt[i].addEventListener("click", copyPromoCode, false);}</script>';