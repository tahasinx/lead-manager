<?php
require_once 'server/session.php';

$result = "";

if (isset($_POST['updateProfileData'])) {
    if (!empty($_POST['client_firstname']) && !empty($_POST['client_lastname']) && !empty($_POST['client_contact'])) {
        $result = $server->updateProfileData($_POST);
    }
}

if (isset($_POST['updateProfileData'])) {
    $server->updateProfileData($_POST);
}

if (isset($_FILES['propic'])) {
    $server->updateProfilPicture($_POST);
}

$title = 'Profile';
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
                    <div class="col-sm-12">
                        <h4 class="page-title">My Profile <?= $result ?></h4>
                        <iframe name="submitter" hidden allowfullscreen="" frameborder="0" src="x"></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="card-box">
                            <h3 class="card-title"></h3>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="profile-img-wrap">
                                        <form method="POST" id="changePic" enctype="multipart/form-data">
                                            <img class="inline-block" src="../../uploads/images/propic/<?= $server->clientData('client_propic') ?>" onerror="this.onerror=null;this.src='assets/img/user.jpg';" alt="user">
                                            <div class="fileupload btn">
                                                <span class="btn-text">Change</span>
                                                <input type="hidden" name="oldPic" value="<?= ($server->clientData('client_propic')) ?>" />
                                                <input class="upload" type="file" name="propic" onchange="document.getElementById('changePic').submit()" accept="image/*">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="profile-basic">
                                        <form method="POST">
                                            <input type="hidden" name="updateProfileData" value="1" />

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">First Name</label>
                                                        <input type="text" class="form-control floating" name="client_firstname" value="<?= $server->clientData('client_firstname') ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">Last Name</label>
                                                        <input type="text" class="form-control floating" name="client_lastname" value="<?= $server->clientData('client_lastname') ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">Email Address</label>
                                                        <input type="text" class="form-control floating" value="<?= $server->clientData('client_email') ?>" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <label class="focus-label">Contact No</label>
                                                        <input type="text" class="form-control floating" name="client_contact" value="<?= $server->clientData('client_contact') ?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-light float-right" style="background: lightblue;"><i class="fas fa-pen"></i> Update</button>
                                                </div>
                                            </div>
                                        </form>
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

</body>

</html>