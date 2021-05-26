-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26-Maio-2021 às 02:18
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `talentfinder`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `company_skill`
--

DROP TABLE IF EXISTS `company_skill`;
CREATE TABLE IF NOT EXISTS `company_skill` (
  `company_id` int(11) DEFAULT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `skill_id` (`skill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(1, 'PHP'),
(2, 'Laravel'),
(3, 'Node.js'),
(4, 'React.js'),
(5, 'React native'),
(6, 'Vue.js'),
(7, 'Java');

-- --------------------------------------------------------

--
-- Estrutura da tabela `skill_user`
--

DROP TABLE IF EXISTS `skill_user`;
CREATE TABLE IF NOT EXISTS `skill_user` (
  `user_id` int(11) DEFAULT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `time_experience` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `id_user` (`user_id`),
  KEY `id_skill` (`skill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `skill_user`
--

INSERT INTO `skill_user` (`user_id`, `skill_id`, `time_experience`, `id`) VALUES
(6, 1, 5, 1),
(6, 2, 0, 4),
(6, 3, 1, 5),
(6, 4, 1, 6),
(6, 5, 2, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `password`, `name`, `email`, `remember_token`, `user_type`, `description`) VALUES
(4, '123', NULL, 'a@gmail.com', NULL, NULL, NULL),
(5, '$2y$10$0ClhTOg6aIwHjshsROqo5.mpv5kPIDpq84uQf9xkWdj55kKewnRi2', NULL, 'larrire@ufrn.edu.br', NULL, 1, NULL),
(6, '$2y$10$TXKxVCuxuvxsFiVwYAnvfO3l/VzsGOgkcUDAdhAr0JF0O0TEc2oJ6', 'Larrire Lineker', 'linekerlarrire@gmail.com', NULL, 2, 'asasasasa'),
(7, '$2y$10$j5LVWa4AzQYN71ueu.DXE.1TJSjYbFUg810JGjtPU.tTITw5eeThS', 'Larrire', 'b@gmail.com', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_experiences`
--

DROP TABLE IF EXISTS `user_experiences`;
CREATE TABLE IF NOT EXISTS `user_experiences` (
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `current_job` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_experiences`
--

INSERT INTO `user_experiences` (`user_id`, `company_name`, `occupation`, `date_start`, `date_end`, `description`, `id`, `current_job`) VALUES
(6, 'Natal Agencia Web 3', 'Pleno web developer', '2010-03-31', '2013-12-30', NULL, 1, 0),
(6, 'Top web', 'Fullstack developer top top', '2014-01-01', '2016-06-20', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_social_medias`
--

DROP TABLE IF EXISTS `user_social_medias`;
CREATE TABLE IF NOT EXISTS `user_social_medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `social_media_type` varchar(30) DEFAULT NULL,
  `social_media_icon` varchar(30) DEFAULT NULL,
  `social_media_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_social_medias`
--

INSERT INTO `user_social_medias` (`id`, `user_id`, `social_media_type`, `social_media_icon`, `social_media_link`) VALUES
(1, 6, 'facebook', NULL, 'https://www.facebook.com/larrire.liniker'),
(2, 6, 'instagram', NULL, 'https://www.instagram.com/larrirelineker');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
