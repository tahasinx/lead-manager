<?php

require_once '../../vendor/database/Database.php';

class Admin
{

    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function admin_signout()
    {
        session_destroy();
        header('location:../../auth/index.php?signIn=1');
    }

    public function get_orders()
    {
        try {

            if (isset($_GET['client_id'])) {
                $cleint_id = $_GET['client_id'];

                $stmt = $this->conn->prepare("SELECT * FROM `orders` WHERE client_id = ?");
                $stmt->execute(array($cleint_id));
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $stmt = $this->conn->prepare("SELECT * FROM `orders`");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }


            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function getOrderBy_id($order_id)
    {
        try {


            $stmt = $this->conn->prepare("SELECT * FROM `site_orders` WHERE order_id = ?");
            $stmt->execute(array($order_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getImages()
    {
        try {

            $order_id = $_GET['order_id'];

            $stmt = $this->conn->prepare("SELECT * FROM `order_images` WHERE order_id = '$order_id'");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getVideos()
    {
        try {

            $order_id = $_GET['order_id'];

            $stmt = $this->conn->prepare("SELECT * FROM `order_videos` WHERE order_id = '$order_id'");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getTexts()
    {
        try {

            $order_id = $_GET['order_id'];

            $stmt = $this->conn->prepare("SELECT * FROM `order_texts` WHERE order_id = '$order_id'");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function adminData($column)
    {
        try {

            $admin_id = $_SESSION['admin@id'];

            $stmt = $this->conn->prepare("SELECT $column FROM `clients` WHERE client_id = ? ");
            $stmt->execute(array($admin_id));
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

            $admin_id = $_SESSION['admin@id'];
            extract($data);

            $stmt = $this->conn->prepare("UPDATE `clients` SET `client_firstname`= ?,`client_lastname`= ?, `client_contact`= ? WHERE client_id = '$admin_id'");
            $stmt->execute(array($client_firstname, $client_lastname, $client_contact));
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateProfilPicture($data)
    {
        try {

            $admin_id = $_SESSION['admin@id'];


            if (file_exists($_FILES['propic']['tmp_name']) || is_uploaded_file($_FILES['propic']['tmp_name'])) {

                $path = $_FILES['propic']['name'];
                $ext  = pathinfo($path, PATHINFO_EXTENSION);

                $propic  = random_int(1000000000, 100000000000) . '.' . $ext;

                $stmt = $this->conn->prepare("UPDATE `clients` SET `client_propic`= ? WHERE client_id = '$admin_id'");
                $stmt->execute(array($propic));

                if (file_exists($_FILES['propic']['tmp_name']) || is_uploaded_file($_FILES['propic']['tmp_name'])) {

                    if (!empty($data['oldPic'])) {
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

    public function clientData_byID($cleint_id, $column)
    {
        try {

            $stmt = $this->conn->prepare("SELECT $column FROM `clients` WHERE client_id = ? ");
            $stmt->execute(array($cleint_id));
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

    public function clients()
    {
        try {

            $stmt = $this->conn->prepare("SELECT *FROM `clients` WHERE is_admin = 0 ");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function clientProfileByID($client_id)
    {
        try {

            $stmt = $this->conn->prepare("SELECT *FROM `clients` WHERE client_id = ? ");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getCurrentBalance($client_id)
    {
        try {

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

    public function reset_password($data)
    {
        try {

            $admin_id     = $_SESSION['admin@id'];
            $old_pass      = $data['old_pass'];
            $new_pass      = $data['new_pass'];
            $confirm_pass  = $data['confirm_pass'];

            if ($new_pass == $confirm_pass) {

                $hashed_pass = $this->adminData('client_password');

                if (password_verify($old_pass, $hashed_pass)) {

                    $password = password_hash($new_pass, PASSWORD_DEFAULT);

                    $stmt = $this->conn->prepare("UPDATE `clients` SET `client_password`= ? WHERE client_id = '$admin_id'");
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

    public function erase_zip($data)
    {
        try {

            $tracking_id = $data['tracking_id'];

            $stmt = $this->conn->prepare("DELETE FROM `zips` WHERE tracking_id = ? ");
            $stmt->execute(array($tracking_id));

            header('location:#close');
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update_zip($data)
    {
        try {

            extract($data);

            $stmt = $this->conn->prepare("SELECT *FROM `zips` WHERE zip_code = ? AND state_name <> '$state_name'");
            $stmt->execute(array($zip_code));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {

                foreach ($result as $x) {
                    $zip_state = $x['state_name'];
                }

                return "Zip code already exists under <span style='color:blueviolet'>$zip_state</span> state.";
            }

            $stmt = $this->conn->prepare("SELECT *FROM `zips` WHERE zip_code = ? AND state_name = ? AND tracking_id <> ? ");
            $stmt->execute(array($zip_code, $state_name, $tracking_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                return "Zip code already exists under this state.";
            }

            $stmt = $this->conn->prepare("UPDATE `zips` SET `state_name`= ? ,`zip_code`= ? ,`city`= ?,`county`= ?, price = ? WHERE tracking_id = '$tracking_id'");
            $stmt->execute(array($state_name, $zip_code, $city, $county, $price));

            header('location:#close');
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function my_zips()
    {
        try {
            $client_id   = $_SESSION['admin@id'];

            $stmt = $this->conn->prepare("SELECT *FROM `zips` WHERE occupied_by = ? AND is_occupied = 1 ");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function transactions()
    {
        try {

            if (isset($_GET['client_id'])) {

                $client_id = $_GET['client_id'];

                $stmt = $this->conn->prepare("SELECT * FROM `transactions` WHERE client_id = ?");
                $stmt->execute(array($client_id));
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $stmt = $this->conn->prepare("SELECT * FROM `transactions`");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getCurrentBalanceData($client_id, $column)
    {
        try {

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

    public function share_file($data)
    {
        try {

            $client_id = $_GET['client_id'];

            if (file_exists($_FILES['file']['tmp_name'])) {

                $path = $_FILES['file']['name'];
                $ext  = pathinfo($path, PATHINFO_EXTENSION);

                if ($ext == 'csv') {

                    extract($data);

                    $tracking_id      = 'track@' . date('Ymdhis') . ':' . random_int(100000000, 10000000000);
                    $bytes            = bin2hex(random_bytes(7));
                    $payment_id       = 'tr_' . date('YmdHis'). $bytes . random_int(1000000, 100000000);
                    $file_name        = str_replace('.csv', '', $file_name);
                    $uploadedFileName = str_replace('.csv', '', $uploadedFile_name);
                    $balance_id       = $this->getCurrentBalanceData($client_id, 'balance_id');

                    if ($file_name <> $uploadedFileName) {
                        return "File names do not match. Please rename your file as the same as the client's one. And try again.";
                    }

                    $stmt = $this->conn->prepare("INSERT INTO `skiptraced_files`(`tracking_id`, `client_id`, `file_name`, `totalLead`, `totalVerifiedOwner`, `totalOffer`, `leadCost`, `verifiedLeadCost`, `offerLeadCost`, `upload_date`, `paid_amount`, `payment_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                    $stmt->execute(array($tracking_id, $client_id, $file_name, $totalLead, $totalVerifiedOwner, $totalOffer, $leadCost, $verifiedLeadCost, $offerLeadCost, date('Y-m-d'), $totalCost, $payment_id));

                    if (file_exists("../../uploads/files/admin/$file_name.csv")) {
                        unlink("../../uploads/files/admin/$file_name.csv");
                    }else{

                        $stmt = $this->conn->prepare("UPDATE `client_balance` SET `current_balance`= current_balance - '$totalCost' WHERE balance_id = ?");
                        $stmt->execute(array($balance_id));
    
                        $stmt = $this->conn->prepare("INSERT INTO `transactions`(`client_id`, `balance_id`,`payment_id`, `amount`, `date`, `month`, `year`, `for_file`) VALUES (?,?,?,?,?,?,?,?)");
                        $stmt->execute(array($client_id, $balance_id, $payment_id, $totalCost, date('Y-m-d'), date('F'), date('Y'), 1));
                        
                    }

                    $target_dir  = "../../uploads/files/admin/";
                    $target_file = $target_dir . $file_name . '.' . $ext;
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

                    return 'success';
                } else {
                    return '<span class="text-danger">Upload valid format. Only CSV is allowed type.</span>';
                }
            } else {
                return '<span class="text-danger">Please upload a file.</span>';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getReceived_files()
    {
        try {


            if (isset($_GET['client_id'])) {
                $client_id   = $_GET['client_id'];
                $stmt = $this->conn->prepare("SELECT * FROM `shared_files` WHERE client_id = ? ORDER BY zip_code DESC");
                $stmt->execute(array($client_id));
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $stmt = $this->conn->prepare("SELECT * FROM `shared_files` ORDER BY zip_code DESC");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }


            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function clientZips($client_id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT *FROM `zips` WHERE occupied_by = ? AND is_occupied = 1 ");
            $stmt->execute(array($client_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getShared_files()
    {
        try {


            if (isset($_GET['client_id'])) {
                $client_id   = $_GET['client_id'];
                $stmt = $this->conn->prepare("SELECT * FROM `skiptraced_files` WHERE client_id = ? ORDER BY zip_code DESC");
                $stmt->execute(array($client_id));
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $stmt = $this->conn->prepare("SELECT * FROM `skiptraced_files` ORDER BY zip_code DESC");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }


            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function zipSBy_pid($payment_id)
    {
        try {

            $stmt = $this->conn->prepare("SELECT *FROM `selected_zips` WHERE payment_id = ? ");
            $stmt->execute(array($payment_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function clientData($client_id, $column)
    {
        try {
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

    public function isIn_skipTraced($file_name)
    {
        try {
            $stmt = $this->conn->prepare("SELECT id FROM `skiptraced_files` WHERE file_name = ? ");
            $stmt->execute(array($file_name));
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

    public function notIn_skipTraced()
    {
        try {
            $stmt = $this->conn->prepare("SELECT id FROM `shared_files` WHERE file_name NOT IN (SELECT file_name FROM `skiptraced_files`)");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function is_purchased($file_name)
    {
        try {
            $stmt = $this->conn->prepare("SELECT stripe_id FROM `skiptraced_files` WHERE file_name = ? ");
            $stmt->execute(array($file_name));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                foreach ($result as $x) {
                    return $x['stripe_id'];
                }
            } else {
                return 'N/A';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function is_unlocked($file_name)
    {
        try {
            $stmt = $this->conn->prepare("SELECT id FROM `skiptraced_files` WHERE file_name = ? AND is_unlocked = 1");
            $stmt->execute(array($file_name));
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

    public function getFile_by_pid($stripe_id)
    {

        try {

            $stmt = $this->conn->prepare("SELECT file_name FROM `skiptraced_files` WHERE stripe_id = ? ");
            $stmt->execute(array($stripe_id));
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

    public function totalTransactions()
    {

        try {


            $stmt = $this->conn->prepare('SELECT SUM(amount) AS value_sum FROM transactions');
            $stmt->execute();

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

    // _______________________________________________ Lead Management

    public function leadsFromREIWebSuite()
    {
        try {
            $content = file_get_contents("http://127.0.0.1/project@rei_signalwire/panel/admin/test.php");
            $result = json_decode($content, true);
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function pullNewLeadsFrom_reiwebsuite()
    {
        try {

            $leadsFromREIWebSuite = $this->leadsFromREIWebSuite();

            $i = 0;

            foreach ($leadsFromREIWebSuite as $data) {
                extract($data);

                $stmt = $this->conn->prepare("SELECT id FROM `lead_contacts` WHERE reference_id = ? ");
                $stmt->execute(array($id));
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($result) == 0) {

                    $i++;

                    $bytes       = bin2hex(random_bytes(7));
                    $tracking_id = 'track@' . date('YmdHis') . $bytes . random_int(10000000, 100000000000) . '_' . $id;

                    $stmt = $this->conn->prepare("INSERT INTO `lead_contacts`(`tracking_id`,`reference_id`, `contact_firstname`, `contact_lastname`, `contact_address`, `contact_city`, `contact_state`, `contact_zip`, `contact_email`, `contact_country`, `contact_type`, `is_verified`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                    $stmt->execute(array($tracking_id, $id, $contact_firstname, $contact_lastname, $contact_address, $contact_city, $contact_state, $contact_zip, $contact_email, $contact_country, $contact_type, $is_varified));
                }
            }

            if ($i == 0) {
                return "<span class='text-danger'>No record is found to pull.</span>";
            } else {
                return "<span class='text-success'>Number of pulled record: $i</span>";
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function leadsFromSkipNCall($zip_code)
    {
        try {

            $stmt = $this->conn->prepare("SELECT * FROM `lead_contacts` WHERE contact_zip = ?");
            $stmt->execute(array($zip_code));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getZips()
    {
        try {

            $stmt = $this->conn->prepare("SELECT contact_zip FROM `lead_contacts` GROUP BY contact_zip ORDER BY contact_zip");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function availableZips()
    {
        try {

            $stmt = $this->conn->prepare("SELECT * FROM `lead_contacts`");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getPackageInfo($client_id, $category)
    {
        try {

            $stmt = $this->conn->prepare("SELECT `package_id` FROM `client_packages` WHERE client_id = ? AND package_category = ?");
            $stmt->execute(array($client_id, $category));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                foreach ($result as $data) {
                    $package_id = $data['package_id'];
                }
            } else {
                $package_id = '';
            }

            $stmt = $this->conn->prepare("SELECT * FROM `packages` WHERE `package_id` = ?");
            $stmt->execute(array($package_id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
