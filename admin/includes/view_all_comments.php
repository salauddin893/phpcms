<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Email</th>
            <th>comment</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
            $query = "SELECT * FROM comments";
            $all_comments = mysqli_query($connection, $query);
        
            while($row = mysqli_fetch_assoc($all_comments)) {
                $comment_id = $row['comment_id'];
                $comment_author = $row['comment_author'];
                $comment_email = $row['comment_email'];
                $comment_post_id = $row['comment_post_id'];
                $comment_content = $row['comment_content'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date']; ?>

                <tr>
                    <td><?php echo $comment_id; ?></td>
                    <td><?php echo $comment_author; ?></td>
                    <td><?php echo $comment_email; ?></td>

                    <?php
                    /*
                        $query = "SELECT * FROM categories WHERE cat_id = '$category' ";
                        $select_cat_title = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_cat_title)) {
                            $cat_title = $row['cat_title']; ?>

                            <td><?php echo $cat_title; ?></td>

                        <?php }
                    */
                    ?>


                    <td><?php echo $comment_content; ?></td>
                    <td><?php echo $comment_status; ?></td>

                    <?php
                    
                        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                        $select_post_id = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_post_id)) {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                        }
                    
                    ?>
                    <td><a href="../post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></td>


                    <td><?php echo $comment_date; ?></td>
                    <td><a href="comments.php?approve=<?php echo $comment_id; ?>">Approve</a></td>
                    <td><a href="comments.php?unapprove=<?php echo $comment_id; ?>">Unapprove</a></td>
                    <td><a href="posts.php?sourse=edit_post&p_id=<?php echo $post_id ?>">Edit</a></td>
                    <td><a href="comments.php?delete=<?php echo $comment_id; ?>">Delete</a></td>
                </tr>

            <?php }
        ?>
    </tbody>
</table>

<?php

    if(isset($_GET['approve'])) {
        $the_comment_id = $_GET['approve'];

        $query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id = '$the_comment_id' ";
        $comment_approve = mysqli_query($connection, $query);
        header('location: comments.php');
    }

    if(isset($_GET['unapprove'])) {
        $the_comment_id = $_GET['unapprove'];

        $query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = '$the_comment_id' ";
        $comment_unapprove = mysqli_query($connection, $query);
        header('location: comments.php');
    }

    if(isset($_GET['delete'])) {
        $the_comment_id = $_GET['delete'];

        $query = "DELETE FROM comments WHERE comment_id = $the_comment_id ";
        $delete_comment = mysqli_query($connection, $query);
        header('location: comments.php');
    }

?>