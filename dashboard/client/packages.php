<?php
require_once 'server/session.php';
$result = '';

if (isset($_POST['releaseZip'])) {
    $server->release_zip($_POST);
}

if (isset($_POST['uploadFile'])) {
    $result = $server->share_file($_POST);
}

if (isset($_POST['activePackage'])) {
    $result = $server->activePackage($_POST);
}

$title = 'Packages';

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
                    <div class="col-12 col-md-4 col-lg-12 col-xl-4">
                        <div class="card" style="min-height: 366px;">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block text-muted"><i class="fa fa-cube"></i> Choose Zip Code</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4><i class="fas fa-cube" style="color: silver;"></i> Silver</h4>
                                        <h5>10 $/Lead</h5>
                                        <hr>
                                        <ul style="list-style: none;margin-left: -45px;">
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Phone Number
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Email Address
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Mailing Address
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Verified Owner
                                            </li>
                                        </ul>
                                        <?php if ($server->checkPackage('package@czc-silver') > 0) { ?>
                                            <button name="activePackage" class="btn btn-success btn-flat" style="margin-top: 29px;">Activated</button>
                                        <?php } else { ?>
                                            <form method="POST" style="margin-top: 45px;">
                                                <input type="hidden" name="package_category" value="czc">
                                                <input type="hidden" name="package_id" value="package@czc-silver">
                                                <button name="activePackage" class="btn btn-outline-primary btn-flat">Activate</button>
                                            </form>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4><i class="fas fa-cube" style="color: goldenrod;"></i> Gold</h4>
                                        <h5>15 $/Lead</h5>
                                        <hr>
                                        <ul style="list-style: none;margin-left: -45px;">
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Phone Number
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Email Address
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Mailing Address
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Verified Owner
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Full Questionaire
                                            </li>
                                        </ul>

                                        <?php if ($server->checkPackage('package@czc-gold') > 0) { ?>
                                            <button name="activePackage" class="btn btn-success btn-flat">Activated</button>
                                        <?php } else { ?>
                                            <form method="POST">
                                                <input type="hidden" name="package_category" value="czc">
                                                <input type="hidden" name="package_id" value="package@czc-gold">
                                                <button name="activePackage" class="btn btn-outline-primary btn-flat">Activate</button>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-12 col-xl-8">
                        <div class="card" style="min-height: 366px;">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block text-muted" style="color:blueviolet"><i class="fa fa-cube"></i> Upload File & Order</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h4><i class="fas fa-cube text-primary"></i> Basic</h4>
                                        <h5>9 ¢/Lead</h5>
                                        <hr>
                                        <ul style="list-style: none;margin-left: -45px;">
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Phone Number
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Email Address
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Mailing Address
                                            </li>
                                        </ul>

                                        <?php if ($server->checkPackage('package@ufs-basic') > 0) { ?>
                                            <button name="activePackage" class="btn btn-success btn-flat" style="margin-top: 57px;">Activated</button>
                                        <?php } else { ?>
                                            <form method="POST" style="margin-top: 74px;">
                                                <input type="hidden" name="package_category" value="ufs">
                                                <input type="hidden" name="package_id" value="package@ufs-basic">
                                                <button name="activePackage" class="btn btn-outline-primary btn-flat">Activate</button>
                                            </form>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4><i class="fas fa-cube" style="color: blueviolet;"></i> Plus</h4>
                                        <h5>9 ¢/Lead | 5 $/Verified Lead</h5>
                                        <hr>
                                        <ul style="list-style: none;margin-left: -45px;">
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Phone Number
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Email Address
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Mailing Address
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Verified Owner
                                            </li>
                                        </ul>

                                        <?php if ($server->checkPackage('package@ufs-plus') > 0) { ?>
                                            <button name="activePackage" class="btn btn-success btn-flat" style="margin-top: 29px;">Activated</button>
                                        <?php } else { ?>
                                            <form method="POST" style="margin-top: 45px;">
                                                <input type="hidden" name="package_category" value="ufs">
                                                <input type="hidden" name="package_id" value="package@ufs-plus">
                                                <button name="activePackage" class="btn btn-outline-primary btn-flat">Activate</button>
                                            </form>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4><i class="fas fa-cube" style="color: orangered;"></i> Ultra</h4>
                                        <h5>9 ¢/Lead | 5 $/Verified Lead | 10 $/Offer</h5>
                                        <hr>
                                        <ul style="list-style: none;margin-left: -45px;">
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Phone Number
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Email Address
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Mailing Address
                                            </li>
                                            <li class="mb-2 pl-1">
                                                <span><i class="fas fa-check-circle text-success"></i></span> Verified Owner
                                            </li>
                                        </ul>

                                        <?php if ($server->checkPackage('package@ufs-ultra') > 0) { ?>
                                            <button name="activePackage" class="btn btn-success btn-flat" style="margin-top: 29px;">Activated</button>
                                        <?php } else { ?>
                                            <form method="POST" style="margin-top: 45px;">
                                                <input type="hidden" name="package_category" value="ufs">
                                                <input type="hidden" name="package_id" value="package@ufs-ultra">
                                                <button name="activePackage" class="btn btn-outline-primary btn-flat">Activate</button>
                                            </form>
                                        <?php } ?>
                                    </div>
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