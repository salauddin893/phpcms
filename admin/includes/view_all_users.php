<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Image</th>
            <th>User role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
            $query = "SELECT * FROM users";
            $all_users = mysqli_query($connection, $query);
        
            while($row = mysqli_fetch_assoc($all_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];
                $image = $row['user_image']; ?>

                <tr>
                    <td><?php echo $user_id; ?></td>
                    <td><?php echo $username; ?></td>
                    <td><?php echo $user_firstname; ?></td>
                    <td><?php echo $user_lastname; ?></td>
                    <td><?php echo $user_email; ?></td>
                    <td><?php echo $user_role; ?></td>
                    <td><img width="100" src="../images/<?php echo $image; ?>" alt=""></td>
                    <td><a href="users.php?sourse=edit_user&u_id=<?php echo $user_id ?>">Edit</a></td>
                    <td><a href="users.php?delete=<?php echo $user_id ?>">Delete</a></td>
                </tr>

            <?php }
        ?>
    </tbody>
</table>

<?php

    if(isset($_GET['delete'])) {
        $the_user_id = $_GET['delete'];

        $query = "DELETE FROM users WHERE user_id = $the_user_id ";
        $delete_user = mysqli_query($connection, $query);
        header('location: users.php');
    }

?>