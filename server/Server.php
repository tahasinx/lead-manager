<?php

require_once 'vendor/database/Database.php';
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

class Server
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function save_message($data)
    {
        try {

            $string = ['<', '>'];
            $replace = ['< ', ' >'];

            extract($data);

            $firstname = str_replace($string, $replace, $data['firstname']);
            $lastname  = str_replace($string, $replace, $data['lastname']);
            $email     = str_replace($string, $replace, $data['email']);
            $contact   = str_replace($string, $replace, $data['contact']);
            $message   = str_replace($string, $replace, $data['message']);

            $visitor_data = $data['visitor_data'];
            $visitor_ip   = $this->getRealIpAddr();

            $stmt = $this->conn->prepare("INSERT INTO `messages`(`firstname`, `lastname`, `email`, `contact`, `message`,`visitor_ip`, `visitor_data`) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute(array($firstname, $lastname, $email, $contact, $message, $visitor_ip, $visitor_data));

            $mailSubject = 'SkipNCall new message';
            $mailTo      = 'devjr.tryus@gmail.com';
            $mailBody    = "Here is a new message from SkipNCall.<br><br>
            
            <table border='1' cellspacing='0' cellpadding='0'>
              <tr>
               <td>Sender</td>
               <td>$firstname $lastname</td>
              </tr>
              <tr>
               <td>Email Address</td>
               <td>$email</td>
              </tr>
              <tr>
               <td>Contact No</td>
               <td>$contact</td>
              </tr>
              <tr>
               <td>Ip Address</td>
               <td>$visitor_ip</td>
              </tr>
            </table>
            <br>
            <br>
            <b><mark>Message:</mark></b><br>
            $message
            ";

            $this->sendEmail($mailSubject, $mailTo, $mailBody);

            return "Thanks for your message to us.";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // _____________________________________________Emailing


    public function sendEmail($mailSubject, $mailTo, $mailBody)
    {
        try {

            $mail = new PHPMailer(true);
            $mail->IsSMTP();

            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = getenv('SMTP_USERNAME');
            $mail->Password = getenv('SMTP_PASSWORD');
            $mail->SetFrom('', '');
            $mail->Subject = "$mailSubject";
            $mail->Body = "$mailBody";
            $mail->AddAddress("$mailTo");
            $mail->Debugoutput = 'error_log';
            if (!$mail->Send()) {
                return "Mailer Error: " . $mail->ErrorInfo;
            } else {
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
