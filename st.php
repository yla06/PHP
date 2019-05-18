<?php
class Foo {
    const TEST = 1;
    
    public $bar =1;
    public static $baz = 2;
    
    public function getBar() 
    {
        return $this -> bar;
    }
    
    public function getBaz() 
    {
        Foo::TEST;
        
        return Foo::$baz;
    }
}

$o1 = new Foo;
$o1 -> bar = 5;
Foo::$baz  = 8;

echo '<pre>';
print_r($o1 -> getBar()); //5
print_r($o1 -> getBaz()); //8
echo '<pre>';



$o2 = new Foo;

echo '<pre>';
print_r($o2 -> getBar()); //1
print_r($o2 -> getBaz()); //8
echo '<pre>';


interface FooInterface
{
    
}

