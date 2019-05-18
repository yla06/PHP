<?php
echo phpversion().'</br>';

$numeric_blog = 100;
$data_admin='administrator';
$user_log='vasia';
$answr_mod='no problem';
$tech_status=5;
$my_coment='comentari';
$fl_array='1 2 3';
$fl_delete='file';
$new_namefl='new file';
$link_menu='';

define('INT_CONST', 100);
define('FLOAT_CONST', 11.5);
define('STRING_CONST', 'web4');
define('BOOL_CONST', true);
define('BOOL_CONSTANT', false);

$positiv_int=12;
$negativ_int=-5;
$positiv_float=10.125;
$negativ_float=-1.01;
$bool_t=true;
$bool_f=false;

/*Целое - это число из множества Z = {..., -2, -1, 0, 1, 2, ...}, 
  длиной от –2 147 483 648 до 2 147 483 647.
*/

$foo=1;
echo '"'.$foo.'"';
echo "<br>";
echo "'".$foo."'";
echo "<br>";

$bar=5;
echo "$bar.=2 отримаємо\n".$bar.=2;
echo "<br>"."$bar+=3 отримаємо\n".$bar+=3;
echo "<br>"."$bar-=10 отримаємо\n".$bar-=10;
echo "<br>"."$bar/=5 отримаємо\n".$bar/=5;
echo "<br>"."$bar*=1000 отримаємо\n".$bar*=1000;

echo "<br>";
echo (1+22/2*4%2-1.1);
/*
 1) ділення 22/2=11;
 2) множення 11*4=44;
 3) остача від ділення 44%2 буде 0;
 4) додавання 1+0=1;
 5) віднімання 1-1.1=-0.1;
 */
