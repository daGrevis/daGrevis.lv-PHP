CREATE TABLE `cms_pages` (
	`id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`title` varchar(255) NOT NULL,
	`content` text NOT NULL,
	`created` int(10) unsigned NOT NULL
) ENGINE='InnoDB';