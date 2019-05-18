<?php

/* 
 Цикл - це блок коду, який дозволяє повторювати виконання деяких інструкцій певну 
кількість разів. Кожне окреме виконання послідовності інструкції в циклі називається
ітерацією. Програмний код циклу виконується до тих пір, поки умовний оператор циклу
повертає значення true, коли повертається значення false, робота циклу припиняється 
і продовжує виконуватись код написаний після циклу.
 */
for ( $i=1; $i<=5; $i++) {
    echo $i.PHP_EOL;
}
echo '<br>';

$j=1;
while ($j<=5) {
    echo $j++.PHP_EOL;
}
echo '<br>';
$x = 1;
do {
     echo $x.PHP_EOL;
} while ($x++<5);
echo '<br>';

$arr = array(1,2,3,4,5); 

foreach($arr as $key=>$value) 
{ 
    unset($arr[$key + 1]); 
    echo $value.PHP_EOL; 
} 
echo '<br>';


$k=100;
while ($k-->10) {
if ($k%4==0) continue;
echo $k . PHP_EOL;
}
echo '<br>';

$b = 0;
  do {
    $b++;
    if ($b%2 == 0) {
        echo '<b>'.$b.'</b>'.PHP_EOL;
        continue;
    }    
    echo $b.PHP_EOL;
  } while ($b < 10);
  echo '<br>';
 /*
  Синтаксис циклу for:
  for(ініціалізуючі команди, умова циклу, команди після ітерації)
  Цикл for починає свою роботу з виконання ініціалізуючих команд. Дані команди 
  виконуються один раз. Після цього перевіряється умова циклу, якщо вона істинна, 
  то виконується тіло циклу. Після того, як буде виконаний останній оператор тіла
  циклу, виконуються команди після ітерації. Потім знов перевіряється умова циклу
  і т.д.
  */
  for($c=20; $c>0; $c--) {
      if($c%5 == 0) continue;
      echo $c.PHP_EOL;
      if($c == 7) break;
  }  
echo '<br>';

$m=0;
$arr1 =array(1,4,5,66);
foreach ($arr1 as $value) {
    if($value%2 == 0) continue;
    echo '<pre>';
    echo "[$m] => $value";
    echo '<pre>';
    $m++;
}

$arr5 = [ 43, [ 22, 53 ], 12, [ [ 64, 98 ], [ 64, 82 ], 36 ] ]; 
foreach ($arr5 as $row) {
    if (is_array($row)) {
        foreach ($row as $row1) {
            if (is_array($row1)) {
                foreach ($row1 as $row2) {
                    if ( false !== strpos( $row2, '2') or false !== strpos( $row2, '4'))
		echo $row2.PHP_EOL;
                }
                continue;
            }
            if ( false !== strpos( $row1, '2') or false !== strpos( $row1, '4'))
		echo $row1.PHP_EOL;
        }
        continue;
    }
    if ( false !== strpos( $row, '2') or false !== strpos( $row, '4'))
		echo $row.PHP_EOL;
}
/* Безкінечний цикл - це цикл, написаний таким чином, що умов виходу з нього ніколи 
не виконується.
 */	

/* break перериває виконання структури for, foreach, while, do-while фбо switch.
continue не перериває роботу циклу, а просто виконує перехід до наступної ітерації.
 */


echo '<br>';
$n=0;
while (true) {
    $n++;
    if ($n%4 == 0) continue;
    if ($n>10) break;
    echo $n.' ';
}
echo '<br>';


//шахматна доска
echo '<table border="1">';
   for( $i=1, $c=1; $i<=8; $i++, $c++)
   {        
       echo '<tr>';
       for( $j=1; $j<=8; $j++) {
          
           if($c % 2 == 0){
               echo '<td bgcolor="black" width="50" height="50"></td>';
           }
           else{
               echo '<td bgcolor="white" width="50" height="50"></td>';
           }
       }
       echo '</tr>';
   }
   echo '</table>';
