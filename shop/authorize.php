<?php
require_once 'bootstrap.php';

//$_SESSION['auth'] = 1;

if ( isset( $_POST['submit_authorize'] ) )
{
  $a_data = $a_error = [ ];

  //1
  $a_data['email'] = ( isset( $_POST['email'] ) and is_string( $_POST['email'] ) )
    ? trim( $_POST['email'] ) : '';

  $a_data['password'] = ( isset( $_POST['password'] ) and is_string( $_POST['password'] ) )
    ? trim( $_POST['password'] ) : '';

  //2
  if ( ! $a_data['email'] )
    $a_error['email'] = 'Введіть свій E-mail';

  if ( ! $a_data['password'] )
    $a_error['password'] = 'Введіть пароль';

  // 4
  if ( $a_error == [] )
  {
   echo $sql = "SELECT * FROM `" . DB_PREFIX . "user` WHERE
      `user_email` = '{$a_data['email']}'
      AND `user_password` = '" . md5( $a_data['password']  ) . "'
    ";

    if ( $result = mysql_query( $sql ) )
    {
      if ( mysql_num_rows( $result ) )
      {
        $data             = mysql_fetch_assoc( $result );
        $_SESSION['auth'] = $data['user_id'];
        exit( header( 'Location: index.php' ) );
      }
      else
        $a_error['password'] = 'Невірний пароль';
        $a_error['email'] = 'Невірний E-mail';
    }
    else
      exit( mysql_error (  ) );
  }
}
?>

<form action="" method="post">
  <label>E-mail</label><br />
  <input type="text" name="email"
         value="<?= ( isset( $a_data['email'] ) ? htmlspecialchars( $a_data['email'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['email'] ) ) ? '<span style="color: red">' . $a_error['email'] . '</span><br />' : '' ) ?>

  <label>Пароль</label><br />
  <input type="password" name="password" /><br />
  <?= ( ( isset( $a_error['password'] ) ) ? '<span style="color: red">' . $a_error['password'] . '</span><br />' : '' ) ?>

  <input type="submit" name="submit_authorize" value="Увійти" />
</form>

