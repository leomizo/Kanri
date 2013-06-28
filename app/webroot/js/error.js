var Error = {};

Error.onLoad = function() {

	$("#message-container").animate({opacity: 0.7, top: 50}, 380, function() {
		$("#message-container").animate({opacity: 1, top: 70}, 120);
	});
}

$(function(){Error.onLoad()});