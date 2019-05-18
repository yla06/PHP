<?php
abstract class ValidateAbstract{
    public abstract function check($data);
}

class Id extends ValidateAbstract{
    public function check($data)
    {
        if( ! $data )
            return 'Ви не передали ID';
        if( ! ctype_dagat( $data))
            return 'Ви передали ID которий не есть числом';
        if( $data > 4294967295)
            return 'ID слишком большой';
        return true;
    }
}
class Name extends ValidateAbstract{
    public function check($data)
    {
        if( ! $data )
            return 'Ви не передали имя';
        if(mb_strlen( $data) > 20)
            return 'Имя не должно бить больше 20 символов';
        
        return true;
    }
}
class Field {
    protected $name, $validate;
    protected $_data;
    /**
     *
     * @var string єто контейнер для записи текста ошибок прив алидации даних филда
     */
    protected $_error;
    public final function __construct( $name, $validate ) {
        $this -> _name     = $name;
        $this -> _validate = $validate;
    }
    public function getDada(){
        return $this -> _data;
    }
    public function getError(){
        return $this -> _error;
    }
    public function validate(){
        $this -> getDataMethod();
        $valid = new $this -> _validate;
        $status = $valid -> check( $this -> _data);
        
        if( is_string($status))
        {    
           $this -> _error = $status;
           return false;
        }
        else 
           return true;
    }
    protected function getDataMethod(){
        $this -> _data = (isset($_GET[$this -> _name]) and is_string( $_GET[$this -> name]))
        ? trim( $_GET[$this -> _name]) : '';
    }
}
$user_id = new Field('user_id', 'id');
$user_name = new Field('user_name', 'name');

echo '<pre>';
print_r($user_id);
echo '<pre>';

echo '<pre>';
print_r($user_name);
echo '<pre>';

