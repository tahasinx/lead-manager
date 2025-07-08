<?php
require_once 'server/session.php';

$result = "";

if (isset($_POST['changePassword'])) {
    $result = $server->reset_password($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'template/headers.php' ?>
    <style>
        #message p {
            padding: 0px 35px;
            font-size: 15px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
        }
    </style>
</head>

<body>
    <div class="main-wrapper">

        <!-- topbar -->
        <?php include 'template/topbar.php' ?>

        <!-- sidebar -->
        <?php include 'template/sidebar.php' ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Change Password</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card-box">
                            <h3 class="card-title"></h3>
                            <div class="row">

                                <div class="col-md-12">

                                    <form method="POST">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div id="message">
                                                    <h4>Password must contain the following:</h4>
                                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                                    <p id="number" class="invalid">A <b>number</b></p>
                                                    <p id="spclchar" class="invalid">A <b>special character</b></p>
                                                    <p id="length" class="invalid">Minimum <b>9 characters</b></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="text-danger"><?= $result ?></h4>
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">Old Password</label>
                                                    <input type="password" class="form-control floating" name="old_pass" required>
                                                </div>
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">New Password</label>
                                                    <input type="password" class="form-control floating" name="new_pass" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 9 or more characters" required>
                                                </div>
                                                <div class="form-group form-focus">
                                                    <label class="focus-label">Confirm Password</label>
                                                    <input type="password" class="form-control floating" name="confirm_pass" id="cnfrm_psw" disabled required>
                                                </div>
                                                <span class="text-danger float-left" style="display: none;" id="noMatchError">Passwords do not match. <br></span>
                                                <button type="submit" class="btn btn-light float-right" name="changePassword" style="background: lightblue;" id="submitButton" disabled onclick="checkPasswords()">
                                                    <i class="fa fa-pen"></i> Update
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <!-- scripts -->
    <?php include 'template/js-links.php' ?>
    <script>
        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var spclchar = document.getElementById("spclchar");
        var length = document.getElementById("length");

        myInput.onkeyup = function() {

            var error = 0;

            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
                error = 1;
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
                error = 1;
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
                error = 1;
            }

            //Validate Special character
            var spclchars = /(?=.*[$@$!%*#?&])[$@$!%*#?&]/g;
            if (myInput.value.match(spclchars)) {
                spclchar.classList.remove("invalid");
                spclchar.classList.add("valid");
            } else {
                spclchar.classList.remove("valid");
                spclchar.classList.add("invalid");
                error = 1;
            }


            // Validate length
            if (myInput.value.length >= 9) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
                error = 1;
            }

            if (error > 0) {

                document.getElementById("submitButton").disabled = true;
                document.getElementById("cnfrm_psw").disabled = true;

            } else {
                document.getElementById("submitButton").disabled = false;
                document.getElementById("cnfrm_psw").disabled = false;
            }
        }




        var cnfrm_pass = document.getElementById('cnfrm_psw');

        cnfrm_pass.onkeyup = function() {
            var myInput = document.getElementById("psw").value;
            var cnfrmPass = cnfrm_pass.value;
            if (cnfrmPass !== myInput) {
                document.getElementById("submitButton").disabled = true;
                document.getElementById("noMatchError").style.display = 'block';

            } else {
                document.getElementById("submitButton").disabled = false;
                document.getElementById("noMatchError").style.display = 'none';
            }
        }
    </script>
</body>

</html>