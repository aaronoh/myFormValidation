<?php

class User {

    private $id;
    private $user;
    private $password;

    public function __construct($id, $user, $pwd) {
        $this->id = $id;
        $this->user = $user;
        $this->password = $pwd;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($user) {
        $this->user = $user;
    }

    public function setPassword($pwd) {
        $this->password = $pwd;
    }

}

?>
