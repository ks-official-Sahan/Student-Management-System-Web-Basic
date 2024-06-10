-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.24 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table mydb.academic_officers
CREATE TABLE IF NOT EXISTS `academic_officers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender_id` int NOT NULL,
  `nic` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status_id` int NOT NULL,
  `verification_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` text,
  `verification_code2` varchar(50) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`),
  KEY `fk_academic_officers_status1_idx` (`status_id`),
  KEY `fk_academic_officers_gender1_idx` (`gender_id`),
  CONSTRAINT `fk_academic_officers_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_academic_officers_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.academic_officers: ~2 rows (approximately)
/*!40000 ALTER TABLE `academic_officers` DISABLE KEYS */;
INSERT INTO `academic_officers` (`id`, `fname`, `lname`, `dob`, `gender_id`, `nic`, `mobile`, `address`, `user_name`, `password`, `email`, `status_id`, `verification_code`, `image`, `verification_code2`, `notes`) VALUES
	(3, 'Pemadasa', 'gamage', '1968-04-09', 1, '196812890789', '0705771476', 'No:2213,Nidahas Mawath, Moraketiya,Embilipitiya', 'thaththa', 'thaththa123', 'jayanath20@gmail.com', 1, '', 'profile_img//62714d9831f2frelax9.jpg', '62760b964b6fa', 'Send results for the students of their assignments'),
	(9, 'Akila', 'Udayanga', '2000-06-05', 1, '200015600789', '0765784475', 'No:85,inner Rd,moragahahena.', 'akila', 'akila123', 'akilaudayanga@gmail.com', 2, '627753293b1b0', 'profile_img//627753293b1b6IMG_5602.JPG', NULL, NULL);
/*!40000 ALTER TABLE `academic_officers` ENABLE KEYS */;

-- Dumping structure for table mydb.academic_officers_has_teachers
CREATE TABLE IF NOT EXISTS `academic_officers_has_teachers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `academic_officers_id` int NOT NULL,
  `teachers_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_academic_officers_has_teachers_academic_officers1_idx` (`academic_officers_id`),
  KEY `fk_academic_officers_has_teachers_teachers1_idx` (`teachers_id`),
  CONSTRAINT `fk_academic_officers_has_teachers_academic_officers1` FOREIGN KEY (`academic_officers_id`) REFERENCES `academic_officers` (`id`),
  CONSTRAINT `fk_academic_officers_has_teachers_teachers1` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.academic_officers_has_teachers: ~1 rows (approximately)
/*!40000 ALTER TABLE `academic_officers_has_teachers` DISABLE KEYS */;
INSERT INTO `academic_officers_has_teachers` (`id`, `academic_officers_id`, `teachers_id`) VALUES
	(2, 3, 7);
/*!40000 ALTER TABLE `academic_officers_has_teachers` ENABLE KEYS */;

-- Dumping structure for table mydb.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `gender_id` int NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `image` text,
  PRIMARY KEY (`id`),
  KEY `fk_admin_gender1_idx` (`gender_id`),
  CONSTRAINT `fk_admin_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `user_name`, `password`, `gender_id`, `fname`, `lname`, `email`, `image`) VALUES
	(1, 'Charith', 'Cj2@@@5!2', 1, 'Charith', 'Jayanath', 'jayanathbgc@gmail.com', 'profile_img//62713e58a9320IMG_7736.JPG');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table mydb.assignments
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int NOT NULL,
  `teachers_id` int NOT NULL,
  `subjects_id` int NOT NULL,
  `grade` varchar(3) DEFAULT NULL,
  `duration` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pdf` text,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assignments_teachers1_idx` (`teachers_id`),
  KEY `fk_assignments_subjects1_idx` (`subjects_id`),
  CONSTRAINT `fk_assignments_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `fk_assignments_teachers1` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.assignments: ~6 rows (approximately)
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;
INSERT INTO `assignments` (`id`, `teachers_id`, `subjects_id`, `grade`, `duration`, `pdf`, `datetime`) VALUES
	(13270, 6, 3, '10', '2 weeks', 'pdf//62a1b0103fa5dWeb Programming 1 - Research_H7DT_04_EX_01.pdf', '2022-06-09 14:02:16'),
	(14679, 7, 1, '12', '1 week', 'pdf//62a1b29801138Web Programming 1 - Research_H7DT_04_EX_01.pdf', '2022-06-09 14:13:04'),
	(16258, 7, 1, '12', 'Wakya rachnaya', 'pdf//62a1b0ccbadaeWeb Programming 1 - Research_H7DT_04_EX_01.pdf', '2022-06-09 14:05:24'),
	(46803, 5, 2, '12', '1 week', 'pdf//62a1b08622a2bWeb Programming 1 - Research_H7DT_04_EX_01.pdf', '2022-06-09 14:04:14'),
	(70162, 7, 1, '12', '1 week', 'pdf//62a1869363e13Web Programming 1 - Research_H7DT_04_EX_01.pdf', '2022-06-09 11:05:15');
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;

-- Dumping structure for table mydb.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.gender: ~2 rows (approximately)
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` (`id`, `name`) VALUES
	(1, 'Male'),
	(2, 'Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;

-- Dumping structure for table mydb.lecture_notes
CREATE TABLE IF NOT EXISTS `lecture_notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teachers_id` int NOT NULL,
  `subjects_id` int NOT NULL,
  `grade` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `topic` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `pdf` text,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lecture_notes_subjects1_idx` (`subjects_id`),
  KEY `fk_lecture_notes_teachers1_idx` (`teachers_id`),
  CONSTRAINT `fk_lecture_notes_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `fk_lecture_notes_teachers1` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84604 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.lecture_notes: ~1 rows (approximately)
/*!40000 ALTER TABLE `lecture_notes` DISABLE KEYS */;
INSERT INTO `lecture_notes` (`id`, `teachers_id`, `subjects_id`, `grade`, `topic`, `pdf`, `datetime`) VALUES
	(74310, 7, 1, '12', 'Samasa', 'pdf//62a1874a3da30Web Programming 1 - Research_H7DT_04_EX_01.pdf', '2022-06-09 11:08:18'),
	(80136, 5, 2, '12', 'Respiration System', 'pdf//62a1b0ab089ceWeb Programming 1 - Research_H7DT_04_EX_01.pdf', '2022-06-09 14:04:51'),
	(84603, 7, 1, '10', 'Karma karaka', 'pdf//62a1877d3dd63Web Programming 1 - Research_H7DT_04_EX_01.pdf', '2022-06-09 11:09:09');
/*!40000 ALTER TABLE `lecture_notes` ENABLE KEYS */;

-- Dumping structure for table mydb.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `students_id` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `grade` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_students1_idx` (`students_id`),
  CONSTRAINT `fk_payment_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.payment: ~4 rows (approximately)
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` (`id`, `students_id`, `date`, `amount`, `grade`) VALUES
	(4, 4, '2022-05-06 17:14:33', 108000, '12'),
	(5, 3, '2022-05-06 17:19:44', 9000, '12'),
	(6, 3, '2022-05-06 17:25:24', 9000, '12'),
	(7, 3, '2022-05-06 17:26:14', 9000, '12');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;

-- Dumping structure for table mydb.payment_status
CREATE TABLE IF NOT EXISTS `payment_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.payment_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `payment_status` DISABLE KEYS */;
INSERT INTO `payment_status` (`id`, `name`) VALUES
	(1, 'Paid'),
	(2, 'Conferming'),
	(3, 'Have to pay'),
	(4, 'Trail period');
/*!40000 ALTER TABLE `payment_status` ENABLE KEYS */;

-- Dumping structure for table mydb.payment_structures
CREATE TABLE IF NOT EXISTS `payment_structures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.payment_structures: ~2 rows (approximately)
/*!40000 ALTER TABLE `payment_structures` DISABLE KEYS */;
INSERT INTO `payment_structures` (`id`, `name`) VALUES
	(1, 'Monthly'),
	(2, 'Semester'),
	(3, 'Yearly');
/*!40000 ALTER TABLE `payment_structures` ENABLE KEYS */;

-- Dumping structure for table mydb.prices
CREATE TABLE IF NOT EXISTS `prices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grade` int NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.prices: ~11 rows (approximately)
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;
INSERT INTO `prices` (`id`, `grade`, `price`) VALUES
	(1, 1, 45000),
	(2, 2, 48000),
	(3, 3, 55000),
	(4, 4, 60000),
	(5, 5, 60000),
	(6, 6, 75000),
	(7, 7, 75000),
	(8, 8, 75000),
	(9, 9, 75000),
	(10, 10, 90000),
	(11, 11, 90000),
	(12, 12, 108000),
	(13, 13, 108000);
/*!40000 ALTER TABLE `prices` ENABLE KEYS */;

-- Dumping structure for table mydb.resultsheets
CREATE TABLE IF NOT EXISTS `resultsheets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `students_id` int NOT NULL,
  `marks` varchar(45) DEFAULT NULL,
  `teachers_id` int NOT NULL,
  `assignments_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_resultsheet_students1_idx` (`students_id`),
  KEY `fk_resultsheet_teachers1_idx` (`teachers_id`),
  KEY `FK_resultsheets_assignments` (`assignments_id`) USING BTREE,
  CONSTRAINT `fk_resultsheet_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`),
  CONSTRAINT `fk_resultsheet_teachers1` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`),
  CONSTRAINT `FK_resultsheets_assignments` FOREIGN KEY (`assignments_id`) REFERENCES `assignments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.resultsheets: ~2 rows (approximately)
/*!40000 ALTER TABLE `resultsheets` DISABLE KEYS */;
INSERT INTO `resultsheets` (`id`, `students_id`, `marks`, `teachers_id`, `assignments_id`) VALUES
	(6, 3, '88', 7, 70162),
	(7, 3, '66', 7, 16258),
	(8, 3, '50', 7, 14679),
	(9, 3, '80', 5, 46803);
/*!40000 ALTER TABLE `resultsheets` ENABLE KEYS */;

-- Dumping structure for table mydb.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.status: ~2 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Varified'),
	(2, 'Not Verified');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table mydb.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender_id` int NOT NULL,
  `grade` varchar(3) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `address` text,
  `email` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status_id` int NOT NULL,
  `verification_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `payment_status_id` int NOT NULL,
  `image` text,
  `payment_structures_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `verification_code2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_students_status1_idx` (`status_id`),
  KEY `fk_students_payment_status1_idx` (`payment_status_id`),
  KEY `fk_students_gender1_idx` (`gender_id`),
  KEY `FK_students_payment_structures` (`payment_structures_id`),
  CONSTRAINT `fk_students_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_students_payment_status1` FOREIGN KEY (`payment_status_id`) REFERENCES `payment_status` (`id`),
  CONSTRAINT `FK_students_payment_structures` FOREIGN KEY (`payment_structures_id`) REFERENCES `payment_structures` (`id`),
  CONSTRAINT `fk_students_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.students: ~3 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `fname`, `lname`, `dob`, `gender_id`, `grade`, `mobile`, `address`, `email`, `user_name`, `password`, `status_id`, `verification_code`, `payment_status_id`, `image`, `payment_structures_id`, `date`, `verification_code2`) VALUES
	(3, 'Ravindu', 'Sathsara', '2005-06-03', 1, '12', '0765676678', 'No:25,Nowodagama Rd,Sewanagala.', 'jayanathbgc@gmail.com', 'ravindu', 'ravi123', 1, '', 4, 'profile_img//62a187e7a658cWhatsApp Image 2022-05-08 at 11.07.27 AM.jpeg', 1, '2022-04-26', '62760873a1dca'),
	(4, 'Sugath', 'Sameera', '2004-06-16', 1, '12', '0769089900', 'No:56,Moraketiya,Embilipitiya', 'sameera2000@gmail.com', 'sameera', 'sameera123', 1, '', 1, 'Images//contact.png', 3, '2022-05-01', NULL),
	(5, 'Asanka', 'Senadheera', '2006-03-01', 1, '11', '0757893478', 'No:289,Piliynadala,Maharagama', 'asanka68@gmail.com', 'asanka', 'asanka123', 2, '6274229ff18f5', 4, 'Images//contact.png', 2, '2022-05-03', NULL),
	(6, 'Arun', 'Perera', '2007-03-09', 1, '10', '0785656789', 'no:223,Thel deniya,Monaragala', 'prera@gmail.com', 'arun', 'arun123', 1, '', 3, 'profile_img//62a1af7a6b533relax2.jpg', 2, '2022-06-09', NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table mydb.subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.subjects: ~11 rows (approximately)
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `name`) VALUES
	(1, 'Sinhala'),
	(2, 'Science'),
	(3, 'Mathermatics'),
	(4, 'English'),
	(5, 'Tamil'),
	(6, 'History'),
	(7, 'Buddhism'),
	(8, 'Music'),
	(9, 'Art'),
	(10, 'Dance'),
	(11, 'Drama'),
	(12, 'Health and sports');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Dumping structure for table mydb.submissions
CREATE TABLE IF NOT EXISTS `submissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `assignments_id` int NOT NULL,
  `students_id` int NOT NULL,
  `pdf` text,
  `marks` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_submissions_assignments1_idx` (`assignments_id`),
  KEY `fk_submissions_students1_idx` (`students_id`),
  CONSTRAINT `fk_submissions_assignments1` FOREIGN KEY (`assignments_id`) REFERENCES `assignments` (`id`),
  CONSTRAINT `fk_submissions_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.submissions: ~2 rows (approximately)
/*!40000 ALTER TABLE `submissions` DISABLE KEYS */;
INSERT INTO `submissions` (`id`, `assignments_id`, `students_id`, `pdf`, `marks`) VALUES
	(7, 70162, 3, 'pdf//62a1c27d6af25Web Programming 1 - Research_H7DT_04_EX_01.pdf', '88'),
	(8, 16258, 3, 'pdf//62a1b127b339fWeb Programming 1 - Research_H7DT_04_EX_01.pdf', '66'),
	(14, 46803, 3, 'pdf//62a1c24df0a6bWeb Programming 1 - Research_H7DT_04_EX_01.pdf', NULL),
	(15, 14679, 3, 'pdf//62a1c265e8658Web Programming 1 - Research_H7DT_04_EX_01.pdf', '50');
/*!40000 ALTER TABLE `submissions` ENABLE KEYS */;

-- Dumping structure for table mydb.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender_id` int NOT NULL,
  `nic` varchar(15) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `address` text,
  `email` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `status_id` int NOT NULL,
  `verification_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` text,
  `verification_code2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teachers_status1_idx` (`status_id`),
  KEY `fk_teachers_gender1_idx` (`gender_id`),
  CONSTRAINT `fk_teachers_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_teachers_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.teachers: ~3 rows (approximately)
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` (`id`, `fname`, `lname`, `dob`, `gender_id`, `nic`, `mobile`, `address`, `email`, `user_name`, `password`, `status_id`, `verification_code`, `image`, `verification_code2`) VALUES
	(5, 'Danindu', 'Kareendra', '2003-12-30', 1, '200312900389', '0710833566', 'No:2213,Nidahas Mawath, Moraketiya,Embilipitiya.', 'danindu25@gmail.com', 'danindu', 'danindu123', 1, '', 'profile_img//627151aa339ebIMG_8799.JPG', NULL),
	(6, 'Charith', 'Jayanath', '2020-05-12', 1, '200013300395', '0705771475', 'No:2213,Nidahas Mawath, Moraketiya,Embilipitiya', 'jayanathbgc@gmail.com', 'CJ', 'charith123', 1, '', 'profile_img//626cdecab1dd8IMG_4491.JPG', NULL),
	(7, 'Wimalawathi', 'Pathirange', '1968-03-06', 2, '196890334905v', '0714625789', 'No:2213,Nidahas Mawath, Moraketiya,Embilipitiya.', 'wimala68@gmail.com', 'amma', 'amma123', 1, '', 'Images//contact.png', NULL);
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;

-- Dumping structure for table mydb.teacher_has_subjects
CREATE TABLE IF NOT EXISTS `teacher_has_subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teachers_id` int NOT NULL,
  `subjects_id` int NOT NULL,
  `grade` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_table1_teachers_idx` (`teachers_id`),
  KEY `fk_table1_subjects1_idx` (`subjects_id`),
  CONSTRAINT `fk_table1_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `fk_table1_teachers` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table mydb.teacher_has_subjects: ~3 rows (approximately)
/*!40000 ALTER TABLE `teacher_has_subjects` DISABLE KEYS */;
INSERT INTO `teacher_has_subjects` (`id`, `teachers_id`, `subjects_id`, `grade`) VALUES
	(5, 5, 2, '12'),
	(6, 6, 3, '10'),
	(7, 7, 1, '12');
/*!40000 ALTER TABLE `teacher_has_subjects` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
