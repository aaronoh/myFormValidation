<?php

class User {

    private $id;
    private $user;
    private $password;
    private $role;

    public function __construct($id, $user, $pwd, $rl) {
        $this->id = $id;
        $this->user = $user;
        $this->password = $pwd;
        $this->role = $rl;
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

    public function getRole() {
        return $this->role;
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

    public function setRole($rl) {
        $this->role = $rl;
    }

}

?>
