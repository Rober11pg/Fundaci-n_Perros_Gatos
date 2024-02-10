<?php

include(__DIR__ . '/../Config/ClassConexion.php');

include(__DIR__ . '/../Controller/Entidades/ClassAdquiere.php');
include(__DIR__ . '/../Controller/Entidades/ClassEspecie.php');
include(__DIR__ . '/../Controller/Entidades/ClassMascota.php');
include(__DIR__ . '/../Controller/Entidades/ClassRaza.php');
include(__DIR__ . '/../Controller/Entidades/ClassUsuario.php');

class ClassConsultasBD
{
    // Para Inserciones

    public function InsertarAdquiere(ClassAdquiere $adquiere)
    {
        $conexion = new ClassConexion();

        $query = "CALL InsertarAdquiere(?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);

        $Var01 = $adquiere->getCompraID();
        $Var02 = $adquiere->getUsuarioID();
        $Var03 = $adquiere->getMascotaID();
        $Var04 = $adquiere->getFechaCompra();
        $Var05 = $adquiere->getCantidad();
        $Var06 = $adquiere->getMontoPagado();

        $stmt->bind_param(
            "iiisis",
            $Var01,
            $Var02,
            $Var03,
            $Var04,
            $Var05,
            $Var06
        );

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();

        echo "Inserción de Adquiere, exitosa\n";
    }

    public function InsertarEspecie(ClassEspecie $especie)
    {
        $conexion = new ClassConexion();

        $query = "CALL InsertarEspecie(?, ?)";
        $stmt = $conexion->Conectar->prepare($query);

        $Var01 = $especie->getEspecieID();
        $Var02 = $especie->getNombreEspecie();

        $stmt->bind_param("is", $Var01, $Var02);

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();

        echo "Inserción de Especie, exitosa\n";
    }
    
    public function InsertarMascota(ClassMascota $mascota)
    {
        $conexion = new ClassConexion();

        $query = "CALL InsertarMascota(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);

        $Var01 = $mascota->getMascotaID();
        $Var02 = $mascota->getApodo();
        $Var03 = $mascota->getSexo();
        $Var04 = $mascota->getRazaID();
        $Var05 = $mascota->getEdadRelativa();
        $Var06 = $mascota->getEstadoAdopcion();
        $Var07 = $mascota->getFotoMascota();
        $Var08 = $mascota->getFechaIngreso();

        $stmt->bind_param(
            "ississsss",
            $Var01,
            $Var02,
            $Var03,
            $Var04,
            $Var05,
            $Var06,
            $Var07,
            $Var08
        );

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();

        echo "Inserción de Mascota, exitosa\n";
    }

    public function InsertarRaza(ClassRaza $raza)
    {
        $conexion = new ClassConexion();

        $query = "CALL InsertarRaza(?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);

        $Var01 = $raza->getRazaID();
        $Var02 = $raza->getNombreRaza();
        $Var03 = $raza->getPrecio();
        $Var04 = $raza->getEspecieID();

        $stmt->bind_param(
            "issi",
            $Var01,
            $Var02,
            $Var03,
            $Var04
        );

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();

        echo "Inserción de Raza, exitosa\n";
    }

    public function InsertarUsuario(ClassUsuario $usuario)
    {
        $conexion = new ClassConexion();

        $query = "CALL InsertarUsuario(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);

        $Var01 = $usuario->getUsuarioID();
        $Var02 = $usuario->getNombre();
        $Var03 = $usuario->getApellido();
        $Var04 = $usuario->getSexo();
        $Var05 = $usuario->getCorreoElectronico();
        $Var06 = $usuario->getClave();
        $Var07 = $usuario->getTipoUsuario();
        $Var08 = $usuario->getNumeroTelefono();

        $stmt->bind_param(
            "isssssss",
            $Var01,
            $Var02,
            $Var03,
            $Var04,
            $Var05,
            $Var06,
            $Var07,
            $Var08
        );

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();

        echo "Inserción de Usuario, exitosa\n";
    }
    
    // Para Consultas

    public function ConsultarAdquieres()
    {
        $conexion = new ClassConexion();

        $query = "CALL ConsultarAdquiere()";
        $result = $conexion->Conectar->query($query);

        $adquieres = array();

        while ($row = $result->fetch_assoc()) {
            $oA = new ClassAdquiere();

            $oA->setCompraID($row['CompraID']);
            $oA->setUsuarioID($row['UsuarioID']);
            $oA->setMascotaID($row['MascotaID']);
            $oA->setFechaCompra($row['FechaCompra']);
            $oA->setCantidad($row['Cantidad']);
            $oA->setMontoPagado($row['MontoPagado']);

            $adquieres[] = $oA;
        }

        $result->close();
        $conexion->CerrarConexion();

        echo "Consulta de Adquiere, exitosa\n";

        return $adquieres;
    }

    public function ConsultarEspecies()
    {
        $conexion = new ClassConexion();

        $query = "CALL ConsultarEspecie()";
        $result = $conexion->Conectar->query($query);

        $especies = array();

        while ($row = $result->fetch_assoc()) {
            $oE = new ClassEspecie();

            $oE->setEspecieID($row['EspecieID']);
            $oE->setNombreEspecie($row['NombreEspecie']);

            $especies[] = $oE;
        }

        $result->close();
        $conexion->CerrarConexion();

        echo "Consulta de Especies, exitosa\n";

        return $especies;
    }

    public function ConsultarMascotas()
    {
        $conexion = new ClassConexion();

        $query = "CALL ConsultarMascota()";
        $result = $conexion->Conectar->query($query);

        $mascotas = array();

        while ($row = $result->fetch_assoc()) {
            $oM = new ClassMascota();

            $oM->setMascotaID($row['MascotaID']);
            $oM->setApodo($row['Apodo']);
            $oM->setSexo($row['Sexo']);
            $oM->setRazaID($row['RazaID']);
            $oM->setEdadRelativa($row['EdadRelativa']);
            $oM->setEstadoAdopcion($row['EstadoAdopcion']);
            $oM->setFotoMascota($row['FotoMascota']);
            $oM->setFechaIngreso($row['FechaIngreso']);

            $mascotas[] = $oM;
        }

        $result->close();
        $conexion->CerrarConexion();

        echo "Consulta de Mascota, exitosa\n";

        return $mascotas;
    }

    public function ConsultarRazas()
    {
        $conexion = new ClassConexion();

        $query = "CALL ConsultarRaza()";
        $result = $conexion->Conectar->query($query);

        $razas = array();

        while ($row = $result->fetch_assoc()) {
            $oR = new ClassRaza();

            $oR->setRazaID($row['RazaID']);
            $oR->setNombreRaza($row['NombreRaza']);
            $oR->setPrecio($row['Precio']);
            $oR->setEspecieID($row['EspecieID']);

            $razas[] = $oR;
        }

        $result->close();
        $conexion->CerrarConexion();

        echo "Consulta de Raza, exitosa\n";

        return $razas;
    }

    public function ConsultarUsuarios()
    {
        $conexion = new ClassConexion();

        $query = "CALL ConsultarUsuario()";
        $result = $conexion->Conectar->query($query);

        $usuarios = array();

        while ($row = $result->fetch_assoc()) {
            $oU = new ClassUsuario();

            $oU->setUsuarioID($row['UsuarioID']);
            $oU->setNombre($row['Nombre']);
            $oU->setApellido($row['Apellido']);
            $oU->setSexo($row['Sexo']);
            $oU->setCorreoElectronico($row['CorreoElectronico']);
            $oU->setClave($row['Clave']);
            $oU->setTipoUsuario($row['TipoUsuario']);
            $oU->setNumeroTelefono($row['NumeroTelefono']);

            $usuarios[] = $oU;
        }

        $result->close();
        $conexion->CerrarConexion();

        echo "Consulta de Usuario, exitosa\n";

        return $usuarios;
    }

    // Para Eliminaciones

    public function EliminarAdquierePorID($CompraID)
    {
        $conexion = new ClassConexion();

        $query = "CALL EliminarAdquierePorID(?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("i", $CompraID);

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();
    }

    public function EliminarEspeciePorID($EspecieID)
    {
        $conexion = new ClassConexion();

        $query = "CALL EliminarEspeciePorID(?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("i", $EspecieID);

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();
    }

    public function EliminarMascotaPorID($MascotaID)
    {
        $conexion = new ClassConexion();

        $query = "CALL EliminarMascotaPorID(?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("i", $MascotaID);

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();
    }
   
    public function EliminarRazaPorID($RazaID)
    {
        $conexion = new ClassConexion();

        $query = "CALL EliminarRazaPorID(?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("i", $RazaID);

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();
    }

    public function EliminarUsuarioPorID($UsuarioID)
    {
        $conexion = new ClassConexion();

        $query = "CALL EliminarUsuarioPorID(?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("i", $UsuarioID);

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();
    }

    // Para Actualizar

    public function ActualizarAdquierePorID($IdAnterior, ClassAdquiere $adquiere)
    {
        $conexion = new ClassConexion();

        $query = "CALL ActualizarAdquierePorID(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);

        $CompraID = $adquiere->getCompraID();
        $UsuarioID = $adquiere->getUsuarioID();
        $MascotaID = $adquiere->getMascotaID();
        $FechaCompra = $adquiere->getFechaCompra();
        $Cantidad = $adquiere->getCantidad();
        $MontoPagado = $adquiere->getMontoPagado();

        $stmt->bind_param(
            "iiisiddi",
            $CompraID,
            $UsuarioID,
            $MascotaID,
            $FechaCompra,
            $Cantidad,
            $MontoPagado,
            $IdAnterior
        );

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();
    }


    public function ActualizarEspeciePorID($IdAnterior, ClassEspecie $especie)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL ActualizarEspeciePorID(?, ?)";
        $stmt = $conexion->Conectar->prepare($query);
    
        $EspecieID = $especie->getEspecieID();
        $NombreEspecie = $especie->getNombreEspecie();
    
        $stmt->bind_param(
            "is",
            $EspecieID,
            $NombreEspecie,
            $IdAnterior
        );
    
        $stmt->execute();
    
        $stmt->close();
        $conexion->CerrarConexion();
    } 

    public function ActualizarMascotaPorID($IdAnterior, ClassMascota $mascota)
    {
        $conexion = new ClassConexion();

        $query = "CALL ActualizarMascotaPorID(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);

        $MascotaID = $mascota->getMascotaID();
        $Apodo = $mascota->getApodo();
        $Sexo = $mascota->getSexo();
        $RazaID = $mascota->getRazaID();
        $EdadRelativa = $mascota->getEdadRelativa();
        $EstadoAdopcion = $mascota->getEstadoAdopcion();
        $FotoMascota = $mascota->getFotoMascota();
        $FechaIngreso = $mascota->getFechaIngreso();

        $stmt->bind_param(
            "ississsss",
            $MascotaID,
            $Apodo,
            $Sexo,
            $RazaID,
            $EdadRelativa,
            $EstadoAdopcion,
            $FotoMascota,
            $FechaIngreso,
            $IdAnterior
        );

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();
    }

    public function ActualizarRazaPorID($IdAnterior, ClassRaza $raza)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL ActualizarRazaPorID(?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);
    
        $RazaID = $raza->getRazaID();
        $NombreRaza = $raza->getNombreRaza();
        $Precio = $raza->getPrecio();
        $EspecieID = $raza->getEspecieID();
    
        $stmt->bind_param(
            "isdi",
            $RazaID,
            $NombreRaza,
            $Precio,
            $EspecieID,
            $IdAnterior
        );
    
        $stmt->execute();
    
        $stmt->close();
        $conexion->CerrarConexion();
    }
    
    public function ActualizarUsuarioPorID($IdAnterior, ClassUsuario $usuario)
    {
        $conexion = new ClassConexion();

        $query = "CALL ActualizarUsuarioPorID(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);

        $UsuarioID = $usuario->getUsuarioID();
        $Nombre = $usuario->getNombre();
        $Apellido = $usuario->getApellido();
        $Sexo = $usuario->getSexo();
        $CorreoElectronico = $usuario->getCorreoElectronico();
        $Clave = $usuario->getClave();
        $TipoUsuario = $usuario->getTipoUsuario();
        $NumeroTelefono = $usuario->getNumeroTelefono();

        $stmt->bind_param(
            "isssssssi",
            $UsuarioID,
            $Nombre,
            $Apellido,
            $Sexo,
            $CorreoElectronico,
            $Clave,
            $TipoUsuario,
            $NumeroTelefono,
            $IdAnterior
        );

        $stmt->execute();

        $stmt->close();
        $conexion->CerrarConexion();
    }


    // Otras Sentencias

}



