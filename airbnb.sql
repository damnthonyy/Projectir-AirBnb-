-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2023 at 04:21 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airbnb`
--
CREATE Database IF NOT EXISTS `airbnb`;
-- --------------------------------------------------------
USE `airbnb`;
--
-- Table structure for table `annonces`
--

CREATE TABLE `annonces` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `prices` int(11) NOT NULL,
  `places` decimal(10,0) NOT NULL,
  `summury` text NOT NULL,
  `images3` text NOT NULL,
  `images2` text NOT NULL,
  `images1` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `images4` text NOT NULL,
  `images5` text NOT NULL,
  `region` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `annonces`
--

INSERT INTO `annonces` (`id`, `title`, `prices`, `places`, `summury`, `images3`, `images2`, `images1`, `created_at`, `images4`, `images5`, `region`) VALUES
(12, ' 27 Bis Rue du Progrès, 93100 Montreuil', 50, '5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam posuere mattis elit, ut feugiat massa molestie in. Donec mattis porta quam, in ultricies nunc ultricies ullamcorper. Pellentesque rhoncus odio sem, id laoreet ex pellentesque sed. Proin vehicula turpis sit amet blandit rhoncus. Proin pellentesque est ut lorem pulvinar aliquet. Morbi iaculis congue nunc, ut auctor quam dictum sit amet. Ut tincidunt libero velit, non imperdiet ligula rutrum eget. Pellentesque iaculis, turpis ac rutrum lacinia, velit massa mollis erat, a tristique risus purus a ex.  Nullam vehicula, magna in aliquam convallis, mi nisl condimentum est, non feugiat ipsum dolor sit amet magna. Nulla facilisi. Cras sed urna tincidunt, blandit est sit amet, facilisis sapien. Maecenas rutrum viverra mi, in tempor tortor consectetur id. In sed tortor porttitor, venenatis turpis vel, bibendum sapien. Integer accumsan nunc dictum lorem pharetra, faucibus dictum nisl mollis. Fusce eros ligula, dapibus in nibh nec, tempus feugiat augue.  In ha', 'Capture d\'écran 2023-05-23 135609.png', 'versionner.png', 'Capture d’écran (5).png', '2023-06-15 14:28:19', 'Capture d’écran (6).png', 'Capture d’écran (6).png', 'Paris');

-- --------------------------------------------------------

--
-- Table structure for table `annonces_comments`
--

CREATE TABLE `annonces_comments` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `user_notice` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cleaners`
--

CREATE TABLE `cleaners` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `is_busy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `annonces_id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `annonces_id` int(11) NOT NULL,
  `annonces_date` date NOT NULL,
  `annonces_disponibilty` tinyint(1) NOT NULL DEFAULT '0',
  `reservations_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `users_id`, `annonces_id`, `annonces_date`, `annonces_disponibilty`, `reservations_price`) VALUES
(1, 14, 11, '2023-11-19', 0, '450.00'),
(2, 14, 11, '2023-11-19', 0, '450.00'),
(3, 14, 11, '2023-11-19', 0, '450.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `mail` varchar(255) NOT NULL,
  `username` varchar(60) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `birthdate` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) DEFAULT '1',
  `is_staf` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mail`, `username`, `users_password`, `is_admin`, `birthdate`, `gender`, `created_at`, `is_active`, `is_staf`) VALUES
(14, 'aboubakarbamba716@gmail.com', 'salut', '$2y$10$H90h6QNnXSrVNTPlOXUdHuQvUzFd2KGgrL6tSXz9Q/gZcGK4xeH8y', 0, '2004-11-19', 'M', '2023-06-18 15:15:18', 1, 0),
(15, 'aboubakarbamba718@gmail.com', 'bamba', '$2y$10$J07pBkgks9PN0lj8FEqwg.p2G9UIW3NaBGs4PEWGhLzxUFOiu9ea6', 0, '2004-11-19', 'M', '2023-06-18 15:15:19', 1, 0),
(16, 'aboubakarbamba716@gmail.com', 'AbouLeCodeur', '$2y$10$H90h6QNnXSrVNTPlOXUdHuQvUzFd2KGgrL6tSXz9Q/gZcGK4xeH8y', 0, '2004-11-19', 'M', '2023-06-18 15:15:20', 1, 0),
(17, 'daistephane0@gmail.com', 'Saul', '$2y$10$RvDoJ56MAjoWl1tlQRYiFO.oYxXnE2b3GDb6MsWXyqP11YRswRcMW', 1, '2023-06-20', 'M', '2023-06-16 12:36:27', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `annonces_comments`
--
ALTER TABLE `annonces_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaners`
--
ALTER TABLE `cleaners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `annonces_comments`
--
ALTER TABLE `annonces_comments`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cleaners`
--
ALTER TABLE `cleaners`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
