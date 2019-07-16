(function ($) {
	"use strict";

	$(document).ready(function () {
		// Show the 2nd button text field value on console log
		$(document).on('change keyup', '#elementor-editor-wrapper .elementor-control-text2 input[data-setting="text2"]', function () {
			console.log($(this).val());
		});

	});
	/*End document ready*/

})(jQuery);