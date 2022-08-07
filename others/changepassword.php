<?php
include('_dbconnect.php');

session_start();
if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] != true) {
    header("location: ../index.php");
}
$aadhaar = $_SESSION['adhaar'];

$password = $_POST['password'];
$password2 = $_POST['password2'];
$number = $_POST['aadhar'];

if ($aadhaar === $number) {
    if ($password === $password2) {
        $sql = "UPDATE `cityzens` SET `bdate` = ' $password' WHERE `cityzens`.`aadhar` = '$number'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'success';
            $_SESSION['changed']=true;
        }
    } else {
        echo 'passwordFailed';
    }
} else {
    echo 'wrongAadhar';
}
