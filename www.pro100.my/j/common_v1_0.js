var my_protocol = window.location.protocol;
var my_host = window.location.hostname;
var referal = document.referrer;
var uri=decodeURI(window.location.pathname);
var temp_obj;//для проявления объекта
var loaderImg=new Image();loaderImg.src="/img/site/loader.gif";
var mesyacstr=["месяц","января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря"];
var adblock=false;
//*************************ajax**************************
function ajaxPostSend(urlparts, callback, json, asinc, url) {
    if (asinc === undefined) {
        asinc = true;
    }
    if (json === undefined) {
        json = true;
    }
    if (url === undefined) {
        url = "/ajax/site/postanswer.php";
    }

    var http = new XMLHttpRequest();
    http.open("POST",url, true);
    http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    if(asinc){
        urlparts+='&catche=' + Math.random();
    }
    http.send(urlparts);
    http.onreadystatechange=function() {
        if (http.readyState == 4 && http.status == 200){
            if(json){ajaxPostErr(http.responseText,callback)}
            else{callback(http.responseText)}
        }
    }
    http.onerror=function () {
        alert('Извините, данные не были переданы. Проверьте подключение к интернету и обновите страницу...');
    }
}
function ajaxPostErr(answer,callback){
    var json=JSON.parse(answer);
    if(json.err){
        alert(json.errText[0]);
        try{if(document.getElementById("modalloadform")===null){modalloadclose();}
        }catch(e){modalloadclose();}
    }
    else{callback(json)}
}

function ajaxPostSendFile(url,file){
    var //file=document.getElementById("file"),
        http=new XMLHttpRequest(),
        form=new FormData();

    var upload_file=file.files[0];
    //form.append("table","1");
    form.append("imgfile",upload_file);


    http.upload.onprogress = function(event) {
        alert( 'Загружено на сервер ' + event.loaded + ' байт из ' + event.total );
    }

    http.upload.onload = function() {
        alert( 'Данные полностью загружены на сервер!' );
    }

    http.upload.onerror = function() {
        alert( 'Произошла ошибка при загрузке данных на сервер!' );
    }
    http.open("post",url,true);
    http.send(form);

}



//*************************show_element**************************
function show_element(res){
    var op = (temp_obj.style.opacity)?parseFloat(temp_obj.style.opacity):parseInt(temp_obj.style.filter)/100;
    if(op < res){
        op += 0.01;
        temp_obj.style.opacity = op;
        temp_obj.style.filter='alpha(opacity='+op*100+')';
        setTimeout('show_element('+res+')',30);
    }
}
function start_show(res,obj,res_s){
    if(res_s === undefined){res_s = 0.3;}
    temp_obj=obj;
    temp_obj.style.opacity = res_s;
    show_element(res);
}
//*************************Модальная форма**************************
function modalload(loadimg){
    var d=document.createElement("div");
    d.setAttribute("id","modalload");
    d.setAttribute("class","modalload ac");
    if(loadimg!==undefined)d.innerHTML='<img src="'+loaderImg.src+'" alt="загрузка">';
    document.body.appendChild(d);
}
function modalloadForm(html,obj){
    modalload();
    if(html===undefined){html=null}
    var d=document.createElement("div");
    d.setAttribute("id","modalloadform");
    d.setAttribute("class","modalloadform");
    document.body.appendChild(d);

    var canvas=document.createElement("div");
    canvas.setAttribute("id","modalloadformcanvas");
    canvas.setAttribute("class","modalloadformcanvas");
    d.appendChild(canvas);

    if(html!==null)canvas.innerHTML=html;
    if(obj!==undefined)canvas.appendChild(obj);

    d=document.createElement("div");
    d.setAttribute("class","closex");
    d.innerHTML='X';
    canvas.appendChild(d);
    d.addEventListener("click",modalloadclose);
}
function modalloadFormAnswer(html,obj){
    modalloadformcanvas.removeChild(modalloadformcanvas.firstChild);

    if(html===undefined){html=null}
    var d=document.createElement("div");
    if(html!==null)d.innerHTML=html;
    if(obj!==undefined)d.appendChild(obj);
    modalloadformcanvas.insertBefore(d,modalloadformcanvas.firstChild);
}
function modalloadclose(){
    try{
        var e = document.getElementById("modalload");
        e.parentNode.removeChild(e);
        if(modalloadform!==null){modalloadform.parentNode.removeChild(modalloadform);}
    }catch(e){}
}
//*************************AutoLoad**************************

window.addEventListener("load", function(){
    try{
    if(document.cookie.length>4){
        //alert('Ready!  7777');
    }
}catch(e){}
},true);
