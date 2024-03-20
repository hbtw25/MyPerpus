-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Mar 2024 pada 09.11
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_19_ukk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukus`
--

CREATE TABLE `bukus` (
  `id_buku` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_terbit` year NOT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` bigint UNSIGNED NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bukus`
--

INSERT INTO `bukus` (`id_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `synopsis`, `cover`, `stock`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Dompet Ayah Sepatu Ibu', 'J. S. Khairen', 'Gramedia Widia Sarana Indonesia', '2023', 'The world is evil and you lost? Look at the palm of your hand. Father always forged that hand to not give up. Mom never stops holding that hand to pray. Rise up to take a step. This is the story of a father and mother, whose love was born even before you were born, whose love grew even before you grew. This is a story of fathers and mothers, whose tears can light a fire, whose tears can put out a fire. The hottest fire is lit when mom and dad cry in disappointment. The hottest fire is extinguished by mom and dad\'s tears of struggle. So, always remember home.', 'images/Dompet Ayah Sepatu Ibu.png', 17, '1', NULL, '2024-03-19 12:21:39', NULL),
(2, 'Laut Bercerita', 'Leila S. Chudori', 'Penerbit KPG', '2017', 'At dusk, in a flat in Jakarta, a student named Biru Laut was ambushed by four unknown men. Together with his friends, Daniel Tumbuan, Sunu Dyantoro, Alex Perazon, he was taken to an unknown place. For months they were held captive, interrogated, beaten, kicked, hung and electrocuted to answer one important question: who was behind the activist and student movements at the time.', 'images/Laut Bercerita.png', 5, '1', NULL, '2024-03-19 12:21:39', NULL),
(3, 'Talking to Strangers', 'Malcolm Gladwell', 'Penguin Books', '2019', 'How did Fidel Castro fool the CIA for a generation? Why did Neville Chamberlain think he could trust Adolf Hitler? Why are campus sexual assaults on the rise? Do television sitcoms teach us something about the way we relate to each other that isn\'t true? While tackling these questions, Malcolm Gladwell was not solely writing a book for the page. He was also producing for the ear. In the audiobook version of Talking to Strangers, you\'ll hear the voices of people he interviewed--scientists, criminologists, military psychologists. Court transcripts are brought to life with re-enactments. You actually hear the contentious arrest of Sandra Bland by the side of the road in Texas. As Gladwell revisits the deceptions of Bernie Madoff, the trial of Amanda Knox, and the suicide of Sylvia Plath, you hear directly from many of the players in these real-life tragedies. There\'s even a theme song - Janelle Monae\'s \'Hell You Talmbout.\' Something is very wrong, Gladwell argues, with the tools and strategies we use to make sense of people we don\'t know. And because we don\'t know how to talk to strangers, we are inviting conflict and misunderstanding in ways that have a profound effect on our lives and our world.', 'images/Talking to Strangers.png', 20, '1', NULL, '2024-03-19 12:21:39', NULL),
(4, 'The Visual MBA', 'Jason Barron', 'Penguin Books', '2019', 'Jason Barron spent 516 hours in class, completed mountains of homework and shelled out tens of thousands of dollars to complete his MBA at the BYU Marriott School of Business. Along the way, rather than taking boring notes that he would never read (nor use) again, Jason created sketch notes for each class—visually capturing the essential points of his education—and providing an engaging and invaluable resource.   Once finished with his MBA, Jason launched a widely successful Kickstarter campaign distilling these same notes into a self-published book to help aspiring business leaders of all backgrounds and income levels understand the critical concepts one learns in business school.   Whether you are thinking about applying to business school, are currently in college studying business, or have always wondered what is taught in an MBA program, this highly entertaining and visual book is for you.', 'images/The Visual MBA.png', 34, '1', NULL, '2024-03-19 12:21:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `kategoribuku_relasis`
--

CREATE TABLE `kategoribuku_relasis` (
  `id_kategori_buku` bigint UNSIGNED NOT NULL,
  `id_buku` bigint UNSIGNED NOT NULL,
  `id_kategori` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoribuku_relasis`
--

INSERT INTO `kategoribuku_relasis` (`id_kategori_buku`, `id_buku`, `id_kategori`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 2, 8, NULL, NULL),
(6, 2, 5, NULL, NULL),
(7, 2, 6, NULL, NULL),
(8, 2, 7, NULL, NULL),
(9, 3, 3, NULL, NULL),
(10, 3, 4, NULL, NULL),
(11, 3, 6, NULL, NULL),
(12, 3, 7, NULL, NULL),
(13, 4, 3, NULL, NULL),
(14, 4, 2, NULL, NULL),
(15, 4, 8, NULL, NULL),
(16, 4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id_kategori` bigint UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id_kategori`, `nama`, `deskripsi`, `flag_active`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Action', 'Action films usually include high energy, big-budget physical stunts and chases, possibly with rescues, battles, fights, escapes, destructive crises, etc.', 'Y', '1', NULL, NULL, '2024-03-19 12:21:39', NULL),
(2, 'Adventure', 'Adventure films are usually exciting stories, with new experiences or exotic locales, very similar to or often paired with the action film genre.', 'Y', '1', NULL, NULL, '2024-03-19 12:21:39', NULL),
(3, 'Comedy', 'Comedy is a story that tells about a series of funny, or comical events, intended to make the audience laugh. It is a very open genre, and thus crosses over with many other genres on a regular basis.', 'Y', '1', NULL, NULL, '2024-03-19 12:21:39', NULL),
(4, 'Drama', 'Drama is a genre of narrative fiction (or semi-fiction) intended to be more serious than humorous in tone, focusing on in-depth development of realistic characters who must deal with realistic emotional struggles.', 'Y', '1', NULL, NULL, '2024-03-19 12:21:39', NULL),
(5, 'Horror', 'Horror is a genre of speculative fiction which is intended to frighten, scare, disgust, or startle its readers by inducing feelings of horror and terror. Literary historian J. A.', 'Y', '1', NULL, NULL, '2024-03-19 12:21:39', NULL),
(6, 'Mystery', 'Mystery fiction is a genre of fiction usually involving a mysterious death or a crime to be solved. In a closed circle of suspects, each suspect must have a credible motive and a reasonable opportunity for committing the crime.', 'Y', '1', NULL, NULL, '2024-03-19 12:21:39', NULL),
(7, 'Romance', 'The romance genre is about love and emotion. It is about relationships, family, and friendship. It is about the way people grow and change. It is about the way life changes people. It is about the way love changes people. It is about the way love changes the world.', 'Y', '1', NULL, NULL, '2024-03-19 12:21:39', NULL),
(8, 'Science Fiction', 'Science fiction is a genre of speculative fiction that typically deals with imaginative and futuristic concepts such as advanced science and technology, space exploration, time travel, parallel universes, and extraterrestrial life.', 'Y', '1', NULL, NULL, '2024-03-19 12:21:39', NULL),
(9, 'Thriller', 'Thriller is a broad genre of literature, film, and television programming that uses suspense, tension, and excitement as its main elements. Thrillers heavily stimulate the viewer\'s moods, giving them a high level of anticipation, ultra-heightened expectation, uncertainty, surprise, anxiety, and terror.', 'Y', '1', NULL, NULL, '2024-03-19 12:21:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi_pribadis`
--

CREATE TABLE `koleksi_pribadis` (
  `id_koleksi` bigint UNSIGNED NOT NULL,
  `id_buku` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `koleksi_pribadis`
--

INSERT INTO `koleksi_pribadis` (`id_koleksi`, `id_buku`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 1, 2, '2024-03-19 12:21:39', NULL),
(3, 1, 3, '2024-03-19 12:21:39', NULL),
(4, 2, 2, '2024-03-19 12:21:39', NULL),
(5, 2, 3, '2024-03-19 12:21:39', NULL),
(7, 3, 3, '2024-03-19 12:21:39', NULL),
(8, 4, 1, '2024-03-19 12:21:39', NULL),
(9, 4, 2, '2024-03-19 12:21:39', NULL),
(10, 1, 1, '2024-03-19 13:30:40', '2024-03-19 13:30:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_05_014735_create_kategoris_table', 1),
(6, '2024_03_05_014852_create_bukus_table', 1),
(7, '2024_03_05_015122_create_kategoribuku_relasis_table', 1),
(8, '2024_03_05_015507_create_peminjamen_table', 1),
(9, '2024_03_05_020106_create_koleksi_pribadis_table', 1),
(10, '2024_03_05_020230_create_ulasan_bukus_table', 1),
(11, '2024_03_05_020444_create_trigger_stok_bukus_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjamen`
--

CREATE TABLE `peminjamen` (
  `id_peminjaman` bigint UNSIGNED NOT NULL,
  `id_buku` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status` enum('dipinjam','dikembalikan','terlambat') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dipinjam',
  `tanggal_dikembalikan` date DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjamen`
--

INSERT INTO `peminjamen` (`id_peminjaman`, `id_buku`, `id_user`, `jumlah`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status`, `tanggal_dikembalikan`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 2, '2024-03-19', '2024-03-26', 'dikembalikan', '2024-03-21', '1', '2024-03-19 12:21:39', NULL),
(2, 2, 5, 1, '2024-02-19', '2024-02-26', 'dipinjam', NULL, '1', '2024-03-19 12:21:39', NULL),
(3, 3, 4, 4, '2024-03-11', '2024-03-18', 'terlambat', NULL, '1', '2024-03-19 12:21:39', NULL),
(4, 2, 4, 2, '2024-03-11', '2024-03-18', 'dikembalikan', '2024-03-16', '1', '2024-03-19 12:21:39', NULL),
(5, 2, 4, 5, '2024-03-11', '2024-03-18', 'dikembalikan', '2024-03-16', '1', '2024-03-19 12:21:39', NULL),
(6, 2, 4, 1, '2024-03-11', '2024-03-18', 'dikembalikan', '2024-03-16', '1', '2024-03-19 12:21:39', NULL),
(7, 2, 6, 1, '2024-02-19', '2024-02-26', 'dipinjam', NULL, '1', '2024-03-19 12:21:39', NULL);

--
-- Trigger `peminjamen`
--
DELIMITER $$
CREATE TRIGGER `TR_decrease_book_stock_AI` AFTER INSERT ON `peminjamen` FOR EACH ROW BEGIN
                UPDATE bukus SET stock = bukus.stock - NEW.jumlah
                    WHERE bukus.id_buku = NEW.id_buku;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TR_increase_book_stock_AU` AFTER UPDATE ON `peminjamen` FOR EACH ROW BEGIN
                UPDATE bukus SET stock = bukus.stock + OLD.jumlah
                WHERE bukus.id_buku = OLD.id_buku;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `ulasan_bukus`
--

CREATE TABLE `ulasan_bukus` (
  `id_ulasan` bigint UNSIGNED NOT NULL,
  `id_buku` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ulasan_bukus`
--

INSERT INTO `ulasan_bukus` (`id_ulasan`, `id_buku`, `id_user`, `body`, `rating`, `photo`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 'Prepare to have your mind blown by \'Dompet Ayah Sepatu Ibu\'. This book seamlessly blends elements of science fiction, fantasy, and metaphysics to create a truly unique reading experience. The author\'s imagination knows no bounds, crafting a world where time is fluid and reality is mutable. With its vivid imagery and captivating storytelling, this book will leave you pondering the nature of existence long after you\'ve turned the final page.', 2, NULL, '2024-03-19 12:21:39', NULL),
(4, 2, 1, 'Thought-provoking narrative and rich prose. A must-read for any avid book lover!', 5, NULL, '2024-03-19 12:21:39', NULL),
(6, 2, 3, 'Immersive storytelling! An enriching literary experience worth savoring and sharing.', 1, NULL, '2024-03-19 12:21:39', NULL),
(10, 1, 2, '<p>dasdsadadadas</p>', 5, 'book-reviews/vdX5eZCyFIA9jDRscwFWSmggPB3zm5JQUUzVairj.png', '2024-03-19 12:56:45', '2024-03-19 12:56:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('peminjam','petugas','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'peminjam',
  `flag_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `username`, `alamat`, `email`, `profile_picture`, `email_verified_at`, `password`, `role`, `flag_active`, `created_by`, `updated_by`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'hbtw', 'hbtw', 'garut', 'hbtw@gmail.com', NULL, NULL, '$2y$12$H9mYJX.pvCSEpFoQEBrv3.rU4.LNqUqClU9S0j/4Xos0j/ZuGi1VW', 'admin', 'Y', 'root', NULL, NULL, NULL, '2024-03-19 12:21:38', NULL),
(2, 'adira', 'adira', 'Jakarta', 'adira@gmail.com', NULL, NULL, '$2y$12$o0.bkNU.ZDehc3roee8ogurELl9Pdpf1mVRwrhLl/Klv8cNlZ631u', 'petugas', 'Y', 'root', NULL, NULL, NULL, '2024-03-19 12:21:38', NULL),
(3, 'ucupestes', 'dxx', 'Jakarta', 'ucup@gmail.com', NULL, NULL, '$2y$12$5NRwo/Qik0HrgE8WISrPiuaKM7y2vbLmSxZegEqjnHeuPF5w3xIoi', 'peminjam', 'Y', '1', NULL, NULL, NULL, '2024-03-19 12:21:38', NULL),
(4, 'Budi Santoso', 'budisantoso', 'Surabaya', 'budi.santoso@gmail.com', NULL, NULL, '$2y$12$hCzgfZj.dCDLCVrwAJ/sf.AiFykHiUVUNkbICR6VeYfiXxuk/1TQG', 'peminjam', 'Y', '1', NULL, NULL, NULL, '2024-03-19 12:21:38', NULL),
(5, 'Rina Fitriani', 'rinafitriani', 'Bandung', 'rina.fitriani@gmail.com', NULL, NULL, '$2y$12$D8SpSJjm0qXwN8Cjdkstjuc4CI0DcgJVjc7E2CHhRjTt7EEZU/QWu', 'peminjam', 'N', '1', NULL, NULL, NULL, '2024-03-19 12:21:38', NULL),
(6, 'Dewi Lestari', 'dewilestari', 'Yogyakarta', 'dewi.lestari@gmail.com', NULL, NULL, '$2y$12$F0Omo6DGyJLiy9aza48mxeimUnp.Z7/RRC5oCpGAJapEvoXc9CNLq', 'peminjam', 'Y', '1', NULL, NULL, NULL, '2024-03-19 12:21:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategoribuku_relasis`
--
ALTER TABLE `kategoribuku_relasis`
  ADD PRIMARY KEY (`id_kategori_buku`),
  ADD KEY `kategoribuku_relasis_id_buku_foreign` (`id_buku`),
  ADD KEY `kategoribuku_relasis_id_kategori_foreign` (`id_kategori`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `koleksi_pribadis`
--
ALTER TABLE `koleksi_pribadis`
  ADD PRIMARY KEY (`id_koleksi`),
  ADD KEY `koleksi_pribadis_id_buku_foreign` (`id_buku`),
  ADD KEY `koleksi_pribadis_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `peminjamen_id_buku_foreign` (`id_buku`),
  ADD KEY `peminjamen_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `ulasan_bukus`
--
ALTER TABLE `ulasan_bukus`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `ulasan_bukus_id_buku_foreign` (`id_buku`),
  ADD KEY `ulasan_bukus_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id_buku` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoribuku_relasis`
--
ALTER TABLE `kategoribuku_relasis`
  MODIFY `id_kategori_buku` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id_kategori` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `koleksi_pribadis`
--
ALTER TABLE `koleksi_pribadis`
  MODIFY `id_koleksi` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  MODIFY `id_peminjaman` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ulasan_bukus`
--
ALTER TABLE `ulasan_bukus`
  MODIFY `id_ulasan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kategoribuku_relasis`
--
ALTER TABLE `kategoribuku_relasis`
  ADD CONSTRAINT `kategoribuku_relasis_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `bukus` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategoribuku_relasis_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id_kategori`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `koleksi_pribadis`
--
ALTER TABLE `koleksi_pribadis`
  ADD CONSTRAINT `koleksi_pribadis_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `bukus` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `koleksi_pribadis_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD CONSTRAINT `peminjamen_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `bukus` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjamen_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ulasan_bukus`
--
ALTER TABLE `ulasan_bukus`
  ADD CONSTRAINT `ulasan_bukus_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `bukus` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `ulasan_bukus_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
