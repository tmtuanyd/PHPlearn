<?php
class Car
{
    static $wheels = 4;
    static function ShowProperty(){
        static::$wheels = 10;
    }
}
//$bmw = new Car();

//$bmw->wheels;
//$bmw->ShowProperty();
Car::ShowProperty();
echo Car::$wheels;

?>