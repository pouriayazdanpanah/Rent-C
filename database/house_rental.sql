-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 10:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `formatted_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `neighbourhood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int(11) NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `product_id`, `formatted_address`, `route_name`, `neighbourhood`, `city`, `state`, `municipality_zone`, `place`, `zip_code`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(5, 5, 'استان تهران، تهران، شهرک صدرا، بلوار آفتاب22، آسمان هفتم', NULL, NULL, 'تهران', 'تهران', '3', NULL, 123456789, '35.72993832', '51.25638374', '2021-02-14 09:03:26', '2021-02-14 09:03:26'),
(6, 6, 'استان اصفهان، اصفهان، چهارباغ پایین، شهید منصور بانکی', NULL, NULL, 'اصفهان', 'اصفهان', '2', NULL, 123456789, '32.66703050', '51.67074549', '2021-02-14 09:20:29', '2021-02-14 09:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `bed_infos`
--

CREATE TABLE `bed_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type_of_bed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_bed` int(11) NOT NULL,
  `number_of_guests` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bed_infos`
--

INSERT INTO `bed_infos` (`id`, `product_id`, `type_of_bed`, `number_of_bed`, `number_of_guests`, `created_at`, `updated_at`) VALUES
(10, 5, 'Normal', 1, 2, '2021-02-14 09:02:17', '2021-02-14 09:02:17'),
(11, 5, 'King', 1, 1, '2021-02-14 09:02:17', '2021-02-14 09:02:17'),
(12, 5, 'Queen', 2, 0, '2021-02-14 09:02:17', '2021-02-14 09:02:17'),
(15, 6, 'Normal', 0, 2, '2021-02-14 11:07:41', '2021-02-14 11:07:41'),
(16, 6, 'Normal', 1, 2, '2021-02-14 11:07:42', '2021-02-14 11:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `booking_data`
--

CREATE TABLE `booking_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `arrived_at` date NOT NULL,
  `departed_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_data`
--

INSERT INTO `booking_data` (`id`, `product_id`, `arrived_at`, `departed_at`, `created_at`, `updated_at`) VALUES
(6, 5, '2021-04-06', '2021-04-30', '2021-02-14 11:06:52', '2021-04-06 08:03:15'),
(7, 6, '2021-02-01', '2021-03-27', '2021-02-14 11:07:13', '2021-02-14 11:07:13'),
(9, 5, '2021-04-06', '2021-04-30', '2021-02-14 12:12:56', '2021-04-06 08:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_of_use` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `count_of_use`, `created_at`, `updated_at`) VALUES
(1, 'Modern', 24, '2021-02-12 22:13:05', '2021-12-26 22:59:21'),
(2, 'Villa', 23, '2021-02-12 22:13:13', '2022-01-15 10:37:35'),
(3, 'Apartment', 26, '2021-02-12 22:13:25', '2022-01-15 10:32:01'),
(4, 'Historic', 6, '2021-02-12 22:13:43', '2021-11-17 20:43:03'),
(5, 'Eureka Springs', 0, '2021-02-12 22:15:02', '2021-02-12 22:15:02'),
(6, 'Fayetteville', 0, '2021-02-12 22:15:21', '2021-02-12 22:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_id` int(11) NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `commentable_id`, `commentable_type`, `parent_id`, `approved`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'App\\Product', 0, 1, '<p>this is grate<br></p>', '2021-02-14 10:23:21', '2021-02-14 10:23:35'),
(5, 5, 5, 'App\\Product', 0, 1, '<p>hhhh</p>', '2021-11-17 20:47:29', '2022-01-15 10:36:00'),
(6, 3, 5, 'App\\Product', 0, 1, '<p>this is test<br></p>', '2022-01-15 10:32:53', '2022-01-15 10:36:04'),
(7, 5, 5, 'App\\Product', 6, 1, '<p>hello<br></p>', '2022-01-15 10:37:55', '2022-01-15 10:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'database', 'default', '{\"uuid\":\"a8e254ae-5776-48cf-a92c-675d667c0ff0\",\"displayName\":\"App\\\\Notifications\\\\ContactHost\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:2;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:29:\\\"App\\\\Notifications\\\\ContactHost\\\":15:{s:11:\\\"sender_name\\\";s:18:\\\"pouria cqflooring \\\";s:4:\\\"user\\\";s:18:\\\"pouria cqflooring \\\";s:5:\\\"phone\\\";N;s:10:\\\"from_phone\\\";s:11:\\\"09137432230\\\";s:7:\\\"message\\\";s:46:\\\"\\u0627\\u06cc\\u0646 \\u062e\\u0627\\u0646\\u0647 \\u0686\\u0647 \\u0627\\u0645\\u06a9\\u0627\\u0646\\u0627\\u062a\\u06cc \\u062f\\u0627\\u0631\\u062f\\\";s:12:\\\"company_name\\\";s:9:\\\"Rentberry\\\";s:2:\\\"id\\\";s:36:\\\"417988dc-78db-4797-90bb-65c783aabe6e\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:42:\\\"App\\\\Notifications\\\\Channels\\\\GhasedakChannel\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Ghasedak\\Exceptions\\ApiException: [\"receptor is required\"] in E:\\Laravel_projects\\Home_rental\\vendor\\ghasedak\\php\\src\\GhasedakApi.php:65\nStack trace:\n#0 E:\\Laravel_projects\\Home_rental\\vendor\\ghasedak\\php\\src\\GhasedakApi.php(81): Ghasedak\\GhasedakApi->runCurl(\'sms/send/simple\', Array, \'POST\')\n#1 E:\\Laravel_projects\\Home_rental\\app\\Notifications\\Channels\\GhasedakChannel.php(20): Ghasedak\\GhasedakApi->SendSimple(NULL, \'Hi pouria cqflo...\', \'10008566\')\n#2 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(148): App\\Notifications\\Channels\\GhasedakChannel->send(Object(App\\User), Object(App\\Notifications\\ContactHost))\n#3 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(106): Illuminate\\Notifications\\NotificationSender->sendToNotifiable(Object(App\\User), \'120b947c-9c48-4...\', Object(App\\Notifications\\ContactHost), \'App\\\\Notificatio...\')\n#4 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#5 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(109): Illuminate\\Notifications\\NotificationSender->withLocale(NULL, Object(Closure))\n#6 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\ContactHost), Array)\n#7 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\SendQueuedNotifications.php(94): Illuminate\\Notifications\\ChannelManager->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\ContactHost), Array)\n#8 [internal function]: Illuminate\\Notifications\\SendQueuedNotifications->handle(Object(Illuminate\\Notifications\\ChannelManager))\n#9 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): call_user_func_array(Array, Array)\n#10 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#11 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#12 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(39): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#13 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#14 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#15 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#16 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#17 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Notifications\\SendQueuedNotifications), false)\n#19 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#20 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#21 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#22 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#23 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#24 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#25 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#26 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#28 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#29 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#30 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): call_user_func_array(Array, Array)\n#31 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#32 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#33 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(39): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#34 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#35 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#36 E:\\Laravel_projects\\Home_rental\\vendor\\symfony\\console\\Command\\Command.php(258): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#37 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#38 E:\\Laravel_projects\\Home_rental\\vendor\\symfony\\console\\Application.php(920): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 E:\\Laravel_projects\\Home_rental\\vendor\\symfony\\console\\Application.php(266): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 E:\\Laravel_projects\\Home_rental\\vendor\\symfony\\console\\Application.php(142): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 E:\\Laravel_projects\\Home_rental\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 {main}', '2021-02-14 11:09:08'),
(2, 'database', 'default', '{\"uuid\":\"be1aad5a-a96f-404e-8c47-ae59c8a96980\",\"displayName\":\"App\\\\Notifications\\\\UniqueCode\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";a:1:{i:0;i:2;}s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:28:\\\"App\\\\Notifications\\\\UniqueCode\\\":11:{s:4:\\\"code\\\";i:870849;s:5:\\\"phone\\\";s:11:\\\"09137432230\\\";s:2:\\\"id\\\";s:36:\\\"1f83d8c5-fd05-4621-8d12-d4d7b8f63330\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:42:\\\"App\\\\Notifications\\\\Channels\\\\GhasedakChannel\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Ghasedak\\Exceptions\\ApiException: the selected line number has the send restriction in E:\\Laravel_projects\\Home_rental\\vendor\\ghasedak\\php\\src\\GhasedakApi.php:65\nStack trace:\n#0 E:\\Laravel_projects\\Home_rental\\vendor\\ghasedak\\php\\src\\GhasedakApi.php(81): Ghasedak\\GhasedakApi->runCurl(\'sms/send/simple\', Array, \'POST\')\n#1 E:\\Laravel_projects\\Home_rental\\app\\Notifications\\Channels\\GhasedakChannel.php(20): Ghasedak\\GhasedakApi->SendSimple(\'09137432230\', \'870849 is your ...\', \'10008566\')\n#2 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(148): App\\Notifications\\Channels\\GhasedakChannel->send(Object(App\\User), Object(App\\Notifications\\UniqueCode))\n#3 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(106): Illuminate\\Notifications\\NotificationSender->sendToNotifiable(Object(App\\User), \'8a3a68e4-3b04-4...\', Object(App\\Notifications\\UniqueCode), \'App\\\\Notificatio...\')\n#4 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Notifications\\NotificationSender->Illuminate\\Notifications\\{closure}()\n#5 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\NotificationSender.php(109): Illuminate\\Notifications\\NotificationSender->withLocale(NULL, Object(Closure))\n#6 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\ChannelManager.php(54): Illuminate\\Notifications\\NotificationSender->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\UniqueCode), Array)\n#7 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Notifications\\SendQueuedNotifications.php(94): Illuminate\\Notifications\\ChannelManager->sendNow(Object(Illuminate\\Database\\Eloquent\\Collection), Object(App\\Notifications\\UniqueCode), Array)\n#8 [internal function]: Illuminate\\Notifications\\SendQueuedNotifications->handle(Object(Illuminate\\Notifications\\ChannelManager))\n#9 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): call_user_func_array(Array, Array)\n#10 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#11 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#12 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(39): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#13 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#14 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#15 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#16 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#17 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#18 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Notifications\\SendQueuedNotifications), false)\n#19 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#20 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#21 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#22 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Notifications\\SendQueuedNotifications))\n#23 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#24 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#25 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#26 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#27 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#28 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#29 [internal function]: Illuminate\\Queue\\Console\\WorkCommand->handle()\n#30 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): call_user_func_array(Array, Array)\n#31 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#32 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(95): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#33 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(39): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#34 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#35 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#36 E:\\Laravel_projects\\Home_rental\\vendor\\symfony\\console\\Command\\Command.php(258): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#37 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#38 E:\\Laravel_projects\\Home_rental\\vendor\\symfony\\console\\Application.php(920): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#39 E:\\Laravel_projects\\Home_rental\\vendor\\symfony\\console\\Application.php(266): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 E:\\Laravel_projects\\Home_rental\\vendor\\symfony\\console\\Application.php(142): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 E:\\Laravel_projects\\Home_rental\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 E:\\Laravel_projects\\Home_rental\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 {main}', '2021-04-06 08:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `favoriteable_id` int(11) NOT NULL,
  `favoriteable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favorite` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `favoriteable_id`, `favoriteable_type`, `favorite`, `created_at`, `updated_at`) VALUES
(12, 4, 1, 'App\\Product', 1, '2021-05-04 18:10:46', '2021-05-04 18:10:46'),
(15, 5, 5, 'App\\Product', 1, '2021-11-17 20:57:25', '2021-11-17 20:57:25'),
(16, 3, 6, 'App\\Product', 1, '2021-12-13 19:34:15', '2021-12-13 19:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_of_used` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `count_of_used`, `created_at`, `updated_at`) VALUES
(1, 'Hair dryer', 57, '2021-02-12 22:08:35', '2022-01-15 10:37:38'),
(2, 'Washer', 46, '2021-02-12 22:08:46', '2022-01-15 10:32:09'),
(3, 'Bed linens', 62, '2021-02-12 22:08:55', '2022-01-15 10:37:38'),
(4, 'Iron', 67, '2021-02-12 22:09:04', '2022-01-15 10:37:38'),
(5, 'Dryer', 48, '2021-02-12 22:09:14', '2022-01-15 10:32:09'),
(6, 'Ethernet connection', 51, '2021-02-12 22:09:29', '2022-01-15 10:37:38'),
(7, 'TV', 39, '2021-02-12 22:09:36', '2021-12-13 19:31:06'),
(8, 'Indoor fireplace', 24, '2021-02-12 22:09:50', '2021-12-13 19:31:06'),
(9, 'Heating', 28, '2021-02-12 22:09:57', '2021-12-13 19:29:23'),
(10, 'Air conditioning', 28, '2021-02-12 22:10:05', '2021-12-13 19:31:06'),
(11, 'Carbon monoxide alarm', 21, '2021-02-12 22:10:19', '2022-01-15 10:32:09'),
(12, 'Fire extinguisher', 21, '2021-02-12 22:10:28', '2022-01-15 10:32:09'),
(13, 'Microwave', 50, '2021-02-12 22:10:43', '2022-01-15 10:37:38'),
(14, 'Dishes and silverware', 22, '2021-02-12 22:10:51', '2022-01-15 10:32:10'),
(15, 'Dishwasher', 33, '2021-02-12 22:11:00', '2022-01-15 10:37:38'),
(16, 'Refrigerator', 24, '2021-02-12 22:11:11', '2022-01-15 10:37:38'),
(17, 'Gym', 7, '2021-02-12 22:11:23', '2021-11-17 20:54:12'),
(18, 'Wifi', 31, '2021-02-12 22:11:42', '2022-01-15 10:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `feature_product`
--

CREATE TABLE `feature_product` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_product`
--

INSERT INTO `feature_product` (`product_id`, `feature_id`) VALUES
(5, 1),
(5, 2),
(5, 7),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 16),
(5, 17),
(5, 18),
(6, 1),
(6, 2),
(6, 3),
(6, 5),
(6, 7),
(6, 9),
(6, 10),
(6, 12),
(6, 13),
(6, 15),
(6, 18);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `cleaning_fee` double(8,3) NOT NULL DEFAULT 1.000,
  `city_fee` double(8,3) NOT NULL DEFAULT 1.000,
  `security_deposit` double(8,3) NOT NULL DEFAULT 1.000,
  `service_fees` double(8,3) NOT NULL DEFAULT 1.000,
  `guest_fee` int(11) NOT NULL DEFAULT 1,
  `taxes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `product_id`, `cleaning_fee`, `city_fee`, `security_deposit`, `service_fees`, `guest_fee`, `taxes`, `created_at`, `updated_at`) VALUES
(5, 5, 10.000, 13.000, 1.000, 1.000, 1, 1, '2021-02-14 08:57:29', '2021-02-14 08:57:29'),
(6, 6, 10.000, 10.000, 1.000, 1.000, 1, 1, '2021-02-14 09:18:51', '2021-02-14 09:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `imageable_id`, `imageable_type`, `url`, `type`, `size`, `created_at`, `updated_at`) VALUES
(3, 1, 'App\\Product', '/img/host/listing/1/image-cover/Stylish one bedroom by the golf course.jpg', 'jpg', 60286, '2021-02-13 06:23:28', '2021-02-13 06:23:28'),
(5, 1, 'App\\Product', '/img/host/listing/1/image-gallery/Stylish one bedroom by the golf course-32-4-750x500.jpg', 'jpg', 93651, '2021-02-13 06:23:46', '2021-02-13 06:23:46'),
(8, 2, 'App\\Product', '/img/host/listing/1/image-cover/Modern Apartment With Pool.jpg', 'jpg', 1357293, '2021-02-13 21:08:40', '2021-02-13 21:08:40'),
(9, 2, 'App\\Product', '/img/host/listing/1/image-gallery/Modern Apartment With Pool-1.jpg', 'jpg', 140362, '2021-02-13 21:08:48', '2021-02-13 21:08:48'),
(10, 2, 'App\\Product', '/img/host/listing/1/image-gallery/Modern Apartment With Pool-13-12-1140x760 (1).jpg', 'jpg', 119743, '2021-02-13 21:08:57', '2021-02-13 21:08:57'),
(11, 2, 'App\\Product', '/img/host/listing/1/image-gallery/Modern Apartment With Pool-16-4-1140x760.jpg', 'jpg', 135556, '2021-02-13 21:09:03', '2021-02-13 21:09:03'),
(12, 2, 'App\\Product', '/img/host/listing/1/image-gallery/Modern Apartment With Pool-15-2-1140x760.jpg', 'jpg', 115852, '2021-02-13 21:09:14', '2021-02-13 21:09:14'),
(13, 2, 'App\\Product', '/img/host/listing/1/image-gallery/Modern Apartment With Pool-01-3.jpg', 'jpg', 262354, '2021-02-13 21:09:25', '2021-02-13 21:09:25'),
(14, 3, 'App\\Product', '/img/host/listing/1/image-cover/Spacious Family Home.jpg', 'jpg', 213767, '2021-02-14 07:34:54', '2021-02-14 07:34:54'),
(15, 3, 'App\\Product', '/img/host/listing/1/image-gallery/Spacious Family Home-33-3.jpg', 'jpg', 186322, '2021-02-14 07:35:01', '2021-02-14 07:35:01'),
(16, 3, 'App\\Product', '/img/host/listing/1/image-gallery/Spacious Family Home-32-1-750x500.jpg', 'jpg', 60286, '2021-02-14 07:35:08', '2021-02-14 07:35:08'),
(17, 3, 'App\\Product', '/img/host/listing/1/image-gallery/Spacious Family Home-31.jpg', 'jpg', 248236, '2021-02-14 07:35:15', '2021-02-14 07:35:15'),
(18, 3, 'App\\Product', '/img/host/listing/1/image-gallery/Spacious Family Home-32-5-750x500.jpg', 'jpg', 61261, '2021-02-14 07:35:24', '2021-02-14 07:35:24'),
(19, 3, 'App\\Product', '/img/host/listing/1/image-gallery/Spacious Family Home-40-11.jpg', 'jpg', 248667, '2021-02-14 07:35:35', '2021-02-14 07:35:35'),
(20, 4, 'App\\Product', '/img/host/listing/1/image-cover/Moder Lake View Family Home.jpg', 'jpg', 125581, '2021-02-14 07:43:24', '2021-02-14 07:43:24'),
(21, 4, 'App\\Product', '/img/host/listing/1/image-gallery/Moder Lake View Family Home-00_bathroom-2.jpg', 'jpg', 159475, '2021-02-14 07:43:31', '2021-02-14 07:43:31'),
(22, 4, 'App\\Product', '/img/host/listing/1/image-gallery/Moder Lake View Family Home-18.jpg', 'jpg', 309244, '2021-02-14 07:43:40', '2021-02-14 07:43:40'),
(23, 4, 'App\\Product', '/img/host/listing/1/image-gallery/Moder Lake View Family Home-13-12-1140x760.jpg', 'jpg', 119743, '2021-02-14 07:43:46', '2021-02-14 07:43:46'),
(24, 4, 'App\\Product', '/img/host/listing/1/image-gallery/Moder Lake View Family Home-01-3.jpg', 'jpg', 262354, '2021-02-14 07:43:56', '2021-02-14 07:43:56'),
(25, 4, 'App\\Product', '/img/host/listing/1/image-gallery/Moder Lake View Family Home-32-5-750x500.jpg', 'jpg', 61261, '2021-02-14 07:44:07', '2021-02-14 07:44:07'),
(27, 5, 'App\\Product', '/img/host/listing/2/image-cover/Designer Apartment With Pool.jpg', 'jpg', 319304, '2021-02-14 09:04:35', '2021-02-14 09:04:35'),
(28, 5, 'App\\Product', '/img/host/listing/2/image-gallery/Designer Apartment With Pool-13-8-1140x760.jpg', 'jpg', 125581, '2021-02-14 09:04:45', '2021-02-14 09:04:45'),
(29, 5, 'App\\Product', '/img/host/listing/2/image-gallery/Designer Apartment With Pool-13-12-1140x760.jpg', 'jpg', 119743, '2021-02-14 09:04:51', '2021-02-14 09:04:51'),
(30, 5, 'App\\Product', '/img/host/listing/2/image-gallery/Designer Apartment With Pool-10-1.jpg', 'jpg', 1258332, '2021-02-14 09:04:56', '2021-02-14 09:04:56'),
(31, 5, 'App\\Product', '/img/host/listing/2/image-gallery/Designer Apartment With Pool-15-2-1140x760.jpg', 'jpg', 115852, '2021-02-14 09:05:02', '2021-02-14 09:05:02'),
(32, 5, 'App\\Product', '/img/host/listing/2/image-gallery/Designer Apartment With Pool-00_bathroom-2.jpg', 'jpg', 159475, '2021-02-14 09:05:10', '2021-02-14 09:05:10'),
(33, 6, 'App\\Product', '/img/host/listing/2/image-cover/Large And Modern Bedroom.jpg', 'jpg', 213767, '2021-02-14 09:20:39', '2021-02-14 09:20:39'),
(34, 6, 'App\\Product', '/img/host/listing/2/image-gallery/Large And Modern Bedroom-10-1.jpg', 'jpg', 1258332, '2021-02-14 09:20:56', '2021-02-14 09:20:56'),
(35, 6, 'App\\Product', '/img/host/listing/2/image-gallery/Large And Modern Bedroom-01-3.jpg', 'jpg', 262354, '2021-02-14 09:21:01', '2021-02-14 09:21:01'),
(36, 6, 'App\\Product', '/img/host/listing/2/image-gallery/Large And Modern Bedroom-1.jpg', 'jpg', 140362, '2021-02-14 09:21:06', '2021-02-14 09:21:06'),
(37, 6, 'App\\Product', '/img/host/listing/2/image-gallery/Large And Modern Bedroom-00_bathroom-2.jpg', 'jpg', 159475, '2021-02-14 09:21:11', '2021-02-14 09:21:11'),
(38, 6, 'App\\Product', '/img/host/listing/2/image-gallery/Large And Modern Bedroom-16-5.jpg', 'jpg', 452285, '2021-02-14 09:21:16', '2021-02-14 09:21:16'),
(39, 1, 'App\\Product', '/img/host/listing/1/image-gallery/Stylish one bedroom by the golf course-32-2-750x500.jpg', 'jpg', 56393, '2021-02-14 12:29:44', '2021-02-14 12:29:44'),
(41, 1, 'App\\Product', '/img/host/listing/1/image-gallery/Stylish one bedroom by the golf course-28-1-1140x760 (1).jpg', 'jpg', 166848, '2021-02-14 12:29:57', '2021-02-14 12:29:57'),
(43, 1, 'App\\User', '/img/users/1/Pouria-Yazdanpanah.jpg', 'jpg', 103339, '2021-03-14 19:24:22', '2021-03-14 19:24:22'),
(46, 1, 'App\\Product', '/img/host/listing/1/image-gallery/Stylish one bedroom by the golf course-13960913174730546126900910.jpg', 'jpg', 113918, '2021-05-04 18:22:27', '2021-05-04 18:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_08_19_000000_create_failed_jobs_table', 1),
(25, '2020_09_08_184108_create_unique_codes_table', 1),
(26, '2020_09_22_113815_create_jobs_table', 1),
(27, '2020_11_07_000857_create_comments_table', 1),
(28, '2020_11_20_010414_create_images_table', 1),
(29, '2020_11_20_010554_create_permissions_roles_table', 1),
(30, '2020_11_20_010832_create_products_features_table', 1),
(31, '2020_11_20_011030_create_addresses_table', 1),
(32, '2020_12_13_183747_create_categories_table', 1),
(33, '2020_12_25_001253_create_booking_data_table', 1),
(34, '2020_12_27_202642_create_bed_infos_table', 1),
(35, '2021_01_09_215652_create_fees_table', 1),
(36, '2021_01_14_015120_create_favorites_table', 1),
(37, '2021_01_25_210220_create_sessions_table', 1),
(38, '2021_01_29_202537_create_property_weights_table', 1),
(39, '2021_01_29_202600_create_static_options_table', 1),
(40, '2021_01_31_004318_add_zip_code_field_to_table', 1),
(41, '2021_02_01_190055_create_registration_levels_table', 1),
(42, '2021_02_03_115924_create_messages_table', 1),
(44, '2021_02_13_003748_create_reservations_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(9, 'delete-user', 'this permission for delete user', '2020-10-13 04:10:19', '2020-10-13 04:10:19'),
(10, 'edit-user', 'this permission access to edit all user', '2020-10-13 04:14:21', '2020-10-15 05:22:30'),
(11, 'show-user', 'this permission access seen all user list', '2020-10-13 04:15:08', '2020-10-13 04:15:08'),
(12, 'create-user', 'this permission access to create an user', '2020-10-13 04:16:02', '2020-10-13 04:16:02'),
(13, 'show-admin', 'this permission access to show admin user in user list', '2020-10-13 04:18:37', '2020-10-13 04:18:37'),
(14, 'access-control', 'this permission allow to access control panel for user', '2020-10-13 04:40:06', '2020-10-15 05:24:03'),
(15, 'access-user', 'this permission allow to user can see user list and create a new user', '2020-10-15 05:58:01', '2020-10-15 05:58:01'),
(16, 'create-permissions', 'this permission allow to access create new permissions', '2020-10-20 04:08:06', '2020-10-20 04:08:06'),
(17, 'create-roles', 'this permission allow access to create new roles', '2020-10-20 04:08:53', '2020-10-20 04:08:53'),
(18, 'show-permissions', 'this permission allow to show all permissions', '2020-10-20 04:09:54', '2020-10-20 04:09:54'),
(19, 'show-roles', 'this permission allow to show all roles', '2020-10-20 04:10:41', '2020-10-20 04:10:41'),
(20, 'edit-permissions', 'this permission allow to edit permissions', '2020-10-20 04:11:52', '2020-10-20 04:28:22'),
(21, 'edit-roles', 'this permission allow to edit all roles', '2020-10-20 04:12:44', '2020-10-20 04:28:33'),
(22, 'delete-permissions', 'this permission  allow to delete all permissions', '2020-10-20 04:26:34', '2020-10-20 04:28:48'),
(23, 'delete-roles', 'this permission allow to delete all roles', '2020-10-20 04:28:09', '2020-10-20 04:28:09'),
(24, 'access-comment', 'manage comment', '2021-02-14 13:54:26', '2021-02-14 13:54:26'),
(25, 'access-listing', 'manage-listing', '2021-02-14 13:54:54', '2021-02-14 13:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(9, 6),
(10, 6),
(11, 5),
(11, 6),
(12, 6),
(13, 6),
(14, 6),
(15, 6),
(15, 7),
(16, 6),
(16, 7),
(17, 6),
(17, 7),
(18, 5),
(18, 6),
(18, 7),
(19, 5),
(19, 6),
(19, 7),
(20, 6),
(20, 7),
(21, 6),
(21, 7),
(22, 6),
(22, 7),
(23, 6),
(23, 7);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`) VALUES
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(52) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(57) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_bed` int(11) NOT NULL,
  `number_of_room` int(11) NOT NULL,
  `number_of_bathroom` int(11) NOT NULL,
  `number_of_guest` int(11) NOT NULL,
  `sqft` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventory` int(11) NOT NULL DEFAULT 0,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `image_cover` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `title`, `slug`, `categories`, `price`, `price_label`, `description`, `number_of_bed`, `number_of_room`, `number_of_bathroom`, `number_of_guest`, `sqft`, `inventory`, `view_count`, `approved`, `features`, `image_cover`, `created_at`, `updated_at`) VALUES
(5, 2, 'Designer Apartment With Pool', 'designer-apartment-with-pool', 'Apartment', '342', 'night', '<p>Enter your description of your home</p>', 4, 3, 1, 3, '300 M', 0, 42, 1, '{\"Hair dryer\":1,\"Washer\":1,\"Bed linens\":0,\"Iron\":0,\"Dryer\":0,\"Ethernet connection\":0,\"TV\":1,\"Indoor fireplace\":0,\"Heating\":1,\"Air conditioning\":1,\"Carbon monoxide alarm\":1,\"Fire extinguisher\":1,\"Microwave\":1,\"Dishes and silverware\":0,\"Dishwasher\":0,\"Refrigerator\":1,\"Gym\":1,\"Wifi\":1}', 27, '2021-02-14 08:56:03', '2022-01-15 10:38:10'),
(6, 2, 'Large And Modern Bedroom', 'large-and-modern-bedroom', 'Modern', '270', 'night', '<p><strong>Lorem ipsum</strong> dolor sit amet, consectetur adipiscing elit. Morbi est quam, volutpat et arcu eu, pharetra congue augue. Integer vel nibh eu eros interdum commodo. Vivamus finibus fringilla libero, id consectetur purus sollicitudin vel. Proin dapibus ante et pharetra luctus. Ut lacinia ante ut nunc pellentesque auctor. Proin laoreet erat sed ornare molestie. Fusce vehicula ut nulla facilisis vulputate. Quisque vel purus ac lectus tempus viverra. Maecenas at sem at erat pellentesque hendrerit nec in massa. Vestibulum nec lacinia dui, a congue ex. Vivamus ac ultricies mauris. Suspendisse commodo tempus suscipit. Nunc malesuada eu tortor in hendrerit</p>', 2, 2, 3, 1, '130 M', 0, 21, 1, '{\"Hair dryer\":1,\"Washer\":1,\"Bed linens\":1,\"Iron\":0,\"Dryer\":1,\"Ethernet connection\":0,\"TV\":1,\"Indoor fireplace\":0,\"Heating\":1,\"Air conditioning\":1,\"Carbon monoxide alarm\":0,\"Fire extinguisher\":1,\"Microwave\":1,\"Dishes and silverware\":0,\"Dishwasher\":1,\"Refrigerator\":0,\"Gym\":0,\"Wifi\":1}', 33, '2021-02-14 09:18:18', '2021-12-13 19:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_reservation`
--

CREATE TABLE `product_reservation` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_weights`
--

CREATE TABLE `property_weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_weight` int(11) NOT NULL DEFAULT 1,
  `property_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_weights`
--

INSERT INTO `property_weights` (`id`, `property_name`, `property_weight`, `property_level`, `created_at`, `updated_at`) VALUES
(1, 'price', 1, 'normal', NULL, '2021-02-19 09:08:53'),
(2, 'feature', 1, 'normal', NULL, '2021-02-19 09:08:53'),
(3, 'category', 1, 'normal', NULL, '2021-02-19 09:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `registration_levels`
--

CREATE TABLE `registration_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `registration_level` int(11) NOT NULL DEFAULT 0,
  `passed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration_levels`
--

INSERT INTO `registration_levels` (`id`, `product_id`, `registration_level`, `passed`, `created_at`, `updated_at`) VALUES
(5, 5, 5, 1, '2021-02-14 08:56:03', '2021-02-14 09:05:12'),
(6, 6, 5, 1, '2021-02-14 09:18:18', '2021-02-14 09:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `arrived_at` date NOT NULL,
  `departed_at` date NOT NULL,
  `guests` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `arrived_at`, `departed_at`, `guests`, `total_price`, `created_at`, `updated_at`) VALUES
(5, 2, '2021-02-16', '2021-02-20', 1, 1866, '2021-02-14 06:52:14', '2021-02-14 06:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(5, 'staff', 'this role just access to show-user permission', '2020-10-13 04:23:26', '2020-10-13 04:23:26'),
(6, 'Super admin', 'this role access to all permission', '2020-10-15 05:05:21', '2020-10-15 05:05:21'),
(7, 'ACL', 'this role is access to control list', '2020-10-20 04:31:49', '2020-10-20 04:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3DtcHZRuTpmqoBDgDmy7hIN50w3fhgZIXcw8KCXl', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.10 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiejBDTnBGUkhPdHZEV3M1VFU4amx1SFgybmNSQnR6MDFMcDl6bXdhbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY1OiJodHRwOi8vbG9jYWxob3N0OjgwMDEvcHJvZHVjdHM/Y2F0ZWdvcmllcz0xJmZlYXR1cmVzJTVCMCU1RD1IYWlyJTIwZHJ5ZXIlMkMxJmZlYXR1cmVzJTVCMSU1RD1CZWQlMjBsaW5lbnMlMkMzJmxhdD0zNS42MTYxMzAyODM2MTc0MiZsbmc9NTEuNDE3MTU1MTE1Njg4NDE2JnByaWNlPTQwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjI2OiJodHRwOi8vbG9jYWxob3N0OjgwMDEvaG9tZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1640559565),
('dJwtu1oLqNEcYL42uTqOIzXm2GABxIZipF4yjJom', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.10 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWHZZSU5raE81QzBuVEw2bk5xRDdiVGN1eGxLbXE5UENhREZ3cXBUayI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdDo4MDAxL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1639902224),
('gU05PjBnHhee44gPSGbhMUhzOvOdcX4jiJhaycFS', 3, '192.168.43.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVFNyNW43cDh2TjVKNWVrV05lR3lOM3dxRWZRQ2RudGFyY1Z3RnJnZSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovLzE5Mi4xNjguNDMuMTYzOjgwMDEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1639423670),
('Ima070cteQNBrtxOSJVtCQzWEPxSw4Am3PQCTdf1', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNHlpZkt4TVU4ZXJubkZUV29jVEVkUTZyWXN1WEVUbVV6RHhwQjJaaiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1ODoiaHR0cDovL2xvY2FsaG9zdDo4MDAxL3Byb2R1Y3QvZGVzaWduZXItYXBhcnRtZW50LXdpdGgtcG9vbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTE6InN3ZWV0X2FsZXJ0IjthOjA6e319', 1642243090),
('omiUAnXPo1APS51FvplAAzlp9XFPHdtmN7TKiZCL', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4750.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWkZUM3VHWmtPdWJiTUlOQ0wxZUZMcWZtNUN1MXdTUkVnd3VHVFpNYiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdDo4MDAxL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1639423703),
('RPBOKT7j1foNNfJUNSzDxETdjekaI36PmmZoRzLy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDB5aFpsTXR5bGhpdnFMRHZQcjBXTWU1OWRjbVJvbWo5UnhrRXoyNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1639906522),
('UWabRYZyETpH333sx65MpPF1q43vTFvF2JWwbcnf', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoickg3OTlWaVdpbmtFQ0ZJeW9aNzFQSDZqR0xMbXVyOU9nRjRldjVlSyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdDo4MDAxL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1642709638),
('ve45ETeeAw90naAGu2Fq9LVVnLmVgrllY7bb5wZO', 3, '192.168.43.118', 'Mozilla/5.0 (Linux; Android 11; SM-G780F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.85 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRkpJSUpQTzh3NHl5anZxTDlBUUt2MlYzdTJjYmM5RmJBUnpvME03aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly8xOTIuMTY4LjQzLjE2Mzo4MDAxL3Byb2R1Y3QvbGFyZ2UtYW5kLW1vZGVybi1iZWRyb29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJzdGF0ZSI7czo0MDoiNDFuN08ydkFhZEpZVERDYVFlWVZRZUl6djI0cWdVREV5RlRUcUxRViI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1639424055),
('zWIdrf7tdct0I4P9j4WeiuYMnoZ33Q5PlhKBgild', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVTc3OTJPOW56OFkxSHNNbnBsYU1xSlExSEFHSmo1Y09DT21SWGs2ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1639916011);

-- --------------------------------------------------------

--
-- Table structure for table `static_options`
--

CREATE TABLE `static_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_options`
--

INSERT INTO `static_options` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'recommender_system_situation', 'on', NULL, '2021-04-06 07:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `unique_codes`
--

CREATE TABLE `unique_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` int(11) NOT NULL,
  `expired_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unique_codes`
--

INSERT INTO `unique_codes` (`id`, `user_id`, `code`, `expired_at`) VALUES
(8, 2, 870849, '2021-04-06 08:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `staff` tinyint(1) NOT NULL DEFAULT 0,
  `is_host` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_type` enum('off','sms','expectation') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `is_admin`, `staff`, `is_host`, `email`, `email_verified_at`, `password`, `two_factor_type`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'pouria cqflooring', '', 0, 0, 1, 'pouria.cqflooring@gmail.com', '2021-02-14 06:47:27', '$2y$10$WO06FJHvbO3mM1/MHIwFn.0LGdmNQM2j3afGR41toVytWNog1LqsW', 'off', NULL, NULL, '2021-02-14 06:47:27', '2021-02-14 08:48:18'),
(3, 'Arash', 'Hessami', 0, 0, 0, 'arash@yahoo.com', '2021-02-14 10:35:51', '$2y$10$QBeuZ7Apt.4F2.50fJ5F7OdWLUcm0ElKchFnt620B4twMBsZfYOVy', 'off', NULL, NULL, '2021-02-14 10:35:15', '2021-02-14 11:16:34'),
(4, 'pouria yazdanpanah', '', 0, 0, 1, 'pouria.yp911@gmail.com', '2021-05-04 18:07:15', '$2y$10$nY4VndNoHD.nqd3TjhFi/..5c2uHWFkMQtyNt3Iozvn.vUfDmzSHa', 'off', NULL, NULL, '2021-05-04 18:07:15', '2021-05-04 18:11:57'),
(5, 'Pouria Yazdanpanah', '', 1, 0, 1, 'pouria.yazdan@gmail.com', '2021-09-29 16:13:24', '$2y$10$5VJ9Dyah7ys8dIpHSPHO3.U5DJmxHhv6e4hPlQpFt5h.u.NHIzOpy', 'off', NULL, NULL, '2021-09-29 16:13:24', '2021-09-29 16:16:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_product_id_foreign` (`product_id`);

--
-- Indexes for table `bed_infos`
--
ALTER TABLE `bed_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bed_infos_product_id_foreign` (`product_id`);

--
-- Indexes for table `booking_data`
--
ALTER TABLE `booking_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_data_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_product`
--
ALTER TABLE `feature_product`
  ADD PRIMARY KEY (`product_id`,`feature_id`),
  ADD KEY `feature_product_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_product_id_foreign` (`product_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`permission_id`,`user_id`),
  ADD KEY `permission_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_reservation`
--
ALTER TABLE `product_reservation`
  ADD PRIMARY KEY (`product_id`,`reservation_id`),
  ADD KEY `product_reservation_reservation_id_foreign` (`reservation_id`);

--
-- Indexes for table `property_weights`
--
ALTER TABLE `property_weights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_levels`
--
ALTER TABLE `registration_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registration_levels_product_id_foreign` (`product_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `static_options`
--
ALTER TABLE `static_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unique_codes`
--
ALTER TABLE `unique_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_codes_user_id_code_unique` (`user_id`,`code`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bed_infos`
--
ALTER TABLE `bed_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `booking_data`
--
ALTER TABLE `booking_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `property_weights`
--
ALTER TABLE `property_weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration_levels`
--
ALTER TABLE `registration_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `static_options`
--
ALTER TABLE `static_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unique_codes`
--
ALTER TABLE `unique_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bed_infos`
--
ALTER TABLE `bed_infos`
  ADD CONSTRAINT `bed_infos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_data`
--
ALTER TABLE `booking_data`
  ADD CONSTRAINT `booking_data_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feature_product`
--
ALTER TABLE `feature_product`
  ADD CONSTRAINT `feature_product_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feature_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reservation`
--
ALTER TABLE `product_reservation`
  ADD CONSTRAINT `product_reservation_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_reservation_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `registration_levels`
--
ALTER TABLE `registration_levels`
  ADD CONSTRAINT `registration_levels_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unique_codes`
--
ALTER TABLE `unique_codes`
  ADD CONSTRAINT `unique_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
