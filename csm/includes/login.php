<?php include "db.php"; ?>
<?php session_start(); ?>
<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * from users WHERE userName = '$username' ";
    $select_user_query = mysqli_query($connection, $query);
    if(!$select_user_query) {
        die("Query failed" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_array($select_user_query)){
       $db_user_id = $row['user_id'];
       $db_user_userName = $row['userName'];
       $db_user_password = $row['user_password'];
       $db_user_firstName = $row['user_firstName'];
       $db_user_lastName = $row['user_lastName'];
       $db_user_role = $row['user_role'];
    }
    if($username === $db_user_userName && $password === $db_user_password){
        $_SESSION['username'] = $db_user_userName;
        $_SESSION['firstName'] = $db_user_firstName;
        $_SESSION['lastName'] = $db_user_lastName;
        $_SESSION['role'] = $db_user_role;
        header('Location:../admin');
    } else {
        header('Location:../index.php');
    }
}
?>