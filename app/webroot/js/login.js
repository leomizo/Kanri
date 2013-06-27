var Login = {
	errorCondition: false
};

Login.onLoad = function() {
	$("#bkg_login").css("margin-top", "+=30");
	$("#bkg_login").css("opacity", 0);
	$("h1").css("top", "-=20");
	$("h1").css("opacity", 0);
	$("#ico_kanri").css("top", "+=20");
	$("#ico_kanri").css("opacity", 0);
	$("#msg_error").css("top", "-=10");
	$("#msg_error").css("opacity", 0);
	setTimeout(function() {
		$("#ico_kanri").animate({top: "-=20", opacity: 1}, 450, function () {
			$("h1").animate({top: "+=20", opacity: 1}, 450, function() {
				$("#ico_kanri").animate({top: "-=100"}, 400);
				$("h1").animate({top: "-=100"}, 400, function () {
					$("#bkg_login").animate({"margin-top": "-=55", opacity: 0.7}, 300, function() {
						$("#bkg_login").animate({"margin-top": "+=15", opacity: 1}, 200);	
					});	
				});
			});
		})
	}, 100);
}

Login.authenticate = function() {
	if (!$("#btn_login").hasClass("disabled")) {
		$("#btn_login").addClass("disabled");
		$.post("login", $("#form_login").serialize(), function(redirection) {
			if (redirection) {
                window.location.href = redirection;
            }
		}).fail(function() {
			if (!Login.errorCondition) {
				Login.shakeWindow(function() {
					Login.presentErrorMessage();
					$("#btn_login").removeClass("disabled");
				});
				Login.errorCondition = true;
			}
			else Login.shakeWindow(function() {
				Login.animateErrorMessage();
				$("#btn_login").removeClass("disabled");
			});
		});
	}
}

Login.shakeWindow = function(animationFinished) {
	$("#bkg_login").animate({left: "+=20"}, 80, function() {
	$("#bkg_login").animate({left: "-=35"}, 70, function() {
	$("#bkg_login").animate({left: "+=25"}, 75, function() {
	$("#bkg_login").animate({left: "-=15"}, 80, function() {
	$("#bkg_login").animate({left: "+=10"}, 85, function() {
	$("#bkg_login").animate({left: "-=5"}, 90, animationFinished)})})})})});
}

Login.presentErrorMessage = function() {
	$(".control-group").addClass("error");
	$("#bkg_login").animate({height: "+=25"}, 100, function() {
		$("#msg_error").animate({top: "+=15", opacity: 0.7}, 100, function() {
			$("#msg_error").animate({top: "-=5", opacity: 1}, 50);
		});
	});
}

Login.hideErrorMessage = function() {
	$(".control-group").removeClass("error");
	$("#msg_error").animate({top: "+=5", opacity: 0.7}, 50, function() {
		$("#msg_error").animate({top: "-=15", opacity: 0}, 100, function() {
			$("#bkg_login").animate({height: "-=25"}, 100);	
		});
	});
}

Login.animateErrorMessage = function() {
	$("#msg_error").animate({top: "-=15"}, 120, function() {
		$("#msg_error").animate({top: "+=15"}, 100, function() {
			$("#msg_error").animate({top: "-=10"}, 100, function() {
				$("#msg_error").animate({top: "+=10"}, 70);
			});
		});	
	});	
}

Login.removeErrorCondition = function() {
	if (Login.errorCondition) {
		Login.hideErrorMessage();
		Login.errorCondition = false;
	}
}

$(function(){Login.onLoad()});

