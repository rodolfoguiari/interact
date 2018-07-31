-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31-Jul-2018 às 03:54
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
-- Estrutura da tabela `empdetalhe`
--

CREATE TABLE IF NOT EXISTS `empdetalhe` (
  `cd_codidet` int(11) NOT NULL DEFAULT '0',
  `cd_empresa` int(11) NOT NULL DEFAULT '0',
  `ds_txttopo` mediumtext NOT NULL,
  `ds_txtfina` mediumtext NOT NULL,
  `ds_curios1` varchar(300) NOT NULL,
  `ds_curios2` varchar(300) NOT NULL,
  `ds_curios3` varchar(300) NOT NULL,
  `ds_curios4` varchar(300) NOT NULL,
  `nr_curios1` int(11) NOT NULL,
  `nr_curios2` int(11) NOT NULL,
  `nr_curios3` int(11) NOT NULL,
  `nr_curios4` int(11) NOT NULL,
  `ds_imgtopo` varchar(200) NOT NULL,
  `ds_imgfina` varchar(200) NOT NULL,
  PRIMARY KEY (`cd_codidet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
