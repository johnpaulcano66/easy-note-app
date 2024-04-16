-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 10:52 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notes`
--

CREATE TABLE `tbl_notes` (
  `n_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `n_title` varchar(50) NOT NULL,
  `n_content` mediumtext NOT NULL,
  `n_date` date NOT NULL,
  `favorite` tinyint(1) DEFAULT 0,
  `archived` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_notes`
--

INSERT INTO `tbl_notes` (`n_id`, `id`, `n_title`, `n_content`, `n_date`, `favorite`, `archived`) VALUES
(44, 5, 'dsfdsfdsf', 'sdfsd', '2024-04-05', 1, 0),
(56, 5, 'dsadsa', 'dsadas', '2024-04-05', 1, 0),
(59, 4, 'Holiday', 'Holiday is a day full of happiness as we rest our selves from school and work.', '2024-04-06', 0, 1),
(61, 4, 'Getting Started with Kubernetes', 'Getting Started with Kubernetes\r\nJune 2, 2020 in Development, howto\r\nIn this document, we will be learning about the basic components of kubernetes and how to create them. Prerequisites We need a hypervisor - install VirtualBox https://www.virtualbox.org/wiki/Downloads This is something that we need inorder to run the nodes for our Kubernetes cluster, they can also be run on bare-metal, but since we will be running the nodes on our laptop, we will be running them on VMs. Install kubectl k8s command line tool From: https://kubernetes.', '2024-04-14', 0, 0),
(62, 4, 'PE CLASS', 'Bring ball ballpen note book paper bag net basketball shoes and more more more more more', '2024-04-14', 0, 1),
(63, 4, 'Klase na ugma', 'I hope we will going to pass the exam!', '2024-04-14', 1, 0),
(64, 4, 'Love', 'Love is an open door!!', '2024-04-14', 1, 0),
(65, 4, 'MS209', 'Sir Fil Sir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir FilSir Fil', '2024-04-15', 0, 1),
(66, 60, 'PE', 'pepepepepepepepepepepepepepepe', '2024-04-16', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `imgpath` varchar(255) NOT NULL DEFAULT 'uploads/user1.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `imgpath`) VALUES
(4, 'peter4', 'peter62@gmail.com', '0192023a7bbd73250516f069df18b500', 'uploads/SHESH-peter3-661e2509a52204.46492966_ardon.jpg'),
(5, 'axa', 'axa@gmail.com', '0192023a7bbd73250516f069df18b500', 'uploads/SHESH-axa-66100c334070a4.48311853_apollo.png'),
(55, 'lenron', 'lenron@gmail.com', '0192023a7bbd73250516f069df18b500', ''),
(56, '   asd', 'john@gmail.com', '0192023a7bbd73250516f069df18b500', ''),
(57, 'test', 'test@gmail.com', '4acb4bc224acbbe3c2bfdcaa39a4324e', ''),
(58, 'peter123', 'pedro@gmail.com', '0192023a7bbd73250516f069df18b500', ''),
(59, 'rexy', 'rexy@gmail.com', '0192023a7bbd73250516f069df18b500', ''),
(60, 'mike', 'mike@gmail.com', '0192023a7bbd73250516f069df18b500', 'uploads/SHESH-mike-661e3ac3297239.06914121_Picsart_24-01-19_00-28-33-749.png');

--
-- Triggers `user_form`
--
DELIMITER $$
CREATE TRIGGER `update_user_name_trigger` AFTER UPDATE ON `user_form` FOR EACH ROW BEGIN
    IF NEW.name <> OLD.name THEN
        SET @new_user_name = NEW.name;
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD PRIMARY KEY (`n_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD CONSTRAINT `tbl_notes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
