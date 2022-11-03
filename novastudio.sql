-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Out-2022 às 15:55
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
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `tel` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome`, `email`, `senha`, `cpf`, `tel`) VALUES
(1, 'hebert richard', 'hebert@richard.com', 'funcionario', '123456789', '219685473');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `duracao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nome`, `preco`, `duracao`) VALUES
(1, 'make ', 123, 123),
(2, 'make ', 123, 123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

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
(1, 'naomi ', 'carneiro', 'naomi@gmail.com', '$2y$10$i6KJVXPdXygdKLnxwjdJUuBIlnnhjEIJihB41f5.LoJcLZvopefJW'),
(2, 'MATHEUS PEREIRA DA NOVA holanda', '', 'matheus@matheus.com', '$2y$10$B.Xf564TS9ubspXdA3AF6.V3xMNpgpHSUGOsH0wOCZuMSTIJOWozm'),
(3, 'MATHEUS', 'DA NOVA', 'mpereiranova@gmail.com', '$2y$10$B.Xf564TS9ubspXdA3AF6.V3xMNpgpHSUGOsH0wOCZuMSTIJOWozm'),
(4, 'matheus', 'Pereira', 'matheus@gmail.com', '$2y$10$ZDzCT56WxqT5qFlq8jgrfuvCcDbObedyYprg7aRjNtk/0j5iFD3/W'),
(5, 'vladimir', 'pinho ', 'vladimir@santos.com', '$2y$10$/9fA8Wz2pyenDhC9MLTUeuGZFbFkgO9c0NXbiGV953ig8mDEiF4ua'),
(6, 'matheus', 'Pereira', 'matheus@teste.com', '$2y$10$LeQgk74drpvhTI3rK0OpauNpKvjoAKUjDP5xNzVODFwnIsz8xNh/C'),
(7, 'clecio ', 'santos', 'clecio@teste.com', '$2y$10$NFVyfTjFk7UkB5BTFPUlBOm8/MRzKaFVoLMsoQMb498tEOqEvDhBO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `id_funcionario` (`id_funcionario`);

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
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
