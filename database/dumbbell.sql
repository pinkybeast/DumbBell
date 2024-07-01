-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2022 at 10:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dumbbell`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `pid`, `name`, `price`, `color`, `category`, `quantity`, `image`) VALUES
(40, 4, 23, 'Stars Are Blind', 500, 'blue', 'earrings', 1, 'stars_are_blind2.jpg'),
(41, 4, 29, 'Future Star', 450, 'pink', 'earrings', 2, 'future_star.jpg'),
(43, 4, 30, 'Rainbow Dash', 550, 'multi-color', 'bracelet', 1, 'rainbow_dash11.jpg'),
(44, 4, 27, 'You Are Valenmine', 500, 'pink', 'earrings', 1, 'youre_valenmine.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `customer_id`, `name`, `email`, `number`, `message`, `image`) VALUES
(1, 4, 'customer1', 'def@gmail.com', '03056789111', 'I would like to place an order for a double layered necklace with silver chains. It should have multi-colored butterfly and cloud pendants.', 'custom1.png'),
(2, 4, 'customer1', 'def@gmail.com', '03059876111', 'I would like to place an order for a four layered necklace made of multi-colored beads and white pearls. A seashell pendant would be much appreciated.', 'custom2.jpg'),
(7, 6, 'customer2', 'jkl@gmail.com', '03365220011', 'I would like to place a custom order for earrings that are purple in color and shaped like dices. Also try to make the earrings translucent and with hints of silver glitter in it.', 'csutom4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(200) NOT NULL,
  `placed_on_date` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on_date`, `payment_status`) VALUES
(1, 4, 'customer1', '03361234467', 'def@gmail.com', 'cash on delivery', 'house no 347, hall road, lahore, pakistan - 111022', 'Well Everybody Loves Me (1), Stars Are Blind (1), Dil (2)', 2700, '23-May-2022', 'completed'),
(2, 4, 'customer1', '03361234467', 'def@gmail.com', 'credit card', 'house no 347, hall road, lahore, pakistan - 111022', 'Bestie Bracelet (3), Phool (1), Butterfly (1)', 1950, '24-May-2022', 'completed'),
(4, 4, 'customer1', '03056767671', 'def@gmail.com', 'paypal', 'House no. 101, Jasmine Road, Islamabad, Islamabad Capital Territory, Pakistan - 44790', ', Gummy Siwa (1) , Love Is Actually All A-round (2) , Howl (1) ', 1800, '28-May-2022', 'pending'),
(5, 6, 'customer2', '03361212120', 'jkl@gmail.com', 'paytm', 'House no. 111, Rose Street, Islamabad, Islamabad Capital Territory, Pakistan - 44791', ', Payal Baje (2) , Dil Ke Saharey (2) , King Dominick (1) ', 2800, '28-May-2022', 'pending'),
(6, 4, 'customer1', '03069997612', 'def@gmail.com', 'cash on delivery', 'House no. 778, Dahlia Street, Islamabad, Islamabad Capital Territory, Pakistan - 44790', ', Butterfly (1) , Dil (1) , Love Is Actually All A-round (1) , Dil Ke Saharey (1) , Fruit (1) ', 2800, '01-Jun-2022', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `color`, `category`, `details`, `image`) VALUES
(2, 'Well Everybody Loves Me', 800, 'pink', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in metus in urna interdum tempor. Donec et posuere mauris. Aliquam vitae porta orci. Donec dapibus ex ac nisl mattis, eget semper enim placerat.', 'well_everybody_loves_me1.png'),
(7, 'Phool', 500, 'multi-color', 'earrings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu tempor arcu. Etiam vehicula metus quis neque luctus, nec dictum est consectetur. Sed vestibulum felis nec mauris finibus molestie. Suspendisse.', 'phool.jpg'),
(8, 'Love Story', 900, 'pink', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae augue sed turpis lobortis blandit. Cras sit amet risus nec felis commodo venenatis at eget nunc. Ut bibendum enim ut.', 'love_story1.jpg'),
(9, 'Gummy Siwa', 500, 'pink', 'earrings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae augue sed turpis lobortis blandit. Cras sit amet risus nec felis commodo venenatis at eget nunc. Ut bibendum enim ut.', 'gummy_siwa.jpg'),
(11, 'Bestie Bracelet', 350, 'multi-color', 'bracelet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae augue sed turpis lobortis blandit. Cras sit amet risus nec felis commodo venenatis at eget nunc.', 'bestie_bracelet11.jpg'),
(12, 'Dil', 700, 'red', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae augue sed turpis lobortis blandit. Cras sit amet risus nec felis commodo venenatis at eget nunc. Ut bibendum enim ut.', 'dil2.jpg'),
(13, 'Stars Are Blind', 500, 'purple', 'earrings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus blandit maximus. Duis vel diam dapibus, commodo nunc dictum, pellentesque.', 'stars_are_blind3.jpg'),
(14, 'Butterfly', 400, 'yellow', 'earrings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus blandit maximus. Duis vel diam dapibus, commodo nunc dictum.', 'butterfly11.jpg'),
(15, 'King Dominick', 800, 'pink', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin laoreet auctor orci. Cras varius ullamcorper sem, quis ultrices felis consectetur.', 'king_dominick1.jpg'),
(16, 'Love Is Actually All A-round', 400, 'pink', 'earrings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin laoreet auctor orci. Cras varius ullamcorper sem, quis.', 'love_is_actually_all_a-round2.jpg'),
(17, 'Well Everybody Loves Me', 800, 'red', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed diam ut odio feugiat efficitur elit elit. Lorem ipsum dolor sit amet.', 'well_everybody_loves_me2.jpg'),
(18, 'Howl', 500, 'white', 'earrings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra, enim vitae mollis viverra, lacus ex lobortis erat, ut accumsan.\r\n\r\n', 'howl1.jpg'),
(19, 'Dil Ke Saharey', 600, 'white', 'other', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ex nibh, aliquam sit amet venenatis et, rhoncus nec lacus. Integer.', 'dil_ke_saharey.jpg'),
(20, 'Pearl Rush', 700, 'multi-color', 'ring', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis risus quis lectus condimentum sagittis eu sagittis sem. Integer finibus ex eu.', 'pearl_rush.jpg'),
(21, 'Payal Baje', 400, 'multi-color', 'anklet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis risus quis lectus condimentum sagittis eu sagittis sem. Integer finibus ex.', 'payal_baje1.jpg'),
(22, 'Twilight Sparkle', 800, 'purple', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce non eros lacinia, dignissim diam vitae, condimentum lacus. Vestibulum ante ipsum.', 'twilight_sparkle.jpg'),
(23, 'Stars Are Blind', 500, 'blue', 'earrings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non nibh eleifend orci fermentum semper. Sed sodales magna ac pellentesque.', 'stars_are_blind2.jpg'),
(24, 'Kajra Re', 600, 'pink', 'other', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac orci in ex faucibus venenatis vel non magna. Suspendisse potenti. Maecenas facilisis.', 'kajra_re11.jpg'),
(25, 'Mood Ring', 800, 'green', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac orci in ex faucibus venenatis vel non magna. Suspendisse potenti. Maecenas facilisis.', 'mood_ring.png'),
(26, 'Bestie Bracelet', 350, 'purple', 'bracelet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis mauris vitae lectus pellentesque, at maximus lorem tincidunt. Pellentesque nec.', 'bestie_bracelet22.jpg'),
(27, 'You Are Valenmine', 500, 'pink', 'earrings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis mauris vitae lectus pellentesque, at maximus lorem tincidunt. Pellentesque.', 'youre_valenmine.jpg'),
(29, 'Future Star', 450, 'pink', 'earrings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor diam vel arcu accumsan, eu mattis purus consectetur. Curabitur quis.', 'future_star.jpg'),
(30, 'Rainbow Dash', 550, 'multi-color', 'bracelet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor diam vel arcu accumsan, eu mattis purus consectetur. Curabitur quis quis quis.', 'rainbow_dash11.jpg'),
(31, 'Fruit', 700, 'multi-color', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor diam vel arcu accumsan, eu mattis purus consectetur. Curabitur quis.', 'fruit2.jpg'),
(32, 'Meet This Pretty Bhaloo', 650, 'red', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi semper orci sed lacus vulputate fringilla. Aliquam mauris mauris, ornare vel.', 'meet_this_pretty_bhaloo2.jpg'),
(33, 'Oh No, We Hope You Dont Fall', 800, 'red', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas turpis lectus, facilisis nec purus sed, fringilla.', 'oh_no_we_hope_you_dont_fall.png'),
(34, 'Red (Taylor Version)', 750, 'red', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nec imperdiet erat. Fusce venenatis purus id purus tristique tincidunt. Donec.', 'red1.jpg'),
(35, 'Pinky Pie', 800, 'pink', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nec imperdiet erat. Fusce venenatis purus id purus tristique tincidunt. ', 'pinky_pie.jpg'),
(36, 'Sohniye', 500, 'yellow', 'earrings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum semper justo, at facilisis orci vestibulum id. Cras eleifend sodales.', 'sohniye.jpg'),
(37, 'Kuromi Melody', 700, 'black', 'necklace', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis efficitur a neque nec egestas. Vestibulum ut tortor nunc. Sed molestie.', 'kuromis_melody2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'admin1', 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 'admin'),
(4, 'customer1', 'def@gmail.com', '4ed9407630eb1000c0f6b63842defa7d', 'customer'),
(5, 'admin2', 'ghi@gmail.com', '826bbc5d0522f5f20a1da4b60fa8c871', 'admin'),
(6, 'customer2', 'jkl@gmail.com', '699a474e923b8da5d7aefbfc54a8a2bd', 'customer'),
(7, 'customer3', 'mno@gmail.com', 'd1cf6a6090003989122c4483ed135d55', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `customer_id`, `pid`, `name`, `price`, `color`, `category`, `image`) VALUES
(15, 4, 13, 'Stars Are Blind', 500, 'purple', 'earrings', 'stars_are_blind3.jpg'),
(16, 4, 20, 'Pearl Rush', 700, 'multi-color', 'ring', 'pearl_rush.jpg'),
(18, 4, 34, 'Red (Taylor Version)', 750, 'red', 'necklace', 'red1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
