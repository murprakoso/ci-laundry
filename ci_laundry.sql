-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 13 Jun 2020 pada 13.05
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kas_keluar`
--

CREATE TABLE `tbl_kas_keluar` (
  `kas_id` bigint(20) NOT NULL,
  `kas_date` datetime DEFAULT current_timestamp(),
  `kas_banyaknya` int(11) DEFAULT NULL,
  `kas_keterangan` varchar(200) DEFAULT NULL,
  `kas_kode` varchar(100) DEFAULT NULL,
  `kas_total` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kas_keluar`
--

INSERT INTO `tbl_kas_keluar` (`kas_id`, `kas_date`, `kas_banyaknya`, `kas_keterangan`, `kas_kode`, `kas_total`) VALUES
(37, '2020-04-23 23:25:58', 5, 'Liberty', '230420-333', '30000'),
(39, '2020-03-19 17:48:15', 3, 'Keterangan 3', '240420-445', '30000'),
(50, '2020-06-06 15:23:07', 10, 'Ketarangan kas keluar', '060620-231', '10000'),
(51, '2020-06-06 15:26:23', 10, 'Data baru', '060620-335', '40000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kas_masuk`
--

CREATE TABLE `tbl_kas_masuk` (
  `kas_id` bigint(20) NOT NULL,
  `kas_date` datetime DEFAULT current_timestamp(),
  `kas_banyaknya` int(11) DEFAULT NULL,
  `kas_keterangan` varchar(200) DEFAULT NULL,
  `kas_kode` varchar(100) DEFAULT NULL,
  `kas_total` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kas_masuk`
--

INSERT INTO `tbl_kas_masuk` (`kas_id`, `kas_date`, `kas_banyaknya`, `kas_keterangan`, `kas_kode`, `kas_total`) VALUES
(38, '2020-04-23 23:26:24', 2, 'Samsudin', '230420-333', '5000'),
(46, '2020-04-24 23:43:57', 4, 'Keterangan 4', '240420-334', '40000'),
(47, '2020-04-28 15:08:00', 3, 'lkadjfalksdj', '280420-765', '20000'),
(48, '2020-04-28 15:10:06', 2, 'lakjdflk', '280420-345', '20000'),
(50, '2020-06-06 15:11:24', 10, 'Kas masuk lama', '060620-457', '55000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kas_rekap`
--

CREATE TABLE `tbl_kas_rekap` (
  `rekap_id` bigint(20) NOT NULL,
  `rekap_jenis` enum('1','2') DEFAULT NULL COMMENT '1=KasMasuk,2=KasKeluar',
  `rekap_date` date DEFAULT current_timestamp(),
  `rekap_banyaknya` int(11) DEFAULT NULL,
  `rekap_keterangan` varchar(200) DEFAULT NULL,
  `rekap_kode` varchar(100) DEFAULT NULL,
  `rekap_total` varchar(100) DEFAULT NULL,
  `rekap_debit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kas_rekap`
--

INSERT INTO `tbl_kas_rekap` (`rekap_id`, `rekap_jenis`, `rekap_date`, `rekap_banyaknya`, `rekap_keterangan`, `rekap_kode`, `rekap_total`, `rekap_debit`) VALUES
(38, '1', '2020-04-23', 5, 'Liberty', '230420-333', '30000', '30000'),
(39, '1', '2020-04-23', 2, 'Samsudin', '230420-333', '5000', '35000'),
(40, '1', '2020-03-19', 3, 'Keterangan 2', '240420-445', '30000', '65000'),
(45, '1', '2020-04-24', 4, 'Keterangan 4', '240420-334', '40000', '105000'),
(46, '1', '2020-04-28', 3, 'lkadjfalksdj', '280420-765', '20000', '125000'),
(47, '2', '2020-04-28', 2, 'lakjdflk', '280420-345', '20000', '20000'),
(48, '2', '2020-04-28', 1, 'alkdjsfkl', '280420-222', '5000', '25000'),
(49, '1', '2020-06-06', 5, 'Kas masuk baru', '060620-456', '50000', '175000'),
(50, '2', '2020-06-06', 5, 'Keterangan', '060620-331', '50000', '75000'),
(51, '2', '2020-06-06', 10, 'Data baru', '060620-335', '40000', '115000'),
(52, '2', '2020-06-06', 20, 'Tambah baru', '060620-221', '40000', '155000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(30) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `user_level` enum('1','2') DEFAULT '2' COMMENT '1=Admin,2=User',
  `user_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fullname`, `user_name`, `user_email`, `user_password`, `user_level`, `user_photo`) VALUES
(1, 'M Fikri', 'admin', 'admin@gmail.com', '$2y$10$hkQwMsds/5GfMG.coqkeoekmQ/UgoCqXf03HOs.ADCrNrORR1Curi', '1', 'bc0c855e8cffbf89b8c314e92fe9a836.jpg'),
(2, 'M Joko', 'user', 'user@gmail.com', '$2y$10$Gr/4ZrcUdEO/tbIvnNGOy.Ypz2HMOR5aHab4E6tqgxH0nbm0qCeGW', '2', 'ba89275e813a385ad9ccd54e6ea94f59.jpg'),
(3, 'M Joko f', 'joko22', 'user@gmail.com', '$2y$10$xwO70.ztmyI2Mq2sNWfgtuBzH4Lb39mNC6JrWWUT/oNsPsgrmKn/2', '2', NULL),
(7, 'Ronal D', 'ronal', 'ronal@gmail.com', '$2y$10$uB/26PUvtGIkX7qPqnTHD.7l6UO.CC435w5SKPWZdlIFUfIvMHkZK', '2', '20aa1e3a715e29b81181f5f6168e7146.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_kas_keluar`
--
ALTER TABLE `tbl_kas_keluar`
  ADD PRIMARY KEY (`kas_id`);

--
-- Indeks untuk tabel `tbl_kas_masuk`
--
ALTER TABLE `tbl_kas_masuk`
  ADD PRIMARY KEY (`kas_id`);

--
-- Indeks untuk tabel `tbl_kas_rekap`
--
ALTER TABLE `tbl_kas_rekap`
  ADD PRIMARY KEY (`rekap_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kas_keluar`
--
ALTER TABLE `tbl_kas_keluar`
  MODIFY `kas_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tbl_kas_masuk`
--
ALTER TABLE `tbl_kas_masuk`
  MODIFY `kas_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tbl_kas_rekap`
--
ALTER TABLE `tbl_kas_rekap`
  MODIFY `rekap_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
