<?php
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$senders_name = 'Anushkar';

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