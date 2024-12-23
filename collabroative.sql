-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 11:44 AM
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
-- Database: `collabroative`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `is_active`) VALUES
(1, 'Fashion', 'Influencers who specialize in fashion, style, and trends.', 1),
(2, 'Beauty', 'Influencers who focus on beauty, skincare, and makeup products.', 1),
(3, 'Technology', 'Influencers specializing in technology, gadgets, and innovation.', 1),
(4, 'Fitness', 'Influencers who focus on fitness, exercise routines, and healthy living.', 1),
(5, 'Food', 'Influencers who focus on food, cooking, and culinary experiences.', 1),
(6, 'Travel', 'Influencers who specialize in travel destinations, adventures, and experiences.', 1),
(7, 'Gaming', 'Influencers in the gaming industry, covering gaming content, reviews, and streams.', 1),
(8, 'Lifestyle', 'Influencers who cover a variety of topics related to daily living and personal lifestyle.', 1),
(9, 'Parenting', 'Influencers who specialize in parenting, family life, and child-rearing topics.', 1),
(10, 'Entertainment', 'Influencers focused on movies, music, TV shows, and celebrity culture.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `collaboration_requests`
--

CREATE TABLE `collaboration_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `influencer_id` int(11) NOT NULL,
  `campaign_details` text NOT NULL,
  `status` enum('Accepted','Pending','Rejected') NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collaboration_requests`
--

INSERT INTO `collaboration_requests` (`id`, `user_id`, `platform_id`, `influencer_id`, `campaign_details`, `status`, `requested_at`, `updated_at`) VALUES
(11, 2, 1, 11, 'Campaign for New Fashion Launch', 'Pending', '2024-12-10 04:30:00', '2024-12-21 08:40:32'),
(12, 3, 4, 12, 'Fitness Product Collaboration', 'Accepted', '2024-12-10 05:30:00', '2024-12-20 08:34:55'),
(13, 4, 3, 14, 'Tech Product Collaboration', 'Rejected', '2024-12-11 07:00:00', '2024-12-20 08:35:14'),
(14, 5, 1, 13, 'Social Media Marketing', 'Rejected', '2024-12-11 07:30:00', '2024-12-20 08:35:30'),
(15, 6, 3, 18, 'Seasonal Discount Campaign', 'Accepted', '2024-12-11 08:30:00', '2024-12-20 08:35:45'),
(16, 10, 4, 15, 'Holiday Promotion', 'Accepted', '2024-12-12 09:30:00', '2024-12-20 08:35:59'),
(17, 11, 3, 16, 'Luxury Watch Brand Campaign', 'Pending', '2024-12-13 02:30:00', '2024-12-20 08:36:34'),
(18, 12, 1, 17, 'Health Supplement Promotion', 'Pending', '2024-12-13 04:00:00', '2024-12-20 08:36:29'),
(19, 13, 4, 19, 'Spring Fashion Collection', 'Pending', '2024-12-13 04:30:00', '2024-12-20 08:36:46'),
(20, 14, 1, 20, 'Lifestyle Product Campaign', 'Pending', '2024-12-13 05:00:00', '2024-12-20 08:36:49'),
(23, 2, 1, 11, 'A tech product collaboration involves partnering , brands, or creators to promote and showcase a specific technology product. This collaboration can include sponsored content, product reviews, unboxing videos, or tutorials to highlight the features and benefits of the product. Through strategic partnerships, companies aim to reach a wider audience and build credibility with consumers. or collaborators are typically chosen based on their audience\'s interests and alignment with the product’s target demographic.', 'Pending', '2024-12-21 10:15:40', '2024-12-21 10:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_size` enum('Small','Medium','Large') NOT NULL,
  `location` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `contact_info` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `industry_id`, `company_name`, `company_size`, `location`, `website`, `contact_info`) VALUES
(1, 1, 'FashionCo', 'Medium', 'London, UK', 'www.fashionco.com', 'info@fashionco.com'),
(2, 2, 'TechInnovators', 'Large', 'San Francisco, USA', 'www.techinnovators.com', 'contact@techinnovators.com'),
(3, 3, 'HealthCorp', 'Large', 'New York, USA', 'www.healthcorp.com', 'support@healthcorp.com'),
(4, 4, 'AdVantage Marketing', 'Small', 'Berlin, Germany', 'www.advantagemarketing.com', 'hello@advantagemarketing.com'),
(5, 5, 'EduWorld', 'Medium', 'Toronto, Canada', 'www.edu-world.com', 'info@edu-world.com'),
(6, 6, 'FinancePartners', 'Large', 'Sydney, Australia', 'www.financepartners.com', 'services@financepartners.com'),
(7, 7, 'EntertainHub', 'Large', 'Los Angeles, USA', 'www.entertainhub.com', 'support@entertainhub.com'),
(8, 8, 'Foodies Delight', 'Small', 'Paris, France', 'www.foodiesdelight.com', 'contact@foodiesdelight.com'),
(9, 9, 'RealEstatePlus', 'Medium', 'Dubai, UAE', 'www.realestateplus.com', 'info@realestateplus.com'),
(10, 10, 'AutoX', 'Large', 'Detroit, USA', 'www.autox.com', 'support@autox.com');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int(11) NOT NULL,
  `industry_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `industry_name`, `description`, `created_at`) VALUES
(1, 'Fashion', 'Industry related to apparel, accessories, and styling. Focused on the creation, marketing, and distribution of clothing and accessories.', '2024-12-13 08:03:00'),
(2, 'Technology', 'Industry focused on the development of software, hardware, IT services, and cutting-edge innovations in digital technology.', '2024-12-13 08:03:00'),
(3, 'Healthcare', 'Industry involving health services, pharmaceuticals, medical equipment, wellness products, and healthcare technologies.', '2024-12-13 08:03:00'),
(4, 'Marketing', 'Industry dealing with advertising, branding, market research, consumer insights, and promotion of goods and services.', '2024-12-13 08:03:00'),
(5, 'Education', 'Industry focused on teaching, learning, academic research, e-learning platforms, and educational technology.', '2024-12-13 08:03:00'),
(6, 'Finance', 'Industry related to financial services, including banking, investment, insurance, and financial planning.', '2024-12-13 08:03:00'),
(7, 'Entertainment', 'Industry involved in the production and distribution of media content, including television, film, music, and gaming.', '2024-12-13 08:03:00'),
(8, 'Food & Beverage', 'Industry that covers the production, distribution, and marketing of food and beverages, including restaurants, food services, and packaged goods.', '2024-12-13 08:03:00'),
(9, 'Real Estate', 'Industry that involves buying, selling, renting, and managing properties such as homes, commercial buildings, and land.', '2024-12-13 08:03:00'),
(10, 'Automotive', 'Industry focused on the manufacturing, sales, and marketing of vehicles, including cars, trucks, and related services.', '2024-12-13 08:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `influencer`
--

CREATE TABLE `influencer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `profile_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `influencer`
--

INSERT INTO `influencer` (`id`, `user_id`, `category_id`, `profile_img`) VALUES
(11, 10, 1, 'john.png'),
(12, 11, 2, 'jane.png'),
(13, 12, 3, 'alice.png'),
(14, 13, 1, 'bob.png'),
(15, 14, 2, 'charlie.png'),
(16, 15, 3, 'david.png'),
(17, 16, 1, 'emma.png'),
(18, 17, 2, 'frank.png'),
(19, 18, 3, 'grace.png'),
(20, 19, 1, 'henry.png');

-- --------------------------------------------------------

--
-- Table structure for table `influencer_request`
--

CREATE TABLE `influencer_request` (
  `id` int(11) NOT NULL,
  `requested_by` int(11) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `influencer_request`
--

INSERT INTO `influencer_request` (`id`, `requested_by`, `status`, `requested_at`) VALUES
(1, 11, 'Approved', '2024-12-13 11:56:12'),
(2, 12, 'Approved', '2024-12-13 11:56:12'),
(3, 13, 'Approved', '2024-12-13 11:57:37'),
(4, 14, 'Approved', '2024-12-13 11:57:37'),
(5, 15, 'Approved', '2024-12-13 11:57:37'),
(6, 16, 'Approved', '2024-12-13 11:57:37'),
(7, 17, 'Approved', '2024-12-13 11:57:37'),
(8, 18, 'Approved', '2024-12-13 11:57:37'),
(9, 19, 'Approved', '2024-12-13 11:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `influencer_social_link`
--

CREATE TABLE `influencer_social_link` (
  `id` int(11) NOT NULL,
  `influencer_id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `platform_link` varchar(255) NOT NULL,
  `total_followers` int(11) NOT NULL,
  `engagement_rate` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `influencer_social_link`
--

INSERT INTO `influencer_social_link` (`id`, `influencer_id`, `platform_id`, `platform_link`, `total_followers`, `engagement_rate`, `price`) VALUES
(55, 11, 1, 'https://www.instagram.com/johndoe', 500, 4, 1000.00),
(56, 11, 3, 'https://www.tiktok.com/@johndoe', 350, 4, 800.00),
(57, 11, 4, 'https://www.youtube.com/johndoe', 450, 5, 1200.00),
(58, 12, 1, 'https://www.instagram.com/janesmith', 30, 4, 800.00),
(59, 12, 4, 'https://www.youtube.com/janesmith', 60, 5, 1100.00),
(60, 13, 3, 'https://www.tiktok.com/@alicejohnson', 100, 5, 1500.00),
(61, 14, 1, 'https://www.instagram.com/bobwilliams', 250, 4, 900.00),
(62, 14, 3, 'https://www.tiktok.com/@bobwilliams', 220, 4, 850.00),
(63, 15, 4, 'https://www.youtube.com/charliebrown', 60, 4, 1200.00),
(64, 16, 1, 'https://www.instagram.com/daviddavis', 145, 5, 1100.00),
(65, 16, 3, 'https://www.tiktok.com/@daviddavis', 135, 4, 900.00),
(66, 16, 4, 'https://www.youtube.com/daviddavis', 150, 5, 1300.00),
(67, 17, 1, 'https://www.instagram.com/emmamiller', 235, 4, 1000.00),
(68, 18, 3, 'https://www.tiktok.com/@frankwilson', 220, 4, 850.00),
(69, 19, 4, 'https://www.youtube.com/gracemoore', 375, 5, 1300.00),
(70, 20, 1, 'https://www.instagram.com/henrytaylor', 180, 5, 1400.00),
(71, 20, 3, 'https://www.tiktok.com/@henrytaylor', 250, 4, 1000.00),
(72, 20, 4, 'https://www.youtube.com/henrytaylor', 360, 5, 1100.00);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `collab_id` int(11) NOT NULL,
  `payable_amount` decimal(10,2) NOT NULL,
  `status` enum('Pending','Paid','Unpaid') NOT NULL,
  `notes` text NOT NULL,
  `generated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `collab_id`, `payable_amount`, `status`, `notes`, `generated_at`) VALUES
(1, 11, 1000.00, 'Pending', 'Fashion campaign collaboration where influencer 11 featured the latest season collection of a well-known fashion brand. The campaign included styled photoshoots and promotional social media posts on Instagram and TikTok.', '2024-12-17 07:01:37'),
(2, 12, 70.00, 'Pending', 'A tech product promotion where influencer 12 reviewed and demonstrated the latest smartphone model. The influencer created an unboxing video and shared key features with their followers, engaging them through interactive Q&A sessions.', '2024-12-17 07:04:51'),
(3, 15, 55.00, 'Pending', 'Fitness apparel collaboration featuring influencer 15 who promoted a new line of gym wear through workout tutorials, product reviews, and personal style advice. The campaign also involved giveaways to increase audience engagement.', '2024-12-17 07:04:51'),
(4, 16, 210.00, 'Pending', 'Travel vlog sponsorship where influencer 16 traveled to exotic locations and shared their experiences using the travel gear provided by the brand. The content included scenic shots, reviews, and practical tips for fellow travelers.', '2024-12-17 07:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `payment_type` enum('Bank Transfer','UPI Transer','Cash') NOT NULL,
  `payment_status` enum('Paid','Failed','Pending') NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `paid_amount`, `payment_type`, `payment_status`, `payment_date`) VALUES
(1, 1, 1000.00, 'Bank Transfer', 'Pending', '2024-12-17 07:12:37'),
(2, 2, 70.00, 'UPI Transer', 'Paid', '2024-12-17 07:12:37'),
(3, 3, 55.00, 'UPI Transer', 'Failed', '2024-12-17 07:13:40'),
(4, 4, 210.00, 'Bank Transfer', 'Paid', '2024-12-17 07:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `social_platform`
--

CREATE TABLE `social_platform` (
  `id` int(11) NOT NULL,
  `platform_name` varchar(100) NOT NULL,
  `platform_image` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_platform`
--

INSERT INTO `social_platform` (`id`, `platform_name`, `platform_image`, `is_active`, `created_at`) VALUES
(1, 'Instagram', 'instagram.png', 1, '2024-12-13 08:17:51'),
(2, 'Facebook', 'facebook.png', 1, '2024-12-13 08:17:51'),
(3, 'TikTok', 'tik tok.png', 1, '2024-12-13 08:17:51'),
(4, 'YouTube', 'youtube.png', 1, '2024-12-13 08:17:51'),
(5, 'Dribble', 'dribble.png', 1, '2024-12-13 08:17:51'),
(6, 'Behance', 'behance.png', 1, '2024-12-13 08:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role_type` enum('Admin','Manager','Influencer') NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `firstname`, `lastname`, `email`, `phone`, `role_type`, `is_active`, `password`, `joined_at`) VALUES
(1, NULL, 'John', 'Doe', 'john@gmail.com', '+44 1234 567890', 'Admin', 1, '6d40e095b7f43848dc76ec017592da29', '2024-12-13 08:13:28'),
(2, 1, 'Mark', 'Taylor', 'mark@fashionco.com', '+1 415 123 4567', 'Manager', 1, 'd1af90699f2a2c983e6ccb7bee874414', '2024-12-13 08:13:28'),
(3, 2, 'Emily', 'Johnson', 'emily@techinnovators.com', '+1 212 555 3210', 'Manager', 1, 'f6244d2fc24ec05bedfbf7a84a42ddd4', '2024-12-13 08:13:28'),
(4, 3, 'Robert', 'Williams', 'robert@healthcorp.com', '+49 30 1234 567', 'Manager', 1, '240003dc038438ae84f3fccc9590706c', '2024-12-13 08:13:28'),
(5, 4, 'Alice', 'Brown', 'alice@advantagemarketing.com', '+44 20 8765 432', 'Manager', 1, 'f5f75389bdbeddbbd70ac31c0245e42e', '2024-12-13 08:13:28'),
(6, 5, 'David', 'Green', 'david@edu-world.com', '+1 303 123 9876', 'Manager', 1, '889211b122daa7f9f917d3d3b3475514', '2024-12-13 08:13:28'),
(7, 6, 'Lisa', 'White', 'lisa@financepartners.com', '+61 2 9876 5432', 'Manager', 1, 'd19ca074a2e3299523a8b48aebc4302c', '2024-12-13 08:13:28'),
(8, 7, 'Tom', 'Davis', 'tom@entertainhub.com', '+1 818 123 4567', 'Manager', 1, 'bb80efcb094d70a1ea9b4ae485cff239', '2024-12-13 08:13:28'),
(9, 8, 'Sophie', 'Wilson', 'sophie@foodiesdelight.com', '+33 1 2345 6789', 'Manager', 1, '1b25e0e941410d7dd3c78a3dc928ec09', '2024-12-13 08:13:28'),
(10, NULL, 'John', 'Doe', 'john@gmail.com', '1234567890', 'Influencer', 1, '6d40e095b7f43848dc76ec017592da29', '2024-12-13 08:26:25'),
(11, NULL, 'Jane', 'Smith', 'jane@gmail.com', '1234567891', 'Influencer', 1, '9a9c279fce6b663276ae2445b9c2790f', '2024-12-13 08:26:25'),
(12, NULL, 'Alice', 'Johnson', 'alice@gmail.com', '1234567892', 'Influencer', 1, 'f5f75389bdbeddbbd70ac31c0245e42e', '2024-12-13 08:26:25'),
(13, NULL, 'Bob', 'Williams', 'bob@gmail.com', '1234567893', 'Influencer', 1, '7bcb1497bb2b1d2063d1daa3eade2252', '2024-12-13 08:26:25'),
(14, NULL, 'Charlie', 'Brown', 'charlie@gmail.com', '1234567894', 'Influencer', 1, '8356bb5e149ea7cd1be235dbec39e562', '2024-12-13 08:26:25'),
(15, NULL, 'David', 'Davis', 'david@gmail.com', '1234567895', 'Influencer', 1, '889211b122daa7f9f917d3d3b3475514', '2024-12-13 08:26:25'),
(16, NULL, 'Emma', 'Miller', 'emma@gmail.com', '1234567896', 'Influencer', 1, '67fe823a7ba5fabf05ddafd5986c3377', '2024-12-13 08:26:25'),
(17, NULL, 'Frank', 'Wilson', 'frank@gmail.com', '1234567897', 'Influencer', 1, '7b747e1be2f9f67f66b67d8867084dcb', '2024-12-13 08:26:25'),
(18, NULL, 'Grace', 'Moore', 'grace@gmail.com', '1234567898', 'Influencer', 1, 'd184180aff025d9ba8e03551b35a3567', '2024-12-13 08:26:25'),
(19, NULL, 'Henry', 'Taylor', 'henry@gmail.com', '1234567899', 'Influencer', 1, 'dce28b80dfad7c6d4138e34e43c85c6a', '2024-12-13 08:26:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collaboration_requests`
--
ALTER TABLE `collaboration_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk6` (`influencer_id`),
  ADD KEY `fk7` (`user_id`),
  ADD KEY `fk12` (`platform_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`industry_id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `influencer`
--
ALTER TABLE `influencer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk2` (`user_id`),
  ADD KEY `fk3` (`category_id`);

--
-- Indexes for table `influencer_request`
--
ALTER TABLE `influencer_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk8` (`requested_by`);

--
-- Indexes for table `influencer_social_link`
--
ALTER TABLE `influencer_social_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk4` (`influencer_id`),
  ADD KEY `fk5` (`platform_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk9` (`collab_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk10` (`invoice_id`);

--
-- Indexes for table `social_platform`
--
ALTER TABLE `social_platform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `collaboration_requests`
--
ALTER TABLE `collaboration_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `influencer`
--
ALTER TABLE `influencer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `influencer_request`
--
ALTER TABLE `influencer_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `influencer_social_link`
--
ALTER TABLE `influencer_social_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_platform`
--
ALTER TABLE `social_platform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collaboration_requests`
--
ALTER TABLE `collaboration_requests`
  ADD CONSTRAINT `fk12` FOREIGN KEY (`platform_id`) REFERENCES `social_platform` (`id`),
  ADD CONSTRAINT `fk6` FOREIGN KEY (`influencer_id`) REFERENCES `influencer` (`id`),
  ADD CONSTRAINT `fk7` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`);

--
-- Constraints for table `influencer`
--
ALTER TABLE `influencer`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `influencer_request`
--
ALTER TABLE `influencer_request`
  ADD CONSTRAINT `fk8` FOREIGN KEY (`requested_by`) REFERENCES `influencer` (`id`);

--
-- Constraints for table `influencer_social_link`
--
ALTER TABLE `influencer_social_link`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`influencer_id`) REFERENCES `influencer` (`id`),
  ADD CONSTRAINT `fk5` FOREIGN KEY (`platform_id`) REFERENCES `social_platform` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk9` FOREIGN KEY (`collab_id`) REFERENCES `collaboration_requests` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk10` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
