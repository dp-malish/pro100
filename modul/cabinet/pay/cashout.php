<?php
/**
 * Created by PhpStorm.
 * User: WinTeh
 * Date: 21.09.2021
 * Time: 14:23
 */
namespace lib\Def;

use \incl\pro100\User as User;

use \incl\pro100\Pay as Pay;

$cash=new Pay\viewTransaction();


Opt::$main_content.='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>


<h3>Тут форма для вывода суммы и можно выбрать платёжную систему</h3>
<div>
    <label for="sum">Сумма</label>
    <input type="text" id="sum" name="sum" placeholder="Сумма к выводу">
    <button id="sum_post">Вывести!!!</button>
</div>

<div id="answer_post"></div>

<script src="/j/lib/m_jq.js"></script>

<link rel="stylesheet" type="text/css" href="/css/all_jGrowl.css" />

<script src="/j/lib/all_jGrowl.js"></script>
<script src="/j/common_v1_0.js"></script>

<script type="text/javascript">

function sendSum(){
    
   
    var sum=document.getElementById("sum").value;
    var ps = 1;
    
    ajaxPostSend("cash_out=1&sum="+sum+"&ps="+ps,callbackUserLogin,true,true,"/ajax/cabinet/cabinet.php");
alert(35);
}
function callbackUserLogin(arr){
  //alert(arr.answer);
  document.getElementById("answer_post").innerHTML=arr.answer;
  
/*  if(arr.answer==1){
      modalloadclose();
      document.getElementById("login_btn").remove();
      
  }else modalloadFormAnswer("<p>"+arr.answer+"</p>");*/
  
}
document.getElementById("sum_post").onclick = function(){sendSum()};


</script>

<script type="text/javascript">
    $(document).ready(function (){
        $("#sum").keyup(function(){
            var sum=document.getElementById("sum").value;
            sum=sum.replace(/[^0-9\.]/g,"");
            document.getElementById("sum").value=sum;
        });

        

    });
    


</script>

<br><br><br><h2>out cash</h2><br>'.$cash->getTransactionOut().'
</body>
</html>';

