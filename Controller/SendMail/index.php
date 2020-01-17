<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$error = '';
$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$senders_name = 'Anushkar';
function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}
if ($name != '' or $email != '' or $subject !='' or $message = '') {
    if (empty($name)) {
        $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
    } else {
        $name = clean_text($name);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
        }
    }
    if (empty($email)) {
        $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
    } else {
        $email = clean_text($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= '<p><label class="text-danger">Invalid email format</label></p>';
        }
    }
    if (empty($subject)) {
        $error .= '<p><label class="text-danger">Subject is required</label></p>';
    } else {
        $subject = clean_text($subject);
    }
    if (empty($message)) {
        $error .= '<p><label class="text-danger">Message is required</label></p>';
    } else {
        $message = clean_text($message);
    }
    if ($error == '') {
        require "vendor/autoload.php";
        $developmentMode = true;
        $mailer = new PHPMailer($developmentMode);
        try {
            $mailer->isSMTP();
            if ($developmentMode) {
                $mailer->SMTPOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    ]
                ];
            }
            $mailer->Host = 'smtp.gmail.com';
            $mailer->SMTPAuth = true;
            $mailer->Username = 'mohamedanushkar@gmail.com';
            $mailer->Password = 'Armash123';
            $mailer->SMTPSecure = 'tls';
            $mailer->Port = 587;
            $mailer->setFrom('mohamedanushkar@gmail.com', "$senders_name");
            $mailer->addAddress("$email", "$name");
            $mailer->isHTML(true);
            $mailer->Subject = $subject;
            $mailer->Body = $message;
            $mailer->send();
            $mailer->ClearAllRecipients();
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('Mail Sent Successfully');";
            echo "</script>";
        } catch (Exception $e) {
            echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
        }
    }
    else{
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('$error');";
        echo "</script>";
    }
}
else{
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Empty');";
    echo "</script>";
}

