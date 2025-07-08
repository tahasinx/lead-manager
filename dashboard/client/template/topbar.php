<div class="header">
    <div class="header-left">
        <a href="#" class="logo">
            <img src="assets/img/reiLOGO.png" width="35" height="35" alt=""> <span>Skip N Call</span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><span uk-icon="menu"></span></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><span uk-icon="menu"></span></a>
    <ul class="nav user-menu float-right">
        <li class="nav-item dropdown d-none d-sm-block">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell"></i> <span class="badge badge-pill bg-danger float-right">3</span></a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span>Notifications</span>
                </div>
                <div class="drop-scroll">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media">
                                    <span class="avatar">
                                        <img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media">
                                    <span class="avatar">V</span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                                        <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media">
                                    <span class="avatar">L</span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                        <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media">
                                    <span class="avatar">G</span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                                        <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media">
                                    <span class="avatar">V</span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                        <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="activities.html">View all Notifications</a>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown d-none d-sm-block">
            <?php
            $selectedZips = $server->getSelected_zips();

            if (count($selectedZips) > 0) {
            ?>
                <button class="btn btn-tool btn-flat mt-2" style="background: #F3F3F3;" onclick="window.location='#selected@zips'">
                    Selected Zips [ <span style="color:orangered"><?= count($selectedZips) ?></span> ]
                </button>
                <div class="awesome-modal" id="selected@zips" style="width: 50%;">
                    <a class="close-icon" <?php if (isset($_GET['id'])) { ?> href="#state-<?= $_GET['id'] ?>" <?php } else { ?> href="#close" <?php } ?>></a>
                    <br>
                    <div class="container table-responsive">
                        <table class="tableSelected" style="width: 100%;">
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
        </li>
        <li class="nav-item dropdown d-none d-sm-block" style="visibility: hidden;">x</li>
        <li class="nav-item dropdown d-none d-sm-block">
            <button class="btn btn-tool btn-flat mt-2" style="background: #F3F3F3;" onclick="window.location='balanceNbilling.php'">
                Balance:<?php
                        if ($currentBalance > 0) { ?>

                <span class="text-success" id="currentBalance">$<?= $currentBalance ?></span>

            <?php } else { ?>

                <span style="color:orangered">$0.00</span>

            <?php } ?>
            </button>
        </li>
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                <span class="user-img">
                    <img src="../../uploads/images/propic/<?= $server->clientData('client_propic') ?>" style="height: 30px;width:30px;border-radius: 50%;" alt="Pic" onerror="this.onerror=null;this.src='assets/img/user.jpg';">
                    <span class="status online"></span>
                </span>
                <span><?= $server->clientData('client_firstname') . ' ' . $server->clientData('client_lastname'); ?></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="myProfile.php">My Profile</a>
                <a class="dropdown-item" href="changePassword.php">Change Password</a>
                <a class="dropdown-item" href="#" onclick="document.getElementById('signOutForm').submit()">Logout</a>

                <form method="POST" id="signOutForm" hidden>
                    <input type="hidden" name="signOut" />
                </form>
            </div>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu float-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="myProfile.php">My Profile</a>
            <a class="dropdown-item" href="changePassword.php">Change Password</a>
            <a class="dropdown-item" href="#" onclick="document.getElementById('signOutForm').submit()">Logout</a>
        </div>
    </div>
</div>