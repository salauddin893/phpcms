
<?php include_once('includes/admin_header.php'); ?>

<?php

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_usrername = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_usrername)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        
    }

    if(isset($_POST['update_profile'])) {
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
    
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
    
        $user_role = $_POST['user_role'];
    
        move_uploaded_file($user_image_tmp, "../images/$user_image");

        if(empty($user_image)) {
            $query = "SELECT * FROM users WHERE username = '{$username}' ";
            $select_img = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_img)) {
                $user_image = $row['user_image'];
            }
        }
    
        $query = "UPDATE users SET ";
        $query .= "username = '{$username}', ";
        $query .= "user_password = '{$user_password}', ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_image = '{$user_image}', ";
        $query .= "user_role = '{$user_role}' ";
        $query .= "WHERE username = '{$username}' ";

        $edit_user = mysqli_query($connection, $query);

    }
}


?>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once('includes/admin_navigation.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>



                        <form action="" method="post" enctype="multipart/form-data">    
     
     
                            <div class="form-group">
                                <label for="title">User firstnaem</label>
                                <input value="<?php echo $user_firstname; ?>"  type="text" class="form-control" name="user_firstname">
                            </div>

                            <div class="form-group">
                                <label for="title">User lastname</label>
                                <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
                            </div>

                            <div class="form-group">
                                <label for="title">Username</label>
                                <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
                            </div>


                            <div class="form-group">
                                <label for="post_tags">User email</label>
                                <input value="<?php echo $user_email; ?>" type="text" class="form-control" name="user_email">
                            </div>


                            <div class="form-group">
                                <label for="post_content">User password</label>
                                <input value="<?php echo $user_password; ?>" type="text" class="form-control" name="user_password">
                            </div>
                        
                            
                        <div class="form-group">
                            <img width="100" src="../images/<?php echo $user_image; ?>" alt="">
                            <input type="file" name="user_image">
                            </div>

                            
                            
                            <div class="form-group">
                                <label for="post_content">User role</label>
                                <input value="<?php echo $user_role; ?>" type="text" class="form-control" name="user_role">
                            </div>
                            
                            

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
                            </div>


                        </form>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include_once('includes/admin_footer.php'); ?>

