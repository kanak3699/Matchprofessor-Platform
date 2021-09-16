<?php
require_once('config.php');


\Stripe\Stripe::setApiKey($test_api_key);
$stripe = new \Stripe\StripeClient(
    $test_api_key
);

$plan1 = $stripe->prices->retrieve(
    $price_1_id, //Update price by changing the id under config.php
    []
);
$plan2 = $stripe->prices->retrieve(
    $price_2_id, //Update price by changing the id under config.php
    []
);
//Getting product ID by the selected price
$id1 = $plan1['product'];
    $product_1=$stripe->products->retrieve(
        $id1,
        []
);
$id2 = $plan2['product'];
    $product_2=$stripe->products->retrieve(
        $id2,
        []
);

$price1 = intval($plan1['unit_amount_decimal'])/100;
$price2 = intval($plan2['unit_amount_decimal'])/100;