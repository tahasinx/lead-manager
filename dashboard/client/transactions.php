<?php
require_once 'server/session.php';

$title = 'Transactions';

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
                                <h4 class="card-title d-inline-block"><i class="fa fa-exchange-alt"></i> My Transactions</h4>
                                <input placeholder="Search...." id="myInput" style="width: 300px;border:1px solid #E3E3E3;float: right;" />
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Amount</th>
                                                <th>Transaction ID</th>
                                                <th>Transaction On <small class="text-muted">m-d-yyyy _ time</small></th>
                                                <th>Transaction Type</th>
                                                <th>Source</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                            $transactions = $server->my_transactions();
                                            $i = 1;
                                            foreach ($transactions as $data) {
                                                extract($data);
                                            ?>
                                                <tr>
                                                    <td>

                                                        <?= $i++ ?>
                                                    </td>
                                                    <td>
                                                        $<?= $amount ?>
                                                    </td>
                                                    <td <?php if (isset($_GET['pid']) && $_GET['pid'] == $payment_id) { ?> style="background: lightblue;" <?php } ?>>
                                                        <?= $payment_id ?>
                                                    </td>
                                                    <td>
                                                        <?= date('m-d-Y _ h:i:s a', strtotime($created_at)) ?>
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
                                        <?php if ($for_zips == 1) { ?>

                                            <div class="awesome-modal" id="zips@<?= $payment_id ?>" style="width: 50%;">
                                                <a class="close-icon" href="?pid=1#close"></a>
                                                <br>
                                                <div class="container table-responsive">
                                                    <table class="tableSelected" style="width: 100%;">
                                                        <tr>
                                                            <th>Zip Code</th>
                                                            <th>Country</th>
                                                            <th>State</th>
                                                            <th>Place</th>
                                                            <th>Price/Month</th>
                                                        </tr>
                                                        <?php
                                                        $zipSBy_pid = $server->zipSBy_pid($payment_id);

                                                        foreach ($zipSBy_pid as $x) {
                                                        ?>
                                                            <tr style="border: 1px solid #E3E3E3 !important;">
                                                                <td><?= $x['zip_code'] ?></td>
                                                                <td><?= $x['country'] ?></td>
                                                                <td><?= $x['state_name'] ?></td>
                                                                <td><?= $x['place_name'] ?></td>
                                                                <td>$<?= $x['price'] ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                            </div>

                                        <?php } elseif ($for_leads == 1 && $server->getFile_by_pid($payment_id) <> 'N/A') { ?>
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