-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 12:03 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple-rbac3`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1598175511),
('Author', '3', 1598175511),
('Management', '2', 1598175511);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Admin', 1, 'สำหรับการดูแลระบบ', NULL, NULL, 1598175511, 1598175511),
('Author', 1, 'สำหรับการเขียนบทความ', NULL, NULL, 1598175511, 1598175511),
('Management', 1, 'สำหรับจัดการข้อมูลผู้ใช้งานและบทความ', NULL, NULL, 1598175511, 1598175511),
('ManageUser', 1, 'สำหรับจัดการข้อมูลผู้ใช้งาน', NULL, NULL, 1598175511, 1598175511);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', 'Management'),
('Management', 'Author'),
('Management', 'ManageUser');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) DEFAULT NULL COMMENT 'ชื่อเรื่อง',
  `detail` varchar(255) DEFAULT NULL COMMENT 'รายละเอียด',
  `tag` varchar(15) DEFAULT NULL COMMENT 'แท็ก',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `topic`, `detail`, `tag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 'a11111', '1111111111111', '11111111111', 2147483647, 2147483647, 2147483647, 2147483647),
(7, '111111', '1111111111111', '111111111111111', 1111111111, 1, 1111111111, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_german2_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1598170412),
('m130524_201442_init', 1598170413),
('m140506_102106_rbac_init', 1598173936),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1598173936),
('m180523_151638_rbac_updates_indexes_without_prefix', 1598173936),
('m190124_110200_add_verification_token_column_to_user_table', 1598170413),
('m200409_110543_rbac_update_mssql_trigger', 1598173936);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `role`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'user-a', 30, 'd5tD9L5VikMMT1jltBi1mQauTp_HS5k-', '$2y$13$5aOHg4BL2KXrDwu7OOqhAuiq8Ng8OvcM3y17ozv7Lzn6nSgdhsxlW', NULL, 'user-a@gmail.com', 10, 1598170934, 1598170934, 'bWDVFLfmldL_lYrPDp2FxBAh6pNsk_ob_1598170934'),
(2, 'user-b', 20, 'j_ItjjQfEMqV0ncP_y9YuE5jo1TMCmTP', '$2y$13$FR7UhLjEGWwC2OyI0k52C.8f9mKOeCMImJwO89cU.Sn/sM5bMQooa', NULL, 'user-b@gmail.com', 10, 1598170949, 1598170949, 'sR8AsUc4zgLpM8zFlKtwIigNaYmHs7YF_1598170949'),
(3, 'user-c', 10, 'gUN-N8eoeIPDlU5RXjX2w9I_r7kwlrzn', '$2y$13$EBSZ9yTrp4lGSSW3FhCfauhqirC2O22T99isrFKMqmfRsHkrAglVC', NULL, 'user-c@gmail.com', 10, 1598170961, 1598170961, 'A9UkroKF-IJfqim6mB_V8HHFRAxi_w-e_1598170961'),
(4, 'user-d', 10, 'U8S2QZilXstUy3n0P_rDYc2QhROUd0PO', '$2y$13$URAFzSo/8OmzUddEKGJxDeDbMfMAkl4N.yq2eJoTuSfmc2/dW7tvu', NULL, 'user-d@gmail.com', 10, 1598171310, 1598171310, NULL),
(5, 'user-e', 10, 'gFN6IxthdaaKpRMrS4-ZcbgL-7tdI4CC', '$2y$13$GyyoM9LyTnFjA3BuELNMEeJ/klvGXCiIcHbfx61UYDOPVnNkfYhBq', NULL, 'user-e@gmail.com', 9, 1598171750, 1598171750, NULL),
(6, 'user-f', 10, 'OTmmFUJxg3HbLdo1tO2m5uX7kJNN7hQf', '$2y$13$MFt7UU/M1jtXvvEpLZnUSOWBnf5k7ONUGIHbWyvL7hunrglREVXgO', NULL, 'user-f@gmail.com', 9, 1598172932, 1598172932, NULL),
(7, 'user-g', 10, 'FIWb_lndoluAf8ilzGGPfgaD_M787472', '$2y$13$RLAVFZ0EAS95VsJLVR0Nv.WogU5aRUJn/pn/S12gmRYE38/lj46ga', NULL, 'user-g@gmail.com', 9, 1598175670, 1598175670, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
