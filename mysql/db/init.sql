CREATE DATABASE sample_db;
use sample_db;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(7) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_mailaddress` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `class` int(2) DEFAULT NULL,
  `user_img` varchar(50) NOT NULL DEFAULT '0.gif',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

CREATE TABLE `chat` (
  `user_id` int(7) NOT NULL,
  `request_id` int(7) NOT NULL,
  `chat` varchar(255) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '0',
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

CREATE TABLE `message` (
  `user_id` int(7) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

CREATE TABLE `schedule` (
  `yotei` varchar(64) NOT NULL,
  `date` date NOT NULL,
  `startTime` varchar(5) NOT NULL,
  `endTime` varchar(5) NOT NULL,
  `color` varchar(8) NOT NULL,
  `class` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;