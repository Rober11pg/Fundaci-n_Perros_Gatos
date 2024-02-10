
****************************** ADQUIERE *******************************

DELIMITER //

CREATE PROCEDURE InsertarAdquiere(
    IN p_CompraID INT,
    IN p_UsuarioID INT,
    IN p_MascotaID INT,
    IN p_FechaCompra DATETIME,
    IN p_Cantidad INT,
    IN p_MontoPagado DECIMAL(10, 2)
)
BEGIN
    INSERT INTO ADQUIERE (CompraID, UsuarioID, MascotaID, FechaCompra, Cantidad, MontoPagado)
    VALUES (p_CompraID, p_UsuarioID, p_MascotaID, p_FechaCompra, p_Cantidad, p_MontoPagado);
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ConsultarAdquiere()
BEGIN
    SELECT * FROM ADQUIERE;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE EliminarAdquierePorID(
    IN p_CompraID INT
)
BEGIN
    DELETE FROM ADQUIERE WHERE CompraID = p_CompraID;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ActualizarAdquierePorID(
    IN p_CompraID INT,
    IN p_UsuarioID INT,
    IN p_MascotaID INT,
    IN p_FechaCompra DATETIME,
    IN p_Cantidad INT,
    IN p_MontoPagado DECIMAL(10,2),
    IN p_IdAnterior INT
)
BEGIN
    UPDATE ADQUIERE 
    SET 
        CompraID = p_CompraID,
        UsuarioID = p_UsuarioID,
        MascotaID = p_MascotaID,
        FechaCompra = p_FechaCompra,
        Cantidad = p_Cantidad,
        MontoPagado = p_MontoPagado
    WHERE 
        CompraID = p_IdAnterior;
END //

DELIMITER ;


******************************* ESPECIE *******************************

DELIMITER //

CREATE PROCEDURE InsertarEspecie(
    IN p_EspecieID INT,
    IN p_NombreEspecie VARCHAR(20)
)
BEGIN
    INSERT INTO ESPECIE (EspecieID, NombreEspecie)
    VALUES (p_EspecieID, p_NombreEspecie);
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ConsultarEspecie()
BEGIN
    SELECT * FROM ESPECIE;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE EliminarEspeciePorID(
    IN p_EspecieID INT
)
BEGIN
    DELETE FROM ESPECIE WHERE EspecieID = p_EspecieID;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ActualizarEspeciePorID(
    IN p_EspecieID INT,
    IN p_NombreEspecie NVARCHAR(20),
    IN p_IdAnterior INT
)
BEGIN
    UPDATE ESPECIE 
    SET 
        EspecieID = p_EspecieID,
        NombreEspecie = p_NombreEspecie
    WHERE 
        EspecieID = p_IdAnterior;
END //

DELIMITER ;


****************************** MASCOTA *******************************

DELIMITER //

CREATE PROCEDURE InsertarMascota(
    IN p_MascotaID INT,
    IN p_Apodo VARCHAR(50),
    IN p_Sexo CHAR(1),
    IN p_RazaID INT,
    IN p_EdadRelativa VARCHAR(15),
    IN p_EstadoAdopcion VARCHAR(20),
    IN p_FotoMascota VARBINARY(MAX),
    IN p_FechaIngreso DATE
)
BEGIN
    INSERT INTO MASCOTA (MascotaID, Apodo, Sexo, RazaID, EdadRelativa, EstadoAdopcion, FotoMascota, FechaIngreso)
    VALUES (p_MascotaID, p_Apodo, p_Sexo, p_RazaID, p_EdadRelativa, p_EstadoAdopcion, p_FotoMascota, p_FechaIngreso);
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ConsultarMascota()
BEGIN
    SELECT * FROM MASCOTA;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE EliminarMascotaPorID(
    IN p_MascotaID INT
)
BEGIN
    DELETE FROM MASCOTA WHERE MascotaID = p_MascotaID;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ActualizarMascotaPorID(
    IN p_MascotaID INT,
    IN p_Apodo NVARCHAR(50),
    IN p_Sexo CHAR(1),
    IN p_RazaID INT,
    IN p_EdadRelativa VARCHAR(15),
    IN p_EstadoAdopcion NVARCHAR(20),
    IN p_FotoMascota VARBINARY(MAX),
    IN p_FechaIngreso DATE,
    IN p_IdAnterior INT
)
BEGIN
    UPDATE MASCOTA 
    SET 
        MascotaID = p_MascotaID,
        Apodo = p_Apodo,
        Sexo = p_Sexo,
        RazaID = p_RazaID,
        EdadRelativa = p_EdadRelativa,
        EstadoAdopcion = p_EstadoAdopcion,
        FotoMascota = p_FotoMascota,
        FechaIngreso = p_FechaIngreso
    WHERE 
        MascotaID = p_IdAnterior;
END //

DELIMITER ;



****************************** RAZA *******************************

DELIMITER //

CREATE PROCEDURE InsertarRaza(
    IN p_RazaID INT,
    IN p_NombreRaza VARCHAR(50),
    IN p_Precio DECIMAL(10, 2),
    IN p_EspecieID INT
)
BEGIN
    INSERT INTO RAZA (RazaID, NombreRaza, Precio, EspecieID)
    VALUES (p_RazaID, p_NombreRaza, p_Precio, p_EspecieID);
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ConsultarRaza()
BEGIN
    SELECT * FROM RAZA;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE EliminarRazaPorID(
    IN p_RazaID INT
)
BEGIN
    DELETE FROM RAZA WHERE RazaID = p_RazaID;
END //

DELIMITER //

CREATE PROCEDURE ActualizarRazaPorID(
    IN p_RazaID INT,
    IN p_NombreRaza NVARCHAR(50),
    IN p_Precio DECIMAL(10,2),
    IN p_EspecieID INT,
    IN p_IdAnterior INT
)
BEGIN
    UPDATE RAZA 
    SET 
        RazaID = p_RazaID,
        NombreRaza = p_NombreRaza,
        Precio = p_Precio,
        EspecieID = p_EspecieID
    WHERE 
        RazaID = p_IdAnterior;
END //

DELIMITER ;



DELIMITER ;


****************************** USUARIO *******************************

DELIMITER //

CREATE PROCEDURE InsertarUsuario(
    IN p_UsuarioID INT,
    IN p_Nombre VARCHAR(50),
    IN p_Apellido VARCHAR(50),
    IN p_Sexo CHAR(1),
    IN p_CorreoElectronico VARCHAR(50),
    IN p_Clave VARCHAR(50),
    IN p_TipoUsuario VARCHAR(13),
    IN p_NumeroTelefono VARCHAR(15)
)
BEGIN
    INSERT INTO USUARIO (UsuarioID, Nombre, Apellido, Sexo, CorreoElectronico, Clave, TipoUsuario, NumeroTelefono)
    VALUES (p_UsuarioID, p_Nombre, p_Apellido, p_Sexo, p_CorreoElectronico, p_Clave, p_TipoUsuario, p_NumeroTelefono);
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ConsultarUsuario()
BEGIN
    SELECT * FROM USUARIO;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE EliminarUsuarioPorID(
    IN p_UsuarioID INT
)
BEGIN
    DELETE FROM USUARIO WHERE UsuarioID = p_UsuarioID;
END //

DELIMITER ;


DELIMITER //

CREATE PROCEDURE ActualizarUsuarioPorID(
    IN p_UsuarioID INT,
    IN p_Nombre NVARCHAR(50),
    IN p_Apellido NVARCHAR(50),
    IN p_Sexo CHAR(1),
    IN p_CorreoElectronico NVARCHAR(50),
    IN p_Clave NVARCHAR(50),
    IN p_TipoUsuario VARCHAR(13),
    IN p_NumeroTelefono NVARCHAR(15),
    IN p_IdAnterior INT
)
BEGIN
    UPDATE USUARIO 
    SET 
        UsuarioID = p_UsuarioID,
        Nombre = p_Nombre,
        Apellido = p_Apellido,
        Sexo = p_Sexo,
        CorreoElectronico = p_CorreoElectronico,
        Clave = p_Clave,
        TipoUsuario = p_TipoUsuario,
        NumeroTelefono = p_NumeroTelefono
    WHERE 
        UsuarioID = p_IdAnterior;
END //

DELIMITER ;


