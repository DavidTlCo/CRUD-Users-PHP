CREATE DATABASE usuarios_php;

USE usuarios_php;

CREATE TABLE usuarios(
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario TEXT NOT NULL,
  correo TEXT NOT NULL,
  contrasenia VARCHAR(10) NOT NULL,
  creado TIMESTAMP
);