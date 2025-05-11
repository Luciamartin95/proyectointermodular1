CREATE DATABASE IF NOT EXISTS luciamartinparejo;
USE luciamartinparejo;

CREATE TABLE VENDEDOR (
    nif VARCHAR(9) PRIMARY KEY,
    nombre VARCHAR(255),
    apellidos VARCHAR(255),
    telefono VARCHAR(20),
    email VARCHAR(255),
    nom_empresa VARCHAR(255)
);

CREATE TABLE CATEGORIA (
    cod_cat INT PRIMARY KEY,
    descripcion VARCHAR(255)
);

CREATE TABLE ARTICULO (
    cod_a INT PRIMARY KEY,
    descripcion VARCHAR(255),
    stock INT,
    precio_venta DECIMAL(10, 2),
    precio_compra DECIMAL(10, 2),
    IVA DECIMAL(5, 2),
    categoria INT,
    FOREIGN KEY (categoria) REFERENCES CATEGORIA(cod_cat)
);

CREATE TABLE VENDEDOR_ARTICULO (
    proart INT PRIMARY KEY,
    nif_vendedor VARCHAR(9) NOT NULL,
    cod_a INT NOT NULL,
    FOREIGN KEY (nif_vendedor) REFERENCES VENDEDOR(nif),
    FOREIGN KEY (cod_a) REFERENCES ARTICULO(cod_a)
);

CREATE TABLE CLIENTE (
    nif VARCHAR(9) PRIMARY KEY,
    nombre VARCHAR(255),
    apellidos VARCHAR(255),
    telefono VARCHAR(20),
    email VARCHAR(255),
    direccion VARCHAR(255)
);

CREATE TABLE FACTURA (
    num_fac INT PRIMARY KEY,
    forma_pago VARCHAR(50),
    comentario TEXT,
    nif_vendedor VARCHAR(9) NOT NULL,
    nif_cliente VARCHAR(9) NOT NULL,
    FOREIGN KEY (nif_vendedor) REFERENCES VENDEDOR(nif),
    FOREIGN KEY (nif_cliente) REFERENCES CLIENTE(nif)
);

CREATE TABLE ARTICULO_FACTURA (
    cod_a INT,
    num_fac INT,
    precio_venta DECIMAL(10, 2),
    cantidad INT,
    PRIMARY KEY (cod_a, num_fac),
    FOREIGN KEY (cod_a) REFERENCES ARTICULO(cod_a),
    FOREIGN KEY (num_fac) REFERENCES FACTURA(num_fac)
);
INSERT INTO articulo (cod_a, descripcion, stock, precio_venta)
VALUES (001, 'Portátil Gaming 16" QHD 165Hz, Intel Core i7-11800H, 16GB RAM, 1TB SSD, NVIDIA GeForce RTX 3070', 5, 1400), 
(002, 'Teclado mecánico RGB con switches Cherry MX Low Profile Speed, retroiluminación RGB por tecla', 8, 160),
(003, 'Monitor Gaming Ultrawide 34" 3440x1440 144Hz (160Hz OC) 1ms IPS G-Sync Compatible HDR400', 2, 600),
(004, 'Ratón inalámbrico gaming ultraligero con sensor HERO 25K y 5 botones programables', 14, 130);