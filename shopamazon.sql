-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2018 at 11:13 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopamazon`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_order` int(11) NOT NULL DEFAULT '0',
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browse_node` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_order`, `category_name`, `category_slug`, `browse_node`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alle Kategorien', 'All', '', 'active', '2018-05-17 09:12:58', '2018-05-17 09:12:58'),
(2, 2, 'Bekleidung', 'Apparel', '78689031', 'active', '2018-05-17 09:12:45', '2018-05-17 09:12:45'),
(3, 3, 'Elektro-Großgeräte', 'Appliances', '931573031', 'active', NULL, NULL),
(4, 4, 'Auto & Motorrad', 'Automotive', '78193031', 'active', NULL, NULL),
(5, 5, 'Baby', 'Baby', '357577011', 'active', NULL, NULL),
(6, 6, 'Beauty', 'Beauty', '64257031', 'active', NULL, NULL),
(7, 7, '', '', '', 'inactive', '2018-05-31 03:07:04', '2018-05-31 03:07:04'),
(8, 8, 'Bücher', 'Books', '541686', 'active', NULL, NULL),
(9, 9, 'Klassik', 'Classical', '542676', 'active', NULL, NULL),
(10, 10, 'DVD & Blu-ray', 'DVD', '547664', 'active', NULL, NULL),
(11, 11, 'Elektronik & Foto', 'Electronics', '569604', 'active', NULL, NULL),
(12, 12, 'Fremdsprachige Bücher', 'ForeignBooks', '54071011', 'active', NULL, NULL),
(13, 13, 'Geschenkgutscheine', 'GiftCards', '1571257031', 'active', NULL, NULL),
(14, 14, 'Lebensmittel & Getränke', 'Grocery', '344162031', 'active', NULL, NULL),
(15, 15, 'Handmade', 'Handmade', '9699312031', 'active', NULL, NULL),
(16, 16, 'Drogerie & Körperpflege', 'HealthPersonalCare', '64257031', 'active', NULL, NULL),
(17, 17, 'Garten', 'HomeGarden', '10925241', 'active', NULL, NULL),
(18, 18, 'Technik & Wissenschaft', 'Industrial', '5866099031', 'active', NULL, NULL),
(19, 19, 'Schmuck', 'Jewelry', '327473011', 'active', NULL, NULL),
(20, 20, 'Kindle-Shop', 'KindleStore', '530485031', 'active', NULL, NULL),
(21, 21, 'Küche & Haushalt', 'Kitchen', '3169011', 'active', NULL, NULL),
(22, 22, 'Beleuchtung', 'Lighting', '213084031', 'active', NULL, NULL),
(23, 23, 'Koffer, Rucksäcke & Taschen', 'Luggage', '2454119031', 'active', NULL, NULL),
(24, 24, 'Zeitschriften', 'Magazines', '1161660', 'active', NULL, NULL),
(25, 25, '', 'Marketplace', '', 'inactive', NULL, NULL),
(26, 26, 'Apps & Spiele', 'MobileApps', '1661650031', 'active', NULL, NULL),
(27, 27, 'Musik-Downloads', 'MP3Downloads', '180529031', 'active', NULL, NULL),
(28, 28, 'Musik-CDs & Vinyl', 'Music', '542676', 'active', NULL, NULL),
(29, 29, 'Musikinstrumente & DJ-Equipment', 'MusicalInstruments', '340850031', 'active', NULL, NULL),
(30, 30, 'Bürobedarf & Schreibwaren', 'OfficeProducts', '192417031', 'active', NULL, NULL),
(31, 31, 'Amazon Pantry', 'Pantry', '', 'active', NULL, NULL),
(32, 32, 'Computer & Zubehör', 'PCHardware', '569604', 'active', NULL, NULL),
(33, 33, 'Haustier', 'PetSupplies', '427727031', 'active', NULL, NULL),
(34, 34, 'Kamera & Foto', 'Photo', '571860', 'active', NULL, NULL),
(35, 35, 'Schuhe & Handtaschen', 'Shoes', '362995011', 'active', NULL, NULL),
(36, 36, 'Software', 'Software', '542064', 'active', NULL, NULL),
(37, 37, 'Sport & Freizeit', 'SportingGoods', '16435121', 'active', NULL, NULL),
(38, 38, 'Baumarkt', 'Tools', '80085031', 'active', NULL, NULL),
(39, 39, 'Spielzeug', 'Toys', '12950661', 'active', NULL, NULL),
(40, 40, 'Amazon Instant Video', 'UnboxVideo', '3010076031', 'active', NULL, NULL),
(41, 41, 'Games', 'VideoGames', '541708', 'active', NULL, NULL),
(42, 42, 'Uhren', 'Watches', '193708031', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_05_15_124711_create_categories_table', 2),
(9, '2018_05_15_125621_create_sub_categories_table', 2),
(10, '2018_05_15_125937_create_settings_table', 2),
(11, '2018_05_15_131136_create_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('pragnesh.2601@gmail.com', '$2y$10$3Ppp8O4WhE1JmvSvjrx5x.KPjOdeyiSpwffR3ZIfoU11V7Bnrsi7e', '2018-06-01 04:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `asin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_home` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `asin`, `category_id`, `sub_category_id`, `is_featured`, `display_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'B07B44TMBF', '1', '4', 'yes', 'yes', 'active', '2018-05-18 05:01:47', '2018-06-01 06:08:08'),
(2, 'B06Y1L87R7', '1', '4', 'no', 'no', 'active', '2018-05-18 05:05:50', '2018-05-18 05:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `json` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `json`, `created_at`, `updated_at`) VALUES
(1, 'null', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_order` int(11) NOT NULL,
  `sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_order`, `sub_category_name`, `sub_category_slug`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 'Accessories', 'accessories', 'active', '2018-05-18 02:45:31', '2018-05-18 02:45:31'),
(5, 2, 2, 'Home Appliances', 'home-appliances', 'active', '2018-05-18 02:45:51', '2018-05-18 02:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('Super Administrator','Administrator','User','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `mobile` varchar(21) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hmac` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_pic`, `role`, `mobile`, `current_city`, `cart_id`, `hmac`) VALUES
(1, 'pragnesh.2601', 'pragnesh', 'Panchal', 'pragnesh.2601@gmail.com', '$2y$10$mATRt2Ql/AzfsMNxELsjg.KVYwLu.VdeAmqefJTdpg05HxB.V5Gpq', 'wmweaRNmPwLAxqGdWcoyzxgtf2e5dQ7rMzvkG9jmSOFj3iNuDcsIrwKyFUeC', '2018-05-08 05:08:44', '2018-06-02 01:45:58', NULL, 'Super Administrator', '9998965461', 'Ahmedabad', '262-7419589-6974505', 'hZzvjFUWLyrz/D88BAs2bMWzQ2c='),
(2, 'modijaymin86', 'Jaymin', 'Modi', 'modijaymin86@gmail.com', '$2y$10$EYBVHNxf4YVMOFYFkq3haOwMw1nmokWlHQLxY0FoLg9LNsih5/Msm', 'sX6YeGWU65R9gTyRDoIRWs3nyUmotJjZozL5qswG2e3o7Vp9kUDTu0FBi56Q', '2018-05-11 06:28:44', '2018-05-11 06:28:44', NULL, 'Administrator', NULL, NULL, NULL, NULL),
(3, 'imvdiyora', 'Vicky', 'Diyora', 'imvdiyora@gmail.com', '$2y$10$N278f3w2UTbJDk0zO0XQLOcUlCN6EDno7ZJqNng48NfIkcXBOaTAK', 'C2H2hJdYC3q12rx2ryF5Jc0e3G29JRRaknFkSaCxo9H0d4M1fOs3lL68wTT1', '2018-05-11 08:10:14', '2018-05-18 10:07:04', NULL, 'User', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
