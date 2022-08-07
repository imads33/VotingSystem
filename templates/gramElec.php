<?php
session_start();
include('../others/_dbconnect.php');

if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] != true) {
    header("location: ../index.php");
}

$uaadhar = $_SESSION['adhaar'];

$voted = false;

$voterResult = mysqli_query($conn, "SELECT * FROM `voters` 
    WHERE `v_adhhar`='$uaadhar' AND `eType`='Gram Panchayat Election'");
$voterexists = mysqli_num_rows($voterResult);
if ($voterexists > 0) {
    $voted = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gram Panchayat Election</title>
</head>

<body>
    <div id="main-wrapper">
        <?php include('./navbar.php'); ?>
        <div class="content-body">
            <div>
                <p id="button-th">Gram Panchayat Elections</p>
            </div>

            <div class="container-fluid mt-3">
                <?php
                if ($voted) {
                    echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> You have voted for <strong>Gram Panchayat Election</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                }
                ?>
                <div class="row">
                    <?php
                    $candidates = "SELECT * FROM `candidates` WHERE `eType`='Gram Panchayat Election'";
                    $result = mysqli_query($conn, $candidates);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <?php
                                        echo "<img src=" . $row['cPic'] . " class='rounded-circle' />";
                                        ?>
                                        <h5 class="mt-3 mb-1">Name :&nbsp;<?php echo $row['cname']; ?></h5>
                                        <p class="m-0">Age :&nbsp;<?php echo $row['cAge']; ?></p>
                                    </div>
                                </div>
                                <div>
                                    <center>
                                        <button id="button-v" type="button">
                                            <?php echo "<a href='../others/voteSubmit.php?id=" . $row['cid'] . "' style='text-decoration:none;'>
                                             Vote <i class='fa-solid fa-thumbs-up'></i>
                                            </a>"; ?>
                                        </button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>

    <?php include('./footer.php'); ?>
</body>

</html>