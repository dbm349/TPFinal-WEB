USE propiedadesya;

CREATE TABLE imagenes (
    id_i INTEGER PRIMARY KEY AUTO_INCREMENT,
    imagen LONGBLOB NOT NULL,
    id_p INTEGER NOT NULL,
    FOREIGN KEY (id_p) REFERENCES propiedades(id_p));