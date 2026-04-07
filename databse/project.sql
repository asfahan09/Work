-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2026 at 03:23 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `description`, `category_id`, `subcategory_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'uploads/brand/1774693328.png', 'Samsung is a leading South Korean multinational conglomerate, founded in 1938, known globally for innovation in consumer electronics, semiconductors, and telecommunications.', 2, 1, 1, '2026-03-27 15:20:14', '2026-03-28 05:22:08'),
(2, 'Gulahmed', 'uploads/brand/1774684202.jpg', 'Shop trendy women\'s clothing and dresses online at Gul Ahmed Ideas Pret. Explore stitched ladies\' shalwar kameez suits, shirts, tops, bottoms, and pret ...', 3, 3, 1, '2026-03-28 02:50:02', '2026-03-28 02:50:02'),
(3, 'Diners', 'uploads/brand/1774694242.webp', 'Discover the complete footwear collection at Diners. From sophisticated leather dress shoes and formal wear to comfortable casual sneakers and stylish ...', 4, 5, 1, '2026-03-28 05:37:22', '2026-03-28 05:37:22'),
(4, 'Nike', 'uploads/brand/1774694308.webp', 'Nike, Inc. is the world\'s largest supplier of athletic shoes, apparel, and sports equipment, operating as a purpose-driven, multinational corporation based near Beaverton, Oregon.', 4, 4, 1, '2026-03-28 05:38:28', '2026-03-28 05:38:28'),
(5, 'oppo', 'uploads/brand/1775057383.png', 'OPPO is a leading global technology brand founded in 2004, specializing in smartphones, smart devices, and audio-visual technology.', 2, 1, 1, '2026-04-01 10:29:43', '2026-04-01 10:29:43'),
(6, 'dell', 'uploads/brand/1775560530.jpg', 'best brand', 2, 6, 1, '2026-04-07 06:15:30', '2026-04-07 06:15:30');

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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Electronics', 'electronic', 'Electronic items are devices that utilize electricity and semiconductors to manipulate electrons, enabling functions like processing data, communicating, or providing entertainment.', 'uploads/categories/1775493032.avif', 1, '2026-03-26 15:49:50', '2026-04-06 11:30:32'),
(3, 'Dresses', 'dresses', 'But for writers like me who get stuck in the “white socks, green dress” rut, here\'s a quick reminder: Details about fabric, fit, quality, and color are super effective when it comes to creating a sense of character, place, or moment', 'uploads/categories/1775492768.jpg', 1, '2026-03-26 15:52:48', '2026-04-06 11:26:08'),
(4, 'Shoes', 'shoes', 'Shoes are specialized footwear designed to protect and comfort the human foot while offering style, typically featuring a durable sole, heel, and upper constructed from materials like leather, canvas, or synthetic fabrics.', 'uploads/categories/1775492731.jpg', 1, '2026-03-28 05:29:43', '2026-04-06 11:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Black', '#000000', 1, '2026-03-29 08:14:29', '2026-03-29 08:14:29'),
(5, 'Red', '#FF0000', 1, '2026-03-29 08:14:45', '2026-03-29 08:14:45'),
(6, 'purple', '#FF466', 1, '2026-04-01 10:30:38', '2026-04-01 10:30:38');

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
(4, '2026_03_26_150704_create_categories_table', 2),
(5, '2026_03_26_151137_create_subcategories_table', 3),
(6, '2026_03_27_161536_create_brands_table', 4),
(7, '2026_03_27_201805_add_timestamps_to_brands_table', 5),
(8, '2026_03_28_104100_create_colors_table', 6),
(9, '2026_03_29_161558_create_products_table', 7),
(10, '2026_03_29_161850_create_product_images_table', 8),
(11, '2026_03_29_201556_create_product_colors_table', 9),
(12, '2026_04_03_195323_create_carts_table', 10),
(13, '2026_04_05_113041_create_orders_table', 11),
(14, '2026_04_05_113059_create_order_items_table', 11),
(15, '2026_04_05_131156_create_order_items_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `trackin_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `trackin_no`, `fullname`, `email`, `phone`, `pincode`, `address`, `status_message`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'ORD-UW4nFvcfMm', 'asfahan', 'asfahan022@gmail.com', '23-42423424', '423432', 'karachi', 'completed', 'COD', NULL, '2026-04-05 11:37:11', '2026-04-06 09:26:04'),
(2, 2, 'ORD-BszmeYzoxw', 'muhammad Asfahan', 'asfahan.pbhub022@gmail.com', '03121212', '312312431', 'karachi sadar', 'completed', 'COD', NULL, '2026-04-05 11:57:14', '2026-04-06 09:38:35'),
(3, 2, 'ORD-9BId1wUCTz', 'Talha', 'talha@gmail.com', '303030303', '7y6987698', 'hjghhjjbj', 'in progress', 'COD', NULL, '2026-04-05 12:23:11', '2026-04-05 12:23:11'),
(4, 2, 'ORD-ZNQKnQPmFY', 'muhammad Asfahan', 'asfahan.pbhub022@gmail.com', '03121212', '454353', 'karachi sadar', 'in progress', 'COD', NULL, '2026-04-05 12:25:49', '2026-04-05 12:25:49'),
(5, 2, 'ORD-bduM0BIjVq', 'muhammad Asfahan', 'asfahan.pbhub022@gmail.com', '03121212', '2324234', 'lahore', 'in progress', 'Easypaisa', '03418312249', '2026-04-05 15:42:50', '2026-04-05 15:42:50'),
(6, 2, 'ORD-qMOvC6Ng6T', 'muhammad Asfahan', 'asfahan.pbhub022@gmail.com', '03121212', '8787098', 'karachi sadar', 'in progress', 'Easypaisa', '4593496943693494', '2026-04-05 16:01:27', '2026-04-05 16:01:27'),
(7, 2, 'ORD-wOXXByaLIt', 'muhammad Asfahan', 'asfahan.pbhub022@gmail.com', '03121212', 'ghjh687', 'karachi sadar', 'in progress', 'Easypaisa', '8788', '2026-04-05 16:39:23', '2026-04-05 16:39:23'),
(8, 2, 'ORD-TdIJ02utKY', 'hassan', 'hassan@gmail.com', '8423932849', '1224373', 'orangi town karachi', 'completed', 'Easypaisa', '123456789', '2026-04-06 10:08:46', '2026-04-06 10:09:57'),
(9, 2, 'ORD-88dXHO5qO1', 'muhammad Asfahan', 'muhammadasfahan689@gmail.com', '08435834985', '23123', 'hi', 'completed', 'Easypaisa', '12345', '2026-04-07 06:18:23', '2026-04-07 06:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 5, 1, 26000, '2026-04-05 11:37:11', '2026-04-05 11:37:11'),
(2, 1, 6, 8, 1, 29000, '2026-04-05 11:37:11', '2026-04-05 11:37:11'),
(3, 1, 8, 13, 1, 4500, '2026-04-05 11:37:11', '2026-04-05 11:37:11'),
(4, 2, 9, 14, 5, 2500, '2026-04-05 11:57:14', '2026-04-05 11:57:14'),
(5, 3, 7, 9, 1, 6000, '2026-04-05 12:23:11', '2026-04-05 12:23:11'),
(6, 4, 4, 6, 1, 26000, '2026-04-05 12:25:49', '2026-04-05 12:25:49'),
(7, 5, 4, 5, 1, 26000, '2026-04-05 15:42:50', '2026-04-05 15:42:50'),
(8, 6, 8, 13, 1, 4500, '2026-04-05 16:01:27', '2026-04-05 16:01:27'),
(9, 7, 9, 14, 5, 2500, '2026-04-05 16:39:23', '2026-04-05 16:39:23'),
(10, 8, 6, 8, 2, 29000, '2026-04-06 10:08:46', '2026-04-06 10:08:46'),
(11, 9, 10, 15, 4, 25000, '2026-04-07 06:18:23', '2026-04-07 06:18:23');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name`, `slug`, `brand`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 'samsung A06', 'samsung A06', '1', 'Samsung Galaxy A06 shines in Yellow in new render as full ...The Samsung Galaxy A06 is a budget-friendly 2024 smartphone (priced ~$95–$110) featuring a 6.7-inch HD+ PLS LCD screen, a 50MP main camera, and a 5,000mAh battery with 25W fast charging.', 'Samsung Galaxy A06 shines in Yellow in new render as full ...The Samsung Galaxy A06 is a budget-friendly 2024 smartphone (priced ~$95–$110) featuring a 6.7-inch HD+ PLS LCD screen, a 50MP main camera, and a 5,000mAh battery with 25W fast charging.', 27000, 26000, 5, 1, 1, '2026-03-31 10:38:31', '2026-03-31 10:38:31'),
(5, 2, 1, 'samsung A07', 'samsung A07', '1', 'The Samsung Galaxy A07 (2025) is a budget-friendly smartphone featuring a 6.7-inch 90Hz HD+ display, a 50MP main camera, and a 5000mAh battery with 25W charging.', 'The Samsung Galaxy A07 (2025) is a budget-friendly smartphone featuring a 6.7-inch 90Hz HD+ display, a 50MP main camera, and a 5000mAh battery with 25W charging.', 28000, 27000, 15, 1, 1, '2026-04-01 10:27:09', '2026-04-01 10:28:17'),
(6, 2, 1, 'oppo a6x', 'oppo a6x', '5', 'OPPO is a leading global technology brand specializing in smartphones, smart devices, and mobile internet services, recognized for its focus on camera technology, fast-charging (SUPERVOOC),', 'OPPO is a leading global technology brand specializing in smartphones, smart devices, and mobile internet services, recognized for its focus on camera technology, fast-charging (SUPERVOOC),', 30000, 29000, 7, 1, 1, '2026-04-01 10:35:10', '2026-04-01 10:35:10'),
(7, 3, 3, 'Maxis Dress Women\'s Sweater', 'Maxis Dress Women\'s Sweater', '2', 'Women’s dresses are one-piece garments comprising a bodice and skirt, varying by silhouette, length, and purpose. Key styles include A-line (flares at waist), bodycon (form-fitting),', 'Women’s dresses are one-piece garments comprising a bodice and skirt, varying by silhouette, length, and purpose. Key styles include A-line (flares at waist), bodycon (form-fitting),', 7000, 6000, 4, 1, 1, '2026-04-01 10:42:20', '2026-04-02 02:41:25'),
(8, 4, 4, 'Nike Shoes', 'Nike Shoes', '4', 'Nike shoes are globally recognized for combining high-performance athletic technology with iconic style, often featuring signature components like pressurized', 'Nike shoes are globally recognized for combining high-performance athletic technology with iconic style, often featuring signature components like pressurized', 5000, 4500, 10, 1, 1, '2026-04-01 10:45:07', '2026-04-06 11:15:35'),
(9, 4, 5, 'Coffee Men Formal Derby Lace Shoes', 'Coffee Men Formal Derby Lace Shoes', '3', 'Formal shoes are refined, high-quality footwear designed for business, weddings, and special occasions.', 'Formal shoes are refined, high-quality footwear designed for business, weddings, and special occasions.', 3001, 2500, 10, 1, 1, '2026-04-01 10:50:32', '2026-04-02 02:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(5, 4, 4, 5, '2026-03-31 10:38:31', '2026-03-31 10:38:31'),
(6, 4, 5, 5, '2026-03-31 10:38:31', '2026-03-31 10:38:31'),
(7, 5, 4, 0, '2026-04-01 10:27:09', '2026-04-03 15:23:09'),
(8, 6, 6, 10, '2026-04-01 10:35:10', '2026-04-01 10:35:10'),
(9, 7, 4, 4, '2026-04-01 10:42:20', '2026-04-01 10:42:20'),
(10, 7, 5, 4, '2026-04-01 10:42:20', '2026-04-01 10:42:20'),
(11, 7, 6, 4, '2026-04-01 10:42:20', '2026-04-01 10:42:20'),
(12, 8, 4, 0, '2026-04-01 10:45:07', '2026-04-04 03:29:40'),
(13, 8, 5, 3, '2026-04-01 10:45:07', '2026-04-04 10:19:55'),
(14, 9, 4, 5, '2026-04-01 10:50:32', '2026-04-01 10:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(22, 4, 'uploads/products/samsung-a06/69cd38994054a.jpg', '2026-04-01 10:24:09', '2026-04-01 10:24:09'),
(23, 4, 'uploads/products/samsung-a06/69cd3899420e6.jpg', '2026-04-01 10:24:09', '2026-04-01 10:24:09'),
(27, 6, 'uploads/products/oppo-a6x/69cd3b2e31d94.webp', '2026-04-01 10:35:10', '2026-04-01 10:35:10'),
(28, 6, 'uploads/products/oppo-a6x/69cd3b2e32df7.webp', '2026-04-01 10:35:10', '2026-04-01 10:35:10'),
(31, 9, 'uploads/products/coffee-men-formal-derby-lace-shoes/69cd3ec8dc95a.webp', '2026-04-01 10:50:32', '2026-04-01 10:50:32'),
(32, 8, 'uploads/products/nike-shoes/69d3dc27f3e2c.avif', '2026-04-06 11:15:36', '2026-04-06 11:15:36'),
(34, 5, 'uploads/products/samsung-a07/69d3dcd149a84.avif', '2026-04-06 11:18:25', '2026-04-06 11:18:25'),
(35, 7, 'uploads/products/maxis-dress-womens-sweater/69d3dd7b96c9a.webp', '2026-04-06 11:21:15', '2026-04-06 11:21:15');

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
('88xSYRWtu6itR2f0f85g2r0qhgweursuEA87zgQf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTFlvSmNtNEJJN3Q1WmhxQ0JFSFFoQWJseHh3WUF2NWxzeHF5aHE1OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1775567827),
('cR2ncUvVPtES0LBeELQu8bp6LRBQp8adXNu6abAp', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidFFpVUlNOTNJQ1g3Y2o4RlRwMWpUNWZ5cW1NNXNwY0JwQ1BmQzNJaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1775507098);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Mobile', 'mobile', 'Samsung is a leading South Korean multinational conglomerate, founded in 1938, known globally for innovation in consumer electronics, semiconductors, and telecommunications.', 'uploads/subcategories/1774616186.webp', 1, '2026-03-27 07:56:26', '2026-03-28 05:20:55'),
(3, 3, 'Women\'s dresses', 'womens-dresses', 'A woman\'s dress is a one-piece garment comprising a bodice and skirt that covers the torso and hangs over the legs, ranging from casual to formal, and mini to floor-length.', 'uploads/categories/1774627101.jpg', 1, '2026-03-27 08:01:46', '2026-03-27 10:58:21'),
(4, 4, 'Sneakers', 'sneakers', 'Sneakers are comfortable, casual, or athletic shoes featuring flexible rubber soles and soft uppers (leather, canvas, or mesh), designed for everyday wear, sports, and comfort.', 'uploads/categories/1775493128.jpg', 1, '2026-03-28 05:32:53', '2026-04-06 11:32:08'),
(5, 4, 'Formal', 'formal', 'Formal shoes are refined, high-quality footwear designed for business, weddings, and special occasions.', 'uploads/subcategories/1774694015.webp', 1, '2026-03-28 05:33:35', '2026-03-28 05:33:35'),
(6, 2, 'laptop', 'laptop', 'best laptop', 'uploads/subcategories/1775560497.jpg', 1, '2026-04-07 06:14:57', '2026-04-07 06:14:57');

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
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$t2V0M5GCMPZQP119VrTW3OW4oM8umHnj1emXBcJGdyBVPdX9aSgxm', 'admin', NULL, '2026-03-26 10:38:39', '2026-03-26 10:38:39'),
(2, 'Asfahan', 'asfahan022@gmail.com', NULL, '$2y$12$LaWWlrDK1y/Kr2m66CixGOWiryByRhMjTErBpM9UPYfDXkYyZ9txG', 'user', NULL, '2026-04-03 15:12:56', '2026-04-03 15:12:56'),
(3, 'user', 'user@gmail.com', NULL, '$2y$12$WN/0OK0z.R2U923.NZvQqOMvSkdD3eberT8Th8sN1wIZ.NJZrwhbW', 'user', NULL, '2026-04-06 15:12:19', '2026-04-06 15:12:19'),
(4, 'Malik hassan', 'user22@gmail.com', NULL, '$2y$12$rKWHJVBVRy3Vo9tJ7.3eI.IEZ0oRIDM1.xnuB323.wXi3iWwC5vpy', 'user', NULL, '2026-04-06 15:17:12', '2026-04-06 15:17:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_category_id_foreign` (`category_id`),
  ADD KEY `brands_subcategory_id_foreign` (`subcategory_id`);

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_slug_unique` (`slug`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `brands_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
