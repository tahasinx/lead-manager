<?php
require_once 'server/session.php';
$result = '';

if (isset($_POST['uploadFile'])) {
    $result = $server->share_file($_POST);
}

$title = 'Received Files';
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
                                        <h4 class="card-title d-inline-block text-primary"><i class="fa fa-folder-open"></i> Received Files</h4>
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
                                    <table class="table-bordered table-striped table-hover mb-0" style="width: 100%;cursor: pointer;">
                                        <thead>
                                            <tr>
                                                <th style="width: 20%;">File ID</th>
                                                <th style="width: 20%;">Payment ID</th>
                                                <th>Client Name</th>
                                                <th>Uploaded On</th>
                                                <th>Total Leads</th>
                                                <th>Raw File</th>
                                                <th>SkipTraced File</th>
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
                                                        <?php
                                                        $arr = explode(".", $file_name, 2);
                                                        echo $arr[0];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($server->is_purchased($file_name) == 'N/A') { ?>
                                                            <span class="text-danger">Not paid yet</span>
                                                        <?php } else { ?>
                                                            <?= $server->is_purchased($file_name) ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="#client@<?= $data['tracking_id'] ?>" style="color: lightblue;">
                                                            <span uk-icon="user"></span>
                                                        </a>
                                                        <?= $server->clientData($client_id, 'client_firstname') ?>
                                                        <?= $server->clientData($client_id, 'client_lastname') ?>
                                                    </td>
                                                    <td>
                                                        <?= date('m-d-Y | h:i a', strtotime($created_at)) ?>
                                                    </td>
                                                    <td>
                                                        <?php if (file_exists("../../uploads/files/client/$file_name.csv")) { ?>
                                                            <?php
                                                            $file = new SplFileObject('../../uploads/files/client/' . $file_name . '.csv', 'r');
                                                            $file->seek(PHP_INT_MAX);
                                                            echo $file->key() + 1;
                                                            ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td style="width: 100px;">
                                                        <a href="../../uploads/files/client/<?= $file_name ?>.csv" target="_blank">
                                                            <span uk-icon="download"></span> Download</a>
                                                    </td>
                                                    <td style="width: 200px;">
                                                        <?php if ($server->isIn_skipTraced($file_name) == 1) { ?>
                                                            <a href="../../uploads/files/admin/<?= $file_name ?>.csv" target="_blank" class="text-success">
                                                                <span uk-icon="download"></span> Download
                                                            </a>
                                                            |
                                                            <a href="#" onclick="window.location='shareSkipTracedFile.php?tracking_id=<?= $tracking_id ?>&client_id=<?= $client_id ?>&fileName=<?= $file_name ?>'" class="text-danger">
                                                                <span class="fas fa-times"></span> Remove
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="#" onclick="window.location='shareSkipTracedFile.php?tracking_id=<?= $tracking_id ?>&client_id=<?= $client_id ?>&fileName=<?= $file_name ?>'" class="float-right" style="width: 100%;" href="shareSkipTracedFile.php"><span uk-icon="upload"></span> Upload</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <div class="awesome-modal" id="client@<?= $data['tracking_id'] ?>">
                                                    <a class="close-icon" href="#close"></a>
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