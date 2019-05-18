<?php

if ( isset( $_POST['submit-registr'] ) )
{
  $a_data = $a_error = [ ];

  $a_data['registr-email'] = ( isset( $_POST['registr-email'] ) and is_string( $_POST['registr-email'] ) )
    ? trim( $_POST['registr-email'] ) : '';
 
  $a_data['registr-password'] = ( isset( $_POST['registr-password'] ) and is_string( $_POST['registr-password'] ) )
    ? trim($_POST['registr-password']) : '';

  $a_data['registr-checkbox1'] = ( isset( $_POST['registr-checkbox1'] ) ) ? 1 : 0;
  
  $a_data['registr-checkbox2'] = ( isset( $_POST['registr-checkbox2'] ) ) ? 2 : 0;

  //2
  if ( '' == $a_data['registr-email'] )
    $a_error['registr-email'] = 'Дані не введено';

  else if ( !filter_var($a_data['registr-email'], FILTER_VALIDATE_EMAIL) )
    $a_error['registr-email'] = 'Емейл введено не коректно';


  if ( '' == $a_data['registr-password'] )
    $a_error['registr-password'] = 'Дані не введено';

  else if ( is_numeric( $a_data['registr-password'] ) )
    $a_error['registr-password'] = 'Пароль не може бути числом';

  else if ( mb_strlen( $a_data['registr-password'] ) < 5 )
    $a_error['registr-password'] = 'Пароль має бути більше 5 символів';

  if ( 0 === $a_data['registr-checkbox2'] )
    $a_error['registr-checkbox2'] = 'Чекбокс потрібно вибрати';

  //4
  if ( ! $a_error )
  {
    echo 'Виконуємо реєстрацію';
  }
  else
  {
    echo '<h1>В даних знайдено помилки:</h1>';
  }
}


if ( isset( $_POST['submit-authoriz'] ) )
{
  $a_data = $a_error = [ ];

  $a_data['authoriz-email'] = ( isset( $_POST['authoriz-email'] ) and is_string( $_POST['authoriz-email'] ) )
    ? trim( $_POST['authoriz-email'] ) : '';
 
  $a_data['authoriz-password'] = ( isset( $_POST['authoriz-password'] ) and is_string( $_POST['authoriz-password'] ) )
    ? trim($_POST['authoriz-password']) : '';

  //2
  if ( '' == $a_data['authoriz-email'] )
    $a_error['authoriz-email'] = 'Дані не введено';

  else if ( !filter_var($a_data['authoriz-email'], FILTER_VALIDATE_EMAIL) )
    $a_error['authoriz-email'] = 'Емейл введено не коректно';


  if ( '' == $a_data['authoriz-password'] )
    $a_error['authoriz-password'] = 'Дані не введено';

  else if ( is_numeric( $a_data['authoriz-password'] ) )
    $a_error['authoriz-password'] = 'Пароль не може бути числом';

  else if ( mb_strlen( $a_data['authoriz-password'] ) < 5 )
    $a_error['authoriz-password'] = 'Пароль має бути більше 5 символів';
  //4
  if ( ! $a_error )
  {
    echo 'Виконуємо авторизацію';
  }
  else
  {
    echo '<h1>В даних знайдено помилки:</h1>';
  }
}

if ( isset( $_GET['submit-search'] ) )
{
  $a_data = $a_error = [ ];

  $a_data['text-search'] = ( isset( $_GET['text-search'] ) and is_string( $_GET['text-search'] ) )
    ? trim($_GET['text-search']) : '';
  
  $a_data['select-search'] = ( isset( $_GET['select-search'] ) and is_string( $_GET['select-search'] ) )
    ? trim($_GET['select-search']) : '';

  $a_data['selectm-search'] = ( isset( $_GET['selectm-search'] ) and is_array( $_GET['selectm-search'] ) )
    ? $_GET['selectm-search'] : [];

  //2
  if ( '' == $a_data['text-search'] )
    $a_error['text-search'] = 'Дані не введено';

  else if ( mb_strlen( $a_data['text-search'] ) > 20 )
    $a_error['text-search'] = 'Строка перевищуэ 20 символів';
  
}

if ( isset( $_POST['submit-order'] ) )
{
  $a_data = $a_error = [ ];

  $a_data['select-order'] = ( isset( $_POST['select-order'] ) and is_string( $_POST['select-order'] ) )
    ? trim($_POST['select-order']) : '';
  
  $a_data['select-delivery'] = ( isset( $_POST['select-delivery'] ) and is_string( $_POST['select-delivery'] ) )
    ? trim($_POST['select-delivery']) : '';

  $a_data['text-order'] = ( isset( $_POST['text-order'] ) and is_string( $_POST['text-order'] ) )
    ? trim($_POST['text-order']) : '';
  
  $a_data['select-phone'] = ( isset( $_POST['select-phone'] ) and is_string( $_POST['select-phone'] ) )
    ? trim($_POST['select-phone']) : '';
  
  $a_data['text-phone'] = ( isset( $_POST['text-phone'] ) and is_string( $_POST['text-phone'] ) )
    ? trim( $_POST['text-phone'] ) : '';
  
  $a_data['text-date'] = ( isset( $_POST['text-date'] ) and is_string( $_POST['text-date'] ) )
    ? trim( $_POST['text-date'] ) : '';
  //2
  if ( ! in_array( $a_data['select-order'], [ 'Луцьк', 'Ківерці', 'Маневичі' ] ) )
    $a_error['select-order'] = 'Виберіть значення зі списку';

  if ( ! in_array( $a_data['select-delivery'], [ "Самостійний забір", "Кур'єром" ] ) )
    $a_error['select-delivery'] = 'Виберіть значення зі списку';
  
  if ( mb_strlen( $a_data['text-order'] ) > 1000 )
    $a_error['text-order'] = 'Строка перевищуэ 1000 символів';
  
  if ( ! in_array( $a_data['select-phone'], [ '095', '066', '097', '093', '063' ] ) )
    $a_error['select-phone'] = 'Виберіть значення зі списку';

  if ( '' == $a_data['text-phone'] )
    $a_error['text-phone'] = 'Дані не введено';

  else if ( ! is_numeric( $a_data['text-phone'] ) )
    $a_error['text-phone'] = 'Номер телефону містить лише цифри';
  
  else if ( mb_strlen( $a_data['text-phone'] ) != 7 )
    $a_error['text-phone'] = 'Номер телефону складається з 7 символів';
  
  if ( '' == $a_data['text-date'] )
    $a_error['text-date'] = 'Дані не введено';
  
  else if ( mb_strlen( $a_data['text-date'] ) != 10)
    $a_error['text-date'] = 'Дата повинна містити 10 символів';
  
  else {
      explode(".", $a_data['text-date'], 3);
      echo '<pre>';
      print_r($a_data['text-date']);
      echo '<pre>';
  }
  
  //4
  if ( ! $a_error )
  {
    echo 'Оформляємо замовлення';
  }
  else
  {
    echo '<h1>В даних знайдено помилки:</h1>';
  }
}


?>
<form action="" method="post">
    
    <label>Введіть свій e-mail адрес</label><br />
  <input maxlength="320" type="text" name="registr-email"
         value="<?= ( isset( $a_data['registr-email'] ) ? htmlspecialchars( $a_data['registr-email'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['registr-email'] ) ) ? '<span style="color: red">' . $a_error['registr-email'] . '</span><br />' : '' ) ?>

  <label>Введіть свій пароль</label><br />
  <input type="password" name="registr-password" /><br />
  <?= ( ( isset( $a_error['registr-password'] ) ) ? '<span style="color: red">' . $a_error['registr-password'] . '</span><br />' : '' ) ?>

  <input type="checkbox" name="registr-checkbox1" value="1"<?= ( ( isset( $a_data['registr-checkbox1'] ) and $a_data['registr-checkbox1'] == 1 ) ? ' checked="checked"' : '' ) ?>/>
  <label>Запам'ятати мене</label><br />
  
  <input type="checkbox" name="registr-checkbox2" value="2"<?= ( ( isset( $a_data['registr-checkbox2'] ) and $a_data['registr-checkbox2'] == 2 ) ? ' checked="checked"' : '' ) ?>/>
  <?= ( ( isset( $a_error['registr-checkbox2'] ) ) ? '<span style="color: red">' . $a_error['registr-checkbox2'] . '</span><br />' : '' ) ?>
  <label>Згідний з умовами сервісу</label><br />
  
  <input type="submit" name="submit-registr" value="ЗАРЕЄСТРУВАТИСЯ" /><br /><br /><br />
</form>


<form action="" method="post">
    
    <label>Введіть свій e-mail адрес</label><br />
  <input maxlength="320" type="text" name="authoriz-email"
         value="<?= ( isset( $a_data['authoriz-email'] ) ? htmlspecialchars( $a_data['authoriz-email'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['authoriz-email'] ) ) ? '<span style="color: red">' . $a_error['authoriz-email'] . '</span><br />' : '' ) ?>

  <label>Введіть свій пароль</label><br />
  <input type="password" name="authoriz-password" /><br />
  <?= ( ( isset( $a_error['authoriz-password'] ) ) ? '<span style="color: red">' . $a_error['authoriz-password'] . '</span><br />' : '' ) ?>
  
  <input type="submit" name="submit-authoriz" value="Авторизуватись" /><br /><br /><br />
</form>

<form action="" method="get">
    
  <textarea name="text-search"><?= ( isset( $a_data['text-search'] ) ? htmlspecialchars( $a_data['text-search'] ) : '' ) ?></textarea><br /><br />
  <?= ( ( isset( $a_error['text-search'] ) ) ? '<span style="color: red">' . $a_error['text-search'] . '</span><br />' : '' ) ?>
  
  <select name="select-search">
    <option></option>
    <option value="product"<?= ( ( isset( $a_data['select-search'] ) and $a_data['select-search'] == 'product' ) ? ' selected="selected"' : '' ) ?>>product</option>
    <option value="blog"<?= ( ( isset( $a_data['select-search'] ) and $a_data['select-search'] == 'blog' ) ? ' selected="selected"' : '' ) ?>>blog</option>
    <option value="forum"<?= ( ( isset( $a_data['select-search'] ) and $a_data['select-search'] == 'forum' ) ? ' selected="selected"' : '' ) ?>>forum</option>
  </select><br /><br />
  <?= ( ( isset( $a_error['select-search'] ) ) ? '<span style="color: red">' . $a_error['select-search'] . '</span><br />' : '' ) ?>
  
  <select name="selectm-search" multiple="multiple">
    <option value="title"<?= ( ( isset( $a_data['selectm-search'] ) and in_array( 'title', $a_data['selectm-search'] ) ) ? ' selected="selected"' : '' ) ?>>title</option>
    <option value="description"<?= ( ( isset( $a_data['selectm-search'] ) and in_array( 'description', $a_data['selectm-search'] ) ) ? ' selected="selected"' : '' ) ?>>description</option>
    <option value="author"<?= ( ( isset( $a_data['selectm-search'] ) and in_array( 'author', $a_data['selectm-search'] ) ) ? ' selected="selected"' : '' ) ?>>author</option>
  </select><br />
  <?= ( ( isset( $a_error['selectm-search'] ) ) ? '<span style="color: red">' . $a_error['selectm-search'] . '</span><br />' : '' ) ?>
  
  <input type="submit" name="submit-search" value="Пошук" />
</form>

<?php 

if ( ! $a_error and in_array( $a_data['select-search'], [ 'product','blog','forum' ] ) and in_array( $a_data['selectm-search'], [ 'title', 'description', 'author'] ))
  {
      echo 'Ви шукаєте '.$a_data['text-search'].' в розділі: '.$a_data['select-search'].' пошук здійснюється по полям: '.$a_data['selectm-search'];
  }
  
  else if ( ! $a_error and in_array( $a_data['select-search'], [ 'product','blog','forum' ] ))
  {
      echo 'Ви шукаєте '.$a_data['text-search'].' в розділі: '.$a_data['select-search'];
  }
   else if (! $a_error) {
       echo 'Ви шукаєте '.$a_data['text-search'];
   }
?>

<form action="" method="post">
    
    <label>Виберіть населений пункт</label><br />
  <select name="select-order">
    <option></option>
    <option value="Луцьк"<?= ( ( isset( $a_data['select-order'] ) and $a_data['select-order'] == 'Луцьк' ) ? ' selected="selected"' : '' ) ?>>Луцьк</option>
    <option value="Ківерці"<?= ( ( isset( $a_data['select-order'] ) and $a_data['select-order'] == 'Ківерці' ) ? ' selected="selected"' : '' ) ?>>Ківерці</option>
    <option value="Маневичі"<?= ( ( isset( $a_data['select-order'] ) and $a_data['select-order'] == 'Маневичі' ) ? ' selected="selected"' : '' ) ?>>Маневичі</option>
  </select><br /><br />
  <?= ( ( isset( $a_error['select-order'] ) ) ? '<span style="color: red">' . $a_error['select-order'] . '</span><br />' : '' ) ?>

  <label>Виберіть спосіб доставки</label><br />
  <select name="select-delivery">
    <option></option>
    <option value="Самостійний забір"<?= ( ( isset( $a_data['select-delivery'] ) and $a_data['select-delivery'] == 'Самостійний забір' ) ? ' selected="selected"' : '' ) ?>>Самостійний забір</option>
    <option value="Кур'єром"<?= ( ( isset( $a_data['select-delivery'] ) and $a_data['select-delivery'] == 'Кур\'єром' ) ? ' selected="selected"' : '' ) ?>>Кур'єром</option>
  </select><br /><br />
  <?= ( ( isset( $a_error['select-delivery'] ) ) ? '<span style="color: red">' . $a_error['select-delivery'] . '</span><br />' : '' ) ?>
  
  <label>Введіть коментар</label><br />
  <textarea name="text-order"><?= ( isset( $a_data['text-order'] ) ? htmlspecialchars( $a_data['text-order'] ) : '' ) ?></textarea><br />
  <?= ( ( isset( $a_error['text-order'] ) ) ? '<span style="color: red">' . $a_error['text-order'] . '</span><br />' : '' ) ?>
 
  <label>Виберіть оператор</label><br />
  <select name="select-phone">
    <option></option>
    <option value="095"<?= ( ( isset( $a_data['select-phone'] ) and $a_data['select-phone'] == '095' ) ? ' selected="selected"' : '' ) ?>>095</option>
    <option value="066"<?= ( ( isset( $a_data['select-phone'] ) and $a_data['select-phone'] == '066' ) ? ' selected="selected"' : '' ) ?>>066</option>
    <option value="097"<?= ( ( isset( $a_data['select-phone'] ) and $a_data['select-phone'] == '097' ) ? ' selected="selected"' : '' ) ?>>097</option>
    <option value="093"<?= ( ( isset( $a_data['select-phone'] ) and $a_data['select-phone'] == '093' ) ? ' selected="selected"' : '' ) ?>>093</option>
    <option value="063"<?= ( ( isset( $a_data['select-phone'] ) and $a_data['select-phone'] == '063' ) ? ' selected="selected"' : '' ) ?>>0693</option>
  </select><br /><br />
  <?= ( ( isset( $a_error['select-phone'] ) ) ? '<span style="color: red">' . $a_error['select-phone'] . '</span><br />' : '' ) ?>
  
  <label>Введіть номер телефону</label><br />
  <input maxlength="7" type="text" name="text-phone"
         value="<?= ( isset( $a_data['text-phone'] ) ? htmlspecialchars( $a_data['text-phone'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['text-phone'] ) ) ? '<span style="color: red">' . $a_error['text-phone'] . '</span><br />' : '' ) ?>
  
  <label>Введіть дату доставки у форматі DD.MM.YYYY.</label><br />
  <input maxlength="10" type="text" name="text-date"
         value="<?= ( isset( $a_data['text-date'] ) ? htmlspecialchars( $a_data['text-date'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['text-date'] ) ) ? '<span style="color: red">' . $a_error['text-date'] . '</span><br />' : '' ) ?>
  
  
  <br /><br /><br />
</form>



/*
$now='21.06.2017';
$yest='20.06.2017';

var_dump($now>$yest);

*/
