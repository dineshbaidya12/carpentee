-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2023 at 01:43 PM
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
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(190) DEFAULT NULL,
  `content` text NOT NULL,
  `short_content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `image`, `content`, `short_content`) VALUES
(1, 'about-img.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad tenetur praesentium possimus rem harum rerum explicabo aperiam nam, eaque iste deleniti. Minus accusantium dolorem consequuntur suscipit enim, hic modi reprehenderit expedita ea! Sint veniam blanditiis nemo ullam, maxime explicabo eius. Blanditiis accusamus quas optio expedita quis at saepe quo suscipit eveniet dicta impedit, voluptates debitis odio, quidem esse dolor? Id, beatae. Totam nihil impedit exercitationem sapiente quaerat esse qui, fuga vitae? Incidunt facilis aspernatur distinctio explicabo accusantium atque, ad, tempora minus similique doloribus labore sed, quidem error suscipit neque facere voluptatum? Alias eum doloribus voluptatibus id? Doloribus, dolorum illo. Illo!', 'At Home Wood Work, we\'ve proudly served our clients for over a decade. With a strong and satisfied customer base, we specialize in crafting customized furniture that complements your style and comfort. Our mission is to transform your living spaces into unique, artful expressions of your personality and lifestyle. Join us in shaping homes and bringing your dreams to life. Your home is our canvas, and we\'re here to make it beautiful. ');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `details` text NOT NULL,
  `yt` text,
  `yt_raw` text,
  `main_img` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `details`, `yt`, `yt_raw`, `main_img`, `status`, `created_date`) VALUES
(25, 'Timeless Woodwork for a Coastal Retreat', '<p>In this seaside escape, the carpentry project revolves around creating timeless woodwork that complements the coastal surroundings. From handcrafted nautical-themed furniture to durable outdoor wooden fixtures, the goal is to seamlessly integrate functionality with the natural beauty of the coastal environment.</p>\r\n', '', '', 'project_25.jpg', 'active', '2023-11-28'),
(26, 'Modern Minimalism Redefined', '<p>Embracing the principles of modern minimalism, this project emphasizes clean lines and functional simplicity. Custom-designed minimalist furniture pieces, space-saving storage solutions, and sleek wooden finishes contribute to a clutter-free and aesthetically pleasing living environment.</p>\r\n', 'https://www.youtube.com/embed/ImtZ5yENzgE', 'https://www.youtube.com/watch?v=ImtZ5yENzgE', 'project_26.jpg', 'active', '2023-11-28'),
(24, 'Rustic Elegance in the Heart of the City', '<p>Crafting a series of bespoke wooden elements for an urban apartment, this project focuses on bringing rustic charm to a contemporary setting. From reclaimed wood accent walls to custom-built furniture pieces, each detail is designed to infuse warmth and character into the modern living space.</p>\r\n', '', '', 'project_24.jpg', 'active', '2023-11-28'),
(27, 'Urban Jungle Oasis', '<p>Transforming an urban dwelling into an urban jungle oasis, this carpentry project incorporates wooden plant stands, hanging gardens, and custom-designed shelving units to seamlessly merge indoor and outdoor spaces. The focus is on creating a green sanctuary within the confines of city living.</p>\r\n', '', '', 'project_27.jpg', 'active', '2023-11-28'),
(28, 'Online Event Management System', '<h2>Overview</h2>\r\n\r\n<p>The Online Event Management System is a web-based platform designed to streamline and simplify the process of organizing and managing various events. Whether it&#39;s conferences, seminars, or social gatherings, this system aims to provide event organizers with a comprehensive toolset to enhance planning, execution, and participant engagement.</p>\r\n\r\n<h2>Features</h2>\r\n\r\n<ul>\r\n	<li><strong>Event Creation:</strong> Easily create and customize event details, including date, time, location, and agenda.</li>\r\n	<li><strong>Registration Management:</strong> Allow participants to register for events through a user-friendly registration system.</li>\r\n	<li><strong>Ticketing System:</strong> Implement a secure ticketing system with different ticket types and pricing options.</li>\r\n	<li><strong>Attendee Management:</strong> Keep track of attendees, manage check-ins, and gather valuable insights on participant demographics.</li>\r\n	<li><strong>Communication Hub:</strong> Facilitate seamless communication between organizers and participants through notifications and announcements.</li>\r\n	<li><strong>Feedback and Surveys:</strong> Collect feedback from attendees through post-event surveys to improve future events.</li>\r\n</ul>\r\n\r\n<h2>Technologies</h2>\r\n\r\n<ul>\r\n	<li><strong>Frontend:</strong> React.js</li>\r\n	<li><strong>Backend:</strong> Node.js with Express</li>\r\n	<li><strong>Database:</strong> MongoDB</li>\r\n	<li><strong>Authentication:</strong> JWT for secure user authentication</li>\r\n</ul>\r\n\r\n<h2>Scope of Work</h2>\r\n\r\n<p>The project includes the development of both frontend and backend components, integration with a MongoDB database, and the implementation of secure authentication protocols. The system will support multiple events simultaneously and provide a user-friendly interface for both organizers and participants.</p>\r\n\r\n<h2>Timeline</h2>\r\n\r\n<ul>\r\n	<li><strong>Phase 1 (Design and Planning):</strong> 2 weeks</li>\r\n	<li><strong>Phase 2 (Development):</strong> 6 weeks</li>\r\n	<li><strong>Phase 3 (Testing and Debugging):</strong> 3 weeks</li>\r\n	<li><strong>Phase 4 (Deployment):</strong> 1 week</li>\r\n</ul>\r\n\r\n<h2>Team Members</h2>\r\n\r\n<ul>\r\n	<li><strong>Project Manager:</strong> John Doe</li>\r\n	<li><strong>Frontend Developer:</strong> Jane Smith</li>\r\n	<li><strong>Backend Developer:</strong> Alex Johnson</li>\r\n	<li><strong>UI/UX Designer:</strong> Emily Brown</li>\r\n</ul>\r\n\r\n<h2>Budget</h2>\r\n\r\n<p>Estimated budget for the project: $50,000</p>\r\n\r\n<h2>Risks and Challenges</h2>\r\n\r\n<p>Potential challenges may include unforeseen technical complexities, ensuring system scalability for a large number of participants, and addressing any issues related to user experience during the registration and ticketing process.</p>\r\n\r\n<h2>Conclusion</h2>\r\n\r\n<p>The Online Event Management System aims to revolutionize event planning and execution, providing organizers with a powerful and user-friendly tool to create memorable and successful events.</p>\r\n', 'https://www.youtube.com/embed/F5mRW0jo-U4', 'https://www.youtube.com/watch?v=F5mRW0jo-U4', 'project_28.jpg', 'active', '2023-11-28'),
(29, 'Breanna Larson', 'Odio odit anim incid', 'https://www.youtube.com/embed/PtQiiknWUcI', 'https://www.youtube.com/watch?v=PtQiiknWUcI', 'project_29.jpg', 'active', '1988-03-27'),
(31, 'testing', '<p>ajshdjasd</p>\r\n', '', '', 'project_31.jpg', 'active', '2023-11-28');

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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(36, 23, 'project_23_655ae2dc5b91b.jpg'),
(37, 28, 'project_28_6565e402a63fa.jpg'),
(38, 28, 'project_28_6565e402aa540.jpg'),
(39, 28, 'project_28_6565e402ae8ad.jpg'),
(40, 28, 'project_28_6565e402b7514.jpg'),
(41, 28, 'project_28_6565e402bb670.jpg'),
(42, 28, 'project_28_6565e402bf0dd.jpg'),
(43, 28, 'project_28_6565e402c2da5.jpg'),
(44, 31, 'project_31_6565e89ae775e.jpg'),
(45, 31, 'project_31_6565e89aefe1b.jpg'),
(46, 31, 'project_31_6565e89af3bcd.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `heading`, `image`, `content`, `status`) VALUES
(10, ' Home Wood Work ', 'services_10.jpg', ' Transform your living space with our expertly crafted home woodwork services. From custom-made wooden furniture to intricate wood detailing, we bring elegance and warmth to your home. Discover the beauty of natural wood in every corner of your living space with our Home Wood Work service. ', 'active'),
(8, 'Outdoor Furniture', 'services_8.jpg', 'Embrace the great outdoors with our durable and stylish outdoor furniture solutions. Crafted to withstand the elements, our outdoor furniture adds functionality and aesthetics to your open spaces. Whether it\'s a garden, patio, or poolside area, our Outdoor Furniture range invites you to relax and enjoy the beauty of the outdoors in comfort. ', 'active'),
(9, 'Indoor Furniture ', 'services_9.jpg', ' Elevate your indoor living experience with our exquisite range of indoor furniture. Our collection features a blend of comfort and style, designed to make your interiors inviting and appealing. Choose from a variety of high-quality furniture pieces to create a harmonious and cozy atmosphere indoors. ', 'active');

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
  `contact_email` varchar(190) DEFAULT NULL,
  `phone` int NOT NULL,
  `location` varchar(150) NOT NULL,
  `small_desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `latitute` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `longitute` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `insta` varchar(100) DEFAULT NULL,
  `tweet` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `whattsapp` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `site_title`, `admin_name`, `username`, `admin_pass`, `admin_img`, `email`, `contact_email`, `phone`, `location`, `small_desc`, `latitute`, `longitute`, `fb`, `insta`, `tweet`, `youtube`, `whattsapp`) VALUES
(1, 'The Furniture', 'The Furniture | The Best Home Decorater Site', 'Testing Web', 'Tester', 'Admin@123', 'admin_1.jpeg', 'testing.web017@gmail.com', 'testing.web@gmail.com', 1231231231, 'West Bengal, Kolkata, Lake Gardens, Lake Temple Road, 743368', 'We\'re excited to transform your home with our experienced team\'s custom-made furniture, tailored to your vision', '22.5076003', '88.3462019', 'http://www.facebook.com/testing-web', 'http://www.instagram.com/testing-web', 'http://www.tweeter.com/testing-web', 'http://www.youtube.com/testing-web', 1231231231);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `image`, `role`, `description`, `order_by`, `status`) VALUES
(1, 'kifefese', 'kifefese_member_1.jpgss', 'Quidem error sequi m', 'Nihil Nam quia at inNihil Nam quia at inNihil Nam quia at inNihil Nam quia at inNihil Nam quia at inNihil Nam quia at inNihil Nam quia at inNihil Nam quia at inNihil Nam quia at inNihil Nam quia at inNihil Nam quia at in', 1, 'active'),
(3, 'Renee Carlson', 'Renee_Carlson_member_3.jpg', 'Laboriosam eos reic', 'Officia magnam iure ', 12, 'active'),
(4, 'ahgdhgasd', 'ahgdhgasd_member_4.jpg', 'ajsdhgjagysdjasd', 'ontent of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing ', 50, 'active'),
(5, 'asdasdasd', 'asdasdasd_member_5.jpg', 'asd', '0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s ', 50, 'active');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `comment`, `status`, `created_date`) VALUES
(18, 'Alex Johnson', 'Alex_Johnson_18.jpg', 'The carpenter did an excellent job remodeling our kitchen cabinets. The quality of work, professionalism, and attention to our preferences made the entire process smooth. We are thrilled with the results!', 'active', '2023-11-28'),
(14, 'Lorem Ipsum', 'Lorem_Ipsum_14.jpg', ' I couldn\'t be happier with the custom furniture Home Wood Work created for my home. Their attention to detail and craftsmanship is exceptional. It\'s not just furniture; it\'s art that enhances my living space. I highly recommend their services.         ', 'active', '2023-11-28'),
(15, 'Doller Si', 'Doller_Si_15.jpg', 'Home Wood Work has been my go-to for all things carpentry and furniture. They\'ve been transforming my home for years, and I\'m continuously impressed with their work. The personal touch they bring to every project is unmatched. A big thank you to the entire team!', 'active', '2023-11-28'),
(16, 'John Doe', 'John_Doe_16.jpg', 'I hired the carpenter service for a custom furniture project, and I\'m extremely satisfied with the craftsmanship. The attention to detail and precision exceeded my expectations. Highly recommended!', 'active', '2023-11-28'),
(17, 'Jane Smith', 'Jane_Smith_17.jpg', 'The carpenter service provided prompt assistance for a small home repair. While the work was completed efficiently, I expected a bit more communication about the process. Overall, a decent experience.', 'active', '2023-11-28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
