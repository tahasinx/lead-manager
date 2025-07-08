<?php

require_once '../vendor/database/Database.php';
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

class Auth
{

    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function client_login($data)
    {

        try {
            $client_email  = $data['username'];
            $client_pass   = $data['password'];

            $stmt = $this->conn->prepare("SELECT id FROM `clients` WHERE client_email = ? ");
            $stmt->execute(array($client_email));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) == 0) {
                return "Incorrect credentials.";
            }

            $stmt = $this->conn->prepare("SELECT *FROM `clients` WHERE client_email = ? ORDER BY id DESC LIMIT 1 ");
            $stmt->execute(array($client_email));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


            foreach ($result as $x) {
                $client_id   = $x['client_id'];
                $hashed_pass = $x['client_password'];
                $is_verified = $x['is_verified'];
                $is_admin    = $x['is_admin'];
            }

            if ($is_verified == 0) {
                return '<br>Email is not verified. Please check your email for verification link.';
            }

            if (password_verify($client_pass, $hashed_pass)) {

                $activity_id = 'activity@' . date('dmY') . ':' . date('his') . ':' . random_int(100, 100000000);


                if ($is_admin == 1) {

                    $_SESSION['admin@id']    = $client_id;
                    $_SESSION['admin@email'] = $client_email;
                    header('location:../dashboard/admin/index.php');
                } else {
                    $_SESSION['client@id']    = $client_id;
                    $_SESSION['client@email'] = $client_email;
                    header('location:../dashboard/client/index.php');
                }
            } else {
                return "Incorrect credentials.";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function clientRegistration($data)
    {
        try {

            if ($data['password'] <> $data['confirm_password']) {

                return 'Passwords do not match!';
            }

            $email = $data['client_email'];

            $stmt = $this->conn->prepare("SELECT id FROM `clients` WHERE client_email = ? AND is_verified = 1 ");
            $stmt->execute(array($email));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                return 'Choose different email address.';
            } else {

                extract($data);

                $client_id = 'client@' . date('Ymdhis') . random_int(10000000000, 1000000000000);

                $firstname = str_replace('<', '< ', $client_firstname);
                $lastname  = str_replace('<', '< ', $client_lastname);
                $email     = str_replace('<', '< ', $client_email);

                $password = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $this->conn->prepare("UPDATE `clients` SET `is_expired`= 1 WHERE client_email = ? ");
                $stmt->execute(array($email));

                $stmt = $this->conn->prepare("INSERT INTO `clients`(`client_id`, `client_firstname`, `client_lastname`, `client_email`, `client_password`, `joining_date`, `joining_month`, `joining_year`) VALUES (?,?,?,?,?,?,?,?)");
                $stmt->execute(array($client_id, $firstname, $lastname, $email, $password, date('Y-m-d'), date('F'), date('Y')));

                $protocol = $_SERVER['REQUEST_SCHEME'] . '://';
                $url      = $protocol . $_SERVER['SERVER_NAME'] . "/project@rei_skipTracing/auth/verifyEmail.php?_token=$password&verification_id=$client_id&order=123";
                $subject  = "Verify Email";
                $mailTo   = $email;
                $mailBody =
                    "
                Hi $firstname $lastname,
                <br> 
                <br> 
                Thanks for register with us. Please click the button bellow to verify your email address. 
                <br>
                <br>
                 <a href='$url' style='padding: 8px 12px; border: 1px solid #ED2939;border-radius: 2px;font-size: 14px;text-decoration: none;font-weight:bold;display: inline-block;background:red;color:white'>
                  Click To Verify             
                </a>
                <br>
                <br>
                Thank you.
                ";

                $this->sendEmail($subject, $mailTo, $mailBody);

                return '<script>alert("You are successfully registered.Please check your email for verification link.");window.location="?signIn=1"</script>';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function validateClient($client_id)
    {
        try {

            $stmt = $this->conn->prepare("SELECT is_expired FROM `clients` WHERE client_id = ? ");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) == 0) {
                return 'invalid';
            }

            if (count($result) > 0) {
                foreach ($result as $data) {
                    $is_expired = $data['is_expired'];
                }

                if ($is_expired == 1) {
                    return 'expired';
                } else {
                    return 'valid';
                }
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function redirect($client_id)
    {
        try {

            $stmt = $this->conn->prepare("SELECT client_email,is_verified FROM `clients` WHERE client_id = ? ");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {

                foreach ($result as $data) {
                    $is_verified  = $data['is_verified'];
                    $client_email = $data['client_email'];
                }

                if ($is_verified == 1) {

                    return "<script>window.location='index.php?signIn=1'</script>";
                } else {

                    $activity_id = 'activity@' . date('dmY') . ':' . date('his') . ':' . random_int(100, 100000000);

                    $_SESSION['activity@id']    = $activity_id;
                    $_SESSION['client@id']      = $client_id;
                    $_SESSION['client@email']   = $client_email;

                    return "<script>window.location='../dashboard/client/index.php'</script>";
                }
            } else {
                header('location:../dashboard/client/xxxxsas.php');
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    //_______________________________________________ Forgot Password

    public function sendPassResetLink($data)
    {
        try {

            $email = $data['emailAddress'];

            $stmt = $this->conn->prepare("SELECT client_email FROM `clients` WHERE client_email = ? ");
            $stmt->execute(array($email));
            $output = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($output) > 0) {

                $reset_id = 'reset@' . date('Ymdhis') . ':' . random_int(100000000, 1000000000000);

                $stmt = $this->conn->prepare("UPDATE `password_resets` SET `is_expired`= 1 WHERE reset_email = ?");
                $stmt->execute(array($email));

                $stmt = $this->conn->prepare("INSERT INTO `password_resets`(`reset_id`, `reset_email`) VALUES (?,?)");
                $stmt->execute(array($reset_id, $email));

                $protocol = $_SERVER['REQUEST_SCHEME'] . '://';
                $url      = $protocol . $_SERVER['SERVER_NAME'] . '/project@rei_skipTracing/auth/passwordReset.php?resetID=' . $reset_id;

                $mailSubject = "SkipNCall Password Reset";
                $mailBody    = "
                Hi, <br>
                We have received a password reset request for REIWEBSUITE account. Please click the button below to visit your password reset panel.
                <br>
                <a href='$url' style='padding: 8px 12px; border: 1px solid #ED2939;border-radius: 2px;font-size: 14px;text-decoration: none;font-weight:bold;display: inline-block;background:red;color:white'>
                Reset Password            
                </a>
                <br><br>
                Thank you.
                ";

                $this->sendEmail($mailSubject, $email, $mailBody);

                return '<small class="text-success">Reset link has been sent.</small>';
            } else {
                return 'Invalid email address.';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function is_resetable($reset_id)
    {
        try {

            $stmt = $this->conn->prepare("SELECT id FROM `password_resets` WHERE reset_id = ? ");
            $stmt->execute(array($reset_id));
            $output = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($output) > 0) {

                $stmt = $this->conn->prepare("SELECT id FROM `password_resets` WHERE reset_id = ? AND is_expired = ? ");
                $stmt->execute(array($reset_id, 1));
                $output = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($output) > 0) {
                    return 'expired';
                } else {
                    return 'valid';
                }
            } else {
                return 'invalid';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function reset_password($data)
    {
        try {

            $reset_id     = $data['reset_id'];
            $password     = $data['password'];
            $confirm_pass = $data['confirm_password'];

            if ($password == $confirm_pass) {

                $stmt = $this->conn->prepare("SELECT id FROM `password_resets` WHERE reset_id = ? ");
                $stmt->execute(array($reset_id));
                $output = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($output) > 0) {

                    $stmt = $this->conn->prepare("SELECT id FROM `password_resets` WHERE reset_id = ? AND is_expired = ? ");
                    $stmt->execute(array($reset_id, 1));
                    $output = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (count($output) > 0) {
                        return 'Reset link is expired.';
                    } else {

                        $stmt = $this->conn->prepare("SELECT reset_email FROM `password_resets` WHERE reset_id = ? ");
                        $stmt->execute(array($reset_id));
                        $output = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($output as $x) {
                            $reset_email = $x['reset_email'];
                        }

                        $password = password_hash($password, PASSWORD_DEFAULT);

                        $stmt = $this->conn->prepare("UPDATE `clients` SET `client_password`= ? WHERE client_email = '$reset_email' ");
                        $stmt->execute(array($password));

                        $stmt = $this->conn->prepare("UPDATE `password_resets` SET `is_expired`= 1 WHERE reset_email = ?");
                        $stmt->execute(array($reset_email));

                        return '<script>alert("Your password is successfully updated.");window.location="index.php?signIn=1"</script>';
                    }
                } else {

                    return 'Invalid reset link.';
                }
            } else {
                return 'Passwords do not match.';
            }
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
