-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `town_city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `select_status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `address` (`id`, `user_id`, `name`, `address_line1`, `town_city`, `district`, `state`, `pincode`, `select_status`) VALUES
(8,	'919500765068',	'Mohamed Nashid Mifzal P',	'No. 10, Nadu Street , Pallikonda',	'Vellore',	'v',	'Tamil Nadu',	'635809',	'0'),
(9,	'919500765068',	'Mohamed Nashid Mifzal P',	'No. 10, Nadu Street , Pallikonda',	'Vellore',	'kljn',	'Tamil Nadu',	'635809',	'1'),
(10,	'8667851162',	'MOHAMMED',	'29/18 Ameen Ba Street',	'visharam',	'Ranipet',	'Tamil Nadu',	'632509',	'1'),
(12,	'+919500765068',	'Mohamed Nashid Mifzal P',	'No. 10, Nadu Street , Pallikonda',	'melvisharam',	'vlr',	'Tamil Nadu',	'635809',	'1'),
(13,	'9362121822',	'MajeedAbdul',	'123/Anna salai,Melvisharam',	'melvisharam',	'Ranipet',	'Tamil Nadu',	'632509',	'1'),
(14,	'9362121822',	'MajeedAbdul',	'123/Anna salai,Melvisharam',	'melvisharam',	'Ranipet',	'Tamil Nadu',	'632509',	'1'),
(15,	'9876543211',	'abdulMajeed',	'123,Anna Salai,Mvs',	'melvisharam',	'Ranipet',	'Tamil Nadu',	'632509',	'1'),
(16,	'8990009900',	'MdTalha',	'123,123asidjlaskjdlasd',	'melvisharam',	'Vellore',	'Tamil Nadu',	'632509',	'1'),
(17,	'9879837249',	'nash',	'123,ausdihjksahdsa',	'visharam',	'rpt',	'TN',	'632509',	'1'),
(19,	'1234567899',	'majeed',	'123,sdoijasodjlasd',	'visharam',	'Ranipet',	'Tamil Nadu',	'632509',	'1');

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `mobileid` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `username`, `password`, `number`, `mobileid`) VALUES
(1,	'talha',	'21232f297a57a5a743894a0e4a801fc3',	'8667851162',	'cxDWkYxknwk:APA91bGKghnPkQAdqSHP47w9qAnrpMXuIVaVqeeAwgKjcTsIjskYWKLBqX2Kq2aGng7aXKZLzLOKBj5TOCRYswHZdTY3b_IdAr79eKXgRoY9V8BF2X_k4b1qfA1oKq2v8F3nqkIiwdk_'),
(3,	'jashkdasjhd',	'29837198271392',	'1234554321',	'000'),
(4,	'MainAdmin',	'd58483321fb5467ae3a1702db8c42d88',	'9090909090',	'000');

DROP TABLE IF EXISTS `advorder`;
CREATE TABLE `advorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` text NOT NULL,
  `prodid` text NOT NULL,
  `qty` text NOT NULL,
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `totamnt` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `advorder` (`id`, `orderid`, `prodid`, `qty`, `status`, `created`, `totamnt`) VALUES
(1,	'1',	'6',	'3',	'2',	'2020-07-23 18:40:45',	'1497'),
(2,	'2',	'6',	'3',	'1',	'2020-06-30 15:06:12',	'1497'),
(3,	'3',	'6',	'3',	'3',	'2020-07-01 17:48:35',	'1497'),
(4,	'4',	'6',	'3',	'0',	'2020-06-24 17:58:18',	'1497'),
(5,	'5',	'6',	'3',	'2',	'2020-06-30 14:41:28',	'1497'),
(6,	'5',	'2',	'3',	'0',	'2020-06-25 11:31:33',	'84'),
(7,	'5',	'3',	'3',	'2',	'2020-06-30 13:43:28',	'2697'),
(8,	'6',	'3',	'1',	'0',	'2020-06-30 15:36:59',	'899'),
(9,	'6',	'4',	'1',	'0',	'2020-06-30 15:36:59',	'599'),
(10,	'7',	'13',	'3',	'1',	'2020-07-19 11:31:54',	'2250'),
(11,	'9',	'13',	'3',	'1',	'2020-07-19 11:31:31',	'2250'),
(12,	'10',	'13',	'3',	'1',	'2020-07-23 18:43:11',	'2250'),
(13,	'10',	'3',	'1',	'1',	'2020-07-23 18:43:11',	'899'),
(14,	'11',	'6',	'2',	'1',	'2020-07-19 11:36:11',	'998'),
(15,	'16',	'3',	'1',	'1',	'2020-07-23 18:49:41',	'899'),
(16,	'16',	'4',	'3',	'0',	'2020-07-19 09:05:21',	'1797'),
(17,	'18',	'3',	'2',	'1',	'2020-07-19 11:37:34',	'1798'),
(18,	'19',	'3',	'2',	'1',	'2020-07-19 11:38:24',	'1798'),
(19,	'23',	'3',	'2',	'2',	'2020-07-19 11:34:23',	'1798'),
(20,	'24',	'4',	'2',	'1',	'2020-07-19 11:38:53',	'1198'),
(21,	'34',	'4',	'4',	'2',	'2020-07-19 11:40:09',	'2396'),
(22,	'35',	'4',	'2',	'0',	'2020-07-19 10:38:33',	'1198'),
(23,	'36',	'3',	'2',	'0',	'2020-07-19 10:39:31',	'1798'),
(24,	'38',	'4',	'1',	'0',	'2020-07-19 10:40:09',	'599'),
(25,	'39',	'4',	'1',	'0',	'2020-07-19 10:40:49',	'599'),
(26,	'40',	'4',	'1',	'0',	'2020-07-19 10:41:22',	'599'),
(27,	'41',	'4',	'1',	'0',	'2020-07-19 10:43:14',	'599'),
(28,	'43',	'4',	'1',	'0',	'2020-07-19 10:44:50',	'599'),
(29,	'44',	'4',	'1',	'0',	'2020-07-19 10:45:55',	'599'),
(30,	'45',	'5',	'2',	'0',	'2020-07-19 10:46:24',	'998'),
(31,	'47',	'6',	'2',	'0',	'2020-07-19 10:49:51',	'998'),
(32,	'48',	'6',	'2',	'0',	'2020-07-19 10:52:06',	'998'),
(33,	'49',	'6',	'1',	'0',	'2020-07-19 10:54:26',	'499'),
(34,	'57',	'14',	'2',	'0',	'2020-08-09 08:20:53',	'1800'),
(35,	'57',	'15',	'1',	'0',	'2020-08-09 08:20:53',	'900'),
(36,	'58',	'15',	'1',	'0',	'2020-08-09 09:53:06',	'900'),
(37,	'59',	'14',	'2',	'0',	'2020-08-10 10:36:55',	'1800'),
(38,	'69',	'14',	'1',	'0',	'2020-08-15 11:32:21',	'900'),
(39,	'86',	'14',	'1',	'0',	'2020-08-15 11:43:39',	'900'),
(40,	'87',	'14',	'1',	'0',	'2020-08-15 11:46:08',	'900'),
(41,	'88',	'14',	'1',	'0',	'2020-08-15 11:47:49',	'900'),
(42,	'91',	'14',	'1',	'0',	'2020-08-15 11:48:48',	'900'),
(43,	'92',	'14',	'1',	'0',	'2020-08-15 11:51:05',	'900'),
(44,	'94',	'14',	'1',	'0',	'2020-08-15 11:51:47',	'900'),
(45,	'95',	'14',	'1',	'0',	'2020-08-15 11:52:55',	'900'),
(46,	'97',	'14',	'1',	'0',	'2020-08-15 11:55:16',	'900'),
(47,	'99',	'21',	'1',	'0',	'2020-08-23 14:43:05',	'120'),
(48,	'100',	'19',	'5',	'0',	'2020-08-23 15:02:55',	'450'),
(49,	'101',	'19',	'1',	'0',	'2020-08-23 15:04:55',	'90'),
(50,	'102',	'19',	'5',	'0',	'2020-08-23 15:06:01',	'450'),
(51,	'103',	'20',	'1',	'0',	'2020-08-29 10:53:43',	'99'),
(52,	'103',	'21',	'1',	'0',	'2020-08-29 10:53:43',	'120');

DROP TABLE IF EXISTS `advproduct`;
CREATE TABLE `advproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_price` text NOT NULL,
  `prod_offer_price` text NOT NULL,
  `prod_stock` text NOT NULL,
  `categoryid` text NOT NULL,
  `image` text NOT NULL,
  `created_date` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `display` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `advproduct` (`id`, `name`, `prod_desc`, `prod_price`, `prod_offer_price`, `prod_stock`, `categoryid`, `image`, `created_date`, `status`, `display`) VALUES
(14,	'MOSAMBI',	'Cool You Body Down',	'1000',	'900',	'15',	'1',	'3c4b14a3037e1dfa9ad038790ae6592b.png',	'07:45:24 2020/07/30',	'1',	''),
(15,	'MOSAMBI Juice',	'Cool You Body Down',	'999',	'900',	'0',	'1',	'3c4b14a3037e1dfa9ad038790ae6592b.png',	'07:45:24 2020/07/30',	'1',	''),
(16,	'Mohamed Nashid Mifzal P',	'nice product',	'90',	'100',	'80',	'11',	'cb66ca858ee519f9890c60e2dd98ae1c.png',	'05:43:19 2020/08/21',	'1',	''),
(19,	'Mohamed Nashid Mifzal P',	'nice product',	'100',	'90',	'89',	'7',	'1102fbdcf18b7eec0506fa8f2b8dad38.png',	'02:37:50 2020/08/22',	'1',	''),
(20,	'Apple',	'An apple a day keeps doctor away',	'100',	'99',	'99',	'8',	'52608c1367967cafb8901c8ce096f912.jpg',	'04:18:09 2020/08/22',	'1',	'visharam'),
(21,	'sakjlajs',	'ioqweuowae',	'122',	'120',	'98',	'9',	'5c315ab12592c7fe700617ccbe2485fd.jpg',	'04:36:25 2020/08/22',	'1',	'visharam'),
(22,	'ProdThree',	'ajkdhaskdjhd ajhsdakjhaks',	'12121',	'12000',	'1000',	'8',	'9d7c23caa635adc3a162c1470628ede1.jpeg',	'02:05:56 2020/08/23',	'1',	'visharam'),
(23,	'ashjdgjasd',	'jkdhaksd',	'123',	'23',	'212',	'8',	'b24d39b93f18f5ff24a89931efd01bf1.jpeg',	'02:12:13 2020/08/23',	'1',	'All');

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carousel_image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `carousel` (`id`, `carousel_image`) VALUES
(2,	'0f8687b4bc7f478e87e4ead60faca203.png'),
(4,	'b73bf8f1573c6310d5aedbd8e861eb8f.png');

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `notify_status` enum('0','1') NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cart` (`cart_id`, `prod_id`, `user_id`, `qty`, `notify_status`) VALUES
(23,	4,	'919500765068',	1,	'0'),
(31,	7,	'8667851162',	6,	'0'),
(40,	13,	'8667851162',	1,	'0'),
(61,	8,	'919500765068',	1,	'0'),
(62,	8,	'919500765068',	1,	'0'),
(63,	8,	'919500765068',	1,	'0'),
(64,	8,	'919500765068',	1,	'0'),
(65,	8,	'919500765068',	1,	'0'),
(70,	21,	'919500765068',	1,	'0'),
(71,	20,	'919500765068',	1,	'0'),
(81,	23,	'8667851162',	1,	'0');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` text NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`id`, `categoryid`, `name`) VALUES
(1,	'2',	'juice'),
(2,	'1',	'Tandoori'),
(3,	'1',	'Paya'),
(5,	'',	'test'),
(7,	'11',	'nash'),
(8,	'12',	'Fruits'),
(9,	'12',	'Vegetabales');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `controller`;
CREATE TABLE `controller` (
  `id` int(11) NOT NULL,
  `controllerName` varchar(50) NOT NULL,
  `status` enum('Y','N','','') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `controller` (`id`, `controllerName`, `status`) VALUES
(0,	'address',	'Y');

DROP TABLE IF EXISTS `deliveryboy`;
CREATE TABLE `deliveryboy` (
  `db_id` int(11) NOT NULL AUTO_INCREMENT,
  `number` text NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `mobileid` text NOT NULL,
  PRIMARY KEY (`db_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `deliveryboy` (`db_id`, `number`, `name`, `password`, `mobileid`) VALUES
(3,	'9092513847',	'Mufiz',	'9092513847',	'cxDWkYxknwk:APA91bGKghnPkQAdqSHP47w9qAnrpMXuIVaVqeeAwgKjcTsIjskYWKLBqX2Kq2aGng7aXKZLzLOKBj5TOCRYswHZdTY3b_IdAr79eKXgRoY9V8BF2X_k4b1qfA1oKq2v8F3nqkIiwdk_');

DROP TABLE IF EXISTS `deliverycharges`;
CREATE TABLE `deliverycharges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deliverycharge` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback` text COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `feedback` (`id`, `feedback`, `user`, `created`) VALUES
(1,	'my first feedback',	'8667851162',	'2020-08-16 11:36:50'),
(2,	'second feedback',	'8667851162',	'2020-08-16 11:36:50'),
(3,	'third feedback',	'8667851162',	'2020-08-16 11:36:50'),
(4,	'fourth feedback',	'8667851162',	'2020-08-16 11:36:50');

DROP TABLE IF EXISTS `maincategory`;
CREATE TABLE `maincategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` text NOT NULL,
  `categoryimage` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `maincategory` (`id`, `categoryname`, `categoryimage`) VALUES
(11,	'test',	'763d0e6c635c6eb61723e6e4d39a1c7e.png'),
(12,	'Majeed Shop',	'b5a9fde0528ac78b4547474fd3d6a132.png');

DROP TABLE IF EXISTS `menu_details`;
CREATE TABLE `menu_details` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `enc_ctrl` varchar(100) NOT NULL,
  `menu_type` int(11) NOT NULL,
  `parent_menu` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `menu_icon` varchar(30) NOT NULL,
  `status` enum('Y','N','','') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `menu_details` (`id`, `menu_name`, `enc_ctrl`, `menu_type`, `parent_menu`, `user_type_id`, `menu_icon`, `status`) VALUES
(0,	'Abc',	'06d90109c8cce34ec0c776950465421e176f08b831a938b3c6e76cb7bee8790b',	1,	0,	0,	'',	'Y');

DROP TABLE IF EXISTS `orderdata`;
CREATE TABLE `orderdata` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text NOT NULL,
  `totalcart` text NOT NULL,
  `addressid` text NOT NULL,
  `orderstatus` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `db_id` varchar(10) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `paymentType` varchar(20) NOT NULL,
  `txnId` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `orderdata` (`order_id`, `user_id`, `totalcart`, `addressid`, `orderstatus`, `db_id`, `created`, `paymentType`, `txnId`) VALUES
(1,	'919500765068',	'1497',	'8',	'3',	'3',	'2020-08-15 20:05:15',	'',	''),
(2,	'919500765068',	'1497',	'8',	'3',	'3',	'2020-08-15 20:05:15',	'',	''),
(3,	'919500765068',	'1497',	'8',	'2',	'3',	'2020-08-15 20:05:15',	'',	''),
(4,	'919500765068',	'1497',	'8',	'2',	'3',	'2020-08-15 20:05:15',	'',	''),
(5,	'919500765068',	'4278',	'8',	'2',	'3',	'2020-08-15 20:05:15',	'',	''),
(6,	'919500765068',	'1498',	'9',	'2',	'3',	'2020-08-15 20:05:15',	'',	''),
(7,	'919500765068',	'2250',	'9',	'2',	'3',	'2020-08-15 20:05:15',	'',	''),
(8,	'919500765068',	'2250',	'9',	'2',	'3',	'2020-08-15 20:05:15',	'',	''),
(9,	'919500765068',	'2250',	'9',	'2',	'3',	'2020-08-15 20:05:15',	'',	''),
(10,	'919500765068',	'3149',	'9',	'1',	'',	'2020-08-15 20:05:15',	'',	''),
(11,	'919500765068',	'998',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(12,	'919500765068',	'2696',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(13,	'919500765068',	'2696',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(14,	'919500765068',	'2696',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(15,	'919500765068',	'2696',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(16,	'919500765068',	'2696',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(17,	'919500765068',	'2696',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(18,	'919500765068',	'1798',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(19,	'919500765068',	'1798',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(20,	'919500765068',	'1798',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(21,	'919500765068',	'1798',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(22,	'919500765068',	'1798',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(23,	'919500765068',	'1798',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(24,	'919500765068',	'1198',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(25,	'919500765068',	'1198',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(26,	'919500765068',	'1198',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(27,	'919500765068',	'1198',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(28,	'919500765068',	'1198',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(29,	'919500765068',	'1198',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(30,	'919500765068',	'1198',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(31,	'919500765068',	'1198',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(32,	'919500765068',	'1198',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(33,	'919500765068',	'1198',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(34,	'919500765068',	'2396',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(35,	'919500765068',	'1198',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(36,	'919500765068',	'1798',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(37,	'919500765068',	'1798',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(38,	'919500765068',	'599',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(39,	'919500765068',	'599',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(40,	'919500765068',	'599',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(41,	'919500765068',	'599',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(42,	'919500765068',	'599',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(43,	'919500765068',	'599',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(44,	'919500765068',	'599',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(45,	'919500765068',	'998',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(46,	'919500765068',	'998',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(47,	'919500765068',	'998',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(48,	'919500765068',	'998',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(49,	'919500765068',	'499',	'9',	'0',	'',	'2020-08-15 20:05:15',	'',	''),
(50,	'8667851162',	'1800',	'10',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(51,	'8667851162',	'1800',	'10',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(52,	'8667851162',	'2700',	'10',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(53,	'8667851162',	'2700',	'10',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(54,	'8667851162',	'2700',	'10',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(55,	'8667851162',	'2700',	'10',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(56,	'8667851162',	'2700',	'10',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(57,	'8667851162',	'2700',	'10',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(58,	'8667851162',	'900',	'11',	'1',	'0',	'2020-08-15 20:05:15',	'',	''),
(59,	'8667851162',	'1800',	'11',	'1',	'0',	'2020-08-15 20:05:15',	'',	''),
(60,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(61,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(62,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(63,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(64,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(65,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(66,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(67,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(68,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(69,	'8667851162',	'900',	'11',	'2',	'0',	'2020-08-21 14:57:38',	'',	''),
(70,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(71,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(72,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(73,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(74,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(75,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(76,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(77,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(78,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(79,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(80,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(81,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(82,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(83,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(84,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(85,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(86,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(87,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(88,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(89,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(90,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(91,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(92,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(93,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(94,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(95,	'8667851162',	'900',	'11',	'3',	'0',	'2020-08-21 15:07:36',	'',	''),
(96,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(97,	'8667851162',	'900',	'11',	'1',	'0',	'2020-08-21 14:54:16',	'',	''),
(98,	'8667851162',	'900',	'11',	'0',	'0',	'2020-08-15 20:05:15',	'',	''),
(99,	'9879837249',	'120',	'17',	'0',	'0',	'2020-08-23 14:43:05',	'Online Payment',	'20200823111212800110168094301830724'),
(100,	'8667851162',	'450',	'10',	'0',	'0',	'2020-08-23 15:02:55',	'COD',	'0'),
(101,	'8667851162',	'90',	'10',	'0',	'0',	'2020-08-23 15:04:55',	'COD',	'0'),
(102,	'8667851162',	'450',	'10',	'0',	'0',	'2020-08-23 15:06:01',	'COD',	'0'),
(103,	'1234567899',	'219',	'19',	'1',	'0',	'2020-08-29 10:56:03',	'COD',	'0');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` text COLLATE utf8_unicode_ci NOT NULL,
  `buyer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `chk_prod_details` text COLLATE utf8_unicode_ci NOT NULL,
  `chk_amnt_details` text COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `order_status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL,
  `shops` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `txn_id` text COLLATE utf8_unicode_ci NOT NULL,
  `txn_date` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `payment` (`id`, `order_id`, `value`, `time`, `status`, `txn_id`, `txn_date`) VALUES
(1,	'7070366444',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:15:24',	0,	'',	''),
(2,	'7070366380',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:16:29',	0,	'',	''),
(3,	'7070366356',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:16:50',	0,	'',	''),
(4,	'7070366337',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:17:12',	0,	'',	''),
(5,	'8667851162-1597484825',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:17:30',	0,	'',	''),
(6,	'8667851162-1597484825',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:17:30',	0,	'',	''),
(7,	'8667851162-1597484825',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:17:31',	0,	'',	''),
(8,	'8667851162-1597484825',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:17:31',	0,	'',	''),
(9,	'8667851162-1597484825',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:17:33',	0,	'',	''),
(10,	'8667851162-1597484825',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:17:33',	0,	'',	''),
(11,	'8667851162-1597484825',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:17:33',	0,	'',	''),
(12,	'8667851162-1597484825',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:17:33',	0,	'',	''),
(13,	'7070366232',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:18:58',	0,	'',	''),
(14,	'8667851162-1597485020',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:20:30',	0,	'',	''),
(15,	'8667851162-1597485129',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:22:31',	0,	'',	''),
(16,	'8667851162-1597487115',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:55:34',	0,	'',	''),
(17,	'8667851162-1597487304',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 15:58:30',	0,	'',	''),
(18,	'8667851162-1597488585',	'W3siY2FydF9pZCI6IjU2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyNCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIzfV0kJCQxMSQkJDkwMA==',	'2020-08-15 16:19:51',	1,	'20200815111212800110168300601904434',	'2020-08-15 16:20:18.0'),
(19,	'8667851162-1597491823',	'W3siY2FydF9pZCI6IjYxIiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyMiIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIxfV0kJCQxMSQkJDkwMA==',	'2020-08-15 17:15:29',	1,	'20200815111212800110168200501808855',	'2020-08-15 17:15:44.0'),
(20,	'8667851162-1597492044',	'W3siY2FydF9pZCI6IjYyIiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyMSIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjIwfV0kJCQxMSQkJDkwMA==',	'2020-08-15 17:17:36',	1,	'20200815111212800110168301401905613',	'2020-08-15 17:17:44.0'),
(21,	'8667851162-1597492111',	'W3siY2FydF9pZCI6IjYzIiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIyMCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjE5fV0kJCQxMSQkJDkwMA==',	'2020-08-15 17:18:40',	1,	'20200815111212800110168303901904439',	'2020-08-15 17:18:43.0'),
(22,	'8667851162-1597492250',	'W3siY2FydF9pZCI6IjY0IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIxOSIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjE4fV0kJCQxMSQkJDkwMA==',	'2020-08-15 17:20:57',	1,	'20200815111212800110168300501904440',	'2020-08-15 17:21:00.0'),
(23,	'8667851162-1597492292',	'W3siY2FydF9pZCI6IjY1IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIxOCIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjE3fV0kJCQxMSQkJDkwMA==',	'2020-08-15 17:21:40',	1,	'20200815111212800110168301101904441',	'2020-08-15 17:21:42.0'),
(24,	'8667851162-1597492361',	'W3siY2FydF9pZCI6IjY2IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIxNyIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjE2fV0kJCQxMSQkJDkwMA==',	'2020-08-15 17:22:47',	1,	'20200815111212800110168303201904442',	'2020-08-15 17:22:49.0'),
(25,	'8667851162-1597492439',	'W3siY2FydF9pZCI6IjY3IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIxNiIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjE1fV0kJCQxMSQkJDkwMA==',	'2020-08-15 17:24:07',	0,	'0',	'0'),
(26,	'8667851162-1597492492',	'W3siY2FydF9pZCI6IjY3IiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIxNiIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjE1fV0kJCQxMSQkJDkwMA==',	'2020-08-15 17:25:09',	1,	'20200815111212800110168309801905614',	'2020-08-15 17:25:12.0'),
(27,	'8667851162-1597521549',	'W3siY2FydF9pZCI6IjYwIiwicHJvZF9pZCI6IjE0IiwicmVxcXR5IjoiMSIsImlkIjoiMTQiLCJuYW1lIjoiTU9TQU1CSSIsInByb2RfZGVzYyI6IkNvb2wgWW91IEJvZHkgRG93biIsInByb2RfcHJpY2UiOiIxMDAwIiwicHJvZF9vZmZlcl9wcmljZSI6IjkwMCIsInByb2Rfc3RvY2siOiIxNSIsImNhdGVnb3J5aWQiOiIxIiwiaW1hZ2UiOiIzYzRiMTRhMzAzN2UxZGZhOWFkMDM4NzkwYWU2NTkyYi5wbmciLCJjcmVhdGVkX2RhdGUiOiIwNzo0NToyNCAyMDIwLzA3LzMwIiwic3RhdHVzIjoiMSIsInRvdGFtbnQiOjkwMCwibmV3X3Byb2Rfc3RvY2siOjE0fV0kJCQxMSQkJDkwMA==',	'2020-08-15 21:59:33',	0,	'0',	'0'),
(28,	'9879837249-1598191020',	'W3siY2FydF9pZCI6IjcyIiwicHJvZF9pZCI6IjIwIiwicmVxcXR5IjoiMSIsImlkIjoiMjAiLCJuYW1lIjoiQXBwbGUiLCJwcm9kX2Rlc2MiOiJBbiBhcHBsZSBhIGRheSBrZWVwcyBkb2N0b3IgYXdheSIsInByb2RfcHJpY2UiOiIxMDAiLCJwcm9kX29mZmVyX3ByaWNlIjoiOTkiLCJwcm9kX3N0b2NrIjoiMTAwIiwiY2F0ZWdvcnlpZCI6IjgiLCJpbWFnZSI6IjUyNjA4YzEzNjc5NjdjYWZiODkwMWM4Y2UwOTZmOTEyLmpwZyIsImNyZWF0ZWRfZGF0ZSI6IjA0OjE4OjA5IDIwMjAvMDgvMjIiLCJzdGF0dXMiOiIxIiwiZGlzcGxheSI6InZpc2hhcmFtIiwidG90YW1udCI6OTksIm5ld19wcm9kX3N0b2NrIjo5OX1dJCQkMTckJCQ5OQ==',	'2020-08-23 19:27:18',	0,	'0',	'0'),
(29,	'9879837249-1598191113',	'W3siY2FydF9pZCI6IjcyIiwicHJvZF9pZCI6IjIwIiwicmVxcXR5IjoiMSIsImlkIjoiMjAiLCJuYW1lIjoiQXBwbGUiLCJwcm9kX2Rlc2MiOiJBbiBhcHBsZSBhIGRheSBrZWVwcyBkb2N0b3IgYXdheSIsInByb2RfcHJpY2UiOiIxMDAiLCJwcm9kX29mZmVyX3ByaWNlIjoiOTkiLCJwcm9kX3N0b2NrIjoiMTAwIiwiY2F0ZWdvcnlpZCI6IjgiLCJpbWFnZSI6IjUyNjA4YzEzNjc5NjdjYWZiODkwMWM4Y2UwOTZmOTEyLmpwZyIsImNyZWF0ZWRfZGF0ZSI6IjA0OjE4OjA5IDIwMjAvMDgvMjIiLCJzdGF0dXMiOiIxIiwiZGlzcGxheSI6InZpc2hhcmFtIiwidG90YW1udCI6OTksIm5ld19wcm9kX3N0b2NrIjo5OX1dJCQkMTckJCQ5OQ==',	'2020-08-23 19:33:49',	0,	'0',	'0'),
(30,	'9879837249-1598191789',	'W3siY2FydF9pZCI6IjcyIiwicHJvZF9pZCI6IjIwIiwicmVxcXR5IjoiMSIsImlkIjoiMjAiLCJuYW1lIjoiQXBwbGUiLCJwcm9kX2Rlc2MiOiJBbiBhcHBsZSBhIGRheSBrZWVwcyBkb2N0b3IgYXdheSIsInByb2RfcHJpY2UiOiIxMDAiLCJwcm9kX29mZmVyX3ByaWNlIjoiOTkiLCJwcm9kX3N0b2NrIjoiMTAwIiwiY2F0ZWdvcnlpZCI6IjgiLCJpbWFnZSI6IjUyNjA4YzEzNjc5NjdjYWZiODkwMWM4Y2UwOTZmOTEyLmpwZyIsImNyZWF0ZWRfZGF0ZSI6IjA0OjE4OjA5IDIwMjAvMDgvMjIiLCJzdGF0dXMiOiIxIiwiZGlzcGxheSI6InZpc2hhcmFtIiwidG90YW1udCI6OTksIm5ld19wcm9kX3N0b2NrIjo5OX1dJCQkMTckJCQ5OQ==',	'2020-08-23 19:39:54',	0,	'0',	'0'),
(31,	'9879837249-1598193091',	'W3siY2FydF9pZCI6Ijc1IiwicHJvZF9pZCI6IjIxIiwicmVxcXR5IjoiMSIsImlkIjoiMjEiLCJuYW1lIjoic2FramxhanMiLCJwcm9kX2Rlc2MiOiJpb3F3ZXVvd2FlIiwicHJvZF9wcmljZSI6IjEyMiIsInByb2Rfb2ZmZXJfcHJpY2UiOiIxMjAiLCJwcm9kX3N0b2NrIjoiMTAwIiwiY2F0ZWdvcnlpZCI6IjkiLCJpbWFnZSI6IjVjMzE1YWIxMjU5MmM3ZmU3MDA2MTdjY2JlMjQ4NWZkLmpwZyIsImNyZWF0ZWRfZGF0ZSI6IjA0OjM2OjI1IDIwMjAvMDgvMjIiLCJzdGF0dXMiOiIxIiwiZGlzcGxheSI6InZpc2hhcmFtIiwidG90YW1udCI6MTIwLCJuZXdfcHJvZF9zdG9jayI6OTl9XSQkJDE3JCQkMTIw',	'2020-08-23 20:06:33',	0,	'0',	'0'),
(32,	'9879837249-1598193500',	'W3siY2FydF9pZCI6Ijc1IiwicHJvZF9pZCI6IjIxIiwicmVxcXR5IjoiMSIsImlkIjoiMjEiLCJuYW1lIjoic2FramxhanMiLCJwcm9kX2Rlc2MiOiJpb3F3ZXVvd2FlIiwicHJvZF9wcmljZSI6IjEyMiIsInByb2Rfb2ZmZXJfcHJpY2UiOiIxMjAiLCJwcm9kX3N0b2NrIjoiMTAwIiwiY2F0ZWdvcnlpZCI6IjkiLCJpbWFnZSI6IjVjMzE1YWIxMjU5MmM3ZmU3MDA2MTdjY2JlMjQ4NWZkLmpwZyIsImNyZWF0ZWRfZGF0ZSI6IjA0OjM2OjI1IDIwMjAvMDgvMjIiLCJzdGF0dXMiOiIxIiwiZGlzcGxheSI6InZpc2hhcmFtIiwidG90YW1udCI6MTIwLCJuZXdfcHJvZF9zdG9jayI6OTl9XSQkJDE3JCQkMTIw',	'2020-08-23 20:08:26',	0,	'0',	'0'),
(33,	'9879837249-1598193535',	'W3siY2FydF9pZCI6Ijc1IiwicHJvZF9pZCI6IjIxIiwicmVxcXR5IjoiMSIsImlkIjoiMjEiLCJuYW1lIjoic2FramxhanMiLCJwcm9kX2Rlc2MiOiJpb3F3ZXVvd2FlIiwicHJvZF9wcmljZSI6IjEyMiIsInByb2Rfb2ZmZXJfcHJpY2UiOiIxMjAiLCJwcm9kX3N0b2NrIjoiMTAwIiwiY2F0ZWdvcnlpZCI6IjkiLCJpbWFnZSI6IjVjMzE1YWIxMjU5MmM3ZmU3MDA2MTdjY2JlMjQ4NWZkLmpwZyIsImNyZWF0ZWRfZGF0ZSI6IjA0OjM2OjI1IDIwMjAvMDgvMjIiLCJzdGF0dXMiOiIxIiwiZGlzcGxheSI6InZpc2hhcmFtIiwidG90YW1udCI6MTIwLCJuZXdfcHJvZF9zdG9jayI6OTl9XSQkJDE3JCQkMTIw',	'2020-08-23 20:09:00',	0,	'0',	'0'),
(34,	'9879837249-1598193578',	'W3siY2FydF9pZCI6Ijc1IiwicHJvZF9pZCI6IjIxIiwicmVxcXR5IjoiMSIsImlkIjoiMjEiLCJuYW1lIjoic2FramxhanMiLCJwcm9kX2Rlc2MiOiJpb3F3ZXVvd2FlIiwicHJvZF9wcmljZSI6IjEyMiIsInByb2Rfb2ZmZXJfcHJpY2UiOiIxMjAiLCJwcm9kX3N0b2NrIjoiMTAwIiwiY2F0ZWdvcnlpZCI6IjkiLCJpbWFnZSI6IjVjMzE1YWIxMjU5MmM3ZmU3MDA2MTdjY2JlMjQ4NWZkLmpwZyIsImNyZWF0ZWRfZGF0ZSI6IjA0OjM2OjI1IDIwMjAvMDgvMjIiLCJzdGF0dXMiOiIxIiwiZGlzcGxheSI6InZpc2hhcmFtIiwidG90YW1udCI6MTIwLCJuZXdfcHJvZF9zdG9jayI6OTl9XSQkJDE3JCQkMTIw',	'2020-08-23 20:09:44',	1,	'20200823111212800110168094301830724',	'2020-08-23 20:09:51.0');

DROP TABLE IF EXISTS `product_rating`;
CREATE TABLE `product_rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_score` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `reviewer` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile_num` text NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `is_email_verified` enum('no','yes') NOT NULL DEFAULT 'no',
  `verification_key` varchar(250) DEFAULT NULL,
  `wishlist` varchar(10) NOT NULL DEFAULT '0',
  `otp` int(6) DEFAULT '0',
  `mobileid` text,
  `stat` enum('0','1') NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `name`, `email`, `mobile_num`, `password`, `is_email_verified`, `verification_key`, `wishlist`, `otp`, `mobileid`, `stat`, `created`) VALUES
(1,	'Mohamed Nashid Mifzal P',	'',	'919500765068',	'111111',	'yes',	'',	'',	152131,	'cxDWkYxknwk:APA91bGKghnPkQAdqSHP47w9qAnrpMXuIVaVqeeAwgKjcTsIjskYWKLBqX2Kq2aGng7aXKZLzLOKBj5TOCRYswHZdTY3b_IdAr79eKXgRoY9V8BF2X_k4b1qfA1oKq2v8F3nqkIiwdk_',	'0',	'2020-08-15 20:03:25'),
(3,	'sikaykd',	NULL,	'783492342343',	'4297f44b13955235245b2497399d7a93',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-15 20:03:25'),
(4,	'sikaykd',	NULL,	'783492342343',	'4297f44b13955235245b2497399d7a93',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-15 20:03:25'),
(5,	'sikaykd',	NULL,	'783492342343',	'4297f44b13955235245b2497399d7a93',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-15 20:03:25'),
(6,	'aksjhdksa',	NULL,	'879239427343',	'4297f44b13955235245b2497399d7a93',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-15 20:03:25'),
(7,	'jshak',	'sajhk@Jkshks.in',	'123123',	'4297f44b13955235245b2497399d7a93',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-15 20:03:25'),
(8,	'Mohamed Nashid Mifzal P',	'nmifzal@gmail.com',	'+919500765068',	'96e79218965eb72c92a549dd5a330112',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-22 12:13:46'),
(9,	'Mohamed Nashid Mifzal P',	'nmifzal@gmail.com',	'+919500765068',	'96e79218965eb72c92a549dd5a330112',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-22 12:16:52'),
(10,	'MajeedAbdul',	'majeed@gmail.com',	'9362121822',	'0373cb8ed06aa2d0d7964eb161185023',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-23 06:18:41'),
(12,	'abdulMajeed',	'majeed@mail.com',	'9876543211',	'0373cb8ed06aa2d0d7964eb161185023',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-23 06:26:40'),
(13,	'MdTalha',	'talha@gmail.com',	'8990009900',	'12a5ca3d3dcda8cff5579b368260c70e',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-23 06:34:04'),
(14,	'nash',	'nash@gmail.com',	'9879837249',	'12a5ca3d3dcda8cff5579b368260c70e',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-23 06:36:50'),
(17,	'Talha',	'talha5189s@gmail.com',	'8667851162',	'e6e061838856bf47e1de730719fb2609',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-23 14:52:07'),
(19,	'majeed',	'ksjakh@KJhkaa.in',	'1234567899',	'12a5ca3d3dcda8cff5579b368260c70e',	'no',	NULL,	'0',	0,	NULL,	'0',	'2020-08-29 10:48:53');

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `orgName` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `mobile_no2` varchar(30) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_on` varchar(25) NOT NULL,
  `type` varchar(10) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_details` (`id`, `name`, `orgName`, `mobile_no`, `mobile_no2`, `addr`, `email_id`, `user_type`, `created_on`, `type`, `salary`) VALUES
(1,	'superAdmin',	'',	'9362121822',	'',	'',	'katiyanabdulmajeed@gmail.com',	0,	'10-04-2020',	'0',	0);

DROP TABLE IF EXISTS `user_pwd_details`;
CREATE TABLE `user_pwd_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `pwd_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_pwd_details` (`id`, `user_id`, `user_pwd`, `pwd_date`) VALUES
(1,	1,	'admin@123',	'10-04-2020'),
(2,	5,	'11111',	'2020-04-13 03:58:47'),
(3,	7,	'1234',	'2020-05-19 09:12:56'),
(4,	8,	'1234',	'2020-05-19 10:44:17');

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `flag` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2020-08-29 12:18:48
