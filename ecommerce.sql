-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Set-2020 às 00:06
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `neighborhood` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numberHome` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `complement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `addresses`
--

INSERT INTO `addresses` (`id`, `city`, `uf`, `street`, `neighborhood`, `cep`, `numberHome`, `user_id`, `complement`, `created_at`, `updated_at`) VALUES
(1, 'São Paulo', 'SP', 'Praça da Sé', 'Sé', '01001000', 10, 1, 'teste', '2020-09-20 02:01:19', '2020-09-20 02:01:19'),
(2, 'São Paulo', 'SP', 'Praça da Sé', 'Sé', '01001000', 10, 2, 'teste', '2020-09-20 02:03:44', '2020-09-20 02:03:44'),
(3, 'São Paulo', 'SP', 'Praça da Sé', 'Sé', '01001000', 10, 3, 'teste', '2020-09-20 02:04:21', '2020-09-20 02:04:21'),
(4, 'São Paulo', 'SP', 'Praça da Sé', 'Sé', '01001000', 10, 4, 'teste', '2020-09-20 02:08:05', '2020-09-20 02:08:05'),
(5, 'São Paulo', 'SP', 'Praça da Sé', 'Sé', '01001000', 10, 5, NULL, '2020-09-21 20:06:03', '2020-09-21 20:06:03'),
(6, 'Iguatu', 'CE', 'Rua Doutor João Pessoa 811', 'Centro', '63500970', 20, 6, NULL, '2020-09-22 22:41:16', '2020-09-22 22:41:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_17_165208_create_addresses_table', 1),
(5, '2020_09_17_165345_create_products_table', 1),
(6, '2020_09_17_165408_create_orders_table', 1),
(7, '2020_09_17_182503_create_orders_products_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `created_at`, `updated_at`) VALUES
(2, 5, 5, '2020-09-22 21:45:16', '2020-09-22 21:45:16'),
(3, 1, 1, '2020-09-22 21:46:30', '2020-09-22 21:46:30'),
(4, 1, 1, '2020-09-22 22:35:55', '2020-09-22 22:35:55'),
(5, 6, 6, '2020-09-22 22:45:04', '2020-09-22 22:45:04'),
(6, 6, 6, '2020-09-22 22:47:24', '2020-09-22 22:47:24'),
(7, 6, 6, '2020-09-22 22:52:12', '2020-09-22 22:52:12'),
(8, 6, 6, '2020-09-22 22:52:57', '2020-09-22 22:52:57'),
(9, 6, 6, '2020-09-22 22:54:33', '2020-09-22 22:54:33'),
(12, 6, 6, '2020-09-22 22:56:41', '2020-09-22 22:56:41'),
(13, 6, 6, '2020-09-22 22:59:42', '2020-09-22 22:59:42'),
(14, 6, 6, '2020-09-22 23:01:30', '2020-09-22 23:01:30'),
(15, 6, 6, '2020-09-22 23:04:59', '2020-09-22 23:04:59'),
(16, 1, 1, '2020-09-22 23:24:02', '2020-09-22 23:24:02'),
(17, 1, 1, '2020-09-22 23:30:16', '2020-09-22 23:30:16'),
(18, 1, 1, '2020-09-22 23:39:36', '2020-09-22 23:39:36'),
(19, 1, 1, '2020-09-23 00:37:44', '2020-09-23 00:37:44'),
(20, 1, 1, '2020-09-23 00:39:35', '2020-09-23 00:39:35'),
(21, 1, 1, '2020-09-23 00:40:42', '2020-09-23 00:40:42'),
(22, 1, 1, '2020-09-23 00:42:39', '2020-09-23 00:42:39'),
(23, 1, 1, '2020-09-23 00:46:25', '2020-09-23 00:46:25'),
(24, 1, 1, '2020-09-23 00:47:51', '2020-09-23 00:47:51'),
(25, 2, 2, '2020-09-23 00:48:49', '2020-09-23 00:48:49'),
(26, 2, 2, '2020-09-23 00:56:09', '2020-09-23 00:56:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `valueUnit` decimal(8,2) NOT NULL,
  `quantityProduct` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `orders_products`
--

INSERT INTO `orders_products` (`id`, `valueUnit`, `quantityProduct`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, '1.00', 72, 2, 1, NULL, NULL),
(3, '1.00', 72, 3, 1, NULL, NULL),
(4, '1.00', 96, 3, 4, NULL, NULL),
(5, '98.00', 1, 4, 5, NULL, NULL),
(6, '72.00', 1, 5, 1, NULL, NULL),
(7, '96.00', 1, 5, 4, NULL, NULL),
(8, '98.00', 1, 6, 13, NULL, NULL),
(9, '90.00', 1, 7, 7, NULL, NULL),
(10, '98.00', 1, 8, 5, NULL, NULL),
(11, '98.00', 1, 9, 5, NULL, NULL),
(14, '72.00', 1, 12, 1, NULL, NULL),
(15, '96.00', 1, 13, 12, NULL, NULL),
(16, '98.00', 1, 14, 9, NULL, NULL),
(17, '98.00', 1, 15, 5, NULL, NULL),
(18, '72.00', 1, 16, 1, NULL, NULL),
(19, '98.00', 1, 17, 13, NULL, NULL),
(20, '98.00', 1, 18, 5, NULL, NULL),
(21, '90.00', 1, 19, 7, NULL, NULL),
(22, '72.00', 1, 20, 1, NULL, NULL),
(23, '72.00', 1, 21, 1, NULL, NULL),
(24, '98.00', 1, 22, 5, NULL, NULL),
(25, '96.00', 1, 23, 4, NULL, NULL),
(26, '96.00', 1, 24, 8, NULL, NULL),
(27, '96.00', 1, 25, 4, NULL, NULL),
(28, '98.00', 1, 25, 5, NULL, NULL),
(29, '72.00', 1, 26, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount` int(11) NOT NULL,
  `quantityProduct` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valueProduct` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `discount`, `quantityProduct`, `name`, `url_image`, `description`, `valueProduct`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 'Camisa Adidas', 'camisa-adidas.jpg', 'Dia a dia', '80.00', NULL, NULL),
(2, 0, 10, 'Chuteira Adidas', 'chuteira-adidas-campo.jpg', 'Chuteira de campo FX', '100.00', NULL, NULL),
(3, 0, 10, 'Chuteira Adidas', 'chuteira-adidas-campo.jpg', 'Chuteira de campo', '100.00', NULL, NULL),
(4, 2, 10, 'Chuteira Adidas', 'chuteira-adidas-futsal.jpg', 'Chuteira futsal', '120.00', NULL, NULL),
(5, 3, 10, 'Chuteira Adidas', 'chuteira-adidas-society.jpg', 'Chuteira society', '140.00', NULL, NULL),
(6, 0, 10, 'Chuteira Nike', 'chuteira-nike-campo.jpg', 'Chuteira de campo XK', '100.00', NULL, NULL),
(7, 1, 10, 'Chuteira Nike', 'chuteira-nike-campo.jpg', 'Chuteira de campo', '100.00', NULL, NULL),
(8, 2, 10, 'Chuteira Nike', 'chuteira-nike-futsal.jpg', 'Chuteira futsal', '120.00', NULL, NULL),
(9, 3, 10, 'Chuteira Nike', 'chuteira-nike-society.jpg', 'Chuteira society', '140.00', NULL, NULL),
(10, 0, 10, 'Chuteira Puma', 'chuteira-puma-campo.jpg', 'Chuteira de campo NJ', '100.00', NULL, NULL),
(11, 1, 10, 'Chuteira Puma', 'chuteira-nike-campo.jpg', 'Chuteira de campo', '100.00', NULL, NULL),
(12, 2, 10, 'Chuteira Puma', 'chuteira-puma-futsal.jpg', 'Chuteira futsal', '120.00', NULL, NULL),
(13, 3, 10, 'Chuteira Puma', 'chuteira-puma-society.jpg', 'Chuteira society', '140.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'teste', 'teste@teste.com', NULL, '$2y$10$swu8QkkPZjgQQdi88OZgeuRR6arX.xv5w.l3wt9gkixhl7ZonJ0V6', '88992617400', NULL, '2020-09-20 02:01:19', '2020-09-20 02:01:19'),
(2, 'teste 2', 'teste2@teste.com', NULL, '$2y$10$x.2nhTK.SWZwp8hs4Bf33.OzZ4CrzOvkTQ3aMv0ZKfqXLoI8qugBy', '88992617400', NULL, '2020-09-20 02:03:44', '2020-09-20 02:03:44'),
(3, 'teste 3', 'teste3@teste.com', NULL, '$2y$10$dPH5E7PRcv41dcj0Cym.Zuef6QEd6IyP8umN1PamxtxZqnrVlf7/q', '88992617400', NULL, '2020-09-20 02:04:21', '2020-09-20 02:04:21'),
(4, 'teste 4', 'teste4@teste.com', NULL, '$2y$10$Fw64Oh6KTKd711yE1DlEyesWsFIbLUnYE9ubqf5n0FrRqI7LADaKa', '88992617400', NULL, '2020-09-20 02:08:05', '2020-09-20 02:08:05'),
(5, 'Joao Denilson', 'meu@meul.com', NULL, '$2y$10$zKKlfDVnO7T/69XU5cVzOuQ1c86LjAC2uvgH1Q14lKTwPLjZOFlDW', '88999885566', NULL, '2020-09-21 20:06:03', '2020-09-21 20:06:03'),
(6, 'Olinda', 'olinda@olinda.com', NULL, '$2y$10$fnFH9jIqapvGdbzW9Hd4PORwg4fpOyC7iZD0DiNN5n86GrQv6Lq9q', '88999885566', NULL, '2020-09-22 22:41:16', '2020-09-22 22:41:16');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`);

--
-- Índices para tabela `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_products_order_id_foreign` (`order_id`),
  ADD KEY `orders_products_product_id_foreign` (`product_id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
