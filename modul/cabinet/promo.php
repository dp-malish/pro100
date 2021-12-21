<?php
namespace lib\Def;

use incl\pro100\Def as Def100;
use incl\pro100\User as User;


/*
 *
728x90
468x60
300x250
160x600
 *
 *
 *
 * */


Opt::$main_content.='<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_PROMO[Opt::$lang]['name'].'</h3></div>';



Opt::$main_content.='
<div class="text_fon">
    <div class="h_fon_min">HTML code for inserting a 468 x 60 banner</div>

    <div class="d_promo"><img src="/img/promo/sochelping.jpg" alt="'.Opt::$site.'"></div>

        <div class="d_promo_code" contenteditable="true">

            &lt;a href= "'.Opt::$protocol.Opt::$site.'/p/'.User\User::$arrDBUser["log"].'" target= "_blank"&gt;
            &lt;img width="728" height="91" border="0" alt= "'.Opt::$site.'" src= "'.Opt::$protocol.Opt::$site.'/img/promo/sochelping.jpg" /&gt;&lt;/a&gt;

        </div>
     
   <div class="ac">
        <input type="text" class="d_promo_code" value=\'&lt;a href= "'.Opt::$protocol.Opt::$site.'/p/'.User\User::$arrDBUser["log"].'" target= "_blank"&gt;
            &lt;img width="728" height="91" border="0" alt= "'.Opt::$site.'" src= "'.Opt::$protocol.Opt::$site.'/img/promo/sochelping.jpg" /&gt;&lt;/a&gt;\' readonly>
  
  </div>
  <div class="area100">          
            <textarea class="d_promo_code" readonly>&lt;a href= "'.Opt::$protocol.Opt::$site.'/p/'.User\User::$arrDBUser["log"].'" target= "_blank"&gt;
            &lt;img width="728" height="91" border="0" alt= "'.Opt::$site.'" src= "'.Opt::$protocol.Opt::$site.'/img/promo/sochelping.jpg" /&gt;&lt;/a&gt;
            
            
</textarea>
</div>

</div>';


Opt::$main_content.='
<script type="text/javascript">
var promoTxt = document.getElementsByClassName("d_promo_code");

function copyPromoCode() {
    //this.style.display="none";
$(this).focus();
 $(this).select();
 document.execCommand("copy");
 //$(this).after("Copied to clipboard");
 $.jGrowl("Copied to clipboard", { theme: \'growl-error\',life:3000});
};

for (var i = 0; i < promoTxt.length; i++) {
    promoTxt[i].addEventListener("click", copyPromoCode, false);
}

</script>

';



Opt::$main_content.='<div class="text_fon ac">'.Def100\LangLibCabMain::ARR_PROMO[Opt::$lang]['name'].


    '
<a href= "http://pro100.my/p/admin" target= "_blank"> <img width="728" height="91" border="0" alt= "pro100.my" src= "http://pro100.my/img/promo/sochelping.jpg" /></a>

<a href= "http://pro100.my/p/admin" target= "_blank"> <img width="728" height="91" border="0" alt= "pro100.my" src= "http://pro100.my/img/promo/sochelping.jpg" /></a>

</div>';

//contenteditable="true"

