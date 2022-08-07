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

    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header">
        <div class="brand-logo">
            <a href="../admin/admin.php">
                <b>
                    <h4>Online Voting Sys</h4>
                </b>
            </a>
        </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
        <div class="header-content clearfix">

            <div class="nav-control">
                <div class="hamburger">
                    <span class="toggle-icon"><i class="fa-solid fa-bars"></i></span>
                </div>
            </div>
            <div class="header-right">
                <ul>
                    <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                            <span class="activity active"></span>
                            <img src="../Statics/images/38188.jpg" height="40" width="40" alt="">
                        </div>
                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li><a href="../others/logout.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label">Dashboard</li>
                <li>
                    <a href="../admin/admin.php" aria-expanded="false">
                        <i class="fa-solid fa-table-columns"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/candidates.php" aria-expanded="false">
                        <i class="fa fa-users"></i><span class="nav-text"> Candidates</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/citizens.php" aria-expanded="false">
                        <i class="fa-solid fa-people-group"></i><span class="nav-text">Citizens</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/voters.php" aria-expanded="false">
                        <i class="fa-solid fa-check-to-slot"></i><span class="nav-text">Voters</span>
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