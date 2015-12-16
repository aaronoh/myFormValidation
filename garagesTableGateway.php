<?php

class GarageTableGateway {

    private $dbconnection;

    public function __construct($con) {
        $this->dbconnection = $con;
    }

    public function getGarage() {
        // execute  query to get all garages
        $sqlQuery = "SELECT * FROM web_garage";

        $statement = $this->dbconnection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could execute query (VIEW)");
        }

        return $statement;
    }

    public function getGarageById($id) {
        // execute  query to get bus with the requested id
        $sqlQuery = "SELECT * FROM web_garage WHERE id = :id";

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

    public function insertGarage($g) {
        $sqlQuery = "INSERT INTO web_garage " .
                "(name, address, email, phone, openingdate, openinghours, managername) " .
                "VALUES (:name, :address, :email, :phone, :openingdate, :openinghours, :managername)";

        $statement = $this->dbconnection->prepare($sqlQuery);
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
            die("Could not add garage");
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
}