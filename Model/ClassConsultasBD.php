<?php

include_once(__DIR__ . '/../Config/ClassConexion.php');

include_once(__DIR__ . '/../Controller/Entidades/ClassAdquiere.php');
include_once(__DIR__ . '/../Controller/Entidades/ClassEspecie.php');
include_once(__DIR__ . '/../Controller/Entidades/ClassMascota.php');
include_once(__DIR__ . '/../Controller/Entidades/ClassRaza.php');
include_once(__DIR__ . '/../Controller/Entidades/ClassUsuario.php');

class ClassConsultasBD
{
    // Para Inserciones

    public function InsertarAdquiere(ClassAdquiere $adquiere)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL InsertarAdquiere(?, ?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);
    
        $Var01 = $adquiere->getUsuarioID();
        $Var02 = $adquiere->getMascotaID();
        $Var03 = $adquiere->getFechaCompra();
        $Var04 = $adquiere->getCantidad();
        $Var05 = $adquiere->getMontoPagado();
    
        $stmt->bind_param("isssi", $Var01, $Var02, $Var03, $Var04, $Var05);
    
        $stmt->execute();
    
        $stmt->close();
        $conexion->CerrarConexion();
    
        //echo"Inserción de Adquiere, exitosa\n";
    }
    
    public function InsertarEspecie(ClassEspecie $especie)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL InsertarEspecie(?)";
        $stmt = $conexion->Conectar->prepare($query);
    
        $Var01 = $especie->getNombreEspecie();
    
        $stmt->bind_param("s", $Var01);
    
        $stmt->execute();
    
        $stmt->close();
        $conexion->CerrarConexion();
    
        //echo"Inserción de Especie, exitosa\n";
    }
    
    public function InsertarMascota(ClassMascota $mascota)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL InsertarMascota(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);
    
        $Var01 = $mascota->getApodo();
        $Var02 = $mascota->getSexo();
        $Var03 = $mascota->getRazaID();
        $Var04 = $mascota->getEdadRelativa();
        $Var05 = $mascota->getEstadoAdopcion();
        $Var06 = $mascota->getFotoMascota();
        $Var07 = $mascota->getFechaIngreso();
    
        $stmt->bind_param(
            "ssissss",
            $Var01,
            $Var02,
            $Var03,
            $Var04,
            $Var05,
            $Var06,
            $Var07
        );
    
        $stmt->execute();
    
        $stmt->close();
        $conexion->CerrarConexion();
    
        //echo"Inserción de Mascota, exitosa\n";
    }

    public function InsertarRaza(ClassRaza $raza)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL InsertarRaza(?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);
    
        $Var01 = $raza->getNombreRaza();
        $Var02 = $raza->getPrecio();
        $Var03 = $raza->getEspecieID();
    
        $stmt->bind_param("sdi", $Var01, $Var02, $Var03);
    
        $stmt->execute();
    
        $stmt->close();
        $conexion->CerrarConexion();
    
        //echo"Inserción de Raza, exitosa\n";
    }
    
    public function InsertarUsuario(ClassUsuario $usuario)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL InsertarUsuario(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);
    
        $Var01 = $usuario->getNombre();
        $Var02 = $usuario->getApellido();
        $Var03 = $usuario->getSexo();
        $Var04 = $usuario->getCorreoElectronico();
        $Var05 = $usuario->getClave();
        $Var06 = $usuario->getTipoUsuario();
        $Var07 = $usuario->getNumeroTelefono();
    
        $stmt->bind_param(
            "sssssss",
            $Var01,
            $Var02,
            $Var03,
            $Var04,
            $Var05,
            $Var06,
            $Var07
        );
    
        $stmt->execute();
    
        $stmt->close();
        $conexion->CerrarConexion();
    
        //echo"Inserción de Usuario, exitosa\n";
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

        //echo"Consulta de Adquiere, exitosa\n";

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

        //echo"Consulta de Especies, exitosa\n";

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

        //echo"Consulta de Mascota, exitosa\n";

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

        //echo"Consulta de Raza, exitosa\n";

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

        //echo"Consulta de Usuario, exitosa\n";

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

    public function ActualizarAdquierePorID(ClassAdquiere $adquiere)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL ActualizarAdquierePorID(?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);
    
        $Var01 = $adquiere->getCompraID();
        $Var02 = $adquiere->getUsuarioID();
        $Var03 = $adquiere->getMascotaID();
        $Var04 = $adquiere->getFechaCompra();
        $Var05 = $adquiere->getCantidad();
        $Var06 = $adquiere->getMontoPagado();
    
        $stmt->bind_param("iiisis", $Var01, $Var02, $Var03, $Var04, $Var05, $Var06);
    
        $stmt->execute();
    
        $stmt->close();
        $conexion->CerrarConexion();
    
        //echo"Actualización de Adquiere, exitosa\n";
    }
    

    public function ActualizarEspeciePorID(ClassEspecie $especie)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL ActualizarEspeciePorID(?, ?)";
        $stmt = $conexion->Conectar->prepare($query);
    
        $Var01 = $especie->getEspecieID();
        $Var02 = $especie->getNombreEspecie();
    
        $stmt->bind_param("is", $Var01, $Var02);
    
        $stmt->execute();
    
        $stmt->close();
        $conexion->CerrarConexion();
    
        //echo"Actualización de Especie, exitosa\n";
    }

    public function ActualizarMascotaPorID(ClassMascota $mascota)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL ActualizarMascotaPorID(?, ?, ?, ?, ?, ?, ?, ?)";
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
    
        //echo"Actualización de Mascota, exitosa\n";
    }

    public function ActualizarRazaPorID(ClassRaza $raza)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL ActualizarRazaPorID(?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);
    
        $Var01 = $raza->getRazaID();
        $Var02 = $raza->getNombreRaza();
        $Var03 = $raza->getPrecio();
    
        $stmt->bind_param("isd", $Var01, $Var02, $Var03);
    
        $stmt->execute();
    
        $stmt->close();
        $conexion->CerrarConexion();
    
        //echo"Actualización de Raza, exitosa\n";
    }
    
    public function ActualizarUsuarioPorID(ClassUsuario $usuario)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL ActualizarUsuarioPorID(?, ?, ?, ?, ?, ?, ? ,?)";
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
    
        //echo"Actualización de Usuario, exitosa\n";
    }

    // Para Buscar

    public function BuscarAdquierePorID($CompraID)
    {
        $conexion = new ClassConexion();

        $query = "CALL BuscarAdquierePorID(?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("i", $CompraID);

        $stmt->execute();
        $result = $stmt->get_result();

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

        $stmt->close();
        $conexion->CerrarConexion();

        // echo "Búsqueda de Adquiere por ID exitosa\n";

        return $adquieres;
    }

    public function BuscarEspeciePorID($EspecieID)
    {
        $conexion = new ClassConexion();

        $query = "CALL BuscarEspeciePorID(?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("i", $EspecieID);

        $stmt->execute();
        $result = $stmt->get_result();

        $especies = array();

        while ($row = $result->fetch_assoc()) {
            $oE = new ClassEspecie();

            $oE->setEspecieID($row['EspecieID']);
            $oE->setNombreEspecie($row['NombreEspecie']);

            $especies[] = $oE;
        }

        $stmt->close();
        $conexion->CerrarConexion();

        // echo "Búsqueda de Especie por ID exitosa\n";

        return $especies;
    }

    public function BuscarMascotaPorID($MascotaID)
    {
        $conexion = new ClassConexion();

        $query = "CALL BuscarMascotaPorID(?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("i", $MascotaID);

        $stmt->execute();
        $result = $stmt->get_result();

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

        $stmt->close();
        $conexion->CerrarConexion();

        // echo "Búsqueda de Mascota por ID exitosa\n";

        return $mascotas;
    }

    public function BuscarRazaPorID($RazaID)
    {
        $conexion = new ClassConexion();

        $query = "CALL BuscarRazaPorID(?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("i", $RazaID);

        $stmt->execute();
        $result = $stmt->get_result();

        $razas = array();

        while ($row = $result->fetch_assoc()) {
            $oR = new ClassRaza();

            $oR->setRazaID($row['RazaID']);
            $oR->setNombreRaza($row['NombreRaza']);
            $oR->setPrecio($row['Precio']);
            $oR->setEspecieID($row['EspecieID']);

            $razas[] = $oR;
        }

        $stmt->close();
        $conexion->CerrarConexion();

        // echo "Búsqueda de Raza por ID exitosa\n";

        return $razas;
    }

    public function BuscarUsuarioPorID($UsuarioID)
    {
        $conexion = new ClassConexion();

        $query = "CALL BuscarUsuarioPorID(?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("i", $UsuarioID);

        $stmt->execute();
        $result = $stmt->get_result();

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

        $stmt->close();
        $conexion->CerrarConexion();

        // echo "Búsqueda de Usuario por ID exitosa\n";

        return $usuarios;
    }
    
    // Otras Sentencias

    public function BuscarMascotaPorCampos($apodo, $sexo, $estadoAdopcion, $edadRelativa)
    {
        $conexion = new ClassConexion();

        $query = "CALL BuscarMascotaPorCampos(?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("ssss", $apodo, $sexo, $estadoAdopcion, $edadRelativa);

        $stmt->execute();

        $result = $stmt->get_result();

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

        $stmt->close();
        $conexion->CerrarConexion();

        //echo"Búsqueda de Mascotas por Campos, exitosa\n";

        return $mascotas;
    }

    public function ValidarUsuario($CorreoElectronico, $Clave)
    {
        $conexion = new ClassConexion();

        $query = "CALL ValidarUsuario(?, ?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("ss", $CorreoElectronico, $Clave);

        $stmt->execute();

        $result = $stmt->get_result();

        $usuario = array();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $usuario = new ClassUsuario();
            $usuario->setUsuarioID($row['UsuarioID']);
            $usuario->setNombre($row['Nombre']);
            $usuario->setApellido($row['Apellido']);
            $usuario->setSexo($row['Sexo']);
            $usuario->setCorreoElectronico($row['CorreoElectronico']);
            $usuario->setClave($row['Clave']);
            $usuario->setTipoUsuario($row['TipoUsuario']);
            $usuario->setNumeroTelefono($row['NumeroTelefono']);
        }

        $stmt->close();
        $conexion->CerrarConexion();

        return $usuario;
    }

    public function BuscarUsuarioPorCampos($sexo, $tipoUsuario)
    {
        $conexion = new ClassConexion();

        $query = "CALL BuscarUsuarioPorCampos(?, ?)";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("ss", $sexo, $tipoUsuario);

        $stmt->execute();

        $result = $stmt->get_result();

        $usuarios = array();

        while ($row = $result->fetch_assoc()) {
            $usuario = new ClassUsuario();

            $usuario->setUsuarioID($row['UsuarioID']);
            $usuario->setNombre($row['Nombre']);
            $usuario->setApellido($row['Apellido']);
            $usuario->setSexo($row['Sexo']);
            $usuario->setCorreoElectronico($row['CorreoElectronico']);
            $usuario->setClave($row['Clave']);
            $usuario->setTipoUsuario($row['TipoUsuario']);
            $usuario->setNumeroTelefono($row['NumeroTelefono']);

            $usuarios[] = $usuario;
        }

        $stmt->close();
        $conexion->CerrarConexion();

        return $usuarios;
    }

    public function BuscarMascotaEspecieRaza($EspecieID, $RazaID, $Sexo, $EstadoAdopcion, $EdadRelativa)
    {
        $conexion = new ClassConexion();
    
        $query = "CALL BuscarMascotaEspecieRaza(?, ?, ?, ?, ?)";
        $stmt = $conexion->Conectar->prepare($query);
    
        $stmt->bind_param("iisss", $EspecieID, $RazaID, $Sexo, $EstadoAdopcion, $EdadRelativa);
    
        $stmt->execute();
        $result = $stmt->get_result();
        $mascotas = [];
    
        while ($row = $result->fetch_assoc()) {
            $mascota = new ClassMascota();
            $mascota->setMascotaID($row['MascotaID']);
            $mascota->setApodo($row['Apodo']);
            $mascota->setSexo($row['Sexo']);
            $mascota->setRazaID($row['RazaID']);
            $mascota->setEdadRelativa($row['EdadRelativa']);
            $mascota->setEstadoAdopcion($row['EstadoAdopcion']);
            $mascota->setFotoMascota($row['FotoMascota']);
            $mascota->setFechaIngreso($row['FechaIngreso']);
            $mascotas[] = $mascota;
        }
    
        $stmt->close();
        $conexion->CerrarConexion();
    
        return $mascotas;
    }
    

    // FUNCIONES

    public function ExisteApodo($Apodo)
    {
        $conexion = new ClassConexion();

        $query = "SELECT ExisteApodo(?) AS Existe";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("s", $Apodo);

        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $existe = $row['Existe'];

        $stmt->close();
        $conexion->CerrarConexion();

        return $existe;
    }

    public function ExisteNombreEspecie($NombreEspecie)
    {
        $conexion = new ClassConexion();

        $query = "SELECT ExisteNombreEspecie(?) AS Existe";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("s", $NombreEspecie);

        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $existe = $row['Existe'];

        $stmt->close();
        $conexion->CerrarConexion();

        return $existe;
    }

    public function ExisteNombreRaza($NombreRaza)
    {
        $conexion = new ClassConexion();

        $query = "SELECT ExisteNombreRaza(?) AS Existe";
        $stmt = $conexion->Conectar->prepare($query);

        $stmt->bind_param("s", $NombreRaza);

        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $existe = $row['Existe'];

        $stmt->close();
        $conexion->CerrarConexion();

        return $existe;
    }

    public function ExisteCorreoElectronico($CorreoElectronico)
    {
        $conexion = new ClassConexion();
    
        $query = "SELECT ExisteCorreoElectronico(?) AS Existe";
        $stmt = $conexion->Conectar->prepare($query);
    
        $stmt->bind_param("s", $CorreoElectronico);
    
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    
        $existe = $row['Existe'];
    
        $stmt->close();
        $conexion->CerrarConexion();
    
        return $existe;
    }
    

}



