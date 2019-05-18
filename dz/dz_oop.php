<?php
require 'validate2.php';

class Int extends ValidateAbstract
{
  protected $_attr = [
    'required'  => true,
    'min' => -999,
    'max' =>  999,
  ];
 
  public function check( $data )
  {
    if ( $this -> _attr['required'] === false and $data === '' )
      return true;
 
    if ( $this -> _attr['required'] === true and $data === '' )
      return 'Вы не ввели число';
 
    if ( $data < $this -> _attr['min'] )
      return "Число маэ бути більше за {$this -> _attr['min']}";
 
    if ( $data > $this -> _attr['max'] )
      return "Число має бути менше за {$this -> _attr['max']}";
 
    return true;
  }
}

class Password extends ValidateAbstract
{
 protected $_attr = [
    'minlength' => 6,
  ];
 
  public function check( $data )
  {
    if ( ! $data )
      return 'Вы не ввели пароль';
 
    if ( ctype_digit($data) )
      return 'пароль только с чисел запрещен';
    
    if ( $data < 6 )
      return "Пароль должен быть минимум из 6 символов";
 
    return true;
  }
}

class Date extends ValidateAbstract
{
  
  public function check( $data )
  {
    //checkdate()
      if(! preg_match('#^'))
      list($year, $mongth, $day) = explode('-', $date);
      if( false === checkdate($year, $mongth, $day))
              return 'дата не существует';
 
    return true;
  }
}
class Enum extends ValidateAbstract
{
  protected $_attr = [
    'required'  => true,
    'values'    => [],
  ];
 
  public function check( $data )
  {
    if ( '' == $data and true === $this -> _attr['required'] )
      return 'Вы не выбрали данные' ;
 
    else if ( '' ==  $data and false === $this -> _attr['required'] )
      return true;
 
    if ( [] === $this -> _attr['values'] )
      return 'Ошибка разработки. Возможные значения не определены' ;
 
    if ( is_array( each( $this -> _attr['values'] )[1] ) )
    {
      $st = false;
 
      array_walk( $this -> _attr['values'], function( $value, $key ) use ( $data, &$st ) {
        if ( in_array( (string)$data, $value ) )
          $st = true;
      } );
 
      return $st ;
    }
   if ( ! in_array( (string)$data, $this -> _attr['values'] ) )
      return 'Переданный вариант списка не найден в нем.';
 
    return true;
  }
}


class Oon extends ValidateAbstract
{
  
  public function check( $data )
  {
    if ( '' == $data and true === $this -> _attr['required'] )
      return 'Вы не выбрали данные' ;
 
    else if ( '' ==  $data and false === $this -> _attr['required'] )
      return true;
    
    if( '1' !==$data)
        return 'Вы не выбрали чекбокс' ;
    
    return true;
  }
}

class Multiple extends ValidateAbstract
{
  protected $type = ValidateAbstract::TYPE_ARRAY;
 
  public function check( $data )
  {
    if ( [] == $data and true === $this -> _attr['required'] )
      return 'Вы не выбрали данные' ;
 
    else if ( [] ==  $data and false === $this -> _attr['required'] )
      return true;
    
    foreach ($data as $row)
    {
        if( is_array ($row))
            return 'Ви передали масив';
        if( ! in_array( (string)$row, $this -> _attr['values']))
            return 'Вибраних значень немаэ  в списку';
    }
    
    }
}    
//$int =new Field('int', 'int', ['max'=> 555, 'min'=> -100]);
//$email = new Field('email', 'email');

//var_dump($int -> validate( Field::METHOD_GET));

if ( isset( $_POST['submit-foo'] ) )
{
    
    $group = new Group( [
[ 'user_id',    'id' ],
        [ 'user_name',  'name' ],
[ 'user_sname', 'text', [ 'required' => false, 'maxlength' => 20 ] ],
] );
    
  //3
  if ( ! isset( $a_error['text-field'] ) )
  {
    //додаткова перевірка
    /**
     * SQL
     *
     * if ( exists )
     *   $a_error['text-field'] = 'text error';
     */
  }

  //4
  if ( $group -> isValid() )
  {
    echo 'Виконуємо дію';
    echo '<pre>';
    print_r( $a_data );
    echo '</pre>';
  }
  else
  {
    echo '<h1>В даних знайдено помилки:</h1>';

//    foreach ( $a_error as $key => $error )
//      echo "В полі {$key} знайдено помилку: {$error}<br />";
  }

  
}
?>
<form action="" method="post">
  <input  type="text" name="text"
         value="<?= ( isset( $a_data['text-field'] ) ? htmlspecialchars( $a_data['text-field'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['text-field'] ) ) ? '<span style="color: red">' . $a_error['text-field'] . '</span><br />' : '' ) ?>

  <input type="password" name="password-field" /><br />
  <?= ( ( isset( $a_error['password-field'] ) ) ? '<span style="color: red">' . $a_error['password-field'] . '</span><br />' : '' ) ?>
  
  <input  type="text" name="date"
         value="<?= ( isset( $a_data['text-field'] ) ? htmlspecialchars( $a_data['text-field'] ) : '' ) ?>" /><br />
  <?= ( ( isset( $a_error['text-field'] ) ) ? '<span style="color: red">' . $a_error['text-field'] . '</span><br />' : '' ) ?>

  <input type="checkbox" name="checkbox-field" value="1"<?= ( ( isset( $a_data['checkbox-field'] ) and $a_data['checkbox-field'] == 1 ) ? ' checked="checked"' : '' ) ?>/><br />
  <?= ( ( isset( $a_error['checkbox-field'] ) ) ? '<span style="color: red">' . $a_error['checkbox-field'] . '</span><br />' : '' ) ?>

  <input type="radio" name="radio-field" value="1" <?= ( ( isset( $a_data['radio-field'] ) and $a_data['radio-field'] == 1 ) ? ' checked="checked"' : '' ) ?>/><br />
  <input type="radio" name="radio-field" value="2" <?= ( ( isset( $a_data['radio-field'] ) and $a_data['radio-field'] == 2 ) ? ' checked="checked"' : '' ) ?>/><br />
  <?= ( ( isset( $a_error['radio-field'] ) ) ? '<span style="color: red">' . $a_error['radio-field'] . '</span><br />' : '' ) ?>

  <input type="hidden" name="hidden-field" value="yes,sir" /><br />

  <select name="select">
    <option></option>
    <option value="v1"<?= ( ( isset( $a_data['select'] ) and $a_data['select'] == 'v1' ) ? ' selected="selected"' : '' ) ?>>v1</option>
    <option value="v2"<?= ( ( isset( $a_data['select'] ) and $a_data['select'] == 'v2' ) ? ' selected="selected"' : '' ) ?>>v2</option>
    <option value="v3"<?= ( ( isset( $a_data['select'] ) and $a_data['select'] == 'v3' ) ? ' selected="selected"' : '' ) ?>>v3</option>
  </select><br />
  <?= ( ( isset( $a_error['select'] ) ) ? '<span style="color: red">' . $a_error['select'] . '</span><br />' : '' ) ?>

  <select name="selectm[]" multiple="multiple">
    <option value="v11"<?= ( ( isset( $a_data['selectm'] ) and in_array( 'v11', $a_data['selectm'] ) ) ? ' selected="selected"' : '' ) ?>>v11</option>
    <option value="v12"<?= ( ( isset( $a_data['selectm'] ) and in_array( 'v12', $a_data['selectm'] ) ) ? ' selected="selected"' : '' ) ?>>v12</option>
    <option value="v13"<?= ( ( isset( $a_data['selectm'] ) and in_array( 'v13', $a_data['selectm'] ) ) ? ' selected="selected"' : '' ) ?>>v13</option>
  </select><br />
  <?= ( ( isset( $a_error['selectm'] ) ) ? '<span style="color: red">' . $a_error['selectm'] . '</span><br />' : '' ) ?>

  <textarea name="textarea"><?= ( isset( $a_data['textarea'] ) ? htmlspecialchars( $a_data['textarea'] ) : '' ) ?></textarea><br />
  <?= ( ( isset( $a_error['textarea'] ) ) ? '<span style="color: red">' . $a_error['textarea'] . '</span><br />' : '' ) ?>

  <input type="submit" name="submit-foo" value="SEND" />
</form>

