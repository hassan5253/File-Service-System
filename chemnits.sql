-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 12:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chemnits`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `file_extension` varchar(10) NOT NULL,
  `file_size` varchar(10) DEFAULT NULL,
  `hash` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `file_name`, `file_path`, `file_extension`, `file_size`, `hash`, `status`, `timestamp`) VALUES
(1, 2, '171026-better-coffee-boost-se-329p-1656569504-0.jpg', 'app/uploads/files/171026-better-coffee-boost-se-329p-1656569504-0.jpg', 'jpg', '0.07212734', 'f4d1089e9fd249a85810611025015351b1439e792de5d5d5e3c453b93018f48f', 2, '2022-07-04 09:14:35'),
(2, 2, 'download - Copy-1656569504-1.jpg', 'app/uploads/files/download - Copy-1656569504-1.jpg', 'jpg', '0.00532055', '3cdda6d072ddcd830d71d1e1ad6aba45238430dc461dd780f26b1df37c541b84', 1, '2022-06-30 06:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_09_23_104924_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aliasghar@innovative-net.com', '$2y$10$YtU/Ggsk7NCixUR6CPQsMue/rD4viKvgHUuVSdKYqhkZqHDIkpdx6', '2019-03-29 14:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('TXLGtBYWVZUMljK3PZCZ5dlAfBVtbicP1kXk4vMa', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo1OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNzoiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsQXBwL3VzZXJzTGlzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJGYUlIa0VxeUZ3YkVOc09IcHlZaGJLU2NQMjNTQmJ4dUNnbHY0NVJxIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiZGF0ZSI7czoxMDoiMjAyMi0wNy0wNCI7fQ==', 1656928815);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `acc_type` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(60) NOT NULL,
  `password_resets` varchar(50) DEFAULT NULL,
  `password_status` tinyint(4) NOT NULL COMMENT '0 = not changed , 1 = changed',
  `status` int(11) NOT NULL DEFAULT 1,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `acc_type`, `name`, `username`, `email`, `password`, `remember_token`, `password_resets`, `password_status`, `status`, `timestamps`, `updated_at`, `created_at`) VALUES
(1, 'admin', 'Admin', 'admin', 'admin@gmail.com', '$2y$10$KgBYpvhsV384uy3PvssGPOWSvOMFcJzvh9o/Xxh5TzzZBSwu3fx7C', 'S1vgHwuBOpqnO4WuZgXG45v29zu2ntn2qt1WGSaR1n1MPKmKr7KZDwtkMk0i', NULL, 0, 1, '2022-07-04 09:52:18', '0000-00-00', '2022-06-28'),
(2, 'user', 'Test', 'Test', 'test@gmail.com', '$2y$10$KgBYpvhsV384uy3PvssGPOWSvOMFcJzvh9o/Xxh5TzzZBSwu3fx7C', 'Z6Y5MYfUkItUBNSFUcYh7RgajltktGXPslFwYbMOlx8Qejly32dnD3PJusIZ', NULL, 0, 1, '2022-07-04 08:08:48', '0000-00-00', '2022-06-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
