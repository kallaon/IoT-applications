<?php

/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 */
class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . './DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    /* ------------- `users` table method ------------------ */

    /**
     * Creating new user
     * @param String $name User full name
     * @param String $email User login email id
     * @param String $password User login password
     */


    /**
     * Checking user login
     * @param String $email User login email id
     * @param String $password User login password
     * @return boolean User login status success/fail
     */
    public function checkLogin($email, $password) {
        // fetching user by email
        $stmt = $this->conn->prepare("SELECT password FROM user WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $stmt->bind_result($password_hash);

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Found user with the email
            // Now verify the password

            $stmt->fetch();

            $stmt->close();

            if (PassHash::check_password($password_hash, $password)) {
                // User password is correct
                return TRUE;
            } else {
                // user password is incorrect
                return FALSE;
            }
        } else {
            $stmt->close();

            // user not existed with the email
            return FALSE;
        }
    }

    /**
     * Checking for duplicate user by email address
     * @param String $email email to check in db
     * @return boolean
     */


    private function isUserExistsName($name) {
        $stmt = $this->conn->prepare("SELECT id from user WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    /**
     * Fetching user by email
     * @param String $email User email id
     */
    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT name, email, api_key FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return NULL;
        }
    }

    /**
     * Fetching user api key
     * @param String $user_id user id primary key in user table
     */
    public function getApiKeyById($user_id) {
        $stmt = $this->conn->prepare("SELECT api_key FROM user WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        if ($stmt->execute()) {
            $api_key = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $api_key;
        } else {
            return NULL;
        }
    }



    /**
     * Validating user api key
     * If the api key is there in db, it is a valid key
     * @param String $api_key user api key
     * @return boolean
     */
    public function isValidApiKey($api_key) {
        $stmt = $this->conn->prepare("SELECT id from user WHERE api_key = ?");
        $stmt->bind_param("s", $api_key);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    /**
     * Generating random Unique MD5 String for user Api key
     */
    private function generateApiKey() {
        return md5(uniqid(rand(), true));
    }

    /* ------------- `tasks` table method ------------------ */

    /**
     * Creating new task
     * @param String $user_id user id to whom task belongs to
     * @param String $task task text c50e6fc0b21707be27c348e87f900671
     */

    //


    public function createDevice($device_name, $type, $user_id) {

        $response = array();

        // First check if device already existed in db
        if (!$this->isDeviceExists($device_name)) {
            echo "ok";
            // Generating password hash
            $stmt = $this->conn->prepare("INSERT INTO `device` (`id_device`, `user_id`, `id_type`, `device_name`, `updated_at`, `created_at`, `unit`) VALUES (NULL, ?, ?, ?, '2017-04-06 00:00:00', '2017-04-14 00:00:00', 's');");
            $stmt->bind_param("iis", $user_id,$type, $device_name);

            $result = $stmt->execute();

            $stmt->close();

            // Check for successful insertion
            if ($result) {
                // User successfully inserted
                return USER_CREATED_SUCCESSFULLY;
            } else {
                // Failed to create user
                return USER_CREATE_FAILED;
            }
        } else {
            // User with same email already existed in the db
            return USER_ALREADY_EXISTED;
        }

        return $response;
    }


    private function ifTypExists($type) {
        $stmt = $this->conn->prepare("SELECT unit from type WHERE unit = ?");
        $stmt->bind_param("s", $type);
        $stmt->execute();

        if(store_result() !== false)
        {
            return 'Assigned';
        }else{
            return 'Available';
        }
    }

    /**
     * Fetching device by name
     * @param String $device_name
     */
    private function isDeviceExists($device_name) {
        $stmt = $this->conn->prepare("SELECT device_name from device WHERE device_name = ?");
        $stmt->bind_param("s", $device_name);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    /**
     * Fetching user id by api key
     * @param String $api_key user api key
     */
    public function getUserId($api_key) {
        $stmt = $this->conn->prepare("SELECT id FROM user WHERE api_key = ?");
        $stmt->bind_param("s", $api_key);
        if ($stmt->execute()) {
            $user_id = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user_id;
        } else {
            return NULL;
        }
    }

    private function isUserExistId($id) {
        $stmt = $this->conn->prepare("SELECT name from user WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    /**
     * Fetching all device values
     * @param Integer $id of device
     */
    public function getAllDeviceValues($id) {
        $stmt = $this->conn->prepare("SELECT * FROM device_value WHERE id_device = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $tasks = $stmt->get_result();
        $stmt->close();
        return $tasks;
    }

    /**
     * Fetching all device information
     */
    public function getDeviceInfo($id) {

        $stmt = $this->conn->prepare("SELECT * FROM device WHERE id_device = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $tasks = $stmt->get_result();
        $stmt->close();
        return $tasks;
    }

    /**
     * Fetching all devices information
     */
    public function getAllDevicesInfo() {
        $binder = "*";
        $stmt = $this->conn->prepare("SELECT ? FROM device");
        $stmt->bind_param("s", $binder);
        $stmt->execute();
        $tasks = $stmt->get_result();
        $stmt->close();
        return $tasks;
    }

    /**
     * Fetching all devices types
     */
    public function getAllDevicesTypes() {
        $sql = 'SELECT device_name FROM type';
        //echo current($res);

        $result = mysqli_query($this->conn,$sql) ;

        while($row = $result->fetch_array())
        {
            echo $row['device_name'];
            echo "<br />";
        }

    }

}
?>