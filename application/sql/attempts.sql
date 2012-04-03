CREATE TABLE `attempts` (
	`id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`ip` int NOT NULL,
	`created` int unsigned NOT NULL
) ENGINE='InnoDB';