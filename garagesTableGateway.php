<?php

//used to comunicate with the garages table in the database
class GarageTableGateway {

    private $dbconnection;

    public function __construct($con) {
        $this->dbconnection = $con;
    }

    public function getGarage() {
        // sql  query to get all garages
        $sqlQuery = "SELECT * FROM web_garage";

        $statement = $this->dbconnection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could execute query (VIEW)");
        }

        return $statement;
    }

    public function getGarageById($id) {
        // sql  query to get bus with the requested id
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

    public function getGarageByBusId($id) {
        //query to return the full row from the garages table based on the garageID of the bus
        $sqlQuery = "SELECT g.* FROM bus b LEFT JOIN web_garage g ON b.garageID = g.id WHERE b.id = :id";

        $statement = $this->dbconnection->prepare($sqlQuery);

        $params = array(
            "id" => $id
        );
        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve users");
        }

        return $statement;
    }

    public function insertGarage($g) {
        //query to add a garage to the garages table
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
        //query to delete a garage from the garages table
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
        //query to update a garage in the garages table
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
            "id" => $g->getId(),
            "name" => $g->getName(),
            "address" => $g->getAddress(),
            "email" => $g->getEmail(),
            "phone" => $g->getPhone(),
            "openingdate" => $g->getOpeningDate(),
            "openinghours" => $g->getOpeningHours(),
            "managername" => $g->getManagerName()
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not update garage");
        }
    }

}
