CREATE TABLE `user_authentications` (
	`id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`user_id` int unsigned NOT NULL,
	`provider` tinyint unsigned NOT NULL DEFAULT 0,
	`user_id_of_provider` int,
	`created` int(10) unsigned NOT NULL
) ENGINE='InnoDB';