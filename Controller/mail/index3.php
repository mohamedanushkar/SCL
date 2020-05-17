<?php
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$Password = $_POST["Password"];
$name = $_POST["Name"];
$email = $_POST["Email"];


$subject = "New Teacher Registration";
$message = "Dear" .$name. "welcome to MNS national schol, \n  your user name is ". $email . "and your password is " . $Password;

$senders_name = 'MNS Naional School';

$developermode = true;
$mailer = new PHPMailer($developermode);

try {
   
    $mailer ->isSMTP();

    if ($developermode){
        $mailer ->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]

        ];
    }

    $mailer ->Host = 'smtp.gmail.com';
    $mailer ->SMTPAuth = true;
    $mailer ->Username = 'mohamedanushkar@gmail.com';
    $mailer ->Password = 'Armash123';
    $mailer ->SMTPSecure = 'tls';
    $mailer ->Port = 587;

    $mailer ->setFrom('mohamedanushkar@gmaail.com','Anushkar');
    $mailer ->addAddress("$email","$name");
    $mailer ->isHTML(true);
    $mailer ->Subject = "$subject";
    $mailer ->Body = "$message";

    $mailer ->send();
    $mailer ->clearAllRecipients();

    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Mail Sent Successfully');";
    echo "</script>";

}
catch (Exception $e){
      echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;

}
?>