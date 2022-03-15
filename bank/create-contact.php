<?php

$ch = curl_init();

$name="Gayatri Sharma";
$email="gayatri@gmail.com";
$phone="9981043928";
 $fields = array();
  $fields["name"] = $name;
   $fields["email"] = $email;
    $fields["contact"] = $phone;
     $fields["reference_id"] = "customer".$phone;
      $fields["type"] = "customer";
      
      curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/contacts');
      // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_USERPWD, "rzp_test_X3DYjLIUwXgUks:IL1VavIzs13gVK2StyevHa2Y");
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $headers = array(); 
          $headers[] = 'Accept: application/json';
           $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
             $data = curl_exec($ch);
              if (empty($data) OR (curl_getinfo($ch, CURLINFO_HTTP_CODE != 200)))
               { 
                   $data = FALSE; 
                } 
                else { 
                    return json_decode($data, TRUE);
                    echo $data; 
                } 
                curl_close($ch);

?>