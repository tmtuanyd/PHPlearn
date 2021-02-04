<?php
if(isset($_POST['test'])){
    $name = array("tuan", "hue", "ha", "thu");
    $minimum =5;
    $maximum =10;
    $userName = $_POST['username'];
    $password = $_POST['password'];
    if(in_array($userName, $name))
        echo "sorry you are not allowed";
    else if(strlen($userName) < $minimum)
        echo "username has to be longer than 5";
    else if(strlen($userName)>$maximum)
        echo "username has to be smaller than $maximum";
    else echo "welcome";
}
?>