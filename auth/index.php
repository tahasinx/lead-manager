<?php
session_start();

require_once 'server/Auth.php';

$server = new Auth();
$result = "";
$output = "";

if (isset($_POST['signIN'])) {
  $result = $server->client_login($_POST);
}

if (isset($_POST['register'])) {
  $result = $server->clientRegistration($_POST);
}

if (isset($_POST['submitEmail'])) {
  $result = $server->sendPassResetLink($_POST);
}

if (isset($_SESSION['admin@id'])) {
  header('location:../dashboard/admin/index.php');
}

if (isset($_SESSION['client@id'])) {
  header('location:../dashboard/client/index.php');
}

if (isset($_GET['pid'])) {
  $_SESSION['product_id'] = $_GET['pid'];
}
if (isset($_GET['signIn'])) {
  $title = 'Sign In';
} elseif (isset($_GET['showForgotPassPanel'])) {
  $title = 'Forgot Password';
} else {
  $title = 'Registration';
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="theme/img/reiLOGO.png">

  <title>SkipNCall || <?= @$title ?></title>

  <link rel="stylesheet" href="theme/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="theme/dist/css/adminlte.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Barlow&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Rajdhani&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="theme/dist/css/style.css">
  <link rel="stylesheet" href="theme/dist/css/password.css">
</head>

<body class="hold-transition login-page">

  <div id="loginForm">

    <span hidden>
      <?= $result; ?>
    </span>

    <?php if (isset($_GET['signIn'])) { ?>

      <div class="card" style="height: 100%;width:600px;font-family: 'Rajdhani', sans-serif;">
        <div class="card-body login-card-body">
          <form method="post">
            <div class="row">

              <div class="col-sm-4" style="border-right:1px solid #E3E3E3;margin-top:20px;">
                <div class="sign-box container">
                  <div class="input-field">
                    <br>
                    <img src="theme/img/UOkI+G.gif" style="width: 150px;cursor: pointer;" />
                  </div>
                </div>
              </div>

              <div class="col-sm-8">
                <div class="sign-box" style="margin-top:-20px;font-family: 'Rajdhani', sans-serif;">
                  <div class="input-field">
                    <small style="font-size:13px">Sign In</small>
                    <h5>SKIP N CALL
                      <br>
                      <span class="text-danger"><?= $result; ?></span>
                    </h5>
                  </div>
                </div>
                <div class="sign-box">
                  <div class="input-field">
                    <input id="username" name="username" type="email" class="input" style="width: 313px;font-family: 'Barlow', sans-serif;" required>
                    <label for="username" class="label">
                      Email Address
                    </label>
                  </div>
                </div>
                <div class="sign-box">
                  <div class="input-field">
                    <input id="password" name="password" type="password" class="input" style="width: 313px;font-family: 'Barlow', sans-serif;" autocomplete="new-password" required>
                    <label for="password" class="label">
                      Password
                    </label>
                  </div>
                </div>
                <div class="sign-box">
                  <div class="input-field">
                    <div class="row" style="margin-right: -18px;">
                      <div class="col-sm-9" style="padding-top: 10px;">
                        <a href="?showForgotPassPanel=1">Forgot password?</a><br>
                        <a href="?registrationPanel=1" style="color: orangered;">Create account</a>
                      </div>
                      <div class="col-sm-3">
                        <button name="signIN" class="btn btn-outline-dark btn-flat" style="float: right;margin-top: 15px;">Sign In</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

    <?php } ?>

    <?php if (isset($_GET['showForgotPassPanel'])) { ?>

      <div class="card" style="height: 100%;width:600px;font-family: 'Rajdhani', sans-serif;">
        <div class="card-body login-card-body">
          <form method="post" onsubmit="x()">
            <div class="row">

              <div class="col-sm-4" style="border-right:1px solid #E3E3E3;">
                <div class="sign-box container">
                  <div class="input-field">
                    <br>
                    <img src="theme/img/UOkI+G.gif" style="width: 150px;cursor: pointer;" />
                  </div>
                </div>
              </div>

              <div class="col-sm-8">
                <div class="sign-box" style="margin-top:-20px;font-family: 'Rajdhani', sans-serif;">
                  <div class="input-field">
                    <small style="font-size:13px;color:blueviolet">Forgot Password?</small>
                    <h5>SKIP N CALL <span class="text-danger"> <br> <?= $result; ?></span></h5>
                  </div>
                </div>
                <div class="sign-box">
                  <div class="input-field">
                    <small>Please submit your email here. And a password reset link will be sent to your email.</small>
                  </div>
                </div>
                <div class="sign-box">
                  <div class="input-field">
                    <input id="emailAddress" name="emailAddress" type="email" class="input" style="width: 313px;font-family: 'Barlow', sans-serif;" required>
                    <label for="emailAddress" class="label">
                      Email Address
                    </label>
                  </div>
                </div>
                <div class="sign-box">
                  <div class="input-field">
                    <div class="row" style="margin-right: -18px;">
                      <div class="col-sm-9" style="padding-top: 10px;">
                        <a href="?signIn=1" class="text-danger"> <i class="fas fa-times"></i> close</a>
                      </div>
                      <div class="col-sm-3">
                        <button name="submitEmail" class="btn btn-outline-dark btn-flat" style="float: right;" id="submitButton">Submit</button>
                        <button type="button" class="btn btn-outline-dark btn-flat" style="float: right;display:none" id="processButton">
                          <img src="theme/img/processing.gif" style="width: 20px;" />
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>

    <?php } ?>

    <?php if (!isset($_GET['showForgotPassPanel']) && !isset($_GET['signIn'])) { ?>

      <div class="card" style="height: 100%;width:600px;font-family: 'Rajdhani', sans-serif;">
        <div class="card-body login-card-body">
          <form method="post" class="password-strength form p-4" onsubmit="x()">
            <div class="row">

              <div class="col-sm-4" style="border-right:1px solid #E3E3E3;">
                <div class="sign-box">
                  <div class="input-field">
                    <br>
                    <img src="theme/img/UOkI+G.gif" style="width: 150px;margin-left:-15px;margin-top:120px;cursor: pointer;" />
                  </div>
                </div>
              </div>

              <div class="col-sm-8">
                <div class="sign-box" style="margin-top:-20px;font-family: 'Rajdhani', sans-serif;">
                  <div class="input-field">
                    <small style="font-size:13px;color:blueviolet">Registration</small>
                    <h5>SKIP N CALL <br><span class="text-danger"><?= $result; ?></span></h5>
                  </div>
                </div>
                <div class="sign-box">
                  <div class="input-field">
                    <input id="fname" name="client_firstname" type="text" class="input" style="width: 313px;" required>
                    <label for="fname" class="label">
                      First Name <span class="text-danger">*</span>
                    </label>
                  </div>
                </div>
                <div class="sign-box">
                  <div class="input-field">
                    <input id="lname" name="client_lastname" type="text" class="input" style="width: 313px;" required>
                    <label for="lname" class="label">
                      Last Name <span class="text-danger">*</span>
                    </label>
                  </div>
                </div>
                <div class="sign-box">
                  <div class="input-field">
                    <input id="clientEmail" name="client_email" type="email" value="" class="input" style="width: 313px;" required>
                    <label for="clientEmail" class="label">
                      Email Address <span class="text-danger">*</span>
                    </label>
                  </div>
                </div>
                <div class="sign-box">
                  <div class="input-field">
                    <input class="password-strength__input input" type="password" name="password" id="password-input" aria-describedby="passwordHelp" pattern=".{9,}" required title="9 characters minimum" autocomplete="new-password" style="width: 313px;">
                    <label for="password-input" class="label">
                      Password
                    </label>
                    <small class="password-strength__error text-danger js-hidden">This symbol is not allowed!</small>
                    <small class="form-text text-muted mt-2" id="passwordHelp">Add 9 charachters or more, lowercase letters, uppercase letters, numbers and symbols to make the password really strong!</small>
                    <div class="password-strength__bar-block progress mb-4">
                      <div class="password-strength__bar progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
                <div class="sign-box">
                  <div class="input-field">
                    <input id="confirmPassword" name="confirm_password" type="password" class="input" pattern=".{9,}" required title="9 characters minimum" style="width: 313px;">
                    <label for="confirmPassword" class="label">
                      Confirm Password
                    </label>
                    <span id='message'></span>
                  </div>
                </div>

                <div class="sign-box">
                  <div class="input-field">
                    <div class="row" style="margin-right: -18px;">
                      <div class="col-sm-9" style="padding-top: 10px;">
                        <a href="?signIn=1">Already have an account?</a><br>
                      </div>
                      <div class="col-sm-3">
                        <button name="register" class="btn btn-outline-dark btn-flat" style="float: right" id="submitButton">Register</button>
                        <button type="button" class="btn btn-outline-dark btn-flat" style="float: right;display:none" id="processButton">
                          <img src="theme/img/processing.gif" style="width: 20px;" />
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </form>
        </div>
      </div>

    <?php } ?>

    <div class="text-center">
      <a href="../index.php" style="font-family:rajdhani,san-sarif;color: orangered"> <i class="fa fa-arrow-left"></i> Back To Home</a>
    </div>

  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js'></script>
  <script src="theme/dist/js/password.js"></script>

  <script>
    $('.input-field .input').blur(function() {
      if (!this.value) {
        $(this).removeClass('has-value');
      } else {
        $(this).addClass('has-value');
      }
    });
  </script>
  <script>
    $('#confirmPassword').on('keyup', function() {
      if ($('#password-input').val() == $('#confirmPassword').val()) {
        $('#message').html('Password matched.').css('color', 'green');
      } else
        $('#message').html('Not Matching.').css('color', 'red');
    });
  </script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <script>
    function x() {
      document.getElementById('submitButton').style.display = 'none';
      document.getElementById('processButton').style.display = 'block';
    }
  </script>
</body>

</html>