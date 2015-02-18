
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
id_admin serial,
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

insert into producto (cantidad,precio,nombre,descripcion,imagen) 
values (100,18000.50,'conejo','todos con 30 dias de nacidos',lo_import('/var/www/imagenes/imagen.png'));
insert into producto (cantidad,precio,nombre,descripcion,imagen) 
values (200,1000.50,'gato','egipcio',lo_import('/var/www/imagenes/imagen.png'));

insert into usuario(nombre,ap_paterno,ap_materno,username,password)
values ('Juan','Perez','Lopez','jperez','hola123,');
insert into usuario(nombre,ap_paterno,ap_materno,username,password)
values ('Rosita','Rodriguez','Godinez','rrodriguez','hola123,');

--insert into carrito(id_usuario,id_producto) values ();
