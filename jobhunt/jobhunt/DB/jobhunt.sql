-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2023 at 01:15 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobhunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `token`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'hadi', 'hadiesmaeli24@gmail.com', '$2y$10$ZP23Db3Pco4MwRF91p9hH.VzaKWe2oWEcBSLlM6MIwelhOmmRbJNC', '', 'admin.jpg', NULL, '2023-04-30 14:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `advertisments`
--

CREATE TABLE `advertisments` (
  `id` bigint UNSIGNED NOT NULL,
  `job_listing_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_listing_ad_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `job_listing_ad_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_listing_ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_listing_ad_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `company_listing_ad_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisments`
--

INSERT INTO `advertisments` (`id`, `job_listing_ad`, `job_listing_ad_url`, `job_listing_ad_status`, `company_listing_ad`, `company_listing_ad_url`, `company_listing_ad_status`, `created_at`, `updated_at`) VALUES
(1, 'job_listing_ad.png', 'http://www.test.io/', 'show', 'company_listing_ad.png', 'http://www.test.io/', 'show', NULL, '2023-05-07 19:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `banner_job_listing` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_job_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_job_categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_company_listing` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_company_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_pricing` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_blog` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_faq` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_terms` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_privacy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_signup` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_login` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_forget_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_company_panel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_candidate_panel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_job_listing`, `banner_job_detail`, `banner_job_categories`, `banner_company_listing`, `banner_company_detail`, `banner_pricing`, `banner_blog`, `banner_post`, `banner_faq`, `banner_contact`, `banner_terms`, `banner_privacy`, `banner_signup`, `banner_login`, `banner_forget_password`, `banner_company_panel`, `banner_candidate_panel`, `created_at`, `updated_at`) VALUES
(1, 'banner_job_listing.jpg', 'banner_job_detail.jpg', 'banner_job_categories.jpg', 'banner_company_listing.jpg', 'banner_company_detail.jpg', 'banner_pricing.jpg', 'banner_blog.jpg', 'banner_post.jpg', 'banner_faq.jpg', 'banner_contact.jpg', 'banner_terms.jpg', 'banner_privacy.jpg', 'banner_signup.jpg', 'banner_login.jpg', 'banner_forget_password.jpg', 'banner_company_panel.jpg', 'banner_candidate_panel.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `designation`, `username`, `email`, `password`, `token`, `photo`, `biography`, `phone`, `address`, `country`, `stat`, `city`, `zip_code`, `gender`, `marital_status`, `date_of_birth`, `website`, `status`, `created_at`, `updated_at`) VALUES
(1, 'james.es', 'Expert PHP and Laravel Developer', 'james.es', 'hadiesmaeli24@gmail.com', '$2y$10$ZP23Db3Pco4MwRF91p9hH.VzaKWe2oWEcBSLlM6MIwelhOmmRbJNC', NULL, 'candidate_profile_photo_1682933027.jpg', '<p>His cu nobis populo, eum laoreet evertitur te. In tollit audire adolescens vix. Ad veri admodum quo. Ea pri cetero timeam probatus, dicunt principes vel ut.</p>', '232-232-1212', '34, MKC Street', 'Canada', 'CA', 'NYC', '5467', '1', '2', '1985-04-04', 'https://www.peter.com', 1, NULL, '2023-05-01 16:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_applications`
--

CREATE TABLE `candidate_applications` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `job_id` int NOT NULL,
  `cover_letter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_applications`
--

INSERT INTO `candidate_applications` (`id`, `candidate_id`, `job_id`, `cover_letter`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'hi', 'approved', '2023-05-06 18:43:13', '2023-05-09 17:48:48'),
(4, 1, 2, 'i apply for web designer', 'rejected', '2023-05-09 17:32:15', '2023-05-09 17:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_awards`
--

CREATE TABLE `candidate_awards` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_awards`
--

INSERT INTO `candidate_awards` (`id`, `candidate_id`, `title`, `description`, `date`, `created_at`, `updated_at`) VALUES
(2, 1, 'Employee of the Year, AMB Software Solutions', 'Won the employee of the year award for accomplishing all the targets and goals.', '2021-05-15', '2023-05-01 14:29:42', '2023-05-01 14:29:42'),
(3, 1, 'The Dean\'s Award, MJ University', 'Awarded for representing the univerity at muiltiple international business case competitions.', '2020-07-19', '2023-05-01 14:30:19', '2023-05-01 14:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_bookmarks`
--

CREATE TABLE `candidate_bookmarks` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `job_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_bookmarks`
--

INSERT INTO `candidate_bookmarks` (`id`, `candidate_id`, `job_id`, `created_at`, `updated_at`) VALUES
(5, 1, 1, '2023-05-06 14:27:03', '2023-05-06 14:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_education`
--

CREATE TABLE `candidate_education` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `level` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `passing_year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_education`
--

INSERT INTO `candidate_education` (`id`, `candidate_id`, `level`, `institute`, `degree`, `passing_year`, `created_at`, `updated_at`) VALUES
(1, 1, 'Graduation', 'Khulna University', 'B. Sc. in CSE', '2008', '2023-04-30 17:44:53', '2023-04-30 17:44:53'),
(3, 1, 'Higher Secondary', 'Cant. Public College, Khulna', 'H.S.C.', '2002', '2023-04-30 18:02:26', '2023-04-30 18:02:26'),
(4, 1, 'Secondary', 'Cant. Public College, Khulna', 'S.S.C.', '2000', '2023-04-30 18:02:49', '2023-04-30 18:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_experiences`
--

CREATE TABLE `candidate_experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `company` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_experiences`
--

INSERT INTO `candidate_experiences` (`id`, `candidate_id`, `company`, `designation`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Google', 'System Analyst', '2021-01-21', '2022-05-01', '2023-05-01 14:01:37', '2023-05-01 14:01:37'),
(2, 1, 'Facebook', 'Senior Web Developer', '2017-05-01', '2017-02-06', '2023-05-01 14:07:29', '2023-05-01 14:07:29'),
(3, 1, 'Pixel Media Ltd.', 'Web Developer', '2015-05-23', '2023-04-27', '2023-05-01 14:08:29', '2023-05-01 14:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_resumes`
--

CREATE TABLE `candidate_resumes` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_resumes`
--

INSERT INTO `candidate_resumes` (`id`, `candidate_id`, `name`, `file`, `created_at`, `updated_at`) VALUES
(8, 1, 'Main CV', 'candidate_resume_1682932699.pdf', '2023-05-01 16:13:49', '2023-05-01 16:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_skills`
--

CREATE TABLE `candidate_skills` (
  `id` bigint UNSIGNED NOT NULL,
  `skill` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_skills`
--

INSERT INTO `candidate_skills` (`id`, `skill`, `percentage`, `candidate_id`, `created_at`, `updated_at`) VALUES
(2, 'PHP', '88', 1, '2023-05-01 13:32:13', '2023-05-01 13:32:13'),
(3, 'Laravel', '95', 1, '2023-05-01 13:32:27', '2023-05-01 13:32:27'),
(4, 'Javascript', '80', 1, '2023-05-01 13:32:40', '2023-05-01 13:32:40'),
(5, 'Photoshop', '70', 1, '2023-05-01 13:32:53', '2023-05-01 13:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_location_id` int DEFAULT NULL,
  `company_industry_id` int DEFAULT NULL,
  `company_size_id` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founded_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_mon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_tue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_wed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_thu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_fri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_sat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oh_sun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_code` text COLLATE utf8mb4_unicode_ci,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci,
  `linkedin` text COLLATE utf8mb4_unicode_ci,
  `instagram` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `person_name`, `username`, `email`, `password`, `token`, `company_logo`, `phone`, `address`, `company_location_id`, `company_industry_id`, `company_size_id`, `description`, `website`, `founded_on`, `oh_mon`, `oh_tue`, `oh_wed`, `oh_thu`, `oh_fri`, `oh_sat`, `oh_sun`, `map_code`, `facebook`, `twitter`, `linkedin`, `instagram`, `status`, `created_at`, `updated_at`) VALUES
(2, 'ABC Media Ltd.', 'James O\'neil', 'james', 'hadiesmaeli24@gmail.com', '$2y$10$ZP23Db3Pco4MwRF91p9hH.VzaKWe2oWEcBSLlM6MIwelhOmmRbJNC', '', 'company_logo_1682586536.png', '193-223-3483', '67, AM Road, KK Street', 2, 2, 2, '<p>Lorem ipsum dolor sit amet, te vis veri debet persius, populo platonem disputationi an mea. Eu pro mutat denique intellegam. Ne oporteat recteque scribentur mel, eam erant doctus gubergren ex. At per eros nonumes dissentiunt.</p>', 'https://www.abcmedialtd.com', '2010', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', '9:00 AM to 5:00 PM', 'Offday', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2172.706509014502!2d-116.04833484480983!3d58.39963502045449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b0d03d337cc6ad9%3A0x9968b72aa2438fa5!2sCanada!5e0!3m2!1sen!2sbd!4v1673540786606!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', 1, '2023-01-08 08:53:40', '2023-05-03 13:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `company_founds`
--

CREATE TABLE `company_founds` (
  `id` bigint UNSIGNED NOT NULL,
  `found` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_founds`
--

INSERT INTO `company_founds` (`id`, `found`, `created_at`, `updated_at`) VALUES
(1, '2018', '2023-04-30 17:05:33', '2023-04-30 17:05:33'),
(2, '2019', '2023-04-30 17:05:42', '2023-04-30 17:05:42'),
(3, '2020', '2023-04-30 17:05:52', '2023-04-30 17:05:52'),
(4, '2021', '2023-04-30 17:05:58', '2023-04-30 17:05:58'),
(5, '2022', '2023-04-30 17:06:04', '2023-04-30 17:06:04'),
(6, '2023', '2023-04-30 17:06:10', '2023-04-30 17:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `company_industries`
--

CREATE TABLE `company_industries` (
  `id` bigint UNSIGNED NOT NULL,
  `industry_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_industries`
--

INSERT INTO `company_industries` (`id`, `industry_name`, `created_at`, `updated_at`) VALUES
(1, 'Accounting Firm', '2023-04-30 17:06:59', '2023-04-30 17:06:59'),
(2, 'IT Firm', '2023-04-30 17:07:04', '2023-04-30 17:07:04'),
(3, 'Law Firm', '2023-04-30 17:07:10', '2023-04-30 17:07:10'),
(4, 'Real Estate Company', '2023-04-30 17:07:15', '2023-04-30 17:07:15'),
(5, 'Software Company', '2023-04-30 17:07:24', '2023-04-30 17:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `company_locations`
--

CREATE TABLE `company_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_locations`
--

INSERT INTO `company_locations` (`id`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Australia', '2023-04-30 16:56:48', '2023-04-30 16:56:48'),
(2, 'Bangladesh', '2023-04-30 16:56:54', '2023-04-30 16:56:54'),
(3, 'China', '2023-04-30 16:57:01', '2023-04-30 16:57:01'),
(4, 'Canada', '2023-04-30 16:57:07', '2023-04-30 16:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `company_photos`
--

CREATE TABLE `company_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_photos`
--

INSERT INTO `company_photos` (`id`, `company_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 2, 'company_photo_1683103151.jpg', '2023-05-03 15:39:11', '2023-05-03 15:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `company_sizes`
--

CREATE TABLE `company_sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_sizes`
--

INSERT INTO `company_sizes` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, '2-5 Persons', '2023-04-30 16:58:29', '2023-04-30 16:58:29'),
(2, '10-20 Persons', '2023-04-30 16:58:35', '2023-04-30 16:58:35'),
(3, '50-100 Persons', '2023-04-30 16:58:43', '2023-04-30 16:58:43'),
(4, '100+ Persons', '2023-04-30 16:58:55', '2023-04-30 16:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `company_videos`
--

CREATE TABLE `company_videos` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `video_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_videos`
--

INSERT INTO `company_videos` (`id`, `company_id`, `video_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'j_Y2Gwaj7Gs', '2023-05-03 15:49:45', '2023-05-03 15:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry??', '<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n<p>&nbsp;</p>', '2023-04-30 13:26:08', '2023-04-30 13:44:38'),
(2, 'College in Virginia, looked up one of the more obscure Latin words, consectet??', '<p>tin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '2023-04-30 13:27:39', '2023-04-30 13:27:39'),
(3, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has ??', '<hr />\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lacinia dignissim sem eget cursus. Donec non nibh et mi porta porttitor quis a quam. Ut interdum elit quis odio condimentum, in viverra quam pulvinar. In hac habitasse platea dictumst. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ex tortor, feugiat pharetra dignissim vel, ornare non velit. Nunc ultricies purus vitae ex iaculis, ac elementum velit volutpat. Phasellus tempus dui a accumsan sollicitudin. Nam iaculis a massa ut elementum. Fusce dapibus mollis ex, ac imperdiet magna rhoncus ac. Quisque eleifend imperdiet hendrerit. Maecenas sed accumsan mauris.</p>\r\n<p>Ut et lacinia neque, a placerat ipsum. Cras aliquam, orci ut feugiat tincidunt, tellus nisi vestibulum massa, at porttitor nisl nisl ut arcu. Morbi diam dui, posuere nec sem ut, tincidunt hendrerit nunc. Suspendisse ac consequat est. Fu</p>\r\n<p>&nbsp;</p>', '2023-04-30 13:28:13', '2023-04-30 13:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_items`
--

CREATE TABLE `home_page_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `job_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `search` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_category_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_category_subheading` text COLLATE utf8mb4_unicode_ci,
  `job_category_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_choose_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_choose_subheading` text COLLATE utf8mb4_unicode_ci,
  `why_choose_background` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_choose_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_job_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_job_subheading` text COLLATE utf8mb4_unicode_ci,
  `featured_job_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_background` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_subheading` text COLLATE utf8mb4_unicode_ci,
  `blog_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_page_items`
--

INSERT INTO `home_page_items` (`id`, `heading`, `text`, `job_title`, `job_category`, `job_location`, `search`, `background`, `job_category_heading`, `job_category_subheading`, `job_category_status`, `why_choose_heading`, `why_choose_subheading`, `why_choose_background`, `why_choose_status`, `featured_job_heading`, `featured_job_subheading`, `featured_job_status`, `testimonial_heading`, `testimonial_background`, `testimonial_status`, `blog_heading`, `blog_subheading`, `blog_status`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Find Your Desired Job', 'Search the best, perfect and suitable jobs that matches your skills in your expertise area.', 'Job Title', 'Job Category', 'Job Location', 'Search', 'banner_home.jpg', 'Job Categories', 'Get the list of all the popular job categories here', 'show', 'Why Choose Us', 'Our Methods to help you build your career in future', 'why_choose_home_background.jpg', 'show', 'Featured Jobs', 'Find the awesome jobs that matches your skill', 'show', 'Our Happy Clients', 'banner11.jpg', 'show', 'Latest News', 'Check our latest news from the following section', 'show', 'Job Hunt', NULL, NULL, '2023-04-30 05:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibility` text COLLATE utf8mb4_unicode_ci,
  `skill` text COLLATE utf8mb4_unicode_ci,
  `education` text COLLATE utf8mb4_unicode_ci,
  `benifit` text COLLATE utf8mb4_unicode_ci,
  `deadline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacancy` int NOT NULL,
  `job_category_id` int NOT NULL,
  `job_location_id` int NOT NULL,
  `job_type_id` int NOT NULL,
  `job_experience_id` int NOT NULL,
  `job_gender_id` int NOT NULL,
  `job_salary_range_id` int NOT NULL,
  `map_code` text COLLATE utf8mb4_unicode_ci,
  `is_featured` tinyint NOT NULL,
  `is_urgent` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `title`, `description`, `responsibility`, `skill`, `education`, `benifit`, `deadline`, `vacancy`, `job_category_id`, `job_location_id`, `job_type_id`, `job_experience_id`, `job_gender_id`, `job_salary_range_id`, `map_code`, `is_featured`, `is_urgent`, `created_at`, `updated_at`) VALUES
(1, 2, 'Software Engineer', '<p>We are looking for a motivated PHP / Laravel developer to come join our agile team of professionals. If you are passionate about technology, constantly seeking to learn and improve your skillset, then you are the type of person we are looking for! We are offering superb career growth opportunities, great compensation, and benefits.</p>', '<p>- Develop, record and maintain cutting edge web-based PHP applications on portal plus premium service platforms</p>\r\n<p>- Build innovative, state-of-the-art applications and collaborate with the User Experience (UX) team</p>\r\n<p>- Ensure HTML, CSS, and shared JavaScript is valid and consistent across applications</p>\r\n<p>- Prepare and maintain all applications utilizing standard development tools</p>\r\n<p>- Utilize backend data services and contribute to increase existing data services API</p>\r\n<p>- Lead the entire web application development life cycle right from concept stage to delivery and post launch support</p>', '<p>- Previous working experience as a PHP / Laravel developer for 4 year(s)</p>\r\n<p>- BS/MS degree in Computer Science, Engineering, MIS or similar relevant field</p>\r\n<p>- In depth knowledge of object-oriented PHP and Laravel PHP Framework</p>\r\n<p>- Hands on experience with SQL schema design, SOLID principles, REST API design</p>\r\n<p>- Software testing (PHPUnit, PHPSpec, Behat)</p>\r\n<p>- MySQL profiling and query optimization</p>\r\n<p>- Creative and efficient problem solver</p>', '<p>- B.Sc. in CSE from any reputed University</p>\r\n<p>- CGPA minimum 3.50</p>', '<p>- Early finish on Fridays for our end of week catch up (4:30 finish, and drink of your choice from the bar)</p>\n<p>- 28 days holiday(including bank holidays) rising by 1 day per year PLUS an additional day off on your birthday</p>\n<p>- Generous annual bonus.</p>\n<p>- Healthcare package</p>\n<p>- Free Breakfast on Mondays and free snacks in the office</p>\n<p>- Cycle 2 Work Scheme</p>\n<p>- Brand new MacBook Pro</p>', '2023-05-12 05:10:10', 2, 1, 1, 1, 3, 2, 3, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10479.736858111415!2d-79.54941021538883!3d43.696075096261126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb90d7c63ba5%3A0x323555502ab4c477!2sToronto%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sbd!4v1673620210604!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, 1, '2023-05-16 23:30:56', '2023-01-14 00:30:56'),
(2, 2, 'Web Designer', '<p>Lorem ipsum dolor sit amet, no tamquam gloriatur democritum mea, his suas everti ad. Odio nulla paulo vel ut, nam no primis accumsan, ad vis aliquam volumus delicatissimi. Tollit accumsan ei duo, his apeirian antiopam cu. At senserit laboramus gloriatur nam. Eu cetero similique nam. Eu dolorem nominavi nam.</p>\r\n<p>Te laudem labitur usu, iudico convenire abhorreant est cu. No discere philosophia necessitatibus vix, has te facete facilisi corrumpit, ne nec movet dolore. Usu modo dissentiunt ex, no iisque nonumes euripidis vel. Usu eius probatus consulatu ex. Suscipiantur intellegebat pri eu.</p>', '<p>- In iuvaret evertitur moderatius pri. Ei his quod labitur quaestio, veri homero ne ius.</p>\r\n<p>- Quod propriae delicatissimi at mel. Vis no dolor offendit torquatos.</p>\r\n<p>- Id dicit temporibus ullamcorper eos, mei an quas nonumy nusquam. In dictas reprehendunt vel, alterum mediocrem sadipscing ad vix.</p>\r\n<p>- Per hinc postulant ut, timeam impedit elaboraret no sit. Ne mel laudem scaevola, ut has esse facer omnes, cu sit eros decore democritum.</p>\r\n<p>- Sed et vide voluptatibus, cum graeco probatus incorrupte te.</p>', '<p>- Te sea erant numquam. Eu utamur explicari omittantur pri. Per odio omittantur cu, congue semper cu vis.</p>\r\n<p>- Sit in maiestatis theophrastus, causae blandit sit eu, dissentiet philosophia pro ex.</p>\r\n<p>- Est no sanctus debitis, id sale eleifend appellantur pri, ex elit liberavisse nam.</p>', '<p>- Et eos rebum graeci convenire, modus percipit vulputate an eam, eos soleat nostrud menandri ei.</p>\r\n<p>- Mutat ancillae vel id, qui id tota phaedrum senserit. Dico fabulas cu vis. Et reque dicta duo, eu ius aliquando liberavisse. Ad est possim quodsi.</p>', '<p>- Early finish on Fridays for our end of week catch up (4:30 finish, and drink of your choice from the bar)</p>\n<p>- 28 days holiday(including bank holidays) rising by 1 day per year PLUS an additional day off on your birthday</p>\n<p>- Generous annual bonus.</p>\n<p>- Healthcare package</p>\n<p>- Free Breakfast on Mondays and free snacks in the office</p>\n<p>- Cycle 2 Work Scheme</p>\n<p>- Brand new MacBook Pro</p>', '2023-06-28 05:10:10', 1, 1, 3, 2, 2, 1, 2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4813.6601003929845!2d-76.08544139295589!3d43.002220188858225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d98b4f6e5bac81%3A0x7cba128675331aa0!2sRuston&#39;s%20Diner!5e0!3m2!1sen!2sbd!4v1673639605774!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 0, 0, '2023-05-26 04:53:37', '2023-04-30 21:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', 'fas fa-magic', '2023-01-02 12:16:29', '2023-01-02 12:16:29'),
(2, 'Medical', 'fas fa-stethoscope', '2023-01-02 12:17:07', '2023-01-02 12:17:07'),
(3, 'Accounting', 'fas fa-landmark', '2023-01-02 12:17:47', '2023-01-02 12:17:47'),
(4, 'Data Entry', 'fas fa-share-alt', '2023-01-02 12:18:11', '2023-01-02 12:55:52'),
(5, 'Marketing', 'fas fa-bullhorn', '2023-01-02 12:18:38', '2023-01-02 12:18:38'),
(6, 'Production', 'fas fa-sitemap', '2023-01-02 12:19:08', '2023-01-02 12:19:08'),
(7, 'Garments', 'fas fa-users', '2023-01-02 12:19:41', '2023-01-02 12:19:41'),
(8, 'Education', 'fas fa-user-graduate', '2023-01-02 12:20:22', '2023-01-02 12:20:22'),
(9, 'Technician', 'fas fa-street-view', '2023-01-02 12:20:41', '2023-01-02 12:20:41'),
(11, 'Security', 'fas fa-lock', '2023-01-03 05:25:02', '2023-01-03 05:25:02'),
(12, 'Telecommunication', 'fas fa-vector-square', '2023-01-03 05:25:26', '2023-01-03 05:25:26'),
(13, 'Commercial', 'fas fa-suitcase', '2023-01-03 05:25:54', '2023-01-03 05:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `job_experiences`
--

CREATE TABLE `job_experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_experiences`
--

INSERT INTO `job_experiences` (`id`, `experience`, `created_at`, `updated_at`) VALUES
(2, '1 Year', '2023-04-30 16:47:09', '2023-04-30 16:47:09'),
(3, '2 Year', '2023-04-30 16:47:15', '2023-04-30 16:47:15'),
(4, '3 Year', '2023-04-30 16:47:21', '2023-04-30 16:47:21'),
(5, '4 Year', '2023-04-30 16:47:26', '2023-04-30 16:47:26'),
(6, '5 Year', '2023-04-30 16:47:35', '2023-04-30 16:47:35'),
(7, 'Fresher', '2023-05-12 16:31:09', '2023-05-12 16:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `job_locations`
--

CREATE TABLE `job_locations` (
  `id` bigint NOT NULL,
  `name` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_locations`
--

INSERT INTO `job_locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Australia', '2023-04-30', '2023-04-30'),
(2, 'Canada', '2023-04-30', '2023-04-30'),
(3, 'Germany', '2023-04-30', '2023-04-30'),
(4, 'USA', '2023-04-30', '2023-04-30'),
(5, 'china', '2023-04-30', '2023-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `job_salaries`
--

CREATE TABLE `job_salaries` (
  `id` bigint UNSIGNED NOT NULL,
  `range` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_salaries`
--

INSERT INTO `job_salaries` (`id`, `range`, `created_at`, `updated_at`) VALUES
(1, '100-500', '2023-04-30 16:47:52', '2023-05-02 13:44:38'),
(2, '500-1000', '2023-04-30 16:48:13', '2023-05-02 13:44:46'),
(3, '1000-1500', '2023-04-30 16:48:31', '2023-05-02 13:44:54'),
(4, '1500-2000', '2023-04-30 16:48:40', '2023-05-02 13:45:02'),
(5, '2000-2500', '2023-04-30 16:48:50', '2023-05-02 13:45:09'),
(6, '2500-3000', '2023-04-30 16:49:01', '2023-05-02 13:45:16'),
(7, '3000-3500', '2023-04-30 16:49:32', '2023-05-02 13:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', '2023-01-11 10:30:43', '2023-01-11 10:30:43'),
(2, 'Part Time', '2023-01-11 10:30:51', '2023-01-11 10:30:51'),
(3, 'Contractual', '2023-01-11 10:30:58', '2023-01-11 10:30:58'),
(4, 'Internship', '2023-01-11 10:31:11', '2023-01-11 10:31:11'),
(5, 'Freelance', '2023-01-11 10:31:21', '2023-01-11 10:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2023_04_20_142847_create_experiences_table', 22),
(28, '2023_04_21_203455_create_salary_range_table', 23),
(29, '2023_04_21_204900_create_salary_ranges_table', 24),
(31, '2023_04_24_075322_create_company_industry_table', 26),
(32, '2023_04_24_075519_create_company_industrys_table', 27),
(35, '2023_04_24_111023_create_company_industrys_table', 30),
(65, '2014_10_12_000000_create_users_table', 31),
(66, '2014_10_12_100000_create_password_reset_tokens_table', 31),
(67, '2019_08_19_000000_create_failed_jobs_table', 31),
(68, '2019_12_14_000001_create_personal_access_tokens_table', 31),
(69, '2023_04_07_095020_create_admins_table', 31),
(70, '2023_04_09_204358_create_home_page_items_table', 31),
(71, '2023_04_10_082758_create_job_categories_table', 31),
(72, '2023_04_11_065347_create_why_choose_items_table', 31),
(73, '2023_04_11_113758_create_testimonials_table', 31),
(74, '2023_04_11_210251_create_posts_table', 31),
(75, '2023_04_12_125222_create_faqs_table', 31),
(76, '2023_04_12_134735_create_page_faq_items_table', 31),
(77, '2023_04_12_190726_create_page_blog_items_table', 31),
(78, '2023_04_15_073016_create_page_term_items_table', 31),
(79, '2023_04_15_103253_create_page_privacy_items_table', 31),
(80, '2023_04_15_111323_create_page_contact_items_table', 31),
(81, '2023_04_16_080827_create_page_job_category_items', 31),
(82, '2023_04_16_092024_create_packages_table', 31),
(83, '2023_04_17_072503_create_page_pricing_items_table', 31),
(84, '2023_04_17_090337_create_page_other_items_table', 31),
(85, '2023_04_17_185224_create_companies_table', 31),
(86, '2023_04_18_210922_create_candidates_table', 31),
(87, '2023_04_19_103817_create_orders_table', 31),
(88, '2023_04_20_115929_create_job_locations_table', 31),
(89, '2023_04_20_132139_create_job_types_table', 31),
(90, '2023_04_20_142847_create_job_experiences_table', 32),
(91, '2023_04_21_204900_create_job_salaries_table', 33),
(92, '2023_04_24_074845_create_company_locations_table', 34),
(93, '2023_04_24_075749_create_company_sizes_table', 35),
(94, '2023_04_24_075956_create_company_founds_table', 36),
(95, '2023_04_24_111257_create_company_industries_table', 37),
(96, '2023_04_27_100246_create_company_photos_table', 38),
(97, '2023_04_27_143604_create_company_videos_table', 39),
(98, '2023_04_27_205611_create_jobs_table', 40),
(99, '2023_04_30_094018_create_candidate_education_table', 40),
(100, '2023_04_30_102716_create_candidate_education_table', 41),
(101, '2023_04_30_110842_create_skills_table', 42),
(102, '2023_05_01_061800_create_candidate_skills_table', 43),
(103, '2023_05_01_064044_create_candidate_experiences_table', 44),
(104, '2023_05_01_072341_create_candidate_awards_table', 45),
(105, '2023_05_01_073316_create_candidate_resumes_table', 46),
(106, '2023_05_03_144142_create_candidate_bookmarks_table', 47),
(107, '2023_05_06_075100_create_candidate_applications_table', 48),
(108, '2023_05_07_104948_create_advertisments_table', 49),
(109, '2023_05_08_184859_create_banners_table', 50),
(110, '2023_05_08_201300_create_subscribers_table', 51),
(111, '2023_05_09_134750_create_settings_table', 52);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` int NOT NULL,
  `package_id` int NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currently_active` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `company_id`, `package_id`, `order_number`, `paid_amount`, `payment_method`, `start_date`, `expire_date`, `currently_active`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '1673344340', '19', 'PayPal', '2023-01-10', '2023-04-05', 1, '2023-04-28 10:52:20', '2023-01-12 20:23:54'),
(2, 2, 2, '1673344551', '29', 'PayPal', '2023-01-10', '2023-02-09', 0, '2023-01-10 11:55:51', '2023-01-12 20:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `package_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_price` smallint NOT NULL,
  `package_days` smallint NOT NULL,
  `package_display_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_allowed_jobs` tinyint NOT NULL,
  `total_allowed_featured_jobs` tinyint NOT NULL,
  `total_allowed_photos` tinyint NOT NULL,
  `total_allowed_videos` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_price`, `package_days`, `package_display_time`, `total_allowed_jobs`, `total_allowed_featured_jobs`, `total_allowed_photos`, `total_allowed_videos`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 19, 7, '1 Week', 2, 1, 1, 1, '2023-01-07 13:47:31', '2023-01-13 21:34:39'),
(2, 'Standard', 29, 30, '1 Month', 4, 2, 2, 2, '2023-01-07 13:48:43', '2023-01-13 21:34:50'),
(3, 'Gold', 49, 90, '3 Months', -1, 15, 10, 10, '2023-01-07 13:49:36', '2023-01-07 13:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `page_blog_items`
--

CREATE TABLE `page_blog_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_blog_items`
--

INSERT INTO `page_blog_items` (`id`, `heading`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Blog', 'Blog', 'Blog', NULL, '2023-01-06 06:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `page_contact_items`
--

CREATE TABLE `page_contact_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contact_items`
--

INSERT INTO `page_contact_items` (`id`, `heading`, `map_code`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Contact', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21352.402716370183!2d-92.78038851217293!3d38.008773582048896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87c4de5cceb9b6bb%3A0x284be10f005781bd!2sCamdenton%2C%20MO%2065020%2C%20USA!5e0!3m2!1sen!2sbd!4v1673000849671!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Contact', 'Contact', NULL, '2023-01-07 03:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `page_faq_items`
--

CREATE TABLE `page_faq_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_faq_items`
--

INSERT INTO `page_faq_items` (`id`, `heading`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has ??', 'faq title', 'faq', NULL, '2023-04-30 13:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `page_job_category_items`
--

CREATE TABLE `page_job_category_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_job_category_items`
--

INSERT INTO `page_job_category_items` (`id`, `heading`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Job Categories', 'Job Categories', 'Job Categories', NULL, '2023-01-07 05:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `page_other_items`
--

CREATE TABLE `page_other_items` (
  `id` bigint UNSIGNED NOT NULL,
  `login_page_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_page_title` text COLLATE utf8mb4_unicode_ci,
  `login_page_meta_description` text COLLATE utf8mb4_unicode_ci,
  `signup_page_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `signup_page_title` text COLLATE utf8mb4_unicode_ci,
  `signup_page_meta_description` text COLLATE utf8mb4_unicode_ci,
  `forget_password_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `forget_password_title` text COLLATE utf8mb4_unicode_ci,
  `forget_password_meta_description` text COLLATE utf8mb4_unicode_ci,
  `job_listing_page_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_listing_page_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `job_listing_page_meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `company_listing_page_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_listing_page_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `company_listing_page_meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_other_items`
--

INSERT INTO `page_other_items` (`id`, `login_page_heading`, `login_page_title`, `login_page_meta_description`, `signup_page_heading`, `signup_page_title`, `signup_page_meta_description`, `forget_password_heading`, `forget_password_title`, `forget_password_meta_description`, `job_listing_page_heading`, `job_listing_page_title`, `job_listing_page_meta_description`, `company_listing_page_heading`, `company_listing_page_title`, `company_listing_page_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Login', 'Login', 'Login', 'Create Account', 'Signup', 'Signup', 'Forget Password', 'Forget Password', 'Forget Password', 'job listing', 'job listing', 'job listing', 'company listing', 'company listing', 'company listing', NULL, '2023-05-09 20:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `page_pricing_items`
--

CREATE TABLE `page_pricing_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_pricing_items`
--

INSERT INTO `page_pricing_items` (`id`, `heading`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Pricing', 'Pricing', 'Pricing', NULL, '2023-01-07 21:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `page_privacy_items`
--

CREATE TABLE `page_privacy_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_privacy_items`
--

INSERT INTO `page_privacy_items` (`id`, `heading`, `content`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', '<p>Ea pri harum eleifend, mel quodsi mentitum reformidans te. Tibique placerat luptatum eam ut, usu vocent prompta no. No agam verterem temporibus vis. Officiis scripserit sed no, eum ne quas accumsan efficiantur, in usu quas cetero sapientem. Ut appetere facilisi appellantur est, mei dolor corpora ne. Autem numquam atomorum ne mel.</p>\r\n<p>Altera noster appellantur nam cu, ponderum adversarium an eos. Alia ignota mediocrem nam et. Est quodsi inermis adversarium eu, sed atomorum mandamus intellegam id. Usu at insolens recteque.</p>\r\n<p>Nec prima laudem eu, in tale utroque incorrupte ius. Falli disputationi reprehendunt cum ea, te nec minim albucius neglegentur. Eos an ferri aperiam conceptam, ne qui legere cetero consequat. Quod adipiscing eos ad, ut quo quis principes torquatos. Laoreet sapientem cum ne. Pri simul impedit interesset ex.</p>\r\n<p>Mei eripuit interpretaris ut. Te quo numquam gloriatur, decore timeam per et. Ad sit amet hinc vulputate, ea habeo impedit torquatos pri, at semper facilis salutandi quo. Et brute recusabo adipiscing vim, eos viderer iudicabit no, ne mea fierent omnesque. In facete insolens expetenda quo, in labore impetus sea.</p>\r\n<p>Id sit aliquam praesent adolescens, cu eros mucius latine usu. Cu falli harum pertinacia his, vel placerat similique necessitatibus ea, labores graecis at mea. Te mel utamur impedit ponderum, pro ei tantas commune, accusam cotidieque ne mea. Aeterno graecis per ne, mei ut probatus patrioque. Mea suas nonumes no, dolorem invenire cu pri. Nam sumo democritum te, modo nostro iudicabit est in.</p>\r\n<p>Ea per quas electram similique, te posse sententiae pro. Eum no nostrud alterum epicuri, eum ea imperdiet posidonium inciderint. Eos albucius forensibus honestatis cu, volutpat hendrerit duo te, paulo everti nam ad. Ei eleifend percipitur disputationi cum, ea sint putent salutatus per, vix tibique maluisset argumentum an.</p>\r\n<p>Ex ius dicam alienum deterruisset. Ei sea sint ignota euripidis. Usu nonumes iracundia ne. Ad sint civibus per, eum iisque dissentias in, sea te rationibus elaboraret. Cibo luptatum no sed, recusabo maiestatis incorrupte te eam. Maluisset percipitur pro ex.</p>\r\n<p>Qui at definiebas eloquentiam adversarium, mel ferri inani laoreet ei. Ius ea habeo discere meliore. Soluta tempor efficiendi nec ei, sit ea electram signiferumque. Prompta insolens ad eum.</p>', 'Privacy Policy', 'Privacy Policy', NULL, '2023-01-06 11:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `page_term_items`
--

CREATE TABLE `page_term_items` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_term_items`
--

INSERT INTO `page_term_items` (`id`, `heading`, `content`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Terms of Use', '<p>Lorem ipsum dolor sit amet, vis ne aeterno regione, sea dicta vituperatoribus et. Ad offendit praesent nec. Ex tritani fuisset qui. Vero probo persecuti ex quo. Eum dico insolens ad, cu eam modo erant corrumpit, et vel quis probatus.</p>\r\n<p>Ei facilis menandri euripidis nam, eam eruditi repudiandae no. Has verterem scribentur ea, sea movet equidem cu. Sonet comprehensam mea te, in pri noluisse liberavisse, ius te placerat partiendo. Consequat forensibus usu at.</p>\r\n<p>Ei clita nemore has, facilisis vulputate usu eu. Facer everti ius id, mollis electram et per, his at error iusto. Eros consectetuer ut qui, ut eos nominavi scaevola honestatis. Ex quo porro indoctum volutpat, eos illum veritus ponderum ut. Viris indoctum tractatos at has.</p>\r\n<p>Sit vidisse fabulas neglegentur ad, sed te simul feugait luptatum. Et mei duis soleat, ne movet scaevola elaboraret qui. Saepe atomorum usu cu, tollit adipiscing has te. Vis ridens quodsi te, meis graecis ad eos, suas hinc nostro duo ut.</p>\r\n<p>Cibo alienum qui id. Tale partem appellantur te pri, ad animal neglegentur nam. Mundi alterum aliquando est no, ne mei saepe salutatus sadipscing. No mea utroque mandamus deseruisse, natum appareat pri ei. Cum an vocibus theophrastus, vis causae interesset an, in noster sapientem inciderint cum.</p>\r\n<p>Minim laudem nusquam in has, quo te veniam nominavi oporteat. Ius ut velit volutpat, eam scripta atomorum in. Eu labore nostro est. Sed ei odio convenire, oportere deseruisse eos ei.</p>\r\n<p>Ceteros suavitate scribentur no nam, ut feugiat assueverit est. Usu facete offendit gubergren ei. Pro impetus labitur veritus eu, ne ius omittam albucius. Eum an nullam regione facilis, ei impetus imperdiet instructior vim. Ad mei dicit nostrum recusabo. Purto dicat graeco eu vix.</p>\r\n<p>Nonumy veritus consetetur ei sit, possit gubergren ei per, affert salutandi et eos. Omnes animal facilis an cum, ex solum primis inciderint sea. Facilisi singulis definitionem ut nec. No mucius placerat evertitur est, per intellegat expetendis no. Ei ius rebum numquam, velit iuvaret repudiandae nec id. Ne everti impetus per.</p>', 'Terms of Use', 'Terms of Use', NULL, '2023-01-06 07:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_view` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `heading`, `slug`, `short_description`, `description`, `total_view`, `photo`, `title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet prima possit', 'lorem-ipsum-dolor-sit', 'Lorem ipsum dolor sit amet, prima possit deseruisse eu vix, vel te delectus principes persequeris, pro malorum utroque menandri te. Et cum etiam labore partiendo, an wisi ubique usu.', '<p>Lorem ipsum dolor sit amet, prima possit deseruisse eu vix, vel te delectus principes persequeris, pro malorum utroque menandri te. Et cum etiam labore partiendo, an wisi ubique usu. No impetus nonumes sed. Sale dolores et sed, eam ut delenit voluptatum omittantur, vis no paulo mnesarchum posidonium. In est alterum intellegam, nec an magna alienum intellegam.</p>\r\n<p>Possim percipit suavitate sed in. Usu cu rebum pericula, ut periculis vituperatoribus his. Ad per eleifend suavitate. At nec nullam vituperata, eos ridens civibus consequat ne. Eam ut congue tempor dissentiet, quas mollis per eu, vis nonumy possim ne.</p>\r\n<p>At expetenda repudiare has. Everti omnesque conceptam sea ex, ex qui eros legendos. Sed choro omnesque volutpat cu. Eu labore sententiae eam, at liber expetenda usu.</p>', '3', 'post_1681542898.jpg', 'Lorem ipsum dolor sit amet prima possit', 'Lorem ipsum dolor sit amet prima possit', '2023-01-05 10:10:50', '2023-04-30 05:27:46'),
(2, 'Possim percipit suavitate sed in usu cu', 'possim-percipit-suavitate', 'Possim percipit suavitate sed in. Usu cu rebum pericula, ut periculis vituperatoribus his. Ad per eleifend suavitate. At nec nullam vituperata, eos ridens civibus consequat ne.', '<p>Possim percipit suavitate sed in. Usu cu rebum pericula, ut periculis vituperatoribus his. Ad per eleifend suavitate. At nec nullam vituperata, eos ridens civibus consequat ne. Eam ut congue tempor dissentiet, quas mollis per eu, vis nonumy possim ne.</p>\r\n<p>At expetenda repudiare has. Everti omnesque conceptam sea ex, ex qui eros legendos. Sed choro omnesque volutpat cu. Eu labore sententiae eam, at liber expetenda usu.</p>\r\n<p>Melius minimum per te, dicant putent intellegam vel eu, cu pro copiosae forensibus dissentiet. Pro dicta habemus definiebas te. Te mea assueverit ullamcorper. Clita omittam disputando ut vim, porro conclusionemque has cu.</p>', '2', 'post_1681542983.jpg', 'Possim percipit suavitate sed in usu cu', 'Possim percipit suavitate sed in usu cu', '2023-01-05 10:12:11', '2023-04-30 05:27:29'),
(3, 'At nec sint wisi qui affert repudiare iracundia', 'at-nec-sint-wisi-qui', 'At nec sint wisi. Qui affert repudiare iracundia ad. His eu tollit altera, est eros falli vulputate eu, est ne quem prodesset maiestatis. Nonumes eloquentiam in vel id.', '<p>At nec sint wisi. Qui affert repudiare iracundia ad. His eu tollit altera, est eros falli vulputate eu, est ne quem prodesset maiestatis. Nonumes eloquentiam in vel, id audiam persecuti abhorreant eam.</p>\r\n<p>Eum no postea malorum. Nisl fierent in mel, an nominavi assentior his, in usu porro tincidunt mediocritatem. Vituperata disputando et has, at pro diceret lucilius evertitur. Eos at quot mucius accumsan, no oratio denique nostrum ius.</p>\r\n<p>Nisl tritani tincidunt eos id, veritus copiosae cu vix. Ne nam error argumentum definitiones, cu pro quodsi lucilius consetetur. Quot efficiantur ut qui, pri iudicabit moderatius in, usu ei mollis fabulas vituperata. Eos ridens reprehendunt in, et solet labore mei.</p>\r\n<p>Mei sonet ignota sensibus cu, ei sit consul volumus omittam. Nullam minimum ne his, ex has liber intellegam. Per eu quaeque ponderum, mel at periculis voluptaria, mei possit epicurei ea. An veniam iriure sanctus has, mel adolescens scribentur ne, enim salutandi ei his. Vim eu illum debet similique, munere indoctum sea an.</p>\r\n<p>&nbsp;</p>', '3', 'post_1681543000.jpg', 'At nec sint wisi qui affert repudiare iracundia', 'At nec sint wisi qui affert repudiare iracundia', '2023-01-05 10:13:24', '2023-01-06 06:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_bar_phone` text COLLATE utf8mb4_unicode_ci,
  `top_bar_email` text COLLATE utf8mb4_unicode_ci,
  `footer_phone` text COLLATE utf8mb4_unicode_ci,
  `footer_email` text COLLATE utf8mb4_unicode_ci,
  `footer_address` text COLLATE utf8mb4_unicode_ci,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci,
  `pinterest` text COLLATE utf8mb4_unicode_ci,
  `linkedin` text COLLATE utf8mb4_unicode_ci,
  `instagram` text COLLATE utf8mb4_unicode_ci,
  `copyright_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `top_bar_phone`, `top_bar_email`, `footer_phone`, `footer_email`, `footer_address`, `facebook`, `twitter`, `pinterest`, `linkedin`, `instagram`, `copyright_text`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 'favicon.png', '111-222-3333', 'hadiesmaeli24@gmail.com', '122-222-1212', 'hadiesmaeli24@gmail.com', '34 Antiger Lane, USA, 12937', 'https://www.facebook.com/', 'http://www.twitter.com/', '#', 'https://www.linkedin.com/', 'https://www.instagram.com/', 'Copyright 2022, Hadi.Es - All Rights Reserved.', NULL, '2023-05-09 21:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hadiesmaeli24@gmail.com', '', 1, '2023-05-09 03:40:58', '2023-05-09 03:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `comment`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Robert Krol', 'CEO, AA Company', 'Lorem ipsum dolor sit amet, quas dolore mel cu. Ut eos nihil minimum explicari, sed dicat graeci deserunt ei, dictas denique consectetuer ius ex. Iusto explicari delicatissimi eu cum, suas aliquid euripidis an eum, nam id paulo temporibus definitionem.', 'testimonial_1681215793.jpg', '2023-01-04 13:28:02', '2023-01-04 13:28:02'),
(2, 'Sal Harvey', 'Director, BB Company', 'Vidit sonet te vix, legere aliquip sed et, vix dico graeci placerat no. Ferri docendi appareat qui te, aperiam delenit mediocrem vel in, tantas aliquando intellegam his an. Interesset temporibus eos id, ut saepe petentium vim.', 'testimonial_1681217293.jpg', '2023-01-04 13:29:09', '2023-01-04 13:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_items`
--

CREATE TABLE `why_choose_items` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_choose_items`
--

INSERT INTO `why_choose_items` (`id`, `icon`, `heading`, `text`, `created_at`, `updated_at`) VALUES
(1, 'fas fa-briefcase', 'Quick Apply', 'You can just create your account in our website and apply for desired job very quickly.', '2023-01-03 11:48:54', '2023-01-03 17:21:55'),
(2, 'fas fa-search', 'Search Tool', 'We provide a perfect and advanced search tool for job seekers, employers or companies.', '2023-01-03 11:50:11', '2023-01-03 11:50:11'),
(3, 'fas fa-share-alt', 'Best Companies', 'The best and reputed worldwide companies registered here and so you will get the quality jobs.', '2023-01-03 11:50:35', '2023-01-03 11:50:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisments`
--
ALTER TABLE `advertisments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_applications`
--
ALTER TABLE `candidate_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_awards`
--
ALTER TABLE `candidate_awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_bookmarks`
--
ALTER TABLE `candidate_bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_education`
--
ALTER TABLE `candidate_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_experiences`
--
ALTER TABLE `candidate_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_resumes`
--
ALTER TABLE `candidate_resumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_skills`
--
ALTER TABLE `candidate_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_founds`
--
ALTER TABLE `company_founds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_industries`
--
ALTER TABLE `company_industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_locations`
--
ALTER TABLE `company_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_photos`
--
ALTER TABLE `company_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_sizes`
--
ALTER TABLE `company_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_videos`
--
ALTER TABLE `company_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_items`
--
ALTER TABLE `home_page_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_experiences`
--
ALTER TABLE `job_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_locations`
--
ALTER TABLE `job_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_salaries`
--
ALTER TABLE `job_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_blog_items`
--
ALTER TABLE `page_blog_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_contact_items`
--
ALTER TABLE `page_contact_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_faq_items`
--
ALTER TABLE `page_faq_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_job_category_items`
--
ALTER TABLE `page_job_category_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_other_items`
--
ALTER TABLE `page_other_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_pricing_items`
--
ALTER TABLE `page_pricing_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_privacy_items`
--
ALTER TABLE `page_privacy_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_term_items`
--
ALTER TABLE `page_term_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_choose_items`
--
ALTER TABLE `why_choose_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisments`
--
ALTER TABLE `advertisments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate_applications`
--
ALTER TABLE `candidate_applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `candidate_awards`
--
ALTER TABLE `candidate_awards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidate_bookmarks`
--
ALTER TABLE `candidate_bookmarks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `candidate_education`
--
ALTER TABLE `candidate_education`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `candidate_experiences`
--
ALTER TABLE `candidate_experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidate_resumes`
--
ALTER TABLE `candidate_resumes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `candidate_skills`
--
ALTER TABLE `candidate_skills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `company_founds`
--
ALTER TABLE `company_founds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_industries`
--
ALTER TABLE `company_industries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_locations`
--
ALTER TABLE `company_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_photos`
--
ALTER TABLE `company_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_sizes`
--
ALTER TABLE `company_sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_videos`
--
ALTER TABLE `company_videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_page_items`
--
ALTER TABLE `home_page_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_experiences`
--
ALTER TABLE `job_experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_locations`
--
ALTER TABLE `job_locations`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_salaries`
--
ALTER TABLE `job_salaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `page_blog_items`
--
ALTER TABLE `page_blog_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_contact_items`
--
ALTER TABLE `page_contact_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_faq_items`
--
ALTER TABLE `page_faq_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_job_category_items`
--
ALTER TABLE `page_job_category_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_other_items`
--
ALTER TABLE `page_other_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_pricing_items`
--
ALTER TABLE `page_pricing_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_privacy_items`
--
ALTER TABLE `page_privacy_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_term_items`
--
ALTER TABLE `page_term_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `why_choose_items`
--
ALTER TABLE `why_choose_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
