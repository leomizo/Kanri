$(function() {Kanri.onLoad()});

var Kanri = {
	animating: false
};

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

	$("input.integer-input").on("keyup input paste", function() {
		$(this).val($(this).val().replace(/[^0-9]/g, ""));
	});
}

Kanri.shakeElement = function(element) {

	if (!Kanri.animating) {
		Kanri.animating = true;
		$(element).animate({'margin-left': "-=25px"}, 90, function() {
			$(element).animate({'margin-left': "+=45px"}, 85, function() {
				$(element).animate({'margin-left': "-=35px"}, 80, function() {
					$(element).animate({'margin-left': "+=25px"}, 75, function() {
						$(element).animate({'margin-left': "-=15px"}, 70, function() {
							$(element).animate({'margin-left': "+=5px"}, 65, function() {
								Kanri.animating = false;
							});	
						});
					});	
				});	
			});
		});
	}

}

Kanri.elementJump = function(element) {
	if (!Kanri.animating) {
		Kanri.animating = true;
		$(element).animate({'top': "-=40px"}, 120, function() {
			$(element).animate({'top': "+=40px"}, 120, function() {
				$(element).animate({'top': "-=20px"}, 95, function() {
					$(element).animate({'top': "+=20px"}, 95, function() {
						Kanri.animating = false;
					});	
				});	
			});
		});
	}
}
