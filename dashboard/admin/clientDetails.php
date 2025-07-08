<?php
require_once 'server/session.php';

$title = "Clients";

if (isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];
} else {
    $client_id = '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'template/headers.php' ?>
    <style>
        th {
            font-weight: 500;
        }

        .cardx {
            height: 100px;
            width: 100px;
            padding-top: 20px;
            margin: 0px;
            transition: 0.3s;
            cursor: pointer;
        }

        .active-card {
            background: #E3E3E3;
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
                    <?php
                    $clients = $server->clientProfileByID($client_id);
                    foreach ($clients as $data) {
                        extract($data);
                    ?>
                        <div class="col-sm-3">
                            <div class="card">
                                <br>
                                <div class="row container">
                                    <div class="col-sm-4">

                                        <img alt="" src="../../uploads/images/propic/<?= $client_propic ?>" style="height: 100px;width: 100px;cursor: pointer;" onerror="this.onerror=null;this.src='assets/img/user.jpg';" onclick="window.open('../../uploads/images/propic/<?= $client_propic ?>','_blank')">

                                    </div>
                                    <div class="col-sm-8" style="border-left: 1px solid #e3e3e3;">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td colspan="2">
                                                    <h4 class="doctor-name text-ellipsis"><?= $client_firstname . ' ' . $client_lastname ?></h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span uk-icon="mail"></span></td>
                                                <td><?= $client_email ?></td>
                                            </tr>
                                            <tr>
                                                <td><span uk-icon="receiver"></span></td>
                                                <td><?= $client_contact ?></td>
                                            </tr>
                                            <tr>
                                                <td><span uk-icon="social"></td>
                                                <td><?= date('m-d-Y', strtotime($joining_date)) ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="card">
                                <br>
                                <div class="row container">
                                    <div class="col-sm-4">
                                        <div class="card cardx" title="Balance">
                                            <center>
                                                <span uk-icon="icon: hashtag; ratio: 3"></span>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-sm-8" style="min-height: 100px;">
                                        <h4>Current Balance</h4>
                                        <h2>
                                            <?php if ($server->getCurrentBalance($client_id) > 0) { ?>
                                                <span class="text-success">$ <?= $server->getCurrentBalance($client_id) ?></span>
                                            <?php } else { ?>
                                                <span class="text-danger">$ 0.00 </span>
                                            <?php } ?>
                                        </h2>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="card">
                                <br>
                                <div class="row container">
                                    <div class="col-sm-4">
                                        <div class="card cardx <?php if (isset($_GET['sharedFiles'])) { ?> active-card <?php } ?>" title="Files" onclick="showPanel('?client_id=<?= $client_id ?>&sharedFiles=1')">
                                            <center>
                                                <span uk-icon="icon: folder; ratio: 3"></span>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card cardx <?php if (isset($_GET['purchasedZips'])) { ?> active-card <?php } ?>" title="Zips" onclick="showPanel('?client_id=<?= $client_id ?>&purchasedZips=1')">
                                            <center>
                                                <span uk-icon="icon: location; ratio: 3"></span>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card cardx <?php if (isset($_GET['transactions'])) { ?> active-card <?php } ?>" title="Transactions" onclick="showPanel('?client_id=<?= $client_id ?>&transactions=1')">
                                            <center>
                                                <span uk-icon="icon: album; ratio: 3"></span>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-sm-9">
                        <?php if (isset($_GET['sharedFiles'])) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <h4 class="card-title"><span uk-icon="folder"></span> Shared Files [ <span style="color: orangered;"><?= count($server->getReceived_files()) ?></span> ]</h4>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control float-right" placeholder="Search..." id="myInput" style="border-left:none;border-right: none;border-top:none">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" style="height: 700px;overflow: auto;">
                                        <table class="table-striped table-hover mb-0" style="width: 100%;cursor: pointer;">
                                            <thead>
                                                <tr>
                                                    <th>Serial</th>
                                                    <th>File ID</th>
                                                    <th>Uploaded On</th>
                                                    <th>Total Leads</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                <?php
                                                $files = $server->getReceived_files();
                                                $i = 1;
                                                foreach ($files as $data) {
                                                    extract($data);
                                                ?>
                                                    <tr style="height: 30px;<?php if (isset($_GET['trkid']) && $_GET['trkid'] == $tracking_id) { ?> background: lightblue; <?php } ?>">
                                                        <td>
                                                            <?= $i++ ?>
                                                        </td>
                                                        <td>
                                                            <a href="../../uploads/files/client/<?= $file_name ?>.csv" target="_blank" title="Download">
                                                                <span uk-icon="download"></span>
                                                            </a>
                                                            <?php
                                                            $arr = explode(".", $file_name, 2);
                                                            echo $arr[0];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?= date('m-d-Y | h:i:s a', strtotime($created_at)) ?>
                                                        </td>
                                                        <td>
                                                            <?php if (file_exists("../../uploads/files/client/$file_name.csv")) { ?>
                                                                <?php
                                                                $file = new SplFileObject('../../uploads/files/client/' . $file_name . '.csv', 'r');
                                                                $file->seek(PHP_INT_MAX);
                                                                echo $file->key();
                                                                ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <span style="color: blueviolet;">Pending</span>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php
                                                if (count($files) == 0) { ?>
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
                        <?php } ?>

                        <?php if (isset($_GET['purchasedZips'])) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <h4 class="card-title"><span uk-icon="location"></span> Purchased Zips [ <span style="color: orangered;"><?= count($server->clientZips($client_id)) ?></span> ]</h4>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control float-right" placeholder="Search..." id="searchInZips" style="border-left:none;border-right: none;border-top:none">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" style="height: 700px;overflow: auto;">
                                        <table class="table-striped mb-0" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Serial</th>
                                                    <th>Zip Code</th>
                                                    <th>Country</th>
                                                    <th>State</th>
                                                    <th>Place</th>
                                                    <th>Purchased On</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableOfZips">
                                                <?php
                                                $zips = $server->clientZips($client_id);
                                                $i = 1;
                                                foreach ($zips as $data) {
                                                    extract($data);
                                                ?>
                                                    <tr style="height: 30px;">
                                                        <td>
                                                            <?= $i++ ?>
                                                        </td>
                                                        <td>
                                                            <?= $zip_code ?>
                                                        </td>
                                                        <td>
                                                            <?= $country ?>
                                                        </td>
                                                        <td>
                                                            <?= $state_name ?>
                                                        </td>
                                                        <td>
                                                            <?= $place_name ?>
                                                        </td>
                                                        <td>
                                                            <?= date('m-d-Y | h:i:s a', strtotime($updated_at)) ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php
                                                if (count($zips) == 0) { ?>
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
                        <?php } ?>

                        <?php if (isset($_GET['transactions'])) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <h4 class="card-title"><span uk-icon="hashtag"></span> Transactions [ <span style="color: orangered;"><?= count($server->transactions()) ?></span> ]</h4>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control float-right" placeholder="Search..." id="searchInTransaction" style="border-left:none;border-right: none;border-top:none">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" style="height: 700px;overflow: auto;">
                                        <table class="table-striped mb-0" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Serial</th>
                                                    <th>Payment ID</th>
                                                    <th>Transaction On</th>
                                                    <th>Amount</th>
                                                    <th>Transaction Type</th>
                                                    <th>Source</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableOfTransaction">
                                                <?php
                                                $transactions = $server->transactions();
                                                $i = 1;
                                                foreach ($transactions as $data) {
                                                    extract($data);
                                                ?>
                                                    <tr style="height: 30px;">
                                                        <td>
                                                            <?= $i++ ?>
                                                        </td>
                                                        <td <?php if (isset($_GET['pid']) && $_GET['pid'] == $payment_id) { ?> style="background: lightblue;" <?php } ?>>
                                                            <?= $payment_id ?>
                                                        </td>
                                                        <td>
                                                            <?= date('m-d-Y | h:i:s a', strtotime($created_at)) ?>
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
                                                                <a href="?client_id=<?= $_GET['client_id'] ?>&pid=<?= $payment_id ?>&transactions=1#zips@<?= $payment_id ?>">Zips</a>
                                                            <?php } elseif ($for_leads == 1) { ?>
                                                                <a href="?client_id=<?= $_GET['client_id'] ?>&pid=<?= $payment_id ?>&transactions=1#file@<?= $payment_id ?>">Leads</a>
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
                                            <?php if ($for_zips == 1 && isset($_GET['pid']) && $_GET['pid'] == $payment_id) { ?>

                                                <div class="awesome-modal" id="zips@<?= $payment_id ?>" style="width: 50%;">
                                                    <a class="close-icon" href="?client_id=<?= $_GET['client_id'] ?>&pid=1&transactions=1#close"></a>
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
                                                    <a class="close-icon" href="?client_id=<?= $_GET['client_id'] ?>&pid=1#close"></a>
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
                        <?php } ?>

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

    <script>
        $(document).ready(function() {
            $("#searchInTransaction").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableOfTransaction tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#searchInZips").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableOfZips tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        function showPanel(url) {
            window.location = url
        }
    </script>
</body>

</html>