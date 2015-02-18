DROP DATABASE tienda;
DROP USER admin;

CREATE USER admin PASSWORD 'hola123,';

CREATE DATABASE tienda with owner admin;

GRANT ALL PRIVILEGES ON DATABASE tienda TO admin;


\c tienda

create table producto(
id_producto serial primary key,
cantidad int not null,
precio numeric(7,2) not null,
nombre varchar(50) not null,
descripcion text not null,
imagen OID not null
);
create table usuario(
id_usuario serial primary key,
id_admin boolean not null,
nombre char(30) not null,
ap_paterno varchar(30) not null,
ap_materno varchar(30) not null,
username varchar(30) unique not null,
password varchar(32) not null
);
create table carrito(
id_carrito serial primary key,
id_usuario int not null,
id_producto int not null,
foreign key (id_usuario) references usuario (id_usuario),
foreign key (id_producto) references producto (id_producto)
);

GRANT ALL PRIVILEGES ON TABLE producto TO admin;
GRANT ALL PRIVILEGES ON TABLE usuario TO admin;
GRANT ALL PRIVILEGES ON TABLE carrito TO admin;

insert into producto (cantidad,precio,nombre,descripcion,imagen) 
values (100,18000.50,'conejo','todos con 30 dias de nacidos',lo_import('/var/www/imagenes/conejo.png'));
insert into producto (cantidad,precio,nombre,descripcion,imagen) 
values (200,1000.50,'gato','egipcio',lo_import('/var/www/imagenes/gato.png'));

insert into usuario(id_admin,nombre,ap_paterno,ap_materno,username,password)
values ('false','Juan','Perez','Lopez','jperez','hola123,');
insert into usuario(id_admin,nombre,ap_paterno,ap_materno,username,password)
values ('false','Rosita','Rodriguez','Godinez','rrodriguez','hola123,');
insert into usuario(id_admin,nombre,ap_paterno,ap_materno,username,password)
values ('true','Admin','lopez','lopez','admin','hola123,');

--insert into carrito(id_usuario,id_producto) values ();
