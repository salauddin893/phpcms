<?php
    if(isset($_POST['creat_post'])) {

        $post_title = $_POST['post_title'];
        $post_cat = $_POST['post_category'];
        $post_author = $_POST['post_user'];
        $post_status = $_POST['post_status'];

        $image = $_FILES['image']['name'];
        $image_tamp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_date = date('d-m-y');
        $post_content = $_POST['post_content'];

        move_uploaded_file($image_tamp, "../images/$image");


        $query = "INSERT INTO posts(post_cat_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
        $query .= "VALUES('{$post_cat}', '{$post_title}', '{$post_author}', now(), '{$image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";

        $careat_post = mysqli_query($connection, $query);

    }
?>






<form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">Post Title</label>
         <input  type="text" class="form-control" name="post_title">
     </div>

       <!-- <div class="form-group">
           <label for="categories">Categories</label>
           <select name="post_category" id=""></select>
       </div> -->


       <div class="form-group">
           <label for="categories">Categories</label>
           <select name="post_category" id="">
                <?php
                
                    $query = "SELECT * FROM categories";
                    $all_cat_list = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($all_cat_list)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title']; ?>

                        <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>

                    <?php }
                
                ?>
           </select>
       </div>

       <!-- <div class="form-group">
           <label for="users">Users</label>
           <select name="post_user" id=""> </select>
     </div> -->

     <div class="form-group">
        <label for="title">Post author</label>
         <input  type="text" class="form-control" name="post_user">
     </div>



   <!--   <div class="form-group">
        <label for="title">Post Author</label>
         <input value="<?php// echo $post_user; ?>" type="text" class="form-control" name="post_user">
     </div> -->
     
      <!-- <div class="form-group">
           <select name="post_status" id=""></select>
       </div> -->

       <div class="form-group">
        <label for="title">Post status</label>
         <input  type="text" class="form-control" name="post_status">
     </div>
   
     
   <div class="form-group">

      <img width="100" src="../images/" alt="">
      <input  type="file" name="image">
     </div>

     <div class="form-group">
        <label for="post_tags">Post Tags</label>
         <input  type="text" class="form-control" name="post_tags">
     </div>
     
     <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea  class="form-control "name="post_content" id="editor" cols="30" rows="10">
        
       
        </textarea>
     </div>
     
     

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="creat_post" value="Creat Post">
     </div>


</form>