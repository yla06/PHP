<?php
//$pattern = '#a.\..d#';
//$subject = 'ab.cde';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^a.c*e$#';
//$subject = 'abccccccce';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^a.c{5}e$#';
//$subject = 'abccccce';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^a.c{2,5}e$#';
//$subject = 'abccce';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^a.c{0,5}e$#';
//$subject = 'abccce';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^a.c{2,}e$#';
//$subject = 'abcce';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^a[dcb]{3}e$#';
//$subject = 'acdbe';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^\+?380[0-9]{9}$#';
//$subject = '+380937280126';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^\+?380[\d]{9}$#';
//$subject = '+380937280126';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^[0-9A-Za-z_\.,]{5,15}$#';
//$subject = 'vgshagv';
//
//var_dump( preg_match( $pattern, $subject));

//чч.мм.рррр
//$pattern = '#^\d{2}\.\d{2}\.\d{4}$#';
//$subject = '02.12.1980';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^[^\d]{5}$#';
//$subject = 'asdgh';
//
//var_dump( preg_match( $pattern, $subject));


//$pattern = '#^[^abc]{5}$#';
//$subject = 'bbcca';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^(\+380)?[\d]{9}$#';
//$subject = '+380937280126';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^(ab|bc|cc)$#';
//$subject = 'ab';
//
//var_dump( preg_match( $pattern, $subject));


//$pattern = '#^(\+38)?0(50|66|95|93|96|97|98|68|63|73|99)[\d]{7}$#';
//$subject = '0937280126';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^(\+38)?\(0(50|66|95|93|96|97|98|68|63|73|99)\)[\d]{7}$#';
//$subject = '+38(093)7280126';
//
//var_dump( preg_match( $pattern, $subject));

//$pattern = '#^(\+38)?\(0(5(0|1)|6(3|6|8)|9[3|5-9]|73)\)[\d]{7}$#';
//$subject = '+38(093)7280126';
//
//var_dump( preg_match( $pattern, $subject));

//
////$pattern = '#^[А-ЯІЇЄ]{1}[а-я\'іїєэы]{0,30}(\-[А-ЯІЇЄЭ]{1}[а-я\'іїєэы]{0,30})?\s[А-ЯІЇЄ]{1}[а-я\'іїєэы]{1,30}(\-[А-ЯІЇЄ]{1}[а-я\'іїєэы]{1,30})?\s[А-ЯІЇЄ]{1}[а-я\'іїєэы]{1,30}(вна|ич)$#u';
////$subject = 'Чавлюк Юлія Вікторівна';
////
////var_dump( preg_match( $pattern, $subject));




//$date = '2017-02-30';
//
//if( preg_match( '#^\d{4}-\d{2}-\d{2}$#', $date) )
//{
//    list( $y, $m, $d) = explode('-', $date);
//     if( checkdate( $m, $d, $y))
//             echo 'ok';
//    else      
//            echo '!ok';
//}    
// else 
//    echo 'Date incorect';
////
// 
// 
//var_dump( preg_match( '#^\d{4}-\d{2}-\d{2}$#', $match));
//echo '<pre>';
//print_r($match);
//echo '</pre>';

//if( preg_match( '#^\d{4}-\d{2}-\d{2}$#', '2017-02-28', $match) )
//{
//   // list( $y, $m, $d) = explode('-', $date);
//     if( checkdate( $match[2], $match[3], $match[1]))
//             echo 'ok';
//    else      
//            echo '!ok';
  
 $string = 'foo +380937280126 baz hjhbj http://gvjxvsjsyhv 0668712546';
 //echo preg_replace('#(\+\d{3})?\d{9}#', 'xxx', $string);
 echo preg_replace('#https?\:\/\/[a-z_\.]{3,100}#', 'yyy', $string);
