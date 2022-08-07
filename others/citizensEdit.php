<?php

include('_dbconnect.php');

if (isset($_POST['snoEdit'])) {
    $sno = $_POST['snoEdit'];
    $username = $_POST['editName'];
    $userphone = $_POST['editPh'];

    $existssql = "UPDATE `cityzens` SET `name` = '$username', `phone` = '$userphone' WHERE `cityzens`.`aadhar` = $sno";
    $result = mysqli_query($conn, $existssql);
    if ($result) {
        $showalert = true;
        header('location:../admin/citizens.php');
    }
    return $showalert;
}
?>

<?php

if (isset($_POST['submit'])) {

    $showalert = false;

    $name = $_POST['name'];
    $aadhar = $_POST['aadhar'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $date = $date[8] . $date[9] . $date[5] . $date[6] . $date[0] . $date[1] . $date[2] . $date[3];

    $existssql = "SELECT * FROM `cityzens` WHERE aadhar='$aadhar'";

    $result = mysqli_query($conn, $existssql);
    $exists = mysqli_num_rows($result);
    if ($exists > 0) {
        $showerror = 'aadhar already exists';
    } else {
        $sql = "INSERT INTO `cityzens` (`aadhar`, `phone`, `name`,`bdate`, `gender`,`age`,`address`) 
        VALUES ('$aadhar','$phone','$name','$date','$gender','$age','$address')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showalert = true;
            header('location:../admin/citizens.php');
        }
    }
    return $showalert;
}

?>