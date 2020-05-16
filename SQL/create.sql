CREATE DATABASE pti2020a;

USE pti2020a;

CREATE TABLE Usuario
(
    ID   	   INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    CPF  	   VARCHAR(11) NOT NULL UNIQUE,
    Nome 	   VARCHAR(30) NOT NULL,
	Nascimento DATE NOT NULL,
    email 	   VARCHAR(30) NOT NULL UNIQUE,
    senha      VARCHAR(30) NOT NULL,
    contato    VARCHAR(20),
    social     VARCHAR(50),
    endereco   VARCHAR(50)
 );   
 
 CREATE TABLE Denuncia
 (
	ID 		  INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Latitude  VARCHAR(30) NOT NULL,
    Longitude VARCHAR(30) NOT NULL,
    Autor     VARCHAR(30) NOT NULL,
    Emissao   DATE NOT NULL,
    Estado    CHAR NOT NULL,
    Tipo      CHAR NOT NULL,
    Foto1     VARCHAR(100),
    Foto2     VARCHAR(100),
    Descricao VARCHAR(500)
 );

