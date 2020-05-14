
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

function users_online() {
    global $connection;

    $session = session_id();
    $time = time();
    $time_out_in_second = 60;
    
    $time_out = $time - $time_out_in_second;

    $query = "SELECT * FROM users_online WHERE session = '{$session}' ";
    $session_qyery = mysqli_query($connection, $query);
    $session_count = mysqli_num_rows($session_qyery);

    if($session_count == null) {
        mysqli_query($connection, "INSERT INTO users_online (session, time) VAlUES ('{$session}', '{$time}') ");
    }else{
        mysqli_query($connection, "UPDATE users_online SET time = '{$time}' WHERE session = '{$session}' ");
    }

    $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out' ");
    return $count_online_user = mysqli_num_rows($users_online_query);
}