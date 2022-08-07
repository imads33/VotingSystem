<?php
session_start();
$name = $_SESSION['name'];
if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] != true) {
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIOTE FOR CANDIDATE</title>
</head>

<body>
    <style>
        #success_msg {
            margin-left: 20%;
            width: 50%;
        }
    </style>

    <div id="main-wrapper">
        <?php include('./navbar.php'); ?>

        <!--**********************************
            Content body start
        ***********************************-->

        <div class="content-body mt-5">
            <div class="container mt-5">
                <div class="row">
                    <?php
                    if (isset($_SESSION['changed'])) {
                        echo '
                            <div class="alert alert-success alert-dismissible fade show" role="alert" id="success_msg">
                            <strong>Success!</strong>The Password has changed
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                        unset($_SESSION['changed']);
                    }
                    ?>
                    <?php
                    if (!empty($_SESSION['voteSuccess'])) {
                        echo '
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Thank you!</strong> We Apperciate yor contribution towards making country better
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        unset($_SESSION['voteSuccess']);
                    }
                    ?>
                    <div class="container mt-5">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Statics/images/image1.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>Voting</h4>
                                    <h5>A small step toward Greate India</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../Statics/images/image2.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>Candidates</h4>
                                    <h5>Vote for Better candidates</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../Statics/images/image3.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>Country</h4>
                                    <h5>Make Make country corruption free</ph5 </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                </div>

            </div>
            <!--**********************************
            Content body end
        ***********************************-->

        </div>
        <?php include('./footer.php'); ?>
</body>

</html>