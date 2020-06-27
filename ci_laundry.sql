-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Jun 2020 pada 21.18
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
(2, 'Celana Jeans', '2', 5000, 0),
(11, 'Umum', '1', 4000, NULL),
(12, 'Umum', '2', 8000, 5000),
(13, 'Pakaian Kemeja', '1', 2500, NULL);

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
(59, 10, 'Toko Serbaguna 2', '989898333', '', '2020-05-13', 1, 13500, 135000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kas_masuk`
--

CREATE TABLE `tbl_kas_masuk` (
  `kasmasuk_id` bigint(20) NOT NULL,
  `tipe` enum('1','2') DEFAULT NULL COMMENT '1=satuan,2=kiloan',
  `berat` varchar(11) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `telp` varchar(200) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `kas_user_id` int(11) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `total` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kas_masuk`
--

INSERT INTO `tbl_kas_masuk` (`kasmasuk_id`, `tipe`, `berat`, `nama_pelanggan`, `telp`, `keterangan`, `tanggal`, `kas_user_id`, `harga`, `total`) VALUES
(59, '2', '6', 'prakoso', '989898989', '', '2020-06-26', 1, 8000, 48000),
(60, '1', '0', 'user1', '989898989', '', '2020-06-26', 1, 4000, 4000),
(61, '2', '12', 'Dhea', '2147483647', 'bahan mudah luntur, diambil jam 3', '2020-05-27', 1, 8000, 91000),
(62, '2', '5', 'Tika', '989898989', '', '2020-06-26', 1, 8000, 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `transaksi_id` bigint(20) NOT NULL,
  `nama_pelanggan` varchar(200) DEFAULT NULL,
  `telp` int(20) DEFAULT NULL,
  `status` enum('1','2','3','4') NOT NULL COMMENT '1=Order,2=Dikerjakan,3=Selesai,4=Diambil',
  `tanggal` date DEFAULT NULL,
  `item_tipe` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `berat` varchar(11) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `total` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`transaksi_id`, `nama_pelanggan`, `telp`, `status`, `tanggal`, `item_tipe`, `item_id`, `user_id`, `keterangan`, `berat`, `harga`, `total`) VALUES
(1, 'prakoso', 989898989, '4', '2020-06-26', 2, 12, 1, '', '6', 8000, 48000),
(3, 'user1', 989898989, '4', '2020-06-26', 1, 11, 1, '', '0', 4000, 4000),
(4, 'Tika', 989898989, '4', '2020-06-26', 2, 12, 1, '', '5', 8000, 35000),
(5, 'ronal', 989898989, '3', '2020-06-25', 1, 11, 1, '', '0', 4000, 4000),
(6, 'Riko', 0, '2', '2020-06-26', 2, 12, 1, '', '3', 8000, 19000),
(7, 'Wahyudi', 98989898, '1', '2020-06-27', 1, 13, 1, 'Bahan mudah luntur', '', 2500, 2500),
(8, 'Dhea', 2147483647, '1', '2020-05-27', 2, 12, 1, 'bahan mudah luntur, diambil jam 3', '12', 8000, 91000),
(9, 'Reza', 787878787, '1', '2020-06-16', 2, 12, 1, '', '5', 8000, 35000);

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_kas_keluar`
--
ALTER TABLE `tbl_kas_keluar`
  MODIFY `kaskeluar_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tbl_kas_masuk`
--
ALTER TABLE `tbl_kas_masuk`
  MODIFY `kasmasuk_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `transaksi_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
