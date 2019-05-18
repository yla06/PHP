<?php

require_once 'bootstrap.php';
$chat_id = ( isset( $_GET[ 'chat_id' ] ) and is_string( $_GET['chat_id'] ) and ctype_digit( $_GET['chat_id'] ) )
  ? $_GET[ 'chat_id' ]
  : false;
if ( false === $chat_id )
{
  setWarning( 'ID чата не передан' );
  exit( header( 'Location: index.php' ) );
}
$a_chat = [];
$sql    = "SELECT * FROM `" . DB_PREFIX . "chat` WHERE `chat_id` = '{$chat_id}' ";
$result = mysql_query( $sql );
$a_chat = mysql_fetch_assoc( $result );
$a_chat = [];
?>

  <div style="background-color: greenyellow"><?=$a_chat['chat_text']  ?></div>
