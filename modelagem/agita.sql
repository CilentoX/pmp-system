-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Jun-2025 às 20:46
-- Versão do servidor: 5.7.40
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agita`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rg` varchar(80) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `responsavel_legal` varchar(255) DEFAULT NULL,
  `grau_parentesco` int(11) DEFAULT NULL,
  `grau_parentesco_outro` varchar(255) DEFAULT NULL,
  `cep` varchar(20) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `como_soube` varchar(255) NOT NULL,
  `como_soube_outro` varchar(255) DEFAULT NULL,
  `codigo_acesso` varchar(255) DEFAULT NULL,
  `arquivo_cpf` varchar(255) DEFAULT NULL,
  `arquivo_rg` varchar(255) DEFAULT NULL,
  `observacoes` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_saudes`
--

DROP TABLE IF EXISTS `alunos_saudes`;
CREATE TABLE IF NOT EXISTS `alunos_saudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alunos_id` int(11) NOT NULL,
  `plano_saude` tinyint(1) NOT NULL,
  `plano_saude_qual` varchar(255) DEFAULT NULL,
  `tipo_sanguineo` varchar(3) NOT NULL,
  `remedio_regular` tinyint(1) NOT NULL,
  `remedio_regular_qual` text,
  `deficiencia` tinyint(1) NOT NULL,
  `deficiencia_qual` varchar(255) DEFAULT NULL,
  `doenca_respiratoria` tinyint(1) NOT NULL,
  `doenca_respiratoria_qual` varchar(255) DEFAULT NULL,
  `doenca_historico` tinyint(1) NOT NULL,
  `doenca_historico_qual` varchar(255) DEFAULT NULL,
  `cirurgia` tinyint(1) NOT NULL,
  `cirurgia_qual` varchar(255) DEFAULT NULL,
  `alergia` tinyint(1) NOT NULL,
  `alergia_qual` varchar(255) DEFAULT NULL,
  `atividade_fisica` tinyint(1) NOT NULL,
  `atividade_fisica_qual` varchar(255) DEFAULT NULL,
  `atividade_fisica_restricao` tinyint(1) NOT NULL,
  `atividade_fisica_restricao_qual` varchar(255) DEFAULT NULL,
  `arquivo_atestado` varchar(255) DEFAULT NULL,
  `validade_atestado` date DEFAULT NULL,
  `fuma` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alunos_alunos_saude_fk` (`alunos_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos_saudes`
--

INSERT INTO `alunos_saudes` (`id`, `alunos_id`, `plano_saude`, `plano_saude_qual`, `tipo_sanguineo`, `remedio_regular`, `remedio_regular_qual`, `deficiencia`, `deficiencia_qual`, `doenca_respiratoria`, `doenca_respiratoria_qual`, `doenca_historico`, `doenca_historico_qual`, `cirurgia`, `cirurgia_qual`, `alergia`, `alergia_qual`, `atividade_fisica`, `atividade_fisica_qual`, `atividade_fisica_restricao`, `atividade_fisica_restricao_qual`, `arquivo_atestado`, `validade_atestado`, `fuma`, `created`, `modified`) VALUES
(1, 3, 1, 'Iusto in dolor inventore nulla consequuntur at nihil ut reprehenderit eum consequat Nisi nisi saepe at dolor alias pariatur', 'AB-', 0, '', 0, '', 0, '', 0, '', 0, '', 1, 'Sunt cupidatat in est Nam officia ut labore possimus eum aut', 1, 'Quis enim in temporibus id iure irure delectus consectetur earum ullam ad in fuga Iusto cumque ut quibusdam dolore ex', 1, 'Dignissimos enim voluptatem assumenda dolorem aut harum magna exercitationem non consequatur quisquam sit sint ad non ipsum enim sint', 'alunos_saude.arquivo_atestado._1777000865.pdf', '2017-04-15', 1, '2025-01-29 12:11:06', '2025-01-29 12:11:06'),
(2, 4, 1, 'Iusto in dolor inventore nulla consequuntur at nihil ut reprehenderit eum consequat Nisi nisi saepe at dolor alias pariatur', 'AB-', 0, '', 0, '', 0, '', 0, '', 0, '', 1, 'Sunt cupidatat in est Nam officia ut labore possimus eum aut', 1, 'Quis enim in temporibus id iure irure delectus consectetur earum ullam ad in fuga Iusto cumque ut quibusdam dolore ex', 1, 'Dignissimos enim voluptatem assumenda dolorem aut harum magna exercitationem non consequatur quisquam sit sint ad non ipsum enim sint', 'alunos_saude.arquivo_atestado._566361334.pdf', '2017-04-15', 1, '2025-01-29 12:13:49', '2025-02-03 12:21:47'),
(3, 5, 1, 'Non tenetur in voluptate saepe eiusmod quo suscipit dolorem omnis recusandae Ut placeat eaque exercitationem', 'B-', 0, '', 1, 'Sed est enim ut quisquam in fugit aut magnam tempore maxime et voluptatibus sunt voluptas est laboriosam amet laboriosam ut', 1, 'Doloribus maxime minim rerum sint voluptatem quia', 0, '', 0, '', 0, '', 0, '', 1, 'Qui duis dolorem veniam commodi numquam', 'alunos_saude.arquivo_atestado._1394881279.pdf', '1970-11-26', 1, '2025-01-29 12:16:37', '2025-01-29 12:16:37'),
(4, 6, 1, 'Porro voluptatibus vel esse voluptas perspiciatis reiciendis perferendis enim voluptatum esse eos ut officia error laudantium non iusto', 'B-', 1, 'Quo optio error ass', 1, 'At quos commodo sunt ea vero provident dolores Nam ipsa minus obcaecati nesciunt aut adipisci', 0, '', 1, 'Eum distinctio Repellendus Qui eos', 1, 'Irure neque consequatur dignissimos deserunt voluptatem odio amet sunt neque', 1, 'Commodo non officia amet est modi rem mollit ut consequatur laboriosam', 0, '', 0, '', 'alunos_saude.arquivo_atestado._1608435414.pdf', '2017-09-27', 0, '2025-01-29 12:21:30', '2025-01-29 12:21:30'),
(5, 7, 1, 'Nesciunt sunt vitae ut eveniet voluptas ipsa libero est magna dolorum qui', 'AB-', 1, 'Dolores fugit omnis', 1, 'Non error mollit commodo illo et at sed rerum accusamus laborum Aut', 0, '', 1, 'In obcaecati impedit exercitationem aperiam amet dolor praesentium esse doloremque soluta non nesciunt ad laborum eum', 0, '', 1, 'Aut reprehenderit saepe voluptatem cillum distinctio Dolore et et est non', 1, 'Nihil est non necessitatibus cillum dolore quibusdam impedit nisi sit id odit earum ullam duis voluptatem qui saepe et', 1, 'Consectetur porro laborum Id similique doloremque dolore', 'alunos_saude.arquivo_atestado._849033518.pdf', '2004-12-06', 0, '2025-01-29 12:57:13', '2025-01-29 12:57:13'),
(6, 8, 0, '', 'AB+', 1, 'Quo ullamco aspernat', 1, 'Sequi fugiat accusamus est deserunt doloremque in iste voluptatum quas', 1, 'Voluptates velit soluta voluptatem et laborum Deserunt laudantium dolorem possimus quis dignissimos', 1, 'Porro dolore cupiditate earum architecto velit nulla alias provident aut sed occaecat', 1, 'Incididunt blanditiis cumque qui inventore accusamus in modi qui suscipit ipsam non tempora velit', 0, '', 0, '', 1, 'Quia non anim quis veritatis officia quas praesentium harum optio sunt magnam voluptatibus et nisi aut', 'alunos_saude.arquivo_atestado._1578105252.pdf', '2018-12-15', 0, '2025-01-29 16:59:39', '2025-01-29 16:59:39'),
(7, 9, 0, '', 'AB-', 1, 'Earum fuga Dolores ', 1, 'Facere elit quaerat voluptas suscipit molestiae', 0, '', 1, 'Fugit sit sapiente dolor dicta tempore adipisicing est ipsum excepteur dolorem aut ipsum quae libero mollit aute', 0, '', 0, '', 0, '', 0, '', 'alunos_saude.arquivo_atestado._330233683.png', NULL, 1, '2025-02-03 16:35:45', '2025-02-03 16:35:45'),
(8, 10, 0, '', 'A+', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', NULL, NULL, 0, '2025-03-19 12:06:34', '2025-03-19 12:06:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modalidades_id` int(11) NOT NULL,
  `nucleos_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `idade_minima` int(11) NOT NULL,
  `vagas` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `modalidades_cursos_fk` (`modalidades_id`),
  KEY `nucleos_cursos_fk` (`nucleos_id`),
  KEY `usuarios_cursos_fk` (`usuarios_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `modalidades_id`, `nucleos_id`, `usuarios_id`, `idade_minima`, `vagas`, `created`, `modified`) VALUES
(3, 1, 1, 4, 60, 40, '2025-01-31 16:07:59', '2025-01-31 16:07:59'),
(4, 2, 1, 6, 14, 40, '2025-01-31 16:09:27', '2025-01-31 16:09:27'),
(5, 2, 1, 7, 14, 40, '2025-01-31 16:10:04', '2025-01-31 16:10:04'),
(6, 3, 1, 6, 18, 40, '2025-01-31 16:10:41', '2025-01-31 16:10:41'),
(7, 4, 1, 13, 15, 50, '2025-01-31 16:11:20', '2025-01-31 16:11:20'),
(8, 5, 1, 9, 14, 60, '2025-01-31 16:12:06', '2025-01-31 16:12:06'),
(9, 6, 1, 9, 14, 50, '2025-01-31 16:13:37', '2025-01-31 16:13:37'),
(10, 7, 1, 10, 7, 20, '2025-01-31 16:14:18', '2025-01-31 16:14:18'),
(11, 8, 1, 6, 14, 50, '2025-01-31 16:15:07', '2025-01-31 16:15:07'),
(12, 8, 1, 6, 14, 50, '2025-01-31 16:15:07', '2025-01-31 16:24:08'),
(13, 9, 1, 4, 7, 10, '2025-01-31 16:25:21', '2025-01-31 16:25:21'),
(14, 9, 1, 4, 7, 10, '2025-01-31 16:25:21', '2025-01-31 16:26:17'),
(15, 9, 1, 11, 7, 10, '2025-01-31 16:27:00', '2025-01-31 16:27:00'),
(16, 9, 1, 11, 7, 10, '2025-01-31 16:27:00', '2025-01-31 16:28:04'),
(17, 10, 1, 12, 7, 20, '2025-01-31 16:28:47', '2025-01-31 16:28:47'),
(18, 10, 1, 12, 7, 20, '2025-01-31 16:28:47', '2025-01-31 16:29:14'),
(19, 11, 1, 7, 14, 40, '2025-01-31 16:30:11', '2025-01-31 16:30:11'),
(20, 12, 1, 10, 14, 20, '2025-01-31 16:30:48', '2025-01-31 16:30:48'),
(21, 5, 1, 9, 14, 60, '2025-01-31 16:31:31', '2025-01-31 16:31:31'),
(22, 2, 2, 10, 14, 40, '2025-01-31 16:37:48', '2025-01-31 16:37:48'),
(23, 9, 2, 4, 7, 10, '2025-01-31 16:38:20', '2025-01-31 16:38:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos_alunos`
--

DROP TABLE IF EXISTS `cursos_alunos`;
CREATE TABLE IF NOT EXISTS `cursos_alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT '2',
  `cursos_id` int(11) NOT NULL,
  `alunos_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alunos_cursos_alunos_fk` (`alunos_id`),
  KEY `cursos_cursos_alunos_fk` (`cursos_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dias_horarios`
--

DROP TABLE IF EXISTS `dias_horarios`;
CREATE TABLE IF NOT EXISTS `dias_horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cursos_id` int(11) NOT NULL,
  `dia_semana` varchar(10) NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fim` time NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_dias_horarios_fk` (`cursos_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dias_horarios`
--

INSERT INTO `dias_horarios` (`id`, `cursos_id`, `dia_semana`, `horario_inicio`, `horario_fim`, `created`, `modified`) VALUES
(1, 1, '1', '14:00:00', '16:00:00', '2025-01-29 11:56:52', '2025-01-29 11:56:52'),
(2, 1, '3', '14:00:00', '16:00:00', '2025-01-29 11:56:52', '2025-01-29 11:56:52'),
(3, 2, '5', '18:00:00', '20:00:00', '2025-01-29 12:18:01', '2025-01-29 12:18:01'),
(4, 3, '3', '16:00:00', '17:00:00', '2025-01-31 16:07:59', '2025-01-31 16:07:59'),
(5, 4, '1', '08:00:00', '09:00:00', '2025-01-31 16:09:27', '2025-01-31 16:09:27'),
(6, 5, '3', '09:30:00', '10:30:00', '2025-01-31 16:10:04', '2025-01-31 16:10:04'),
(7, 6, '1', '09:00:00', '10:00:00', '2025-01-31 16:10:41', '2025-01-31 16:10:41'),
(8, 7, '1', '18:00:00', '19:00:00', '2025-01-31 16:11:20', '2025-01-31 16:11:20'),
(9, 8, '2', '18:00:00', '19:00:00', '2025-01-31 16:12:06', '2025-01-31 16:12:06'),
(10, 8, '4', '18:00:00', '19:00:00', '2025-01-31 16:12:06', '2025-01-31 16:12:06'),
(11, 9, '3', '08:30:00', '09:30:00', '2025-01-31 16:13:37', '2025-01-31 16:13:37'),
(12, 10, '1', '14:00:00', '15:00:00', '2025-01-31 16:14:18', '2025-01-31 16:14:18'),
(13, 11, '2', '08:00:00', '08:50:00', '2025-01-31 16:15:07', '2025-01-31 16:15:07'),
(14, 11, '5', '08:00:00', '08:50:00', '2025-01-31 16:15:07', '2025-01-31 16:15:07'),
(20, 13, '2', '16:00:00', '16:50:00', '2025-01-31 16:25:21', '2025-01-31 16:25:21'),
(19, 12, '2', '08:50:00', '09:40:00', '2025-01-31 16:24:08', '2025-01-31 16:24:08'),
(18, 12, '5', '08:50:00', '09:40:00', '2025-01-31 16:24:08', '2025-01-31 16:24:08'),
(22, 14, '2', '16:50:00', '17:40:00', '2025-01-31 16:26:17', '2025-01-31 16:26:17'),
(23, 15, '4', '09:00:00', '10:00:00', '2025-01-31 16:27:00', '2025-01-31 16:27:00'),
(24, 16, '4', '10:00:00', '11:00:00', '2025-01-31 16:28:04', '2025-01-31 16:28:04'),
(25, 17, '3', '17:30:00', '18:30:00', '2025-01-31 16:28:47', '2025-01-31 16:28:47'),
(26, 18, '3', '20:00:00', '21:00:00', '2025-01-31 16:29:14', '2025-01-31 16:29:14'),
(27, 19, '2', '09:30:00', '10:30:00', '2025-01-31 16:30:11', '2025-01-31 16:30:11'),
(28, 20, '4', '16:00:00', '17:00:00', '2025-01-31 16:30:48', '2025-01-31 16:30:48'),
(29, 21, '2', '19:00:00', '20:00:00', '2025-01-31 16:31:31', '2025-01-31 16:31:31'),
(30, 21, '4', '19:00:00', '20:00:00', '2025-01-31 16:31:31', '2025-01-31 16:31:31'),
(31, 22, '1', '09:00:00', '10:30:00', '2025-01-31 16:37:48', '2025-01-31 16:37:48'),
(32, 23, '1', '17:00:00', '18:00:00', '2025-01-31 16:38:20', '2025-01-31 16:38:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `nome`) VALUES
(1, 'Administrador'),
(2, 'Professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidades`
--

DROP TABLE IF EXISTS `modalidades`;
CREATE TABLE IF NOT EXISTS `modalidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modalidades`
--

INSERT INTO `modalidades` (`id`, `nome`, `descricao`, `created`, `modified`) VALUES
(1, '60+', ' Atividades físicas adaptadas para a terceira idade, promovendo mobilidade, equilíbrio e bem-estar.', '2025-01-22 15:51:19', '2025-01-31 15:27:14'),
(2, 'Alongamento', 'Exercícios para melhorar a flexibilidade, aliviar tensões musculares e prevenir lesões.', '2025-01-22 15:58:29', '2025-01-31 15:27:34'),
(3, 'Core', 'Treinamento focado no fortalecimento do abdômen, lombar e região pélvica para melhorar a estabilidade corporal.', '2025-01-31 15:27:58', '2025-01-31 15:27:58'),
(4, 'Dança', 'Aulas dinâmicas e envolventes que unem movimento, ritmo e expressão corporal.', '2025-01-31 15:28:15', '2025-01-31 15:28:15'),
(5, 'Ritmos', 'Modalidade que mistura diferentes estilos musicais em coreografias animadas para promover condicionamento físico.', '2025-01-31 15:28:32', '2025-01-31 15:28:32'),
(6, 'Dança de Salão', 'Passos e técnicas de diversos ritmos, como samba, forró e bolero, para socialização e diversão.', '2025-01-31 15:28:47', '2025-01-31 15:28:47'),
(7, 'Funcional Kids', 'Atividades lúdicas e dinâmicas que estimulam o desenvolvimento motor e a coordenação das crianças.', '2025-01-31 15:29:00', '2025-01-31 15:29:00'),
(8, 'Ginástica Funcional', 'Treinos completos que trabalham força, resistência, equilíbrio e agilidade com movimentos naturais do corpo.', '2025-01-31 15:29:14', '2025-01-31 15:29:14'),
(9, 'Jiu-Jitsu', 'Arte marcial focada em técnicas de defesa pessoal, controle corporal e disciplina.', '2025-01-31 15:29:26', '2025-01-31 15:29:26'),
(10, 'Karatê', 'Prática milenar que desenvolve força, coordenação, disciplina e autocontrole por meio de golpes e posturas.', '2025-01-31 15:29:41', '2025-01-31 15:29:41'),
(11, 'Mobilidade', 'Exercícios voltados para o aumento da amplitude dos movimentos e redução de dores articulares.', '2025-01-31 15:29:53', '2025-01-31 15:29:53'),
(12, 'Psicomotricidade', 'Atividades que estimulam o desenvolvimento motor e cognitivo, melhorando coordenação e percepção corporal.', '2025-01-31 15:30:10', '2025-01-31 15:30:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidades_nucleos`
--

DROP TABLE IF EXISTS `modalidades_nucleos`;
CREATE TABLE IF NOT EXISTS `modalidades_nucleos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modalidades_id` int(11) NOT NULL,
  `nucleos_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `modalidades_modalidades_nucleos_fk` (`modalidades_id`),
  KEY `nucleos_modalidades_nucleos_fk` (`nucleos_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nucleos`
--

DROP TABLE IF EXISTS `nucleos`;
CREATE TABLE IF NOT EXISTS `nucleos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nucleos`
--

INSERT INTO `nucleos` (`id`, `nome`, `endereco`, `bairro`, `telefone`, `created`, `modified`) VALUES
(1, 'Sede', 'Rua Dezesseis de Março, 183', 'Centro', '(24) 2249-6803', '2025-01-31 15:57:57', '2025-01-31 16:05:39'),
(2, 'Centro de Iniciação ao Esporte Paulo Guerra Peixe', 'Rua Flávio Cavalcanti, S/N', 'Caxambu ', '(24) 2291-7674', '2025-01-31 16:06:58', '2025-01-31 16:06:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionarios`
--

DROP TABLE IF EXISTS `questionarios`;
CREATE TABLE IF NOT EXISTS `questionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alunos_id` int(11) NOT NULL,
  `coracao` tinyint(1) NOT NULL,
  `dor_peito` tinyint(1) NOT NULL,
  `dor_peito_mes` tinyint(1) NOT NULL,
  `tontura` tinyint(1) NOT NULL,
  `articular` tinyint(1) NOT NULL,
  `tratamento` tinyint(1) NOT NULL,
  `cirurgia` tinyint(1) NOT NULL,
  `outra_razao` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alunos_questionarios_fk` (`alunos_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questionarios`
--

INSERT INTO `questionarios` (`id`, `alunos_id`, `coracao`, `dor_peito`, `dor_peito_mes`, `tontura`, `articular`, `tratamento`, `cirurgia`, `outra_razao`, `created`, `modified`) VALUES
(1, 3, 1, 0, 0, 0, 0, 0, 0, 0, '2025-01-29 12:11:06', '2025-01-29 12:11:06'),
(2, 4, 1, 0, 0, 0, 0, 0, 0, 0, '2025-01-29 12:13:49', '2025-01-29 12:13:49'),
(3, 5, 1, 0, 1, 1, 1, 1, 0, 1, '2025-01-29 12:16:37', '2025-01-29 12:16:37'),
(4, 6, 1, 1, 0, 1, 1, 0, 1, 1, '2025-01-29 12:21:30', '2025-01-29 12:21:30'),
(5, 7, 1, 0, 0, 1, 0, 1, 1, 0, '2025-01-29 12:57:13', '2025-01-29 12:57:13'),
(6, 8, 1, 1, 1, 1, 1, 0, 0, 0, '2025-01-29 16:59:39', '2025-01-29 16:59:39'),
(7, 9, 0, 1, 0, 1, 0, 1, 0, 0, '2025-02-03 16:35:45', '2025-02-03 16:35:45'),
(8, 10, 0, 0, 0, 0, 0, 0, 0, 0, '2025-03-19 12:06:34', '2025-03-19 12:06:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `grupos_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grupos_usuarios_fk` (`grupos_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cpf`, `telefone`, `senha`, `hash`, `grupos_id`, `created`, `modified`) VALUES
(1, 'Webmaster', 'master@petropolis.rj.gov.br', '117.393.507-07', '2422469217', '$2y$10$IW.T4bOmemeaA7UZ0UrbEeJet8R0LJ9p8dVQeLZ1HqheAQvlA6XVq', NULL, 1, '2024-02-28 14:35:01', '2025-06-24 17:46:18'),
(6, 'Brito', 'brito@petropolis.rj.gov.br', '864.395.560-45', '(24)98888-8888', '$2y$10$h9aa.yMbBqrIAbXrvhhCWOc4gbg36vvn1UAZ1iat2IlBBz4U5ltm.', NULL, 2, '2025-01-29 11:56:28', '2025-02-05 11:59:49'),
(4, 'Josué', 'josue@petropolis.rj.gov.br', '864.395.560-45', '(24)98888-8888', '$2y$10$.T3llVzcPA6M1osHK.5GZeP8s4b5RfiQywIP64ksWRIAwZqN5VwaW', NULL, 2, '2025-01-29 11:56:28', '2025-01-31 15:42:29'),
(7, 'Marcelo', 'marcelo@petropolis.rj.gov.br', '864.395.560-45', '(24)98888-8888', '$2y$10$.T3llVzcPA6M1osHK.5GZeP8s4b5RfiQywIP64ksWRIAwZqN5VwaW', NULL, 2, '2025-01-29 11:56:28', '2025-01-31 15:42:29'),
(14, 'Andrea', 'andrea@petropolis.rj.gov.br', '935.973.620-10', '(24) 98162-4058', '$2y$10$yvsljgaCIctVdCE5SPzOluNS8pJdjNM8xIWyC0PsXmuBhYHWov8AW', NULL, 1, '2025-02-03 16:27:40', '2025-02-03 16:27:40'),
(9, 'Felipe', 'felipe@petropolis.rj.gov.br', '864.395.560-45', '(24)98888-8888', '$2y$10$.T3llVzcPA6M1osHK.5GZeP8s4b5RfiQywIP64ksWRIAwZqN5VwaW', NULL, 2, '2025-01-29 11:56:28', '2025-01-31 15:42:29'),
(10, 'Coelho', 'coelho@petropolis.rj.gov.br', '864.395.560-45', '(24)98888-8888', '$2y$10$.T3llVzcPA6M1osHK.5GZeP8s4b5RfiQywIP64ksWRIAwZqN5VwaW', NULL, 2, '2025-01-29 11:56:28', '2025-01-31 15:42:29'),
(11, 'Ricardo', 'ricardo@petropolis.rj.gov.br', '864.395.560-45', '(24)98888-8888', '$2y$10$.T3llVzcPA6M1osHK.5GZeP8s4b5RfiQywIP64ksWRIAwZqN5VwaW', NULL, 2, '2025-01-29 11:56:28', '2025-01-31 15:42:29'),
(12, 'Luís Antônio', 'luísantonio@petropolis.rj.gov.br', '864.395.560-45', '(24)98888-8888', '$2y$10$.T3llVzcPA6M1osHK.5GZeP8s4b5RfiQywIP64ksWRIAwZqN5VwaW', NULL, 2, '2025-01-29 11:56:28', '2025-01-31 15:42:29'),
(13, 'Dani', 'dani@petropolis.rj.gov.br', '864.395.560-45', '(24)98888-8888', '$2y$10$.T3llVzcPA6M1osHK.5GZeP8s4b5RfiQywIP64ksWRIAwZqN5VwaW', NULL, 2, '2025-01-29 11:56:28', '2025-01-31 15:42:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
