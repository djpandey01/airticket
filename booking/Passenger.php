<?php

require_once(dirname(__FILE__).'/../login/includes/dbconn.php');

class Passenger extends DbConn
{
    public function create($first_name, $last_name, $age, $cust_id) {


        try {
            $db = new DbConn();
            $stmt = $db->conn->prepare("INSERT INTO airbooking.passengers (first_name, last_name, age, cust_id) 
                                                          VALUES (:first_name, :last_name, :age, :cust_id)");
            $stmt->bindParam(":first_name", $first_name);
            $stmt->bindParam(":last_name", $last_name);
            $stmt->bindParam(":age", $age);
            $stmt->bindParam(":cust_id", $cust_id);
            $status = $stmt->execute();

            return true;
        } catch (PDOException $e) {
            $err = "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getAll($cust_id) {

        try {
            $db = new DbConn();
            $stmt = $db->conn->prepare("SELECT id,first_name, last_name, age from passengers
                              WHERE cust_id=:cust_id");
            $stmt->bindParam("cust_id", $cust_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            $err = "Error: " . $e->getMessage();
            return false;
        }
    }

    public function delete($pass_id, $cust_id) {
        try {
            $db = new DbConn();
            $stmt = $db->conn->prepare("DELETE from passengers
                              WHERE id=:pass_id AND cust_id=:cust_id");
            $stmt->bindParam("pass_id", $pass_id);
            $stmt->bindParam("cust_id", $cust_id);
            return $stmt->execute();

        } catch (PDOException $e) {
            $err = "Error: " . $e->getMessage();
            return false;
        }
    }
}