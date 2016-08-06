<?php

require_once 'login/loginheader.php';
require_once 'booking/Ticket.php';

$cust_id = $_SESSION['user_id'];

$ticket = new Ticket();

//$status = $ticket->create("Howrah", "Chennai", "+2 day", $cust_id, array(2,5,7,9));

//$status = $ticket->get($cust_id, 4);
$status = $ticket->getAll($cust_id);
//$status = $ticket->cancel($cust_id, 6);
header('Content-Type: application/json');
echo json_encode($status);
