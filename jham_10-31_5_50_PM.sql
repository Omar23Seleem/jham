-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 10:50 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jham`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_personal`
--

CREATE TABLE IF NOT EXISTS `applicant_personal` (
  `personal_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `dbirth` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `pbirth` varchar(255) NOT NULL,
  `civil` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mphone1` varchar(15) NOT NULL,
  `mphone2` varchar(15) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `street_p` varchar(255) NOT NULL,
  `barangay_p` varchar(255) NOT NULL,
  `municipality_p` varchar(255) NOT NULL,
  `province_p` varchar(255) NOT NULL,
  `disability` varchar(255) NOT NULL,
  `other_disability` varchar(255) NOT NULL,
  `employment` varchar(255) NOT NULL,
  `emp_status` varchar(255) NOT NULL,
  `looking_work` varchar(255) NOT NULL,
  `looking_work_status` varchar(255) NOT NULL,
  `willing_work` varchar(255) NOT NULL,
  `when_work` varchar(255) NOT NULL,
  `four_ps` varchar(255) NOT NULL,
  `four_ps_number` varchar(255) NOT NULL,
  `ofw` varchar(255) NOT NULL,
  `work_back` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_personal`
--

INSERT INTO `applicant_personal` (`personal_id`, `applicant_id`, `fname`, `lname`, `mname`, `suffix`, `dbirth`, `age`, `sex`, `pbirth`, `civil`, `citizenship`, `height`, `weight`, `phone`, `mphone1`, `mphone2`, `street`, `barangay`, `municipality`, `province`, `street_p`, `barangay_p`, `municipality_p`, `province_p`, `disability`, `other_disability`, `employment`, `emp_status`, `looking_work`, `looking_work_status`, `willing_work`, `when_work`, `four_ps`, `four_ps_number`, `ofw`, `work_back`, `date`) VALUES
(2, 5, 'm', 'o', 'a', '', '07-22-1997', 22, 'male', 's', 'Single', '', '', '', '', '+639175502294', '', 's', 'b', 'c', 'p', 's', 'b', 'c', 'p', '0', ' ', 'Employed', 'Wage Employed', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', ' ', '2019-10-20'),
(3, 6, 'f', 'l', 'm', '', '09-17-1996', 23, 'male', 'e', 'Single', '', '', '', '', '+639186455311', '', 'h s', 'b a', 'm c', 'p a', 'h s', 'b a', 'm c', 'p a', '0', ' ', 'Employed', 'Wage Employed', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', ' ', '2019-10-20'),
(4, 13, 'Gerald', 'Anderson', 'A', '', '01-01-92', 28, 'male', 'manila', 'Single', 'Filipino', '170', '60', '123123123', '+639103867728', '+639890809898', 'asdasd', 'asd', 'asd', 'Albay', 'asdasd', 'asd', 'asd', 'Albay', '0', ' ', 'Employed', 'Wage Employed', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', ' ', '2019-10-28'),
(5, 14, 'Jaun', 'Cruz', 'A', '', '01-01-92', 28, 'male', 'camalig', 'Single', 'Filipino', '170', '60', '05283423', '+639103867728', '+63123123123', 'asdasd', 'asasd', 'Legazpi', 'Albay', 'asd', 'asd', 'Basud', 'Albay', '0', ' ', 'Employed', 'Wage Employed', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', ' ', '2019-10-28'),
(6, 15, 'Jaun', 'asdasd', 'A', '', '01-01-98', 22, 'male', 'pasay city', 'Single', 'Filipino', '170', '60', '05283423', '+639103867728', '+639890809898', '123', 'ilawod', 'Camalig', 'Albay', 'asd', 'qwe', 'Paracale', 'Camarines Norte', '0', ' ', 'Employed', 'Wage Employed', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', ' ', '2019-10-28'),
(7, 17, 'Omar', 'Mohamed', 'A.', '', '07-22-1997', 22, 'male', 'Saudi Arabia', 'Single', '', '', '', '', '+639186455311', '', 'Rizal', '17', 'Legazpi', 'Albay', 'Rizal', '17', 'Legazpi', 'Albay', '0', ' ', 'Employed', 'Wage Employed', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', ' ', '2019-10-30'),
(8, 19, 'Omar', 'Mohamed', 'A.', '', '07-22-1997', 22, 'male', 'Saudi Arabia', 'Single', '', '', '', '', '+639982710085', '', 'Rizal', '17', 'Legazpi', 'Albay', 'Rizal', '17', 'Legazpi', 'Albay', '0', ' ', 'Employed', 'Wage Employed', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', ' ', '2019-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `applied_job`
--

CREATE TABLE IF NOT EXISTS `applied_job` (
  `app_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `app_job_id` int(11) NOT NULL,
  `app_date` varchar(255) NOT NULL,
  `app_status` int(11) NOT NULL,
  `date_hired` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_picture`
--

CREATE TABLE IF NOT EXISTS `app_picture` (
  `pic_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `app_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `century_skill`
--

CREATE TABLE IF NOT EXISTS `century_skill` (
  `cent_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `inovation` int(11) NOT NULL,
  `team_work` int(11) NOT NULL,
  `multitasking` int(11) NOT NULL,
  `work_ethics` int(11) NOT NULL,
  `self_motivation` int(11) NOT NULL,
  `creative_problem` int(11) NOT NULL,
  `problem_solving` int(11) NOT NULL,
  `critical_thinking` int(11) NOT NULL,
  `decision_making` int(11) NOT NULL,
  `strees_tolerance` int(11) NOT NULL,
  `planing` int(11) NOT NULL,
  `perceptiveness` int(11) NOT NULL,
  `english_funtional` int(11) NOT NULL,
  `english_comp` int(11) NOT NULL,
  `math_functional` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `century_skill`
--

INSERT INTO `century_skill` (`cent_id`, `app_user_id`, `inovation`, `team_work`, `multitasking`, `work_ethics`, `self_motivation`, `creative_problem`, `problem_solving`, `critical_thinking`, `decision_making`, `strees_tolerance`, `planing`, `perceptiveness`, `english_funtional`, `english_comp`, `math_functional`) VALUES
(9, 19, 0, 1, 1, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `city_municipality`
--

CREATE TABLE IF NOT EXISTS `city_municipality` (
  `city-municipality_id` int(11) NOT NULL DEFAULT '0',
  `province_id` int(11) DEFAULT NULL,
  `city_municipality_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city_municipality`
--

INSERT INTO `city_municipality` (`city-municipality_id`, `province_id`, `city_municipality_name`) VALUES
(1, 1, 'Legazpi'),
(2, 1, 'Ligao'),
(3, 1, 'Tabaco'),
(4, 1, 'Bacacay'),
(5, 1, 'Camalig'),
(6, 1, 'Daraga'),
(7, 1, 'Guinobatan'),
(8, 1, 'Jovellar'),
(9, 1, 'Libon'),
(10, 1, 'Malilipot'),
(11, 1, 'Malinao'),
(12, 1, 'Manito'),
(13, 1, 'Oas'),
(14, 1, 'Pio Duran'),
(15, 1, 'Polangui'),
(16, 1, 'Rapu-Rapu'),
(17, 1, 'Santo Domingo'),
(18, 1, 'Tiwi'),
(19, 2, 'Basud'),
(20, 2, 'Capalonga'),
(21, 2, 'Daet '),
(22, 2, 'Jose Panganiban'),
(23, 2, 'Labo'),
(24, 2, 'Mercedes'),
(25, 2, 'Paracale'),
(26, 2, 'San Lorenzo Ruiz'),
(27, 2, 'San Vicente'),
(28, 2, 'Santa Elena'),
(29, 2, 'Talisay'),
(30, 2, 'Vinzons'),
(31, 3, 'Naga City '),
(32, 3, 'Iriga City '),
(33, 3, 'Baao'),
(34, 3, 'Balatan'),
(35, 3, 'Bato'),
(36, 3, 'Bombon'),
(37, 3, 'Buhi'),
(38, 3, 'Bula'),
(39, 3, 'Cabusao'),
(40, 3, 'Calabanga'),
(41, 3, 'Camaligan'),
(42, 3, 'Canaman'),
(43, 3, 'Caramoan'),
(44, 3, 'Del Gallego'),
(45, 3, 'Gainza'),
(46, 3, 'Garchitorena'),
(47, 3, 'Goa'),
(48, 3, 'Lagonoy'),
(49, 3, 'Libmanan'),
(50, 3, 'Lupi'),
(51, 3, 'Magarao'),
(52, 3, 'Milaor'),
(53, 3, 'Minalabac'),
(54, 3, 'Nabua'),
(55, 3, 'Ocampo'),
(56, 3, 'Pamplona'),
(57, 3, 'Pasacao'),
(58, 3, 'Pili '),
(59, 3, 'Presentacion'),
(60, 3, 'Ragay'),
(61, 3, 'Sagñay'),
(62, 3, 'San Fernando'),
(63, 3, 'San Jose'),
(64, 3, 'Sipocot'),
(65, 3, 'Siruma'),
(66, 3, 'Tigaon'),
(67, 3, 'Tinambac'),
(68, 4, 'Bagamanoc'),
(69, 4, 'Baras'),
(70, 4, 'Bato'),
(71, 4, 'Caramoran'),
(72, 4, 'Gigmoto'),
(73, 4, 'Pandan'),
(74, 4, 'Panganiban (Payo)'),
(75, 4, 'San Andres (Calolbon)'),
(76, 4, 'San Miguel'),
(77, 4, 'Viga'),
(78, 4, 'Virac'),
(79, 5, 'Masbate'),
(80, 5, 'Aroroy'),
(81, 5, 'Baleno'),
(82, 5, 'Balud'),
(83, 5, 'Batuan'),
(84, 5, 'Cataingan'),
(85, 5, 'Cawayan'),
(86, 5, 'Claveria'),
(87, 5, 'Dimasalang'),
(88, 5, 'Esperanza'),
(89, 5, 'Mandaon'),
(90, 5, 'Milagros'),
(91, 5, 'Mobo'),
(92, 5, 'Monreal'),
(93, 5, 'Palanas'),
(94, 5, 'Pio V. Corpuz'),
(95, 5, 'Placer'),
(96, 5, 'San Fernando'),
(97, 5, 'San Jacinto'),
(98, 5, 'San Pascual'),
(99, 5, 'Uson'),
(100, 6, 'Sorsogon'),
(101, 6, 'Barcelona'),
(102, 6, 'Bulan'),
(103, 6, 'Bulusan'),
(104, 6, 'Casiguran'),
(105, 6, 'Castilla'),
(106, 6, 'Donsol'),
(107, 6, 'Gubat'),
(108, 6, 'Irosin'),
(109, 6, 'Juban'),
(110, 6, 'Magallanes'),
(111, 6, 'Matnog'),
(112, 6, 'Pilar'),
(113, 6, 'Prieto Diaz'),
(114, 6, 'Santa Magdalena');

-- --------------------------------------------------------

--
-- Table structure for table `company_logo`
--

CREATE TABLE IF NOT EXISTS `company_logo` (
  `com_id_logo` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `emp_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE IF NOT EXISTS `company_profile` (
  `com_id` int(11) NOT NULL,
  `flie` varchar(255) NOT NULL,
  `com_description` longtext NOT NULL,
  `emp_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dialect`
--

CREATE TABLE IF NOT EXISTS `dialect` (
  `dialect_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `tagalog` int(11) NOT NULL,
  `ilocano` int(11) NOT NULL,
  `ilongo` int(11) NOT NULL,
  `bikol` int(11) NOT NULL,
  `others` int(11) NOT NULL,
  `dialect_others` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dialect`
--

INSERT INTO `dialect` (`dialect_id`, `app_user_id`, `tagalog`, `ilocano`, `ilongo`, `bikol`, `others`, `dialect_others`) VALUES
(1, 2, 0, 0, 0, 0, 0, ''),
(2, 5, 0, 0, 0, 0, 0, ''),
(3, 6, 0, 0, 0, 0, 0, ''),
(4, 7, 0, 0, 0, 0, 0, ''),
(5, 13, 0, 0, 0, 0, 0, ''),
(6, 14, 0, 0, 0, 0, 0, ''),
(7, 15, 0, 0, 0, 0, 0, ''),
(8, 17, 0, 0, 0, 0, 0, ''),
(9, 19, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `edu_background`
--

CREATE TABLE IF NOT EXISTS `edu_background` (
  `edu_bg_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `currently_school` varchar(255) NOT NULL,
  `edu_level` varchar(255) NOT NULL,
  `edu_year` varchar(255) NOT NULL,
  `edu_school` varchar(255) NOT NULL,
  `edu_course` varchar(255) NOT NULL,
  `edu_award` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edu_background`
--

INSERT INTO `edu_background` (`edu_bg_id`, `app_user_id`, `currently_school`, `edu_level`, `edu_year`, `edu_school`, `edu_course`, `edu_award`) VALUES
(1, 2, 'No', 'College Graduate', '04-20', 's', 'b', 'n'),
(2, 5, 'No', 'College Graduate', '07-20', 's', 'b', 'n'),
(3, 6, 'No', 'College Graduate', '04-19', 's i ', 'b i ', 'n o'),
(4, 7, 'No', 'College Graduate', '04-20', 's', 'c', 'a'),
(5, 13, 'Yes', 'No Formal Education', '', '', '', ''),
(6, 14, 'Yes', 'No Formal Education', '12-12', 'school', 'course', 'none'),
(7, 15, 'Yes', 'Elementary Graduate', '11-12', 'school', 'course', 'none'),
(8, 17, 'No', 'College Graduate', '04-20', 'STI', 'BSIT', 'None'),
(9, 19, 'No', 'College Graduate', '04-20', 'STI', 'BSIT', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `elegibility`
--

CREATE TABLE IF NOT EXISTS `elegibility` (
  `el_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `el_carrer` varchar(255) NOT NULL,
  `el_license` varchar(255) NOT NULL,
  `el_expiry` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elegibility`
--

INSERT INTO `elegibility` (`el_id`, `app_user_id`, `el_carrer`, `el_license`, `el_expiry`) VALUES
(1, 2, '', '', ''),
(2, 2, '', '', ''),
(3, 5, '', '', ''),
(4, 5, '', '', ''),
(5, 6, '', '', ''),
(6, 6, '', '', ''),
(7, 7, '', '', ''),
(8, 7, '', '', ''),
(9, 13, '', '', ''),
(10, 13, '', '', ''),
(11, 14, '', '', ''),
(12, 14, '', '', ''),
(13, 15, '', '', ''),
(14, 15, '', '', ''),
(15, 17, '', '', ''),
(16, 17, '', '', ''),
(17, 19, '', '', ''),
(18, 19, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employer_data`
--

CREATE TABLE IF NOT EXISTS `employer_data` (
  `emp_id` int(11) NOT NULL,
  `emp_user_id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_acronym` varchar(255) NOT NULL,
  `emp_tax` varchar(255) NOT NULL,
  `emp_type` varchar(255) NOT NULL,
  `emp_force` varchar(255) NOT NULL,
  `emp_line_bus` varchar(255) NOT NULL,
  `emp_address` varchar(255) NOT NULL,
  `emp_barangay` varchar(255) NOT NULL,
  `emp_city` varchar(255) NOT NULL,
  `emp_province` varchar(255) NOT NULL,
  `emp_cont_title` varchar(255) NOT NULL,
  `emp_cont_person` varchar(255) NOT NULL,
  `emp_cont_position` varchar(255) NOT NULL,
  `emp_cont_tel` varchar(255) NOT NULL,
  `emp_cont_mobile` varchar(255) NOT NULL,
  `emp_cont_fax` varchar(255) NOT NULL,
  `emp_cont_email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer_data`
--

INSERT INTO `employer_data` (`emp_id`, `emp_user_id`, `emp_name`, `emp_acronym`, `emp_tax`, `emp_type`, `emp_force`, `emp_line_bus`, `emp_address`, `emp_barangay`, `emp_city`, `emp_province`, `emp_cont_title`, `emp_cont_person`, `emp_cont_position`, `emp_cont_tel`, `emp_cont_mobile`, `emp_cont_fax`, `emp_cont_email`, `date`) VALUES
(4, 20, 'SM', 'SM', '11', 'Private', 'Large (200 and Up)', '2323', 'address', 'barangay', 'city', 'procince', 'Mr.', 'mo om an', 'position', '', '+639774243247', '', 'omarseliem1997.eg@gmail.com', '2019-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `job_fair`
--

CREATE TABLE IF NOT EXISTS `job_fair` (
  `jf_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `jf_title` varchar(255) NOT NULL,
  `slot` int(11) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `jf_description` longtext NOT NULL,
  `active` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_fair`
--

INSERT INTO `job_fair` (`jf_id`, `type`, `jf_title`, `slot`, `venue`, `file`, `jf_description`, `active`, `date`) VALUES
(1, '', 'banner', 1, 'lega City', 'peso banner.png', '<p>What is the PESO? The Public Employment Service Office (PESO) is a non-fee charging multi-employment service facility or entity established or accredited pursuant to Republic Act No. 8759, otherwise known as the PESO Act of 1999. The Act provides that in order to carry out full employment and equality of employment opportunities for all, and to strengthen and expand the existing employment facilitation service machinery of the government particularly at the local levels, there shall be established in all capital towns of provinces, key cities, and other strategic areas a Public Employment Service Office. The PESO''s are community-based and maintained largely by local government units (LGU''s) and a number of non-governmental organizations (NGO''s) or community-based organizations (CBO''s) and state universities and colleges (SUC''s). The PESO''s are linked to the regional offices of the Department of Labor and Employment (DOLE) for coordination and technical supervision, and to the DOLE central office, to constitute the national employment service network.</p>', 1, '12-12-19'),
(2, '', 'JOB FAIR', 11, 'lega City', 'a190996f9b520cc869c231069d0c1cbc.jpg', '<p>What is the PESO? The Public Employment Service Office (PESO) is a non-fee charging multi-employment service facility or entity established or accredited pursuant to Republic Act No. 8759, otherwise known as the PESO Act of 1999. The Act provides that in order to carry out full employment and equality of employment opportunities for all, and to strengthen and expand the existing employment facilitation service machinery of the government particularly at the local levels, there shall be established in all capital towns of provinces, key cities, and other strategic areas a Public Employment Service Office. The PESO''s are community-based and maintained largely by local government units (LGU''s) and a number of non-governmental organizations (NGO''s) or community-based organizations (CBO''s) and state universities and colleges (SUC''s). The PESO''s are linked to the regional offices of the Department of Labor and Employment (DOLE) for coordination and technical supervision, and to the DOLE central office, to constitute the national employment service network.</p>', 1, '12-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE IF NOT EXISTS `job_post` (
  `job_id` int(11) NOT NULL,
  `emp_user_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` longtext NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `job_specialization` varchar(255) NOT NULL,
  `job_salary` decimal(10,2) NOT NULL,
  `job_salary_type` varchar(255) NOT NULL,
  `job_shift` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `job_exp` int(11) NOT NULL,
  `job_slot` int(11) NOT NULL,
  `job_status` int(11) NOT NULL,
  `job_edu_lvl` varchar(255) NOT NULL,
  `denied` int(11) NOT NULL,
  `job_date_create` varchar(255) NOT NULL,
  `expirry_date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`job_id`, `emp_user_id`, `job_title`, `job_description`, `job_location`, `job_specialization`, `job_salary`, `job_salary_type`, `job_shift`, `job_type`, `job_exp`, `job_slot`, `job_status`, `job_edu_lvl`, `denied`, `job_date_create`, `expirry_date`) VALUES
(14, 20, 'Web Designer', '<p>Test Test Test</p>', 'Legazpi City', 'IT - Software', '20000.00', 'Non-Nogtiable', 'Morning', 'Full-Time', 2, 3, 1, 'College Graduate', 0, '2019-10-31', '2019-12-31'),
(15, 20, 'Saler', '', 'Legazpi City', 'Sales - Corporate', '15000.00', 'Non-Nogtiable', 'Morning', 'Full-Time', 2, 2, 1, 'College Graduate', 0, '2019-10-31', '2019-12-31'),
(16, 20, 'cashier', '<p>test</p>', 'Legazpi City', 'Sales - Corporate', '10000.00', 'Non-Nogtiable', 'Morning', 'Full-Time', 1, 5, 1, 'College Graduate', 0, '2019-10-31', '2019-12-31'),
(17, 20, 'Admin', '<p>test test test</p>', 'Legazpi City', 'IT - Hardware', '20000.00', 'Non-Nogtiable', 'Morning', 'Full-Time', 3, 1, 1, 'College Graduate', 0, '2019-10-31', '2019-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `job_preference`
--

CREATE TABLE IF NOT EXISTS `job_preference` (
  `prep_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `occupation1` varchar(255) NOT NULL,
  `occupation2` varchar(255) NOT NULL,
  `occupation3` varchar(255) NOT NULL,
  `industry1` varchar(255) NOT NULL,
  `industry2` varchar(255) NOT NULL,
  `industry3` varchar(255) NOT NULL,
  `salary_expect` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_preference`
--

INSERT INTO `job_preference` (`prep_id`, `app_user_id`, `occupation1`, `occupation2`, `occupation3`, `industry1`, `industry2`, `industry3`, `salary_expect`) VALUES
(1, 2, 'w', '', '', 'i', '', '', '0.00'),
(2, 5, 'oooooooooo', '', '', 'iiiiiiiiiiiii', '', '', '0.00'),
(3, 6, 'oc', '', '', 'in', '', '', '0.00'),
(4, 7, 'o c c', '', '', 'i n d', '', '', '0.00'),
(5, 13, 'as', '', '', 'as', '', '', '123.00'),
(6, 14, 'waiter', '', '', 'resto', '', '', '0.00'),
(7, 15, 'waiter', '', '', 'resturant', '', '', '0.00'),
(8, 17, 'Web Developer', '', '', 'IT', '', '', '0.00'),
(9, 19, 'Web Developer', '', '', 'IT', '', '', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `job_skill`
--

CREATE TABLE IF NOT EXISTS `job_skill` (
  `job_cent_id` int(11) NOT NULL,
  `job_post_id` int(11) NOT NULL,
  `inovation` int(11) NOT NULL,
  `team_work` int(11) NOT NULL,
  `multitasking` int(11) NOT NULL,
  `work_ethics` int(11) NOT NULL,
  `self_motivation` int(11) NOT NULL,
  `creative_problem` int(11) NOT NULL,
  `problem_solving` int(11) NOT NULL,
  `critical_thinking` int(11) NOT NULL,
  `decision_making` int(11) NOT NULL,
  `strees_tolerance` int(11) NOT NULL,
  `planing` int(11) NOT NULL,
  `perceptiveness` int(11) NOT NULL,
  `english_funtional` int(11) NOT NULL,
  `english_comp` int(11) NOT NULL,
  `math_functional` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_skill`
--

INSERT INTO `job_skill` (`job_cent_id`, `job_post_id`, `inovation`, `team_work`, `multitasking`, `work_ethics`, `self_motivation`, `creative_problem`, `problem_solving`, `critical_thinking`, `decision_making`, `strees_tolerance`, `planing`, `perceptiveness`, `english_funtional`, `english_comp`, `math_functional`) VALUES
(15, 14, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(16, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1),
(17, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 1),
(18, 17, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `lang_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `EILTS` int(11) NOT NULL,
  `TOEFL` int(11) NOT NULL,
  `TOCFL` int(11) NOT NULL,
  `JLPT` int(11) NOT NULL,
  `TOPIC` int(11) NOT NULL,
  `lang_other` int(11) NOT NULL,
  `other_specify` varchar(255) NOT NULL,
  `validity_date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`lang_id`, `app_user_id`, `EILTS`, `TOEFL`, `TOCFL`, `JLPT`, `TOPIC`, `lang_other`, `other_specify`, `validity_date`) VALUES
(1, 2, 0, 0, 0, 0, 0, 0, '', ''),
(2, 5, 0, 0, 0, 0, 0, 0, '', ''),
(3, 6, 0, 0, 0, 0, 0, 0, '', ''),
(4, 7, 0, 0, 0, 0, 0, 0, '', ''),
(5, 13, 0, 0, 0, 0, 0, 0, '', ''),
(6, 14, 0, 0, 0, 0, 0, 0, '', ''),
(7, 15, 0, 0, 0, 0, 0, 0, '', ''),
(8, 17, 0, 0, 0, 0, 0, 0, '', ''),
(9, 19, 0, 0, 0, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL DEFAULT '0',
  `province_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'Albay'),
(2, 'Camarines Norte'),
(3, 'Camarines Sur'),
(4, 'Catanduanes'),
(5, 'Masbate'),
(6, 'Sorsogon');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `res_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `resv_id` varchar(255) NOT NULL,
  `jf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `res_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`res_id`, `user_id`, `file`) VALUES
(1, 19, '343fb49a7cdcbb8fb251af2b2f986635.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tech_skill`
--

CREATE TABLE IF NOT EXISTS `tech_skill` (
  `tech_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `carpentry` int(11) NOT NULL,
  `masonry` int(11) NOT NULL,
  `welding` int(11) NOT NULL,
  `auto_mechanic` int(11) NOT NULL,
  `plumbing` int(11) NOT NULL,
  `driving` int(11) NOT NULL,
  `gardening` int(11) NOT NULL,
  `tailoring` int(11) NOT NULL,
  `photography` int(11) NOT NULL,
  `hairdressing` int(11) NOT NULL,
  `cook` int(11) NOT NULL,
  `baking` int(11) NOT NULL,
  `other_tech` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tech_skill`
--

INSERT INTO `tech_skill` (`tech_id`, `app_user_id`, `carpentry`, `masonry`, `welding`, `auto_mechanic`, `plumbing`, `driving`, `gardening`, `tailoring`, `photography`, `hairdressing`, `cook`, `baking`, `other_tech`) VALUES
(1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(2, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(3, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(4, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(5, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(6, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(7, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(8, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, ''),
(9, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tec_training`
--

CREATE TABLE IF NOT EXISTS `tec_training` (
  `tec_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `tec_cur_training` varchar(255) NOT NULL,
  `tec_training` varchar(255) NOT NULL,
  `tec_duration` varchar(255) NOT NULL,
  `tec_insti` varchar(255) NOT NULL,
  `tec_cert` varchar(255) NOT NULL,
  `tec_complete` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tec_training`
--

INSERT INTO `tec_training` (`tec_id`, `app_user_id`, `tec_cur_training`, `tec_training`, `tec_duration`, `tec_insti`, `tec_cert`, `tec_complete`) VALUES
(1, 2, '', '', '', '', '', 'Yes'),
(2, 2, '', '', '', '', '', 'Yes'),
(3, 2, '', '', '', '', '', 'Yes'),
(4, 5, '', '', '', '', '', 'Yes'),
(5, 5, '', '', '', '', '', 'Yes'),
(6, 5, '', '', '', '', '', 'Yes'),
(7, 6, '', '', '', '', '', 'Yes'),
(8, 6, '', '', '', '', '', 'Yes'),
(9, 6, '', '', '', '', '', 'Yes'),
(10, 7, '', '', '', '', '', 'Yes'),
(11, 7, '', '', '', '', '', 'Yes'),
(12, 7, '', '', '', '', '', 'Yes'),
(13, 13, '', '', '', '', '', 'Yes'),
(14, 13, '', '', '', '', '', 'Yes'),
(15, 13, '', '', '', '', '', 'Yes'),
(16, 14, '', '', '', '', '', 'Yes'),
(17, 14, '', '', '', '', '', 'Yes'),
(18, 14, '', '', '', '', '', 'Yes'),
(19, 15, '', '', '', '', '', 'Yes'),
(20, 15, '', '', '', '', '', 'Yes'),
(21, 15, '', '', '', '', '', 'Yes'),
(22, 17, '', '', '', '', '', 'Yes'),
(23, 17, '', '', '', '', '', 'Yes'),
(24, 17, '', '', '', '', '', 'Yes'),
(25, 19, '', '', '', '', '', 'Yes'),
(26, 19, '', '', '', '', '', 'Yes'),
(27, 19, '', '', '', '', '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activate` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `denied` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `confirm` int(11) NOT NULL,
  `confirm_code` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `email`, `password`, `activate`, `role`, `denied`, `token`, `last_login`, `confirm`, `confirm_code`, `date`) VALUES
(1, 'admin@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 0, '', '10-31-19', 1, '', ''),
(19, 'omarseliem1997.ph@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 4, 0, '', '10-31-19', 1, '50ck8', '2019-10-31'),
(20, 'omarseliem1997.eg@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 3, 0, '', '10-31-19', 1, 'nyfvj', '2019-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE IF NOT EXISTS `wish_list` (
  `wish_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_exp`
--

CREATE TABLE IF NOT EXISTS `work_exp` (
  `work_exp_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  `work_company` varchar(255) NOT NULL,
  `work_address` varchar(255) NOT NULL,
  `work_position` varchar(255) NOT NULL,
  `work_date` varchar(255) NOT NULL,
  `work_status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_exp`
--

INSERT INTO `work_exp` (`work_exp_id`, `app_user_id`, `work_company`, `work_address`, `work_position`, `work_date`, `work_status`) VALUES
(1, 2, '', '', '', '', ''),
(2, 2, '', '', '', '', ''),
(3, 2, '', '', '', '', ''),
(4, 5, '', '', '', '', ''),
(5, 5, '', '', '', '', ''),
(6, 5, '', '', '', '', ''),
(7, 6, '', '', '', '', ''),
(8, 6, '', '', '', '', ''),
(9, 6, '', '', '', '', ''),
(10, 7, '', '', '', '', ''),
(11, 7, '', '', '', '', ''),
(12, 7, '', '', '', '', ''),
(13, 13, '', '', '', '', ''),
(14, 13, '', '', '', '', ''),
(15, 13, '', '', '', '', ''),
(16, 14, '', '', '', '', ''),
(17, 14, '', '', '', '', ''),
(18, 14, '', '', '', '', ''),
(19, 15, '', '', '', '', ''),
(20, 15, '', '', '', '', ''),
(21, 15, '', '', '', '', ''),
(22, 17, '', '', '', '', ''),
(23, 17, '', '', '', '', ''),
(24, 17, '', '', '', '', ''),
(25, 19, '', '', '', '', ''),
(26, 19, '', '', '', '', ''),
(27, 19, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_personal`
--
ALTER TABLE `applicant_personal`
  ADD PRIMARY KEY (`personal_id`);

--
-- Indexes for table `applied_job`
--
ALTER TABLE `applied_job`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `app_picture`
--
ALTER TABLE `app_picture`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `century_skill`
--
ALTER TABLE `century_skill`
  ADD PRIMARY KEY (`cent_id`);

--
-- Indexes for table `city_municipality`
--
ALTER TABLE `city_municipality`
  ADD PRIMARY KEY (`city-municipality_id`);

--
-- Indexes for table `company_logo`
--
ALTER TABLE `company_logo`
  ADD PRIMARY KEY (`com_id_logo`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `dialect`
--
ALTER TABLE `dialect`
  ADD PRIMARY KEY (`dialect_id`);

--
-- Indexes for table `edu_background`
--
ALTER TABLE `edu_background`
  ADD PRIMARY KEY (`edu_bg_id`);

--
-- Indexes for table `elegibility`
--
ALTER TABLE `elegibility`
  ADD PRIMARY KEY (`el_id`);

--
-- Indexes for table `employer_data`
--
ALTER TABLE `employer_data`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `job_fair`
--
ALTER TABLE `job_fair`
  ADD PRIMARY KEY (`jf_id`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_preference`
--
ALTER TABLE `job_preference`
  ADD PRIMARY KEY (`prep_id`);

--
-- Indexes for table `job_skill`
--
ALTER TABLE `job_skill`
  ADD PRIMARY KEY (`job_cent_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `tech_skill`
--
ALTER TABLE `tech_skill`
  ADD PRIMARY KEY (`tech_id`);

--
-- Indexes for table `tec_training`
--
ALTER TABLE `tec_training`
  ADD PRIMARY KEY (`tec_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`wish_id`);

--
-- Indexes for table `work_exp`
--
ALTER TABLE `work_exp`
  ADD PRIMARY KEY (`work_exp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_personal`
--
ALTER TABLE `applicant_personal`
  MODIFY `personal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `applied_job`
--
ALTER TABLE `applied_job`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_picture`
--
ALTER TABLE `app_picture`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `century_skill`
--
ALTER TABLE `century_skill`
  MODIFY `cent_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `company_logo`
--
ALTER TABLE `company_logo`
  MODIFY `com_id_logo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dialect`
--
ALTER TABLE `dialect`
  MODIFY `dialect_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `edu_background`
--
ALTER TABLE `edu_background`
  MODIFY `edu_bg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `elegibility`
--
ALTER TABLE `elegibility`
  MODIFY `el_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `employer_data`
--
ALTER TABLE `employer_data`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `job_fair`
--
ALTER TABLE `job_fair`
  MODIFY `jf_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `job_preference`
--
ALTER TABLE `job_preference`
  MODIFY `prep_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `job_skill`
--
ALTER TABLE `job_skill`
  MODIFY `job_cent_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tech_skill`
--
ALTER TABLE `tech_skill`
  MODIFY `tech_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tec_training`
--
ALTER TABLE `tec_training`
  MODIFY `tec_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_exp`
--
ALTER TABLE `work_exp`
  MODIFY `work_exp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
