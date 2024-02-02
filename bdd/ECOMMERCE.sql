-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 01, 2024 at 05:31 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ECOMMERCE`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `mail`, `password`) VALUES
(1, 'admin@admin.com', 'lampupmal');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `photo_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `price`, `stock`, `photo_path`) VALUES
(1, 'Petit Bidule', 'Explorez notre Petit Bidule - une fusion irrésistible de charme et de praticité ! Cette adorable lampe émet une lueur douce, ajoutant une touche de tendresse à votre espace. Son format compact en fait le compagnon parfait pour votre table de chevet, bureau, ou toute petite recoin nécessitant une lueur chaleureuse. Avec son design câlin et une facilité d\'utilisation, cette petite lampe deviendra vite un incontournable. Illuminez votre intérieur avec Petit Bidule pour une ambiance chaleureuse et pleine de charme !', 19.99, 2, 'bdd/article_photos/0.jpeg'),
(2, 'Petite Poire', 'Découvrez notre adorable Lampe en forme de Poire, alliant à la perfection fantaisie et praticité ! Son design charmant apporte une touche de douceur à votre décoration intérieure. Avec une silhouette ergonomique, sa lueur chaude crée une atmosphère accueillante. Dotée d\'un interrupteur tactile, cette lampe LED écologique s\'adapte à tous les styles. Ajoutez une touche de charme à votre espace avec la Lampe en forme de Poire !', 19.99, 2, 'bdd/article_photos/1.jpeg'),
(3, 'Petit Toast', 'Découvrez notre Lampe Toast – une alliance parfaite entre originalité et fonctionnalité ! Cette lampe unique apporte une touche décalée à votre décoration. Avec sa forme de toast ludique, elle diffuse une lueur chaleureuse, parfaite pour une ambiance décontractée. Dotée d\'un interrupteur tactile, cette lampe LED écologique s\'intègre harmonieusement à tous les styles. Ajoutez une note d\'humour à votre espace avec la Lampe Toast !', 19.99, 2, 'bdd/article_photos/2.jpeg'),
(4, 'Petit Lapin', 'Découvrez notre irrésistible Lampe Lapin – la fusion parfaite entre mignonnerie et utilité ! Cette lampe charmante apporte une atmosphère douce à votre intérieur. Avec sa silhouette de lapin adorable, elle émet une lueur chaleureuse, idéale pour une ambiance cocooning. Équipée d\'un interrupteur tactile, cette lampe LED écoénergétique s\'adapte à tous les décors. Ajoutez une touche ludique à votre espace avec la Lampe Lapin !', 19.99, 2, 'bdd/article_photos/3.jpeg'),
(5, 'Petit Dumpling', 'Découvrez notre Lampe Dumpling – une fusion parfaite entre charme exotique et praticité ! Cette lampe originale ajoute une note délicate à votre décoration intérieure. Avec sa forme de dumpling ludique, elle diffuse une lueur douce, créant une ambiance accueillante. Munie d\'un interrupteur tactile, cette lampe LED écologique s\'adapte à tous les décors. Égayez votre espace avec une touche de cuisine asiatique grâce à la Lampe Dumpling !', 19.99, 2, 'bdd/article_photos/4.jpeg'),
(6, 'Chat Lumineux I', 'Découvrez notre Chat Lumineux - une pièce unique qui marie malice féline et éclairage pratique ! Ce félin malicieux arbore un abat-jour sur la tête, diffusant une lueur douce et chaleureuse. Son fil électrique passe astucieusement par la queue, ajoutant une touche ludique à votre décoration. Avec un interrupteur discret, cette création artistique apporte une ambiance joyeuse à n\'importe quel espace. Laissez le Chat Lumineux illuminer votre intérieur avec une dose de fantaisie féline !', 2.99, 2, 'bdd/article_photos/5.jpeg'),
(7, 'Lampe Surprise', 'Découvrez notre Lampe Surprise - une création mystérieuse alliant l\'éclat de l\'inattendu à la fonctionnalité ! Cette lampe intrigante cache un éclairage astucieux qui émane d\'une source inattendue. Avec une allure mystérieuse, elle apporte une touche d\'émerveillement à votre espace. Son design original est le secret de cette lampe unique, ajoutant une dose de surprise à votre décoration. Laissez la Lampe Surprise éclairer votre intérieur avec une lueur d\'énigme !', 0.99, 2, 'bdd/article_photos/6.jpeg'),
(8, 'Chat Lumineux II', 'Découvrez notre Chat Lumineux II - une pièce unique qui marie malice féline et éclairage pratique ! Ce félin malicieux arbore un abat-jour sur la tête, diffusant une lueur douce et chaleureuse. Son fil électrique passe astucieusement par la queue, ajoutant une touche ludique à votre décoration. Avec un interrupteur discret, cette création artistique apporte une ambiance joyeuse à n\'importe quel espace. Laissez le Chat Lumineux II illuminer votre intérieur avec une dose de fantaisie féline !', 1200.99, 2, 'bdd/article_photos/7.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_articles`
--

CREATE TABLE `ordered_articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `articles_quantity` int(3) NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_price` float NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `articles_quantity`, `purchase_date`, `total_price`, `address`) VALUES
(204, 5, 20, '2024-02-01 16:34:29', 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `number_stars` int(5) NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `reviewed_article_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `mail`, `password`) VALUES
(3, 'grand', 'bidule', 'theo.saint-amand@orange.fr', 'aa3d2fe4f6d301dbd6b8fb2d2fddfb7aeebf3bec53ffff4b39a0967afa88c609'),
(4, 'bidule', 'petit', 'theo@gmail.com', 'aa3d2fe4f6d301dbd6b8fb2d2fddfb7aeebf3bec53ffff4b39a0967afa88c609'),
(5, 'Je suis ', 'Petit', 'kiwi@gmail.com', 'aa3d2fe4f6d301dbd6b8fb2d2fddfb7aeebf3bec53ffff4b39a0967afa88c609'),
(6, 'test', 'test', 'test@gmail.com', '37268335dd6931045bdcdf92623ff819a64244b53d0e746d438797349d4da578');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_articles`
--
ALTER TABLE `ordered_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `reviews_ibfk_2` (`reviewed_article_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordered_articles`
--
ALTER TABLE `ordered_articles`
  ADD CONSTRAINT `ordered_articles_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `ordered_articles_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`reviewed_article_id`) REFERENCES `articles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
