<?php

/*$foo='bar';
$bar=17;
echo $$foo; //17

$foo='admin';
$config_admin=1;
$config_user=2;
$TMP="config_{$foo}";
echo $$TMP;
*/
//тернарний оператор
/*echo (true)? 1:2;

$foo=(false)?'a':'b';//записує в змінну
echo $foo;

$foo=1;
if($foo==1)
    echo 11;
else if($foo==2)
    echo 22;
else 
    echo 33;
*/
//аналог
/*
echo ($foo==1)
    ? 11
    : (($foo==2)
        ? 22
        : 33
       ); 

(true)? print 1: $foo=2;
*/


//цикли
//з передумовою
/*$foo=1;
while($foo<=10)
{
    echo $foo;
    $foo+=1;
}
 
echo $foo; //11
*/


//з післяумовою
/*$foo=1;
do{
    echo $foo++;
}
while($foo<=10);
*/


//безкінечнтй цикл
/*$foo=1;
while(true){
   echo $foo++;
   if($foo>10)
       break;//припиняє роботу цикла навіть якщо умова викон
}*/


/*
$foo=1;
while($foo<=100)
{
   echo $foo++;
   if($foo>=50 and $foo<=70)
       continue;//припиняє роботу ітераціі але не циклу
   if($foo==rand(1,100))
       break;
}
 */

/*
$i=1;
while(true)
{
    echo $i;
    if($i++ ==100)
        break;
    while($i>50 and $i<70)
    {
        if($i==rand(50,70))
         break(2);
        break;
    }
}
*/


/*
for($i=1;$i<10;$i++)
{
    echo $i;
}
  */


/*
for($i=1;$i<10;)
{
    echo $i++;
}
*/


/*
$i=1;
for(;$i<10;)
{
    echo $i++;
}
*/


/*
$i=1;
for(;;) //безкінечний цикл
{
    echo $i++;
    if($i==10)
        break;
}
*/

/*
for($i=1,$j=5;$i<10,$j<25;$i+=3,$j*=4)
{
    echo $i+$j;
}
*/



$foo=[
    'key1'=>17,
    'key17'=>19,
    7,23
];
/*
foreach($foo as $row)
{
    echo $row;
    if($row==19)
        $foo[]=55;     
}
*/

foreach($foo as $k=>$v)
{
    echo "{$k}={$v}<hr/>";
}
