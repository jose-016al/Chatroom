DROP DATABASE IF EXISTS chatRoom;

CREATE DATABASE chatRoom COLLATE utf8mb4_spanish_ci;

USE chatRoom;

CREATE TABLE users (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user VARCHAR (25) NOT NULL,
    password VARCHAR (255) NOT NULL,
    rol INT NOT NULL,
    conectado INT NOT NULL,
    ultimaConexion INT default 0
);

CREATE TABLE salas (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user INT NOT NULL,
    name VARCHAR (50),
    FOREIGN KEY (user) REFERENCES users (id)
);

CREATE TABLE mensajes (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user INT NOT NULL,
    mensaje TEXT NOT NULL,
    imagen VARCHAR (50),
    fecha DATETIME,
    mostrar INT NOT NULL,
    sala int not null default 1,
    FOREIGN key (sala) REFERENCES salas (id),
    FOREIGN KEY (user) REFERENCES users (id)
);

ALTER TABLE
    salas
ADD
    CONSTRAINT salas UNIQUE(user, name);

-- usuarios----------
INSERT INTO
    users (user, password, rol, conectado)
VALUES
    ("jose_016al", md5("211099"), 0, 0);

INSERT INTO
    users (user, password, rol, conectado)
VALUES
    ("inma", md5("1234"), 1, 0);

INSERT INTO
    users (user, password, rol, conectado)
VALUES
    ("alberto", md5("1234"), 1, 0);

INSERT INTO
    users (user, password, rol, conectado)
VALUES
    ("daulin", md5("1234"), 1, 0);

-- salas------------
INSERT into
    salas (user, name)
VALUES
    (1, 'main');

-- mensajes----------
INSERT INTO
    mensajes (user, mensaje, fecha, mostrar)
VALUES
    (1, "Mensaje", NOW(), 1);

INSERT INTO
    mensajes (user, mensaje, fecha, mostrar)
VALUES
    (3, "Mensaje", NOW(), 1);

INSERT INTO
    mensajes (user, mensaje, fecha, mostrar)
VALUES
    (4, "Mensaje", NOW(), 1);