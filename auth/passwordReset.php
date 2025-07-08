<?php
session_start();

require_once 'server/Auth.php';

$server = new Auth();
$result = "";
$output = "";

if (isset($_POST['resetPassword'])) {
    $output = $server->reset_password($_POST);
}

if (isset($_GET['resetID'])) {
    $reset_id = $_GET['resetID'];
} else {
    $reset_id = "";
}

$is_resetable = $server->is_resetable($reset_id);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="theme/img/x.png">

    <title>TRY SOLUTIONS || PASSWORD RESET</title>

    <link rel="stylesheet" href="theme/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="theme/dist/css/adminlte.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Barlow&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Rajdhani&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="theme/dist/css/style.css">
    <link rel="stylesheet" href="theme/dist/css/password.css">

    <style>
        html,
        body {
            font-family: 'Rajdhani', sans-serif;
        }

        .profile-img-wrap {
            height: 170px;
            position: absolute;
            width: 170px;
            background: #fff;
            overflow: hidden;
            border: 1px solid #E3E3E3
        }

        .profile-img-wrap2 {
            height: 170px;
            position: absolute;
            width: 170px;
            background: #fff;
            overflow: hidden;
            border: 1px solid #E3E3E3
        }

        .profile-basic {
            margin-left: 140px;
        }

        .profile-img-wrap img {
            width: 168px;
            height: 168px;
        }

        .profile-img-wrap2 img {
            width: 157px;
            height: 157px;
        }

        .fileupload.btn {
            position: absolute;
            right: 0;
            bottom: 0;
            background: rgba(33, 33, 33, 0.5);
            border-radius: 0;
            padding: 3px 10px;
            border: none;
        }

        .fileupload input.upload {
            cursor: pointer;
            filter: alpha(opacity=0);
            font-size: 20px;
            margin: 0;
            opacity: 0;
            padding: 0;
            position: absolute;
            right: -3px;
            top: -3px;
            padding: 5px;
        }

        .btn-text {
            color: #fff;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="hold-transition login-page">

    <div id="loginForm">

        <span hidden><?= $output ?></span>

        <div class="card" style="height: 100%;">
            <div class="card-body login-card-body">
                <?php
                if ($is_resetable == 'invalid') { ?>
                    <br>
                    <h4 class="text-danger text-center">Sorry! The link is not valid.</h4>

                <?php } elseif ($is_resetable == 'expired') { ?>
                    <br>
                    <h4 class="text-danger text-center">Sorry! The link is expired.</h4>
                <?php } elseif ($is_resetable == 'valid') { ?>


                    <form method="POST" class="password-strength form p-4" enctype="multipart/form-data">

                        <input type="hidden" name="reset_id" value="<?= $reset_id ?>" />

                        <div class="container card-body">
                            <div class="input-field">
                                <small style="font-size:13px">Reset Password</small>
                                <h5>TRY SOLUTIONS <span class="text-danger"><?= $output; ?></span></h5>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="sign-box">
                                        <div class="input-field">
                                            <input class="password-strength__input input" type="password" name="password" id="password-input" aria-describedby="passwordHelp" pattern=".{9,}" required title="9 characters minimum" autocomplete="new-password" style="width: 300px;">
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
                                            <input id="confirmPassword" name="confirm_password" type="password" class="input" pattern=".{9,}" required title="9 characters minimum" style="width: 300px;">
                                            <label for="confirmPassword" class="label">
                                                Confirm Password
                                            </label>
                                            <span id='message'></span>
                                        </div>
                                    </div>
                                    <div class="sign-box">
                                        <div class="input-field">
                                            <button type="submit" name="resetPassword" id="resetButton" disabled class="btn btn-dark" style="width: 300px;border-radius:0px">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                <?php } ?>
            </div>
        </div>

    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js'></script>
    <script src="theme/dist/js/password.js"></script>
    <script>
        document.onkeyup = function(e) {

            if (e.ctrlKey && e.altKey && e.which == 65) {
                window.location = "admin.php";
            }
        };
    </script>
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
                $('#resetButton').attr('disabled', false);
                $('#message').html('Password matched.').css('color', 'green');
            } else {

                $('#message').html('Not Matching.').css('color', 'red');
                $('#resetButton').attr('disabled', true);
            }
        });
    </script>

    <!-- <script>
        $(document).ready(function() {
            $("#clientEmail").focus();
        });
    </script> -->

</body>

</html>