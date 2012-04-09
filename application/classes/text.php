<?php

class Text extends Kohana_Text {

	/**
	 * Instance of Markdown.
	 */
	static $markdown;

	/**
	 * I'm sure that Singleton pattern is **NOT** the best way to do this... ;D
	 * 
	 * @param  string Text (without formatting)
	 * @return string Formatted text
	 */
	static function markdown($text) {

		if (empty(self::$markdown)) {

			require Kohana::find_file('vendor', 'markdown');

			self::$markdown = new Darkmown();

		}

		return self::$markdown->transform($text);

	}

}