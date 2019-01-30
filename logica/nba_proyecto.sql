CREATE TABLE equipos (
  nombre varchar(20) NOT NULL,
  ciudad varchar(20) DEFAULT NULL,
  num_socios int NOT NULL,
  anio TIMESTAMP NOT NULL
  PRIMARY KEY (Nombre)
)engine=innodb;

CREATE TABLE jugadores (
  codigo int NOT NULL,
  nombre varchar(30) DEFAULT NULL,
  procedencia varchar(20) DEFAULT NULL,
  altura varchar(4) DEFAULT NULL,
  peso int DEFAULT NULL,
  posicion varchar(5) DEFAULT NULL,
  nombre_equipo varchar(20) DEFAULT NULL,
  PRIMARY KEY (codigo),
  FOREIGN KEY (nombre_equipo) References equipos(nombre)
)engine=innodb;

CREATE TABLE partidos (
  codigo int NOT NULL,
  equipo_local varchar(20) DEFAULT NULL,
  equipo_visitante varchar(20) DEFAULT NULL,
  puntos_local int DEFAULT NULL,
  puntos_visitante int DEFAULT NULL,
  temporada varchar(5) DEFAULT NULL,
  PRIMARY KEY (codigo),
  FOREIGN KEY (equipo_local) REFERENCES equipos(nombre),
  FOREIGN KEY (equipo_visitante) REFERENCES equipos(nombre)
)engine=innodb;