-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Server: 127.0.0.1
-- Generation Time: 26-04-2024 at 05:51:45
-- Server version: 10.4.27-MariaDB
-- PHP version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forumdb`
--
CREATE DATABASE IF NOT EXISTS `forumdb`;
USE `forumdb`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `emailVerified` datetime DEFAULT NULL,
  `username` varchar(50) NOT NULL UNIQUE,
  `passwordHash` varchar(60) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subgroup`
--
CREATE TABLE `subgroup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creatorId` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`creatorId`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--
CREATE TABLE `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creatorId` int NOT NULL,
  `subgroupId` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`creatorId`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`subgroupId`) REFERENCES `subgroup` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--
CREATE TABLE `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creatorId` int NOT NULL,
  `postId` int NOT NULL,
  `replyToId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`creatorId`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`postId`) REFERENCES `post` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `response`
--
CREATE TABLE `response` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creatorId` int NOT NULL,
  `commentId` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`creatorId`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`commentId`) REFERENCES `comment` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--
CREATE TABLE `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `provider` varchar(50) DEFAULT NULL,
  `providerAccountId` varchar(50) DEFAULT NULL,
  `refresh_token` text DEFAULT NULL,
  `access_token` text DEFAULT NULL,
  `expires_at` int DEFAULT NULL,
  `token_type` varchar(50) DEFAULT NULL,
  `scope` varchar(50) DEFAULT NULL,
  `id_token` text DEFAULT NULL,
  `session_state` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provider` (`provider`,`providerAccountId`),
  FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--
CREATE TABLE `session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `expires` datetime DEFAULT NULL,
  `sessionToken` varchar(255) DEFAULT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--
CREATE TABLE `subscription` (
  `userId` int NOT NULL,
  `subgroupId` int NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`, `subgroupId`),
  FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`subgroupId`) REFERENCES `subgroup` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--
CREATE TABLE `vote` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` enum('UPVOTE','DOWNVOTE') DEFAULT NULL,
  `userId` int NOT NULL,
  `postId` int DEFAULT NULL,
  `commentId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId` (`userId`,`postId`,`commentId`),
  FOREIGN KEY (`userId`) REFERENCES `user` (`id`),
  FOREIGN KEY (`postId`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`commentId`) REFERENCES `comment` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
