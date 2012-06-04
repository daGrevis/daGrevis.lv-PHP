CREATE TABLE `users` (
	`id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`access` int NOT NULL DEFAULT 1,
	`created` int(10) unsigned NOT NULL,
	`last_seen` int(10) unsigned NOT NULL
) ENGINE='InnoDB';