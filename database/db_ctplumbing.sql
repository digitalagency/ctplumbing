-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2019 at 10:11 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ctplumbing`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `fullname`, `email`, `phone`, `file_path`, `description`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '', '', '2019-02-20 04:48:18', '2019-02-20 04:48:18'),
(2, 'dsfdsfds', NULL, NULL, '', '', '2019-02-20 04:48:22', '2019-02-20 04:48:22'),
(3, 'dsfdsfds', 'dsfdsfd@hsd.co', '3243442', 'yamano_1550658821.jpg', '', '2019-02-20 04:48:41', '2019-02-20 04:48:41'),
(4, 'dsfdsfds', 'dsfdsfd@hsd.co', '3243442', 'domain_listing_1550658840.docx', '', '2019-02-20 04:49:00', '2019-02-20 04:49:00'),
(5, NULL, NULL, NULL, '', '', '2019-02-20 05:43:23', '2019-02-20 05:43:23'),
(6, NULL, NULL, NULL, '', '', '2019-02-20 05:53:24', '2019-02-20 05:53:24'),
(7, NULL, NULL, NULL, '', '', '2019-02-20 22:48:34', '2019-02-20 22:48:34'),
(8, NULL, NULL, NULL, '', '', '2019-02-20 22:52:46', '2019-02-20 22:52:46'),
(9, NULL, NULL, NULL, '', '', '2019-02-21 04:30:09', '2019-02-21 04:30:09'),
(10, 'news category', 'hfghfgh@admin.com', '9860546499', 'key-primary_1551419142.svg', '', '2019-03-01 00:00:42', '2019-03-01 00:00:42'),
(11, 'news category', 'hfghfgh@admin.com', '9860546499', '', '', '2019-03-01 00:01:17', '2019-03-01 00:01:17'),
(12, 'news category', 'hfghfgh@admin.com', '9860546499', 'cv_1551419424.docx', '', '2019-03-01 00:05:24', '2019-03-01 00:05:24'),
(13, 'news category', 'hfghfgh@admin.com', '9860546499', 'cv_1551419441.doc', '', '2019-03-01 00:05:41', '2019-03-01 00:05:41'),
(14, NULL, NULL, NULL, 'cv_1551419468.doc', '', '2019-03-01 00:06:08', '2019-03-01 00:06:08'),
(15, 'news category', 'admuuuin@gmail.com', '9860546499', 'CORE_CV_template_1_1551419628.doc', '', '2019-03-01 00:08:48', '2019-03-01 00:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent`, `title`, `slug`, `content`, `feature_image`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Why Us', 'cat-1', 'Category 1', NULL, '1', '2018-12-09 01:31:53', '2018-12-09 01:31:53', NULL),
(2, NULL, 'CRS Activities', 'crs-activities', 'Corporate Social Responsibility.', NULL, '1', '2018-12-27 23:33:54', '2019-01-16 23:56:33', NULL),
(3, NULL, 'Why Work With Us', 'why-work-with-us', 'Why Work With Us', NULL, '1', '2019-01-22 23:57:37', '2019-01-22 23:57:37', NULL),
(4, NULL, 'new category', 'new-category', 'sadad', NULL, '1', '2019-01-30 23:29:36', '2019-01-30 23:29:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id`, `category_id`, `post_id`, `created_at`, `updated_at`) VALUES
(3, 2, 3, NULL, NULL),
(4, 2, 4, NULL, NULL),
(6, 2, 5, NULL, NULL),
(7, 1, 6, NULL, NULL),
(11, 3, 7, NULL, NULL),
(12, 3, 8, NULL, NULL),
(13, 2, 9, NULL, NULL),
(14, 3, 11, NULL, NULL),
(15, 3, 12, NULL, NULL),
(16, 3, 13, NULL, NULL),
(17, 3, 14, NULL, NULL),
(18, 2, 15, NULL, NULL),
(20, 1, 16, NULL, NULL),
(22, 1, 18, NULL, NULL),
(23, 2, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cmsoptions`
--

CREATE TABLE `cmsoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(255) NOT NULL DEFAULT '',
  `option_title` varchar(255) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `option_detail` varchar(255) DEFAULT NULL,
  `autoload` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmsoptions`
--

INSERT INTO `cmsoptions` (`id`, `option_name`, `option_title`, `option_value`, `status`, `option_detail`, `autoload`, `created_at`, `updated_at`) VALUES
(1, 'footer-info', 'Footerinfromation', '<h3>We estimate your project accurately.</h3>\r\n											<p>Calculating realistic project timelines.</p>\r\n											<div class=\"con-em\">\r\n												<ul>\r\n													<li>Tel: +977 (1) 4107803</li>\r\n													<li>Email: Info@igctech.com.np</li>\r\n												</ul>\r\n											</div>', 1, 'this detail is only for administrator', '1', '2018-12-24 07:10:09', '2018-12-24 07:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `con_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `con_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `con_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `con_msg` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `con_name`, `con_email`, `con_phone`, `con_msg`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'admin@gmail.com', '234234', NULL, '2019-02-21 03:50:48', '2019-02-21 03:50:48'),
(2, 'sad', 'ayub21112@gmail.com', 'sasd', NULL, '2019-02-25 00:42:47', '2019-02-25 00:42:47'),
(3, 'sad', 'fdgfdgfdgdf@gmail.com', 'sasd', NULL, '2019-02-28 23:59:34', '2019-02-28 23:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `short_content` text COLLATE utf8mb4_unicode_ci,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('publish','unpublish','pending','draft') COLLATE utf8mb4_unicode_ci DEFAULT 'publish',
  `homepage` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `slug`, `content`, `short_content`, `feature_image`, `image2`, `user_id`, `status`, `homepage`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Web Design', 'web-design', 'We combine the best design, the best art, the best message, the best graphics and the best image to develop a website that our clients can delight in. We highly value the needs of our clients and project our client’sspirit, their commitment and motivation in the websites we design. We carry a value that website makes strong communication between our clients and their audiencesand hence design each website', '<div class=\"slimscroll\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 400; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: \"><p style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">We\r\n not only deliver software, but as well systems to our clients which add\r\n to the overall operation and functioning of the organization. We don’t \r\nget satisfied unless the software we design adds to the growth and \r\ndevelopment of our clients.<span> <br></span></p></div>', 'web_development_1550663033.svg', 'web-developemt-01_1550663033.svg', '1', 'publish', 1, 1, '2019-01-16 00:00:26', '2019-02-20 05:58:53', NULL),
(2, 'App Development', 'app-development', 'Applications we design and developfor our clients continually function for the longer term with optimum functionality and sustainability. To ensure that result, we make our applications error free and power those with robust programming.<br>', 'Applications we design and developfor our clients\r\n                                                            continually function for the longer term with optimum\r\n                                                            functionality and sustainability. To ensure that result, we\r\n                                                            make our applications error free and power those with\r\n                                                            robust programming. <br>', 'mobile_development_1550663063.svg', 'mobile-development-01_1550663063.svg', '1', 'publish', 1, 2, '2019-01-16 00:11:43', '2019-02-20 05:59:23', NULL),
(3, 'Software Development', 'software-development', '<p>Software Development</p><p>\r\n                                                    \r\n                                                        We not only deliver software, but as well systems to our\r\n                                                            clients which add to the overall operation and functioning\r\n                                                            of the organization. We don’t get satisfied unless the\r\n                                                            software we design adds to the growth and development of\r\n                                                            our clients. <br><br>We associate powerful software-with\r\n                                                            powerful <br></p>', 'We not only deliver software, but as well systems to our clients which add to the overall operation and functioning of the organization. We don’t get satisfied unless the software we design adds to the growth and development of our clients.', 'software_1550663144.svg', 'software-01_1550663144.svg', '1', 'publish', 1, 3, '2019-01-16 00:14:09', '2019-02-20 06:00:44', NULL),
(4, 'Payment Getway', 'payment-getway', '<p>We not only deliver software, but as well systems to our clients which \r\nadd to the overall operation and functioning of the organization. We \r\ndon’t get satisfied unless the software we design adds to the growth and\r\n development of our clients. <br></p>', '<p>We not only deliver software, but as well systems to our clients which \r\nadd to the overall operation and functioning of the organization. We \r\ndon’t get satisfied unless the software we design adds to the growth and\r\n development of our clients. </p>', 'payment_1550663174.svg', 'payment-01_1550663174.svg', '1', 'publish', 1, 4, '2019-01-23 00:59:58', '2019-02-20 06:01:14', NULL),
(5, 'Digital Marketing', 'digital-marketing', '<p><br></p><p><span style=\"color: rgb(74, 74, 74); font-family: \"Work Sans\", sans-serif; font-size: 18px; text-align: justify;\">We combine your goal, vision, mission and action with the appropriate color, message, texture and beauty to develop a complete ‘brand value’ that carry your strongest message to your maximum number of audiences. In doing so, we publicize your services elegantly, promptly and beautifullyusing our digital functions. </span><br style=\"color: rgb(74, 74, 74); font-family: \"Work Sans\", sans-serif; font-size: 18px; text-align: justify;\"><br style=\"color: rgb(74, 74, 74); font-family: \"Work Sans\", sans-serif; font-size: 18px; text-align: justify;\"><span style=\"color: rgb(74, 74, 74); font-family: \"Work Sans\", sans-serif; font-size: 18px; text-align: justify;\">We optimize Facebook, twitter, web services and use online tools to reach out to the people you want to connect to. Weconstantly study how peopleare thinking and acting, and accordingly design our solutions to address their problems based on digital marketing services. In doing so, we engineer our digital marketing services with the appropriate programming, graphics andsearch engine optimization tools.We target right users and deliver right message in the right time to achieve effectiveness and build overall performance.</span><br></p>', '<p><br></p><p><span style=\"color: rgb(74, 74, 74); font-family: \"Work Sans\", sans-serif; font-size: 18px; text-align: justify;\">We combine your goal, vision, mission and action with the appropriate color, message, texture and beauty to develop a complete ‘brand value’ that carry your strongest message to your maximum number of audiences. In doing so, we publicize your services elegantly, promptly and beautifullyusing our digital functions. </span><br></p>', 'digital-marketing_1550663110.svg', 'digital-marketing-01_1550663110.svg', '1', 'publish', 1, 5, '2019-01-29 03:00:24', '2019-02-20 06:00:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `gallery_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `gallery_cover_photo` varchar(255) DEFAULT NULL,
  `gallery_status` enum('publish','un-publish') NOT NULL DEFAULT 'publish',
  `gallery_order` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `gallery_name`, `slug`, `gallery_cover_photo`, `gallery_status`, `gallery_order`, `created_at`, `updated_at`) VALUES
(1, 'IGC Gallery', 'gallery', NULL, 'publish', NULL, NULL, NULL),
(10, NULL, '1', 'uploads/gallery/office1_1548138706.jpg', 'publish', NULL, '2019-01-10 06:32:09', '2019-03-01 05:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `galleryimages`
--

CREATE TABLE `galleryimages` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `caption` varchar(255) NOT NULL,
  `image_title` varchar(225) DEFAULT NULL,
  `image_path` varchar(225) DEFAULT NULL,
  `status` enum('publish','un-publish') NOT NULL DEFAULT 'publish',
  `gallery_cover` tinyint(1) NOT NULL DEFAULT '1',
  `order` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galleryimages`
--

INSERT INTO `galleryimages` (`id`, `gallery_id`, `caption`, `image_title`, `image_path`, `status`, `gallery_cover`, `order`, `updated_at`, `created_at`) VALUES
(91, 10, 'caption', 'caption', '1548911942_0.jpg', 'publish', 1, 1, '2019-01-31 05:19:02', '2019-01-31 05:19:02'),
(92, 10, 'caption', 'caption', '1548911942_1.jpg', 'publish', 1, 1, '2019-01-31 05:19:02', '2019-01-31 05:19:02'),
(93, 1, 'IGC Images', 'IGC Images', '1550724879_0.jpg', 'publish', 1, NULL, '2019-02-21 04:54:39', '2019-02-21 04:54:39'),
(94, 1, 'IGC Images', 'IGC Images', '1550724879_1.jpg', 'publish', 1, NULL, '2019-02-21 04:54:39', '2019-02-21 04:54:39'),
(95, 1, 'IGC Images', 'IGC Images', '1550724879_2.jpg', 'publish', 1, NULL, '2019-02-21 04:54:39', '2019-02-21 04:54:39'),
(96, 1, 'IGC Images', 'IGC Images', '1550724879_3.jpg', 'publish', 1, NULL, '2019-02-21 04:54:39', '2019-02-21 04:54:39'),
(97, 1, 'IGC Images', 'IGC Images', '1550724879_4.JPG', 'publish', 1, NULL, '2019-02-21 04:54:39', '2019-02-21 04:54:39'),
(98, 1, 'IGC Images', 'IGC Images', '1550724879_5.jpg', 'publish', 1, NULL, '2019-02-21 04:54:39', '2019-02-21 04:54:39'),
(100, 1, 'IGC Tech', 'IGC Tech', '1550724922_1.jpg', 'publish', 1, 1, '2019-02-21 04:55:22', '2019-02-21 04:55:22'),
(101, 1, 'IGC Tech', 'IGC Tech', '1550724922_2.jpg', 'publish', 1, 1, '2019-02-21 04:55:22', '2019-02-21 04:55:22'),
(102, 1, 'IGC Tech', 'IGC Tech', '1550724922_3.jpg', 'publish', 1, 1, '2019-02-21 04:55:22', '2019-02-21 04:55:22'),
(103, 1, 'IGC Tech', 'IGC Tech', '1550724922_4.jpg', 'publish', 1, 1, '2019-02-21 04:55:22', '2019-02-21 04:55:22'),
(104, 1, 'IGC Tech', 'IGC Tech', '1550724942_0.jpg', 'publish', 1, 3, '2019-02-21 04:55:42', '2019-02-21 04:55:42'),
(105, 1, 'IGC Tech', 'IGC Tech', '1550724942_1.jpg', 'publish', 1, 3, '2019-02-21 04:55:42', '2019-02-21 04:55:42'),
(106, 1, 'IGC Tech', 'IGC Tech', '1550724942_2.jpg', 'publish', 1, 3, '2019-02-21 04:55:42', '2019-02-21 04:55:42'),
(107, 1, 'IGC Tech', 'IGC Tech', '1550724942_3.jpg', 'publish', 1, 3, '2019-02-21 04:55:42', '2019-02-21 04:55:42'),
(108, 1, 'IGC Tech', 'IGC Tech', '1550724942_4.jpg', 'publish', 1, 3, '2019-02-21 04:55:42', '2019-02-21 04:55:42'),
(109, 1, 'IGC Tech', 'IGC Tech', '1550724942_5.jpg', 'publish', 1, 3, '2019-02-21 04:55:42', '2019-02-21 04:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'main-menu', '2018-12-24 00:37:42', '2018-12-24 00:50:46'),
(3, 'bottom-menu', '2018-12-24 00:50:36', '2018-12-24 00:50:36'),
(4, 'jjjjjjjjjj', '2019-03-04 23:04:16', '2019-03-04 23:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` int(10) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `label`, `link`, `parent`, `sort`, `class`, `menu`, `depth`, `created_at`, `updated_at`) VALUES
(4, 'About', 'about', 0, 0, 'abot', 2, 0, '2018-12-24 00:37:59', '2018-12-28 00:47:36'),
(5, 'Services', 'services', 0, 1, NULL, 2, 0, '2018-12-24 00:38:18', '2018-12-24 00:39:48'),
(6, 'Gallery', 'galleries', 0, 2, NULL, 2, 0, '2018-12-24 00:38:36', '2019-01-19 23:50:36'),
(7, 'CRS', 'crs', 0, 3, NULL, 2, 0, '2018-12-24 00:39:00', '2018-12-24 00:39:48'),
(8, 'Careers', 'careers', 0, 4, NULL, 2, 0, '2018-12-24 00:39:32', '2019-01-22 00:35:20'),
(9, 'Contact', 'contact', 0, 5, NULL, 2, 0, '2018-12-24 00:39:46', '2019-01-22 00:35:20'),
(10, 'About', 'about', 0, 0, NULL, 3, 0, '2018-12-24 00:52:07', '2018-12-24 00:52:57'),
(11, 'Contact Us', 'contact', 0, 1, NULL, 3, 0, '2018-12-24 00:52:22', '2018-12-24 00:52:57'),
(12, 'Career', 'careers', 0, 2, NULL, 3, 0, '2018-12-24 00:52:55', '2019-02-07 23:24:19'),
(13, 'Label menu', 'http://', 0, 1, NULL, 4, 0, '2019-03-04 23:04:21', '2019-03-04 23:04:21');

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_10_06_084930_create_posts_table', 1),
(7, '2018_10_06_120842_create_cache_table', 1),
(9, '2017_08_11_073824_create_menus_wp_table', 3),
(10, '2017_08_11_074006_create_menu_items_wp_table', 3),
(12, '2018_10_31_150733_create_categories_table', 4),
(13, '2018_10_31_154317_create_category_post_table', 5),
(15, '2018_11_03_155357_create_topics_table', 7),
(19, '2018_11_03_143630_create_pages_table', 8),
(20, '2018_11_03_155357_create_options_table', 9),
(23, '2018_11_11_090010_create_sliders_table', 10),
(24, '2018_11_11_074134_create_contacts_table', 11),
(25, '2018_11_11_092100_create_newsletters_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `nl_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `nl_email`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '2019-02-21 03:50:37', '2019-02-21 03:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autoload` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '_yes',
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_key`, `option_title`, `option_value`, `group`, `autoload`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'site_title', NULL, 'This is website details.', NULL, '_yes', '1', '2018-12-24 01:18:34', '2019-03-01 00:57:36', NULL),
(2, 'short_desc', NULL, 'This is website details.', NULL, '_yes', '1', '2018-12-24 01:18:34', '2018-12-24 01:18:34', NULL),
(3, 'admin_email', NULL, 'akash2046@gmail.com', NULL, '_yes', '1', '2018-12-24 01:18:34', '2018-12-24 01:18:34', NULL),
(4, 'fb_page_link', 'Facebook page link', 'https://www.facebook.com/igctechnology', 'social', '_yes', '1', '2018-12-24 01:18:34', '2019-01-22 23:20:22', NULL),
(5, 'newsletter_title', NULL, 'dsadad', 'social', '_yes', '1', NULL, NULL, NULL),
(6, 'newsletter_sub_title', NULL, 'saddasd', NULL, '_yes', '1', NULL, NULL, NULL),
(7, 'copy_right', NULL, '- IGC Technology. All rights reserved.', NULL, '_yes', '1', NULL, NULL, NULL),
(8, 'twitter', NULL, 'twitter', 'social', '_yes', '1', NULL, NULL, NULL),
(9, 'what_we_do_section_head', NULL, '<div class=\"section-heading\">                            <div class=\"main-title\">                                <h1 class=\"color-blue\">What we do</h1>                                <h3 class=\"color-gray\">We make creative Solution</h3>                                <div class=\"content-paragraph\">                                    <p>We are in the business of making you stand out from everyone else.                                        When we work with you, we want to inspire you and help you to continue to                                        enhance your reputation.                                        We want to make sure that you excite your existing customers – and notice new                                        clients too.</p>                                </div>                            </div>                        </div>', 'homepage', '_yes', '1', NULL, '2019-01-16 00:41:55', NULL),
(10, 'testomonials', NULL, '<h1 class=\"color-blue\">Testimonial</h1>\r\n                                    <h3 class=\"color-gray\">What are clients Say</h3>', NULL, '_yes', '1', NULL, NULL, NULL),
(11, 'team', NULL, '<h1 class=\"color-blue\">Team</h1>\r\n                                    <h3 class=\"color-gray\">Meet Our Team</h3>\r\n                                    <div class=\"content-paragraph\">\r\n                                        <p class=\"color-gray\">We have formed our team as diverse as possible bringing\r\n                                            together people with varied skills, talents and backgrounds so as to\r\n                                            combine diversity of thoughts and ideas to design a solution that serves\r\n                                            the best interest of our clients. We are committed to placing the best\r\n                                            mind, expertise and talent to deliver services to our clients. <br><br> </p>\r\n                                    </div>', NULL, '_yes', '1', NULL, NULL, NULL),
(12, 'about_us', NULL, '<h1 class=\"color-white\">About Us</h1>\r\n                                    <h3 class=\"color-white\">Unlimited Skills for super proects</h3>\r\n                                    <div class=\"content-paragraph\">\r\n                                        <p class=\"\">We consider our service as our worship and share that message\r\n                                            across our team and extend it across our partners and clients. Our\r\n                                            motivation comes from our client’s satisfaction and growth. </p>\r\n                                    </div>', NULL, '_yes', '1', NULL, NULL, NULL),
(13, 'bottom_contact', NULL, '      <h3>We estimate your project accurately.</h3>\r\n                                            <p>Calculating realistic project timelines.</p>\r\n                                            <div class=\"con-em\">\r\n                                                <ul>\r\n                                                    <li>Tel: +977 (1) 4107803</li>\r\n                                                    <li>Email: Info@igctech.com.np</li>\r\n                                                </ul>\r\n                                            </div>\r\n                                        </div>', NULL, '_yes', '1', NULL, NULL, NULL),
(14, 'bottom_social_icon', NULL, '<li><a href=\"\"><i class=\"fab fa-facebook-f\"></i></a></li>\r\n                                                <li><a href=\"\"><i class=\"fab fa-tumblr\"></i></a></li>\r\n                                                <li><a href=\"\"><i class=\"fab fa-twitter\"></i></a></li>\r\n                                                <li><a href=\"\"><i class=\"fab fa-instagram\"></i></a></li>', NULL, '_yes', '1', NULL, NULL, NULL),
(15, 'about_inner_image', NULL, 'sda', NULL, '_yes', '1', NULL, NULL, NULL),
(16, 'home_inner_image_url', NULL, 'assets/images/background.jpeg', NULL, '_yes', '1', NULL, NULL, NULL),
(17, 'home_welcome_content', 'WELCOME TO IGC TECHNOLOGY Web Design and Development ... [Home page welcome content]', '<h1 class=\"main-intro\">Welcome to</h1>\r\n                            <h1 class=\"primary-intro\">IGC Technology</h1>\r\n                            <div class=\"intro-paragraph\">\r\n                                <p>Web Design and Development, Mobile App &amp; Branding</p>\r\n                            </div>\r\n                            <div class=\"view-more-btn\">\r\n                                <a href=\"/about\" class=\"btn-4\">Get more info</a>\r\n                            </div>', NULL, '_yes', '1', NULL, '2019-01-30 23:06:41', NULL),
(18, 'about_us_counting', NULL, '<div class=\"col-sm-6 col-6\">\r\n                                                                <div class=\"count-section\">\r\n                                                                    <div class=\"counter\" data-count=\"134\">127</div>\r\n                                                                    <div class=\"countter-title\">\r\n                                                                        <label>Projects</label>\r\n                                                                    </div>\r\n                                                                </div>\r\n                                                            </div>\r\n                                                            <div class=\"col-sm-6 col-6\">\r\n                                                                <div class=\"count-section\">\r\n                                                                    <div class=\"counter\" data-count=\"58\">58</div>\r\n                                                                    <div class=\"countter-title\">\r\n                                                                        <label>Clients</label>\r\n                                                                    </div>\r\n                                                                </div>\r\n                                                            </div>\r\n                                                            <div class=\"col-sm-6 col-6\">\r\n                                                                <div class=\"count-section\">\r\n                                                                    <div class=\"counter\" data-count=\"110\">110</div>\r\n                                                                    <div class=\"countter-title\">\r\n                                                                        <label>Team Member</label>\r\n                                                                    </div>\r\n                                                                </div>\r\n                                                            </div>\r\n                                                            <div class=\"col-sm-6 col-6\">\r\n                                                                <div class=\"count-section\">\r\n                                                                    <div class=\"counter\" data-count=\"25\">25</div>\r\n                                                                    <div class=\"countter-title\">\r\n                                                                        <label>Products</label>\r\n                                                                    </div>\r\n                                                                </div>\r\n                                                            </div>', NULL, '_yes', '1', NULL, '2019-01-22 23:29:41', NULL),
(19, 'about_us_front_image_url', NULL, 'assets/images/abt-pic.jpeg', NULL, '_yes', '1', NULL, NULL, NULL),
(20, 'why_us_inner_image_url', NULL, 'assets/images/account.png', NULL, '_yes', '1', NULL, NULL, NULL),
(21, 'get_in_touch_form_label', NULL, '<h1 class=\"color-blue\">Get in Touch</h1>\r\n                                    <h3 class=\"color-gray\">Meet Our Team</h3>', NULL, '_yes', '1', NULL, NULL, NULL),
(22, 'contact_us_page_address', 'Contact-Us', '<div class=\"igc-contact\">                             <div class=\"contact-title\">                                 <h3>Get in Touch</h3>                             </div>                             <div class=\"ad-igc\">                                 <label for=\"\">Address</label>                                 <p>3rd Floor, IGC Business Lounge <br>                                     Metro Park Building, Uttardhoka <br>                                     Lazimpat, Kathmandu, Nepal                                 </p>                             </div>                             <div class=\"ad-igc\">                                 <label for=\"\">Phone Number</label>                                 <p>+977-01-4005043 <br> 4005044                                 </p>                             </div>                             <div class=\"ad-igc\">                                 <label for=\"\">Email Address</label>                                 <p>info@igctech.com.np</p>                             </div>                         </div>', NULL, NULL, '1', '2019-01-20 22:53:24', '2019-01-20 22:53:24', NULL),
(23, 'crs_activities', 'CRS-Activities', '<div class=\"stats-heading \">                 <h1>                     CRS Activities                 </h1>             </div>             <div class=\"crs-avt\" style=\"margin-top:20px;\">                 <div class=\"col-md-8\">                     <div class=\"crs-1\">                         <p>                             “Corporate Social Responsibility is the continuing commitment by business to behave                             ethically and contribute to economic development while improving the quality of life of                             the workforce and their families as well as of the local community and society at                             large”. <br> <i style=\"float: right; font-weight:700\">- by Lord Holme and Richard Watts</i>                             <br><br>IGC has always believed in protecting the interest of the society in any way                             possible. The IGC team is dedicated towards taking the initiatives in carrying out                             activities for the welfare of the society as a whole. We take CSR seriously and this                             can be highlighted by few of our CSR activities as mentioned below:                         </p>                     </div>                 </div>             </div>', 'CRS', NULL, '1', '2019-01-20 23:07:31', '2019-01-20 23:09:38', NULL),
(24, 'crs_activities_bottom', 'crs-activities-bottom-slogan-detail', 'Our efforts towards CSR will always remain a priority and in the future we hope to contribute more to the social well being of the people of our nation.', 'CRS', NULL, '1', '2019-01-20 23:09:28', '2019-01-20 23:09:28', NULL),
(25, 'careers_page', 'Careers-at--IGC-Technology', '<div class=\"col-md-6\">                         <div class=\"careers-t stats-heading\">                             <h1>Careers at <br>IGC Technology </h1>                         </div>                         <div class=\"block general_info careers-paragraph\">                             <p>We are going to globalize the world with innovation. To do that we look for fresh                                 ambitious person to join our cause.</p>                         </div>                         <div class=\"view-more-btn career-btn\">                             <button type=\"button\" class=\"btn \" data-toggle=\"modal\" data-target=\"#exampleModalCenter\">                                 Apply                             </button>                         </div>                     </div>                     <div class=\"col-md-6\">                         <div class=\"career-img\">                             <img src=\"assets/images/abt-pic.jpeg\" alt=\"\">                         </div>                     </div>', NULL, NULL, '1', '2019-01-20 23:14:19', '2019-01-20 23:15:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('publish','pending','draft') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `homepage` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `feature_image`, `user_id`, `status`, `homepage`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'About Us', 'about-us', '<div class=\"row\">\r\n                            <div class=\"col-md-7 col-sm-12 col-12\">\r\n                                <div class=\"ag-main-title\">\r\n                                    <h3>About <br>Our Company </h3>\r\n                                </div>\r\n                                <div class=\"block general_info careers-paragraph\">\r\n                                    <p>We consider our service as our worship and share that message across our team and extend it across our partners and clients. Our motivation comes from our client’s satisfaction and growth.  <br><br>\r\n\r\n                                        We value, speed, elegance, quality and user-friendliness in our services and always put maximum focus on delivering maximum value to our clients. Our brightest, the most experienced and energetic people use a wide range of tools including Java and Python and work hard to make our services attractive to our clients. Thanks’ to our creative, tech-savvy and committed team, we have been able to extend our services across the world.</p>\r\n                                </div>\r\n                            </div>\r\n                            <div class=\"col-md-5 col-sm-12 col-12\">\r\n                                <div class=\"ig-abt-pic\">\r\n                                    <img src=\"assets/images/abt-pic.jpeg\" alt=\"\">\r\n                                </div>\r\n                            </div>\r\n                        </div>', '', '1', 'publish', NULL, 1, '2018-12-27 23:40:07', '2018-12-27 23:40:07', NULL),
(2, 'CRS', 'crs', '<p><br></p><div class=\"stats-heading \">\r\n                    <h1>\r\n                        CRS Activities\r\n                    </h1>\r\n                </div><p>\r\n                \r\n                    \r\n                        \r\n                            <br></p><div class=\"crs-1\">\r\n                                <p>\r\n                                    “Corporate Social Responsibility is \r\nthe continuing commitment by business to behave ethically and contribute\r\n to economic development while improving the quality of life of the \r\nworkforce and their families as well as of the local community and \r\nsociety at large”. <br> <i style=\"float: right; font-weight:700\">- by Lord Holme and Richard Watts</i>\r\n                                    <br><br>IGC has always believed in \r\nprotecting the interest of the society in any way possible. The IGC team\r\n is dedicated towards taking the initiatives in carrying out activities \r\nfor the welfare of the society as a whole. We take CSR seriously and \r\nthis can be highlighted by few of our CSR activities as mentioned below:\r\n                                </p>\r\n                            </div><p><br></p>', '', '1', 'publish', NULL, 2, '2018-12-27 23:43:34', '2018-12-27 23:43:34', NULL),
(3, 'test page', 'test-page', '<p>sdadasd<br></p>', 'uploads/feature_images/yamano_1548912062.jpg', '1', 'publish', NULL, 1, '2019-01-30 23:36:02', '2019-01-30 23:36:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$kqJn4QI8CiHp5soI1wRkQ.31VWWzH8jr5pKVbdGpaAbYmV5qLyPYu', '2019-01-30 03:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `menu_title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `object` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `description` text,
  `has_child` enum('0','1') DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  `is_menu` enum('0','1') DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `security` enum('0','1') DEFAULT '0',
  `status` enum('0','1') DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `menu_class` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `menu_title`, `link`, `object`, `action`, `description`, `has_child`, `parent_id`, `is_menu`, `order`, `security`, `status`, `created_at`, `updated_at`, `menu_class`) VALUES
(1, 'Pages Positions', 'menu', 'menu', 'index', NULL, '1', 0, '1', 1, '0', '1', NULL, NULL, 'fa fa-get-pocket'),
(2, 'All Pages', 'pages', 'pages', 'index', NULL, '0', 34, '1', 1, '0', '1', NULL, NULL, 'fa fa-list'),
(3, 'Add New', 'pages/create/', 'pages', 'create', NULL, '0', 34, '1', 2, '0', '1', NULL, NULL, 'fa fa-plus'),
(4, 'All Menu', 'menu', 'menu', 'index', NULL, '0', 1, '1', 5, '0', '1', NULL, NULL, 'fa fa-list'),
(5, 'Add Menu', 'menu/create', 'menu', 'create', NULL, '0', 1, '1', 6, '0', '1', NULL, NULL, 'fa fa-plus'),
(6, 'Contents', '#', '', NULL, NULL, '1', 0, '1', 3, '0', '1', NULL, NULL, 'fa fa-th-list'),
(7, 'All Contents', 'content', 'content', 'index', NULL, '1', 6, '1', 1, '0', '1', NULL, NULL, 'fa fa-list'),
(8, 'Add Content', 'content/create/', 'content', 'create', NULL, '0', 6, '1', 2, '0', '1', NULL, NULL, 'fa fa-plus'),
(9, 'Category', 'category', 'category', 'index', NULL, '0', 6, '1', 3, '0', '1', NULL, NULL, 'fa fa-list-alt'),
(10, 'Add Category', 'category/create', 'category', 'create', NULL, '0', 6, '1', 4, '0', '1', NULL, NULL, 'fa fa-plus'),
(11, 'Slider', '#', NULL, NULL, NULL, '1', 0, '1', 4, '0', '1', NULL, NULL, 'fa fa-picture-o'),
(12, 'All Slider', 'slider', 'slider', 'index', NULL, '0', 11, '1', 1, '0', '1', NULL, NULL, 'fa fa-list'),
(13, 'Add New', 'slider/create', 'slider', 'create', NULL, '0', 11, '1', 2, '0', '1', NULL, NULL, 'fa fa-plus'),
(14, 'Photo Gallery', '#', NULL, NULL, NULL, '0', 0, '1', 5, '0', '1', NULL, NULL, 'fa fa-camera'),
(15, 'All Galleries', 'gallery', 'gallery', 'index', NULL, '0', 14, '1', 7, '0', '1', NULL, NULL, 'fa fa-list'),
(16, 'Add New', 'gallery/create', 'gallery', 'create', NULL, '0', 14, '1', 7, '0', '1', NULL, NULL, 'fa fa-plus'),
(17, 'Video Gallery', '#', NULL, NULL, NULL, '0', 0, '1', 6, '0', '1', NULL, NULL, 'fa fa-video-camera'),
(18, 'All Videos', 'video', 'video', 'index', NULL, '0', 17, '1', 7, '0', '1', NULL, NULL, 'fa fa-list'),
(19, 'Add Videos', 'video/create', 'video', 'create', NULL, '0', 17, '1', 8, '0', '1', NULL, NULL, 'fa fa-plus'),
(20, 'User Management', '#', NULL, NULL, NULL, '1', 0, '1', 7, '0', '1', NULL, NULL, 'fa fa-user'),
(21, 'All User', 'user', 'user', 'index', NULL, '1', 20, '1', 1, '0', '1', NULL, NULL, 'fa fa-list'),
(22, 'Add User', 'user/create', 'user', 'create', NULL, '1', 20, '1', 2, '0', '1', NULL, NULL, 'fa fa-plus'),
(23, 'Change Profile', 'changepassword', 'user', NULL, NULL, '1', 20, '1', 3, '0', '1', NULL, NULL, 'fa fa-lock'),
(24, 'Setting', '#', NULL, NULL, NULL, '1', 0, '1', 8, '0', '1', NULL, NULL, 'fa fa-wrench'),
(25, 'Option', 'option', NULL, NULL, NULL, '1', 24, '1', 7, '0', '1', NULL, NULL, 'fa fa-cog'),
(26, 'Feedback', '#', NULL, NULL, NULL, '1', 0, '1', 9, '0', '1', NULL, NULL, 'fa fa-comments-o'),
(27, 'Subscriber', NULL, NULL, NULL, NULL, '0', 26, '1', 7, '0', '1', NULL, NULL, NULL),
(28, 'Message', 'feedbacklist', NULL, NULL, NULL, '0', 26, '1', 7, '0', '1', NULL, NULL, NULL),
(30, 'Email Template', '#', NULL, NULL, NULL, '0', 24, '1', NULL, '0', '1', NULL, NULL, 'fa fa-envelope'),
(31, 'Add Template', '/emailtemplate/create', NULL, NULL, NULL, '0', 30, '1', NULL, '0', '1', NULL, NULL, 'fa fa-plus'),
(32, 'List Email Template', '/emailtemplate', NULL, NULL, NULL, '0', 30, '1', NULL, '0', '1', NULL, NULL, 'fa fa-list'),
(33, 'Edit Page', 'pages/edit', 'pages', 'edit', NULL, '0', 34, '0', 3, '0', '1', NULL, NULL, NULL),
(34, 'Page ', 'pages/index', 'pages', 'index', NULL, '0', 0, '1', 2, '0', '1', NULL, NULL, 'fa fa-sitemap'),
(35, 'Delete Page', 'page/delete', 'page', 'delete', NULL, '0', 34, '0', 4, '0', '1', NULL, NULL, NULL),
(36, 'Change Page Status', NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, '0', '1', NULL, NULL, NULL),
(37, 'Role', '#', NULL, NULL, NULL, '0', NULL, '0', NULL, '0', '1', NULL, NULL, NULL),
(38, 'Add Role', NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, '0', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cast_id` int(11) DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('m','f','t') COLLATE utf8_unicode_ci DEFAULT 'm',
  `profession` int(11) DEFAULT NULL,
  `identity_show` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_personal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_offical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `working_org_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `working_status` enum('y','n') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `user_id`, `cast_id`, `fname`, `mname`, `lname`, `nickname`, `dob`, `gender`, `profession`, `identity_show`, `photo`, `phone_personal`, `phone_offical`, `mobile`, `email`, `website`, `facebook`, `twitter`, `google`, `instagram`, `working_org_id`, `working_status`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_content` text COLLATE utf8mb4_unicode_ci,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) DEFAULT '0',
  `status` enum('publish','pending','draft') COLLATE utf8mb4_unicode_ci DEFAULT 'publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `short_content`, `feature_image`, `user_id`, `views`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'High End Service', 'igcs-nepal-earthquake-relief-efforts', '<p><br></p><div class=\"crs-paragraph\">\r\n                                    <p>Since the massive earthquake that\r\n hit Nepal on 25th April 2015, IGC has been continuously working towards\r\n providing relief to the victims as well as mobilizing the necessary \r\nmaterials to the most affected areas. We have been able to reach 7 \r\naffected districts namely Sindhupalchowk, Kavrepalanchowk, Nuwakot, \r\nDhading, Ramechhap, Okhaldunga and Makwanpur. Through our initiative we \r\nhave been able to reach 5000 affected families who have received tents, \r\ntarpaulins, food, blankets and medicines from us. Also, we organized \r\nhealth camps at Sindhupalchowk, Nuwakot and Bhaktapur with international\r\n doctors and were able to assist many injured patients. As per our long \r\nterm plans, we are planning on constructing temporary school shelters as\r\n well as permanent school buildings in areas where school buildings are \r\ndestroyed.</p>\r\n                                </div><p>\r\n                            \r\n                            <br></p><div class=\"mn-crs\">\r\n                                <div class=\"crs-paragraph\">\r\n                                    <p class=\"fm-it\">Our efforts towards\r\n CSR will always remain a priority and in the future we hope to \r\ncontribute more to the social well being of the people of our nation.</p>\r\n                                </div>\r\n                            </div><p><br></p>', NULL, 'advan-icon-2.png', '1', 0, 'publish', '2018-12-27 23:34:51', '2018-12-27 23:34:51', NULL),
(3, 'CONSTRUCTIONS OF SCHOOL BUILDINGS', 'CONSTRUCTIONS OF SCHOOL BUILDINGS', '<p>Under the CSR the IGC has by now already constructed 50 school buildings in the remote and inaccessible rural areas of Nepal wherein many school children are able now to study in comfortable study rooms with newly built schools in their own locations. IGC also secured additional financial support from the Japan based Asia Friendship Network for such schemes for which it remains grateful to them for their generous cooperation to the cause of education development in Nepal’s rural populac<br></p>', NULL, '', '1', 0, 'publish', '2018-12-27 23:35:45', '2018-12-27 23:35:45', NULL),
(4, 'SUPPORT TO MAYA NEPAL', 'SUPPORT TO MAYA NEPAL', '<p>WUnder the CSR the IGC has by now already constructed 50 school buildings in the remote and inaccessible rural areas of Nepal wherein many school children are able now to study in comfortable study rooms with newly built schools in their own locations. IGC also secured additional financial support from the Japan based Asia Friendship Network for such schemes for which it remains grateful to them for their generous cooperation to the cause of education development in Nepal’s rural populac<br></p>', NULL, '', '1', 0, 'publish', '2018-12-27 23:36:16', '2018-12-27 23:36:16', NULL),
(5, 'VISIT AND DONATION PROGRAM AT DISABLED SERVICE ASSOCIATION', '<p>On 3rd July 2014, our team visited \"Disabled Service Association\" at Karyabinayak, Bungmati, Lalitpur marking our 2nd anniversary of AAX operations. There, we donated wheelchairs and food items to those children who have various kinds of physical and m', '<p><span style=\"color: rgb(61, 59, 59); font-family: \"Work Sans\", sans-serif; font-size: 16px; text-align: justify;\">On 3rd July 2014, our team visited \"Disabled Service Association\" at Karyabinayak, Bungmati, Lalitpur marking our 2nd anniversary of AAX operations. There, we donated wheelchairs and food items to those children who have various kinds of physical and mental disabilities. AlsoThe Association is home to around 40 children - boys and girls - from various districts of Nepal. Differently-able children from different parts of the country have been staying at the association for education and access to better facility and opportunity. The children there are between the ages of 4 to 21 years and are blind, dumb, deaf or physically impaired.</span><br></p>', NULL, 'uploads/feature_images/file-20181119-44274-v4jiya_1548136640.jpg', '1', 0, 'publish', '2019-01-22 00:12:20', '2019-01-28 23:41:50', NULL),
(6, 'We make Creative solution', 'we-make-creative-solution', 'We provide around-the-clock service to our clients\r\nWe value speed and make our response without delay\r\nWe seek to understand our client’s need and serve accordingly\r\nWe collaborate with our clients in delivering solutions to their problems.', '<ul>\r\n														<li class=\"list-wht-do-do\">We provide around-the-clock service to our clients</li>\r\n														<li class=\"list-wht-do-do\">We value speed and make our response without delay</li>\r\n														<li class=\"list-wht-do-do\">We seek to understand our client’s need and serve accordingly</li>\r\n														<li class=\"list-wht-do-do\">We collaborate with our clients in delivering solutions to their problems</li>\r\n													</ul>', 'uploads/feature_images/office2_1548219929.jpg', '1', 0, 'publish', '2019-01-22 23:20:29', '2019-02-21 00:08:28', NULL),
(7, 'Qualified Team', 'qualified-team', '<p>Our qualified professionals will help you make a better start in your business.<br></p>', NULL, 'advan-icon-1_1549007403.png', '1', 0, 'publish', '2019-01-22 23:59:14', '2019-02-01 02:05:03', NULL),
(8, 'High End Service', 'high-end-service', '<p>We develop strategies for large brands to small and for medium enterprises.</p><p><br></p>', NULL, 'advan-icon-2_1549008146.png', '1', 0, 'publish', '2019-01-23 00:00:22', '2019-02-01 02:17:26', NULL),
(9, 'IGC’S NEPAL EARTHQUAKE RELIEF EFFORTS', 'igcs-nepal-earthquake-relief-efforts', '<p><span style=\"color: rgb(61, 59, 59); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 16px; text-align: justify;\">Since the massive earthquake that hit Nepal on 25th April 2015, IGC has been continuously working towards providing relief to the victims as well as mobilizing the necessary materials to the most affected areas. We have been able to reach 7 affected districts namely Sindhupalchowk, Kavrepalanchowk, Nuwakot, Dhading, Ramechhap, Okhaldunga and Makwanpur. Through our initiative we have been able to reach 5000 affected families who have received tents, tarpaulins, food, blankets and medicines from us. Also, we organized health camps at Sindhupalchowk, Nuwakot and Bhaktapur with international doctors and were able to assist many injured patients. As per our long term plans, we are planning on constructing temporary school shelters as well as permanent school buildings in areas where school buildings are destroyed.</span><br></p>', NULL, '', '1', 0, 'publish', '2019-01-28 23:29:23', '2019-01-28 23:29:23', NULL),
(11, 'Professionalism', 'professionalism', '<p><span style=\"color: rgb(74, 74, 74); font-family: \"Work Sans\", sans-serif; font-size: 16px; text-align: center;\">We\'re a team of technical experts dedicated to smarter search engine marketing.</span><br></p>', NULL, 'advan-icon-3_1550663577.png', '1', 0, 'publish', '2019-01-28 23:32:55', '2019-02-20 06:07:57', NULL),
(12, 'Monthly Reports', 'monthly-reports', '<p><span style=\"color: rgb(74, 74, 74); font-family: \"Work Sans\", sans-serif; font-size: 16px; text-align: center;\">Our qualified professionals will help you make a better start in your business.</span><br></p>', NULL, 'advan-icon-4_1550723573.png', '1', 0, 'publish', '2019-01-28 23:33:36', '2019-02-20 22:47:53', NULL),
(13, 'Great Settings', 'great-settings', '<p><span style=\"color: rgb(74, 74, 74); font-family: \"Work Sans\", sans-serif; font-size: 16px; text-align: center;\">We develop strategies for large brands to small and for medium enterprises.</span><br></p>', NULL, 'advan-icon-5_1550723583.png', '1', 0, 'publish', '2019-01-28 23:33:58', '2019-02-20 22:48:03', NULL),
(14, 'Database Analysis', 'database-analysis', '<p><span style=\"color: rgb(74, 74, 74); font-family: \"Work Sans\", sans-serif; font-size: 16px; text-align: center;\">We\'re a team of technical experts dedicated to smarter search engine marketing.</span><br></p>', '<p><span style=\"color: rgb(74, 74, 74);\">We\'re a team of technical experts dedicated to smarter search engine marketing.</span><br></p>', 'advan-icon-6_1550723590.png', '1', 0, 'publish', '2019-01-28 23:34:15', '2019-02-20 22:48:10', NULL),
(15, 'VISIT AND DONATION PROGRAM AT ORPHANAGE', 'visit-and-donation-program-at-orphanage', '<p><span style=\"color: rgb(61, 59, 59); font-family: &quot;Work Sans&quot;, sans-serif; font-size: 16px; text-align: justify;\">We started the year 2014 with a CSR Program at \"New Youth Children Development Society\" in Bhaktapur.. The orphanage has 50 children and is run by Asia Friendship Network. Our team from IGC went to the orphanage and spent an entire day playing and eating with the children on 4th Jan 2014 i.e. Saturday. We had collected clothes and toys from all the members of IGC and they were distributed among the children. Also, we provided lunch to the children and served them ourselves. Chocolates and biscuits were also distributed. Games were played and an art competition was held where 3 winners were given prizes.</span><br></p>', NULL, '', '1', 0, 'publish', '2019-01-28 23:39:54', '2019-01-28 23:39:54', NULL),
(16, 'We make Creative solution', 'we-make-creative-solution', '<ul><li>We provide around-the-clock service to our clients<br></li><li>We value speed and make our response without delay</li><li>We seek to understand our client’s need and serve accordingly</li><li>We collaborate with our clients in delivering solutions to their problems</li></ul>', '<ul><li>We provide around-the-clock service to our clients<br></li><li>We value speed and make our response without delay</li><li>We seek to understand our client’s need and serve accordingly</li><li>We collaborate with our clients in delivering solutions to their problems</li></ul>', '', '1', 0, 'publish', '2019-01-28 23:47:35', '2019-02-21 00:08:30', NULL),
(19, 'test', 'test', '<p>afaa<br></p>', '<p>asd<br></p>', 'yamano_1548998458.jpg', '1', 0, 'publish', '2019-01-31 23:35:58', '2019-01-31 23:35:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 'This is administrator panel! You can Add/Update/Publish/Delete authorized content in website.\r\n            ', '2017-06-27 00:40:31', '2017-06-27 00:40:31'),
(2, 'Web Master', 'This is Webmaster section! You can Add/Update/Publish/Delete authorized content in website.\r\n            ', NULL, '2018-01-16 09:56:26'),
(3, 'Entry User', 'This is entry user section! You can Add/Update/Publish/Delete authorized content in website.\r\n            ', '2017-07-06 03:19:05', '2017-07-11 09:10:27'),
(4, 'Administrator', 'This is Administrator section! You can Add/Update/Publish/Delete authorized content in website.\r\n            ', '2018-01-29 09:55:33', '2018-01-29 09:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('publish','pending','draft') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `link`, `image`, `status`, `user_id`, `position`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'fddsfd', '1', 'uploads/images/chitlang_1548055300.jpg', 'publish', '1', 'first', NULL, '2019-01-21 01:36:40', '2019-01-21 01:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gplus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('publish','pending','draft') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `homepage` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `title`, `slug`, `content`, `feature_image`, `user_id`, `designation`, `fb`, `gplus`, `linkedin`, `insta`, `status`, `homepage`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ganesh Man Lama', 'ganesh-man-lama', '<p>The detail about ganesh sir.<br></p>', 'ganeshmanlama_1550723692.jpg', '1', 'President', NULL, NULL, NULL, NULL, 'publish', 1, NULL, '2019-01-16 01:44:36', '2019-02-20 22:49:52', NULL),
(2, 'Pragya Raj Rajbhandari', 'pragya-raj-rajbhandari', NULL, 'Pragya-Raj_1550723685.jpg', '1', 'Sr. Vice-President', NULL, NULL, NULL, NULL, 'publish', 1, 1, '2019-01-16 01:46:19', '2019-02-20 22:49:45', NULL),
(3, 'Sudip Rimal', 'sudip-rimal', NULL, 'Sudip-Rimal_1550723680.jpg', '1', 'Managing Director', NULL, NULL, NULL, NULL, 'publish', 1, 2, '2019-01-16 01:47:20', '2019-02-20 22:49:40', NULL),
(4, 'Uddhab Adhikari', 'uddhab-adhikari', NULL, 'udab.jpeg_1550723670.jpg', '1', 'CTO', NULL, NULL, NULL, NULL, 'publish', 1, 3, '2019-01-23 01:15:50', '2019-02-20 22:49:30', NULL),
(6, 'Bikas lama', 'bikas-lama', NULL, 'bikash_1550723664.jpg', '1', 'Director/HR adminstration', NULL, NULL, NULL, NULL, 'publish', 1, 5, '2019-01-29 00:59:16', '2019-02-20 22:49:24', NULL),
(7, 'Shubam Agrawal', 'shubam-agrawal', NULL, 'Shubham-Agrawal_1550723658.jpg', '1', 'Director/Buisness Development', NULL, NULL, NULL, NULL, 'publish', 1, 4, '2019-01-29 00:59:40', '2019-02-20 22:49:18', NULL),
(10, 'yetdda', 'yetdda', '<p>sad<br></p>', 'advan-icon-1_1548914912.png', '1', NULL, NULL, NULL, NULL, NULL, 'publish', NULL, NULL, '2019-01-30 23:53:59', '2019-01-31 00:23:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `designation` text COLLATE utf8mb4_unicode_ci,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` enum('publish','pending','draft') COLLATE utf8mb4_unicode_ci DEFAULT 'publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `person_name`, `title`, `slug`, `description`, `designation`, `feature_image`, `order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Yamano', NULL, 'yamano', 'Every time I called IGC, they sent their staff immediately to attend to my problems. Their support staff are amiable, responsive and helpful and the service they provided to me is one of the best among those I received in the last 7 years. They always delivered beyond my expectation and I am grateful that they are in the market with such a superior service quality.', 'CEO', 'yamano_1550728340.jpg', 3, 'publish', '2019-01-16 23:18:00', '2019-02-21 00:07:20', NULL),
(2, 'Yamano', NULL, 'yamano', 'Every time I called IGC, they sent their staff immediately to attend to my problems. Their support staff are amiable, responsive and helpful and the service they provided to me is one of the best among those I received in the last 7 years. They always delivered beyond my expectation and I am grateful that they are in the market with such a superior service quality.', 'CEO', 'yamano_1550728334.jpg', 2, 'publish', '2019-01-16 23:18:00', '2019-02-21 00:07:14', NULL),
(3, 'Yamano', 'Yamano', 'yamano', '<p>Every time I called IGC, they sent their staff immediately to attend to my problems. Their support staff are amiable, responsive and helpful and the service they provided to me is one of the best among those I received in the last 7 years. They always delivered beyond my expectation and I am grateful that they are in the market with such a superior service quality.<br></p>', 'Yamano', 'yamano_1550728234.jpg', NULL, 'publish', '2019-02-20 23:42:25', '2019-02-21 00:05:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `status` enum('publish','pending','draft') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varbinary(25) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `Biography` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `role_id`, `Biography`, `email`, `feature_image`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pankaj', NULL, NULL, NULL, 'admin@gmail.com', 'udab.jpeg_1550725442.jpg', 'zuckerberg_1549622497.jpg', NULL, '$2y$10$2ppebqOLdQn901XKEB7gH.bk4LBEk9XQsEE3WJF09H0pjcbBVVKsq', 'wtEDcPJI6BSb0Jo6ibBSeRNhaNMYf7kE6nCJA4elaqhihr2xs3GAhI9NaoRY', '2018-11-25 23:36:24', '2019-02-20 23:19:02'),
(2, 'admin', 0x61646d696e, 4, '<p>asdsad</p>', 'admin@gmail.com', 'git_1548050833.png', NULL, NULL, 'admin', NULL, '2019-01-21 00:22:13', '2019-01-21 00:22:13'),
(3, 'asdasdasd', 0x617364, 4, '<p>asdasdasd</p>', 'admin@gmail.com', 'office6_1550741764.jpg', NULL, NULL, '$2y$10$W30nkwpgMPztPBHYxniMnutolYNsmNAofPYVm9wqGFC5jFdK.F2Gq', NULL, '2019-02-21 03:51:04', '2019-02-21 03:51:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_post_category_id_index` (`category_id`),
  ADD KEY `category_post_post_id_index` (`post_id`);

--
-- Indexes for table `cmsoptions`
--
ALTER TABLE `cmsoptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleryimages`
--
ALTER TABLE `galleryimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ecn_gallery_ecn_gallery_image` (`gallery_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_foreign` (`menu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tbl_role_permissions` (`role_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
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
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cmsoptions`
--
ALTER TABLE `cmsoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `galleryimages`
--
ALTER TABLE `galleryimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galleryimages`
--
ALTER TABLE `galleryimages`
  ADD CONSTRAINT `ecn_gallery_ecn_gallery_image` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`);

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_foreign` FOREIGN KEY (`menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `FK_tbl_role_permissions` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
