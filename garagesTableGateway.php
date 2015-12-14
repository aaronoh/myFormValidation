<?php

class GarageTableGateway {

    private $dbconnection;

    public function __construct($con) {
        $this->dbconnection = $con;
    }

    public function getGarage() {
        // execute  query to get all garages
        $sqlQuery = "SELECT * FROM garage";

        $statement = $this->dbconnection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could execute query (VIEW)");
        }

        return $statement;
    }

    public function getGarageById($id) {
        // execute  query to get bus with the requested id
        $sqlQuery = "SELECT * FROM garage WHERE id = :id";

        $statement = $this->dbconnection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not find garage");
        }

        return $statement;
    }

    public function insertBus($nm, $ad, $em, $ph, $op, $hrs, $mnm) {
        $sqlQuery = "INSERT INTO garage " .
                "(name, address, email, phone, openingdate, openinghours, managername) " .
                "VALUES (:name, :address, :email, :phone, :openingdate, :openinghours, :managername)";

        $statement = $this->dbconnection->prepare($sqlQuery);
        $params = array(
            "name" => $nm,
            "address" => $ad,
            "email" => $em,
            "phone" => $ph,
            "openingdate" => $op,
            "openinghours" => $hrs,
            "managername" => $mnm
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not execute query (CREATE)");
        }

        $id = $this->dbconnection->lastInsertId();
        return $id;
    }

    public function deleteGarage($id) {
        $sqlQuery = "DELETE FROM garage WHERE id = :id";

        $statement = $this->dbconnection->prepare($sqlQuery);
        $params = array(
            
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("execute query (DELETE)");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateGarage($nm, $ad, $em, $ph, $op, $hrs, $mnm) {
        $sqlQuery =
                "UPDATE garage SET " .
                "name = :name, " .
                "address = :address, " .
                "email = :email, " .
                "phone = :phone, " .
                "openingdate = :openingdate, " .
                "openinghours = :openinghours " .
                "managername = :managername, " .
                "WHERE garageid = :id";

        $statement = $this->dbconnection->prepare($sqlQuery);
        $params = array(
            "name" => $nm,
            "address" => $ad,
            "email" => $em,
            "phone" => $ph,
            "openingdate" => $op,
            "openinghours" => $hrs,
            "managername" => $mnm,
        );

        $status = $statement->execute($params);
        return ($statement->rowCount() == 1);
    }
}