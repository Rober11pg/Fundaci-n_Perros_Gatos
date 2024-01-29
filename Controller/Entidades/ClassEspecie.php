<?php

class ClassEspecie {
    private $EspecieID;
    private $NombreEspecie;

    // public function __construct($EspecieID, $NombreEspecie) {
    //     $this->EspecieID = $EspecieID;
    //     $this->NombreEspecie = $NombreEspecie;
    // }

    public function getEspecieID() {
        return $this->EspecieID;
    }

    public function setEspecieID($EspecieID) {
        $this->EspecieID = $EspecieID;
    }

    public function getNombreEspecie() {
        return $this->NombreEspecie;
    }

    public function setNombreEspecie($NombreEspecie) {
        $this->NombreEspecie = $NombreEspecie;
    }

    public function toArray() {
        return get_object_vars($this);
    }
}
