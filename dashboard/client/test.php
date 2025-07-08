<pre id="json"></pre>
<script type="text/javascript">
    var client = new XMLHttpRequest();
    client.open("GET", "http://api.zippopotam.us/us/90210", true);
    client.onreadystatechange = function() {
        if (client.readyState == 4) {
            
            var result = client.responseText;
            var zippo = JSON.parse(result);
            var resultDiv = document.getElementById('divResult');
            document.getElementById("json").innerHTML = zippo.places[0].state;

        };
    };

    client.send();
</script>

Stripe\Checkout\Session Object
(
    [id] => cs_test_a1Hv55dbFBdWUV2PVPY0IT590DHujxe5XJWvf0g7Tl7SczNVaMlyJcKITw
    [object] => checkout.session
    [after_expiration] => 
    [allow_promotion_codes] => 
    [amount_subtotal] => 40000
    [amount_total] => 40000
    [automatic_tax] => Stripe\StripeObject Object
        (
            [enabled] => 
            [status] => 
        )

    [billing_address_collection] => 
    [cancel_url] => http://127.0.0.1/project@rei_skipTracing/dashboard/client/balanceNbilling.php#@unsuccessfulPayment
    [client_reference_id] => 
    [consent] => 
    [consent_collection] => 
    [currency] => usd
    [customer] => 
    [customer_details] => Stripe\StripeObject Object
        (
            [email] => devjr.tryus@gmail.com
            [phone] => 
            [tax_exempt] => none
            [tax_ids] => 
        )

    [customer_email] => devjr.tryus@gmail.com
    [expires_at] => 1636610937
    [livemode] => 
    [locale] => 
    [metadata] => Stripe\StripeObject Object
        (
        )

    [mode] => payment
    [payment_intent] => pi_3Ju9zSF9ICP66aSO1mlhWgKd
    [payment_method_options] => Array
        (
        )

    [payment_method_types] => Array
        (
            [0] => card
        )

    [payment_status] => unpaid
    [phone_number_collection] => Stripe\StripeObject Object
        (
            [enabled] => 
        )

    [recovered_from] => 
    [setup_intent] => 
    [shipping] => 
    [shipping_address_collection] => 
    [submit_type] => 
    [subscription] => 
    [success_url] => http://127.0.0.1/project@rei_skipTracing/dashboard/client/balanceNbilling.php#@successfulPayment
    [total_details] => Stripe\StripeObject Object
        (
            [amount_discount] => 0
            [amount_shipping] => 0
            [amount_tax] => 0
        )

    [url] => https://checkout.stripe.com/pay/cs_test_a1Hv55dbFBdWUV2PVPY0IT590DHujxe5XJWvf0g7Tl7SczNVaMlyJcKITw#fidkdWxOYHwnPyd1blpxYHZxWjA0TzBSX3dDPExGVTMzZFZKPVdVRDdCTW1mazIwQnFSQHExdnMwR0dVNlU3bkdVUUsxZG9VaUB8TEdIQEZ3ZnNrPDRRbG82NTJVV3JnYWBLUn90XGJRVUIzNTU1M0tNNXNXXycpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl
)