-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 08:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0 COMMENT '0 if menu is root level or menuid if this is child on any menu',
  `link` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 for disabled menu or 1 for enabled menu'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `parent_id`, `link`, `status`) VALUES
(1, 'Home', 0, '#home', '1'),
(2, ' Data Entry', 0, '#web-dev', '1'),
(3, 'Updation', 0, '#wp-dev', '1'),
(4, 'Report', 0, '#w3school-info', '1'),
(5, 'Master Data Entry ', 2, '#', '1'),
(8, 'Master Data Entry', 5, '#electic-ip', '0'),
(9, 'Load balacing', 5, '#load-balancing', '0'),
(10, 'Cluster Indexes', 5, '#cluster-indexes', '0'),
(11, 'Rds Db setup', 5, '#rds-db', '0'),
(12, 'Framework Development', 6, '#', '1'),
(13, 'Ecommerce Development', 6, '#', '1'),
(14, 'Cms Development', 6, '#', '1'),
(21, 'News & Media', 6, '#', '1'),
(22, 'Codeigniter', 12, '#codeigniter', '1'),
(23, 'Cake', 12, '#cake-dev', '1'),
(24, 'Opencart', 13, '#opencart', '1'),
(25, 'Magento', 13, '#magento', '1'),
(26, 'Wordpress', 14, '#wordpress-dev', '1'),
(27, 'Joomla', 14, '#joomla-dev', '1'),
(28, 'Drupal', 14, '#drupal-dev', '1'),
(29, 'Ajax', 7, '#ajax-dev', '1'),
(30, 'Jquery', 7, '#jquery-dev', '1'),
(31, 'Logout', 0, '#theme-dev', '1'),
(38, 'Item Entry Form', 2, 'itemEntryForm.php', '1'),
(39, 'inventoryEntry', 5, 'inventoryEntry.php', '1'),
(40, 'Employee Entry Form', 38, 'employeedetails.php', '1'),
(41, 'BranchEntry', 5, 'branchEntry.php', '1'),
(42, 'Count Report', 4, 'CountReport.php', '1'),
(43, 'MultiQueryReport', 4, 'MultiqueryReport.php', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
