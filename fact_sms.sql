-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 26, 2013 at 12:29 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fact_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`p_id`, `s_id`, `amount`, `date`, `remarks`) VALUES
(10, 9, 400, '2013-08-21', 'Rs. 100/- pending'),
(11, 13, 2000, '2013-08-24', 'Student requested for A/C printout'),
(12, 13, 2000, '2013-06-13', 'entered from account book'),
(13, 13, 2000, '2013-07-21', 'from cash book'),
(15, 13, 2000, '2013-05-20', 'This amount was paid in Advance Softech by Student. A/C adjusted'),
(16, 12, 100, '2013-06-12', 'PHP Application Fee Recorded from Cash Book'),
(17, 12, 1100, '2013-06-15', 'PHP Registration and 1st Installment Recorded from Cash Book'),
(18, 6, 500, '2013-06-12', 'For PHP Recorded from Cash Book'),
(19, 16, 600, '2013-06-17', 'PHP Tution Fee 1st Installment Recorded from Cash Book\r\n'),
(20, 17, 600, '2013-06-17', 'PHP Tution Fee 1st Installment Recorded From Cash Book'),
(21, 9, 500, '2013-06-13', 'PHP Tution Fee 1st Installment Recorded from Cash Book'),
(22, 12, 1000, '2013-07-20', 'PHP Tution Fee Recorded from Cash book\r\n'),
(23, 12, 1000, '2013-08-25', '3rd Installment for PHP DWD Programm. Student Requested for A/C printout'),
(24, 10, 100, '2013-08-26', 'Software testing');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `ph` varchar(15) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `add` varchar(255) NOT NULL,
  `c_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `dp` int(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `name`, `f_name`, `gender`, `dob`, `ph`, `e_mail`, `add`, `c_id`, `b_id`, `dp`) VALUES
(6, 'Rajesh Sharma', 'Late. Prem Chandra Sharma', 'Male', '1980-10-15', '9334519196', '', 'Sal Bagan, Mhijam, Jamtara, Jharkhand', 0, 0, 0),
(7, 'Debjyoti Basu', 'Dr. Kamal Kumar Basu', 'Male', '1995-04-28', '9661363003', '', 'B.M. Dutta Road, Mihijam, Dist. Jamtara, Jharkhand', 0, 0, 0),
(8, 'Tushar Mishra', 'Vinod Kumar Mishra', 'Male', '1994-07-03', '9501515195', '', 'Hansi Pahari, Mihijam, Jamtara, Jharkhand', 0, 0, 0),
(9, 'Sumeet Kumar Sharma', 'Fagu Sharma', 'Male', '2000-01-01', '9635534815', '', 'Kangoi, Mihijam, Jamtara', 0, 0, 0),
(10, 'Chandan Kumar', 'Ghanshyam Singh', 'Male', '1993-02-20', '8873485255', '', 'St. No. 68, Qr. No. 5/A, Chittaranjan, W.B. 713331', 0, 0, 0),
(11, 'Amar Sinha', 'Late. Harbilas Sinha', 'Male', '1994-05-13', '9635212075', '', 'R-site', 0, 0, 0),
(12, 'Mukesh Kumar', 'Sri Suresh Kumar', 'Male', '1997-09-13', '9304765449', '', 'R-7, St. No. 33, Qr. No. 19/C, Chittaranjan', 0, 0, 0),
(13, 'Munish Kumar', 'Sri Rakesh Kumar', 'Male', '1997-01-26', '9474114364', '', 'Simjuri, St. No. 88, Qr. No. 20/D, Chittaranjan', 0, 0, 0),
(14, 'Sudipta Kundu', 'Atul Kumar Kundu', 'Male', '1986-01-10', '9800727718', '', 'St. No. 35, Qr. No. 25/D, Chittaranjan', 0, 0, 0),
(15, 'Kanan Mondal', 'B. N. Mondal', 'Male', '1977-03-15', '9531705387', '', 'KG-4, Kalyangram, W.B. 713335', 0, 0, 0),
(16, 'Vijay Kumar', 'Sri Raju Turi', 'Male', '1995-10-04', '9153430228', '', 'St. No. 87, Qr. No. 4/B, Simjuri Chittaranjan', 0, 0, 0),
(17, 'Vicky Kumar', 'Sri Raju Turi', 'Male', '1993-12-07', '9153430228', '', 'St. No. 87, Qr. No. 4/B, Simjuri Chittaranjan', 0, 0, 0),
(18, 'Shuvashis Kunwear', 'Teeka Bahadur', 'Male', '1996-10-25', '8900395498', '', 'St. No. 35, Qr. No. 8/12A, Chittaranjan, W.B. ', 0, 0, 0),
(19, 'Aditya', 'Anil Prasad Sah', 'Male', '1994-04-27', '7739112238', '', 'Vill. Kushbedia, Po. Mihijam, Dist. Jamtara\r\nSpoken English - Level 2', 0, 0, 0),
(20, 'Krishna Kumar Rajak', 'Tara Shankar Rajak', 'Male', '1995-08-11', '9333019532', '', 'St. No. 33, Qr. No. 12A/C, Area-5, Chittaranjan\r\n(Spoken English Lvl-2)', 0, 0, 0),
(21, 'Shashi Kumar Prabhakar', 'Sri Upendra Prasad Tanti', 'Male', '1992-03-05', '8757531696', '', 'Kangoi, Mihijam, Jamtara', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `pwd`, `status`) VALUES
(1, 'admin', 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
