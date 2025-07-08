<?php
require_once 'server/session.php';

$payment_intent = $_SESSION['payment_intent'];
$payment_amount = $_SESSION['payment_amount'];

$server->add_balance($payment_intent, $payment_amount);
