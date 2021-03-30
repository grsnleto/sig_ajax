-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2016 at 06:26 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sig2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tempat_perpus`
--

CREATE TABLE IF NOT EXISTS `tempat_perpus` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `lng` varchar(50) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `info` text NOT NULL,
  `images` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tempat_perpus`
--

INSERT INTO `tempat_perpus` (`id`, `name`, `address`, `lng`, `lat`, `url`, `info`, `images`) VALUES
(1, ' Unit Badran I', 'Jl Tentara Rakyat Mataram No. 4. Yogyakarta.Telp :(0274) 588219', '110.367644', '-7.776363', '', 'Jam Buka : Senin-Kamis= 08.00 s/d 21.00 WIB, Jumat= 08.00 s/d 11.00 WIB, Sabtu= 18.00 s/d 13.00 WIB.', 'http://images.gofreedownload.net/2/combinatorial-libraries-of-books-logo-58358.jpg'),
(2, 'Perpustakaan Unit Badran 2', 'Jl. Tentara Rakyat Mataram No. 29 Yogyakarta.Telp. (0274) 513969, 563367', '110.357315', '-7.786596', '', 'Jam Buka :Senin-Kamis= 08.00 s/d 14.00 WIB, \r\nJumat= 08.00 s/d 11.00 WIB, Sabtu= 18.00 s/d 12.00 WIB.', 'http://images.gofreedownload.net/2/combinatorial-libraries-of-books-logo-58358.jpg'),
(3, 'Perpustakaan Daerah Unit Malioboro', 'Jl. Malioboro 175 Yogyakarta.Telp.(0274) 512473', '110.365588', '-7.792721', '', 'Jam Buka : Senin-Kamis= 08.00 s/d 14.00 WIB, Jumat= 08.00 s/d 11.00 WIB, Sabtu = 18.00 s/d 12.00 WIB.', 'http://images.gofreedownload.net/2/combinatorial-libraries-of-books-logo-58358.jpg'),
(4, 'Jogja Study Center (JSC)Perpustakaan', 'Jl. Faridan M. Noto No. 21 Kotabaru, Yogyakarta.Telp.(0274) 556920, 556921', '110.372019', '-7.785603', '', 'Jam Buka : Senin-Kamis = 08.00 s/d 17.00 WIB, Jumat = 08.00 s/d 11.00 WIB, Sabtu = 18.00 s/d 13.00 WIB.', 'http://images.gofreedownload.net/2/combinatorial-libraries-of-books-logo-58358.jpg'),
(5, 'Perpustakaan Kota Yogyakarta', 'Jalan Suroto No.9 Kotabaru Yogyakarta.Telep.0274-511314', '110.374463', '-7.784092', 'http://perpustakaan.jogjakota.go.id/', 'Perpustakaan kota Yogyakarta yang berada di Jalan Subroto, No. 9 Kotabaru-Yogyakarta. Perpustakaan\nberlantai dua ini buka setiap hari Selasa \nsampai Minggu pada pukul 09.00 sampai 20.00 WIB. Selain menawarkan akses internet gratis (free wifi), koleksi \nbuku yang cukup lengkap, perpustakaan ini juga ditunjang dengan ruangan full AC. Perpustakaan kota Yogyakarta \ntidak hanya menyediakan bahan pustaka sesuai dengan kebutuhan namun juga berbagai kegiatan \nyang bermuara pada pengembangan budaya literasi masyarakat. Dengan melihat perkembangan teknologi dan \ndinamika masyarakat Yogyakarta yang heterogen Perpustakaan Kota Yogyakarta senantiasa berupaya untuk \nmengembangkan program-program peningkatan budaya literasi dan meningkatkan mutu layanan. Berangkat dari \nkonsep perpustakaan yang dinamis (The Dynamic Library), Perpustakaan Kota Yogyakarta senantiasa berbenah \nuntuk mengoptimalkan perannya dalam mengembangkan fungsi penelitian, pendidikan, pelestarian, informasi \ndan rekreasi, sekaligus berupaya untuk dapat melayani dengan prima dan mengembangkan serta meningkatkan \nliterasi masyarakat.\n', 'https://40.media.tumblr.com/3b8174194a2ac5918ea1eadd9823da09/tumblr_o0b1w1xDhy1tdx7kso1_500.jpg'),
(6, 'Perpustakaan St. Ignatius Yogyakarta', 'Jalan Abu Bakar Ali No.1 Kotabaru, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta', '110.370371', '-7.788584', '', 'Perpustakaan St.Ignatius yang juga dikenal dengan nama Perpustakaan Kolsani, terletak di samping toko puskat, di belakang Gereja Kotabaru. Perpustakaan ini kaya dengan beragam koleksi literatur akademik, mulai dari Filsafat, Agama, Politik, Pendidikan, Sejarah, Bahasa, dlsb.erpustakaan ini juga menyediakan literatur mengenai Islam abad 20 yang bahkan lebih lengkap dari perpustakaan non-universitas lain.', 'http://images.gofreedownload.net/2/combinatorial-libraries-of-books-logo-58358.jpg'),
(7, 'Perpustakaan Gelaran Indonesia Buku', 'Jl. Patehan Wetan,Patehan,Kraton,Kota Yogyakarta, Daerah Istimewa Yogyakarta', '110.362000', '-7.813057', '', 'Perpustakaan ini terletak di Indonesia Buku @radiobuku.Di Perpustakaan Gelaran Indonesia Buku, kamu bisa menikmati buku-buku yang dipajang di sana. Beragamkoleksi bisa kita akses, dari sejarah, etnografi, antropologi, biografi, tata kota, sastra, sains dan lainsebagainya. Di perpus ini disimpan juga koleksi khusus Prof. George Junus Aditjondro.', 'http://images.gofreedownload.net/2/combinatorial-libraries-of-books-logo-58358.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
