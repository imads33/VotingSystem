<?php
include('./_dbconnect.php');
session_start();
$aadhar = $_POST["aadhar"];
$password = $_POST["password"];

$result = mysqli_query($conn, "SELECT * FROM `cityzens` WHERE `aadhar`='$aadhar'");
$exists = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if ($exists > 0) {
    if ($password == $row['bdate']) {
        $_SESSION['logedin'] = true;
        $_SESSION['adhaar'] = $row['aadhar'];
        $_SESSION['name'] = $row['name'];
        echo 'yes';
    } else {
        echo 'wrong';
    }
} else {
    echo 'noo';
    header("refresh:3;url=../index.php");
}
