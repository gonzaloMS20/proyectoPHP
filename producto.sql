--#sudo - postgres
--#drop database if exists producto;

--#create database producto;

--#psql
\c producto
create table producto(
id_producto serial primary key,
cantidad int,
precio numeric(7,2),
nombre char(50),
imagen OID
);
create table usuario(
id_usuario serial primary key,
nombre char(30),
ap_paterno char(30),
ap_materno char(30),
username varchar(30) unique,
password varchar(32)
);

create table carrito(
id_carrito serial primary key,
id_usuario int,
id_producto int,
foreign key (id_usuario) reference usuario (id_usuario),
foreign key (id_producto) reference producto (id_producto)
);

