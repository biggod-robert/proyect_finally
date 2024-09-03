-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2024 a las 03:48:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2024 a las 03:48:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_tourpeople`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_servicios`
--

CREATE TABLE `categorias_servicios` (
  `id_categorias` int(11) NOT NULL,
  `id_documento` varchar(50) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_sitios` int(11) NOT NULL,
  `id_restaurante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estructura de tabla para la tabla `categoriausuario`
--

CREATE TABLE `categoriausuario` (
  `id_categoria` tinyint(11) NOT NULL,
  `descrip_usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcado de datos para la tabla `categoriaUsuario`

insert into `categoriaUsuario`(`id_categoria`, `descrip_usuario`) values
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `id_hotel` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `descripcion_Hotel` varchar(500) NOT NULL,
  `ubicacion_hotel` varchar(300) NOT NULL,
  `enlaces_reservas_hotel` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`id_hotel`, `nombre`, `descripcion_Hotel`, `ubicacion_hotel`, `enlaces_reservas_hotel`) VALUES
(1, 'hotel Quinto Nivel', 'un lugar de mucha comodidad, todo a su alcance', 'situado en diagonal Sena del centro(Cl. 7 #24-25, San José Del Guaviare, Guaviare)', 'https://n9.cl/hotelquintonivel'),
(2, 'hotel Las Palmas', 'un hotel que te permite relajarte muy bien en cada espacio', 'ubicado frente a empoaguas', 'https://www.booking.com/hotel/co/centro-vacacional-las-palmas.es.html'),
(3, 'Hotel Wimpy', 'si buscas economia, a wimpy hay que buscar', 'ubicado en el centro de la ciudad(Calle 8° No 20-25 , Centro)', 'https://n9.cl/hotelwimpyreservas'),
(4, 'hotel Puerta de Orion', 'un hotel que cuenta con camas doble y camas sencillas', 'ubicado en la Carrera 20 11 14, San José del Guaviare ', 'https://n9.cl/puertadeorion_reservas'),
(5, 'hotel Yurupari', 'la mejor opcion para las fiestas o si vienes de paso', 'ubicacion en la calle  8 # 22-87, San José del Guaviare', 'https://www.hotelyurupari.com/'),
(6, 'hotel Colombia', 'Servicio de habitaciones es uno de los servicios que ofrece el hotel pequeño. Su piscina y restaurante también contribuirán a que tu estancia sea incluso más especial.', 'esta ubicado en la Calle 8 N º 20-75 El centro San Jose del Guaviare', 'https://n9.cl/hotel_colombia_reservas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseteo_contraseña`
--

CREATE TABLE `reseteo_contraseña` (
  `id_usuario` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expire_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id_restaurante` int(11) NOT NULL,
  `id_documento` varchar(50) NOT NULL,
  `nombre_restaurante` varchar(65) NOT NULL,
  `enlaces_gaginas_restaurante` varchar(200) NOT NULL,
  `enlaces_whatsapp_restaurantes` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id_restaurante`, `id_documento`, `nombre_restaurante`, `enlaces_gaginas_restaurante`, `enlaces_whatsapp_restaurantes`) VALUES
(1, '0234', 'Cutumare', 'https://web.facebook.com/CatumareComidasAmazonicas/?_rdc=1&_rdr', 'web.whatsapp.com'),
(2, '0234', 'El diamante', 'https://www.tripadvisor.co/Restaurant_Review-g3493972-d10212081-Reviews-Restaurante_El_Diamante-San_Jose_del_Guaviare_Guaviare_Department.html', 'web.whatsapp.com'),
(3, '2039', 'Nomadas', 'https://web.facebook.com/NomadaRestaurant.com', 'web.whatsapp.com'),
(4, '2889', 'Hamburgueseria Gourmet', 'https://web.facebook.com/people/La-Hamburgueser%C3%ADa-Gourmet/100041606837976/', 'web.whatsapp.com'),
(5, '1516', 'Artesanal', 'https://www.instagram.com/artesanalburgerdrinks/?hl=en', 'web.whatsapp.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitios`
--

CREATE TABLE `sitios` (
  `id_sitios` int(11) NOT NULL,
  `descripcion_sitio` varchar(200) NOT NULL,
  `ubi_sitio` varchar(200) NOT NULL,
  `enlace_reservas_turs` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comentarios`
--

CREATE TABLE `tb_comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_documento` varchar(50) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_comentarios`
--

INSERT INTO `tb_comentarios` (`id_comentario`, `id_documento`, `comentario`, `fecha_registro`) VALUES
(1, '1516', 'las pinturas rupestres son lo mejor que tiene el guaviare', '2024-02-23 00:00:00'),
(2, '0123', 'que gran sitio web, estoy muy contento de ver tan belleza en el guaviare', '2024-03-02 00:00:00'),
(3, '0234', 'es una experiencia inolvidable la que hemos vivido junto a mi familia, esta pagina nos ha brindado la mejor información ', '2024-03-20 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_documento` varchar(50) NOT NULL,
  `id_categoria` tinyint(11) NOT NULL,
  `nombre_p` varchar(50) NOT NULL,
  `apellido_p` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `edad` varchar(50) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `telefono` varchar(67) NOT NULL,
  `imagen` varchar(3000) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `usuarios`(`id_documento`, `id_categoria`, `nombre_p`, `apellido_p`, `correo`, `clave`, `edad`) VALUES ('1120964002', 1, 'robert michell', 'moor', 'robertmoor2003@gmail.com', '$2y$10$9ZBuA/n31yQM.Sx5nvwEgO0cyGyFP5o2zmfYmU/tK1D6SvxxPel7G', 23);
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias_servicios`
--
ALTER TABLE `categorias_servicios`
  ADD PRIMARY KEY (`id_categorias`),
  ADD KEY `fk_sitios_categorias_servicios` (`id_sitios`),
  ADD KEY `fk_categoria_servicios_usuarios` (`id_documento`),
  ADD KEY `fk_categorias_servicios_Hoteles` (`id_hotel`),
  ADD KEY `fk_categorias_servicios_restaurantes` (`id_restaurante`);

--
-- Indices de la tabla `categoriausuario`
--
ALTER TABLE `categoriausuario`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indices de la tabla `reseteo_contraseña`
--
ALTER TABLE `reseteo_contraseña`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id_restaurante`);

--
-- Indices de la tabla `sitios`
--
ALTER TABLE `sitios`
  ADD PRIMARY KEY (`id_sitios`);

--
-- Indices de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_tb_comentarios_usuarios` (`id_documento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `fk_categoriausuario_usuarios` (`id_categoria`),
  ADD KEY `indx_id_documento` (`id_documento`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias_servicios`
--
ALTER TABLE `categorias_servicios`
  ADD CONSTRAINT `fk_categoria_servicios_usuarios` FOREIGN KEY (`id_documento`) REFERENCES `usuarios` (`id_documento`),
  ADD CONSTRAINT `fk_categorias_servicios_Hoteles` FOREIGN KEY (`id_hotel`) REFERENCES `hoteles` (`id_hotel`),
  ADD CONSTRAINT `fk_categorias_servicios_restaurantes` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id_restaurante`),
  ADD CONSTRAINT `fk_sitios_categorias_servicios` FOREIGN KEY (`id_sitios`) REFERENCES `sitios` (`id_sitios`);

--
-- Filtros para la tabla `reseteo_contraseña`
--
ALTER TABLE `reseteo_contraseña`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_documento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD CONSTRAINT `fk_tb_comentarios_usuarios` FOREIGN KEY (`id_documento`) REFERENCES `usuarios` (`id_documento`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_categoriausuario_usuarios` FOREIGN KEY (`id_categoria`) REFERENCES `categoriausuario` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_tourpeople`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_servicios`
--

CREATE TABLE `categorias_servicios` (
  `id_categorias` int(11) NOT NULL,
  `id_documento` varchar(50) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_sitios` int(11) NOT NULL,
  `id_restaurante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias_servicios`
--

INSERT INTO `categorias_servicios` (`id_categorias`, `id_documento`, `id_hotel`, `id_sitios`, `id_restaurante`) VALUES
(1, '0234', 2, 5, 5),
(2, '1362', 5, 1, 3),
(3, '1516', 1, 4, 5),
(4, '2039', 1, 6, 5),
(5, '0123', 4, 3, 2),
(6, '2889', 3, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriausuario`
--

CREATE TABLE `categoriausuario` (
  `id_categoria` tinyint(1) NOT NULL,
  `descrip_usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `id_hotel` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `descripcion_Hotel` varchar(500) NOT NULL,
  `ubicacion_hotel` varchar(300) NOT NULL,
  `enlaces_reservas_hotel` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`id_hotel`, `nombre`, `descripcion_Hotel`, `ubicacion_hotel`, `enlaces_reservas_hotel`) VALUES
(1, 'hotel Quinto Nivel', 'un lugar de mucha comodidad, todo a su alcance', 'situado en diagonal Sena del centro(Cl. 7 #24-25, San José Del Guaviare, Guaviare)', 'https://n9.cl/hotelquintonivel'),
(2, 'hotel Las Palmas', 'un hotel que te permite relajarte muy bien en cada espacio', 'ubicado frente a empoaguas', 'https://www.booking.com/hotel/co/centro-vacacional-las-palmas.es.html'),
(3, 'Hotel Wimpy', 'si buscas economia, a wimpy hay que buscar', 'ubicado en el centro de la ciudad(Calle 8° No 20-25 , Centro)', 'https://n9.cl/hotelwimpyreservas'),
(4, 'hotel Puerta de Orion', 'un hotel que cuenta con camas doble y camas sencillas', 'ubicado en la Carrera 20 11 14, San José del Guaviare ', 'https://n9.cl/puertadeorion_reservas'),
(5, 'hotel Yurupari', 'la mejor opcion para las fiestas o si vienes de paso', 'ubicacion en la calle  8 # 22-87, San José del Guaviare', 'https://www.hotelyurupari.com/'),
(6, 'hotel Colombia', 'Servicio de habitaciones es uno de los servicios que ofrece el hotel pequeño. Su piscina y restaurante también contribuirán a que tu estancia sea incluso más especial.', 'esta ubicado en la Calle 8 N º 20-75 El centro San Jose del Guaviare', 'https://n9.cl/hotel_colombia_reservas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseteo_contraseña`
--

CREATE TABLE `reseteo_contraseña` (
  `id_usuario` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expire_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id_restaurante` int(11) NOT NULL,
  `id_documento` varchar(50) NOT NULL,
  `nombre_restaurante` varchar(65) NOT NULL,
  `enlaces_gaginas_restaurante` varchar(200) NOT NULL,
  `enlaces_whatsapp_restaurantes` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id_restaurante`, `id_documento`, `nombre_restaurante`, `enlaces_gaginas_restaurante`, `enlaces_whatsapp_restaurantes`) VALUES
(1, '0234', 'Cutumare', 'https://web.facebook.com/CatumareComidasAmazonicas/?_rdc=1&_rdr', 'web.whatsapp.com'),
(2, '0234', 'El diamante', 'https://www.tripadvisor.co/Restaurant_Review-g3493972-d10212081-Reviews-Restaurante_El_Diamante-San_Jose_del_Guaviare_Guaviare_Department.html', 'web.whatsapp.com'),
(3, '2039', 'Nomadas', 'https://web.facebook.com/NomadaRestaurant.com', 'web.whatsapp.com'),
(4, '2889', 'Hamburgueseria Gourmet', 'https://web.facebook.com/people/La-Hamburgueser%C3%ADa-Gourmet/100041606837976/', 'web.whatsapp.com'),
(5, '1516', 'Artesanal', 'https://www.instagram.com/artesanalburgerdrinks/?hl=en', 'web.whatsapp.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitios`
--

CREATE TABLE `sitios` (
  `id_sitios` int(11) NOT NULL,
  `descripcion_sitio` varchar(200) NOT NULL,
  `ubi_sitio` varchar(200) NOT NULL,
  `enlace_reservas_turs` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comentarios`
--

CREATE TABLE `tb_comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_documento` varchar(50) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_comentarios`
--

INSERT INTO `tb_comentarios` (`id_comentario`, `id_documento`, `comentario`, `fecha_registro`) VALUES
(1, '1516', 'las pinturas rupestres son lo mejor que tiene el guaviare', '2024-02-23 00:00:00'),
(2, '0123', 'que gran sitio web, estoy muy contento de ver tan belleza en el guaviare', '2024-03-02 00:00:00'),
(3, '0234', 'es una experiencia inolvidable la que hemos vivido junto a mi familia, esta pagina nos ha brindado la mejor información ', '2024-03-20 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_documento` varchar(50) NOT NULL,
  `id_categoria` tinyint(1) NOT NULL,
  `nombre_p` varchar(50) NOT NULL,
  `apellido_p` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `edad` varchar(50) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `telefono` varchar(67) NOT NULL,
  `imagen` varchar(3000) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias_servicios`
--
ALTER TABLE `categorias_servicios`
  ADD PRIMARY KEY (`id_categorias`),
  ADD KEY `fk_sitios_categorias_servicios` (`id_sitios`),
  ADD KEY `fk_categoria_servicios_usuarios` (`id_documento`),
  ADD KEY `fk_categorias_servicios_Hoteles` (`id_hotel`),
  ADD KEY `fk_categorias_servicios_restaurantes` (`id_restaurante`);

--
-- Indices de la tabla `categoriausuario`
--
ALTER TABLE `categoriausuario`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indices de la tabla `reseteo_contraseña`
--
ALTER TABLE `reseteo_contraseña`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id_restaurante`);

--
-- Indices de la tabla `sitios`
--
ALTER TABLE `sitios`
  ADD PRIMARY KEY (`id_sitios`);

--
-- Indices de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_tb_comentarios_usuarios` (`id_documento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `fk_categoriausuario_usuarios` (`id_categoria`),
  ADD KEY `indx_id_documento` (`id_documento`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias_servicios`
--
ALTER TABLE `categorias_servicios`
  ADD CONSTRAINT `fk_categoria_servicios_usuarios` FOREIGN KEY (`id_documento`) REFERENCES `usuarios` (`id_documento`),
  ADD CONSTRAINT `fk_categorias_servicios_Hoteles` FOREIGN KEY (`id_hotel`) REFERENCES `hoteles` (`id_hotel`),
  ADD CONSTRAINT `fk_categorias_servicios_restaurantes` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id_restaurante`),
  ADD CONSTRAINT `fk_sitios_categorias_servicios` FOREIGN KEY (`id_sitios`) REFERENCES `sitios` (`id_sitios`);

--
-- Filtros para la tabla `reseteo_contraseña`
--
ALTER TABLE `reseteo_contraseña`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_documento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD CONSTRAINT `fk_tb_comentarios_usuarios` FOREIGN KEY (`id_documento`) REFERENCES `usuarios` (`id_documento`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_categoriausuario_usuarios` FOREIGN KEY (`id_categoria`) REFERENCES `categoriausuario` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
