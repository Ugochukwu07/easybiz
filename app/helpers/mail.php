<?php 

function mailer($to, $from, $message, $subject) {
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
    $headers = "From: " . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    mail($to,$subject,$message,$headers);
}

/* $link https://wa.me/phone/text= url encoded text */

function whatsapp($phone, $text){
    $mainText = urlencode($text);
    $url = 'https://wa.me/' . $phone . '?text=' . $mainText;
    return $url;
}