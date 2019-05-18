<?php

class Foo{
    const CONST_FOO = 7;
    public $foo=1;
    public $bar=2;
   // public $baz,
           // $quz = 5;
     public $baz,
            $quz; // значення можна не признач
     public $quux;
     
     //методи це функції
     public function bat($count){
         //echo 1;
         $this -> foo= $count +10;
         echo $this -> quz();
     }
     public function quz() {
         $this -> foo+=50;
         echo Foo::CONST_FOO;//при зверненны до констант вказэмо імя класу і назву константи
     }
}

$foo = new Foo; //створили обэкт

$foo -> foo; //звернення до властивосты
$foo -> bat(); // звернення до методу 

//echo $foo -> bar;
//$foo -> bar = 333;
//echo $foo -> bar;
//
//echo '<pre>';
//print_r($foo);
//echo '<pre>';
//
//$bar = new Foo;
//
//$bar -> bar = 777;
//
//echo '<pre>';
//print_r($bar);
//echo '<pre>';
//
//
