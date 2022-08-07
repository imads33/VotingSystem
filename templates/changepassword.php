<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="../Statics/css/alert.css" rel="stylesheet">
    <title>Change Password</title>
</head>

<body>


    <div class="row justify-content-center mt-5">
        <div class="col-4">
            <div class="col">
                <div class="container mt-5">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">AADHAR NUMBER</label>
                            <input type="number" name="number" class="form-control" id="aadhar" required>
                            <span id="adhar_err" calss="fieldError" style="color:red"></span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">PASSWORD</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">CONFIRM PASSWORD</label>
                            <input type="password" name="password2" class="form-control" id="password2" required>
                            <span id="pass_err" calss="fieldError" style="color:red"></span>
                        </div>
                        <div class="d-grid">
                            <button type="button" name="submit" class="btn btn-primary btn-block" onclick="check()">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function check() {
            var aadhar = jQuery('#aadhar').val();
            var pass = jQuery('#password').val();
            var pass2 = jQuery('#password2').val();

            $.post("../others/changepassword.php", {
                aadhar: aadhar,
                password: pass,
                password2: pass2
            }, function(result) {
                if (result == 'wrongAadhar') {
                    jQuery('#adhar_err').html("Invalid Aadhar Number!");
                }
                if (result == 'passwordFailed') {
                    jQuery('#adhar_err').hide();
                    jQuery('#pass_err').html("Password Didn't Match!!!");
                }
                if (result == 'success') {
                    window.location = './vote.php';
                    //jQuery('#success_msg').html("");
                    //jQuery('#success_msg').hide();
                }
            });
        }
    </Script>

</body>



</html>