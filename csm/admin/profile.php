<?php ob_start(); ?>
<?php include "includes/admin_header.php" ?>
<?php
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $query = "select * from users where userName = '$username'";
    $select_user_profile_query = mysqli_query($connection, $query);
    confirmQuery($select_user_profile_query);
    while ($row = mysqli_fetch_array($select_user_profile_query)){
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
if(isset($_POST['update_profile'])){
    $userName = $_POST['userName'];
    $user_password = $_POST['user_password'];
    $user_firstName = $_POST['user_firstName'];
    $user_lastName = $_POST['user_lastName'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];


    $query = "update users set ";
    $query .= "userName = '{$userName}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_firstName = '{$user_firstName}', ";
    $query .= "user_lastName = '{$user_lastName}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_role = '{$user_role}' ";
    $query .= "where user_id = $user_id ";



    $update_profile_user_query = mysqli_query($connection, $query);
    confirmQuery($update_profile_user_query);
}
?>


<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        WELCOME to admin
                        <small>
                            <?php
                            if(isset($_SESSION['username'])){
                                echo $_SESSION['username'];
                            }
                            ?>
                        </small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
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
                    <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
                </div>
        </form>

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "includes/admin_footer.php" ?>

