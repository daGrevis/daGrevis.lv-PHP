CREATE TABLE `blog_article_tags` (
	`id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`article_id` int unsigned NOT NULL,
	`title` varchar(255) NOT NULL
) ENGINE='InnoDB';