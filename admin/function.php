
<?php

function insurt_category() {
    global $connection;
    if(isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];
        
        if($cat_title == "" || empty($cat_title)) {
            echo 'this field not empty';
        }else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";

            $creat_cat_query = mysqli_query($connection, $query);
        }
    }
}

function findall_categories() {
    global $connection;

    $query = "SELECT * FROM categories";
    $all_category = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($all_category)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title']; ?>

        <tr>
            <td><?php echo $cat_id; ?></td>
            <td><?php echo $cat_title; ?></td>
            <th><a href="categories.php?delete=<?php echo $cat_id; ?>">Delete</a></th>
            <th><a href="categories.php?edit=<?php echo $cat_id; ?>">Edit</a></th>
        </tr>

    <?php }
}


function delete_category() {
    global $connection;

    if(isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_cat = mysqli_query($connection, $query);
        header('location: categories.php');
    }
}