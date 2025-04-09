-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Jun-2024 às 00:58
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lrm_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `setor` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `dataVisita` longtext,
  `id_turno` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `nome`, `endereco`, `numero`, `setor`, `cep`, `telefone`, `dataVisita`, `id_turno`, `id_user`, `created`, `modified`) VALUES
(22, 'Fernando de Souza Arantes', 'Rua das Quineiras QD 02 Lt 07', '07', 'Cimbra', '77824820', '63 992218920', 'Quinta ou sexta', 1, NULL, '2023-10-10 13:21:12', '2023-10-30 13:59:32'),
(23, 'Josué Divino', 'Rua Gonçalves Ledo', '546', 'São João', '77050811', '63 992046842', 'Segunda ou dia 15', 2, 17, '2023-10-10 13:23:16', '2023-10-30 14:01:14'),
(24, 'Luana Ribeiro', 'Rua Alfredo Nascer', '610', 'Noroeste', '77841500', '63 992568412', 'Segunda feira', 1, NULL, '2023-10-10 14:20:28', '2023-11-11 18:08:36'),
(25, 'Maria Pereira', 'Rua 9 QD 9 LT 7', '200', 'Araguaína Sul', '77890-309', '(63) 99267-6908', 'Segunda', 1, 12, '2023-11-27 12:15:38', '2023-12-20 09:58:08'),
(26, 'José Silva', 'Rua 1 Qd 01 Lt 01 ', '500', 'Araguaína Sul', '77835-838', '(63) 99211-4587', 'Quarta ou Sexta', 2, NULL, '2023-11-27 12:15:48', '2023-11-27 12:15:48'),
(29, 'José Souza', 'Rua José de Brito', '152', 'São João', '77805-820', '(63) 9 9256-8932', 'Quinta ou Sexta', 2, NULL, '2023-12-20 09:55:55', '2023-12-20 09:55:55'),
(30, 'Maria Silva', 'Rua 22', '284', 'Central', '77821-983', '(63) 99548-5415', 'Segunda', 1, NULL, '2024-02-07 11:41:14', '2024-02-07 11:41:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_farmaceuticas`
--

CREATE TABLE `formas_farmaceuticas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `formas_farmaceuticas`
--

INSERT INTO `formas_farmaceuticas` (`id`, `descricao`) VALUES
(1, 'Comprimidos'),
(2, 'Cápsulas'),
(3, 'Xaropes'),
(4, 'Pílulas de dissolução rápida'),
(5, 'Patches transdérmicos'),
(6, 'Soluções orais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lotes`
--

CREATE TABLE `lotes` (
  `id` int(11) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `dataVencimento` datetime NOT NULL,
  `dataFabricacao` datetime NOT NULL,
  `qdte` int(11) NOT NULL,
  `id_medicamento` int(11) NOT NULL,
  `id_forma_farmaceutica` int(11) NOT NULL,
  `id_tipo_medicamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lotes`
--

INSERT INTO `lotes` (`id`, `numero`, `dataVencimento`, `dataFabricacao`, `qdte`, `id_medicamento`, `id_forma_farmaceutica`, `id_tipo_medicamento`) VALUES
(1, '1212121212', '2024-10-31 00:00:00', '2022-08-01 00:00:00', 20, 3, 1, 1),
(2, '11111111111', '2025-05-26 00:00:00', '2023-05-26 00:00:00', 50, 5, 6, 3),
(3, '6612154665', '2023-10-05 00:00:00', '2022-11-07 00:00:00', 20, 3, 1, 1),
(4, '222222221', '2024-01-20 00:00:00', '2019-08-14 00:00:00', 55, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `principioAtivo` varchar(300) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `descricao`, `principioAtivo`, `created`, `modified`) VALUES
(3, 'Dipirona', 'Dipirona monoidratada', '2023-10-17 00:55:20', '2023-10-17 13:35:08'),
(4, 'Doril', 'Ácido acetilsalicílico', '2023-10-17 13:39:07', '2023-12-19 13:22:06'),
(5, 'Paracetamol', 'Paracetamol', '2023-10-17 13:40:51', '2023-11-04 17:56:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `dataNascimento` datetime NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cartaoSus` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `cpf`, `dataNascimento`, `telefone`, `cartaoSus`) VALUES
(1, 'Livia Feitosa Arantes', '010.313.741-67', '2022-05-17 00:00:00', '(63) 99221-8920', 2147483647),
(2, 'Leticia Feitosa Arantes', '010.313.741-67', '2020-06-11 00:00:00', '(63) 99238-3380', 2147483647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `retiradas`
--

CREATE TABLE `retiradas` (
  `id` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_lotes` int(11) NOT NULL,
  `id_pacientes` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `retiradas`
--

INSERT INTO `retiradas` (`id`, `qtde`, `id_users`, `id_lotes`, `id_pacientes`, `created`, `modified`) VALUES
(8, 2, 12, 2, 1, '2023-11-20 11:45:33', '2023-11-20 11:45:33'),
(9, 5, 12, 4, 2, '2023-12-20 10:00:12', '2023-12-20 10:00:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_medicamentos`
--

CREATE TABLE `tipos_medicamentos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipos_medicamentos`
--

INSERT INTO `tipos_medicamentos` (`id`, `descricao`) VALUES
(1, 'Analgésicos'),
(2, 'Antibióticos'),
(3, 'Antivirais'),
(4, 'Anti-inflamatórios'),
(5, 'Antifúngicos'),
(6, 'Antiparasitários');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turnos`
--

INSERT INTO `turnos` (`id`, `descricao`) VALUES
(1, 'Matutino'),
(2, 'Vespertino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created`, `modified`) VALUES
(12, 'Fernando de Souza Arantes', 'fernando.arantes@ifto.edu.br', '$2y$10$RTScyPiU1ejIuLFTB6Rx8OlMuLeIviHPIly9/a0qNAiol0o/uWBO6', 'Farmacêutico(a)', '2015-12-19 14:47:53', '2015-12-22 23:39:29'),
(17, 'Roberto', 'roberto@ifto.edu.br', '$2y$10$4tzff9p..v5SVcxhbE94ue3yVYPDLmN/va18JJrlq2CGiwZUwADz6', 'Agente de Saúde', '2015-12-22 21:55:10', '2023-11-28 10:17:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turno_id_fk` (`id_turno`),
  ADD KEY `users_if_fk` (`id_user`) USING BTREE;

--
-- Indexes for table `formas_farmaceuticas`
--
ALTER TABLE `formas_farmaceuticas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicamento_id_fk` (`id_medicamento`),
  ADD KEY `tipo_medicamento_id` (`id_tipo_medicamento`),
  ADD KEY `forma_farmaceutica_id` (`id_forma_farmaceutica`) USING BTREE;

--
-- Indexes for table `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retiradas`
--
ALTER TABLE `retiradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_retiradas_users_idx` (`id_users`) USING BTREE,
  ADD KEY `fk_retiradas_lotes_idx` (`id_lotes`) USING BTREE,
  ADD KEY `fk_retiradas_pacientes_idx` (`id_pacientes`) USING BTREE;

--
-- Indexes for table `tipos_medicamentos`
--
ALTER TABLE `tipos_medicamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `formas_farmaceuticas`
--
ALTER TABLE `formas_farmaceuticas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lotes`
--
ALTER TABLE `lotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `retiradas`
--
ALTER TABLE `retiradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tipos_medicamentos`
--
ALTER TABLE `tipos_medicamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `turno_id_fk` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id`);

--
-- Limitadores para a tabela `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `lotes_ibfk_1` FOREIGN KEY (`id_tipo_medicamento`) REFERENCES `tipos_medicamentos` (`id`),
  ADD CONSTRAINT `lotes_ibfk_2` FOREIGN KEY (`id_forma_farmaceutica`) REFERENCES `formas_farmaceuticas` (`id`),
  ADD CONSTRAINT `medicamento_id_fk` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamentos` (`id`);

--
-- Limitadores para a tabela `retiradas`
--
ALTER TABLE `retiradas`
  ADD CONSTRAINT `retiradas_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `retiradas_ibfk_3` FOREIGN KEY (`id_lotes`) REFERENCES `lotes` (`id`),
  ADD CONSTRAINT `retiradas_ibfk_4` FOREIGN KEY (`id_pacientes`) REFERENCES `pacientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
