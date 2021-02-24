<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Content</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comment</th>
        <th>Date</th>
        <th>Action</th>
        <?php
        if(isset($_GET['delete'])){
            $the_post_id = $_GET['delete'];
            $query = "DELETE from posts where post_id = $the_post_id";
            $delete_query = mysqli_query($connection, $query);
            confirmQuery($delete_query);
            $query = "delete from comments where comment_post_id = $the_post_id";
            $delete_comment = mysqli_query($connection, $query);
            confirmQuery($delete_comment);
        }
        ?>
    </tr>
    <tbody>
    <?php
    $query = "SELECT * FROM posts";
    $select_post_admin = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_post_admin)){
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tag = $row['post_tag'];
        $post_status = $row['post_status'];
        $post_comment_count = $row['post_comment_count'];

        echo "<tr>";
        echo "<td>$post_id</td>";
        echo "<td>$post_author</td>";
        echo "<td>$post_title</td>";
        echo "<td>$post_content</td>";
        $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
        $select_categories_id = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
        }
        echo "<td>$cat_title</td>";
        echo "<td>$post_status</td>";
        echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
        echo "<td>$post_tag</td>";
        echo "<td>$post_comment_count</td>";
        echo "<td>$post_date</td>";
        echo "<td>
                <a href='post.php?delete=$post_id'>Delete</a>
                <a href='post.php?source=edit_post&post_id=$post_id'>Edit</a>
              </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
    </thead>
</table>