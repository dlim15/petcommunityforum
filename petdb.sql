-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2016 at 12:14 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `Adopt_post_id` int(11) NOT NULL,
  `Post_id` int(11) DEFAULT NULL,
  `Price` float NOT NULL,
  `Availability` tinyint(1) NOT NULL,
  `Pet_age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adoption`
--

INSERT INTO `adoption` (`Adopt_post_id`, `Post_id`, `Price`, `Availability`, `Pet_age`) VALUES
(1, 6, 25, 1, 10),
(2, 8, 50, 0, 5),
(3, 9, 0, 1, 2),
(4, 10, 0, 1, 3),
(5, 11, 22, 1, 15),
(6, 12, 100, 1, 2),
(7, 13, 45, 1, 12),
(8, 36, 300, 0, 2),
(9, 37, 0, 1, 4),
(10, 42, 0, 1, 4),
(11, 60, 0, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `care`
--

CREATE TABLE `care` (
  `Care_post_id` int(11) NOT NULL,
  `Post_id` int(11) DEFAULT NULL,
  `Daily_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care`
--

INSERT INTO `care` (`Care_post_id`, `Post_id`, `Daily_cost`) VALUES
(1, 26, 15),
(2, 39, 15),
(3, 52, 12),
(4, 55, 21);

-- --------------------------------------------------------

--
-- Table structure for table `cared`
--

CREATE TABLE `cared` (
  `Cared_post_id` int(11) NOT NULL,
  `Post_id` int(11) DEFAULT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cared`
--

INSERT INTO `cared` (`Cared_post_id`, `Post_id`, `Start_date`, `End_date`) VALUES
(5, 31, '2016-06-09', '2016-06-10'),
(6, 35, '2016-06-06', '2016-06-09'),
(7, 41, '2016-06-14', '2016-06-16'),
(8, 51, '2016-06-06', '2016-06-08'),
(9, 53, '2016-06-07', '2016-06-09'),
(10, 54, '2016-06-07', '2016-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `found`
--

CREATE TABLE `found` (
  `Found_post_id` int(11) NOT NULL,
  `Post_id` int(11) DEFAULT NULL,
  `Found_date` date NOT NULL,
  `isReturned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `found`
--

INSERT INTO `found` (`Found_post_id`, `Post_id`, `Found_date`, `isReturned`) VALUES
(2, 24, '2016-06-04', 0),
(3, 25, '2016-06-14', 1),
(4, 38, '2016-06-10', 0),
(5, 43, '2016-06-08', 0),
(6, 46, '2016-06-01', 1),
(7, 47, '2016-06-01', 1),
(8, 50, '2016-06-15', 0),
(9, 56, '2016-06-06', 1),
(10, 57, '2016-06-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lost`
--

CREATE TABLE `lost` (
  `Lost_post_id` int(11) NOT NULL,
  `Post_id` int(11) DEFAULT NULL,
  `Lost_date` date NOT NULL,
  `isMissing` tinyint(1) NOT NULL,
  `Pet_age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lost`
--

INSERT INTO `lost` (`Lost_post_id`, `Post_id`, `Lost_date`, `isMissing`, `Pet_age`) VALUES
(1, 16, '0000-00-00', 1, 5),
(7, 22, '2016-06-01', 1, 12),
(8, 40, '2016-06-07', 1, 5),
(9, 44, '2016-06-07', 1, 2),
(10, 44, '2016-06-08', 1, 3),
(11, 48, '2016-06-21', 1, 1),
(12, 49, '2016-06-15', 0, 21),
(13, 58, '2016-06-01', 1, 12),
(14, 59, '2016-06-08', 1, 2),
(15, 61, '2016-06-11', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `Sender` varchar(12) NOT NULL,
  `Receiver` varchar(12) NOT NULL,
  `Message_id` int(11) NOT NULL,
  `Contents` text NOT NULL,
  `receivedTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`Sender`, `Receiver`, `Message_id`, `Contents`, `receivedTime`) VALUES
('test123', 'kHilton', 1, 'ey hows it goin yo', '2016-06-09 16:21:11'),
('kHilton', 'test123', 1, 'yo wuhts up mang', '2016-06-09 16:21:44'),
('test123', 'kHilton', 1, 'Nothing special dawg. Wuht u up to', '2016-06-09 16:22:11'),
('test123', 'kHilton', 1, '', '2016-06-11 22:54:42'),
('test123', 'kHilton', 1, '', '2016-06-11 22:55:00'),
('test123', 'kHilton', 1, 'ya', '2016-06-11 22:57:06'),
('test123', 'kHilton', 1, 'yay!', '2016-06-11 22:57:10'),
('test123', 'kHilton', 1, 'wusup!', '2016-06-11 22:57:14'),
('test123', 'kHilton', 1, 'Yolo!', '2016-06-11 22:57:24'),
('test123', 'kHilton', 1, 'yo!', '2016-06-11 22:58:05'),
('kHilton', 'test123', 1, 'sup', '2016-06-11 23:16:26'),
('test123', 'kHilton', 1, 'yo\n', '2016-06-11 23:16:32'),
('kHilton', 'test123', 1, 'aa', '2016-06-11 23:18:16'),
('kHilton', 'test123', 1, 'aa', '2016-06-11 23:18:17'),
('kHilton', 'test123', 1, 'ya', '2016-06-11 23:18:29'),
('kHilton', 'test123', 1, 'a', '2016-06-11 23:54:14'),
('test123', 'kHilton', 1, 'a', '2016-06-11 23:54:17'),
('test123', 'kHilton', 1, 'aa', '2016-06-11 23:54:48'),
('kHilton', 'test123', 1, 'a', '2016-06-11 23:54:52'),
('test123', 'kHilton', 1, 'a', '2016-06-11 23:55:05'),
('kHilton', 'test123', 1, 'a', '2016-06-11 23:55:09'),
('test123', 'kHilton', 1, 'yas', '2016-06-11 23:55:13'),
('kHilton', 'test123', 1, 'haha', '2016-06-11 23:55:17'),
('kHilton', 'test123', 1, 'yaya', '2016-06-11 23:55:41'),
('test123', 'kHilton', 1, 'yayaaa', '2016-06-11 23:55:42'),
('kHilton', 'test123', 1, 'haa', '2016-06-11 23:55:52'),
('test123', 'kHilton', 1, 'tata', '2016-06-11 23:55:53'),
('kHilton', 'test123', 1, 'haa', '2016-06-11 23:55:59'),
('test123', 'kHilton', 1, 'aa', '2016-06-11 23:56:15'),
('kHilton', 'test123', 1, 'yaa', '2016-06-11 23:56:20'),
('test123', 'kHilton', 1, 'aa', '2016-06-11 23:57:22'),
('kHilton', 'test123', 1, 'aa', '2016-06-11 23:57:27'),
('test123', 'kHilton', 1, 'yaya', '2016-06-11 23:57:30'),
('kHilton', 'test123', 1, 'aayaya', '2016-06-11 23:57:34'),
('kHilton', 'test123', 1, 'haha', '2016-06-11 23:57:38'),
('kHilton', 'test123', 1, 'haha', '2016-06-11 23:57:39'),
('kHilton', 'test123', 1, 'aa', '2016-06-11 23:59:48'),
('test123', 'kHilton', 1, 'ya', '2016-06-11 23:59:54'),
('kHilton', 'test123', 1, 'a', '2016-06-12 00:00:46'),
('kHilton', 'test123', 1, 'kk', '2016-06-12 00:01:29'),
('kHilton', 'test123', 1, 'a', '2016-06-12 00:06:04'),
('kHilton', 'test123', 1, 'ya', '2016-06-12 00:06:07'),
('test123', 'kHilton', 1, 'ya\n', '2016-06-12 00:06:24'),
('kHilton', 'test123', 1, 'ya', '2016-06-12 00:06:27'),
('test123', 'kHilton', 1, 'ey', '2016-06-12 00:06:33'),
('test123', 'kHilton', 1, 'yoyo\n', '2016-06-12 00:06:52'),
('test123', 'kHilton', 1, 'yoyo\n\n', '2016-06-12 00:06:56'),
('test123', 'kHilton', 1, 'haha\n', '2016-06-12 00:07:14'),
('test123', 'kHilton', 1, 'aga', '2016-06-12 00:07:53'),
('test123', 'kHilton', 1, 'yea\n', '2016-06-12 00:07:57'),
('test123', 'kHilton', 1, 'ya', '2016-06-12 00:08:09'),
('test123', 'kHilton', 1, 'ya', '2016-06-12 00:08:15'),
('test123', 'kHilton', 1, 'yaa', '2016-06-12 00:08:18'),
('test123', 'kHilton', 1, 'sup', '2016-06-12 00:08:23'),
('test123', 'kHilton', 1, 'ya', '2016-06-12 00:09:07'),
('test123', 'kHilton', 1, 'ey', '2016-06-12 00:10:10'),
('test123', 'kHilton', 1, 'yer', '2016-06-12 00:10:45'),
('test123', 'kHilton', 1, 'sup', '2016-06-12 00:10:49'),
('test123', 'kHilton', 1, 'as', '2016-06-12 00:11:13'),
('test123', 'kHilton', 1, 'yea', '2016-06-12 00:11:17'),
('test123', 'kHilton', 1, 'asf', '2016-06-12 00:11:38'),
('test123', 'kHilton', 1, 'asf', '2016-06-12 00:12:27'),
('test123', 'kHilton', 1, 'qwer', '2016-06-12 00:12:32'),
('test123', 'kHilton', 1, 'ya', '2016-06-12 00:12:54'),
('test123', 'kHilton', 1, 'ag', '2016-06-12 00:13:01'),
('test123', 'kHilton', 1, 'sadf', '2016-06-12 00:15:00'),
('test123', 'kHilton', 1, 'yea', '2016-06-12 00:15:03'),
('test123', 'kHilton', 1, 'qa', '2016-06-12 00:15:07'),
('test123', 'pJames', 2, 'eyy', '2016-06-12 00:17:32'),
('test123', 'pJames', 2, 'how is it going?\n', '2016-06-12 00:17:38'),
('test123', 'kHilton', 1, 'ag\n', '2016-06-12 00:22:17'),
('test123', 'kHilton', 1, 'yea\n', '2016-06-12 00:22:19'),
('test123', 'kHilton', 1, 'yea\n', '2016-06-12 00:22:24'),
('test123', 'kHilton', 1, '', '2016-06-12 00:22:33'),
('test123', 'kHilton', 1, '\n', '2016-06-12 00:22:41'),
('test123', 'kHilton', 1, 'a\n', '2016-06-12 00:24:17'),
('test123', 'kHilton', 1, '\n', '2016-06-12 00:24:18'),
('test123', 'kHilton', 1, 'a\n', '2016-06-12 00:24:54'),
('test123', 'kHilton', 1, '\n', '2016-06-12 00:24:54'),
('test123', 'kHilton', 1, '\n\n', '2016-06-12 00:26:13'),
('test123', 'kHilton', 1, '\n\n\n\n\n\n\n\n\n', '2016-06-12 00:30:16'),
('test123', 'kHilton', 1, 'ya', '2016-06-12 00:30:18'),
('test123', 'kHilton', 1, 'a', '2016-06-12 00:30:24'),
('test123', 'kHilton', 1, 'ahaha', '2016-06-12 00:30:26'),
('test123', 'kHilton', 1, 'a', '2016-06-12 00:32:14'),
('test123', 'kHilton', 1, 'a', '2016-06-12 00:32:16'),
('kHilton', 'test123', 1, 'hey', '2016-06-12 01:56:38'),
('kHilton', 'test123', 1, 'you there?', '2016-06-12 01:56:47'),
('kHilton', 'test123', 1, 'nya?', '2016-06-12 01:56:59'),
('kHilton', 'test123', 1, 'yea?', '2016-06-12 01:57:06'),
('kHilton', 'test123', 1, 'yea?', '2016-06-12 01:57:32'),
('kHilton', 'test123', 1, 'yea?', '2016-06-12 01:58:15'),
('kHilton', 'test123', 1, 'sup?', '2016-06-12 01:59:03'),
('kHilton', 'test123', 1, 'yup?', '2016-06-12 01:59:08'),
('kHilton', 'test123', 1, 'na??', '2016-06-12 01:59:19'),
('test123', 'kHilton', 1, 'ya', '2016-06-12 02:09:42'),
('test123', 'kHilton', 1, 'wuhsup', '2016-06-12 02:09:47'),
('test123', 'kHilton', 1, 'ya', '2016-06-12 02:44:04'),
('test123', 'kHilton', 1, 'sup', '2016-06-12 02:44:08'),
('test123', 'DSnoop', 4, 'yea', '2016-06-12 03:17:02'),
('test123', 'BThom', 7, 'it works', '2016-06-12 03:17:13'),
('test123', 'kHilton', 1, 'Yea~~', '2016-06-12 16:58:24'),
('test123', 'kHilton', 1, 'ah', '2016-06-12 16:59:20'),
('test123', 'kHilton', 1, 'ah', '2016-06-12 16:59:26'),
('test123', 'kHilton', 1, 'ya', '2016-06-12 16:59:28'),
('test123', 'kHilton', 1, 'qa', '2016-06-12 16:59:30'),
('test123', 'kHilton', 1, 'asg', '2016-06-12 17:00:06'),
('test123', 'kHilton', 1, 'asdf', '2016-06-12 17:00:09'),
('test123', 'kHilton', 1, 'yup', '2016-06-13 09:42:55'),
('test123', 'kHilton', 1, 'yoyo', '2016-06-13 09:42:58'),
('test123', 'DSnoop', 4, 'Snoop dawggg', '2016-06-13 10:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `message_box`
--

CREATE TABLE `message_box` (
  `Message_id` int(11) NOT NULL,
  `My_id` varchar(12) NOT NULL,
  `Other_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_box`
--

INSERT INTO `message_box` (`Message_id`, `My_id`, `Other_id`) VALUES
(1, 'test123', 'kHilton'),
(2, 'pJames', 'test123'),
(3, 'test123', 'aHolla'),
(4, 'test123', 'DSnoop'),
(5, 'test123', 'VLouis'),
(6, 'test123', 'KJohn123'),
(7, 'test123', 'BThom');

-- --------------------------------------------------------

--
-- Table structure for table `pet_breed`
--

CREATE TABLE `pet_breed` (
  `Breed_num` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_breed`
--

INSERT INTO `pet_breed` (`Breed_num`, `name`) VALUES
(1, 'AFFENPINSCHER'),
(2, 'AFGHAN HOUND'),
(3, 'AIREDALE TERRIER'),
(4, 'AKITA'),
(5, 'ALASKAN MALAMUTE'),
(6, 'AMERICAN ENGLISH COONHOUND'),
(7, 'AMERICAN ESKIMO DOG'),
(8, 'AMERICAN FOXHOUND'),
(9, 'AMERICAN HAIRLESS TERRIER'),
(10, 'AMERICAN LEOPARD HOUND'),
(11, 'AMERICAN STAFFORDSHIRE TERRIER'),
(12, 'AMERICAN WATER SPANIEL'),
(13, 'ANATOLIAN SHEPHERD DOG'),
(14, 'APPENZELLER SENNENHUNDE'),
(15, 'AUSTRALIAN CATTLE DOG'),
(16, 'AUSTRALIAN SHEPHERD'),
(17, 'AUSTRALIAN TERRIER'),
(18, 'AZAWAKH'),
(19, 'BARBET'),
(20, 'BASENJI'),
(21, 'BASSET FAUVE DE BRETAGNE'),
(22, 'BASSET HOUND'),
(23, 'BEAGLE'),
(24, 'BEARDED COLLIE'),
(25, 'BEAUCERON'),
(26, 'BEDLINGTON TERRIER'),
(27, 'BELGIAN LAEKENOIS'),
(28, 'BELGIAN MALINOIS'),
(29, 'BELGIAN SHEEPDOG'),
(30, 'BELGIAN TERVUREN'),
(31, 'BERGAMASCO'),
(32, 'BERGER PICARD'),
(33, 'BERNESE MOUNTAIN DOG'),
(34, 'BICHON FRISE'),
(35, 'BIEWER TERRIER'),
(36, 'BLACK AND TAN COONHOUND'),
(37, 'BLACK RUSSIAN TERRIER'),
(38, 'BLOODHOUND'),
(39, 'BLUETICK COONHOUND'),
(40, 'BOERBOEL'),
(41, 'BOLOGNESE'),
(42, 'BORDER COLLIE'),
(43, 'BORDER TERRIER'),
(44, 'BORZOI'),
(45, 'BOSTON TERRIER'),
(46, 'BOUVIER DES FLANDRES'),
(47, 'BOXER'),
(48, 'BOYKIN SPANIEL'),
(49, 'BRACCO ITALIANO'),
(50, 'BRAQUE DU BOURBONNAIS'),
(51, 'BRIARD'),
(52, 'BRITTANY'),
(53, 'BROHOLMER'),
(54, 'BRUSSELS GRIFFON'),
(55, 'BULL TERRIER'),
(56, 'BULLDOG'),
(57, 'BULLMASTIFF'),
(58, 'CAIRN TERRIER'),
(59, 'CANAAN DOG'),
(60, 'CANE CORSO'),
(61, 'CARDIGAN WELSH CORGI'),
(62, 'CATAHOULA LEOPARD DOG'),
(63, 'CAUCASIAN OVCHARKA'),
(64, 'CAVALIER KING CHARLES SPANIEL'),
(65, 'CENTRAL ASIAN SHEPHERD DOG'),
(66, 'CESKY TERRIER'),
(67, 'CHESAPEAKE BAY RETRIEVER'),
(68, 'CHIHUAHUA'),
(69, 'CHINESE CRESTED'),
(70, 'CHINESE SHAR-PEI'),
(71, 'CHINOOK'),
(72, 'CHOW CHOW'),
(73, 'CIRNECO DELL’ETNA'),
(74, 'CLUMBER SPANIEL'),
(75, 'COCKER SPANIEL'),
(76, 'COLLIE'),
(77, 'COTON DE TULEAR'),
(78, 'CURLY-COATED RETRIEVER'),
(79, 'CZECHOSLOVAKIAN VLCAK'),
(80, 'DACHSHUND'),
(81, 'DALMATIAN'),
(82, 'DANDIE DINMONT TERRIER'),
(83, 'DANISH-SWEDISH FARMDOG'),
(84, 'DEUTSCHER WACHTELHUND'),
(85, 'DOBERMAN PINSCHER'),
(86, 'DOGO ARGENTINO'),
(87, 'DOGUE DE BORDEAUX'),
(88, 'DRENTSCHE PATRIJSHOND'),
(89, 'DREVER'),
(90, 'DUTCH SHEPHERD'),
(91, 'ENGLISH COCKER SPANIEL'),
(92, 'ENGLISH FOXHOUND'),
(93, 'ENGLISH SETTER'),
(94, 'ENGLISH SPRINGER SPANIEL'),
(95, 'ENGLISH TOY SPANIEL'),
(96, 'ENTLEBUCHER MOUNTAIN DOG'),
(97, 'EURASIER'),
(98, 'FIELD SPANIEL'),
(99, 'FINNISH LAPPHUND'),
(100, 'FINNISH SPITZ'),
(101, 'FLAT-COATED RETRIEVER'),
(102, 'FRENCH BULLDOG'),
(103, 'FRENCH SPANIEL'),
(104, 'GERMAN LONGHAIRED POINTER'),
(105, 'GERMAN PINSCHER'),
(106, 'GERMAN SHEPHERD DOG'),
(107, 'GERMAN SHORTHAIRED POINTER'),
(108, 'GERMAN SPITZ'),
(109, 'GERMAN WIREHAIRED POINTER'),
(110, 'GIANT SCHNAUZER'),
(111, 'GLEN OF IMAAL TERRIER'),
(112, 'GOLDEN RETRIEVER'),
(113, 'GORDON SETTER'),
(114, 'GRAND BASSET GRIFFON VENDEEN'),
(115, 'GREAT DANE'),
(116, 'GREAT PYRENEES'),
(117, 'GREATER SWISS MOUNTAIN DOG'),
(118, 'GREYHOUND'),
(119, 'HAMILTONSTOVARE'),
(120, 'HARRIER'),
(121, 'HAVANESE'),
(122, 'HOVAWART'),
(123, 'IBIZAN HOUND'),
(124, 'ICELANDIC SHEEPDOG'),
(125, 'IRISH RED AND WHITE SETTER'),
(126, 'IRISH SETTER'),
(127, 'IRISH TERRIER'),
(128, 'IRISH WATER SPANIEL'),
(129, 'IRISH WOLFHOUND'),
(130, 'ITALIAN GREYHOUND'),
(131, 'JAGDTERRIER'),
(132, 'JAPANESE CHIN'),
(133, 'JINDO'),
(134, 'KAI KEN'),
(135, 'KARELIAN BEAR DOG'),
(136, 'KEESHOND'),
(137, 'KERRY BLUE TERRIER'),
(138, 'KISHU KEN'),
(139, 'KOMONDOR'),
(140, 'KROMFOHRLANDER'),
(141, 'KUVASZ'),
(142, 'LABRADOR RETRIEVER'),
(143, 'LAGOTTO ROMAGNOLO'),
(144, 'LAKELAND TERRIER'),
(145, 'LANCASHIRE HEELER'),
(146, 'LEONBERGER'),
(147, 'LHASA APSO'),
(148, 'LOWCHEN'),
(149, 'MALTESE'),
(150, 'MANCHESTER TERRIER'),
(151, 'MASTIFF'),
(152, 'MINIATURE AMERICAN SHEPHERD'),
(153, 'MINIATURE BULL TERRIER'),
(154, 'MINIATURE PINSCHER'),
(155, 'MINIATURE SCHNAUZER'),
(156, 'MUDI'),
(157, 'NEAPOLITAN MASTIFF'),
(158, 'NEDERLANDSE KOOIKERHONDJE'),
(159, 'NEWFOUNDLAND'),
(160, 'NORFOLK TERRIER'),
(161, 'NORRBOTTENSPETS'),
(162, 'NORWEGIAN BUHUND'),
(163, 'NORWEGIAN ELKHOUND'),
(164, 'NORWEGIAN LUNDEHUND'),
(165, 'NORWICH TERRIER'),
(166, 'NOVA SCOTIA DUCK TOLLING RETRI'),
(167, 'OLD ENGLISH SHEEPDOG'),
(168, 'OTTERHOUND'),
(169, 'PAPILLON'),
(170, 'PARSON RUSSELL TERRIER'),
(171, 'PEKINGESE'),
(172, 'PEMBROKE WELSH CORGI'),
(173, 'PERRO DE PRESA CANARIO'),
(174, 'PERUVIAN INCA ORCHID'),
(175, 'PETIT BASSET GRIFFON VENDEEN'),
(176, 'PHARAOH HOUND'),
(177, 'PLOTT'),
(178, 'POINTER'),
(179, 'POLISH LOWLAND SHEEPDOG'),
(180, 'POMERANIAN'),
(181, 'POODLE'),
(182, 'PORTUGUESE PODENGO'),
(183, 'PORTUGUESE PODENGO PEQUENO'),
(184, 'PORTUGUESE POINTER'),
(185, 'PORTUGUESE SHEEPDOG'),
(186, 'PORTUGUESE WATER DOG'),
(187, 'PUG'),
(188, 'PULI'),
(189, 'PUMI'),
(190, 'PYRENEAN MASTIFF'),
(191, 'PYRENEAN SHEPHERD'),
(192, 'RAFEIRO DO ALENTEJO'),
(193, 'RAT TERRIER'),
(194, 'REDBONE COONHOUND'),
(195, 'RHODESIAN RIDGEBACK'),
(196, 'ROTTWEILER'),
(197, 'RUSSELL TERRIER'),
(198, 'RUSSIAN TOY'),
(199, 'RUSSIAN TSVETNAYA BOLONKA'),
(200, 'SALUKI'),
(201, 'SAMOYED'),
(202, 'SCHAPENDOES'),
(203, 'SCHIPPERKE'),
(204, 'SCOTTISH DEERHOUND'),
(205, 'SCOTTISH TERRIER'),
(206, 'SEALYHAM TERRIER'),
(207, 'SHETLAND SHEEPDOG'),
(208, 'SHIBA INU'),
(209, 'SHIH TZU'),
(210, 'SHIKOKU'),
(211, 'SIBERIAN HUSKY'),
(212, 'SILKY TERRIER'),
(213, 'SKYE TERRIER'),
(214, 'SLOUGHI'),
(215, 'SLOVENSKY CUVAC'),
(216, 'SLOVENSKY KOPOV'),
(217, 'SMALL MUNSTERLANDER POINTER'),
(218, 'SMOOTH FOX TERRIER'),
(219, 'SOFT COATED WHEATEN TERRIER'),
(220, 'SPANISH MASTIFF'),
(221, 'SPANISH WATER DOG'),
(222, 'SPINONE ITALIANO'),
(223, 'ST.BERNARD'),
(224, 'STABYHOUN'),
(225, 'STAFFORDSHIRE BULL TERRIER'),
(226, 'STANDARD SCHNAUZER'),
(227, 'SUSSEX SPANIEL'),
(228, 'SWEDISH LAPPHUND'),
(229, 'SWEDISH VALLHUND'),
(230, 'THAI RIDGEBACK'),
(231, 'TIBETAN MASTIFF'),
(232, 'TIBETAN SPANIEL'),
(233, 'TIBETAN TERRIER'),
(234, 'TORNJAK'),
(235, 'TOSA'),
(236, 'TOY FOX TERRIER'),
(237, 'TRANSYLVANIAN HOUND'),
(238, 'TREEING TENNESSEE BRINDLE'),
(239, 'TREEING WALKER COONHOUND'),
(240, 'VIZSLA'),
(241, 'WEIMARANER'),
(242, 'WELSH SPRINGER SPANIEL'),
(243, 'WELSH TERRIER'),
(244, 'WEST HIGHLAND WHITE TERRIER'),
(245, 'WHIPPET'),
(246, 'WIRE FOX TERRIER'),
(247, 'WIREHAIRED POINTING GRIFFON'),
(248, 'WIREHAIRED VIZSLA'),
(249, 'WORKING KELPIE'),
(250, 'XOLOITZCUINTLI'),
(251, 'YORKSHIRE TERRIER');

-- --------------------------------------------------------

--
-- Table structure for table `pet_tube`
--

CREATE TABLE `pet_tube` (
  `Tube_post_id` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `User_id` varchar(12) DEFAULT NULL,
  `File_path` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_tube`
--

INSERT INTO `pet_tube` (`Tube_post_id`, `Title`, `Description`, `Post_time`, `User_id`, `File_path`) VALUES
(1, 'Chasing scene!', 'Chasing each other. Or is it hunting ?', '2016-06-13 05:18:15', 'test123', 'petTubeFile/.mp4'),
(2, 'ya!', ' a', '2016-06-13 05:19:12', 'test123', 'petTubeFile/2.mp4'),
(3, 'Another chase!', ' Check this out!', '2016-06-13 05:49:45', 'test123', 'petTubeFile/3.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_id` int(11) NOT NULL,
  `User_id` varchar(12) NOT NULL,
  `Zip_code` int(11) NOT NULL,
  `Pet_breed` int(11) NOT NULL,
  `Pet_gender` char(1) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Subject` varchar(70) DEFAULT NULL,
  `File_path` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_id`, `User_id`, `Zip_code`, `Pet_breed`, `Pet_gender`, `Description`, `post_date`, `Subject`, `File_path`) VALUES
(2, 'test123', 91203, 1, 'F', 'aaa', '2016-05-28 00:54:45', NULL, ''),
(6, 'test123', 95345, 4, 'M', ' 123 123 asdf sa asdf ', '2016-05-29 02:52:05', 'tes test test ', ''),
(8, 'test123', 95345, 8, 'F', 'test 222 ', '2016-05-29 03:05:26', 'test 2', ''),
(9, 'test123', 12312, 4, 'F', ' aaa', '2016-06-01 02:41:19', 'tes test test ', ''),
(10, 'test123', 12132, 28, 'F', ' Please ASAP!', '2016-06-01 04:06:08', 'lf ppl!!', ''),
(11, 'test123', 12321, 21, 'F', ' asdf asf asfas\r\nfas\r\nfasdfasdf\r\nas\r\ndfasdfsadf\r\na\r\nsfasdfasdf\r\nasdf\r\nasd\r\nfasdf', '2016-06-04 02:35:17', 'test test tewt ', ''),
(12, 'test123', 52321, 114, 'F', ' asfas\r\nasf\r\nasf\r\nasf\r\nas\r\nfas\r\ndfas\r\ndf\r\nasdf', '2016-06-05 01:16:14', 'asdf asda a', ''),
(13, 'test123', 21232, 5, 'M', ' yea aa', '2016-06-05 02:34:37', 'yrdyd 234234', ''),
(16, 'test123', 53454, 40, 'M', ' I lost him on Stef St. and Esa Ave..\r\n\r\nHe has a black hair.\r\n\r\nPlease message me if you found him!', '2016-06-05 02:40:37', 'Looking for my dog', ''),
(22, 'test123', 12121, 2, 'M', ' adfga s a s a', '2016-06-05 02:48:15', '214 234', ''),
(24, 'test123', 54648, 16, 'M', 'Hey guys, \r\n\r\nI found this little pup last night.\r\n\r\nHe is white colored.\r\n\r\nPlease message me if yo', '2016-06-05 02:53:32', 'I found this little dog yester', ''),
(25, 'test123', 12313, 4, 'M', ' sfasasdfsa\r\nasfd\r\nas\r\nfas', '2016-06-05 02:54:12', 'testseta a', ''),
(26, 'test123', 54684, 251, 'M', ' I have been doing this for 2years.\r\n\r\nGive comfort rooms for the dogs.\r\n', '2016-06-05 03:00:07', 'I am available to take care yo', ''),
(31, 'test123', 12112, 2, 'M', ' etst ast\r\nasteast', '2016-06-05 03:03:35', 'testset stset ', ''),
(35, 'test123', 12312, 2, 'M', ' sfas', '2016-06-05 23:45:33', 'testset', ''),
(36, 'test123', 12312, 3, 'M', ' tys!', '2016-06-05 23:46:21', 'test setset', ''),
(37, 'KJohn123', 98212, 39, 'M', ' I need to go back to my country.\r\n\r\nPlease someone take my adorable dog..', '2016-06-08 00:44:01', 'Looking for someone to take over my dog', ''),
(38, 'kHilton', 90210, 23, 'F', 'Found her at the 2nd st. and Normandie. \r\n', '2016-06-08 00:51:45', 'Found this dog!!!!!!', ''),
(39, 'kHilton', 95464, 103, 'M', 'Hello all,\r\n\r\nI have been doing this for 3 years.\r\n\r\nI love dogs!!\r\n\r\nMessage me! ', '2016-06-08 01:00:06', 'I am professional at this!', ''),
(40, 'kHilton', 95643, 4, 'M', 'My lovely Cain has been disappeared while we were walking on the street...\r\n\r\nPlease if anyone sees him.. ', '2016-06-08 01:03:43', 'LF my dog..', ''),
(41, 'kHilton', 95343, 91, 'F', 'Hello guys,\r\n\r\nIm looking for someone to take care of my dog!! ', '2016-06-08 01:17:33', 'looking for someone', ''),
(42, 'pJames', 95343, 54, 'M', 'I need a dog lover who can have my dog..\r\n\r\nPlease message me before 6/14\r\n ', '2016-06-08 01:20:55', 'Please!!', ''),
(43, 'pJames', 95464, 186, 'M', 'Please message me if you are looking for this buddy. ', '2016-06-08 01:23:45', 'Found dog', ''),
(44, 'pJames', 95345, 169, 'M', 'I lost her yesterday...\r\n\r\nPlease if someone finds her, give me a message.. ', '2016-06-08 21:56:48', 'Looking for my papillon...', ''),
(45, 'pJames', 59349, 169, 'M', 'Please.. ', '2016-06-08 22:18:42', 'looking for papillon..', ''),
(46, 'kHilton', 12321, 4, 'M', ' sfasf', '2016-06-08 22:47:31', 'sadf', ''),
(47, 'kHilton', 12321, 4, 'M', ' sfasf', '2016-06-08 22:52:01', 'sadf', ''),
(48, 'kHilton', 54641, 2, 'M', ' asf', '2016-06-08 23:04:19', 'asdfsdf', ''),
(49, 'kHilton', 12121, 4, 'M', ' a', '2016-06-08 23:10:38', 'asdfasdf', ''),
(50, 'kHilton', 12313, 1, 'M', ' 1231', '2016-06-08 23:11:33', '213', ''),
(51, 'kHilton', 12321, 4, 'M', ' asdfasd', '2016-06-08 23:16:52', 'tsetsdtast', ''),
(52, 'kHilton', 12321, 4, 'M', ' asdfasd', '2016-06-08 23:19:44', 'Testset', ''),
(53, 'kHilton', 12312, 2, 'M', ' test', '2016-06-08 23:22:00', 'asdf asda a', ''),
(54, 'kHilton', 12312, 2, 'M', ' test', '2016-06-08 23:22:48', 'asdf asda a', ''),
(55, 'kHilton', 12312, 3, 'M', ' 123', '2016-06-08 23:25:41', 'asdf asda a', ''),
(56, 'kHilton', 12312, 65, 'M', ' ast', '2016-06-08 23:32:39', 'tsadtsa', ''),
(57, 'kHilton', 12312, 65, 'M', ' ast', '2016-06-08 23:32:57', 'tsadtsa', ''),
(58, 'pJames', 12321, 49, 'M', ' asdf', '2016-06-08 23:36:14', 'Lost...', 'lostFile/58.jpg'),
(59, 'pJames', 92543, 1, 'M', 'Please if you find him,,\r\n\r\nleave me a message.. ', '2016-06-09 02:10:42', 'looking for my dog...', 'lostFile/59.jpg'),
(60, 'pJames', 12321, 5, 'M', ' asfasdf', '2016-06-09 02:11:54', 'asfasf', ''),
(61, 'test123', 95464, 180, 'M', ' I lost him yesterday.\r\n\r\nPlease message me if you find him..', '2016-06-12 22:51:32', 'Looking for my pome..', 'lostFile/61.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` varchar(12) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Last_name` varchar(15) NOT NULL,
  `First_name` varchar(15) NOT NULL,
  `Care_count` int(11) DEFAULT '0',
  `Care_point` float DEFAULT '0',
  `Care_rate` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `Password`, `Last_name`, `First_name`, `Care_count`, `Care_point`, `Care_rate`) VALUES
('aHolla', 'como', 'amigos', 'holla', 0, 0, 0),
('BThom', 'tata', 'Browne', 'Thom', 0, 0, 0),
('DSnoop', 'yoyo', 'Dawg', 'Snoop', 0, 0, 0),
('kHilton', 'haha', 'Hilton', 'Kate', 0, 0, 0),
('KJohn123', 'johnjohn', 'John', 'Kevin', 0, 0, 0),
('pJames', 'lol', 'Paul', 'James', 0, 0, 0),
('test123', '123', 'John', 'Smith', 0, 0, 0),
('VLouis', 'lvlv', 'Vuitton', 'Louis', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`Adopt_post_id`),
  ADD KEY `Post_id` (`Post_id`);

--
-- Indexes for table `care`
--
ALTER TABLE `care`
  ADD PRIMARY KEY (`Care_post_id`),
  ADD KEY `Post_id` (`Post_id`);

--
-- Indexes for table `cared`
--
ALTER TABLE `cared`
  ADD PRIMARY KEY (`Cared_post_id`),
  ADD KEY `Post_id` (`Post_id`);

--
-- Indexes for table `found`
--
ALTER TABLE `found`
  ADD PRIMARY KEY (`Found_post_id`),
  ADD KEY `Post_id` (`Post_id`);

--
-- Indexes for table `lost`
--
ALTER TABLE `lost`
  ADD PRIMARY KEY (`Lost_post_id`),
  ADD KEY `Post_id` (`Post_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD KEY `messages_ibfk_1` (`Sender`),
  ADD KEY `messages_ibfk_2` (`Receiver`),
  ADD KEY `messages_ibfk_3` (`Message_id`);

--
-- Indexes for table `message_box`
--
ALTER TABLE `message_box`
  ADD PRIMARY KEY (`Message_id`),
  ADD KEY `My_id` (`My_id`),
  ADD KEY `Other_id` (`Other_id`);

--
-- Indexes for table `pet_breed`
--
ALTER TABLE `pet_breed`
  ADD PRIMARY KEY (`Breed_num`);

--
-- Indexes for table `pet_tube`
--
ALTER TABLE `pet_tube`
  ADD PRIMARY KEY (`Tube_post_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_id`,`User_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Pet_breed` (`Pet_breed`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `Adopt_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `care`
--
ALTER TABLE `care`
  MODIFY `Care_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cared`
--
ALTER TABLE `cared`
  MODIFY `Cared_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `found`
--
ALTER TABLE `found`
  MODIFY `Found_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `lost`
--
ALTER TABLE `lost`
  MODIFY `Lost_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `message_box`
--
ALTER TABLE `message_box`
  MODIFY `Message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pet_breed`
--
ALTER TABLE `pet_breed`
  MODIFY `Breed_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT for table `pet_tube`
--
ALTER TABLE `pet_tube`
  MODIFY `Tube_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`Post_id`) REFERENCES `post` (`Post_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `care`
--
ALTER TABLE `care`
  ADD CONSTRAINT `care_ibfk_1` FOREIGN KEY (`Post_id`) REFERENCES `post` (`Post_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `cared`
--
ALTER TABLE `cared`
  ADD CONSTRAINT `cared_ibfk_1` FOREIGN KEY (`Post_id`) REFERENCES `post` (`Post_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `found`
--
ALTER TABLE `found`
  ADD CONSTRAINT `found_ibfk_1` FOREIGN KEY (`Post_id`) REFERENCES `post` (`Post_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `lost`
--
ALTER TABLE `lost`
  ADD CONSTRAINT `lost_ibfk_1` FOREIGN KEY (`Post_id`) REFERENCES `post` (`Post_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`Sender`) REFERENCES `users` (`User_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`Receiver`) REFERENCES `users` (`User_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`Message_id`) REFERENCES `message_box` (`Message_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `message_box`
--
ALTER TABLE `message_box`
  ADD CONSTRAINT `message_box_ibfk_1` FOREIGN KEY (`My_id`) REFERENCES `users` (`User_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `message_box_ibfk_2` FOREIGN KEY (`Other_id`) REFERENCES `users` (`User_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pet_tube`
--
ALTER TABLE `pet_tube`
  ADD CONSTRAINT `pet_tube_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`Pet_breed`) REFERENCES `pet_breed` (`Breed_num`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
