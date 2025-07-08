<?php
require_once 'server/session.php';
$result = '';

if (isset($_POST['releaseZip'])) {
    $server->release_zip($_POST);
}

if (isset($_POST['uploadFile'])) {
    $result = $server->share_file($_POST);
}

if (isset($_FILES['file'])) {
    $result = $server->share_file($_POST);
}


$title = 'File Zone';
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
                    <div class="col-12 col-md-3 col-lg-12 col-xl-3 col-sm-3">
                        <div class="card" style="min-height: 253px;">
                            <div class="card-body">
                                <center>
                                    <?php if ($server->hasPackage('ufs') > 0) { ?>
                                        <div class="card wrap" style="width: 150px;height: 150px;border-radius: 0px;margin-top: 10%;cursor: pointer;" id="attachFile">
                                            <div class="card-body text-muted">
                                                <span uk-icon="icon: upload; ratio: 3"></span> <br><br>
                                                Upload File
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="card wrap" style="width: 150px;height: 150px;border-radius: 0px;margin-top: 10%;cursor: pointer;" onclick="selectPackage()">
                                            <div class="card-body text-muted">
                                                <span uk-icon="icon: upload; ratio: 3"></span> <br><br>
                                                Upload File
                                            </div>
                                        </div>
                                        <script>
                                            function selectPackage() {
                                                var ask = window.confirm("Please choose a package first from ``Upload File & Order`` section.");
                                                if (ask) {
                                                    window.location.href = "packages.php";
                                                }
                                            }
                                        </script>
                                    <?php } ?>
                                    <?= $result ?>
                                </center>
                                <div id="fileDetails" style="display: none;">
                                    <h4><span uk-icon="icon: file-text;"></span> File Details</h4>
                                    <table style="width: 100%;" class="table-striped">
                                        <tr>
                                            <td style="width:70px;">File Name</td>
                                            <td>:</td>
                                            <td>
                                                <span id="fileName"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>File Type</td>
                                            <td>:</td>
                                            <td>
                                                <span id="fileType"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>File Size</td>
                                            <td>:</td>
                                            <td>
                                                <span id="fileSize"></span>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <table style="width: 100%;" class="table-bordered">
                                        <tr>
                                            <td style="width: 50%;">
                                                <button class="btn-danger btn-tool btn-flat" style="width: 100%;cursor: pointer;outline: none;" onclick="location.reload()">
                                                    <span uk-icon="close"></span> Cancle
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn-success btn-tool btn-flat" style="width: 100%;cursor: pointer;outline: none;" onclick="document.getElementById('fileUploadForm').submit()">
                                                    <span uk-icon="upload"></span> Upload
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <form method="POST" enctype="multipart/form-data" id="fileUploadForm" hidden>
                                    <input type="file" name="file" id="attachedFile" accept=".csv" onchange="previewFile(this.files[0])">
                                </form>
                            </div>
                            <script>
                                document.getElementById('attachFile').onclick = function() {
                                    document.getElementById('attachedFile').click();
                                };
                            </script>
                            <script>
                                function previewFile(chosenfile) {

                                    const name = chosenfile.name;
                                    const size = chosenfile.size / 1000000 + ' MB';

                                    const lastDot = name.lastIndexOf('.');
                                    const fileName = name.substring(0, lastDot);
                                    const ext = name.substring(lastDot + 1);

                                    document.getElementById('fileName').innerHTML = name
                                    document.getElementById('fileType').innerHTML = ext
                                    document.getElementById('fileSize').innerHTML = size

                                    document.getElementById('attachFile').style.display = 'none'
                                    document.getElementById('fileDetails').style.display = 'block'

                                }
                            </script>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 col-lg-12 col-xl-9 col-sm-9">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block"><span uk-icon="icon: folder"></span> Shared Files</h4>
                                <input placeholder="Search...." id="myInput" style="width: 300px;border:1px solid #E3E3E3;float:right" />
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table-hover mb-0" style="width: 100%;cursor: pointer;">
                                        <thead>
                                            <tr>
                                                <th>Uploaded File</th>
                                                <th>Uploaded On</th>
                                                <th>Total Leads</th>
                                                <th>Status</th>
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
                                                        <a href="../../uploads/files/client/<?= $file_name ?>.csv" target="_blank" title="Download">
                                                            <span uk-icon="download"></span>
                                                        </a>
                                                        <?php
                                                        $arr = explode(".", $file_name, 2);
                                                        echo $arr[0];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?= date('m-d-Y | h:i:s a', strtotime($created_at)); ?>
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
                                                    <td></td>
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