
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

                $post_query_count = "SELECT * FROM posts ";
                $all_posts = mysqli_query($connection, $query);

                $all_posts_count = mysqli_num_rows($all_posts);

                $per_pate = 1;
                $count = ceil($all_posts_count / $per_pate);

                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                }else{
                    $page = "";
                }

                if($page == "" || $page == 1) {
                    $page_1 = 0;
                }else{
                    $page_1 = ($page * $per_pate) - $per_pate;
                }

                $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $page_1, $per_pate";
                $select_all_post = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_post)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 100);
                    $post_status = $row['post_status'];

                    if ($post_status === 'puplish') { ?>

                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                <?php } }

                ?>




            </div>


            <!-- Blog Sidebar Widgets Column -->
            <?php include_once('includes/sidebar.php'); ?>

        </div>
        <!-- /.row -->

        <hr>

        <ul class="pager">
            <?php
            
                for($i = 1; $i <= $count; $i++) {

                    if($i == $page) {

                        echo "<li><a href='index.php?page={$i}' style='color: red;'>{$i}</a></li>";
                    }else{
                        echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                    }

                    

                }
            
            ?>
        </ul>

<?php include_once('includes/footer.php'); ?>
