DROP DATABASE IF EXISTS chatRoom;

CREATE DATABASE chatRoom COLLATE utf8mb4_spanish_ci;

USE chatRoom;

CREATE TABLE salas (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR (50) UNIQUE,
    descripcion TEXT
);

CREATE TABLE users (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user VARCHAR(25) NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol INT NOT NULL,
    conectado INT NOT NULL,
    sala int not null default 1,
    ultimaConexion INT not null default 0,
    FOREIGN key (sala) references salas(id)
);

CREATE TABLE mensajes (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user INT NOT NULL,
    mensaje TEXT NOT NULL,
    imagen VARCHAR(50),
    fecha DATETIME,
    mostrar INT NOT NULL,
    sala INT NOT NULL default 1,
    FOREIGN KEY (user) REFERENCES users(id),
    FOREIGN key (sala) references salas(id)
);

Create Table mensajesDirectos (
    idUser int not null,
    user int not null,
    mensaje text not null,
    feche DATETIME,
    FOREIGN key (idUser) references users(id),
    FOREIGN key (user) references users(id)
);

-- salas----------
INSERT INTO
    salas(name, descripcion)
VALUES
    ("Principal", "descripcion");
INSERT INTO
    salas(name, descripcion)
VALUES
    ("sala secundaria", "descripcion");

-- usuarios----------
INSERT INTO
    users(user, password, rol, conectado)
VALUES
    ("jose_016al", md5("211099"), 0, 0);

INSERT INTO
    users(user, password, rol, conectado)
VALUES
    ("inma", md5("1234"), 1, 0);

INSERT INTO
    users(user, password, rol, conectado)
VALUES
    ("alberto", md5("1234"), 1, 0);

INSERT INTO
    users(user, password, rol, conectado)
VALUES
    ("daulin", md5("1234"), 1, 0);

-- mensajes----------
INSERT INTO
    mensajes(user, mensaje, fecha, mostrar, sala)
VALUES
    (1, "Mensaje", NOW(), 1, 1);

INSERT INTO
    mensajes(user, mensaje, fecha, mostrar, sala)
VALUES
    (3, "Mensaje", NOW(), 1, 1);

INSERT INTO
    mensajes(user, mensaje, fecha, mostrar, sala)
VALUES
    (4, "Mensaje", NOW(), 1, 1);