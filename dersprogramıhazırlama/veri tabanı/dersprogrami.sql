-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Ara 2018, 21:18:05
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dersprogrami`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders`
--

CREATE TABLE `ders` (
  `id` int(11) NOT NULL,
  `derskodu` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `dersadı` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `sinif` int(11) NOT NULL,
  `derslik` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ogretimelemani` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `saat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `ders`
--

INSERT INTO `ders` (`id`, `derskodu`, `dersadı`, `sinif`, `derslik`, `ogretimelemani`, `saat`) VALUES
(1, 'FİZ111', 'Genel Fizik I', 1, 'Bilgisayar-1', 'Doç. Dr. Serkan Akkoyun', 4),
(4, 'BİL2005', 'Veri yapıları', 2, 'Bil-Lab.', 'Doç. Dr. Hidayet Takcı', 3),
(5, 'BİL3007', 'Mikroişlemciler', 3, 'Bilgisayar-3', 'Yrd. Doç. Dr. Kali Gürkahraman', 3),
(6, 'SSD4011', 'Uygulamalı Girişim. I', 4, 'Bilgisayar-4', 'Yrd. Doç. Dr. Adem Babacan', 2),
(7, 'BİL1003', 'Bilg.Bil.Giriş', 1, 'Bilgisayar-1', 'Doç. Dr. H. Doğan Karkı', 2),
(8, 'BİL1101', 'Alg. Ve Prog. I', 1, 'Bil-Lab.', 'Doç. Dr. H. Doğan Karkı', 4),
(13, 'MAT1155', 'Genel Mat I', 1, 'Bilgisayar-1', 'Öğr. Gör. Mavuş Meral Yıldırım', 4),
(17, 'BİL2003', 'Nes. Day. Prog.', 2, 'Bil-Lab.', 'Yrd. Doç. Dr. Emre Ünsal', 2),
(18, 'YDİL1001', 'İngilizce I', 1, 'Uzaktan', 'Öğr. Gör. Orhan Başpınar', 2),
(19, 'KİM1041', 'Genel Kimya', 1, 'Bilgisayar-1', 'Doç. Dr. Adil Elik', 3),
(20, 'BİL3003', 'İşletim Sistemleri', 3, 'Bilgisayar-3', 'Yrd. Doç. Dr. Halil Arslan', 3),
(22, 'TÜR1001', 'Türk Dili I', 1, 'Uzaktan', 'Öğr. Gör. Mahmut İnat', 2),
(23, 'ATA1001', 'Ata.İlk.İnk.Tar.', 2, 'Uzaktan', 'Öğr. Gör. Ergün Tarıkahya', 2),
(24, 'MAT2217', 'Dif.Denklemler', 2, 'Bilgisayar-2', 'Doç. Dr. Yaşar Çakmak', 3),
(25, 'BİL2109', 'Ayrık İşl. Yapılar', 2, 'Bilgisayar-2', 'Araş. Gör. Dr. Fırat İsmailoğlu', 3),
(26, 'BİL2111', 'Mesleki İngilizce I', 2, 'Bilgisayar-2', 'Doç. Dr. H. Doğan Karkı', 2),
(27, 'BİL2005', 'Veri yapıları Lab.', 2, 'Bil-Lab.', 'Doç. Dr. Hidayet Takcı', 1),
(28, 'BİL2007', 'Sayısal Elk.', 2, 'Bilgisayar-2', 'Öğr. Gör. Adem Göksu', 3),
(29, 'BİL2007', 'Sayısal Elk. Lab.', 2, 'Elktr-Lab.', 'Öğr. Gör. Adem Göksu', 1),
(30, 'BİL2003', 'Nes. Day. Prog. Lab.', 2, 'Bil-Lab.', 'Yrd. Doç. Dr. Emre Ünsal', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `derslik`
--

CREATE TABLE `derslik` (
  `id` int(11) NOT NULL,
  `derslikler` varchar(50) COLLATE utf32_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `derslik`
--

INSERT INTO `derslik` (`id`, `derslikler`) VALUES
(1, 'Bilgisayar-1'),
(2, 'Uzaktan'),
(3, 'Bil-Lab.'),
(4, 'Bilgisayar-2'),
(5, 'Elktr-Lab.'),
(6, 'Bilgisayar-3'),
(7, 'Bilgisayar-4'),
(8, 'RoboLab');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersprogrami1`
--

CREATE TABLE `dersprogrami1` (
  `id` int(11) NOT NULL,
  `ogretim` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `gun` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `saat` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `sinif` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `dersadi` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `derslik` varchar(50) COLLATE utf32_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `dersprogrami1`
--

INSERT INTO `dersprogrami1` (`id`, `ogretim`, `gun`, `saat`, `sinif`, `dersadi`, `derslik`) VALUES
(1, 'I. öğretim', 'Pazartesi', '8:10 - 9:00', '1', 'FİZ111 Genel Fizik I', 'Bilgisayar-1'),
(2, 'I. öğretim', 'Salı', '8:10 - 9:00', '1', 'FİZ111 Genel Fizik I', 'Bilgisayar-1'),
(3, 'I. öğretim', 'Pazartesi', '9:10 - 10:00', '1', 'FİZ111 Genel Fizik I', 'Bilgisayar-1'),
(4, 'I. öğretim', 'Çarşamba', '13:00 - 13:50', '1', 'SSD4011 Uygulamalı Girişim. I', 'Bilgisayar-4'),
(5, 'I. öğretim', 'Pazartesi', '15:00 - 15:50', '1', 'FİZ111 Genel Fizik I', 'Bilgisayar-1'),
(6, '1', 'Perşembe', '13:00 - 13:50', '3', '5', 'Bilgisayar-3'),
(7, '1', 'Salı', '10:10 - 11:00', '1', '7', 'Bilgisayar-1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gecesaat`
--

CREATE TABLE `gecesaat` (
  `id` int(11) NOT NULL,
  `geceders` varchar(50) COLLATE utf32_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `gecesaat`
--

INSERT INTO `gecesaat` (`id`, `geceders`) VALUES
(1, '15:00 - 15:50'),
(2, '16:00 - 16:50'),
(3, '17:00 - 17:50'),
(4, '18:00 - 18:50'),
(5, '19:00 - 19:50'),
(6, '20:00 - 20:50'),
(7, '21:00 - 21:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gunler`
--

CREATE TABLE `gunler` (
  `id` int(11) NOT NULL,
  `dersgunleri` varchar(50) COLLATE utf32_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `gunler`
--

INSERT INTO `gunler` (`id`, `dersgunleri`) VALUES
(1, 'Pazartesi'),
(2, 'Salı'),
(3, 'Çarşamba'),
(4, 'Perşembe'),
(5, 'Cuma');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `kullaniciadi` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf32_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kullaniciadi`, `sifre`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogretim`
--

CREATE TABLE `ogretim` (
  `id` int(11) NOT NULL,
  `ogretimler` varchar(50) COLLATE utf32_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `ogretim`
--

INSERT INTO `ogretim` (`id`, `ogretimler`) VALUES
(1, 'I. öğretim'),
(2, 'II. öğretim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogretimelemani`
--

CREATE TABLE `ogretimelemani` (
  `sicilno` int(11) NOT NULL,
  `unvan` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ad` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `soyad` varchar(50) COLLATE utf32_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `ogretimelemani`
--

INSERT INTO `ogretimelemani` (`sicilno`, `unvan`, `ad`, `soyad`) VALUES
(2313, 'Yrd. Doç. Dr.', 'Kali', 'Gürkahraman'),
(2342, 'Araş. Gör. Dr.', 'Fırat', 'İsmailoğlu'),
(2345, 'Öğr. Gör.', 'Mavuş Meral', 'Yıldırım'),
(3243, 'Doç. Dr.', 'Hidayet', 'Takcı'),
(3258, 'Doç. Dr.', 'Serkan ', 'Akkoyun'),
(3480, 'Yrd. Doç. Dr.', 'Emre', 'Ünsal'),
(3484, 'Doç. Dr.', 'Adil', 'Elik'),
(4541, 'Doç. Dr.', 'Halil', 'Arslan'),
(4572, 'Yrd. Doç. Dr.', 'Adem', 'Babacan'),
(5423, 'Öğr. Gör.', 'Orhan', 'Başpınar'),
(5432, 'Araş. Gör.', 'Emre', 'Yalçın'),
(5463, 'Doç. Dr.', 'Emre', 'Delibaş'),
(5621, 'Öğr. Gör.', 'Adem', 'Göksu'),
(5629, 'Öğr. Gör.', 'Ergün', 'Tarıkahya'),
(7633, 'Doç. Dr.', 'Yaşar', 'Çakmak'),
(7685, 'Doç. Dr.', 'A. Gürkan', 'Yüksek'),
(8723, 'Araş. Gör.', 'Ahmet Fırat', 'Yelkuvan'),
(8762, 'Öğr. Gör.', 'Mahmut', 'İnat'),
(8787, 'Doç. Dr.', 'H. Doğan', 'Karkı'),
(8789, 'Doç. Dr.', 'Abdulkadir', 'Şeker');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `saat`
--

CREATE TABLE `saat` (
  `id` int(11) NOT NULL,
  `derssaati` varchar(50) COLLATE utf32_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `saat`
--

INSERT INTO `saat` (`id`, `derssaati`) VALUES
(1, '8:10 - 9:00'),
(2, '9:10 - 10:00'),
(3, '10:10 - 11:00'),
(4, '11:10 - 12:00'),
(5, '13:00 - 13:50'),
(6, '14:00 - 14:50'),
(7, '15:00 - 15:50'),
(8, '16:00 - 16:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinif`
--

CREATE TABLE `sinif` (
  `id` int(11) NOT NULL,
  `siniflar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `sinif`
--

INSERT INTO `sinif` (`id`, `siniflar`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ders`
--
ALTER TABLE `ders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `derslik`
--
ALTER TABLE `derslik`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dersprogrami1`
--
ALTER TABLE `dersprogrami1`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gecesaat`
--
ALTER TABLE `gecesaat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gunler`
--
ALTER TABLE `gunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ogretim`
--
ALTER TABLE `ogretim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ogretimelemani`
--
ALTER TABLE `ogretimelemani`
  ADD PRIMARY KEY (`sicilno`);

--
-- Tablo için indeksler `saat`
--
ALTER TABLE `saat`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sinif`
--
ALTER TABLE `sinif`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ders`
--
ALTER TABLE `ders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `derslik`
--
ALTER TABLE `derslik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `dersprogrami1`
--
ALTER TABLE `dersprogrami1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `gecesaat`
--
ALTER TABLE `gecesaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `gunler`
--
ALTER TABLE `gunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ogretim`
--
ALTER TABLE `ogretim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `ogretimelemani`
--
ALTER TABLE `ogretimelemani`
  MODIFY `sicilno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8790;

--
-- Tablo için AUTO_INCREMENT değeri `saat`
--
ALTER TABLE `saat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `sinif`
--
ALTER TABLE `sinif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
