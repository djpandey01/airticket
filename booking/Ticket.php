<?php

require_once(dirname(__FILE__).'/../login/includes/dbconn.php');

class Ticket extends DbConn
{
    public function create($loc_from, $loc_to, $flight_date, $cust_id, $pass_ids)
    {
        try {
            $db = new DbConn();
            $db->conn->beginTransaction();

            $fdate = $date = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $flight_date)));


            $stmt = $db->conn->prepare("INSERT INTO airbooking.bookings (loc_from, loc_to, flight_date, cust_id) 
                                                          VALUES (:loc_from, :loc_to, :flight_date, :cust_id)");
            $stmt->bindParam(":loc_from", $loc_from);
            $stmt->bindParam(":loc_to", $loc_to);
            $stmt->bindParam(":flight_date", $fdate);
            $stmt->bindParam(":cust_id", $cust_id);
            $status = $stmt->execute();
            if ($status) {
                $booking_id = $db->conn->lastInsertId();

                $query = "INSERT INTO passengers_bookings (pass_id, book_id) VALUES ";

                $numPass = count($pass_ids);
                $i = 0;
                foreach ($pass_ids as $pass_id) {
                    $query .= "($pass_id, $booking_id)";

                    if (++$i !== $numPass) {
                        $query .= ", ";
                    }
                }

                $pass_stmt = $db->conn->query($query);

                if ($pass_stmt) {

                    $db->conn->commit();
                    return true;

                } else {
                    $db->conn->rollBack();
                    return false;
                }

            } else {
                $db->conn->rollBack();
                return false;
            }
        } catch (PDOException $e) {
            $db->conn->rollBack();
            $err = "Error: " . $e->getMessage();
            return false;
        }
    }

    /*
     * Encode the array to json_encode
     */
    public function get($cust_id, $ticket_id)
    {
        try {
            $db = new DbConn();

            $stmt = $db->conn->prepare("SELECT * FROM bookings WHERE id=:ticket_id AND cust_id=:cust_id");
            $stmt->bindParam(":ticket_id", $ticket_id);
            $stmt->bindParam(":cust_id", $cust_id);
            $status = $stmt->execute();
            $bookings = $stmt->fetch(PDO::FETCH_ASSOC);

            $pass_stmt = $db->conn->prepare("SELECT * FROM passengers WHERE passengers.id IN 
                                    (SELECT pass_id FROM passengers_bookings WHERE book_id=:book_id)");
            $pass_stmt->bindParam("book_id", $ticket_id);
            $pass_stmt->execute();
            $bookings['passengers'] = $pass_stmt->fetchAll(PDO::FETCH_OBJ);

            return $bookings;

        } catch (PDOException $e) {
            $err = "Error: " . $e->getMessage();
            return false;
        }

    }

    public function getAll($cust_id)
    {

        try {

            /*
            $db = new DbConn();

            $stmt = $db->conn->prepare("SELECT id FROM bookings WHERE cust_id=:cust_id");
            $stmt->bindParam("cust_id", $cust_id);
            $status = $stmt->execute();
            $booking_ids = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $bookings = array();

            // This is terrible, don't do this
            foreach ($booking_ids as $id) {

                $booking = $this->get($cust_id, $id);
                array_push($bookings, $booking);
            }

            return $bookings;*/

        $db = new DbConn();
        $stmt = $db->conn->prepare("SELECT * FROM bookings WHERE cust_id=:cust_id ORDER BY id DESC");
        $stmt->bindParam("cust_id", $cust_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            $err = "Error: " . $e->getMessage();
            return false;
        }
    }

    public function cancel($cust_id, $ticket_id) {
        try {
            $db = new DbConn();
            $db->conn->beginTransaction();

            $stmt = $db->conn->prepare("DELETE FROM bookings WHERE cust_id=:cust_id AND id=:ticket_id");
            $stmt->bindParam("cust_id", $cust_id);
            $stmt->bindParam("ticket_id", $ticket_id);

            if ($stmt->execute()) {
                $stmt1 = $db->conn->prepare("DELETE FROM passengers_bookings WHERE book_id=:ticket_id");
                $stmt1->bindParam("ticket_id", $ticket_id);
                if ($stmt1->execute()) {
                    $db->conn->commit();
                    return true;
                } else {
                    throw new PDOException();
                }
            }

        } catch (PDOException $e) {
            $db->conn->rollBack();
            $err = "Error: " . $e->getMessage();
            return false;
        }

    }
}