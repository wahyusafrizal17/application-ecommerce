-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2020 pada 21.38
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `westore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_card` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number_card` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `cards`
--

INSERT INTO `cards` (`id`, `name_card`, `number_card`, `created_at`, `updated_at`) VALUES
(1, 'BCA', '1390704051', NULL, NULL),
(2, 'JENIUS', '90014643654', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 1, '2020-05-05 02:59:57', '2020-05-05 02:59:57'),
(2, 4, 7, 2, '2020-05-05 03:12:45', '2020-05-05 03:12:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name_category`, `created_at`, `updated_at`) VALUES
(1, 'T-shirts', '2020-05-03 05:10:48', '2020-05-03 05:10:48'),
(2, 'Boxer', '2020-05-03 05:11:39', '2020-05-03 05:11:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `courier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `payment` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `checkouts`
--

INSERT INTO `checkouts` (`id`, `user_id`, `courier`, `price`, `payment`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 3, 'REG', 11000, 'BCA', '081564724662', 'komplek villa cilame indah blok b 16 kec. ngamprah kab. bandung barat 40552', '2020-05-05 03:00:35', '2020-05-05 03:00:35'),
(2, 4, 'OKE', 47000, 'BCA', '085216283748', 'Telaga meuku sa kec. banda mulia kab. aceh tamiang', '2020-05-05 03:13:52', '2020-05-05 03:14:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Wahyu Safrizal', 'wahyusafrizal174@gmail.com', '085216283748', 'Perumahan villa cilame indah kec. ngamprah kab. bandung barat\r\nblok b 16', '2020-04-18 06:42:01', '2020-04-18 06:42:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_26_135929_entrust_setup_tables', 1),
(4, '2020_04_12_001733_create_categories_table', 1),
(5, '2020_04_12_001919_create_products_table', 1),
(6, '2020_04_12_002020_create_sliders_table', 1),
(7, '2020_04_13_203817_create_contacts_table', 1),
(8, '2020_04_13_211848_create_settings_table', 1),
(9, '2020_04_13_225445_create_artikels_table', 1),
(10, '2020_04_15_113649_create_carts_table', 1),
(11, '2020_04_15_141848_create_transactions_table', 1),
(12, '2020_04_18_113334_create_provinces_table', 1),
(13, '2020_04_18_113608_create_cities_table', 1),
(14, '2020_04_18_113651_create_couriers_table', 1),
(15, '2020_04_19_135824_create_checkouts_table', 2),
(16, '2020_04_21_073216_create_cards_table', 3),
(17, '2020_04_21_112431_create_transactions_table', 4),
(18, '2020_05_05_084640_create_transfers_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name_product`, `category_id`, `price`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'T-SHIRT SURFING SKATE DISTRO', 1, 70000, '<p>Detail Produk:<br />\r\n<br />\r\nBahan ➡️ Cotton Combed Reaktif<br />\r\nDesign ➡️ Sablon Plastiso<br />\r\nRib ➡️Drop Needle<br />\r\nUkuran ➡️ M (51x73) L (53x75)<br />\r\nJahitan➡️ Standar Kaos Distro<br />\r\n==========================<br />\r\nAdem &amp; Nyaman Dipakai<br />\r\nDengan Style Yang Simple Namun Keren Membuat Kamu Semakin Trendy Dilihat</p>', '0026.jpeg', '2020-05-03 05:15:20', '2020-05-03 05:15:20'),
(2, 'T-SHIRT SURFING SKATE DISTRO', 1, 70000, '<p>Detail Produk:<br />\r\n<br />\r\nBahan ➡️ Cotton Combed Reaktif<br />\r\nDesign ➡️ Sablon Plastiso<br />\r\nRib ➡️Drop Needle<br />\r\nUkuran ➡️ M (51x73) L (53x75)<br />\r\nJahitan➡️ Standar Kaos Distro<br />\r\n==========================<br />\r\nAdem &amp; Nyaman Dipakai<br />\r\nDengan Style Yang Simple Namun Keren Membuat Kamu Semakin Trendy Dilihat</p>', '0001.jpeg', '2020-05-03 05:16:47', '2020-05-03 05:16:47'),
(3, 'T-SHIRT SURFING SKATE DISTRO', 1, 70000, '<p>Detail Produk:<br />\r\n<br />\r\nBahan ➡️ Cotton Combed Reaktif<br />\r\nDesign ➡️ Sablon Plastiso<br />\r\nRib ➡️Drop Needle<br />\r\nUkuran ➡️ M (51x73) L (53x75)<br />\r\nJahitan➡️ Standar Kaos Distro<br />\r\n==========================<br />\r\nAdem &amp; Nyaman Dipakai<br />\r\nDengan Style Yang Simple Namun Keren Membuat Kamu Semakin Trendy Dilihat</p>', '0002.jpeg', '2020-05-03 05:17:34', '2020-05-03 05:17:34'),
(4, 'T-SHIRT SURFING SKATE DISTRO', 1, 70000, '<p>Detail Produk:<br />\r\n<br />\r\nBahan ➡️ Cotton Combed Reaktif<br />\r\nDesign ➡️ Sablon Plastiso<br />\r\nRib ➡️Drop Needle<br />\r\nUkuran ➡️ M (51x73) L (53x75)<br />\r\nJahitan➡️ Standar Kaos Distro<br />\r\n==========================<br />\r\nAdem &amp; Nyaman Dipakai<br />\r\nDengan Style Yang Simple Namun Keren Membuat Kamu Semakin Trendy Dilihat</p>', '0005.jpeg', '2020-05-03 05:18:23', '2020-05-03 05:18:23'),
(5, 'T-SHIRT SURFING SKATE DISTRO', 1, 70000, '<p>Detail Produk:<br />\r\n<br />\r\nBahan ➡️ Cotton Combed Reaktif<br />\r\nDesign ➡️ Sablon Plastiso<br />\r\nRib ➡️Drop Needle<br />\r\nUkuran ➡️ M (51x73) L (53x75)<br />\r\nJahitan➡️ Standar Kaos Distro<br />\r\n==========================<br />\r\nAdem &amp; Nyaman Dipakai<br />\r\nDengan Style Yang Simple Namun Keren Membuat Kamu Semakin Trendy Dilihat</p>', '0030.jpeg', '2020-05-03 05:19:19', '2020-05-03 05:19:19'),
(6, 'HUGO BOXER RADER 211W', 2, 50000, '<p>Detail Produk:<br />\r\n<br />\r\nBahan ➡️ Cotton<br />\r\nDesign ➡️ Full Print<br />\r\nPanjang ➡️ 40-42<br />\r\nUkuran ➡️ All Size (Fit 27 - 36)<br />\r\n==========================<br />\r\nAdem &amp; Nyaman Dipakai<br />\r\n➡️Untuk Tidur<br />\r\n➡️Untuk Daleman<br />\r\n➡️Untuk Santai di Pantai<br />\r\n➡️Untuk Sehari-hari di Rumah</p>', '00.jpeg', '2020-05-03 05:20:44', '2020-05-03 05:26:42'),
(7, 'HUGO BOXER RADER 211W', 2, 50000, '<p>Detail Produk:<br />\r\n<br />\r\nBahan ➡️ Cotton<br />\r\nDesign ➡️ Full Print<br />\r\nPanjang ➡️ 40-42<br />\r\nUkuran ➡️ All Size (Fit 27 - 36)<br />\r\n==========================<br />\r\nAdem &amp; Nyaman Dipakai<br />\r\n➡️Untuk Tidur<br />\r\n➡️Untuk Daleman<br />\r\n➡️Untuk Santai di Pantai<br />\r\n➡️Untuk Sehari-hari di Rumah</p>', '01.jpg', '2020-05-03 05:21:26', '2020-05-03 05:27:09'),
(8, 'HUGO BOXER RADER 211W', 2, 50000, '<p>Detail Produk:<br />\r\n<br />\r\nBahan ➡️ Cotton<br />\r\nDesign ➡️ Full Print<br />\r\nPanjang ➡️ 40-42<br />\r\nUkuran ➡️ All Size (Fit 27 - 36)<br />\r\n==========================<br />\r\nAdem &amp; Nyaman Dipakai<br />\r\n➡️Untuk Tidur<br />\r\n➡️Untuk Daleman<br />\r\n➡️Untuk Santai di Pantai<br />\r\n➡️Untuk Sehari-hari di Rumah</p>', '02.jpeg', '2020-05-03 05:22:03', '2020-05-03 05:26:16'),
(9, 'HUGO BOXER RADER 211W', 2, 50000, '<p>Detail Produk:<br />\r\n<br />\r\nBahan ➡️ Cotton<br />\r\nDesign ➡️ Full Print<br />\r\nPanjang ➡️ 40-42<br />\r\nUkuran ➡️ All Size (Fit 27 - 36)<br />\r\n==========================<br />\r\nAdem &amp; Nyaman Dipakai<br />\r\n➡️Untuk Tidur<br />\r\n➡️Untuk Daleman<br />\r\n➡️Untuk Santai di Pantai<br />\r\n➡️Untuk Sehari-hari di Rumah</p>', '03.jpeg', '2020-05-03 05:22:48', '2020-05-03 05:25:44'),
(10, 'HUGO BOXER RADER 211W', 2, 50000, '<p>Detail Produk:<br />\r\n<br />\r\nBahan ➡️ Cotton<br />\r\nDesign ➡️ Full Print<br />\r\nPanjang ➡️ 40-42<br />\r\nUkuran ➡️ All Size (Fit 27 - 36)<br />\r\n==========================<br />\r\nAdem &amp; Nyaman Dipakai<br />\r\n➡️Untuk Tidur<br />\r\n➡️Untuk Daleman<br />\r\n➡️Untuk Santai di Pantai<br />\r\n➡️Untuk Sehari-hari di Rumah</p>', '04.jpg', '2020-05-03 05:23:29', '2020-05-03 05:27:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `raja_ongkir_cities`
--

CREATE TABLE `raja_ongkir_cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  `province_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `raja_ongkir_cities`
--

INSERT INTO `raja_ongkir_cities` (`id`, `name`, `type`, `province_id`, `province_name`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 'Aceh Barat', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '23681', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(2, 'Aceh Barat Daya', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '23764', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(3, 'Aceh Besar', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '23951', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(4, 'Aceh Jaya', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '23654', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(5, 'Aceh Selatan', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '23719', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(6, 'Aceh Singkil', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '24785', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(7, 'Aceh Tamiang', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '24476', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(8, 'Aceh Tengah', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '24511', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(9, 'Aceh Tenggara', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '24611', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(10, 'Aceh Timur', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '24454', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(11, 'Aceh Utara', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '24382', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(12, 'Agam', 'Kabupaten', 32, 'Sumatera Barat', '26411', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(13, 'Alor', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '85811', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(14, 'Ambon', 'Kota', 19, 'Maluku', '97222', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(15, 'Asahan', 'Kabupaten', 34, 'Sumatera Utara', '21214', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(16, 'Asmat', 'Kabupaten', 24, 'Papua', '99777', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(17, 'Badung', 'Kabupaten', 1, 'Bali', '80351', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(18, 'Balangan', 'Kabupaten', 13, 'Kalimantan Selatan', '71611', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(19, 'Balikpapan', 'Kota', 15, 'Kalimantan Timur', '76111', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(20, 'Banda Aceh', 'Kota', 21, 'Nanggroe Aceh Darussalam (NAD)', '23238', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(21, 'Bandar Lampung', 'Kota', 18, 'Lampung', '35139', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(22, 'Bandung', 'Kabupaten', 9, 'Jawa Barat', '40311', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(23, 'Bandung', 'Kota', 9, 'Jawa Barat', '40111', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(24, 'Bandung Barat', 'Kabupaten', 9, 'Jawa Barat', '40721', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(25, 'Banggai', 'Kabupaten', 29, 'Sulawesi Tengah', '94711', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(26, 'Banggai Kepulauan', 'Kabupaten', 29, 'Sulawesi Tengah', '94881', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(27, 'Bangka', 'Kabupaten', 2, 'Bangka Belitung', '33212', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(28, 'Bangka Barat', 'Kabupaten', 2, 'Bangka Belitung', '33315', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(29, 'Bangka Selatan', 'Kabupaten', 2, 'Bangka Belitung', '33719', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(30, 'Bangka Tengah', 'Kabupaten', 2, 'Bangka Belitung', '33613', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(31, 'Bangkalan', 'Kabupaten', 11, 'Jawa Timur', '69118', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(32, 'Bangli', 'Kabupaten', 1, 'Bali', '80619', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(33, 'Banjar', 'Kabupaten', 13, 'Kalimantan Selatan', '70619', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(34, 'Banjar', 'Kota', 9, 'Jawa Barat', '46311', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(35, 'Banjarbaru', 'Kota', 13, 'Kalimantan Selatan', '70712', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(36, 'Banjarmasin', 'Kota', 13, 'Kalimantan Selatan', '70117', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(37, 'Banjarnegara', 'Kabupaten', 10, 'Jawa Tengah', '53419', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(38, 'Bantaeng', 'Kabupaten', 28, 'Sulawesi Selatan', '92411', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(39, 'Bantul', 'Kabupaten', 5, 'DI Yogyakarta', '55715', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(40, 'Banyuasin', 'Kabupaten', 33, 'Sumatera Selatan', '30911', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(41, 'Banyumas', 'Kabupaten', 10, 'Jawa Tengah', '53114', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(42, 'Banyuwangi', 'Kabupaten', 11, 'Jawa Timur', '68416', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(43, 'Barito Kuala', 'Kabupaten', 13, 'Kalimantan Selatan', '70511', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(44, 'Barito Selatan', 'Kabupaten', 14, 'Kalimantan Tengah', '73711', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(45, 'Barito Timur', 'Kabupaten', 14, 'Kalimantan Tengah', '73671', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(46, 'Barito Utara', 'Kabupaten', 14, 'Kalimantan Tengah', '73881', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(47, 'Barru', 'Kabupaten', 28, 'Sulawesi Selatan', '90719', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(48, 'Batam', 'Kota', 17, 'Kepulauan Riau', '29413', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(49, 'Batang', 'Kabupaten', 10, 'Jawa Tengah', '51211', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(50, 'Batang Hari', 'Kabupaten', 8, 'Jambi', '36613', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(51, 'Batu', 'Kota', 11, 'Jawa Timur', '65311', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(52, 'Batu Bara', 'Kabupaten', 34, 'Sumatera Utara', '21655', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(53, 'Bau-Bau', 'Kota', 30, 'Sulawesi Tenggara', '93719', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(54, 'Bekasi', 'Kabupaten', 9, 'Jawa Barat', '17837', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(55, 'Bekasi', 'Kota', 9, 'Jawa Barat', '17121', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(56, 'Belitung', 'Kabupaten', 2, 'Bangka Belitung', '33419', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(57, 'Belitung Timur', 'Kabupaten', 2, 'Bangka Belitung', '33519', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(58, 'Belu', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '85711', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(59, 'Bener Meriah', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '24581', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(60, 'Bengkalis', 'Kabupaten', 26, 'Riau', '28719', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(61, 'Bengkayang', 'Kabupaten', 12, 'Kalimantan Barat', '79213', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(62, 'Bengkulu', 'Kota', 4, 'Bengkulu', '38229', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(63, 'Bengkulu Selatan', 'Kabupaten', 4, 'Bengkulu', '38519', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(64, 'Bengkulu Tengah', 'Kabupaten', 4, 'Bengkulu', '38319', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(65, 'Bengkulu Utara', 'Kabupaten', 4, 'Bengkulu', '38619', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(66, 'Berau', 'Kabupaten', 15, 'Kalimantan Timur', '77311', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(67, 'Biak Numfor', 'Kabupaten', 24, 'Papua', '98119', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(68, 'Bima', 'Kabupaten', 22, 'Nusa Tenggara Barat (NTB)', '84171', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(69, 'Bima', 'Kota', 22, 'Nusa Tenggara Barat (NTB)', '84139', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(70, 'Binjai', 'Kota', 34, 'Sumatera Utara', '20712', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(71, 'Bintan', 'Kabupaten', 17, 'Kepulauan Riau', '29135', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(72, 'Bireuen', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '24219', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(73, 'Bitung', 'Kota', 31, 'Sulawesi Utara', '95512', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(74, 'Blitar', 'Kabupaten', 11, 'Jawa Timur', '66171', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(75, 'Blitar', 'Kota', 11, 'Jawa Timur', '66124', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(76, 'Blora', 'Kabupaten', 10, 'Jawa Tengah', '58219', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(77, 'Boalemo', 'Kabupaten', 7, 'Gorontalo', '96319', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(78, 'Bogor', 'Kabupaten', 9, 'Jawa Barat', '16911', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(79, 'Bogor', 'Kota', 9, 'Jawa Barat', '16119', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(80, 'Bojonegoro', 'Kabupaten', 11, 'Jawa Timur', '62119', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(81, 'Bolaang Mongondow (Bolmong)', 'Kabupaten', 31, 'Sulawesi Utara', '95755', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(82, 'Bolaang Mongondow Selatan', 'Kabupaten', 31, 'Sulawesi Utara', '95774', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(83, 'Bolaang Mongondow Timur', 'Kabupaten', 31, 'Sulawesi Utara', '95783', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(84, 'Bolaang Mongondow Utara', 'Kabupaten', 31, 'Sulawesi Utara', '95765', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(85, 'Bombana', 'Kabupaten', 30, 'Sulawesi Tenggara', '93771', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(86, 'Bondowoso', 'Kabupaten', 11, 'Jawa Timur', '68219', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(87, 'Bone', 'Kabupaten', 28, 'Sulawesi Selatan', '92713', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(88, 'Bone Bolango', 'Kabupaten', 7, 'Gorontalo', '96511', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(89, 'Bontang', 'Kota', 15, 'Kalimantan Timur', '75313', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(90, 'Boven Digoel', 'Kabupaten', 24, 'Papua', '99662', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(91, 'Boyolali', 'Kabupaten', 10, 'Jawa Tengah', '57312', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(92, 'Brebes', 'Kabupaten', 10, 'Jawa Tengah', '52212', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(93, 'Bukittinggi', 'Kota', 32, 'Sumatera Barat', '26115', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(94, 'Buleleng', 'Kabupaten', 1, 'Bali', '81111', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(95, 'Bulukumba', 'Kabupaten', 28, 'Sulawesi Selatan', '92511', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(96, 'Bulungan (Bulongan)', 'Kabupaten', 16, 'Kalimantan Utara', '77211', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(97, 'Bungo', 'Kabupaten', 8, 'Jambi', '37216', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(98, 'Buol', 'Kabupaten', 29, 'Sulawesi Tengah', '94564', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(99, 'Buru', 'Kabupaten', 19, 'Maluku', '97371', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(100, 'Buru Selatan', 'Kabupaten', 19, 'Maluku', '97351', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(101, 'Buton', 'Kabupaten', 30, 'Sulawesi Tenggara', '93754', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(102, 'Buton Utara', 'Kabupaten', 30, 'Sulawesi Tenggara', '93745', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(103, 'Ciamis', 'Kabupaten', 9, 'Jawa Barat', '46211', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(104, 'Cianjur', 'Kabupaten', 9, 'Jawa Barat', '43217', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(105, 'Cilacap', 'Kabupaten', 10, 'Jawa Tengah', '53211', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(106, 'Cilegon', 'Kota', 3, 'Banten', '42417', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(107, 'Cimahi', 'Kota', 9, 'Jawa Barat', '40512', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(108, 'Cirebon', 'Kabupaten', 9, 'Jawa Barat', '45611', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(109, 'Cirebon', 'Kota', 9, 'Jawa Barat', '45116', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(110, 'Dairi', 'Kabupaten', 34, 'Sumatera Utara', '22211', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(111, 'Deiyai (Deliyai)', 'Kabupaten', 24, 'Papua', '98784', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(112, 'Deli Serdang', 'Kabupaten', 34, 'Sumatera Utara', '20511', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(113, 'Demak', 'Kabupaten', 10, 'Jawa Tengah', '59519', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(114, 'Denpasar', 'Kota', 1, 'Bali', '80227', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(115, 'Depok', 'Kota', 9, 'Jawa Barat', '16416', '2019-10-22 10:32:26', '2019-10-22 10:32:26'),
(116, 'Dharmasraya', 'Kabupaten', 32, 'Sumatera Barat', '27612', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(117, 'Dogiyai', 'Kabupaten', 24, 'Papua', '98866', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(118, 'Dompu', 'Kabupaten', 22, 'Nusa Tenggara Barat (NTB)', '84217', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(119, 'Donggala', 'Kabupaten', 29, 'Sulawesi Tengah', '94341', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(120, 'Dumai', 'Kota', 26, 'Riau', '28811', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(121, 'Empat Lawang', 'Kabupaten', 33, 'Sumatera Selatan', '31811', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(122, 'Ende', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '86351', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(123, 'Enrekang', 'Kabupaten', 28, 'Sulawesi Selatan', '91719', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(124, 'Fakfak', 'Kabupaten', 25, 'Papua Barat', '98651', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(125, 'Flores Timur', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '86213', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(126, 'Garut', 'Kabupaten', 9, 'Jawa Barat', '44126', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(127, 'Gayo Lues', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '24653', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(128, 'Gianyar', 'Kabupaten', 1, 'Bali', '80519', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(129, 'Gorontalo', 'Kabupaten', 7, 'Gorontalo', '96218', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(130, 'Gorontalo', 'Kota', 7, 'Gorontalo', '96115', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(131, 'Gorontalo Utara', 'Kabupaten', 7, 'Gorontalo', '96611', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(132, 'Gowa', 'Kabupaten', 28, 'Sulawesi Selatan', '92111', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(133, 'Gresik', 'Kabupaten', 11, 'Jawa Timur', '61115', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(134, 'Grobogan', 'Kabupaten', 10, 'Jawa Tengah', '58111', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(135, 'Gunung Kidul', 'Kabupaten', 5, 'DI Yogyakarta', '55812', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(136, 'Gunung Mas', 'Kabupaten', 14, 'Kalimantan Tengah', '74511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(137, 'Gunungsitoli', 'Kota', 34, 'Sumatera Utara', '22813', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(138, 'Halmahera Barat', 'Kabupaten', 20, 'Maluku Utara', '97757', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(139, 'Halmahera Selatan', 'Kabupaten', 20, 'Maluku Utara', '97911', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(140, 'Halmahera Tengah', 'Kabupaten', 20, 'Maluku Utara', '97853', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(141, 'Halmahera Timur', 'Kabupaten', 20, 'Maluku Utara', '97862', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(142, 'Halmahera Utara', 'Kabupaten', 20, 'Maluku Utara', '97762', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(143, 'Hulu Sungai Selatan', 'Kabupaten', 13, 'Kalimantan Selatan', '71212', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(144, 'Hulu Sungai Tengah', 'Kabupaten', 13, 'Kalimantan Selatan', '71313', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(145, 'Hulu Sungai Utara', 'Kabupaten', 13, 'Kalimantan Selatan', '71419', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(146, 'Humbang Hasundutan', 'Kabupaten', 34, 'Sumatera Utara', '22457', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(147, 'Indragiri Hilir', 'Kabupaten', 26, 'Riau', '29212', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(148, 'Indragiri Hulu', 'Kabupaten', 26, 'Riau', '29319', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(149, 'Indramayu', 'Kabupaten', 9, 'Jawa Barat', '45214', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(150, 'Intan Jaya', 'Kabupaten', 24, 'Papua', '98771', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(151, 'Jakarta Barat', 'Kota', 6, 'DKI Jakarta', '11220', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(152, 'Jakarta Pusat', 'Kota', 6, 'DKI Jakarta', '10540', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(153, 'Jakarta Selatan', 'Kota', 6, 'DKI Jakarta', '12230', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(154, 'Jakarta Timur', 'Kota', 6, 'DKI Jakarta', '13330', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(155, 'Jakarta Utara', 'Kota', 6, 'DKI Jakarta', '14140', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(156, 'Jambi', 'Kota', 8, 'Jambi', '36111', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(157, 'Jayapura', 'Kabupaten', 24, 'Papua', '99352', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(158, 'Jayapura', 'Kota', 24, 'Papua', '99114', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(159, 'Jayawijaya', 'Kabupaten', 24, 'Papua', '99511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(160, 'Jember', 'Kabupaten', 11, 'Jawa Timur', '68113', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(161, 'Jembrana', 'Kabupaten', 1, 'Bali', '82251', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(162, 'Jeneponto', 'Kabupaten', 28, 'Sulawesi Selatan', '92319', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(163, 'Jepara', 'Kabupaten', 10, 'Jawa Tengah', '59419', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(164, 'Jombang', 'Kabupaten', 11, 'Jawa Timur', '61415', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(165, 'Kaimana', 'Kabupaten', 25, 'Papua Barat', '98671', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(166, 'Kampar', 'Kabupaten', 26, 'Riau', '28411', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(167, 'Kapuas', 'Kabupaten', 14, 'Kalimantan Tengah', '73583', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(168, 'Kapuas Hulu', 'Kabupaten', 12, 'Kalimantan Barat', '78719', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(169, 'Karanganyar', 'Kabupaten', 10, 'Jawa Tengah', '57718', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(170, 'Karangasem', 'Kabupaten', 1, 'Bali', '80819', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(171, 'Karawang', 'Kabupaten', 9, 'Jawa Barat', '41311', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(172, 'Karimun', 'Kabupaten', 17, 'Kepulauan Riau', '29611', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(173, 'Karo', 'Kabupaten', 34, 'Sumatera Utara', '22119', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(174, 'Katingan', 'Kabupaten', 14, 'Kalimantan Tengah', '74411', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(175, 'Kaur', 'Kabupaten', 4, 'Bengkulu', '38911', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(176, 'Kayong Utara', 'Kabupaten', 12, 'Kalimantan Barat', '78852', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(177, 'Kebumen', 'Kabupaten', 10, 'Jawa Tengah', '54319', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(178, 'Kediri', 'Kabupaten', 11, 'Jawa Timur', '64184', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(179, 'Kediri', 'Kota', 11, 'Jawa Timur', '64125', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(180, 'Keerom', 'Kabupaten', 24, 'Papua', '99461', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(181, 'Kendal', 'Kabupaten', 10, 'Jawa Tengah', '51314', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(182, 'Kendari', 'Kota', 30, 'Sulawesi Tenggara', '93126', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(183, 'Kepahiang', 'Kabupaten', 4, 'Bengkulu', '39319', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(184, 'Kepulauan Anambas', 'Kabupaten', 17, 'Kepulauan Riau', '29991', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(185, 'Kepulauan Aru', 'Kabupaten', 19, 'Maluku', '97681', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(186, 'Kepulauan Mentawai', 'Kabupaten', 32, 'Sumatera Barat', '25771', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(187, 'Kepulauan Meranti', 'Kabupaten', 26, 'Riau', '28791', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(188, 'Kepulauan Sangihe', 'Kabupaten', 31, 'Sulawesi Utara', '95819', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(189, 'Kepulauan Seribu', 'Kabupaten', 6, 'DKI Jakarta', '14550', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(190, 'Kepulauan Siau Tagulandang Biaro (Sitaro)', 'Kabupaten', 31, 'Sulawesi Utara', '95862', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(191, 'Kepulauan Sula', 'Kabupaten', 20, 'Maluku Utara', '97995', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(192, 'Kepulauan Talaud', 'Kabupaten', 31, 'Sulawesi Utara', '95885', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(193, 'Kepulauan Yapen (Yapen Waropen)', 'Kabupaten', 24, 'Papua', '98211', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(194, 'Kerinci', 'Kabupaten', 8, 'Jambi', '37167', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(195, 'Ketapang', 'Kabupaten', 12, 'Kalimantan Barat', '78874', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(196, 'Klaten', 'Kabupaten', 10, 'Jawa Tengah', '57411', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(197, 'Klungkung', 'Kabupaten', 1, 'Bali', '80719', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(198, 'Kolaka', 'Kabupaten', 30, 'Sulawesi Tenggara', '93511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(199, 'Kolaka Utara', 'Kabupaten', 30, 'Sulawesi Tenggara', '93911', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(200, 'Konawe', 'Kabupaten', 30, 'Sulawesi Tenggara', '93411', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(201, 'Konawe Selatan', 'Kabupaten', 30, 'Sulawesi Tenggara', '93811', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(202, 'Konawe Utara', 'Kabupaten', 30, 'Sulawesi Tenggara', '93311', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(203, 'Kotabaru', 'Kabupaten', 13, 'Kalimantan Selatan', '72119', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(204, 'Kotamobagu', 'Kota', 31, 'Sulawesi Utara', '95711', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(205, 'Kotawaringin Barat', 'Kabupaten', 14, 'Kalimantan Tengah', '74119', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(206, 'Kotawaringin Timur', 'Kabupaten', 14, 'Kalimantan Tengah', '74364', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(207, 'Kuantan Singingi', 'Kabupaten', 26, 'Riau', '29519', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(208, 'Kubu Raya', 'Kabupaten', 12, 'Kalimantan Barat', '78311', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(209, 'Kudus', 'Kabupaten', 10, 'Jawa Tengah', '59311', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(210, 'Kulon Progo', 'Kabupaten', 5, 'DI Yogyakarta', '55611', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(211, 'Kuningan', 'Kabupaten', 9, 'Jawa Barat', '45511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(212, 'Kupang', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '85362', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(213, 'Kupang', 'Kota', 23, 'Nusa Tenggara Timur (NTT)', '85119', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(214, 'Kutai Barat', 'Kabupaten', 15, 'Kalimantan Timur', '75711', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(215, 'Kutai Kartanegara', 'Kabupaten', 15, 'Kalimantan Timur', '75511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(216, 'Kutai Timur', 'Kabupaten', 15, 'Kalimantan Timur', '75611', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(217, 'Labuhan Batu', 'Kabupaten', 34, 'Sumatera Utara', '21412', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(218, 'Labuhan Batu Selatan', 'Kabupaten', 34, 'Sumatera Utara', '21511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(219, 'Labuhan Batu Utara', 'Kabupaten', 34, 'Sumatera Utara', '21711', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(220, 'Lahat', 'Kabupaten', 33, 'Sumatera Selatan', '31419', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(221, 'Lamandau', 'Kabupaten', 14, 'Kalimantan Tengah', '74611', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(222, 'Lamongan', 'Kabupaten', 11, 'Jawa Timur', '64125', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(223, 'Lampung Barat', 'Kabupaten', 18, 'Lampung', '34814', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(224, 'Lampung Selatan', 'Kabupaten', 18, 'Lampung', '35511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(225, 'Lampung Tengah', 'Kabupaten', 18, 'Lampung', '34212', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(226, 'Lampung Timur', 'Kabupaten', 18, 'Lampung', '34319', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(227, 'Lampung Utara', 'Kabupaten', 18, 'Lampung', '34516', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(228, 'Landak', 'Kabupaten', 12, 'Kalimantan Barat', '78319', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(229, 'Langkat', 'Kabupaten', 34, 'Sumatera Utara', '20811', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(230, 'Langsa', 'Kota', 21, 'Nanggroe Aceh Darussalam (NAD)', '24412', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(231, 'Lanny Jaya', 'Kabupaten', 24, 'Papua', '99531', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(232, 'Lebak', 'Kabupaten', 3, 'Banten', '42319', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(233, 'Lebong', 'Kabupaten', 4, 'Bengkulu', '39264', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(234, 'Lembata', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '86611', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(235, 'Lhokseumawe', 'Kota', 21, 'Nanggroe Aceh Darussalam (NAD)', '24352', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(236, 'Lima Puluh Koto/Kota', 'Kabupaten', 32, 'Sumatera Barat', '26671', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(237, 'Lingga', 'Kabupaten', 17, 'Kepulauan Riau', '29811', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(238, 'Lombok Barat', 'Kabupaten', 22, 'Nusa Tenggara Barat (NTB)', '83311', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(239, 'Lombok Tengah', 'Kabupaten', 22, 'Nusa Tenggara Barat (NTB)', '83511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(240, 'Lombok Timur', 'Kabupaten', 22, 'Nusa Tenggara Barat (NTB)', '83612', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(241, 'Lombok Utara', 'Kabupaten', 22, 'Nusa Tenggara Barat (NTB)', '83711', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(242, 'Lubuk Linggau', 'Kota', 33, 'Sumatera Selatan', '31614', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(243, 'Lumajang', 'Kabupaten', 11, 'Jawa Timur', '67319', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(244, 'Luwu', 'Kabupaten', 28, 'Sulawesi Selatan', '91994', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(245, 'Luwu Timur', 'Kabupaten', 28, 'Sulawesi Selatan', '92981', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(246, 'Luwu Utara', 'Kabupaten', 28, 'Sulawesi Selatan', '92911', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(247, 'Madiun', 'Kabupaten', 11, 'Jawa Timur', '63153', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(248, 'Madiun', 'Kota', 11, 'Jawa Timur', '63122', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(249, 'Magelang', 'Kabupaten', 10, 'Jawa Tengah', '56519', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(250, 'Magelang', 'Kota', 10, 'Jawa Tengah', '56133', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(251, 'Magetan', 'Kabupaten', 11, 'Jawa Timur', '63314', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(252, 'Majalengka', 'Kabupaten', 9, 'Jawa Barat', '45412', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(253, 'Majene', 'Kabupaten', 27, 'Sulawesi Barat', '91411', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(254, 'Makassar', 'Kota', 28, 'Sulawesi Selatan', '90111', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(255, 'Malang', 'Kabupaten', 11, 'Jawa Timur', '65163', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(256, 'Malang', 'Kota', 11, 'Jawa Timur', '65112', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(257, 'Malinau', 'Kabupaten', 16, 'Kalimantan Utara', '77511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(258, 'Maluku Barat Daya', 'Kabupaten', 19, 'Maluku', '97451', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(259, 'Maluku Tengah', 'Kabupaten', 19, 'Maluku', '97513', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(260, 'Maluku Tenggara', 'Kabupaten', 19, 'Maluku', '97651', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(261, 'Maluku Tenggara Barat', 'Kabupaten', 19, 'Maluku', '97465', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(262, 'Mamasa', 'Kabupaten', 27, 'Sulawesi Barat', '91362', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(263, 'Mamberamo Raya', 'Kabupaten', 24, 'Papua', '99381', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(264, 'Mamberamo Tengah', 'Kabupaten', 24, 'Papua', '99553', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(265, 'Mamuju', 'Kabupaten', 27, 'Sulawesi Barat', '91519', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(266, 'Mamuju Utara', 'Kabupaten', 27, 'Sulawesi Barat', '91571', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(267, 'Manado', 'Kota', 31, 'Sulawesi Utara', '95247', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(268, 'Mandailing Natal', 'Kabupaten', 34, 'Sumatera Utara', '22916', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(269, 'Manggarai', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '86551', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(270, 'Manggarai Barat', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '86711', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(271, 'Manggarai Timur', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '86811', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(272, 'Manokwari', 'Kabupaten', 25, 'Papua Barat', '98311', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(273, 'Manokwari Selatan', 'Kabupaten', 25, 'Papua Barat', '98355', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(274, 'Mappi', 'Kabupaten', 24, 'Papua', '99853', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(275, 'Maros', 'Kabupaten', 28, 'Sulawesi Selatan', '90511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(276, 'Mataram', 'Kota', 22, 'Nusa Tenggara Barat (NTB)', '83131', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(277, 'Maybrat', 'Kabupaten', 25, 'Papua Barat', '98051', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(278, 'Medan', 'Kota', 34, 'Sumatera Utara', '20228', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(279, 'Melawi', 'Kabupaten', 12, 'Kalimantan Barat', '78619', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(280, 'Merangin', 'Kabupaten', 8, 'Jambi', '37319', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(281, 'Merauke', 'Kabupaten', 24, 'Papua', '99613', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(282, 'Mesuji', 'Kabupaten', 18, 'Lampung', '34911', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(283, 'Metro', 'Kota', 18, 'Lampung', '34111', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(284, 'Mimika', 'Kabupaten', 24, 'Papua', '99962', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(285, 'Minahasa', 'Kabupaten', 31, 'Sulawesi Utara', '95614', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(286, 'Minahasa Selatan', 'Kabupaten', 31, 'Sulawesi Utara', '95914', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(287, 'Minahasa Tenggara', 'Kabupaten', 31, 'Sulawesi Utara', '95995', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(288, 'Minahasa Utara', 'Kabupaten', 31, 'Sulawesi Utara', '95316', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(289, 'Mojokerto', 'Kabupaten', 11, 'Jawa Timur', '61382', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(290, 'Mojokerto', 'Kota', 11, 'Jawa Timur', '61316', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(291, 'Morowali', 'Kabupaten', 29, 'Sulawesi Tengah', '94911', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(292, 'Muara Enim', 'Kabupaten', 33, 'Sumatera Selatan', '31315', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(293, 'Muaro Jambi', 'Kabupaten', 8, 'Jambi', '36311', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(294, 'Muko Muko', 'Kabupaten', 4, 'Bengkulu', '38715', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(295, 'Muna', 'Kabupaten', 30, 'Sulawesi Tenggara', '93611', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(296, 'Murung Raya', 'Kabupaten', 14, 'Kalimantan Tengah', '73911', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(297, 'Musi Banyuasin', 'Kabupaten', 33, 'Sumatera Selatan', '30719', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(298, 'Musi Rawas', 'Kabupaten', 33, 'Sumatera Selatan', '31661', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(299, 'Nabire', 'Kabupaten', 24, 'Papua', '98816', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(300, 'Nagan Raya', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '23674', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(301, 'Nagekeo', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '86911', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(302, 'Natuna', 'Kabupaten', 17, 'Kepulauan Riau', '29711', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(303, 'Nduga', 'Kabupaten', 24, 'Papua', '99541', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(304, 'Ngada', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '86413', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(305, 'Nganjuk', 'Kabupaten', 11, 'Jawa Timur', '64414', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(306, 'Ngawi', 'Kabupaten', 11, 'Jawa Timur', '63219', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(307, 'Nias', 'Kabupaten', 34, 'Sumatera Utara', '22876', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(308, 'Nias Barat', 'Kabupaten', 34, 'Sumatera Utara', '22895', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(309, 'Nias Selatan', 'Kabupaten', 34, 'Sumatera Utara', '22865', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(310, 'Nias Utara', 'Kabupaten', 34, 'Sumatera Utara', '22856', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(311, 'Nunukan', 'Kabupaten', 16, 'Kalimantan Utara', '77421', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(312, 'Ogan Ilir', 'Kabupaten', 33, 'Sumatera Selatan', '30811', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(313, 'Ogan Komering Ilir', 'Kabupaten', 33, 'Sumatera Selatan', '30618', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(314, 'Ogan Komering Ulu', 'Kabupaten', 33, 'Sumatera Selatan', '32112', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(315, 'Ogan Komering Ulu Selatan', 'Kabupaten', 33, 'Sumatera Selatan', '32211', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(316, 'Ogan Komering Ulu Timur', 'Kabupaten', 33, 'Sumatera Selatan', '32312', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(317, 'Pacitan', 'Kabupaten', 11, 'Jawa Timur', '63512', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(318, 'Padang', 'Kota', 32, 'Sumatera Barat', '25112', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(319, 'Padang Lawas', 'Kabupaten', 34, 'Sumatera Utara', '22763', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(320, 'Padang Lawas Utara', 'Kabupaten', 34, 'Sumatera Utara', '22753', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(321, 'Padang Panjang', 'Kota', 32, 'Sumatera Barat', '27122', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(322, 'Padang Pariaman', 'Kabupaten', 32, 'Sumatera Barat', '25583', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(323, 'Padang Sidempuan', 'Kota', 34, 'Sumatera Utara', '22727', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(324, 'Pagar Alam', 'Kota', 33, 'Sumatera Selatan', '31512', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(325, 'Pakpak Bharat', 'Kabupaten', 34, 'Sumatera Utara', '22272', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(326, 'Palangka Raya', 'Kota', 14, 'Kalimantan Tengah', '73112', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(327, 'Palembang', 'Kota', 33, 'Sumatera Selatan', '30111', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(328, 'Palopo', 'Kota', 28, 'Sulawesi Selatan', '91911', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(329, 'Palu', 'Kota', 29, 'Sulawesi Tengah', '94111', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(330, 'Pamekasan', 'Kabupaten', 11, 'Jawa Timur', '69319', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(331, 'Pandeglang', 'Kabupaten', 3, 'Banten', '42212', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(332, 'Pangandaran', 'Kabupaten', 9, 'Jawa Barat', '46511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(333, 'Pangkajene Kepulauan', 'Kabupaten', 28, 'Sulawesi Selatan', '90611', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(334, 'Pangkal Pinang', 'Kota', 2, 'Bangka Belitung', '33115', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(335, 'Paniai', 'Kabupaten', 24, 'Papua', '98765', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(336, 'Parepare', 'Kota', 28, 'Sulawesi Selatan', '91123', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(337, 'Pariaman', 'Kota', 32, 'Sumatera Barat', '25511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(338, 'Parigi Moutong', 'Kabupaten', 29, 'Sulawesi Tengah', '94411', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(339, 'Pasaman', 'Kabupaten', 32, 'Sumatera Barat', '26318', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(340, 'Pasaman Barat', 'Kabupaten', 32, 'Sumatera Barat', '26511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(341, 'Paser', 'Kabupaten', 15, 'Kalimantan Timur', '76211', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(342, 'Pasuruan', 'Kabupaten', 11, 'Jawa Timur', '67153', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(343, 'Pasuruan', 'Kota', 11, 'Jawa Timur', '67118', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(344, 'Pati', 'Kabupaten', 10, 'Jawa Tengah', '59114', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(345, 'Payakumbuh', 'Kota', 32, 'Sumatera Barat', '26213', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(346, 'Pegunungan Arfak', 'Kabupaten', 25, 'Papua Barat', '98354', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(347, 'Pegunungan Bintang', 'Kabupaten', 24, 'Papua', '99573', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(348, 'Pekalongan', 'Kabupaten', 10, 'Jawa Tengah', '51161', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(349, 'Pekalongan', 'Kota', 10, 'Jawa Tengah', '51122', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(350, 'Pekanbaru', 'Kota', 26, 'Riau', '28112', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(351, 'Pelalawan', 'Kabupaten', 26, 'Riau', '28311', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(352, 'Pemalang', 'Kabupaten', 10, 'Jawa Tengah', '52319', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(353, 'Pematang Siantar', 'Kota', 34, 'Sumatera Utara', '21126', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(354, 'Penajam Paser Utara', 'Kabupaten', 15, 'Kalimantan Timur', '76311', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(355, 'Pesawaran', 'Kabupaten', 18, 'Lampung', '35312', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(356, 'Pesisir Barat', 'Kabupaten', 18, 'Lampung', '35974', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(357, 'Pesisir Selatan', 'Kabupaten', 32, 'Sumatera Barat', '25611', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(358, 'Pidie', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '24116', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(359, 'Pidie Jaya', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '24186', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(360, 'Pinrang', 'Kabupaten', 28, 'Sulawesi Selatan', '91251', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(361, 'Pohuwato', 'Kabupaten', 7, 'Gorontalo', '96419', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(362, 'Polewali Mandar', 'Kabupaten', 27, 'Sulawesi Barat', '91311', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(363, 'Ponorogo', 'Kabupaten', 11, 'Jawa Timur', '63411', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(364, 'Pontianak', 'Kabupaten', 12, 'Kalimantan Barat', '78971', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(365, 'Pontianak', 'Kota', 12, 'Kalimantan Barat', '78112', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(366, 'Poso', 'Kabupaten', 29, 'Sulawesi Tengah', '94615', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(367, 'Prabumulih', 'Kota', 33, 'Sumatera Selatan', '31121', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(368, 'Pringsewu', 'Kabupaten', 18, 'Lampung', '35719', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(369, 'Probolinggo', 'Kabupaten', 11, 'Jawa Timur', '67282', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(370, 'Probolinggo', 'Kota', 11, 'Jawa Timur', '67215', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(371, 'Pulang Pisau', 'Kabupaten', 14, 'Kalimantan Tengah', '74811', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(372, 'Pulau Morotai', 'Kabupaten', 20, 'Maluku Utara', '97771', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(373, 'Puncak', 'Kabupaten', 24, 'Papua', '98981', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(374, 'Puncak Jaya', 'Kabupaten', 24, 'Papua', '98979', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(375, 'Purbalingga', 'Kabupaten', 10, 'Jawa Tengah', '53312', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(376, 'Purwakarta', 'Kabupaten', 9, 'Jawa Barat', '41119', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(377, 'Purworejo', 'Kabupaten', 10, 'Jawa Tengah', '54111', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(378, 'Raja Ampat', 'Kabupaten', 25, 'Papua Barat', '98489', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(379, 'Rejang Lebong', 'Kabupaten', 4, 'Bengkulu', '39112', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(380, 'Rembang', 'Kabupaten', 10, 'Jawa Tengah', '59219', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(381, 'Rokan Hilir', 'Kabupaten', 26, 'Riau', '28992', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(382, 'Rokan Hulu', 'Kabupaten', 26, 'Riau', '28511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(383, 'Rote Ndao', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '85982', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(384, 'Sabang', 'Kota', 21, 'Nanggroe Aceh Darussalam (NAD)', '23512', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(385, 'Sabu Raijua', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '85391', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(386, 'Salatiga', 'Kota', 10, 'Jawa Tengah', '50711', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(387, 'Samarinda', 'Kota', 15, 'Kalimantan Timur', '75133', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(388, 'Sambas', 'Kabupaten', 12, 'Kalimantan Barat', '79453', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(389, 'Samosir', 'Kabupaten', 34, 'Sumatera Utara', '22392', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(390, 'Sampang', 'Kabupaten', 11, 'Jawa Timur', '69219', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(391, 'Sanggau', 'Kabupaten', 12, 'Kalimantan Barat', '78557', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(392, 'Sarmi', 'Kabupaten', 24, 'Papua', '99373', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(393, 'Sarolangun', 'Kabupaten', 8, 'Jambi', '37419', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(394, 'Sawah Lunto', 'Kota', 32, 'Sumatera Barat', '27416', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(395, 'Sekadau', 'Kabupaten', 12, 'Kalimantan Barat', '79583', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(396, 'Selayar (Kepulauan Selayar)', 'Kabupaten', 28, 'Sulawesi Selatan', '92812', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(397, 'Seluma', 'Kabupaten', 4, 'Bengkulu', '38811', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(398, 'Semarang', 'Kabupaten', 10, 'Jawa Tengah', '50511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(399, 'Semarang', 'Kota', 10, 'Jawa Tengah', '50135', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(400, 'Seram Bagian Barat', 'Kabupaten', 19, 'Maluku', '97561', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(401, 'Seram Bagian Timur', 'Kabupaten', 19, 'Maluku', '97581', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(402, 'Serang', 'Kabupaten', 3, 'Banten', '42182', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(403, 'Serang', 'Kota', 3, 'Banten', '42111', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(404, 'Serdang Bedagai', 'Kabupaten', 34, 'Sumatera Utara', '20915', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(405, 'Seruyan', 'Kabupaten', 14, 'Kalimantan Tengah', '74211', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(406, 'Siak', 'Kabupaten', 26, 'Riau', '28623', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(407, 'Sibolga', 'Kota', 34, 'Sumatera Utara', '22522', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(408, 'Sidenreng Rappang/Rapang', 'Kabupaten', 28, 'Sulawesi Selatan', '91613', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(409, 'Sidoarjo', 'Kabupaten', 11, 'Jawa Timur', '61219', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(410, 'Sigi', 'Kabupaten', 29, 'Sulawesi Tengah', '94364', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(411, 'Sijunjung (Sawah Lunto Sijunjung)', 'Kabupaten', 32, 'Sumatera Barat', '27511', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(412, 'Sikka', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '86121', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(413, 'Simalungun', 'Kabupaten', 34, 'Sumatera Utara', '21162', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(414, 'Simeulue', 'Kabupaten', 21, 'Nanggroe Aceh Darussalam (NAD)', '23891', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(415, 'Singkawang', 'Kota', 12, 'Kalimantan Barat', '79117', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(416, 'Sinjai', 'Kabupaten', 28, 'Sulawesi Selatan', '92615', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(417, 'Sintang', 'Kabupaten', 12, 'Kalimantan Barat', '78619', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(418, 'Situbondo', 'Kabupaten', 11, 'Jawa Timur', '68316', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(419, 'Sleman', 'Kabupaten', 5, 'DI Yogyakarta', '55513', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(420, 'Solok', 'Kabupaten', 32, 'Sumatera Barat', '27365', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(421, 'Solok', 'Kota', 32, 'Sumatera Barat', '27315', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(422, 'Solok Selatan', 'Kabupaten', 32, 'Sumatera Barat', '27779', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(423, 'Soppeng', 'Kabupaten', 28, 'Sulawesi Selatan', '90812', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(424, 'Sorong', 'Kabupaten', 25, 'Papua Barat', '98431', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(425, 'Sorong', 'Kota', 25, 'Papua Barat', '98411', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(426, 'Sorong Selatan', 'Kabupaten', 25, 'Papua Barat', '98454', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(427, 'Sragen', 'Kabupaten', 10, 'Jawa Tengah', '57211', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(428, 'Subang', 'Kabupaten', 9, 'Jawa Barat', '41215', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(429, 'Subulussalam', 'Kota', 21, 'Nanggroe Aceh Darussalam (NAD)', '24882', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(430, 'Sukabumi', 'Kabupaten', 9, 'Jawa Barat', '43311', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(431, 'Sukabumi', 'Kota', 9, 'Jawa Barat', '43114', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(432, 'Sukamara', 'Kabupaten', 14, 'Kalimantan Tengah', '74712', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(433, 'Sukoharjo', 'Kabupaten', 10, 'Jawa Tengah', '57514', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(434, 'Sumba Barat', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '87219', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(435, 'Sumba Barat Daya', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '87453', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(436, 'Sumba Tengah', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '87358', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(437, 'Sumba Timur', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '87112', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(438, 'Sumbawa', 'Kabupaten', 22, 'Nusa Tenggara Barat (NTB)', '84315', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(439, 'Sumbawa Barat', 'Kabupaten', 22, 'Nusa Tenggara Barat (NTB)', '84419', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(440, 'Sumedang', 'Kabupaten', 9, 'Jawa Barat', '45326', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(441, 'Sumenep', 'Kabupaten', 11, 'Jawa Timur', '69413', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(442, 'Sungaipenuh', 'Kota', 8, 'Jambi', '37113', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(443, 'Supiori', 'Kabupaten', 24, 'Papua', '98164', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(444, 'Surabaya', 'Kota', 11, 'Jawa Timur', '60119', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(445, 'Surakarta (Solo)', 'Kota', 10, 'Jawa Tengah', '57113', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(446, 'Tabalong', 'Kabupaten', 13, 'Kalimantan Selatan', '71513', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(447, 'Tabanan', 'Kabupaten', 1, 'Bali', '82119', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(448, 'Takalar', 'Kabupaten', 28, 'Sulawesi Selatan', '92212', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(449, 'Tambrauw', 'Kabupaten', 25, 'Papua Barat', '98475', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(450, 'Tana Tidung', 'Kabupaten', 16, 'Kalimantan Utara', '77611', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(451, 'Tana Toraja', 'Kabupaten', 28, 'Sulawesi Selatan', '91819', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(452, 'Tanah Bumbu', 'Kabupaten', 13, 'Kalimantan Selatan', '72211', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(453, 'Tanah Datar', 'Kabupaten', 32, 'Sumatera Barat', '27211', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(454, 'Tanah Laut', 'Kabupaten', 13, 'Kalimantan Selatan', '70811', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(455, 'Tangerang', 'Kabupaten', 3, 'Banten', '15914', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(456, 'Tangerang', 'Kota', 3, 'Banten', '15111', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(457, 'Tangerang Selatan', 'Kota', 3, 'Banten', '15332', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(458, 'Tanggamus', 'Kabupaten', 18, 'Lampung', '35619', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(459, 'Tanjung Balai', 'Kota', 34, 'Sumatera Utara', '21321', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(460, 'Tanjung Jabung Barat', 'Kabupaten', 8, 'Jambi', '36513', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(461, 'Tanjung Jabung Timur', 'Kabupaten', 8, 'Jambi', '36719', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(462, 'Tanjung Pinang', 'Kota', 17, 'Kepulauan Riau', '29111', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(463, 'Tapanuli Selatan', 'Kabupaten', 34, 'Sumatera Utara', '22742', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(464, 'Tapanuli Tengah', 'Kabupaten', 34, 'Sumatera Utara', '22611', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(465, 'Tapanuli Utara', 'Kabupaten', 34, 'Sumatera Utara', '22414', '2019-10-22 10:32:27', '2019-10-22 10:32:27');
INSERT INTO `raja_ongkir_cities` (`id`, `name`, `type`, `province_id`, `province_name`, `postal_code`, `created_at`, `updated_at`) VALUES
(466, 'Tapin', 'Kabupaten', 13, 'Kalimantan Selatan', '71119', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(467, 'Tarakan', 'Kota', 16, 'Kalimantan Utara', '77114', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(468, 'Tasikmalaya', 'Kabupaten', 9, 'Jawa Barat', '46411', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(469, 'Tasikmalaya', 'Kota', 9, 'Jawa Barat', '46116', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(470, 'Tebing Tinggi', 'Kota', 34, 'Sumatera Utara', '20632', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(471, 'Tebo', 'Kabupaten', 8, 'Jambi', '37519', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(472, 'Tegal', 'Kabupaten', 10, 'Jawa Tengah', '52419', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(473, 'Tegal', 'Kota', 10, 'Jawa Tengah', '52114', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(474, 'Teluk Bintuni', 'Kabupaten', 25, 'Papua Barat', '98551', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(475, 'Teluk Wondama', 'Kabupaten', 25, 'Papua Barat', '98591', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(476, 'Temanggung', 'Kabupaten', 10, 'Jawa Tengah', '56212', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(477, 'Ternate', 'Kota', 20, 'Maluku Utara', '97714', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(478, 'Tidore Kepulauan', 'Kota', 20, 'Maluku Utara', '97815', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(479, 'Timor Tengah Selatan', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '85562', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(480, 'Timor Tengah Utara', 'Kabupaten', 23, 'Nusa Tenggara Timur (NTT)', '85612', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(481, 'Toba Samosir', 'Kabupaten', 34, 'Sumatera Utara', '22316', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(482, 'Tojo Una-Una', 'Kabupaten', 29, 'Sulawesi Tengah', '94683', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(483, 'Toli-Toli', 'Kabupaten', 29, 'Sulawesi Tengah', '94542', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(484, 'Tolikara', 'Kabupaten', 24, 'Papua', '99411', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(485, 'Tomohon', 'Kota', 31, 'Sulawesi Utara', '95416', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(486, 'Toraja Utara', 'Kabupaten', 28, 'Sulawesi Selatan', '91831', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(487, 'Trenggalek', 'Kabupaten', 11, 'Jawa Timur', '66312', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(488, 'Tual', 'Kota', 19, 'Maluku', '97612', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(489, 'Tuban', 'Kabupaten', 11, 'Jawa Timur', '62319', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(490, 'Tulang Bawang', 'Kabupaten', 18, 'Lampung', '34613', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(491, 'Tulang Bawang Barat', 'Kabupaten', 18, 'Lampung', '34419', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(492, 'Tulungagung', 'Kabupaten', 11, 'Jawa Timur', '66212', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(493, 'Wajo', 'Kabupaten', 28, 'Sulawesi Selatan', '90911', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(494, 'Wakatobi', 'Kabupaten', 30, 'Sulawesi Tenggara', '93791', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(495, 'Waropen', 'Kabupaten', 24, 'Papua', '98269', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(496, 'Way Kanan', 'Kabupaten', 18, 'Lampung', '34711', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(497, 'Wonogiri', 'Kabupaten', 10, 'Jawa Tengah', '57619', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(498, 'Wonosobo', 'Kabupaten', 10, 'Jawa Tengah', '56311', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(499, 'Yahukimo', 'Kabupaten', 24, 'Papua', '99041', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(500, 'Yalimo', 'Kabupaten', 24, 'Papua', '99481', '2019-10-22 10:32:27', '2019-10-22 10:32:27'),
(501, 'Yogyakarta', 'Kota', 5, 'DI Yogyakarta', '55111', '2019-10-22 10:32:27', '2019-10-22 10:32:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `raja_ongkir_provinces`
--

CREATE TABLE `raja_ongkir_provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `raja_ongkir_provinces`
--

INSERT INTO `raja_ongkir_provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bali', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(2, 'Bangka Belitung', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(3, 'Banten', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(4, 'Bengkulu', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(5, 'DI Yogyakarta', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(6, 'DKI Jakarta', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(7, 'Gorontalo', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(8, 'Jambi', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(9, 'Jawa Barat', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(10, 'Jawa Tengah', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(11, 'Jawa Timur', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(12, 'Kalimantan Barat', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(13, 'Kalimantan Selatan', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(14, 'Kalimantan Tengah', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(15, 'Kalimantan Timur', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(16, 'Kalimantan Utara', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(17, 'Kepulauan Riau', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(18, 'Lampung', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(19, 'Maluku', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(20, 'Maluku Utara', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(21, 'Nanggroe Aceh Darussalam (NAD)', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(22, 'Nusa Tenggara Barat (NTB)', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(23, 'Nusa Tenggara Timur (NTT)', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(24, 'Papua', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(25, 'Papua Barat', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(26, 'Riau', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(27, 'Sulawesi Barat', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(28, 'Sulawesi Selatan', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(29, 'Sulawesi Tengah', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(30, 'Sulawesi Tenggara', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(31, 'Sulawesi Utara', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(32, 'Sumatera Barat', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(33, 'Sumatera Selatan', '2019-10-23 07:53:23', '2019-10-23 07:53:23'),
(34, 'Sumatera Utara', '2019-10-23 07:53:23', '2019-10-23 07:53:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reseipt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `nota`, `user_id`, `total`, `status`, `reseipt`, `created_at`, `updated_at`) VALUES
(1, 'INV/20200501121070000', 3, '70000', 'SEDANG DI PROSES', '-', '2020-05-05 03:01:12', '2020-05-05 03:10:39'),
(2, 'INV/202005151410100000', 4, '100000', 'DI TERIMA', '000369355492', '2020-05-05 03:15:14', '2020-05-05 04:26:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `bukti_transfer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `transfers`
--

INSERT INTO `transfers` (`id`, `user_id`, `bukti_transfer`, `created_at`, `updated_at`) VALUES
(1, 2, '7401983_aca565a4-8859-4b82-aaae-e8ea624beea5_1080_1080.jpg', '2020-05-05 02:44:28', '2020-05-05 02:44:28'),
(2, 3, '89424_169c56d2_467e_4e22_9c63_ae54c520a645.jpg', '2020-05-05 03:04:57', '2020-05-05 03:04:57'),
(3, 4, '89424_169c56d2_467e_4e22_9c63_ae54c520a645.jpg', '2020-05-05 03:15:50', '2020-05-05 03:15:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wahyu Safrizal', 'wahyusafrizal174@gmail.com', NULL, '$2y$10$LIElHAaCLwpHS3MRKdUz2.yjMZVQsKK1zqBSnKSiy/ToDt/Tk6kty', NULL, '2020-04-18 07:17:15', '2020-04-18 07:17:15'),
(2, 'Irma Muliana', 'irmamuliana01@gmail.com', NULL, '$2y$10$vu3309djX2mWxvHTbZ/vsuPVsWuSjyEDDvgr0YVlU1vwThLiUyI.S', NULL, '2020-04-19 10:19:23', '2020-04-19 10:19:23'),
(3, 'Indra Nur Sitatun', 'indranur@gmail.com', NULL, '$2y$10$HZhv/h2DGUyuJwGxop1M0Os7iS0aaP6./O4qwY68T0RtyQiexGeUW', NULL, '2020-05-05 02:58:39', '2020-05-05 02:58:39'),
(4, 'Nuris Akbar', 'nuris.akbar@gmail.com', NULL, '$2y$10$Vkomw5fLk1iyRzrz8xwLw.sVkq1PiShGnHqkZ3CGhO54EH.bS2BFO', NULL, '2020-05-05 03:12:02', '2020-05-05 03:12:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `raja_ongkir_cities`
--
ALTER TABLE `raja_ongkir_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `raja_ongkir_provinces`
--
ALTER TABLE `raja_ongkir_provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
