<?php
#contact var
$phone = $email = $message =  "";
if(isset($_POST['submit_contact'])){
    $errors = contactValidation($_POST);
    if(count($errors) === 0){
        unset($_POST['submit_contact']);
        $complain_id = create('contact', $_POST);
        if ($complain_id) {
            $to = "ugochukwu.ekwueme@yahoo.com"; // this is your Email address
            $from = $_POST['email']; // this is the sender's Email address
            $email = $_POST['email'];
            $phone = $_POST["phone"];
            $message = $_POST["message"];
            $subject = "Customer Care";
            $subject2 = "Help Request";
            $mesage = "Email: " . $email . "\n\n" . "Phone: " . $phone . "\n\n" . "Message: " . $message;
            $mesage2 = "Email: " . $email . "\n\n" . "Phone: " . $phone . "\n\n" . "Message: " . $message;
            $headers = "From:" . $from;
            $headers2 = "From:" . $to;
            mail($to,$subject,$mesage,$headers);
            mail($from,$subject2,$mesage2,$headers2); // sends a copy of the message to the sender */
        }
        $_SESSION['message'] = "Admin Contacted Successfully";
        $_SESSION['type'] = "text-white bg-success";
        $email = $phone = $message = "";
    }else{
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];
    }
}