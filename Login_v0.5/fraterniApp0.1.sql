DROP DATABASE fraterniApp;
CREATE DATABASE fraterniApp;
USE fraterniApp;

CREATE TABLE IF NOT EXISTS usuario (
	usuarioId INT(11) AUTO_INCREMENT PRIMARY KEY,
	usuarioNombre VARCHAR(150) NOT NULL,
	usuarioEmail VARCHAR(150) NOT NULL,
	usuarioTelefonoPrincipal VARCHAR(150) NOT NULL,
    usuarioContraseña VARCHAR(250) NOT NULL,
	fk_universidadId INT(11),
);