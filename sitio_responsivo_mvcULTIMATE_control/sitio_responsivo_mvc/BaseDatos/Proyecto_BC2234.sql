show databases;
create schema proyecto_TourPeople;
use proyecto_TourPeople;
show tables;

DROP TABLE IF EXISTS usuarios;

create table usuarios(
id_documento varchar(50)not null,
id_categoria boolean not null,
nombre_p varchar(50)not null,
apellido_p varchar(50)not null,
correo varchar(50)not null,
clave varchar(255)not null,
edad varchar(50)not null,
f_nacimiento date not null,
telefono varchar(67)not null,
imagen varchar(3000) not null,
fecha_ingreso TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
primary key (id_documento)
);
#select * from usuarios;

INSERT INTO usuarios(id_documento, id_categoria, nombre_p, apellido_p, correo, clave, edad, f_nacimiento, telefono) VALUES
('2039', '1', 'Robert', 'Vargas', 'robert563@gmail.com', '7894g3e4h', '28', '1975-12-09', '3166597065'),
('1362', '0', 'Dayana ','Tique','dayana@gmail.com','464val','18','2000-01-01','3155968450'),
('1516', '1', 'Paula ','Betancourt','misspaula@gmail.com','soylibre6723','16','2007-08-26','3168790997');

#set sql_safe_updates=0;
DROP TABLE IF EXISTS categoriaUsuario;

create table categoriaUsuario(
id_categoria boolean not null,
descrip_usuario varchar(30) not null,
primary key (id_categoria)
);

insert into categoriaUsuario(id_categoria, descrip_usuario) values
('0', 'usuario'),
('1', 'administrador');
#select * from categoriausuario;

alter table usuarios add constraint fk_categoriausuario_usuarios --    seccion para enlazar tablas--
foreign key(id_categoria) references categoriausuario (id_categoria);

create index indx_id_documento
on usuarios (id_documento);

DROP TABLE IF EXISTS reseteo_contraseña;

CREATE TABLE reseteo_contraseña (
  id_usuario varchar(50) NOT NULL,
  token varchar(255) NOT NULL,
  expire_date datetime NOT NULL,
  PRIMARY KEY (id_usuario));
  
#select * from reseteo_contraseña;
ALTER TABLE reseteo_contraseña
ADD CONSTRAINT fk_id_usuario
FOREIGN KEY (id_usuario) REFERENCES usuarios(id_documento)
ON DELETE CASCADE;

DROP TABLE IF EXISTS sitios;

create table sitios(
id_sitios int not null,
descripcion_sitio varchar(200)not null,
ubi_sitio varchar(200)not null,
enlace_reservas_turs varchar(300) not null,
primary key (id_sitios)
);

INSERT INTO sitios(id_sitios, descripcion_sitio, ubi_sitio, enlace_reservas_turs) VALUES
('1',  'Túneles Naturales Formaciones rocosas en posiciones que desafían la gravedad.', 'Situado por la vía Nuevo Tolima, en el kilómetro 11 desde San José del Guaviare.', 'https://www.tripadvisor.co/Attraction_Review-g3493972-d10251225-Reviews-Reserva_Tuneles_Naturales-San_Jose_del_Guaviare_Guaviare_Department.html'),
('2',  'Pinturas Rupestres se encuentra el arte rupestre más inaccesible del mundo. En la Serranía de La Lindosa.', 'Situado en el extremo norte de la Amazonía colombiana.', 'https://www.tripadvisor.co/AttractionProductReview-g3493972-d21076217-4_Days_El_Guaviare_Rock_Paintings_Amazon_Jungle-San_Jose_del_Guaviare_Guaviare_De.html'),
('3', 'Laguna Damas Del Nare un lugar donde habitan delfines rosados.', 'Situado a más o menos a más o menos 80 kilómetros de San José de Guaviare.', 'https://gorilontravels.com/inicio/rutas-y-destinos/aventura-guaviare/'),
('4', 'Puerta De Orión es una imponente estructura rocosa.', 'Situado a nueve kilómetros de San José Del Guaviare.', 'https://colombia.travel/es/san-jose-del-guaviare/visita-la-puerta-de-orion'),
('5',  'Pozos Naturales son encantadoras piscinas naturales excavadas en el lecho rocoso de colores amarillo y café.', 'Situado a ocho kilómetros de San José del Guaviare.', 'https://baquianos.com/es/tour/tour-a-san-jose-del-guaviare-la-puerta-de-orion-y-pozos-naturales'),
('6',  'Estadero Pica Piedra y Puentes Naturales .', 'Vereda El Retiro en la ciudad San José Del Guaviare por la dirección a 23-81, Cl. 19 #23-11, San José Del Guaviare', 'https://web.facebook.com/estaderopicapiedra/?locale=es_LA&_rdc=1&_rdr');

create index indx_id_sitios
on sitios (id_sitios);

DROP TABLE IF EXISTS categorias_servicios;

create table categorias_servicios(
id_categorias int not null,
id_documento varchar(50) not null,
id_hotel int not null,
id_sitios int not null,
id_restaurante int not null,
primary key (id_categorias)
);

insert into categorias_servicios(id_categorias, id_documento, id_hotel, id_sitios, id_restaurante) values
('1', '0234', '2', '5', '5'),
('2', '1362', '5', '1', '3'),
('3', '1516', '1', '4', '5'),
('4', '2039', '1', '6', '5'),
('5', '0123', '4', '3', '2'),
('6', '2889', '3', '2', '3');

alter table categorias_servicios add constraint fk_categorias_servicios_sitios
foreign key(id_sitios) references sitios(id_sitios);

alter table categorias_servicios add constraint fk_categoria_servicios_usuarios
foreign key(id_documento) references usuarios (id_documento);

create index indx_id_sitios
on sitios (id_sitios);

DROP TABLE IF EXISTS Hoteles;

create table Hoteles(
id_hotel int not null,
nombre varchar(80) not null,
descripcion_Hotel varchar(500)not null,
ubicacion_hotel varchar(300) not null,
enlaces_reservas_hotel varchar(300) not null,
primary key (id_Hotel)
);
insert into Hoteles(id_hotel, nombre, descripcion_Hotel, ubicacion_hotel, enlaces_reservas_hotel) values 
('1', 'hotel Quinto Nivel', 'un lugar de mucha comodidad, todo a su alcance', 'situado en diagonal Sena del centro(Cl. 7 #24-25, San José Del Guaviare, Guaviare)', 'https://n9.cl/hotelquintonivel'),
('2', 'hotel Las Palmas', 'un hotel que te permite relajarte muy bien en cada espacio', 'ubicado frente a empoaguas', 'https://www.booking.com/hotel/co/centro-vacacional-las-palmas.es.html'),
('3', 'Hotel Wimpy', 'si buscas economia, a wimpy hay que buscar', 'ubicado en el centro de la ciudad(Calle 8° No 20-25 , Centro)', 'https://n9.cl/hotelwimpyreservas'),
('4', 'hotel Puerta de Orion', 'un hotel que cuenta con camas doble y camas sencillas', 'ubicado en la Carrera 20 11 14, San José del Guaviare ', 'https://n9.cl/puertadeorion_reservas'),
('5', 'hotel Yurupari', 'la mejor opcion para las fiestas o si vienes de paso', 'ubicacion en la calle  8 # 22-87, San José del Guaviare', 'https://www.hotelyurupari.com/'),
('6', 'hotel Colombia', 'Servicio de habitaciones es uno de los servicios que ofrece el hotel pequeño. Su piscina y restaurante también contribuirán a que tu estancia sea incluso más especial.', 'esta ubicado en la Calle 8 N º 20-75 El centro San Jose del Guaviare', 'https://n9.cl/hotel_colombia_reservas');

alter table categorias_servicios add constraint fk_categorias_servicios_Hoteles
foreign key(id_hotel) references Hoteles(id_hotel);

DROP TABLE IF EXISTS restaurantes;

create table restaurantes(
id_restaurante int not null,
id_documento varchar(50)not null,
nombre_restaurante varchar(65) not null,
enlaces_gaginas_restaurante varchar(200)not null,
enlaces_whatsapp_restaurantes varchar(300)not null,
primary key (id_domicilios)
);
insert into restaurantes(id_restaurante, id_documento, nombre_restaurante, enlaces_gaginas_restaurante , enlaces_whatsapp_restaurantes) values
('1', '0234', 'Cutumare', 'https://web.facebook.com/CatumareComidasAmazonicas/?_rdc=1&_rdr', 'web.whatsapp.com'),
('2', '0234', 'El diamante', 'https://www.tripadvisor.co/Restaurant_Review-g3493972-d10212081-Reviews-Restaurante_El_Diamante-San_Jose_del_Guaviare_Guaviare_Department.html', 'web.whatsapp.com'),
('3', '2039', 'Nomadas', 'https://web.facebook.com/NomadaRestaurant.com', 'web.whatsapp.com'),
('4', '2889', 'Hamburgueseria Gourmet', 'https://web.facebook.com/people/La-Hamburgueser%C3%ADa-Gourmet/100041606837976/', 'web.whatsapp.com'),
('5', '1516', 'Artesanal', 'https://www.instagram.com/artesanalburgerdrinks/?hl=en', 'web.whatsapp.com');

alter table categorias_servicios add constraint fk_categorias_servicios_restaurantes
foreign key(id_restaurante) references restaurantes(id_restaurante);

DROP TABLE IF EXISTS tb_comentarios;

create table tb_comentarios(
id_comentario int not null,
id_documento varchar(50) not null,
comentario varchar(500) not null,
fecha_registro datetime not null,
primary key(id_comentario)
);

INSERT INTO tb_comentarios(id_comentario, id_documento, comentario, fecha_registro)
VALUES('1', '1516', 'las pinturas rupestres son lo mejor que tiene el guaviare','2024-02-23'),
('2', '0123', 'que gran sitio web, estoy muy contento de ver tan belleza en el guaviare','2024-03-02'),
('3', '0234', 'es una experiencia inolvidable la que hemos vivido junto a mi familia, esta pagina nos ha brindado la mejor información ','2024-03-20 ');

alter table tb_comentarios add constraint fk_tb_comentarios_usuarios
foreign key(id_documento) references usuarios(id_documento);

create table conteo(
id_conteo int not null auto_increment,
descripcion varchar(10),
conteo int not null,
fecha_regis datetime not null,
primary key(id_conteo)
);

/**insert into conteo(id_conteo, descripcion, conteo, fecha_regis) values('','','','');*/


SELECT usuarios.*, categoriaUsuario.descrip_usuario
FROM usuarios
INNER JOIN categoriaUsuario ON usuarios.id_categoria = categoriaUsuario.id_categoria;


SELECT u.*, c.descrip_usuario as categoria 
            FROM usuarios u 
            JOIN categoriausuario c 
            ON u.id_categoria = c.id_categoria 
            WHERE correo = 'dayana@gmail.com';


select * from usuarios;
select * from sitios;
select * from tb_comentarios;
select * from categorias_servicios;
select * from categoriaUsuario;
select * from hoteles;
SELECT 
    u.*, 
    cu.descrip_usuario, 
    h.nombre AS nombre_hotel, 
    s.descripcion_sitio, 
    dr.enlaces_gaginas_restaurante,
    c.comentario, 
    cs.id_categorias  
FROM 
    usuarios AS u
INNER JOIN 
    categoriaUsuario AS cu ON u.id_categoria = cu.id_categoria
LEFT JOIN 
    Hoteles AS h ON u.id_hotel = h.id_hotel
INNER JOIN 
    sitios AS s ON u.id_sitios = s.id_sitios
INNER JOIN 
    domicilios_restaurantes AS dr ON u.id_domicilios = dr.id_domicilios
LEFT JOIN 
    tb_comentarios AS c ON u.id_usuario = c.id_usuario 
LEFT JOIN 
    categoria_servicios AS cs ON u.id_servicio = cs.id_servicio; 

SELECT *
FROM usuarios u
INNER JOIN categorias_servicios cs ON u.id_documento = cs.id_documento;



#alter table usuarios drop column fecha_ingreso;

SELECT p.id_documento, p.nombre_p, COUNT(c.id_documento) AS total_comentarios
FROM usuarios AS p
LEFT JOIN tb_comentarios AS c ON p.id_documento = c.id_documento
GROUP BY p.id_documento;

select * from usuarios;

select hour('10:30:00');
select minute('10:30:00');

show tables;

update usuarios
set edad = edad*-1 where abs(edad ) > 35;

update usuarios
set edad = edad*1 where abs(edad) > 50;

select * from usuarios 
where edad < 100;

select min(month(f_nacimiento)) as mes from usuarios;

SELECT
    total.total_usuarios,
    normales.usuarios_normales,
    administradores.usuarios_administradores
FROM
    (SELECT COUNT(*) AS total_usuarios FROM usuarios) AS total
INNER JOIN
    (SELECT COUNT(*) AS usuarios_normales FROM usuarios WHERE id_categoria = '0') AS normales ON 1=1
INNER JOIN
    (SELECT COUNT(*) AS usuarios_administradores FROM usuarios WHERE id_categoria = '1') AS administradores ON 1=1;
    
    
    select * from conteo;
SELECT *FROM usuarios;
/*delete from usuarios;
drop table usuarios;*/

insert into usuarios(id_documento, id_categoria, nombre_p, apellido_p, correo, clave, edad, f_nacimiento, telefono) VALUES
('5677', '0', 'alvaro', 'dftg', 'alberto890@gmail.com', 'dsfdgf', '23', '2000-06-15', '3206753490');

insert into usuarios(id_documento, id_categoria, nombre_p, apellido_p, correo, clave, edad, f_nacimiento, telefono) VALUES
('0989', '0', 'juan', 'diego', 'diguist@gmail.com', 'dsfdgf', '23', '2000-06-15', '3206753490');
insert into usuarios(id_documento, id_categoria, nombre_p, apellido_p, correo, clave, edad, f_nacimiento, telefono) VALUES
('0890', '0', 'enrique', 'betancourt', 'enrique@gmail.com', 'dsfdgf', '23', '2000-06-15', '3206753490');

SHOW COLUMNS FROM usuarios;

delete from usuarios where id_documento = '5677';

/*drop table conteo;*/
/*--------------------------------------------------------*/

DELIMITER //

CREATE TRIGGER contando_usuarios
AFTER DELETE ON 
	usuarios
FOR EACH ROW BEGIN
	INSERT INTO conteo
    VALUES (NULL, 'contar', 1, now());
END;
//
DELIMITER ;
DROP TRIGGER contando_usuarios;

/*--------------------------------------------------------*/

DELIMITER //

CREATE TRIGGER contando_elementos
AFTER DELETE ON
	usuarios
FOR EACH ROW BEGIN
	DELETE FROM conteo;
	INSERT INTO conteo
    SELECT NULL AS id_conteo, NULL as descripcion, count(nombre_p) as conteo, now() as fecha
    from usuarios
    group by id_conteo, descripcion, fecha_regis;
END;
//
DELIMITER ;

DROP TRIGGER contando_elementos;
/*un retornador*/

delimiter //
create function retornar_alguna_cosa() returns float #declaracion
return 0.0;
//

SELECT  retornar_alguna_cosa();

DROP FUNCTION retornar_alguna_cosa;

/*------------   SUMA ----------------- */
delimiter //
create function sumar(n1 float, n2 float) returns float
return n1+n2;
//

select sumar(1.5, 1.6);

/*------------   NOMBRE----------------- */

delimiter //
create function nombre() returns varchar(300) 
begin
return 'robert michell';
end
//

delimiter //
select nombre();

/*------------   PROMEDIO----------------- */

create function promediar(n1 float, n2 float) returns float
begin
DECLARE SUMAR  FLOAT;
DECLARE promedio FLOAT;
 set SUMAR = sumar(n1,n2);
 set promedio = SUMAR/2;
 return promedio;
end
//
drop function promediar;
select promediar(3,5) as promedio;

/* -----------------------------*/
delimiter //

create function conteo() returns int
begin
    DECLARE conteo INT DEFAULT 0;
    DECLARE total_pesos INT;
    SELECT COUNT(*) INTO conteo FROM usuarios;
    SET total_pesos = conteo * 4000.00;
    RETURN total_pesos;
end
//

select conteo();
select * from usuarios;

delete from usuarios;

set sql_safe_updates= 1;
















