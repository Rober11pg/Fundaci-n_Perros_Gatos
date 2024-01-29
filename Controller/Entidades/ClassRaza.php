<?php

class ClassRaza {
    private $RazaID;
    private $NombreRaza;
    private $Precio;
    private $EspecieID;

    // public function __construct($RazaID, $NombreRaza, $Precio, $EspecieID) {
    //     $this->RazaID = $RazaID;
    //     $this->NombreRaza = $NombreRaza;
    //     $this->Precio = $Precio;
    //     $this->EspecieID = $EspecieID;
    // }

    public function getRazaID() {
        return $this->RazaID;
    }

    public function setRazaID($RazaID) {
        $this->RazaID = $RazaID;
    }

    public function getNombreRaza() {
        return $this->NombreRaza;
    }

    public function setNombreRaza($NombreRaza) {
        $this->NombreRaza = $NombreRaza;
    }

    public function getPrecio() {
        return $this->Precio;
    }

    public function setPrecio($Precio) {
        $this->Precio = $Precio;
    }

    public function getEspecieID() {
        return $this->EspecieID;
    }

    public function setEspecieID($EspecieID) {
        $this->EspecieID = $EspecieID;
    }

    public function toArray() {
        return get_object_vars($this);
    }
}