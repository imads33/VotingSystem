<?php
include('_dbconnect.php');

$login = false;
$showerror = false;
if (isset($_POST['login'])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $existSql = "SELECT * FROM `admin` WHERE aemail='$email' AND password='$password'";
    $result = mysqli_query($conn, $existSql);
    $exists = mysqli_num_rows($result);


    if ($exists == 1) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("location: ../admin/admin.php");
    } else {
        header("location: ../templates/login.php");
        $showerror = "Invalid Credentials";
    }
}
?>


