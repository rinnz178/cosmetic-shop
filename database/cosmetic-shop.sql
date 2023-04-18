-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 18, 2023 at 11:59 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmetic-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 3, 4, 1, '2023-04-17 10:23:00', '2023-04-17 10:46:41'),
(6, 4, 9, 1, '2023-04-17 10:23:01', '2023-04-17 11:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Cleansers', '2023-04-13 00:20:37', '2023-04-13 00:30:11'),
(4, 'Exfoliators', '2023-04-13 00:20:51', '2023-04-13 00:20:51'),
(5, 'Toners', '2023-04-13 00:20:59', '2023-04-13 00:20:59'),
(6, 'Serums/Essence', '2023-04-13 00:21:09', '2023-04-13 00:21:09'),
(7, 'Moisturizers/Creams', '2023-04-13 00:21:19', '2023-04-13 00:21:19'),
(8, 'Face Masks', '2023-04-13 00:21:29', '2023-04-13 00:21:29'),
(9, 'Special Care', '2023-04-13 00:21:37', '2023-04-13 00:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(47, '2023_03_30_070455_create_products_table', 1),
(48, '2023_03_31_161723_create_categories_table', 1),
(301, '2014_10_12_000000_create_users_table', 2),
(302, '2014_10_12_100000_create_password_resets_table', 2),
(303, '2019_08_19_000000_create_failed_jobs_table', 2),
(304, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(305, '2023_04_03_055852_create_products_table', 2),
(306, '2023_04_03_061301_create_categories_table', 2),
(307, '2023_04_05_074719_create_carts_table', 2),
(308, '2023_04_05_082222_add_role_to_users_table', 2),
(309, '2023_04_10_172354_create_comments_table', 2),
(310, '2023_04_12_133247_create_orders_table', 2),
(311, '2023_04_12_143645_create_order_product_table', 2),
(312, '2023_04_17_172221_add_likes_to_products_table', 3),
(313, '2023_04_17_172504_add_likes_to_products_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `name`, `status`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(2, 1, 68.00, 'User', 'done', '+959424793947', 'Yangon', '2023-04-14 01:19:45', '2023-04-16 19:48:53'),
(3, 1, 72.00, 'User', 'done', '+959424793947', 'Yangon,hlaing', '2023-04-14 19:22:21', '2023-04-17 05:07:48'),
(4, 1, 65.00, 'User', 'done', '+959424793947', 'Yangon,hlaing', '2023-04-15 06:39:04', '2023-04-17 05:18:15'),
(5, 1, 41.00, 'User', 'done', '+959424793947', 'Yangon,hlaing', '2023-04-16 20:09:56', '2023-04-17 05:00:08'),
(6, 1, 72.00, 'User', 'pending', '+959424793947', 'Yangon,hlaing', '2023-04-17 04:36:02', '2023-04-17 05:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 4, 17.00, '2023-04-14 01:19:45', '2023-04-14 01:19:45'),
(2, 3, 4, 3, 24.00, '2023-04-14 19:22:21', '2023-04-14 19:22:21'),
(3, 4, 3, 1, 17.00, '2023-04-15 06:39:04', '2023-04-15 06:39:04'),
(4, 4, 4, 1, 24.00, '2023-04-15 06:39:04', '2023-04-15 06:39:04'),
(5, 4, 5, 1, 24.00, '2023-04-15 06:39:04', '2023-04-15 06:39:04'),
(6, 5, 3, 1, 17.00, '2023-04-16 20:09:56', '2023-04-16 20:09:56'),
(7, 5, 4, 1, 24.00, '2023-04-16 20:09:56', '2023-04-16 20:09:56'),
(8, 6, 4, 3, 24.00, '2023-04-17 04:36:02', '2023-04-17 04:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `skin_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `skin_care_benefits` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `image`, `category_id`, `brand`, `quantity`, `price`, `skin_type`, `skin_care_benefits`, `created_at`, `updated_at`, `likes`) VALUES
(3, 'Dr.G pH Cleansing Red Blemish Clear Soothing Foam', 'Water, Sodium Cocoyl Isethionate, Glycerin, Coco-Betaine, Glyceryl Stearate, Stearyl Alcohol, Sodium Methyl Cocoyl Taurate, Sodium Chloride, Butylene Glycol, Potassium Cocoyl Glycinate, Coco-Glucoside, Salicylic Acid, Caprylyl Glycol, Disodium EDTA, 1,2-Hexanediol, Quillaja Saponaria Bark Extract, Gaultheria Procumbens (Wintergreen) Leaf Extract, Butyl Avocadate, Bifida Ferment Lysate, Lactobacillus, Leuconostoc/Radish Root Ferment Filtrate, Centella Asiatica Extract, Glycine, Serine, Glutamic Acid, Madecassoside, Sodium Hyaluronate, Aspartic Acid, Leucine, Alanine, Lysine, Arginine, Tyrosine, Phenylalanine, Proline, Threonine, Valine, Isoleucine, Histidine, Cysteine, Methionine, Hydroxypropyltrimonium Hyaluronate, Ethylhexylglycerin, Propyl Gallate, Hydrolyzed Hyaluronic Acid, Sodium Acetylated Hyaluronate, Asiaticoside, Asiatic Acid, Madecassic Acid, Hyaluronic Acid, Oxygen, Hydrolyzed Sodium Hyaluronate, Sodium Hyaluronate Crosspolymer, Potassium Hyaluronat', '20230413144446.png', 3, 'Dr.G', 10, '17', 'Normal Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 01:44:46', '2023-04-17 10:56:20', 0),
(4, 'Dr.G pH Cleansing Gel Foam', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414052622.png', 3, 'Dr.G', 10, '24', 'Dry Skin', 'A low-irritant cleansing gel foam that provides a deep clean by removing sunscreen, fine dust, impurities in the pores, and more; the 5-Biome and Filaggrin complex ingredients keep the skin healthy and moisturized.', '2023-04-13 16:26:22', '2023-04-17 11:12:26', 1),
(5, 'Dr.G A\' Clear Bubble Foam', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414052805.png', 3, 'Dr.G', 10, '24', 'Oily Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 16:28:05', '2023-04-13 16:28:05', 0),
(6, 'Dr.G Green Deep Cleansing Oil', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414052911.png', 3, 'Dr.G', 10, '34', 'Dry Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 16:29:11', '2023-04-13 16:29:11', 0),
(7, 'Dr.G Red Blemish Clear Soothing Body Wash', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414053038.png', 3, 'Dr.G', 10, '32', 'Normal Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 16:30:38', '2023-04-13 16:30:38', 0),
(8, 'Dr.G pH Cleansing Oil', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414053241.png', 3, 'Dr.G', 10, '31', 'Dry Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 16:32:41', '2023-04-13 16:32:41', 0),
(9, 'Dr.G Brightening Peeling Gel', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414054225.png', 4, 'Dr.G', 10, '25', 'Dry Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 16:42:25', '2023-04-13 16:42:25', 0),
(10, 'Dr.G Red Blemish Clear Soothing Toner', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414054322.png', 5, 'Dr.G', 10, '36', 'Normal Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 16:43:22', '2023-04-13 16:43:22', 0),
(11, 'Dr.G A\' Clear Balancing Toner', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414054411.png', 5, 'Dr.G', 10, '30', 'Normal Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 16:44:11', '2023-04-13 16:44:11', 0),
(12, 'Dr.G Dermoisture Barrier D Liquid Toner', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414054456.png', 5, 'Dr.G', 10, '32', 'Normal Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 16:44:56', '2023-04-13 16:44:56', 0),
(13, 'Dr.G A\' Clear Spot For Face Serum', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414055023.png', 6, 'Dr.G', 10, '31', 'Normal Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 16:50:23', '2023-04-13 16:50:23', 0),
(14, 'Dr.G Red Blemish Clear Soothng Active Essence', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414055145.png', 6, 'Dr.G', 10, '24', 'Oily Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 16:51:45', '2023-04-13 16:51:45', 0),
(15, 'Dr.G Red Blemish Clear Soothing Cream', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414055305.png', 7, 'Dr.G', 11, '23', 'Normal Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 16:53:05', '2023-04-13 16:53:05', 0),
(16, 'Dr.G Royal Black Snail Cream', 'Due to Stock Limitation, only 3 pcs per order will be allowed.\r\nDr. G R.E.D Blemish Clear Soothing Cream Calming Down Cream Soothing Calming Moisturizing And Nourishing The Skin, 70ml\r\nIt contains cica complex, which can effectively calm skin hotness and redness, and replenish water for skin.', '20230414055400.png', 7, 'Dr.G', 11, '23', 'Normal Skin', 'Moisturizing and soothing cleansing foam for acne-prone skin', '2023-04-13 16:54:00', '2023-04-13 16:54:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'User', 'user@gmail.com', NULL, '$2y$10$N.eqfyImOht3QYcDL4f7WuE5VqAHSdy3KkL4j7LiItJzHFtYZ3PmS', NULL, '2023-04-14 01:18:19', '2023-04-14 01:18:19', 1),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$q736sxbeCpT8g7uX0fRf1elvQ4koBluwEDqiVrnLzvhZAP3jXHM5K', NULL, '2023-04-14 01:20:17', '2023-04-14 01:20:17', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
