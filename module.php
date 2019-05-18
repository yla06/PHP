<?php

$module  = (isset( $_GET['module'])) ? $_GET['module'] : '';

//$module = str_replace ('../', '', $module);//вирізати недостатньо

/*if ( strpos ($module, '../'))
        echo ml.kmfl.k;
*/


//$module = $_GET['module']; //якщо модуля не існує буде помилка 


//перший варіант єдиної точки входу
/*
if ( $module == 'main')
    include 'module/main.php';
else if ( $module == 'about')
    include 'module/about.php';
*/

include 'config.php';
require 'functions.php';

include_once 'config.php';//перевіряє чи був вже підключений цей файл, якщо  так то більш його не підключає і не видає посилку
require_once 'functions.php';

include '../config.php'; //щоб перейти на рывень вище

define('MC_ROOT2', $_SERVER[ 'DOCUMENT_ROOT' ] . '/../'); //1 СПОСІБ ЗНАЙТИ ШЛЯХ ДО ФАЙЛУ

