<?php

require_once(dirname(__FILE__).'/../login/loginheader.php');

require_once 'Ticket.php';

$ticket = new Ticket();


$cust_id = $_SESSION['user_id'];

$tickets = $ticket->getAll($cust_id);

http_response_code(200);
header('Content-Type: application/json');

echo json_encode($tickets);