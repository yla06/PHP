<?php

/* 
 Конструкції include i require підключайть і виконують вказаний файл. Якщо файл, 
 * який  підключається за допомогою include не існує, то буде помилка на сторінці, 
 * але код нижче виконається далі. Якщо підключити файл, який не існує за допомогою require,
 * то отримаємо фатальну помилку і код виконуватись не буде. 
 * Конструкція include_once працює так як include, відмінність полягає в тому, що
 * include_once не буде підключати і виконувати код з файлу, який вже один раз був 
 * підключений і поверне true. ТОбто include_once підключає файл тільки один раз.
 * Конструкція require_once працює ідентично require, за винятком того, що вона первіряє 
 * чи підключався вже файл, і якщо так, то не буде підключати його ще раз.
 *  */


/*
 php-inj - один із способів взлому сайту, який працює на php, який полягає у
виконанні постороннього коду на серверній стороні. Рhp-інєкція стає можливою, якщо 
вхідні дані від користувача приймаються і використовуються без перевірки.
 */

/*
 $a_page = ['index', 'contact', 'about'];
$router = @$_GET['route'];

if ( in_array( $router, $a_page ) )
  include "modules/{$router}.php";
else
  echo '404 Not found';
 */


// include "modules/{$router}.php"; цей рядок включає дані, передані користувачем без перевірки
 



 /*Приклад кода вразливого для php-inj.

$module = $_GET['module'];
include ($module.'.php');

Цей код вразливий, так як до змінної $module можна приписати '.php' і по отриманому 
шляху підключити файл.

Захист від атаки: прописати кожне значення через if
 
$module = $_GET['module'];
if ($module == 'main') include 'main.php';
if ($module == 'about') include 'about.php';
if ($module == 'links') include 'links.php';
if ($module == 'forum') include 'forum.php';


Інший спосіб захисту: замінити символ '/' на ''
 
 $tmp = $module;
 while(true) {
    if($tmp == $module == str_replace('/', '', $module))
    break;
    $tmp=$module;
 }
 */
if (filter_var('уникум@из.рф', FILTER_VALIDATE_EMAIL)) { 
    echo 'VALID'; 
} else {
    echo 'NOT VALID';
}
