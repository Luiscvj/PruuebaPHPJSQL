# PruuebaPHPJSQL
Camper:Luis Carlos Villan
Equipo:Apolo team 1
BASE DE DATOS:

CREATE TABLE 
departamento(
	idDep INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
	nombreDep VARCHAR(50) UNIQUE,
	idPais INT,
	CONSTRAINT pk_idDep PRIMARY KEY(idDep),
	CONSTRAINT fk_idPais FOREIGN KEY(idPais) REFERENCES pais(idPais)

);

CREATE TABLE 
region(
	idReg INT(11) NOT NULL AUTO_INCREMENT,
	nombreReg VARCHAR(60),
	idDep INT,
	CONSTRAINT pk_idReg PRIMARY KEY(idReg),
	CONSTRAINT fk_idDep FOREIGN KEY(idDep) REFERENCES departamento(idDep)
	
);

CREATE TABLE 
campers(
	idCamper VARCHAR(20) NOT NULL UNIQUE ,
	nombreCamper VARCHAR(50) NOT NULL,
	apellidoCamper VARCHAR(50) NOT NULL,
	fechaNac DATE,
	idReg INT,
	CONSTRAINT pk_idCamper PRIMARY KEY(idCamper),
	CONSTRAINT fk_idReg FOREIGN KEY(idReg) REFERENCES region(idReg)
	
	

)





CREATE TABLE
  pais(
        idPais INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
        nombrePais VARCHAR(120) NOT NULL UNIQUE,
        CONSTRAINT pk_idPais PRIMARY KEY(idPais)
    );





INSERTS DE MI BASE DE DATOS

INSERT INTO departamento(idPais,nombreDep) VALUES(1,"Cundinamarca");
INSERT INTO departamento(idPais,nombreDep) VALUES(1,"Santander");
INSERT INTO departamento(idPais,nombreDep) VALUES(1,"Norte de Santander");
INSERT INTO pais(nombrePais) VALUES("Colombia");

INSERT INTO region(idDep,nombreReg) VALUES(2,"Cucuta");
INSERT INTO region(idDep,nombreReg) VALUES(3,"Bogota");
INSERT INTO region(idDep,nombreReg) VALUES(1,"Bucaramanga");


