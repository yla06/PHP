<?php
require_once 'bootstrap.php';

if ( isset( $_POST['submit-authorize'] ) )
{
  $a_data = $a_error = [ ];

  $a_data['login'] = ( isset( $_POST['login'] ) and is_string( $_POST['login'] ) )
    ? trim( $_POST['login'] ) : '';
 
  $a_data['password'] = ( isset( $_POST['password'] ) and is_string( $_POST['password'] ) )
    ? trim($_POST['password']) : '';

  //2
  if ( '' == $a_data['login'] )
    $a_error['login'] = 'Дані не введено';

  if ( '' == $a_data['password'] )
    $a_error['password'] = 'Дані не введено';

  //4
  if ( ! $a_error )
  {
    if( $a_data['login'] == ADMIN_LOGIN and $a_data['password'] == ADMIN_PASS)
      {
        $_SESSION['auth'] = true;
        exit( header('Location: index.php'));
      }
      else
    $a_error['password'] = 'Пара логин  и пароль не найдени';
  }    
}
?>
<form action="" method="post">
    
    <label>Введіть свій логін</label><br />
  <input  type="text" name="login"
         value="<?= ( isset( $a_data['login'] ) ? htmlspecialchars( $a_data['login'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['login'] ) ) ? '<span style="color: red">' . $a_error['login'] . '</span><br />' : '' ) ?>

  <label>Введіть свій пароль</label><br />
  <input type="password" name="password" /><br />
  <?= ( ( isset( $a_error['password'] ) ) ? '<span style="color: red">' . $a_error['password'] . '</span><br />' : '' ) ?>
  
  <input type="submit" name="submit-authorize" value="Авторизація" /><br /><br /><br />
</form>

