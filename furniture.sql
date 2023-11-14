-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2023 at 01:23 PM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `details` text NOT NULL,
  `main_img` varchar(250) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `heading` varchar(200) NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `heading`, `image`, `content`) VALUES
(1, 'Home Wood Work', 'services_1.jpg', 'Transform your living space with our expertly crafted home woodwork services. From custom-made wooden furniture to intricate wood detailing, we bring elegance and warmth to your home. Discover the beauty of natural wood in every corner of your living space with our Home Wood Work service.'),
(2, 'Indoor Furniture', '', 'Elevate your indoor living experience with our exquisite range of indoor furniture. Our collection features a blend of comfort and style, designed to make your interiors inviting and appealing. Choose from a variety of high-quality furniture pieces to create a harmonious and cozy atmosphere indoors. '),
(3, 'Outdoor Furniture', '', 'Embrace the great outdoors with our durable and stylish outdoor furniture solutions. Crafted to withstand the elements, our outdoor furniture adds functionality and aesthetics to your open spaces. Whether it\'s a garden, patio, or poolside area, our Outdoor Furniture range invites you to relax and enjoy the beauty of the outdoors in comfort.');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `site_name` varchar(100) NOT NULL,
  `site_title` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `admin_pass` varchar(150) NOT NULL,
  `admin_img` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `location` varchar(150) NOT NULL,
  `small_desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `latitute` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `longitute` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `insta` varchar(100) DEFAULT NULL,
  `tweet` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `site_title`, `admin_name`, `username`, `admin_pass`, `admin_img`, `email`, `phone`, `location`, `small_desc`, `latitute`, `longitute`, `fb`, `insta`, `tweet`, `youtube`) VALUES
(1, 'The Furniture', 'The Furniture | The Best Home Decorater Site', 'Testing Web', 'Tester', 'Admin@123', 'admin_1.jpeg', 'testing.web017@gmail.com', 1245214521, 'West Bengal, Kolkata, Lake Gardens, Lake Temple Road, 743368', 'Lorem ipsum doller si nullable isro but heavy.', '22.5076003', '88.3462019', 'http://www.facebook.com/testing-web', 'http://www.instagram.com/testing-web', 'http://www.tweeter.com/testing-web', 'http://www.youtube.com/testing-web');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `comment` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `comment`, `status`, `created_date`) VALUES
(2, 'Rishi Baidya', 'Rishi_Baidya_2.jpg', 'I couldn\'t be happier with the custom furniture Home Wood Work created for my home. Their attention to detail and craftsmanship is exceptional. It\'s not just furniture; it\'s art that enhances my living space. I highly recommend their services.', 'active', '2023-11-01'),
(5, 'Testing User', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'active', '2023-10-25'),
(7, 'Rus Adam', 'Rus_Adam_7.jpeg', 'lorem ipsum doller si', 'active', '2023-11-23'),
(11, 'Dustin Hale', NULL, 'Repellendus Sed ame', 'active', '2022-02-07'),
(13, 'Phillip Horne', 'Phillip_Horne_13.jpg', 'Incididunt et exerci', 'active', '1975-04-07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
