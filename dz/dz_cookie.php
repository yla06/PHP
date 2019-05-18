<?php

echo '<h1 style="text-align:center">'.'Гра "Вгадай число" '.'</h1>';

$random=rand(1, 100);

if (! isset( $_COOKIE[ 'rand' ] ) ) {
        setcookie('rand', $random);
    }

echo '<pre>';
print_r( $_COOKIE );
echo '</pre>';
//exit;  
//header('Location: http://st411.phpstep.com.ua/dz/dz_cookie.php/');

if ( isset( $_POST['submit-number'] ) )
{
  $a_data = $a_error = [ ];
  
  $a_data['number'] = ( isset( $_POST['number'] ) and is_string( $_POST['number'] ) )
    ? trim( $_POST['number'] ) : '';
  
  if ( '' == $a_data['number'] )
    $a_error['number'] = 'Введіть число';

  else if ( ! is_numeric( $a_data['number'] ) )
    $a_error['number'] = 'Число містить лише цифри';
  
  else if ( $a_data['number'] > 100 or $a_data['number'] < 1 )
    $a_error['number'] = 'Число міститься в діапазоні від 1 до 100';
  
  if ( ! $a_error )
  {
    if( $a_data['number'] > $_COOKIE[ 'rand' ] ) echo '<h1 style="color: blue">'.'Ви ввели завелике число'.'</h1>';
        else if($a_data['number'] < $_COOKIE[ 'rand' ]) echo '<h1 style="color: blue">'.'Ви ввели замале число'.'</h1>';
         else if ($a_data['number'] == $_COOKIE[ 'rand' ]) {
             echo '<h1 style="color: green">'.'Вітаємо, ви відгадали число'.'</h1>';
             $random=rand(1, 100);
             setcookie('rand', $random);
         }
  }
  else
  {
    echo '<h1>В даних знайдено помилки:</h1>';
  }
} 

?>


<form action="" method="post">
<label>Введіть число від 1 до 100.</label><br />
  <input maxlength="3" type="text" name="number"
         value="<?= ( isset( $a_data['number'] ) ? htmlspecialchars( $a_data['number'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['number'] ) ) ? '<span style="color: red">' . $a_error['number'] . '</span><br />' : '' ) ?>
  
  <input type="submit" name="submit-number" value="OK" />
</form>


