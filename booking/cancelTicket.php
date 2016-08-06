<?php
require_once(dirname(__FILE__).'/../login/loginheader.php');

require_once 'Ticket.php';

$cust_id = $_SESSION['user_id'];
//$ticket_id = $_POST['ticket_id'] ?? null;
if (isset($_POST['ticket_id'])) {
    $ticket_id = $_POST['ticket_id'];

    $ticket = new Ticket();
    if ($ticket->cancel($cust_id, $ticket_id)) {
        http_response_code(200);
        echo "Success";
    } else{
        http_response_code(400);
        echo "Failed";
    }
} else {
    http_response_code(403);
    echo "Please provide proper parameters";
}