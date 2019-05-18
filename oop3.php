<?php
    abstract class Animal {
    protected $_voice;
    protected $_move;
    protected $_tail;
    protected $_speed;
    
    public function voice(){
        echo 'Говорит: '. $this ->_voice . '<br/ >';
    }
    
    public function move(){
        echo 'Я двигаюсь: '. $this ->_move . '<br/ >';
    }
    
    public function tail(){
        echo 'У меня: '.(($this ->_tail) ? 'есть хвост':'нет хвоста'). '<br/ >';
    }
    public abstract function maxSpeed();
}

class Dog extends Animal{
    protected $_voice = 'гав';
    protected $_move = 'на 4 лапах';
    protected $_tail = true;
    protected $_speed = 20;
   
    public function maxSpeed(){
        echo 'Я бегаю макс 30 км';
    }
}

class Cat extends Animal{
    protected $_voice = 'мяв';
    protected $_move = 'на 4 лапах';
    protected $_tail = true;
    protected $_speed = 5;
    
    public function maxSpeed(){
        echo 'Я хожу макс 10 км';
    }
}

class Duck extends Animal{
    protected $_voice = 'кряк';
    protected $_move = 'на 2 лапах';
    protected $_tail = false;
    protected $_speed = 2;
    
    public function maxSpeed(){
        echo 'Я плаваю макс 2 км';
    }
}

$dog = new Dog;
$cat = new Cat;
$duck = new Duck;

echo 'Cat:<br />';
$cat-> voice();
$cat-> move();
$cat-> tail();
$cat-> maxSpeed();

echo '<hr />Dog:<br />';
$dog-> voice();
$dog-> move();
$dog-> tail();
$dog-> maxSpeed();

echo '<hr />Duck:<br />';
$duck-> voice();
$duck-> move();
$duck-> tail();
$duck-> maxSpeed();
