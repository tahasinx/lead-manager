<?php
require_once 'server/session.php';

$state  = "";
$result = "";

if (isset($_GET['state'])) {
    $state = $_GET['state'];
}

if (isset($_POST['addZip'])) {
    $result = $server->addNew_zip($_POST);
}

if (isset($_POST['eraseZip'])) {
    $result = $server->erase_zip($_POST);
}

if (isset($_POST['updateZip'])) {
    $result = $server->update_zip($_POST);
}

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
                                        <div class="col-sm-5">
                                            <a class="btn btn-primary take-btn float-right" href="#modal@newzip">
                                                <i class="fas fa-plus"></i> New Zip
                                            </a>
                                        </div>
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
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th style="width: 15%;text-align:center">
                                                        Controls
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable2">
                                                <?php
                                                $zips = $server->get_zips($state);
                                                foreach ($zips as $data) {
                                                ?>
                                                    <tr>
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
                                                                <span style="color: blueviolet;">Occupied</span>
                                                                <a href="#client@<?= $data['tracking_id'] ?>"><i class="fas fa-user-tie"></i></a>

                                                                <div class="awesome-modal" id="client@<?= $data['tracking_id'] ?>">
                                                                    <a class="close-icon" href="#state-<?= $_GET['id'] ?>"></a>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <div style="border:1px solid;width: 102px;height:102px">
                                                                                <img alt="" src="../../uploads/images/propic/<?= $server->clientData($data['occupied_by'], 'client_propic') ?>" onerror="this.onerror=null;this.src='assets/img/user.jpg';" style="width: 100px;height:100px">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <h4><?= $server->clientData($data['occupied_by'], 'client_firstname') ?> <?= $server->clientData($data['occupied_by'], 'client_lastname') ?></h4>
                                                                            <h5>
                                                                                <i class="fas fa-envelope"></i>
                                                                                <?= $server->clientData($data['occupied_by'], 'client_email') ?>
                                                                            </h5>
                                                                            <h5>
                                                                                <i class="fas fa-phone"></i>
                                                                                <?= $server->clientData($data['occupied_by'], 'client_contact') ?>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                </div>

                                                            <?php } else { ?>
                                                                <span class="text-success">Available</span>
                                                            <?php }
                                                            ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="#update@<?= $data['tracking_id'] ?>" class="btn btn-secondary take-btn">
                                                                Update
                                                            </a>
                                                            <a href="#erase@<?= $data['tracking_id'] ?>" class="btn btn-danger take-btn">
                                                                Erase
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <div class="awesome-modal" id="erase@<?= $data['tracking_id'] ?>">
                                                        <a class="close-icon" href="#state-<?= $_GET['id'] ?>"></a>
                                                        <br>
                                                        <div class="text-center">
                                                            <h4>Are you sure to erase this zip code?</h4>
                                                            <small class="text-danger">All related data will be erased!</small>
                                                            <br>
                                                            <br>
                                                            <form method="POST">
                                                                <input type="hidden" name="tracking_id" value="<?= $data['tracking_id'] ?>" />
                                                                <button type="submit" name="eraseZip" class="btn btn-outline-danger btn-flat" style="width: 60px;">Yes</button>
                                                                <button type="button" class="btn btn-outline-success btn-flat" style="width: 60px;" onclick="window.location='#state-<?= $_GET['id'] ?>'">No</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div class="awesome-modal" id="update@<?= $data['tracking_id'] ?>">
                                                        <a class="close-icon" href="#state-<?= $_GET['id'] ?>"></a>
                                                        <br>
                                                        <form method="POST">
                                                            <input type="hidden" name="tracking_id" value="<?= $data['tracking_id'] ?>" />
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <h4 class="text-danger"><?= $result ?></h4>
                                                                    <div class="form-group">
                                                                        <label>State Name<span class="text-danger">*</span></label>
                                                                        <input class="form-control" type="text" name="state_name" value="<?= $data['state_name'] ?>" readonly required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label>Zip Code <span class="text-danger">*</span></label>
                                                                        <input class="form-control" type="number" name="zip_code" min="0" value="<?= $data['zip_code'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label>City</label>
                                                                        <input class="form-control" type="text" name="city" value="<?= $data['city'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label>County</label>
                                                                        <input class="form-control" type="text" name="county" value="<?= $data['county'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label>Price <small style="color:orangered">usd</small> <span class="text-danger">*</span></label>
                                                                        <input class="form-control" type="number" min="0" name="price" value="<?= $data['price'] ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <button type="submit" name="updateZip" class="btn btn-dark btn-flat float-right">Update Data</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

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

                    <div class="awesome-modal" id="modal@newzip">
                        <a class="close-icon" href="#state-<?= $_GET['id'] ?>"></a>
                        <br>
                        <form method="POST">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="text-danger"><?= $result ?></h4>
                                    <div class="form-group">
                                        <label>State <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="state_name" value="<?= $_GET['state'] ?>" readonly required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Zip Code <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="zip_code" min="0" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input class="form-control" type="text" name="city">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>County</label>
                                        <input class="form-control" type="text" name="county">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Price <small style="color:orangered">usd</small> <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" min="0" name="price" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" name="addZip" class="btn btn-dark btn-flat float-right">Save Data</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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