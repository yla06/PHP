<?php
class Animal {
    protected $_voice;
    protected $_move;
    protected $_tail;
    
    public function voice(){
        echo 'Говорит: '. $this ->_voice . '<br/ >';
    }
    
    public function move(){
        echo 'Я двигаюсь: '. $this ->_move . '<br/ >';
    }
    
    public function tail(){
        echo 'У меня: '. $this ->_tail . '<br/ >';
    }
    
}

class Dog extends Animal{
    protected $_voice = 'гав';
    protected $_move = 'на 4 лапах';
    protected $_tail = true;
}

class Cat extends Animal{
    protected $_voice = 'мяв';
    protected $_move = 'на 4 лапах';
    protected $_tail = true;
}

class Duck extends Animal{
    protected $_voice = 'кряк';
    protected $_move = 'на 2 лапах';
    protected $_tail = false;
}

$dog = new Dog;
$cat = new Cat;
$duck = new Duck;

echo 'Cat:';
$cat-> voice();

echo 'Dog:';
$dog-> voice();

echo 'Duck:';
$duck-> voice();

