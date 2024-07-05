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
(40, 4, 23, 'Stars Are Blind', 500, 'blue', 'earrings', 1, 'stars_are_blind2.jpg');

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
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `customer_id`, `name`, `email`, `number`, `message`) VALUES
(1, 4, 'haikal', 'haikal@gmail.com', '0987654321', 'Websitenya oke');

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
(1, 4, 'haikal', '0987654321', 'haikal@gmail.com', 'cash on delivery', 'bekasi', 'Evolene Evomass Gainer Coklat 912gr (1)', 270000, '05-July-2024', 'completed');

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
(2, 'Evolene Evomass Gainer Coklat 912gr', 270000, 'pink', 'Gainer', 'Evolene Evomass Gainer merupakan susu penambah berat badan dan menambah massa otot dengan kandungan 52 gram protein, 932 kkal, 11 gram glutamine, dan 8,5 gram BCAA setiap 1 servings. Dengan kandungan protein yang tinggi, susu ini sangat cepat diserap pada tubuh agar massa otot cepat terbentuk. Evolene Evomass Gainer sudah bersertifikasi BPOM dan halal. Bagus Untuk Bulking', 'evomasswheycoklat.jpg'),
(3, 'L-Men Platinum Strawberry 800g', 400000, 'multi-color', 'Whey Protein', 'L-Men Platinum Susu Whey Protein merupakan suplemen protein yang cocok untuk melengkapi kegiatan olahraga terutama untuk latihan beban, gym, dan fitness. L-Men Platinum yang tinggi whey protein sebanyak 25 gram/saji, dan juga memiliki kandungan Asam Amino yang lebih tinggi dari kebanyakan susu Whey lainnya (5,7gr BCAA).', 'lmenstrawberry.jpg'),
(4, 'Evolene Prevo Pre-Workout Green Apple 225gr', 375000, 'pink', 'Pre-Workout', 'Merupakan suplemen susu sebelum melakukan aktivitas olahraga agar menghasilkan energi yang ekstra dan massa otot yang maksimal, idealnya dikonsumsi 30 menit sebelum latihan. Susu ini memiliki komposisi Beta-Alanin 1500mg, Kreatin Monohidrat 500mg, Taurine 250mg,dan L Arginine 250mg. Dengan kandungan yang berkhasiat akan menambah endurance massa otot selama berolahraga.', 'prevoapple.jpg'),
(5, 'Muscle First Creatine Bubble Gum ', 220000, 'pink', 'Creatine', 'Creatine berfungsi untuk meningkatkan produksi ATP (adenosine triphosphate), yang merupakan sumber energi utama untuk kontraksi otot. Dengan meningkatkan produksi ATP, creatine memberikan energi tambahan selama latihan intensif. Selain itu, creatine menarik air ke dalam sel otot, yang dapat meningkatkan ukuran otot secara sementara, serta membantu meningkatkan sintesis protein dalam otot, yang penting untuk pertumbuhan dan pemulihan otot.', 'm1creatinegum.jpg'),
(6, 'Muscle First Pro Gainer Honeydew Melon 900gr', 250000, 'multi-color', 'Gainer', 'Pro Gainer dari Muscle First adalah suplemen mass gainer efektif untuk meningkatkan berat badan secara sehat dan mendukung pertumbuhan massa otot optimal. Diformulasikan dengan cermat, menggunakan serat gandum alami untuk hasil yang efektif dan berkelanjutan. Mengandung 55g protein & 1030kkal per sajian serta sudah tersertifikasi GMP, Halal MUI, BPOM, HACCP, & ISO 22000.', 'm1gainermelon.jpg'),
(7, 'EvoWhey Evolene Whey Protein 1750gr 50 Sachet Vanilla', 720000, 'red', 'Whey Protein', 'Evowhey merupakan whey protein praktis untuk mendukung kebutuhan pembentukan badan dan ototmu. Cocok untuk pemula hingga expert. Evowhey juga diformulasikan untuk membantu untuk mencukupi kebutuhan protein harian, mengencangkan otot perut, mempermudah program defisit kalori, dan juga menjalani program cutting.', 'evowheyvanilla.png'),
(8, 'Optimum Nutrition GS PRE-WORKOUT Fruit Punch 300gr', 550000, 'purple', 'Pre-Workout', 'Untuk Performa, Tenaga dan Fokus GOLD STANDARD PRE-WORKOUT Menggabungkan kafein dari sumber alami dengan creatine monohydrate dan beta-alanine untuk membantu Anda melepaskan energi, fokus, kinerja, dan daya tahan. Dapatkan energi Anda dengan pra-latihan dari salah satu merek paling tepercaya dalam nutrisi olahraga ini.', 'optimumprewo.jpg'),
(9, 'Evolene Crevolene Anggur 330gr ', 200000, 'yellow', 'Creatine', 'Evolene Crevolene merupakan suplemen susu olahraga yang rutin dikonsumsi bila Anda sedang berencana mambangun massa otot, sebab susu ini menghasilkan energi dan tenaga ekstra yang berguna untuk olahraga dengan intensitas berat dan repetisi tinggi. Susu Evolene Crevolene memiliki rasa anggur dengan komposisi Creatine yang bermanfaat massa otot lebih tebal dan cepat terbentuk.', 'crevoleneanggur.jpg'),
(10, 'Rimbalife RIMBAMASS 900gr Special Choco Delight', 225000, 'pink', 'Gainer', 'RimbaLife Rimba Mass merupakan susu suplemen fitness dengan kandungan protein yang tinggi dan rendah lemak, cocok bagi Anda yang sedang ingin menambah berat badan dan membentuk otot menjadi lebih tebal. Susu ini memiliki komposisi 34 gram protein, 90 gram total karbohidrat, 522 kalori, dan BCAA 3,7 gram yang memiliki peran penting untuk menambah energi dan mengembangkan kinerja massa otot.', 'rimbalifegainer.jpg'),
(11, 'Muscle First Pro Whey 900gr Strawberry', 420000, 'pink', 'Whey Protein', 'Pro Whey merupakan susu protein untuk pemula gym yang ingin menurunkan berat badan dan recovery massa otot. Pro Whey juga terbuat alami dari protein susu whey terbaik, serta pemanis alami dari daun stevia.', 'm1wheystroberi.jpg'),
(12, 'THE CURSE JNX SPORTS PRE WORKOUT (PWO) 50 SERVINGS 300 Gram - Blue Raspberry', 365000, 'red', 'Pre-Workout', 'Suplemen ini memiliki manfaat untuk memusatkan pikiran, fokus mental, membentuk otot secara intens, dan memaksimalkan intensitas latihan. Untuk hasil maksimal, konsumsi The Curse Pre Workout dengan mencampurkan 1 scoop dengan 200-300 air dingin dan konsumsi saat perut kosong 15 menit sebelum latihan.', 'jnxprewo.jpg'),
(13, 'FITLIFE Creaflex Creatine Monohydrate', 230000, 'white', 'Creatine', 'FITlife CreaFLEX ® dirancang menggunakan bahan baku 100% Kreatin Monohidrat murni, dengan tingkat kemurnian 99%. Dengan kandungan kreatin 4,995 gram per 1 takaran sajian membuat CreaFLEX ® unggul secara kemurnian dibandingkan kreatin lainnya. Konsumsi CreaFLEX ® 5 gram sajian sebelum dan sesudah latihan untuk hasil yang optimal.', 'creaflex.jpg'),
(14, 'BiotechUSA - MUSCLE MASS GAINER 1000 Gram - Chocolate', 420000, 'white', 'Gainer', 'Muscle Mass mengandung 5 jenis protein: Konsentrat whey, Protein terhidrolisis, Kasein, Isolat whey & Putih telur. Jenis protein ini memiliki tingkat penyerapan yang berbeda sehingga ideal dikonsumsi setelah latihan dan juga pada siang hari untuk Anda yang ingin membentuk otot. Dan sangat di rekomendasikan bagi Anda yang sulit untuk menambah berat badan secara efektif.', 'biotechgainer.jpg'),
(15, 'Optimum Nutrition Gold Standard Whey Protein 450gr - Double Rich Chocolate', 370000, 'multi-color', 'Whey Protein', 'Optimum Nutrition Gold Standard 100% Whey merupakan suplemen untuk membantu pembentukan otot dengan kandungan 24 gr protein, 100% whey protein, 120 gr kalori, 1 gr fat, whey protein isolate, whey concentrate, dan hydrolyzed isolate. Dengan kandungan protein yang tinggi suplemen ini dapat mempertahankan massa tubuh dan membantu pemulihan otot setelah selesai latihan. Sebaiknya dikonsumsi 30 - 60 menit setelah latihan atau berolahraga. Optimum Nutrition Gold Standard 100% Whey sudah bersertifikat halal dan BPOM.', 'optimumwhey.jpg'),
(16, 'FITLIFE POWR Mango Pre Workout 35 servings 175 gram', 300000, 'multi-color', 'Pre-Workout', 'POWR tersedia untuk kamu yang mencari kekuatan dan energi maksimal untuk menunjang performan latihan. POWR sudah teruji BPOM,Halal dan juga para atlit olahraga. Buktikan bahwa kamu juga bisa Unleash Your True Power !', 'fitlifeprewo.jpg'),
(17, 'KEVIN LEVRONE GOLD CREATINE MONOHYDRATE 300gr - Unflavoured', 335000, 'purple', 'Creatine', 'LEVRONE GOLD CREATINE. Berfungsi untuk melengkapi diet dengan creatine, direkomendasikan untuk orang dewasa yang melakukan olahraga intensitas tinggi. Creatine meningkatkan kinerja fisik dalam latihan jangka pendek dan intensitas tinggi berturut-turut, efek menguntungkan diperoleh dengan asupan harian 3 g creatine. Vitamin B6 berkontribusi pada fungsi normal sistem kekebalan tubuh dan juga berkontribusi pada pengurangan kelelahan dan kelelahan.', 'kevinlevrone.jpg'),
(18, 'Muscle First Pro Gainer Caramel Fusion 900gr', 300000, 'blue', 'Gainer', 'Pro Gainer dari Muscle First adalah suplemen mass gainer efektif untuk meningkatkan berat badan secara sehat dan mendukung pertumbuhan massa otot optimal. Diformulasikan dengan cermat, menggunakan serat gandum alami untuk hasil yang efektif dan berkelanjutan. Mengandung 55g protein & 1030kkal per sajian serta sudah tersertifikasi GMP, Halal MUI, BPOM, HACCP, & ISO 22000.', 'm1gainercaramel.jpg'),
(19, 'Rimbalife RIMBAWHEY 900gr Coklat', 285000, 'pink', 'Whey Protein', 'imbaWhey dari RimbaLife adalah inovasi modern untuk mencukupi kebutuhan protein harian dalam bentuk bubuk sehingga sangat praktis dikonsumsi. Faktanya, tubuh kita sangat membutuhkan protein sebagai salah satu makronutrisi agar sistem organ dapat berjalan dengan baik. Selain itu, protein juga mampu meregenerasi sel dan membantu untuk pembentukkan tubuh ideal.', 'rimbalifewhey.jpg'),
(20, 'L-Men Isopower Stargizing 30 Sch - Creatine & Vitamin B - Starfruit', 200000, 'green', 'Creatine', 'L-Men Isopower adalah uplemen minuman dengan 3g creatin per saji yang berfungsi meningkatkan performa dan kekuatan otot saat kita melakukan latihan beban. cocok untuk kamu yang sedang ingin meningkatkan performa olahraga resisten.', 'lmenisopower.jpg'),
(21, 'Yeah Buddy Pre-Workout (IMPROVED FORMULA) 30 serv - Cherry Limeade', 500000, 'blue', 'Pre-Workout', 'Yeah Buddy Pre-Workout merupakan keluaran terbaru dan berkualitas dari produk ronnie coleman series, selain fungsi utamanya yang di gunakan dalam mendongkrak latihan, power dan stamina pada saat sebelum olahraga juga mempunyai rasa yang segar untuk konsumsi suplemen harian anda!', 'yeahbuddy.jpg'),
(22, 'Master Mass 900gr - Dark Chocolate', 200000, 'pink', 'Gainer', 'MASTER MASS sangat baik diminum pada pagi hari, setelah fitness, dan sebelum tidur untuk memenuhi kebutuhan kalori dan meningkat kan masa otot sekaligus berat badan. Kandungan utama nya yaitu, tinggi Protein (60 gr per serving), tinggi BCAA (11 gr per serving)', 'mastermass.jpg'),
(23, 'PURO WPC WPRO Whey Protein Concentrate 600gr - WPC Choco Malt', 615000, 'red', 'Whey Protein', 'Puro WPRO adalah suplemen protein yang terkenal dengan kandungan proteinnya yang tinggi (21g per porsi) dan tidak adanya bahan pengisi seperti maltodekstrin. Ini juga mengandung 5g BCAA.', 'purowpc.jpg'),
(24, 'PURO CREATINE CREAPRO CREAPURE MESH200 - MESH200 140gr, Lemon', 180000, 'green', 'Creatine', 'Puro Creapro adalah merek suplemen creatine monohydrat yang dibuat di pabrik bersertifikat Halal. Ini menampilkan bahan baku premium dari Jerman dan mudah larut karena ukuran partikelnya yang kecil (Mesh 200).', 'purocreatine.jpg');


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
(4, 'haikal', 'haikal@gmail.com', 'a847b53f9999fc735ca2b6f1419c93d0', 'customer'),
(5, 'customer1', 'def@gmail.com', '4ed9407630eb1000c0f6b63842defa7d', 'customer');

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
(15, 4, 13, 'Optimum Nutrition Gold Standard Whey Protein 450gr - Double Rich Chocolate', 370000, 'multi-color', 'Whey Protein', 'optimumwhey.jpg'),
(16, 4, 20, 'FITLIFE POWR Mango Pre Workout 35 servings 175 gram', 300000, 'multi-color', 'Pre-Workout', 'fitlifeprewo.jpg'),
(7, 4, 28, 'EvoWhey Evolene Whey Protein 1750gr 50 Sachet Vanilla', 720000, 'red', 'Whey Protein', 'evowheyvanilla.png');

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
