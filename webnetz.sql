-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 01:15 PM
-- Server version: 5.7.14
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webnetz`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'nature', 'heres', '2020-11-29 17:45:09', '2020-11-29 20:31:26'),
(2, 1, 'art', 'tesgterew fds', '2020-11-29 17:45:09', '2020-11-29 19:12:33'),
(3, 1, 'politics', 'tesgterew fds gfd', '2020-11-29 17:45:09', '2020-11-29 19:12:41'),
(4, 1, 'sports', 'here', '2020-11-29 18:22:33', '2020-11-29 19:12:52'),
(5, 1, 'business', 'here', '2020-11-29 18:23:17', '2020-11-29 19:13:00'),
(6, 1, 'movies', 'here', '2020-11-29 18:24:43', '2020-11-29 19:13:35'),
(7, 1, 'Tourism', 'here', '2020-11-29 19:11:46', '2020-11-29 19:13:44'),
(8, 1, 'eggs', NULL, '2020-11-30 01:57:36', '2020-11-30 01:57:36'),
(9, 1, 'cinema', NULL, '2020-11-30 01:59:01', '2020-11-30 01:59:01'),
(10, 4, 'Amna Ali', 'tester', '2020-11-30 03:17:05', '2020-11-30 03:17:12'),
(11, 4, 'art', 'a', '2020-11-30 03:17:24', '2020-11-30 03:17:24'),
(12, 4, 'here', NULL, '2020-11-30 03:18:29', '2020-11-30 03:18:29'),
(13, 5, 'cinema', NULL, '2020-11-30 11:51:09', '2020-11-30 11:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `category_image`
--

CREATE TABLE `category_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_image`
--

INSERT INTO `category_image` (`id`, `user_id`, `category_id`, `image_id`) VALUES
(59, 4, 12, 9),
(58, 4, 10, 9),
(61, 1, 4, 1),
(60, 1, 2, 1),
(5, 1, 1, 6),
(6, 1, 2, 6),
(7, 1, 3, 6),
(62, 5, 13, 10),
(55, 1, 9, 8),
(54, 1, 8, 8),
(53, 1, 1, 8),
(50, 1, 3, 7),
(49, 1, 2, 7),
(48, 1, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `exif` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `user_id`, `name`, `file_name`, `file_path`, `type`, `keywords`, `height`, `width`, `exif`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mahmoud Mostafa', '1606705234-57072658_2507715309262234_874840741765971968_n.jpg', 'uploaded/1606705234-57072658_2507715309262234_874840741765971968_n.jpg', 'image/jpeg', 'testing', 271, 460, '{"FileName":"1606705234-57072658_2507715309262234_874840741765971968_n.jpg","FileDateTime":1606705234,"FileSize":20174,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":"","COMPUTED":{"html":"width=\\"460\\" height=\\"271\\"","Height":271,"Width":460,"IsColor":1}}', '2020-11-29 22:57:27', '2020-11-30 11:39:02'),
(2, 1, 'Mahmoud Mostafa', '1606698541-download (13).jpg', 'uploaded/1606698541-download (13).jpg', 'image/jpeg', 'webnetz', 166, 304, '{"FileName":"1606698541-download (13).jpg","FileDateTime":1606698540,"FileSize":9798,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":"","COMPUTED":{"html":"width=\\"304\\" height=\\"166\\"","Height":166,"Width":304,"IsColor":1}}', '2020-11-30 00:09:01', '2020-11-30 11:39:48'),
(3, 1, 'Mahmoud Mostafa', '1606698567-download (13).jpg', 'uploaded/1606698567-download (13).jpg', 'image/jpeg', 'ادم ساندلر', 166, 304, '{"FileName":"1606698567-download (13).jpg","FileDateTime":1606698566,"FileSize":9798,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":"","COMPUTED":{"html":"width=\\"304\\" height=\\"166\\"","Height":166,"Width":304,"IsColor":1}}', '2020-11-30 00:09:27', '2020-11-30 00:09:27'),
(4, 1, 'Mahmoud Mostafa', '1606698618-download (13).jpg', 'uploaded/1606698618-download (13).jpg', 'image/jpeg', 'ادم ساندلر', 166, 304, '{"FileName":"1606698618-download (13).jpg","FileDateTime":1606698618,"FileSize":9798,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":"","COMPUTED":{"html":"width=\\"304\\" height=\\"166\\"","Height":166,"Width":304,"IsColor":1}}', '2020-11-30 00:10:19', '2020-11-30 00:10:19'),
(5, 1, 'Mahmoud Mostafa', '1606698667-125077669_10158902483562552_8458888283950203267_n.jpg', 'uploaded/1606698667-125077669_10158902483562552_8458888283950203267_n.jpg', 'image/jpeg', 'ادم ساندلر', 155, 325, '{"FileName":"1606698667-125077669_10158902483562552_8458888283950203267_n.jpg","FileDateTime":1606698667,"FileSize":7666,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":"","COMPUTED":{"html":"width=\\"325\\" height=\\"155\\"","Height":155,"Width":325,"IsColor":1}}', '2020-11-30 00:11:07', '2020-11-30 00:11:07'),
(6, 1, 'Mahmoud Mostafa', '1606698714-CM_1583506399.jpg', 'uploaded/1606698714-CM_1583506399.jpg', 'image/jpeg', 'ادم ساندلر', 367, 700, '{"FileName":"1606698714-CM_1583506399.jpg","FileDateTime":1606698714,"FileSize":31441,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":"ANY_TAG, IFD0","COMPUTED":{"html":"width=\\"700\\" height=\\"367\\"","Height":367,"Width":700,"IsColor":1,"ByteOrderMotorola":0},"Software":"Google"}', '2020-11-30 00:11:54', '2020-11-30 00:11:54'),
(7, 1, 'Mahmoud Mostafa a', '1606703932-124405453_1511594022366242_4948053462326233226_n.jpg', 'uploaded/1606703932-124405453_1511594022366242_4948053462326233226_n.jpg', 'image/jpeg', 'testersz', 422, 640, '{"FileName":"1606703932-124405453_1511594022366242_4948053462326233226_n.jpg","FileDateTime":1606703932,"FileSize":22149,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":"","COMPUTED":{"html":"width=\\"640\\" height=\\"422\\"","Height":422,"Width":640,"IsColor":1}}', '2020-11-30 00:17:06', '2020-11-30 01:38:52'),
(8, 1, 'testers', '1606705056-images (2).jpg', 'uploaded/1606705056-images (2).jpg', 'image/jpeg', 'testersz sa', 171, 295, '{"FileName":"1606705056-images (2).jpg","FileDateTime":1606705056,"FileSize":6122,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":"","COMPUTED":{"html":"width=\\"295\\" height=\\"171\\"","Height":171,"Width":295,"IsColor":1}}', '2020-11-30 01:57:36', '2020-11-30 01:57:36'),
(9, 4, 'Amna Alia', '1606709909-images (1).jpg', 'uploaded/1606709909-images (1).jpg', 'image/jpeg', 'testersz', 197, 256, '{"FileName":"1606709909-images (1).jpg","FileDateTime":1606709908,"FileSize":7566,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":"","COMPUTED":{"html":"width=\\"256\\" height=\\"197\\"","Height":197,"Width":256,"IsColor":1}}', '2020-11-30 03:18:29', '2020-11-30 03:18:29'),
(10, 5, 'Mahmoud Mostafa', '1606740669-109826847_10217416753192699_194410572854328437_n.jpg', 'uploaded/1606740669-109826847_10217416753192699_194410572854328437_n.jpg', 'image/jpeg', 'testersz sa', 175, 250, '{"FileName":"1606740669-109826847_10217416753192699_194410572854328437_n.jpg","FileDateTime":1606740669,"FileSize":10638,"FileType":2,"MimeType":"image\\/jpeg","SectionsFound":"","COMPUTED":{"html":"width=\\"250\\" height=\\"175\\"","Height":175,"Width":250,"IsColor":1}}', '2020-11-30 11:51:09', '2020-11-30 11:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2020_11_28_203005_create_sessions_table', 2),
(7, '2020_11_29_162753_create_category_table', 3),
(8, '2020_11_29_163308_create_category_image_table', 3),
(9, '2020_11_29_201538_create_image_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5fVbp9j5P0MHX4TTrENmNrNsGhDLb9iMZjoJod8j', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoia3AwdHdTcVBmZHkwejFBWkdDckE3czZvREJmNERZRkswNDRKNE54RyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly93ZWJuZXR6LnRlc3QvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJEJiTXFoOWhSRkNDQjJnUEI4akh3QXVnVFZEdmc0azdYbHFFNlhhSmFnYncvdE5SaXlaaXVpIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRCYk1xaDloUkZDQ0IyZ1BCOGpId0F1Z1RWRHZnNGs3WGxxRTZYYUphZ2J3L3ROUml5Wml1aSI7fQ==', 1606741047);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahmoud Mostafa', 'jinkazama_m@yahoo.com', NULL, '$2y$10$XNIjjvu3Doals.mOCVfkc.TBwowINLmQmNt93NkfbiTGRSJetAc3K', NULL, NULL, NULL, '2020-11-29 12:01:40', '2020-11-29 12:01:40'),
(2, 'Mahmoud Mostafa', 'jinkazamaa_m@yahoo.com', NULL, '$2y$10$YE15qiUFBm5KD8RcaON6SuloDKPBYIpq9hDeiJzFSR.h2K9RJszHO', NULL, NULL, NULL, '2020-11-29 14:26:09', '2020-11-29 14:26:09'),
(3, 'Mahmoud Mostafa', 'jinkazamaaa_m@yahoo.com', NULL, '$2y$10$1Fo4YeYOb1.uBNCFUff.aOePIoet1DqD2mDAHLcRIEKYH0x2gHXBe', NULL, NULL, NULL, '2020-11-29 14:38:54', '2020-11-29 14:38:54'),
(4, 'Mahmoud Mostafa', 'test@test.com', NULL, '$2y$10$LmMkjO8bXF8P2OEhlawicOxiIn3HXp2pVDzTKtCfFyCzL7lrscGOu', NULL, NULL, NULL, '2020-11-30 03:15:57', '2020-11-30 03:15:57'),
(5, 'Mahmoud Mostafa', 'tester@test.com', NULL, '$2y$10$BbMqh9hRFCCB2gPB8jHwAugTVDvg4k7XlqE6XaJagbw/tNRiyZiui', NULL, NULL, NULL, '2020-11-30 11:47:31', '2020-11-30 11:47:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_user_id_index` (`user_id`);

--
-- Indexes for table `category_image`
--
ALTER TABLE `category_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_image_user_id_index` (`user_id`),
  ADD KEY `category_image_image_id_index` (`image_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_user_id_index` (`user_id`),
  ADD KEY `image_type_index` (`type`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `category_image`
--
ALTER TABLE `category_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
