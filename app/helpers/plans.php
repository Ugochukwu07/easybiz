<?php

#payment
if (isset($_GET['plan_id'])) {
    $plan_sub = selectOne('plans', ['id' => $_GET['plan_id']]);
    #dd($plan);
    $startDate = date('Y-m-d');
    $days = $plan_sub['duration'] + $plan_sub['exduration'];
    $endDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($startDate)) . " + ". $days . " day"));
    //generate new ref
    $new_plan = array('plan_id' => $plan_sub['id'], 'price' => $plan_sub['price'], 'trans_ref' => generateRandomString($p_code, 20), 'store_id' => $_SESSION['store_id'], 'startTime' => $startDate, 'endTime' => $endDate);
    //send ref to data base
    $new_plan_id = create('plan_sub', $new_plan);
    $user_id = update('users', $_SESSION['id'], ['trans_ref' => $new_plan['trans_ref']]);

    $curl = curl_init();

    $customer_email = $_SESSION['email'];
    $amount = $plan_sub['price'];  
    $currency = "NGN";
    $txref = "rave-" . $new_plan['trans_ref']; // ensure you generate unique references per transaction.
    $PBFPubKey = "FLWPUBK_TEST-bfcc7bab9ee0e9b198dd37e6cfd0f5e2-X"; // get your public key from the dashboard.
    $redirect_url = BASE_URL . '/users/store/users/validate.php?plan_id=' . $plan_sub['id'] . '&user_id=' . $_SESSION['id'];


    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        'amount'=>$amount,
        'customer_email'=>$customer_email,
        'currency'=>$currency,
        'txref'=>$txref,
        'PBFPubKey'=>$PBFPubKey,
        'redirect_url'=>$redirect_url
    ]),
    CURLOPT_HTTPHEADER => [
        "content-type: application/json",
        "cache-control: no-cache"
    ],
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    if($err){
        die('Curl returned error: ' . $err);
    }

    $transaction = json_decode($response);

    if(!$transaction->data && !$transaction->data->link){
        print_r('API returned error: ' . $transaction->message);
    }

    header('Location: ' . $transaction->data->link);
}


?>