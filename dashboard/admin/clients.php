<?php
require_once 'server/session.php';

$title = "Clients";

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
                <?php
                $clients = $server->clients();
                foreach ($clients as $data) {
                    extract($data);
                ?>
                    <div class="row doctor-grid">
                        <div class="col-md-4 col-sm-4  col-lg-3">
                            <div class="card">
                                <div class="dropdown profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span uk-icon="more"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="clientDetails.php?client_id=<?= $client_id ?>">
                                        <span uk-icon="user"></span> &nbsp;Profile</a>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row container">
                                    <div class="col-sm-4">                            
                                            <img alt="" src="../../uploads/images/propic/<?= $client_propic ?>" style="height: 100px;width: 100px;cursor: pointer;" onerror="this.onerror=null;this.src='assets/img/user.jpg';" onclick="window.open('../../uploads/images/propic/<?= $client_propic ?>','_blank')">
                                    </div>
                                    <div class="col-sm-8">
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
                                                <td><?= date('m-d-Y',strtotime($joining_date)) ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>

    <div class="sidebar-overlay" data-reff=""></div>

    <!-- scripts -->
    <?php include 'template/js-links.php' ?>

</body>

</html>