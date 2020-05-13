<?php include_once('db.php'); ?>

<?php session_start(); ?>


<?php 

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '$username' ";

    $selece_username = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($selece_username)) {
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_email = $row['user_email'];
        $db_user_firstnaem = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
    }

    $password = crypt($password, $db_user_password);

    if($db_username !== $username && $db_user_password !== $password) {
        header('location: ../index.php');
    }else if($db_username == $username && $db_user_password == $password) {

        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstnaem;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
 

        header('location: ../admin');
    }else{
        header('location: ../index.php');
    }
}

?>