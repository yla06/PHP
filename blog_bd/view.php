<?php
require_once 'bootstrap.php';

$blog_id = ( isset( $_GET[ 'blog_id' ] ) and is_string( $_GET['blog_id'] ) and ctype_digit( $_GET['blog_id'] ) )
  ? $_GET[ 'blog_id' ]
  : false;

if ( false === $blog_id )
{
  setWarning( 'ID блога не передан' );
  exit( header( 'Location: index.php' ) );
}

$sql    = "SELECT * FROM `" . DB_PREFIX . "blog` WHERE `blog_id` = '{$blog_id}' ";

if ( $result = mysql_query( $sql ) )
{
  if ( mysql_num_rows( $result ) )
  {
    $row = mysql_fetch_assoc( $result );

    if ( isset( $_SESSION['auth'] ) )
    {
      echo '<a href="edit.php?blog_id=' . $row['blog_id'] . '">Редактировать</a> |';
      echo '<a href="delete.php?blog_id=' . $row['blog_id'] . '&token=' . session_id(  ) . '">Удалить</a>';
    }

    echo '<br />';
    echo '<h2>' . htmlspecialchars( $row['blog_title'] ) . '</h2>';
    echo '<div>' . htmlspecialchars( $row['blog_text'] ) . '</div><hr />';
  }
  else
    echo 'Блогов нет';
}
else
  exit( mysql_error(  ) );
