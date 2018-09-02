<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Jméno je povinné";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "E-mail je povinný";
} else {
    $email = $_POST["email"];
}

// MSG SUBJECT
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Předmět je povinný";
} else {
    $msg_subject = $_POST["msg_subject"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Zpráva musí být vyplněna";
} else {
    $message = $_POST["message"];
}


$EmailTo = "info@trojskykun2018.cz";
$Subject = "Nová zpráva";

// prepare email body text
$Body = "";
$Body .= "Jméno: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Předmět: ";
$Body .= $msg_subject;
$Body .= "\n";
$Body .= "Zpráva: ";
$Body .= $message;
$Body .= "\n";

$headers[] = "From:".$email;
$headers[] = "Content-Type: text/html; charset=UTF-8";

// send email
$success = mail($EmailTo, $Subject, mb_convert_encoding($Body, 'UTF-8'), implode("\r\n", $headers));

// redirect to success page
if ($success && $errorMSG == ""){
   echo "Zpráva odeslána";
}else{
    if($errorMSG == ""){
        echo "Něco se nepovedlo, zkuste to prosím znovu";
    } else {
        echo $errorMSG;
    }
}

?>