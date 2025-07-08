<?php
require_once('../../vendor/autoload.php');

$publishableKey = getenv('STRIPE_PUBLISHABLE_KEY');
$secretKey      = getenv('STRIPE_SECRET_KEY');

\Stripe\Stripe::setApiKey($secretKey);
