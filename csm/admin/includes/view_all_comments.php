<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Content</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response to</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Action</th>
        <?php
        if(isset($_GET['approve'])){
            $the_comment_id = $_GET['approve'];
            $query = "UPDATE comments set comment_status = 'approve' where comment_id=$the_comment_id";
            $approve_query = mysqli_query($connection, $query);
            confirmQuery($approve_query);
        }
        if(isset($_GET['unapprove'])){
            $the_comment_id = $_GET['unapprove'];
            $query = "UPDATE comments set comment_status = 'unapprove' where comment_id=$the_comment_id";
            $unapprove_query = mysqli_query($connection, $query);
            confirmQuery($unapprove_query);
        }
        if(isset($_GET['delete'])){
            $the_comment_id = $_GET['delete'];
            $query = "DELETE from comments where comment_id = $the_comment_id";
            $delete_query = mysqli_query($connection, $query);
            confirmQuery($delete_query);
        }
        ?>
    </tr>
    <tbody>
    <?php
    $query = "SELECT * FROM comments";
    $select_comment_admin = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_comment_admin)){
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_date = $row['comment_date'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_email = $row['comment_email'];

        echo "<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_content</td>";
        echo "<td>$comment_email</td>";
        echo "<td>$comment_status</td>";
        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $post_relate = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($post_relate)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
        }
        echo "<td><a href='../post.php?post_id=$post_id'>$post_title</a></td>";
        echo "<td>$comment_date</td>";
        echo "<td>
                <a href='comment.php?approve=$comment_id'>Approve</a>
              </td>";
        echo "<td>
                <a href='comment.php?unapprove=$comment_id'>Unapprove</a>
              </td>";
        echo "<td>
                <a href='comment.php?delete=$comment_id'>Delete</a>
                <a href='#'>Edit</a>
              </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
    </thead>
</table>