<?php

require_once(__DIR__ . "/../controllers/general_controller.php");

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $_GET['reference'], 
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_test_ed8f1840de67c1fd3d4724d6240e23083220fac7",
    "Cache-Control: no-cache",
  ),
));
  
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
  
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $data = json_decode($response, true);
  $status = $data['status'];
  if ($status) {
    $custom_fields = $data['data']['metadata']['custom_fields'];
    $customer_id = null;
    foreach ($custom_fields as $field) {
        if ($field['variable_name'] === 'Customer_Id') {
            $customer_id = $field['value'];
            break;
        }
    }
    if(add_orders_payment($customer_id, $data)){

      // delete items from the cart when payment is successfull
      delete_cart($customer_id);

      echo '<script>
        alert("Order Placed");
        window.location.href = "receipts.php?customer_id=' . $customer_id . '";
      </script>';

      }
    } else {
      echo "Payment Wasnt Successful\n";
    }
}
?>
