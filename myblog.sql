-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 05:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Artikel', 'file/category/y0jFXFIhXUGtvC1p1Z1c-article.jpg', '2022-01-01 00:42:55', '2022-01-04 21:00:09'),
(2, 'Finansial', 'file/category/uaomdT8rjuVPemdGl0RQ-finance.jpg', '2022-01-01 00:43:18', '2022-01-04 21:00:15'),
(3, 'Memes', 'file/category/u9lVWr7HdovqfaLKEthH-meme.jpg', '2022-01-01 00:43:27', '2022-01-01 00:43:27'),
(4, 'Tutorial', 'file/category/hqZ1yUAvHs8dfERnOqn7-tutorial.jpg', '2022-01-04 21:03:03', '2022-01-04 21:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `subject`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'Namku Adalah', 'iniemailku@gmail.com', 'ini subject', 'ini komentar panjang lebar haha', '2022-01-01 03:15:34', '2022-01-01 03:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mainmenus`
--

CREATE TABLE `mainmenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) NOT NULL DEFAULT 0,
  `category` enum('link','content','file') COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mainmenus`
--

INSERT INTO `mainmenus` (`id`, `title`, `parent`, `category`, `content`, `file`, `url`, `order`, `status`, `created_at`, `updated_at`) VALUES
(10, 'HOME', 0, 'link', NULL, '', '/', 1, 1, '2022-01-03 08:21:02', '2022-01-03 08:21:33'),
(11, 'ABOUT', 0, 'link', NULL, '', '/about', 2, 1, '2022-01-03 08:21:55', '2022-01-03 08:21:55'),
(12, 'CATEGORIES', 0, 'link', NULL, '', '/', 3, 1, '2022-01-03 08:22:48', '2022-01-03 08:22:48'),
(13, 'Article', 12, 'link', NULL, '', '/category/1', 1, 1, '2022-01-03 08:23:38', '2022-01-03 08:23:38'),
(14, 'Finance', 12, 'link', NULL, '', '/category/2', 2, 1, '2022-01-03 08:24:15', '2022-01-03 08:24:15'),
(15, 'Memes', 12, 'link', NULL, '', '/category/3', 3, 1, '2022-01-03 08:24:28', '2022-01-03 08:24:28'),
(16, 'CONTACT', 0, 'link', NULL, '', '/contact', 4, 1, '2022-01-03 08:25:18', '2022-01-03 08:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Amega', 'amge@gmail.com', 'Ini Subject Message', 'Hanya tes message saja\r\nOke ini line 2\r\nLine 3', '2022-01-03 07:15:00', '2022-01-03 07:15:00'),
(2, 'Name2', 'emailku@gmail.com', 'Subject kedua', 'haha\r\nhihi\r\nleave a contact here\r\nmessage only', '2022-01-03 07:23:05', '2022-01-03 07:23:05');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_27_075125_create_sliders_table', 1),
(6, '2021_12_27_075402_create_contacts_table', 1),
(7, '2021_12_27_075453_create_messages_table', 1),
(8, '2021_12_27_082620_create_about_me', 1),
(9, '2021_12_27_083642_create_categories_table', 1),
(10, '2021_12_27_083730_create_posts_table', 1),
(11, '2021_12_28_061938_add_image_to_users_table', 1),
(12, '2021_12_29_023122_create_main_menus_table', 1),
(13, '2021_12_29_070048_create_comments_table', 1),
(14, '2021_12_31_065206_add_category_id_to_sliders_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_headline` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `thumbnail`, `category_id`, `content`, `is_headline`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Membaca Kepribadian Dari Tulisan', 'file/post/cLFTG1197F1xSbNkQkOZ-article.jpg', 1, '<p>Grafologi merupakan sebuah ilmu yang menganalisa tulisan tangan untuk mengetahui kepribadian. Bagaimana cara membaca kepribadian seseorang dari tulisan tangannya? Berikut trik dan cara mudah mengetahui kepribadian seseorang lewat tulisan tangannya. Menurut grafolog Deborah Dewi, tulisan tangan bukan hanya sebuah seni tetapi juga memiliki kekuatan tersendiri. Kombinasi pola layout, pergerakan, kecepatan, ukuran, kemiringan, jarak, tinggi, lebar, tekanan, bentuk huruf secara detail, koma bahkan tanda titik ketika diintegrasikan dengan tepat bisa menggambarkan karakter pemilik tulisan tangan.</p>\r\n\r\n<p>Berikut ada beberapa faktor yang mempengaruhi cara menulis :</p>\r\n\r\n<ol>\r\n	<li>Kombinasi pola layout</li>\r\n	<li>Movement</li>\r\n	<li>Form</li>\r\n</ol>', 1, 1, '2022-01-01 00:44:06', '2022-01-04 21:10:48'),
(2, 'Cara Financial Planning', 'file/post/ob5OThN5jPpb3EEKVJ78-finance.jpg', 2, '<p>Manfaat dari perencanaan keuangan bisa dirasakan dengan adanya &ldquo;arah dan arti&rdquo; keputusan finansial seseorang. Melalui pengelolaan keuangan, seseorang bisa mengerti bagaimana setiap keputusan keuangan yang dibuat berdampak ke area lain dari keseluruhan situasi keuangan dirinya. Dengan melihat setiap keputusan finansial sebagai bagian dari suatu keseluruhan, seseorang dapat mempertimbangkan efek jangka pendek dan jangka panjang atas tujuan-tujuan hidupnya. Dia dapat lebih mudah beradaptasi atas perubahan hidup dan merasa lebih aman karena tujuan-tujuannya berada di jalur yang tepat.</p>\r\n\r\n<p>Perencanaan keuangan dapat dijadikan sebagai alat untuk bisa memenuhi kebutuhan-kebutuhan keuangan di masa kini dan masa depan.</p>\r\n\r\n<p>Pada akhirnya nanti, seseorang berharap bisa mencapai tujuan akhir dari perencanaan keuangan yaitu kebebasan finansial (financial freedom), yang dapat diartikan : bebas dari hutang, tersedianya arus penghasilan dari investasi yang telah dilakukannya, serta terproteksi secara finansial dari risiko apapun yang mungkin terjadi.</p>\r\n\r\n<p>Dalam menyusun perencanaan keuangan, seseorang akan dipengaruhi oleh kondisi (live event) yang sedang dialaminya sehingga dengan demikian perencanaan keuangan akan bersifat spesifik. Perencanaan keuangan juga merupakan suatu proses yang berkesinambungan dan bersifat dinamis. Pada suatu saat, rencana tersebut dapat memerlukan penyesuaian.</p>\r\n\r\n<p>Berikut merupakan beberapa kondisi atau kejadian yang dapat mempengaruhi perencanaan keuangan seseorang :</p>\r\n\r\n<ul>\r\n	<li>Status perkawinannya (belum menikah atau sudah menikah)</li>\r\n	<li>Kondisi pekerjaan (sudah memiliki pekerjaan tetap atau belum)</li>\r\n	<li>Usianya (umur yang semakin bertambah)</li>\r\n	<li>Kondisi keluarganya (jumlah anggota keluarga yang manjadi tanggungan)</li>\r\n	<li>Kondisi perekonomian nasional (kemudahan dalam mencari pekerjaan dan penghasilan)</li>\r\n	<li>Tingkat pendidikannya (tingkat pendidikan mempengaruhi penghasilan), serta</li>\r\n	<li>Kondisi kesehatannya (mempengaruhi biaya dan kelangsungan dari pendapatan).</li>\r\n</ul>\r\n\r\n<p>Perubahan pada salah satu atau beberapa kondisi di atas dapat mempengaruhi perencanaan keuangan yang sudah dibuat seseorang atau keluarga. Sehingga seringkali perencanaan keuangan seseorang harus disusun kembali (bersifat dinamis).</p>', 1, 1, '2022-01-01 00:44:32', '2022-01-04 21:11:46'),
(3, 'Ide Membuat Memes', 'file/post/oOADo71iKXkCo26Gjsmk-meme.jpg', 3, '<p>Meme&nbsp;telah menjelma menjadi sebuah budaya populer di era saat ini. Dimulai dari 9Gag, meme banyak digunakan untuk bahan lelucon atau humor satire. Dengan menggunakan meme untuk menarik perhatian khalayak, Anda bahkan bisa panjat sosial di media sosial.</p>\r\n\r\n<p>Berikut beberapa tools yang bisa digunakan untuk membuat memes</p>\r\n\r\n<ol>\r\n	<li>Meme Generator Free</li>\r\n	<li>Meme Soundboard 2021</li>\r\n	<li>Memasik - Meme Maker Free</li>\r\n	<li>Meme Generator - Create Funny Memes</li>\r\n	<li>Mematic - The Meme Maker</li>\r\n</ol>\r\n\r\n<p>Berikut cara membuat meme&nbsp;dengan mudah dan cepat:</p>\r\n\r\n<ol>\r\n	<li>Pilih template gambar meme yang berada di daftar meme. Berbagai meme mulai dari &#39;Creepy Tobey Maguire&#39;, &#39; The Great Gatsby&#39;, &#39;Crying Peter Parker&#39;, hingga &#39;Batman Slapping Robin&#39; ada di sini.</li>\r\n	<li>Karakteristik caption meme adalah teks di atas dan di bawah gambar meme. Aplikasi telah menyediakan edit teks di atas dan di bawah gambar. Ketik caption kreatif nan kocak yang Anda mau.</li>\r\n	<li>Pengguna bisa mengatur tata letak teks apabila teks terlalu panjang. Tekan teks dan usap ke posisi yang cocok di mata Ada.</li>\r\n	<li>Pengguna bisa memberikan warna pada teks dan mengatur font. Pilih kaleng cat untuk mengubah warna, dan&nbsp; pilih huruf &#39;A&#39; untuk mengatur font.</li>\r\n	<li>Anda juga bisa menggunakan foto dari galeri untuk disunting menjadi meme.. Anda tinggal memiliki ikon &#39;+&#39;.</li>\r\n</ol>', 1, 1, '2022-01-01 00:44:51', '2022-01-04 21:14:32'),
(4, 'Tutorial Mengganti Oli Motor', 'file/post/EmW07fb6yfEsoYiafVXb-oli.jpg', 4, '<p>Ganti oli motor secara rutin setiap menempuh 2.000 km merupakan salah satu cara perawatan motor yang tidak boleh Anda lewatkan, hal ini adalah cara agar komponen-komponen di dalam mesin dapat bekerja dengan optimal dan memberikan Anda pengalaman berkendara yang nyaman.</p>\r\n\r\n<p>Bagi mereka yang sibuk dengan rutinitas pekerjaan sehari-hari umumnya akan menyerahkan proses penggantian oli mesin dan oli gardan pada mekanik di bengkel. Namun, saya menyarankan ada baiknya untuk melakukan sendiri penggantian oli motor Anda.</p>\r\n\r\n<p>Keuntungan mengganti oli sendiri adalah Anda dapat mengamati kondisi motor Anda lebih seksama, mulai dari melihat kondisi ban, tekanan angin hinga memeriksa komponen-komponen yang mungkin saja telah aus. Selain itu, kegiatan ini akan membantu Anda menghemat pengeluaran yang harusnya digunakan untuk membayar upah jasa ganti oli di bengkel.&nbsp;</p>\r\n\r\n<ol>\r\n	<li>Panaskan mesin</li>\r\n	<li>Kuras oli mesin</li>\r\n	<li>Periksa filter oli</li>\r\n	<li>Pasang baut penutup oli</li>\r\n	<li>Ganti oli baru</li>\r\n</ol>\r\n\r\n<p>Demikian tutorial Cara Ganti Oli Motor dengan Benar, semoga informasi yang kami sampaikan dapat menambah wawasan Anda mengenai perawatan kendaraan pribadi Anda secara mandiri, dan sampai jumpa pada artikel-artikel kami selanjutnya.</p>', 0, 1, '2022-01-04 21:07:35', '2022-01-04 21:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `category_id`, `url`, `order`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Kumpulan Finansial', 'file/slider/rFFFpkZicdf0WsHVqSrC-finansial-slider.jpg', 2, 'category/2', 2, 1, '2022-01-04 21:25:57', '2022-01-04 21:25:57'),
(6, 'Kumpulan Artikel', 'file/slider/jF0u0ZjgOlGZHF0fhtVI-artikel-slider.jpg', 1, 'category/1', 1, 1, '2022-01-04 21:26:47', '2022-01-04 21:26:47'),
(7, 'Kumpulan Memes', 'file/slider/BhCTxXqu7cwMM1LMiPak-memes-slider.jpg', 3, 'category/3', 3, 1, '2022-01-04 21:27:28', '2022-01-04 21:27:28'),
(8, 'Kumpulan Tutorial', 'file/slider/HCmzAL7Vba9kxAQTxLYG-tutorial-slider.png', 4, 'category/4', 4, 1, '2022-01-04 21:27:52', '2022-01-04 21:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `desc`, `email`, `email_verified_at`, `password`, `remember_token`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Nathanael Fredericko Wibawanto', 'nathfred', 'Penulis blog amatir yang suka menulis apapun yang ada di pikiran, walau sebenarnya tidak pandai menulis tapi yasudahlah.', 'sample1@gmail.com', '2021-12-31 11:59:31', '$2y$10$Jy6jVgnhPbUQ0PKEaGtfPubwydYZRdQNj0UQIfVfcbBDJRs7diOIe', 'hpklAuQTRS', 'file/admin/idsBc6dKJJwltrJH7i39-bg-register.jpg', '2021-12-31 04:59:31', '2022-01-04 20:59:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `comments_post_id_foreign` (`post_id`);

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
-- Indexes for table `mainmenus`
--
ALTER TABLE `mainmenus`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mainmenus`
--
ALTER TABLE `mainmenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
