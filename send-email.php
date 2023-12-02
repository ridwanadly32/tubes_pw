<?php

include "koneksi.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$message = $_POST['message'];


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                         //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'eventium00@gmail.com';                 //SMTP username
    $mail->Password   = 'wekp twgn oxmg srpm';                  //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($email, $name);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Customer Servive';
    $mail->Body    = 'Nama : '.$name.'<br> Email : '.$email.'<br> Phone Numbers : '.$phoneNumber.'<br> Message : '.$message.'<br>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if( $mail->send()) 
    {
        $koneksi->query("INSERT INTO contact (name,email,phone_number,message) VALUES('$name','$email',$phoneNumber,'$message')");
        header("location:berhasil.php");
    }
   

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>