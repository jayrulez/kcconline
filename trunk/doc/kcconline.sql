-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2012 at 06:37 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kcconline`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, 'N;'),
('RBAC Manager', '1', NULL, 'N;'),
('student', '2', NULL, 'N;'),
('student', '4', NULL, 'N;'),
('teacher', '1', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, 'Site Administrator', NULL, 'N;'),
('Auth Assignments Manager', 2, 'Manages Role Assignments. RBAM required role.', NULL, 'N;'),
('Auth Items Manager', 2, 'Manages Auth Items. RBAM required role.', NULL, 'N;'),
('Authenticated', 2, 'Default role for users that are logged in. RBAC default role.', 'return !Yii::app()->getUser()->getIsGuest();', 'N;'),
('Guest', 2, 'Default role for users that are not logged in. RBAC default role.', 'return Yii::app()->getUser()->getIsGuest();', 'N;'),
('RBAC Manager', 2, 'Manages Auth Items and Role Assignments. RBAM required role.', NULL, 'N;'),
('student', 2, 'A student', NULL, 'N;'),
('teacher', 2, 'A lecturer', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('RBAC Manager', 'Auth Assignments Manager'),
('RBAC Manager', 'Auth Items Manager');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`uid`, `name`, `description`) VALUES
(1, 'Test Category', 'This is a test category\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `code` varchar(2) NOT NULL DEFAULT '',
  `country` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`code`, `country`) VALUES
('AD', 'Andorra'),
('AE', 'United Arab Emirates'),
('AF', 'Afghanistan'),
('AG', 'Antigua and Barbuda'),
('AI', 'Anguilla'),
('AL', 'Albania'),
('AM', 'Armenia'),
('AN', 'Netherlands Antilles'),
('AO', 'Angola'),
('AQ', 'Antarctica'),
('AR', 'Argentina'),
('AS', 'American Samoa'),
('AT', 'Austria'),
('AU', 'Australia'),
('AW', 'Aruba'),
('AX', 'Åland Islands'),
('AZ', 'Azerbaijan'),
('BA', 'Bosnia and Herzegovina'),
('BB', 'Barbados'),
('BD', 'Bangladesh'),
('BE', 'Belgium'),
('BF', 'Burkina Faso'),
('BG', 'Bulgaria'),
('BH', 'Bahrain'),
('BI', 'Burundi'),
('BJ', 'Benin'),
('BL', 'Saint Barthélemy'),
('BM', 'Bermuda'),
('BN', 'Brunei Darussalam'),
('BO', 'Bolivia'),
('BR', 'Brazil'),
('BS', 'Bahamas'),
('BT', 'Bhutan'),
('BV', 'Bouvet Island'),
('BW', 'Botswana'),
('BY', 'Belarus'),
('BZ', 'Belize'),
('CA', 'Canada'),
('CC', 'Cocos (Keeling) Islands'),
('CD', 'Congo, The Democratic Republic of the'),
('CF', 'Central African Republic'),
('CG', 'Congo'),
('CH', 'Switzerland'),
('CI', 'Côte D''Ivoire'),
('CK', 'Cook Islands'),
('CL', 'Chile'),
('CM', 'Cameroon'),
('CN', 'China'),
('CO', 'Colombia'),
('CR', 'Costa Rica'),
('CU', 'Cuba'),
('CV', 'Cape Verde'),
('CX', 'Christmas Island'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Germany'),
('DJ', 'Djibouti'),
('DK', 'Denmark'),
('DM', 'Dominica'),
('DO', 'Dominican Republic'),
('DZ', 'Algeria'),
('EC', 'Ecuador'),
('EE', 'Estonia'),
('EG', 'Egypt'),
('EH', 'Western Sahara'),
('ER', 'Eritrea'),
('ES', 'Spain'),
('ET', 'Ethiopia'),
('FI', 'Finland'),
('FJ', 'Fiji'),
('FK', 'Falkland Islands (Malvinas)'),
('FM', 'Micronesia, Federated States of'),
('FO', 'Faroe Islands'),
('FR', 'France'),
('GA', 'Gabon'),
('GB', 'United Kingdom'),
('GD', 'Grenada'),
('GE', 'Georgia'),
('GF', 'French Guiana'),
('GG', 'Guernsey'),
('GH', 'Ghana'),
('GI', 'Gibraltar'),
('GL', 'Greenland'),
('GM', 'Gambia'),
('GN', 'Guinea'),
('GP', 'Guadeloupe'),
('GQ', 'Equatorial Guinea'),
('GR', 'Greece'),
('GS', 'South Georgia and the South Sandwich Islands'),
('GT', 'Guatemala'),
('GU', 'Guam'),
('GW', 'Guinea-Bissau'),
('GY', 'Guyana'),
('HK', 'Hong Kong'),
('HM', 'Heard Island and McDonald Islands'),
('HN', 'Honduras'),
('HR', 'Croatia'),
('HT', 'Haiti'),
('HU', 'Hungary'),
('ID', 'Indonesia'),
('IE', 'Ireland'),
('IL', 'Israel'),
('IM', 'Isle of Man'),
('IN', 'India'),
('IO', 'British Indian Ocean Territory'),
('IQ', 'Iraq'),
('IR', 'Iran, Islamic Republic of'),
('IS', 'Iceland'),
('IT', 'Italy'),
('JE', 'Jersey'),
('JM', 'Jamaica'),
('JO', 'Jordan'),
('JP', 'Japan'),
('KE', 'Kenya'),
('KG', 'Kyrgyzstan'),
('KH', 'Cambodia'),
('KI', 'Kiribati'),
('KM', 'Comoros'),
('KN', 'Saint Kitts and Nevis'),
('KP', 'Korea, Democratic People''s Republic of'),
('KR', 'Korea, Republic of'),
('KW', 'Kuwait'),
('KY', 'Cayman Islands'),
('KZ', 'Kazakhstan'),
('LA', 'Lao People''s Democratic Republic'),
('LB', 'Lebanon'),
('LC', 'Saint Lucia'),
('LI', 'Liechtenstein'),
('LK', 'Sri Lanka'),
('LR', 'Liberia'),
('LS', 'Lesotho'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('LY', 'Libyan Arab Jamahiriya'),
('MA', 'Morocco'),
('MC', 'Monaco'),
('MD', 'Moldova, Republic of'),
('ME', 'Montenegro'),
('MF', 'Saint Martin'),
('MG', 'Madagascar'),
('MH', 'Marshall Islands'),
('MK', 'Macedonia, The Former Yugoslav Republic of'),
('ML', 'Mali'),
('MM', 'Myanmar'),
('MN', 'Mongolia'),
('MO', 'Macao'),
('MP', 'Northern Mariana Islands'),
('MQ', 'Martinique'),
('MR', 'Mauritania'),
('MS', 'Montserrat'),
('MT', 'Malta'),
('MU', 'Mauritius'),
('MV', 'Maldives'),
('MW', 'Malawi'),
('MX', 'Mexico'),
('MY', 'Malaysia'),
('MZ', 'Mozambique'),
('NA', 'Namibia'),
('NC', 'New Caledonia'),
('NE', 'Niger'),
('NF', 'Norfolk Island'),
('NG', 'Nigeria'),
('NI', 'Nicaragua'),
('NL', 'Netherlands'),
('NO', 'Norway'),
('NP', 'Nepal'),
('NR', 'Nauru'),
('NU', 'Niue'),
('NZ', 'New Zealand'),
('OM', 'Oman'),
('PA', 'Panama'),
('PE', 'Peru'),
('PF', 'French Polynesia'),
('PG', 'Papua New Guinea'),
('PH', 'Philippines'),
('PK', 'Pakistan'),
('PL', 'Poland'),
('PM', 'Saint Pierre and Miquelon'),
('PN', 'Pitcairn'),
('PR', 'Puerto Rico'),
('PS', 'Palestinian Territory, Occupied'),
('PT', 'Portugal'),
('PW', 'Palau'),
('PY', 'Paraguay'),
('QA', 'Qatar'),
('RE', 'Reunion'),
('RO', 'Romania'),
('RS', 'Serbia'),
('RU', 'Russian Federation'),
('RW', 'Rwanda'),
('SA', 'Saudi Arabia'),
('SB', 'Solomon Islands'),
('SC', 'Seychelles'),
('SD', 'Sudan'),
('SE', 'Sweden'),
('SG', 'Singapore'),
('SH', 'Saint Helena'),
('SI', 'Slovenia'),
('SJ', 'Svalbard and Jan Mayen'),
('SK', 'Slovakia'),
('SL', 'Sierra Leone'),
('SM', 'San Marino'),
('SN', 'Senegal'),
('SO', 'Somalia'),
('SR', 'Suriname'),
('ST', 'Sao Tome and Principe'),
('SV', 'El Salvador'),
('SY', 'Syrian Arab Republic'),
('SZ', 'Swaziland'),
('TC', 'Turks and Caicos Islands'),
('TD', 'Chad'),
('TF', 'French Southern Territories'),
('TG', 'Togo'),
('TH', 'Thailand'),
('TJ', 'Tajikistan'),
('TK', 'Tokelau'),
('TL', 'Timor-Leste'),
('TM', 'Turkmenistan'),
('TN', 'Tunisia'),
('TO', 'Tonga'),
('TR', 'Turkey'),
('TT', 'Trinidad and Tobago'),
('TV', 'Tuvalu'),
('TW', 'Taiwan, Province Of China'),
('TZ', 'Tanzania, United Republic of'),
('UA', 'Ukraine'),
('UG', 'Uganda'),
('UM', 'United States Minor Outlying Islands'),
('US', 'United States'),
('UY', 'Uruguay'),
('UZ', 'Uzbekistan'),
('VA', 'Holy See (Vatican City State)'),
('VC', 'Saint Vincent and the Grenadines'),
('VE', 'Venezuela'),
('VG', 'Virgin Islands, British'),
('VI', 'Virgin Islands, U.S.'),
('VN', 'Viet Nam'),
('VU', 'Vanuatu'),
('WF', 'Wallis And Futuna'),
('WS', 'Samoa'),
('YE', 'Yemen'),
('YT', 'Mayotte'),
('ZA', 'South Africa'),
('ZM', 'Zambia'),
('ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_code` varchar(16) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `datetime_created` datetime NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `key_required` tinyint(1) DEFAULT '0',
  `enrollment_key` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`course_code`),
  KEY `fk_course_category` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `name`, `category_id`, `description`, `datetime_created`, `last_modified`, `key_required`, `enrollment_key`) VALUES
('CIT4030', 'Introduction to Information Technology', 1, '', '2012-05-14 00:11:23', '2012-05-26 04:23:36', 0, ''),
('MAT1001', 'College Mathematics', 1, '', '2012-05-26 04:28:26', NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `course_graded_work`
--

CREATE TABLE IF NOT EXISTS `course_graded_work` (
  `course_code` varchar(16) NOT NULL,
  `graded_work_id` bigint(20) NOT NULL,
  PRIMARY KEY (`graded_work_id`),
  KEY `fk_course_graded_work_course` (`course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_graded_work`
--

INSERT INTO `course_graded_work` (`course_code`, `graded_work_id`) VALUES
('CIT4030', 1022),
('CIT4030', 1023),
('CIT4030', 1039),
('MAT1001', 1024);

-- --------------------------------------------------------

--
-- Table structure for table `course_instructor`
--

CREATE TABLE IF NOT EXISTS `course_instructor` (
  `course_code` varchar(16) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `datetime_assigned` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`course_code`),
  KEY `fk_course_instructor_course` (`course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_instructor`
--

INSERT INTO `course_instructor` (`course_code`, `user_id`, `datetime_assigned`) VALUES
('CIT4030', '1', '2012-05-28 00:01:09'),
('MAT1001', '1', '2012-05-28 00:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE IF NOT EXISTS `enrollment` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `enroll_startdatetime` datetime DEFAULT NULL,
  `enroll_enddatetime` datetime DEFAULT NULL,
  `datetime_created` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1054 ;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`uid`, `enroll_startdatetime`, `enroll_enddatetime`, `datetime_created`) VALUES
(1053, '2012-05-08 00:00:00', '2012-05-08 00:00:00', '2012-05-26 04:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `graded_work`
--

CREATE TABLE IF NOT EXISTS `graded_work` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `datetime_created` datetime NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `max_raw_grade` decimal(10,5) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `fk_grade_work_type` (`type`),
  KEY `fk_grade_work_creator` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1040 ;

--
-- Dumping data for table `graded_work`
--

INSERT INTO `graded_work` (`uid`, `title`, `type`, `datetime_created`, `created_by`, `description`, `max_raw_grade`) VALUES
(1022, 'IT Mid Term Exam', 1001, '2012-05-27 18:55:36', '1', '', NULL),
(1023, 'ICT In Today''s Business Enviroment', 1003, '2012-05-28 00:30:13', '1', '', NULL),
(1024, 'Differentiation Quiz 1', 1005, '2012-05-28 00:52:18', '1', '', NULL),
(1039, 'Humand and Computers', 1005, '2012-05-29 23:08:39', '1', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `graded_work_type`
--

CREATE TABLE IF NOT EXISTS `graded_work_type` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1006 ;

--
-- Dumping data for table `graded_work_type`
--

INSERT INTO `graded_work_type` (`uid`, `name`, `description`) VALUES
(1001, 'Mid Term Exam', 'An Examination that students take during the middle of a school term.'),
(1002, 'Final Exam', 'An Examination that falls at the end of the semester'),
(1003, 'Project', ''),
(1004, 'Assignment', ''),
(1005, 'Quiz', '');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `letter_grade`
--

CREATE TABLE IF NOT EXISTS `letter_grade` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `letter` varchar(2) NOT NULL,
  `upper_grade` decimal(10,5) DEFAULT NULL,
  `lower_grade` decimal(10,5) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `unq_letter_grade` (`letter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` varchar(32) NOT NULL,
  `first_name` varchar(75) NOT NULL,
  `middle_name` varchar(75) DEFAULT NULL,
  `last_name` varchar(75) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `email_address` varchar(252) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  `datetime_created` datetime NOT NULL,
  `last_action` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `country_code` varchar(2) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `unq_user_email` (`email_address`),
  KEY `fk_user_country` (`country_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `first_name`, `middle_name`, `last_name`, `dob`, `email_address`, `password`, `phone1`, `phone2`, `active`, `deleted`, `datetime_created`, `last_action`, `last_modified`, `image_url`, `country_code`) VALUES
('1', 'Dyonne', 'S', 'Duberry', '1989-06-28 00:00:00', 'deonsbedroom@gmail.com', '25d55ad283aa400af464c76d713c07ad', '8767904494', '', 1, 0, '2012-05-13 16:18:07', '2012-05-30 13:30:07', '2012-05-26 06:00:38', '1.jpg', 'JM'),
('2', 'Dale', '', 'McFarlane', '1989-05-15 00:00:00', 'sync.mcfarlene@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '', 1, 0, '2012-05-13 22:29:59', '2012-05-30 08:41:09', '2012-05-24 06:50:30', '0801042.jpg', 'JM'),
('4', 'Audley', 'A', 'Gordon', '1989-05-10 00:00:00', 'audleyagordon', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', 1, 0, '2012-05-24 06:49:28', NULL, NULL, '0802218.jpg', 'JM');

-- --------------------------------------------------------

--
-- Table structure for table `user_course_enrollment`
--

CREATE TABLE IF NOT EXISTS `user_course_enrollment` (
  `enrollment_id` bigint(20) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `course_code` varchar(16) NOT NULL,
  `enrolled_by` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`,`course_code`),
  KEY `fk_user_course_en_en` (`enrollment_id`),
  KEY `fk_user_course_en_course` (`course_code`),
  KEY `fk_user_course_en_by` (`enrolled_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_course_enrollment`
--

INSERT INTO `user_course_enrollment` (`enrollment_id`, `user_id`, `course_code`, `enrolled_by`) VALUES
(1053, '2', 'CIT4030', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_graded_work`
--

CREATE TABLE IF NOT EXISTS `user_graded_work` (
  `graded_work_id` bigint(20) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `letter_grade_id` int(11) DEFAULT NULL,
  `raw_grade` decimal(10,5) DEFAULT NULL,
  `percent_grade` decimal(10,5) DEFAULT NULL,
  `graded_by` varchar(32) DEFAULT NULL,
  `datetime_entered` datetime DEFAULT NULL,
  `datetime_graded` datetime DEFAULT NULL,
  `graded_status` varchar(20) DEFAULT 'Pending',
  PRIMARY KEY (`graded_work_id`,`user_id`),
  KEY `fk_user_graded_work_grader` (`graded_by`),
  KEY `fk_user_graded_work_letter` (`letter_grade_id`),
  KEY `fk_user_graded_work_student` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_graded_work`
--

INSERT INTO `user_graded_work` (`graded_work_id`, `user_id`, `letter_grade_id`, `raw_grade`, `percent_grade`, `graded_by`, `datetime_entered`, `datetime_graded`, `graded_status`) VALUES
(1039, '4', NULL, '65.00000', NULL, '1', '2012-05-30 12:50:18', '2012-05-08 00:00:00', 'Graded');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`uid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `course_graded_work`
--
ALTER TABLE `course_graded_work`
  ADD CONSTRAINT `fk_course_graded_work_work` FOREIGN KEY (`graded_work_id`) REFERENCES `graded_work` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_course_graded_work_course` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_instructor`
--
ALTER TABLE `course_instructor`
  ADD CONSTRAINT `fk_course_instructor_course` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `graded_work`
--
ALTER TABLE `graded_work`
  ADD CONSTRAINT `fk_grade_work_creator` FOREIGN KEY (`created_by`) REFERENCES `user` (`uid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grade_work_type` FOREIGN KEY (`type`) REFERENCES `graded_work_type` (`uid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_country` FOREIGN KEY (`country_code`) REFERENCES `country` (`code`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user_course_enrollment`
--
ALTER TABLE `user_course_enrollment`
  ADD CONSTRAINT `fk_user_course_en_by` FOREIGN KEY (`enrolled_by`) REFERENCES `user` (`uid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_course_en_course` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_course_en_en` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollment` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_course_en_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user_graded_work`
--
ALTER TABLE `user_graded_work`
  ADD CONSTRAINT `fk_user_graded_work_grader` FOREIGN KEY (`graded_by`) REFERENCES `user` (`uid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_graded_work_letter` FOREIGN KEY (`letter_grade_id`) REFERENCES `letter_grade` (`uid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_graded_work_student` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_graded_work_work` FOREIGN KEY (`graded_work_id`) REFERENCES `graded_work` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
