<?php

try {
    require_once 'server/session.php';
    require '../../vendor/autoload.php';

    \Stripe\Stripe::setApiKey('sk_test_51J5WZrF9ICP66aSOQ4ixCsyUWuaP9YN3IpPXq8l3WzQTqn7loEAdzqcuatg7vsLb9w1VDw4qgHvED5vTtj2a8w8i00ShhTO56y');

    header('Content-Type: application/json');

    $DOMAIN = 'http://127.0.0.1/project@rei_skipTracing/dashboard/client';

    $amount = $_POST['amount'] * 100;

    $payment = \Stripe\Checkout\Session::create([
        'line_items' => [[
            # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
            'price_data' => [
                'currency' => 'usd',
                'unit_amount' => $amount,
                'product_data' => [
                    'name' => 'SkipNCall Payemnt'
                ]
            ],
            'quantity' => 1,
        ]],
        'payment_method_types' => [
            'card',
        ],
        'customer_email' => $_SESSION['client@email'],
        'mode' => 'payment',
        'success_url' => $DOMAIN . '/@balance.php',
        'cancel_url' => $DOMAIN . '/balanceNbilling.php#@unsuccessfulPayment',
    ]);

    $_SESSION['fromPayemntGateway'] = 1;
    $_SESSION['payment_intent']     = $payment->payment_intent;
    $_SESSION['payment_amount']     = $_POST['amount'];

    header("HTTP/1.1 303 See Other");
    header("Location: " . $payment->url);

} catch (Exception $e) {
    echo $e->getMessage();
}
