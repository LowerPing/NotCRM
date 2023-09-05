-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 05 Eyl 2023, 11:35:52
-- Sunucu sürümü: 8.0.29
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `epanel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int NOT NULL,
  `kullanici_mail` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_password` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ad` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_yetki` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_mail`, `kullanici_password`, `kullanici_ad`, `kullanici_yetki`) VALUES
(2, 'Ekrembaydar1907@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ekrem', 5),
(5, 'info@posted.com.tr', '1a0ad78ba559d15bb1b06367ecab9fc6', 'Gürsel', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notlar`
--

CREATE TABLE `notlar` (
  `not_id` int NOT NULL,
  `not_parent` int NOT NULL DEFAULT '0',
  `not_name` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_turkish_ci DEFAULT NULL,
  `not_description` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `not_company` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `not_kullanici` int DEFAULT NULL,
  `not_kisi` int DEFAULT NULL,
  `not_yapankisi` int DEFAULT NULL,
  `not_date` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `not_sira` int DEFAULT '1',
  `not_yapildi` int NOT NULL DEFAULT '0',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `notlar`
--

INSERT INTO `notlar` (`not_id`, `not_parent`, `not_name`, `not_description`, `not_company`, `not_kullanici`, `not_kisi`, `not_yapankisi`, `not_date`, `not_sira`, `not_yapildi`, `date`) VALUES
(35, 1, 'test', 'test', NULL, 2, NULL, NULL, '', 1, 0, '2023-07-30 15:00:15'),
(36, 2, 'Omar', 'Dolor quasi maxime d', NULL, 2, NULL, NULL, '1981-03-24', 1, 0, '2023-07-30 15:00:39'),
(37, 1, 'Elaine', 'Deserunt do qui dolo', NULL, 2, NULL, NULL, '2008-04-01', 1, 0, '2023-07-30 15:00:42'),
(39, 1, 'Quentin', 'Recusandae Ab place', NULL, 2, NULL, NULL, '2013-08-05', 1, 0, '2023-07-30 15:25:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `page_name` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8_turkish_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `date`) VALUES
(1, 'Solomon\'s Mansion', '2023-06-27 11:42:05'),
(2, 'Şanal Isı', '2023-06-27 11:45:04'),
(4, 'Mosaic', '2023-06-27 13:07:30');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `notlar`
--
ALTER TABLE `notlar`
  ADD PRIMARY KEY (`not_id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `notlar`
--
ALTER TABLE `notlar`
  MODIFY `not_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
