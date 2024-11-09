<?php
// Razorpay API credentials
$key_id = 'rzp_live_KcwKYw4K9lWnsk';
$key_secret = 'CCd6SJyUvm9ngXfaFYOlWGWi';

// Order details
$amount = 50000; // amount in currency subunits (e.g., 50000 paise for 500 INR)
$currency = 'INR';
$receipt = 'receipt_' . rand(1000, 9999); // unique identifier for the transaction

// Create an order in Razorpay
$data = array(
    "amount" => $amount,
    "currency" => $currency,
    "receipt" => $receipt,
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/orders');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);

$headers = array();
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    exit;
}
curl_close($ch);

$order = json_decode($response);
echo $order->id; // Return the order ID to the JavaScript
?>
