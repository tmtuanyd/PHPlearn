<?php
class class_car3
{
    var $wheels = 4;
    var $hood = 1;
    var $engine = 1;
    var $doors = 4;
    function MoveWheels(){
        $this->wheels = 10;
    }
    function createDoor(){
        $this->doors = 6;
    }
}
$bmw = new class_car3();
$truck = new class_car3();
$bmw->MoveWheels();
//$bmw->wheels = 8;
echo $bmw->wheels;
echo $truck->wheels = 8;
$truck->createDoor();
echo $truck->doors
?>