-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2019 at 09:49 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tadrebak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$3xtFa82z2mLx3.GmIB9BIehZfGqvYQ/s7QqKdghk8CSIE7rzpBvYC', 'HjCfavawtZz2vcmdzm3fk8mAhzlyjDBzyX7ACJV2GCiEqxwrvlMI6qcew5UB', NULL, '2017-11-18 12:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `englishname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `englishname`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'حضانه', 'incubation', '8.jpg', NULL, '2017-11-08 09:18:14', '2017-11-08 09:18:14'),
(2, 'مدارس', 'schools', '3.jpg', NULL, '2017-11-08 09:18:19', '2017-11-08 09:18:19'),
(3, 'كلية', 'colleges', '6.jpg', NULL, '2017-11-22 13:24:07', '2017-11-22 13:24:07'),
(4, 'مركز تدريب', 'training_centers', '2.jpg', NULL, '2017-11-22 13:27:27', '2017-11-22 13:27:27'),
(5, 'جامعات', 'universities', '1.jpg', NULL, '2017-11-08 09:18:30', '2017-11-08 09:18:30'),
(9, 'معاهد', 'institute', '', NULL, '2017-11-08 09:18:24', '2017-11-14 12:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `city_id` int(11) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special` tinyint(4) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `allow_images` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `name`, `name_ar`, `image`, `category_id`, `user_id`, `city_id`, `region_id`, `address`, `description`, `phone`, `email`, `facebook`, `website`, `special`, `approved`, `allow_images`, `created_at`, `updated_at`) VALUES
(1, 'morsy academy', 'اكادميه مرسيكو للتكنولجيا', '15100702755709_543856255790673_8931036029391662312_n.jpg', 5, 2, 3, 1, 'new address', 'aaa', '011', 'admin@admin.com', NULL, 'aa.com', 0, 1, 0, '2017-11-07 13:57:55', '2017-12-07 15:20:19'),
(2, 'morsy academy 2', 'اكادميه مرسيكو للتكنولجيا 2', '15100783655709_543856255790673_8931036029391662312_n.jpg', 5, 2, 3, 1, 'العنوان', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ', '011', 'admin@admin.com', NULL, 'aa.com', 0, 1, 0, '2017-11-07 16:12:45', '2017-11-08 09:28:36'),
(3, 'company name', 'اسم الشركه', '', 3, 2, 3, 1, 'العنوان', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ', '011', 'k@k1.com', 'facebook.com', 'aa.com', 0, 1, 0, '2017-11-07 16:13:07', '2017-11-08 09:28:03'),
(4, 'sdasa', 'dsad', '', 4, 0, 3, 1, 'العنوان', NULL, '011', 'admin@admin.com', NULL, 'aa.com', 1, 1, 0, '2017-11-08 08:41:34', '2017-11-08 09:28:46'),
(5, 'morsy academy 3', 'اكادميه مرسيكو للتكنولجيا 3', '', 3, 0, 3, 1, 'العنوان', NULL, '011', 'admin@admin.com', 'facebook.com', 'aa.com', 0, 1, 0, '2017-11-08 09:59:08', '2017-11-08 09:59:08'),
(6, 'منمن', 'نتمن', '', 3, 0, 1, 103, 'منكمنمكمكم', 'منكنمن', '6565656', NULL, 'كمكم', 'كمك', 0, 1, 0, '2017-11-08 10:04:08', '2017-11-08 10:04:08'),
(7, 'morsy academy 4', 'اكادميه مرسيكو للتكنولجيا 4', '', 3, 0, 3, 1, 'العنوان', NULL, '011', NULL, NULL, NULL, 1, 1, 0, '2017-11-08 10:08:05', '2017-11-08 10:10:03'),
(8, 'morsy academy 5', 'اكادميه مرسيكو للتكنولجيا 5', '1510409336morsy.jpg', 3, 0, 3, 1, 'العنوان', NULL, '011', NULL, NULL, NULL, 0, 1, 0, '2017-11-08 10:19:57', '2017-11-11 12:08:56'),
(9, 'morsy academy 6', 'اكادميه مرسيكو للتكنولجيا 6', '', 3, 0, 3, 1, 'العنوان', NULL, '011', NULL, NULL, NULL, 0, 1, 0, '2017-11-08 10:20:42', '2017-11-08 10:20:42'),
(10, 'morsy academy 7', 'اكادميه مرسيكو للتكنولجيا 7', '', 3, 0, 3, 1, 'العنوان', NULL, '011', NULL, NULL, NULL, 0, 1, 0, '2017-11-08 10:21:12', '2017-11-08 10:21:12'),
(11, 'morsy academy 8', 'اكادميه مرسيكو للتكنولجيا 8', '', 5, 0, 3, 1, 'العنوان', NULL, '011', NULL, NULL, NULL, 0, 1, 0, '2017-11-14 08:41:03', '2017-11-14 08:41:03'),
(42, 'new nursery', 'حضانه جديده', 'icon-tadrebak-500.png', 1, 0, 2, 259, 'العنوان', NULL, '3', NULL, NULL, NULL, 0, 1, 0, '2017-11-22 07:22:23', '2017-11-22 07:22:23'),
(43, 'new nursery 2', 'حضانه جديده 2', 'icon-tadrebak-500.png', 1, 0, 3, 1, 'عنواااااااااااااااااااااااااااااان كبيييييييييييييييييييييييييييييييييييير', NULL, '2', NULL, NULL, NULL, 0, 1, 0, '2017-11-22 07:26:28', '2017-11-22 07:26:28'),
(45, '3new nursery', 'حضانه جديده 3', 'icon-tadrebak-500.png', 1, 0, 3, 1, 'العنوان', NULL, '2', NULL, NULL, NULL, 0, 1, 0, '2017-11-22 07:31:35', '2017-11-22 07:31:35'),
(49, 'new school', 'مدرسه جديده', 'icon-tadrebak-500.png', 2, 0, 3, 1, 'العنوان', NULL, '1', NULL, NULL, NULL, 0, 1, 0, '2017-11-22 12:27:07', '2017-11-22 12:27:07'),
(120, 'morsy', 'مرسي', 'icon-tadrebak-500.png', 4, 0, 3, 42, 'fdgfg', 'dsfsdfsd', '01155490824', 'heshamhossam700@yahoo.com', 'fb/morsy', 'youtube*/morsy', 0, 1, 0, '2017-11-26 09:39:55', '2017-11-26 09:39:55'),
(121, 'new trainging center', 'مركز تدريب جديد', 'icon-tadrebak-500.png', 4, 0, 3, 1, 'العنوان', NULL, '011', NULL, NULL, NULL, 0, 1, 0, '2017-11-26 09:45:49', '2017-11-26 09:45:49'),
(132, 'new trainging center 2', 'مركز تدريب جديد2', 'icon-tadrebak-500.png', 4, 0, 3, 1, 'العنوان', NULL, '011', NULL, NULL, NULL, 0, 1, 0, '2017-11-26 12:08:34', '2017-11-26 12:08:34'),
(142, 'hamada', 'حمادة', 'icon-tadrebak-500.png', 1, 0, 2, 259, '1g1hfghfg', NULL, '015545', 'dfgd@gma', NULL, NULL, 0, 1, 0, '2017-11-27 12:03:02', '2017-11-27 12:04:32'),
(144, 'dgdfgdfgdfgdg', 'يبليبليبلي', '15126683805709_543856255790673_8931036029391662312_n.jpg', 3, 3, 1, 117, 'يبليبليب', NULL, '5456465456465', NULL, NULL, NULL, 0, 0, 0, '2017-12-07 15:26:51', '2017-12-07 15:39:40'),
(145, 'admin', '4new nursery', 'icon-tadrebak-500.png', 1, 1, 3, 1, 'new address', NULL, '5456465456465', NULL, NULL, NULL, 0, 1, 0, '2017-12-12 09:19:34', '2017-12-12 09:20:13'),
(146, 'حضانه جديده', '4new nurser 5', 'icon-tadrebak-500.png', 1, 1, 3, 1, 'new address', NULL, '5456465456465', NULL, NULL, NULL, 0, 1, 0, '2017-12-12 09:24:17', '2017-12-12 09:24:30'),
(147, 'حضانه جديده 6', '4new nurser 6', 'icon-tadrebak-500.png', 1, 1, 3, 1, 'new address', NULL, '5456465456465', NULL, NULL, NULL, 0, 1, 0, '2017-12-12 09:27:34', '2017-12-12 09:27:41'),
(148, 'center', 'center', 'icon-tadrebak-500.png', 7, 1, 3, 1, 'new address', NULL, '5456465456465', NULL, NULL, NULL, 0, 1, 0, '2017-12-12 12:03:03', '2017-12-12 12:03:22'),
(149, 'honnj', 'حضانه', 'icon-tadrebak-500.png', 1, 8, 3, 8, 'الايسلبتي اايلبتالي بتالي بالي بالباي ب', NULL, '01065656565', 'sdjhsdjk@skjd.com', NULL, NULL, 0, 1, 0, '2018-03-24 12:45:57', '2018-03-24 12:49:56'),
(150, 'Miamy College', 'كلية ميامى', 'icon-tadrebak-500.png', 2, 8, 3, 42, 'شارع الصفا و المروة متفرع من شارع 30 - العصافرة قبلى', 'مدرسة كلية ميامى الخاصة لغات', '01001328698', 'morahima4@gmail.com', 'www.facebook.com/iqadv', NULL, 0, 0, 0, '2018-03-24 13:00:30', '2018-03-24 13:00:30'),
(152, 'newcenter', 'حضانه', 'icon-tadrebak-500.png', 1, 0, 3, 1, 'new address', NULL, '011', NULL, NULL, NULL, 0, 1, 0, '2018-04-21 10:07:33', '2018-04-25 10:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `center_kind`
--

CREATE TABLE `center_kind` (
  `id` int(10) UNSIGNED NOT NULL,
  `center_id` int(11) NOT NULL,
  `kind_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `center_tag`
--

CREATE TABLE `center_tag` (
  `category_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', NULL, NULL),
(2, 'الجيزة', NULL, NULL),
(3, 'الإسكندرية', NULL, NULL),
(4, 'القليوبية', NULL, NULL),
(5, 'حلوان', NULL, NULL),
(6, 'السادس من أكتوبر', NULL, NULL),
(7, 'بورسعيد', NULL, NULL),
(8, 'كفر الشيخ', NULL, NULL),
(9, 'شرم الشيخ', NULL, NULL),
(10, 'سوهاج', NULL, NULL),
(11, 'بنى سويف', NULL, NULL),
(12, 'أسيوط', NULL, NULL),
(13, 'أسوان', NULL, NULL),
(14, 'الوادي الجديد', NULL, NULL),
(15, 'المنيا', NULL, NULL),
(16, 'المنوفية', NULL, NULL),
(17, 'الفيوم', NULL, NULL),
(18, 'البحر الأحمر', NULL, NULL),
(19, 'الغربية', NULL, NULL),
(20, 'الشرقية', NULL, NULL),
(21, 'الإسماعيلية', NULL, NULL),
(22, 'البحيرة', NULL, NULL),
(23, 'السويس', NULL, NULL),
(24, 'الدقهلية', NULL, NULL),
(25, 'الأقصر', NULL, NULL),
(26, 'مطروح', NULL, NULL),
(27, 'دمياط', NULL, NULL),
(28, 'شمال سيناء', NULL, NULL),
(29, 'جنوب سيناء', NULL, NULL),
(30, 'قنا', NULL, NULL),
(31, 'الواحات البحرية', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `center_id` int(11) NOT NULL,
  `departments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_branches` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expenses` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_systems` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cpanels`
--

CREATE TABLE `cpanels` (
  `id` int(11) NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner3` text COLLATE utf8mb4_unicode_ci,
  `about` mediumtext COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpanels`
--

INSERT INTO `cpanels` (`id`, `username`, `password`, `banner1`, `banner2`, `banner3`, `about`, `facebook`, `twitter`, `instagram`, `linkedin`, `contact1`, `contact2`, `contact3`, `contact_phone`, `contact_email`, `created_at`, `updated_at`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'تدريبك يهدف الى ايصال العلم باسهل الطرق', 'سجل معنا و أوصل العلم لمن يعشق العلم', NULL, 'change about', 'https://www.google.com.eg', NULL, NULL, NULL, 'مرحبا بك فى أى وقت', 'تواصلك معنا يسعدنا', 'تواصل معنا فى أى وقت من 10 صباحًا و حتى 6 مساءً', '01112345678', NULL, '2017-12-16 10:48:25', '2017-12-16 08:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `center_id`, `image`, `created_at`, `updated_at`) VALUES
(5, 149, '2.JPG', '2018-04-21 10:19:54', '2018-04-21 10:19:54'),
(6, 149, '3.JPG', '2018-04-21 10:19:54', '2018-04-21 10:19:54'),
(7, 149, 'admin 1JPG.JPG', '2018-04-21 10:19:54', '2018-04-21 10:19:54'),
(8, 149, '2.JPG', '2018-04-21 10:21:37', '2018-04-21 10:21:37'),
(9, 149, 'Footer3.png', '2018-04-21 10:22:12', '2018-04-21 10:22:12'),
(96, 152, '15246578992.JPG', '2018-04-25 10:04:59', '2018-04-25 10:04:59'),
(97, 152, '1524657899icon-tadrebak-500.png', '2018-04-25 10:04:59', '2018-04-25 10:04:59'),
(98, 152, '15246591222.JPG', '2018-04-25 10:25:22', '2018-04-25 10:25:22'),
(99, 152, '15246591223.JPG', '2018-04-25 10:25:22', '2018-04-25 10:25:22'),
(100, 152, '1524659122admin 1JPG.JPG', '2018-04-25 10:25:22', '2018-04-25 10:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `kinds`
--

CREATE TABLE `kinds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2017_10_21_125626_create_centers_table', 1),
(12, '2017_10_21_133122_create_categories_table', 1),
(13, '2017_10_24_121636_create_kinds_table', 2),
(14, '2017_10_24_122116_create_center_kind', 2),
(15, '2017_10_31_085426_create_cities_table', 3),
(16, '2017_10_31_085607_create_regions_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nurseries`
--

CREATE TABLE `nurseries` (
  `id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `nursery_category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expenses` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agefrom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ageto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weekend` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurseries`
--

INSERT INTO `nurseries` (`id`, `center_id`, `nursery_category`, `language`, `location`, `features`, `expenses`, `agefrom`, `ageto`, `weekend`) VALUES
(1, 45, 'اسلامية - دولية - لغات - تجريبي', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 145, 'اسلامية', 'انجليزى', 'فيلا - ', 'اتوبيسات -  - ', NULL, NULL, NULL, ''),
(3, 146, 'اسلامية', 'انجليزى', '', 'اتوبيسات -  -  - ', NULL, NULL, NULL, ''),
(4, 147, 'اسلامية', 'انجليزى', 'فيلا - ', 'اتوبيسات - تحفيظ قرأن - إستضافة - وجبات - تأجير مساحات', NULL, NULL, NULL, ''),
(5, 149, 'اسلامية - لغات - منتسورى', 'انجليزى - المانى', 'فيلا', 'إستضافة - وجبات - حوض سباحة - ألعاب ترقيهية - رعاية طبية - تقارير متابعة - رسم - موسيقى - حاسب ألى - أستضافة ذوى', NULL, '5', '10', 'الجمعة - السبت');

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
('soon.userexperience@gmail.com', '$2y$10$jlXHLBHn4Pf1EPfkHhvprOv0iFpkzMr17DC7IdmvV7uhkTmzeWcaG', '2018-03-29 09:58:56'),
('admin@admin.com', '$2y$10$AKOQxKkWr4gjRdeexc.HVunUGg2dVhC9mILarnhldkwuftZ6XzRZ.', '2018-04-01 12:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'سيدي بشر', 3, NULL, NULL),
(2, 'جليم', 3, NULL, NULL),
(3, 'العصافرة بحري', 3, NULL, NULL),
(4, 'المسلة شرق', 3, NULL, NULL),
(5, 'أبو تلات', 3, NULL, NULL),
(6, 'أبو قير', 3, NULL, NULL),
(7, 'أبو يوسف', 3, NULL, NULL),
(8, 'أبو الدرداء', 3, NULL, NULL),
(9, 'أبو العباس', 3, NULL, NULL),
(10, 'أبيس', 3, NULL, NULL),
(11, 'أرض الصبحية', 3, NULL, NULL),
(12, 'أرض تشاكوس', 3, NULL, NULL),
(13, 'الإبراهيمية', 3, NULL, NULL),
(14, 'الأزاريطة', 3, NULL, NULL),
(15, 'الإقبال', 3, NULL, NULL),
(16, 'الأنفوشي', 3, NULL, NULL),
(17, 'الباب الحديد', 3, NULL, NULL),
(18, 'البستان', 3, NULL, NULL),
(19, 'البيطاش', 3, NULL, NULL),
(20, 'الجمرك', 3, NULL, NULL),
(21, 'الحضرة', 3, NULL, NULL),
(22, 'الحضرة الجديدة', 3, NULL, NULL),
(23, 'الحضرة القبلي', 3, NULL, NULL),
(24, 'الحضرة بحري', 3, NULL, NULL),
(25, 'الحي اللاتيني', 3, NULL, NULL),
(26, 'الدخيلة', 3, NULL, NULL),
(27, 'الرأس السوداء', 3, NULL, NULL),
(28, 'الرمل الميري', 3, NULL, NULL),
(29, 'السرايا', 3, NULL, NULL),
(30, 'السكة الجديدة', 3, NULL, NULL),
(31, 'السلطان حسين', 3, NULL, NULL),
(32, 'السيوف', 3, NULL, NULL),
(33, 'السيوف بحري', 3, NULL, NULL),
(34, 'السيوف شماعة', 3, NULL, NULL),
(35, 'الشاطبي', 3, NULL, NULL),
(36, 'الشلالات', 3, NULL, NULL),
(37, 'الطالبية', 3, NULL, NULL),
(38, 'الظاهرية', 3, NULL, NULL),
(39, 'العامرية', 3, NULL, NULL),
(40, 'العجمي', 3, NULL, NULL),
(41, 'العصافرة', 3, NULL, NULL),
(42, 'العصافرة قبلي', 3, NULL, NULL),
(43, 'محطة الرمل', 3, NULL, NULL),
(44, 'محطة شاس', 3, NULL, NULL),
(45, 'الورديان', 3, NULL, NULL),
(46, 'كامب شيزار', 3, NULL, NULL),
(47, 'محرم بك', 3, NULL, NULL),
(48, 'بحري', 3, NULL, NULL),
(49, 'سموحة', 3, NULL, NULL),
(50, 'المندرة قبلي', 3, NULL, NULL),
(51, 'رصفا', 3, NULL, NULL),
(52, 'السينية', 3, NULL, NULL),
(53, 'رشدي ميامي', 3, NULL, NULL),
(54, 'العطارين', 3, NULL, NULL),
(55, 'ستانلي', 3, NULL, NULL),
(56, 'الملاحات', 3, NULL, NULL),
(57, 'جناكليس', 3, NULL, NULL),
(58, 'باب شرق', 3, NULL, NULL),
(59, 'طريق الأسكندرية مطروح', 3, NULL, NULL),
(60, 'المنتزة', 3, NULL, NULL),
(61, 'مصطفى كامل', 3, NULL, NULL),
(62, 'اللبان', 3, NULL, NULL),
(63, 'سابا باشا', 3, NULL, NULL),
(64, 'فليمنج', 3, NULL, NULL),
(65, 'كرموز', 3, NULL, NULL),
(66, 'المنشية', 3, NULL, NULL),
(67, 'الحمامات', 3, NULL, NULL),
(68, 'رأس التين', 3, NULL, NULL),
(69, 'سبورتنج', 3, NULL, NULL),
(70, 'غيط العنب', 3, NULL, NULL),
(71, 'بولكلي', 3, NULL, NULL),
(72, 'سيدي جابر', 3, NULL, NULL),
(73, 'كليوباترا', 3, NULL, NULL),
(74, 'ثروت', 3, NULL, NULL),
(75, 'القباري', 3, NULL, NULL),
(76, 'شدس', 3, NULL, NULL),
(77, 'معمورة البلد', 3, NULL, NULL),
(78, 'كفر عبده', 3, NULL, NULL),
(79, 'زيزينيا', 3, NULL, NULL),
(80, 'فيكتوريا', 3, NULL, NULL),
(81, 'الساعة', 3, NULL, NULL),
(82, 'الهانوفيل', 3, NULL, NULL),
(83, 'لوران', 3, NULL, NULL),
(84, 'سان ستيفانو', 3, NULL, NULL),
(85, 'العوايد', 3, NULL, NULL),
(86, 'باكوس', 3, NULL, NULL),
(87, 'غبريال', 3, NULL, NULL),
(88, 'طريق اسكندرية - القاهرة الزراعي', 3, NULL, NULL),
(89, 'امبروزو', 3, NULL, NULL),
(90, 'كوم الدكة', 3, NULL, NULL),
(91, 'الناصرية', 3, NULL, NULL),
(92, 'برج العرب', 3, NULL, NULL),
(93, 'راغب باشا', 3, NULL, NULL),
(94, 'المكس', 3, NULL, NULL),
(95, 'كينج مريوط', 3, NULL, NULL),
(96, 'محطة مصر', 3, NULL, NULL),
(97, 'وابور المياه', 3, NULL, NULL),
(98, 'الملاحة', 3, NULL, NULL),
(99, 'شرق الأسكندرية', 3, NULL, NULL),
(100, 'وسط الأسكندرية', 3, NULL, NULL),
(101, 'غرب الأسكندرية', 3, NULL, NULL),
(102, 'المندرة بحري ', 3, NULL, NULL),
(103, 'مدينة نصر', 1, NULL, NULL),
(104, 'النزهة', 1, NULL, NULL),
(105, 'حدائق الزيتون', 1, NULL, NULL),
(106, 'كوبري القبة', 1, NULL, NULL),
(107, 'المعادي الجديدة', 1, NULL, NULL),
(108, 'المعادي', 1, NULL, NULL),
(109, 'أغاخان', 1, NULL, NULL),
(110, 'حدائق المعادي', 1, NULL, NULL),
(111, 'الزمالك', 1, NULL, NULL),
(112, 'القاهرة الجديدة', 1, NULL, NULL),
(113, 'المقطم', 1, NULL, NULL),
(114, 'حلمية الزيتون', 1, NULL, NULL),
(115, 'عباسية', 1, NULL, NULL),
(116, 'حلوان', 1, NULL, NULL),
(117, 'ألماظة', 1, NULL, NULL),
(118, 'القطامية', 1, NULL, NULL),
(119, 'مصر الجديدة', 1, NULL, NULL),
(120, 'النهضة', 1, NULL, NULL),
(121, 'باب اللوق', 1, NULL, NULL),
(122, 'المنيل', 1, NULL, NULL),
(123, 'مدينة الرحاب', 1, NULL, NULL),
(124, 'مدينة السلام', 1, NULL, NULL),
(125, 'حمامات القبة', 1, NULL, NULL),
(126, 'حدائق القبة', 1, NULL, NULL),
(127, 'سراي القبة', 1, NULL, NULL),
(128, 'الأزبكية', 1, NULL, NULL),
(129, 'الأزهر', 1, NULL, NULL),
(130, 'الأميرية', 1, NULL, NULL),
(131, 'البساتين', 1, NULL, NULL),
(132, 'الجزيرة', 1, NULL, NULL),
(133, 'الجمالية', 1, NULL, NULL),
(134, 'الحرفيين', 1, NULL, NULL),
(135, 'الحسين', 1, NULL, NULL),
(136, 'الحلمية', 1, NULL, NULL),
(137, 'الحلمية الجديدة', 1, NULL, NULL),
(138, 'الخليفة', 1, NULL, NULL),
(139, 'الدراسة', 1, NULL, NULL),
(140, 'الدرب الأحمر', 1, NULL, NULL),
(141, 'الروضة', 1, NULL, NULL),
(142, 'الزاوية الحمراء', 1, NULL, NULL),
(143, 'الساحل', 1, NULL, NULL),
(144, 'السبتية', 1, NULL, NULL),
(145, 'السكاكيني', 1, NULL, NULL),
(146, 'السواح', 1, NULL, NULL),
(147, 'السيدة زينب', 1, NULL, NULL),
(148, 'السيدة عائشة', 1, NULL, NULL),
(149, 'الشرابية', 1, NULL, NULL),
(150, 'الظاهر', 1, NULL, NULL),
(151, 'التبين', 1, NULL, NULL),
(152, 'العتبة', 1, NULL, NULL),
(153, 'الفجالة', 1, NULL, NULL),
(154, 'الفسطاط', 1, NULL, NULL),
(155, 'القبة الجديدة', 1, NULL, NULL),
(156, 'المرج', 1, NULL, NULL),
(157, 'المرج الجديدة', 1, NULL, NULL),
(158, 'المطرية', 1, NULL, NULL),
(159, 'الملك الصالح', 1, NULL, NULL),
(160, 'المنيرة', 1, NULL, NULL),
(161, 'الموسكي', 1, NULL, NULL),
(162, 'الهايكستيب', 1, NULL, NULL),
(163, 'الوايلي', 1, NULL, NULL),
(164, 'باب الخلق', 1, NULL, NULL),
(165, 'باب الشعرية', 1, NULL, NULL),
(166, 'بولاق أبو العلا', 1, NULL, NULL),
(167, 'جاردن سيتي', 1, NULL, NULL),
(168, 'جسر السويس', 1, NULL, NULL),
(169, 'خان الخليلي', 1, NULL, NULL),
(170, 'دار السلام', 1, NULL, NULL),
(171, 'روض الفرج', 1, NULL, NULL),
(172, 'شبرا مصر', 1, NULL, NULL),
(173, 'شق الثعبان', 1, NULL, NULL),
(174, 'طره', 1, NULL, NULL),
(175, 'عابدين', 1, NULL, NULL),
(176, 'عزبة النخل', 1, NULL, NULL),
(177, 'عين الصيرة', 1, NULL, NULL),
(178, 'عين شمس', 1, NULL, NULL),
(179, 'عين شمس الشرقية', 1, NULL, NULL),
(180, 'عين شمس الغربية', 1, NULL, NULL),
(181, 'غمرة', 1, NULL, NULL),
(182, 'فم الخليج', 1, NULL, NULL),
(183, 'قصر العيني', 1, NULL, NULL),
(184, 'القلعة', 1, NULL, NULL),
(185, 'كفر العلو', 1, NULL, NULL),
(186, 'لاظوغلي', 1, NULL, NULL),
(187, 'مدينة  مايو', 1, NULL, NULL),
(188, 'مدينة الشروق', 1, NULL, NULL),
(189, 'مدينة بدر', 1, NULL, NULL),
(190, 'مدينة قباء', 1, NULL, NULL),
(191, 'مصر القديمة', 1, NULL, NULL),
(192, 'منشية البكري', 1, NULL, NULL),
(193, 'منشية ناصر', 1, NULL, NULL),
(194, 'منيل الروضة', 1, NULL, NULL),
(195, 'وادي حوف', 1, NULL, NULL),
(196, 'وسط البلد', 1, NULL, NULL),
(197, 'حدائق حلوان', 1, NULL, NULL),
(198, 'كوتسيكا', 1, NULL, NULL),
(199, 'رمسيس', 1, NULL, NULL),
(200, 'الخلفاوي', 1, NULL, NULL),
(201, 'مسرة', 1, NULL, NULL),
(202, 'سانت تريزا', 1, NULL, NULL),
(203, 'جزيرة بدران', 1, NULL, NULL),
(204, 'المظلات', 1, NULL, NULL),
(205, 'عزبة الوالدة', 1, NULL, NULL),
(206, 'ركن فاروق', 1, NULL, NULL),
(207, 'المعصرة', 1, NULL, NULL),
(208, 'الصف', 1, NULL, NULL),
(209, 'الشرفاء', 1, NULL, NULL),
(210, 'عين حلوان', 1, NULL, NULL),
(211, 'مساكن أطلس', 1, NULL, NULL),
(212, 'المشروع الأمريكي', 1, NULL, NULL),
(213, 'عرب راشد', 1, NULL, NULL),
(214, 'عرب غنيم', 1, NULL, NULL),
(215, 'مساكن الحديد والصلب', 1, NULL, NULL),
(216, 'زهراء المعادي', 1, NULL, NULL),
(217, 'القطامية', 1, NULL, NULL),
(218, 'شيراتون', 1, NULL, NULL),
(219, 'التجمع الخامس', 1, NULL, NULL),
(220, 'مدينتى', 1, NULL, NULL),
(221, 'الزيتون', 1, NULL, NULL),
(222, 'غرب القاهرة', 1, NULL, NULL),
(223, 'التجمع الأول', 1, NULL, NULL),
(224, 'التجمع الثالث', 1, NULL, NULL),
(225, 'سانت فاتيما', 1, NULL, NULL),
(226, 'ميدان المحكمة', 1, NULL, NULL),
(227, 'الميرغنى', 1, NULL, NULL),
(228, 'ميدان الحجاز', 1, NULL, NULL),
(229, 'هارون الرشيد', 1, NULL, NULL),
(230, 'شارع النزهة', 1, NULL, NULL),
(231, 'أرض الجولف', 1, NULL, NULL),
(232, 'السبع عمارات', 1, NULL, NULL),
(233, 'شارع الثورة', 1, NULL, NULL),
(234, 'ألف مسكن', 1, NULL, NULL),
(235, 'الكوربة', 1, NULL, NULL),
(236, 'ميدان سفير', 1, NULL, NULL),
(237, 'ميدان هليوبوليس', 1, NULL, NULL),
(238, 'روكسي', 1, NULL, NULL),
(239, 'ميدان الاسماعيلية', 1, NULL, NULL),
(240, 'ميدان الجامع', 1, NULL, NULL),
(241, 'الميريلاند', 1, NULL, NULL),
(242, 'ميدان صلاح الدين', 1, NULL, NULL),
(243, 'التجنيد', 1, NULL, NULL),
(244, 'ميدان تريومف', 1, NULL, NULL),
(245, 'المنطقة السادسة', 1, NULL, NULL),
(246, 'الحي السابع', 1, NULL, NULL),
(247, 'الحي الثامن', 1, NULL, NULL),
(248, 'المنطقة الثامنة', 1, NULL, NULL),
(249, 'زهراء مدينة نصر', 1, NULL, NULL),
(250, 'المنطقة التاسعة', 1, NULL, NULL),
(251, 'المنطقة الأولي', 1, NULL, NULL),
(252, 'الحي العاشر', 1, NULL, NULL),
(253, 'المنطقة العاشرة', 1, NULL, NULL),
(254, 'منشية التحرير', 1, NULL, NULL),
(255, 'القاطامية', 1, NULL, NULL),
(256, 'منطقة الشويفات', 1, NULL, NULL),
(257, 'ميراج سيتي', 1, NULL, NULL),
(258, 'الشباب', 1, NULL, NULL),
(259, 'المهندسين', 2, NULL, NULL),
(260, 'الدقى', 2, NULL, NULL),
(261, 'أكتوبر', 2, NULL, NULL),
(262, 'فيصل', 2, NULL, NULL),
(263, 'الهرم', 2, NULL, NULL),
(264, 'الجيزة', 2, NULL, NULL),
(265, 'الشيخ زايد', 2, NULL, NULL),
(266, 'المريوطية', 2, NULL, NULL),
(267, 'العجوزة', 2, NULL, NULL),
(268, 'الصحفيين', 2, NULL, NULL),
(269, 'بين السرايات', 2, NULL, NULL),
(270, 'جزيرة الذهب', 2, NULL, NULL),
(271, 'سقارة', 2, NULL, NULL),
(272, 'طموه', 2, NULL, NULL),
(273, 'أبو رواش', 2, NULL, NULL),
(274, 'البدرشين', 2, NULL, NULL),
(275, 'البراجيل', 2, NULL, NULL),
(276, 'الحوامدية', 2, NULL, NULL),
(277, 'الصف', 2, NULL, NULL),
(278, 'العياط', 2, NULL, NULL),
(279, 'الكيت كات', 2, NULL, NULL),
(280, 'المنيب', 2, NULL, NULL),
(281, 'الوراق', 2, NULL, NULL),
(282, 'إمبابة', 2, NULL, NULL),
(283, 'اوسيم', 2, NULL, NULL),
(284, 'طريق القاهرة الأسكندرية الصحراوي', 2, NULL, NULL),
(285, 'بولاق الدكرور', 2, NULL, NULL),
(286, 'العمرانية', 2, NULL, NULL),
(287, 'شبرامنت', 2, NULL, NULL),
(288, 'بشتيل', 2, NULL, NULL),
(289, 'العمرانية الشرقية', 2, NULL, NULL),
(290, 'العمرانية الغربية', 2, NULL, NULL),
(291, 'منيل شيحة', 2, NULL, NULL),
(292, 'ميدان الرماية', 2, NULL, NULL),
(293, 'نزلة السمان', 2, NULL, NULL),
(294, 'كفر طهرمس', 2, NULL, NULL),
(295, 'الكنيسة', 2, NULL, NULL),
(296, 'الكوم الأخضر', 2, NULL, NULL),
(297, 'كوم بكار', 2, NULL, NULL),
(298, 'نزلة البطران', 2, NULL, NULL),
(299, 'طموه', 2, NULL, NULL),
(300, 'ميت عقبة', 2, NULL, NULL),
(301, 'أرض اللواء', 2, NULL, NULL),
(302, 'الحرانية', 2, NULL, NULL),
(303, 'كفر الجبل', 2, NULL, NULL),
(304, 'كرداسة', 2, NULL, NULL),
(305, 'حدائق الأهرام', 2, NULL, NULL),
(306, 'شمال الجيزة', 2, NULL, NULL),
(307, 'جنوب الجيزة', 2, NULL, NULL),
(308, 'ابو النمرس', 2, NULL, NULL),
(309, 'اطفيح', 2, NULL, NULL),
(310, 'منشأة القناطر', 2, NULL, NULL),
(311, 'حي الأشجار', 2, NULL, NULL),
(312, 'صفط اللبن', 2, NULL, NULL),
(313, 'الحي المتميز  أكتوبر', 2, NULL, NULL),
(314, 'كمبوند الخمائل  أكتوبر', 2, NULL, NULL),
(315, 'حدائق اكتوبر', 2, NULL, NULL),
(316, 'بيفرلي هيلز الشيخ زايد', 2, NULL, NULL),
(317, 'غرب سوميد أكتوبر', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `center_id` int(11) NOT NULL,
  `administration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_school` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educational_stages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expenses` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weekend` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`center_id`, `administration`, `type_of_school`, `gender`, `educational_stages`, `expenses`, `weekend`) VALUES
(144, 'شرق', 'عربى', 'بنين', 'إبتدائى', NULL, 'الجمعة');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'admin', 1, '2018-04-28 09:15:14', '2018-04-28 09:15:14'),
(18, 'admin2 edit', 5, '2018-04-28 14:29:16', '2018-04-28 12:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `training_centers`
--

CREATE TABLE `training_centers` (
  `center_id` int(10) UNSIGNED NOT NULL,
  `type_of_center` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_centers`
--

INSERT INTO `training_centers` (`center_id`, `type_of_center`, `specialization`, `location`, `features`, `rent_from`, `rent_to`, `room_number`) VALUES
(148, 'تعليمى - كورسات', '', 'فيلا - ', 'بروجيكتور - تأجير قاعات', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `training_center_rooms`
--

CREATE TABLE `training_center_rooms` (
  `center_id` int(10) UNSIGNED NOT NULL,
  `roomfeatures` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_type` int(11) DEFAULT NULL,
  `personcost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roomcost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chairs_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `center_id` int(10) UNSIGNED NOT NULL,
  `university_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_systems` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$5rJWDBjKkNe8B/k3QxMJNeY/iqu5Dgx1y4wqpxqbNNYbFzikS6Fyi', 'W1mhx6ZGarQZYEgKIpOqmzYE0kxGP2Nty5m9akuyM1JWhRX9xWUh3wYRBuUx', '2017-11-15 11:49:45', '2017-12-12 09:51:32'),
(2, 'khaled', 'khaled@gmail.com', '$2y$10$xwwD3VKYkVqaQgIaddGFZeiEl9v5RwFXgVi6TbIFmXG2nFDsHmi1G', 'CID1tEFvBiQ9M9GZqhyaOooBL2mqTMg8JvKOcehuquwD6UvUl3434CYIwQRO', '2017-12-07 10:41:17', '2017-12-07 13:57:52'),
(3, 'hamada', 'soon.userexperience@gmail.com', '$2y$10$q5qFLgO2smkX0eR0v./GJO8TmesjaX2mlpfjYrdidIFsGopPUPTWS', 'roOwsmwIOGZKCy1rqEIfsFptIYyNJCoiRIekuljpTjFYLuuTfL28MqxRVVR4', '2017-12-07 15:23:22', '2017-12-07 15:24:37'),
(4, 'khaled', 'khaled2@gmail.com', '$2y$10$LEmNZZne/9N.SklM45DoO.kwH.p4vb7tm1AmPumN872URPoGb8CXW', 'waK93uKcJcnhJDtgDKUHlAaG6ZL1NBDo9CyR2aiB9x7aQdJtKGY4kOrnJAux', '2017-12-09 09:45:58', '2017-12-09 09:45:58'),
(5, 'khaled3', 'khaled3@gmail.com', '$2y$10$BG9CB/Dkxn8gPiQYOOXtr.T9ehVBLJSCs5G5.jXLhhu414Zxq3sNu', 'fO6ynaXOHzVSqhgvynXDaSZQFO50ZDRrU7ggcJNyk6awcXWSxR9VJiqTcTbH', '2017-12-09 10:06:39', '2017-12-09 10:06:39'),
(6, 'khaled', 'khaled4@gmail.com', '$2y$10$JjYGIYAz/QicErFcpcKcJOvDtaZcjtxZedy0JnqBIOxjoRNQrwr3u', '9XvFX8i6lnetsXlXZWZg9g8aB7LD9xsFZRY75e4O8KwjEYFdWOMc7oTML2wF', '2017-12-09 10:10:16', '2017-12-09 10:10:16'),
(7, 'khaled', 'khaled5@gmail.com', '$2y$10$hdPnlpQUJm0RM.6G1BxgHeRP9way.JD0B0PFb1FdHmNCTX1LdhLPa', 'g2RfvNB2JCj2C7MBF7vKMqQu3TjBw0mDcM4fV6bpvOTMxTxMKXAQ5bmljllx', '2017-12-10 08:36:49', '2017-12-10 08:36:49'),
(8, 'mohamed', 'mr.mohamedit@gmail.com', '$2y$10$rNfMRdgNL2lBk0VwuzbqY.7.4suGusztNAkBuFUSrZBfOPt9FHGJW', 'QsQfTaW5VEGEvEjPUtETMGKo6L769rmzL3amAimyMpWwZLBOGRhOhAKoOYGP', '2018-03-24 12:42:35', '2018-03-24 12:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `whatweoffers`
--

CREATE TABLE `whatweoffers` (
  `id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whatweoffers`
--

INSERT INTO `whatweoffers` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '2تعلم بسهوله', 'aa', '151006274912507382_10205743576528555_5625081532507980747_n.jpg', '2017-11-07 13:52:29', '2017-11-07 11:52:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `center_kind`
--
ALTER TABLE `center_kind`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpanels`
--
ALTER TABLE `cpanels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kinds`
--
ALTER TABLE `kinds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurseries`
--
ALTER TABLE `nurseries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_centers`
--
ALTER TABLE `training_centers`
  ADD KEY `center_id` (`center_id`);

--
-- Indexes for table `training_center_rooms`
--
ALTER TABLE `training_center_rooms`
  ADD KEY `center_id` (`center_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD KEY `center_id` (`center_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `whatweoffers`
--
ALTER TABLE `whatweoffers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `center_kind`
--
ALTER TABLE `center_kind`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cpanels`
--
ALTER TABLE `cpanels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `kinds`
--
ALTER TABLE `kinds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nurseries`
--
ALTER TABLE `nurseries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `whatweoffers`
--
ALTER TABLE `whatweoffers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `training_centers`
--
ALTER TABLE `training_centers`
  ADD CONSTRAINT `training_centers_ibfk_1` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training_center_rooms`
--
ALTER TABLE `training_center_rooms`
  ADD CONSTRAINT `training_center_rooms_ibfk_1` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
