-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Maio-2024 às 21:37
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `barranca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artista`
--

DROP TABLE IF EXISTS `artista`;
CREATE TABLE IF NOT EXISTS `artista` (
  `cod_artista` int(2) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `fone_fixo` varchar(20) NOT NULL,
  `fone_movel` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `janta_sexta` int(3) NOT NULL,
  `janta_sabado` int(3) NOT NULL,
  PRIMARY KEY (`cod_artista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `artista`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avalia_musica`
--

DROP TABLE IF EXISTS `avalia_musica`;
CREATE TABLE IF NOT EXISTS `avalia_musica` (
  `Letra_U` decimal(4,0) NOT NULL,
  `Letra_T` decimal(4,0) NOT NULL,
  `Letra_F` decimal(4,0) NOT NULL,
  `Melodia_H` decimal(4,0) NOT NULL,
  `Melodia_C` decimal(4,0) NOT NULL,
  `Melodia_F` decimal(4,0) NOT NULL,
  `Apresenta_A` decimal(4,0) NOT NULL,
  `Apresenta_IU` decimal(4,0) NOT NULL,
  `Apresenta_IPP` decimal(4,0) NOT NULL,
  `Apresenta_O` decimal(4,0) NOT NULL,
  `Apresenta_H` decimal(4,0) NOT NULL,
  `Cod_Musica` int(11) NOT NULL,
  `Cod_Juiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`hora`) VALUES
('20:00:00'),
('20:30:00'),
('20:00:00'),
('20:15:00'),
('20:30:00'),
('20:45:00'),
('21:00:00'),
('21:15:00'),
('21:30:00'),
('21:45:00'),
('22:00:00'),
('22:15:00'),
('22:30:00'),
('22:45:00'),
('23:00:00'),
('23:15:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrumento`
--

DROP TABLE IF EXISTS `instrumento`;
CREATE TABLE IF NOT EXISTS `instrumento` (
  `cod_instrumento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(15) NOT NULL,
  PRIMARY KEY (`cod_instrumento`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `instrumento`
--

INSERT INTO `instrumento` (`cod_instrumento`, `descricao`) VALUES
(0, ''),
(1, 'AG&Ecirc;'),
(2, 'ATABAQUE'),
(3, 'BAIXO'),
(4, 'ATABAQUE'),
(5, 'BAIXO'),
(6, 'BANJO'),
(7, 'BATERIA'),
(8, 'CAXIXE'),
(9, 'CHOCALHO'),
(10, 'COLHERES'),
(11, 'CONTRA-BAIXO'),
(12, 'CU&Iacute;CA'),
(13, 'DUAS CUIAS'),
(14, 'FLAUTA'),
(15, 'FLAUTA DOCE'),
(16, 'GAITA'),
(17, 'GAITA-DE-BOCA'),
(18, 'GUITARRA'),
(19, 'GUIZO'),
(20, 'MACHAC&Aacute;'),
(21, 'MARACA'),
(22, 'MARIMBAU'),
(23, 'PANDEIRO'),
(24, 'PENTE-DE-BOCA'),
(25, 'RABECA'),
(26, 'RECO-RECO'),
(27, 'SERROTE'),
(28, 'TAMBOR'),
(29, 'TECLADO'),
(30, 'VIOLA'),
(31, 'VIOLAO'),
(32, 'VIOLINO'),
(33, 'ARPA'),
(34, 'CAJON');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nivel` int(2) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`Id`, `usuario`, `senha`, `nivel`) VALUES
(1, '', '', 0),
(2, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica`
--

DROP TABLE IF EXISTS `musica`;
CREATE TABLE IF NOT EXISTS `musica` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `letra1` int(2) NOT NULL,
  `letra2` int(2) NOT NULL,
  `musica1` int(2) NOT NULL,
  `musica2` int(2) NOT NULL,
  `cantor1` int(2) NOT NULL,
  `cantor2` int(2) NOT NULL,
  `inst1` varchar(20) NOT NULL,
  `inst2` varchar(20) NOT NULL,
  `inst3` varchar(20) NOT NULL,
  `inst4` varchar(20) NOT NULL,
  `inst5` varchar(20) NOT NULL,
  `toc1` int(2) NOT NULL,
  `toc2` int(2) NOT NULL,
  `toc3` int(2) NOT NULL,
  `toc4` int(2) NOT NULL,
  `toc5` int(2) NOT NULL,
  `ativo` int(11) NOT NULL,
  `voto` int(2) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `musica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica2`
--

DROP TABLE IF EXISTS `musica2`;
CREATE TABLE IF NOT EXISTS `musica2` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `letra1` int(2) NOT NULL,
  `letra2` int(2) NOT NULL,
  `musica1` int(2) NOT NULL,
  `musica2` int(2) NOT NULL,
  `cantor1` int(2) NOT NULL,
  `cantor2` int(2) NOT NULL,
  `inst1` varchar(20) NOT NULL,
  `inst2` varchar(20) NOT NULL,
  `inst3` varchar(20) NOT NULL,
  `inst4` varchar(20) NOT NULL,
  `inst5` varchar(20) NOT NULL,
  `toc1` int(2) NOT NULL,
  `toc2` int(2) NOT NULL,
  `toc3` int(2) NOT NULL,
  `toc4` int(2) NOT NULL,
  `toc5` int(2) NOT NULL,
  `ativo` int(11) NOT NULL,
  `voto` int(2) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `musica2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

DROP TABLE IF EXISTS `nivel`;
CREATE TABLE IF NOT EXISTS `nivel` (
  `cod_nivel` int(2) NOT NULL,
  `descricao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`cod_nivel`, `descricao`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'USUARIO PADRAO'),
(3, 'JURADO'),
(4, 'IMPRESSAO'),
(0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `poesia`
--

DROP TABLE IF EXISTS `poesia`;
CREATE TABLE IF NOT EXISTS `poesia` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `letra` int(2) NOT NULL,
  `declamador` int(2) NOT NULL,
  `amadrinhador` int(2) NOT NULL,
  `ativo` int(1) NOT NULL,
  `voto` int(2) NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `titulo` (`titulo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `poesia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `votaint1`
--

DROP TABLE IF EXISTS `votaint1`;
CREATE TABLE IF NOT EXISTS `votaint1` (
  `cod_artista` int(3) NOT NULL,
  `cod_musica` int(3) NOT NULL,
  `cod_jurado` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `votaint2`
--

DROP TABLE IF EXISTS `votaint2`;
CREATE TABLE IF NOT EXISTS `votaint2` (
  `cod_artista` int(3) NOT NULL,
  `cod_musica` int(3) NOT NULL,
  `cod_jurado` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `votamus`
--

DROP TABLE IF EXISTS `votamus`;
CREATE TABLE IF NOT EXISTS `votamus` (
  `id_login` int(11) NOT NULL,
  `codigo_musica` int(11) NOT NULL,
  `letra_uso` text NOT NULL,
  `letra_trat` text NOT NULL,
  `letra_fid` text NOT NULL,
  `media_letra` text NOT NULL,
  `melodia_harm` text NOT NULL,
  `melodia_arran` text NOT NULL,
  `melodia_fid` text NOT NULL,
  `media_melodia` text NOT NULL,
  `presenta_afina` text NOT NULL,
  `presenta_harm` text NOT NULL,
  `presenta_inst` text NOT NULL,
  `presenta_postura` text NOT NULL,
  `presenta_tempo` text NOT NULL,
  `media_presenta` text NOT NULL,
  `media_final` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `votamus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `votamus2`
--

DROP TABLE IF EXISTS `votamus2`;
CREATE TABLE IF NOT EXISTS `votamus2` (
  `id_login` int(11) NOT NULL,
  `codigo_musica` int(11) NOT NULL,
  `letra_uso` text NOT NULL,
  `letra_trat` text NOT NULL,
  `letra_fid` text NOT NULL,
  `letra_tema` text NOT NULL,
  `media_letra` text NOT NULL,
  `melodia_harm` text NOT NULL,
  `melodia_arran` text NOT NULL,
  `melodia_fid` text NOT NULL,
  `media_melodia` text NOT NULL,
  `presenta_afina` text NOT NULL,
  `presenta_harm` text NOT NULL,
  `presenta_inst` text NOT NULL,
  `presenta_postura` text NOT NULL,
  `presenta_tempo` text NOT NULL,
  `media_presenta` text NOT NULL,
  `media_final` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `votamus2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `votapoe`
--

DROP TABLE IF EXISTS `votapoe`;
CREATE TABLE IF NOT EXISTS `votapoe` (
  `id_login` int(11) NOT NULL,
  `codigo_poesia` int(11) NOT NULL,
  `letra_uso` text NOT NULL,
  `letra_trat` text NOT NULL,
  `letra_fid` text NOT NULL,
  `media_letra` text NOT NULL,
  `declama_rima` text NOT NULL,
  `declama_desen` text NOT NULL,
  `declama_arran` text NOT NULL,
  `media_declama` text NOT NULL,
  `presenta_inter` text NOT NULL,
  `presenta_dic` text NOT NULL,
  `presenta_gest` text NOT NULL,
  `presenta_inst` text NOT NULL,
  `presenta_indu` text NOT NULL,
  `presenta_tempo` text NOT NULL,
  `media_presenta` text NOT NULL,
  `media_final` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `votapoe`
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;