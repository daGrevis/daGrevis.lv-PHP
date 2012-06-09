(function() {

	'use strict';

	$(function() {

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
