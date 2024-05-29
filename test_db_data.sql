-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.1.48-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дамп структуры для таблица photo_site_db.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы photo_site_db.categories: ~4 rows (приблизительно)
INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Ship', '2024-05-28 07:01:10', '2024-05-28 07:04:20', '2024-05-28 07:04:20'),
	(2, 'Nature', '2024-05-28 07:05:04', '2024-05-28 07:05:04', NULL),
	(3, 'Animals', '2024-05-28 15:11:18', '2024-05-28 15:11:18', NULL),
	(4, 'Science', '2024-05-28 15:11:25', '2024-05-28 15:11:25', NULL);

-- Дамп структуры для таблица photo_site_db.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `photo_id` bigint(20) unsigned NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_photo_id_foreign` (`photo_id`),
  CONSTRAINT `comments_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы photo_site_db.comments: ~5 rows (приблизительно)
INSERT INTO `comments` (`id`, `user_id`, `photo_id`, `message`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'Boba', '2024-05-29 08:43:30', '2024-05-29 08:43:30'),
	(2, 2, 6, 'asdadsa', '2024-05-29 13:25:29', '2024-05-29 13:25:29'),
	(3, 2, 6, 'asdadsa', '2024-05-29 13:25:56', '2024-05-29 13:25:56'),
	(4, 2, 6, 'bub', '2024-05-29 13:26:03', '2024-05-29 13:26:03'),
	(5, 4, 3, 'Eta zhizn', '2024-05-29 13:43:32', '2024-05-29 13:43:32'),
	(6, 2, 3, '123', '2024-05-29 14:46:47', '2024-05-29 14:46:47'),
	(7, 2, 3, '123', '2024-05-29 14:46:51', '2024-05-29 14:46:51'),
	(8, 2, 3, '123', '2024-05-29 14:46:55', '2024-05-29 14:46:55'),
	(9, 2, 3, '123', '2024-05-29 14:46:58', '2024-05-29 14:46:58'),
	(10, 2, 3, '123', '2024-05-29 14:47:01', '2024-05-29 14:47:01'),
	(11, 2, 3, '123', '2024-05-29 14:47:07', '2024-05-29 14:47:07'),
	(12, 2, 3, '123', '2024-05-29 14:47:13', '2024-05-29 14:47:13');

-- Дамп структуры для таблица photo_site_db.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы photo_site_db.failed_jobs: ~0 rows (приблизительно)

-- Дамп структуры для таблица photo_site_db.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы photo_site_db.messages: ~1 rows (приблизительно)
INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
	(1, 'bob', 'asd@gmail.com', '+123456789', 'asdasd', '2024-05-29 14:36:43', '2024-05-29 14:36:43');

-- Дамп структуры для таблица photo_site_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы photo_site_db.migrations: ~17 rows (приблизительно)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(8, '2014_10_12_000000_create_users_table', 1),
	(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(10, '2019_08_19_000000_create_failed_jobs_table', 1),
	(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(12, '2024_05_28_091835_create_categories_table', 1),
	(13, '2024_05_28_092057_create_photos_table', 1),
	(14, '2024_05_28_092544_create_comments_table', 1),
	(16, '2024_05_28_094826_rename_name_column_in_categories_table', 2),
	(18, '2024_05_28_100327_add_soft_deletes_to_categories_table', 3),
	(21, '2024_05_28_164102_rename_name_column_in_photos_table', 4),
	(22, '2024_05_28_164217_add_soft_deletes_to_photos_table', 4),
	(23, '2024_05_28_184500_add_role_column_to_users_table', 5),
	(26, '2014_10_12_100000_create_password_resets_table', 6),
	(27, '2024_05_28_201813_add_user_id_column_to_photos_table', 6),
	(30, '2024_05_29_070435_add_soft_deletes_to_users_table', 7),
	(31, '2024_05_29_070519_add_photo_user_likes_table', 7),
	(32, '2024_05_29_172205_create_messages_table', 8);

-- Дамп структуры для таблица photo_site_db.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы photo_site_db.password_resets: ~0 rows (приблизительно)

-- Дамп структуры для таблица photo_site_db.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы photo_site_db.password_reset_tokens: ~0 rows (приблизительно)

-- Дамп структуры для таблица photo_site_db.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

-- Дамп данных таблицы photo_site_db.personal_access_tokens: ~0 rows (приблизительно)

-- Дамп структуры для таблица photo_site_db.photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `photo_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preview_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photos_category_id_foreign` (`category_id`),
  KEY `photos_user_id_foreign` (`user_id`),
  CONSTRAINT `photos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы photo_site_db.photos: ~8 rows (приблизительно)
INSERT INTO `photos` (`id`, `user_id`, `photo_name`, `caption`, `preview_image`, `main_image`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'My edited tree', 'such a good tree', 'images/sCOX3Sk8y7KZcsfN49Fh9mzMCsxO58mQKqebbqwy.jpg', 'images/icVr8b8QyD6xNSuv4UY6E2c8MMjDE77DWwYfv4WK.jpg', 2, '2024-05-28 15:23:59', '2024-05-28 15:40:23', '2024-05-28 15:40:23'),
	(2, 1, 'My good tree', 'such a good tree for me', 'images/GR4vYEKUkXt2xqgzIjc2wVe8eB0rWktPpCVKerzx.jpg', 'images/5QJ8qmwyJaZZgxNLxD26bwkY2oSu7g2TBe726kTC.jpg', 2, '2024-05-28 15:41:03', '2024-05-28 15:41:03', NULL),
	(3, 3, 'Autism monkey', 'monkey with autism', 'images/pvD6HFj8b13PFLeGRooKVhKWubvtet0glxdhHyGs.png', 'images/cM8NnHWxzbpUqRTIYXDm14kl3lRVCqQARW1Jd4MC.png', 3, '2024-05-28 17:32:23', '2024-05-28 17:32:23', NULL),
	(4, 2, 'Leaves', 'just a leaves', 'images/3MJvvPb29qxbqmqxbfDCLlXWEzBmbep12GIgk78o.jpg', 'images/fIxzkrWZj9szcv1OeOUwF6y3U53AudCtXa7G65FP.jpg', 2, '2024-05-28 17:55:33', '2024-05-29 04:49:55', '2024-05-29 04:49:55'),
	(5, 3, 'little more leaves', 'a bit', 'images/Df3RWZGOY9Xsee2H418LukxlPjlEiCr5u6MWOqSM.jpg', 'images/HNI0B0U0hgYjvvMe1MmdhSNqSUFNLommlBos0E6h.jpg', 2, '2024-05-28 17:56:03', '2024-05-28 17:56:03', NULL),
	(6, 2, 'one more leaves', 'leaves', 'images/SpkPqCCJF79yLBP6PjTIOlu6DjSQHAuAhB1Toq3Q.jpg', 'images/BQNLGzYpmtr4y9Bz3w3zZDJLiut2I3bWelxxVLzJ.jpg', 2, '2024-05-28 17:56:20', '2024-05-28 17:56:20', NULL),
	(7, 3, 'science', 'something', 'images/xRFUiJZyreMdtuUmE7VqhiyqdOYFof1ag7UJAgYb.jpg', 'images/xYSoNGUe6A9q1WlC1UtTQL66oVZuURpcFXjmuuQb.jpg', 4, '2024-05-28 17:57:44', '2024-05-28 17:57:44', NULL),
	(8, 1, 'Red panda', 'panda', 'images/NzUVazGceZfJu8mQEJTqFGMUl8UTy06sRSGixiZY.jpg', 'images/7FImh0NDtFXbiWbYwaDrHsyK49XBcZsdXroYYv9Y.jpg', 3, '2024-05-29 04:32:52', '2024-05-29 04:32:52', NULL),
	(9, 2, 'Autism monkey', 'num2', 'images/B4BOlsct54p9kCklXJQyekbkiy5iCDKu2J2AUogu.jpg', 'images/oe8ZUXOz67tvZgB1ZQ4fmgCFe3eB5CXolVidtWdY.jpg', 3, '2024-05-29 09:53:27', '2024-05-29 09:53:27', NULL),
	(10, 2, 'My photo', 'just my photo', 'images/y490vAxMdNv75h2Qzna6XycSX8zO1YaV8NjkLuwh.png', 'images/bOJBRUnIvdhQfE1qWvkGjHWR1DfiA6VtsJSatYyY.png', 3, '2024-05-29 16:29:39', '2024-05-29 16:29:39', NULL),
	(11, 2, 'Test Photo', 'my test photo', 'images/wiwVlzO0d1ZQFZfsP8qSOei87cyXCJpuCAj1u5YV.jpg', 'images/xy80iSSYrAfPyeBtANAqd0h1CD0P1cjQqBwdQog0.jpg', 2, '2024-05-29 16:33:29', '2024-05-29 16:33:29', NULL),
	(12, 2, 'asd', 'asd', 'images/3MVzuIVWBYTbnkjNWvc9TXlwjIhbLegbK0LfXv68.jpg', 'images/gjTUvqntWsszj1fLJdBdslQwVVeRpG9YASexo0Fr.jpg', 3, '2024-05-29 17:04:47', '2024-05-29 17:04:47', NULL);

-- Дамп структуры для таблица photo_site_db.photo_user_likes
CREATE TABLE IF NOT EXISTS `photo_user_likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_user_likes_photo_id_foreign` (`photo_id`),
  KEY `photo_user_likes_user_id_foreign` (`user_id`),
  CONSTRAINT `photo_user_likes_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `photo_user_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы photo_site_db.photo_user_likes: ~8 rows (приблизительно)
INSERT INTO `photo_user_likes` (`id`, `photo_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(2, 4, 1, '2024-05-29 12:09:36', '2024-05-29 12:09:37'),
	(5, 2, 1, '2024-05-29 12:09:36', '2024-05-29 12:09:37'),
	(8, 4, 2, '2024-05-29 12:09:35', '2024-05-29 12:09:38'),
	(9, 4, 3, '2024-05-29 12:09:35', '2024-05-29 12:09:34'),
	(12, 7, 1, '2024-05-29 12:09:33', '2024-05-29 12:09:34'),
	(14, 5, 2, NULL, NULL),
	(15, 5, 3, NULL, NULL),
	(16, 2, 3, NULL, NULL),
	(17, 8, 3, NULL, NULL),
	(18, 9, 2, NULL, NULL);

-- Дамп структуры для таблица photo_site_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` smallint(6) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы photo_site_db.users: ~4 rows (приблизительно)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `deleted_at`) VALUES
	(1, 'john', 'johndoe@gmail.com', NULL, '$2y$12$K74j6yG4yQEhgCYC.AXteuCExSl6JHWCtHCHTe0ymvNI6ApxBUA9G', 'ymeEzKMM7JImIqbYlszpUOWpcAzGwacWMsp6w49FVSq8i84FxTw2ysIlRq7c', '2024-05-28 19:06:47', '2024-05-28 19:06:48', 0, NULL),
	(2, 'bob', 'bob@gmail.com', NULL, '$2y$12$PcgR8T6SOHhHYjQivJXL2OIk1F2N3/hb1gzljKsDAQ1BhgkdjwFEq', 'V1lJWEXE6GzmKbS2J6BRv5nZp8z6RlpitMoQpUI0o8BhnSv73dzDks2pPABf', '2024-05-28 16:56:12', '2024-05-28 16:56:12', 1, NULL),
	(3, 'Common user', 'user@gmail.com', NULL, '$2y$12$0AqF5T4pxtWMOJDBypw/mO7RK3ayRDDZV2wzfZhmHo0XMz9X5OF3O', NULL, '2024-05-28 17:00:13', '2024-05-28 17:00:13', 1, NULL),
	(4, 'Bububu', 'asd@gmail.com', NULL, '$2y$12$.lBRpMf4xtPOm0XskD7Z6e6g563Onx8MoMfPGW7XZ4l5vNSe6jZmC', NULL, '2024-05-29 13:30:41', '2024-05-29 13:30:41', 1, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
