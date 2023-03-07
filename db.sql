-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sablon
CREATE DATABASE IF NOT EXISTS `sablon` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sablon`;

-- Dumping structure for table sablon.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bahan` varchar(120) NOT NULL DEFAULT '',
  `jenis` varchar(120) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sablon.kategori: ~5 rows (approximately)
REPLACE INTO `kategori` (`id`, `bahan`, `jenis`, `harga`) VALUES
	(1, 'cotton combed 24s standar', 'sablon DTF / sablon digital', 90000),
	(2, 'sablon rubber', 'cotton combed 30s standar', 75000),
	(3, 'cotton combed 30s standar', 'sablon plastisol', 75000),
	(20, 'cotton combed 30s standar', 'sablon DTF / sablon digital', 80000);

-- Dumping structure for table sablon.pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` int NOT NULL,
  `produk_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `nama_pemesan` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `telpon` varchar(120) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `bukti_bayar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `catatan` text,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `produk_id` (`produk_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sablon.pesanan: ~0 rows (approximately)
REPLACE INTO `pesanan` (`id`, `produk_id`, `user_id`, `tgl_pesan`, `nama_pemesan`, `email`, `telpon`, `status`, `bukti_bayar`, `catatan`) VALUES
	(1373129, 59, 6, '2023-03-07', 'dedi', 'naufal@gmail.com', '980989898988', 0, '', 'abc'),
	(1655603, 57, 6, '2023-03-06', 'Indra', 'indra@gmail.com', '628159822550', 1, '', 'XL');

-- Dumping structure for table sablon.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL DEFAULT '',
  `kategori` int NOT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`),
  KEY `kategori` (`kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sablon.produk: ~4 rows (approximately)
REPLACE INTO `produk` (`id`, `nama`, `kategori`, `foto`) VALUES
	(57, 'URBAN DENIM', 1, '1678143692-1678139215-p1.jpeg'),
	(59, 'Wonderful', 2, '1678143492-p6.jpeg'),
	(60, 'NEVIEW', 1, '1678143492-p6.jpeg'),
	(61, 'Mataram', 1, '1678142433-p7.jpeg');

-- Dumping structure for table sablon.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sablon.users: ~1 rows (approximately)
REPLACE INTO `users` (`id`, `nama`, `username`, `password`, `status`) VALUES
	(1, 'admin', 'admin', 'admin', 1),
	(6, 'indra', 'indra', 'indra', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
