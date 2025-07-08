<?php
require_once 'server/session.php';
require 'server/config.php';

if (isset($_POST['stripeToken'])) {

    $stripeToken = $_POST['stripeToken'];

    if (isset($_GET['leadPay'])) {
        
        $data = \Stripe\Charge::create([

            "amount"   => $_GET['leadPay'] * 100,
            "currency" => "usd",
            "source"   => $stripeToken

        ]);

        $server->purchase_leads($_POST, $data->id, $data->amount);

    } else {

        $data = \Stripe\Charge::create([

            "amount"   => $server->totalCost_ofSelection() * 100,
            "currency" => "usd",
            "source"   => $stripeToken

        ]);

        $server->updateTransactions($_POST, $data->id, $data->amount);
    }
}
