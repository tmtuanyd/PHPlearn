<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Avatar</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>

        <?php
        if(isset($_GET['change_to_admin'])){
            $the_user_id = $_GET['change_to_admin'];
            $query = "UPDATE users set user_role = 'admin' where user_id=$the_user_id";
            $change_admin_query = mysqli_query($connection, $query);
            confirmQuery($change_admin_query);
            header("Location: user.php");
        }
        if(isset($_GET['change_to_sub'])){
            $the_user_id = $_GET['change_to_sub'];
            $query = "UPDATE users set user_role = 'subscriber' where user_id=$the_user_id";
            $change_sub_query = mysqli_query($connection, $query);
            confirmQuery($change_sub_query);
            header("Location: user.php");
        }
        if(isset($_GET['delete'])){
            $the_user_id = $_GET['delete'];
            $query = "DELETE from users where user_id = $the_user_id";
            $delete_user_query = mysqli_query($connection, $query);
            confirmQuery($delete_user_query);
            header("Location: user.php");
        }
        ?>
    </tr>
    <tbody>
    <?php
    $query = "SELECT * FROM users";
    $select_user_admin = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_user_admin)){
        $user_id = $row['user_id'];
        $user_image = $row['user_image'];
        $userName = $row['userName'];
        $user_firstName= $row['user_firstName'];
        $user_lastName= $row['user_lastName'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];

        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td><img width='100' src='../images/$user_image' alt='image'></td>";
        echo "<td>$userName</td>";
        echo "<td>$user_firstName</td>";
        echo "<td>$user_lastName</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_role</td>";

        echo "<td>
                <a href='user.php?change_to_admin=$user_id'>Admin</a>
                <a href='user.php?change_to_sub=$user_id'>Subcriber</a>
                <a href='user.php?delete=$user_id'>Delete</a>
              </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
    </thead>
</table>