
CREATE TABLE Tusuario(
id INTEGER PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR (18),
contraseña VARCHAR (200),
email VARCHAR (200),
esencias INTEGER,
fecha_ultimo_login DATE 
);



CREATE TABLE Tcarta(
id INTEGER PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR (30),
url_imagen VARCHAR (200),
essencias INTEGER (15) DEFAULT 300
);




CREATE TABLE TcartaUsuario(
id INTEGER PRIMARY KEY AUTO_INCREMENT,
idCarta INTEGER,
idUsuario INTEGER ,
FOREIGN KEY (idUsuario) REFERENCES Tusuario (id) ,
FOREIGN KEY (idCarta) REFERENCES Tcarta (id)
);
