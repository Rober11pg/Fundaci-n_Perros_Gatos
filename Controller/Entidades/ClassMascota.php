<?php

class ClassMascota {
    private $MascotaID;
    private $Apodo;
    private $Sexo;
    private $RazaID;
    private $EdadRelativa;
    private $EstadoAdopcion;
    private $FotoMascota;
    private $FechaIngreso;

    // public function __construct($MascotaID, $Apodo, $Sexo, $RazaID, $EdadRelativa, $EstadoAdopcion, $FotoMascota, $FechaIngreso) {
    //     $this->MascotaID = $MascotaID;
    //     $this->Apodo = $Apodo;
    //     $this->Sexo = $Sexo;
    //     $this->RazaID = $RazaID;
    //     $this->EdadRelativa = $EdadRelativa;
    //     $this->EstadoAdopcion = $EstadoAdopcion;
    //     $this->FotoMascota = $FotoMascota;
    //     $this->FechaIngreso = $FechaIngreso;
    // }

    public function getMascotaID() {
        return $this->MascotaID;
    }

    public function setMascotaID($MascotaID) {
        $this->MascotaID = $MascotaID;
    }

    public function getApodo() {
        return $this->Apodo;
    }

    public function setApodo($Apodo) {
        $this->Apodo = $Apodo;
    }

    public function getSexo() {
        return $this->Sexo;
    }

    public function setSexo($Sexo) {
        $this->Sexo = $Sexo;
    }

    public function getRazaID() {
        return $this->RazaID;
    }

    public function setRazaID($RazaID) {
        $this->RazaID = $RazaID;
    }

    public function getEdadRelativa() {
        return $this->EdadRelativa;
    }

    public function setEdadRelativa($EdadRelativa) {
        $this->EdadRelativa = $EdadRelativa;
    }

    public function getEstadoAdopcion() {
        return $this->EstadoAdopcion;
    }

    public function setEstadoAdopcion($EstadoAdopcion) {
        $this->EstadoAdopcion = $EstadoAdopcion;
    }

    public function getFotoMascota() {
        return $this->FotoMascota;
    }

    public function setFotoMascota($FotoMascota) {
        $this->FotoMascota = $FotoMascota;
    }

    public function getFechaIngreso() {
        return $this->FechaIngreso;
    }

    public function setFechaIngreso($FechaIngreso) {
        $this->FechaIngreso = $FechaIngreso;
    }

    public function toArray() {
        return get_object_vars($this);
    }
}

