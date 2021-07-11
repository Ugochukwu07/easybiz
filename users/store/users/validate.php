<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/plans.php');
$plans = selectOne('plans', ['id' => $_GET['plan_id']]);
$userp = selectOne('users', ['id' => $_GET['user_id']]);
$store = selectOne('stores', ['user_id' => $_GET['user_id']]);
$oldLilimt = $store['plimit'];
$addedLimit = $plans['plimit'];
$newlimit = $oldLilimt + $addedLimit;
#validate
if (isset($_GET['txref'])) {
    $ref = $_GET['txref'];
    $amount = $plans['price']; //Correct Amount from Server
    $currency = "NGN"; //Correct Currency from Server

    $query = array(
        "SECKEY" => "FLWSECK_TEST-599fa8447d9978fd92d2f1f8fd95a618-X",
        "txref" => $ref
    );

    $data_string = json_encode($query);
            
    $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);

    curl_close($ch);

    $resp = json_decode($response, true);

    $paymentStatus = $resp['data']['status'];
    $chargeResponsecode = $resp['data']['chargecode'];
    $chargeAmount = $resp['data']['amount'];
    $chargeCurrency = $resp['data']['currency'];

    if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
      // transaction was successful...
         // please check other things like whether you already gave value for this ref
      // if the email matches the customer who owns the product etc
      //Give Value and return to Success page
        $plan_id = update('users', $userp['id'], ['plan_id' => $plans['id']]);
        $store_id = update('stores', $userp['store_id'], ['plimit' => $newlimit]);
        header('location: ' . BASE_URL . '/users/access.php');
        exit();
    } else {
        //Dont Give Value and return to Failure page
    }
}
    else {
  die('No reference supplied');
}

?>