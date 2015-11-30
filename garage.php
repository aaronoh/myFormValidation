<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Garage {
    private $name;
    private $address;
    private $email;
    private $phone;
    private $openingdate;
    private $openinghours;
    private $managername;
    
    public function __construct($nm, $ad, $em, $ph, $op, $hrs, $mnm) {
        $this->name = $nm;
        $this->address = $ad;
        $this->email = $em;
        $this->phone = $ph;
        $this->openingdate = $op;
        $this->openinghours = $hrs;
        $this->managername = $mnm;
    }
    
    public function getName() { return $this->name; }
    public function getAddress() { return $this->address; }
    public function getEmail() { return $this->email; }
    public function getPhone() { return $this->phone; }
    public function getOpeningDate() { return $this->openingdate; }
    public function getOpeningHours() { return $this->openinghours; }
    public function getManagerName() { return $this->managername; }
}
