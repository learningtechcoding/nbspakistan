-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2023 at 11:45 AM
-- Server version: 10.5.18-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nbspakistan_nbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `central_cabinets`
--

CREATE TABLE `central_cabinets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `member_info` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `cabinets_type` enum('coc','cc') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `central_cabinets`
--

INSERT INTO `central_cabinets` (`id`, `name`, `image`, `position`, `member_info`, `email`, `phone`, `facebook_link`, `twitter_link`, `cabinets_type`, `created_at`, `updated_at`) VALUES
(3, 'Mr. Shaheer Haider Malik', 'central-cabinets/cc/1641491448203m1.png', 'Central President', 'Founder', 'Shaheer.malik@stateyouthparliament.com', '+92 311 5962257', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'cc', '2022-01-06 17:50:48', '2022-01-06 17:50:48'),
(4, 'Mr. Mamar Yuchi', 'central-cabinets/cc/1641491591328m3.png', 'Central Vice President', 'Member Since 2020', 'mamar.ali@stateyouthparliament.com', '+92 355 5722372', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'cc', '2022-01-06 17:53:11', '2022-01-06 17:53:11'),
(5, 'Mr. Syed Jehanziab Shah', 'central-cabinets/cc/1641491754194default-member-icon.png', 'Central General Secretary', 'Member Since 2019', 'jehanzaib.shah@stateyouthparliament.com', '+92 316 3772014', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'cc', '2022-01-06 17:55:54', '2022-01-06 17:55:54'),
(6, 'Mr. Malik Ahmed Raza', 'central-cabinets/cc/1641491805015m2.png', 'Central Joint Secretary', 'Member Since 2017', 'ahmed.raza@stateyouthparliament.com', '+92 305 5578686', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'cc', '2022-01-06 17:56:45', '2022-01-06 17:56:45'),
(7, 'Mr. Muhammad Haseeb Chudhary', 'central-cabinets/coc/1641491912912NoPath---Copy-(17).png', 'Chairman COC', 'Member Since 2018', 'haseeb.chudhary@stateyouthparliament.com', '+92 300 4423400', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'coc', '2022-01-06 17:58:32', '2022-01-06 17:58:32'),
(8, 'Mr. Azhar Langrial', 'central-cabinets/coc/1641491974569default-member-icon.png', 'Member COC', 'Member Since 2020', 'mamar.ali@stateyouthparliament.com', '+92 314 7861187', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'coc', '2022-01-06 17:59:34', '2022-01-06 17:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(5, 'Nouman Habib', 'noumanhabib521@gmail.com', 'Hello thanks for this website, let\'s start talking and we are so happy to be there.', '2022-01-07 09:05:56', '2022-01-07 09:05:56');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'gallery image',
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Gallery Image', 'gallery/1641390974953g2.png', '2022-01-05 13:56:14', '2022-01-05 13:56:14'),
(3, 'Gallery Image', 'gallery/1641390985012g3.png', '2022-01-05 13:56:25', '2022-01-05 13:56:25'),
(4, 'Gallery Image', 'gallery/1641390998328g4.png', '2022-01-05 13:56:38', '2022-01-05 13:56:38'),
(5, 'Gallery Image', 'gallery/1641391009792g5.png', '2022-01-05 13:56:49', '2022-01-05 13:56:49'),
(6, 'Gallery Image', 'gallery/1641391022690g6.png', '2022-01-05 13:57:02', '2022-01-05 13:57:02'),
(7, 'Some Title', 'gallery/1672206657787FullCalendar--Script.jpg', '2022-01-05 14:03:13', '2022-12-28 10:50:57'),
(8, 'Some Title', 'gallery/1672212991906Untitled.png', '2022-01-05 14:03:27', '2022-12-28 12:36:31'),
(9, 'Some Title', 'gallery/16722130031709.jpg', '2022-01-05 14:03:45', '2022-12-28 12:36:43'),
(10, 'Some Title', 'gallery/1641391438532IMG-20200615-WA0125.png', '2022-01-05 14:03:58', '2022-01-05 14:03:58'),
(11, 'Gallery Image', 'gallery/g1.png', NULL, NULL),
(12, 'Gallery Image', 'gallery/g2.png', NULL, NULL),
(13, 'Gallery Image', 'gallery/g3.png', NULL, NULL),
(14, 'Gallery Image', 'gallery/g5.png', NULL, NULL),
(15, 'Gallery Image', 'gallery/g6.png', NULL, NULL),
(16, 'Gallery Image', 'gallery/g7.png', NULL, NULL),
(17, 'Gallery Image', 'gallery/g8.png', NULL, NULL),
(18, 'Gallery Image', 'gallery/g9.png', NULL, NULL),
(19, 'Gallery Image', 'gallery/g10.png', NULL, NULL),
(20, 'Gallery Image', 'gallery/g11.png', NULL, NULL),
(21, 'Gallery Image', 'gallery/g12.png', NULL, NULL),
(22, 'Gallery Image', 'gallery/g13.png', NULL, NULL),
(23, 'Gallery Image', 'gallery/g14.png', NULL, NULL),
(24, 'Gallery Image', 'gallery/g15.png', NULL, NULL),
(25, 'Gallery Image', 'gallery/g16.png', NULL, NULL),
(26, 'Gallery Image', 'gallery/g17.png', NULL, NULL),
(27, 'Gallery Image', 'gallery/g18.png', NULL, NULL),
(28, 'mmmm', 'gallery/16722066305949.jpg', '2022-12-28 10:50:30', '2022-12-28 10:50:30'),
(29, 'laptop', 'gallery/1677043804963dataAna.jpg', '2023-02-22 10:30:04', '2023-02-22 10:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `leaderships`
--

CREATE TABLE `leaderships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `member_since` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `leadership_main_type` varchar(255) NOT NULL,
  `leadership_province_subtype` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaderships`
--

INSERT INTO `leaderships` (`id`, `name`, `image`, `position`, `member_since`, `email`, `phone`, `facebook_link`, `twitter_link`, `leadership_main_type`, `leadership_province_subtype`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Muhammad Ahmed', 'leadership/1641534948972NoPath---Copy-(22).png', 'Chairman Universities Council - Punjab', 'Member Since 2019', 'Muhammad.ahmed@stateyouthparliament.com', '+92 343 0270489', 'https://www.facebook.com/ahmed', 'https://twitter.org/ahmed', 'Universities Council', 'Universities Council - Punjab', '2022-01-07 05:45:55', '2022-01-07 05:55:48'),
(3, 'Mr. Hashaam Bin Malik', 'leadership/1641534935050cdcb8c26-7710-4c10-b8ea-4552b5fdef0c.png', 'Acting Chairman Universities Council - Punjab', 'Member Since 2020', 'hashaam.malik@stateyouthparliament.com', '+92 306 5118373', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Punjab', '2022-01-07 05:55:35', '2022-01-07 05:55:35'),
(4, 'Mr. Mehar Nakash Ghafoor', 'leadership/1641535015919IMG_0788.png', 'General Secretary Universities Council - Punjab', 'Member Since 2020', 'mehar.nakash@stateyouthparliament.com', '+92 341 6354284', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Punjab', '2022-01-07 05:56:55', '2022-01-07 05:56:55'),
(5, 'Mr. Mian Usman Khalid', 'leadership/1641535085720default-member-icon.png', 'General Secretary Universities Council - Punjab', 'Member Since 2020', 'usman.khalid@stateyouthparliament.com', '+92 300 7394769', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Punjab', '2022-01-07 05:58:05', '2022-01-07 05:58:05'),
(6, 'Mr. Naeem Akbar Magray', 'leadership/1641535203709NoPath---Copy-(27).png', 'Chairman Universities Council - Balochistan', 'Member Since 2019', 'Naeem.akbar@stateyouthparliament.com', '+92 317 8172911', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Balochistan', '2022-01-07 06:00:03', '2022-01-07 06:00:03'),
(7, 'Mr. Usama Buzdar', 'leadership/1641535283915default-member-icon.png', 'Vice Chairman Universities Council - Balochistan', 'Member Since 2020', 'Usama.buzdar@stateyouthparliament.com', '+92 336 7947777', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Balochistan', '2022-01-07 06:01:23', '2022-01-07 06:01:23'),
(8, 'Mr. Muhammad Mohid', 'leadership/1641535338627NoPath---Copy-(25).png', 'General Secretary Universities Council - Balochistan', 'Member Since 2020', 'muhammad.mohid@stateyouthparliament.com', '+92 315 6869901', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Balochistan', '2022-01-07 06:02:18', '2022-01-07 06:02:18'),
(9, 'Mr. Malik Farhan Bashir', 'leadership/1641535510404245294099_4362350087206016_1945402110169597802_n.png', 'Chairman Universities Council - All Pakistan', 'Member Since 2016', 'malik.farhan@stateyouthparliament.com', '+92 312 0549663', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Central Cabinet', '2022-01-07 06:05:10', '2022-01-07 06:05:10'),
(10, 'Mr. Mian Muhammad Ahsan', 'leadership/1641535604025NoPath---Copy-(13).png', 'Senior Vice Chairman Universities Council - All Pakistan', 'Member Since 2018', 'mian.ahsan@stateyouthparliament.com', '+92 304 7710144', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Central Cabinet', '2022-01-07 06:06:44', '2022-01-07 06:06:44'),
(11, 'Mr. Naeem Umar', 'leadership/1641535666662CollageMaker_20200309_225032518.png', 'Vice Chairman Universities Council - All Pakistan', 'Member Since 2019', 'naeem.umar@stateyouthparliament.com', '+92 344 9319963', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Central Cabinet', '2022-01-07 06:07:46', '2022-01-07 06:07:46'),
(12, 'Mr. Muhammad Usman Maqsood', 'leadership/1641535722066Screenshot_2021-12-14-20-11-51-02.png', 'General Secretary Universities Council - All Pakistan', 'Member Since 2020', 'usman.maqsood@stateyouthparliament.com', '+92 335 1334545', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Central Cabinet', '2022-01-07 06:08:42', '2022-01-07 06:08:42'),
(13, 'Mr. Malik Harris Bilal', 'leadership/1641535915164NoPath---Copy-(18).png', 'Chairman Universities Council - Twin Cities Zone', 'Member Since 2020', 'malik.harris@stateyouthparliament.com', '+92 348 5861854', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Twin Cities Zone', '2022-01-07 06:11:55', '2022-01-07 06:11:55'),
(14, 'Mr. Hamza Chaudhry', 'leadership/1641537277259NoPath---Copy-(19).png', 'Vice Chairman Universities Council  - Twin Cities Zone', 'Member Since 2020', 'hamza.chaudhry@stateyouthparliament.com', '+92 311 4111121', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Twin Cities Zone', '2022-01-07 06:34:37', '2022-01-07 06:34:37'),
(15, 'Mr. Muhammad Muzammal Hussain', 'leadership/1641537349387NoPath---Copy-(20).png', 'General Secretary Universities Council - Twin Cities Zone', 'Member Since 2019', 'muzammal.hussain@stateyouthparliament.com', '+92 333 6959129', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Twin Cities Zone', '2022-01-07 06:35:49', '2022-01-07 06:35:49'),
(16, 'Mr. Usama Azad', 'leadership/1641537402157NoPath---Copy-(21).png', 'Social Media Head Universities Council - Twin Cities Zone', 'Member Since 2020', 'Usama.azad@stateyouthparliament.com', '+92 317 0526897', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Twin Cities Zone', '2022-01-07 06:36:42', '2022-01-07 06:36:42'),
(17, 'Mr. Malak Hammad Ali', 'leadership/1641537488732NoPath---Copy-(23).png', 'Chairman Universities Council - GB', 'Member Since 2020', 'hammad.ali@stateyouthparliament.com', '+92 355 4487373', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Gilgit-Baltistan', '2022-01-07 06:38:08', '2022-01-07 06:38:08'),
(18, 'Mr. Malak Affaq Naveed Rana', 'leadership/1641537542098NoPath---Copy-(24).png', 'Vice Chairman Universities Council - GB', 'Member Since 2021', 'affaq.naveed@stateyouthparliament.com', '+92 355 4323572', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Gilgit-Baltistan', '2022-01-07 06:39:02', '2022-01-07 06:39:02'),
(19, 'Mr. Khawar Saleem', 'leadership/1641537591018default-member-icon.png', 'General Secretary Universities Council - GB', 'Member Since 2021', 'khawar.saleem@stateyouthparliament.com', '+92 349 5619535', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Universities Council', 'Universities Council - Gilgit-Baltistan', '2022-01-07 06:39:51', '2022-01-07 06:39:51'),
(20, 'Mr. Malik Waqas Saleem', 'leadership/1641537722742NoPath.png', 'Chairman Advisory Board', 'Founding Member', 'malik.waqas@stateyouthparliament.com', '+92 344 5819107', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Advisory Board', 'Advisory Board - Central Cabinet', '2022-01-07 06:42:02', '2022-01-07 06:42:02'),
(21, 'Mr. Muhammad Nouman Iftikhar', 'leadership/1641537803147NoPath---Copy.png', 'Member, Advisory Board', 'Member Since 2017', 'Nouman.iftikhar@stateyouthparliament.com', '+92 333 5709574', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Advisory Board', 'Advisory Board - Central Cabinet', '2022-01-07 06:43:23', '2022-01-07 06:43:23'),
(22, 'Mr. Hamail Ejaz', 'leadership/1641537855289NoPath---Copy-(2).png', 'Member Advisory Board', 'Member Since 2017', 'hamail.ejaz@stateyouthparliament.com', '+92 313 5352693', 'https://www.facebook.com/shahveer', 'https://twitter.org/shahveer', 'Advisory Board', 'Advisory Board - Central Cabinet', '2022-01-07 06:44:15', '2022-01-07 06:44:15');

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
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2021_07_23_154043_create_slides_table', 1),
(24, '2021_07_24_061802_create_teams_table', 1),
(25, '2021_07_25_033847_create_notifications_table', 1),
(28, '2021_07_27_092107_create_videos_table', 1),
(29, '2021_07_25_034951_create_blogs_table', 2),
(32, '2014_10_12_000000_create_users_table', 5),
(36, '2022_01_04_220913_create_news_table', 7),
(37, '2022_01_05_003820_create_galleries_table', 8),
(38, '2022_01_06_213001_create_central_cabinets_table', 9),
(41, '2022_01_06_231017_create_leaderships_table', 10),
(42, '2021_07_25_171322_create_registrations_table', 11),
(43, '2021_07_31_154320_create_contacts_table', 12),
(45, '2022_03_20_140310_create_notification_templates_table', 13),
(47, '2022_03_20_191618_registration_template', 14);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `cover` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `cover`, `text`, `views`, `created_at`, `updated_at`) VALUES
(1, 'Bahawalpur: Mr. Shaheer Sialvi meets \r\nMian Haji Hanif candidate for MPA.', '2021-11-29', 'news/1641322305365n0.png', '<p>Some description of new is here!</p>', 0, '2022-01-04 18:51:45', '2022-01-04 18:59:03'),
(2, 'Wazirabad: Mr. Shaheer Sialvi attends the Waleema ceremony of Mr. Muhammad Ahmed - President Overseas Chapter.', '2021-12-16', 'news/1641322407089n1.png', '<p>Hello description is here!</p>', 0, '2022-01-04 18:53:27', '2022-01-04 18:59:13'),
(3, 'Lahore: Mr. Shaheer Sialvi reached to attend the Punjab Cabinet event, in which he appreciated the progress of the team.', '2021-09-10', 'news/1641322460040n2.png', '<p>Good i am here</p>', 0, '2022-01-04 18:54:20', '2022-01-04 18:54:20'),
(4, 'Raja Faizan Aslam says that youth is ready and our party will come to tackle the old political system of Nawabs. He also says, by the end of this year, we will register your political party. InShallah', '2021-12-19', 'news/1641322576628n4.png', '<p>Description here</p>', 0, '2022-01-04 18:56:16', '2022-01-04 18:56:16'),
(5, 'Punjab Cabinet starts a promotion week on provincial and divisional levels, in which individuals will get promotions on their previous record.', '2021-12-10', 'news/1641322627487n3.png', '<p>Description here!</p>', 0, '2022-01-04 18:57:07', '2022-01-04 18:57:07'),
(6, 'Mr. Shaheer Sialvi - Chairman Nazryati Group announces to provision of party tickets to 22000 nazriyati leaders across Punjab. He also says we will never nominate our candidate against our ideological brothers, no matter which party he belongs to.', '2021-12-06', 'news/1641322687652n5.png', '<p>Desciption is here for this news.</p>', 0, '2022-01-04 18:58:07', '2022-01-04 18:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `notification_templates`
--

CREATE TABLE `notification_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `president_name` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `pg1` varchar(255) DEFAULT NULL,
  `central_president` varchar(255) DEFAULT NULL,
  `copy_to` text DEFAULT NULL,
  `regards` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_numbers` text DEFAULT NULL,
  `bottom_contact_email` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_templates`
--

INSERT INTO `notification_templates` (`id`, `template_name`, `president_name`, `website_url`, `contact_email`, `contact_phone`, `pg1`, `central_president`, `copy_to`, `regards`, `address`, `contact_numbers`, `bottom_contact_email`, `created_at`, `updated_at`) VALUES
(1, 'Punjab', 'Ijaz Gondal - President', 'www.stateyouthparliament.pk', 'contact@stateyouthparliament.pk', '+92 304 6001087', 'State Youth Parliament is an alliance of  leaders from all  Union/Youth Leagues Pakistan. This platform was made in order to defend Pakistan and its ideology at every platform.', 'Mr. Ijaz Gondal', '<span>Mr. Shaheer Sialvi - Founder</span>\r\n                <span>Mr. Muhammad Haseeb - CCOC</span>\r\n                <span>State Youth Parliament</span>', '<span>Mr. Hashaam Bin Malik</span>\r\n                <span>Acting Chairman Universities Council - Punjab</span>\r\n                <span>State Youth Parliament</span>\r\n                <span>(+92 306 5118373)</span>', 'Office#1, LG Floor, Emaan Heights, Zaraj Housing Society Islamabad, 44000, Pakistan', '+92 344 9319963, +92 300 4423400, +92 304 6001087', 'contact@stateyouthparliament.pk', '2022-03-20 10:40:48', '2022-03-20 10:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `name` varchar(255) NOT NULL,
  `father-name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `wing-type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `notification_created` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `template_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `name`, `father-name`, `phone`, `province`, `city`, `cnic`, `email`, `education`, `birthday`, `wing-type`, `image`, `role`, `is_accepted`, `notification_created`, `created_at`, `updated_at`, `template_id`) VALUES
(2, 'Nouman Habib', 'Ghulam Habib', '03165667643', 'pb', 'Rawalpindi', '37401-1898703-1', 'noumanhabib521@gmail.com', 'Primary education', '2001-01-22', 'Lawyer\'s Forum', 'registrations/1645164730938Untitled.jpg', 'Lawyer Member', 1, 0, '2022-02-18 06:12:10', '2022-02-18 09:31:34', NULL),
(3, 'Zeshan Habib', 'Ghulam Habib', '03165667640', 'pb', 'Rawalpindi', '37401-1898703-0', 'noumanhabib112233@gmail.com', 'Matric (SSC)', '2003-08-05', 'Advisory Board', 'registrations/1645166121394Untitled.jpg', NULL, 0, 0, '2022-02-18 06:35:21', '2022-02-18 09:33:14', NULL),
(4, 'Muneeb Ur Rehman', 'Muhmmad Shakar', '03165667546', 'pb', 'Burewala', '37401-1898703-4', 'muneebshash5656@gmail.com', 'Bachelor\'s degree', '2000-02-03', 'Universities Council', 'registrations/1646500865998Muneeb-Ur-Rehman.jpeg', 'PMAS Student Examiner', 1, 0, '2022-03-05 17:21:06', '2022-03-05 17:22:08', NULL),
(5, 'Nouman Habib', 'Ghulam Habib', '03165667622', 'pb', 'Rawalpindi', '37401-1898703-8', 'noumanhabib5201@gmail.com', 'Bachelor\'s degree', '2022-03-22', 'Advisory Board', 'registrations/1647785497110Nouman-Habib.jpeg', 'New syp member', 1, 0, '2022-03-20 14:11:37', '2022-03-20 14:19:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
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
  `image` varchar(255) DEFAULT NULL,
  `type` enum('superAdmin','admin','notifyAdmin') DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `province` enum('pb','kpk','sd','ajk','ba','gb') DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `type`, `email`, `email_verified_at`, `password`, `province`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'profile/1672206591841Untitled.png', 'superAdmin', 'superadmin@gmail.com', NULL, '$2y$10$TUZrO4KaIXtq6x6L3gYo0O5uuthh.rxuvwnwLnzyn5L/gtOVuAUSi', NULL, '8ttwjvs0XTw72pH7VUjYQ8T3xDRDhHtOLa3gJBj879Xc7JFTZQSBe9v5KinV', '2021-08-07 12:03:17', '2022-12-28 10:49:51'),
(4, 'Super Admin', NULL, 'superAdmin', 'WaqarAhmad.Dev@gmail.com', NULL, '$2y$10$tgbdX.aFLk39Bz1gCp3UMOPyYIKRdQCX41XUskZ0dbuf5uADA751e', NULL, NULL, '2021-08-07 12:03:17', '2021-10-08 19:38:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `central_cabinets`
--
ALTER TABLE `central_cabinets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaderships`
--
ALTER TABLE `leaderships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
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
-- AUTO_INCREMENT for table `central_cabinets`
--
ALTER TABLE `central_cabinets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `leaderships`
--
ALTER TABLE `leaderships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification_templates`
--
ALTER TABLE `notification_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
