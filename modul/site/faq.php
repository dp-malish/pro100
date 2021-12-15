<?php
namespace lib\Def;

Opt::$css.='';

//Opt::$jscript.='';


Opt::$title='FAQ SOCIAL SERVICE OF FINANCIAL MUTUAL SUPPORT';
Opt::$description='FAQ SOCIAL SERVICE OF FINANCIAL MUTUAL SUPPORT';





Opt::$main_content.='<main><article>
<div class="ac"><p><br>FAQ<br><br></p></div>

</article></main>';


Opt::$main_content.='

<style>
.f_item{
background: #0ab59f;
}
.f_answ{
display: none;
}
</style>
<div class="f_item">
    <div class="f_ques">
3333
    </div>
    <div class="f_answ">
4444
    </div>
</div>

<div class="f_item">
    <div class="f_ques">
1111
    </div>
    <div class="f_answ">
2222
    </div>
</div>
<script type="text/javascript">

//function faqAns(){alert(777)}
//element.addEventListener(\'click\', faqAns);

/*document.body.addEventListener(\'click\', function (evt) {
    if (evt.target.className === \'f_ques\') {
        alert(this)
    }
}, false);*/

/*var faqdiv=document.getElementsByClassName("f_ques");
faqdiv.addEventListener(\'click\', alert(5555));*/


var buttonClick = document.getElementsByClassName("f_ques");
/* можно так */
   /*for (i=0; i< buttonClick.length; i++)
   buttonClick[i].onclick = function()
  {     alert("OK class");
  };*/
/* а лучше так*/ 
[].slice.call(buttonClick).forEach(function(item) {
        item.addEventListener("click",function(){
           alert("OK class");
           var papa= this.parentNode;
           papa.style()
           
        });
    });
/* или так 
[].forEach.call(document.querySelectorAll(\'.Buttons\'), function(item) {
        item.addEventListener(\'click\', function() {
           alert("OK class");
        });
    });*/


</script>


';

