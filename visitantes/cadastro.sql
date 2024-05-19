-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Maio-2024 às 01:40
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
-- Banco de dados: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

DROP TABLE IF EXISTS `acesso`;
CREATE TABLE IF NOT EXISTS `acesso` (
  `cod_visitante` int(4) NOT NULL,
  `dia` varchar(40) NOT NULL,
  `hora` time NOT NULL,
  `cod_finalidade` int(4) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acesso`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `finalidade`
--

DROP TABLE IF EXISTS `finalidade`;
CREATE TABLE IF NOT EXISTS `finalidade` (
  `cod_finalidade` int(4) NOT NULL,
  `descricao` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Extraindo dados da tabela `finalidade`
--
INSERT INTO `finalidade` (`cod_finalidade`, `descricao`) VALUES
(1, '1ª Vara Cível'),
(2, '2ª Vara Cível'),
(3, '3ª Vara Cível'),
(4, '4ª Vara Cível'),
(5, '1ª Vara Criminal'),
(6, '2ª Vara Criminal'),
(7, '7ª Turma de Recursos'),
(8, 'Agência Bancária'),
(9, 'Apresentação do Regime Semi Aberto'),
(10, 'Banheiro'),
(11, 'Biblioteca'),
(12, 'Cartório'),
(13, 'Central de Mandados'),
(14, 'Central de Penas e Medidas Alternativas'),
(15, 'Contadoria'),
(16, 'Informática'),
(17, 'Mediação Familiar'),
(18, 'Ministério Público'),
(19, 'Oficialato da Infância e Juventude'),
(20, 'Outros'),
(21, 'Psicólogo'),
(22, 'Restaurante'),
(23, 'Sala dos Oficiais de Justiça'),
(24, 'Secretaria'),
(25, 'Serviço Social'),
(26, 'Vara da Família'),
(27, 'Vara da Fazenda Pública'),
(28, 'Vara da Infância e Juventude'),
(29, 'Vara de Execuções Penais'),
(30, 'Vara Regional de Direito Bancário'),
(31, 'Zona Eleitoral');
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
  `acesso` int(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
--
-- Extraindo dados da tabela `login`
--
INSERT INTO `login` (`Id`, `usuario`, `senha`, `nivel`, `acesso`) VALUES
(1, '', '', 0, 0),
(2, 'admin', 'admin', 1, 0),

-- --------------------------------------------------------
--
-- Estrutura da tabela `nivel`
--
DROP TABLE IF EXISTS `nivel`;
CREATE TABLE IF NOT EXISTS `nivel` (
  `cod_nivel` int(2) NOT NULL,
  `descricao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Extraindo dados da tabela `nivel`
--
INSERT INTO `nivel` (`cod_nivel`, `descricao`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'USUARIO PADRAO'),
(3, 'IMPRESSAO'),
(0, '');

-- --------------------------------------------------------
--
-- Estrutura da tabela `visitante`
--
DROP TABLE IF EXISTS `visitante`;
CREATE TABLE IF NOT EXISTS `visitante` (
  `cod_visitante` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `endereco` varchar(40) NOT NULL,
  `complemento` varchar(40) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `foto` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Extraindo dados da tabela `visitante`
--
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
