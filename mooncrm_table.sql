-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2019 at 12:54 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `isFinance` tinyint(1) NOT NULL,
  `isSales` tinyint(1) NOT NULL,
  `isMarketing` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_id`, `title`, `description`, `isFinance`, `isSales`, `isMarketing`, `date_created`) VALUES
(1, 'Sales target', 'Displays the current weeks sales position and compares them to last week\'s position', 0, 0, 0, '2019-05-21 14:31:54'),
(2, 'Weekly Sales', 'Sales made for the week', 0, 1, 0, '2019-05-28 09:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `postcode`, `state`, `country`, `active`, `date_created`) VALUES
(2, 'Kyle', 'Mercer', 'K_Mercer@hotmail.com', '(1800) 6674 549', '481 Bridge Avenue', 'Lake Charles', '70601', 'LA', 'United States', 1, '2019-05-28 20:23:18'),
(3, 'Mollie', 'Fisk', 'pink_rock@yahoo.com', '220 - 9977862', '88 Jane Bell Lane', 'Melbourne', '3000', 'VIC', 'Australia', 1, '2019-05-28 20:23:18'),
(4, 'Raphael', 'Burrey', 'raphael81@hotmail.com', '(617) 780-2729', '1229 Hillcrest Lane', 'Irvine', '92714', 'CA', 'United States', 1, '2019-05-28 20:23:18'),
(5, 'Ava', 'Fusaro', 'AF_W@gmail.com', '(517) 652-6266', '16 Wagga Road', 'Yathella', '2650', 'NSW', 'Australia', 1, '2019-05-28 20:23:18'),
(6, 'Laurence', 'Galantino', 'potato_is_life@gmail.com', '(201) 3268-5131', '83 Taylor Street', 'Invergordon South', '3634', 'VIC', 'Australia', 1, '2019-05-28 20:23:18'),
(7, 'Mike', 'Zanger', 'Mzanger@hotmail.com', '(893) 642-9985', '70 Armstrong Street', 'Macorna North', '3568', 'VIC', 'Australia', 1, '2019-05-28 20:23:18'),
(8, 'Eleanor', 'Kovaks', 'Elly_Kovaks@hotmail.com', '469 585 7125', '86 Ross Street', 'Numinbah Valley', '4211', 'QLD', 'Australia', 1, '2019-05-28 20:23:18'),
(9, 'Liam', 'Talbott', 'abigbutt@gmail.com', '63 7878 2634', '2258 Cherry Ridge Drive', 'New Orleans', '70166', 'LA', 'United States', 1, '2019-05-28 20:23:18'),
(10, 'Melissa', 'Grefter', 'Melly_G@gmail.com', '(957) 344-1738', '22 Barker Street', 'Tenterden', '6322', 'WA', 'Australia', 1, '2019-05-28 20:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(11) NOT NULL,
  `purchase_order_no` varchar(255) NOT NULL,
  `total_price` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `date_created`, `customer_id`, `purchase_order_no`, `total_price`, `status`, `remarks`) VALUES
(1, '2019-05-27 18:48:14', 3, 'LI234', 340, 'Delivered', 'Deliver after 15:00.'),
(2, '0000-00-00 00:00:00', 4, 'BLAZEIT420', 360, 'Shipped', 'Needs Signature'),
(3, '0000-00-00 00:00:00', 2, 'LEET420', 765, 'delivered', 'Plain Packaging Only'),
(4, '0000-00-00 00:00:00', 6, 'PO_122345345', 1280, 'delivered', 'Fragile'),
(5, '0000-00-00 00:00:00', 6, 'PO_122345345', 765, 'Shipped', 'Hates Ducks'),
(6, '0000-00-00 00:00:00', 7, 'LEET421', 360, 'Processing', 'Beware of Dog'),
(7, '2019-05-28 20:41:52', 4, 'BLAZEIT420', 360, 'Shipped', 'Needs Signature'),
(8, '2019-05-28 20:41:52', 2, 'LEET420', 765, 'delivered', 'Plain Packaging Only'),
(9, '2019-05-28 20:41:52', 6, 'PO_122345345', 1280, 'delivered', 'Fragile'),
(10, '2019-05-28 20:41:52', 6, 'PO_122345345', 765, 'Shipped', 'Hates Ducks'),
(11, '2019-05-28 20:41:52', 7, 'LEET421', 360, 'Processing', 'Beware of Dog');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_no` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` float NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_no`, `quantity`, `discount`, `price`) VALUES
(1, 'MC_00046', 4, 10, 100),
(1, 'MC_00047', 6, 15, 150),
(1, 'MC_00048', 8, 20, 200),
(1, 'MC_00049', 10, 25, 250),
(1, 'MC_00050', 12, 30, 300),
(2, 'MC_00046', 4, 10, 100),
(2, 'MC_00047', 6, 15, 150),
(2, 'MC_00048', 8, 20, 200),
(2, 'MC_00049', 10, 25, 250),
(2, 'MC_00050', 12, 30, 300);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_no` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `UoM` varchar(255) NOT NULL,
  `unit_price` float NOT NULL,
  `warehouse_location` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_no`, `product_name`, `UoM`, `unit_price`, `warehouse_location`, `date_created`) VALUES
('MC_00001', 'Weigh Scale', 'ea', 56.99, '1', '2019-05-28 20:27:27'),
('MC_00002', 'Frosted Mug', 'ea', 7.5, '2', '2019-05-28 20:28:31'),
('MC_00003', 'Chandelier', 'ea', 469, '3', '2019-05-28 20:28:31'),
('MC_00004', 'Watch', 'ea', 128.98, '4', '2019-05-28 20:28:31'),
('MC_00005', 'Lamp', 'ea', 50, '3', '2019-05-28 20:28:31'),
('MC_00006', 'Fan', 'ea', 79, '2', '2019-05-28 20:28:31'),
('MC_00007', 'Carton Box', 'ea', 19.99, '1', '2019-05-28 20:28:31'),
('MC_00008', 'Rubber Duck', 'ea', 3.99, '1', '2019-05-28 20:28:31'),
('MC_00009', 'Wool', 'pound', 2, '2', '2019-05-28 20:28:31'),
('MC_00010', 'Paint Brush', 'ea', 12.99, '3', '2019-05-28 20:28:31'),
('MC_00011', 'Pressure Gauge', 'ea', 35.65, '4', '2019-05-28 20:28:31'),
('MC_00012', 'Microphone', 'ea', 89.98, '3', '2019-05-28 20:28:31'),
('MC_00013', 'Umbrella', 'ea', 25, '2', '2019-05-28 20:28:31'),
('MC_00014', 'Mooncake Plushie', 'ea', 70, '1', '2019-05-28 20:28:31'),
('MC_00015', 'Ukelele', 'ea', 69.99, '1', '2019-05-28 20:28:31'),
('MC_00017', 'Alarm Clock', 'ea', 22.5, '2', '2019-05-28 20:28:31'),
('MC_00018', 'Sports Shoes', 'pair', 120.59, '3', '2019-05-28 20:28:31'),
('MC_00019', 'High Heel', 'pair', 150.49, '4', '2019-05-28 20:28:31'),
('MC_00020', 'Toy Car', 'ea', 30.65, '3', '2019-05-28 20:28:31'),
('MC_00021', 'Solar Panel', 'ea', 269, '2', '2019-05-28 20:28:31'),
('MC_00022', 'Keyboard', 'ea', 121.01, '1', '2019-05-28 20:28:31'),
('MC_00023', 'Laptop', 'ea', 1496, '1', '2019-05-28 20:28:31'),
('MC_00024', 'Telescope', 'ea', 129, '2', '2019-05-28 20:28:31'),
('MC_00025', 'Towel', 'ea', 37, '3', '2019-05-28 20:28:31'),
('MC_00026', 'Outdoor Tent', 'ea', 86.5, '4', '2019-05-28 20:28:31'),
('MC_00027', 'Office Table', 'ea', 450.5, '3', '2019-05-28 20:28:31'),
('MC_00028', 'Hydrant', 'ea', 250, '2', '2019-05-28 20:28:31'),
('MC_00029', 'Piano', 'ea', 1249, '1', '2019-05-28 20:28:31'),
('MC_00030', 'Violin', 'ea', 999, '1', '2019-05-28 20:28:31'),
('MC_00031', 'Drums', 'set', 159, '2', '2019-05-28 20:28:31'),
('MC_00032', 'XBOX 420', 'ea', 500.69, '3', '2019-05-28 20:28:31'),
('MC_00033', 'Medicinal Cannabis', 'gram', 47.74, '4', '2019-05-28 20:28:31'),
('MC_00034', 'Tape Measure', 'ea', 5.9, '3', '2019-05-28 20:28:31'),
('MC_00035', 'Pillow', 'ea', 79.99, '2', '2019-05-28 20:28:31'),
('MC_00036', 'Retro Phonograph', 'ea', 250, '1', '2019-05-28 20:28:31'),
('MC_00037', 'Tea Cup', 'ea', 7.99, '1', '2019-05-28 20:28:31'),
('MC_00038', 'Tea Pots', 'ea', 19.99, '2', '2019-05-28 20:28:31'),
('MC_00039', '99 Red Baloons', 'pack', 6.67, '3', '2019-05-28 20:28:31'),
('MC_00040', 'Marbles', 'pack', 24.95, '4', '2019-05-28 20:28:31'),
('MC_00041', 'Headphone', 'ea', 126, '3', '2019-05-28 20:28:31'),
('MC_00042', 'Axe', 'ea', 179.45, '2', '2019-05-28 20:28:31'),
('MC_00043', 'Sunglasses', 'ea', 45.5, '1', '2019-05-28 20:28:31'),
('MC_00044', 'Headset', 'ea', 135, '1', '2019-05-28 20:28:31'),
('MC_00045', 'Computer Central Processor Unit', 'ea', 418.99, '2', '2019-05-28 20:28:31'),
('MC_00046', 'Graphics Processing Unit', 'ea', 469, '3', '2019-05-28 20:28:31'),
('MC_00047', 'Batteries', 'pack', 15, '4', '2019-05-28 20:28:31'),
('MC_00048', 'Little Spoon', 'ea', 2.99, '3', '2019-05-28 20:28:31'),
('MC_00049', 'Wooden Bowl', 'ea', 6.99, '2', '2019-05-28 20:28:31'),
('MC_00050', 'Baby Carriage', 'ea', 469, '1', '2019-05-28 20:28:31'),
('MC_00051', 'Typewriter', 'ea', 75.98, '2', '2019-05-28 20:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `priority` tinyint(1) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `is_new` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_description`, `due_date`, `assigned_to`, `priority`, `status`, `date_created`, `is_new`) VALUES
(1, 'Sales meeting powerpoint', 'Create the  quarterly sales power point presentation for upper management on Monday', '2019-05-28', 'Dan', 1, 'Active', '2019-05-20 00:00:00', 1),
(2, 'Snacks', 'Bring Chips & Dips', '0000-00-00', 'Dennis', 2, 'Done', '2019-05-28 20:31:59', 1),
(3, 'Report on Sales', 'Last months sales 1/07/2020', '0000-00-00', 'Dennis', 4, 'Pending', '2019-05-28 20:31:59', 1),
(4, 'Check up Tech Team', 'Server 2 seems to be down', '0000-00-00', 'Dennis', 5, 'Pending', '2019-05-28 20:31:59', 1),
(5, 'Group Meeting', 'Update on 3.5 Sales', '0000-00-00', 'Dennis', 3, 'Active', '2019-05-28 20:31:59', 1),
(6, 'Make potato salad', 'Future me will be hungry. Make more potato salad', '0000-00-00', 'Dennis', 1, 'Cancelled', '2019-05-28 20:31:59', 1),
(7, 'Snacks', 'Bring Chips & Dips', '2020-04-01', 'Dennis', 2, 'Done', '2019-05-28 20:34:12', 1),
(8, 'Report on Sales', 'Last months sales 1/07/2020', '2020-04-16', 'Dennis', 4, 'Pending', '2019-05-28 20:34:12', 1),
(9, 'Check up Tech Team', 'Server 2 seems to be down', '2020-04-24', 'Dennis', 5, 'Pending', '2019-05-28 20:34:12', 1),
(10, 'Group Meeting', 'Update on 3.5 Sales', '2020-05-06', 'Dennis', 3, 'Active', '2019-05-28 20:34:12', 1),
(11, 'Make potato salad', 'Future me will be hungry. Make more potato salad', '2020-05-12', 'Dennis', 1, 'Cancelled', '2019-05-28 20:34:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Host` char(60) COLLATE utf8_bin NOT NULL DEFAULT '',
  `User` char(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `Password` char(41) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `Select_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Insert_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Update_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Delete_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Drop_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Reload_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Shutdown_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Process_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `File_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Grant_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `References_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Index_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Alter_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Show_db_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Super_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_tmp_table_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Lock_tables_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Execute_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Repl_slave_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Repl_client_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_view_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Show_view_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_routine_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Alter_routine_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_user_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Event_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Trigger_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `Create_tablespace_priv` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `ssl_type` enum('','ANY','X509','SPECIFIED') CHARACTER SET utf8 NOT NULL DEFAULT '',
  `ssl_cipher` blob NOT NULL,
  `x509_issuer` blob NOT NULL,
  `x509_subject` blob NOT NULL,
  `max_questions` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `max_updates` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `max_connections` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `max_user_connections` int(11) NOT NULL DEFAULT '0',
  `plugin` char(64) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `authentication_string` text COLLATE utf8_bin NOT NULL,
  `password_expired` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `is_role` enum('N','Y') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `default_role` char(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `max_statement_time` decimal(12,6) NOT NULL DEFAULT '0.000000'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and global privileges';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Host`, `User`, `Password`, `Select_priv`, `Insert_priv`, `Update_priv`, `Delete_priv`, `Create_priv`, `Drop_priv`, `Reload_priv`, `Shutdown_priv`, `Process_priv`, `File_priv`, `Grant_priv`, `References_priv`, `Index_priv`, `Alter_priv`, `Show_db_priv`, `Super_priv`, `Create_tmp_table_priv`, `Lock_tables_priv`, `Execute_priv`, `Repl_slave_priv`, `Repl_client_priv`, `Create_view_priv`, `Show_view_priv`, `Create_routine_priv`, `Alter_routine_priv`, `Create_user_priv`, `Event_priv`, `Trigger_priv`, `Create_tablespace_priv`, `ssl_type`, `ssl_cipher`, `x509_issuer`, `x509_subject`, `max_questions`, `max_updates`, `max_connections`, `max_user_connections`, `plugin`, `authentication_string`, `password_expired`, `is_role`, `default_role`, `max_statement_time`) VALUES
('localhost', 'root', '', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', '', '', '', '', 0, 0, 0, 0, '', '', 'N', 'N', '', '0.000000'),
('127.0.0.1', 'root', '', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', '', '', '', '', 0, 0, 0, 0, '', '', 'N', 'N', '', '0.000000'),
('::1', 'root', '', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', '', '', '', '', 0, 0, 0, 0, '', '', 'N', 'N', '', '0.000000'),
('localhost', '', '', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', '', '', '', '', 0, 0, 0, 0, '', '', 'N', 'N', '', '0.000000'),
('localhost', 'pma', '', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', '', '', '', '', 0, 0, 0, 0, '', '', 'N', 'N', '', '0.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'daniel', '$2y$10$bjTBjJxBfkAiiQD1E.JH6eOq.HaDhTRWRnCspAAjEpXlQJVu.QDPm', '2019-05-27 18:48:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`product_no`),
  ADD KEY `product_no` (`product_no`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `product_no` (`product_no`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD UNIQUE KEY `task_id` (`task_id`),
  ADD UNIQUE KEY `task_id_2` (`task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Host`,`User`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_no`) REFERENCES `product` (`product_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
