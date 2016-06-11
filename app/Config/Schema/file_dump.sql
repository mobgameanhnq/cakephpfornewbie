

DROP TABLE IF EXISTS `cakephp`.`posts`;
DROP TABLE IF EXISTS `cakephp`.`users`;


CREATE TABLE `cakephp`.`posts` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`body` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,
	`user_id` int(11) DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `cakephp`.`users` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`role` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

