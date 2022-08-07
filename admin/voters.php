<?php
include('../others/_dbconnect.php');

$vnumber = 0;
$voters = "SELECT * FROM `voters`";
$result = mysqli_query($conn, $voters);
while ($row = mysqli_fetch_assoc($result)) {
    $vnumber++;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>

<body>
    <div id="main-wrapper">
        <?php include('../admin/navbar.php'); ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div>
                <p id="button-th">VOTERS</p>
            </div>
            <div class="container-fluid mt-4">
                <div class="row">
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
                    <div class="col-lg-6 col-sm-6" id="button-two">
                        <form method='post'>
                            <select name="etype" id="options" class="form-select">
                                <option value="All Election"> All Elections</option>
                                <option value="Central Election"> Central Election</option>
                                <option value="Gram Panchayat Election"> Gram Panchayat Election</option>
                                <option value="State Election"> State Election</option>
                                <option value="Taluk Panchayat Election"> Taluk Panchayat Election</option>
                            </select>
                            <button class="btn btn-success" type='submit' name='submit'>Search</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-5">
                <div class="row">
                    <table class="table table-success table-striped">
                        <thead class="table">
                            <tr>
                                <th scope="col">Sl No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Adhaar</th>
                                <th scope="col">Election Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (isset($_POST['submit'])) {
                                $etype = $_POST['etype'];
                                if ($etype != 'All Election') {
                                    $voters = "SELECT * FROM `voters` WHERE `eType`='$etype'";
                                }
                            } else {
                                $voters = "SELECT * FROM `voters`";
                            }
                            $vnumber = 1;

                            $result = mysqli_query($conn, $voters);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "
                                        <tr>
                                            <td>" . $vnumber . "</td>
                                            <td>" . $row['v_name'] . "</td>
                                            <td>" . $row['v_adhhar'] . "</td>
                                            <td>" . $row['eType'] . "</td>
                                </tr>  ";
                                    $vnumber++;
                                }
                            } else {
                                echo "
                               
                                    <td>***********</td>
                                    <td>RECORDS NOT FOUND</td>
                                    <td>***********</td>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--**********************************
            Content body end
        ***********************************-->
        </div>
        <?php include('../admin/footer.php'); ?>

</body>

</html>