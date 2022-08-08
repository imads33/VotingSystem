<?php
include('../others/_dbconnect.php');
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../templates/login.php");
    exit;
}
?>

<!-- Candidates Count -->
<?php
$cnumber = 0;
$candidates = "SELECT * FROM `candidates`";
$result = mysqli_query($conn, $candidates);
while ($row = mysqli_fetch_assoc($result)) {
    $cnumber++;
}
?>

<!-- Citizens Count -->
<?php
$pnumber = 0;
$citizens = "SELECT * FROM `cityzens`";
$result = mysqli_query($conn, $citizens);
while ($row = mysqli_fetch_assoc($result)) {
    $pnumber++;
}
?>

<!-- Voters Count -->
<?php
$vnumber = 0;
$voters = "SELECT * FROM `voters`";
$result = mysqli_query($conn, $voters);
while ($row = mysqli_fetch_assoc($result)) {
    $vnumber++;
}
?>



<!--INSERT INTO `admin` (`aid`, `aname`, `aemail`, `password`) VALUES (NULL, 'admin1', 'admin1@gmail.com', 'admin1'); -->

<!-- INSERT INTO `cityzens` (`aadhar`, `phone`, `name`, `gender`, `age`, `address`) VALUES ('243160793326', '8971683419', 'Pruthvi T', 'Male', '21', 'sdmit,ujire'); -->

<!DOCTYPE html>
<html lang="en">

<body>

    <div id="main-wrapper">
        <?php include('../admin/navbar.php'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Candidates</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $cnumber; ?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Citizens</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $pnumber; ?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-people-group"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Voters</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $vnumber; ?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa-solid fa-check-to-slot"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div id="button-th">Listings</div>
                </div>



                <div class="row" style="margin-top:3%;">
                    <?php
                    $candidates = "SELECT * FROM `candidates`";
                    $result = mysqli_query($conn, $candidates);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cid = $row['cid'];
                        $vote = 0;
                        $votes = "SELECT * FROM `votes`  WHERE `cid`='$cid'";
                        $result1 = mysqli_query($conn, $votes);
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row2 = mysqli_fetch_assoc($result1)) {
                                $vote = $row2['votes'];
                            }
                        }
                    ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <?php
                                        echo "<img src=" . $row['cPic'] . " class='rounded-circle' />";
                                        ?>
                                        <h5 class="mt-3 mb-1">Name :&nbsp;<?php echo $row['cname']; ?></h5>

                                        <center>
                                            <p id="button-two">VOTES : <?php echo $vote; ?></p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <?php include('../admin/footer.php'); ?>
    </div>
</body>

</html>