(function() {

	'use strict';

	$(function() {

		/**
		 * Draws logo.
		 */

		Raphael($('#logo')[0], 48, 48)
			.path('M 22.137,19.625 32,12 20,12 16,0 12,12 0,12 9.875,19.594 6,32 16.016,24.32 26.008,32 z')
			.attr({
				'fill': '#202020',
				'stroke': '#202020',
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
					'fill': '#202020',
					'stroke': '#202020',
					'transform': 's.7'
				})
				;

			$.each($('blockquote'), function(i, el) {

				$(el).before($quote.clone());

			});

			$quote = null;

		}

		/**
		 * Draws arrow & adds event for scrolling top.
		 */

		var $arrow = $('#arrow');

		Raphael($arrow[0], 24, 24)
			.path('M0,16c0,8.836,7.164,16,16.004,16C24.836,32,32,24.836,32,16c0-8.838-7.164-16-15.996-16 C7.164,0,0,7.162,0,16z M24,15.969h-6V24h-4v-8.031H8.031l7.973-7.971L24,15.969z')
			.attr({
				'fill': '#202020',
				'stroke': '#202020',
				'transform': 't-4,-4 s.7'
			})
			;

		$arrow.click(function() {

			$('html, body').animate({scrollTop: 0}, 500);

		});

		$(window).scroll(function() {

			if ($(window).scrollTop() >= 400) {

				$arrow.fadeIn(1000);

			} else {

				$arrow.fadeOut(500);

			}

		});

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
