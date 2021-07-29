-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2021 pada 18.10
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
-- Database: `komunitas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komunitas`
--

CREATE TABLE `komunitas` (
  `id_komunitas` varchar(32) NOT NULL,
  `nama_komunitas` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komunitas`
--

INSERT INTO `komunitas` (`id_komunitas`, `nama_komunitas`, `created_at`) VALUES
('5f06e1725c9', 'PT. JAYA DUTA INDONESIA', '2020-09-01 11:40:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bayar`
--

CREATE TABLE `tbl_bayar` (
  `id_bayar` varchar(11) NOT NULL,
  `id_member` varchar(11) DEFAULT NULL,
  `id_kegiatan` varchar(11) DEFAULT NULL,
  `foto_bukti_bayar` varchar(100) DEFAULT NULL,
  `jumlah_bayar` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bayar`
--

INSERT INTO `tbl_bayar` (`id_bayar`, `id_member`, `id_kegiatan`, `foto_bukti_bayar`, `jumlah_bayar`, `created_at`, `updated_at`) VALUES
('5f102131c2d', '5f0b21cd72b', '5f0af9094c9', 'abstract-ultraviolet-cubic-surface-motion_250994-228.jpg', '250000', '2020-07-16 02:43:13', '2020-07-16 03:24:48'),
('5f14381d6f9', '5f0b21cd72b', '5f129e56304', 'images.jpg', '250000', '2020-07-19 05:10:05', NULL),
('5f14392ebf6', '5f129807b7d', '5f129e56304', 'abstract-ultraviolet-cubic-surface-motion_250994-228.jpg', '300000', '2020-07-19 05:14:38', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT current_timestamp(),
  `nama_customer` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(35) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tanggal_service` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(35) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `foto_customer` varchar(35) NOT NULL,
  `tipe_unit` varchar(50) NOT NULL,
  `agen_sales` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nama_customer`, `jenis_kelamin`, `tanggal_pembelian`, `tanggal_service`, `alamat`, `email`, `no_telp`, `foto_customer`, `tipe_unit`, `agen_sales`) VALUES
('current_timestamp()', 'mukidi', 'L', '2021-04-22', '2021-04-24', 'Jl. Bandung no. 54', 'madi@gmail.com', '081280007834', 'fotomukidi.jpg', 'C1', 'salesin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` varchar(32) NOT NULL,
  `id_user` varchar(32) DEFAULT NULL,
  `id_komunitas` varchar(32) NOT NULL,
  `nama_kegiatan` varchar(35) DEFAULT NULL,
  `jenis_kegiatan` varchar(20) DEFAULT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `jam_kegiatan` time DEFAULT NULL,
  `uang_partisipasi` decimal(10,0) DEFAULT NULL,
  `pengisi_acara` varchar(50) DEFAULT NULL,
  `tempat_kegiatan` text DEFAULT NULL,
  `status_kegiatan` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `id_user`, `id_komunitas`, `nama_kegiatan`, `jenis_kegiatan`, `tanggal_kegiatan`, `jam_kegiatan`, `uang_partisipasi`, `pengisi_acara`, `tempat_kegiatan`, `status_kegiatan`, `created_at`, `updated_at`) VALUES
('5f0af9094c9', '5f09ed60b4e', '5f06e1725c9', 'Jalan-jalan dan Wisata', 'Refresing', '2020-07-16', '10:00:00', '200000', 'Anis Baswedan', 'Bandung', 2, '2020-07-12 04:50:33', '2020-07-17 00:44:20'),
('5f129e56304', '5f09ed60b4e', '5f06e1725c9', 'Bakti Sosial', 'Kumpul Bersama', '2020-07-19', '10:00:00', '250000', 'Kak Seto', 'Ancol, Jakarta', 1, '2020-07-18 00:01:42', '2020-08-17 07:26:10'),
('5f3ab24b730', '5f09ed60b4e', '5f06e1725c9', 'Jalan Bersama', 'Olah Raga', '2020-08-20', '10:00:00', NULL, 'Bagus Putra Aji', 'BSD', 2, '2020-08-17 09:37:31', '2020-09-11 04:57:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keuangan`
--

CREATE TABLE `tbl_keuangan` (
  `id_keuangan` varchar(32) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `jumlah_uang` decimal(10,0) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `saldo` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_keuangan`
--

INSERT INTO `tbl_keuangan` (`id_keuangan`, `keterangan`, `jumlah_uang`, `status`, `saldo`, `created_at`, `updated_at`) VALUES
('5f51b77ac627f', 'kas', '50000', 1, '50000', '2020-09-03 20:41:46', NULL),
('5f51b87d29159', 'kegiatan', '150000', 1, '200000', '2020-09-03 20:46:05', NULL),
('5f51b8924358f', 'kas dani', '25000', 1, '225000', '2020-09-03 20:46:26', NULL),
('5f51bb90b3076', 'Stiker', '20000', 2, '205000', '2020-09-03 20:59:12', NULL),
('5f562969c2b72', 'Kas Dani', '200000', 1, '405000', '2020-09-07 05:36:57', NULL),
('5f562de87da6b', 'Kaos Seragam', '200000', 2, '205000', '2020-09-07 05:56:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id_member` varchar(32) NOT NULL,
  `id_komunitas` varchar(32) DEFAULT NULL,
  `nama_member` varchar(35) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_mobil` varchar(50) DEFAULT NULL,
  `nomor_id` int(5) DEFAULT NULL,
  `plat_mobil` varchar(100) DEFAULT NULL,
  `warna_mobil` varchar(10) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `nama_foto` varchar(100) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `id_sosmed` varchar(100) DEFAULT NULL,
  `tanggal_bergabung` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_customer` varchar(128) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `tanggal_service` date DEFAULT NULL,
  `tipe_unit` varchar(128) DEFAULT NULL,
  `agen_sales` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_member`
--

INSERT INTO `tbl_member` (`id_member`, `id_komunitas`, `nama_member`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nama_mobil`, `nomor_id`, `plat_mobil`, `warna_mobil`, `jenis_kelamin`, `email`, `no_telp`, `nama_foto`, `username`, `password`, `id_sosmed`, `tanggal_bergabung`, `created_at`, `updated_at`, `nama_customer`, `tanggal_pembelian`, `tanggal_service`, `tipe_unit`, `agen_sales`) VALUES
('5f0b21cd72b', '5f06e1725c9', 'Arif', 'Wonogiri', '2020-08-18', 'Sauk', 'Pajero Sport', NULL, 'B 3000 ARF', 'Merah', 'Laki-laki', 'arif@mail.com', '08913234243', 'download.jpg', 'arif', '1234', NULL, NULL, '2020-07-12 07:44:29', '2020-09-11 01:06:56', '', '0000-00-00', '0000-00-00', '', ''),
('5f0b3620b6b', '5f08b6e0a26', 'Wisnu', 'Cisauk', '2020-07-03', 'Cisauk', 'Avanza', NULL, 'B 1231 CSK', 'Putih', 'Laki-laki', 'wisnu@mail.com', '089132342849', 'download.jpg', 'wisnu', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, '2020-07-12 09:11:12', NULL, '', '0000-00-00', '0000-00-00', '', ''),
('5f0c28a66d7', '3312rfsfsdf', 'M Furqon', 'Ambon', '1996-07-04', 'Jakarta Pusat', 'Lamborgini', NULL, 'B 0001 BRD', 'Merah', 'Laki-laki', 'furqon@mail.com', '08143234244', 'images.jpg', 'furqon', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, '2020-07-13 02:25:58', '2020-07-15 12:04:06', '', '0000-00-00', '0000-00-00', '', ''),
('5f3a8f65cf0', '5f06e1725c9', 'Setyo', 'Tangerang', '2020-08-17', 'BSD', 'Pajero', 321232, 'B 1232 BER', 'Putih', 'Laki-laki', 'setyo@mail.com', '08912327234', 'backgroun_ungu.jpg', 'setyo', '5f4dcc3b5aa765d61d8327deb882cf99', '@styo32', NULL, '2020-08-17 07:08:37', '2020-08-17 07:14:47', '', '0000-00-00', '0000-00-00', '', ''),
('5f3ab12c4ab', '5f06e1725c9', 'Doni', 'Tangerang', '2007-08-17', 'BSD, Tangerang', NULL, 312321, NULL, NULL, NULL, 'doni@mail.com', NULL, '1597681964.images.jpg', 'doni', '5f4dcc3b5aa765d61d8327deb882cf99', '@doni32', NULL, '2020-08-17 09:32:44', NULL, '', '0000-00-00', '0000-00-00', '', ''),
('5f3be279edc', '5f06e1725c9', 'Aliando', 'Tangerang', '1998-12-10', 'BSD Tangerang', NULL, 434242, NULL, NULL, NULL, 'aliando@mail.com', NULL, '1597760121.backgroun_ungu.jpg', 'ali', '5f4dcc3b5aa765d61d8327deb882cf99', '@aliando12', NULL, '2020-08-18 07:15:21', NULL, '', '0000-00-00', '0000-00-00', '', ''),
('5f4c7cfa9c0', '5f06e1725c9', 'Deni Cagur', 'Tangerang', '1994-09-01', 'BSD, Tangerang', 'Alpart', 321231, 'B 1232 RES', NULL, 'Laki-laki', 'deni@mail.com', '089237723632', '1598848250.download.jpg', 'deni', '5f4dcc3b5aa765d61d8327deb882cf99', '@deni_c', '2020-08-31', '2020-08-30 21:30:50', NULL, '', '0000-00-00', '0000-00-00', '', ''),
('5f4ca803ad7', '5f06e1725c9', 'Zainal Asari', 'Tangerang', '1995-09-01', 'Ceater, Tangerang', 'Lamborgini', 32121, 'B 1 ERD', NULL, 'Laki-laki', 'zainal@mail.com', '089132342849', '1598859267.Log Horizon.jpg', 'zainal', '5f4dcc3b5aa765d61d8327deb882cf99', '@zailnal03', '2020-08-31', '2020-08-31 00:34:27', NULL, '', '0000-00-00', '0000-00-00', '', ''),
('5f5b656b0cd10', '5f06e1725c9', 'Ari', 'Tangerang', '1996-08-01', 'BSD', 'BMW', 31221, 'B 21 ERD', NULL, 'Laki-laki', 'ari@mail.com', '089132342849', '1599825259.images.jpg', 'ari', '5f4dcc3b5aa765d61d8327deb882cf99', '@ari', '2020-09-11', '2020-09-11 04:54:19', NULL, '', '0000-00-00', '0000-00-00', '', ''),
('6077206599ca3', '5f06e1725c9', 'Unggar Madi', 'Gunungkidul', '1997-04-21', 'Jl. Kalimangso No.53B, Jurang Manggu Tim., Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15222', 'Toyota', 9999, 'B 4546 VTO', NULL, 'Laki-laki', 'unggarmadi@gmail.com', '+6281280007814', '1618419813.img prof.png', 'madi', '81dc9bdb52d04dc20036dbd8313ed055', '01', '2021-04-14', '2021-04-14 10:03:33', NULL, '', '0000-00-00', '0000-00-00', '', ''),
('6083c903f1e18', '5f06e1725c9', 'mad', 'Jakarta', '2021-04-23', 'Jl. Kalimangso No.53B, Jurang Manggu Tim., Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15222', 'Mitshubishi', 9997, 'B 4547  VTI', NULL, 'Laki-laki', 'unggarmadii@gmail.com', '+6281280007815', '1619249411.img prof.png', 'mad', '81dc9bdb52d04dc20036dbd8313ed055', '@mad', '2021-04-24', '2021-04-24 00:30:11', NULL, NULL, NULL, NULL, NULL, NULL),
('6083d1fa8547d', '5f06e1725c9', 'danu', 'Jakarta', '2021-04-23', 'Jl. Kalimangso No.53B, Jurang Manggu Tim., Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15222', 'Toyota', 9998, 'B 4547  VTY', NULL, 'Laki-laki', 'unggarmadiiII@gmail.com', '+6281280007816', '1619251706.img prof.png', 'danu', '81dc9bdb52d04dc20036dbd8313ed055', '@danu', '2021-04-24', '2021-04-24 01:08:26', NULL, NULL, NULL, NULL, NULL, NULL),
('6083da55f0896', NULL, NULL, 'Jakarta', NULL, 'Jl. Kalimangso No.53B, Jurang Manggu Tim., Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15222', NULL, NULL, NULL, NULL, 'Laki-laki', 'unggarmadii@gmail.com', '+6281280007815', '1619253845.img prof.png', NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, '2021-04-24', '2021-04-24 01:44:05', NULL, NULL, NULL, NULL, NULL, NULL),
('6083e93d0fe3c', '5f06e1725c9', 'madd', 'Jakarta', '2021-04-22', 'Jl. Kalimangso No.53B, Jurang Manggu Tim., Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15222', NULL, 9999, NULL, NULL, 'Laki-laki', 'unggarmadiiiii@gmail.com', '+6281280007819', '1619257661.img prof.png', 'madd', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2021-04-24', '2021-04-24 02:47:41', NULL, NULL, NULL, NULL, NULL, NULL),
('6083eae95e3d8', '5f06e1725c9', 'joni', 'Jakarta', '2021-04-22', 'Jl. Kalimangso No.53B, Jurang Manggu Tim., Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15222', NULL, 9910, NULL, NULL, 'Laki-laki', 'johni@gmail.com', '+6281280007816', '1619258089.img prof.png', 'joni', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2021-04-24', '2021-04-24 02:54:49', NULL, NULL, NULL, NULL, NULL, NULL),
('6083eb86203e1', '5f06e1725c9', 'duma', 'Jakarta', '2021-04-22', 'Jl. Kalimangso No.53B, Jurang Manggu Tim., Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15222', NULL, 2222, NULL, NULL, 'Laki-laki', 'duma@gmail.com', '+6281280007899', '1619258246.img prof.png', 'duma', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2021-04-24', '2021-04-24 02:57:26', NULL, NULL, NULL, NULL, NULL, NULL),
('6083ecb67ac44', '5f06e1725c9', 'jani', 'Jakarta', '2021-04-22', 'Jl. Kalimangso No.53B, Jurang Manggu Tim., Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15222', NULL, 6666, NULL, NULL, 'Laki-laki', 'jani@gmail.com', '+6281280007777', '1619258550.img prof.png', 'jani', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2021-04-24', '2021-04-24 03:02:30', NULL, NULL, NULL, NULL, NULL, NULL),
('6083edd880e3b', '5f06e1725c9', 'wildan', 'Jakarta', '2021-04-21', 'Jl. Kalimangso No.53B, Jurang Manggu Tim., Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15222', NULL, 22222, NULL, NULL, 'Laki-laki', 'wildan@gmail.com', '+628128000744', '1619258840.img prof.png', 'wildan', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2021-04-24', '2021-04-24 03:07:20', NULL, NULL, NULL, NULL, NULL, NULL),
('6083ee85bf787', '5f06e1725c9', 'jumiah', 'Jakarta', '2021-04-22', 'Jl. Kalimangso No.53B, Jurang Manggu Tim., Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15222', NULL, 11111, NULL, NULL, 'Perempuan', 'jumiah@gmail.com', '+6281280007816', '1619259013.img prof.png', 'jumiah', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2021-04-24', '2021-04-24 03:10:13', NULL, NULL, NULL, NULL, NULL, NULL),
('6083f0aef2f8f', '5f06e1725c9', 'down', 'Jakarta', '2021-04-22', 'Jl. Kalimangso No.53B, Jurang Manggu Tim., Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15222', NULL, 21211, NULL, NULL, 'Laki-laki', 'down@gmail.com', '+6281280007819', '1619259566.img prof.png', 'down', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2021-04-24', '2021-04-24 03:19:26', NULL, NULL, NULL, NULL, NULL, NULL),
('6083f542ae43b', '5f06e1725c9', 'diman', 'Jakarta', '2021-04-14', 'Jl. Kalimangso No.53B, Jurang Manggu Tim., Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15222', NULL, 21212, NULL, NULL, 'Laki-laki', 'diman@gmail.com', '+6281280007815', '1619260738.img prof.png', 'diman', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2021-04-24', '2021-04-24 03:38:58', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_posting`
--

CREATE TABLE `tbl_posting` (
  `id_posting` varchar(32) NOT NULL,
  `id_user` varchar(32) DEFAULT 'NULL',
  `id_kegiatan` varchar(32) NOT NULL,
  `foto_posting` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_posting`
--

INSERT INTO `tbl_posting` (`id_posting`, `id_user`, `id_kegiatan`, `foto_posting`, `deskripsi`, `created_at`, `updated_at`) VALUES
('5f115b6763a', '5f09ed60b4e', '5f0af9094c9', 'download.jpg', 'Indahnya alam bersama sahabat Pajero', '2020-07-17 01:03:51', '2020-07-17 01:44:38'),
('5f115c231de', '5f09ed60b4e', '5f0af9094c9', 'images.jpg', 'Foto bareng sahabat', '2020-07-17 01:06:59', '2020-07-17 01:44:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(32) NOT NULL,
  `nama_user` varchar(35) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `nama_foto` varchar(125) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `email`, `no_telp`, `nama_foto`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
('5f09ed60b45', 'madi', 'gunungkidul', '0000-00-00', 'L', 'jl. bandung', 'ungarmadi@gmail.com', '081280007814', 'madi.png', 'madi', '123', 1, NULL, NULL),
('5f09ed60b4e', 'Arif', 'Wonogiri', '2020-07-01', 'Laki-laki', 'Sauk', 'arif@mail.com', '08913234243', '2927262.jpg', 'arif', '1234', 1, '2020-07-10 17:00:00', '2020-07-10 17:00:00'),
('5f0ec88f68a', 'Suci', 'Serpong', '2000-07-11', 'Perempuan', 'Serpong, Tangsel', 'suci@mail.com', '08143234244', 'images_welcome.jpg', 'suci', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2020-07-15 02:12:47', NULL),
('5f143f6dc69', 'wisnu', 'Cisauk', '2020-07-01', 'Laki-laki', 'Cisauk', 'wisnu@mail.com', '089131873133', 'download.jpg', 'wisnu', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '2020-07-19 05:41:17', NULL),
('5f37d0012dc', 'Ani Setiani', 'Tangerang', '1996-07-10', 'Perempuan', 'Jatiuwung, Tangerang', 'ani@mail.com', '08928476342', 'Log Horizon.jpg', 'ani', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2020-08-15 05:07:29', '2020-08-15 05:10:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`id_komunitas`) USING BTREE;

--
-- Indeks untuk tabel `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tbl_keuangan`
--
ALTER TABLE `tbl_keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indeks untuk tabel `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `tbl_posting`
--
ALTER TABLE `tbl_posting`
  ADD PRIMARY KEY (`id_posting`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`,`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
