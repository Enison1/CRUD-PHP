-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jan-2023 às 19:11
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `exemplo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(10) NOT NULL,
  `cNome` varchar(100) NOT NULL,
  `cData` date NOT NULL,
  `cEmail` varchar(100) NOT NULL,
  `cFoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `cNome`, `cData`, `cEmail`, `cFoto`) VALUES
(1, 'Teste 1', '2000-01-01', 'enison@g.com', ''),
(2, 'Teste 2', '2000-01-01', 'enison@g.com', ''),
(3, 'Teste 3', '2000-01-01', 'enison@g.com', ''),
(4, 'Teste 4', '2000-01-01', 'enison@g.com', ''),
(5, 'Teste 5', '2000-01-01', 'enison@g.com', ''),
(6, 'Teste 6', '2000-01-01', 'enison@g.com', ''),
(7, 'Teste 7', '2000-01-01', 'enison@g.com', ''),
(8, 'Teste 8', '2000-01-01', 'enison@g.com', ''),
(9, 'Teste 9', '2000-01-01', 'enison@g.com', ''),
(10, 'Teste 10', '2000-01-01', 'enison@g.com', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dependente`
--

CREATE TABLE `dependente` (
  `id` int(10) NOT NULL,
  `dNome` varchar(100) NOT NULL,
  `dData` date NOT NULL,
  `cliente_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `dependente`
--

INSERT INTO `dependente` (`id`, `dNome`, `dData`, `cliente_id`) VALUES
(1, 'Dependente 1', '2000-01-17', 1),
(2, 'Dependente 2', '2000-01-17', 2),
(3, 'Dependente 3', '2000-01-17', 3),
(4, 'Dependente 4', '2000-01-17', 4),
(5, 'Dependente 5', '2000-01-17', 5),
(6, 'Dependente 6', '2000-01-17', 6),
(7, 'Dependente 7', '2000-01-17', 7),
(8, 'Dependente 8', '2000-01-17', 8),
(9, 'Dependente 9', '2000-01-17', 9),
(10, 'Dependente 10', '2000-01-17', 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dependente`
--
ALTER TABLE `dependente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `dependente`
--
ALTER TABLE `dependente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
