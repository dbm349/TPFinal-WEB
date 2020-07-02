USE propiedadesya;

CREATE TABLE propiedades (
    id_p INTEGER PRIMARY KEY AUTO_INCREMENT,
    tipo_operacion TEXT NOT NULL,
    tipo_propiedad TEXT NOT NULL,
    direccion text NOT NULL,
    localidad text NOT NULL,
    provincia text NOT NULL,
    supTotal INTEGER,
    supCub INTEGER,
    piso INTEGER,
    ambientes INTEGER,
    dormitorios INTEGER,
    banios INTEGER,
    patio BOOLEAN,
    piscina BOOLEAN,
    garage BOOLEAN,
    parrilla BOOLEAN,
    parque BOOLEAN,
    quincho BOOLEAN,
    antiguedad INTEGER,
    precio FLOAT,
    expensas FLOAT,
    moneda TEXT,
    descripcion TEXT,
    mail text NOT NULL,
    FOREIGN KEY(mail)REFERENCES users(mail));

