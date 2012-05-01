CREATE TABLE `finman_items` (
	`id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`category_id` int unsigned NOT NULL,
	`title` varchar(255) NOT NULL,
	`description` varchar(1000) NULL,
	`price` int unsigned NOT NULL,
	`created` int(10) NOT NULL,
	`last_updated` int(10) NULL
) ENGINE='InnoDB';