<?php

require_once(dirname(__FILE__).'/../login/loginheader.php');

if (!isset($_POST['pass_id'])) {

    http_response_code(403);
    echo "Please provide passenger id";
    return false;
} else {

    $pass_id = $_POST['pass_id'];
    $cust_id = $_SESSION['user_id'];

    require_once 'Passenger.php';

    $pass = new Passenger();
    $stat = $pass->delete($pass_id, $cust_id);

    if ($stat) {
        http_response_code(200);
        echo "Passenger Deleted";
    } else {
        http_response_code(400);
        echo "Passenger deletion failed";
    }
}