--#sudo - postgres
--#drop database if exists producto;

--create database producto;

\c tienda
create table producto(
id_producto serial primary key,
cantidad int not null,
precio numeric(7,2) not null,
nombre char(50) not null,
imagen OID not null
);
create table usuario(
id_usuario serial primary key,
nombre char(30) not null,
ap_paterno char(30) not null,
ap_materno char(30) not null,
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

