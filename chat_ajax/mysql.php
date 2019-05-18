<?php
$link = @mysql_connect( 'localhost', 'st411', 'E6t9B7g5' );
if ( ! $link )
  exit( 'Ошибка соединения: ' . mysql_error(  ) );
$db_selected = mysql_select_db( 'st411', $link );
if ( ! $db_selected )
  exit( 'Не удалось выбрать базу: ' . mysql_error(  ) );
mysql_query( "SET collation_connection = utf8_unicode_ci" );
mysql_query( "SET NAMES utf8" );

