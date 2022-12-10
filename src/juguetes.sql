DROP TABLE IF EXISTS articulos CASCADE;

CREATE TABLE articulos (
    id          bigserial     PRIMARY KEY,
    codigo      varchar(13)   NOT NULL UNIQUE,
    descripcion varchar(255)  NOT NULL,
    precio      numeric(7, 2) NOT NULL,
    su_juguete bigserial NOT NULL REFERENCES usuarios (id)
);

DROP TABLE IF EXISTS usuarios CASCADE;

CREATE TABLE usuarios (
    id       bigserial    PRIMARY KEY,
    usuario  varchar(255) NOT NULL UNIQUE,
    password varchar(255) NOT NULL
);
/*
DROP TABLE IF EXISTS facturas CASCADE;

CREATE TABLE facturas (
    id         bigserial  PRIMARY KEY,
    created_at timestamp  NOT NULL DEFAULT localtimestamp(0),
    usuario_id bigint NOT NULL REFERENCES usuarios (id)
);

DROP TABLE IF EXISTS articulos_facturas CASCADE;

CREATE TABLE articulos_facturas (
    articulo_id bigint NOT NULL REFERENCES articulos (id),
    factura_id  bigint NOT NULL REFERENCES facturas (id),
    cantidad    int    NOT NULL,
    PRIMARY KEY (articulo_id, factura_id)
);

-- Carga inicial de datos de prueba:
*/

INSERT INTO articulos (codigo, descripcion, precio,su_juguete)
    VALUES ('18273892389', 'Elefante', 35.95, 1),
           ('83745828273', 'Gato', 36.10, 2),
           ('51736128495', 'Perro', 29.95, 1),
           ('83746828273', 'Sacabolas', 26.95, 2),
           ('51786128435', 'Tres en Rayas', 19.95, 1),
           ('83745228673', 'Undir la Flota', 30.25, 2),
           ('51786198495', 'Carbón', 3.95, 1);

INSERT INTO usuarios (usuario, password)
    VALUES ('admin', crypt('admin', gen_salt('bf', 10))),
           ('pepe', crypt('pepe', gen_salt('bf', 10)));









/*DROP TABLE IF EXISTS alumnos CASCADE;
DROP TABLE IF EXISTS ccee CASCADE;
DROP TABLE IF EXISTS notas CASCADE;

CREATE TABLE alumnos (
    id bigserial PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

CREATE TABLE ccee (
    id bigserial PRIMARY KEY,
    ce VARCHAR(4) NOT NULL UNIQUE,
    descripción VARCHAR(255) NOT NULL
);

CREATE TABLE notas (
    id bigserial NOT NULL UNIQUE,
    alumno_id BIGINT NOT NULL REFERENCES alumnos (id),
    ccee_id BIGINT NOT NULL REFERENCES ccee (id),
    nota numeric(4,2) NOT NULL,
    PRIMARY KEY (alumno_id, ccee_id)
);*/





