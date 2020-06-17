USE propiedadesya;

CREATE TABLE propiedades (
    id_p INTEGER PRIMARY KEY AUTO_INCREMENT,
    tipo_operacion TEXT NOT NULL,
    tipo_propiedad TEXT NOT NULL,
    direccion text NOT NULL,
    supTotal INTEGER,
    supCub INTEGER,
    piso INTEGER,
    ambientes INTEGER,
    dormitorios INTEGER,
    baños INTEGER,
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
    id_u INTEGER NOT NULL,
    FOREIGN KEY(id_u)REFERENCES users(id));

