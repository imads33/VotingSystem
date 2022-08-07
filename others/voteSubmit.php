<?php
include('_dbconnect.php');

session_start();
$uaadhar = $_SESSION['adhaar'];
$uname = $_SESSION['name'];

$_SESSION['voteSuccess'] = false;
$_SESSION['voteFailed'] = false;
$_SESSION['etype'] = false;

if (isset($_GET['id'])) {

    $cid = $_GET['id'];

    $candidate = "SELECT * FROM `candidates` WHERE `cid`='$cid'";
    $result = mysqli_query($conn, $candidate);
    $row = mysqli_fetch_assoc($result);
    $cname = $row['cname'];
    $cetype = $row['eType'];


    $voterResult = mysqli_query($conn, "SELECT * FROM `voters` 
    WHERE `v_adhhar`='$uaadhar'AND `eType`='$cetype'");
    $voterexists = mysqli_num_rows($voterResult);
    $row = mysqli_fetch_assoc($voterResult);
    if ($voterexists <= 0) {
        $insertVoter = mysqli_query($conn, "INSERT INTO `voters` ( `v_name`, `v_adhhar`, `eType`) 
                VALUES ( '$uname','$uaadhar', '$cetype')");


        $result = mysqli_query($conn, "SELECT * FROM `votes` WHERE `cid`='$cid' AND `etype`='$cetype'");
        $exists = mysqli_num_rows($result);
        $vot = mysqli_fetch_assoc($result);

        if ($exists <= 0) {

            $vote = 1;

            $insert = "INSERT INTO `votes` (`cid`, `cname`, `etype`, `votes`) 
            VALUES ('$cid', '$cname', '$cetype', '$vote')";
            $insertresult = mysqli_query($conn, $insert);
            if ($insertresult) {
                header('location:../templates/vote.php');
            }
        } else {
            $updateresult = mysqli_query($conn, "UPDATE `votes` SET `votes`= `votes`+1 
                WHERE `etype`='$cetype' AND `cid`='$cid'");
            if ($updateresult) {
                header('location:../templates/vote.php');
            }
        }

        $_SESSION['voteSuccess'] = true;
    } else {
        header('location:../templates/vote.php');
    }
}
