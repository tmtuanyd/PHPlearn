<?php
class Car
{
    public $wheels = 4;
    protected $hood = 1;
    private $engine = 10;
    var $doors = 4;
    function showProperty(){
        echo $this->engine;
    }
}
$bmw = new Car();

$bmw->showProperty();
$semi = new Semi();
class Semi extends Car{
    function showProperty(){
        echo $this->hood;
    }
}
$semi->showProperty()
?>