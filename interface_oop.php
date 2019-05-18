<?php

interface FooInterface
{
    const TEST = 1;
    
    public function getFoo( );
    public function setFoo( $data );
    public function change();
}

abstract class FooAbstract implements FooInterface
{
   protected $_data;
    
   public function getFoo( )
    {
       return $this -> _data; 
    }        
    public function setFoo( $data )
    {
        $this -> _data = $data;
    }         
}
     
class Plus extends FooAbstract
{
    public function change()
    {
        $this -> _data +=50;
    }
}

class Minus extends FooAbstract
{
    public function change()
    {
        $this -> _data +=47;
    }
}


$o = new Plus();
$o -> setFoo( 41 );
$o ->change();
echo $o ->getFoo();




