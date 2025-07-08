<?php
session_start();

require_once 'Admin.php';

$server = new Admin();

if (!isset($_SESSION['admin@id'])) {
    $server->admin_signout();
}

if (isset($_POST['signOut'])) {
    $server->admin_signout();
}

