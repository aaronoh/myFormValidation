<?php

//used to comunicate with the users table in the database
require_once 'user.php';

class UserTable {

    private $link;

    public function __construct($connection) {
        $this->link = $connection;
    }

    //add a row to users table, used to register
    public function insert($user) {
        if (!isset($user)) {
            throw new Exception("User required");
        }
        $sql = "INSERT INTO users(username, password) "
                . "VALUES (:username, :password)";

        $params = array(
            'username' => $user->getUsername(),
            'password' => $user->getPassword()
        );
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not save user: " . $errorInfo[2]);
        }

        $id = $this->link->lastInsertId('users');

        return $id;
    }

    //retrieve row in users table based on id
    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = array('id' => $id);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }

        $user = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $username = $row['username'];
            $pwd = $row['password'];
            $user = new User($id, $username, $pwd);
        }
        return $user;
    }

    //retrieve all rows in users table
    public function getUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute();
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve users: " . $errorInfo[2]);
        }

        $users = array();
        $row = $stmt->fetch();
        while ($row != null) {
            $id = $row['id'];
            $username = $row['username'];
            $pwd = $row['password'];
            $user = new User($id, $username, $pwd);
            $users[$id] = $user;

            $row = $stmt->fetch();
        }
        return $users;
    }

    //retrieve row in users table based on username, used to log in
    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $params = array('username' => $username);
        $stmt = $this->link->prepare($sql);
        $status = $stmt->execute($params);
        if ($status != true) {
            $errorInfo = $stmt->errorInfo();
            throw new Exception("Could not retrieve user: " . $errorInfo[2]);
        }
        $user = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();
            $id = $row['id'];
            $pwd = $row['password'];
            $user = new User($id, $username, $pwd);
        }
        return $user;
    }

}

?>
