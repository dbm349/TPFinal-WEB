USE propiedadesya;

CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nombre TEXT NOT NULL,
    apellido TEXT NOT NULL,
    mail TEXT NOT NULL,
    telefono TEXT NOT NULL,
    pass TEXT NOT NULL);
