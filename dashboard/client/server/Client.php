<?php

require_once '../../vendor/database/Database.php';

class Client
{

    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function client_signout()
    {
        session_destroy();
        header('location:../../auth/index.php?signIn=1');
    }

    public function markAsVerified()
    {
        try {

            $client_id = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT is_verified FROM `clients` WHERE client_id = ? ");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $data) {
                $is_verified = $data['is_verified'];
            }

            if ($is_verified == 0) {
                $stmt = $this->conn->prepare("UPDATE `clients` SET `is_verified`= 1 WHERE client_id = ? ");
                $stmt->execute(array($client_id));
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function clientData($column)
    {
        try {

            $client_id = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT $column FROM `clients` WHERE client_id = ? ");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $x) {
                $data = $x[$column];
            }

            if (count($result) == 0) {
                $data = "";
            }

            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateProfileData($data)
    {
        try {

            $client_id = $_SESSION['client@id'];
            extract($data);

            $stmt = $this->conn->prepare("UPDATE `clients` SET `client_firstname`= ?,`client_lastname`= ?, `client_contact`= ? WHERE client_id = '$client_id'");
            $stmt->execute(array($client_firstname, $client_lastname, $client_contact));
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateProfilPicture($data)
    {
        try {

            $client_id = $_SESSION['client@id'];


            if (file_exists($_FILES['propic']['tmp_name']) || is_uploaded_file($_FILES['propic']['tmp_name'])) {

                $path = $_FILES['propic']['name'];
                $ext  = pathinfo($path, PATHINFO_EXTENSION);

                $propic  = random_int(1000000000, 100000000000) . '.' . $ext;

                $stmt = $this->conn->prepare("UPDATE `clients` SET `client_propic`= ? WHERE client_id = '$client_id'");
                $stmt->execute(array($propic));

                if (file_exists($_FILES['propic']['tmp_name']) || is_uploaded_file($_FILES['propic']['tmp_name'])) {

                    if (!empty($data['oldPic']) || $data['oldPic'] <> '') {
                        unlink('../../uploads/images/propic/' . $data['oldPic']);
                    }

                    $target_dir = "../../uploads/images/propic/";
                    $target_file = $target_dir . $propic;
                    move_uploaded_file($_FILES["propic"]["tmp_name"], $target_file);
                }

                return "<script>alert('okay')</script>";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function get_orders()
    {
        try {

            $client_id = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT * FROM `orders` WHERE client_id = '$client_id' ORDER BY id DESC");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function reset_password($data)
    {
        try {

            $client_id     = $_SESSION['client@id'];
            $old_pass      = $data['old_pass'];
            $new_pass      = $data['new_pass'];
            $confirm_pass  = $data['confirm_pass'];

            if ($new_pass == $confirm_pass) {

                $hashed_pass = $this->clientData('client_password');

                if (password_verify($old_pass, $hashed_pass)) {

                    $password = password_hash($new_pass, PASSWORD_DEFAULT);

                    $stmt = $this->conn->prepare("UPDATE `clients` SET `client_password`= ? WHERE client_id = '$client_id'");
                    $stmt->execute(array($password));

                    return '<span class="text-success">Password is changed.</span>';
                } else {
                    return 'Password is incorrect.';
                }
            } else {
                return 'Passwords do not match.';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function get_states()
    {
        try {

            $stmt = $this->conn->prepare("SELECT *FROM `states`");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function get_zips($state)
    {
        try {

            $stmt = $this->conn->prepare("SELECT *FROM `zips` WHERE state_name = ? ORDER BY zip_code");
            $stmt->execute(array($state));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function select_zip($data)
    {
        try {
            extract($data);

            $client_id   = $_SESSION['client@id'];
            $tracking_id = 'track@' . date('Ymdhis') . random_int(1000000, 10000000000);

            $stmt = $this->conn->prepare("INSERT INTO `selected_zips`(`tracking_id`, `client_id`, `zip_code`, `state_name`, `country`, `place_name`, `price`) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute(array($tracking_id, $client_id, $zip_code, $state, $country, $place, 10));
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function isIn_selection($zip_code)
    {

        try {
            $client_id   = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT *FROM `selected_zips` WHERE client_id = ? AND zip_code = ? AND is_released = 0");
            $stmt->execute(array($client_id, $zip_code));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                return '1';
            } else {
                return '0';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function is_occupied($zip_code)
    {

        try {
            $stmt = $this->conn->prepare("SELECT *FROM `zips` WHERE zip_code = ? AND is_occupied = 1");
            $stmt->execute(array($zip_code));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                return '1';
            } else {
                return '0';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function isOccupied_byMe($zip_code)
    {

        try {
            $client_id   = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT *FROM `zips` WHERE zip_code = ? AND occupied_by = ? AND is_occupied = 1");
            $stmt->execute(array($zip_code, $client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                return '1';
            } else {
                return '0';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getSelected_zips()
    {

        try {
            $client_id   = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT *FROM `selected_zips` WHERE client_id = ? AND is_purchased = ? ");
            $stmt->execute(array($client_id, 0));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addNew_zip($data)
    {
        try {
            extract($data);

            $tracking_id = 'track@' . date('Ydmhis') . random_int(10000000, 1000000000);

            $stmt = $this->conn->prepare("SELECT *FROM `zips` WHERE zip_code = ? ");
            $stmt->execute(array($zip_code));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                foreach ($result as $x) {
                    $zip_state = $x['state_name'];
                }
                if ($zip_state == $state_name) {
                    return "Zip code already exists.";
                } else {
                    return "Zip code already exists under <span style='color:blueviolet'>$zip_state</span> state.";
                }
            }


            $stmt = $this->conn->prepare("INSERT INTO `zips`(`tracking_id`,`state_name`, `zip_code`, `city`, `county`,`price`) VALUES (?,?,?,?,?,?)");
            $stmt->execute(array($tracking_id, $state_name, $zip_code, $city, $county, $price));

            return "<span class='text-success'> Zip added into the list.</span>";

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function zipSBy_pid($payment_id)
    {

        try {
            $client_id   = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT *FROM `selected_zips` WHERE client_id = ? AND payment_id = ? ");
            $stmt->execute(array($client_id, $payment_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getFile_by_pid($stripe_id)
    {

        try {
            $client_id   = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT file_name FROM `skiptraced_files` WHERE client_id = ? AND stripe_id = ? ");
            $stmt->execute(array($client_id, $stripe_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                foreach ($result as $x) {
                    $file_name = $x['file_name'];
                }
            } else {
                $file_name = "N/A";
            }

            return $file_name;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function remove_Selection($data)
    {
        try {

            $tracking_id = $data['tracking_id'];
            $client_id   = $_SESSION['client@id'];

            if (isset($_GET['id'])) {
                $destination = '#state-' . $_GET['id'];
            } else {
                $destination = '#close';
            }

            $stmt = $this->conn->prepare("DELETE FROM `selected_zips` WHERE tracking_id = ? ");
            $stmt->execute(array($tracking_id));

            $stmt = $this->conn->prepare("SELECT id FROM `selected_zips` WHERE client_id = ? ");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) == 0) {
                header("location: $destination");
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function totalCost_ofSelection()
    {

        try {
            $client_id   = $_SESSION['client@id'];

            $stmt = $this->conn->prepare('SELECT SUM(price) AS value_sum FROM selected_zips  WHERE client_id = ? AND is_purchased = ?');
            $stmt->execute(array($client_id, 0));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['value_sum'] <> '') {
                $sum = $row['value_sum'];
            } else {
                $sum = "0";
            }
            return $sum;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function saveBilling_info($data)
    {
        try {

            $client_id   = $_SESSION['client@id'];

            extract($data);

            $stmt = $this->conn->prepare("SELECT id FROM `billing_information` WHERE client_id = ? ");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                $stmt = $this->conn->prepare("UPDATE `billing_information` SET `card_no`= ? ,`month`= ?,`year`= ?,`cvc`= ? WHERE client_id = ?");
                $stmt->execute(array($card_no, $month, $year, $cvc, $client_id));
            } else {

                $tracking_id = 'tracking@' . date('Ymdhis:') . random_int(10000000, 10000000000);

                $stmt = $this->conn->prepare("INSERT INTO `billing_information`(`tracking_id`, `client_id`, `card_no`, `month`, `year`, `cvc`) VALUES (?,?,?,?,?,?)");
                $stmt->execute(array($tracking_id, $client_id, $card_no, $month, $year, $cvc));
            }



            return 'updated !';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getBilling_info()
    {
        try {
            $client_id   = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT *FROM `billing_information` WHERE client_id = ? ");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function add_balance($payment_id, $funded_amount)
    {
        try {
            $client_id = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT * FROM `client_balance` WHERE client_id = ? ORDER BY id DESC LIMIT 1");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                foreach ($result as $x) {
                    $previous_balance = $x['current_balance'];
                }
            } else {
                $previous_balance = 0;
            }

            $current_balance = $funded_amount + $previous_balance;
            $balance_id      = 'balance@' . date('ymdHis') . random_int(100000, 1000000000);

            $stmt = $this->conn->prepare("INSERT INTO `client_balance`(`balance_id`,`client_id`, `payment_id`, `funded_balance`, `current_balance`, `payment_date`, `payment_year`, `payment_month`) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->execute(array($balance_id, $client_id, $payment_id, $funded_amount, $current_balance, date('Y-m-d'), date('Y'), date('F')));

            header('location:balanceNbilling.php#@successfulPayment');
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function purchase_zips($data)
    {
        try {
            $client_id  = $_SESSION['client@id'];
            $bytes      = bin2hex(random_bytes(7));
            $payment_id = 'tr_' . date('YmdHis'). $bytes . random_int(1000000, 100000000);

            $balance_id      = $this->getCurrentBalanceData('balance_id');
            $current_balance = $this->getCurrentBalance();
            $order_cost      = $this->totalCost_ofSelection();

            if ($current_balance < $order_cost) {
                return 'balanceError';
            }

            $zip_codes = implode("','", $data['zipCode']);

            $stmt = $this->conn->prepare("UPDATE `selected_zips` SET `is_purchased`= 1 ,`payment_id`= '$payment_id' WHERE client_id = ? AND zip_code IN ('$zip_codes')");
            $stmt->execute(array($client_id));

            $remainigBalance = $current_balance - $order_cost;

            $stmt = $this->conn->prepare("UPDATE `client_balance` SET `current_balance`= '$remainigBalance' WHERE balance_id = ?");
            $stmt->execute(array($balance_id));

            $stmt = $this->conn->prepare("INSERT INTO `transactions`(`client_id`, `balance_id`,`payment_id`, `amount`, `date`, `month`, `year`, `for_zips`) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->execute(array($client_id, $balance_id, $payment_id, $order_cost, date('Y-m-d'), date('F'), date('Y'), 1));

            $stmt = $this->conn->prepare("SELECT *FROM `selected_zips` WHERE payment_id = ? ");
            $stmt->execute(array($payment_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $x) {
                extract($x);

                $tracking_id = 'tracking@' . date('Ymdhis:') . random_int(10000000, 10000000000) . $bytes;

                $stmt = $this->conn->prepare("INSERT INTO `zips`(`tracking_id`, `state_name`, `zip_code`, `country`,`place_name`,`price`, `is_occupied`, `occupied_by`) VALUES (?,?,?,?,?,?,?,?)");
                $stmt->execute(array($tracking_id, $state_name, $zip_code, $country, $place_name, 10, 1, $client_id));
            }

            return 'success';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getCurrentBalance()
    {
        try {
            $client_id = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT `current_balance` FROM `client_balance` WHERE client_id = ? ORDER BY id DESC LIMIT 1");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                foreach ($result as $x) {
                    $current_balance = $x['current_balance'];
                }
            } else {
                $current_balance = 0;
            }

            return $current_balance;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getCurrentBalanceData($column)
    {
        try {
            $client_id = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT $column FROM `client_balance` WHERE client_id = ? ORDER BY id DESC LIMIT 1");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                foreach ($result as $x) {
                    $data = $x[$column];
                }
            } else {
                $data = '';
            }

            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getTopUps()
    {
        try {
            $client_id = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT *FROM `client_balance` WHERE client_id = ? ORDER BY id DESC");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function purchase_leads($data, $stripeID, $amount)
    {
        try {
            $client_id = $_SESSION['client@id'];
            $file_name = $data['file_id'];

            $stmt = $this->conn->prepare("UPDATE `skiptraced_files` SET `stripe_id`= ? ,`paid_amount`= ? ,`is_unlocked`= ? WHERE client_id = ? AND file_name = ?");
            $stmt->execute(array($stripeID, $amount, 1, $client_id, $file_name));

            $amount = $amount / 100;

            $stmt = $this->conn->prepare("INSERT INTO `transactions`(`client_id`, `stripe_id`, `amount`, `date`, `month`, `year`, `for_leads`) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute(array($client_id, $stripeID, $amount, date('Y-m-d'), date('F'), date('Y'), 1));

            $_SESSION['successful'] = 1;

            header('location:purchase.php?fileID=1');
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function my_zips()
    {
        try {
            $client_id   = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT *FROM `zips` WHERE occupied_by = ? AND is_occupied = 1 ");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function release_zip($data)
    {
        try {
            $client_id   = $_SESSION['client@id'];
            $tracking_id = $data['tracking_id'];
            $zip_code    = $data['zip_code'];

            $stmt = $this->conn->prepare("UPDATE `zips` SET `is_occupied`= 0 ,`occupied_by`= NULL WHERE tracking_id = ? AND occupied_by = ? AND is_occupied = 1 ");
            $stmt->execute(array($tracking_id, $client_id));

            $stmt = $this->conn->prepare("UPDATE `selected_zips` SET `is_released`= 1 WHERE zip_code = ? AND client_id = ? ");
            $stmt->execute(array($zip_code, $client_id));
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function my_transactions()
    {
        try {
            $client_id   = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT * FROM `transactions` WHERE client_id = ?");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function share_file($data)
    {
        try {

            $client_id = $_SESSION['client@id'];

            if (file_exists($_FILES['file']['tmp_name'])) {

                $path = $_FILES['file']['name'];
                $ext  = pathinfo($path, PATHINFO_EXTENSION);

                if ($ext == 'csv') {

                    $first_name = $this->clientData('client_firstname');
                    $last_name  = $this->clientData('client_lastname');

                    $fn_part = strtoupper(substr($first_name, 0, 2));
                    $ln_part = strtoupper(substr($last_name, 0, 2));

                    // LU041521PA-MMDDYY-01

                    $today   = date('Y-m-d');

                    $stmt = $this->conn->prepare("SELECT id FROM `shared_files` WHERE client_id = '$client_id' AND upload_date = '$today'");
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $totalSharedTotday = count($result) + 1;

                    $file_name   = $fn_part . date('mdy') . $ln_part . '-' . date('mdY') . '-' . $totalSharedTotday . '-r' . random_int(10000, 10000000);

                    $target_dir  = "../../uploads/files/client/";
                    $target_file = $target_dir . $file_name . '.' . $ext;

                    $fileName    = $file_name . '.' . $ext;
                
                    $tracking_id = 'track@' . date('Ymdhis') . ':' . random_int(100000000, 10000000000);

                    $stmt = $this->conn->prepare("INSERT INTO `shared_files`(`tracking_id`, `client_id`, `file_name`, `upload_date`) VALUES (?,?,?,?)");
                    $stmt->execute(array($tracking_id, $client_id, $file_name, date('Y-m-d')));

                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

                    return '<span class="text-success">File is uploaded sucessfully.</span>';
                    // $mailSubject = 'SkipTracing Notification';
                    // $mailTo      = 'support@reiwebsuite.com';

                    // $mailBody    = "There is a new skip tracing request found from an owner.";

                    // $this->sendEmail($mailSubject, $mailTo, $mailBody);
                    // header('location:#close');

                } else {
                    return '<span class="text-danger">Upload valid format.</span>';
                }
            } else {
                return '<span class="text-danger">Please upload a file.</span>';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getShared_files()
    {
        try {
            $client_id   = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT * FROM `shared_files` WHERE client_id = ? ORDER BY id DESC");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getReceived_files()
    {
        try {
            $client_id   = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT * FROM `skiptraced_files` WHERE client_id = ? ORDER BY zip_code");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getReceived_fileByName($file_name)
    {
        try {
            $client_id   = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT * FROM `skiptraced_files` WHERE client_id = ? AND file_name = ? ORDER BY zip_code");
            $stmt->execute(array($client_id, $file_name));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // _____________________________________________ package

    public function activePackage($data)
    {
        try {
            $client_id         = $_SESSION['client@id'];
            $package_category  = $data['package_category'];
            $package_id        = $data['package_id'];

            $stmt = $this->conn->prepare("DELETE FROM `client_packages` WHERE client_id = '$client_id' AND package_category = ?");
            $stmt->execute(array($package_category));

            $stmt = $this->conn->prepare("INSERT INTO `client_packages`(`client_id`, `package_category`, `package_id`) VALUES (?,?,?)");
            $stmt->execute(array($client_id, $package_category, $package_id));
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function checkPackage($package_id)
    {
        try {
            $client_id = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT id FROM `client_packages` WHERE client_id = ? AND package_id = ?");
            $stmt->execute(array($client_id, $package_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return count($result);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function hasPackage($package_category)
    {
        try {
            $client_id = $_SESSION['client@id'];

            $stmt = $this->conn->prepare("SELECT id FROM `client_packages` WHERE client_id = ? AND package_category = ?");
            $stmt->execute(array($client_id, $package_category));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return count($result);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
