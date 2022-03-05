<?php
$ch = curl_init();
$curlConfig = array( CURLOPT_URL => "https://api.razorpay.com/v1/contacts/", CURLOPT_POST => true, CURLOPT_RETURNTRANSFER => true, CURLOPT_HTTPHEADER => array( 'api-key' => 'rzp_test_X3DYjLIUwXgUks:IL1VavIzs13gVK2StyevHa2Y' ), 
CURLOPT_POSTFIELDS => array( 'name' => 'Gayatri', 'email' => "gayatri@gmail.com",'contact'=>'9981043928', 'type' => 'customer' ));
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
curl_close($ch);
?>