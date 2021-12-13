<?php
namespace lib\Def;
/**
 * Created by PhpStorm.
 * User: WinTeh
 * Date: 20.09.2021
 * Time: 16:10
 */


Opt::$main_content.='<br><br><a href="/cabinet/">Кабинет</a>';


Opt::$main_content.='<br><br><br><a href="/addcash/">Добавить деньги</a>';


Opt::$main_content.='<br><br><a href="/">Главная</a>';
Opt::$main_content.='<br><br><a href="/login?login=admin&pass=admin">Вход</a>';

Opt::$main_content.='<br><br><a href="/login?login=proba3&pass=12345678">Вход Proba3</a>';

Opt::$main_content.='<br><br><a href="/exit">Выход</a>';
Opt::$main_content.='<br> <br><br><br> User#'.\incl\pro100\User\User::$u_id;



Opt::$main_content.='<br><br><a href="/reg?login=Proba1&pass=12345678&mail=win@ix.ru&oferta=1">Registraciya</a>';
Opt::$main_content.='<br><br><a href="/reg?login=admin&pass=12345678&mail=zelejoy@ya.ru&oferta=1">Registraciya Есть</a>';
//Opt::$main_content.='<br>'.$_GET['i'];