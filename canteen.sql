--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(21, 'bevarage'),
(22, 'other'),
(23, 'Lunch RIice'),
(24, 'Kothu me');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaintid` int(11) NOT NULL,
  `titile` varchar(100) NOT NULL,
  `customerid` int(11) NOT NULL,
  `complaints` varchar(100) NOT NULL,
  `sentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statusmsg` varchar(30) NOT NULL DEFAULT 'Not Read'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaintid`, `titile`, `customerid`, `complaints`, `sentdate`, `statusmsg`) VALUES
(3, 'Title', 37, 'Message in details', '2021-04-20 07:48:38', 'Read'),
(4, 'sadsadasdasd', 38, 'adadad', '2021-04-23 14:17:46', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `walletbalacne` varchar(10) NOT NULL DEFAULT '0',
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `Name`, `address`, `contact`, `email`, `password`, `walletbalacne`, `status`) VALUES
(37, 'aroos', 'puttalsam', '0785584747', 'Myhana@gmail.com', '93b450561ff9ac7aa76cb459c76b303e', '75000', 'Active'),
(38, 'afraj', 'puttalam', '0752251414', 'afraj@gmail.com', '130e25724612a424cd9862fcbe7b40ef', '44000', 'Active'),
(39, 'AroosAh', 'address', '0752251478', 'AroosAh@gmail.com', 'd56109463ad111b1484e113bd7effe0b', '0', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`log_id`, `user_id`, `action`, `date`) VALUES
(40, 6, 'added sd of panatol', '2019-12-18 16:01:33'),
(41, 6, 'added 50 of pani', '2019-12-18 16:10:48'),
(42, 6, 'has logged out the system at ', '2019-12-18 20:03:17'),
(43, 1, 'has logged in the system at ', '2019-12-18 20:11:21'),
(44, 1, 'has logged out the system at ', '2019-12-18 20:12:31'),
(45, 1, 'has logged in the system at ', '2019-12-18 20:14:38'),
(46, 1, 'has logged out the system at ', '2019-12-18 20:16:49'),
(47, 1, 'has logged in the system at ', '2019-12-18 20:18:40'),
(48, 1, 'has logged out the system at ', '2019-12-18 20:18:45'),
(49, 9, 'has logged in the system at ', '2019-12-18 20:20:06'),
(50, 9, 'has logged out the system at ', '2019-12-18 20:21:24'),
(51, 1, 'has logged in the system at ', '2019-12-18 20:21:29'),
(52, 1, 'has logged out the system at ', '2019-12-18 20:21:46'),
(53, 1, 'has logged in the system at ', '2019-12-18 20:31:30'),
(54, 1, 'has logged out the system at ', '2019-12-18 20:31:34'),
(55, 1, 'has logged in the system at ', '2019-12-18 20:31:37'),
(56, 1, 'has logged out the system at ', '2019-12-18 20:31:47'),
(57, 1, 'has logged in the system at ', '2019-12-18 20:32:20'),
(58, 1, 'has logged out the system at ', '2019-12-18 20:32:21'),
(59, 1, 'has logged in the system at ', '2019-12-18 20:32:32'),
(60, 1, 'has logged out the system at ', '2019-12-18 20:32:34'),
(61, 1, 'has logged in the system at ', '2019-12-18 20:32:58'),
(62, 1, 'has logged out the system at ', '2019-12-18 20:32:59'),
(63, 1, 'has logged in the system at ', '2019-12-18 20:33:02'),
(64, 1, 'has logged out the system at ', '2019-12-18 20:33:03'),
(65, 1, 'has logged in the system at ', '2019-12-18 20:33:27'),
(66, 1, 'has logged out the system at ', '2019-12-18 20:33:29'),
(67, 1, 'has logged in the system at ', '2019-12-18 20:33:30'),
(68, 1, 'has logged out the system at ', '2019-12-18 20:33:56'),
(69, 1, 'has logged in the system at ', '2019-12-18 20:33:57'),
(70, 1, 'has logged out the system at ', '2019-12-18 20:34:23'),
(71, 1, 'has logged in the system at ', '2019-12-18 20:34:25'),
(72, 1, 'has logged out the system at ', '2019-12-18 20:34:27'),
(73, 1, 'has logged in the system at ', '2019-12-18 20:34:29'),
(74, 1, 'has logged out the system at ', '2019-12-18 20:34:30'),
(75, 1, 'has logged in the system at ', '2019-12-18 20:34:32'),
(76, 1, 'has logged out the system at ', '2019-12-18 20:34:39'),
(77, 1, 'has logged in the system at ', '2019-12-18 20:34:41'),
(78, 1, 'has logged in the system at ', '2019-12-18 20:35:09'),
(79, 1, 'has logged out the system at ', '2019-12-18 20:35:12'),
(80, 1, 'has logged in the system at ', '2019-12-18 20:35:13'),
(81, 1, 'has logged out the system at ', '2019-12-18 20:35:46'),
(82, 1, 'has logged in the system at ', '2019-12-18 20:35:47'),
(83, 1, 'has logged out the system at ', '2019-12-18 20:36:09'),
(84, 1, 'has logged in the system at ', '2019-12-18 20:36:40'),
(85, 1, 'has logged out the system at ', '2019-12-18 20:39:55'),
(86, 1, 'has logged in the system at ', '2019-12-18 20:39:57'),
(87, 1, 'has logged out the system at ', '2019-12-18 20:40:09'),
(88, 1, 'has logged in the system at ', '2019-12-18 20:40:10'),
(89, 1, 'has logged out the system at ', '2019-12-18 20:40:15'),
(90, 1, 'has logged in the system at ', '2019-12-18 20:41:21'),
(91, 1, 'has logged out the system at ', '2019-12-18 20:41:38'),
(92, 1, 'has logged in the system at ', '2019-12-18 20:44:32'),
(93, 1, 'has logged out the system at ', '2019-12-18 20:46:29'),
(94, 1, 'has logged in the system at ', '2019-12-18 20:46:31'),
(95, 1, 'has logged out the system at ', '2019-12-18 20:47:02'),
(96, 10, 'has logged in the system at ', '2019-12-18 20:47:38'),
(97, 10, 'has logged out the system at ', '2019-12-18 20:47:42'),
(98, 1, 'has logged in the system at ', '2019-12-18 20:47:44'),
(99, 1, 'has logged out the system at ', '2019-12-18 20:48:01'),
(100, 1, 'has logged in the system at ', '2019-12-18 20:49:56'),
(101, 1, 'has logged out the system at ', '2019-12-18 20:50:30'),
(102, 1, 'has logged in the system at ', '2019-12-18 20:54:35'),
(103, 1, 'has logged out the system at ', '2019-12-18 20:55:53'),
(104, 1, 'has logged in the system at ', '2019-12-18 21:01:30'),
(105, 1, 'has logged out the system at ', '2019-12-18 21:02:41'),
(106, 14, 'has logged in the system at ', '2019-12-18 21:03:35'),
(107, 14, 'has logged out the system at ', '2019-12-18 21:23:14'),
(108, 15, 'has logged in the system at ', '2019-12-18 21:23:17'),
(109, 15, 'has logged out the system at ', '2019-12-18 21:28:07'),
(110, 15, 'has logged in the system at ', '2019-12-18 21:29:49'),
(111, 15, 'has logged in the system at ', '2019-12-18 21:30:14'),
(112, 15, 'has logged in the system at ', '2019-12-18 21:30:58'),
(113, 15, 'has logged in the system at ', '2019-12-18 21:31:28'),
(114, 15, 'has logged in the system at ', '2019-12-18 21:32:21'),
(115, 15, 'has logged in the system at ', '2019-12-18 21:33:26'),
(116, 15, 'has logged in the system at ', '2019-12-18 21:33:46'),
(117, 15, 'has logged out the system at ', '2019-12-18 21:33:51'),
(118, 15, 'has logged in the system at ', '2019-12-18 21:34:20'),
(119, 15, 'has logged out the system at ', '2019-12-18 21:34:53'),
(120, 16, 'has logged in the system at ', '2019-12-18 21:34:57'),
(121, 15, 'has logged in the system at ', '2019-12-18 21:35:07'),
(122, 15, 'has logged out the system at ', '2019-12-18 21:44:31'),
(123, 15, 'has logged in the system at ', '2019-12-18 21:45:05'),
(124, 15, 'has logged out the system at ', '2019-12-18 21:46:24'),
(125, 15, 'has logged in the system at ', '2019-12-18 21:46:25'),
(126, 15, 'has logged out the system at ', '2019-12-18 21:46:27'),
(127, 15, 'has logged in the system at ', '2019-12-18 21:46:31'),
(128, 15, 'has logged in the system at ', '2019-12-18 21:57:15'),
(129, 15, 'has logged out the system at ', '2019-12-18 21:57:23'),
(130, 16, 'has logged in the system at ', '2019-12-18 21:57:26'),
(131, 16, 'has logged out the system at ', '2019-12-18 22:13:55'),
(132, 15, 'has logged in the system at ', '2019-12-18 22:13:58'),
(133, 15, 'has logged out the system at ', '2019-12-18 22:15:47'),
(134, 16, 'has logged in the system at ', '2019-12-18 22:15:53'),
(135, 16, 'has logged out the system at ', '2019-12-18 22:20:27'),
(136, 15, 'has logged in the system at ', '2019-12-18 22:20:29'),
(137, 15, 'has logged out the system at ', '2019-12-18 22:25:17'),
(138, 15, 'has logged in the system at ', '2019-12-18 22:32:19'),
(139, 15, 'has logged out the system at ', '2019-12-18 22:32:22'),
(140, 15, 'added 20 of Cooldrings', '2020-08-31 11:45:30'),
(141, 15, 'added 20 of fish food', '2020-08-31 11:45:34'),
(142, 15, 'added 20 of soft dring', '2020-08-31 11:45:38'),
(143, 15, 'added 569 of ffd', '2020-08-31 12:10:31'),
(144, 15, 'has logged in the system at ', '2020-08-31 13:50:01'),
(145, 15, 'added 1212 of asdasd', '2020-08-31 13:52:19'),
(146, 15, 'added 3 of ', '2020-08-31 22:12:37'),
(147, 15, 'added 40 of calculatpr', '2020-08-31 22:14:13'),
(148, 15, 'has logged in the system at ', '2020-08-31 23:59:42'),
(149, 15, 'has logged in the system at ', '2020-09-01 00:01:08'),
(150, 190, 'has logged out the system at ', '2020-09-01 20:37:18'),
(151, 15, 'has logged in the system at ', '2020-09-01 20:37:19'),
(152, 15, 'has logged in the system at ', '2020-09-01 21:27:36'),
(153, 15, 'has logged in the system at ', '2020-09-02 11:48:16'),
(154, 190, 'has logged out the system at ', '2020-09-03 21:54:22'),
(155, 15, 'has logged in the system at ', '2020-09-03 21:54:52'),
(156, 15, 'has logged out the system at ', '2020-09-03 21:55:11'),
(157, 15, 'has logged in the system at ', '2020-09-03 21:58:34'),
(158, 15, 'added 40 of Calculatirs', '2020-09-03 22:37:28'),
(159, 15, 'added  of ', '2020-09-03 22:39:50'),
(160, 15, 'added 40 of Calculatirs', '2020-09-03 22:40:09'),
(161, 15, 'added 40 of Calculatirs', '2020-09-03 22:45:15'),
(162, 15, 'added 400 of Print paper', '2020-09-03 22:45:50'),
(163, 15, 'has logged in the system at ', '2020-09-13 16:28:11'),
(164, 15, 'has logged in the system at ', '2020-10-05 13:16:03'),
(165, 15, 'has logged in the system at ', '2020-10-19 19:46:16'),
(166, 15, 'has logged in the system at ', '2021-03-21 22:14:26'),
(167, 15, 'has logged in the system at ', '2021-03-25 13:07:00'),
(168, 15, 'has logged in the system at ', '2021-04-17 20:37:05'),
(169, 15, 'has logged in the system at ', '2021-04-17 21:51:41'),
(170, 15, 'has logged out the system at ', '2021-04-17 21:53:09'),
(171, 16, 'has logged in the system at ', '2021-04-17 21:53:14'),
(172, 15, 'has logged in the system at ', '2021-04-17 21:53:44'),
(173, 15, 'has logged in the system at ', '2021-04-17 23:27:21'),
(174, 15, 'has logged in the system at ', '2021-04-18 07:13:13'),
(175, 15, 'has logged in the system at ', '2021-04-18 07:14:24'),
(176, 15, 'has logged in the system at ', '2021-04-18 13:40:21'),
(177, 15, 'has logged in the system at ', '2021-04-18 13:40:48'),
(178, 15, 'has logged in the system at ', '2021-04-18 13:41:02'),
(179, 15, 'has logged in the system at ', '2021-04-18 13:41:56'),
(180, 15, 'has logged in the system at ', '2021-04-18 13:45:03'),
(181, 15, 'has logged in the system at ', '2021-04-18 13:47:00'),
(182, 15, 'has logged in the system at ', '2021-04-18 15:26:51'),
(183, 15, 'has logged out the system at ', '2021-04-18 15:35:20'),
(184, 15, 'has logged in the system at ', '2021-04-18 15:37:39'),
(185, 15, 'has logged in the system at ', '2021-04-18 15:48:43'),
(186, 15, 'has logged out the system at ', '2021-04-18 15:49:20'),
(187, 15, 'has logged in the system at ', '2021-04-18 15:53:07'),
(188, 15, 'has logged in the system at ', '2021-04-18 15:55:17'),
(189, 15, 'has logged out the system at ', '2021-04-18 15:59:05'),
(190, 37, 'has logged out the system at ', '2021-04-18 16:06:12'),
(191, 15, 'has logged in the system at ', '2021-04-18 16:06:17'),
(192, 15, 'has logged out the system at ', '2021-04-18 16:07:33'),
(193, 15, 'has logged in the system at ', '2021-04-18 16:12:21'),
(194, 15, 'has logged in the system at ', '2021-04-18 16:34:33'),
(195, 37, 'has logged out the system at ', '2021-04-18 16:54:12'),
(196, 37, 'has logged out the system at ', '2021-04-18 16:54:44'),
(197, 15, 'has logged in the system at ', '2021-04-18 16:54:48'),
(198, 15, 'has logged out the system at ', '2021-04-18 16:56:01'),
(199, 37, 'has logged out the system at ', '2021-04-18 17:00:19'),
(200, 15, 'has logged in the system at ', '2021-04-18 17:00:24'),
(201, 15, 'has logged out the system at ', '2021-04-18 17:01:40'),
(202, 37, 'has logged out the system at ', '2021-04-18 17:05:34'),
(203, 15, 'has logged in the system at ', '2021-04-19 11:02:31'),
(204, 15, 'has logged out the system at ', '2021-04-19 11:03:30'),
(205, 37, 'has logged out the system at ', '2021-04-19 15:15:06'),
(206, 37, 'has logged out the system at ', '2021-04-19 15:28:05'),
(207, 15, 'has logged in the system at ', '2021-04-19 15:28:16'),
(208, 15, 'has logged out the system at ', '2021-04-19 15:31:04'),
(209, 37, 'has logged out the system at ', '2021-04-19 15:42:00'),
(210, 15, 'has logged in the system at ', '2021-04-19 15:42:17'),
(211, 15, 'has logged out the system at ', '2021-04-19 15:44:52'),
(212, 37, 'has logged out the system at ', '2021-04-19 15:49:48'),
(213, 15, 'has logged in the system at ', '2021-04-19 15:51:01'),
(214, 15, 'has logged out the system at ', '2021-04-19 21:19:20'),
(215, 37, 'has logged out the system at ', '2021-04-19 21:22:31'),
(216, 15, 'has logged in the system at ', '2021-04-19 21:22:35'),
(217, 15, 'has logged out the system at ', '2021-04-20 07:09:39'),
(218, 15, 'has logged in the system at ', '2021-04-20 07:09:48'),
(219, 15, 'has logged out the system at ', '2021-04-20 07:18:52'),
(220, 15, 'has logged in the system at ', '2021-04-20 07:19:42'),
(221, 15, 'has logged out the system at ', '2021-04-20 07:20:06'),
(222, 18, 'has logged in the system at ', '2021-04-20 07:20:10'),
(223, 18, 'has logged in the system at ', '2021-04-20 07:21:06'),
(224, 18, 'has logged in the system at ', '2021-04-20 07:23:00'),
(225, 18, 'has logged in the system at ', '2021-04-20 07:24:21'),
(226, 18, 'has logged out the system at ', '2021-04-20 07:30:59'),
(227, 18, 'has logged in the system at ', '2021-04-20 07:31:10'),
(228, 18, 'has logged out the system at ', '2021-04-20 07:32:37'),
(229, 15, 'has logged in the system at ', '2021-04-20 07:32:42'),
(230, 15, 'has logged out the system at ', '2021-04-20 07:32:45'),
(231, 18, 'has logged in the system at ', '2021-04-20 07:32:51'),
(232, 18, 'has logged out the system at ', '2021-04-20 07:33:38'),
(233, 15, 'has logged in the system at ', '2021-04-20 07:33:42'),
(234, 15, 'has logged out the system at ', '2021-04-20 07:36:26'),
(235, 20, 'has logged in the system at ', '2021-04-20 07:36:28'),
(236, 20, 'has logged out the system at ', '2021-04-20 07:36:55'),
(237, 15, 'has logged in the system at ', '2021-04-20 07:36:59'),
(238, 15, 'has logged out the system at ', '2021-04-20 07:38:29'),
(239, 20, 'has logged in the system at ', '2021-04-20 07:38:36'),
(240, 20, 'has logged out the system at ', '2021-04-20 07:39:54'),
(241, 20, 'has logged in the system at ', '2021-04-20 07:40:00'),
(242, 20, 'has logged out the system at ', '2021-04-20 07:40:09'),
(243, 15, 'has logged in the system at ', '2021-04-20 07:40:12'),
(244, 15, 'has logged out the system at ', '2021-04-20 07:40:24'),
(245, 37, 'has logged out the system at ', '2021-04-20 07:57:34'),
(246, 15, 'has logged in the system at ', '2021-04-20 08:07:04'),
(247, 15, 'has logged out the system at ', '2021-04-20 08:08:20'),
(248, 15, 'has logged in the system at ', '2021-04-20 08:08:24'),
(249, 15, 'has logged out the system at ', '2021-04-20 08:16:37'),
(250, 15, 'has logged in the system at ', '2021-04-20 08:16:41'),
(251, 15, 'has logged out the system at ', '2021-04-20 08:16:49'),
(252, 20, 'has logged in the system at ', '2021-04-20 08:16:53'),
(253, 20, 'has logged out the system at ', '2021-04-20 08:21:51'),
(254, 37, 'has logged out the system at ', '2021-04-20 08:26:08'),
(255, 37, 'has logged out the system at ', '2021-04-20 08:28:46'),
(256, 15, 'has logged in the system at ', '2021-04-20 08:34:50'),
(257, 15, 'has logged out the system at ', '2021-04-20 08:34:54'),
(258, 20, 'has logged in the system at ', '2021-04-20 08:34:58'),
(259, 20, 'has logged out the system at ', '2021-04-20 08:35:19'),
(260, 20, 'has logged in the system at ', '2021-04-20 08:35:24'),
(261, 20, 'has logged out the system at ', '2021-04-20 08:37:42'),
(262, 15, 'has logged in the system at ', '2021-04-20 08:50:44'),
(263, 15, 'has logged out the system at ', '2021-04-20 08:52:44'),
(264, 20, 'has logged in the system at ', '2021-04-20 08:52:48'),
(265, 20, 'has logged out the system at ', '2021-04-20 08:53:19'),
(266, 15, 'has logged in the system at ', '2021-04-20 08:53:33'),
(267, 15, 'has logged out the system at ', '2021-04-20 08:55:11'),
(268, 20, 'has logged in the system at ', '2021-04-20 08:55:15'),
(269, 20, 'has logged out the system at ', '2021-04-20 08:55:52'),
(270, 15, 'has logged in the system at ', '2021-04-20 15:44:31'),
(271, 15, 'has logged out the system at ', '2021-04-20 15:44:42'),
(272, 15, 'has logged in the system at ', '2021-04-20 15:44:47'),
(273, 15, 'has logged out the system at ', '2021-04-20 15:44:50'),
(274, 20, 'has logged in the system at ', '2021-04-20 15:44:55'),
(275, 20, 'has logged out the system at ', '2021-04-20 15:44:57'),
(276, 15, 'has logged in the system at ', '2021-04-20 15:45:24'),
(277, 15, 'has logged out the system at ', '2021-04-20 15:45:42'),
(278, 20, 'has logged in the system at ', '2021-04-20 15:45:45'),
(279, 20, 'has logged out the system at ', '2021-04-20 15:45:51'),
(280, 15, 'has logged in the system at ', '2021-04-20 15:45:55'),
(281, 15, 'has logged out the system at ', '2021-04-20 15:50:10'),
(282, 21, 'has logged in the system at ', '2021-04-20 15:50:12'),
(283, 21, 'has logged out the system at ', '2021-04-20 15:50:17'),
(284, 15, 'has logged in the system at ', '2021-04-20 15:50:24'),
(285, 15, 'has logged out the system at ', '2021-04-20 15:50:41'),
(286, 21, 'has logged in the system at ', '2021-04-20 15:50:54'),
(287, 21, 'has logged out the system at ', '2021-04-20 15:53:34'),
(288, 38, 'has logged out the system at ', '2021-04-20 15:55:53'),
(289, 20, 'has logged in the system at ', '2021-04-20 15:56:07'),
(290, 20, 'has logged out the system at ', '2021-04-20 15:56:17'),
(291, 38, 'has logged out the system at ', '2021-04-20 15:58:57'),
(292, 15, 'has logged in the system at ', '2021-04-20 15:59:11'),
(293, 15, 'has logged out the system at ', '2021-04-20 16:00:07'),
(294, 38, 'has logged out the system at ', '2021-04-20 16:01:31'),
(295, 37, 'has logged out the system at ', '2021-04-20 16:08:00'),
(296, 38, 'has logged out the system at ', '2021-04-20 16:15:29'),
(297, 15, 'has logged in the system at ', '2021-04-20 16:15:40'),
(298, 15, 'has logged out the system at ', '2021-04-20 16:25:37'),
(299, 20, 'has logged in the system at ', '2021-04-20 16:25:58'),
(300, 15, 'has logged in the system at ', '2021-04-23 21:45:23'),
(301, 15, 'has logged out the system at ', '2021-04-23 21:53:25'),
(302, 37, 'has logged out the system at ', '2021-04-23 21:55:10'),
(303, 20, 'has logged in the system at ', '2021-04-23 21:55:19'),
(304, 20, 'has logged out the system at ', '2021-04-23 21:56:20'),
(305, 15, 'has logged in the system at ', '2021-04-23 21:56:29'),
(306, 190, 'has logged out the system at ', '2021-04-23 22:16:14'),
(307, 20, 'has logged in the system at ', '2021-04-23 22:16:26'),
(308, 20, 'has logged out the system at ', '2021-04-23 22:17:27'),
(309, 15, 'has logged in the system at ', '2021-04-23 22:17:32'),
(310, 15, 'has logged in the system at ', '2021-04-23 22:25:08'),
(311, 15, 'has logged out the system at ', '2021-04-23 22:32:38'),
(312, 37, 'has logged out the system at ', '2021-04-23 23:14:54'),
(313, 15, 'has logged in the system at ', '2021-04-23 23:15:09'),
(314, 15, 'has logged out the system at ', '2021-04-23 23:15:41'),
(315, 15, 'has logged in the system at ', '2021-04-24 15:19:32'),
(316, 15, 'has logged in the system at ', '2021-04-26 00:07:57'),
(317, 15, 'has logged in the system at ', '2021-04-26 00:11:40'),
(318, 15, 'has logged out the system at ', '2021-04-26 00:16:56'),
(319, 39, 'has logged out the system at ', '2021-04-26 00:20:05'),
(320, 15, 'has logged in the system at ', '2021-04-26 00:20:17'),
(321, 15, 'has logged out the system at ', '2021-04-26 00:21:43'),
(322, 15, 'has logged in the system at ', '2021-04-26 00:21:48'),
(323, 15, 'has logged out the system at ', '2021-04-26 00:21:57'),
(324, 39, 'has logged out the system at ', '2021-04-26 00:30:22'),
(325, 15, 'has logged in the system at ', '2021-04-26 00:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_desc` varchar(500) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_pic` varchar(300) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `Qty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_desc`, `prod_price`, `prod_pic`, `cat_id`, `serial`, `Qty`) VALUES
(28, 'Fride Rice', 'asd', '500.00', 's.jpg', 23, '145', '80'),
(29, 'Kothu', 'asd', '350.00', 'fish.jpg', 24, '54', '63'),
(30, 'take away Rice', 'aad', '4152.00', 'indiafood1.jpg', 24, '45', '10');

-- --------------------------------------------------------

--
-- Table structure for table `starreview`
--

CREATE TABLE `starreview` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `review` varchar(200) NOT NULL,
  `reviewBy` varchar(40) NOT NULL,
  `review2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `starreview`
--

INSERT INTO `starreview` (`id`, `productid`, `review`, `reviewBy`, `review2`) VALUES
(6, 29, '2', '37', 'hiii'),
(7, 29, '3', '38', 'vvv');

-- --------------------------------------------------------

--
-- Table structure for table `temp_trans`
--

CREATE TABLE `temp_trans` (
  `temp_trans_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `order_stat` int(100) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `paytype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `customerid`, `amount`, `order_stat`, `order_date`, `paytype`) VALUES
(6, 37, 700, 2, '2021-04-20', ''),
(450, 37, 4152, 2, '2021-04-19', 'Wallet'),
(963, 38, 1000, 3, '2021-04-20', 'Wallet'),
(6537, 39, 350, 2, '2021-04-26', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `transacton_detail_id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`transacton_detail_id`, `product_id`, `order_qty`, `transaction_id`) VALUES
(23, 30, 1, 450),
(24, 29, 2, 6),
(25, 28, 2, 963),
(26, 29, 1, 6537);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `UserType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `status`, `UserType`) VALUES
(15, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Arooskhan.A', 'active', 'Administrator'),
(20, 'taker', '26d1d5ce627e97da11fa54b28d3cc7e8', 'N.Faseel', 'active', 'Taker'),
(21, 'insaf@gmail.com', '41d361c079a85d44a6329af19e533d37', 'insaf', 'active', 'Taker');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `walletid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `balance` varchar(10) NOT NULL,
  `addeddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`walletid`, `customerid`, `balance`, `addeddate`) VALUES
(6, 37, '1000', '2021-04-18 08:55:02'),
(7, 37, '25000', '2021-04-20 07:51:33'),
(8, 38, '45000', '2021-04-20 07:56:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaintid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `starreview`
--
ALTER TABLE `starreview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD PRIMARY KEY (`temp_trans_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`transacton_detail_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`walletid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaintid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `starreview`
--
ALTER TABLE `starreview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `transacton_detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `walletid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
