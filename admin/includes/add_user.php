<?php
    if(isset($_POST['add_user'])) {

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];

        $image = $_FILES['user_image']['name'];
        $image_tamp = $_FILES['user_image']['tmp_name'];

        $user_role = $_POST['user_role'];

        move_uploaded_file($image_tamp, "../images/$image");


        $query = "INSERT INTO users( username, user_password, user_firstname, user_lastname, user_email, user_image, user_role) ";
        $query .= "VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$image}', '{$user_role}') ";

        $careat_users = mysqli_query($connection, $query);

        echo "user ceated: " . " " . "<a href='users.php'>View all users</a>";

    }
?>






<form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">Fristname</label>
         <input  type="text" class="form-control" name="user_firstname">
     </div>

       <!-- <div class="form-group">
           <label for="categories">Categories</label>
           <select name="post_category" id=""></select>
       </div> -->


       <div class="form-group">
           <label for="categories">Lasstname</label>
           <input  type="text" class="form-control" name="user_lastname">
       </div>

       <!-- <div class="form-group">
           <label for="users">Users</label>
           <select name="post_user" id=""> </select>
     </div> -->

     <div class="form-group">
        <label for="title">Username</label>
         <input  type="text" class="form-control" name="username">
     </div>


     <div class="form-group">
        <label for="title">User password</label>
         <input  type="password" class="form-control" name="user_password">
     </div>

   <!--   <div class="form-group">
        <label for="title">Post Author</label>
         <input value="<?php// echo $post_user; ?>" type="text" class="form-control" name="post_user">
     </div> -->
     
      <!-- <div class="form-group">
           <select name="post_status" id=""></select>
       </div> -->

       <div class="form-group">
        <label for="title">User Email</label>
         <input  type="email" class="form-control" name="user_email">
     </div>
   
     
   <div class="form-group">
      <input  type="file" name="user_image">
     </div>

     <div class="form-group">
        <label for="post_tags">User Role</label>
         <select name="user_role" id="">
            <option value="">Select Option</option>
            <option value="admin">Admin</option>
            <option value="author">Author</option>
         </select>
     </div>

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
     </div>


</form>