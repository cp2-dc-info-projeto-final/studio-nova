-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Dez-2022 às 17:02
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

CREATE DATABASE IF NOT EXISTS novastudio DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE novastudio;
DROP USER IF EXISTS 'nova'@'localhost';
CREATE USER 'nova'@'localhost' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON novastudio.* TO 'nova'@'localhost';

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novastudio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--
DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `email`, `senha`) VALUES
(1, 'admin@admin.com', '$2y$10$01JccDo.xTZQrfX0rTIcCueK1lvjmZQQVdLaYcNmkpmXAwY8mbCEq');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--
DROP TABLE IF EXISTS `agendamento`;
CREATE TABLE `agendamento` (
  `id` smallint(6) NOT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idservico` int(11) DEFAULT NULL,
  `idfuncionario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--
DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE `funcionario` (
  `id_funcionario` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `servico` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome`, `email`, `senha`, `cpf`, `tel`, `servico`) VALUES
(1, 'hebert richard', 'hebert@richard.com', 'funcionario', '123456789', '219685473', ''),
(2, 'noah ', 'noah@funcionario.com', '$2y$10$QStWtsTw7/MxBrlz..QmxubP2wFI3m5C.pySst2xTJfXg2A35Rpte', '123456789', '21987636453', ''),
(3, 'kelly ', 'kelly@costa.com', '$2y$10$NOk6xhdVIzGhcVXn4wX1auac6aBGpBL4MeyZ0EXZhu1pMlPSm5ksm', '10057299722', '21987636453', ''),
(4, 'MATHEUS', 'mpereiranovaa@gmail.com', '$2y$10$1TqoYtxeG324kYYjl1Byx.e0yntyfx5GKMYmQ.uh4gBNEZHIrYqNW', '10057299722', '21987636453', 'makeup social'),
(5, 'fabiana', 'fabiana@teste.com', '$2y$10$nnX3Cc3Km.YrwMWGh.Dp.ONUdyQWrLwUbT5XoFuF64VfBtBJGpbVK', '12345678990', '123456723', 'makeup social');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--
DROP TABLE IF EXISTS `horarios`;
CREATE TABLE `horarios` (
  `id` int(100) NOT NULL,
  `nome_servico` varchar(100) NOT NULL,
  `horario` time NOT NULL,
  `dataServico` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`id`, `nome_servico`, `horario`, `dataServico`) VALUES
(1, 'makeup social ', '15:00:00', '2022-12-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recupera_senha`
--
DROP TABLE IF EXISTS `recupera_senha`;
CREATE TABLE `recupera_senha` (
  `id` int(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `rash` varchar(200) NOT NULL,
  `status` int(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `recupera_senha`
--

INSERT INTO `recupera_senha` (`id`, `email`, `rash`, `status`) VALUES
(5, 'mpereiranova@gmail.com', '082d37565d86c5f7dc93a3d11f9edfb4', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--
DROP TABLE IF EXISTS `servicos`;
CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` int(11) NOT NULL,
  `duracao` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--
INSERT INTO `servicos` (`id`, `nome`, `preco`, `duracao`) VALUES
(3, 'makeup social', 150, 1),
(4, 'makeup noiva', 700, 90),
(5, 'limpeza de pele', 120, 90),
(6, 'designer com henna', 50, 60),
(7, 'designer simples', 30, 20),
(8, 'lash lifting', 150, 90);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `senha`) VALUES
(1, 'naomi ', 'carneiro', 'naomi@gmail.com', '$2y$10$w2asoK5rBkmdNVI6XIs8tONs6/2TW8ohHCzMu7lsM3JWoh1vHnuA2'),
(2, 'MATHEUS PEREIRA DA NOVA holanda', '', 'matheus@matheus.com', '$2y$10$w2asoK5rBkmdNVI6XIs8tONs6/2TW8ohHCzMu7lsM3JWoh1vHnuA2'),
(3, 'MATHEUS', 'DA NOVA', 'mpereiranova@gmail.com', '$2y$10$w2asoK5rBkmdNVI6XIs8tONs6/2TW8ohHCzMu7lsM3JWoh1vHnuA2'),
(4, 'matheus', 'Pereira', 'matheus@gmail.com', '$2y$10$w2asoK5rBkmdNVI6XIs8tONs6/2TW8ohHCzMu7lsM3JWoh1vHnuA2'),
(5, 'vladimir', 'pinho ', 'vladimir@santos.com', '$2y$10$w2asoK5rBkmdNVI6XIs8tONs6/2TW8ohHCzMu7lsM3JWoh1vHnuA2'),
(6, 'matheus', 'Pereira', 'matheus@teste.com', '$2y$10$w2asoK5rBkmdNVI6XIs8tONs6/2TW8ohHCzMu7lsM3JWoh1vHnuA2'),
(7, 'clecio ', 'santos', 'clecio@teste.com', '$2y$10$w2asoK5rBkmdNVI6XIs8tONs6/2TW8ohHCzMu7lsM3JWoh1vHnuA2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idservico` (`idservico`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `id_funcionario` (`id_funcionario`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recupera_senha`
--
ALTER TABLE `recupera_senha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `recupera_senha`
--
ALTER TABLE `recupera_senha`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
