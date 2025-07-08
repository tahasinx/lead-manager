<?php
require_once 'server/session.php';

$title = 'Transaction';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'template/headers.php' ?>
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
                    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h4 class="card-title d-inline-block text-primary"><span uk-icon="album"></span> My Transactions</h4>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" id="myInput" class="form-control" style="width: 300px;border-left:none;border-right: none;border-top:none" placeholder="Search...">
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-control float-right" style="width: 300px;" onchange="window.location=this.value">
                                            <option disabled selected>Choose Client...</option>
                                            <?php if (isset($_GET['client_id'])) { ?>
                                                <option value="?x=all">View All</option>
                                            <?php } ?>
                                            <?php
                                            $clients = $server->clients();
                                            foreach ($clients as $data) { ?>
                                                <option <?php if (isset($_GET['client_id']) && $data['client_id'] == $_GET['client_id']) { ?> selected <?php } ?> value="?client_id=<?= $data['client_id'] ?>"><?= $data['client_firstname'] ?> <?= $data['client_lastname'] ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Client Name</th>
                                                <th>Payment ID</th>
                                                <th>Transaction On</th>
                                                <th>Amount</th>
                                                <th>Transaction Type</th>
                                                <th>Source</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                            $transactions = $server->transactions();
                                            $i = 1;
                                            foreach ($transactions as $data) {
                                                extract($data);
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>
                                                    <td>
                                                        <a href="?pid=<?= $payment_id ?>&showProfile=1#client@<?= $payment_id ?>" style="color: lightblue;">
                                                            <span uk-icon="user"></span>
                                                        </a>
                                                        <?= $server->clientData($client_id, 'client_firstname') ?>
                                                        <?= $server->clientData($client_id, 'client_lastname') ?>
                                                    </td>
                                                    <td <?php if (isset($_GET['pid']) && $_GET['pid'] == $payment_id) { ?> style="background: lightblue;" <?php } ?>>
                                                        <?= $payment_id ?>
                                                    </td>
                                                    <td>
                                                        <?= $created_at ?>
                                                    </td>
                                                    <td>
                                                        $<?= $amount ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($for_zips == 1) { ?>
                                                            Zip registration
                                                        <?php } elseif ($for_leads == 1) { ?>
                                                            Lead Purchase
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($for_zips == 1) { ?>
                                                            <a href="?pid=<?= $payment_id ?>#zips@<?= $payment_id ?>">Zips</a>
                                                        <?php } elseif ($for_leads == 1) { ?>
                                                            <a href="?pid=<?= $payment_id ?>#file@<?= $payment_id ?>">Leads</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php
                                            if (count($transactions) == 0) { ?>
                                                <tr>
                                                    <td colspan="10" class="text-danger">No record found.</td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    foreach ($transactions as $data) {
                                        extract($data);
                                    ?>
                                        <?php if (isset($_GET['showProfile']) && isset($_GET['pid']) && $_GET['pid'] == $payment_id) { ?>
                                            <div class="awesome-modal" id="client@<?= $payment_id ?>">
                                                <a class="close-icon" href="?pid=1#close"></a>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div style="border:1px solid;width: 102px;height:102px">
                                                            <img alt="" src="../../uploads/images/propic/<?= $server->clientData($client_id, 'client_propic') ?>" onerror="this.onerror=null;this.src='assets/img/user.jpg';" style="width: 100px;height:100px">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <h4><?= $server->clientData($client_id, 'client_firstname') ?> <?= $server->clientData($client_id, 'client_lastname') ?></h4>
                                                        <h5>
                                                            <span uk-icon="mail"></span>
                                                            <?= $server->clientData($client_id, 'client_email') ?>
                                                        </h5>
                                                        <h5>
                                                            <span uk-icon="receiver"></span>
                                                            <?= $server->clientData($client_id, 'client_contact') ?>
                                                        </h5>

                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        <?php } ?>
                                        <?php if ($for_zips == 1 && isset($_GET['pid']) && $_GET['pid'] == $payment_id) { ?>

                                            <div class="awesome-modal" id="zips@<?= $payment_id ?>" style="width: 50%;">
                                                <a class="close-icon" href="?pid=1#close"></a>
                                                <br>
                                                <div class="container table-responsive">
                                                    <table class="tableSelected" style="width: 100%;">
                                                        <tr>
                                                            <th>Zip Code</th>
                                                            <th>State</th>
                                                            <th>City</th>
                                                            <th>County</th>
                                                            <th>Price/Month</th>
                                                        </tr>
                                                        <?php
                                                        $zipSBy_pid = $server->zipSBy_pid($payment_id);

                                                        foreach ($zipSBy_pid as $x) {
                                                        ?>
                                                            <tr style="border: 1px solid #E3E3E3 !important;">
                                                                <td><?= $x['zip_code'] ?></td>
                                                                <td><?= $x['state_name'] ?></td>
                                                                <td><?= $x['city'] ?></td>
                                                                <td><?= $x['county'] ?></td>
                                                                <td>$<?= $x['price'] ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                            </div>

                                        <?php } elseif ($for_leads == 1 && $server->getFile_by_pid($payment_id) <> 'N/A' && isset($_GET['pid']) && $_GET['pid'] == $payment_id) { ?>
                                            <div class="awesome-modal" id="file@<?= $payment_id ?>">
                                                <a class="close-icon" href="?pid=1#close"></a>
                                                <br>
                                                <br>
                                                <div class="card container table-responsive">
                                                    <div class="card-body">
                                                        <table class="" style="width: 100%;">
                                                            <tr>
                                                                <td><i class="fas fa-file-alt"></i></td>
                                                                <td><?= $file_name = $server->getFile_by_pid($payment_id) ?>.csv</td>
                                                                <td style="float: right;">
                                                                    <button class="btn btn-secondary" onclick="window.location='../../uploads/files/admin/<?= $file_name ?>.csv'" style="color:#E3E3E3">
                                                                        <i class="fas fa-download"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    <?php } ?>
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
        });
    </script>
</body>

</html>