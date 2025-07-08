<?php
require_once 'server/session.php';
$result = '';
$currentBalance = 0;

if (isset($_POST['shareFile'])) {
    $result = $server->share_file($_POST);
}

if (isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];
} else {
    $client_id = '';
}

$title = 'Share File';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'template/headers.php' ?>
    <style>
        th {
            font-weight: 500;
        }

        .cardx {
            height: 100px;
            width: 100px;
            padding-top: 20px;
            margin: 0px;
            transition: 0.3s;
            cursor: pointer;
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
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-12 col-xl-3 col-sm-3">
                            <div class="card" style="min-height: 253px;">
                                <div class="card-body">
                                    <center>

                                        <div class="card wrap" style="width: 150px;height: 150px;border-radius: 0px;margin-top: 10%;cursor: pointer;" id="attachFile">
                                            <div class="card-body text-muted">
                                                <span uk-icon="icon: upload; ratio: 3"></span> <br><br>
                                                Upload File
                                            </div>
                                        </div>
                                        <span class="text-danger">
                                            <?php if ($result <> 'success') {
                                                echo $result;
                                            } ?>
                                        </span>
                                    </center>
                                    <div id="fileDetails" style="display: none;">
                                        <h4><span uk-icon="icon: file-text;"></span> File Details</h4>
                                        <table style="width: 100%;" class="table-striped">
                                            <tr>
                                                <td style="width:70px;color:blueviolet">File Name</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span id="fileName"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: blueviolet;">File Type</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span id="fileType"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color: blueviolet;">File Size</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span id="fileSize"></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <input type="file" name="file" id="attachedFile" accept=".csv" onchange="previewFile(this.files[0])" hidden>
                                    <input type="hidden" name="file_name" value="<?= $_GET['fileName'] ?>">
                                    <input type="hidden" name="uploadedFile_name" id="uploadedFileName">

                                </div>
                                <script>
                                    document.getElementById('attachFile').onclick = function() {
                                        document.getElementById('attachedFile').click();
                                    };
                                </script>
                            </div>

                            <div class="card" style="display: none;" id="billingNumbers">
                                <div class="card-body">
                                    <h4 class="card-title">Enter Billing Numbers</h4>
                                    <span>Total Lead</span> <small class="text-danger">required</small><br>
                                    <input type="number" class="form-control" name="totalLead" id="totalLead" min="1" value="0" required>
                                    <br>
                                    <span>Verified Owner</span> <small class="text-danger">required</small><br>
                                    <input type="number" class="form-control" name="totalVerifiedOwner" id="totalVerifiedOwner" min="0" value="0" required>
                                    <br>
                                    <span>Offer</span> <small class="text-danger">required</small><br>
                                    <input type="number" class="form-control" name="totalOffer" id="totalOffer" min="0" value="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 col-lg-12 col-xl-9 col-sm-9">
                            <div class="card" style="display: none;" id="detailInvoice">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="card-body">
                                                    <h4 class="card-title">Client Details</h4>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div style="border:1px solid;width: 102px;height:102px">
                                                                <img alt="" src="../../uploads/images/propic/<?= $server->clientData($client_id, 'client_propic') ?>" onerror="this.onerror=null;this.src='assets/img/user.jpg';" style="width: 100px;height:100px">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <h4><?= $server->clientData($client_id, 'client_firstname') ?> <?= $server->clientData($client_id, 'client_lastname') ?></h4>
                                                            <h5>
                                                                <span uk-icon="mail"></span>
                                                                <?= $server->clientData($client_id, 'client_email') ?>
                                                            </h5>
                                                            <h5>
                                                                <span uk-icon="receiver"></span>
                                                                <?= $server->clientData($client_id, 'client_contact') ?>
                                                            </h5>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <h4 class="card-title">Current Balance</h4>
                                                    <h2>
                                                        <?php if ($server->getCurrentBalance($client_id) > 0) { ?>
                                                            <span class="text-success">$ <?= $currentBalance = $server->getCurrentBalance($client_id) ?></span>
                                                        <?php } else { ?>
                                                            <span class="text-danger">$ 0.00 </span>
                                                        <?php } ?>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="card-body">
                                                    <h4 class="card-title">Package Details</h4>

                                                    <?php
                                                    $package = $server->getPackageInfo($client_id, 'ufs');
                                                    foreach ($package as $data) {
                                                        extract($data);
                                                        $string  = ["d", "c"];
                                                        $replace = ["", ""];

                                                        $perLeadCost_currency = $perLead_cost[0];
                                                        if ($perLeadCost_currency = 'c') {
                                                            $perLead_cost         = '.' . str_replace($string, $replace, $perLead_cost);
                                                        } else {
                                                            $perLead_cost         = str_replace($string, $replace, $perLead_cost);
                                                        }


                                                        $perVerifiedCurrency  = $perVerifiedLead_cost[0];
                                                        $perVerifiedLead_cost = str_replace($string, $replace, $perVerifiedLead_cost);

                                                        $perOfferCurrency     = $perOffer_cost[0];
                                                        $perOffer_cost        = str_replace($string, $replace, $perOffer_cost);

                                                    ?>

                                                        <table class="table-striped w-100">
                                                            <tr>
                                                                <td style="color: blueviolet;">Package Name</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-transform: uppercase;"><?= $package_name ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="color: blueviolet;">Package Properties</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <ul style="list-style: none;margin-left: -35px;">
                                                                        <li class="mb-2 pl-1">
                                                                            <?php if ($phone_number == 1) { ?>
                                                                                <span><i class="fas fa-check-circle text-success"></i></span> Phone Number
                                                                            <?php } else { ?>
                                                                                <span><i class="fas fa-check-circle"></i></span> <strike>Phone Number</strike>
                                                                            <?php } ?>
                                                                        </li>
                                                                        <li class="mb-2 pl-1">
                                                                            <?php if ($email_address == 1) { ?>
                                                                                <span><i class="fas fa-check-circle text-success"></i></span> Email Address
                                                                            <?php } else { ?>
                                                                                <span><i class="fas fa-check-circle"></i></span> <strike>Email Address</strike>
                                                                            <?php } ?>
                                                                        </li>
                                                                        <li class="mb-2 pl-1">
                                                                            <?php if ($mailing_address == 1) { ?>
                                                                                <span><i class="fas fa-check-circle text-success"></i></span> Mailing Address
                                                                            <?php } else { ?>
                                                                                <span><i class="fas fa-check-circle"></i></span> <strike>Mailing Address</strike>
                                                                            <?php } ?>
                                                                        </li>
                                                                        <li class="mb-2 pl-1">
                                                                            <?php if ($verified_owner == 1) { ?>
                                                                                <span><i class="fas fa-check-circle text-success"></i></span> Verified Owner
                                                                            <?php } else { ?>
                                                                                <span><i class="fas fa-check-circle"></i></span> <strike>Verified Owner</strike>
                                                                            <?php } ?>
                                                                        </li>
                                                                        <li class="mb-2 pl-1">
                                                                            <?php if ($package_name == 'ultra') { ?>
                                                                                <span><i class="fas fa-check-circle text-success"></i></span> Offer
                                                                            <?php } else { ?>
                                                                                <span><i class="fas fa-check-circle"></i></span> <strike>Offer</strike>
                                                                            <?php } ?>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4" style="border-left: 1px solid #e3e3e3;border-left-style: dotted;">
                                        <div class="card-body">
                                            <h4 class="card-title">Invoice</h4>
                                            <table class="table-striped w-100">
                                                <tr>
                                                    <td style="width: 150px;">Lead Cost</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input name="leadCost" id="LeadCost" value="0 $" readonly></input>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Verified Lead Cost</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input name="verifiedLeadCost" id="VerifiedLeadCost" value="0 $" readonly></input>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Offer Cost</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input name="offerLeadCost" id="OfferLeadCost" value="0 $" readonly></input>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <hr>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Total Cost</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input name="totalCost" id="totalCost" value="0 $" readonly></input>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <hr>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table style="width: 100%;" class="table-bordered">
                                                <tr>
                                                    <td style="width: 50%;">
                                                        <button type="button" class="btn-danger btn-tool btn-flat" style="width: 100%;cursor: pointer;outline: none;" onclick="location.reload()">
                                                            <span uk-icon="close"></span> Cancle
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button class="btn-success btn-tool btn-flat" id="shareButton" name="shareFile" style="width: 100%;cursor: pointer;outline: none;">
                                                            <span uk-icon="social"></span> Share
                                                        </button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="sidebar-overlay" data-reff=""></div>

        <!-- scripts -->
        <?php include 'template/js-links.php' ?>
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
                document.getElementById('billingNumbers').style.display = 'block'
                document.getElementById('detailInvoice').style.display = 'block'

                document.getElementById('uploadedFileName').value = name
            }
        </script>
        <script>
            var LeadCost = 0;
            var VerifiedLeadCost = 0;
            var OfferLeadCost = 0;
            var totalCost = 0;

            document.getElementById('totalLead').addEventListener('input', function() {
                LeadCost = document.getElementById('LeadCost').value = document.getElementById('totalLead').value * <?= $perLead_cost ?> + ' $'
                calculateSum()
            })

            document.getElementById('totalVerifiedOwner').addEventListener('input', function() {
                VerifiedLeadCost = document.getElementById('VerifiedLeadCost').value = document.getElementById('totalVerifiedOwner').value * <?= $perVerifiedLead_cost ?> + ' $'
                calculateSum()
            })

            document.getElementById('totalOffer').addEventListener('input', function() {
                OfferLeadCost = document.getElementById('OfferLeadCost').value = document.getElementById('totalOffer').value * <?= $perOffer_cost ?> + ' $'
                calculateSum()
            })
        </script>


        <script>
            function calculateSum() {

                var LeadCost = document.getElementById('LeadCost').value
                var VerifiedLeadCost = document.getElementById('VerifiedLeadCost').value
                var OfferLeadCost = document.getElementById('OfferLeadCost').value
                var totalCost = 0

                totalCost = +LeadCost.replace(' $', '') + +VerifiedLeadCost.replace(' $', '') + +OfferLeadCost.replace(' $', '')

                document.getElementById('totalCost').value = totalCost + ' $'

                if (totalCost > <?= $currentBalance ?>) {
                    document.getElementById("shareButton").disabled = true;
                    document.getElementById("shareButton").classList.add("btn-danger");
                    document.getElementById("shareButton").innerHTML = 'Insufficient Balance.';
                } else {
                    document.getElementById("shareButton").disabled = false;
                    document.getElementById("shareButton").classList.remove("btn-danger");
                    document.getElementById("shareButton").classList.add("btn-success");
                    document.getElementById("shareButton").innerHTML = '<span uk-icon="social"></span> Share';
                }
            }
        </script>
        <?php
        if ($result == 'success') { ?>
            <script>
                alert("File shared successfully.");
                window.location = 'receivedFiles.php';
            </script>
        <?php }
        ?>
</body>

</html>