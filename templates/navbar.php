<?php
// session_start();
$name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('./links.php'); ?>
</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <div class="nav-header">
        <div class="brand-logo">
            <a href="./vote.php">
                <b>
                    <h4>Online Voting Sys</h4>
                </b>
            </a>
        </div>
    </div>

    <!-- SIDE BAR -->
    <div class="header" id="header">
        <div class="header-content clearfix">
            <div class="header-right">
                <ul>
                    <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                            <?php echo '<strong>WellCome&nbsp;' . $name . '&nbsp;</strong>' ?>
                            <span class="activity active"></span>
                            <img src="../Statics/images/38188.jpg" height="40" width="40" alt="">
                        </div>
                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li><a href="../templates/changepassword.php"><i class="icon-key"></i>
                                            <span>Change Password</span></a></li>
                                    <li><a href="../others/userlogout.php"><i class="icon-key"></i>
                                            <span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END -->


    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <li>
                    <a href="./centralElec.php" aria-expanded="false">
                        <span class="nav-text">Central Election</span>
                    </a>
                </li>

                <li>
                    <a href="./gramElec.php" aria-expanded="false">
                        <span class="nav-text">GramPanchayat Election</span>
                    </a>
                </li>
                <li>
                    <a href="./stateElec.php" aria-expanded="false">
                        <span class="nav-text">State Election</span>
                    </a>
                </li>
                <li>
                    <a href="./talukElec.php" aria-expanded="false">
                        <span class="nav-text">TalukPanchayat Election</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--**********************************
            Sidebar end
        ***********************************-->

    <script src="../Statics/plugins/common/common.min.js"></script>
    <script src="../Statics/js/custom.min.js"></script>
    <script src="../Statics/js/settings.js"></script>
    <script src="../Statics/js/gleek.js"></script>
    <script src="../Statics/js/styleSwitcher.js"></script>
    <script src="../Statics/js/dashboard/dashboard-1.js"></script>
</body>

</html>