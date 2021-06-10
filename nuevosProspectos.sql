CREATE TABLE usuarios(
  id bigint(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(100) NOT NULL,
  correo varchar(100) NOT NULL unique,
  rol int NOT NULL,
  password varchar(25) NOT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE prospectos(
  id bigint(20)  NOT NULL AUTO_INCREMENT,
  nombre varchar(100) NOT NULL,
  apellidoPaterno varchar(100) NOT NULL,
  apellidoMaterno varchar(100) NOT NULL,
  calle varchar(100) NOT NULL,
  numero varchar(15) NOT NULL,
  colonia varchar(100) NOT NULL,
  codigoPostal int NOT NULL,
  telefono varchar(15) NOT NULL,
  RFC varchar(13) NOT NULL unique,
  estado int not null,
  motivoRechazo varchar(200), 
  PRIMARY KEY (id)
); 


CREATE TABLE Documentos(
  id bigint(20)  NOT NULL AUTO_INCREMENT,
  idProspecto bigint(20) NOT NULL,
  nombre varchar(100) NOT NULL,
  url varchar(250) NOT NULL,
 PRIMARY KEY (id),
  FOREIGN KEY (idProspecto) REFERENCES prospectos(id)
);


INSERT INTO USUARIOS(nombre,correo,rol,password) VALUES('promotor','promotor0@gmail.com',1,'admin123');

INSERT INTO USUARIOS(nombre,correo,rol,password) VALUES('evaluador','evaluador0@gmail.com',2,'admin123');