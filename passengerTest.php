<?php

session_start();

$cust_id = $_SESSION['user_id'];

include_once('booking/Passenger.php');


$newPass = new Passenger();

$stat = $newPass->getAll($cust_id);

print_r($stat);

print_r($stat);