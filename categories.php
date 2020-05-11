
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

            if(isset($_GET['categories'])) {
                $the_cat_id = $_GET['categories'];

                $query = "SELECT * FROM posts WHERE post_cat_id = $the_cat_id ";
                $select_all_cat_post = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_cat_post)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                ?>
                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                <?php
                }


            }

            

            ?>




        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include_once('includes/sidebar.php'); ?>

    </div>
    <!-- /.row -->

    <hr>

<?php include_once('includes/footer.php'); ?>
