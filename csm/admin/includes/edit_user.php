<?php
if(isset($_GET['edit_user'])){
    $the_user_id = $_GET['edit_user'];
    $query = "select * from users where user_id = $the_user_id";
    $show_user_edit_query = mysqli_query($connection, $query);
    confirmQuery($show_user_edit_query);
    while ($row = mysqli_fetch_array($show_user_edit_query)){
        $user_id = $row['user_id'];
        $user_image = $row['user_image'];
        $userName = $row['userName'];
        $user_password = $row['user_password'];
        $user_firstName= $row['user_firstName'];
        $user_lastName= $row['user_lastName'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
    }
}
if(isset($_POST['create_user'])){
    $userName = $_POST['userName'];
    $user_password = $_POST['user_password'];
    $user_firstName = $_POST['user_firstName'];
    $user_lastName = $_POST['user_lastName'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $query = 'select randSalt from users';
    $select_randsalt_query = mysqli_query($connection, $query);
    if(!$select_randsalt_query){
        die("Query Failed" . mysqli_error($connection));
    }
    $row = mysqli_fetch_array($select_randsalt_query);
    $salt = $row['randSalt'];
    $hashed_password = crypt($user_password, $salt);


    move_uploaded_file($user_image_temp, "../images/$user_image");
    $query = "update users set ";
    $query .= "userName = '{$userName}', ";
    $query .= "user_password = '{$hashed_password}', ";
    $query .= "user_firstName = '{$user_firstName}', ";
    $query .= "user_lastName = '{$user_lastName}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_role = '{$user_role}' ";
    $query .= "where user_id = $the_user_id";



    $update_user_query = mysqli_query($connection, $query);
    confirmQuery($update_user_query);
}
?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="userName">Username</label>
            <input value="<?php echo $userName ?>" type="text" class="form-control" name="userName">
        </div>
        <div class="form-group">
            <label for="user_password">Password</label>
            <input value="<?php echo $user_password ?>" type="password" class="form-control" name="user_password">
        </div>
        <div class="form-group">
            <label for="user_firstName">First Name</label>
            <input value="<?php echo $user_firstName ?>" type="text" class="form-control" name="user_firstName">
        </div>
        <div class="form-group">
            <label for="user_lastName">Last Name</label>
            <input value="<?php echo $user_lastName ?>" type="text" class="form-control" name="user_lastName">
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <input value="<?php echo $user_email ?>" type="text" class="form-control" name="user_email">
        </div>
        <div class="form-group">
            <label for="user_role">Role</label>
            <select name="user_role" id="" >
                <option value="" selected>Select role</option>
                <option value="admin" <?php if($user_role === "admin") echo "selected" ?>>Admin</option>
                <option value="subscriber" <?php if($user_role === "subscriber") echo "selected" ?>>Subscriber</option>
            </select>
            <div class="form-group">
                <label for="user_image">Avatar</label>
                <input value="<?php echo $user_image ?>" type="file" name="user_image">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="create_user" value="Update user">
            </div>
    </form>
<?php
