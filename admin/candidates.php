<?php
include('../others/_dbconnect.php');

$cnumber = 0;
$candidates = "SELECT * FROM `candidates`";
$result = mysqli_query($conn, $candidates);
while ($row = mysqli_fetch_assoc($result)) {
    $cnumber++;
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

        <div class="content-body">
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Candidates</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $cnumber; ?></h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                            <div>
                                <button id="button-two" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-user-plus"></i> Add Candidate
                                </button>
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

            <div class="container-fluid mt-3">
                <div class="row">
                    <?php
                    if (isset($_POST['submit'])) {
                        $etype = $_POST['etype'];
                        if ($etype != 'All Election') {
                            $candidates = "SELECT * FROM `candidates` WHERE `eType`='$etype'";
                        }
                    } else {
                        $candidates = "SELECT * FROM `candidates`";
                    }

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
                                        <p class="m-0">Gender :&nbsp;<?php echo $row['cGender']; ?></p>
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
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Candidates</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../others/candidates.php" enctype="multipart/form-data">
                        <div class="field">
                            <label class="label">Candidate Name</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="name" class="input" type="text" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                                <span class="icon is-small is-right">
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Age</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="age" class="input" type="number" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Gender</label>
                            <div class="select is-fullwidth">
                                <select name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Election Type</label>
                            <div class="select is-fullwidth">
                                <select name="etype">
                                    <option value="Central Election">Central Election</option>
                                    <option value="Gram Panchayat Election">Gram Panchayat Election</option>
                                    <option value="State Election">State Election</option>
                                    <option value="Taluk Panchayat Election">Taluk Panchayat Election</option>
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Photo</label>
                            <div class="mb-3">
                                <input class="form-control" type="file" name="file" id="formFile">
                            </div>
                        </div>
                        <div class="modal-footer d-block">
                            <button type="reset" class="btn btn-danger float-end">Clear</button>
                            <button type="submit" name="submit" class="btn btn-success float-end"> + Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <?php include('../admin/footer.php'); ?>
</body>

</html>