CREATE TABLE usuarios(
    id int (11) auto_increment not null,
    nombre varchar(100)not null,
    apellido varchar(255)not null,
    email varchar(150)default'info@info.com',
    password varchar(150),
    CONSTRAINT pk_usuarios PRIMARY KEY(id)
);