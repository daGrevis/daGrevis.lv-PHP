(function() {

	'use strict';

	$(function() {

		/**
		 * Draws logo.
		 */
		
		Raphael($('#logo')[0], 48, 48)
			.path('M 22.137,19.625 32,12 20,12 16,0 12,12 0,12 9.875,19.594 6,32 16.016,24.32 26.008,32 z')
			.attr({
				'fill': 'black',
				'transform': 't8,8 s1.4'
			})
			;

		/**
		 * Draws left-quotes.
		 */

		var $blockquote = $('blockquote');

		if ($blockquote.length) {

			var $quote = $('<div class="left_quote" />');

			Raphael($quote[0], 32, 24)
				.path('M32,24V12h-8c0-4.41,3.586-8,8-8V0c-6.617,0-12,5.383-12,12v12H32z M12,24V12H4c0-4.41,3.586-8,8-8V0C5.383,0,0,5.383,0,12v12H12z')
				.attr({
					'fill': 'black',
					'transform': 's.75'
				})
				;

			$.each($('blockquote'), function(i, el) {

				$(el).before($quote.clone());

			});

			$quote = null;

		}

		/**
		 * Focuses on first input. For usability.
		 */
		
		$('input')
			.not('[type="hidden"]')
			.not('[type="checkbox"]')
			.first()
				.focus()
				;

	});

}());
