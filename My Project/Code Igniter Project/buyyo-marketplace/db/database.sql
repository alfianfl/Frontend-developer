-- ****************** SqlDBM: MySQL ******************;
-- ***************************************************;

-- ************************************** `User`
-- create database db_buyyo;

-- use db_buyyo;

CREATE TABLE `User`
(
 `id_user`            int(11) NOT NULL AUTO_INCREMENT,
 `username`           varchar(45) NOT NULL UNIQUE,
 `email`              varchar(45) NOT NULL UNIQUE,
 `hash`               varchar(45) NOT NULL ,
 `salt`               varchar(45) NOT NULL ,
 `password_log`       text ,
 `alamat`             varchar(255) ,
 `alamat_pengiriman`  varchar(255) ,
 `alamat_penjemputan` varchar(255) ,
 `npm`                varchar(12) ,
 `nama_user`          varchar(255) ,
 `nama_merchant`      varchar(255) ,
 `validasi`           int(1) NOT NULL DEFAULT 0,
 `foto`               varchar(255),
 `no_hp`              varchar(13),
 `insert_on`          timestamp NOT NULL DEFAULT current_timestamp,
 `update_on`          timestamp NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp,

PRIMARY KEY (`id_user`)
);

INSERT INTO `User` (`username`,`email`,`hash`,`salt`,`nama_user`,`nama_merchant`) VALUES
('test1','test1@mail.com','a675751f329e2926c11f6e6890776e76b012091f99919856b705cfdc1de6105a','j9NlVJZf','user1','merchant1'),
('test2','test2@mail.com','5d32a16b86c12cf93f49a85e4a3d9c140e267e45aa875c7673e611e03cb80581','jads6oy2','user2','merchant2'),
('test3','test3@mail.com','c9035947066d79edb1ed96f94ce68e6a944822fe684c73531bd164ab10b9220e','34OsgFI5','user3','merchant3');

-- ************************************** `Kategori`

CREATE TABLE `Kategori`
(
 `id_kategori`   int(11) NOT NULL AUTO_INCREMENT,
 `nama_kategori` varchar(100) NOT NULL ,

PRIMARY KEY (`id_kategori`)
);

INSERT INTO `Kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman');
-- ************************************** `Dompet`

CREATE TABLE `Dompet`
(
 `id_dompet`       int(11) NOT NULL AUTO_INCREMENT,
 `saldo`           int NOT NULL DEFAULT 0,
 `cashback_total`  int NOT NULL DEFAULT 0,
 `cashback_mati`   int NOT NULL DEFAULT 0,
 `cashback_hidup`  int NOT NULL DEFAULT 0,
 `total_transaksi` int NOT NULL DEFAULT 0,
 `slot_total`      int NOT NULL DEFAULT 0,
 `slot_hidup`      int NOT NULL DEFAULT 0,
 `slot_mati`       int NOT NULL DEFAULT 0,
 `id_user`         int(11) NOT NULL UNIQUE,

PRIMARY KEY (`id_dompet`),
KEY `fkIdx_75` (`id_user`),
CONSTRAINT `FK_75` FOREIGN KEY `fkIdx_75` (`id_user`) REFERENCES `User` (`id_user`)
);

-- ************************************** `Produk`

CREATE TABLE `Produk`
(
 `id_produk`      int(11) NOT NULL AUTO_INCREMENT,
 `nama_produk`    varchar(100) NOT NULL ,
 `harga_produk`   int(11) NOT NULL ,
 `ket_produk`     longtext NOT NULL ,
 `stok_produk`    int NOT NULL DEFAULT 0,
 `gambar1`        varchar(255) ,
 `gambar2`        varchar(255) ,
 `gambar3`        varchar(255) ,
 `gambar4`        varchar(255) ,
 `gambar5`        varchar(255) ,
 `kondisi_produk` enum('baru', 'bekas') NOT NULL ,
 `insert_on`      timestamp NOT NULL DEFAULT current_timestamp ,
 `update_on`      timestamp NOT NULL DEFAULT current_timestamp ON UPDATE current_timestamp ,
--  `id_user`        int(11) NOT NULL ,
 `merchant`       int(11) NOT NULL,
--  merch
 `id_kategori`    int(11) NOT NULL ,

PRIMARY KEY (`id_produk`),
KEY `fkIdx_60` (`merchant`),
CONSTRAINT `FK_60` FOREIGN KEY `fkIdx_60` (`merchant`) REFERENCES `User` (`id_user`),
KEY `fkIdx_63` (`id_kategori`),
CONSTRAINT `FK_63` FOREIGN KEY `fkIdx_63` (`id_kategori`) REFERENCES `Kategori` (`id_kategori`)
);

INSERT INTO `Produk` (`id_produk`, `nama_produk`, `harga_produk`, `ket_produk`, `gambar1`,  `kondisi_produk`, `merchant`, `id_kategori`) VALUES
(1, 'Mie Ayam', 10000, 'Mie ayam dengan kuah kari', 'mie_ayam.jpg', 'baru', 1, 1),
(2, 'Pop Ice', 5000, 'Pop ice berbagai rasa', 'pop_ice.jpg', 'baru', 2, 2),
(3, 'Tahu Sumedang', 7000, 'Tahu enak khas Sumedang', 'tahu_sumedang.jpg', 'baru', 3, 1);


-- ************************************** `Keranjang`

CREATE TABLE `Keranjang`
(
 `id_keranjang` varchar(255) NOT NULL,
 `waktu`        timestamp NOT NULL DEFAULT current_timestamp,
--  customer
 `id_user`      int(11) NOT NULL ,

PRIMARY KEY (`id_keranjang`),
KEY `fkIdx_82` (`id_user`),
CONSTRAINT `FK_82` FOREIGN KEY `fkIdx_82` (`id_user`) REFERENCES `User` (`id_user`)
);

INSERT INTO `Keranjang` (`id_keranjang`, `id_user`) VALUES
('1', 1);

-- ************************************** `Pembayaran`

CREATE TABLE `Pembayaran`
(
 `id_pembayaran`     int(11) NOT NULL AUTO_INCREMENT,
 `metode_pembayaran` enum('transfer', 'tunai') NOT NULL ,
 `status_pembayaran` varchar(10) NOT NULL DEFAULT 'pending',
 `id_user`           int(11) NOT NULL ,
 `id_keranjang`      varchar(255) NOT NULL ,

PRIMARY KEY (`id_pembayaran`),
KEY `fkIdx_115` (`id_user`),
CONSTRAINT `FK_115` FOREIGN KEY `fkIdx_115` (`id_user`) REFERENCES `User` (`id_user`),
KEY `fkIdx_118` (`id_keranjang`),
CONSTRAINT `FK_118` FOREIGN KEY `fkIdx_118` (`id_keranjang`) REFERENCES `Keranjang` (`id_keranjang`)
);

INSERT INTO `Pembayaran` (`id_pembayaran`, `metode_pembayaran`, `status_pembayaran`,`id_user`, `id_keranjang`) VALUES
(1, 'Tunai','Lunas', 1, '1');

-- ************************************** `Transaksi`

CREATE TABLE `Transaksi`
(
 `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
 `kuantitas`    int NOT NULL ,
 `waktu`        timestamp NOT NULL DEFAULT current_timestamp,
 `catatan`      text NOT NULL ,
 `id_produk`    int(11) NOT NULL ,
--  `id_user`      int(11) NOT NULL ,
 `customer`     int(11) NOT NULL,
--  cust
 `id_keranjang` varchar(255) NOT NULL ,

PRIMARY KEY (`id_transaksi`),
KEY `fkIdx_107` (`id_keranjang`),
CONSTRAINT `FK_107` FOREIGN KEY `fkIdx_107` (`id_keranjang`) REFERENCES `Keranjang` (`id_keranjang`),
KEY `fkIdx_66` (`id_produk`),
CONSTRAINT `FK_66` FOREIGN KEY `fkIdx_66` (`id_produk`) REFERENCES `Produk` (`id_produk`),
KEY `fkIdx_69` (`customer`),
CONSTRAINT `FK_69` FOREIGN KEY `fkIdx_69` (`customer`) REFERENCES `User` (`id_user`)
);

INSERT INTO `Transaksi` (`id_transaksi`, `kuantitas`, `catatan`, `id_produk`, `customer`, `id_keranjang`) VALUES
(1, 2, '22nya pedes', 1, 1, '1'),
(2, 3, 'semuanya ga pake es, rasa coklat, vanilla, dan stroberi', 2, 1, '1');

-- ************************************** `History Transaksi`

CREATE TABLE `History_transaksi`
(
 `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
 `kuantitas`    int NOT NULL ,
 `waktu`        timestamp NOT NULL DEFAULT current_timestamp,
 `catatan`      text NOT NULL ,
 `id_produk`    int(11) NOT NULL ,
 `customer`     int(11) NOT NULL,
 `id_keranjang` varchar(255) NOT NULL ,

PRIMARY KEY (`id_transaksi`)
);

CREATE TABLE `Subcriber`
(
 `id_subs` int(11) NOT NULL AUTO_INCREMENT,
 `email`   varchar(45),
 `waktu`   timestamp NOT NULL DEFAULT current_timestamp,

 PRIMARY KEY (`id_subs`)
);