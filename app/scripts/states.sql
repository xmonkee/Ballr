--
-- Table structure for table `states_list`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(255) NOT NULL,
  `server_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `states_list`
--

INSERT INTO `states` (`id`, `state`, `server_time`) VALUES
(2, 'Andhra Pradesh', '2013-02-27 09:20:16'),
(3, 'Arunachal Pradesh', '2013-02-27 09:20:16'),
(4, 'Assam', '2013-02-27 09:20:16'),
(5, 'Bihar', '2013-02-27 09:20:17'),
(6, 'Chhattisgarh', '2013-02-27 09:20:17'),
(7, 'Goa', '2013-02-27 09:20:17'),
(8, 'Gujarat', '2013-02-27 09:20:17'),
(9, 'Haryana', '2013-02-27 09:20:17'),
(10, 'Himachal Pradesh', '2013-02-27 09:20:17'),
(11, 'Jammu and Kashmir', '2013-02-27 09:20:17'),
(12, 'Jharkhand', '2013-02-27 09:20:17'),
(13, 'Karnataka', '2013-02-27 09:20:17'),
(14, 'Kerala', '2013-02-27 09:20:17'),
(15, 'Madhya Pradesh', '2013-02-27 09:20:17'),
(16, 'Maharashtra', '2013-02-27 09:20:17'),
(17, 'Manipur', '2013-02-27 09:20:17'),
(18, 'Meghalaya', '2013-02-27 09:20:17'),
(19, 'Mizoram', '2013-02-27 09:20:17'),
(20, 'Nagaland', '2013-02-27 09:20:17'),
(21, 'Punjab', '2013-02-27 09:20:17'),
(22, 'Rajasthan', '2013-02-27 09:20:17'),
(23, 'Sikkim', '2013-02-27 09:20:17'),
(24, 'Tamil Nadu', '2013-02-27 09:20:17'),
(25, 'Tripura', '2013-02-27 09:20:18'),
(26, 'Uttar Pradesh', '2013-02-27 09:20:18'),
(27, 'Uttarakhand', '2013-02-27 09:20:18'),
(28, 'West Bengal', '2013-02-27 09:20:18');