-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/09/2022 às 22:45
-- Versão do servidor: 10.4.24-MariaDB
-- Versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `buddies_data`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `activitie`
--

CREATE TABLE `activitie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `step` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `activitie`
--

INSERT INTO `activitie` (`id`, `name`, `image`, `step`) VALUES
(1, 'Cuisine', '/img/badges-interets/ci-cuisine.svg', NULL),
(2, 'Photographie', '/img/badges-interets/ci-photo.svg', NULL),
(3, 'Musique', '/img/badges-interets/ci-musique.svg', NULL),
(4, 'Cinéma', '/img/badges-interets/ci-cinema.svg', NULL),
(5, 'Art', '/img/badges-interets/ci-art.svg', NULL),
(6, 'Exposition', '/img/badges-activite/activite-expo.svg', NULL),
(7, 'Sport', '/img/badges-activite/activite-sport.svg', NULL),
(8, 'Dégustation', '/img/badges-activite/activite-degustation.svg', NULL),
(9, 'Découverte', '/img/badges-activite/activite-devouverte.svg', NULL),
(10, 'Randonnée', '/img/badges-activite/activite-randonnee.svg', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `activitie_user`
--

CREATE TABLE `activitie_user` (
  `id` int(11) NOT NULL,
  `activitie_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_activitie` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `activitie_user`
--

INSERT INTO `activitie_user` (`id`, `activitie_id`, `user_id`, `is_activitie`) VALUES
(53, 1, 2, 1),
(54, 2, 2, 1),
(55, 3, 2, 1),
(56, 4, 2, 1),
(57, 5, 2, 1),
(58, 6, 2, 0),
(59, 7, 2, 0),
(60, 8, 2, 0),
(61, 9, 2, 0),
(62, 10, 2, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220915185958', '2022-09-15 21:00:06', 39);

-- --------------------------------------------------------

--
-- Estrutura para tabela `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `interested_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `step` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `group`
--

INSERT INTO `group` (`id`, `name`, `description`, `image`) VALUES
(3, 'Art Lovers', 'Art Lovers', '/img/thumbnails-commu/art-lovers.jpg'),
(4, 'Art Lovers', 'Film Club', '/img/thumbnails-commu/art-lovers.jpg'),
(5, 'Film Club', 'Art Lovers', '/img/thumbnails-commu/film-club.jpg'),
(6, 'Film Club', 'Film Club', '/img/thumbnails-commu/film-club.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `messenger`
--

CREATE TABLE `messenger` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sent_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `received_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `publication`
--

CREATE TABLE `publication` (
  `id` int(11) NOT NULL,
  `post` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `groupe_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `publication`
--

INSERT INTO `publication` (`id`, `post`, `date_at`, `groupe_id`, `image`) VALUES
(1, 'testando publicao', '2022-09-08 18:48:25', NULL, NULL),
(2, '“To be human is to tinker, to envision a better condition, and decide to work toward it by shaping the world around us.” ― Frank Chimero', '2022-09-15 20:49:56', NULL, '/img/publication/picnic.jpg'),
(3, 'If you love life, do not waste time, for time is what life is made up of. ', '2022-09-15 20:51:35', NULL, NULL),
(4, 'I’m a great believer in luck, and I find the harder I work, the more luck I have. ', '2022-09-15 20:51:35', NULL, '/img/publication/work-hard.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `sender_id_id` int(11) DEFAULT NULL,
  `received_id_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `review`
--

INSERT INTO `review` (`id`, `comment`, `date_at`, `sender_id_id`, `received_id_id`) VALUES
(2, '“To be human is to tinker, to envision a better condition, and decide to work toward it by shaping the world around us.”', '2022-09-15 20:13:29', 9, 2),
(3, '“To be human is to tinker, to envision a better condition, and decide to work toward it by shaping the world around us.”', '2022-09-15 20:13:29', 3, 2),
(4, '“To be human is to tinker, to envision a better condition, and decide to work toward it by shaping the world around us.”', '2022-09-15 20:13:29', 4, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_expat` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `isconnected` date DEFAULT NULL,
  `language2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `match_age_min` int(11) DEFAULT NULL,
  `match_age_max` int(11) DEFAULT NULL,
  `match_genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_langue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_politique` tinyint(1) DEFAULT NULL,
  `match_break_the_ice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_perfect_afternoon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activities` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interets` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`, `country`, `city`, `language`, `picture`, `biography`, `is_expat`, `created_at`, `isconnected`, `language2`, `language3`, `genre`, `birth_date`, `match_age_min`, `match_age_max`, `match_genre`, `match_langue`, `match_politique`, `match_break_the_ice`, `match_perfect_afternoon`, `activities`, `interets`) VALUES
(2, 'pedroxtn@gmail.com', '[\"ROLE_USER\",\"ROLE_MODERATOR\",\"ROLE_ADMINISTRATOR\"]', '$2y$13$SWMQ..zZOrxUeNxRtzhHYOGC.XVnD/pyf.DLF5mASxZjOIn2DfnG2', 'Jimmy Stewart', 'Rodrigues', 'BR', 'Paris', 'Portugais', 'jimmy-632374efcdd76.jpg', 'Hello World !!!', 1, '2022-09-08 20:44:00', NULL, 'Francais', 'Anglais', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'teste@teste.com', '[]', '$2y$13$RLdXZS78YUGALcBdPDrB5ukJY.xRbCGuGSbN.4cK3a5HG/QnOOL4O', 'João Braz', 'Rodrigues', 'UA', 'Paris', 'Espagnol', 'thibault-63236ebf3b54c.jpg', 'Hello World !!!!', 1, NULL, NULL, ' ', ' ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'testepedro@teste.com', '[]', '$2y$13$bw7yR0Wn..W5ie8xGZh.Su4fToArprJsSXcSWNqEaErFQpag3LaxG', 'Alice Smith', 'Roy', 'CA', 'Paris', 'Francais', 'alice-63236f7a0a2fb.jpg', NULL, 1, NULL, NULL, 'Anglais', 'Portugais', 'Paris', '1922-01-01', 15, 35, 'Agenre', 'Francais', 0, 'Raconte une blague ', 'Pique-nique dans un parc', 'Exposition', 'Musique'),
(9, 'pedroUP@gmail.com', '[]', '$2y$13$qDRlNsRo.r5hX5Ge4LjEDurGIxbUIdbidj9DTyhPBQlcBiQGF7j1a', 'Luc Taylor', 'Taylor', 'CV', 'Toulouse', 'Anglais', 'luc-63237035c06a3.jpg', 'Hello World!!!', 1, NULL, NULL, 'Francais', ' ', 'Paris', '1992-01-01', 19, 40, 'Homme', 'Francais', 0, 'Raconte une blague ', 'Visite de la dernière expo en vogue', 'Dégustation', 'Cinema');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_form`
--

CREATE TABLE `user_form` (
  `user_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_group`
--

CREATE TABLE `user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `user_group`
--

INSERT INTO `user_group` (`user_id`, `group_id`) VALUES
(2, 4),
(2, 6),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(9, 3),
(9, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_publication`
--

CREATE TABLE `user_publication` (
  `user_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `user_publication`
--

INSERT INTO `user_publication` (`user_id`, `publication_id`) VALUES
(2, 2),
(2, 3),
(2, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `activitie`
--
ALTER TABLE `activitie`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `activitie_user`
--
ALTER TABLE `activitie_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C8B28E4EB0ED4F5` (`activitie_id`),
  ADD KEY `IDX_C8B28E4A76ED395` (`user_id`);

--
-- Índices de tabela `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Índices de tabela `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `messenger`
--
ALTER TABLE `messenger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E22A4301F624B39D` (`sender_id`),
  ADD KEY `IDX_E22A4301CD53EDB6` (`receiver_id`);

--
-- Índices de tabela `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AF3C67797A45358C` (`groupe_id`);

--
-- Índices de tabela `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_794381C66061F7CF` (`sender_id_id`),
  ADD KEY `IDX_794381C6BA2E6344` (`received_id_id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Índices de tabela `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`user_id`,`form_id`),
  ADD KEY `IDX_2809B186A76ED395` (`user_id`),
  ADD KEY `IDX_2809B1865FF69B7D` (`form_id`);

--
-- Índices de tabela `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `IDX_8F02BF9DA76ED395` (`user_id`),
  ADD KEY `IDX_8F02BF9DFE54D947` (`group_id`);

--
-- Índices de tabela `user_publication`
--
ALTER TABLE `user_publication`
  ADD PRIMARY KEY (`user_id`,`publication_id`),
  ADD KEY `IDX_627AEECA76ED395` (`user_id`),
  ADD KEY `IDX_627AEEC38B217A7` (`publication_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `activitie`
--
ALTER TABLE `activitie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `activitie_user`
--
ALTER TABLE `activitie_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `messenger`
--
ALTER TABLE `messenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `activitie_user`
--
ALTER TABLE `activitie_user`
  ADD CONSTRAINT `FK_C8B28E4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_C8B28E4EB0ED4F5` FOREIGN KEY (`activitie_id`) REFERENCES `activitie` (`id`);

--
-- Restrições para tabelas `messenger`
--
ALTER TABLE `messenger`
  ADD CONSTRAINT `FK_E22A4301CD53EDB6` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_E22A4301F624B39D` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`);

--
-- Restrições para tabelas `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `FK_AF3C67797A45358C` FOREIGN KEY (`groupe_id`) REFERENCES `group` (`id`);

--
-- Restrições para tabelas `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_794381C66061F7CF` FOREIGN KEY (`sender_id_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_794381C6BA2E6344` FOREIGN KEY (`received_id_id`) REFERENCES `user` (`id`);

--
-- Restrições para tabelas `user_form`
--
ALTER TABLE `user_form`
  ADD CONSTRAINT `FK_2809B1865FF69B7D` FOREIGN KEY (`form_id`) REFERENCES `form` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2809B186A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `FK_8F02BF9DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8F02BF9DFE54D947` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `user_publication`
--
ALTER TABLE `user_publication`
  ADD CONSTRAINT `FK_627AEEC38B217A7` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_627AEECA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
