/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP DATABASE IF EXISTS schema;
CREATE DATABASE schema;
USE schema;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  `id` int(11) NOT NULL auto_increment,
  `firstname` char(20) NOT NULL default '',
  `lastname` char(20) NOT NULL default '',
  `password` char(20) NOT NULL default '',
  `email` char(20) NOT NULL default '',
  `date_joined` date NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES (1,'Admin','Admin','password123','admin@bugme.com',2000-01-12);

CREATE TABLE issues (
  `id` int(11) NOT NULL auto_increment,
  `title` char(30) NOT NULL default '',
  `description` char(250) NOT NULL default '',
  `type` char(20) NOT NULL default '',
  `priority` char(20) NOT NULL default '',
  `status` char(20) NOT NULL default '',
  `assigned_to` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
