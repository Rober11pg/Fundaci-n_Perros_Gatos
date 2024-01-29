<?php

class ClassConexion 
{
    public $Cadena = "localhost";
    public $Usuario = "root";
    public $Password = "";
    public $BaseDatos = "bdrefugioanimales";

    public $Conectar;

    public function __construct() {
        $this->Conectar = new mysqli($this->Cadena, $this->Usuario, $this->Password, $this->BaseDatos);

        // if ($this->Conectar->connect_error) {
        //     die("La conexión falló a BDRefugioAnimales: " . $this->Conectar->connect_error);
        // }

        if ($this->Conectar->connect_error) {
            throw new Exception("La conexión falló a BDRefugioAnimales: " . $this->Conectar->connect_error);
        }

        echo "Conexión Abierta a BDRefugioAnimales\n";
    }

    public function AbrirConexion() {
        // No es necesario en MySQLi, ya que la conexión está abierta en el constructor.
    }

    public function CerrarConexion() {
        $this->Conectar->close();
        echo "Conexión cerrada de BDRefugioAnimales\n";
    }
}

/*
    // Uso de la clase
    $conexion = new ClassConexion();
    // Puedes realizar operaciones con la conexión aquí

    // Cierra la conexión al finalizar
    $conexion->CerrarConexion();
*/
