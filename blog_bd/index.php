<?php
require_once 'bootstrap.php';

if ( isset( $_SESSION['auth'] ) )
  echo '<a href="add.php">Добавить запись</a><hr />';

getInfoBlock(  );

$sql = "SELECT *  FROM `" . DB_PREFIX . "blog` ";

if ( $result = mysql_query( $sql ) )
{
  if ( mysql_num_rows( $result ) )
  {
    while ( $row = mysql_fetch_assoc( $result ) )
    {
      echo '<a href="view.php?blog_id=' . $row['blog_id'] . '">Просмотр</a> |';

      if ( isset( $_SESSION['auth'] ) )
      {
        echo '<a href="edit.php?blog_id=' . $row['blog_id'] . '">Редактировать</a> |';
        echo '<a href="delete.php?blog_id=' . $row['blog_id'] . '&token=' . session_id(  ) . '">Удалить</a>';
      }

      echo '<br />';
      echo '<h2>' . htmlspecialchars( $row['blog_title'] ) . '</h2>';
      echo '<div>' . htmlspecialchars( $row['blog_text'] ) . '</div><hr />';
    }
  }
  else
    echo 'Блогов нет';
}
else
  exit( mysql_error(  ) );
