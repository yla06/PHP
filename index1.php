<?php
//строки
$foo=1;
echo 'text $foo'.'<br>';
echo "text {$foo}text"; //змынну запис в {}
echo 'м\'ясо';
echo "kgjhg\"kbkhb";
echo "text text \$hgvh jhghjgbgh";

//hero doc поводить як строка в двойих кав
$bar=3;
echo <<<FOO
<p align="center">
    {$bar}
</p>
FOO;
    
//NOVA DOC синтаксис поводить як строка в одинарних кав
echo <<<'FOO'
<p align="center">
    {$bar}
</p>
FOO;

//масиви  
$arr=array();
$arr2=[];
/*
$arr=[1,2,7];
echo'<pre>';
print_r($arr);
echo'<pre>';

$arr2=['title','text','date'];
echo "<h1>{$arr2[0]}</h1>";
*/
/*
$arr=[
    'key'  => 2,
    "key2" => 33,
    17     => 47
];
print_r($arr);
*/
$arr=[1, 17];
$arr[]=20;
$arr[5]=30;
$arr[1]=40;
$arr['key']=50;
$arr[]=60;
echo'<pre>';
print_r($arr);
echo'<pre>';

//unset($arr);видаляэ масив
unset($arr[1]);
echo'<pre>';
print_r($arr);
echo'<pre>';

$arr=[
    55,
    'title' => 'text',
    'text' => "text",
    'data' => [1,2,'abc'=>3,4],
    17 =>47
    
];
echo'<pre>';
print_r($arr);
echo'<pre>';

print_r($arr['title']);//беремо в кавички
/*
define('foo', 'b');
$a=[
    'foo'=>1,
    'b'=>2,
];
echo $a[foo];
 */
/*
echo'<pre>';
echo $arr['data']['abc'];

unset($arr['data']['abc']);

echo'<pre>';
print_r($arr);
echo'<pre>';

unset($arr[0],$arr['text'],$arr['data'][0]);

echo'<pre>';
print_r($arr);
echo'<pre>';
*/
$foo=1;
$bar=5;
if($foo)
    echo 1;


