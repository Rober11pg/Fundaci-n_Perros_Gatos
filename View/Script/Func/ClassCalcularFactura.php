<?php

include_once(__DIR__ .'/../../../Model/ClassConsultasBD.php');

class ClassCalcularFactura
{
    private $ArregloGrupos;
    private $ArregloMonto;
    private $ArregloCantidad;
    private $ArregloPrecioUnitario;

    public function __construct($ListaMascota)
    {
        $this->CalcularSubtotales($ListaMascota);
    }

    private function AgruparRazas($oMascota)
    {
        $oBD = new ClassConsultasBD();

        $GruposRaza = array();

        foreach ($oMascota as $x) {
            // Obtener el RazaID del objeto ClassRaza actual
            $razaID = $x->getRazaID();
            // Verificar si ya existe un grupo para este RazaID
            if (!isset($GruposRaza[$razaID])) {
                // Si no existe, crear un nuevo grupo vacío para este RazaID
                $GruposRaza[$razaID] = array();
            }
            // Agregar el objeto ClassRaza actual al grupo correspondiente
            $GruposRaza[$razaID][] = $x;
        }

        return $GruposRaza;
    }

    private function CalcularSubtotales($oMascota)
    {        
        $oBD = new ClassConsultasBD();

        $oAdquiere = new ClassAdquiere();

        $GruposRaza = $this->AgruparRazas($oMascota);
        $MontoGruposRaza = array();
        $CantidadGruposRaza = array();
        $PrecioUnitarioRaza = array();

        foreach ($GruposRaza as $razaID => $Grupo) 
        {
            $Raza = $oBD->BuscarRazaPorID($razaID);

            $PrecioRaza = 0;
            foreach ($Raza as $x) {
                $PrecioRaza = $x->getPrecio();
            }
            
            $TamPorGrupo = count($Grupo);

            if (!isset($PrecioUnitarioRaza[$razaID])) 
            {
                $PrecioUnitarioRaza[$razaID] = array();
            }
            $PrecioUnitarioRaza[$razaID][] = $PrecioRaza;

            if (!isset($MontoGruposRaza[$razaID])) 
            {
                $MontoGruposRaza[$razaID] = array();
            }
            $MontoGruposRaza[$razaID][] = ($PrecioRaza * $TamPorGrupo);
            
            if (!isset($CantidadGruposRaza[$razaID])) 
            {
                $CantidadGruposRaza[$razaID] = array();
            }
            $CantidadGruposRaza[$razaID][] = $TamPorGrupo;
        }
        
        $this->ArregloGrupos = $GruposRaza;
        $this->ArregloCantidad = $CantidadGruposRaza;
        $this->ArregloMonto = $MontoGruposRaza;
        $this->ArregloPrecioUnitario = $PrecioUnitarioRaza;
    }


    public function getArregloGrupos()
    {
        return $this->ArregloGrupos;
    }
    public function getArregloMonto()
    {
        return $this->ArregloMonto;
    }
    public function getArregloCantidad()
    {
        return $this->ArregloCantidad;
    }

    public function getArregloPrecioUnitario()
    {
        return $this->ArregloPrecioUnitario;
    }

    public function getDatosFactura()
    {
        $DatosFactura = array();

        $DatosFactura['Grupos'] = $this->ArregloGrupos;
        $DatosFactura['Cantidad'] = $this->ArregloCantidad;
        $DatosFactura['Monto'] = $this->ArregloMonto;
        $DatosFactura['PrecioUnitario'] = $this->ArregloPrecioUnitario;

        return $DatosFactura;
    }
}