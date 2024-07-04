-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2024 at 11:01 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_mail` varchar(150) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_password` varchar(150) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ad` varchar(150) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_yetki` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_mail`, `kullanici_password`, `kullanici_ad`, `kullanici_yetki`) VALUES
(2, 'Ekrembaydar1907@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ekrem Bey', 5),
(8, 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 'Samet Bey | Satış Departmanı', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notlar`
--

CREATE TABLE `notlar` (
  `not_id` int(11) NOT NULL,
  `not_parent` int(11) NOT NULL DEFAULT '0',
  `not_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `not_description` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `not_company` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `not_kullanici` int(11) DEFAULT NULL,
  `not_kisi` int(11) DEFAULT NULL,
  `not_yapankisi` int(11) DEFAULT NULL,
  `not_date` varchar(150) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `not_sira` int(11) DEFAULT '1',
  `not_yapildi` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `notlar`
--

INSERT INTO `notlar` (`not_id`, `not_parent`, `not_name`, `not_description`, `not_company`, `not_kullanici`, `not_kisi`, `not_yapankisi`, `not_date`, `not_sira`, `not_yapildi`, `date`) VALUES
(55, 38, '10 P serisi dedektör kalibrasyon zamanı gelmiş | Ayşe hanım', '10 tane dedektör geldi kalibrasyonları lazımmış ilgilenilmesi gerekiyor ', NULL, 2, 2147483647, 2, '2024-07-04', 1, 1, '2024-07-03 16:34:00'),
(56, 38, 'asdasdasd', 'dasdasdasdad', NULL, 2, 0, NULL, '', 1, 0, '2024-07-03 16:36:22'),
(57, 38, 'sdasdasddddddddddddddddddddddddddddddddddddddddddd', 'dddd111111111111111111111111111111111111111', NULL, 2, 0, 2, '', 1, 1, '2024-07-03 16:36:32'),
(58, 37, 'asdasd', 'asdasdasdas', NULL, 8, 0, NULL, '', 1, 0, '2024-07-03 16:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `page_yetkili` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `page_musteribir` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `page_yetkilitel` int(11) DEFAULT NULL,
  `page_musteriiki` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `page_yetkiliikitel` int(11) DEFAULT NULL,
  `page_yetkiliiki` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_yetkili`, `page_musteribir`, `page_yetkilitel`, `page_musteriiki`, `page_yetkiliikitel`, `page_yetkiliiki`, `date`) VALUES
(33, 'testtttttt', 'Ekrem', '', 2147483647, '', 0, 'Boş', '2024-07-02 21:21:59'),
(34, 'Kardemir', 'Ekrem', 'Mehmet Bey', 2147483647, '', 0, 'Boş', '2024-07-02 21:56:26'),
(37, 'Mosaic', 'Ekrem', 'Mehmet Bey', 2147483647, 'ahmet kuş', 2147483647, 'Samet', '2024-07-02 21:57:46'),
(38, 'Arçelik', 'Ekrem Bey', 'Mehmet Bey', 2147483647, 'ahmet kuş', 2147483647, 'Boş', '2024-07-03 16:32:13'),
(39, 'test firma ', 'Ekrem Bey', 'Mehmet Bey', 2147483647, 'ahmet kuş', 2147483647, 'Samet Bey', '2024-07-03 16:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `product_detail` text COLLATE utf8_turkish_ci NOT NULL,
  `product_img` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Indexes for table `notlar`
--
ALTER TABLE `notlar`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notlar`
--
ALTER TABLE `notlar`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
