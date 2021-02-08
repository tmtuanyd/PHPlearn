<?php include "db.php";
if(isset($_POST["submit"])){
    $userName = $_POST["username"];
    $password = $_POST["password"];
    $userName = mysqli_real_escape_string($connection, $userName);
    $password = mysqli_real_escape_string($connection,$password);
    $hashFormat = "$2y$05$";
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hashFormat . $salt;
    $password = crypt($password, $hashF_and_salt);
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
