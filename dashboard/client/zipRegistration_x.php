<?php
require_once 'server/session.php';

$state  = "";
$result = "";

if (isset($_GET['state'])) {
    $state = $_GET['state'];
}

if (isset($_POST['selectZip'])) {
    $server->select_zip($_POST);
}

$title = 'Zip Registration';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'template/headers.php' ?>
    <style>
        .table tbody tr th {
            min-width: 200px;
        }

        .table tbody tr td {
            min-width: 200px;
        }

        .table tbody {
            display: block;
            max-height: 700px;
            overflow-y: scroll;
            cursor: pointer;
        }

        .table thead,
        .table tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .table tr:hover {
            background: lightblue;
        }

        .tableSelected td {
            border-bottom: 1px solid #E3E3E3 !important;
        }

        tr {
            border-bottom: 1px solid #E3E3E3 !important;
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
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block"><i class="fa fa-map"></i> STATES </h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Select State</th>
                                                <th style="width: 70%;">
                                                    <input placeholder="search..." style="width: 100%;" id="myInput" />
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                            $states = $server->get_states();
                                            foreach ($states as $data) {
                                            ?>
                                                <tr colspan="2" onclick="window.location='?state=<?= $data['state_name'] ?>&id=<?= $data['id'] ?>#state-<?= $data['id'] ?>'" <?php if (isset($_GET['state']) && $_GET['state'] == $data['state_name']) { ?> style="background: lightblue;" <?php } ?>>
                                                    <td>
                                                        <div id="state-<?= $data['id'] ?>"><?= $data['state_name'] ?></div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['state'])) {
                    ?>
                        <div class="col-xl-9">
                            <div class="card" style="min-height: 200px;">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h4 class="card-title d-inline-block"><i class="fa fa-map"></i> State: <span style="color:orangered"><?= $_GET['state'] ?></span> [ Zip Codes ]</h4>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" style="width: 100%;height: 30px;border:1px solid #E3E3E3" placeholder="search" id="myInput2">
                                        </div>
                                        <div class="col-sm-5"></div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="container table-responsive">
                                        <table class="table-striped" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Zip Code</th>
                                                    <th>State</th>
                                                    <th>City</th>
                                                    <th>County</th>
                                                    <th>Price/Month</th>
                                                    <th>Status</th>
                                                    <th style="width: 15%;text-align:right"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable2">
                                                <?php
                                                $zips = $server->get_zips($state);
                                                foreach ($zips as $data) {
                                                ?>
                                                    <tr <?php if ($data['is_occupied'] == 1) { ?>style="background: lightblue;" <?php } ?>>
                                                        <td>
                                                            <div><?= $data['zip_code'] ?></div>
                                                        </td>
                                                        <td>
                                                            <div><?= $data['state_name'] ?></div>
                                                        </td>
                                                        <td>
                                                            <div><?= $data['city'] ?></div>
                                                        </td>
                                                        <td>
                                                            <div><?= $data['county'] ?></div>
                                                        </td>
                                                        <td>
                                                            <div>$<?= $data['price'] ?></div>
                                                        </td>
                                                        <td>
                                                            <?php if ($data['is_occupied'] == 1) { ?>
                                                                <span class="tex-danger">Occupied</span>
                                                            <?php } else { ?>
                                                                <span class="text-success">Available</span>
                                                            <?php }
                                                            ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?php if ($server->isOccupied_byMe($data['zip_code']) == 1) { ?>
                                                                <button type="button" class="btn btn-primary take-btn" style="width: 100px;">
                                                                    Purchased
                                                                </button>
                                                            <?php } elseif ($server->isIn_selection($data['zip_code']) == 1) { ?>
                                                                <button type="button" class="btn btn-success take-btn" style="width: 100px;">
                                                                    Selected
                                                                </button>
                                                            <?php } elseif ($data['is_occupied'] == 1) { ?>
                                                                <button type="button" class="btn btn-dark take-btn" style="width: 100px;">
                                                                    Occupied
                                                                </button>
                                                            <?php } else { ?>
                                                                <form method="POST">
                                                                    <input type="hidden" name="zip_code" value="<?= $data['zip_code'] ?>" />
                                                                    <input type="hidden" name="state_name" value="<?= $data['state_name'] ?>" />
                                                                    <input type="hidden" name="city" value="<?= $data['city'] ?>" />
                                                                    <input type="hidden" name="county" value="<?= $data['county'] ?>" />
                                                                    <input type="hidden" name="price" value="<?= $data['price'] ?>" />
                                                                    <button type="submit" name="selectZip" class="btn btn-secondary take-btn" style="width: 100px;">
                                                                        Select
                                                                    </button>
                                                                </form>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php
                                                if (count($zips) == 0) { ?>
                                                    <tr>
                                                        <td colspan="10" class="text-danger">No record Found</td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

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