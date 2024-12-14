-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for technical-test-konnco
CREATE DATABASE IF NOT EXISTS `technical-test-konnco` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `technical-test-konnco`;

-- Dumping structure for table technical-test-konnco.cart_items
CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `total_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_items_user_id_foreign` (`user_id`),
  KEY `cart_items_product_id_foreign` (`product_id`),
  CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table technical-test-konnco.cart_items: ~1 rows (approximately)
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `quantity`, `total_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(117, 2, 6, 5, 2000000, '2024-12-14 12:07:07', '2024-12-14 12:12:01', NULL);
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;

-- Dumping structure for table technical-test-konnco.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table technical-test-konnco.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table technical-test-konnco.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table technical-test-konnco.migrations: ~9 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_12_11_075158_create_products_table', 1),
	(6, '2024_12_12_050933_create_cart_items_table', 2),
	(7, '2024_12_13_083450_create_transactions_table', 3),
	(8, '2024_12_13_084117_add_soft_deletes_to_cart_items_table', 3),
	(9, '2024_12_13_094032_add_price_to_transactions_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table technical-test-konnco.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table technical-test-konnco.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table technical-test-konnco.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table technical-test-konnco.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table technical-test-konnco.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table technical-test-konnco.products: ~7 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `description`, `price`, `stok`, `image`, `status`, `created_at`, `updated_at`) VALUES
	(3, 'Product 2', 'aksncjkanscjkan', 300000, 0, 'images/01JEW4HYYB5H0Y800XHXAHGAC5.png', 'inactive', '2024-12-12 00:33:31', '2024-12-14 18:58:18'),
	(5, 'Product 1', 'kjsdncjkansckjansdc', 200000, 0, 'images/01JEWBJJCGNT81RBVRPXBJZ13E.jpg', 'inactive', '2024-12-12 02:36:11', '2024-12-14 18:58:18'),
	(6, 'Product 3', 'sklxnckznxc', 400000, 18, 'images/01JEWBMJYJB4FD40N2YSTFA5Y9.jpg', 'active', '2024-12-12 02:37:17', '2024-12-14 12:14:31'),
	(7, 'Product 5', 'jkxckjnc', 200000, 0, 'images/01JEWBPCBD6NR98B3QJV7N55RT.jpg', 'inactive', '2024-12-12 02:38:15', '2024-12-14 18:58:18'),
	(8, 'Product 6', 'jkanzxjkn', 60000, 5, 'images/01JEWBT4TWX1D12GB15WFFZ66E.jpg', 'active', '2024-12-12 02:40:19', '2024-12-14 18:40:34'),
	(10, 'Product 7', 'Ini adalah product ke 7', 700000, 5, 'images/01JF2FF1RD5FSE36M0CV9ZABAR.jpg', 'active', '2024-12-14 18:39:36', '2024-12-14 18:39:36'),
	(11, 'Product 4', 'Ini adalah product ke 4', 400000, 5, 'images/01JF2FV50HDBEZPECJSTTGTX3T.jpg', 'active', '2024-12-14 18:46:13', '2024-12-14 18:46:13');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table technical-test-konnco.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `total_price` int DEFAULT NULL,
  `status` enum('pending','success','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_user_id_foreign` (`user_id`),
  CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table technical-test-konnco.transactions: ~13 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `user_id`, `total_price`, `status`, `snap_token`, `invoice`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(71, 2, 920000, 'pending', 'a62b92d8-17d2-4a3e-b3a9-4697e42278b9', 'inv-1734150015-GTplb3jb', NULL, '2024-12-14 11:20:17', '2024-12-14 11:20:17'),
	(72, 2, 600000, 'pending', '28408f39-fcb3-443b-a5bb-83c518925a4e', 'inv-1734151655-7Z8wq478', NULL, '2024-12-14 11:47:37', '2024-12-14 11:47:37'),
	(73, 2, 1080000, 'pending', '984df61e-dd1e-4b99-b511-bcbb6f5ce8ac', 'inv-1734152050-1xeT5BOd', NULL, '2024-12-14 11:54:11', '2024-12-14 11:54:11'),
	(74, 2, 1020000, 'pending', '474c2811-c187-4a4f-b56c-f84e11ec4fc6', 'inv-1734152366-3VS9jvk8', NULL, '2024-12-14 11:59:27', '2024-12-14 11:59:27'),
	(75, 2, 1080000, 'pending', 'fa60e822-55f8-4deb-a19c-dde3e8652630', 'inv-1734152385-1Gszh6n3', NULL, '2024-12-14 11:59:47', '2024-12-14 11:59:47'),
	(76, 2, 1080000, 'pending', 'c5a54947-2a79-48dc-97da-cd00ea28ebd8', 'inv-1734152817-WMvNfMEJ', NULL, '2024-12-14 12:06:59', '2024-12-14 12:06:59'),
	(77, 2, 2000000, 'pending', '63a6078c-6ee0-499f-bcad-8c3cd1cb603e', 'inv-1734152850-UFBzE0TC', NULL, '2024-12-14 12:07:31', '2024-12-14 12:07:31'),
	(78, 2, 800000, 'pending', '5cef3d7b-4e46-42ae-8dd8-cc5dff2adacc', 'inv-1734152874-xczM4Dxn', NULL, '2024-12-14 12:07:56', '2024-12-14 12:07:56'),
	(79, 2, 2000000, 'pending', 'e862a89b-e700-4197-8fa4-b691bd9c574a', 'inv-1734153126-Uzm2yaoO', NULL, '2024-12-14 12:12:07', '2024-12-14 12:12:07'),
	(80, 1, 1980000, 'success', '3c4570c8-d505-41d3-9ca4-cd5450b43a1f', 'inv-1734153220-CKVoBoUZ', NULL, '2024-12-14 12:13:41', '2024-12-14 12:14:31'),
	(81, 1, 400000, 'pending', 'b1e146a8-2b45-47af-a9a6-69839f7f04f3', 'inv-1734158559-ihHXHCcS', NULL, '2024-12-14 13:42:40', '2024-12-14 13:42:40'),
	(82, 1, 400000, 'success', '8f210887-6e24-471c-b8b6-8eaf026db367', 'inv-1734158563-wJO5AzFb', NULL, '2024-12-14 13:42:44', '2024-12-14 13:43:30'),
	(83, 3, 3500000, 'success', '2059ad31-c04f-445a-9755-a1ce6c8051f0', 'inv-1734177448-jVGm47BB', NULL, '2024-12-14 18:57:30', '2024-12-14 18:58:18');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table technical-test-konnco.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','customer') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table technical-test-konnco.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Muhammad Anas Ma\'ruf', 'anasmaruf@gmail.com', '$2y$12$jhPBrOrR27dUC9PHOzWT8ODBL9vAwl/nwNXUw7WzQ8VOKJvYhBNL6', 'admin', NULL, '2024-12-11 08:05:06', '2024-12-11 08:05:06'),
	(2, 'test', 'test@gmail.com', '$2y$12$bReRuvYmb5w33pUvdTDJmeugUNauhtBXkPJthytRRq3Wk3AdI/8S2', 'admin', NULL, '2024-12-11 23:36:10', '2024-12-11 23:36:10'),
	(3, 'customer', 'customer@gmail.com', '$2y$12$qDbC8Hcv0HIK1woZqmsh7uNT9yUUfQTsIulIOmct4IHOhkn5CxsYC', 'customer', NULL, '2024-12-14 18:37:40', '2024-12-14 18:37:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
