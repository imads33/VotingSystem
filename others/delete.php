<?php
include('_dbconnect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deletesql = "DELETE FROM `cityzens` WHERE aadhar='$id'";
    $result = mysqli_query($conn, $deletesql);
    if ($result) {
        header('location:../admin/citizens.php');
    } else {
        die(mysqli_error($conn));
    }
}