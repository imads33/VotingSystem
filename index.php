<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./Statics/css/index.css" />
  <script src="./Statics/js/index.js" defer></script>
  <?php include('./templates/links.php'); ?>
  <title>Login Page</title>
</head>


<body>

  <div class="form">
    <h1 class="text-center">Login Form</h1>
    <form action="" class="form1" method="post">
      <div class="form-step form-step-active">
        <div class="input-group">
          <label for="aadhar">Aadhaar No</label>
          <input type="text" name="adhar" id="adhar" required>
          <span id="aadhar_err" calss="fieldError"></span>
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="pasword">
          <span id="pass_err" calss="fieldError"></span>
        </div>
        <div>
          <button type="button" name="submit" class="btn btn-primary full-width" onclick="verify()">
            Login
          </button>
        </div>
      </div>
    </form>
  </div>

  <script>
    function verify() {
      var aadhar = jQuery('#adhar').val();
      var pass = jQuery('#pasword').val();

      $.post("./others/verifyCitizen.php", {
          aadhar: aadhar,
          password: pass
        },
        function(result) {
          if (result == 'noo') {
            jQuery('#aadhar_err').html("Invalid Aadhar Number !");
          }
          if (result == 'wrong') {
            jQuery('#aadhar_err').hide();
            jQuery('#pass_err').html("Wrong Password !");
          }
          if (result == 'yes') {
            window.location = './templates/vote.php';
          }
        });
    }
  </Script>

</body>

</html>