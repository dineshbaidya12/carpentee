-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2023 at 05:41 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `image`, `content`, `short_content`) VALUES
(1, 'about-img.jpg', '<h1 style=\"text-align:center\"><strong><span style=\"font-size:28px\">ABOUT US</span></strong></h1>\r\n\r\n<p><span style=\"font-size:16px\">At CarpenterCraft, we understand that every piece of wood tells a story, and we are dedicated to crafting stories that resonate with your lifestyle. Whether you&#39;re looking to enhance the beauty of your home or create functional and stylish spaces, we have the expertise to bring your ideas to fruition.</span></p>\r\n\r\n<h2><span style=\"font-size:20px\"><strong><em>Our Philosophy</em></strong></span></h2>\r\n\r\n<p><span style=\"font-size:16px\">Our philosophy revolves around a commitment to precision, durability, and timeless design. We believe in the art of woodworking as a transformative process, where each cut, joint, and finish is an expression of our dedication to excellence. Our goal is not just to build furniture; it&#39;s to create heirlooms that will be cherished for generations.</span></p>\r\n\r\n<h2><span style=\"font-size:20px\"><strong><em>The CarpenterCraft Difference</em></strong></span></h2>\r\n\r\n<p><span style=\"font-size:16px\">What sets CarpenterCraft apart is our unwavering dedication to customer satisfaction. We take the time to understand your unique vision, offering personalized consultations to ensure that every detail aligns with your taste and requirements. Our collaborative approach, combined with skilled craftsmanship, results in bespoke creations that truly reflect your personality and style.</span></p>\r\n\r\n<h2><span style=\"font-size:20px\"><em><strong>Community Involvement</strong></em></span></h2>\r\n\r\n<p><span style=\"font-size:16px\">As proud members of the community, we believe in giving back. CarpenterCraft is committed to sustainable practices and sources materials responsibly. We actively participate in local initiatives, supporting causes that promote craftsmanship, education, and environmental conservation.</span></p>\r\n\r\n<h2><span style=\"font-size:20px\"><em><strong>Our Workshop</strong></em></span></h2>\r\n\r\n<p><span style=\"font-size:16px\">Step into our state-of-the-art workshop, where creativity meets precision. Equipped with the latest tools and technologies, our craftsmen bring innovation to traditional woodworking techniques. The smell of sawdust, the hum of machinery, and the meticulous attention to detail create an environment where masterpieces come to life.</span></p>\r\n\r\n<h2><span style=\"font-size:20px\"><strong><em>Join Us in Crafting Memories</em></strong></span></h2>\r\n\r\n<p><span style=\"font-size:16px\">Whether you&#39;re envisioning a custom dining table, a handcrafted wardrobe, or a complete home transformation, CarpenterCraft is here to turn your dreams into reality. Let&#39;s embark on a journey of craftsmanship together. Join us in crafting not just furniture but memories that last a lifetime.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Thank you for choosing CarpenterCraft, where craftsmanship meets artistry.</span></p>\r\n\r\n<h2><span style=\"font-size:20px\"><em><strong>Our Story</strong></em></span></h2>\r\n\r\n<p><span style=\"font-size:16px\">Founded in 2010, CarpenterCraft has been serving the community with dedication and skill. Our journey started in a small workshop with a vision to create custom woodwork that stands the test of time. Over the years, we&#39;ve grown and expanded our services to meet the diverse needs of our clients.</span></p>\r\n\r\n<h2><span style=\"font-size:20px\"><em><strong>Our Services</strong></em></span></h2>\r\n\r\n<p><span style=\"font-size:16px\">At CarpenterCraft, we offer a wide range of carpentry services, including:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\">Custom Furniture Design</span></li>\r\n	<li><span style=\"font-size:16px\">Wooden Flooring Installation</span></li>\r\n	<li><span style=\"font-size:16px\">Door and Window Frames</span></li>\r\n	<li><span style=\"font-size:16px\">Cabinetry and Shelving</span></li>\r\n	<li><span style=\"font-size:16px\">Restoration and Repairs</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:16px\">Our skilled craftsmen use premium materials and the latest techniques to ensure that every project exceeds your expectations.</span></p>\r\n\r\n<h2><span style=\"font-size:20px\"><u><strong>Meet Our Team</strong></u></span></h2>\r\n\r\n<p><span style=\"font-size:16px\">Our team of experienced carpenters is passionate about their craft. With attention to detail and a commitment to quality, we bring your visions to life. Get to know the faces behind Das Furniture:</span></p>\r\n<!-- You can include individual profiles or team photos here -->\r\n\r\n<p><span style=\"font-size:16px\">Thank you for choosing Das Furniture. We look forward to transforming your ideas into beautifully crafted woodwork.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Contact us today to discuss your project!</span></p>\r\n', 'At Home Wood Work, we\'ve proudly served our clients for over a decade. With a strong and satisfied customer base, we specialize in crafting customized furniture that complements your style and comfort. Our mission is to transform your living spaces into unique, artful expressions of your personality and lifestyle. Join us in shaping homes and bringing your dreams to life. Your home is our canvas, and we\'re here to make it beautiful. ');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `message` text NOT NULL,
  `date` date DEFAULT NULL,
  `status` enum('unread','read') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'unread',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `message`, `date`, `status`) VALUES
(46, 'Testing Web', '4524158968', 'Testing.web017@gmail.com', 'Lorem ipsum doller si.', '2023-12-06', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(190) NOT NULL,
  `details` text NOT NULL,
  `order_num` int NOT NULL DEFAULT '10',
  `yt` text,
  `yt_raw` text,
  `main_img` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `details`, `order_num`, `yt`, `yt_raw`, `main_img`, `status`, `created_date`) VALUES
(33, 'Urban Oasis Bookshelf', '<p><em>Welcome to our latest venture, the &quot;Urban Oasis Bookshelf,&quot; where contemporary design meets functional artistry. This project is a testament to our commitment to creating furniture that not only serves a purpose but also becomes a statement piece within modern living spaces.</em></p>\r\n\r\n<h3><strong>Project Overview:</strong></h3>\r\n\r\n<p>The Urban Oasis Bookshelf project is a fusion of sleek urban aesthetics and the timeless allure of natural materials. It envisions a bookshelf that transcends mere functionality, seamlessly blending into urban living while making a bold design statement.</p>\r\n\r\n<h3><strong>Design Philosophy:</strong></h3>\r\n\r\n<p>Our design philosophy revolves around the marriage of metal and wood&mdash;two contrasting yet complementary elements. Clean lines, geometric shapes, and the integration of mixed materials will define this bookshelf, resulting in a visually striking piece that catches the eye.</p>\r\n\r\n<h3><strong>Key Features:</strong></h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Mixed Materials:</strong> Incorporation of both metal and wood creates a harmonious blend of industrial chic and natural warmth.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Sleek Lines:</strong> The design will feature clean, straight lines to achieve a minimalist yet sophisticated appearance.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Open Concept:</strong> The bookshelf will embrace an open concept, allowing for both storage and display of books, art, and decorative items.</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3><strong>Aesthetic Inspiration:</strong></h3>\r\n\r\n<p>Inspired by the dynamic energy of urban landscapes, the Urban Oasis Bookshelf draws inspiration from city skylines, contemporary architecture, and the juxtaposition of modern structures against natural elements. The color palette will reflect urban sophistication with hints of industrial charm.</p>\r\n\r\n<h3><strong>Functionality and Versatility:</strong></h3>\r\n\r\n<p>Functionality is at the forefront of this project. The bookshelf will offer ample storage space, easy accessibility, and versatility in its applications. It&#39;s designed not just as a bookshelf but as a multifunctional piece of furniture that adapts to various needs.</p>\r\n\r\n<h3><strong>Crafting Process:</strong></h3>\r\n\r\n<p>Crafting this bookshelf involves precision and expertise in metalwork and woodworking. Our artisans will meticulously shape, weld, and finish each component, ensuring that the final product meets our high standards of quality and durability.</p>\r\n\r\n<h3><strong>Customization Options:</strong></h3>\r\n\r\n<p>Understanding the diversity of interior styles, the Urban Oasis Bookshelf will be available with customization options. Clients can choose from different metal finishes, wood types, and overall dimensions to tailor the bookshelf to their individual preferences.</p>\r\n\r\n<h3><strong>Conclusion:</strong></h3>\r\n\r\n<p>As we embark on this project, we envision not just a bookshelf but a functional work of art that elevates living spaces. The Urban Oasis Bookshelf is a celebration of modern design, an oasis in the midst of urban living, offering both practicality and aesthetic appeal.</p>\r\n\r\n<p>Join us on this creative journey as we transform raw materials into a contemporary masterpiece. Witness the evolution of the Urban Oasis Bookshelf, where urban sophistication meets natural allure, and discover how this piece can redefine the dynamics of modern interiors. Stay tuned for updates as we bring this vision to life, one meticulous step at a time.</p>\r\n', 21, 'https://www.youtube.com/embed/N8U8Y2OkGe4', 'https://www.youtube.com/watch?v=N8U8Y2OkGe4', 'project_33.jpg', 'active', '2024-01-26'),
(32, 'Rustic Elegance Dining Set', '<p><em>Embark on a journey of craftsmanship as we unveil our latest project, the &quot;Rustic Elegance Dining Set.&quot; This undertaking blends the timeless allure of rustic aesthetics with the sophistication of modern design, resulting in a dining set that transcends ordinary furniture.</em></p>\r\n\r\n<h3><strong>Project Overview:</strong></h3>\r\n\r\n<p>In this venture, our team of skilled artisans is dedicated to crafting a dining set that not only stands as a functional piece but also emanates warmth and invites communal gatherings. The project revolves around the use of reclaimed wood, carefully chosen for its character, durability, and sustainability.</p>\r\n\r\n<h3><strong>Design Philosophy:</strong></h3>\r\n\r\n<p>The design philosophy centers on intricate detailing, creating a visual narrative within the woodwork. Each element, from the tabletop to the chair backs, tells a story of the material&#39;s journey, embracing imperfections as part of the narrative. The goal is to achieve a perfect balance between rustic charm and modern elegance.</p>\r\n\r\n<h3><strong>Key Features:</strong></h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Reclaimed Wood Selection:</strong> Carefully sourced and selected reclaimed wood forms the foundation, bringing history and authenticity to every piece.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Intricate Wood Carvings:</strong> Artisans will employ intricate wood carving techniques to add unique detailing, ensuring each dining set has its own distinct personality.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Sturdy Construction:</strong> Craftsmanship will prioritize sturdiness, ensuring longevity and resilience in everyday use, while maintaining an elegant aesthetic.</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3><strong>Aesthetic Inspiration:</strong></h3>\r\n\r\n<p>Inspired by the charm of rural homesteads and the allure of countryside dining, the Rustic Elegance Dining Set draws inspiration from nature&#39;s palette. Earthy tones, warm finishes, and subtle distressing techniques will be applied to achieve the desired aesthetic.</p>\r\n\r\n<h3><strong>Functionality and Versatility:</strong></h3>\r\n\r\n<p>Beyond its aesthetic appeal, the dining set is designed to be highly functional. Ample seating, ergonomic design, and a spacious tabletop ensure a comfortable and versatile dining experience suitable for both casual meals and formal gatherings.</p>\r\n\r\n<h3><strong>Crafting Process:</strong></h3>\r\n\r\n<p>The crafting process will involve a harmonious collaboration of artisans, each contributing their expertise to various stages of production. From initial design sketches to the final touches, meticulous attention will be given to every detail.</p>\r\n\r\n<h3><strong>Customization Options:</strong></h3>\r\n\r\n<p>Understanding the diverse preferences of our clients, the Rustic Elegance Dining Set will offer customization options. Clients can choose from different wood finishes, upholstery fabrics, and detailing options to tailor the set to their unique taste.</p>\r\n\r\n<h3><strong>Conclusion:</strong></h3>\r\n\r\n<p>As we embark on this project, our aim is to not merely create furniture but to craft an experience&mdash;an experience of bringing people together, fostering connection, and celebrating the art of carpentry. The Rustic Elegance Dining Set is not just a piece of furniture; it&#39;s a testament to the enduring beauty of handcrafted creations.</p>\r\n\r\n<p>Stay tuned as we breathe life into this project, transforming raw materials into a masterpiece that reflects the essence of rustic elegance. Join us on this journey, where craftsmanship meets storytelling, and witness the birth of a dining set that transcends trends and becomes a cherished part of homes for generations to come.</p>\r\n', 20, 'https://www.youtube.com/embed/EfImlj0tbq4', 'https://www.youtube.com/watch?v=EfImlj0tbq4', 'project_32.jpg', 'active', '2023-11-09'),
(34, 'Garden Retreat Pergola', '<p><em>Step into the enchanting world of our latest project, the &quot;Garden Retreat Pergola,&quot; where craftsmanship and nature intertwine to create a captivating outdoor haven. This project is a celebration of outdoor living, blending architectural elegance with the tranquility of a garden retreat.</em></p>\r\n\r\n<h3><strong>Project Overview:</strong></h3>\r\n\r\n<p>The Garden Retreat Pergola project is an ode to the beauty of outdoor spaces. It envisions a pergola that not only provides shade but also serves as a focal point in a garden, creating a serene escape where one can unwind amidst nature&#39;s embrace.</p>\r\n\r\n<h3><strong>Design Philosophy:</strong></h3>\r\n\r\n<p>Our design philosophy revolves around creating a structure that seamlessly integrates with its surroundings. The pergola will feature open sides, allowing for unobstructed views of the garden, while its architectural design will add a touch of elegance to outdoor landscapes.</p>\r\n\r\n<h3><strong>Key Features:</strong></h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Open-sided Design:</strong> The pergola will embrace an open-sided design, allowing for an immersive experience of the surrounding garden.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Architectural Elegance:</strong> Architectural elements, such as decorative columns and intricate detailing, will be incorporated to elevate the pergola&#39;s aesthetic appeal.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Tranquil Setting:</strong> The goal is to create a tranquil setting where individuals can retreat, relax, and connect with nature.</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3><strong>Aesthetic Inspiration:</strong></h3>\r\n\r\n<p>Inspired by classic garden structures and the allure of natural surroundings, the Garden Retreat Pergola draws inspiration from botanical gardens and classical architecture. Earthy tones, climbing vines, and soft lighting will enhance the overall ambiance.</p>\r\n\r\n<h3><strong>Functionality and Versatility:</strong></h3>\r\n\r\n<p>Functionality is paramount in this project. The pergola will not only provide shade but also serve as an inviting space for gatherings, meditation, or quiet contemplation. Its versatile design will adapt to various activities while maintaining a connection to nature.</p>\r\n\r\n<h3><strong>Crafting Process:</strong></h3>\r\n\r\n<p>Crafting the Garden Retreat Pergola involves a careful selection of materials and a meticulous construction process. Each component, from the supporting columns to the lattice roof, will be crafted with precision, ensuring durability and longevity.</p>\r\n\r\n<h3><strong>Customization Options:</strong></h3>\r\n\r\n<p>Understanding the uniqueness of individual gardens, the pergola will offer customization options. Clients can choose from different finishes, lighting configurations, and decorative elements to tailor the pergola to their garden&#39;s specific ambiance.</p>\r\n\r\n<h3><strong>Conclusion:</strong></h3>\r\n\r\n<p>As we embark on this project, we envision not just a pergola but a retreat&mdash;a place where the beauty of craftsmanship meets the serenity of nature. The Garden Retreat Pergola is an invitation to immerse oneself in the outdoors, fostering a connection between architecture and the natural world.</p>\r\n\r\n<p>Join us on this creative journey as we shape raw materials into a structure that transforms gardens into retreats. Follow the evolution of the Garden Retreat Pergola, where craftsmanship meets nature, and discover how this project can redefine outdoor living spaces. Stay tuned for updates as we bring this vision to life, creating a haven of tranquility under the open sky.</p>\r\n', 5, 'https://www.youtube.com/embed/jyOWH1WsYGk', 'https://www.youtube.com/watch?v=jyOWH1WsYGk', 'project_34.jpg', 'active', '2023-12-07'),
(35, ' Coastal Cottage Kitchen Cabinets', '<p><em>Welcome to our Coastal Cottage Kitchen Cabinets project, a harmonious blend of coastal charm and functional design. In this venture, we aim to create custom kitchen cabinets that not only optimize storage space but also infuse a breath of seaside serenity into every culinary space.</em></p>\r\n\r\n<h3><strong>Project Overview:</strong></h3>\r\n\r\n<p>The Coastal Cottage Kitchen Cabinets project revolves around the creation of bespoke kitchen cabinetry inspired by the coastal cottage aesthetic. Our goal is to transform kitchens into inviting spaces, echoing the tranquility of coastal living while maintaining the functionality essential for culinary endeavors.</p>\r\n\r\n<h3><strong>Design Philosophy:</strong></h3>\r\n\r\n<p>Our design philosophy embraces the light and airy qualities of coastal living. Cabinets will feature a combination of light-colored wood, beadboard detailing, and hardware that captures the essence of seaside charm. The design seeks to instill a sense of relaxation and ease into the heart of the home.</p>\r\n\r\n<h3><strong>Key Features:</strong></h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Light-Colored Wood:</strong> Utilization of light-colored wood, evoking the natural tones found in coastal landscapes.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Beadboard Detailing:</strong> Incorporation of beadboard panels for a touch of traditional coastal cottage charm.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Seaside Hardware:</strong> Selection of hardware that complements the coastal theme, reminiscent of seaside elements.</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3><strong>Aesthetic Inspiration:</strong></h3>\r\n\r\n<p>Inspired by coastal cottages nestled along the shoreline, the Coastal Cottage Kitchen Cabinets draw inspiration from sandy beaches, weathered driftwood, and the soft hues of ocean waves. The color palette is a fusion of whites, soft blues, and natural wood tones.</p>\r\n\r\n<h3><strong>Functionality and Versatility:</strong></h3>\r\n\r\n<p>While embracing coastal aesthetics, functionality remains at the forefront. The kitchen cabinets are designed to provide ample storage space, convenient organization, and easy access to kitchen essentials. The result is a kitchen that seamlessly balances style and practicality.</p>\r\n\r\n<h3><strong>Crafting Process:</strong></h3>\r\n\r\n<p>Crafting these coastal-inspired cabinets involves a careful selection of materials, precision woodworking, and attention to detail. From the construction of cabinet frames to the application of finishing touches, our artisans will ensure each cabinet reflects the quality and craftsmanship synonymous with our brand.</p>\r\n\r\n<h3><strong>Customization Options:</strong></h3>\r\n\r\n<p>Understanding the varied preferences of homeowners, the Coastal Cottage Kitchen Cabinets will offer customization options. Clients can choose from different finishes, hardware styles, and organizational features to tailor the cabinets to their unique kitchen layouts.</p>\r\n\r\n<h3><strong>Conclusion:</strong></h3>\r\n\r\n<p>As we embark on this project, we envision not just cabinets but the transformation of kitchens into coastal havens. The Coastal Cottage Kitchen Cabinets project is an invitation to bring the tranquility of the coast into everyday living, creating spaces that inspire culinary creativity and evoke a sense of seaside retreat.</p>\r\n\r\n<p>Join us on this creative journey as we shape raw materials into cabinets that redefine kitchen aesthetics. Follow the evolution of the Coastal Cottage Kitchen Cabinets, where coastal charm meets culinary functionality. Stay tuned for updates as we bring this vision to life, one cabinet at a time, and elevate kitchens into spaces of coastal elegance.</p>\r\n', 10, 'https://www.youtube.com/embed/jXDYLKICi5I', 'https://www.youtube.com/watch?v=jXDYLKICi5I', 'project_35.jpg', 'active', '2023-12-09'),
(36, 'Mid-Century Modern Coffee Table', '<p><em>Welcome to our Mid-Century Modern Coffee Table project, where timeless design meets contemporary flair. In this endeavor, we aim to craft a coffee table that captures the essence of mid-century aesthetics, combining clean lines, functionality, and a touch of retro charm.</em></p>\r\n\r\n<h3><strong>Project Overview:</strong></h3>\r\n\r\n<p>The Mid-Century Modern Coffee Table project centers around the creation of a coffee table that pays homage to the design principles of the mid-20th century. Our goal is to infuse living spaces with the iconic style of the era while providing a functional centerpiece for daily gatherings.</p>\r\n\r\n<h3><strong>Design Philosophy:</strong></h3>\r\n\r\n<p>Our design philosophy for this project embraces the simplicity and sophistication inherent in mid-century modern design. The coffee table will feature clean lines, tapered legs, and a minimalist silhouette, offering a timeless appeal that seamlessly integrates with various interior styles.</p>\r\n\r\n<h3><strong>Key Features:</strong></h3>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Tapered Legs:</strong> Incorporation of tapered legs, a hallmark of mid-century furniture design, adding elegance and visual interest.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Sleek Lines:</strong> The coffee table&#39;s design will prioritize clean lines and uncluttered surfaces, contributing to a modern and sophisticated aesthetic.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Wood and Metal Fusion:</strong> A harmonious fusion of wood and metal elements to achieve a balanced composition that echoes mid-century sensibilities.</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3><strong>Aesthetic Inspiration:</strong></h3>\r\n\r\n<p>Inspired by the iconic mid-century furniture pieces, the Mid-Century Modern Coffee Table draws inspiration from the works of designers like Eames and Saarinen. The color palette will reflect the warm tones of natural wood, complemented by metal accents for a touch of industrial flair.</p>\r\n\r\n<h3><strong>Functionality and Versatility:</strong></h3>\r\n\r\n<p>While celebrating mid-century aesthetics, functionality remains paramount. The coffee table is designed to serve as more than just a visual focal point; it offers a practical surface for everyday use, from holding coffee mugs to displaying curated decor.</p>\r\n\r\n<h3><strong>Crafting Process:</strong></h3>\r\n\r\n<p>Crafting this coffee table involves a meticulous process of selecting high-quality wood, precision woodworking, and expert metal fabrication. Each component is carefully crafted to ensure durability and to capture the essence of mid-century design.</p>\r\n\r\n<h3><strong>Customization Options:</strong></h3>\r\n\r\n<p>Understanding the diversity of interior preferences, the Mid-Century Modern Coffee Table will offer customization options. Clients can choose from different wood finishes, metal colors, and tabletop shapes to tailor the coffee table to their individual taste.</p>\r\n\r\n<h3><strong>Conclusion:</strong></h3>\r\n\r\n<p>As we embark on this project, we envision not just a coffee table but a piece of functional art that transcends design eras. The Mid-Century Modern Coffee Table is an invitation to bring the elegance of mid-century aesthetics into contemporary living, creating a timeless addition to modern interiors.</p>\r\n\r\n<p>Join us on this creative journey as we shape raw materials into a coffee table that redefines living spaces. Follow the evolution of the Mid-Century Modern Coffee Table, where past and present converge in a celebration of enduring design. Stay tuned for updates as we bring this vision to life, one elegant curve and tapered leg at a time.</p>\r\n', 1, 'https://www.youtube.com/embed/4oj4QQmRODI', 'https://www.youtube.com/watch?v=4oj4QQmRODI', 'project_36.jpg', 'active', '2023-12-02');

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
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(46, 31, 'project_31_6565e89af3bcd.jpg'),
(47, 32, 'project_32_65714a9f0efeb.jpg'),
(52, 34, 'project_34_657153986607e.jpg'),
(49, 32, 'project_32_65714a9f2b16f.jpg'),
(50, 32, 'project_32_65714a9f302a0.jpg'),
(51, 32, 'project_32_65714a9f355a2.jpg'),
(53, 34, 'project_34_657153987df46.jpg'),
(54, 34, 'project_34_6571539882f0a.jpg'),
(55, 34, 'project_34_6571539889197.jpg'),
(56, 35, 'project_35_6571563dcc505.jpg'),
(57, 35, 'project_35_6571563dd12cf.jpg'),
(58, 35, 'project_35_6571563dd64ef.jpg'),
(59, 35, 'project_35_6571563de7e06.jpg'),
(60, 35, 'project_35_6571563dec4cd.jpg'),
(61, 36, 'project_36_65715685131be.jpg'),
(62, 36, 'project_36_65715685247cc.jpg'),
(63, 36, 'project_36_657156852889d.jpg'),
(64, 36, 'project_36_657156854acbe.jpg');

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
-- Table structure for table `subscriberss`
--

DROP TABLE IF EXISTS `subscriberss`;
CREATE TABLE IF NOT EXISTS `subscriberss` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(190) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscriberss`
--

INSERT INTO `subscriberss` (`id`, `email`, `date`) VALUES
(10, 'sdf@gmil,oasdj.skdufh', '2023-12-05'),
(11, 'hey@dsg.com', '2023-12-07'),
(12, 'hello@gmail.com', '2023-12-07');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `image`, `role`, `description`, `order_by`, `status`) VALUES
(10, 'Rashida Ainscough', 'Rashida_Ainscough_member_10.jpg', 'Wood Finishing Expert', ' Rashida is a wood finishing expert, enhancing the beauty of each piece through staining, varnishing, and other finishing techniques. Casey\'s attention to detail ensures a flawless finish.', 4, 'active'),
(6, 'John Doe', 'John_Doe_member_6.jpg', 'Master Craftsman', 'With over 15 years of experience, John is a true artisan who brings creativity and precision to every project. His passion for woodworking is evident in the timeless pieces he creates.', 12, 'active'),
(7, 'Olivia Joiner', 'Olivia_Joiner_member_7.jpg', 'Design Specialist', 'Olivia\'s keen eye for design and attention to detail make her an invaluable member of our team. She collaborates with clients to turn their visions into beautiful, functional woodwork.', 3, 'active'),
(8, 'Michael Carpenter', NULL, 'Apprentice Carpenter', 'Michael is a dedicated apprentice eager to learn and contribute to the art of woodworking. His enthusiasm and commitment make him a promising addition to CarpenterCraft.', 5, 'active'),
(9, 'Ava Timber Artisan', 'Ava_Timber_Artisan_member_9.jpg', 'Timber Artisan', 'Ava specializes in working with timber, creating artful and sustainable wooden pieces. Her commitment to eco-friendly practices aligns with creating beautiful, natural furnishings.', 4, 'active'),
(11, 'Debby Gillispie', 'Debby_Gillispie_member_11.jpg', 'Carpentry Consultant', ' Debby is a carpentry consultant providing expertise on projects. With a background in project management and carpentry, Ethan guides clients in making informed decisions for their woodworking projects.', 6, 'active'),
(12, 'Dylan Pesnell', 'Dylan_Pesnell_member_12.jpg', 'Apprentice Carpenter', 'Dylan is an apprentice carpenter eager to learn and contribute to the craft. Under the guidance of experienced artisans, Dylan hones skills in woodworking techniques.', 4, 'active'),
(13, 'Alex Carpenter', 'Alex_Carpenter_member_13.jpg', 'Master Craftsman', 'With a lifetime dedicated to the art of carpentry, Alex is our esteemed Master Craftsman. Renowned for transforming raw wood into timeless masterpieces, Alex\'s expertise and attention to detail set the standard for our team.', 7, 'active'),
(14, 'Ryan Timberman', 'Ryan_Timberman_member_14.jpg', 'Restoration Specialist', 'Ryan\'s mastery lies in the restoration of wooden treasures. As our Restoration Specialist, Ryan breathes new life into antique pieces, preserving history and showcasing the beauty of aged wood with meticulous care.', 8, 'active');

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `comment`, `status`, `created_date`) VALUES
(18, 'Alex Johnson', 'Alex_Johnson_18.jpg', 'The carpenter did an excellent job remodeling our kitchen cabinets. The quality of work, professionalism, and attention to our preferences made the entire process smooth. We are thrilled with the results!', 'active', '2023-11-28'),
(19, 'Olivia Joiner', 'Olivia_Joiner_19.jpg', 'Exceptional craftsmanship! Alex\'s attention to detail and expertise are unmatched. The custom furniture piece exceeded our expectations. Truly a master at work.', 'active', '2023-12-06'),
(20, 'Ryan Timberman', 'Ryan_Timberman_20.jpg', 'Emily\'s work is nothing short of art. The custom furniture she crafted for us is not only functional but also a beautiful centerpiece in our home. Her dedication to her craft is evident in every detail.', 'active', '2023-12-06'),
(21, 'Emily', 'Emily_21.jpg', 'Ryan\'s restoration work is phenomenal. He brought our family heirloom back to life, preserving its history while making it look stunning. His passion for restoration truly shines through.', 'active', '2023-12-06'),
(14, 'Lorem Ipsum', 'Lorem_Ipsum_14.jpg', ' I couldn\'t be happier with the custom furniture Home Wood Work created for my home. Their attention to detail and craftsmanship is exceptional. It\'s not just furniture; it\'s art that enhances my living space. I highly recommend their services.         ', 'active', '2023-11-28'),
(15, 'Doller Si', 'Doller_Si_15.jpg', 'Home Wood Work has been my go-to for all things carpentry and furniture. They\'ve been transforming my home for years, and I\'m continuously impressed with their work. The personal touch they bring to every project is unmatched. A big thank you to the entire team!', 'active', '2023-11-28'),
(16, 'John Doe', 'John_Doe_16.jpg', 'I hired the carpenter service for a custom furniture project, and I\'m extremely satisfied with the craftsmanship. The attention to detail and precision exceeded my expectations. Highly recommended!', 'active', '2023-11-28'),
(17, 'Jane Smith', 'Jane_Smith_17.jpg', 'The carpenter service provided prompt assistance for a small home repair. While the work was completed efficiently, I expected a bit more communication about the process. Overall, a decent experience.', 'active', '2023-11-28'),
(22, 'Olivia', 'Olivia_22.jpg', 'Olivia\'s cabinetry transformed our kitchen. Her design expertise and attention to detail resulted in functional and stylish storage solutions. We couldn\'t be happier with the outcome.', 'active', '2023-12-06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
