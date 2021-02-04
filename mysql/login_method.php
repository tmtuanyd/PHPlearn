<?php
if(isset($_POST["submit"])){
    $userName = $_POST["username"];
    $password = $_POST["password"];

    $connection = mysqli_connect('localhost','root',"",'loginapp');
    if($connection) echo "we connect database";
    else die("database connect failed");
    if($userName && $password){
        $query = "INSERT INTO user(username, password) ";
        $query .= "VALUES ('$userName', '$password')";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("query failed" . mysqli_error());
        }
    }
    else echo "this field can not be blank";

}
?>
