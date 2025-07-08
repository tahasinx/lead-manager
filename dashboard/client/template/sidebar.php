<?php $url = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']); ?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li <?php if ($url == 'index.php') { ?> class="active" <?php } ?>>
                    <a href="index.php"><span uk-icon="home"></span> <span>Dashboard</span></a>
                </li>
                <li <?php if ($url == 'myProfile.php') { ?> class="active" <?php } ?>>
                    <a href="myProfile.php"><span uk-icon="user"></span> <span>My Profile</span></a>
                </li>
                <li <?php if ($url == 'packages.php') { ?> class="active" <?php } ?>>
                    <a href="packages.php"><span uk-icon="thumbnails"></span> <span>Packages</span></a>
                </li>
                <li>
                    <hr>
                </li>
                <li <?php if ($url == 'myZipCodes.php' || $url == 'orderDetails.php' || $url == 'zipRegistration.php' || $url == 'checkout.php') { ?> class="active" <?php } ?>>
                    <a href="myZipCodes.php"><span uk-icon="location"></span> <span>My Zips</span></a>
                </li>
                <li>
                    <a href="#"><span uk-icon="database"></span> <span>Data Center</span></a>
                </li>
                <li <?php if ($url == 'fileZone.php') { ?> class="active" <?php } ?>>
                    <a href="fileZone.php"><span uk-icon="folder"></span> <span>File Zone</span></a>
                </li>
                <li>
                    <hr>
                </li>
                <li <?php if ($url == 'balanceNbilling.php') { ?> class="active" <?php } ?>>
                    <a href="balanceNbilling.php"><span uk-icon="credit-card"></span> <span>Balance & Billings</span></a>
                </li>
                <li <?php if ($url == 'transactions.php') { ?> class="active" <?php } ?>>
                    <a href="transactions.php"><span uk-icon="album"></span> <span>Transactions</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>