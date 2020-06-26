-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Jun 2020 pada 18.09
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
-- Struktur dari tabel `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_id` int(11) NOT NULL,
  `item_nama` varchar(255) DEFAULT NULL,
  `item_tipe` enum('1','2') NOT NULL COMMENT '1=satuan,2=kiloan',
  `item_harga` int(20) DEFAULT NULL,
  `item_diskon` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `item_nama`, `item_tipe`, `item_harga`, `item_diskon`) VALUES
(2, 'Celana Jeans', '2', 5000, NULL),
(6, 'Satuan', '2', 8000, 2000),
(11, 'Umum', '1', 4000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kas_keluar`
--

CREATE TABLE `tbl_kas_keluar` (
  `kaskeluar_id` bigint(20) NOT NULL,
  `banyaknya` int(11) DEFAULT NULL,
  `nama_toko` varchar(200) DEFAULT NULL,
  `telp` varchar(200) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kas_user_id` int(11) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `total` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kas_keluar`
--

INSERT INTO `tbl_kas_keluar` (`kaskeluar_id`, `banyaknya`, `nama_toko`, `telp`, `keterangan`, `tanggal`, `kas_user_id`, `harga`, `total`) VALUES
(53, 4, 'Laund Collection', '989898989', 'Bahan pewangii', '2020-06-25', 1, 5000, 20000),
(57, 30, 'Alfamart', '888888333', 'sabun', '2020-06-26', 2, 2500, 75000),
(58, 7, 'Toko Serbaguna', '987777777', 'Beli beras', '2020-06-24', 1, 12000, 84000),
(59, 35, 'Toko Serbaguna 2', '989898333', '', '2020-05-13', 1, 43000, 1505000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kas_masuk`
--

CREATE TABLE `tbl_kas_masuk` (
  `kasmasuk_id` bigint(20) NOT NULL,
  `berat` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `telp` varchar(200) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `kas_user_id` int(11) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `total` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kas_masuk`
--

INSERT INTO `tbl_kas_masuk` (`kasmasuk_id`, `berat`, `nama_pelanggan`, `telp`, `keterangan`, `tanggal`, `kas_user_id`, `harga`, `total`) VALUES
(51, 5, 'Reza', '09989898989', NULL, '2020-06-25 19:12:59', 1, 5000, 3000),
(52, 5, 'Novi', '09989898989', NULL, '2020-06-25 19:12:59', 2, 5000, 8000);

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
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `transaksi_id` bigint(20) NOT NULL,
  `nama_pelanggan` varchar(200) DEFAULT NULL,
  `telp` int(20) DEFAULT NULL,
  `status` enum('1','2','3','4') DEFAULT NULL COMMENT '1=Order,2=Dikerjakan,3=Selesai,4=Diambil',
  `tanggal` date DEFAULT NULL,
  `item_tipe` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `total` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Pecinta Kaffein', 'admin', 'admin@gmail.com', '$2y$10$hkQwMsds/5GfMG.coqkeoekmQ/UgoCqXf03HOs.ADCrNrORR1Curi', '1', 'bc0c855e8cffbf89b8c314e92fe9a836.jpg'),
(2, 'M Joko', 'user', 'user@gmail.com', '$2y$10$Gr/4ZrcUdEO/tbIvnNGOy.Ypz2HMOR5aHab4E6tqgxH0nbm0qCeGW', '2', 'ba89275e813a385ad9ccd54e6ea94f59.jpg'),
(3, 'M Joko f', 'joko22', 'user@gmail.com', '$2y$10$xwO70.ztmyI2Mq2sNWfgtuBzH4Lb39mNC6JrWWUT/oNsPsgrmKn/2', '2', NULL),
(7, 'Ronal D', 'ronal', 'ronal@gmail.com', '$2y$10$uB/26PUvtGIkX7qPqnTHD.7l6UO.CC435w5SKPWZdlIFUfIvMHkZK', '2', '20aa1e3a715e29b81181f5f6168e7146.jpg'),
(8, 'mur prakoso', 'murprakoso', 'mur@gmail.com', '$2y$10$RWiKL.QF41.ec5ftJW1mFukFDjNg5/EwuileG6WpS168HDn9Omtxi', '2', '8a80bd2475e45e0d4af3f643cf4e86b8.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeks untuk tabel `tbl_kas_keluar`
--
ALTER TABLE `tbl_kas_keluar`
  ADD PRIMARY KEY (`kaskeluar_id`);

--
-- Indeks untuk tabel `tbl_kas_masuk`
--
ALTER TABLE `tbl_kas_masuk`
  ADD PRIMARY KEY (`kasmasuk_id`);

--
-- Indeks untuk tabel `tbl_kas_rekap`
--
ALTER TABLE `tbl_kas_rekap`
  ADD PRIMARY KEY (`rekap_id`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

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
-- AUTO_INCREMENT untuk tabel `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_kas_keluar`
--
ALTER TABLE `tbl_kas_keluar`
  MODIFY `kaskeluar_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tbl_kas_masuk`
--
ALTER TABLE `tbl_kas_masuk`
  MODIFY `kasmasuk_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tbl_kas_rekap`
--
ALTER TABLE `tbl_kas_rekap`
  MODIFY `rekap_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `transaksi_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
