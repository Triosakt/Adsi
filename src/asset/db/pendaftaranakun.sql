-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2024 at 05:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaranakun`
--

-- --------------------------------------------------------

--
-- Table structure for table `catering_packages`
--

CREATE TABLE `catering_packages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catering_packages`
--

INSERT INTO `catering_packages` (`id`, `name`, `description`, `price`) VALUES
(1, 'Paket Catering ku', 'Halo guys', 1899999.00),
(2, 'hALO GUYSSS', 'irgi anjing', 290000.00),
(10, 'Halo paket', 'tryhejkejej', 60000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `proof_of_payment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `proof_of_payment`, `created_at`) VALUES
(3, 62, 'uploads/png-transparent-call-logo-illustration-test-apk-whatsapp-android-application-package-mobile-phones-whatsapp-logo-telephone-call-grass-sign.png', '2024-06-14 17:55:21'),
(4, 62, 'uploads/png-transparent-call-logo-illustration-test-apk-whatsapp-android-application-package-mobile-phones-whatsapp-logo-telephone-call-grass-sign.png', '2024-06-14 17:56:06'),
(5, 62, 'uploads/Download2BLogo2BBANK2BSYARIAH2BINDONESIA2BCDR2Bdan2BPNG.png', '2024-06-14 18:08:53'),
(6, 62, 'uploads/WhatsApp-Image-2020-06-10-at-17.44.51.jpeg', '2024-06-15 13:36:09'),
(7, 62, 'uploads/png-transparent-call-logo-illustration-test-apk-whatsapp-android-application-package-mobile-phones-whatsapp-logo-telephone-call-grass-sign.png', '2024-06-15 14:27:52'),
(8, 62, 'uploads/png-transparent-call-logo-illustration-test-apk-whatsapp-android-application-package-mobile-phones-whatsapp-logo-telephone-call-grass-sign.png', '2024-06-15 14:34:03'),
(9, 62, 'uploads/png-transparent-call-logo-illustration-test-apk-whatsapp-android-application-package-mobile-phones-whatsapp-logo-telephone-call-grass-sign.png', '2024-06-15 14:41:14'),
(10, 63, 'uploads/photo1718543075.jpeg', '2024-06-17 06:00:52'),
(11, 63, 'uploads/photo1718543075.jpeg', '2024-06-17 14:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telephone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `no_telephone`, `email`, `alamat`, `password`) VALUES
(39, 'Fuad Fer', '0858907652', 'FuadHamidan@gmail.com', 'Nunyai', '7c3b4914c80a752f84d0e298da622cd57f261cf6eb0f5f9a51a3bb454dca3e26'),
(40, 'haloha', '081368982664', 'SS@gmail.com', 'palapa', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(41, 'Gustika dwi m', '085788240792', 'Gstk@gmail.com', 'Kota Bumi', '727892dc512e927974ef69643a83499088d95a380705e9ce994d1664bb50bf7c'),
(42, 'Jakc s', '085788240792', 'welcomejacks@gmail.com', 'Bekasi', '57776e8a41ff487b37a6b34186486b0e2f886e2cbf12a8e30d56dc67ea778193'),
(43, 'Jokowi', '081978568907', 'JokowiJk@gmail.com', 'Solo', 'dcaab6265dcbec110ab2918b0d59d8ea57ba6866cb5ed92ccd4af1bb0e944450'),
(44, 'Trio sakti ardika', '081368982664', 'no@gmail.com', 'gada', '5f93230da0c7dd66d20f077670a66d392521ea71d58a65f684063f4670c5b606'),
(45, 'JOKO TINGKIRE', '00000000', 'JOKO@gmail.com', 'GOA', '95546009001611506d6cd1482ae3727a251c566c629dba237c7d9cefea70ce54'),
(46, 'Trio sakti ardika', '081368982664', 'mase1922@gmail.com', 'New York', '97a6d21df7c51e8289ac1a8c026aaac143e15aa1957f54f42e30d8f8a85c3a55'),
(47, 'Trio sakti ardika', '081368982664', 'tr@gmail.com', 'Jambi', 'c0509a487a18b003ba05e505419ebb63e57a29158073e381f57160b5c5b86426'),
(48, 'ERIKO', '089045678906', 'Erikomdn01@gmail.com', 'Medan', '6606753e5a126d7068012a526d44c3eb2f7fcd09d5faeb30c77dbfd87ca7e758'),
(49, 'Fuadin hamidin', '0867823989', 'achaan@gmail.com', 'metro', '469c0fdb6020d4bffe12ec93e76150a08ef02e116fc856a84b24eb02a1d1a155'),
(50, 'Erisanjaya', '098904352357', 'Erisanjaya@gmail.com', 'Danau toba', '73a2af8864fc500fa49048bf3003776c19938f360e56bd03663866fb3087884a'),
(51, 'Arip Saputra', '081368982664', 'Aripkunlampungaslei@gmail.com', 'Lampung barat', '32795e08e9cf0b5b626a674429acdf3f82747e01f88fcc64942e20e1c62fc4f2'),
(53, 'Rizka Dama', '081368982664', 'Rizkadm@gmail.com', 'Plb', '3608bca1e44ea6c4d268eb6db02260269892c0b42b86bbf1e77a6fa16c3c9282'),
(54, 'Ganjar X ', '0858907652', 'Ganjar@gmail.com', 'Solo', 'd0d0336c397840219a5cc9e86c354caf8565ad48f2edcb5bc53b530f83de00fc'),
(55, 'Bintang Ferinantama', '0858907652', 'BintangFerinantama@gmail.com', 'palapa', 'cfc3a5b5ad88a20c09a18de3c4f142066528c606276b2554fa12f8a8834861f0'),
(56, 'gusti', '0858907652', 'Rasdirasid1@gmail.com', 'Polda', '0604cd3138feed202ef293e062da2f4720f77a05d25ee036a7a01c9cfcdd1f0a'),
(57, 'RIFKI FEBRIANTO', '081368982664', 'RIFKI78@gmail.com', 'MUARO JAMBI', 'cbfad02f9ed2a8d1e08d8f74f5303e9eb93637d47f82ab6f1c15871cf8dd0481'),
(58, 'Trio sakti ardika', '081368982664', 'triosakti7@gmail.com', 'palapa', '163e49567eef0c05e154db2074383d0dcff8e04cefdfb3114df9a417627783e5'),
(59, 'Ghulam G', '081368982664', 'GhulamG1@gmail.com', 'liwa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(60, 'Trio sakti ardika', '081368982664', 'masx@gmail.com', 'palapa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(61, 'mas le', '081368982664', 'trios@gmail.com', 'tubaba', 'c6f3ac57944a531490cd39902d0f777715fd005efac9a30622d5f5205e7f6894'),
(62, 'Nama Pengguna', '08123456789', 'email@example.com', 'Alamat Pengguna', 'hashed_password'),
(63, 'Try Helviansyah', '089525126629', 'detry220803@gmail.com', 'Pekanbaru', '5c80565db6f29da0b01aa12522c37b32f121cbe47a861ef7f006cb22922dffa1');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `package` varchar(100) NOT NULL,
  `rental_date` date NOT NULL,
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `name`, `phone_number`, `address`, `package`, `rental_date`, `status`) VALUES
(1, 'Try Helviansyah', '089525126629', 'Pekanbaru', 'paket2', '2024-06-26', 'Tidak Diterima'),
(2, 'Try Helviansyah', '089525126629', 'Pekanbaru', 'paket1', '2024-06-28', 'Tidak Diterima'),
(3, 'asdfadasd', '23132', 'Pekanbaru', 'paket2', '2024-06-27', 'Diterima'),
(4, 'Try Helviansyah1212', '089525126629121', 'Pekanbaru12121', 'paket2', '2024-06-26', 'Diterima'),
(5, 'Try Helviansyah1212', '089525126629121', 'Pekanbaru121', 'paket2', '2024-06-20', 'Tidak Diterima'),
(6, 'assda', '08483343', 'Pekanbaru', 'paket2', '2024-06-27', 'Diterima'),
(7, 'sadasd', 'sadsda', 'sadasd', 'paket2', '2024-06-15', 'Pending'),
(8, 'mustaan', '0898828228', 'delima', 'paket2', '2024-06-28', 'Diterima'),
(9, 'asdads', 'asdasd', 'asdasd', 'paket2', '2024-06-20', 'Pending'),
(10, 'Try Helviansyah', '089525126629', 'Pekanbaru', 'paket1', '2024-06-18', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `store_address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `store_name`, `store_address`, `email`, `phone_number`) VALUES
(1, 'trioxxx', 'trioxxx', 'trioxxx@gmail.com', '81368982664'),
(2, 'Rifki Store', 'Jambi', 'StoreRifki@gmail.com', '0856789067'),
(3, '', '', '', ''),
(4, '', '', '', ''),
(5, 'Trio Rent', 'Palapa', 'RentalPesawat@gmail.com', '0867823989'),
(12, 'ALo', 'Pekanbaru', 'detry220803@gmail.com', '089525126629'),
(13, 'asdads', 'asddas', 'nandobudi3@gmail.com', '00999'),
(14, 'asdads', 'asddas', 'nandobudi3@gmail.com', '00999'),
(15, 'asdads', 'asddas', 'nandobudi3@gmail.com', '00999'),
(16, 'ALo1222121212', 'Pekanbaru', 'detry220803@gmail.com', '089525126629'),
(17, 'weew', 'wewe', 'wewe@gmail.com', '0220202020'),
(18, 'asddas', 'asdasd', 'asdasd@gmail.com', '0282292'),
(19, 'halo guys', 'email', 'faiz@gmail.com', '2828282882');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `uploaded_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catering_packages`
--
ALTER TABLE `catering_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catering_packages`
--
ALTER TABLE `catering_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
