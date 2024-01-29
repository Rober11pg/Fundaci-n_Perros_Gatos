<?php

class ClassAdquiere {
    private $CompraID;
    private $UsuarioID;
    private $MascotaID;
    private $FechaCompra;
    private $Cantidad;
    private $MontoPagado;

    // public function __construct($CompraID, $UsuarioID, $MascotaID, $FechaCompra, $Cantidad, $MontoPagado) {
    //     $this->CompraID = $CompraID;
    //     $this->UsuarioID = $UsuarioID;
    //     $this->MascotaID = $MascotaID;
    //     $this->FechaCompra = $FechaCompra;
    //     $this->Cantidad = $Cantidad;
    //     $this->MontoPagado = $MontoPagado;
    // }

    public function getCompraID() {
        return $this->CompraID;
    }

    public function setCompraID($CompraID) {
        $this->CompraID = $CompraID;
    }

    public function getUsuarioID() {
        return $this->UsuarioID;
    }

    public function setUsuarioID($UsuarioID) {
        $this->UsuarioID = $UsuarioID;
    }

    public function getMascotaID() {
        return $this->MascotaID;
    }

    public function setMascotaID($MascotaID) {
        $this->MascotaID = $MascotaID;
    }

    public function getFechaCompra() {
        return $this->FechaCompra;
    }

    public function setFechaCompra($FechaCompra) {
        $this->FechaCompra = $FechaCompra;
    }

    public function setCantidad($Cantidad) {
        return $this->Cantidad;
    }

    public function getCantidad() {
        return $this->Cantidad;
    }

    public function setMontoPagado($MontoPagado) {
        return $this->MontoPagado;
    }

    public function getMontoPagado() {
        return $this->MontoPagado;
    }
}