<?php

//defining bus object & constructor/ gets&sets
class Bus {

    private $id;
    private $reg;
    private $make;
    private $model;
    private $capacity;
    private $enginesize;
    private $purchasedate;
    private $servicedate;
    private $gid;

    public function __construct($id, $rg, $mk, $md, $cp, $esz, $pd, $sd, $gid) {

        $this->id = $id;
        $this->reg = $rg;
        $this->make = $mk;
        $this->model = $md;
        $this->capacity = $cp;
        $this->enginesize = $esz;
        $this->purchasedate = $pd;
        $this->servicedate = $sd;
        $this->gid = $gid;
    }

    public function getId() {
        return $this->id;
    }

    public function getReg() {
        return $this->reg;
    }

    public function getMake() {
        return $this->make;
    }

    public function getModel() {
        return $this->model;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function getEngineSize() {
        return $this->enginesize;
    }

    public function getPurchaseDate() {
        return $this->purchasedate;
    }

    public function getServiceDate() {
        return $this->servicedate;
    }

    public function getgid() {
        return $this->gid;
    }

}
