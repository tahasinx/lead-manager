<?php
require_once 'server/session.php';
$result = '';

if (isset($_POST['pullLeads'])) {
    $result = $server->pullNewLeadsFrom_reiwebsuite();
}

$title = 'Data Center';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'template/headers.php' ?>
    <style>
        th {
            font-weight: 500;
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
                    <div class="col-12 col-md-3 col-lg-12 col-xl-3 col-sm-3">
                        <div class="card" style="min-height: 253px;">
                            <div class="card-body">
                                <center>
                                    <div class="card wrap" style="width: 150px;height: 150px;border-radius: 0px;margin-top: 10%;cursor: pointer;" onclick="document.getElementById('pullLeads').submit()">
                                        <div class="card-body text-muted">
                                            <span uk-icon="icon: pull; ratio: 3"></span> <br><br>
                                            Pull Leads
                                        </div>
                                    </div>
                                    <?= $result ?>
                                </center>

                                <form method="POST" id="pullLeads" hidden>
                                    <input type="hidden" name="pullLeads" value="1">
                                </form>

                            </div>
                        </div>
                        <div class="card container">
                            <div class="card-header">
                                <span uk-icon="icon: location;"></span> Available Zip Codes
                                <input type="text" class="form-control float-right" placeholder="Search..." id="searchInZips" style="border-left:none;border-right: none;border-top:none">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="height: 420px;overflow: auto;">
                                    <table class="table table-hover" style="cursor: pointer;">
                                        <tbody id="tableOfZips">
                                            <?php
                                            $zips = $server->getZips();
                                            foreach ($zips as $data) :
                                            ?>
                                                <tr onclick="window.location='?zip_code=<?= $data['contact_zip'] ?>'">
                                                    <td style="border-right:1px solid #e3e3e3;width:50px">
                                                        <span uk-icon="icon: location;"></span>
                                                    </td>
                                                    <td>
                                                        <?= $data['contact_zip'] ?>
                                                    </td>
                                                    <td style="width: 40px;">
                                                        <span uk-icon="icon: chevron-right;"></span>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 col-lg-12 col-xl-9 col-sm-9">
                        <?php if (isset($_GET['zip_code'])) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title d-inline-block"><span uk-icon="icon: database"></span> <span style="color: blueviolet;">Data Table</span> | Zip Code: <?= $_GET['zip_code'] ?> | Total Lead: <?= count($server->leadsFromSkipNCall($_GET['zip_code'])) ?></h4>
                                    <input placeholder="Search...." id="myInput" class="form-control float-right" style="width: 300px;border-left:none;border-right: none;border-top:none" />
                                </div>
                                <div class="card-body" style="height: 772px;overflow: auto;">
                                    <div class="table-responsive">
                                        <table class="table-striped table-hover mb-0" style="width: 100%;cursor: pointer;">
                                            <thead>
                                                <tr>
                                                    <th>Serial</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Email</th>
                                                    <th>Country</th>
                                                    <th>Contact Type</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                <?php
                                                $i = 1;
                                                $leads = $server->leadsFromSkipNCall($_GET['zip_code']);
                                                foreach ($leads as $data) {
                                                    extract($data);
                                                ?>
                                                    <tr style="height: 30px;">
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $contact_firstname ?></td>
                                                        <td><?= $contact_lastname ?></td>
                                                        <td><?= $contact_address ?></td>
                                                        <td><?= $contact_city ?></td>
                                                        <td><?= $contact_state ?></td>
                                                        <td><?= $contact_email ?></td>
                                                        <td><?= $contact_country ?></td>
                                                        <td><?= $contact_type ?></td>
                                                        <td>
                                                            <?php if ($is_verified == 1) { ?>
                                                                <span class="text-success">Verified</span>
                                                            <?php } else { ?>
                                                                <span class="text-danger">Unverified</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <span class="text-success">Sold</span>
                                                        </td>
                                                    </tr>
                                                <?php
                                                } ?>
                                                <?php if (count($leads) == 0) { ?>
                                                    <tr>
                                                        <td colspan="20" class="text-danger">
                                                            No record found.
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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
            $("#searchInZips").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableOfZips tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
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