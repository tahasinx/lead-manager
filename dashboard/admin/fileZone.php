<?php
require_once 'server/session.php';
$result = '';

if (isset($_POST['releaseZip'])) {
    $server->release_zip($_POST);
}

if (isset($_POST['uploadFile'])) {
    $result = $server->share_file($_POST);
}

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
                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block text-primary"><i class="fa fa-folder-open"></i> Shared Files</h4>
                                <input placeholder="Search...." id="myInput" style="width: 300px;border:1px solid #E3E3E3;float:right" />
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table-hover mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Zip Code</th>
                                                <th>File ID</th>
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
                                                        <?= $zip_code ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $arr = explode(".", $file_name, 2);
                                                        echo $arr[0];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= $created_at ?>
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
                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block" style="color:blueviolet"><i class="fa fa-folder-open"></i> Received Files</h4>
                                <input placeholder="Search...." id="myInput2" style="width: 300px;border:1px solid #E3E3E3;float:right" />
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table-hover mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Zip Code</th>
                                                <th>File ID</th>
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
                                                        <?= $zip_code ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $arr = explode(".", $file_name, 2);
                                                        echo $arr[0];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= $created_at ?>
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
                                                    <td>
                                                        <a href="../../uploads/files/client/<?= $file_name ?>.csv" class="float-right" target="_blank" style="color:blueviolet">
                                                            <i class="fas fa-lock"></i> Unlock</a>
                                                        <!-- <a href="../../uploads/files/client/<?= $file_name ?>.csv" class="float-right" target="_blank">
                                                            <i class="fas fa-file-download"></i> Download</a> -->
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
            $("#myInput2").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable2 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

</body>

</html>