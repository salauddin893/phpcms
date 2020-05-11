<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <div class="from-group">
                <input type="text" class="form-control" name="username" placeholder="Enter yout username">
            </div>
            <br>
            <div class="input-group">
                <input type="password" class="form-control" name="password" placeholder="Enter yout password">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php 
                        $query = "SELECT * FROM categories";
                        $select_cat = mysqli_query($connection, $query);
                        
                        while($row = mysqli_fetch_assoc($select_cat)) {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo "<li><a href='categories.php?categories=$cat_id'> $cat_title </a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    
    <?php include_once('widget.php'); ?>

</div>