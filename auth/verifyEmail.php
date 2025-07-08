<?php
session_start();

require_once 'server/Auth.php';

$server = new Auth();
$result = "";
$output = "";
$client_id = "";



if (isset($_GET['verification_id'])) {
    $client_id = $_GET['verification_id'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="theme/img/x.png">

    <title>TRY SOLUTIONS || EMAIL VERIFICATION</title>

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

    <span hidden><?= $output ?></span>

    <div id="loginForm">
        <?php
        if ($server->validateClient($client_id) == 'valid') {

            $output = $server->redirect($client_id);
            echo "<span hidden>".$output."</span>";
            
        } elseif ($server->validateClient($client_id) == 'expired') { ?>

            <div class="card" style="border-radius: 0px;">
                <div class="container card-body">
                    <span class="text-center text-danger text-uppercase">
                        Sorry! The link is expired!
                    </span>
                </div>
            </div>

        <?php } elseif ($server->validateClient($client_id) == 'invalid') { ?>
            <div class="card" style="border-radius: 0px;">
                <div class="container card-body">
                    <span class="text-center text-danger">
                        Malicious attempt found !
                    </span>
                </div>
            </div>
        <?php } ?>

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
                $('#message').html('Password matched.').css('color', 'green');
            } else
                $('#message').html('Not Matching.').css('color', 'red');
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#clientEmail").focus();
        });
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>