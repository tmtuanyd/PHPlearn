<?php
if(isset($_POST['add_user'])){
    $userName = $_POST['userName'];
    $user_password = $_POST['user_password'];
    $user_firstName = $_POST['user_firstName'];
    $user_lastName = $_POST['user_lastName'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];


    move_uploaded_file($user_image_temp, "../images/$user_image");
    $query = "INSERT INTO users(userName, user_password, user_firstName, user_lastName, user_email, user_role, user_image) ";
    $query .= "VALUES('{$userName}', '{$user_password}', '{$user_firstName}', '{$user_lastName}', '{$user_email}', '{$user_role}', '{$user_image}') ";

    $create_user_query = mysqli_query($connection, $query);
    confirmQuery($create_user_query);
    echo "User Created: " . " " . "<a href='user.php'>View users</a>";
}
?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="userName">userName</label>
            <input type="text" class="form-control" name="userName">
        </div>
        <div class="form-group">
            <label for="user_password">Password</label>
            <input type="text" class="form-control" name="user_password">
        </div>
        <div class="form-group">
            <label for="user_firstName">First Name</label>
            <input type="text" class="form-control" name="user_firstName">
        </div>
        <div class="form-group">
            <label for="user_lastName">Last Name</label>
            <input type="text" class="form-control" name="user_lastName">
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <input type="text" class="form-control" name="user_email">
        </div>
        <div class="form-group">
            <select name="user_role" id="">
                <option value="" selected>Select role</option>
                <option value="admin">Admin</option>
                <option value="subscriber">Subscriber</option>
            </select>
            <div class="form-group">
                <label for="user_image">Avatar</label>
                <input type="file" name="user_image">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="add_user" value="Add user">
            </div>
    </form>
<?php
