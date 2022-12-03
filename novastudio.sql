-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Dez-2022 às 22:26
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
  `id` int(100) NOT NULL,
  `nome_servico` varchar(100) NOT NULL,
  `horario` time NOT NULL,
  `dataServico` date NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL
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
(6, 'Ana ', 'funcionariaa@novatudio.com', '$2y$10$yQeQbDp/SzD0tf9UD9dJ0.HX.Is33xvgpeFYRuaocwCtTrq1pf7VG', '12345678990', '21987636453', 'makeup social'),
(7, 'Bruna', 'funcionariab@novatudio.com', '$2y$10$9/8/ZfEVoRXArc5f3h.wk.jXHXnJaODSb9Cb.RRdgdciM9UQfyhzi', '12345678990', '21987636453', 'makeup noiva'),
(8, 'Carmem ', 'funcionariac@novatudio.com', '$2y$10$stdNT3eyC0JdrtCO2ID0pOgQ5rF.NJDyxsJc8OK78wr8t4PWyjq7G', '12345678990', '21987636453', 'limpeza de pele'),
(9, 'Daniele', 'funcionariad@novatudio.com', '$2y$10$8beaZ7VpwFkAVdAnQxXXPu/2UcGlACf5FqelWrI/5eNXB33Ni34I2', '10057299722', '21987636453', 'designer com henna'),
(10, 'Eliane ', 'funcionariae@novatudio.com', '$2y$10$6.v4Q9i.AVCtLZz.MQeFA.v4xDeMuU6RkQuSZlVGdorR8RKnAkxIC', '10057299722', '21987636453', 'designer simples'),
(11, 'fabiana', 'funcionariaf@novatudio.com', '$2y$10$Zy8PmmwYZSfxCB//TIoiPuuUykQQZ/lqtkvK1LpjT5w7xiVj4lK8K', '10057299722', '21987636453', 'lash lifting');

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
(1, 'makeup social', 150, 1),
(2, 'makeup noiva', 700, 90),
(3, 'limpeza de pele', 120, 90),
(4, 'designer com henna', 50, 60),
(5, 'designer simples', 30, 20),
(6, 'lash lifting', 150, 90);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `id_funcionario` (`id_funcionario`);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
