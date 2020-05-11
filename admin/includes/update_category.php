<?php
                            
    if(isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];

        $query = "SELECT * FROM categories WHERE cat_id = $edit_id ";
        $select_edit_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_edit_id)) {
            $edit_cat_title = $row['cat_title']; ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="edit-title">Add category</label>
                    <input class="form-control" type="text" name="edit_title" id="edit-title" value="<?php if($edit_cat_title) { echo $edit_cat_title; } ?>">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="update" value="Update">
                </div>
            </form>
        
        <?php }

        if(isset($_POST['update'])) {
            $edit_cat_title = $_POST['edit_title'];
            
            $query = "UPDATE categories SET cat_title = '$edit_cat_title' WHERE cat_id = $edit_id ";
            $update_cat_title = mysqli_query($connection, $query);
            header('location: categories.php');
        }
        
    }

?>