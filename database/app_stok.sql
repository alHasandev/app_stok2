-- Dumping database structure for app_stok
DROP DATABASE IF EXISTS `app_stok`;
CREATE DATABASE IF NOT EXISTS `app_stok` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `app_stok`;


-- Dumping structure for table app_stok.barang
DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` text NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jenis` (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table app_stok.barang: ~4 rows (approximately)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT IGNORE INTO `barang` (`id`, `nama_barang`, `id_jenis`, `harga`, `stok`, `keterangan`) VALUES
	(1, 'Lemari 1A', 1, 200000, 10, 'Lemari type 1A'),
	(2, 'Regulator 1A', 2, 400000, 7, 'Regulator type 1A'),
	(6, 'Plastik Cap Kotak Isi 60', 3, 2500, 0, 'PT. ,....'),
	(7, 'Plastik Bawang ', 3, 5000, 10, 'Plastik Berkualitas, Diproduksi oleh : DPS');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;


-- Dumping structure for table app_stok.barang_masuk
DROP TABLE IF EXISTS `barang_masuk`;
CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_barang` (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table app_stok.barang_masuk: ~4 rows (approximately)
/*!40000 ALTER TABLE `barang_masuk` DISABLE KEYS */;
INSERT IGNORE INTO `barang_masuk` (`id`, `id_barang`, `tgl_masuk`, `jumlah`) VALUES
	(5, 1, '2020-06-04', 4),
	(6, 1, '2020-06-04', 6),
	(7, 2, '2020-06-04', 10),
	(8, 2, '2020-06-08', 12);
/*!40000 ALTER TABLE `barang_masuk` ENABLE KEYS */;


-- Dumping structure for table app_stok.child_items
DROP TABLE IF EXISTS `child_items`;
CREATE TABLE IF NOT EXISTS `child_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_parent` int(11) NOT NULL,
  `nav_name` varchar(50) NOT NULL,
  `nav_link` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nav_parent` (`nav_parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table app_stok.child_items: ~0 rows (approximately)
/*!40000 ALTER TABLE `child_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `child_items` ENABLE KEYS */;


-- Dumping structure for view app_stok.detail_barang
DROP VIEW IF EXISTS `detail_barang`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `detail_barang` (
	`id` INT(11) NOT NULL,
	`nama_barang` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`id_jenis` INT(11) NOT NULL,
	`harga` DOUBLE NOT NULL,
	`stok` INT(11) NOT NULL,
	`keterangan` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_jenis` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view app_stok.detail_barang_masuk
DROP VIEW IF EXISTS `detail_barang_masuk`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `detail_barang_masuk` (
	`id` INT(11) NOT NULL,
	`id_barang` INT(11) NOT NULL,
	`tgl_masuk` DATE NOT NULL,
	`jumlah` INT(11) NOT NULL,
	`nama_barang` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`nama_jenis` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`harga` DOUBLE NOT NULL,
	`stok` INT(11) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view app_stok.detail_mutasi
DROP VIEW IF EXISTS `detail_mutasi`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `detail_mutasi` (
	`id` INT(11) NOT NULL,
	`tgl_mutasi` DATE NOT NULL,
	`id_barang` INT(11) NOT NULL,
	`id_sales` INT(11) NOT NULL,
	`jumlah` INT(11) NOT NULL,
	`pembayaran` DOUBLE NOT NULL,
	`nama_barang` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`jenis_barang` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`harga` DOUBLE NOT NULL,
	`nama_sales` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`total_harga` DOUBLE NOT NULL,
	`lunas` INT(1) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view app_stok.detail_users
DROP VIEW IF EXISTS `detail_users`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `detail_users` (
	`id` INT(11) NOT NULL,
	`username` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`password` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`privilege_id` INT(11) NOT NULL,
	`image` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`privilege` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for table app_stok.jenis
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table app_stok.jenis: ~3 rows (approximately)
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
INSERT IGNORE INTO `jenis` (`id`, `nama_jenis`) VALUES
	(1, 'Lemari'),
	(2, 'Regulator'),
	(3, 'Plastik');
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;


-- Dumping structure for table app_stok.mutasi_barang
DROP TABLE IF EXISTS `mutasi_barang`;
CREATE TABLE IF NOT EXISTS `mutasi_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_mutasi` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pembayaran` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sales` (`id_sales`),
  KEY `id_barang` (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table app_stok.mutasi_barang: ~4 rows (approximately)
/*!40000 ALTER TABLE `mutasi_barang` DISABLE KEYS */;
INSERT IGNORE INTO `mutasi_barang` (`id`, `tgl_mutasi`, `id_barang`, `id_sales`, `jumlah`, `pembayaran`) VALUES
	(10, '2020-06-04', 2, 3, 4, 1600000),
	(11, '2020-06-08', 2, 5, 6, 400000),
	(12, '2020-06-08', 2, 3, 5, 0),
	(13, '2020-06-08', 6, 6, 10, 25000);
/*!40000 ALTER TABLE `mutasi_barang` ENABLE KEYS */;


-- Dumping structure for table app_stok.nav_headers
DROP TABLE IF EXISTS `nav_headers`;
CREATE TABLE IF NOT EXISTS `nav_headers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header_name` varchar(50) NOT NULL,
  `header_text` varchar(50) NOT NULL,
  `order_place` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table app_stok.nav_headers: ~2 rows (approximately)
/*!40000 ALTER TABLE `nav_headers` DISABLE KEYS */;
INSERT IGNORE INTO `nav_headers` (`id`, `header_name`, `header_text`, `order_place`) VALUES
	(1, 'default', '', 0),
	(3, 'penjualan', 'Penjualan', 1);
/*!40000 ALTER TABLE `nav_headers` ENABLE KEYS */;


-- Dumping structure for table app_stok.nav_items
DROP TABLE IF EXISTS `nav_items`;
CREATE TABLE IF NOT EXISTS `nav_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_header` int(11) NOT NULL,
  `nav_name` varchar(50) NOT NULL,
  `nav_icon` varchar(20) NOT NULL,
  `child_item` tinyint(1) NOT NULL,
  `nav_link` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nav_header` (`nav_header`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table app_stok.nav_items: ~1 rows (approximately)
/*!40000 ALTER TABLE `nav_items` DISABLE KEYS */;
INSERT IGNORE INTO `nav_items` (`id`, `nav_header`, `nav_name`, `nav_icon`, `child_item`, `nav_link`) VALUES
	(1, 1, 'Test', 'fa fas-user', 1, 'test');
/*!40000 ALTER TABLE `nav_items` ENABLE KEYS */;


-- Dumping structure for table app_stok.pembayaran_mutasi
DROP TABLE IF EXISTS `pembayaran_mutasi`;
CREATE TABLE IF NOT EXISTS `pembayaran_mutasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mutasi` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `nominal` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table app_stok.pembayaran_mutasi: ~5 rows (approximately)
/*!40000 ALTER TABLE `pembayaran_mutasi` DISABLE KEYS */;
INSERT IGNORE INTO `pembayaran_mutasi` (`id`, `id_mutasi`, `tgl_pembayaran`, `nominal`) VALUES
	(2, 10, '2020-06-07', 120000),
	(3, 10, '2020-06-08', 480000),
	(4, 10, '2020-06-08', 1000000),
	(5, 11, '2020-06-08', 400000),
	(6, 13, '2020-06-08', 25000);
/*!40000 ALTER TABLE `pembayaran_mutasi` ENABLE KEYS */;


-- Dumping structure for table app_stok.penjualan
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_penjualan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tipe_pembayaran` tinyint(4) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table app_stok.penjualan: ~0 rows (approximately)
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;


-- Dumping structure for table app_stok.privileges
DROP TABLE IF EXISTS `privileges`;
CREATE TABLE IF NOT EXISTS `privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table app_stok.privileges: ~3 rows (approximately)
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT IGNORE INTO `privileges` (`id`, `name`) VALUES
	(1, 'super'),
	(2, 'master'),
	(3, 'admin');
/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;


-- Dumping structure for table app_stok.sales
DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sales` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kontak` char(13) NOT NULL,
  `alamat` text NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table app_stok.sales: ~3 rows (approximately)
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT IGNORE INTO `sales` (`id`, `nama_sales`, `gender`, `tgl_lahir`, `kontak`, `alamat`, `image`) VALUES
	(3, 'Nunung', 'Perempuan', '1997-02-04', '082149259820', 'Jl. Panjujuran 76', 'default.png'),
	(5, 'Fajran', 'Laki-Laki', '1997-01-08', '082149259828', 'Jl. Mekar Sari, no. 24', 'default.png'),
	(6, 'Fajrian', 'Laki-Laki', '1996-06-19', '082149259822', 'Jl. Sari bunga, no. 21', 'default.png');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;


-- Dumping structure for view app_stok.stok_sales
DROP VIEW IF EXISTS `stok_sales`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `stok_sales` (
	`id` INT(11) NOT NULL,
	`nama_sales` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`gender` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`tgl_lahir` DATE NOT NULL,
	`kontak` CHAR(13) NOT NULL COLLATE 'utf8mb4_general_ci',
	`alamat` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`image` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`lunas` BIGINT(21) NOT NULL,
	`belum_lunas` BIGINT(21) NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for table app_stok.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `privilege` (`privilege_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table app_stok.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `username`, `password`, `privilege_id`, `image`) VALUES
	(1, 'first', 'qwerty', 0, 'default.jpg'),
	(2, 'memyselfandi', '$2y$10$VQpaXfjRohDQg6spyn4sLO7fT8uhEB05NvlrwQ80mS/cZe/Ch4pUq', 1, 'default.png'),
	(3, 'budi98', '$2y$10$Ge75/wEw23e40/XhSJ.oFuc//e2WjlMcW.GQWE238jKn9leiCFC1u', 2, 'default.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for view app_stok.detail_barang
DROP VIEW IF EXISTS `detail_barang`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `detail_barang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `app_stok`.`detail_barang` AS SELECT barang.*, jenis.nama_jenis FROM barang INNER JOIN jenis ON barang.id_jenis = jenis.id ;


-- Dumping structure for view app_stok.detail_barang_masuk
DROP VIEW IF EXISTS `detail_barang_masuk`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `detail_barang_masuk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `app_stok`.`detail_barang_masuk` AS SELECT barang_masuk.*, detail_barang.nama_barang, detail_barang.nama_jenis, detail_barang.harga, detail_barang.stok FROM barang_masuk INNER JOIN detail_barang ON barang_masuk.id_barang = detail_barang.id ;


-- Dumping structure for view app_stok.detail_mutasi
DROP VIEW IF EXISTS `detail_mutasi`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `detail_mutasi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `app_stok`.`detail_mutasi` AS SELECT mutasi_barang.*, detail_barang.nama_barang, detail_barang.nama_jenis as jenis_barang, detail_barang.harga, sales.nama_sales, (detail_barang.harga*mutasi_barang.jumlah) AS total_harga, (CASE WHEN ((detail_barang.harga*mutasi_barang.jumlah) - mutasi_barang.pembayaran) = 0 THEN 1 ELSE 0 END) AS lunas FROM mutasi_barang INNER JOIN detail_barang ON mutasi_barang.id_barang = detail_barang.id INNER JOIN sales ON mutasi_barang.id_sales = sales.id ;


-- Dumping structure for view app_stok.detail_users
DROP VIEW IF EXISTS `detail_users`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `detail_users`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `app_stok`.`detail_users` AS SELECT users.*, privileges.name as privilege FROM users INNER JOIN privileges ON users.privilege_id = privileges.id ;


-- Dumping structure for view app_stok.stok_sales
DROP VIEW IF EXISTS `stok_sales`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `stok_sales`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `app_stok`.`stok_sales` AS SELECT DISTINCT sales.*, COUNT(CASE WHEN detail_mutasi.lunas = 1 THEN 1 END) AS lunas, COUNT(CASE WHEN detail_mutasi.lunas = 0 THEN 1 END) AS belum_lunas FROM sales INNER JOIN detail_mutasi ON sales.id = detail_mutasi.id_sales GROUP BY sales.id ;
