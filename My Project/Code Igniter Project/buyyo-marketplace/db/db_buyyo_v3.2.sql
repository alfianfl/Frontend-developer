-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 10:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buyyo`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

create database db_buyyo;

use db_buyyo;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `hash` varchar(45) NOT NULL,
  `salt` varchar(45) NOT NULL,
  `password_log` text DEFAULT NULL,
  `nama_admin` varchar(255) DEFAULT NULL,
  `insert_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `hash`, `salt`, `password_log`, `nama_admin`, `insert_on`, `update_on`) VALUES
(1, 'test1', 'test1@mail.com', 'a675751f329e2926c11f6e6890776e76b012091f99919', 'j9NlVJZf', NULL, 'admin1', '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(2, 'test2', 'test2@mail.com', '5d32a16b86c12cf93f49a85e4a3d9c140e267e45aa875', 'jads6oy2', NULL, 'admin2', '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(3, 'test3', 'test3@mail.com', 'c9035947066d79edb1ed96f94ce68e6a944822fe684c7', '34OsgFI5', NULL, 'admin3', '2020-02-24 07:00:05', '2020-02-24 07:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tryout`
--

CREATE TABLE `admin_tryout` (
  `id_admin_tryout` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `hash` varchar(45) NOT NULL,
  `salt` varchar(45) NOT NULL,
  `password_log` text NOT NULL,
  `nama_admin_tryout` varchar(255) DEFAULT NULL,
  `insert_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tryout`
--

INSERT INTO `admin_tryout` (`id_admin_tryout`, `username`, `email`, `hash`, `salt`, `password_log`, `nama_admin_tryout`, `insert_on`, `update_on`) VALUES
(1, 'test1', 'test1@mail.com', 'a675751f329e2926c11f6e6890776e76b012091f99919', 'j9NlVJZf', '', 'admin_tryout1', '2020-05-26 07:44:33', '2020-05-26 07:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tryout_univ`
--

CREATE TABLE `admin_tryout_univ` (
  `id_admin_tryout_univ` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `hash` varchar(45) NOT NULL,
  `salt` varchar(45) NOT NULL,
  `password_log` text NOT NULL,
  `admin_of` int(11) NOT NULL,
  `nama_admin` varchar(45) DEFAULT NULL,
  `insert_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tryout_univ`
--

INSERT INTO `admin_tryout_univ` (`id_admin_tryout_univ`, `username`, `email`, `hash`, `salt`, `password_log`, `admin_of`, `nama_admin`, `insert_on`, `update_on`) VALUES
(1, 'test1', 'test1@mail.com', 'a675751f329e2926c11f6e6890776e76b012091f99919', 'j9NlVJZf', '', 1, 'test1', '2020-05-27 07:59:17', '2020-05-27 07:59:37'),
(2, 'test2', 'test2@mail.com', '5d32a16b86c12cf93f49a85e4a3d9c140e267e45aa875', 'jads6oy2', '', 2, 'test2', '2020-05-27 07:59:17', '2020-05-27 07:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `dompet`
--

CREATE TABLE `dompet` (
  `id_dompet` int(11) NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT 0,
  `cashback_total` int(11) NOT NULL DEFAULT 0,
  `cashback_mati` int(11) NOT NULL DEFAULT 0,
  `cashback_hidup` int(11) NOT NULL DEFAULT 0,
  `total_transaksi` int(11) NOT NULL DEFAULT 0,
  `slot_total` int(11) NOT NULL DEFAULT 0,
  `slot_hidup` int(11) NOT NULL DEFAULT 0,
  `slot_mati` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `history_transaksi`
--

CREATE TABLE `history_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `catatan` text NOT NULL,
  `id_produk` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `id_keranjang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_transaksi`
--

INSERT INTO `history_transaksi` (`id_transaksi`, `kuantitas`, `waktu`, `catatan`, `id_produk`, `customer`, `id_keranjang`) VALUES
(65, 1, '2020-02-28 15:43:20', '', 28, 18, '181582904600'),
(115, 1, '2020-05-16 14:04:26', '', 49, 27, 'adi7866'),
(118, 1, '2020-05-16 14:05:49', '', 49, 27, 'adi7948'),
(122, 5, '2020-05-17 04:58:46', 'Jangan pakai lama ya bikinnya', 49, 27, 'adi1525'),
(127, 5, '2020-05-17 05:05:31', 'Jangan pakai lama ya bikinnya', 49, 27, 'adi1931'),
(128, 5, '2020-05-17 05:05:45', 'Jangan pakai lama ya bikinnya', 49, 27, 'adi1945'),
(129, 5, '2020-05-17 05:05:54', 'Jangan pakai lama ya bikinnya', 49, 27, 'adi1953'),
(130, 5, '2020-05-17 05:06:43', 'Jangan pakai lama ya bikinnya', 49, 27, 'adi2003'),
(131, 5, '2020-05-17 05:06:45', 'Jangan pakai lama ya bikinnya', 49, 27, 'adi2005');


-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `waktu`, `id_user`) VALUES
('1', '2020-02-24 07:00:06', 1),
('11582531018', '2020-02-24 07:56:58', 1),
('11582531073', '2020-02-24 07:57:53', 1),
('11582531083', '2020-02-24 07:58:03', 1),
('11582532284', '2020-02-24 08:18:04', 1),
('11582533528', '2020-02-24 08:38:48', 1),
('11582700897', '2020-02-26 07:08:17', 1),
('11582700925', '2020-02-26 07:08:45', 1),
('11582700950', '2020-02-26 07:09:10', 1),
('11582770053', '2020-02-27 02:20:53', 1),
('11582772919', '2020-02-27 03:08:39', 1),
('151582644174', '2020-02-25 15:22:54', 15),
('151582743951', '2020-02-26 19:05:51', 15),
('151582743967', '2020-02-26 19:06:07', 15),
('151582743969', '2020-02-26 19:06:09', 15),
('151582744007', '2020-02-26 19:06:47', 15),
('151582744174', '2020-02-26 19:09:34', 15),
('151582744236', '2020-02-26 19:10:36', 15),
('161582800030', '2020-02-27 10:40:30', 16),
('171582849019', '2020-02-28 00:16:59', 17),
('181582904600', '2020-02-28 15:43:20', 18),
('191582991781', '2020-02-29 15:56:21', 19),
('21582559485', '2020-02-24 15:51:25', 2),
('31582801384', '2020-02-27 11:03:04', 3),
('41582532045', '2020-02-24 08:14:05', 4),
('41582538188', '2020-02-24 09:56:28', 4),
('41582538198', '2020-02-24 09:56:38', 4),
('41582539093', '2020-02-24 10:11:33', 4),
('41582539475', '2020-02-24 10:17:55', 4),
('41582539489', '2020-02-24 10:18:09', 4),
('41582539512', '2020-02-24 10:18:32', 4),
('41582541340', '2020-02-24 10:49:00', 4),
('41582541350', '2020-02-24 10:49:10', 4),
('41582541390', '2020-02-24 10:49:50', 4),
('41582541413', '2020-02-24 10:50:13', 4),
('41582544781', '2020-02-24 11:46:21', 4),
('41582545527', '2020-02-24 11:58:47', 4),
('41582558201', '2020-02-24 15:30:01', 4),
('41582561943', '2020-02-24 16:32:23', 4),
('41582785015', '2020-02-27 06:30:15', 4),
('41582785025', '2020-02-27 06:30:25', 4),
('51582536379', '2020-02-24 09:26:19', 5),
('51582537210', '2020-02-24 09:40:10', 5),
('51582539764', '2020-02-24 10:22:44', 5),
('51582640649', '2020-02-25 14:24:09', 5),
('51582640664', '2020-02-25 14:24:24', 5),
('51582640691', '2020-02-25 14:24:51', 5),
('51582640866', '2020-02-25 14:27:46', 5),
('51582640972', '2020-02-25 14:29:32', 5),
('51582715716', '2020-02-26 11:15:16', 5),
('51582715855', '2020-02-26 11:17:35', 5),
('51582716015', '2020-02-26 11:20:15', 5),
('51582726914', '2020-02-26 14:21:54', 5),
('51582732865', '2020-02-26 16:01:05', 5),
('51583077655', '2020-03-01 15:47:35', 5),
('51583146232', '2020-03-02 10:50:32', 5),
('61582555411', '2020-02-24 14:43:31', 6),
('61582555462', '2020-02-24 14:44:22', 6),
('71582639948', '2020-02-25 14:12:28', 7),
('71582675575', '2020-02-26 00:06:15', 7),
('71582696483', '2020-02-26 05:54:43', 7),
('71582709073', '2020-02-26 09:24:33', 7),
('71582709205', '2020-02-26 09:26:45', 7),
('71582710645', '2020-02-26 09:50:45', 7),
('71582717227', '2020-02-26 11:40:27', 7),
('71582717882', '2020-02-26 11:51:22', 7),
('71583134656', '2020-03-02 07:37:36', 7),
('71583134776', '2020-03-02 07:39:36', 7),
('81582633402', '2020-02-25 12:23:22', 8),
('91582643638', '2020-02-25 15:13:58', 9),
('91582643662', '2020-02-25 15:14:22', 9),
('91582643705', '2020-02-25 15:15:05', 9),
('91582643709', '2020-02-25 15:15:09', 9),
('91582643711', '2020-02-25 15:15:11', 9),
('91582643715', '2020-02-25 15:15:15', 9),
('91582643783', '2020-02-25 15:16:23', 9),
('91582643785', '2020-02-25 15:16:25', 9),
('91582643791', '2020-02-25 15:16:31', 9),
('91582643846', '2020-02-25 15:17:26', 9),
('91582744085', '2020-02-26 19:08:05', 9),
('91582744093', '2020-02-26 19:08:13', 9),
('adi1525', '2020-05-17 04:58:45', 27),
('adi1609', '2020-05-17 05:00:09', 27),
('adi1894', '2020-05-17 05:04:54', 27),
('adi1900', '2020-05-17 05:05:00', 27),
('adi1921', '2020-05-17 05:05:21', 27),
('adi1931', '2020-05-17 05:05:31', 27),
('adi1945', '2020-05-17 05:05:45', 27),
('adi1953', '2020-05-17 05:05:53', 27),
('adi2003', '2020-05-17 05:06:43', 27),
('adi2005', '2020-05-17 05:06:45', 27),
('adi4981', '2020-05-16 13:16:21', 27),
('adi5000', '2020-05-16 13:16:40', 27),
('adi7866', '2020-05-16 14:04:26', 27),
('adi7948', '2020-05-16 14:05:48', 27),
('adi8081', '2020-05-16 14:08:01', 27),
('Ban7764', '2020-05-01 07:22:44', 26),
('tes0036', '2020-04-24 06:33:56', 2),
('tes0529', '2020-04-30 15:28:49', 2),
('tes0541', '2020-04-30 15:29:01', 2),
('tes0722', '2020-05-18 08:32:02', 2),
('tes0729', '2020-05-18 08:32:09', 2),
('tes0802', '2020-05-05 03:53:22', 2),
('tes1000', '2020-04-24 06:50:00', 2),
('tes1011', '2020-04-24 06:50:11', 2),
('tes1631', '2020-04-24 07:00:31', 2),
('tes1868', '2020-05-16 06:51:08', 2),
('tes2158', '2020-04-24 07:09:18', 2),
('tes2279', '2020-05-16 06:57:59', 2),
('tes2291', '2020-05-16 06:58:11', 2),
('tes2335', '2020-04-24 07:12:15', 2),
('tes2466', '2020-05-16 12:34:26', 2),
('tes3644', '2020-05-05 04:40:44', 2),
('tes4025', '2020-05-15 14:47:05', 7),
('tes4120', '2020-05-27 10:08:40', 7),
('tes4131', '2020-05-27 10:08:51', 7),
('tes4136', '2020-05-27 10:08:56', 7),
('tes4745', '2020-05-27 10:19:05', 7),
('tes7062', '2020-05-06 06:37:42', 2),
('tes8744', '2020-04-24 11:45:44', 2),
('tes8758', '2020-04-24 11:45:58', 2),
('tes8761', '2020-04-24 11:46:01', 2),
('tes8897', '2020-04-24 11:48:17', 2),
('tes9843', '2020-05-06 07:24:03', 2),
('tes9866', '2020-04-24 12:04:26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `metode_pembayaran` enum('transfer','tunai') NOT NULL,
  `status_pembayaran` varchar(10) NOT NULL DEFAULT 'pending',
  `id_user` int(11) NOT NULL,
  `id_keranjang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `metode_pembayaran`, `status_pembayaran`, `id_user`, `id_keranjang`) VALUES
(1, 'tunai', 'Lunas', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `ket_produk` longtext NOT NULL,
  `stok_produk` int(11) NOT NULL DEFAULT 0,
  `gambar1` varchar(255) DEFAULT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  `gambar3` varchar(255) DEFAULT NULL,
  `gambar4` varchar(255) DEFAULT NULL,
  `gambar5` varchar(255) DEFAULT NULL,
  `kondisi_produk` enum('baru','bekas') NOT NULL,
  `insert_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `merchant` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `ket_produk`, `stok_produk`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `kondisi_produk`, `insert_on`, `update_on`, `merchant`, `id_kategori`) VALUES
(16, 'Exclusive Package', 30000, 'Markocang + Terancam', 1000, '91582727669.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 14:34:29', '2020-02-26 14:35:12', 9, 2),
(17, 'Matcha Latte Hot', 15000, '', 100, '91582716017.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:20:17', '2020-02-26 11:20:17', 9, 2),
(18, 'V60 Natural', 15000, '', 100, '91582716105.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:21:45', '2020-02-26 11:21:45', 9, 2),
(19, 'V60 Fullwash', 15000, '', 100, '91582716133.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:22:13', '2020-02-26 11:22:13', 9, 2),
(20, 'Chocolatte Ice', 15000, '', 100, '91582716235.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:23:55', '2020-02-26 11:23:55', 9, 2),
(22, 'Espresso', 10000, '', 100, '91582716455.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:27:35', '2020-02-26 11:27:35', 9, 2),
(23, 'Matcha Latte Ice', 15000, '', 100, '91582716520.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:28:40', '2020-02-26 11:28:40', 9, 2),
(25, 'Choco Original Ice', 13000, '', 100, '91582716724.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:32:04', '2020-02-26 11:32:04', 9, 2),
(26, 'Terancam', 15000, '', 100, '91582717110.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:38:30', '2020-02-26 11:38:30', 9, 2),
(27, 'Markocang', 18000, '', 100, '91582717143.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:39:03', '2020-02-26 11:39:03', 9, 2),
(28, 'Choco Original Hot', 13000, '', 100, '91582717452.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:44:12', '2020-02-26 11:44:12', 9, 2),
(30, 'Cafe Latte Ice', 15000, '', 100, '91582717526.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:45:26', '2020-02-26 11:45:26', 9, 2),
(31, 'Cafe Latte Hot', 15000, '', 100, '91582717554.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:45:54', '2020-02-26 11:45:54', 9, 2),
(32, 'Cappucino Ice', 15000, '', 100, '91582717579.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:46:19', '2020-02-26 11:46:19', 9, 2),
(33, 'Cappucino Hot', 15000, '', 100, '91582717606.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:46:46', '2020-02-26 11:46:46', 9, 2),
(34, 'Americano Hot', 15000, '', 100, '91582717652.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:47:32', '2020-02-26 11:47:32', 9, 2),
(35, 'Americano Ice', 15000, '', 100, '91582718228.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:57:08', '2020-02-26 11:57:08', 9, 2),
(36, 'Spromon Shake', 18000, '', 100, '91582718283.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 11:58:03', '2020-02-26 11:58:03', 9, 2),
(37, 'Chocolatte Hot', 15000, '', 100, '91582718880.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 12:08:00', '2020-02-26 12:08:00', 9, 2),
(38, 'Tubruk Natural', 13000, '', 100, '91582719160.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 12:12:40', '2020-02-26 12:12:40', 9, 2),
(39, 'Tubruk Fullwash', 13000, '', 100, '91582719182.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 12:13:02', '2020-02-26 12:13:02', 9, 2),
(40, 'Vietnam Drip', 15000, '', 100, '91582719299.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 12:14:59', '2020-02-26 12:14:59', 9, 2),
(41, 'White Ocean', 13000, '', 100, '91582720018.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 12:26:58', '2020-02-26 12:26:58', 9, 2),
(42, 'Black Ocean', 13000, '', 100, '91582720469.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 12:34:29', '2020-02-26 12:34:29', 9, 2),
(43, 'Red Ocean', 13000, '', 100, '91582720517.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 12:35:17', '2020-02-26 12:35:17', 9, 2),
(49, 'Ice Tea Lemon Hot', 13500, 'This is a tea with ice and hot lemon that is mixed', 90, '271589637729.png', NULL, NULL, NULL, NULL, 'baru', '2020-05-16 14:02:09', '2020-05-16 14:02:09', 27, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subcriber`
--

CREATE TABLE `subcriber` (
  `id_subs` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcriber`
--

INSERT INTO `subcriber` (`id_subs`, `email`, `waktu`) VALUES
(1, 'adif.maulana@gmail.com', '2020-02-24 07:01:04'),
(2, 'test@gmail.com', '2020-02-24 07:04:15'),
(3, 'ma2k@straight-line.org', '2020-03-04 04:31:10'),
(4, 'adipati.cs.samsung@gmail.com', '2020-05-16 10:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `catatan` text NOT NULL,
  `id_produk` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `id_keranjang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kuantitas`, `waktu`, `catatan`, `id_produk`, `customer`, `id_keranjang`) VALUES
(66, 1, '2020-02-29 15:56:21', 'Less ice', 17, 19, '191582991781'),
(67, 1, '2020-03-01 15:47:35', '', 16, 5, '51583077655'),
(68, 1, '2020-03-01 15:47:35', '', 17, 5, '51583077655'),
(69, 1, '2020-03-02 07:37:36', '', 16, 7, '71583134656'),
(70, 1, '2020-03-02 07:39:36', '', 16, 7, '71583134776'),
(71, 1, '2020-03-02 10:50:32', '', 17, 5, '51583146232'),
(72, 1, '2020-03-02 10:50:32', '', 22, 5, '51583146232'),
(73, 1, '2020-03-04 01:44:32', '', 30, 7, '71583286272'),
(74, 1, '2020-03-04 01:49:56', '', 30, 7, '71583286596'),
(75, 1, '2020-04-24 06:33:56', 'Shhshs', 16, 2, 'tes0036'),
(76, 8, '2020-04-24 06:50:00', '', 16, 2, 'tes1000'),
(77, 8, '2020-04-24 06:50:11', '', 16, 2, 'tes1011'),
(78, 8, '2020-04-24 07:00:31', '', 16, 2, 'tes1631'),
(79, 1, '2020-04-24 07:09:18', '', 16, 2, 'tes2158'),
(80, 1, '2020-04-24 07:12:15', '', 16, 2, 'tes2335'),
(81, 1, '2020-04-24 11:45:44', '', 16, 2, 'tes8744'),
(82, 1, '2020-04-24 11:45:58', '', 16, 2, 'tes8758'),
(83, 1, '2020-04-24 11:46:01', '', 16, 2, 'tes8761'),
(84, 4, '2020-04-24 11:48:17', '', 16, 2, 'tes8897'),
(85, 4, '2020-04-24 12:04:26', '', 16, 2, 'tes9866'),
(86, 5, '2020-04-24 12:04:26', 'Pop', 17, 2, 'tes9866'),
(87, 3, '2020-04-30 15:28:49', '', 16, 2, 'tes0529'),
(88, 3, '2020-04-30 15:29:01', '', 16, 2, 'tes0541'),
(89, 1, '2020-05-01 07:22:44', '', 20, 26, 'Ban7764'),
(90, 1, '2020-05-01 07:22:44', '', 22, 26, 'Ban7764'),
(91, 1, '2020-05-01 07:22:44', '', 16, 26, 'Ban7764'),
(92, 4, '2020-05-05 03:53:22', 'asu', 16, 2, 'tes0802'),
(93, 1, '2020-05-05 04:40:44', '', 31, 2, 'tes3644'),
(94, 1, '2020-05-05 04:40:44', '', 16, 2, 'tes3644'),
(95, 1, '2020-05-05 04:40:44', '', 17, 2, 'tes3644'),
(96, 1, '2020-05-06 06:37:42', '', 23, 2, 'tes7062'),
(97, 3, '2020-05-06 06:37:42', '', 16, 2, 'tes7062'),
(98, 1, '2020-05-06 07:24:03', '', 23, 2, 'tes9843'),
(99, 3, '2020-05-06 07:24:03', '', 16, 2, 'tes9843'),
(100, 1, '2020-05-15 14:47:05', '', 16, 7, 'tes4025'),
(101, 1, '2020-05-15 14:47:05', '', 17, 7, 'tes4025'),
(102, 5, '2020-05-16 06:51:08', 'Api', 22, 2, 'tes1868'),
(103, 5, '2020-05-16 06:57:59', 'Api', 22, 2, 'tes2279'),
(104, 1, '2020-05-16 06:57:59', '', 35, 2, 'tes2279'),
(105, 1, '2020-05-16 06:57:59', '', 17, 2, 'tes2279'),
(106, 5, '2020-05-16 06:58:11', 'Api', 22, 2, 'tes2291'),
(107, 1, '2020-05-16 06:58:11', '', 35, 2, 'tes2291'),
(108, 1, '2020-05-16 06:58:11', '', 17, 2, 'tes2291'),
(109, 1, '2020-05-16 12:34:26', '', 16, 2, 'tes2466'),
(110, 4, '2020-05-16 12:34:26', '', 19, 2, 'tes2466'),
(111, 0, '2020-05-16 13:16:21', '', 17, 27, 'adi4981'),
(112, 0, '2020-05-16 13:16:40', '', 17, 27, 'adi5000'),
(113, 1, '2020-05-16 14:04:26', '', 16, 27, 'adi7866'),
(114, 2, '2020-05-16 14:04:26', '', 46, 27, 'adi7866'),
(116, 1, '2020-05-16 14:05:49', '', 16, 27, 'adi7948'),
(117, 2, '2020-05-16 14:05:49', '', 46, 27, 'adi7948'),
(119, 1, '2020-05-16 14:08:01', '', 16, 27, 'adi8081'),
(120, 2, '2020-05-16 14:08:01', '', 46, 27, 'adi8081'),
(132, 6, '2020-05-18 08:32:02', 'apel', 17, 2, 'tes0722'),
(133, 6, '2020-05-18 08:32:02', 'haus', 30, 2, 'tes0722'),
(134, 6, '2020-05-18 08:32:09', 'apel', 17, 2, 'tes0729'),
(135, 6, '2020-05-18 08:32:09', 'haus', 30, 2, 'tes0729'),
(136, 1, '2020-05-27 10:08:40', '', 30, 7, 'tes4120'),
(137, 1, '2020-05-27 10:08:40', '', 19, 7, 'tes4120'),
(138, 1, '2020-05-27 10:08:51', '', 30, 7, 'tes4131'),
(139, 1, '2020-05-27 10:08:51', '', 19, 7, 'tes4131'),
(140, 1, '2020-05-27 10:08:57', '', 30, 7, 'tes4136'),
(141, 1, '2020-05-27 10:08:57', '', 19, 7, 'tes4136'),
(142, 1, '2020-05-27 10:19:06', '', 30, 7, 'tes4745'),
(143, 3, '2020-05-27 10:19:06', '', 19, 7, 'tes4745'),
(144, 3, '2020-05-27 10:19:06', '', 18, 7, 'tes4745');
-- --------------------------------------------------------

--
-- Table structure for table `transaksi_tryout`
--

CREATE TABLE `transaksi_tryout` (
  `id_transaksi_tryout` int(11) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status` enum('Diproses','Berhasil','Gagal') DEFAULT 'Diproses',
  `id_tryout` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `insert_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi_tryout`
--

INSERT INTO `transaksi_tryout` (`id_transaksi_tryout`, `bukti`, `status`, `id_tryout`, `id_user`, `insert_on`, `update_on`) VALUES
(1, NULL, 'Diproses', 1, 1, '2020-05-26 03:02:31', '2020-05-27 03:53:17'),
(2, NULL, 'Diproses', 2, 1, '2020-05-26 03:02:31', '2020-05-27 03:53:24'),
(3, NULL, 'Berhasil', 1, 1, '2020-05-27 05:34:49', '2020-05-27 05:34:49'),
(4, NULL, 'Berhasil', 2, 1, '2020-05-27 05:39:45', '2020-05-27 05:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `tryout`
--

CREATE TABLE `tryout` (
  `id_tryout` int(11) NOT NULL,
  `paket` varchar(45) NOT NULL,
  `penyelenggara` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `nama_bank` varchar(45) DEFAULT NULL,
  `nama_rekening` varchar(45) DEFAULT NULL,
  `no_rekening` varchar(45) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `waktu_mulai` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `waktu_selesai` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `insert_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tryout`
--

INSERT INTO `tryout` (`id_tryout`, `paket`, `penyelenggara`, `harga`, `nama_bank`, `nama_rekening`, `no_rekening`, `thumbnail`, `waktu_mulai`, `waktu_selesai`, `insert_on`, `update_on`) VALUES
(1, 'Tryout SBM Unpad', 'Universitas Padjajaran', 5000, 'mandiri', 'Abdul', '140000101789', 'asset/images/kampus/kampus_1.jpg', '2020-06-02 10:00:00', '2020-06-02 12:00:00', '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(2, 'Tryout SBM ITB', 'Institut Teknologi Bandung', 5000, 'BNI', 'Bari', '140000101790', 'asset/images/kampus/kampus_2.jpg', '2020-06-02 10:00:00', '2020-06-02 12:00:00', '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(3, 'Tryout SBM Unbraw', 'Universitas Brawijaya', 5000, 'BCA', 'Ahmad', '140000101791', 'asset/images/kampus/kampus_3.jpg', '2020-06-02 10:00:00', '2020-06-02 12:00:00', '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(4, 'Tryout SBM UPI', 'Universitas Pendidikan Indonesia', 5000, 'BRI', 'Sadet', '140000101792', 'asset/images/kampus/kampus_4.jpg', '2020-06-02 10:00:00', '2020-06-02 12:00:00', '2020-02-24 07:00:05', '2020-02-24 07:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `hash` varchar(45) DEFAULT NULL,
  `salt` varchar(45) DEFAULT NULL,
  `oauth_provider` varchar(45) DEFAULT NULL,
  `oauth_uid` varchar(45) DEFAULT NULL,
  `password_log` text DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `alamat_pengiriman` varchar(255) DEFAULT NULL,
  `alamat_penjemputan` varchar(255) DEFAULT NULL,
  `npm` varchar(12) DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `nama_merchant` varchar(255) DEFAULT NULL,
  `validasi` int(1) NOT NULL DEFAULT 0,
  `foto` varchar(255) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `insert_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `hash`, `salt`, `oauth_provider`, `oauth_uid`, `password_log`, `alamat`, `alamat_pengiriman`, `alamat_penjemputan`, `npm`, `nama_user`, `nama_merchant`, `validasi`, `foto`, `no_hp`, `insert_on`, `update_on`) VALUES
(1, 'test1', 'test1@mail.com', 'a675751f329e2926c11f6e6890776e76b012091f99919', 'j9NlVJZf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user1', 'merchant1', 0, NULL, NULL, '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(2, 'test2', 'test2@mail.com', '5d32a16b86c12cf93f49a85e4a3d9c140e267e45aa875', 'jads6oy2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user2', 'merchant2', 0, NULL, NULL, '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(3, 'test3', 'test3@mail.com', 'c9035947066d79edb1ed96f94ce68e6a944822fe684c7', '34OsgFI5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user3', 'merchant3', 0, NULL, NULL, '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(4, 'aiueo', 'a@maul.con', '36aa55f0af9eaedccd064573cf0e62fdfb8497649ba91', 'FR4jw1Hs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-24 07:50:37', '2020-02-24 07:50:37'),
(5, 'ariqragatra', 'ariqragatra@gmail.com', 'cd6972f9c2813e31c5ff6e564e503110d374d52c9981f', '8pSWNVx7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-24 09:24:54', '2020-02-24 09:24:54'),
(6, 'aul', 'auliaputerifarhandina@gmail.com', '71f7193b01b270f5c90351ab02b273bb67a857ea5f3a4', 'XfO7nAkl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-24 14:42:57', '2020-02-24 14:42:57'),
(7, 'test', 'marcellantonius18@gmail.com', 'db01d2b3b0b83d3ba79daa7b9eeed384a48a8623a4512', 'Jp8Iaetw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-25 08:10:01', '2020-02-25 08:10:01'),
(8, 'dhaaannn123', 'nthingtodohere12@gmail.com', '8fcf53f1fed85021c970a87fbe271582b8bd83645dccf', 'hVY8tev6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-25 12:21:57', '2020-02-25 12:21:57'),
(9, 'Ridho', 'rreph181198@gmail.com', '68f89c90da9f49035b6a05da3c5c503e7aab2fd012130', 'ynNBSFm2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Takafee', 0, NULL, NULL, '2020-02-25 15:12:55', '2020-02-25 15:12:55'),
(15, 'Ridha', 'ricardohalim@gmail.com', '726dae2bd925903817076c20945b0b2cd7c1449d6a8ea', 'fnm5gB49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-25 15:22:14', '2020-02-25 15:22:14'),
(16, 'Hanif', 'Hanifazharii07@gmail.com', '35ee5ed48ff880cf7c7cc5c7f897f4f8c0d98f7b9644d', 'kjlfiGzY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-27 10:39:48', '2020-02-27 10:39:48'),
(17, 'apud', 'Apud@gmail.com', '68e141747b70266304045f408446205abece81657255b', '6HeBSuPz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-28 00:16:29', '2020-02-28 00:16:29'),
(18, 'hafiz', 'hafiz1417@gmail.com', 'a432079922bb7af01b2a5fe0e9d5f7ad39d0b7ce299d8', 'dxg3pLmK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-28 15:41:58', '2020-02-28 15:41:58'),
(19, 'Nemo', 'zulfimulyansyah@gmail.com', '8d3b7f808833f6cb07f32f6110cd0fbe158824b9f7c15', 'bwDRto0u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-29 15:55:06', '2020-02-29 15:55:06'),
(24, 'difa', 'alvian.wadada45@gmail.com', 'db86d25ca7ba0911ab5cb0ff85c338740bfa0f09f69d2', 'KQ9NA382', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-03-03 00:30:26', '2020-03-03 00:30:26'),
(25, 'myreceipt', 'ma2k@straight-line.org', 'e03fc4d0a3f4ef1db9a7819183b7046360bd9623da8ad', 'XL4EyegS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-03-04 04:28:21', '2020-03-04 04:28:21'),
(26, 'Bangbang', 'alvian.wadada@gmail.com', '826a9a8688ba3a7fb92a2a568466ff6854bfc395bf382', '1Qj0FKyt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-05-01 07:21:16', '2020-05-01 07:21:16'),
(27, 'adipati_ma', 'adipati.cs.samsung@gmail.com', '049ada01a8138253916398e83c7b10ec254e6497bf928', 'JkdGzSCf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-05-11 02:03:15', '2020-05-11 02:03:15'),
(32, 'birgitta.laura', 'birgittalaura.5@gmail.com', 'fa4c41c657a11bc2d412a6c1168abb6ecb9d00a9659cd', 'LcjVR6Mv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-05-16 13:34:54', '2020-05-16 13:34:54'),
(33, 'agneshata', 'agneshata68@gmail.com', 'f8b3e83965f712e1202d503cc6143eff215e0d3f89836', 'iD34QeEp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-05-17 04:40:43', '2020-05-17 04:40:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_tryout`
--
ALTER TABLE `admin_tryout`
  ADD PRIMARY KEY (`id_admin_tryout`);

--
-- Indexes for table `admin_tryout_univ`
--
ALTER TABLE `admin_tryout_univ`
  ADD PRIMARY KEY (`id_admin_tryout_univ`);

--
-- Indexes for table `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`id_dompet`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `fkIdx_75` (`id_user`);

--
-- Indexes for table `history_transaksi`
--
ALTER TABLE `history_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fkIdx_82` (`id_user`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fkIdx_115` (`id_user`),
  ADD KEY `fkIdx_118` (`id_keranjang`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fkIdx_60` (`merchant`),
  ADD KEY `fkIdx_63` (`id_kategori`);

--
-- Indexes for table `subcriber`
--
ALTER TABLE `subcriber`
  ADD PRIMARY KEY (`id_subs`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fkIdx_107` (`id_keranjang`),
  ADD KEY `fkIdx_66` (`id_produk`),
  ADD KEY `fkIdx_69` (`customer`);

--
-- Indexes for table `transaksi_tryout`
--
ALTER TABLE `transaksi_tryout`
  ADD PRIMARY KEY (`id_transaksi_tryout`),
  ADD KEY `fkIdx_200` (`id_tryout`),
  ADD KEY `fkIdx_201` (`id_user`);

--
-- Indexes for table `tryout`
--
ALTER TABLE `tryout`
  ADD PRIMARY KEY (`id_tryout`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_tryout_univ`
--
ALTER TABLE `admin_tryout_univ`
  MODIFY `id_admin_tryout_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dompet`
--
ALTER TABLE `dompet`
  MODIFY `id_dompet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_transaksi`
--
ALTER TABLE `history_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `subcriber`
--
ALTER TABLE `subcriber`
  MODIFY `id_subs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `transaksi_tryout`
--
ALTER TABLE `transaksi_tryout`
  MODIFY `id_transaksi_tryout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tryout`
--
ALTER TABLE `tryout`
  MODIFY `id_tryout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dompet`
--
ALTER TABLE `dompet`
  ADD CONSTRAINT `FK_75` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `FK_82` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_115` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `FK_118` FOREIGN KEY (`id_keranjang`) REFERENCES `keranjang` (`id_keranjang`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_60` FOREIGN KEY (`merchant`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `FK_63` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `transaksi_tryout`
--
ALTER TABLE `transaksi_tryout`
  ADD CONSTRAINT `FK_200` FOREIGN KEY (`id_tryout`) REFERENCES `tryout` (`id_tryout`),
  ADD CONSTRAINT `FK_201` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
