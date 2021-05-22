-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Mar 2020 pada 16.24
-- Versi server: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- Versi PHP: 7.3.13

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
-- Struktur dari tabel `Admin`
--



CREATE TABLE `Admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `hash` varchar(45) NOT NULL,
  `salt` varchar(45) NOT NULL,
  `password_log` text,
  `nama_admin` varchar(255) DEFAULT NULL,
  `insert_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `Admin`
--

INSERT INTO `Admin` (`id_admin`, `username`, `email`, `hash`, `salt`, `nama_admin`, `insert_on`, `update_on`) VALUES
(1, 'test1', 'test1@mail.com', 'a675751f329e2926c11f6e6890776e76b012091f99919', 'j9NlVJZf', 'admin1', '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(2, 'test2', 'test2@mail.com', '5d32a16b86c12cf93f49a85e4a3d9c140e267e45aa875', 'jads6oy2', 'admin2', '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(3, 'test3', 'test3@mail.com', 'c9035947066d79edb1ed96f94ce68e6a944822fe684c7', '34OsgFI5', 'admin3', '2020-02-24 07:00:05', '2020-02-24 07:00:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Dompet`
--

CREATE TABLE `Dompet` (
  `id_dompet` int(11) NOT NULL,
  `saldo` int(11) NOT NULL DEFAULT '0',
  `cashback_total` int(11) NOT NULL DEFAULT '0',
  `cashback_mati` int(11) NOT NULL DEFAULT '0',
  `cashback_hidup` int(11) NOT NULL DEFAULT '0',
  `total_transaksi` int(11) NOT NULL DEFAULT '0',
  `slot_total` int(11) NOT NULL DEFAULT '0',
  `slot_hidup` int(11) NOT NULL DEFAULT '0',
  `slot_mati` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `History_transaksi`
--

CREATE TABLE `History_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `catatan` text NOT NULL,
  `id_produk` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `id_keranjang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `History_transaksi`
--

INSERT INTO `History_transaksi` (`id_transaksi`, `kuantitas`, `waktu`, `catatan`, `id_produk`, `customer`, `id_keranjang`) VALUES
(65, 1, '2020-02-28 15:43:20', '', 28, 18, '181582904600');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Kategori`
--

CREATE TABLE `Kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `Kategori`
--

INSERT INTO `Kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Keranjang`
--

CREATE TABLE `Keranjang` (
  `id_keranjang` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `Keranjang`
--

INSERT INTO `Keranjang` (`id_keranjang`, `waktu`, `id_user`) VALUES
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
('91582744093', '2020-02-26 19:08:13', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Pembayaran`
--

CREATE TABLE `Pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `metode_pembayaran` enum('transfer','tunai') NOT NULL,
  `status_pembayaran` varchar(10) NOT NULL DEFAULT 'pending',
  `id_user` int(11) NOT NULL,
  `id_keranjang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `Pembayaran`
--

INSERT INTO `Pembayaran` (`id_pembayaran`, `metode_pembayaran`, `status_pembayaran`, `id_user`, `id_keranjang`) VALUES
(1, 'tunai', 'Lunas', 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Produk`
--

CREATE TABLE `Produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `ket_produk` longtext NOT NULL,
  `stok_produk` int(11) NOT NULL DEFAULT '0',
  `gambar1` varchar(255) DEFAULT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  `gambar3` varchar(255) DEFAULT NULL,
  `gambar4` varchar(255) DEFAULT NULL,
  `gambar5` varchar(255) DEFAULT NULL,
  `kondisi_produk` enum('baru','bekas') NOT NULL,
  `insert_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `merchant` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `Produk`
--

INSERT INTO `Produk` (`id_produk`, `nama_produk`, `harga_produk`, `ket_produk`, `stok_produk`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `kondisi_produk`, `insert_on`, `update_on`, `merchant`, `id_kategori`) VALUES
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
(43, 'Red Ocean', 13000, '', 100, '91582720517.jpg', NULL, NULL, NULL, NULL, 'baru', '2020-02-26 12:35:17', '2020-02-26 12:35:17', 9, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Subcriber`
--

CREATE TABLE `Subcriber` (
  `id_subs` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `Subcriber`
--

INSERT INTO `Subcriber` (`id_subs`, `email`, `waktu`) VALUES
(1, 'adif.maulana@gmail.com', '2020-02-24 07:01:04'),
(2, 'test@gmail.com', '2020-02-24 07:04:15'),
(3, 'ma2k@straight-line.org', '2020-03-04 04:31:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Transaksi`
--

CREATE TABLE `Transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `catatan` text NOT NULL,
  `id_produk` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `id_keranjang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `Transaksi`
--

INSERT INTO `Transaksi` (`id_transaksi`, `kuantitas`, `waktu`, `catatan`, `id_produk`, `customer`, `id_keranjang`) VALUES
(66, 1, '2020-02-29 15:56:21', 'Less ice', 17, 19, '191582991781'),
(67, 1, '2020-03-01 15:47:35', '', 16, 5, '51583077655'),
(68, 1, '2020-03-01 15:47:35', '', 17, 5, '51583077655'),
(69, 1, '2020-03-02 07:37:36', '', 16, 7, '71583134656'),
(70, 1, '2020-03-02 07:39:36', '', 16, 7, '71583134776'),
(71, 1, '2020-03-02 10:50:32', '', 17, 5, '51583146232'),
(72, 1, '2020-03-02 10:50:32', '', 22, 5, '51583146232'),
(73, 1, '2020-03-04 01:44:32', '', 30, 7, '71583286272'),
(74, 1, '2020-03-04 01:49:56', '', 30, 7, '71583286596');

-- --------------------------------------------------------

--
-- Struktur dari tabel `User`
--

CREATE TABLE `User` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `hash` varchar(45) DEFAULT NULL,
  `salt` varchar(45) DEFAULT NULL,
  `oauth_provider` varchar(45) DEFAULT NULL,
  `oauth_uid` varchar(45) DEFAULT NULL,
  `password_log` text,
  `alamat` varchar(255) DEFAULT NULL,
  `alamat_pengiriman` varchar(255) DEFAULT NULL,
  `alamat_penjemputan` varchar(255) DEFAULT NULL,
  `npm` varchar(12) DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `nama_merchant` varchar(255) DEFAULT NULL,
  `validasi` int(1) NOT NULL DEFAULT '0',
  `foto` varchar(255) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `insert_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `User`
--

INSERT INTO `User` (`id_user`, `username`, `email`, `hash`, `salt`, `password_log`, `alamat`, `alamat_pengiriman`, `alamat_penjemputan`, `npm`, `nama_user`, `nama_merchant`, `validasi`, `foto`, `no_hp`, `insert_on`, `update_on`) VALUES
(1, 'test1', 'test1@mail.com', 'a675751f329e2926c11f6e6890776e76b012091f99919', 'j9NlVJZf', NULL, NULL, NULL, NULL, NULL, 'user1', 'merchant1', 0, NULL, NULL, '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(2, 'test2', 'test2@mail.com', '5d32a16b86c12cf93f49a85e4a3d9c140e267e45aa875', 'jads6oy2', NULL, NULL, NULL, NULL, NULL, 'user2', 'merchant2', 0, NULL, NULL, '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(3, 'test3', 'test3@mail.com', 'c9035947066d79edb1ed96f94ce68e6a944822fe684c7', '34OsgFI5', NULL, NULL, NULL, NULL, NULL, 'user3', 'merchant3', 0, NULL, NULL, '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(4, 'aiueo', 'a@maul.con', '36aa55f0af9eaedccd064573cf0e62fdfb8497649ba91', 'FR4jw1Hs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-24 07:50:37', '2020-02-24 07:50:37'),
(5, 'ariqragatra', 'ariqragatra@gmail.com', 'cd6972f9c2813e31c5ff6e564e503110d374d52c9981f', '8pSWNVx7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-24 09:24:54', '2020-02-24 09:24:54'),
(6, 'aul', 'auliaputerifarhandina@gmail.com', '71f7193b01b270f5c90351ab02b273bb67a857ea5f3a4', 'XfO7nAkl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-24 14:42:57', '2020-02-24 14:42:57'),
(7, 'test', 'marcellantonius18@gmail.com', 'db01d2b3b0b83d3ba79daa7b9eeed384a48a8623a4512', 'Jp8Iaetw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-25 08:10:01', '2020-02-25 08:10:01'),
(8, 'dhaaannn123', 'nthingtodohere12@gmail.com', '8fcf53f1fed85021c970a87fbe271582b8bd83645dccf', 'hVY8tev6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-25 12:21:57', '2020-02-25 12:21:57'),
(9, 'Ridho', 'rreph181198@gmail.com', '68f89c90da9f49035b6a05da3c5c503e7aab2fd012130', 'ynNBSFm2', NULL, NULL, NULL, NULL, NULL, NULL, 'Takafee', 0, NULL, NULL, '2020-02-25 15:12:55', '2020-02-25 15:12:55'),
(15, 'Ridha', 'ricardohalim@gmail.com', '726dae2bd925903817076c20945b0b2cd7c1449d6a8ea', 'fnm5gB49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-25 15:22:14', '2020-02-25 15:22:14'),
(16, 'Hanif', 'Hanifazharii07@gmail.com', '35ee5ed48ff880cf7c7cc5c7f897f4f8c0d98f7b9644d', 'kjlfiGzY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-27 10:39:48', '2020-02-27 10:39:48'),
(17, 'apud', 'Apud@gmail.com', '68e141747b70266304045f408446205abece81657255b', '6HeBSuPz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-28 00:16:29', '2020-02-28 00:16:29'),
(18, 'hafiz', 'hafiz1417@gmail.com', 'a432079922bb7af01b2a5fe0e9d5f7ad39d0b7ce299d8', 'dxg3pLmK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-28 15:41:58', '2020-02-28 15:41:58'),
(19, 'Nemo', 'zulfimulyansyah@gmail.com', '8d3b7f808833f6cb07f32f6110cd0fbe158824b9f7c15', 'bwDRto0u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-02-29 15:55:06', '2020-02-29 15:55:06'),
(24, 'difa', 'alvian.wadada45@gmail.com', 'db86d25ca7ba0911ab5cb0ff85c338740bfa0f09f69d2', 'KQ9NA382', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-03-03 00:30:26', '2020-03-03 00:30:26'),
(25, 'myreceipt', 'ma2k@straight-line.org', 'e03fc4d0a3f4ef1db9a7819183b7046360bd9623da8ad', 'XL4EyegS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-03-04 04:28:21', '2020-03-04 04:28:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Tryout`
--

CREATE TABLE `Tryout` (
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
-- Dumping data untuk tabel `Tryout`
--

INSERT INTO `Tryout` (`id_tryout`, `paket`, `penyelenggara`, `harga`, `nama_bank`, `nama_rekening`, `no_rekening`, `thumbnail`, `waktu_mulai`, `waktu_selesai`, `insert_on`, `update_on`) VALUES
(1, 'Tryout SBM Unpad', 'Universitas Padjajaran', 5000, 'mandiri', 'Abdul', '140000101789', 'asset/images/kampus/kampus_1.jpg', '2020-06-02 10:00:00', '2020-06-02 12:00:00', '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(2, 'Tryout SBM ITB', 'Institut Teknologi Bandung', 5000, 'BNI', 'Bari', '140000101790', 'asset/images/kampus/kampus_2.jpg', '2020-06-02 10:00:00', '2020-06-02 12:00:00', '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(3, 'Tryout SBM Unbraw', 'Universitas Brawijaya', 5000, 'BCA', 'Ahmad', '140000101791', 'asset/images/kampus/kampus_3.jpg', '2020-06-02 10:00:00', '2020-06-02 12:00:00', '2020-02-24 07:00:05', '2020-02-24 07:00:05'),
(4, 'Tryout SBM UPI', 'Universitas Pendidikan Indonesia', 5000, 'BRI', 'Sadet', '140000101792', 'asset/images/kampus/kampus_4.jpg', '2020-06-02 10:00:00', '2020-06-02 12:00:00', '2020-02-24 07:00:05', '2020-02-24 07:00:05');

--
-- Struktur dari tabel `Transaksi_tryout`
--

CREATE TABLE `Transaksi_tryout` (
  `id_transaksi_tryout` int(11) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `id_tryout` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `insert_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `Transaksi_tryout`
--

INSERT INTO `Transaksi_tryout` (`id_transaksi_tryout`, `id_tryout`, `id_user`) VALUES
(1, 1, 1),
(2, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `Dompet`
--
ALTER TABLE `Dompet`
  ADD PRIMARY KEY (`id_dompet`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `fkIdx_75` (`id_user`);

--
-- Indeks untuk tabel `History_transaksi`
--
ALTER TABLE `History_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `Kategori`
--
ALTER TABLE `Kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `Keranjang`
--
ALTER TABLE `Keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fkIdx_82` (`id_user`);

--
-- Indeks untuk tabel `Pembayaran`
--
ALTER TABLE `Pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fkIdx_115` (`id_user`),
  ADD KEY `fkIdx_118` (`id_keranjang`);

--
-- Indeks untuk tabel `Produk`
--
ALTER TABLE `Produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fkIdx_60` (`merchant`),
  ADD KEY `fkIdx_63` (`id_kategori`);

--
-- Indeks untuk tabel `Subcriber`
--
ALTER TABLE `Subcriber`
  ADD PRIMARY KEY (`id_subs`);

--
-- Indeks untuk tabel `Transaksi`
--
ALTER TABLE `Transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fkIdx_107` (`id_keranjang`),
  ADD KEY `fkIdx_66` (`id_produk`),
  ADD KEY `fkIdx_69` (`customer`);

--
-- Indeks untuk tabel `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `Tryout`
--
ALTER TABLE `Tryout`
  ADD PRIMARY KEY (`id_tryout`);

--
-- Indeks untuk tabel `Transaksi_tryout`
--
ALTER TABLE `Transaksi_tryout`
  ADD PRIMARY KEY (`id_transaksi_tryout`),
  ADD KEY `fkIdx_200` (`id_tryout`),
  ADD KEY `fkIdx_201` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `Dompet`
--
ALTER TABLE `Admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `Dompet`
--
ALTER TABLE `Dompet`
  MODIFY `id_dompet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `History_transaksi`
--
ALTER TABLE `History_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `Kategori`
--
ALTER TABLE `Kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `Pembayaran`
--
ALTER TABLE `Pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `Produk`
--
ALTER TABLE `Produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `Subcriber`
--
ALTER TABLE `Subcriber`
  MODIFY `id_subs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `Transaksi`
--
ALTER TABLE `Transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `User`
--
ALTER TABLE `User`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `Tryout`
--
ALTER TABLE `Tryout`
  MODIFY `id_tryout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `Transaksi_tryout`
--
ALTER TABLE `Transaksi_tryout`
  MODIFY `id_transaksi_tryout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `Dompet`
--
ALTER TABLE `Dompet`
  ADD CONSTRAINT `FK_75` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `Keranjang`
--
ALTER TABLE `Keranjang`
  ADD CONSTRAINT `FK_82` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `Pembayaran`
--
ALTER TABLE `Pembayaran`
  ADD CONSTRAINT `FK_115` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`),
  ADD CONSTRAINT `FK_118` FOREIGN KEY (`id_keranjang`) REFERENCES `Keranjang` (`id_keranjang`);

--
-- Ketidakleluasaan untuk tabel `Produk`
--
ALTER TABLE `Produk`
  ADD CONSTRAINT `FK_60` FOREIGN KEY (`merchant`) REFERENCES `User` (`id_user`),
  ADD CONSTRAINT `FK_63` FOREIGN KEY (`id_kategori`) REFERENCES `Kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `Transaksi`
--
ALTER TABLE `Transaksi`
  ADD CONSTRAINT `FK_107` FOREIGN KEY (`id_keranjang`) REFERENCES `Keranjang` (`id_keranjang`),
  ADD CONSTRAINT `FK_66` FOREIGN KEY (`id_produk`) REFERENCES `Produk` (`id_produk`),
  ADD CONSTRAINT `FK_69` FOREIGN KEY (`customer`) REFERENCES `User` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `Transaksi`
--
ALTER TABLE `Transaksi_tryout`
  ADD CONSTRAINT `FK_200` FOREIGN KEY (`id_tryout`) REFERENCES `Tryout` (`id_tryout`),
  ADD CONSTRAINT `FK_201` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
