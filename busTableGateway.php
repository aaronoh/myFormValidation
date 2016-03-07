<?php

class BusTableGateway {

    private $dbconnection;

    public function __construct($con) {
        $this->dbconnection = $con;
    }

    public function getBus() {
        // execute  query to get all buses
        $sqlQuery = "SELECT * FROM bus";

        $statement = $this->dbconnection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could execute query (VIEW)");
        }

        return $statement;
    }

    public function getBusById($id) {
        // execute  query to get bus with the requested id
        $sqlQuery = "SELECT * FROM bus WHERE id = :id";

        $statement = $this->dbconnection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not find bus");
        }

        return $statement;
    }
    
    public function insertBus($b) {
        $sqlQuery = "INSERT INTO bus " .
                "(reg, make, model, capacity, engineSize, purchaseDate, serviceDate, garageID) " .
                "VALUES (:reg, :make, :model, :capacity, :engineSize, :purchaseDate, :serviceDate, :garageID)";

        $statement = $this->dbconnection->prepare($sqlQuery);
//*******************************************************************************************************************//
        $params = array(
            "name" => $g->getName(),
            "address" => $g->getAddress(),
            "email" => $g->getEmail(),
            "phone" => $g->getPhone(),
            "openingdate" => $g->getOpeningDate(),
            "openinghours" => $g->getOpeningHours(),
            "managername" => $g->getManagerName(),
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not add bus");
        }

        $id = $this->dbconnection->lastInsertId();
        return $id;
    }

    public function deleteGarage($id) {
        $sqlQuery = "DELETE FROM web_garage WHERE id = :id";

        $statement = $this->dbconnection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Failed to delete");
        }

        return ($statement->rowCount() == 1);
    }

    public function update($g) {
        $sql = "UPDATE web_garage SET " .
                "name = :name, " .
                "address = :address, " .
                "email = :email, " .
                "phone = :phone, " .
                "openingdate = :openingdate, " .
                "openinghours = :openinghours, " .
                "managername = :managername " .
                " WHERE id = :id";

        $statement = $this->dbconnection->prepare($sql);
        $params = array(
            "id"         => $g->getId(),
            "name"         => $g->getName(),
            "address"      => $g->getAddress(),
            "email"        => $g->getEmail(),
            "phone"        => $g->getPhone(),
            "openingdate"  => $g->getOpeningDate(),
            "openinghours" => $g->getOpeningHours(),
            "managername"  => $g->getManagerName()
            );

        echo '<pre>';
        print_r($params);
        echo '</pre>';
        
        
        $status = $statement->execute($params);

        if (!$status) {
            die("Could not update garage");
        }
    }

}
