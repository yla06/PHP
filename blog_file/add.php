<?php
require_once 'bootstrap.php';

if( ! isset( $_SESSION['auth']))
    exit( header('Location: authorize.php'));
/*
$a_data = [
    'title' => 'Title',
    'text' => 'Blog text',
];

echo '<pre>';
print_r($a_data);
echo '<pre>';

echo '<pre>';
print_r( serialize($a_data));
echo '<pre>';
*/

//$a = unserialize( file_get_contents('blog.dat'));



/*echo '<pre>';
print_r( $a = serialize($a_data));
echo '<pre>';

echo '<pre>';
print_r( unserialize($a));
*/

/*
$str='hello world';
file_put_contents('test.dat', $str); // записує строку в файл
*/





if ( isset( $_POST['submit_add'] ) )
{
  $a_data = $a_error = [ ];
 
  $a_data['title'] = ( isset( $_POST['title'] ) and is_string( $_POST['title'] ) )
    ? trim( $_POST['title'] ) : '';

  $a_data['text'] = ( isset( $_POST['text'] ) and is_string( $_POST['text'] ) )
    ? trim($_POST['text']) : '';
  
  $token = ( isset( $_POST['token'] ) and is_string( $_POST['token'] ) )
    ? trim($_POST['token']) : '';

  if( $token != session_id())
    exit('Токен не найден');

  //2
  if ( ! $a_data['title'] )
    $a_error['title'] = 'Дані не введено.';

  else if ( mb_strlen( $a_data['title'] ) > 50 )
    $a_error['title'] = 'Заголовок должен бить короче 50 символов';

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

<form action="" method="post">
  <label>Заголовок</label><br />
        
<input  maxlength="50" type="text" name="title"
         value="<?= ( isset( $a_data['title'] ) ? htmlspecialchars( $a_data['title'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['title'] ) ) ? '<span style="color: red">' . $a_error['title'] . '</span><br />' : '' ) ?>

  
<label>Текст записи</label><br />
  <textarea name="text"><?= ( isset( $a_data['text'] ) ? htmlspecialchars( $a_data['text'] ) : '' ) ?></textarea><br />
  <?= ( ( isset( $a_error['text'] ) ) ? '<span style="color: red">' . $a_error['text'] . '</span><br />' : '' ) ?>

  <input type="hidden" name="token" value="<?= session_id() ?> " />
  <input type="submit" name="submit_add" value="Добавить запись в блог" />
</form>
