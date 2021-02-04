<?php include "db.php";
function showAllData(){
    global $connection;
    $query = "SELECT * FROM user";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('query failed' . mysqli_error());
    }
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}


function updateTable(){
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $query = "UPDATE user SET ";
    $query .= "username='$username', ";
    $query .= "password='$password' ";
    $query .= "WHERE id=$id ";
    $result = mysqli_query($connection, $query);
    if (!$result) die("QUERY FAILD" . mysqli_error($connection));
}
?>