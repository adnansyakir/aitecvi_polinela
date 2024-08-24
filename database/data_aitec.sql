-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2024 pada 14.58
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aitec`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang_perlombaan`
--

CREATE TABLE `cabang_perlombaan` (
  `id` int(200) NOT NULL,
  `nama_perlombaan` varchar(200) DEFAULT NULL,
  `kode_perlombaan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cabang_perlombaan`
--

INSERT INTO `cabang_perlombaan` (`id`, `nama_perlombaan`, `kode_perlombaan`) VALUES
(1, 'cipta Inovasi', 'CI09'),
(4300000, 'Menanam Padi', '091');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasillomba`
--

CREATE TABLE `hasillomba` (
  `id` int(11) NOT NULL,
  `pendaftaran_id` int(200) NOT NULL,
  `cabang_perlombaan_id` int(200) NOT NULL,
  `nilai_juri1` int(200) NOT NULL,
  `nilai_juri2` int(100) NOT NULL,
  `nilai_juri3` int(50) NOT NULL,
  `catatan_juri1` varchar(100) DEFAULT NULL,
  `catatan_juri2` varchar(100) DEFAULT NULL,
  `catatan_juri3` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL,
  `total_nilai` int(100) NOT NULL,
  `hasil_akhir` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasillomba`
--

INSERT INTO `hasillomba` (`id`, `pendaftaran_id`, `cabang_perlombaan_id`, `nilai_juri1`, `nilai_juri2`, `nilai_juri3`, `catatan_juri1`, `catatan_juri2`, `catatan_juri3`, `keterangan`, `total_nilai`, `hasil_akhir`) VALUES
(6, 662, 1, 80, 80, 80, '1721363111_35230deae3892b3db4d8.pdf', '1721363111_bf725ab28d9dc7c2ce7c.pdf', '1721363111_fb3a55e79165eca2d0a7.pdf', 'Juara 1', 240, 80),
(962092, 2147483647, 1, 80, 90, 60, '1721364431_87cd017b8f52d51026aa.pdf', '1721364431_35d8376a8e89e356685e.pdf', '1721364431_52976f822a2e334c462d.pdf', 'Juara 2', 230, 77),
(967897, 662, 4300000, 80, 90, 90, '1721875937_33f9801e962beafb170d.pdf', '1721875937_7d75296f33a847360ab1.pdf', '1721875937_278b343046e913f0a61e.pdf', 'Juara 3', 260, 87),
(2147483647, 2147483647, 4300000, 80, 90, 60, '1722170813_2d7fb7a82cc45416b3fe.pdf', '1722170813_c10387069c758fcd4c53.pdf', '1722170813_5fc28a9173a39c63f924.pdf', 'Juara 2', 230, 77);

-- --------------------------------------------------------

--
-- Struktur dari tabel `juri`
--

CREATE TABLE `juri` (
  `id` int(200) NOT NULL,
  `kode_juri` varchar(200) NOT NULL,
  `nama_juri` varchar(200) NOT NULL,
  `pt_id` int(200) NOT NULL,
  `cabang_perlombaan_id` varchar(200) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `juri`
--

INSERT INTO `juri` (`id`, `kode_juri`, `nama_juri`, `pt_id`, `cabang_perlombaan_id`, `keterangan`) VALUES
(9, '2', 'Adnan Syakir', 1, '1', 'juri 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koordinator`
--

CREATE TABLE `koordinator` (
  `id` int(200) NOT NULL,
  `kode_koordinator` int(200) NOT NULL,
  `nama_koordinator` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `koordinator`
--

INSERT INTO `koordinator` (`id`, `kode_koordinator`, `nama_koordinator`) VALUES
(1, 201, 'andika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(200) NOT NULL,
  `pt_id` int(200) DEFAULT NULL,
  `cabang_perlombaan_id` int(200) NOT NULL,
  `nama_team` varchar(200) NOT NULL,
  `peserta_id` int(200) NOT NULL,
  `kode_peserta` int(200) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `pt_id`, `cabang_perlombaan_id`, `nama_team`, `peserta_id`, `kode_peserta`, `keterangan`) VALUES
(662, 1, 1, 'team pasti menang', 8, 2392929, 'anggota 1'),
(2147483647, 1, 1, 'team jagoan', 10, 22753070, 'anggota 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendamping`
--

CREATE TABLE `pendamping` (
  `id` int(200) NOT NULL,
  `kode_pendamping` varchar(25) NOT NULL,
  `nama_pendamping` varchar(100) NOT NULL,
  `pt_id` int(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendamping`
--

INSERT INTO `pendamping` (`id`, `kode_pendamping`, `nama_pendamping`, `pt_id`, `created_at`, `updated_at`) VALUES
(2, '22', 'Riski Hidayat', 1, '2024-07-24 13:10:57', '2024-07-24 13:10:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(200) NOT NULL,
  `nama_peserta` varchar(200) DEFAULT NULL,
  `kode_peserta` varchar(200) DEFAULT NULL,
  `prodi_id` int(200) DEFAULT NULL,
  `pt_id` int(200) DEFAULT NULL,
  `file_surat_tugas` varchar(200) DEFAULT NULL,
  `ktm` varchar(200) DEFAULT NULL,
  `no_wa` int(60) DEFAULT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `nama_peserta`, `kode_peserta`, `prodi_id`, `pt_id`, `file_surat_tugas`, `ktm`, `no_wa`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 'Riski Hidayatasd', '22753070', 36, 1, '1720457861_5eb1786ab97aa14591c6.pdf', '1720457861_14b0ba602bc34c1963bf.pdf', 2147483647, 'pendamping', NULL, NULL),
(8, 'syakir', '2392929', 36, 1, '1720925654_b8da13011371e1e74166.pdf', '1720925654_e0658e3a614e6bce419f.pdf', 19291, 'peserta', '2024-07-14 09:54:14', '2024-07-14 09:54:14'),
(9, 'ari andika', '2392929', 36, 1, '1721309018_228a95ab938e1d432362.pdf', '1721309018_aea8590379f41eaf9fc5.pdf', 292929, 'pendamping', '2024-07-18 20:23:38', '2024-07-18 20:23:38'),
(10, 'yanto', '22753070', 36, 1, '1721309056_4a549080dd201c52eeb4.pdf', '1721309056_9b74fd020f1b95ce3974.pdf', 292929, 'peserta', '2024-07-18 20:24:16', '2024-07-18 20:24:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int(200) NOT NULL,
  `kode_prodi` varchar(200) DEFAULT NULL,
  `nama_prodi` varchar(200) DEFAULT NULL,
  `pt_id` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `kode_prodi`, `nama_prodi`, `pt_id`) VALUES
(9, '236', 'Manjemen Informatika', 3),
(36, '020', 'Akuntansi Perpajakan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pt`
--

CREATE TABLE `pt` (
  `id` int(200) NOT NULL,
  `kode_pt` varchar(200) NOT NULL,
  `nama_pt` varchar(200) DEFAULT NULL,
  `email_pt` varchar(200) DEFAULT NULL,
  `asal_prov` varchar(200) NOT NULL,
  `asal_negara` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pt`
--

INSERT INTO `pt` (`id`, `kode_pt`, `nama_pt`, `email_pt`, `asal_prov`, `asal_negara`) VALUES
(1, '00104478', 'Universitas Indonesia', 'ui@gmail.com', 'Lampung', 'Indonesia'),
(3, '020202', 'Politeknik Negeri Kupang', 'Kupang@gmail.com', 'Kupang', 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(200) NOT NULL,
  `role` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Juri'),
(3, 'Pendamping'),
(4, 'Kampus'),
(5, 'Koordinator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` int(200) NOT NULL,
  `peserta_id` int(200) NOT NULL,
  `kode_peserta` int(200) NOT NULL,
  `prodi_id` int(200) NOT NULL,
  `pt_id` int(200) NOT NULL,
  `file_sertifikat` varchar(200) NOT NULL,
  `cabang_perlombaan_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `peserta_id`, `kode_peserta`, `prodi_id`, `pt_id`, `file_sertifikat`, `cabang_perlombaan_id`) VALUES
(0, 10, 22753070, 36, 1, '1721369008_18f14ed143831ae51aa6.pdf', 1),
(1, 7, 22753070, 36, 1, '1721304976_53eb9fd53b99841a52c5.pdf', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
('3d6a4b39-0e64-11ec-b94d-005056a72944', 'admin', 'admin001@gmail.com', '29e520fe9d18620e1bacd341f8263510f937e09479deebbbeab5ab758a659270', 1, 1, '2024-05-15 15:05:00', '2024-05-15 15:05:00'),
('57461b2e-e1b0-4da4-95ca-56e0d671a24c', 'Adnan Syakir', 'syakir2gmail.com', '29e520fe9d18620e1bacd341f8263510f937e09479deebbbeab5ab758a659270', 2, 1, '2024-05-19 13:42:05', '2024-05-19 13:42:05'),
('96b0fbf4-2792-4cad-a72a-4474600b5b38', 'Riski Hidayat', 'riski@gmail.com', '29e520fe9d18620e1bacd341f8263510f937e09479deebbbeab5ab758a659270', 3, 1, '2024-05-19 13:47:10', '2024-05-19 13:47:10'),
('ee6bd4c6-0890-4327-a2c0-a7cb81437505', 'Universitas \nIndonesia', 'ui@gmail.com', '29e520fe9d18620e1bacd341f8263510f937e09479deebbbeab5ab758a659270', 4, 1, '2024-05-19 13:46:15', '2024-05-19 13:46:15'),
('fb37eab1-1c4b-4604-9f9f-57f4f0488145', 'andika', 'andika@gmail.com', '29e520fe9d18620e1bacd341f8263510f937e09479deebbbeab5ab758a659270', 5, 1, '2024-07-26 11:16:57', '2024-07-26 11:16:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cabang_perlombaan`
--
ALTER TABLE `cabang_perlombaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasillomba`
--
ALTER TABLE `hasillomba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftararan_id` (`pendaftaran_id`),
  ADD KEY `pendaftaran_id` (`pendaftaran_id`),
  ADD KEY `cabang_perlombaan_id` (`cabang_perlombaan_id`);

--
-- Indeks untuk tabel `juri`
--
ALTER TABLE `juri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pt_id` (`pt_id`),
  ADD KEY `cabang_perlombaan_id` (`cabang_perlombaan_id`);

--
-- Indeks untuk tabel `koordinator`
--
ALTER TABLE `koordinator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cabang_perlombaan_id` (`pt_id`),
  ADD KEY `cabang_perlombaan_id_2` (`cabang_perlombaan_id`,`peserta_id`);

--
-- Indeks untuk tabel `pendamping`
--
ALTER TABLE `pendamping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pt_id` (`pt_id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi_id` (`prodi_id`,`pt_id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pt`
--
ALTER TABLE `pt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peserta_id` (`peserta_id`,`prodi_id`,`cabang_perlombaan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cabang_perlombaan`
--
ALTER TABLE `cabang_perlombaan`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4300001;

--
-- AUTO_INCREMENT untuk tabel `hasillomba`
--
ALTER TABLE `hasillomba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `juri`
--
ALTER TABLE `juri`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4751;

--
-- AUTO_INCREMENT untuk tabel `koordinator`
--
ALTER TABLE `koordinator`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `pendamping`
--
ALTER TABLE `pendamping`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=784;

--
-- AUTO_INCREMENT untuk tabel `pt`
--
ALTER TABLE `pt`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
