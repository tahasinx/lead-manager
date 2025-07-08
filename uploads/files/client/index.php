<?php

session_start();

if (isset($_POST['uploadFile'])) {
    $result = $server->share_file($_POST);
}