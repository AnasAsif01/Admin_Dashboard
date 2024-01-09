-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 06:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `blockvendor`
--

CREATE TABLE `blockvendor` (
  `vendorid` int(11) NOT NULL,
  `blockid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blockvendor`
--

INSERT INTO `blockvendor` (`vendorid`, `blockid`) VALUES
(2, 1),
(2, 2),
(2, 3),
(3, 4),
(3, 5),
(3, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'plant'),
(2, 'seed');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `userid1` int(11) NOT NULL,
  `userid2` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `chat_datetime` datetime NOT NULL,
  `notify` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `userid1`, `userid2`, `message`, `chat_datetime`, `notify`) VALUES
(1, 2, 1, 'I am ali', '0000-00-00 00:00:00', 0),
(3, 2, 1, 'hi', '0000-00-00 00:00:00', 0),
(4, 2, 3, 'hi', '0000-00-00 00:00:00', 1),
(5, 2, 3, 'I am Inzamam', '0000-00-00 00:00:00', 0),
(6, 3, 4, 'hi', '0000-00-00 00:00:00', 1),
(7, 2, 3, 'in', '0000-00-00 00:00:00', 0),
(8, 3, 2, 'kj', '0000-00-00 00:00:00', 0),
(9, 3, 2, 'ki', '0000-00-00 00:00:00', 0),
(10, 2, 3, 'ji', '0000-00-00 00:00:00', 0),
(11, 3, 2, 'hi', '0000-00-00 00:00:00', 0),
(12, 2, 3, 'hi', '0000-00-00 00:00:00', 0),
(13, 3, 2, 'kamal', '0000-00-00 00:00:00', 0),
(14, 3, 2, 'hi', '0000-00-00 00:00:00', 0),
(15, 3, 2, 'hi', '0000-00-00 00:00:00', 0),
(16, 1, 1, 'Hi I am inzamam from iphone', '0000-00-00 00:00:00', 0),
(18, 2, 4, 'hi i am ali vendor of iphone what you wanna know', '0000-00-00 00:00:00', 1),
(38, 1, 2, 'ascdadscasd', '0000-00-00 00:00:00', 0),
(39, 1, 2, 'hi i am ali vendor of iphone what you wanna know', '0000-00-00 00:00:00', 0),
(40, 1, 2, ' xzc zxc zxc', '0000-00-00 00:00:00', 0),
(41, 1, 2, 'scasdcasdc', '0000-00-00 00:00:00', 0),
(42, 1, 2, 'I am inzamam want to know about iphone', '0000-00-00 00:00:00', 0),
(43, 1, 2, 'fsvdc c', '0000-00-00 00:00:00', 0),
(44, 2, 1, 'sdfvsd ', '0000-00-00 00:00:00', 0),
(45, 2, 1, 'casdca ad ula a sd', '0000-00-00 00:00:00', 0),
(46, 2, 3, 'hi i am ali vendor of iphone what you wanna knowsad', '0000-00-00 00:00:00', 0),
(47, 0, 3, 'xvcbv', '0000-00-00 00:00:00', 0),
(48, 0, 3, 'bnnb', '0000-00-00 00:00:00', 0),
(49, 0, 2, 'asdfg', '0000-00-00 00:00:00', 0),
(50, 0, 2, 'dada', '0000-00-00 00:00:00', 0),
(51, 0, 3, 'sabsaj', '0000-00-00 00:00:00', 0),
(52, 2, 3, 'm', '0000-00-00 00:00:00', 0),
(54, 2, 4, 'HI', '0000-00-00 00:00:00', 0),
(55, 2, 1, '5HMK', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `paymentmethodid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `vendorid` int(11) DEFAULT NULL,
  `paymentmode` varchar(255) DEFAULT NULL,
  `paymentmodeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`paymentmethodid`, `userid`, `productid`, `vendorid`, `paymentmode`, `paymentmodeid`) VALUES
(1, 1, 1, 2, 'Google Pay', 1),
(2, 1, 3, 3, 'Apple Pay', 2),
(3, 1, 1, 2, 'Stripe', 3),
(4, 1, 4, 3, 'Credit Card', 4),
(5, 1, 2, 2, 'Debit Card', 5),
(6, 1, 1, 2, 'Google Pay', 1),
(7, 1, 2, 2, 'Debit Card', 5);

-- --------------------------------------------------------

--
-- Table structure for table `plantcare`
--

CREATE TABLE `plantcare` (
  `Name` varchar(512) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL,
  `Season` varchar(512) DEFAULT NULL,
  `Water` varchar(512) DEFAULT NULL,
  `Soil` varchar(512) DEFAULT NULL,
  `Potsize` varchar(512) DEFAULT NULL,
  `Diseases` varchar(512) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plantcare`
--

INSERT INTO `plantcare` (`Name`, `Description`, `Season`, `Water`, `Soil`, `Potsize`, `Diseases`, `id`) VALUES
('Tomato (Solanum lycopersicum)', 'Red, juicy fruit often used in salads, sauces, and various dishes.', 'Warm-weather plant, grows best in summer.', 'Regular watering, keeping soil consistently moist.', 'Well-draining, fertile soil rich in organic matter.', 'Minimum 12-inch pot or 24 inches apart in a garden.', 'Blight, Fusarium, and Verticillium wilt.', 1),
('Cucumber (Cucumis sativus)', 'Long, green fruit commonly used in salads, sandwiches, and as a snack.', 'Warm season, requires full sun.', 'Consistent watering, especially during fruiting.', 'Nutrient-rich, well-draining soil.', 'Minimum 12 inches deep pot or grow in mounds in garden beds.', 'Powdery mildew, cucumber mosaic virus.', 2),
('Chili Pepper (Capsicum spp.)', 'Hot and spicy fruit used to flavor many dishes.', 'Warm weather is preferable, needs full sun.', 'Regular but moderate, avoid waterlogging.', 'Rich, well-draining soil with a neutral pH.', '12-inch pot or 18-24 inches apart in a garden.', 'Anthracnose, bacterial spot.', 3),
('Mint (Mentha spp.)', 'Fragrant herb used in teas, beverages, and culinary dishes.', 'Cooler weather, but can grow year-round in milder climates.', 'Likes moist soil, water regularly.', 'Fertile, well-draining soil.', 'Small pots are suitable, but it spreads quickly.', 'Rust, powdery mildew.', 4),
('Coriander (Coriandrum sativum)', 'Aromatic herb used in cooking, both leaves and seeds are used.', 'Cool to mild weather, not too hot.', 'Keep soil moist but not waterlogged.', 'Well-draining, nutrient-rich soil.', 'Small to medium-sized pots or spaced 6 inches apart.', 'Bacterial leaf spot, soft rot.', 5),
('Spinach (Spinacia oleracea)', 'Leafy green used in salads, cooking, and smoothies.', 'Cooler weather, but can tolerate a mild summer.', 'Consistent moisture needed.', 'Rich, well-draining soil high in nitrogen.', 'Minimum 6-8 inches deep pots or planted 12 inches apart.', 'Downy mildew, leaf miners.', 6),
('Eggplant (Solanum melongena)', 'Purple, glossy fruit used in various cuisines.', 'Warm weather, needs full sun.', 'Regular watering, keep soil moist.', 'Well-draining, fertile soil rich in organic matter.', 'Minimum 5-gallon pot or 24 inches apart in a garden.', 'Verticillium wilt, blossom end rot.', 7),
('Carrot (Daucus carota subsp. sativus)', 'Orange, crunchy root vegetable.', 'Cool to mild weather.', 'Regular, even moisture.', 'Deep, well-draining, sandy soil.', 'Deep pots at least 12 inches or deeper, spaced 3 inches apart.', 'Carrot fly, leaf blight.', 8),
('Lettuce (Lactuca sativa)', 'Leafy greens used primarily in salads.', 'Prefers cooler weather.', 'Consistent moisture, especially in hot weather.', 'Fertile, well-draining soil.', 'Shallow but wide pots, or spaced 6 inches apart.', 'Bottom rot, aphids.', 9),
('Garlic (Allium sativum)', 'Strongly flavored bulbs used as a spice or condiment.', 'Cool to mild weather.', 'Moderate watering, reduce before harvesting.', 'Rich, well-draining soil.', 'Individual cloves in small pots or spaced 6 inches apart.', 'White rot, botrytis rot.', 10),
('Radish (Raphanus sativus)', 'Edible root vegetable, often spicy or sweet.', 'Cool to moderate climates.', 'Regular watering to keep soil moist.', 'Fertile, well-draining soil.', 'Minimum 6-inch deep pots or spaced 2 inches apart.', 'Clubroot, root knot nematode.', 11),
('Onion (Allium cepa)', 'Pungent bulb used in cooking for flavor.', 'Cooler climates, but varies with variety.', 'Consistent moisture, especially during bulb development.', 'Well-draining, nutrient-rich soil.', 'Medium pots or spaced 4-6 inches apart.', 'Downy mildew, neck rot.', 12),
('Peas (Pisum sativum)', 'Sweet, green pods or spheres inside.', 'Prefers cooler weather, early spring or fall.', 'Moderate, keep soil moist but not waterlogged.', 'Well-draining soil, moderate fertility.', 'Minimum 12-inch deep pots or spaced 2 inches apart.', 'Powdery mildew, root rot.', 13),
('Bell Pepper (Capsicum annuum)', 'Mild, sweet fruit used in various dishes.', 'Warm season, requires full sun.', 'Regular watering, consistent moisture.', 'Rich, well-draining soil.', 'Minimum 12-inch pot or 18 inches apart in a garden.', 'Bacterial spot, mosaic virus.', 14),
('Cauliflower (Brassica oleracea var. botrytis)', 'White, dense head surrounded by green leaves.', 'Cooler weather, but newer varieties can tolerate some heat.', 'Consistent moisture, especially during head formation.', 'Rich, well-draining soil.', 'Large pots or spaced 18 inches apart.', 'Downy mildew, clubroot.', 15),
('Okra (Abelmoschus esculentus)', 'Green, finger-like pods used in soups and stews.', 'Warm weather, loves heat.', 'Regular watering but can tolerate some drought.', 'Fertile, well-draining soil.', 'Minimum 5-gallon pot or spaced 12-18 inches apart.', 'Fusarium wilt, powdery mildew.', 16),
('Pumpkin (Cucurbita spp.)', 'Large, round vegetable used in pies, soups, and as a decoration.', 'Warm weather, grows best in late spring to early summer.', 'Regular deep watering, especially during dry spells.', 'Rich, well-draining soil.', 'Very large space or garden bed, vines spread widely.', 'Powdery mildew, squash vine borer.', 17),
('Beetroot (Beta vulgaris)', 'Deep red, earthy root vegetable.', 'Cool to mild weather.', 'Regular, consistent moisture.', 'Well-draining soil, moderately fertile.', 'Minimum 10-inch deep pots or spaced 3 inches apart.', 'Leaf spot, root rot.', 18),
('Basil (Ocimum basilicum)', 'Fragrant herb used in pesto, salads, and as a garnish.', 'Warm weather, needs lots of sunlight.', 'Regular watering, allow soil to dry out slightly between watering.', 'Fertile, well-draining soil.', 'Small to medium pots or spaced 10-12 inches apart.', 'Fusarium wilt, downy mildew.', 19),
('Kale (Brassica oleracea var. sabellica)', 'Nutrient-rich leafy green, used in salads and as cooked greens.', 'Cooler weather, but some varieties can tolerate heat.', 'Regular watering, keep soil moist.', 'Rich, well-draining soil, high in organic matter.', 'Minimum 12-inch pot or spaced 18 inches apart.', 'Aphids, cabbage worm.', 20),
('SunFLowe', 'DO not put in hot weather', 'Winter', '10-12 hours', 'Need base', '12-15inches', NULL, 21);

-- --------------------------------------------------------

--
-- Table structure for table `plantsinfo`
--

CREATE TABLE `plantsinfo` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Img` varchar(255) NOT NULL,
  `Soil` varchar(255) NOT NULL,
  `Water` varchar(255) NOT NULL,
  `Sunlight` varchar(255) NOT NULL,
  `Potsize` varchar(255) NOT NULL,
  `Pest` varchar(255) NOT NULL,
  `Max Size` varchar(255) NOT NULL,
  `Min Size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plantsinfo`
--

INSERT INTO `plantsinfo` (`id`, `Name`, `Img`, `Soil`, `Water`, `Sunlight`, `Potsize`, `Pest`, `Max Size`, `Min Size`) VALUES
(1, 'Space', 'assets/img/397c911a6aa64963b296849e0fb3b231.jpg', '1', '1', '1', '1', '1', '1', '1'),
(2, 'Water', 'assets/img/adobestock-658751465_302794.jpg', '2', '2', '2', '2', '2', '2', '2'),
(3, 'Air', 'assets/img/img-1.jpg', '3', '3', '3', '3', '3', '3', '3'),
(4, 'Soil', 'assets/img/wallpaperflare.com_wallpaper (1).jpg', '4', '4', '4', '4', '4', '4', '4'),
(5, 'Sun', 'assets/img/wallpaperflare.com_wallpaper (10).jpg', '5', '5', '5', '5', '5', '5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `vendorid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `productid` int(11) NOT NULL,
  `notification` tinyint(1) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`vendorid`, `name`, `description`, `image`, `productid`, `notification`, `price`, `category`) VALUES
(4, 'Laptop', 'This is very good and handy laptop you will love to use it.', 'laptop.jpg', 2, 0, 100, 1),
(4, 'Audi', 'This is the best car which I have seen. You will be amazed by driving the car. It is more secure then any other car.', 'car.jpg', 3, 0, 60, 1),
(2, 'Bike', 'A lovely suzuki bike full of modification and accessories', 'bike.jpg', 4, 0, 40, 1),
(4, 'Plezanta', 'This is a rare plant', 'bunker-A1050.jpg', 5, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review` float NOT NULL,
  `feedback` varchar(50) NOT NULL,
  `reviewid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `vendorid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review`, `feedback`, `reviewid`, `productid`, `vendorid`, `userid`) VALUES
(2.3, 'It was not upto point', 1, 2, 4, 1),
(3.2, 'It was good', 2, 3, 4, 7),
(1, 'It was great', 3, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `productid` int(11) NOT NULL,
  `saleid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `vendorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`productid`, `saleid`, `price`, `vendorid`) VALUES
(2, 1, 500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `id` bigint(20) NOT NULL,
  `task` varchar(255) NOT NULL,
  `priority` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`id`, `task`, `priority`) VALUES
(7, 'task4', 0),
(9, 'task6', 1),
(10, 'MOIZ CC', 2),
(11, 'Nothing', 0),
(12, 'asd', 1),
(13, 'Asd', 1),
(14, 'Asda', 1),
(16, 'any', 2),
(17, 'lathe', 2),
(18, 'Moiz DD', 1),
(19, 'Moiz FF', 0),
(20, 'Meet Mac', 2),
(21, '32443', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` tinyint(1) NOT NULL,
  `userid` int(11) NOT NULL,
  `Status` int(11) DEFAULT 0,
  `notification` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `Email`, `Password`, `Role`, `userid`, `Status`, `notification`) VALUES
('Inzamam Yousaf', 'inzamamyousaf11111@gmail.com', '12345', 0, 1, 1, 0),
('Sajid', 'sajid@gmail.com', 'sajid', 1, 2, 1, 0),
('Akmal', 'akmal@gmail.com', '12345', 0, 3, 1, 0),
('ASDFGHJK', 'usmanayub792@gmail.com', '12345678', 0, 4, 1, 0),
('ASDFGHJK', 'usmanayub792@gmail.com', '12345678', 0, 5, 0, 0),
('ASDFGHJK', 'usmanayub792@gmail.com', '12345678', 0, 6, -1, 0),
('ASDFGHJK', 'usmanayub792@gmail.com', '12345678', 0, 8, 0, 0),
('user1', 'user1@gmail.com', '12345678', 0, 9, 0, 0),
('user2', 'user2@gmail.com', '12345678', 0, 10, 0, 0),
('user3', 'user3@gmail.com', '12345678', 0, 11, -1, 0),
('user3', 'user3@gmail.com', '12345678', 0, 12, 0, 0),
('user4', 'user4@gmail.com', '12345678', -1, 13, 0, 0),
('Wajahat', 'wajahat@gmail.com', '12345678', 1, 215, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blockvendor`
--
ALTER TABLE `blockvendor`
  ADD PRIMARY KEY (`blockid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`paymentmethodid`);

--
-- Indexes for table `plantcare`
--
ALTER TABLE `plantcare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plantsinfo`
--
ALTER TABLE `plantsinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewid`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`saleid`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blockvendor`
--
ALTER TABLE `blockvendor`
  MODIFY `blockid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `paymentmethodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plantcare`
--
ALTER TABLE `plantcare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `plantsinfo`
--
ALTER TABLE `plantsinfo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `saleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
