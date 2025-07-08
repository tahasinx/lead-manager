<?php
require_once 'server/session.php';
$result = '';

if (isset($_POST['uploadFile'])) {
    $result = $server->share_file($_POST);
}

$title = 'Shared Files';

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
                                <h4 class="card-title d-inline-block text-primary"><i class="fa fa-folder-open"></i> Shared Files</h4>
                                <select class="form-control float-right" style="width: 300px;" onchange="window.location=this.value">
                                    <option disabled selected>Choose Client...</option>
                                    <?php if (isset($_GET['client_id'])) { ?>
                                        <option value="?x=all">View All</option>
                                    <?php } ?>
                                    <?php
                                    $clients = $server->clients();
                                    foreach ($clients as $data) { ?>
                                        <option <?php if (isset($_GET['client_id']) && $data['client_id'] == $_GET['client_id']) { ?> selected <?php } ?> value="?client_id=<?= $data['client_id'] ?>"><?= $data['client_firstname'] ?> <?= $data['client_lastname'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table-hover mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>File ID</th>
                                                <th>Client Name</th>
                                                <th>Uploaded On</th>
                                                <th>Total Leads</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                            $files = $server->getShared_files();
                                            $i = 1;
                                            foreach ($files as $data) {
                                                extract($data);
                                            ?>
                                                <tr style="height: 30px;">
                                                    <td>
                                                        <?php
                                                        $arr = explode(".", $file_name, 2);
                                                        echo $arr[0];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <span uk-icon="user" onclick="window.location='#client@<?= $data['tracking_id'] ?>'" style="cursor: pointer;color:lightblue"></span>
                                                        <?= $server->clientData($client_id, 'client_firstname') ?>
                                                        <?= $server->clientData($client_id, 'client_lastname') ?>
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
                                                                        <i class="fas fa-envelope"></i>
                                                                        <?= $server->clientData($client_id, 'client_email') ?>
                                                                    </h5>
                                                                    <h5>
                                                                        <i class="fas fa-phone"></i>
                                                                        <?= $server->clientData($client_id, 'client_contact') ?>
                                                                    </h5>

                                                                </div>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?= $created_at ?>
                                                    </td>
                                                    <td>
                                                        <?php if (file_exists("../../uploads/files/admin/$file_name.csv")) { ?>
                                                            <?php
                                                            $file = new SplFileObject('../../uploads/files/admin/' . $file_name . '.csv', 'r');
                                                            $file->seek(PHP_INT_MAX);
                                                            echo $file->key() + 1;
                                                            ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="../../uploads/files/client/<?= $file_name ?>.csv" class="float-right" target="_blank">
                                                            <i class="fas fa-file-download"></i> Download</a>
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
            $("#myInput").on("change", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

</body>

</html>