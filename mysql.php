<?php

$link = @mysql_connect('localhost', 'st411', 'E6t9B7g5');

//var_dump($link);
if( ! $link)
    die( 'Ошибка соединения: '.mysql_error()); //ф-цію mysql_error() видаляєм після написання скрипта

$db_selected = mysql_select_db('st411', $link); //вказуємо з якою базою даних будемо працювати

if( ! $db_selected)
    die( 'Не удалось вибрать базу  : '.mysql_error()); 

mysql_query ("SET collation_connection = utf8_general_ci");
mysql_query("SET NAMES utf8");

sleep(3); //сервер чекає 3 сек

////1
//$sql = "SELECT * FROM `test_blog`";
//
//if ( $result = mysql_query( $sql ) )
//{
//    //$a_data = [];
//  if ( mysql_num_rows( $result ) )
//  {
//    while ( $row = mysql_fetch_assoc( $result ) ) //якщо вибираєм один запис то цикл можна не використовувати
//    {
//      echo '<pre>';
//      print_r($row);
//      echo '</pre>';
//      // if i=10 break; записуємо перші 10 записів
//    }
//  }
//  else
//    echo 'No data';
//}
//else
//  echo 'Вибачте, трапилась технічна помилка! '.mysql_error(  );

$sql = "INSERT INTO `test_blog` (`blog_title`, `blog_text`) VALUES('Заголовок1', 'Текст1')";

if(mysql_query($sql))
{
    if($rows = mysql_affected_rows())
        echo $rows;
    else 
        echo 'No affected';
}
else 
    echo 'Вибачте, трапилась технічна помилка! '.mysql_error(  );
