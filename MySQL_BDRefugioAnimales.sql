CREATE DATABASE IF NOT EXISTS BDRefugioAnimales;

USE BDRefugioAnimales;

CREATE TABLE IF NOT EXISTS ESPECIE (
    EspecieID INT AUTO_INCREMENT PRIMARY KEY,
    NombreEspecie VARCHAR(20) UNIQUE
);

CREATE TABLE IF NOT EXISTS RAZA (
    RazaID INT AUTO_INCREMENT PRIMARY KEY,
    NombreRaza VARCHAR(50) UNIQUE,
    Precio DECIMAL(10,2),
    EspecieID INT,
    FOREIGN KEY (EspecieID) REFERENCES ESPECIE(EspecieID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS MASCOTA (
    MascotaID INT AUTO_INCREMENT PRIMARY KEY,
    Apodo VARCHAR(50) UNIQUE,
    Sexo CHAR(1) CHECK (Sexo IN ('M','F')),
    RazaID INT,
    EdadRelativa VARCHAR(15) CHECK (EdadRelativa IN ('Cachorro','Adulto')),
    EstadoAdopcion VARCHAR(20) CHECK (EstadoAdopcion IN ('Disponible','Adoptado','Vendido')),
    FotoMascota LONGBLOB,
    FechaIngreso DATE
);

CREATE TABLE IF NOT EXISTS USUARIO (
    UsuarioID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50),
    Apellido VARCHAR(50),
    Sexo CHAR(1) CHECK (Sexo IN ('M','F')),
    CorreoElectronico VARCHAR(50) UNIQUE,
    Clave VARCHAR(50),
    TipoUsuario VARCHAR(13) CHECK (TipoUsuario IN ('Cliente','Administrador')),
    NumeroTelefono CHAR(10)
);

CREATE TABLE IF NOT EXISTS ADQUIERE (
    CompraID INT AUTO_INCREMENT PRIMARY KEY,
    UsuarioID INT,
    MascotaID INT,
    FechaCompra DATETIME,
    Cantidad INT,
    MontoPagado DECIMAL(10, 2),
    FOREIGN KEY (UsuarioID) REFERENCES USUARIO(UsuarioID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (MascotaID) REFERENCES MASCOTA(MascotaID) ON DELETE CASCADE ON UPDATE CASCADE
);

