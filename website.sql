-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 May 2022, 18:49:59
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `website`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `abone`
--

CREATE TABLE `abone` (
  `abone_id` int(10) NOT NULL,
  `abone_email` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(10) NOT NULL,
  `baslik` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `anahtar` varchar(400) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `mesai` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `baslik`, `aciklama`, `anahtar`, `telefon`, `email`, `adres`, `facebook`, `instagram`, `twitter`, `logo`, `mesai`) VALUES
(1, 'BookStore', 'Kitap Satıyoruz', 'kitap', '+902121234567', 'info@bookstore.com', 'Beşiktaş, İstanbul', '', '', '', '256599127914947066dark.png', '7/24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(10) NOT NULL,
  `hakkimizda_baslik` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_resim` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_detay`, `hakkimizda_resim`) VALUES
(1, 'Hakkımızda', 'Mef öğrencileri', '2993406239010835554merge tiles- after.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(10) NOT NULL,
  `kategori_adi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_sira` int(10) NOT NULL,
  `kategori_durum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_adi`, `kategori_sira`, `kategori_durum`) VALUES
(2, 'Bilim Kurgu', 2, 1),
(3, 'Çocuk ve Gelişim', 3, 1),
(4, 'Edebiyat', 4, 1),
(5, 'Felsefe', 5, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kullanici_adi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_sifre` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adres` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` int(2) NOT NULL,
  `kullanici_il` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_telno` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_adi`, `kullanici_sifre`, `kullanici_adsoyad`, `kullanici_adres`, `kullanici_yetki`, `kullanici_il`, `kullanici_ilce`, `kullanici_telno`, `kullanici_mail`) VALUES
(9, '2022-05-31 02:17:53', 'admin', '4a7d1ed414474e4033ac29ccb8653d9b', 'Şule', '', 2, '', '', '', 'admin@bookstore.com'),
(10, '2022-05-04 01:33:16', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 2, '', '', '', ''),
(11, '2022-05-05 23:50:45', 'user', '828fd9255753432d51df95eb62d61722', 'first user', '', 1, '', '', '', 'user@gmail.com'),
(12, '2022-05-06 01:02:45', 'User2', '1adbb3178591fd5bb0c248518f39bf6d', 'User', 'Türkiye', 1, 'İzmir', 'Bornova', '0232', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `siparis_id` int(10) NOT NULL,
  `kullanici_id` int(10) NOT NULL,
  `urun_id` int(10) NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `urun_adet` int(10) NOT NULL,
  `urun_fiyat` double NOT NULL,
  `toplam_fiyat` double NOT NULL,
  `odeme_turu` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `siparis_onay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparisler`
--

INSERT INTO `siparisler` (`siparis_id`, `kullanici_id`, `urun_id`, `siparis_zaman`, `urun_adet`, `urun_fiyat`, `toplam_fiyat`, `odeme_turu`, `siparis_onay`) VALUES
(1, 0, 7, '2022-05-08 02:26:20', 3, 60, 460, '1', 0),
(2, 0, 8, '2022-05-08 02:27:11', 4, 70, 460, '1', 1),
(3, 12, 5, '2022-05-08 02:26:27', 3, 30, 130, '1', 0),
(4, 12, 2, '2022-05-08 02:26:30', 1, 40, 130, '1', 0),
(5, 0, 1, '2022-05-30 20:10:02', 1, 50, 50, '1', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(10) NOT NULL,
  `slider_baslik` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `slider_aciklama` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `slider_link` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `slider_buton` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `slider_resim` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `slider_sira` int(10) NOT NULL,
  `slider_durum` int(10) NOT NULL,
  `slider_banner` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_baslik`, `slider_aciklama`, `slider_link`, `slider_buton`, `slider_resim`, `slider_sira`, `slider_durum`, `slider_banner`) VALUES
(16, 'Türkiye İşBankası Yayınları', 'İşBankası Kültür Yayınları', 'bookstore.com', 'Alışverişe Başla', '706563886723892950slider2.png', 2, 1, 1),
(17, 'Bahara Yepyeni Oyuncaklarla Girin', 'Oyun& Oyuncaklarda Özel Fiyatlar', 'bookstore.com', 'Alışverişe Başla', '9947139596511146583slider3.png', 3, 1, 1),
(18, 'Mabbels Özel Fiyatlar', '', 'bookstore.com', 'Alışverişe Başla', '393535284965952462banner1.png', 1, 1, 0),
(19, 'YABANCI DİLDE 6 MİLYON KİTAP ELİNİZİN ALTINDA', 'Yurtdışı fiyatlarıyla, kargo ve gümrük ödemeden kapına gelsin.', 'bookstore.com', 'Alışverişe Başla', '459760747715368990banner2.png', 2, 1, 0),
(20, 'ANNELERE EN GÜZEL HEDİYELER', 'Anneler Gününe Özel İndirimleri Keşfet', 'bookstore.com', 'Alışverişe Başla', '128555941529203672slider1.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(10) NOT NULL,
  `urun_baslik` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `urun_adi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `urun_resim` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `urun_yazar` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `urun_sira` int(10) NOT NULL,
  `urun_adet` int(10) NOT NULL,
  `urun_fiyat` float(10,2) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `onecikan` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `urun_durum` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `urun_etiket` varchar(300) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `urun_baslik`, `urun_adi`, `urun_resim`, `urun_yazar`, `urun_sira`, `urun_adet`, `urun_fiyat`, `kategori_id`, `onecikan`, `urun_durum`, `urun_zaman`, `urun_etiket`) VALUES
(1, 'felsefe-tarihi', 'Felsefe Tarihi', '5713992585513258622felsefe-felsefe tarihi.png', 'Ahmet Cevizci', 1, 5, 50.00, 5, '1', '1', '2022-05-05 22:45:34', 'felsefe tarihi'),
(2, 'dusunmek-ve-olmak', 'Düşünmek ve Olmak', '664804714509032335felsefe-düşünmek ve olmak.png', 'Henri Bergson', 2, 7, 40.00, 5, '1', '1', '2022-05-05 22:45:48', 'düşünmek ve olmak'),
(3, 'felsefeye-giris', 'Felsefeye Giriş', '776409368382263158felsefe-felsefeye giriş.png', 'Ahmet Cevizci', 3, 5, 25.00, 5, '1', '1', '2022-05-05 22:46:00', 'felsefeye giriş'),
(4, 'gunes-ulkesi', 'Güneş Ülkesi', '197483249004223119felsefe-güneş ülkesi.png', 'Tommaso Campanella', 4, 9, 35.00, 5, '1', '1', '2022-05-05 22:46:12', 'güneş ülkesi'),
(5, 'hayatin-anlami', 'Hayatın Anlamı', '11481340355582763felsefe-hayatın anlamı.png', 'Arthur Schopenhauer', 5, 6, 30.00, 5, '1', '1', '2022-05-05 22:46:25', 'hayatın anlamı'),
(6, 'dune-cocuklari', 'Dune Çocukları', '626351970914093565bilimkurgu-dune çocukları.png', 'Frank Herbert', 1, 4, 50.00, 2, '1', '1', '2022-05-05 22:46:38', 'dune'),
(7, 'dune-mesihi', 'Dune Mesihi', '7755851821417274757bilimkurgu-dune mesihi.png', 'Frank Herbert', 2, 8, 60.00, 2, '1', '1', '2022-05-05 22:46:50', 'dune'),
(8, 'kizil-kralice', 'Kızıl Kraliçe', '9372508916711194540bilimkurgu-kızıl kraliçe.png', 'Victoria Aveyard', 3, 5, 70.00, 2, '1', '1', '2022-05-05 22:47:00', 'kızıl kraliçe'),
(9, 'maymunlar_gezegeni', 'Maymunlar Gezegeni', '319880642999496841bilimkurgu-maymunlar gezegeni.png', 'Pierre Boulle', 4, 9, 50.00, 2, '1', '1', '2022-05-05 23:08:25', 'maymunlar gezegeni');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `abone`
--
ALTER TABLE `abone`
  ADD PRIMARY KEY (`abone_id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `abone`
--
ALTER TABLE `abone`
  MODIFY `abone_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `siparis_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
