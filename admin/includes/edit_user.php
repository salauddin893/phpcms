<?php

if(isset($_GET['u_id'])) {
    $the_user_id = $_GET['u_id'];

        
    $query = "SELECT * FROM users WHERE user_id = '$the_user_id'" ;
    $all_users_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($all_users_by_id)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        
    }

    if(isset($_POST['update_user'])) {
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
            $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
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
        $query .= "WHERE user_id = '{$the_user_id}' ";

        $edit_user = mysqli_query($connection, $query);

    }

}


                
?>


<form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">User firstnaem</label>
         <input value="<?php echo $user_firstname; ?>"  type="text" class="form-control" name="user_firstname">
     </div>

       <!-- <div class="form-group">
        <label for="title">Post category</label>
         <input type="text" class="form-control" name="post_category">
     </div> -->

       <!-- <div class="form-group">
           <label for="users">Users</label>
           <select name="post_user" id=""> </select>
     </div> -->

     <div class="form-group">
        <label for="title">User lastname</label>
         <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
     </div>



   <!--   <div class="form-group">
        <label for="title">Post Author</label>
         <input value="<?php// echo $post_user; ?>" type="text" class="form-control" name="post_user">
     </div> -->
     
      <!-- <div class="form-group">
           <select name="post_status" id=""></select>
       </div> -->

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
         <input class="btn btn-primary" type="submit" name="update_user" value="Update user">
     </div>


</form>