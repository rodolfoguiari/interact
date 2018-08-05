-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Ago-2018 às 21:33
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `interact`
--

--
-- Extraindo dados da tabela `doacoes`
--

INSERT INTO `doacoes` (`id_doacoes`, `cd_empresa`, `cd_entidad`, `ds_pedidos`, `qt_quantid`, `ds_statuss`, `dt_inclusa`, `hr_inclusa`, `cd_usuario`, `dt_alterac`, `hr_alterac`, `cd_usualte`, `cd_logoemp`) VALUES
(1, 1, 1, 'ARROZ', 10, 'Aberto', '2018-07-31', '11:11:11', 1, NULL, NULL, NULL, 1),
(2, 1, 1, 'PAÇOCA', 1, '111111111111111111', '2018-07-31', '11:11:22', 1, NULL, NULL, NULL, 1),
(3, 2, 2, 'SABONETE', 20, 'Parcial', '2018-07-24', '22:22:22', 1, NULL, NULL, NULL, 2),
(4, 2, 2, 'PAPEL HIGIENICO', 10, 'Completo', '2018-07-24', '22:22:22', 1, NULL, NULL, NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
