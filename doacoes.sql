-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Ago-2018 às 03:50
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacoes`
--

CREATE TABLE IF NOT EXISTS `doacoes` (
  `id_doacoes` int(11) NOT NULL AUTO_INCREMENT,
  `cd_empresa` int(11) NOT NULL,
  `cd_entidad` int(11) NOT NULL,
  `ds_pedidos` varchar(900) NOT NULL,
  `qt_quantid` float NOT NULL,
  `ds_statuss` varchar(200) NOT NULL,
  `dt_inclusa` date NOT NULL,
  `hr_inclusa` time NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `dt_alterac` date DEFAULT NULL,
  `hr_alterac` time DEFAULT NULL,
  `cd_usualte` int(11) DEFAULT NULL,
  `cd_logoemp` int(11) NOT NULL,
  PRIMARY KEY (`id_doacoes`),
  UNIQUE KEY `id_doacoes` (`id_doacoes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
