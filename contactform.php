<?php
$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "name is required ";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["email"])) {
    $errorMSG = "Email is required ";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["message"])) {
    $errorMSG = "Message is required ";
} else {
    $message = $_POST["message"];
}

$EmailTo = "info@peculiartechnologygroup.co.za";
$Subject = "New message from Peculiar Technology Group";

//$headers .= 'Cc: kankopatient@gmail.com' . "\r\n";
$headers .= "From: $EmailTo" . "\r\n"; 
//$headers .= 'Bcc: josephngana1@gmail.com' . "\r\n";


// prepare email body text
$Body = "";
$Body .= "name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, $headers);

// redirect to success page
if ($success && $errorMSG == ""){
      echo '<script>alert("Thank you!We will get in touch with you.")</script>';
}else{
    if($errorMSG == ""){
       
       echo '<script>alert("Something went wrong :(")</script>';
    } else {
      echo $errorMSG;
    }
}
?>