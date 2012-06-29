CREATE TABLE `blog_articles` (
	`id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`title` varchar(255) NOT NULL,
	`slug` varchar(255) NOT NULL,
	`content` text NOT NULL,
	`tweet_id` varchar(255),
	`created` int(10) unsigned NOT NULL,
	`last_updated` int(10) unsigned,
	`is_published` tinyint(1) unsigned NOT NULL DEFAULT 1
) ENGINE='InnoDB';
