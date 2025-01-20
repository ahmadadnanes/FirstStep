<?php
namespace app\controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require "vendor/autoload.php";


class MailController {
    public static function email_verification($name , $email , $verification_token){
        try {
            $mail = new PHPMailer(false);
            //Server settings                   //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $_ENV["MAIL_ACCOUNT"];                     //SMTP username
            $mail->Password   = $_ENV["MAIL_PASSWORD"];                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($_ENV["MAIL_ACCOUNT"], 'Mailer');
            $mail->addAddress($email , $name);     //Add a recipient            //Name is optional

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = "
                <h2>You have been registered with first step </h2>
                <a href='http://localhost:3000/verify_email/$verification_token'>Press Here</a>
            ";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            throw new Exception;
        }
    }

    public static function change_password(){

    }
}