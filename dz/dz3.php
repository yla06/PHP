<?php

//звичайний масив
$arr=[2,4,6];

//асоціативний масив
$arr1=[
    'day'=>1,
    'month'=>6,
    'year'=>2017
];
echo'<pre>';
print_r($arr1['month']);
unset($arr1['year']);

$arr2=[
    'one'=>[1,2],
    'two'=>[3,4]
];
unset($arr2['one']);

echo'<pre>';
echo $arr2['two'][1];

$a=[
    1,
    55=>[
        2,
        4,
        5=>[1,2,'test'],
    ],
    'key'=>[
        'key'=>[
            2,
            5=>33,
            22
        ]
    ],
    44
];

echo'<pre>';
print_r($a['key']['key'][6]);
echo'<pre>';

/* Оператор AND буде приймати значення true,
  якщо ліва і права частини умови мають значення 
 true одночасно. У всіх інших випадках буде false.
 true AND true => true
 true AND false => false
 false AND true => false
 false AND false => false
 
 Оператор OR буде приймати значення false,якщо обидві 
 частини умови одночасно мають значення false. У всіх
 інших випадках буде true.
 true OR true => true
 true OR false => true
 false OR true => true
 false OR false => false
 
 Оператор XOR буде приймати значення true, якщо або 
 ліва,або права частини умови true,але не обидві зразу.
 true XOR true => false
 true XOR false => true
 false XOR true => true
 false XOR false => false
 
 ! це оператор інверсії. true перетворює у false і 
 навпаки.
 */

/*
Оператори порівняння
== (рівне)
=== (еквівалентне)
> (більше)
< (менше)
>= (більше або дорівнює)
<= (менше або дорівнює)
!= (не рівне)
!== (не еквівалентне)
 */

$foo=5;
echo $foo++; //на екран виведе 5, а потім додасть 1
echo --$foo; //6 відніме 1, отримаєм 5 і виведе 5 на екран
++$foo; // до 5 додасть 1
echo $foo--; //виведе на екран 6, а потім відніме 1
echo ++$foo; //до 5 додасть 1 і виведе наекран 6

/*
4%1 виведе на екран 0, бо 4 ділиться націло на 1
6%3 виведе на екран 0, бо 6 ділиться націло на 3
3%44 виведе 3, бо 3 менше за 44
0%4 виведе 0, бо 0 менше за 4
 */

$foo=2;
$bar=3;
echo'<pre>';
echo ++$foo - 5 + 4 . $bar * 1 - 2%1 + ++$bar / 2 + $foo + $bar-- *2;
/*
1)++$foo = 3;
2)++$bar/2 = 4/2=2; в змінну $bar запишеться значення 4
3)$bar-- *2= 4*2=8; але в змінну $bar запишеться значення 3
4)$bar * 1 = 3 * 1 = 3;
5)2%1 = 0;
8)3-5=-2;
9)-2+4=2;
10)2 . $bar*1 = 2 . 3 = 23;
11)23 - 0 = 23;
12)23 + 2 = 25;
13)25 + $foo = 25 + 3 = 28;
14)28 + 8 = 36;
 */

$c='1';
$d= 1;
if($c==$d)
    {echo'<pre>';
     echo 1;
    }

if($d>10)
    {echo'<pre>';
     echo 2;
    }
    else 
        {echo'<pre>';
        echo 1;
        }
        
if($c===$d)
    {echo'<pre>';
     echo 1;
    }
    else 
        {echo'<pre>';
        echo 2;
        }
        
if($d>10)
    {echo'<pre>';
     echo 3;
    }
    else if($d>0 AND $d<10)
        {echo'<pre>';
        echo 4;
        }

if($d<0)
    {echo'<pre>';
     echo 5;
    }
    else if($d>=0 AND $d<10)
        {echo'<pre>';
        echo 6;
        }
        else if($d>=10 AND $d<100)
                {echo'<pre>';
                echo 7;
                }
                else echo 8;
/*
(0) false
(1>0)true
(5<=5)true
(4 and 6)true
(4-1)true
(5*0)false
(4>2 or 4-6)true
( 1 xor 5 > 2 ) false
(!5) false
(1 or !4) true
( 5 + -5 ) false
( 'Hello' ) true
( 'Text' xor false) true
( !5 > 6 ) true
 ( 1 == '1' ) true
( 5 xor 3 === 3 ) false
( 5 != 4 ) true
( 4 !== '44' ) true
( 2 !== 2 ) false
( false != '' ) false
( null ) false
( 4%2 xor 5*0.99 ) true
( 54 % 1 ) false
( 3 % 555 and true ) true
 */
