<?php

require_once '../app/config/include/DbHandler.php';
require_once '../app/config/include/PassHash.php';
//require '.././libs/Slim/Slim.php';
require '../vendor/slim/slim/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// User id from db - Global Variable
$user_id = NULL;

/**
 * Verifying required params posted or not
 */
function verifyRequiredParams($required_fields) {
    $error = false;
    $error_fields = "";
    $request_params = array();
    $request_params = $_REQUEST;
    // Handling PUT request params
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $app = \Slim\Slim::getInstance();
        parse_str($app->request()->getBody(), $request_params);
    }
    foreach ($required_fields as $field) {
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            $error = true;
            $error_fields .= $field . ', ';
        }
    }

    if ($error) {
        // Required field(s) are missing or empty
        // echo error json and stop the app
        $response = array();
        $app = \Slim\Slim::getInstance();
        $response["error"] = true;
        $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
        echoRespnse(400, $response);
        $app->stop();
    }
}

/**
 * Validating email address
 */
function validateEmail($email) {
    $app = \Slim\Slim::getInstance();
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["error"] = true;
        $response["message"] = 'Email address is not valid';
        echoRespnse(400, $response);
        $app->stop();
    }
}

/**
 * Echoing json response to client
 * @param String $status_code Http response code
 * @param Int $response Json response
 */
function echoRespnse($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    // Http response code
    $app->status($status_code);

    // setting response content type to json
    $app->contentType('application/json');

    echo json_encode($response);
}

/**
 * Adding Middle Layer to authenticate every request
 * Checking if the request has valid api key in the 'Authorization' header
 */
function authenticate(\Slim\Route $route) {
    // Getting request headers
    $headers = apache_request_headers();
    $response = array();
    $app = \Slim\Slim::getInstance();

    // Verifying Authorization Header
    if (isset($headers['Authorization'])) {
        $db = new DbHandler();

        // get the api key
        $api_key = $headers['Authorization'];
        // validating api key
        if (!$db->isValidApiKey($api_key)) {
            // api key is not present in users table
            $response["error"] = true;
            $response["message"] = "Access Denied. Invalid Api key";
            echoRespnse(401, $response);
            $app->stop();
        } else {
            global $user_id;
            // get user primary key id
            $user = $db->getUserId($api_key);
            if ($user != NULL)
                $user_id = $user["id"];
        }
    } else {
        // api key is missing in header
        $response["error"] = true;
        $response["message"] = "Api key is misssing";
        echoRespnse(400, $response);
        $app->stop();
    }
}

/**
 * Creating new value record
 * url - /device
 * method - POST
 * params - device_name, type,
 */

$app->post('/value', 'authenticate', function() use ($app) {
    // check for required params
    verifyRequiredParams(array('id','value'));
    $response = array();

    // reading post params
    global $user_id;
    $id = $app->request->post('id');
    $value = $app->request->post('value');

    $db = new DbHandler();
    $res = $db->createRecord($id, $user_id, $value);

    if ($res == USER_CREATED_SUCCESSFULLY) {
        $response["error"] = false;
        $response["message"] = "Value successfully added";
        echoRespnse(201, $response);
    } else if ($res == USER_CREATE_FAILED) {
        $response["error"] = true;
        $response["message"] = "Oops! An error occurred while creating";
        echoRespnse(200, $response);
    } else if ($res == USER_ALREADY_EXISTED) {
        $response["error"] = true;
        $response["message"] = "Oops! Check our device ID or API key";
        echoRespnse(200, $response);
    }
});
//TODO: ide viacmenej naoko, užívateľ môže vytvárať zaraideniam iným užívateĽom
//TODO: nemam premyslene ako tam davat typy zariadeni
/**
 * Creating new device
 * url - /device
 * method - POST
 * params - device_name, type,
 */

$app->post('/device', 'authenticate', function() use ($app) {
    // check for required params
    verifyRequiredParams(array('name'));
    $response = array();

    // reading post params
    global $user_id;
    $device_name = $app->request->post('name');
    $type = $app->request->post('type');


    $db = new DbHandler();
    $res = $db->createDevice($device_name, $type, $user_id);

    if ($res == USER_CREATED_SUCCESSFULLY) {
        $response["error"] = false;
        $response["message"] = "Device successfully created";
        echoRespnse(201, $response);
    } else if ($res == USER_CREATE_FAILED) {
        $response["error"] = true;
        $response["message"] = "Oops! An error occurred while creating";
        echoRespnse(200, $response);
    } else if ($res == USER_ALREADY_EXISTED) {
        $response["error"] = true;
        $response["message"] = "Sorry, this device name already existed";
        echoRespnse(200, $response);
    }
});

/* WORKING */
/**
 * Return all device values
 * url - /value/:id
 * method - GET
 * params - id
 */

$app->get('/value/:id', function($id_device) {

    $response = array();
    $db = new DbHandler();

    // fetching all user tasks
    $result = $db->getAllDeviceValues( $id_device );

    $response["error"] = false;
    $response["tasks"] = array();

    // looping through result and preparing tasks array
    while ($task = $result->fetch_assoc()) {
        $tmp = array();
        $tmp["device_val"] = $task["device_val"];
        $tmp["created_at"] = $task["created_at"];
        $tmp["updated_at"] = $task["updated_at"];
        array_push($response["tasks"], $tmp);
    }
    echoRespnse(200, $response);

});

/* WORKING */
/**
 * Return information about device by ID
 * url - /device/:id
 * method - GET
 */

$app->get('/device/:id', function($id) {

    $response = array();
    $db = new DbHandler();

    // fetching all user tasks
    $result = $db->getDeviceInfo($id);

    $response["error"] = false;
    $response["tasks"] = array();
    //var_dump($result);

    // looping through result and preparing tasks array
    while ($task = $result->fetch_assoc()) {
        $tmp = array();
        $tmp["id_device"] = $task["id_device"];
        $tmp["id_type"] = $task["id_type"];
        $tmp["device_name"] = $task["device_name"];
        $tmp["created_at"] = $task["created_at"];
        $tmp["updated_at"] = $task["updated_at"];
        $tmp["unit"] = $task["unit"];
        array_push($response["tasks"], $tmp);
    }
    echoRespnse(200, $response);

});
/* WORKING */
/**
 * Return information about all devices
 * url - /device/
 * method - GET
 */
//TODO: v prislusnej funkcii je nezmyselny bind parameter, ale funguje
//TODO: problem s vracanim unitu - znak °C robi problem
$app->get('/device/', function() {

    $response = array();
    $db = new DbHandler();

    // fetching all user tasks
    $result = $db->getAllDevicesInfo();

    $response["error"] = false;
    $response["tasks"] = array();

    // looping through result and preparing tasks array
    while ($task = $result->fetch_assoc()) {
        $tmp = array();
        $tmp["id_device"] = $task["id_device"];
        $tmp["id_type"] = $task["id_type"];
        $tmp["device_name"] = $task["device_name"];
        $tmp["updated_at"] = $task["updated_at"];
        $tmp["created_at"] = $task["created_at"];
        //$tmp["unit"] = $task["unit"];
        array_push($response["tasks"], $tmp);
    }
    echoRespnse(200, $response);
});

/* WORKING */

//TODO: v prislusnej funkcii je nezmyselny bind parameter, ale funguje
//TODO: problem s vracanim unitu - znak °C robi problem
/**
 * Return all created types
 * url - /device/type
 * method - GET
 */
$app->get('/device/type/', function() {

    $response = array();
    $db = new DbHandler();

    // fetching all user tasks
    $result = $db->getAllDevicesTypes();

    $response["error"] = false;
    $response["tasks"] = array();

    // looping through result and preparing tasks array
    while ($task = $result->fetch_assoc()) {
        $tmp = array();
        $tmp["id_type"] = $task["id_type"];
        $tmp["device_name"] = $task["device_name"];
        //$tmp["unit"] = $task["unit"];
        array_push($response["tasks"], $tmp);
    }
    echoRespnse(200, $response);
});


$app->run();

?>