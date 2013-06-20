$(function() {Kanri.onLoad()});

var Kanri = {};

Kanri.onLoad = function() {
	$(window).keydown(function(event){
	    if(event.keyCode == 13) {
	      	event.preventDefault();
	      	return false;
	    }
  	});

  	$("#context-options").css("margin-left", - parseInt($("#context-options").css("width")) / 2);

	if ($(".date-time-picker").length > 0) {
		$(".date-time-picker").datetimepicker({
			language: 'pt-BR'
		});
	}

	$("input.currency-input").on("keyup input paste", function() {
		$(this).val($(this).val().replace(/[^0-9.]/g, ""));
	});
}

Kanri.shakeElement = function(element) {

	$(element).animate({'margin-left': "-=25px"}, 90, function() {
		$(element).animate({'margin-left': "+=45px"}, 85, function() {
			$(element).animate({'margin-left': "-=35px"}, 80, function() {
				$(element).animate({'margin-left': "+=25px"}, 75, function() {
					$(element).animate({'margin-left': "-=15px"}, 70, function() {
						$(element).animate({'margin-left': "+=5px"}, 65);	
					});
				});	
			});	
		});
	});

}
