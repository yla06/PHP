<?php

class Foo {
    public $foo = 1;
    protected $bar = 2;
    private $baz = 3;
     
    public function getFoo() {
       echo $this -> foo;
    }
    public function getBar(){
       // if ({проверка администратора) 
            return $this -> bar;
//          else 
//            return null;
    } 
    public function setBar( $data) {
        if( is_numeric( $data) and $data >= 0 and $data <= 100)
            return $this -> bar = $data;
        else 
            return null;
    } 
    public function buy() {
        echo 'buy';
        $this -> delivery();
    }
    protected function delivery() {
        echo 'delivery';
    }
    public function getBaz() {
       echo $this -> baz;
    }
}

class B extends Foo {
    
}
$o = new Foo;

//$o -> foo;
//$o -> getFoo();

$o -> setBar(101);
echo $o -> getBar();

$o -> buy();

echo '<pre>';
print_r($o);
echo '<pre>';



