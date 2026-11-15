/*
Diseñar y crear la base de datos
*/
CREATE DATABASE IF NOT EXISTS concesionario;
use concesionario;

create table coches(
id          int (10) AUTO_INCREMENT not null,
modelo      varchar(100)not null,
marca       varchar(50),
precio      int(20) not null,
stock       int(255) not null,
constraint pk_coches primary key(id)
)ENGINE=InnoDB;

CREATE TABLE grupos(
id      int(10) AUTO_INCREMENT not null,
nombre  varchar(100) not null,
ciudad varchar(100),
constraint pk_grupos primary key (id)
)ENGINE=InnoDB;

create table vendedores(
    id          int(10) AUTO_INCREMENT not null,
    grupo_id    int(10) not null,
    jefe        int(10),
    nombre      varchar(100) not null,
    apellidos   varchar(150),
    cargo       varchar(50),
    fecha       date,
    sueldo      float(20,2),
    comision    float(10,2),
    constraint pk_vendedores primary key (id),
    constraint fk_vendedor_grupo foreign key (grupo_id) references grupos(id),
    constraint fk_vendedor_jefe foreign key (jefe) references vendedores (id)
)ENGINE=InnoDB;

CREATE TABLE cleintes(
id              int(10) AUTO_INCREMENT not null,
vendedor_id     int(10),
nombre          varchar(150) not null,
ciudad          varchar(100),
gastado         float(50,2),
fecha           date,
constraint pk_clientes primary key (id),
constraint fk_cliente_vendedor foreign key (vendedor_id) references vendedores(id)
)ENGINE=InnoDB;

CREATE TABLE encargos(
id              int(10) AUTO_INCREMENT not null,
cliente_id       int(10) not null,
coche_id        int(10) not null,
cantidad        int(100),
fecha           date,
constraint pk_encargos primary key (id),
constraint fk_encargo_cliente foreign key (cliente_id) references cleintes(id),
constraint fk_encargo_coche foreign key (coche_id) references coches(id)
)ENGINE=InnoDB;




