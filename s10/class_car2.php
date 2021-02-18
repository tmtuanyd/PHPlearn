<?php
class Car {
    function MoveWheels(){
        echo "Wheels move";
    }
}
if(method_exists("car","MoveWheels")){
    echo "we have a method in car";
} else echo "no";
?>
