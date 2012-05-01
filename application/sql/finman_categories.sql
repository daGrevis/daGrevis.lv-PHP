CREATE TABLE `finman_categories` (
	`id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`title` varchar(255) NOT NULL,
	`description` varchar(1000) NULL,
	`created` int(10) NOT NULL,
	`last_updated` int(10) NULL
) ENGINE='InnoDB';