-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2023 a las 08:13:55
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_requests`
--

CREATE TABLE `tbl_requests` (
  `REQUEST_ID` int(50) NOT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `ID_CARD` int(25) DEFAULT NULL,
  `USER_ROLE` enum('admin','normal') DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `REQUEST_DATE` date DEFAULT NULL,
  `ANSWER` enum('approved','declined') DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `PRIMARY_ID` int(50) NOT NULL,
  `USER_ID` varchar(50) DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `ID_CARD` int(25) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `USER_ROLE` enum('admin','normal') DEFAULT NULL,
  `FIRST_LOGIN` tinyint(1) DEFAULT NULL,
  `LAST_EDITOR` varchar(50) DEFAULT NULL,
  `CREATOR` varchar(50) DEFAULT NULL,
  `DATE_CREATED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_requests`
--
ALTER TABLE `tbl_requests`
  ADD PRIMARY KEY (`REQUEST_ID`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`PRIMARY_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
