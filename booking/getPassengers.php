<?php

session_start();

if (!isset($_SESSION['user_id'])) {

    http_response_code(400);
    echo "Please login";
} else {

    $cust_id = $_SESSION['user_id'];

    require_once('Passenger.php');

    $pass = new Passenger();
    $passAll = $pass->getAll($cust_id);

    header('Content-Type: application/json');

    echo json_encode($passAll);
}

