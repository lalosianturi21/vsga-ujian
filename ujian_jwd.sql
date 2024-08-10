-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2024 at 02:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian_jwd`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `idabout` int(11) NOT NULL,
  `about_name` varchar(255) NOT NULL,
  `about_description` text NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`idabout`, `about_name`, `about_description`, `cover`) VALUES
(2, 'Cara Kami Membawa Anda Menjelajahi Dunia.', 'Kami adalah agen perjalanan yang berdedikasi dan berpengalaman, sepenuh hati berkomitmen untuk membawa Anda dalam petualangan yang tak terlupakan menjelajahi keindahan dunia dalam segala aspeknya. Dengan penuh perhatian, kami merancang dan mengatur setiap detail perjalanan Anda, memastikan pengalaman yang benar-benar istimewa dari awal hingga akhir. Kami mengundang Anda untuk merasakan keajaiban alam, mulai dari pegunungan yang megah dengan pemandangan spektakuler yang akan memukau Anda, hingga pantai yang tenang dengan pasir putih lembut dan air jernih yang menenangkan.  Tim ahli kami berusaha keras untuk merancang itinerary yang ideal, mempertimbangkan setiap aspek perjalanan Anda untuk memastikan Anda bisa menikmati setiap momen tanpa perlu khawatir tentang detail teknis atau logistik. Kami menangani semua aspek perjalanan, mulai dari perencanaan rute yang optimal, pemilihan akomodasi yang nyaman dan berkualitas, hingga pengaturan transportasi yang efisien dan aman.  Kami memahami bahwa setiap perjalanan adalah pengalaman yang sangat pribadi, oleh karena itu kami bekerja sama dengan Anda untuk memahami harapan dan impian Anda, memastikan bahwa setiap elemen dari perjalanan Anda dirancang khusus untuk memenuhi keinginan dan kebutuhan Anda. Dengan pengalaman luas dan keahlian kami dalam industri perjalanan, kami berkomitmen untuk menciptakan pengalaman yang menakjubkan dan berkesan, di mana setiap detik dihabiskan dengan penuh kebahagiaan dan kepuasan.', '66b5fe6dc21022.83947273.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `nama` varchar(64) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '$2a$12$4ZXc5WiHren.Uf8lox.OHupMADwr76tdyzaqPY1KGfdwIDhsXFczi');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(128) NOT NULL,
  `service_price` int(11) NOT NULL,
  `service_description` varchar(255) NOT NULL,
  `service_icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_price`, `service_description`, `service_icon`) VALUES
(1, 'Hotel Terjangkau', 1000000, 'Nikmati penginapan yang nyaman dengan harga yang ramah di kantong, memberikan pengalaman menginap terbaik untuk Anda.', 'fas fa-hotel'),
(2, 'Makanan Dan Minuman', 1500000, 'Rasakan kelezatan kuliner lokal dan internasional yang menggugah selera, disajikan dengan standar terbaik.', 'fas fa-utensils'),
(3, 'Panduan Keamanan', 170000, 'Kami menyediakan panduan keselamatan lengkap agar perjalanan Anda tetap aman dan nyaman.', 'fas fa-bullhorn'),
(4, 'Keliling Dunia', 200000, 'Jelajahi berbagai destinasi menarik di seluruh dunia bersama kami, untuk pengalaman yang tak terlupakan.', 'fas fa-globe-asia'),
(5, 'Perjalanan Tercepat', 200000, 'Kami menawarkan perjalanan dengan kecepatan dan kenyamanan terbaik, agar Anda tiba di tujuan dengan cepat dan aman.', 'fas fa-plane'),
(6, 'Petualangan', 1000000, 'Bagi Anda yang suka tantangan, nikmati berbagai aktivitas petualangan yang seru dan menantang bersama kami.', 'fas fa-hiking');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `idteam` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_description` text NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`idteam`, `team_name`, `team_description`, `cover`) VALUES
(1, 'Teguh Wijaya', 'Teguh adalah seorang organisator yang selalu memastikan segala sesuatu berjalan lancar selama perjalanan', '66b6295f64d649.26739210.png'),
(2, 'Gauri Sanjaya', 'RGauri adalah seorang foodie yang gemar mencicipi makanan khas daerah yang dikunjungi.', '66b6297511b8a2.66057619.png'),
(3, 'Nadya Elisa', 'Nadya adalah seorang petualang sejati yang selalu menjadi pemimpin dalam mencari rute-rute baru', '66b6298097b888.69820641.png'),
(4, 'Lina Pratiwi', 'Lina adalah seorang penulis perjalanan yang suka mendokumentasikan pengalamannya dalam bentuk cerita', '66b62abe8328d6.27876576.png'),
(5, 'Rini Susanti', 'Rini adalah seorang fotografer berbakat yang selalu membawa kamera di setiap perjalanan.', '66b62acb1f05a3.99980634.png');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `idwisata` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `cover` varchar(255) NOT NULL,
  `linkyt` varchar(255) NOT NULL,
  `no_wa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`idwisata`, `nama`, `alamat`, `harga`, `cover`, `linkyt`, `no_wa`) VALUES
(10, 'Air Terjun Sipiso Piso', 'Desa Tongging Kecamatan Merek, Kabupaten Karo, Sumatera Utara', 200000, '66b258fa47df86.07955279.jpg', 'https://www.youtube.com/embed/EbMSvp2gs1Q?si=gCWCs5LIEBe5YV5i', '6289521301996'),
(11, 'Gunung Sibayak', 'Desa Semangat Gunung, Kecamatan Merdeka, Kabupaten Karo, Sumatra Utara, Indonesia.', 100000, '66b25800c858b3.29293633.jpg', 'https://www.youtube.com/embed/nknmkKuiP_w?si=6odoCtvu27nm7wUD', '6289521301996'),
(12, 'Danau Toba', 'Tobasa, Karo, Samosir, Dairi, Humbang Hasundutan, Simalungun dan Tapanuli Utara', 100000, '66b25313814d62.95198615.jpg', 'https://www.youtube.com/embed/ojw2VEkh42E?si=suTQkvHpeGruwC5s', '6289521301996'),
(13, 'Pulau Berhala', 'Kecamatan Tanjung Beringin, Kabupaten Serdang Bedagai.', 2000000, '66b258886b44a4.48641620.jpg', 'https://www.youtube.com/embed/g_VyiL0yRSU?si=F55t_RfPVtoWrJRx', '6289521301996	'),
(14, 'Kebun Binatang Bukit Lawang', 'Kecamatan Bohorok, Kabupaten Langkat, Provinsi Sumatera Utara', 250000, '66b25980648ca3.40930167.jpg', 'https://www.youtube.com/embed/G19qfk_Q_5Q?si=t9FNNjgBuJL0UM6t', '6289521301996'),
(15, 'Bukit Gundaling ', 'Kecamatan Brastagi dan Merdeka, Kabupaten Karo, Sumatera Utara 1 \r\n', 100000, '66b25ab38677f9.77686814.jpg', 'https://www.youtube.com/embed/mztitOllNMg?si=ePHTuFSGXoss_oZL', '6289521301996');

-- --------------------------------------------------------

--
-- Table structure for table `wisata_galery`
--

CREATE TABLE `wisata_galery` (
  `idwisata_galery` int(11) NOT NULL,
  `file` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `wisata_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wisata_galery`
--

INSERT INTO `wisata_galery` (`idwisata_galery`, `file`, `keterangan`, `wisata_id`) VALUES
(2, 'Galeri File-20240809032306.jpeg', 'Air Terjun Sipiso Piso', 10),
(3, 'Galeri File-20240809032318.jpeg', 'Air Terjun Sipiso Piso', 10),
(4, 'Galeri File-20240809032341.jpeg', 'Air Terjun Sipiso Piso', 10),
(5, 'Galeri File-20240809032358.jpeg', 'Air Terjun Sipiso Piso', 10),
(6, 'Galeri File-20240809041748.jpg', 'Bukit Gundaling', 15),
(7, 'Galeri File-20240809041804.jpg', 'Bukit Gundaling', 15),
(8, 'Galeri File-20240809041818.jpg', 'Bukit Gundaling', 15),
(9, 'Galeri File-20240809041831.png', 'Bukit Gundaling', 15),
(10, 'Galeri File-20240809042049.jpg', 'Kebun Binatang Bukit Lawang', 14),
(11, 'Galeri File-20240809042104.jpg', 'Kebun Binatang Bukit Lawang', 14),
(12, 'Galeri File-20240809042122.jpg', 'Kebun Binatang Bukit Lawang', 14),
(13, 'Galeri File-20240809042137.jpg', 'Kebun Binatang Bukit Lawang', 14),
(14, 'Galeri File-20240809042355.jpg', 'Pulau Berhala', 13),
(15, 'Galeri File-20240809042409.jpeg', 'Pulau Berhala', 13),
(16, 'Galeri File-20240809042421.png', 'Pulau Berhala', 13),
(17, 'Galeri File-20240809042432.png', 'Pulau Berhala', 13),
(18, 'Galeri File-20240809042633.jpg', 'Danau Toba', 12),
(19, 'Galeri File-20240809042645.jpg', 'Danau Toba', 12),
(20, 'Galeri File-20240809042658.jpg', 'Danau Toba', 12),
(21, 'Galeri File-20240809042710.jpg', 'Danau Toba', 12),
(22, 'Galeri File-20240809042930.jpg', 'Gunung Sibayak', 11),
(23, 'Galeri File-20240809042946.jpeg', 'Gunung Sibayak', 11),
(24, 'Galeri File-20240809043001.jpg', 'Gunung Sibayak', 11),
(25, 'Galeri File-20240809043026.jpg', 'Gunung Sibayak', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`idabout`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`idteam`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`idwisata`);

--
-- Indexes for table `wisata_galery`
--
ALTER TABLE `wisata_galery`
  ADD PRIMARY KEY (`idwisata_galery`),
  ADD KEY `fk_wisata_galery_wisata_idx` (`wisata_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `idabout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wisata_galery`
--
ALTER TABLE `wisata_galery`
  MODIFY `idwisata_galery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
