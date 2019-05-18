<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ( isset( $_POST['upload'] ) )
{
  $a_data = $a_error = [ ];
 
//1
  $a_data['myfile'] = ( isset( $_FILES['myfile'] ) ) ? $_FILES['myfile'] : [];
  
  //2
  if ( $a_data['myfile']==[] )
    $a_error['myfile'] = 'Файл не вибраний';

  else if (  $a_data['myfile']['error']  != 0 )
  {
     // switch ($a_data['myfile']['error'])
    $a_error['title'] = 'Заголовок должен бить короче 50 символов';
  }
  if ( ! $a_data['text'] )
    $a_error['text'] = 'Дані не введено';

  else if ( mb_strlen( $a_data['text'] ) > 50000 )
    $a_error['text'] = 'Текст должен бить короче 50000 символов';

  
  if ( ! $a_error )
  {
      $data = unserialize (file_get_contents('blog.dat'));
      $data[]= $a_data;
      file_put_contents( 'blog.dat', serialize( $data ));
      
      exit(header( 'Location: add.php' ));
  }
  else
  {
    echo '<h1>В даних знайдено помилки:</h1>';
  }
}
?>

<form action="" method="post" enctype="multipart/form-date">
    <input type="file" name="myfile"><br />
    <input type="hidden" name="MAX_FILE_SIZE" value="20">
      <?= ( ( isset( $a_error['myfile'] ) ) ? '<span style="color: red">' . $a_error['myfile'] . '</span><br />' : '' ) ?>
    <input type="submite" name="upload" value="upload file"><br />

</form>

