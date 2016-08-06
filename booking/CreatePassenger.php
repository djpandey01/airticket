<?php

require_once(dirname(__FILE__).'/../login/loginheader.php');


if (!isset($_POST['first_name']) || !isset( $_POST['last_name']) || !isset($_POST['age'])) {

    http_response_code(400);
    echo "Please provide First name , last name and Age";
    return false;
} else {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $cust_id = $_SESSION['user_id'];

    require_once('Passenger.php');

    $pass = new Passenger();

    if ($pass->create($first_name, $last_name, $age, $cust_id)) {
        http_response_code(200);
        echo "Passenger created successfully";
    } else {
        http_response_code(403);
        echo "Passenger creation failed";

    }
}