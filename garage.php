<?php

//defining garage object & constructor/ gets&sets

class Garage {

    private $id;
    private $name;
    private $address;
    private $email;
    private $phone;
    private $openingdate;
    private $openinghours;
    private $managername;

    public function __construct($id, $nm, $ad, $em, $ph, $op, $hrs, $mnm) {

        $this->id = $id;
        $this->name = $nm;
        $this->address = $ad;
        $this->email = $em;
        $this->phone = $ph;
        $this->openingdate = $op;
        $this->openinghours = $hrs;
        $this->managername = $mnm;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getOpeningDate() {
        return $this->openingdate;
    }

    public function getOpeningHours() {
        return $this->openinghours;
    }

    public function getManagerName() {
        return $this->managername;
    }

}
