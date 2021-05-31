-- Adminer 4.8.0 MySQL 8.0.24 dump



SET NAMES utf8;

SET time_zone = '+00:00';

SET foreign_key_checks = 0;

SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';



SET NAMES utf8mb4;



DROP DATABASE IF EXISTS `matprace`;

CREATE DATABASE `matprace` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `matprace`;



DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (

  `id` int NOT NULL AUTO_INCREMENT,

  `post_id` int NOT NULL,

  `name` varchar(250) NOT NULL,

  `email` varchar(250) NOT NULL,

  `content` text NOT NULL,

  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY (`id`),

  KEY `post_id` (`post_id`),

  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;



INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `content`, `created_at`) VALUES

(1,	4,	'rtzrtz',	'rtzrtz@gmail.com',	'tzutzu',	'2020-12-15 14:58:07'),

(2,	1,	'hjghjgh',	'fgjfgjf@sdfsdf.com',	'ahoj',	'2021-01-05 14:56:46');



DROP TABLE IF EXISTS `game`;

CREATE TABLE `game` (

  `id` int NOT NULL AUTO_INCREMENT,

  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,

  `genre_id` int NOT NULL,

  `age_from` smallint DEFAULT NULL,

  `price` float NOT NULL,

  `release_date` date DEFAULT NULL,

  `distributor` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci DEFAULT NULL,

  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci DEFAULT NULL,

  `created_at` datetime NOT NULL,

  `active` tinyint NOT NULL,

  PRIMARY KEY (`id`),

  KEY `genre_id` (`genre_id`),

  CONSTRAINT `game_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;



INSERT INTO `game` (`id`, `name`, `genre_id`, `age_from`, `price`, `release_date`, `distributor`, `description`, `created_at`, `active`) VALUES

(1,	'Counter Strike: Global Offensive',	1,	NULL,	359,	'2012-10-21',	'Valve',	'pju pju',	'2021-02-10 11:10:58',	1),

(2,	'Rocket League',	2,	NULL,	500,	'2015-07-13',	'Psyonix',	'aut├ş─Źka brm brm goool',	'2021-02-10 11:46:15',	1),

(3,	'Business tour',	2,	NULL,	1,	'2016-04-13',	'Steam',	'monopoly',	'2021-02-10 11:47:30',	1),

(4,	'among us',	2,	NULL,	120,	'2018-03-15',	'Steam',	'velmi p┼Ö├ítelsk├í hra :)',	'2021-02-10 11:48:46',	1),

(5,	'American Truck Simulator',	3,	NULL,	250,	'2016-05-23',	'SCSoftware',	'kamijony amerika brm brm',	'2021-02-10 11:50:04',	1),

(6,	'Euro Truck Simulator 2',	3,	NULL,	250,	'2010-06-12',	'SCSoftware',	'kamijony evropa brm brm',	'2021-02-10 11:50:45',	1),

(7,	'Dirt 3',	3,	NULL,	123,	'2013-05-12',	'Steam',	'brm brm zavod',	'2021-02-10 11:51:56',	1),

(8,	'Dirt 4',	3,	NULL,	150,	'2018-02-02',	'Steam',	'brm zavod',	'2021-02-10 11:53:09',	1),

(9,	'The Sims 4',	3,	NULL,	650,	'2016-12-12',	'Origin',	'Simulator zivota',	'2021-02-10 11:54:17',	1),

(10,	'Dota 2',	1,	NULL,	1,	'2010-05-06',	'Valve',	'lep┼í├ş lolko :)',	'2021-02-10 11:55:41',	1),

(11,	'League of Legends',	1,	NULL,	1,	'2008-06-05',	'Riot',	'Hor┼í├ş dota :)',	'2021-02-10 11:56:32',	1),

(12,	'VALORANT',	1,	NULL,	1,	'2019-05-06',	'Riot',	'pif paf',	'2021-02-10 11:57:03',	1),

(13,	'Nekopara',	4,	NULL,	250,	'2016-05-12',	'Steam',	'ko─Źkoholky',	'2021-02-10 11:58:02',	1),

(14,	'FlatOut 2',	3,	NULL,	150,	NULL,	'Steam',	'brm brm bum',	'2021-02-10 11:59:25',	1),

(15,	'Need for Speed',	3,	NULL,	50,	'2010-12-13',	'Steam',	'brm zavod',	'2021-02-10 12:00:35',	1),

(16,	'Grand Theft Auto: San Andreas',	1,	NULL,	300,	'2006-02-16',	'Steam',	'pif paf bum pl├íc',	'2021-02-10 12:02:21',	1),

(17,	'Grand Theft Auto V',	1,	NULL,	1200,	'2016-12-28',	'Steam',	'pju bum plac au',	'2021-02-10 12:03:08',	1),

(18,	'Half Life 2',	2,	NULL,	211,	'2010-04-15',	'Valve',	'pacidlo',	'2021-02-10 12:04:15',	1),

(19,	'Portal 2',	2,	NULL,	150,	'2013-05-16',	'Valve',	'Portal modry Portal Zluty',	'2021-02-10 12:04:51',	1),

(20,	'HITMAN',	3,	NULL,	1200,	'2016-06-18',	'Steam',	'p┼í┼í┼ít zabit c├şl',	'2021-02-10 12:06:05',	1);



DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre` (

  `id` int NOT NULL AUTO_INCREMENT,

  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,

  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;



INSERT INTO `genre` (`id`, `name`, `description`) VALUES

(1,	'online',	'play with friends'),

(2,	'single',	'hra pro jednoho'),

(3,	'simulator',	'simulator jizdy'),

(4,	'anime',	'kockoholky');



DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (

  `id` int NOT NULL AUTO_INCREMENT,

  `title` varchar(255) NOT NULL,

  `content` text NOT NULL,

  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;



INSERT INTO `post` (`id`, `title`, `content`, `created_at`) VALUES

(1,	'Article One',	'Lorem ipusm dolor one',	'2020-11-26 14:44:08'),

(2,	'Article Two',	'Lorem ipsum dolor two',	'2020-11-26 14:44:08'),

(3,	'Article Three',	'Lorem ipsum dolor three',	'2020-11-26 14:44:08'),

(4,	'TVOJE MAMA',	'AHOJ JAK TO JDE? LOOOOOL',	'2020-12-08 14:21:36');



DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (

  `id_user` int NOT NULL AUTO_INCREMENT,

  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,

  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,

  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,

  `birthday` date DEFAULT NULL,

  `role` varchar(20) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,

  PRIMARY KEY (`id_user`)

) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;



INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `birthday`, `role`) VALUES

(1,	'babca',	'$2y$10$SGhn9YU2VyD6O0V6MpzjiuJQdfyresxCnsA9kk58DVS/toLAyH/5O',	'nemam@email.com',	'2021-01-21',	'admin');

