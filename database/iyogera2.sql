-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table dev.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `copies` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.books: ~3 rows (approximately)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
REPLACE INTO `books` (`id`, `name`, `author`, `copies`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
	(7, 'Wallace Aboiyar Myem', 'v bv', 5, 1, '1', '2020-04-02 14:47:52', '2020-04-02 14:47:52'),
	(8, 'Motor Mechanics', 'Moses', 6, 6, '3', '2020-04-16 15:24:44', '2020-04-16 15:24:44'),
	(9, 'Motor Mechanics', 'Ternam', 50, 1, '1', '2020-05-19 23:12:23', '2020-05-19 23:12:23'),
	(10, 'Mathematics', 'C C Ternam', 25, 6, '3', '2020-05-22 20:06:13', '2020-05-22 20:06:13');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- Dumping structure for table dev.book_issues
CREATE TABLE IF NOT EXISTS `book_issues` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `issue_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.book_issues: ~5 rows (approximately)
/*!40000 ALTER TABLE `book_issues` DISABLE KEYS */;
REPLACE INTO `book_issues` (`id`, `book_id`, `class_id`, `student_id`, `issue_date`, `status`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
	(1, 8, 2, 5, '1586991600', 1, 6, '3', '2020-04-16 15:28:10', '2020-04-16 15:28:35'),
	(2, 8, 2, 5, '1586991600', 0, 6, '3', '2020-04-16 15:28:47', '2020-04-16 15:28:47'),
	(3, 10, 5, 32, '1590102000', 1, 6, '3', '2020-05-22 20:06:40', '2020-05-22 20:06:55'),
	(4, 8, 5, 34, '1590361200', 0, 6, '3', '2020-05-25 13:44:44', '2020-05-25 13:44:44'),
	(5, 10, 2, 8, '1590188400', 0, 6, '3', '2020-05-25 13:45:02', '2020-05-25 13:45:02'),
	(6, 10, 2, 4, '1590361200', 0, 6, '3', '2020-05-25 13:50:43', '2020-05-25 13:50:43');
/*!40000 ALTER TABLE `book_issues` ENABLE KEYS */;

-- Dumping structure for table dev.branches
CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table dev.branches: ~0 rows (approximately)
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;

-- Dumping structure for table dev.classes
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.classes: ~11 rows (approximately)
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
REPLACE INTO `classes` (`id`, `name`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, 'SS 2', 1, '2020-04-01 22:08:04', '2020-04-01 22:08:04'),
	(2, 'SS 2', 6, '2020-04-06 19:56:32', '2020-04-06 19:56:32'),
	(3, 'SS1', 1, '2020-04-07 12:32:44', '2020-04-07 12:32:44'),
	(4, 'SS3', 1, '2020-04-07 12:33:35', '2020-04-07 12:33:35'),
	(5, 'SS 3', 6, '2020-04-16 15:08:02', '2020-04-16 15:08:02'),
	(6, 'JSS 1', 8, '2020-05-02 13:40:51', '2020-05-02 13:40:51'),
	(7, 'JSS 2', 8, '2020-05-02 13:43:16', '2020-05-02 13:43:16'),
	(8, 'JSS 3', 8, '2020-05-02 13:44:25', '2020-05-02 13:44:25'),
	(9, 'SS 1', 8, '2020-05-02 13:48:33', '2020-05-02 13:48:33'),
	(10, 'SS 2', 8, '2020-05-02 13:57:33', '2020-05-02 13:57:33'),
	(11, 'SS 3', 8, '2020-05-02 13:57:47', '2020-05-02 13:57:47');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;

-- Dumping structure for table dev.class_rooms
CREATE TABLE IF NOT EXISTS `class_rooms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.class_rooms: ~5 rows (approximately)
/*!40000 ALTER TABLE `class_rooms` DISABLE KEYS */;
REPLACE INTO `class_rooms` (`id`, `name`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, 'Exam Hall', 1, '2020-04-01 22:08:48', '2020-04-01 22:08:48'),
	(2, 'SS1', 1, '2020-04-07 12:42:17', '2020-04-07 12:42:17'),
	(3, 'SS3', 1, '2020-04-07 12:42:27', '2020-04-07 12:42:27'),
	(4, 'Hall 1', 6, '2020-04-16 16:08:50', '2020-04-16 16:08:50'),
	(5, 'Hall 2', 6, '2020-04-16 16:19:24', '2020-04-16 16:19:24');
/*!40000 ALTER TABLE `class_rooms` ENABLE KEYS */;

-- Dumping structure for table dev.conversations
CREATE TABLE IF NOT EXISTS `conversations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_user_id` int(11) NOT NULL,
  `second_user_id` int(11) NOT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev.conversations: ~0 rows (approximately)
/*!40000 ALTER TABLE `conversations` DISABLE KEYS */;
/*!40000 ALTER TABLE `conversations` ENABLE KEYS */;

-- Dumping structure for table dev.daily_attendances
CREATE TABLE IF NOT EXISTS `daily_attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.daily_attendances: ~23 rows (approximately)
/*!40000 ALTER TABLE `daily_attendances` DISABLE KEYS */;
REPLACE INTO `daily_attendances` (`id`, `timestamp`, `class_id`, `section_id`, `student_id`, `status`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, '1586041200', 1, 1, 1, 1, 1, '2020-04-05 14:36:45', '2020-04-05 14:36:51'),
	(2, '1586041200', 1, 1, 2, 1, 1, '2020-04-05 14:36:45', '2020-04-05 14:36:52'),
	(3, '1586214000', 2, 2, 3, 1, 6, '2020-04-07 10:09:07', '2020-04-07 10:09:14'),
	(4, '1587250800', 1, 1, 1, 1, 1, '2020-04-19 14:59:50', '2020-04-19 14:59:56'),
	(5, '1587250800', 1, 1, 2, 1, 1, '2020-04-19 14:59:50', '2020-04-19 14:59:56'),
	(6, '1587250800', 1, 1, 10, 1, 1, '2020-04-19 14:59:51', '2020-04-19 14:59:56'),
	(7, '1587942000', 2, 2, 4, 1, 6, '2020-04-27 21:45:35', '2020-04-27 21:45:40'),
	(8, '1587942000', 2, 2, 5, 1, 6, '2020-04-27 21:45:35', '2020-04-27 21:45:40'),
	(9, '1587942000', 2, 2, 6, 1, 6, '2020-04-27 21:45:35', '2020-04-27 21:45:40'),
	(10, '1587942000', 2, 2, 7, 1, 6, '2020-04-27 21:45:35', '2020-04-27 21:45:40'),
	(11, '1587942000', 2, 2, 8, 1, 6, '2020-04-27 21:45:35', '2020-04-27 21:45:40'),
	(12, '1587942000', 2, 2, 9, 1, 6, '2020-04-27 21:45:35', '2020-04-27 21:45:40'),
	(13, '1588114800', 1, 1, 2, 1, 1, '2020-04-29 18:51:02', '2020-04-29 18:51:05'),
	(14, '1588114800', 1, 1, 10, 1, 1, '2020-04-29 18:51:02', '2020-04-29 18:51:05'),
	(15, '1588201200', 2, 2, 4, 1, 6, '2020-04-30 17:07:53', '2020-04-30 17:08:07'),
	(16, '1588201200', 2, 2, 5, 1, 6, '2020-04-30 17:07:53', '2020-04-30 17:08:07'),
	(17, '1588201200', 2, 2, 8, 0, 6, '2020-04-30 17:07:53', '2020-04-30 17:08:07'),
	(18, '1588201200', 2, 2, 9, 1, 6, '2020-04-30 17:07:53', '2020-04-30 17:08:07'),
	(19, '1589929200', 2, 2, 4, 1, 6, '2020-05-20 15:46:32', '2020-05-20 15:46:48'),
	(20, '1589929200', 2, 2, 5, 1, 6, '2020-05-20 15:46:32', '2020-05-20 15:46:48'),
	(21, '1589929200', 2, 2, 8, 1, 6, '2020-05-20 15:46:32', '2020-05-20 15:46:48'),
	(22, '1589929200', 2, 2, 9, 1, 6, '2020-05-20 15:46:32', '2020-05-20 15:46:48'),
	(23, '1590015600', 3, 3, 11, 1, 1, '2020-05-21 09:55:54', '2020-05-21 09:56:22'),
	(24, '1590015600', 3, 3, 31, 1, 1, '2020-05-21 09:55:54', '2020-05-21 09:56:22');
/*!40000 ALTER TABLE `daily_attendances` ENABLE KEYS */;

-- Dumping structure for table dev.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.departments: ~4 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
REPLACE INTO `departments` (`id`, `name`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, 'Markers', 1, '2020-04-01 23:39:16', '2020-04-01 23:39:16'),
	(2, 'Science', 6, '2020-04-06 19:59:14', '2020-04-06 19:59:14'),
	(3, 'Computer', 1, '2020-04-07 12:41:33', '2020-04-07 12:41:33'),
	(4, 'Material Science', 1, '2020-04-07 12:41:51', '2020-04-07 12:41:51');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table dev.enrolls
CREATE TABLE IF NOT EXISTS `enrolls` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.enrolls: ~29 rows (approximately)
/*!40000 ALTER TABLE `enrolls` DISABLE KEYS */;
REPLACE INTO `enrolls` (`id`, `student_id`, `class_id`, `section_id`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
	(2, 2, 1, 1, 1, '1', '2020-04-01 22:57:45', '2020-04-01 22:57:45'),
	(4, 4, 2, 2, 6, '3', '2020-04-07 10:26:22', '2020-04-16 15:08:50'),
	(5, 5, 2, 2, 6, '3', '2020-04-07 10:58:20', '2020-04-07 10:58:20'),
	(8, 8, 2, 2, 6, '3', '2020-04-07 11:01:18', '2020-04-07 11:01:18'),
	(9, 9, 2, 2, 6, '3', '2020-04-07 12:09:11', '2020-04-16 15:13:37'),
	(10, 10, 1, 1, 1, '1', '2020-04-07 12:32:06', '2020-04-07 12:32:06'),
	(11, 11, 3, 3, 1, '1', '2020-04-07 12:46:15', '2020-04-07 12:46:15'),
	(12, 12, 5, 8, 6, '4', '2020-04-28 06:53:05', '2020-05-21 13:36:43'),
	(13, 13, 5, 8, 6, '4', '2020-04-28 07:11:13', '2020-05-21 13:37:56'),
	(14, 14, 3, 4, 1, '1', '2020-04-30 16:36:26', '2020-04-30 16:36:26'),
	(15, 15, 3, 4, 1, '1', '2020-04-30 16:36:26', '2020-04-30 16:36:26'),
	(16, 16, 3, 4, 1, '1', '2020-04-30 16:36:26', '2020-04-30 16:36:26'),
	(17, 17, 3, 4, 1, '1', '2020-04-30 16:36:27', '2020-04-30 16:36:27'),
	(18, 18, 1, 1, 1, '1', '2020-05-01 20:28:16', '2020-05-01 20:28:16'),
	(19, 19, 4, 6, 1, '1', '2020-05-14 12:04:50', '2020-05-14 12:04:50'),
	(20, 20, 6, 9, 8, '6', '2020-05-17 09:00:27', '2020-05-17 09:00:27'),
	(21, 21, 1, 5, 1, '1', '2020-05-19 23:13:11', '2020-05-19 23:13:11'),
	(22, 22, 1, 5, 1, '1', '2020-05-19 23:13:12', '2020-05-19 23:13:12'),
	(26, 26, 5, 8, 6, '4', '2020-05-21 09:15:48', '2020-05-21 13:38:00'),
	(31, 31, 3, 3, 1, '1', '2020-05-21 09:48:01', '2020-05-21 09:48:01'),
	(32, 32, 5, 8, 6, '3', '2020-05-21 16:53:07', '2020-05-21 16:53:07'),
	(33, 33, 5, 8, 6, '3', '2020-05-21 16:53:07', '2020-05-21 16:53:07'),
	(34, 34, 5, 8, 6, '3', '2020-05-21 16:53:07', '2020-05-21 16:53:07'),
	(35, 35, 2, 2, 6, '3', '2020-05-27 16:51:39', '2020-05-27 16:51:39'),
	(36, 36, 2, 2, 6, '3', '2020-05-27 16:56:07', '2020-05-27 16:56:07'),
	(37, 37, 1, 1, 1, '1', '2020-05-28 08:49:30', '2020-05-28 08:49:30'),
	(38, 38, 1, 1, 1, '1', '2020-05-28 08:51:33', '2020-05-28 08:51:33'),
	(39, 39, 1, 1, 1, '1', '2020-05-28 08:57:14', '2020-05-28 08:57:14'),
	(41, 41, 1, 1, 1, '1', '2020-05-28 09:31:38', '2020-05-28 09:31:38'),
	(42, 42, 1, 1, 1, '1', '2020-05-28 09:33:07', '2020-05-28 09:33:07'),
	(43, 43, 3, 3, 1, '1', '2020-05-28 09:33:24', '2020-05-28 09:33:24');
/*!40000 ALTER TABLE `enrolls` ENABLE KEYS */;

-- Dumping structure for table dev.event_calendars
CREATE TABLE IF NOT EXISTS `event_calendars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext COLLATE utf8_unicode_ci,
  `starting_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ending_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(10) DEFAULT NULL,
  `session` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.event_calendars: ~1 rows (approximately)
/*!40000 ALTER TABLE `event_calendars` DISABLE KEYS */;
REPLACE INTO `event_calendars` (`id`, `title`, `starting_date`, `ending_date`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
	(3, 'Import all Teachers', '2020-05-21 00:00:01', '2020-05-31 23:59:59', 6, 3, '2020-05-21 13:29:26', '2020-05-21 13:29:26');
/*!40000 ALTER TABLE `event_calendars` ENABLE KEYS */;

-- Dumping structure for table dev.exams
CREATE TABLE IF NOT EXISTS `exams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starting_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ending_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.exams: ~3 rows (approximately)
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
REPLACE INTO `exams` (`id`, `name`, `starting_date`, `ending_date`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
	(1, 'First Term', '1585695600', '1588201200', 1, '1', '2020-04-01 16:55:52', '2020-04-01 16:55:52'),
	(2, 'Mock', '1586127600', '1588201200', 6, '3', '2020-04-06 20:01:53', '2020-04-06 20:01:53'),
	(3, 'First Term', '1586214000', '1588201200', 6, '3', '2020-04-07 09:28:16', '2020-04-07 09:28:23'),
	(4, 'Second Term', '1590274800', '1596150000', 1, '1', '2020-05-24 16:54:20', '2020-05-24 16:54:20');
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;

-- Dumping structure for table dev.expenses
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` bigint(50) unsigned NOT NULL AUTO_INCREMENT,
  `expense_category_id` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.expenses: ~0 rows (approximately)
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
REPLACE INTO `expenses` (`id`, `expense_category_id`, `date`, `amount`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
	(1, 1, 1586991600, '30000', 6, '3', '2020-04-16 15:22:56', '2020-04-16 15:22:56');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;

-- Dumping structure for table dev.expense_categories
CREATE TABLE IF NOT EXISTS `expense_categories` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.expense_categories: ~2 rows (approximately)
/*!40000 ALTER TABLE `expense_categories` DISABLE KEYS */;
REPLACE INTO `expense_categories` (`id`, `name`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
	(1, 'Fuel', 6, '3', '2020-04-16 15:22:38', '2020-04-16 15:22:38'),
	(2, 'ICT', 6, '3', '2020-04-20 10:23:28', '2020-04-20 10:23:28');
/*!40000 ALTER TABLE `expense_categories` ENABLE KEYS */;

-- Dumping structure for table dev.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conversation_id` int(11) NOT NULL,
  `conversation_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev.files: ~0 rows (approximately)
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;

-- Dumping structure for table dev.grades
CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grade_point` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mark_from` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mark_upto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.grades: ~11 rows (approximately)
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
REPLACE INTO `grades` (`id`, `name`, `grade_point`, `mark_from`, `mark_upto`, `comment`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
	(1, 'A', '4.0', '70', '100', 'Excellent', 1, '1', '2020-04-01 23:34:29', '2020-04-01 23:34:29'),
	(2, 'B', '3.5', '55', '69', 'Very Good', 1, '1', '2020-04-01 23:35:08', '2020-04-01 23:35:08'),
	(3, 'C', '3.0', '45', '54', 'Good', 1, '1', '2020-04-01 23:35:54', '2020-04-01 23:35:54'),
	(4, 'D', '2.5', '35', '44', 'Fair', 1, '1', '2020-04-01 23:36:22', '2020-04-01 23:36:22'),
	(5, 'E', '1.0', '0', '34', 'Failed', 1, '1', '2020-04-01 23:36:56', '2020-04-01 23:36:56'),
	(6, 'B', '3.0', '70', '65', 'Very Good', 6, '3', '2020-04-06 20:02:42', '2020-04-06 20:02:42'),
	(7, 'A', '4.0', '80', '100', 'Excellent', 6, '3', '2020-04-06 20:10:00', '2020-04-06 20:10:00'),
	(8, 'C', '2.5', '64', '54', 'Good', 6, '3', '2020-04-06 20:10:35', '2020-04-06 20:11:52'),
	(9, 'D', '2.0', '44', '53', 'Fair', 6, '3', '2020-04-06 20:11:44', '2020-04-06 20:11:44'),
	(10, 'E', '1.0', '30', '43', 'fail', 6, '3', '2020-04-06 20:12:34', '2020-04-06 20:12:34'),
	(11, 'F', '0.0', '0', '29', 'Failed', 6, '3', '2020-04-06 20:13:00', '2020-04-06 20:13:00');
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;

-- Dumping structure for table dev.group_conversations
CREATE TABLE IF NOT EXISTS `group_conversations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev.group_conversations: ~0 rows (approximately)
/*!40000 ALTER TABLE `group_conversations` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_conversations` ENABLE KEYS */;

-- Dumping structure for table dev.group_users
CREATE TABLE IF NOT EXISTS `group_users` (
  `group_conversation_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev.group_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `group_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_users` ENABLE KEYS */;

-- Dumping structure for table dev.invoices
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci,
  `paid_amount` int(11) DEFAULT NULL,
  `status` longtext COLLATE utf8_unicode_ci,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.invoices: 15 rows
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
REPLACE INTO `invoices` (`id`, `title`, `total_amount`, `class_id`, `student_id`, `payment_method`, `paid_amount`, `status`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
	(2, 'Exam fee', 5000, 1, 2, NULL, 0, 'unpaid', 1, '1', '2020-04-01 23:52:11', '2020-04-01 23:52:11'),
	(4, 'Mock', 2500, 2, 4, NULL, 0, 'unpaid', 6, '3', '2020-04-07 11:32:23', '2020-04-07 11:32:23'),
	(5, 'Mock', 2500, 2, 5, NULL, 2500, 'paid', 6, '3', '2020-04-07 11:32:23', '2020-04-16 15:18:30'),
	(25, 'Fees', 20000, 1, 18, NULL, 0, 'unpaid', 1, '1', '2020-05-19 23:07:56', '2020-05-19 23:07:56'),
	(8, 'Mock', 2500, 2, 8, NULL, 0, 'unpaid', 6, '3', '2020-04-07 11:32:23', '2020-04-07 11:32:23'),
	(10, 'Fees', 20000, 2, 4, NULL, 0, 'unpaid', 6, '3', '2020-04-15 14:35:53', '2020-04-15 14:35:53'),
	(11, 'Fees', 20000, 2, 5, NULL, 0, 'unpaid', 6, '3', '2020-04-15 14:35:53', '2020-04-15 14:35:53'),
	(14, 'Fees', 20000, 2, 8, NULL, 0, 'unpaid', 6, '3', '2020-04-15 14:35:53', '2020-04-15 14:35:53'),
	(15, 'Fees', 20000, 2, 9, NULL, 0, 'unpaid', 6, '3', '2020-04-15 14:35:53', '2020-04-15 14:35:53'),
	(17, 'Edit', 2000, 2, 4, NULL, 0, 'unpaid', 6, '3', '2020-04-15 14:46:40', '2020-04-15 14:46:40'),
	(18, 'Edit', 2000, 2, 5, NULL, 0, 'unpaid', 6, '3', '2020-04-15 14:46:40', '2020-04-15 14:46:40'),
	(23, 'Fees', 20000, 1, 2, NULL, 0, 'paid', 1, '1', '2020-05-19 23:07:56', '2020-05-24 18:18:14'),
	(24, 'Fees', 20000, 1, 10, NULL, 0, 'unpaid', 1, '1', '2020-05-19 23:07:56', '2020-05-19 23:07:56'),
	(21, 'Edit', 2000, 2, 8, NULL, 0, 'unpaid', 6, '3', '2020-04-15 14:46:40', '2020-04-15 14:46:40'),
	(22, 'Edit', 2000, 2, 9, NULL, 0, 'unpaid', 6, '3', '2020-04-15 14:46:40', '2020-04-15 14:46:40');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;

-- Dumping structure for table dev.languages
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.languages: ~2 rows (approximately)
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
REPLACE INTO `languages` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
	(1, 'English', 'en', '2019-01-22 08:25:16', '2019-01-22 08:25:16'),
	(2, 'Spanish', 'es', '2020-05-01 18:56:27', '2020-05-01 18:56:27');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;

-- Dumping structure for table dev.marks
CREATE TABLE IF NOT EXISTS `marks` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `objectives` int(11) DEFAULT NULL,
  `practicals` int(11) DEFAULT NULL,
  `theory` int(11) DEFAULT NULL,
  `ca_total` int(11) DEFAULT NULL,
  `mark_total` int(11) DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci,
  `session` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.marks: ~44 rows (approximately)
/*!40000 ALTER TABLE `marks` DISABLE KEYS */;
REPLACE INTO `marks` (`id`, `student_id`, `subject_id`, `class_id`, `section_id`, `exam_id`, `objectives`, `practicals`, `theory`, `ca_total`, `mark_total`, `comment`, `session`, `school_id`, `created_at`, `updated_at`) VALUES
	(2, 2, 1, 1, 1, 1, 6, 5, 70, 11, 81, NULL, 1, 1, '2020-04-01 23:09:33', '2020-04-19 09:53:26'),
	(4, 2, 2, 1, 1, 1, 7, 2, 6, 9, 15, NULL, 1, 1, '2020-04-01 23:32:42', '2020-04-19 09:53:08'),
	(6, 2, 3, 1, 1, 1, 7, 10, 33, 17, 50, NULL, 1, 1, '2020-04-01 23:33:02', '2020-04-19 09:53:44'),
	(10, 4, 4, 2, 2, 2, 5, 6, 55, 11, 66, NULL, 3, 6, '2020-04-07 10:27:22', '2020-04-20 09:08:09'),
	(14, 4, 6, 2, 2, 2, 7, 8, 53, 15, 68, NULL, 3, 6, '2020-04-07 10:28:15', '2020-04-18 15:42:39'),
	(16, 4, 6, 2, 2, 3, 3, 9, 14, 12, 26, NULL, 3, 6, '2020-04-07 10:28:38', '2020-04-18 15:53:00'),
	(18, 4, 4, 2, 2, 3, 8, 9, 44, 17, 61, NULL, 3, 6, '2020-04-07 10:28:43', '2020-04-18 15:52:30'),
	(20, 4, 5, 2, 2, 3, 3, 6, 66, 9, 75, NULL, 3, 6, '2020-04-07 10:29:21', '2020-04-18 15:52:49'),
	(21, 5, 6, 2, 2, 3, 5, 9, 56, 14, 70, NULL, 3, 6, '2020-04-07 13:25:16', '2020-04-18 15:53:01'),
	(24, 8, 6, 2, 2, 3, 3, 4, 11, 7, 18, NULL, 3, 6, '2020-04-07 13:25:16', '2020-04-18 15:53:03'),
	(25, 9, 6, 2, 2, 3, 3, 9, 25, 12, 37, NULL, 3, 6, '2020-04-07 13:25:16', '2020-04-18 15:53:04'),
	(26, 5, 4, 2, 2, 3, 8, 7, 44, 15, 59, NULL, 3, 6, '2020-04-07 16:50:05', '2020-04-18 15:52:33'),
	(29, 8, 4, 2, 2, 3, 5, 4, 33, 9, 42, NULL, 3, 6, '2020-04-07 16:50:05', '2020-04-18 15:52:36'),
	(30, 9, 4, 2, 2, 3, 6, 5, 66, 11, 77, NULL, 3, 6, '2020-04-07 16:50:05', '2020-04-18 15:52:38'),
	(38, 5, 4, 2, 2, 2, 4, 7, 44, 11, 55, NULL, 3, 6, '2020-04-15 20:46:52', '2020-04-18 15:39:35'),
	(41, 8, 4, 2, 2, 2, 4, 2, 31, 6, 37, NULL, 3, 6, '2020-04-15 20:46:52', '2020-04-20 09:25:58'),
	(42, 9, 4, 2, 2, 2, 2, 4, 21, 6, 27, NULL, 3, 6, '2020-04-15 20:46:52', '2020-04-20 09:26:02'),
	(50, 5, 5, 2, 2, 2, 7, 5, 44, 12, 56, NULL, 3, 6, '2020-04-16 04:58:35', '2020-04-18 15:42:21'),
	(53, 8, 5, 2, 2, 2, 2, 9, 65, 11, 76, NULL, 3, 6, '2020-04-16 04:58:35', '2020-04-18 15:42:23'),
	(54, 9, 5, 2, 2, 2, 2, 6, 55, 8, 63, NULL, 3, 6, '2020-04-16 04:58:36', '2020-04-18 15:42:24'),
	(55, 5, 6, 2, 2, 2, 4, 9, 22, 13, 35, NULL, 3, 6, '2020-04-16 05:02:43', '2020-04-18 15:42:40'),
	(58, 8, 6, 2, 2, 2, 5, 6, 70, 11, 81, NULL, 3, 6, '2020-04-16 05:02:43', '2020-04-18 15:42:43'),
	(59, 9, 6, 2, 2, 2, 10, 10, 70, 20, 90, NULL, 3, 6, '2020-04-16 05:02:43', '2020-04-18 15:42:44'),
	(60, 5, 5, 2, 2, 3, 6, 2, 44, 8, 52, NULL, 3, 6, '2020-04-17 07:48:25', '2020-04-18 15:52:51'),
	(63, 8, 5, 2, 2, 3, 5, 2, 44, 7, 51, NULL, 3, 6, '2020-04-17 07:48:25', '2020-04-18 15:52:53'),
	(64, 9, 5, 2, 2, 3, 3, 5, 36, 8, 44, NULL, 3, 6, '2020-04-17 07:48:25', '2020-04-18 15:52:54'),
	(65, 10, 1, 1, 1, 1, 4, 6, 55, 10, 65, NULL, 1, 1, '2020-04-19 09:52:38', '2020-04-19 09:52:52'),
	(66, 10, 2, 1, 1, 1, 5, 5, 44, 10, 54, NULL, 1, 1, '2020-04-19 09:52:58', '2020-04-19 09:53:14'),
	(67, 10, 3, 1, 1, 1, 4, 2, 66, 6, 72, NULL, 1, 1, '2020-04-19 09:53:31', '2020-04-19 09:53:54'),
	(69, 2, 10, 1, 1, 1, 5, 6, 66, 11, 77, NULL, 1, 1, '2020-04-19 15:39:28', '2020-04-19 15:39:48'),
	(70, 10, 10, 1, 1, 1, 7, 8, 56, 15, 71, NULL, 1, 1, '2020-04-19 15:39:28', '2020-04-19 15:39:57'),
	(72, 2, 7, 1, 1, 1, 6, 3, 33, 9, 42, NULL, 1, 1, '2020-04-19 15:46:26', '2020-04-19 15:46:56'),
	(73, 10, 7, 1, 1, 1, 6, 5, 45, 11, 56, NULL, 1, 1, '2020-04-19 15:46:26', '2020-04-19 15:47:01'),
	(75, 2, 8, 1, 1, 1, 4, 8, 25, 12, 37, NULL, 1, 1, '2020-04-19 15:47:08', '2020-04-19 15:47:17'),
	(76, 10, 8, 1, 1, 1, 5, 7, 45, 12, 57, NULL, 1, 1, '2020-04-19 15:47:08', '2020-04-19 15:47:22'),
	(78, 2, 9, 1, 1, 1, 3, 8, 36, 11, 47, NULL, 1, 1, '2020-04-19 15:47:28', '2020-04-19 15:47:39'),
	(79, 10, 9, 1, 1, 1, 6, 9, 56, 15, 71, NULL, 1, 1, '2020-04-19 15:47:28', '2020-04-19 15:47:45'),
	(80, 4, 5, 2, 2, 2, 4, 8, 65, 12, 77, NULL, 3, 6, '2020-04-29 17:36:52', '2020-04-30 09:14:26'),
	(81, 18, 1, 1, 1, 1, 7, 7, 45, 14, 59, NULL, 1, 1, '2020-05-01 21:15:27', '2020-05-01 21:15:42'),
	(82, 18, 3, 1, 1, 1, 4, 7, 45, 11, 56, NULL, 1, 1, '2020-05-18 20:09:16', '2020-05-18 20:09:26'),
	(83, 18, 2, 1, 1, 1, 4, 7, 44, 11, 55, NULL, 1, 1, '2020-05-19 22:54:27', '2020-05-19 22:54:45'),
	(84, 18, 7, 1, 1, 1, 4, 7, 45, 11, 56, NULL, 1, 1, '2020-05-19 22:55:09', '2020-05-19 22:55:17'),
	(85, 18, 8, 1, 1, 1, 4, 7, 44, 11, 55, NULL, 1, 1, '2020-05-19 22:55:25', '2020-05-19 22:55:34'),
	(86, 18, 9, 1, 1, 1, 7, 7, 45, 14, 59, NULL, 1, 1, '2020-05-19 22:55:42', '2020-05-19 22:55:50'),
	(87, 18, 10, 1, 1, 1, 4, 7, 44, 11, 55, NULL, 1, 1, '2020-05-19 22:55:56', '2020-05-19 22:56:12'),
	(88, 21, 1, 1, 5, 1, 4, 7, 45, 11, 56, NULL, 1, 1, '2020-05-19 23:27:10', '2020-05-19 23:27:18'),
	(89, 22, 1, 1, 5, 1, 7, 8, 55, 15, 70, NULL, 1, 1, '2020-05-19 23:27:10', '2020-05-24 17:45:45'),
	(90, 21, 2, 1, 5, 1, 6, 5, 59, 11, 70, NULL, 1, 1, '2020-05-24 17:45:53', '2020-05-24 17:46:20'),
	(91, 22, 2, 1, 5, 1, 3, 6, 4, 9, 13, NULL, 1, 1, '2020-05-24 17:45:53', '2020-05-24 17:46:28'),
	(92, 21, 3, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2020-05-25 10:54:56', '2020-05-25 10:54:56'),
	(93, 22, 3, 1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2020-05-25 10:54:56', '2020-05-25 10:54:56');
/*!40000 ALTER TABLE `marks` ENABLE KEYS */;

-- Dumping structure for table dev.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `displayed_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.menus: ~65 rows (approximately)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
REPLACE INTO `menus` (`id`, `displayed_name`, `route_name`, `parent`, `sort_order`, `status`, `icon`, `created_at`, `updated_at`) VALUES
	(2, 'student', 'student.index', 3, 2, 1, 'dripicons-user', '2020-04-30 03:05:19', '0000-00-00 00:00:00'),
	(3, 'users', NULL, 0, 1, 1, 'dripicons-user', '2020-04-16 04:44:46', '0000-00-00 00:00:00'),
	(4, 'admin', '', 3, 90, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'result', NULL, 0, 0, 1, 'dripicons-blog', '2020-05-18 21:04:38', '0000-00-00 00:00:00'),
	(6, 'teacher', 'teacher.index', 3, 30, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'parent', 'parent.index', 3, 50, 0, NULL, '2020-04-07 21:46:50', '0000-00-00 00:00:00'),
	(8, 'librarian', 'librarian.index', 3, 70, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'accountant', 'accountant.index', 3, 60, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 'driver', NULL, 3, 80, 0, NULL, '2020-04-05 08:28:48', '0000-00-00 00:00:00'),
	(11, 'academic', NULL, 0, 0, 1, 'dripicons-store', '2019-01-30 06:57:16', '0000-00-00 00:00:00'),
	(12, 'class', 'class.index', 11, 40, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, 'section', NULL, 11, 50, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, 'class_room', 'room.index', 11, 60, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, 'syllabus', 'syllabus.index', 11, 30, 1, NULL, '2019-01-16 19:16:55', '0000-00-00 00:00:00'),
	(16, 'subject', 'subject.index', 11, 80, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(17, 'class_timetable', 'routine.index', 11, 20, 1, NULL, '2020-04-30 19:12:18', '0000-00-00 00:00:00'),
	(18, 'daily_attendance', 'daily_attendance.index', 11, 10, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(19, 'noticeboard', NULL, 11, 110, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(20, 'promotion', 'student.promotion', 21, 70, 1, NULL, '2020-04-07 21:46:35', '0000-00-00 00:00:00'),
	(21, 'exam', NULL, 0, 0, 1, 'dripicons-to-do', '2019-01-30 06:59:13', '0000-00-00 00:00:00'),
	(22, 'exam', 'exam.index', 21, 20, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(23, 'grades', 'grade.index', 21, 30, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(24, 'marks', 'mark.index', 21, 10, 1, NULL, '2019-01-20 13:45:11', '0000-00-00 00:00:00'),
	(25, 'tabulation_sheet', NULL, 21, 40, 0, NULL, '2019-01-20 13:47:21', '0000-00-00 00:00:00'),
	(27, 'accounting', NULL, 0, 0, 1, 'dripicons-suitcase', '2019-01-30 06:58:34', '0000-00-00 00:00:00'),
	(28, 'student_fee_manager', 'invoice.index', 27, 10, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(29, 'student_fee_report', NULL, 27, 20, 0, NULL, '2019-01-17 06:44:11', '0000-00-00 00:00:00'),
	(30, 'expense_manager', 'expense.index', 27, 40, 1, NULL, '2019-01-19 08:38:15', '0000-00-00 00:00:00'),
	(31, 'back_office', NULL, 0, 0, 1, 'dripicons-archive', '2019-01-30 06:55:31', '0000-00-00 00:00:00'),
	(32, 'library', NULL, 0, 12, 1, 'dripicons-blog', '2020-05-02 16:38:24', '0000-00-00 00:00:00'),
	(33, 'transport', NULL, 31, 0, 0, NULL, '2019-01-16 15:40:26', '0000-00-00 00:00:00'),
	(34, 'hostel', NULL, 31, 0, 0, NULL, '2019-01-16 15:40:29', '0000-00-00 00:00:00'),
	(35, 'school_website', NULL, 31, 0, 0, NULL, '2019-01-16 15:40:32', '0000-00-00 00:00:00'),
	(36, 'settings', NULL, 0, 0, 1, 'dripicons-gear', '2020-05-01 20:17:31', '0000-00-00 00:00:00'),
	(37, 'system_settings', 'system.settings', 36, 10, 0, NULL, '2020-04-27 18:57:19', '0000-00-00 00:00:00'),
	(38, 'sms_settings', 'sms.settings', 36, 40, 0, NULL, '2020-04-27 18:58:55', '0000-00-00 00:00:00'),
	(39, 'payments', 'payment.settings', 36, 20, 1, NULL, '2020-05-16 07:29:12', '0000-00-00 00:00:00'),
	(40, 'language_settings', 'language.index', 36, 30, 0, NULL, '2020-05-01 20:12:38', '0000-00-00 00:00:00'),
	(41, 'session_manager', 'session_manager.index', 31, 0, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(42, 'department', 'department.index', 11, 70, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(43, 'admission', 'student.create', 3, 20, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(44, 'addon_manager', 'addon_manager.index', 31, 0, 0, NULL, '2020-04-07 22:31:04', '0000-00-00 00:00:00'),
	(45, 'assignment', NULL, 11, 90, 0, NULL, '2019-01-16 14:45:09', '0000-00-00 00:00:00'),
	(46, 'event_calender', 'event_calendar.index', 11, 100, 1, NULL, '2019-01-21 09:51:47', '0000-00-00 00:00:00'),
	(47, 'online_exam', NULL, 21, 50, 0, NULL, '2019-01-20 13:48:01', '0000-00-00 00:00:00'),
	(48, 'certificate', NULL, 21, 60, 0, NULL, '2019-01-20 13:48:04', '0000-00-00 00:00:00'),
	(49, 'teacher_permission', 'permission.index', 3, 40, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(50, 'messaging', NULL, 3, 110, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(51, 'role_permission', 'role.index', 3, 100, 1, NULL, '2020-04-27 19:06:20', '0000-00-00 00:00:00'),
	(53, 'form_builder', NULL, 35, 0, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(54, 'book_list_manager', 'book.index', 32, 0, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(55, 'book_issue_report', 'book_issue.index', 32, 0, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(57, 'room_manager', NULL, 34, 0, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(58, 'student_report', NULL, 34, 0, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(59, 'school_manager', 'school.index', 31, 0, 0, NULL, '2019-01-24 11:37:50', '0000-00-00 00:00:00'),
	(60, 'ex', NULL, NULL, 0, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(61, 'income_expense_category', NULL, NULL, 0, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(62, 'expense_category', 'expense_category.index', 27, 30, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(79, 'SMTP_settings', 'smtp.settings', 36, 50, 0, NULL, '2020-04-27 18:57:12', '2019-01-22 19:00:00'),
	(80, 'school_settings', 'school.settings', 36, 11, 1, NULL, '2019-01-23 19:00:00', '2019-01-23 19:00:00'),
	(81, 'pin_management', NULL, 0, 120, 1, 'dripicons-pin', '2020-04-07 15:25:45', '0000-00-00 00:00:00'),
	(82, 'list_pin', 'pin.index', 81, 0, 1, NULL, '2020-04-05 08:38:02', '0000-00-00 00:00:00'),
	(83, 'generate_pin', 'generate.pin', 81, 0, 1, NULL, '2020-04-05 08:44:59', '0000-00-00 00:00:00'),
	(84, 'schools', 'schools.index', 11, 0, 0, NULL, '2020-04-27 18:59:43', '0000-00-00 00:00:00'),
	(85, 'exam_result', 'report.index', 5, 0, 1, NULL, '2020-04-29 19:15:32', '0000-00-00 00:00:00'),
	(86, 'generate_result', 'generate', 5, 0, 1, NULL, '2020-04-29 19:15:32', '0000-00-00 00:00:00'),
	(87, 'lessons', 'lesson.index', 11, 0, 1, 'dripicons-store', '2020-05-25 19:16:50', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Dumping structure for table dev.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conversation_id` int(11) NOT NULL,
  `conversation_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev.messages: ~0 rows (approximately)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Dumping structure for table dev.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev.migrations: ~9 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2020_04_19_141002_create_results_table', 2),
	(4, '2017_10_16_084042_create_conversations_table', 3),
	(5, '2017_10_16_091956_create_messages_table', 3),
	(6, '2017_10_21_165446_create_group_conversations_table', 3),
	(7, '2017_10_21_172616_create_group_users_table', 3),
	(8, '2017_10_25_165610_add_is_accepted_column_to_conversation_table', 3),
	(9, '2017_11_07_224816_create_files_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table dev.parent
CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.parent: ~0 rows (approximately)
/*!40000 ALTER TABLE `parent` DISABLE KEYS */;
/*!40000 ALTER TABLE `parent` ENABLE KEYS */;

-- Dumping structure for table dev.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table dev.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `amount` varchar(50) DEFAULT NULL,
  `school_id` varchar(50) DEFAULT NULL,
  `time_stamp` varchar(50) DEFAULT NULL,
  `amount_paid` varchar(50) DEFAULT NULL,
  `tranx_id` varchar(50) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `tx_id` varchar(50) DEFAULT NULL,
  `last_digits` varchar(50) DEFAULT NULL,
  `card_type` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='For  us to keep track of payments';

-- Dumping data for table dev.payments: ~4 rows (approximately)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
REPLACE INTO `payments` (`id`, `amount`, `school_id`, `time_stamp`, `amount_paid`, `tranx_id`, `ip_address`, `currency`, `tx_id`, `last_digits`, `card_type`, `status`, `created_at`, `updated_at`) VALUES
	(1, '2250', '1', '2020-05-16T18:25:01.000Z', '2250', 'iyogera-schools_EDZJoE449n', '105.112.116.109', 'NGN', '1288858', '4246', 'VISA', 'Paid', '2020-05-16 19:26:36', '2020-05-16 19:26:36'),
	(2, '1500', '6', '2020-05-16T19:43:45.000Z', '1500', 'nkst-college-mkar_U5vHq70ONq', '105.112.116.109', 'NGN', '1288981', '4246', 'VISA', 'Paid', '2020-05-16 20:44:35', '2020-05-16 20:44:35'),
	(3, '1500', '6', '2020-05-16T19:50:16.000Z', '1500', 'nkst-college-mkar_g0chdMGzLP', '105.112.116.109', 'NGN', '1288995', '4246', 'VISA', 'Paid', '2020-05-16 20:50:29', '2020-05-16 20:50:29'),
	(4, '1500', '6', '2020-05-16T19:51:12.000Z', '1500', 'nkst-college-mkar_VOIjiYQt3O', '105.112.116.109', 'NGN', '1288997', '4246', 'VISA', 'Paid', '2020-05-16 20:51:33', '2020-05-16 20:51:33'),
	(5, '3000', '1', '2020-05-23T15:52:35.000Z', '3000', 'iyogera-schools_9DqnPTZGLd', '105.112.117.39', 'NGN', '1304001', '4246', 'VISA', 'Paid', '2020-05-23 16:52:57', '2020-05-23 16:52:57');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Dumping structure for table dev.pin
CREATE TABLE IF NOT EXISTS `pin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `number` varchar(50) DEFAULT NULL,
  `used` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1 COMMENT='for exam checking';

-- Dumping data for table dev.pin: ~32 rows (approximately)
/*!40000 ALTER TABLE `pin` DISABLE KEYS */;
REPLACE INTO `pin` (`id`, `number`, `used`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
	(128, '68479166', 0, 6, '3', '2020-05-21 20:23:30', '2020-05-21 20:23:30'),
	(129, '94368222', 0, 6, '3', '2020-05-21 21:44:37', '2020-05-21 21:44:37'),
	(130, '58866836', 0, 6, '3', '2020-05-21 21:44:38', '2020-05-21 21:44:38'),
	(131, '98253903', 0, 6, '3', '2020-05-21 21:44:38', '2020-05-21 21:44:38'),
	(132, '62547603', 0, 6, '3', '2020-05-21 21:44:38', '2020-05-21 21:44:38'),
	(133, '59786365', 0, 6, '3', '2020-05-21 21:44:38', '2020-05-21 21:44:38'),
	(134, '17939019', 0, 6, '3', '2020-05-21 21:44:38', '2020-05-21 21:44:38'),
	(135, '70733733', 0, 1, '1', '2020-05-21 21:47:50', '2020-05-21 21:47:50'),
	(136, '06220855', 0, 1, '1', '2020-05-21 21:47:51', '2020-05-21 21:47:51'),
	(137, '67507901', 0, 1, '1', '2020-05-21 21:47:51', '2020-05-21 21:47:51'),
	(138, '35566258', 0, 1, '1', '2020-05-21 21:47:51', '2020-05-21 21:47:51'),
	(139, '33024726', 0, 1, '1', '2020-05-21 21:47:51', '2020-05-21 21:47:51'),
	(140, '48113192', 0, 1, '1', '2020-05-21 21:49:08', '2020-05-21 21:49:08'),
	(141, '81598735', 0, 1, '1', '2020-05-21 21:49:08', '2020-05-21 21:49:08'),
	(142, '73821205', 0, 1, '1', '2020-05-21 21:49:08', '2020-05-21 21:49:08'),
	(143, '38032856', 0, 1, '1', '2020-05-21 21:49:08', '2020-05-21 21:49:08'),
	(144, '53663655', 0, 1, '1', '2020-05-21 21:49:08', '2020-05-21 21:49:08'),
	(145, '86023156', 0, 1, '1', '2020-05-21 21:49:21', '2020-05-21 21:49:21'),
	(146, '47648867', 0, 6, '3', '2020-05-21 21:50:36', '2020-05-21 21:50:36'),
	(147, '82687367', 0, 6, '3', '2020-05-21 21:50:36', '2020-05-21 21:50:36'),
	(148, '74343296', 0, 6, '3', '2020-05-21 21:50:36', '2020-05-21 21:50:36'),
	(149, '17957162', 0, 6, '3', '2020-05-21 21:50:37', '2020-05-21 21:50:37'),
	(150, '66687741', 0, 6, '3', '2020-05-21 21:50:37', '2020-05-21 21:50:37'),
	(151, '67572536', 0, 6, '3', '2020-05-21 21:50:37', '2020-05-21 21:50:37'),
	(152, '35935166', 0, 1, '1', '2020-05-21 21:50:49', '2020-05-21 21:50:49'),
	(153, '87968731', 0, 1, '1', '2020-05-21 21:51:08', '2020-05-21 21:51:08'),
	(154, '29787843', 0, 6, '3', '2020-05-22 19:58:08', '2020-05-22 19:58:08'),
	(155, '89740850', 0, 6, '3', '2020-05-22 19:58:08', '2020-05-22 19:58:08'),
	(156, '42877701', 0, 6, '3', '2020-05-22 19:58:09', '2020-05-22 19:58:09'),
	(157, '10733494', 0, 6, '3', '2020-05-22 19:58:09', '2020-05-22 19:58:09'),
	(158, '37842756', 0, 6, '3', '2020-05-22 19:58:09', '2020-05-22 19:58:09'),
	(159, '97127930', 0, 6, '3', '2020-05-22 19:58:09', '2020-05-22 19:58:09'),
	(160, '60290261', 0, 6, '3', '2020-05-22 19:58:51', '2020-05-22 19:58:51');
/*!40000 ALTER TABLE `pin` ENABLE KEYS */;

-- Dumping structure for table dev.references
CREATE TABLE IF NOT EXISTS `references` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `school_id` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `tx_ref_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

-- Dumping data for table dev.references: ~57 rows (approximately)
/*!40000 ALTER TABLE `references` DISABLE KEYS */;
REPLACE INTO `references` (`id`, `school_id`, `session`, `tx_ref_id`, `created_at`, `updated_at`) VALUES
	(29, '1', '1', 'iyogera-schools_YNSdXG2UQT', '2020-05-16 17:20:23', '2020-05-16 17:20:23'),
	(30, '1', '1', 'iyogera-schools_w796ZjVxRx', '2020-05-16 17:21:50', '2020-05-16 17:21:50'),
	(31, '1', '1', 'iyogera-schools_rQispZixJd', '2020-05-16 17:23:38', '2020-05-16 17:23:38'),
	(32, '1', '1', 'iyogera-schools_16IEjkDy3n', '2020-05-16 17:25:54', '2020-05-16 17:25:54'),
	(33, '1', '1', 'iyogera-schools_d0rZJXSyfi', '2020-05-16 17:30:53', '2020-05-16 17:30:53'),
	(34, '1', '1', 'iyogera-schools_JDj1fbmJQO', '2020-05-16 17:31:35', '2020-05-16 17:31:35'),
	(35, '1', '1', 'iyogera-schools_uY8RFQTgcC', '2020-05-16 17:32:56', '2020-05-16 17:32:56'),
	(36, '1', '1', 'iyogera-schools_gGDJpzP0WO', '2020-05-16 17:34:46', '2020-05-16 17:34:46'),
	(37, '1', '1', 'iyogera-schools_6H4zwh2j5P', '2020-05-16 17:36:29', '2020-05-16 17:36:29'),
	(38, '1', '1', 'iyogera-schools_YHOB9N7qA4', '2020-05-16 17:37:09', '2020-05-16 17:37:09'),
	(39, '1', '1', 'iyogera-schools_PAPhujTASz', '2020-05-16 17:40:54', '2020-05-16 17:40:54'),
	(40, '1', '1', 'iyogera-schools_rhVVBJ00sZ', '2020-05-16 17:46:28', '2020-05-16 17:46:28'),
	(41, '1', '1', 'iyogera-schools_SEqyUnQQT7', '2020-05-16 17:47:52', '2020-05-16 17:47:52'),
	(42, '1', '1', 'iyogera-schools_AMVvnjH73h', '2020-05-16 17:55:10', '2020-05-16 17:55:10'),
	(43, '1', '1', 'iyogera-schools_B0YreTCv5q', '2020-05-16 17:56:36', '2020-05-16 17:56:36'),
	(44, '1', '1', 'iyogera-schools_KY7lGqBA3K', '2020-05-16 17:57:56', '2020-05-16 17:57:56'),
	(45, '1', '1', 'iyogera-schools_5D86a4sYcD', '2020-05-16 17:58:51', '2020-05-16 17:58:51'),
	(46, '1', '1', 'iyogera-schools_i3Mv1xKvCb', '2020-05-16 17:59:40', '2020-05-16 17:59:40'),
	(47, '1', '1', 'iyogera-schools_nZNbfPgrKU', '2020-05-16 18:01:04', '2020-05-16 18:01:04'),
	(48, '1', '1', 'iyogera-schools_BWdfyDxfe8', '2020-05-16 18:01:28', '2020-05-16 18:01:28'),
	(49, '1', '1', 'iyogera-schools_8BUyhLJrGU', '2020-05-16 18:01:52', '2020-05-16 18:01:52'),
	(50, '1', '1', 'iyogera-schools_BFC9QbGcL2', '2020-05-16 18:02:14', '2020-05-16 18:02:14'),
	(51, '1', '1', 'iyogera-schools_kqw5sAG6vy', '2020-05-16 18:03:30', '2020-05-16 18:03:30'),
	(52, '1', '1', 'iyogera-schools_w7JN7QXZoX', '2020-05-16 18:07:38', '2020-05-16 18:07:38'),
	(53, '1', '1', 'iyogera-schools_oU3SXDRqOJ', '2020-05-16 18:13:12', '2020-05-16 18:13:12'),
	(54, '1', '1', 'iyogera-schools_GDeWSff2aw', '2020-05-16 19:20:46', '2020-05-16 19:20:46'),
	(55, '1', '1', 'iyogera-schools_EDZJoE449n', '2020-05-16 19:21:39', '2020-05-16 19:21:39'),
	(56, '1', '1', 'iyogera-schools_l9J5rP44px', '2020-05-16 20:14:20', '2020-05-16 20:14:20'),
	(57, '6', '1', 'nkst-college-mkar_XGvdU053Nc', '2020-05-16 20:21:15', '2020-05-16 20:21:15'),
	(58, '6', '1', 'nkst-college-mkar_wmDf1vxffe', '2020-05-16 20:21:34', '2020-05-16 20:21:34'),
	(59, '6', '1', 'nkst-college-mkar_HJsDd0ndYV', '2020-05-16 20:22:15', '2020-05-16 20:22:15'),
	(60, '6', '1', 'nkst-college-mkar_YuWoBUCLxc', '2020-05-16 20:27:09', '2020-05-16 20:27:09'),
	(61, '6', '1', 'nkst-college-mkar_XY3FZlt94x', '2020-05-16 20:28:19', '2020-05-16 20:28:19'),
	(62, '6', '1', 'nkst-college-mkar_LmmpPAMW5O', '2020-05-16 20:40:04', '2020-05-16 20:40:04'),
	(63, '6', '1', 'nkst-college-mkar_U5vHq70ONq', '2020-05-16 20:43:07', '2020-05-16 20:43:07'),
	(64, '6', '1', 'nkst-college-mkar_33XAvpUJT5', '2020-05-16 20:45:34', '2020-05-16 20:45:34'),
	(65, '6', '1', 'nkst-college-mkar_mZMAiiGpNY', '2020-05-16 20:47:33', '2020-05-16 20:47:33'),
	(66, '6', '1', 'nkst-college-mkar_ZJwUP8nxLt', '2020-05-16 20:47:55', '2020-05-16 20:47:55'),
	(67, '6', '1', 'nkst-college-mkar_oIGbJJv6Nu', '2020-05-16 20:48:27', '2020-05-16 20:48:27'),
	(68, '6', '1', 'nkst-college-mkar_g0chdMGzLP', '2020-05-16 20:49:38', '2020-05-16 20:49:38'),
	(69, '6', '1', 'nkst-college-mkar_VOIjiYQt3O', '2020-05-16 20:50:41', '2020-05-16 20:50:41'),
	(70, '6', '1', 'nkst-college-mkar_MP7rWsmrmf', '2020-05-17 08:46:48', '2020-05-17 08:46:48'),
	(71, '6', '1', 'nkst-college-mkar_216W6ab8YM', '2020-05-17 08:54:55', '2020-05-17 08:54:55'),
	(72, '8', '1', 'special-gifted-school_kWRZFfstLB', '2020-05-17 09:30:12', '2020-05-17 09:30:12'),
	(73, '6', '1', 'nkst-college-mkar_m05NsvNJju', '2020-05-17 09:31:01', '2020-05-17 09:31:01'),
	(74, '6', '1', 'nkst-college-mkar_z8KoWvFVMc', '2020-05-17 18:28:34', '2020-05-17 18:28:34'),
	(75, '6', '1', 'nkst-college-mkar_LNlLHvTJB2', '2020-05-17 18:34:18', '2020-05-17 18:34:18'),
	(76, '1', '1', 'iyogera-schools_WQHmcYTBYd', '2020-05-17 18:35:03', '2020-05-17 18:35:03'),
	(77, '6', '1', 'nkst-college-mkar_f2TZJanz7x', '2020-05-20 15:59:53', '2020-05-20 15:59:53'),
	(78, '1', '1', 'iyogera-schools_PxcXITnCxu', '2020-05-21 20:23:01', '2020-05-21 20:23:01'),
	(79, '6', '1', 'nkst-college-mkar_UCDVzwAGVQ', '2020-05-22 20:04:54', '2020-05-22 20:04:54'),
	(80, '1', '1', 'iyogera-schools_hzayjLE5c9', '2020-05-23 07:40:34', '2020-05-23 07:40:34'),
	(81, '1', '1', 'iyogera-schools_PqE9cz1nEj', '2020-05-23 07:42:09', '2020-05-23 07:42:09'),
	(82, '1', '1', 'iyogera-schools_ReLVEcQbu8', '2020-05-23 14:43:58', '2020-05-23 14:43:58'),
	(83, '1', '1', 'iyogera-schools_uY3FdB8W0n', '2020-05-23 14:47:15', '2020-05-23 14:47:15'),
	(84, '1', '1', 'iyogera-schools_9DqnPTZGLd', '2020-05-23 16:51:26', '2020-05-23 16:51:26'),
	(85, '1', '1', 'iyogera-schools_WBhfiUOcL2', '2020-05-23 16:53:16', '2020-05-23 16:53:16'),
	(86, '1', '1', 'iyogera-schools_kQdGMzAhG7', '2020-05-23 19:14:31', '2020-05-23 19:14:31'),
	(87, '1', '1', 'iyogera-schools_odnpOkVGya', '2020-05-25 11:43:29', '2020-05-25 11:43:29'),
	(88, '1', '1', 'iyogera-schools_kg2UDtNuAQ', '2020-05-25 13:40:31', '2020-05-25 13:40:31');
/*!40000 ALTER TABLE `references` ENABLE KEYS */;

-- Dumping structure for table dev.result
CREATE TABLE IF NOT EXISTS `result` (
  `id` bigint(50) NOT NULL AUTO_INCREMENT,
  `position` bigint(20) DEFAULT NULL,
  `subjects` varchar(250) DEFAULT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `exam_id` bigint(20) DEFAULT NULL,
  `class_id` bigint(20) DEFAULT NULL,
  `section_id` bigint(20) DEFAULT NULL,
  `school_id` bigint(20) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `student_name` varchar(250) DEFAULT NULL,
  `student_code` varchar(250) DEFAULT NULL,
  `marks_string` varchar(250) DEFAULT NULL,
  `total_marks` varchar(250) DEFAULT NULL,
  `average` varchar(250) DEFAULT NULL,
  `grade` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table dev.result: ~13 rows (approximately)
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
REPLACE INTO `result` (`id`, `position`, `subjects`, `student_id`, `exam_id`, `class_id`, `section_id`, `school_id`, `session`, `student_name`, `student_code`, `marks_string`, `total_marks`, `average`, `grade`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Motor Mechanics,National Values,Basic Science and Technical', 4, 2, 2, 2, 6, '3', 'Nice  Student', 'nkstcm/2020/08645', '66,75,68', '211', '35.17', NULL, '2020-05-22 21:43:20', '2020-05-22 21:43:20'),
	(2, 4, 'Motor Mechanics,National Values,Basic Science and Technical', 5, 2, 2, 2, 6, '3', 'Ab Stu', 'nkstcmkar/2020/5', '59,56,70', '146', '24.33', NULL, '2020-05-22 21:43:20', '2020-05-22 21:43:20'),
	(3, 2, 'Motor Mechanics,National Values,Basic Science and Technical', 8, 2, 2, 2, 6, '3', 'Stewie', 'nkstcmkar/2020/44032', '42,76,18', '194', '32.33', NULL, '2020-05-22 21:43:20', '2020-05-22 21:43:20'),
	(4, 3, 'Motor Mechanics,National Values,Basic Science and Technical', 9, 2, 2, 2, 6, '3', 'Wallace Myem Aboiyar', 'nkstcmkar/2020/73968', '77,63,37', '180', '30.00', NULL, '2020-05-22 21:43:20', '2020-05-22 21:43:20'),
	(5, 2, 'Motor Mechanics,National Values,Basic Science and Technical', 4, 3, 2, 2, 6, '3', 'Nice  Student', 'nkstcm/2020/08645', '66,75,68', '162', '27.00', NULL, '2020-05-22 21:43:25', '2020-05-22 21:43:26'),
	(6, 1, 'Motor Mechanics,National Values,Basic Science and Technical', 5, 3, 2, 2, 6, '3', 'Ab Stu', 'nkstcmkar/2020/5', '59,56,70', '181', '30.17', NULL, '2020-05-22 21:43:26', '2020-05-22 21:43:26'),
	(7, 4, 'Motor Mechanics,National Values,Basic Science and Technical', 8, 3, 2, 2, 6, '3', 'Stewie', 'nkstcmkar/2020/44032', '42,76,18', '111', '18.50', NULL, '2020-05-22 21:43:26', '2020-05-22 21:43:26'),
	(8, 3, 'Motor Mechanics,National Values,Basic Science and Technical', 9, 3, 2, 2, 6, '3', 'Wallace Myem Aboiyar', 'nkstcmkar/2020/73968', '77,63,37', '158', '26.33', NULL, '2020-05-22 21:43:26', '2020-05-22 21:43:26'),
	(9, 4, 'Mathematics,English Language,Economics,Physics,Chemistry,Biology,Marketing', 2, 1, 1, 1, 1, '1', 'Precious Audu', '2009ade', '81,15,50,42,37,47,77', '349', '49.86', NULL, '2020-05-23 05:03:13', '2020-05-23 05:05:43'),
	(10, 1, 'Mathematics,English Language,Economics,Physics,Chemistry,Biology,Marketing', 10, 1, 1, 1, 1, '1', 'Sabon Wayo', 'iyo/2020/39974', '65,54,72,56,57,71,71', '446', '63.71', NULL, '2020-05-23 05:03:13', '2020-05-23 05:03:13'),
	(11, 2, 'Mathematics,English Language,Economics,Physics,Chemistry,Biology,Marketing', 18, 1, 1, 1, 1, '1', 'Wallace Myem Aboiyar', 'iyo/2020/97599', '59,55,56,56,55,59,55', '395', '56.43', NULL, '2020-05-23 05:03:13', '2020-05-23 05:03:14');
/*!40000 ALTER TABLE `result` ENABLE KEYS */;

-- Dumping structure for table dev.results
CREATE TABLE IF NOT EXISTS `results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev.results: ~0 rows (approximately)
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
/*!40000 ALTER TABLE `results` ENABLE KEYS */;

-- Dumping structure for table dev.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin` longtext COLLATE utf8_unicode_ci,
  `teacher` longtext COLLATE utf8_unicode_ci,
  `student` longtext COLLATE utf8_unicode_ci,
  `parent` longtext COLLATE utf8_unicode_ci,
  `accountant` longtext COLLATE utf8_unicode_ci,
  `librarian` longtext COLLATE utf8_unicode_ci,
  `driver` longtext COLLATE utf8_unicode_ci,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.roles: ~5 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
REPLACE INTO `roles` (`id`, `admin`, `teacher`, `student`, `parent`, `accountant`, `librarian`, `driver`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, '["5","6","49","7","9","4","50","18","17","15","14","45","46","19","24","25","47","20","29","30","54","55","33","41","44","38","39","40"]', '["2","6","85","18","17","46","24","41","87"]', '["6","15","85","17","46","23","28","41","87"]', NULL, '["28","62","30","39","82"]', '["8","46","54","55","41","40"]', NULL, 2, '2020-05-25 11:42:00', '2018-11-27 01:30:04'),
	(2, '["43","6","85","17","16","46","20","28","41","39","82","83"]', '["2","6","85","18","17","46","24","41","87"]', '["6","15","85","17","46","23","28","41","87"]', '["2","80"]', '["28","62","30","39","82"]', '["8","46","54","55","41","40"]', '["5","43","49","7","51","17","15","12","14","45","46","19","24","23","28","29","30","55","33","44"]', 1, '2020-05-25 11:42:01', '2020-05-24 11:49:05'),
	(3, '["43","6","85","17","16","46","20","28","41","39","82","83"]', '["2","6","85","18","17","46","24","41","87"]', '["6","15","85","17","46","23","28","41","87"]', NULL, '["28","62","30","39","82"]', '["8","46","54","55","41","40"]', '["85"]', 6, '2020-05-25 11:42:02', '2020-05-21 12:55:16'),
	(4, '["43","6","85","17","16","46","20","28","41","39","82","83"]', '["2","6","85","18","17","46","24","41","87"]', '["6","15","85","17","46","23","28","41","87"]', '["2","85","15"]', '["28","62","30","39","82"]', '["8","46","54","55","41","40"]', NULL, 8, '2020-04-30 17:39:45', '2020-05-24 18:27:42'),
	(6, '["43","6","85","17","16","46","20","28","41","39","82","83"]', '["2","6","85","18","17","46","24","41","87"]', '["6","15","85","17","46","23","28","41","87"]', NULL, '["28","62","30","39","82"]', '["8","46","54","55","41","40"]', NULL, 13, '2020-05-25 11:41:14', '2020-05-25 11:41:14');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table dev.routines
CREATE TABLE IF NOT EXISTS `routines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `section_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starting_hour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ending_hour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starting_minute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ending_minute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `teacher_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.routines: ~6 rows (approximately)
/*!40000 ALTER TABLE `routines` DISABLE KEYS */;
REPLACE INTO `routines` (`id`, `class_id`, `section_id`, `subject_id`, `starting_hour`, `ending_hour`, `starting_minute`, `ending_minute`, `day`, `teacher_id`, `room_id`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
	(1, '1', '1', '1', '8', '9', '20', '15', 'monday', 1, 1, 1, '1', '2020-04-29 18:42:27', '2020-04-29 18:42:27'),
	(2, '1', '1', '2', '10', '11', '0', '0', 'tuesday', 3, 2, 1, '1', '2020-04-29 18:45:59', '2020-04-29 18:45:59'),
	(3, '1', '1', '1', '9', '10', '20', '40', 'monday', 3, 3, 1, '1', '2020-04-29 18:47:07', '2020-04-29 18:47:07'),
	(4, '1', '5', '1', '16', '13', '35', '40', 'monday', 5, 1, 1, '1', '2020-05-19 23:31:46', '2020-05-19 23:31:46'),
	(5, '2', '2', '4', '8', '10', '20', '25', 'tuesday', 2, 4, 6, '3', '2020-05-21 10:05:17', '2020-05-21 10:05:17'),
	(7, '1', '1', '7', '9', '10', '15', '0', 'monday', 5, 2, 1, '1', '2020-05-21 10:09:08', '2020-05-21 10:09:08');
/*!40000 ALTER TABLE `routines` ENABLE KEYS */;

-- Dumping structure for table dev.schools
CREATE TABLE IF NOT EXISTS `schools` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8_unicode_ci,
  `phone` longtext COLLATE utf8_unicode_ci,
  `short` longtext COLLATE utf8_unicode_ci,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'NG',
  `currency` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'NGN',
  `license` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.schools: ~3 rows (approximately)
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
REPLACE INTO `schools` (`id`, `name`, `session`, `address`, `phone`, `short`, `country`, `currency`, `license`, `created_at`, `updated_at`) VALUES
	(1, 'Iyogera Schools', '1', '9 Opposite Mkar Hospital Doctors Quarters Mkar', '08067707813', 'iyogera', 'NG', 'NGN', NULL, '2020-03-14 02:01:53', '2020-05-23 07:38:50'),
	(6, 'NKST College, Mkar', '3', 'DadaGonoyi Crescent', '08068256917', 'nkstcmkar', 'NG', 'NGN', NULL, '2020-04-05 13:42:30', '2020-04-29 20:48:43'),
	(8, 'Special gifted school', '6', 'Mkar gboko', '8024313854', 'SGS', 'NG', 'NGN', NULL, '2020-04-30 17:39:45', '2020-05-17 09:01:01'),
	(13, 'Sky Gifted, Maitama', '12', 'That home at Maitama', '09056987125', NULL, 'NG', 'NGN', NULL, '2020-05-25 11:41:14', '2020-05-25 13:26:31');
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;

-- Dumping structure for table dev.sections
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.sections: ~17 rows (approximately)
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
REPLACE INTO `sections` (`id`, `name`, `class_id`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, 'A', 1, 1, '2020-04-01 22:08:04', '2020-04-01 22:08:04'),
	(2, 'A', 2, 6, '2020-04-06 19:56:32', '2020-04-06 19:56:32'),
	(3, 'A', 3, 1, '2020-04-07 12:32:44', '2020-04-07 12:32:44'),
	(4, 'B', 3, 1, '2020-04-07 12:33:10', '2020-04-07 12:33:10'),
	(5, 'B', 1, 1, '2020-04-07 12:33:22', '2020-04-07 12:33:22'),
	(6, 'A', 4, 1, '2020-04-07 12:33:35', '2020-04-07 12:33:35'),
	(7, 'B', 4, 1, '2020-04-07 12:33:48', '2020-04-07 12:33:48'),
	(8, 'A', 5, 6, '2020-04-16 15:08:02', '2020-04-16 15:08:02'),
	(9, 'A', 6, 8, '2020-05-02 13:40:51', '2020-05-02 13:40:51'),
	(10, 'A', 7, 8, '2020-05-02 13:43:16', '2020-05-02 13:43:16'),
	(11, 'A', 8, 8, '2020-05-02 13:44:25', '2020-05-02 13:44:25'),
	(12, 'A', 9, 8, '2020-05-02 13:48:33', '2020-05-02 13:48:33'),
	(13, 'A', 10, 8, '2020-05-02 13:57:33', '2020-05-02 13:57:33'),
	(14, 'A', 11, 8, '2020-05-02 13:57:47', '2020-05-02 13:57:47'),
	(15, 'A', 12, 6, '2020-05-21 12:47:28', '2020-05-21 12:47:28'),
	(16, 'A', 13, 6, '2020-05-21 12:52:53', '2020-05-21 12:52:53');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;

-- Dumping structure for table dev.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.sessions: ~11 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
REPLACE INTO `sessions` (`id`, `name`, `school_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, '2019/2020', 1, 1, '2020-03-14 02:01:53', '2020-03-14 02:01:53'),
	(3, '2019/2020', 6, 1, '2020-04-07 09:27:29', '2020-04-07 09:30:58'),
	(4, '2020/2021', 6, 0, '2020-04-07 09:27:46', '2020-04-07 09:27:46'),
	(5, '2021/2022', 6, 0, '2020-04-08 16:44:07', '2020-04-08 16:44:07'),
	(6, '2019/2020', 8, 0, '2020-05-18 15:57:05', '2020-05-18 15:57:05'),
	(7, '2020/2021', 1, 0, '2020-05-23 07:40:22', '2020-05-23 07:40:22'),
	(8, '2020/2021', 9, 1, '2020-05-25 11:31:37', '2020-05-25 11:31:37'),
	(9, '2020/2021', 10, 1, '2020-05-25 11:32:56', '2020-05-25 11:32:56'),
	(10, '2020/2021', 11, 1, '2020-05-25 11:34:00', '2020-05-25 11:34:00'),
	(11, '2020/2021', 12, 1, '2020-05-25 11:34:51', '2020-05-25 11:34:51'),
	(12, '2020/2021', 13, 1, '2020-05-25 11:41:14', '2020-05-25 11:41:14');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table dev.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system_name` varchar(255) DEFAULT NULL,
  `system_title` varchar(255) DEFAULT NULL,
  `system_email` varchar(255) DEFAULT NULL,
  `selected_branch` int(11) DEFAULT NULL,
  `running_session` varchar(255) DEFAULT '',
  `phone` varchar(255) DEFAULT NULL,
  `purchase_code` varchar(255) DEFAULT NULL,
  `address` longtext,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table dev.settings: ~1 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
REPLACE INTO `settings` (`id`, `system_name`, `system_title`, `system_email`, `selected_branch`, `running_session`, `phone`, `purchase_code`, `address`, `updated_at`, `created_at`) VALUES
	(1, 'Iyogera ERP', 'Iyogera School ERP', 'admin@iyogera.com', 1, '1', '2348067707813', NULL, '9 Opposite Mkar Hospital Doctors Quarters Mkar', '2020-05-21 18:46:35', '2020-03-14 02:01:53');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table dev.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `profile_pix` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.students: ~29 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
REPLACE INTO `students` (`id`, `code`, `user_id`, `profile_pix`, `school_id`, `created_at`, `updated_at`) VALUES
	(2, '2009ade', 4, '2009ade', 1, '2020-04-01 22:57:45', '2020-04-01 22:57:45'),
	(4, 'nkstcm/2020/08645', 9, 'nkstcm202008645', 6, '2020-04-07 10:26:22', '2020-04-07 10:26:22'),
	(5, 'nkstcmkar/2020/5', 10, 'nkstcmkar20205', 6, '2020-04-07 10:58:20', '2020-04-07 10:58:20'),
	(8, 'nkstcmkar/2020/44032', 13, 'nkstcmkar202044032', 6, '2020-04-07 11:01:18', '2020-04-07 11:01:18'),
	(9, 'nkstcmkar/2020/73968', 14, 'nkstcmkar202073968', 6, '2020-04-07 12:09:11', '2020-04-07 12:09:11'),
	(10, 'iyo/2020/39974', 15, 'iyo202039974', 1, '2020-04-07 12:32:06', '2020-04-07 12:32:06'),
	(11, 'iyo/2020/75833', 18, 'iyo202075833', 1, '2020-04-07 12:46:15', '2020-04-07 12:46:15'),
	(12, 'nkstcmkar/2020/95074', 20, 'nkstcmkar202095074', 6, '2020-04-28 06:53:05', '2020-04-28 06:53:05'),
	(13, 'nkstcmkar/2020/38088', 21, 'nkstcmkar202038088', 6, '2020-04-28 07:11:13', '2020-04-28 07:11:13'),
	(14, 'iyo/2020/06814', 24, 'iyo202006814', 1, '2020-04-30 16:36:26', '2020-04-30 16:36:26'),
	(15, 'iyo/2020/61566', 25, 'iyo202061566', 1, '2020-04-30 16:36:26', '2020-04-30 16:36:26'),
	(16, 'iyo/2020/70906', 26, 'iyo202070906', 1, '2020-04-30 16:36:26', '2020-04-30 16:36:26'),
	(17, 'iyo/2020/85503', 27, 'iyo202085503', 1, '2020-04-30 16:36:26', '2020-04-30 16:36:26'),
	(18, 'iyo/2020/97599', 30, 'iyo202097599', 1, '2020-05-01 20:28:16', '2020-05-01 20:28:16'),
	(19, 'iyo/2020/80046', 31, 'iyo202080046', 1, '2020-05-14 12:04:50', '2020-05-14 12:04:50'),
	(20, '/2020/91487', 32, '202091487', 8, '2020-05-17 09:00:27', '2020-05-17 09:00:27'),
	(21, 'iyo/2020/81967', 33, 'iyo202081967', 1, '2020-05-19 23:13:11', '2020-05-19 23:13:11'),
	(22, 'iyo/2020/39673', 34, 'iyo202039673', 1, '2020-05-19 23:13:12', '2020-05-19 23:13:12'),
	(26, 'nkstcmkar/2020/22221', 38, 'nkstcmkar202022221', 6, '2020-05-21 09:15:48', '2020-05-21 09:15:48'),
	(31, 'iyo/2020/58436', 43, 'iyo202058436', 1, '2020-05-21 09:48:01', '2020-05-21 09:48:01'),
	(32, 'nkstcmkar/2020/23968', 47, 'nkstcmkar202023968', 6, '2020-05-21 16:53:07', '2020-05-21 16:53:07'),
	(33, 'nkstcmkar/2020/60329', 48, 'nkstcmkar202060329', 6, '2020-05-21 16:53:07', '2020-05-21 16:53:07'),
	(34, 'nkstcmkar/2020/88354', 49, 'nkstcmkar202088354', 6, '2020-05-21 16:53:07', '2020-05-21 16:53:07'),
	(35, 'nkstcmkar/2020/05370', 52, 'nkstcmkar202005370', 6, '2020-05-27 16:51:38', '2020-05-27 16:51:38'),
	(36, 'nkstcmkar/2020/01820', 53, 'nkstcmkar202001820', 6, '2020-05-27 16:56:07', '2020-05-27 16:56:07'),
	(37, 'iyogera/2020/68219', 54, 'iyogera202068219', 1, '2020-05-28 08:49:29', '2020-05-28 08:49:29'),
	(38, 'iyogera/2020/90409', 55, 'iyogera202090409', 1, '2020-05-28 08:51:33', '2020-05-28 08:51:33'),
	(39, 'iyogera/2020/57477', 56, 'iyogera202057477', 1, '2020-05-28 08:57:14', '2020-05-28 08:57:14'),
	(41, 'iyogera/2020/86431', 58, 'iyogera202086431', 1, '2020-05-28 09:31:38', '2020-05-28 09:31:38'),
	(42, 'iyogera/2020/98565', 59, 'iyogera202098565', 1, '2020-05-28 09:33:07', '2020-05-28 09:33:07'),
	(43, 'iyogera/2020/13450', 60, 'iyogera202013450', 1, '2020-05-28 09:33:24', '2020-05-28 09:33:24');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table dev.subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.subjects: ~10 rows (approximately)
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
REPLACE INTO `subjects` (`id`, `name`, `short_name`, `school_id`, `class_id`, `session`, `teacher_id`, `created_at`, `updated_at`) VALUES
	(1, 'Mathematics', 'MTH', 1, 1, '1', 1, '2020-04-01 22:47:24', '2020-04-01 22:47:24'),
	(2, 'English Language', 'ENG', 1, 1, '1', 1, '2020-04-01 22:47:35', '2020-04-01 22:47:35'),
	(3, 'Economics', 'ECO', 1, 1, '1', 3, '2020-04-01 22:47:48', '2020-04-27 20:49:53'),
	(4, 'Motor Mechanics', 'MOM', 6, 2, '3', 2, '2020-04-06 19:57:00', '2020-04-06 19:57:00'),
	(5, 'National Values', 'NAV', 6, 2, '3', 2, '2020-04-06 19:57:14', '2020-04-06 19:57:14'),
	(6, 'Basic Science and Technical', 'BST', 6, 2, '3', 4, '2020-04-07 10:05:54', '2020-05-20 20:56:29'),
	(7, 'Physics', 'PHY', 1, 1, '1', 3, '2020-04-07 12:43:07', '2020-04-19 15:41:50'),
	(8, 'Chemistry', 'CHM', 1, 1, '1', 3, '2020-04-07 12:43:26', '2020-04-19 15:42:05'),
	(9, 'Biology', 'BIO', 1, 1, '1', 1, '2020-04-07 12:44:14', '2020-04-27 20:40:55'),
	(10, 'Marketing', 'MKT', 1, 1, '1', 3, '2020-04-19 15:39:08', '2020-04-19 15:39:08');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Dumping structure for table dev.syllabuses
CREATE TABLE IF NOT EXISTS `syllabuses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.syllabuses: ~1 rows (approximately)
/*!40000 ALTER TABLE `syllabuses` DISABLE KEYS */;
REPLACE INTO `syllabuses` (`id`, `title`, `class_id`, `section_id`, `subject_id`, `file`, `session`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, 'hello', 2, 2, 4, '1586991600.php', 3, 6, '2020-04-16 15:01:43', '2020-04-16 15:01:43');
/*!40000 ALTER TABLE `syllabuses` ENABLE KEYS */;

-- Dumping structure for table dev.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.teachers: ~3 rows (approximately)
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
REPLACE INTO `teachers` (`id`, `user_id`, `department_id`, `designation`, `school_id`, `created_at`, `updated_at`) VALUES
	(1, 5, 1, 'Head Marker', 1, '2020-04-01 23:40:58', '2020-04-01 23:40:58'),
	(2, 7, 2, 'Teacher', 6, '2020-04-06 20:00:06', '2020-04-06 20:00:06'),
	(3, 16, 1, 'English Teacher', 1, '2020-04-07 12:37:27', '2020-04-07 12:37:27'),
	(4, 23, 2, 'Teacher', 6, '2020-04-29 22:20:24', '2020-04-29 22:20:24'),
	(5, 28, 4, 'Physics', 1, '2020-04-30 16:40:37', '2020-04-30 16:40:37');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;

-- Dumping structure for table dev.teacher_permissions
CREATE TABLE IF NOT EXISTS `teacher_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT '0',
  `assignment` int(11) DEFAULT '0',
  `attendance` int(11) DEFAULT '0',
  `class_teacher` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dev.teacher_permissions: ~10 rows (approximately)
/*!40000 ALTER TABLE `teacher_permissions` DISABLE KEYS */;
REPLACE INTO `teacher_permissions` (`id`, `class_id`, `section_id`, `teacher_id`, `marks`, `assignment`, `attendance`, `class_teacher`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 1, 1, 1, 1, '2020-04-01 23:41:21', '2020-04-06 18:53:30'),
	(2, 2, 2, 2, 1, 1, 0, 0, '2020-04-06 20:00:27', '2020-05-22 20:15:17'),
	(3, 1, 1, 3, 1, 1, 0, 0, '2020-04-07 12:38:32', '2020-04-07 12:38:34'),
	(4, 3, 3, 1, 1, 0, 0, 0, '2020-04-20 14:04:05', '2020-04-20 14:04:05'),
	(5, 3, 3, 3, 1, 0, 0, 0, '2020-04-20 14:04:06', '2020-04-20 14:04:06'),
	(6, 2, 2, 4, 1, 1, 0, 1, '2020-04-30 09:54:23', '2020-05-21 09:53:25'),
	(7, 3, 4, 5, 0, 1, 1, 1, '2020-04-30 16:43:38', '2020-04-30 16:43:54'),
	(8, 3, 4, 3, 0, 1, 0, 0, '2020-04-30 16:43:43', '2020-04-30 16:43:46'),
	(9, 1, 5, 5, 1, 0, 0, 0, '2020-05-19 23:13:47', '2020-05-19 23:13:55'),
	(10, 4, 6, 5, 0, 0, 0, 1, '2020-05-23 20:48:39', '2020-05-23 20:48:39'),
	(11, 4, 6, 3, 0, 0, 1, 0, '2020-05-23 20:49:12', '2020-05-23 20:49:12'),
	(12, 1, 1, 5, 0, 1, 0, 0, '2020-05-23 20:58:00', '2020-05-23 20:58:00');
/*!40000 ALTER TABLE `teacher_permissions` ENABLE KEYS */;

-- Dumping structure for table dev.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pix` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'other',
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `authentication_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev.users: ~44 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `password`, `profile_pix`, `role`, `address`, `phone`, `remember_token`, `birthday`, `gender`, `blood_group`, `school_id`, `authentication_key`, `created_at`, `updated_at`) VALUES
	(1, 'De Mode', 'admin@iyogera.com', '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW', NULL, 'superadmin', '333 Fremont Street, CA', '0202', '4pPCuHzq8b41gwSr6RzTT0RV5TChTZRr5wtpCMIWX5tOjmPVmPUgDndVI8o3', NULL, NULL, NULL, 1, NULL, '2020-03-14 02:01:54', '2020-05-19 20:45:35'),
	(2, 'Aboiyar Iorrumun', 'aboiyariorrumun2@gmail.com', '$2y$10$8qcISvHTRl3PeC8ILD6gVO1.HgBJINdCMVVKFovghLBArJAx2ACRO', NULL, 'teacher', 'DadaGonoyi, Crescent', '07088550832', 'f9HzMzsdOTX6YDaHC17TDU82bGAd0ChTCh3SoXqr7bXSTW0YN0PWTAQj6s4E', NULL, 'male', 'a+', 1, NULL, '2020-04-01 22:53:17', '2020-05-14 10:51:34'),
	(4, 'Precious Audu', 'tor.phil@cdmportal.org', '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW', NULL, 'student', 'DadaGonoyi Crescent', '07088550832', NULL, '1364943600', 'others', NULL, 1, NULL, '2020-04-01 22:57:45', '2020-04-01 22:57:45'),
	(5, 'Precious Audu', 'prudentgps@gmail.com', '$2y$10$yJNGK5TZK.UHqu.BjtqJoerTgWBJ83DCZglj/XsHF.7M1.qfRSjz2', NULL, 'teacher', 'DadaGonoyi Crescent', '07088550832', 'HhFyzqpWtKyBP9RZMI7iHwga4ThemmClz6jm9sFGGlKk5RdPrkaMfPkOgvBQ', NULL, 'male', 'a+', 1, NULL, '2020-04-01 23:40:57', '2020-04-01 23:40:57'),
	(6, 'Wallace Myem', 'wallace@gmail.com', '$2y$10$otbLw2.iX8e4yBs.Fmsc6eLu8cNdD7sWf4tv8wDOD4vHTHMI/P4rW', NULL, 'superadmin', 'just here to school', '08063955478', 'apLaa7BMtZ4huAz4BG4a5qgte7G2UnFfJNvsPWOcRvPbiQjGzGRofddZ7c0I', NULL, 'male', NULL, 6, NULL, NULL, '2020-05-21 18:24:43'),
	(7, 'Akor Jordan', 'audu@gmail.com', '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW', NULL, 'teacher', 'DadaGonoyi Crescent', '07088550832', 'FExiv11mNAHgnc25I7vRLx7vulnz38LSckCx69ykC1diUrLck9q3R4be65V9', NULL, 'male', 'a+', 6, NULL, '2020-04-06 20:00:06', '2020-04-06 20:00:06'),
	(9, 'Nice  Student', '08645@iyogera.com', '$2y$10$hX28kpRYDO7THLgu28Cl1uoRAtBMrzSVhTIz.iLp62gQZi4J/z1fC', NULL, 'student', 'School here, ok', '02044787', 'rPiuBTqFOxqP1qtHbt0RziTHuNGlr9Fw8XQwbCQMWws5PoRNpZAswVozMfzc', '1564614000', 'others', NULL, 6, NULL, '2020-04-07 10:26:22', '2020-05-20 13:04:45'),
	(10, 'Ab Stu', '5@iyogera.com', '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW', NULL, 'student', NULL, '125', NULL, '-3600', 'male', NULL, 6, NULL, '2020-04-07 10:58:20', '2020-04-20 04:36:16'),
	(13, 'Stewie', '44032@iyogera.com', '$2y$10$SVxXtw8mCjQJi7uaBIK7cePMaGBfxitiMmd/jywcnjbkxXXY59.Xi', NULL, 'student', NULL, '020447', NULL, '-3600', 'male', NULL, 6, NULL, '2020-04-07 11:01:18', '2020-04-07 12:03:03'),
	(14, 'Wallace Myem Aboiyar', '73968@iyogera.com', '$2y$10$uB17QLvgr4M8jnUu7eItS.p4gIbXPDA41jRFVJPJDvekt5QmS3u0q', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar\r\nMq', '08067707813', 'BBzFAzlc86qt4YdtqLQdZDLmSoh2OuuYNBiCnzP9CqJY70EkmgUf186Kbfeg', '1554159600', 'female', NULL, 6, NULL, '2020-04-07 12:09:11', '2020-05-21 09:09:36'),
	(15, 'Sabon Wayo', '39974@iyogera.com', '$2y$10$y6c.kVJeNWWjdwCNVG9wSuX1Ola/IXm4wq4Am94LJbDBNmMLC5Rvy', NULL, 'student', 'Kumpanni Guyuk', '09067085656', 'HUl5SKDj1VTWJuJnHirviITQvwZOjBzJq3MfA5YOmG4mWMZ5bGSTkd9F0BQW', '923439600', 'male', NULL, 1, NULL, '2020-04-07 12:32:06', '2020-05-02 12:45:52'),
	(16, 'Adamu Musa', 'adamu@iyogera.com', '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW', NULL, 'teacher', 'Chikila Guyuk', '09067085656', 'OrynCv55M1D3nYjHJ8We9DTWUW526iaP6SQWbCxTxrpiaDfE3TRbLUvFXrWV', NULL, 'male', 'ab+', 1, NULL, '2020-04-07 12:37:27', '2020-04-07 12:37:27'),
	(17, 'Azarah Mohammad', 'azarah@iyogera.com', '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW', NULL, 'supreme', 'Mkar, Gboko', '08057607660', 'sUcWT37Y4IuIK8b7GMwgnyPoF890pQk9GF836vlVnATNtXxL8dSrQGSPZs8l', NULL, 'male', 'a+', 1, NULL, '2020-04-07 12:40:37', '2020-05-14 10:25:10'),
	(18, 'Azarah Kuduni', '75833@iyogera.com', '$2y$10$ZbHpNlh/tAWkHuIq8Xm17.bu/sLP75pTZmQ.svw3d1y0ZGhvapJnC', NULL, 'student', 'Mkar Gboko', '08057607660', NULL, '954889200', 'female', NULL, 1, NULL, '2020-04-07 12:46:14', '2020-04-07 12:46:14'),
	(19, 'Agbo Sonia', 'noah@gmail.com', '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW', NULL, 'librarian', 'mkar gboko', '09067085656', 'N14WmDizwUjP2c4RW6P10H1yz0Pae8gaUXJLDNzPQxcTV45cgAhFAtmyO6oK', NULL, 'female', 'a+', 6, NULL, '2020-04-08 16:39:34', '2020-04-08 16:39:34'),
	(20, 'De Mode Child', '95074@iyogera.com', '$2y$10$tT1t.e1qhgtF14bhtbY.9Oq7aD0hgl2/PoRojGMMdN/vQEwZaSJcu', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar\r\nMq 9', '+2348067707813', NULL, '1401836400', 'female', NULL, 6, NULL, '2020-04-28 06:53:04', '2020-04-28 06:53:04'),
	(21, 'De Mode other child', '38088@iyogera.com', '$2y$10$DVFi48774C08cb5QbdTx7.e1WBHAfTZ5bInQvn0Uv0YAYyCtT854O', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar\r\nMq 9', '+2348067707813', NULL, '1588028400', 'others', NULL, 6, NULL, '2020-04-28 07:11:13', '2020-04-28 07:11:13'),
	(23, 'De Mode', 'wallace2@gmail.com', '$2y$10$ox3h44AV5XDg9MeEjXLXWO7Lvzv3NM66571DD57nAXePzut6X1TWu', NULL, 'teacher', '9 Opposite Mkar Hospital Doctors Quarters Mkar\r\nMq 9', '+2348067707813', NULL, NULL, 'male', 'a+', 6, NULL, '2020-04-29 22:20:24', '2020-04-29 22:20:24'),
	(24, 'Akase Aondohemba', '06814@iyogera.com', '$2y$10$vmsgcKFtyTpiwpETUMtYOO9XnS.k8CiXKE/Ud7gVOe6JIMMLqpXJW', NULL, 'student', 'here and there', '090', '8hUxWPiPU2ZbfH5exS4bDi67LO4dFmIbe7vtZ3WeobELhGwb9ph8b6aJgQjk', '-3600', 'male', NULL, 1, NULL, '2020-04-30 16:36:26', '2020-05-01 20:48:22'),
	(25, 'Calvin Sedoo', '61566@iyogera.com', '$2y$10$wveAwujhbF6yrpXf/cG.6.PM5fp6.QSaBpUXOdLEeUoFqMI/33h2O', NULL, 'student', NULL, NULL, NULL, NULL, 'male', NULL, 1, NULL, '2020-04-30 16:36:26', '2020-04-30 16:36:26'),
	(26, 'Tsegba Rita', '70906@iyogera.com', '$2y$10$3btptKG0lAb7.H7o2Vq/3OLPcH.M08w40maKb97syLKDxFzK..WWS', NULL, 'student', NULL, NULL, 'UIABcgqQ4w6LuoEN8vgKGBR1QgvM0PPHN6UZHeannA6KOtfaBSvfVSd0kQC8', NULL, 'female', NULL, 1, NULL, '2020-04-30 16:36:26', '2020-04-30 16:36:26'),
	(27, 'Cherish Iyuadoo', '85503@iyogera.com', '$2y$10$AygfA69Bc396Cky4goB8dePSlXPWObrd1XQzSDyiBviVA7PKRBQtS', NULL, 'student', NULL, NULL, NULL, NULL, 'female', NULL, 1, NULL, '2020-04-30 16:36:26', '2020-04-30 16:36:26'),
	(28, 'Aboiyar Noah', 'noah@iyogera.com', '$2y$10$XxWGnU/StyEaHPn.7R2bZOIkFKaBtMqHkOcCrbrwLwfqs99ZSXimi', NULL, 'accountant', 'Mkar, Gboko.', '09067085656', NULL, NULL, 'male', 'o+', 1, NULL, '2020-04-30 16:40:36', '2020-04-30 16:40:36'),
	(29, 'Mr. Nongu', 'nongu@yahoo.com', '$2y$10$XxWGnU/StyEaHPn.7R2bZOIkFKaBtMqHkOcCrbrwLwfqs99ZSXimi', NULL, 'superadmin', 'Mkar gboko', '08024313852', 'VTrLuOUAb8QvFPrbd62MA77BcTU86xvJsoamonYiizS9gggrhxx5P49c7ATI', NULL, NULL, NULL, 8, NULL, '2020-04-30 17:39:45', '2020-04-30 17:39:45'),
	(30, 'Wallace Myem Aboiyar', '97599@iyogera.com', '$2y$10$lTMiX33JU5rhy3.t5Sv/iuWWl1wt/9wG2XiD1WlmGzo7SKQoqnNra', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar\r\nMq 9', '08067707813', NULL, '1020207600', 'others', NULL, 1, NULL, '2020-05-01 20:28:16', '2020-05-01 20:28:16'),
	(31, 'Ternam Wallace', '80046@iyogera.com', '$2y$10$cPYDpMDPYzEbwzcCq/EFqug0ju2TK8Trrvxe9KQhStAimcyARSNpG', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar\r\nMq 9', '08067707813', NULL, '1586386800', 'male', NULL, 1, NULL, '2020-05-14 12:04:49', '2020-05-14 12:04:49'),
	(32, 'Orduen Ortyo', '91487@iyogera.com', '$2y$10$.LzeCwNKNr74K9JElvbb2.ayX/ELPNRZp3mJkuOgFDrqg5G8Tz032', NULL, 'student', 'same as schoool', '08065448266', NULL, '1589670000', 'male', NULL, 8, NULL, '2020-05-17 09:00:26', '2020-05-17 09:00:26'),
	(33, 'Ternam', '81967@iyogera.com', '$2y$10$KKrTYGBF52jzwPyjbzCJjO/dz5H4F3gpDavy9FMnAgsP52DSc3YqG', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar', '08067707813', NULL, NULL, 'male', NULL, 1, NULL, '2020-05-19 23:13:11', '2020-05-19 23:13:11'),
	(34, 'Myem', '39673@iyogera.com', '$2y$10$RRhCN0othyIH155cGnvmh.i5bwtOTdrx.m/sac1D.9COovtwm50Nq', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar', '08067707813', NULL, NULL, 'others', NULL, 1, NULL, '2020-05-19 23:13:11', '2020-05-19 23:13:11'),
	(38, 'flight mode', '22221@iyogera.com', '$2y$10$Hy.EhvsCJOeeQbSgcv8e7en0NKQjwV4eBICswNdC0cKbkJkZtnOv.', NULL, 'student', 'No 9 opposite doctors quarters\' Mkar', '08067707813', NULL, '1497308400', 'others', NULL, 6, NULL, '2020-05-21 09:15:48', '2020-05-21 09:15:48'),
	(43, 'Agwaza Sonnen', '58436@iyogera.com', '$2y$10$ZOUqRTIjrx79zNuacFT0PuXq/Wdz6k9i2jErQrXHV2Rulf0qhOj96', NULL, 'student', 'Gboko', '09077778888', NULL, '957222000', 'male', NULL, 1, NULL, '2020-05-21 09:48:01', '2020-05-21 09:48:01'),
	(46, 'Wallace Aboiyar', 'wallacemyem@hotmail.com', '$2y$10$Y39rQ2vAwtL/RQuxuEbo1usnWe4uDfuE79ui33STc.A3Icy63jzTe', NULL, 'librarian', '9 Opposite Mkar Hospital Doctors Quarters Mkar\r\nMq 9', '+2348067707813', NULL, NULL, 'female', 'a+', 6, NULL, '2020-05-21 12:54:34', '2020-05-21 12:54:34'),
	(47, 'marketer here', '23968@iyogera.com', '$2y$10$YxiwnDHs8t.CLbcmj04QcuXayqfIKSURWRnR1ZfRyY6eVrYUQj3sK', NULL, 'student', 'DadaGonoyi Crescent', '08068256917', NULL, NULL, 'male', NULL, 6, NULL, '2020-05-21 16:53:07', '2020-05-21 16:53:07'),
	(48, 'De Mode', '60329@iyogera.com', '$2y$10$DZV/1HFNWBkr/.icO07m7OFCXiglsbHaECmIXCpGJQPVHqDFuGMRW', NULL, 'student', 'DadaGonoyi Crescent', '08068256917', NULL, NULL, 'male', NULL, 6, NULL, '2020-05-21 16:53:07', '2020-05-21 16:53:07'),
	(49, 'Precious Audu', '88354@iyogera.com', '$2y$10$FidbaQWtsU8DcOn9RLsag.kU.CL.ZhoOZU0T35u44dEWCfP5k7VOi', NULL, 'student', 'DadaGonoyi Crescent', '08068256917', NULL, NULL, 'female', NULL, 6, NULL, '2020-05-21 16:53:07', '2020-05-21 16:53:07'),
	(51, 'Az', 'az@iyogera.com', '$2y$10$K3NymfdZTnw4H1OypvVYHOFD77Dn262g4RYGY0Mw/4Q43jQ82SikW', NULL, 'superadmin', 'That home at Maitama', '09056987125', NULL, NULL, 'other', NULL, 13, NULL, '2020-05-25 11:41:14', '2020-05-25 11:41:14'),
	(52, 'Soonenter Aboiyar', '05370@iyogera.com', '$2y$10$9rFb84EakbqDZGyw3w9iyOOD0OZpsPl7YvGkmceKT5H9TzjjyL2u2', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9\r\nMq 9', NULL, NULL, '1590534000', 'male', NULL, 6, NULL, '2020-05-27 16:51:37', '2020-05-27 16:51:37'),
	(53, 'Soonenter Aboiyar', '01820@iyogera.com', '$2y$10$4x45.W9/tq58e6PRqnwp4usF.uu.IvZlgFVCJpXGzTx9MaJ4WBcI2', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9\r\nMq 9', NULL, NULL, '1590534000', 'male', NULL, 6, NULL, '2020-05-27 16:56:06', '2020-05-27 16:56:06'),
	(54, 'Soonenter Aboiyar', '68219@iyogera.com', '$2y$10$/TsVGii2/5oIKsu05Rh0pOF0O7Zm29UVh/ztOCD31PYkMt2Za4I6O', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9\r\nMq 9', '07088550832', NULL, '1590620400', 'female', NULL, 1, NULL, '2020-05-28 08:49:29', '2020-05-28 08:49:29'),
	(55, 'Soonenter Aboiyar', '90409@iyogera.com', '$2y$10$LS0hH8kXOw/go68bH9wH6ukmfutAoE8DyhH9gkBXQvmzGzJEHhaqi', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9\r\nMq 9', '07088550832', NULL, '1590620400', 'female', NULL, 1, NULL, '2020-05-28 08:51:33', '2020-05-28 08:51:33'),
	(56, 'Soonenter Aboiyar', '57477@iyogera.com', '$2y$10$zC8b9zzRmi8qoQLMbbf/EuXaIgUuX7bn1us7x9O9RnzCwm9UtuMwi', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9\r\nMq 9', '07088550832', NULL, '1590620400', 'female', NULL, 1, NULL, '2020-05-28 08:57:14', '2020-05-28 08:57:14'),
	(58, 'Soonenter Aboiyar', '86431@iyogera.com', '$2y$10$o/1RdSNIDQb3aL5xIySJ4e6e0YjarW5SMBJ2FoxLrzkN87wf45H7i', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9\r\nMq 9', '+2348067707813', NULL, '1590620400', 'male', NULL, 1, NULL, '2020-05-28 09:31:38', '2020-05-28 09:31:38'),
	(59, 'Soonenter Aboiyar', '98565@iyogera.com', '$2y$10$wgoPJW1N3/CME9n9WSGnHOPQf8wzWs2Qja9QmuuBji2vsH2tyTCru', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9\r\nMq 9', '+2348067707813', NULL, '1590620400', 'male', NULL, 1, NULL, '2020-05-28 09:33:07', '2020-05-28 09:33:07'),
	(60, 'Soonenter Aboiyar', '13450@iyogera.com', '$2y$10$x39oU0O7ULZBEvB3uYAI6e7ZoYye0hCmGeMotrtCKWh.wkMZCUyWu', NULL, 'student', '9 Opposite Mkar Hospital Doctors Quarters Mkar, Mq 9\r\nMq 9', '+2348067707813', NULL, '1590620400', 'male', NULL, 1, NULL, '2020-05-28 09:33:24', '2020-05-28 09:33:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
