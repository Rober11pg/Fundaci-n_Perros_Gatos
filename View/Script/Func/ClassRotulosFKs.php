<?php

include_once(__DIR__ .'/../../../Model/ClassConsultasBD.php');

class ClassRotulosFKs
{
    public function RotuloFK_Mascota($IdMascota)
    {
        $oBD = new ClassConsultasBD();
        $Mascota = $oBD->BuscarMascotaPorID($IdMascota);
        
        $Rotulo = "";

        foreach ($Mascota as $x) 
        {
            $Rotulo = $x->getApodo();
        }

        return $Rotulo;
    }
    
    public function RotuloFK_Especie($IdEspecie)
    {
        $oBD = new ClassConsultasBD();
        $Especie = $oBD->BuscarEspeciePorID($IdEspecie);
        
        $Rotulo = "";

        foreach ($Especie as $x) 
        {
            $Rotulo = $x->getNombreEspecie();
        }

        return $Rotulo;
    }

    public function RotuloFK_Raza($IdRaza)
    {
        $oBD = new ClassConsultasBD();
        $Raza = $oBD->BuscarRazaPorID($IdRaza);

        $Rotulo = "";

        foreach ($Raza as $x) 
        {
            $Rotulo = $x->getNombreRaza();
        }

        return $Rotulo;
    }

    public function RotuloFK_UsuarioNombre($IdUsuario)
    {
        $oBD = new ClassConsultasBD();
        $Usuario = $oBD->BuscarUsuarioPorID($IdUsuario);

        $Rotulo = "";

        foreach ($Usuario as $x) 
        {
            $Rotulo = $x->getNombre();
        }

        return $Rotulo;
    }

    public function RotuloFK_UsuarioApellido($IdUsuario)
    {
        $oBD = new ClassConsultasBD();
        $Usuario = $oBD->BuscarUsuarioPorID($IdUsuario);
        
        $Rotulo = "";

        foreach ($Usuario as $x) 
        {
            $Rotulo = $x->getApellido();
        }

        return $Rotulo;
    }

    public function RotuloFK_UsuarioNombreApellido($IdUsuario)
    {
        $oBD = new ClassConsultasBD();
        $Usuario = $oBD->BuscarUsuarioPorID($IdUsuario);

        $Rotulo = "";

        foreach ($Usuario as $x) 
        {
            $Rotulo = $x->getNombre()." ".$x->getApellido();
        }

        return $Rotulo;
    }
}