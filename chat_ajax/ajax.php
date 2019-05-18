<?php
require_once 'bootstrap.php';
$action = ( isset( $_REQUEST[ 'action' ] ) and is_string( $_REQUEST[ 'action' ] ) ) ? $_REQUEST[ 'action' ] : '';
if ( $action == 'index_json' )
{
  $sql = "SELECT * FROM `" . DB_PREFIX . "chat`";
  if ( $result = mysql_query( $sql ) )
  {
    $data = [ ];
    if ( mysql_num_rows( $result ) )
    {
      while ( $row    = mysql_fetch_assoc( $result ) )
        $data[] = $row;
    }
    return_data( $data );
  }
  else
    return_error( 'SQL ошибка' );
}

else if ( $action == 'add' )
{
  if ( ! isset( $_SESSION[ 'auth' ] ) )
    return_error( 'Нет авторизации' );
  $a_data  = $a_error = [ ];
  $a_data[ 'chat_text' ] = ( isset( $_POST[ 'chat_text' ] ) and is_string( $_POST[ 'chat_text' ] ) ) ? trim( $_POST[ 'chat_text' ] ) : '';
  $a_data[ 'token' ] = ( isset( $_POST[ 'token' ] ) and is_string( $_POST[ 'token' ] ) ) ? trim( $_POST[ 'token' ] ) : '';
  if ( $a_data[ 'token' ] != session_id() )
    $a_error[ 'token' ] = 'Токен не найден.';
  if ( ! $a_data[ 'chat_text' ] )
    $a_error[ 'chat_text' ] = 'Дані не введено.';
  else if ( mb_strlen( $a_data[ 'chat_text' ] ) > 50000 )
    $a_error[ 'chat_text' ] = 'Заголовок должен быть короче 50 символов.';
  if ( $a_error == [ ] )
  {
    $sql = "INSERT INTO `" . DB_PREFIX . "chat` SET
      `chat_text`  = '" . mysql_real_escape_string( $a_data[ 'chat_text' ] ) . "'";
    if ( mysql_query( $sql ) )
    {
      if ( mysql_affected_rows() )
      {
        $a_data[ 'chat_id' ] = mysql_insert_id();
        return_data( 'Сообщение добавлено', $a_data );
      }
      else
        return_error( 'Запись не добавлена' );
    }
    else
      return_error( 'Ой. Попробуйте позже' );
  }
  else
    return_error( 'В форме найдены ошибки:', $a_error );
}

else if ( $action == 'index' )
{
  $sql = "SELECT `b`.*, `u`.`user_login`, `u`.`count`, `u`.`chat_text` AS `aaa`
    FROM `" . DB_PREFIX . "chat` AS `b`
    INNER JOIN `" . DB_PREFIX . "user` AS `u`
      ON `u`.`user_id` = `b`.`chat_user_id`
    ";
  if ( $result = mysql_query( $sql ) )
  {
    if ( mysql_num_rows( $result ) )
    {
      while ( $row = mysql_fetch_assoc( $result ) )
      {
        echo '<h2>' . htmlspecialchars( $row[ 'user_login' ] ) . '(' . htmlspecialchars( $row[ 'count' ] ) . ')</h2>';
        echo '<a href="view.php?chat_id=' . $row[ 'chat_id' ] . '">Просмотр</a> |';
        
        echo '<br />';
        echo '<div>' . htmlspecialchars( $row[ 'chat_text' ] );
      }
    }
    else
      echo 'No data';
  }
  else
    exit( mysql_error() );
}
