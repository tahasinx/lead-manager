<?php
require_once 'server/session.php';
$result = '';

if (isset($_POST['releaseZip'])) {
    $server->release_zip($_POST);
}

if (isset($_POST['uploadFile'])) {
    $result = $server->share_file($_POST);
}

$title = 'Registered Zips';
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
                                <h4 class="card-title d-inline-block"><i class="fa fa-map-marker"></i> My Zips
                                    <input placeholder="Search...." id="myInput" style="width: 300px;height:35px;border:1px solid #E3E3E3;margin-left:50px;font-size:15px" />
                                </h4>
                                <a href="zipRegistration.php" class="btn btn-primary btn-flat float-right">
                                    <i class="fa fa-plus"></i> Register a zip
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Zip Code</th>
                                                <th>Country</th>
                                                <th>State</th>
                                                <th>Place</th>
                                                <th>Purchased On</th>
                                                <th class="text-right"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                            $zips = $server->my_zips();
                                            $i = 1;
                                            foreach ($zips as $data) {
                                                extract($data);
                                            ?>
                                                <tr <?php if (isset($_GET['tid']) && $_GET['tid'] == $tracking_id) { ?> style="background: lightblue;" <?php } ?>>
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
                                                    <td class="text-right">
                                                        <button type="button" onclick="window.location='?tid=<?= $tracking_id ?>#upload@file:<?= $tracking_id ?>'" class="btn btn-outline-primary take-btn">
                                                            <i class="fas fa-file-import"></i> Upload File
                                                        </button>

                                                        <button type="button" name="releaseZip" onclick="window.location='?tid=<?= $tracking_id ?>#release@<?= $data['tracking_id'] ?>'" class="btn btn-danger take-btn">
                                                            <i class="fas fa-times"></i> Release Zip
                                                        </button>

                                                    </td>
                                                </tr>

                                                <div class="awesome-modal" id="release@<?= $data['tracking_id'] ?>">
                                                    <a class="close-icon" href="?x=1#close"></a>
                                                    <br>
                                                    <div class="text-center">
                                                        <h4>Are you sure to release this zip code?</h4>
                                                        <small class="text-danger">All related data will be erased!</small>
                                                        <br>
                                                        <br>
                                                        <form method="POST">
                                                            <input type="hidden" name="tracking_id" value="<?= $tracking_id ?>" />
                                                            <input type="hidden" name="zip_code" value="<?= $zip_code ?>" />
                                                            <button type="submit" name="releaseZip" class="btn btn-outline-danger btn-flat" style="width: 60px;">Yes</button>
                                                            <button type="button" class="btn btn-outline-success btn-flat" style="width: 60px;" onclick="window.location='?x=1#close'">No</button>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="awesome-modal" id="upload@file:<?= $tracking_id ?>">
                                                    <a class="close-icon" href="?x=1#close"></a>
                                                    <br>
                                                    <form method="POST" enctype="multipart/form-data" onsubmit="processing<?= $id ?>()">
                                                        <div class="container">
                                                            <div class="form-group row">
                                                                <div class="col-md-12">
                                                                    <br>
                                                                    <h4><?= $result ?></h4>
                                                                    <input type="hidden" name="zip_code" value="<?= $zip_code ?>" required>
                                                                    <input class="form-control" type="file" name="file" accept=".csv" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" name="uploadFile" id="uploadButton<?= $id ?>" class="btn btn-dark" style="float: right;width: 100px;margin-right: 10px;border-radius:0px">
                                                            <i class="fas fa-upload"></i> Upload
                                                        </button>
                                                        <button type="button" id="processingButton<?= $id ?>" class="btn btn-dark" style="display:none;float: right;width: 100px;margin-right: 10px;border-radius:0px">
                                                            <img src="assets/img/processing.gif" style="height: 20px;" />
                                                        </button>
                                                    </form>
                                                    <script>
                                                        function processing<?= $id ?>() {
                                                            document.getElementById('uploadButton<?= $id ?>').style.display = 'none';
                                                            document.getElementById('processingButton<?= $id ?>').style.display = 'block';
                                                        }
                                                    </script>
                                                </div>

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