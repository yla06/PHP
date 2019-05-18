<?php
 require_once 'bootstrap.php';

if ( isset( $_POST['submit_register'] ) )
{
  $a_data = $a_error = [ ];

  //1
  $a_data['user_name'] = ( isset( $_POST['user_name'] ) and is_string( $_POST['user_name'] ) )
    ? trim( $_POST['user_name'] ) : '';
  
  
  $a_data['user_email'] = ( isset( $_POST['user_email'] ) and is_string( $_POST['user_email'] ) )
    ? trim( $_POST['user_email'] ) : '';

  $a_data['user_password'] = ( isset( $_POST['user_password'] ) and is_string( $_POST['user_password'] ) )
    ? trim( $_POST['user_password'] ) : '';

  $a_data['user_checkbox'] = ( isset( $_POST['user_checkbox'] ) ) ? 1 : 0;
  //2
  if ( '' == $a_data['user_email'] )
    $a_error['user_email'] = 'Ведіть свій e-mail';

  else if ( !filter_var($a_data['user_email'], FILTER_VALIDATE_EMAIL) )
    $a_error['user_email'] = 'Е-mail введено не коректно';

  if ( ! $a_data['user_password'] )
    $a_error['user_password'] = 'Пароль не введено';
  
  else if ( mb_strlen( $a_data['user_password'] ) < 6 )
    $a_error['user_password'] = 'Пароль має містити не менше 6 символів';
  
  if ( 0 === $a_data['user_checkbox'] )
    $a_error['user_checkbox'] = 'Поставте тут прапорець, якщо хочете продовжити реєстрацію';
//3
  
     if ( ! isset( $a_error['user_email'] ) )
  {
    $sql = "SELECT * FROM `" . DB_PREFIX . "user` WHERE `user_email` = '{$a_data['user_email']}' ";

    if ( $result = mysql_query( $sql ) )
    {
      if ( mysql_num_rows( $result ) )
        $a_error['user_email'] = 'Даний email адрес вже зареєстрований';
    }
  }

  // 4
  if ( $a_error == [] )
  { echo 'Реєстрація успішна' ;
      
    $sql = "INSERT INTO `" . DB_PREFIX . "user` SET
      `user_email` = '{$a_data['user_email']}',
      `user_password`  = '" . md5( $a_data['user_password']  ) . "' ";

    if ( mysql_query( $sql ) )
    {
      if ( mysql_affected_rows() )
      {
        setSuccess ( 'Реєстрація успішна' );
        exit( header( 'Location: index.php' ) );
      }
      else
        setError ( 'Реєстрація не завершена' );
    }
    else {
     setError ( 'Даний email адрес вже зареєстрований' );
    echo mysql_error(  );
    }
  }
}
getInfoBlock(  );
?>

<form action="" method="post">
  <label>Ваше ім'я</label><br />
  <input type="text" name="user_name"
         value="<?= ( isset( $a_data['user_name'] ) ? htmlspecialchars( $a_data['user_name'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['user_name'] ) ) ? '<span style="color: red">' . $a_error['user_name'] . '</span><br />' : '' ) ?>

   <label>E-mail *</label><br />
  <input maxlength="320" type="text" name="user_email"
         value="<?= ( isset( $a_data['user_email'] ) ? htmlspecialchars( $a_data['user_email'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['user_email'] ) ) ? '<span style="color: red">' . $a_error['user_email'] . '</span><br />' : '' ) ?>
  
  <label>Пароль *</label><br /> 
  <input type="password" name="user_password"
         value="<?= ( isset( $a_data['user_password'] ) ? htmlspecialchars( $a_data['user_password'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['user_password'] ) ) ? '<span style="color: red">' . $a_error['user_password'] . '</span><br />' : '' ) ?>

   <input type="checkbox" name="user_checkbox" value="1"<?= ( ( isset( $a_data['user_checkbox'] ) and $a_data['user_checkbox'] == 1 ) ? ' checked="checked"' : '' ) ?>/>
     <?= ( ( isset( $a_error['user_checkbox'] ) ) ? '<span style="color: red">' . $a_error['user_checkbox'] . '</span><br />' : '' ) ?>
  <label> * Я погоджуюсь з умовами використання сайту</label><br />
  
  <input type="submit" name="submit_register" value="Реєстрація" />
</form>


