<?php
session_start();

require_once 'Client.php';

$server = new Client();

if (!isset($_SESSION['client@id'])) {
    $server->client_signout();
}

if (isset($_POST['signOut'])) {
    $server->client_signout();
}

if (isset($_POST['removeSelection'])) {
    $server->remove_Selection($_POST);
}

$server->markAsVerified();
$currentBalance = $server->getCurrentBalance();