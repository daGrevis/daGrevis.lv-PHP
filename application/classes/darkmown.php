<?php

/**
 * Wrapper for Markdown (https://github.com/michelf/php-markdown).
 * 
 * @author daGrevis
 */
class Darkmown extends Markdown_Parser {

	/**
	 * Sweet Jesus! I needed to use PHP 4 there... >.<
	 */
	var $no_markup = true;
	var $no_entities = true;

}