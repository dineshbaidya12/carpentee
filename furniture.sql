-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 23, 2023 at 04:38 AM
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
  `status` enum('active','inactive') NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `details`, `main_img`, `status`, `created_date`) VALUES
(1, 'Project 1 asdasd', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\najsdh', 'project_1.jpg', 'active', '2023-11-30'),
(19, 'Clayton Clayton', 'Architecto facere co', 'project_19.jpg', 'active', '2004-11-12'),
(18, 'Christian Collins', 'Quia ut rerum aliqua', 'project_18.jpg', 'inactive', '1984-07-03'),
(17, 'Knox English', 'Sint labore facere m', 'project_17.jpg', 'active', '1986-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

DROP TABLE IF EXISTS `project_images`;
CREATE TABLE IF NOT EXISTS `project_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `image`) VALUES
(5, 1, 'project_1_6556fce9b945d.jpg'),
(2, 1, 'project_1_2.png'),
(4, 1, 'project_1_4.png'),
(6, 1, 'project_1_6556fce9bf3fb.jpg'),
(11, 1, 'project_1_6556fdeb41481.jpg'),
(12, 1, 'project_1_6556fe782dc6d.jpg'),
(16, 16, 'project_16_65571a8658add.jpg'),
(15, 16, 'project_16_65571a864e8d7.jpg'),
(17, 16, 'project_16_65571a865e913.jpg'),
(18, 16, 'project_16_65571a8664833.jpg'),
(19, 21, 'project_21_655ae26bac178.jpg'),
(20, 21, 'project_21_655ae26bb7797.jpg'),
(21, 21, 'project_21_655ae26bca072.jpg'),
(22, 21, 'project_21_655ae26bce45e.jpg'),
(23, 22, 'project_22_655ae2ba257e5.jpg'),
(24, 22, 'project_22_655ae2ba4e8ef.jpg'),
(25, 22, 'project_22_655ae2ba57cb9.jpg'),
(26, 22, 'project_22_655ae2ba9ede0.jpg'),
(27, 23, 'project_23_655ae2dbbe2a7.jpg'),
(28, 23, 'project_23_655ae2dbe364c.jpg'),
(29, 23, 'project_23_655ae2dbf1666.jpg'),
(30, 23, 'project_23_655ae2dc094a0.jpg'),
(31, 23, 'project_23_655ae2dc2fe99.jpg'),
(32, 23, 'project_23_655ae2dc34a13.jpg'),
(33, 23, 'project_23_655ae2dc3cbef.jpg'),
(34, 23, 'project_23_655ae2dc4735e.jpg'),
(35, 23, 'project_23_655ae2dc57100.jpg'),
(36, 23, 'project_23_655ae2dc5b91b.jpg');

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
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `heading`, `image`, `content`, `status`) VALUES
(1, 'Home Wood Work', 'services_1.jpg', 'Transform your living space with our expertly crafted home woodwork services. From custom-made wooden furniture to intricate wood detailing, we bring elegance and warmth to your home. Discover the beauty of natural wood in every corner of your living space with our Home Wood Work service.', 'active'),
(2, 'Indoor Furniture', NULL, 'Elevate your indoor living experience with our exquisite range of indoor furniture. Our collection features a blend of comfort and style, designed to make your interiors inviting and appealing. Choose from a variety of high-quality furniture pieces to create a harmonious and cozy atmosphere indoors. ', 'active'),
(3, 'Outdoor Furniture', NULL, 'Embrace the great outdoors with our durable and stylish outdoor furniture solutions. Crafted to withstand the elements, our outdoor furniture adds functionality and aesthetics to your open spaces. Whether it\'s a garden, patio, or poolside area, our Outdoor Furniture range invites you to relax and enjoy the beauty of the outdoors in comfort.', 'active');

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
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `order_by` int NOT NULL DEFAULT '50',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `image`, `role`, `description`, `order_by`, `status`) VALUES
(1, 'kifefese', 'kifefese_member_1.jpg', 'Quidem error sequi m', 'Nihil Nam quia at in', 1, 'inactive'),
(3, 'Renee Carlson', 'Renee_Carlson_member_3.jpg', 'Laboriosam eos reic', 'Officia magnam iure ', 12, 'active');

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

INSERT INTO `testimonials` (`id`, `name`, `image`, `comment`, `status`, `created_date`) VALUES (2, 'Rishi Baidya', 'Rishi_Baidya_2.jpg', 'I couldn\'t be happier with the custom furniture Home Wood Work created for my home. Their attention to detail and craftsmanship is exceptional. It\'s not just furniture; it\'s art that enhances my living space. I highly recommend their services.', 'active', '2023-11-01'),
(5, 'Testing User', NULL, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'active', '2023-10-25'),
(7, 'Rus Adam', 'Rus_Adam_7.jpeg', 'lorem ipsum doller si', 'active', '2023-11-23'),
(11, 'Dustin Hale', NULL, 'Repellendus Sed ame', 'active', '2022-02-07'),
(13, 'Phillip Horne', 'Phillip_Horne_13.jpg', 'Incididunt et exerci', 'active', '1975-04-07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
