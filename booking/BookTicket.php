<?php

require_once(dirname(__FILE__).'/../login/loginheader.php');

require_once 'Ticket.php';


if (isset($_POST['from']) && isset($_POST['to']) && isset($_POST['date'])) {

    $ticket = new Ticket();

    $from = $_POST['from'];
    $to = $_POST['to'];
    $date = $_POST['date'];
    $cust_id = $_SESSION['user_id'];

    if($ticket->create($from, $to, $date, $cust_id, array(1,3,4))) {

        http_response_code(200);
        echo "Success";
    } else {
        http_response_code(400);
        echo "Failed";
    }

} else {
    http_response_code(403);
    echo "Please provide proper parameters";
}