<?php

include_once(__DIR__ .'/../../../Model/ClassConsultasBD.php');

class ClassRotulosFKs
{
    public function RotuloFK_Especie($IdEspecie)
    {
        $oBD = new ClassConsultasBD();
        $Especie = $oBD->BuscarEspeciePorID($IdEspecie);

        return $Especie[]->getNombreEspecie();
    }

    public function RotuloFK_Raza($IdRaza)
    {
        $oBD = new ClassConsultasBD();
        $Raza = $oBD->BuscarRazaPorID($IdRaza);

        return $Raza[]->getNombreRaza();
    }

    public function RotuloFK_UsuarioNombre($IdUsuario)
    {
        $oBD = new ClassConsultasBD();
        $Usuario = $oBD->BuscarUsuarioPorID($IdUsuario);

        return $Usuario[]->getNombre();
    }

    public function RotuloFK_UsuarioApellido($IdUsuario)
    {
        $oBD = new ClassConsultasBD();
        $Usuario = $oBD->BuscarUsuarioPorID($IdUsuario);

        return $Usuario[]->getNombre();
    }

    public function RotuloFK_UsuarioNombreApellido($IdUsuario)
    {
        $oBD = new ClassConsultasBD();
        $Usuario = $oBD->BuscarUsuarioPorID($IdUsuario);

        return $Usuario[]->getNombre()." ".$Usuario[]->getApellido();
    }
}