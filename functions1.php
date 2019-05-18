<?php

//функція strpos


$foo='Hello';
echo $foo[3]; //l 


if($str[0]='_') //перевіряєм чи є перший символ _

$mystring = 'Hello kitty';
$findme = 'kitty';
$pos = strpos($mystring, $findme);

var_dump($pos);

if( $pos !== false)
	echo 1;
else
	echo 0;
	
	
$a=[12,47,88,13];

foreach ( [12,47,88,13] as $row)
{
	if ( false !== strpos( $row, '2') or false !== strpos( $row, '4'))
		echo $row;
}	

// функия echo

//echo (1, 2, 3, 4, 8, 123, 456);
echo 1, 2, 3;

//explode  Разбивает строку с помощью разделителя
$pizza  = "кусок1 кусок2 кусок3 кусок4 кусок5 кусок6";
$pieces = explode(" ", $pizza);
echo '<pre>';
print_r ($pieces);
echo '</pre>';


$id= "123_42_45_54";
$foo=explode("_", $id);
echo '<pre>';
print_r ($id);
echo '</pre>';


$str = 'один|два|три|четыре';
// положительный лимит
echo '<pre>';
print_r(explode('|', $str, 2));
echo '</pre>';
// отрицательный лимит (начиная с PHP 5.1)
echo '<pre>';
print_r(explode('|', $str, -1));
echo '</pre>';

//implode  Объединяет элементы массива в строку
$foo= [1,23,'dashas', 23, 'hgjg', 5454];

echo implode('*', $foo);


//strtok
//max


//створення функцій
/*function mf_foo()
{
	echo 123;
}*/



/*function mf_foo()
{
	return 123;//все що нижче не спрацьовує
}
echo mf_foo();
$a=mf_foo();// результат 123 записали у змінну а
echo ++$a;
*/



/*function mf_foo($a)
{
	echo $a+10;
}
mf_foo(25);
mf_foo(25,14);//необовязковий аргумент, він відкидається
*/


function mf_foo($a,$b)
{
	echo $a + $b;
}
mf_foo(25,15);
mf_foo(7,12);


/*function mf_foo($a,$b=5) //$b необовязковий аргумент
{
	echo $a + $b;
}

mf_foo(1,3);  
mf_foo(5);
*/


/*
$a=20;
function mf_foo($a)
{
	$b=7;
	$a +=5;
	echo $a;
}


echo $a; //20
mf_foo(10); //15
echo $a; // 20
*/
function my_foo($a, $b, $c=10){
    return $a + $b + $c;
}
echo my_foo(12, 1, 8).'<br />'; //виведе 21
echo my_foo(5, 1).'<br />'; // 5 + 1 + 10 виведе 16
echo my_foo(1, 2, 3).'<br />'; // виведе 6

function recursion($a)
{
    if ($a < 20) {
        echo "$a\n";
        recursion($a + 1);
    }
}

function factorial($x) {
if ($x === 0) return 1;
else return $x*factorial($x-1);
}
echo factorial(3);
