-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Out-2019 às 20:27
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seae`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `turma` varchar(40) DEFAULT NULL,
  `turno` varchar(40) DEFAULT NULL,
  `classe` varchar(40) DEFAULT NULL,
  `curso` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `turma`, `turno`, `classe`, `curso`) VALUES
(5, 'I11AM', 'ManhÃ£', '11Âº', 'FisÃ­cas e Biologicas'),
(6, 'I11AM', 'Noite', '11Âº', 'FisÃ­cas e Biologicas'),
(7, '11EJM', 'ManhÃ£', '11Âº', 'InformÃ¡tica'),
(8, '11EJT', 'Tarde', '11Âº', 'InformÃ¡tica'),
(39, '11FBT', 'ManhÃ£', '11Âº', 'InformÃ¡tica'),
(40, '11FBN', 'ManhÃ£', '11Âº', 'Economicas e JÃºridicas'),
(41, 'I11AM', 'ManhÃ£', '11Âº', 'FisÃ­cas e Biologicas'),
(42, 'I11AM', 'ManhÃ£', '11Âº', 'InformÃ¡tica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_curso`
--

CREATE TABLE `aluno_curso` (
  `idaluno` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bi`
--

CREATE TABLE `bi` (
  `id` int(11) NOT NULL,
  `pai` varchar(40) DEFAULT NULL,
  `mae` varchar(40) DEFAULT NULL,
  `residencia` varchar(40) DEFAULT NULL,
  `naturalidade` varchar(40) DEFAULT NULL,
  `provincia` varchar(40) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `estadocivil` varchar(7) DEFAULT NULL,
  `emisao` date DEFAULT NULL,
  `validade` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bi`
--

INSERT INTO `bi` (`id`, `pai`, `mae`, `residencia`, `naturalidade`, `provincia`, `datanascimento`, `estadocivil`, `emisao`, `validade`) VALUES
(5, 'Justo', 'Celeste CapitÃ£o', 'Cacuaco', 'Dande', 'Bengo', '1991-05-15', 'Solteir', '2020-05-05', '2000-02-02'),
(6, 'Gaspar Cavunga', 'ConceiÃ§Ã£o Hungo', 'Cacuaco', 'Dande', 'Bengo', '1991-05-15', 'casado', '2020-05-05', '2000-02-02'),
(7, 'Fernando Domingos Panzo', 'ConceiÃ§Ã£o Mateus', 'Luanda', 'Cacuaco', 'Luanda', '1991-05-15', 'Solteir', '2020-05-05', '2000-02-02'),
(8, 'Adolfo', 'MMM', 'Cacuaco', 'Cacuaco', 'Luanda', '1991-05-15', 'Solteir', '2020-05-05', '2000-02-02'),
(39, 'Gaspar Cavunga', 'ConceiÃ§Ã£o Hungo', 'Cacuaco', 'Cacuaco', 'Luanda', '1991-05-15', 'Solteir', '2020-05-05', '2000-02-02'),
(40, 'CapitÃ£o Domingos', 'Madalena Gaspar', 'Cacuaco', 'Dande', 'Bengo', '1991-05-15', 'Solteir', '2020-05-05', '2000-02-02'),
(41, 'Gaspar Cavunga', 'ConceiÃ§Ã£o Hungo', 'Cacuaco', 'Cacuaco', 'Luanda', '1991-05-15', 'Solteir', '2020-05-05', '2000-02-02'),
(42, 'Domingos Panzo', 'ConceiÃ§Ã£o Menehinda', 'Paraiso', 'Nambuangongo', 'Bengo', '1956-05-05', 'Solteir', '2020-05-05', '2000-02-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `anolectivo` varchar(40) DEFAULT NULL,
  `nomecurso` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `curso` varchar(40) NOT NULL,
  `classe` varchar(40) NOT NULL,
  `disciplina` varchar(40) NOT NULL,
  `professor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `curso`, `classe`, `disciplina`, `professor`) VALUES
(8, 'InformÃ¡tica', '11Âº', 'Lingua Portuguesa', 'Mauricio da Silva'),
(9, 'InformÃ¡tica', '11Âº', 'FAI', 'Nsimba Milton'),
(10, 'InformÃ¡tica', '11Âº', 'Fisica', 'Amaral PaixÃ£o Eduardo'),
(11, 'InformÃ¡tica', '11Âº', 'InglÃªs', 'AntÃ³nio Elias Kissanga'),
(12, 'InformÃ¡tica', '11Âº', 'SEAC', 'JosÃ© Lengo AntÃ³nio'),
(13, 'InformÃ¡tica', '11Âº', 'TIC', 'SimÃ£o Kissaluquila'),
(14, 'InformÃ¡tica', '11Âº', 'TLP', 'Jonas Apolo'),
(15, 'InformÃ¡tica', '11Âº', 'MatemÃ¡tica', 'Manuel FlÃ¡vio Cassoma'),
(16, 'InformÃ¡tica', '11Âº', 'EducaÃ§Ã£o FisÃ­ca', 'Adilson SatomÃ¡s'),
(17, 'InformÃ¡tica', '11Âº', 'Electronica', 'SebastiÃ£o Miguel'),
(18, 'Economicas e JÃºridicas', '11Âº', 'InglÃªs', 'Gustavo Pereira'),
(19, 'Economicas e JÃºridicas', '11Âº', 'LÃ­ngua Portuguresa', 'Manuel Domingos'),
(20, 'Economicas e JÃºridicas', '11Âº', 'Filosofia', 'Bravo Da GlÃ³ria'),
(21, 'Economicas e JÃºridicas', '11Âº', 'Psicologia', 'JoÃ£o Utefoi'),
(22, 'Economicas e JÃºridicas', '11Âº', 'MatemÃ¡tica', 'Carlos Manuel'),
(23, 'Economicas e JÃºridicas', '11Âº', 'EducaÃ§Ã£o FisÃ­ca', 'Josemilton Evaristo'),
(24, 'Economicas e JÃºridicas', '11Âº', 'HistÃ³ria', 'Alberto AmÃ©rico'),
(25, 'Economicas e JÃºridicas', '11Âº', 'GeogrÃ¡fia', 'AmÃ©ricana AmÃ©rico'),
(26, 'Economicas e JÃºridicas', '11Âº', 'Direito', 'Carlos Belmar'),
(27, 'Economicas e JÃºridicas', '11Âº', 'Economia', 'Diogo JoÃ£o'),
(28, 'FisÃ­cas e Biologicas', '11Âº', 'LÃ­ngua Portuguresa', 'Gustavo Da Gloria'),
(29, 'FisÃ­cas e Biologicas', '11Âº', 'Fisica', 'Augusto Neto'),
(30, 'FisÃ­cas e Biologicas', '11Âº', 'QuÃ­mica', 'Maria Ester'),
(31, 'FisÃ­cas e Biologicas', '11Âº', 'MatemÃ¡tica', 'Olga Campos'),
(32, 'FisÃ­cas e Biologicas', '11Âº', 'InformÃ¡tica', 'Maura Campos'),
(33, 'FisÃ­cas e Biologicas', '11Âº', 'Psicologia', 'Evaristo Catito'),
(34, 'FisÃ­cas e Biologicas', '11Âº', 'EducaÃ§Ã£o FisÃ­ca', 'Tombe Katenda'),
(35, 'FisÃ­cas e Biologicas', '11Âº', 'InglÃªs', 'Evaristo Dos Santos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pauta`
--

CREATE TABLE `pauta` (
  `curso` varchar(40) NOT NULL,
  `disciplina` varchar(40) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `MAC1` float DEFAULT NULL,
  `CPP1` float DEFAULT NULL,
  `MAC2` float DEFAULT NULL,
  `CPP2` float DEFAULT NULL,
  `MAC3` float DEFAULT NULL,
  `CPP3` float DEFAULT NULL,
  `CE` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pauta`
--

INSERT INTO `pauta` (`curso`, `disciplina`, `id_aluno`, `MAC1`, `CPP1`, `MAC2`, `CPP2`, `MAC3`, `CPP3`, `CE`) VALUES
('InformÃ¡tica', 'Lingua Portuguesa', 8, 10, 11, 12, 14, 15, 10, 14),
('InformÃ¡tica', 'TIC', 39, 7, 8, 15, 18, 11, 13, 13),
('Economicas e JÃºridicas', 'LÃ­ngua Portuguresa', 40, 6, 14, 15, 19, 15, 1, 16),
('InformÃ¡tica', 'FAI', 7, 10, 1, 12, 7, 15, 13, 10),
('FisÃ­cas e Biologicas', 'MatemÃ¡tica', 6, 13, 10, 11, 11, 10, 11, 12),
('FisÃ­cas e Biologicas', 'MatemÃ¡tica', 41, 15, 4, 18, 14, 16, 12, 16),
('InformÃ¡tica', 'MatemÃ¡tica', 7, 10, 10, 9, 10, 10, 10, 10),
('InformÃ¡tica', 'TLP', 8, 10, 1, 3, 12, 11, 11, 15),
('InformÃ¡tica', 'FAI', 39, 3, 12, 11, 7, 12, 7, 12),
('InformÃ¡tica', 'FAI', 8, 1, 19, 12, 14, 10, 15, 16),
('InformÃ¡tica', 'TIC', 8, 11, 13, 10, 15, 14, 10, 14),
('InformÃ¡tica', 'MatemÃ¡tica', 39, 10, 10, 9, 10, 9, 10, 9),
('FisÃ­cas e Biologicas', 'MatemÃ¡tica', 6, 9, 10, 9, 10, 9, 10, 11),
('Economicas e JÃºridicas', 'MatemÃ¡tica', 40, 9, 10, 9, 10, 9, 10, 11),
('InformÃ¡tica', 'MatemÃ¡tica', 42, 19, 18, 17, 16, 15, 19, 20),
('InformÃ¡tica', 'MatemÃ¡tica', 42, 12, 16, 19, 14, 17, 19, 20),
('InformÃ¡tica', 'TLP', 39, 10, 10, 10, 10, 9, 9, 9),
('InformÃ¡tica', 'MatemÃ¡tica', 7, 10, 10, 10, 1, 2, 20, 11),
('FisÃ­cas e Biologicas', 'MatemÃ¡tica', 5, 1, 2, 15, 10, 12, 16, 10),
('InformÃ¡tica', 'TLP', 7, 1, 9, 15, 13, 12, 14, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `genero` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `genero`) VALUES
(5, 'AlÃ­ce Domingos', 'F'),
(6, 'Ana Escovalo', 'F'),
(7, 'Marta Mateus Panzo', 'F'),
(8, 'Taison Adolfo', 'M'),
(19, 'JosÃ© Lengo AntÃ³nio', 'M'),
(21, 'Nsimba Milton', 'M'),
(22, 'Amaral PaixÃ£o Eduardo', 'M'),
(23, 'AntÃ³nio Elias Kissanga', 'M'),
(24, 'SimÃ£o Kissaluquila', 'M'),
(25, 'Jonas Apolo', 'M'),
(26, 'Manuel FlÃ¡vio Cassoma', 'M'),
(27, 'Adilson SatomÃ¡s', 'M'),
(28, 'SebastiÃ£o Miguel', 'M'),
(29, 'Gustavo Pereira', 'M'),
(30, 'Manuel Domingos', 'M'),
(31, 'Bravo Da GlÃ³ria', 'M'),
(32, 'JoÃ£o Utefoi', 'M'),
(33, 'Carlos Manuel', 'M'),
(34, 'Josemilton Evaristo', 'M'),
(35, 'Alberto AmÃ©rico', 'M'),
(36, 'AmÃ©ricana AmÃ©rico', 'M'),
(37, 'Carlos Belmar', 'M'),
(38, 'Diogo JoÃ£o', 'M'),
(39, 'Osvaldo Caetano', 'M'),
(40, 'Celestina Cavunga', 'F'),
(41, 'Eduardo PaixÃ£o', 'M'),
(42, 'Fernando Domingos Panzo', 'M'),
(43, 'Admin', 'M');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `curso` varchar(40) NOT NULL,
  `disciplina` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `id_utilizador`, `telefone`, `curso`, `disciplina`) VALUES
(19, 11, '916589555', 'InformÃ¡tica', 'SEAC'),
(21, 13, '000000000', 'InformÃ¡tica', 'FAI'),
(22, 14, '000000000', 'InformÃ¡tica', 'FisÃ­ca'),
(23, 15, '999999999', 'InformÃ¡tica', 'InglÃªs'),
(24, 16, '999999999', 'InformÃ¡tica', 'TIC'),
(25, 17, '999999999', 'InformÃ¡tica', 'TLP'),
(26, 18, '999999999', 'InformÃ¡tica', 'MatemÃ¡tica'),
(27, 19, '999999999', 'InformÃ¡tica', 'EducaÃ§Ã£o FisÃ­ca'),
(29, 21, '999999999', 'Economicas e JÃºridicas', 'InglÃªs'),
(30, 22, '999999999', 'Economicas e JÃºridicas', 'LÃ­ngua Portuguesa'),
(31, 23, '999999999', 'Economicas e JÃºridicas', 'Filosofia'),
(32, 24, '999999999', 'Economicas e JÃºridicas', 'Psicologia'),
(33, 25, '999999999', 'Economicas e JÃºridicas', 'MatemÃ¡tica'),
(34, 26, '999999999', 'Economicas e JÃºridicas', 'EducaÃ§Ã£o FisÃ­ca'),
(35, 27, '999999999', 'Economicas e JÃºridicas', 'HistÃ³ria'),
(37, 29, '999999999', 'Economicas e JÃºridicas', 'Direito'),
(38, 30, '999999999', 'Economicas e JÃºridicas', 'Economia'),
(43, 31, '913600307', 'InformÃ¡tica', 'Admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `nivel` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id`, `email`, `senha`, `nivel`) VALUES
(9, 'tchitanda@hotmail.com', '$2y$10$3tOPiEgNkwXpe4NNxvWBOuDVtTeR.Td8zxdrKJxOL0.FvkTSnYItO', 'professor'),
(10, 'carlos18programing@gmail.com', '$2y$10$GnR5ypdxo546t4mbiNJEE.Owv8oLnSk4hcqrxaGG0L//j2vsmxFre', 'professor'),
(11, 'jose@hotmail.com', '$2y$10$BvjmPoFoohlSplVxo58pF.12uYy24edHQXZHBbi5FOV/LkJhF3nMW', 'professor'),
(12, 'mauricio@hotmail.com', '$2y$10$jObfh9pKxYgXPU5S0qBl8uPqUtvuykjpE/wbIIWQtSLfcJRnAC70S', 'professor'),
(13, 'nsimba@hotmail.com', '$2y$10$ZP4XSopGnF88nWoYg.ytdO97Qi6WA1MBJsUggG97/9/RYhScFyy0S', 'professor'),
(14, 'amaral@hotmail.com', '$2y$10$elaDwN1EqdIR3QZoByiLKeYME17bdweGFLwVVWvTj4Y3iBJGRppBa', 'professor'),
(15, 'antonio@hotmail.com', '$2y$10$hXR.zfQOcP5V/x9pZsdqR.EVN6IPd2kEK7M6f6O3Ns0oKYHA3rKzi', 'professor'),
(16, 'simao@hotmail.com', '$2y$10$CyvM.dSB5hBYQmDfHsn8veSC6CGkIDpsHGon/uiYSBZd7d8e7yzT2', 'professor'),
(17, 'jonas@hotmail.com', '$2y$10$VQGY6scS1gJzGWr8VGiLqucZrS0EkXnwazKpPgDJUUO/hnTAmHBRO', 'professor'),
(18, 'cassoma@hotmail.com', '$2y$10$JOZuQ9sA28rYWZd0cTPT4O2IHjvA9W4H/Ddhd/nsPcDQbISqyDE4q', 'professor'),
(19, 'adilson@hotmail.com', '$2y$10$TFzruCWstX8mHQvDhAltW.Bc6QlV.g/M8jAmhkl.yXJkyxxobArbC', 'professor'),
(20, 'sebastiao@hotmail.com', '$2y$10$dLQs.qe021.VkoDd1jwpTeeOyW8B//MWzExoz2SJUn5w0xdKo7NeC', 'professor'),
(21, 'gustavo@hotmail.com', '$2y$10$r8y2y2KyayyGuAv78O8il.B86s2oBxG0Rmh09ZxVH2ycbfvNtC/Nm', 'professor'),
(22, 'manuelD@hotmail.com', '$2y$10$kifuWwgKjDLrgVcGQWxfiuSAdj52yGjXtiYen7mewrn3U3lsrTXwG', 'professor'),
(23, 'bravo@hotmail.com', '$2y$10$xT1eiolMl5zH8rMl9VgoDuN44zAFmIjdrahnkJUWjg7SV8o1JL42u', 'professor'),
(24, 'utefoi@hotmail.com', '$2y$10$ixrecqV/ldS/TriJl5/ha.6VZm0.L9./zN8iC6FgvrftFxIin1lM6', 'professor'),
(25, 'ccarlos@hotmail.com', '$2y$10$Coa9e5fn51ijui5YT/VfTOeG1Qrsp/TYSZIduuA8pVHAd.eiTtoci', 'professor'),
(26, 'josemilton@hotmail.com', '$2y$10$IdwBs6GMr2SShjJjfaehK.W6b4kYVpo/uMqeCMe1Ho.1SUZn4UWje', 'professor'),
(27, 'americo@hotmail.com', '$2y$10$VgiORU.Rp1aHjk99PWV/M.yD5S38aWlfN/H7Z8pdVT1fP7/lftM3a', 'professor'),
(28, 'americana@hotmail.com', '$2y$10$wfT1CwlOo6.w7YGMUYx7MeGV0pKdP/Mw2I7V6uoj6QzVW.IYN5Gsi', 'professor'),
(29, 'belmar@hotmail.com', '$2y$10$PpdKHCLR1kgTKbyZeI7hCe7HSx0RMR3UW6h8TQ/ZBCsAP9X7GIrA.', 'professor'),
(30, 'diogo@hotmail.com', '$2y$10$Xo2hiTFGRrofwEtOCxN60.J6lOoZG0bc12YMNd9Ry2O0fXc9HiFpq', 'professor'),
(31, 'admin@hotmail.com', '$2y$10$45P/R0e.PFMLrsLEUjn8.uMV4vLJMcx7LbqIQDvMwPGRiofyTLhmK', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor` FOREIGN KEY (`id`) REFERENCES `pessoa` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
