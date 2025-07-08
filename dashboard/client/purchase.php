<?php
require_once 'server/session.php';
require_once 'server/config.php';

$state  = "";
$result = "";

if (isset($_GET['state'])) {
    $state = $_GET['state'];
}

if (isset($_POST['selectZip'])) {
    $server->select_zip($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'template/headers.php' ?>
    <style>
        .table tbody tr th {
            min-width: 200px;
        }

        .table tbody tr td {
            min-width: 200px;
        }

        .table tbody {
            display: block;
            max-height: 700px;
            overflow-y: scroll;
            cursor: pointer;
        }

        .table thead,
        .table tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .table tr:hover {
            background: lightblue;
        }

        .tableSelected td {
            border-bottom: 1px solid #E3E3E3 !important;
        }

        tr {
            border-bottom: 1px solid #E3E3E3 !important;
        }

        /* Chrome, Safari, Edge, Opera */
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

<body>
    <div class="main-wrapper">

        <!-- topbar -->
        <?php include 'template/topbar.php' ?>

        <!-- sidebar -->
        <?php include 'template/sidebar.php' ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block"><i class="fa fa-money"></i> Purchase Leads

                                </h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-sm-4">

                                    </div>
                                    <div class="col-sm-3">
                                        <div class="container fieldset">
                                            <div class="sign-box">
                                                <h3>PAYMENT GATEWAY</h3>
                                                <h1>
                                                    <i class="fab fa-cc-stripe" style="color:blueviolet"></i>
                                                    <i class="fab fa-cc-visa"></i>
                                                    <i class="fab fa-cc-mastercard"></i>
                                                    <i class="fab fa-cc-amex"></i>
                                                    <i class="fab fa-cc-discover"></i>
                                                    <i class="fab fa-cc-jcb"></i>
                                                </h1>
                                                <hr>
                                                <?php
                                                if (isset($_SESSION['successful'])) { ?>
                                                    <h4 class="text-success">
                                                        Privious transaction was completed successsfully.
                                                    </h4>
                                                <?php }
                                                unset($_SESSION['successful']);
                                                ?>
                                                <?php
                                                $fileData = $server->getReceived_fileByName($_GET['fileID']);
                                                foreach ($fileData as $data) {
                                                    extract($data);
                                                ?>
                                                    <table style="width: 100%;">
                                                        <tr style="border-bottom:none !important;">
                                                            <td>File ID</td>
                                                            <td><?= $file_name ?></td>
                                                        </tr>
                                                        <tr style="border-bottom:none !important;">
                                                            <td>Total Leads</td>
                                                            <td>_______________
                                                                <?php if (file_exists("../../uploads/files/client/$file_name.csv")) { ?>
                                                                    <?php
                                                                    $file = new SplFileObject('../../uploads/files/client/' . $file_name . '.csv', 'r');
                                                                    $file->seek(PHP_INT_MAX);
                                                                    echo $leads = $file->key() + 1;
                                                                    ?>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr style="border-bottom:none !important;">
                                                            <td>Cost Per/Lead</td>
                                                            <td>_______________ $ 1</td>
                                                        </tr>
                                                        <tr style="border-bottom:none !important;">
                                                            <td>Total Price</td>
                                                            <td>_______________ $ <?= $leads ?></td>
                                                        </tr>
                                                    </table>
                                                    <hr>
                                                    <form method="POST" action="payment.php?leadPay=<?= $leads ?>">
                                                        <input type="hidden" name="file_id" value="<?= $file_name ?>" />
                                                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key=<?= $publishableKey ?> data-amount=<?= $leads * 100 ?> data-currency='usd' data-email=<?= $server->clientData('client_email'); ?> data-image='assets/img/reiLOGO.png'>
                                                        </script>
                                                    </form>
                                                <?php } ?>

                                                <br>
                                                <br>
                                                <br>
                                            </div>

                                        </div>
                                    </div>
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
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#myInput2").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable2 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        document.getElementById('cardNo').oninput = function() {
            var foo = this.value.split(" ").join("");
            if (foo.length > 0) {
                foo = foo.match(new RegExp('.{1,4}', 'g')).join(" ");
            }
            this.value = foo;
        };
    </script>

    <script>
        var totalPrice = document.getElementById('totalPrice').value;
        document.getElementById('totalPrice').onkeypress = function() {
            document.getElementById('totalCost').innerHTML = totalPrice + ' USD';
        };
    </script>

</body>

</html>