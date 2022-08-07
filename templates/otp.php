<?php

$showerror = false;
$success = false;

if (isset($_POST['sendotp'])) {
    $otp = $_POST["otp"];
    if ($_SESSION['otp'] == $otp) {
        $_SESSION['logedin'] = true;
        $success = 'Verification Success';
        header("refresh:5;location:./vote.php");
    } else {
        $showerror = 'Invalid otp';
        header("refresh:5;url=./otp.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Statics/css/index.css" />
    <script src="../Statics/js/index.js" defer></script>
    <title>Login Page</title>
</head>

<body>

    <div class="form">
        <?php
        if ($showerror) {
            echo "<div class='alert alert-danger' role='alert'>"
                . $showerror . "
        </div>";
        }
        if ($success) {
            echo "<div class='alert alert-danger' role='alert'>"
                . $success . "
        </div>";
        }
        ?>
        <h1 class="text-center">Enter OTP</h1>
        <form action="" class="form1" method="post">
            <div class="form-step form-step-active">
                <div class="input-group">
                    <label for="otp">OTP</label>
                    <input type="int" name="otp" id="otp" required>
                </div>
            </div>
            <div>
                <button type="submit" name="sendotp" class="btn btn-primary full-width" value="Send OTP" onclick="verifyOTP();">
                    Verify
                </button>
            </div>
        </form>
    </div>
</body>

</html>