<?php $url = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']); ?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <!-- <li class="menu-title">Main</li> -->
                <li <?php if ($url == 'index.php') { ?> class="active" <?php } ?>>
                    <a href="index.php"><span uk-icon="home"></span> <span>Home</span></a>
                </li>
                <li <?php if ($url == 'myProfile.php') { ?> class="active" <?php } ?>>
                    <a href="myProfile.php"><span uk-icon="user"></span> <span>My Profile</span></a>
                </li>
                <li>
                    <hr>
                </li>
                <li <?php if ($url == 'clients.php' || $url == 'clientDetails.php') { ?> class="active" <?php } ?>>
                    <a href="clients.php"><span uk-icon="users"></span> <span>My Clients</span></a>
                </li>
                <li>
                    <hr>
                </li>
                <!-- <li <?php if ($url == 'zipControl.php') { ?> class="active" <?php } ?>>
                    <a href="zipControl.php"><i class="fas fa-map-marked-alt"></i> <span>Zip Control</span></a>
                </li> -->
                <li <?php if ($url == 'dataCenter.php') { ?> class="active" <?php } ?>>
                    <a href="dataCenter.php"><span uk-icon="database"></span> <span>Data Center</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><span uk-icon="folder"></span> <span>File Zone</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="receivedFiles.php" <?php if ($url == 'receivedFiles.php') { ?> class="active" <?php } ?>> Received Files </a></li>
                        <li><a href="sharedFiles.php" <?php if ($url == 'sharedFiles.php') { ?> class="active" <?php } ?>> Shared Files</a></li>
                        <?php if ($url == 'shareSkipTracedFile.php') { ?>
                            <li><a href="sharedFiles.php" <?php if ($url == 'shareSkipTracedFile.php') { ?> class="active" <?php } ?>> Upload File</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li>
                    <hr>
                </li>
                <li <?php if ($url == 'transactions.php') { ?> class="active" <?php } ?>>
                    <a href="transactions.php"><span uk-icon="album"></span> <span>Transactions</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>