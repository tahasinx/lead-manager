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

if (isset($_POST['saveBillingInfo'])) {
    $result = $server->saveBilling_info($_POST);
}

$title = 'Balance & Billings';
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

        .loader {
            display: none;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
        }

        .loading {
            border: 2px solid #ccc;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border-top-color: #1ecd97;
            border-left-color: #1ecd97;
            animation: spin 1s infinite ease-in;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
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
                                <h4 class="card-title d-inline-block"><i class="fa fa-file-invoice-dollar"></i> Balance & Billings</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="container">
                                            <h3>Balance</h3>
                                            <h4 style="text-align: justify;">
                                                Your credits will automatically be replenished with the below amount when your balance reaches $0.
                                            </h4>
                                            <br>
                                            <h5>Current Balance</h5>
                                            <?php
                                            if ($currentBalance > 0) { ?>
                                                <h1>
                                                    <span class="text-success">$<?= $currentBalance ?></span>
                                                </h1>
                                            <?php } else { ?>
                                                <h1>
                                                    <span style="color:orangered">$0.00</span>
                                                </h1>
                                            <?php } ?>

                                            <br>
                                            <hr>
                                            <h5>Add Fund [ Min: $50 ]</h5>
                                            <form method="POST" action="@gateway.php" onsubmit="spinner()">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td>
                                                            <div class="sign-box">
                                                                <div class="input-field" style="width: 100%">
                                                                    <input id="amount" name="amount" type="number" min="50" class="input" required>
                                                                    <label for="amount" class="label">
                                                                        Amount <span class="text-danger">*</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-dark btn-flat" style="height: 45px;">
                                                                Add Fund
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <?php if (isset($_SESSION['fromPayemntGateway'])) { ?>
                                            <div class="awesome-modal  text-center" id="@successfulPayment">
                                                <a class="close-icon" href="#close"></a>
                                                <br>
                                                <br>
                                                <span class="text-success" style="font-size: 20px;">
                                                    <i class="fas fa-check-circle"></i> Congrats! Balance Successfully Funded.
                                                </span>
                                                <br>
                                                <br>
                                            </div>

                                            <div class="awesome-modal  text-center" id="@unsuccessfulPayment">
                                                <a class="close-icon" href="#close"></a>
                                                <br>
                                                <br>
                                                <span class="text-danger" style="font-size: 20px;">
                                                    <i class="fas fa-check-circle"></i> Payment process aborted.
                                                </span>
                                                <br>
                                                <br>
                                            </div>
                                        <?php
                                            unset($_SESSION['fromPayemntGateway']);
                                        } ?>
                                        <?php ?>

                                    </div>
                                    <div class="col-sm-7">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h3>Billings</h3>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input placeholder="Search...." id="myInput" style="width: 300px;border:1px solid #E3E3E3;float: right;" />
                                                </div>
                                            </div>
                                            <table class="table-striped mb-0" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Payment ID</th>
                                                        <th>Month</th>
                                                        <th>Year</th>
                                                        <th>Paid At</th>
                                                        <th style="width: 60px;">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="myTable">
                                                    <?php
                                                    $topUps = $server->getTopUps();
                                                    $i = 1;
                                                    foreach ($topUps as $data) {
                                                        extract($data);
                                                    ?>
                                                        <tr>
                                                            <td>

                                                                <?= $i++ ?>
                                                            </td>
                                                            <td>
                                                                <?= $payment_id ?>
                                                            </td>
                                                            <td><?= $payment_month ?></td>
                                                            <td><?= $payment_year ?></td>
                                                            <td>
                                                                <?= date('d-m-Y h:i:s a', strtotime($created_at)) ?>
                                                            </td>
                                                            <td>
                                                                $<?= $funded_balance ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php
                                                    if (count($topUps) == 0) { ?>
                                                        <tr>
                                                            <td colspan="10" class="text-danger">No record found.</td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="loader">
                    <div class="loading">
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
        $(document).ready(function() {
            $("#amount").focus();
        });
    </script>


    <script>
        var totalPrice = document.getElementById('totalPrice').value;
        document.getElementById('totalPrice').onkeypress = function() {
            document.getElementById('totalCost').innerHTML = totalPrice + ' USD';
        };
    </script>

    <script type="text/javascript">
        function spinner() {
            document.getElementsByClassName("loader")[0].style.display = "block";
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>