<?php

class ClassUsuario {
    private $UsuarioID;
    private $Nombre;
    private $Apellido;
    private $Sexo;
    private $CorreoElectronico;
    private $Clave;
    private $TipoUsuario;
    private $NumeroTelefono;

    // public function __construct($UsuarioID, $Nombre, $Apellido, $Sexo, $CorreoElectronico, $Clave, $TipoUsuario, $NumeroTelefono) {
    //     $this->UsuarioID = $UsuarioID;
    //     $this->Nombre = $Nombre;
    //     $this->Apellido = $Apellido;
    //     $this->Sexo = $Sexo;
    //     $this->CorreoElectronico = $CorreoElectronico;
    //     $this->Clave = $Clave;
    //     $this->TipoUsuario = $TipoUsuario;
    //     $this->NumeroTelefono = $NumeroTelefono;
    // }

    public function getUsuarioID() {
        return $this->UsuarioID;
    }

    public function setUsuarioID($UsuarioID) {
        $this->UsuarioID = $UsuarioID;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    public function getApellido() {
        return $this->Apellido;
    }

    public function setApellido($Apellido) {
        $this->Apellido = $Apellido;
    }

    public function getSexo() {
        return $this->Sexo;
    }

    public function setSexo($Sexo) {
        $this->Sexo = $Sexo;
    }

    public function getCorreoElectronico() {
        return $this->CorreoElectronico;
    }

    public function setCorreoElectronico($CorreoElectronico) {
        $this->CorreoElectronico = $CorreoElectronico;
    }

    public function getClave() {
        return $this->Clave;
    }

    public function setClave($Clave) {
        $this->Clave = $Clave;
    }

    public function getTipoUsuario() {
        return $this->TipoUsuario;
    }

    public function setTipoUsuario($TipoUsuario) {
        $this->TipoUsuario = $TipoUsuario;
    }

    public function getNumeroTelefono() {
        return $this->NumeroTelefono;
    }

    public function setNumeroTelefono($NumeroTelefono) {
        $this->NumeroTelefono = $NumeroTelefono;
    }

    public function toArray() {
        return get_object_vars($this);
    }
}