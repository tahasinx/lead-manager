<?php
require_once 'server/session.php';
require_once 'server/config.php';

$state  = "";
$result = "";

if (isset($_GET['state'])) {
    $state = $_GET['state'];
}

if (isset($_POST['checkout'])) {
    $result = $server->purchase_zips($_POST);
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
                                <h4 class="card-title d-inline-block"><i class="fa fa-map-marked-alt"></i> Selected Zips</h4>
                            </div>
                            <div class="card-body p-0">

                                <form method="POST">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="container table-responsive">
                                                <table class="tableSelected" style="width: 100%;">
                                                    <tr style="border-bottom: 1px solid #E3E3E3 !important;">
                                                        <th>Zip Code</th>
                                                        <th>Country</th>
                                                        <th>State</th>
                                                        <th>Place</th>
                                                        <th>Price/Month</th>
                                                        <th>Status</th>
                                                        <th style="width: 5%;"></th>
                                                    </tr>
                                                    <?php
                                                    foreach ($selectedZips as $x) {
                                                    ?>
                                                        <tr style="border-bottom: 1px solid #E3E3E3 !important;">
                                                            <td>
                                                                <?= $x['zip_code'] ?>
                                                                <input type="hidden" name="zipCode[]" value="<?= $x['zip_code'] ?>">
                                                            </td>
                                                            <td><?= $x['country'] ?></td>
                                                            <td><?= $x['state_name'] ?></td>
                                                            <td><?= $x['place_name'] ?></td>
                                                            <td>$<?= $x['price'] ?></td>
                                                            <td>
                                                                <?php
                                                                if ($server->is_occupied($x['zip_code']) == 1) { ?>
                                                                    <span class="text-danger"><i class="fas fa-times"></i> Not Available</span>
                                                                <?php } else { ?>
                                                                    <span class="text-success">Available</span>
                                                                <?php }
                                                                ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <form method="POST">
                                                                    <input type="hidden" name="tracking_id" value="<?= $x['tracking_id'] ?>">
                                                                    <button class="btn btn-danger" name="removeSelection"><i class="fa fa-times"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php
                                                    if (count($selectedZips) == 0) { ?>
                                                        <tr>
                                                            <td colspan="10" class="text-danger">No record found.</td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                </table>
                                                <br>
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-3">
                                            <div class="container fieldset">
                                                <div class="sign-box">
                                                    <h3>PAYMENT GATEWAY</h3>
                                                    <hr>
                                                    <?php
                                                    if ($result == 'success') { ?>
                                                        <h4 class="text-success">
                                                            Privious transaction was completed successsfully.
                                                        </h4>
                                                    <?php } ?>
                                                    <?php
                                                    if ($result == 'balanceError') { ?>
                                                        <h4 class="text-danger">
                                                            Insufficient balance! Please <a href="balanceNbilling.php">add balance</a> into your account.
                                                        </h4>
                                                    <?php } ?>
                                                    <?php
                                                    if (count($selectedZips) > 0) {
                                                    ?>
                                                        <table style="width: 100%;">
                                                            <tr style="border-bottom:none !important;">
                                                                <td>Total Zip</td>
                                                                <td>_______________ <?= count($selectedZips) ?></td>
                                                            </tr>
                                                            <tr style="border-bottom:none !important;">
                                                                <td>Total Amount</td>
                                                                <td>_______________ $ <?= $server->totalCost_ofSelection() ?></td>
                                                            </tr>
                                                        </table>
                                                        <hr>

                                                        <button class="btn btn-outline-dark btn-flat float-right" name="checkout">Checkout</button>
                                                    <?php } ?>
                                                    <br>
                                                    <br>
                                                    <br>
                                                </div>

                                            </div>
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
        $('#currentBalance').load(window.location.href + " #currentBalance");
    </script>

</body>

</html>