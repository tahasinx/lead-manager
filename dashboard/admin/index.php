<?php
require_once 'server/session.php';
$title = 'Dashboard';
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
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3" style="cursor: pointer;" onclick="window.location='clients.php'">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-user-tie" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?= count($server->clients()) ?></h3>
                                <span class="widget-title1">Clients<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-money"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>$<?= $server->totalTransactions() ?></h3>
                                <span class="widget-title2">Transactions <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-secret" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>0</h3>
                                <span class="widget-title3">Admins<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3" style="cursor: pointer;" onclick="window.location='receivedFiles.php'">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?= count($server->notIn_skipTraced()) ?></h3>
                                <span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
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

</body>

</html>