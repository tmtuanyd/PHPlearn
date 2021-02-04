<?php include "db.php";?>
<?php include "function.php";?>
<?php
    deleteRows();
?>

<?php
include "include/header.php"
?>
<div class="container">
    <div class="col-sm-6">
        <form action="login_delete.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <select name="id" id="" class="">
                <?php
                showAllData();
                ?>
            </select>
            <input type="submit" class="btn btn-primary" name="submit" value="DELETE">
        </form>
    </div>
</div>

<?php
include "include/footer.php"
?>
