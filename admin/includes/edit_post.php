<?php

if(isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];

        
    $query = "SELECT * FROM posts WHERE post_id = '$the_post_id'" ;
    $all_posts_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($all_posts_by_id)) {
        $post_id = $row['post_id'];
        $author = $row['post_author'];
        $title = $row['post_title'];
        $category = $row['post_cat_id'];
        $status = $row['post_status'];
        $image = $row['post_image'];
        $tag = $row['post_tags'];
        $comments = $row['post_comment_count'];
        $date = $row['post_date'];
        $post_content = $row['post_content'];
        
    }

    if(isset($_POST['update_post'])) {
        $post_title = $_POST['post_title'];
        $post_cat = $_POST['post_category'];
        $post_author = $_POST['post_user'];
        $post_status = $_POST['post_status'];
    
        $post_image = $_FILES['image']['name'];
        $post_image_tmp = $_FILES['image']['tmp_name'];
    
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
    
        move_uploaded_file($post_image_tmp, "../images/$post_image");

        if(empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
            $select_img = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_img)) {
                $post_image = $row['post_image'];
            }
        }
    
        $query = "UPDATE posts SET ";
        $query .= "post_cat_id = '{$post_cat}', ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_date = now(), ";
        $query .= "post_image = '{$post_image}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_status = '{$post_status}' ";
        $query .= "WHERE post_id = '{$the_post_id}' ";

        $edit_post = mysqli_query($connection, $query);


        echo "<p class='bg-success'>Post Update: <a href='../post.php?p_id={$the_post_id}'>View All Posts</a> or <a href='posts.php'>View all post</></p>";

    }

}


                
?>


<form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">Post Title</label>
         <input value="<?php echo $title; ?>"  type="text" class="form-control" name="post_title">
     </div>

       <div class="form-group">
           <label for="categories">Categories</label>
           <select class="form-control" name="post_category" id="">
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

     <div class="form-group">
        <label for="title">Post author</label>
         <input value="<?php echo $author; ?>" type="text" class="form-control" name="post_user">
     </div>
     
      <div class="form-group">
            <label for="title">Post Status</label>
           <select class="form-control" name="post_status" id="">
                <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                <?php
                    if($status == 'puplish') {
                        echo "<option value='dref'>dref</option>";
                    }else{
                        echo "<option value='puplish'>puplish</option>";
                    }
                ?>
           </select>
       </div>
   
     
   <div class="form-group">

      <img width="100" src="../images/<?php echo $image; ?>" alt="">
      <input type="file" name="image">
     </div>

     <div class="form-group">
        <label for="post_tags">Post Tags</label>
         <input value="<?php echo $tag; ?>" type="text" class="form-control" name="post_tags">
     </div>
     
     <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea  class="form-control "name="post_content" id="editor" cols="30" rows="10">
            <?php echo $post_content; ?>
        </textarea>
     </div>
     
     

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
     </div>


</form>