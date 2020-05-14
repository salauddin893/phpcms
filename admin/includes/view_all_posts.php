
<?php

if(isset($_POST['checkboxarray'])) {
    $check_array = $_POST['checkboxarray'];

    foreach($check_array as $chaceboxvalue) {
        $checkbox_select = $_POST['chechboxselect'];

        switch($checkbox_select) {
            case 'draft':
                $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = '$chaceboxvalue' ";
                $updata_post_draft = mysqli_query($connection, $query);
            break;
            case 'publish': 
                $query = "UPDATE posts SET post_status = 'publish' WHERE post_id = '$chaceboxvalue' ";
                $updata_post_publish = mysqli_query($connection, $query);
            break;
            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = '$chaceboxvalue' ";
                $delete_post = mysqli_query($connection, $query);
            break;
        }
    }
}

?>


<form action="" method="post">
<div id="blucOptionContainer" class="col-xs-4">
    <select class="form-control" name="chechboxselect" id="">
        <option value="">select</option>
        <option value="draft">draft</option>
        <option value="publish">publish</option>
        <option value="delete">delete</option>
    </select>
</div>
<input class="btn btn-success" type="submit" name="submit" value="Apply">
<a class="btn btn-primary" href="posts.php?sourse=add_post">Add New</a>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>View post</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
                $query = "SELECT * FROM posts ORDER BY post_id DESC ";
                $all_posts = mysqli_query($connection, $query);
            
                while($row = mysqli_fetch_assoc($all_posts)) {
                    $post_id = $row['post_id'];
                    $author = $row['post_author'];
                    $title = $row['post_title'];
                    $category = $row['post_cat_id'];
                    $status = $row['post_status'];
                    $image = $row['post_image'];
                    $tag = $row['post_tags'];
                    $comments = $row['post_comment_count'];
                    $date = $row['post_date']; ?>

                    <tr>
                        <td><input class="checkboxs" type="checkbox" name="checkboxarray[]" value="<?php echo $post_id; ?>"></td>
                        <td><?php echo $post_id; ?></td>
                        <td><?php echo $author; ?></td>
                        <td><?php echo $title; ?></td>

                        <?php
                        
                            $query = "SELECT * FROM categories WHERE cat_id = '$category' ";
                            $select_cat_title = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_cat_title)) {
                                $cat_title = $row['cat_title']; ?>

                                <td><?php echo $cat_title; ?></td>

                            <?php }
                        
                        ?>


                        <td><?php echo $status; ?></td>
                        <td><img width="100" src="../images/<?php echo $image; ?>" alt=""></td>
                        <td><?php echo $tag; ?></td>
                        <td><?php echo $comments; ?></td>
                        <td><?php echo $date; ?></td>
                        <td><a href="../post.php?p_id=<?php echo $post_id ?>">View post</a></td>
                        <td><a href="posts.php?sourse=edit_post&p_id=<?php echo $post_id ?>">Edit</a></td>
                        <td><a href="posts.php?delete=<?php echo $post_id ?>">Delete</a></td>
                    </tr>

                <?php }
            ?>
        </tbody>
    </table>

    <?php

        if(isset($_GET['delete'])) {
            $the_post_id = $_GET['delete'];

            $query = "DELETE FROM posts WHERE post_id = $the_post_id ";
            $delete_post = mysqli_query($connection, $query);
            header('location: posts.php');
        }

    ?>
</form>