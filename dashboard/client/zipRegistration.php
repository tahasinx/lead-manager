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
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        input {
            border: none;
            background: none;
            outline: none;
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
                    <div class="col-sm-6">
                        <form method="GET">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <input class="form-control" placeholder="Zip Code" type="number" name="zipCode" min="0" <?php if (isset($_GET['zipCode'])) { ?> value="<?= $_GET['zipCode'] ?>" <?php } ?> required />
                                    </td>
                                    <td>
                                        <?php if ($server->hasPackage('czc') > 0) { ?>
                                            <button type="submit" class="btn btn-dark" style="height: 40px;"><i class="fas fa-search"></i> Check Availability</button>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-dark" style="height: 40px;" onclick="selectPackage()">
                                                <i class="fas fa-search"></i> Check Availability
                                            </button>

                                            <script>
                                                function selectPackage() {
                                                    var ask = window.confirm("Please choose a package first from ``Choose Zip Code`` section.");
                                                    if (ask) {
                                                        window.location.href = "packages.php";
                                                    }
                                                }
                                            </script>
                                        <?php } ?>

                                    </td>
                                </tr>
                            </table>
                        </form>
                        <?php if (isset($_GET['zipCode'])) { ?>
                            <div style="display:block;overflow:hidden;width:700px;height:300px;background: none;">
                                <iframe style="margin-top:-140px;margin-left:-5px;background: none;" height="410px" width="705px" scrolling="no" src="https://www.unitedstateszipcodes.org/<?= $_GET['zipCode'] ?>/"></iframe>
                            </div>
                            <div class="table-responsive">
                                <form method="POST">
                                    <input type="hidden" name="zip_code" value="<?= $_GET['zipCode'] ?>">
                                    <table class="table-striped" style="width: 90%;">
                                        <tr>
                                            <td style="width: 120px;">Country</td>
                                            <td>:</td>
                                            <td><input id="country" name="country" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td>:</td>
                                            <td><input id="state" name="state" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>Place</td>
                                            <td>:</td>
                                            <td><input id="place" name="place" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>Longitude</td>
                                            <td>:</td>
                                            <td><input id="longitude" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td>:</td>
                                            <td><input id="latitude" readonly /></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>
                                                <?php if ($server->is_occupied($_GET['zipCode']) == 1) { ?>
                                                    <span class="text-danger">Occupied</span>
                                                <?php } else { ?>
                                                    <span class="text-success">Available</span>
                                                <?php }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php if ($server->is_occupied($_GET['zipCode']) == 0) { ?>
                                            <tr style="background: none;">
                                                <?php if ($server->isIn_selection($_GET['zipCode']) == 0) { ?>
                                                    <td colspan="3">
                                                        <button name="selectZip" class="btn btn-outline-primary float-right">Add To Cart</button>
                                                    </td>
                                                <?php } else { ?>
                                                    <td colspan="3">
                                                        <button type="button" class="btn btn-success float-right" onclick="alert('Already in selection list.')">Selected</button>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </form>
                            </div>
                        <?php } else { ?>
                            <div style="display:block;overflow:hidden;width:700px;height:680px;background: none;">
                                <iframe style="margin-top:-140px;margin-left:-5px;background: none;" height="410px" width="705px" scrolling="no" src="https://www.unitedstateszipcodes.org"></iframe>
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                    $selectedZips = $server->getSelected_zips();

                    if (count($selectedZips) > 0) {
                    ?>
                        <div class="col-sm-6">
                            <div class="container table-responsive">
                                <h4><strong>SELECTED ZIPS</strong></h4>
                                <table class="table-striped" style="width: 100%;">
                                    <tr style="border-bottom: 1px solid #E3E3E3;">
                                        <th>Zip Code</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>Place</th>
                                        <th>Price/Month</th>
                                        <th style="width: 5%;"></th>
                                    </tr>
                                    <?php
                                    foreach ($selectedZips as $x) {
                                    ?>
                                        <tr style="border-bottom: 1px solid #E3E3E3;">
                                            <td><?= $x['zip_code'] ?></td>
                                            <td><?= $x['country'] ?></td>
                                            <td><?= $x['state_name'] ?></td>
                                            <td><?= $x['place_name'] ?></td>
                                            <td>$<?= $x['price'] ?></td>
                                            <td class="text-center">
                                                <form method="POST">
                                                    <input type="hidden" name="tracking_id" value="<?= $x['tracking_id'] ?>">
                                                    <button class="btn btn-danger" name="removeSelection"><i class="fa fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                                <br>
                                <br>
                                <button class="btn btn-primary btn-flat float-right" onclick="window.location='checkout.php'">Checkout</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- <pre id="json"></pre> -->

        </div>
        <div class="sidebar-overlay" data-reff=""></div>

        <!-- scripts -->
        <?php include 'template/js-links.php' ?>

        <?php if (isset($_GET['zipCode'])) { ?>
            <script type="text/javascript">
                var client = new XMLHttpRequest();
                client.open("GET", "https://api.zippopotam.us/us/<?= $_GET['zipCode'] ?>", true);
                client.onreadystatechange = function() {
                    if (client.readyState == 4) {

                        var JSONText = client.responseText;
                        var JSONObject = JSON.parse(JSONText);

                        var country = JSONObject["country"];
                        var state = JSONObject.places[0].state;
                        var place = JSONObject.places[0]["place name"];
                        var longitude = JSONObject.places[0].longitude;
                        var latitude = JSONObject.places[0].latitude;

                        document.getElementById("country").value = country;
                        document.getElementById("state").value = state;
                        document.getElementById("place").value = place;
                        document.getElementById("longitude").value = longitude;
                        document.getElementById("latitude").value = latitude;

                    };
                };
                client.send();
            </script>
        <?php } ?>

</body>

</html>