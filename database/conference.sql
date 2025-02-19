-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 06:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `booths`
--

CREATE TABLE `booths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booth_name` varchar(255) NOT NULL,
  `map_id` int(11) NOT NULL,
  `status` enum('available','occupied','reserved') NOT NULL DEFAULT 'available',
  `price` decimal(10,2) NOT NULL,
  `position_x` decimal(8,2) NOT NULL,
  `position_y` decimal(8,2) NOT NULL,
  `transform_x` decimal(8,2) DEFAULT NULL,
  `transform_y` decimal(8,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `booth_icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booths`
--

INSERT INTO `booths` (`id`, `booth_name`, `map_id`, `status`, `price`, `position_x`, `position_y`, `transform_x`, `transform_y`, `description`, `booth_icon`, `created_at`, `updated_at`) VALUES
(1, '#B0001', 1, 'available', 20.00, 100.00, 100.00, 327.00, 302.00, 'booth 1', NULL, '2024-11-02 10:17:34', '2024-11-02 12:47:37'),
(2, '#B0002', 1, 'reserved', 22.00, 100.00, 100.00, 230.00, 197.00, 'booth 2', NULL, '2024-11-02 10:17:34', '2024-11-02 12:47:37'),
(3, '#B0003', 1, 'occupied', 25.00, 100.00, 100.00, 420.00, 303.00, 'booth 3', NULL, '2024-11-02 10:17:34', '2024-11-02 12:47:37'),
(4, '#B0004', 1, 'available', 258.00, 100.00, 100.00, 325.00, 117.00, 'booth 3', NULL, '2024-11-02 11:02:36', '2024-11-02 12:47:37'),
(5, '#B0005', 1, 'available', 258.00, 100.00, 100.00, 326.00, 192.00, 'booth 5', NULL, '2024-11-02 11:08:06', '2024-11-02 12:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eac_details`
--

CREATE TABLE `eac_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `eac_country` varchar(255) NOT NULL,
  `nic_nida` varchar(255) NOT NULL,
  `nic_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(191) NOT NULL DEFAULT 'event_images/AI-Business-growth.png',
  `topic` varchar(255) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `description` longtext NOT NULL,
  `documents` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `image_url`, `topic`, `from`, `to`, `start_time`, `end_time`, `description`, `documents`, `created_at`, `updated_at`) VALUES
(1, 'event_images/event-attending-conference.png', 'Topic: International Conference on Artificial Intelligence and Future of Work 2024 (ICAFW2024)', '2024-05-18', '2024-05-20', '08:54:00', '17:30:00', '<p>ICAFW 2024 is a pioneering initiative that harmonizes the dynamic landscape of the future of work with cutting-edge advancements in Artificial Intelligence (AI). It provides a unique platform to explore, deliberate, and strategize the intersection of AI, technology, and the evolving nature of work. The event aims to foster insightful discussions, showcase practical applications, and catalyze collaborative efforts to shape a progressive and sustainable future.&nbsp;</p>', '', '2024-05-26 04:29:51', '2024-05-26 04:46:20'),
(2, 'event_images/AI-Business-growth.png', 'Topic: AI Training for Business Growth', '2024-03-21', '2024-03-22', '07:30:00', '17:30:00', '<p>The training is about how AI is shaping the future of business, explore the latest AI tools and technologies and identify impactful use cases within your business. As a technology, AI has sufficiently matured to the point where it can bring a significant business impact on a global scale. The challenge now is how to make effective use of it. As an executive or business leader, it’s not a question of how to build it, but how you can create real value from AI.&nbsp;</p><p>In this program, you will learn how to use this technology to bring real value to your organization. As a participant, you will:&nbsp;</p><ul><li>Learn how to overcome management hurdles, convince stakeholders of the value of AI and generate a commitment to growing this capability</li><li>Make informed decisions on choosing the best AI technology to create business value</li><li>Enhance your organizational capacity for harnessing the power of AI, and learn to communicate more effectively with your technology specialists</li><li>Kick-start your implementation back in your workplace with a 02-day AI implementation plan.</li></ul><p><br><br><br><br></p>', '', '2024-05-26 04:43:26', '2024-05-26 04:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `exhibition_maps`
--

CREATE TABLE `exhibition_maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `map_name` varchar(255) NOT NULL,
  `map_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exhibition_maps`
--

INSERT INTO `exhibition_maps` (`id`, `map_name`, `map_image`, `created_at`, `updated_at`) VALUES
(1, 'Map 1', 'floor_map_plan_1730553007.png', '2024-11-02 10:10:07', '2024-11-02 10:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `exhibitors`
--

CREATE TABLE `exhibitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `booth_name` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `booth_id` int(11) NOT NULL,
  `map_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foreigner_details`
--

CREATE TABLE `foreigner_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `invoice_type` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `status` enum('pending','waiting','paid','failed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `account_number` bigint(20) UNSIGNED DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','scum','failed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label_name` varchar(255) NOT NULL,
  `map_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `label_description` text DEFAULT NULL,
  `position_x` decimal(8,2) NOT NULL,
  `position_y` decimal(8,2) NOT NULL,
  `transform_x` decimal(8,2) DEFAULT NULL,
  `transform_y` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `label_name`, `map_id`, `color`, `label_description`, `position_x`, `position_y`, `transform_x`, `transform_y`, `created_at`, `updated_at`) VALUES
(1, '#L1', 1, 'rgb(0, 0, 255)', NULL, 300.60, 163.60, 53.00, 321.00, '2024-11-02 10:26:03', '2024-11-02 12:47:37'),
(2, '#L2', 1, 'rgb(212, 0, 255)', NULL, 300.60, 163.60, 343.00, 31.00, '2024-11-02 10:26:03', '2024-11-02 12:47:37'),
(3, '#L6', 1, 'rgb(255, 255, 255)', NULL, 300.60, 163.60, 234.00, 131.00, '2024-11-02 10:26:03', '2024-11-02 12:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `locals_details`
--

CREATE TABLE `locals_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `nida` varchar(255) NOT NULL,
  `nida_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locals_details`
--

INSERT INTO `locals_details` (`id`, `registration_id`, `nida`, `nida_image`, `created_at`, `updated_at`) VALUES
(13, 35, '20000621251110000120', 'assets/images/participants/nida_locals_35.jpg', '2024-10-31 11:21:22', '2024-10-31 11:21:22'),
(14, 36, '20000621251110000120', 'assets/images/participants/nida_locals_36.png', '2024-10-31 11:30:55', '2024-10-31 11:30:55'),
(15, 38, '20000621251110000120', 'assets/images/participants/nida_locals_38.png', '2024-10-31 23:29:27', '2024-10-31 23:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_25_103436_create_speakers_table', 2),
(5, '2024_09_26_052239_create_events_table', 3),
(7, '2024_09_26_110609_create_sponsors_table', 4),
(8, '2024_10_02_121916_create_registrations_table', 5),
(9, '2024_10_02_122034_create_foreigner_details_table', 5),
(10, '2024_10_02_122137_create_locals_details_table', 5),
(11, '2024_10_02_122210_create_eac_details_table', 5),
(12, '2024_10_02_122254_create_students_details_table', 5),
(13, '2024_10_05_142253_create_newsletter_subscriptions_table', 5),
(38, '2024_10_05_154438_create_contacts_table', 6),
(39, '2024_10_09_134108_create_exhibitors_table', 7),
(40, '2024_10_09_142209_create_booths_table', 7),
(41, '2024_10_10_043746_create_exhibitors_map_section', 7),
(42, '2024_10_10_102618_create_labels', 7),
(43, '2024_10_21_194434_create_invoices_table', 7),
(49, '2024_11_02_043626_invoice_details', 8),
(51, '2024_11_02_091817_sponsorship_packages', 9);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscriptions`
--

CREATE TABLE `newsletter_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_subscriptions`
--

INSERT INTO `newsletter_subscriptions` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'SAMWEL MMARI', 'spom.mmari@gmail.com', '2024-10-05 12:03:17', '2024-10-05 12:03:17'),
(2, 'SAMWEL MMARI', 'superman@gmail.com', '2024-10-05 13:27:58', '2024-10-05 13:27:58'),
(3, 'sdfg', 'super@happ.com', '2024-10-05 13:29:37', '2024-10-05 13:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `package_type` enum('foreigner','locals','eac','students') NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `full_name`, `organization`, `job_title`, `phone`, `email`, `package_type`, `invoice_number`, `created_at`, `updated_at`) VALUES
(35, 'HERIEL', 'TRA', 'DIRECTOR', '0784629597', 'herieldavid143@gmail.com', 'locals', 497978, '2024-10-31 11:21:22', '2024-10-31 11:21:22'),
(36, 'SAMWEL MMARI', 'CBE', 'DIRECTOR', '0784629597', 'spmari@gmail.com', 'locals', 943781, '2024-10-31 11:30:55', '2024-10-31 11:30:55'),
(38, 'SAMWEL MMARI', 'TRA', 'Software Developer', '0784629597', 'spom.mmari@gmail.com', 'locals', 838193, '2024-10-31 23:29:27', '2024-10-31 23:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('i2guRSmzmA8T9ZEWt6GKoT9gl9E8KeSovTMGBMY6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkpXbTVVd2lOZHNvbnRCeGU2cmplZndNTFN3WFFRUUxRVDFVcVAzQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9leGhpYml0b3JzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1730568042);

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `abstract` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `bio` text NOT NULL,
  `has_honor` tinyint(1) DEFAULT 0,
  `status` enum('pending','approved','rejected','revision_requested') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`id`, `name`, `company`, `title`, `phone`, `email`, `location`, `topic`, `abstract`, `image`, `bio`, `has_honor`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Axel Angeli', 'Logosworld', NULL, '1234567890', 'axel.angeli@example.com', 'Germany', 'AI in Enterprise Solutions', 'Abstract of Axel Angeli', '1.jpg', 'Bio of Axel Angeli', 0, 'approved', '2024-10-05 20:13:04', '2024-10-05 20:13:04'),
(3, 'Dr. Zaipuna Yonah', NULL, 'Chairman – ARIFA', '1234567890', 'zaipuna.yonah@example.com', 'Tanzania', 'AI and Cybersecurity', 'Abstract of Zaipuna Yonah', '3.jpg', 'Bio of Zaipuna Yonah', 1, 'approved', '2024-10-05 20:13:04', '2024-10-05 20:13:04'),
(4, 'Prof. Houda Chihi', NULL, 'Sr. Eng. – Tunisia Telecom', '1234567890', 'houda.chihi@example.com', 'Tunisia', 'AI in Telecommunications', 'Abstract of Houda Chihi', '4.jpg', 'Bio of Houda Chihi', 1, 'approved', '2024-10-05 20:13:04', '2024-10-05 20:13:04'),
(6, 'Mr. John Kamara', NULL, 'Founder – AICE', '1234567890', 'john.kamara@example.com', 'Kenya', 'AI for Social Impact', 'Abstract of John Kamara', '6.jpg', 'Bio of John Kamara', 1, 'approved', '2024-10-05 20:13:04', '2024-10-05 20:13:04'),
(8, 'Dr. Nkundwe Mwasaga', NULL, 'DG – ICTC', '1234567890', 'nkundwe.mwasaga@example.com', 'Tanzania', 'AI in ICT', 'Abstract of Nkundwe Mwasaga', '8.jpg', 'Bio of Nkundwe Mwasaga', 0, 'approved', '2024-10-05 20:13:04', '2024-10-05 20:13:04'),
(9, 'Mr. Praveen Krishnan', NULL, 'CMD – Safe Software', '1234567890', 'praveen.krishnan@example.com', 'India', 'AI in Software Development', 'Abstract of Praveen Krishnan', '9.jpg', 'Bio of Praveen Krishnan', 0, 'approved', '2024-10-05 20:13:04', '2024-10-05 20:13:04'),
(13, 'Prof. Benedictor Nguchu', NULL, 'PostDoc – USTC', '1234567890', 'benedictor.nguchu@example.com', 'China', 'AI in Scientific Research', 'Abstract of Benedictor Nguchu', '13.jpg', 'Bio of Benedictor Nguchu', 0, 'approved', '2024-10-05 20:13:04', '2024-10-05 20:13:04'),
(14, 'Prof. Heechoon Kwon', NULL, 'President – NACSI', '1234567890', 'heechoon.kwon@example.com', 'South Korea', 'AI in National Security', 'Abstract of Heechoon Kwon', '14.jpg', 'Bio of Heechoon Kwon', 0, 'approved', '2024-10-05 20:13:04', '2024-10-05 20:13:04'),
(15, 'Dr. Amit Pandey', NULL, 'CTO – Rovial Space', '1234567890', 'amit.pandey@example.com', 'France', 'AI in Space Technology', 'Abstract of Amit Pandey', '15.jpg', 'Bio of Amit Pandey', 0, 'approved', '2024-10-05 20:13:04', '2024-10-05 20:13:04'),
(16, 'MICHAEL RICHARD STEPHANO', 'ARIFA', 'oop', '0712256895', 'spom.mmari@gmail.com', 'DSM', 'BUSINESS AND AI', 'kkl', '1730289198-spom.jpeg', 'bbn', 0, 'pending', '2024-10-30 08:53:18', '2024-10-30 08:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `logo_path` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `package_type` enum('Gold','Silver','Bronze') NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `invoice_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsorship_packages`
--

CREATE TABLE `sponsorship_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `benefits` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`benefits`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsorship_packages`
--

INSERT INTO `sponsorship_packages` (`id`, `name`, `price`, `description`, `benefits`, `created_at`, `updated_at`) VALUES
(1, 'Gold Sponsor', 10000.00, 'Premium visibility and branding', '[\"Logo placement on all event materials\",\"Dedicated booth space at the conference\",\"Opportunity to give a keynote speech\",\"Featured in press releases and social media promotions\"]', '2024-11-02 06:59:07', '2024-11-02 06:59:07'),
(2, 'Silver Sponsor', 5000.00, 'Good visibility and branding', '[\"Logo placement on select event materials\",\"Shared booth space at the conference\",\"Recognition during sessions\",\"Inclusion in event-related social media posts\"]', '2024-11-02 06:59:07', '2024-11-02 06:59:07'),
(3, 'Bronze Sponsor', 2500.00, 'Basic visibility and branding', '[\"Logo placement on the conference website\",\"Recognition in the event program\",\"Inclusion in the thank-you email sent to attendees\"]', '2024-11-02 06:59:07', '2024-11-02 06:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `students_details`
--

CREATE TABLE `students_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `registration_number` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booths`
--
ALTER TABLE `booths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booths_booth_name_unique` (`booth_name`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `eac_details`
--
ALTER TABLE `eac_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `eac_details_registration_id_unique` (`registration_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibition_maps`
--
ALTER TABLE `exhibition_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibitors`
--
ALTER TABLE `exhibitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exhibitor_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foreigner_details`
--
ALTER TABLE `foreigner_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `foreigner_details_registration_id_unique` (`registration_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_details_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locals_details`
--
ALTER TABLE `locals_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locals_details_registration_id_unique` (`registration_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscriptions`
--
ALTER TABLE `newsletter_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletter_subscriptions_email_unique` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registrations_email_unique` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsorship_packages`
--
ALTER TABLE `sponsorship_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_details`
--
ALTER TABLE `students_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_details_registration_id_unique` (`registration_id`);

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
-- AUTO_INCREMENT for table `booths`
--
ALTER TABLE `booths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eac_details`
--
ALTER TABLE `eac_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exhibition_maps`
--
ALTER TABLE `exhibition_maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exhibitors`
--
ALTER TABLE `exhibitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foreigner_details`
--
ALTER TABLE `foreigner_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locals_details`
--
ALTER TABLE `locals_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `newsletter_subscriptions`
--
ALTER TABLE `newsletter_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsorship_packages`
--
ALTER TABLE `sponsorship_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students_details`
--
ALTER TABLE `students_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eac_details`
--
ALTER TABLE `eac_details`
  ADD CONSTRAINT `eac_details_registration_id_foreign` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `foreigner_details`
--
ALTER TABLE `foreigner_details`
  ADD CONSTRAINT `foreigner_details_registration_id_foreign` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locals_details`
--
ALTER TABLE `locals_details`
  ADD CONSTRAINT `locals_details_registration_id_foreign` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students_details`
--
ALTER TABLE `students_details`
  ADD CONSTRAINT `students_details_registration_id_foreign` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
