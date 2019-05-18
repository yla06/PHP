<?php
$a=10;
$b=17;
function mf_foo()
{
    //global $a; //глобальні змінні можна перечисляти через кому $b, ...
    echo $a;
    $a=20;  
    $b=27;
}
echo $a;
mf_foo();
echo $a;

/*
function mf_foo()
{
  static  $a=17;
    echo ++$a;
    
}
mf_foo();
mf_foo();
mf_foo();
*/


/*
function mf_foo(&$b)//аргумент за посиланням? в цю ф-цію можна передавати будь-які змінні
{
     $b*=10;
     
    
}

$a=10;
mf_foo($a);
echo $a;
$c=3;
mf_foo($c);
echo $c;
 */


/*
//функція замикання
$a = function () {
    echo 1111;
    
};
$a();
*/

function cmp($a, $b)
{
    if ( $a == $b ){
     return 0;
    
    return ($a<$b) ? -1 : 1;
    }
}

$a = array(3,2,5,6,1);

print_r($a);

usort ($a, 'cmp');
print_r($a);


//рекурсивна функція, яка викликає саму себе
function foo($a)
{
    if($a<10){
        foo(++$a);
    echo $a;
    }
}
foo(1);//10  9  8  ... 1


