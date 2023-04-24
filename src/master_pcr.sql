-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 12:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_pcr`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria_reporte_pb`
--

CREATE TABLE `categoria_reporte_pb` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `stat` int(1) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reportes_pb`
--

CREATE TABLE `reportes_pb` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `titulo` varchar(250) NOT NULL,
  `texto_report` text NOT NULL,
  `id_categoria` int(3) NOT NULL,
  `stat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reportes_pb`
--

INSERT INTO `reportes_pb` (`id`, `id_user`, `fecha`, `titulo`, `texto_report`, `id_categoria`, `stat`) VALUES
(1, 0, '2023-03-25 23:25:08', 'como asi cholo', 'como asi cholo', 0, 1),
(2, 0, '2023-03-25 23:25:15', 'Blog del viajero 2', 'sdvsdvsdv', 0, 1),
(3, 0, '2023-03-25 23:27:37', 'DeadPoolqwdq', 'qwdqwdwd', 0, 1),
(4, 0, '2023-03-26 00:24:17', 'Matrix', 'svsdvsdv', 0, 1),
(7, 1, '2023-04-24 12:35:56', 'video de youtube', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/AapS9OcAZdQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 0, 1),
(8, 2, '2023-04-24 15:45:07', 'reporte', 'como asi xola', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `stat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipos`
--

INSERT INTO `tipos` (`id`, `tipo`, `descripcion`, `stat`) VALUES
(1, 'admin', 'usuairo administrador', 1),
(2, 'tipo_1', 'Usuario tipo 1', 1),
(3, 'tipo_2', 'Usuario tipo 2', 1),
(4, 'tipo_3', 'Usuario tipo 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `tipo_user` varchar(10) NOT NULL,
  `stat` int(1) NOT NULL COMMENT '1=on; 2=off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `edad`, `password`, `tipo_user`, `stat`) VALUES
(1, 'q', 'q@q.com', 1, '$2y$10$3pdKMRWZQjC6pD.2QkY48O6n.dimtn4IeDMHql3JmWic3/XcrNNyW', 'admin', 1),
(2, 'tayronbus', 'pdarrieta@hormail.com', 24, '$2y$10$1aw/nCPLmOcV2S5tHE0AjO1tTyNFTnaqogUQXVIzaBvnAwHfYmmxO', 'tipo_1', 1),
(5, 'tayron', 'pedroarrieta25@hotmail.com', 24, '$2y$10$omg2rq0KVc6gFmP8AU/Mt.w6JZXuhf.D0YJVOk7b3/eTlJGhuvLDi', 'tipo_1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria_reporte_pb`
--
ALTER TABLE `categoria_reporte_pb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportes_pb`
--
ALTER TABLE `reportes_pb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria_reporte_pb`
--
ALTER TABLE `categoria_reporte_pb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportes_pb`
--
ALTER TABLE `reportes_pb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
