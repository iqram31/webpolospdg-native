-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 02:20 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webpolospdg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Idham', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(5, 'Tangan Pendek'),
(7, 'New Arrival'),
(8, 'Tangan Panjang');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_kesan`
--

CREATE TABLE IF NOT EXISTS `pesan_kesan` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pesan_kesan`
--

INSERT INTO `pesan_kesan` (`id`, `nama`, `email`, `pesan`) VALUES
(3, 'sdasdasd', 'ssddwwasd', 'sswasdasd'),
(5, 'sad', 'asd@asd', 'asd'),
(6, 'asdasd', 'asdads@gmail.com', 'aksdasjd');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kategori`, `link`) VALUES
(2, 'Old Grey', 'Tangan Pendek', 'Old Grey-1.jpg'),
(3, 'Grey Solid', 'Tangan Pendek', 'Grey Solid-3.jpg'),
(4, 'White Solid', 'Tangan Pendek', 'White Solid-4.jpg'),
(5, 'Maroon Solid', 'Tangan Pendek', 'Maroon Solid-5.jpg'),
(6, 'Maroon Misty', 'Tangan Pendek', 'Maroon Misty-6.jpg'),
(7, 'Red Misty', 'Tangan Pendek', 'Red Misty-7.jpg'),
(8, 'Denim Misty', 'Tangan Pendek', 'Denim Misty-8.jpg'),
(9, 'Magenta', 'Tangan Pendek', 'Magenta-9.jpg'),
(10, 'Black Misty', 'Tangan Pendek', 'Black Misty-10.jpg'),
(11, 'Green Forest', 'Tangan Pendek', 'Green Forest-11.jpg'),
(12, 'White Misty', 'Tangan Pendek', 'White Misty-12.jpg'),
(13, 'Navy Misty', 'Tangan Pendek', 'Navy Misty-13.jpg'),
(14, 'Black Solid', 'Tangan Pendek', 'Black Solid-14.jpg'),
(15, 'Choco Solid', 'Tangan Pendek', 'Choco Solid-15.jpg'),
(16, 'Grey Misty', 'Tangan Pendek', 'Grey Misty-16.jpg'),
(17, 'Blue Misty', 'Tangan Pendek', 'Blue Misty-17.jpg'),
(18, 'Teal Misty', 'Tangan Pendek', 'Teal Misty-18.jpg'),
(19, 'Teal Tritone', 'Tangan Pendek', 'Teal Tritone-19.jpg'),
(20, 'Maroon Tritone', 'Tangan Pendek', 'Maroon Tritone-20.jpg'),
(21, 'Navy Blue', 'Tangan Pendek', 'Navy Blue-21.jpg'),
(22, 'Teal Solid', 'Tangan Pendek', 'Teal Solid-22.jpg'),
(23, 'Oreo Polka', 'New Arrival', 'Oreo Polka-23.jpg'),
(24, 'Maroon Polka', 'New Arrival', 'Maroon Polka-24.jpg'),
(25, 'Black Polka', 'New Arrival', 'Black Polka-25.jpg'),
(26, 'Baby Polka', 'New Arrival', 'Baby Polka-26.jpg'),
(27, 'White Rainbow', 'New Arrival', 'White Rainbow-27.jpg'),
(28, 'Emarland Polka', 'New Arrival', 'Emarland Polka-28.jpg'),
(29, 'asdlkasjd', 'Tangan Pendek', 'asdlkasjd-29.jpg'),
(30, 'asdlkasjdsda', 'Tangan Panjang', 'asdlkasjdsda-30.png');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` varchar(30) NOT NULL,
  `foto_dashboard` varchar(50) NOT NULL,
  `foto_icon` varchar(50) NOT NULL,
  `tentang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `foto_dashboard`, `foto_icon`, `tentang`) VALUES
('profile', 'intro-bg.jpg', 'about.jpg', '<span>Kaos Polos bahan 100% Cotton Combed 30s reaktif, Premium Material. Bahan adem &amp; ga panas lebih tipis dibanding 20s/24s. Cocok digunakan untuk ketemu mantan, masalah keren tergantung muka<br><br></span><h3>Spesifikasi Yang ditawarkan :</h3><ul><li>100% cotton combed 30s Reaktif</li><li>Gramasi Kain 150-160, adem, soft, menyerap keringat lembut ga kaku</li><li>Jahitan Leher : Double Stick Jahitan Pundak : Rantai</li><li>Jahitan Tangan : Overdeck Kumis (3 Jarum).</li></ul><h3>Size Chart :&nbsp;</h3><ul><li>S :&nbsp;70cm x 46cm</li><li>M : 72cm x 48cm</li><li>L : 74cm x 50cm<br></li><li>XL : 76cm x 52cm<br></li></ul><h3>For info or Order :&nbsp;</h3>Line :&nbsp;<a href="https://www.instagram.com/wgy1798o/" target="" rel="">@wgy1798o</a>&nbsp;(pakai @)<br>Bbm : DAFAF993<br>Wa : 082261655704<br>Happy shopping Premium People!!<br>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan_kesan`
--
ALTER TABLE `pesan_kesan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pesan_kesan`
--
ALTER TABLE `pesan_kesan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
