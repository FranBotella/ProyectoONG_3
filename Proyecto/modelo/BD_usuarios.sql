

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE DATABASE IF NOT EXISTS `BDTFGUsuarios_php` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `BDTFGUsuarios_php`;



CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contraseñaEncriptada` varchar(72) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT 1,
  `baja` varchar(20) DEFAULT 'no_baja'
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `usuarios`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;




  CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `imagen` varchar(72) NOT NULL,
  `contenido` varchar(5000) NOT NULL,
  `fechainicio` varchar(20) NOT NULL,
  `fechafin` varchar(20) NOT NULL
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `post`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;


   CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `genero` varchar (20) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `imagen` varchar(72) NOT NULL,
  `contenido` varchar(5000) NOT NULL,
  `precio` int(11) NOT NULL
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `productos`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;





     CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `idProducto` int(11)NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `tituloProducto` varchar(20) NOT NULL,
   `fechaCompra` varchar(20) NOT NULL,
   `estadoPedido` varchar(20)NOT NULL,
  `precio` int(11) NOT NULL,
   `cantidad` int(11)NOT NULL
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `carrito`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

ALTER TABLE `carrito`
  ADD FOREIGN KEY (`idProducto`) REFERENCES `productos`(`id`);
ALTER TABLE `carrito`
  ADD FOREIGN KEY (`idUsuario`) REFERENCES `usuarios`(`id`);


  
