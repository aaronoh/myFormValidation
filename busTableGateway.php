<?php

class BusTableGateway {

    private $dbconnection;

    public function __construct($con) {
        $this->dbconnection = $con;
    }

    public function getBus() {
        // execute  query to get all buses

        $sqlQuery = "SELECT b.*, g.name "
                . "FROM bus b "
                . "LEFT JOIN web_garage g ON b.garageID = g.id";


        //$sqlQuery = "SELECT * FROM bus";

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

    public function getBusesByGarageId($garageID) {
        $sqlQuery = "SELECT b.* "
                . "FROM bus b "
                . "WHERE b.garageID = :garageID";

        $statement = $this->dbconnection->prepare($sqlQuery);

        $params = array(
            "garageID" => $garageID
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
        $params = array(
            "reg" => $b->getReg(),
            "make" => $b->getMake(),
            "model" => $b->getModel(),
            "capacity" => $b->getCapacity(),
            "engineSize" => $b->getEngineSize(),
            "purchaseDate" => $b->getPurchaseDate(),
            "serviceDate" => $b->getServiceDate(),
            "garageID" => $b->getgid()
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not add bus");
        }

        $id = $this->dbconnection->lastInsertId();
        return $id;
    }

    public function deleteBus($id) {
        $sqlQuery = "DELETE FROM bus WHERE id = :id";

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

    public function updateBus($b) {
        $sql = "UPDATE bus SET " .
                "reg = :reg, " .
                "make = :make, " .
                "model = :model, " .
                "capacity = :capacity, " .
                "engineSize = :engineSize, " .
                "purchaseDate = :purchaseDate, " .
                "serviceDate = :serviceDate, " .
                "garageID = :garageID " .
                " WHERE id = :id";

        $statement = $this->dbconnection->prepare($sql);

        $params = array(
            "id" => $b->getId(),
            "reg" => $b->getReg(),
            "make" => $b->getMake(),
            "model" => $b->getModel(),
            "capacity" => $b->getCapacity(),
            "engineSize" => $b->getEngineSize(),
            "purchaseDate" => $b->getPurchaseDate(),
            "serviceDate" => $b->getServiceDate(),
            "garageID" => $b->getgid()
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not update bus");
        }
    }

}
