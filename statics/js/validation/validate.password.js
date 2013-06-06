/*
 * jQuery validate.password plug-in 1.0
 *
 * http://bassistance.de/jquery-plugins/jquery-plugin-validate.password/
 * 
 * Depends on validation plugin 1.5+
 *
 * Copyright (c) 2009 Jörn Zaefferer
 *
 * $Id$
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
(function($) {
	
	var LOWER = /[a-z]/,
		UPPER = /[A-Z]/,
		DIGIT = /[0-9]/,
		DIGITS = /[0-9].*[0-9]/,
		SPECIAL = /[^a-zA-Z0-9]/,
		SAME = /^(.)\1+$/;
		
	function rating(rate, message) {
		return {
			rate: rate,
			messageKey: message
		};
	}
	
	function uncapitalize(str) {
		return str.substring(0, 1).toLowerCase() + str.substring(1);
	}
	
	$.validator.passwordRating = function(password, username) {
		if (!password || password.length < 6)
			return rating(1, "too-short");
		if (username && password == username)
			return rating(1, "similar-to-username");
		if (SAME.test(password))
			return rating(2, "very-weak");
		
		var lower = LOWER.test(password),
			upper = UPPER.test(uncapitalize(password)),
			digit = DIGIT.test(password),
			digits = DIGITS.test(password),
			special = SPECIAL.test(password);
		
		if (lower && upper && digit || lower && digits || upper && digits || special)
			return rating(5, "strong");
		if (lower && upper || lower && digit || upper && digit)
			return rating(4, "good");
		return rating(2, "very-weak");
	}
	
	$.validator.passwordRating.messages = {
		"similar-to-username": "Too similar to username",
		"too-short": "Too short",
		"very-weak": "Very weak",
		"weak": "Weak",
		"good": "Good",
		"strong": "Strong"
	}
	
	$.validator.addMethod("password", function(value, element, usernameField) {
		// use untrimmed value
		var password = element.value,
		// get username for comparison, if specified
			username = $(typeof usernameField != "boolean" ? usernameField : []);
			
		var rating = $.validator.passwordRating(password, username.val());
		// update message for this field
		
		var meter = $('<div class="password-meter"><div class="password-meter-message">&nbsp;</div><div class="password-meter-bg"><div class="password-meter-bar"></div></div></div>');//$(".password-meter", element.form);
		
		meter.find(".password-meter-bar").removeClass().addClass("password-meter-bar").addClass("password-meter-" + rating.messageKey);
		meter.find(".password-meter-message")
		.removeClass()
		.addClass("password-meter-message")
		.addClass("password-meter-message-" + rating.messageKey)
		.text($.validator.passwordRating.messages[rating.messageKey]);
		$.validator.messages.password=meter;
		$('body').data('_password-messages',meter);
		// display process bar instead of error message
		
		return true;
	}, "&nbsp;");
	// manually add class rule, to make username param optional
	$.validator.classRuleSettings.password = { password: true };
	
})(jQuery);
