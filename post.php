
<?php include_once('includes/header.php'); ?>

<!-- Navigation -->

<?php include_once('includes/navigation.php'); ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <?php 

                if(isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];

                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
                    $select_post = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_post)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                    ?>
                        <h2>
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        
                        <hr>
                    <?php
                    }
                }
            ?>

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>

                <?php
                
                if(isset($_POST['create_comment'])) {

                    $the_post_id = $_GET['p_id'];

                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];

                    if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

                        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                        $query .= "VALUES($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapprove', now() ) ";

                        $creat_comments = mysqli_query($connection, $query);



                        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                        $query .= "WHERE post_id = $the_post_id ";

                        $update_comment_count = mysqli_query($connection, $query);

                    }else{ ?>
                        <script>alert('please field not empty')</script>
                    <?php }

                }
                
                ?>


                <form role="form" method="post">
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" name="comment_author">
                    </div>
                    <div class="form-group">
                        <label for="author">Email</label>
                        <input type="text" class="form-control" name="comment_email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="comment_content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_comment"> Submit</button>
                </form>
            </div>

            <hr>



            <?php
                if(isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];

                    $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id ";
                    $query .= "AND comment_status = 'approve' ";
                    $select_post_comment = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_post_comment)) {
                        $comment_author = $row['comment_author'];
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content']; ?>
                        
                        <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment_author; ?>
                                    <small><?php echo $comment_date; ?></small>
                                </h4>
                                <?php echo $comment_content; ?>
                            </div>
                        </div>

                    <?php }
                }
            
            ?>

            


        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include_once('includes/sidebar.php'); ?>

    </div>
    <!-- /.row -->

    <hr>

<?php include_once('includes/footer.php'); ?>