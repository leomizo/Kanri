$(function() {

	var errorCondition = false;

	setInitialElementsPositions();

	executeInitialAnimation();

	$("#btn_login").click(function(event) {
		if (!$("#btn_login").hasClass("disabled")) {
			$("#btn_login").addClass("disabled");
			if (authenticate($("#inputUser").val(), $("#inputPassword").val())) {
				window.location.replace("dashboard.html");
			}
			else {
				if (!errorCondition) {
					shakeWindow(function() {
						presentErrorMessage();
						$("#btn_login").removeClass("disabled");
					});
					errorCondition = true;
				}
				else shakeWindow(function() {
					animateErrorMessage();
					$("#btn_login").removeClass("disabled");
				});
			}
		}
	});

	$("#inputUser").focus(function(event) {
		if (errorCondition) {
			hideErrorMessage();
			errorCondition = false;
		}
	});

	$("#inputPassword").focus(function(event) {
		if (errorCondition) {
			hideErrorMessage();
			errorCondition = false;
		}
	});
});

function setInitialElementsPositions() {
	//	Login window
	$("#bkg_login").css("margin-top", "+=30");
	$("#bkg_login").css("opacity", 0);

	//	"Kanri" title
	$("h1").css("top", "-=20");
	$("h1").css("opacity", 0);

	//	"Kanri" logo
	$("#ico_kanri").css("top", "+=20");
	$("#ico_kanri").css("opacity", 0);

	//	Error message
	$("#msg_error").css("top", "-=10");
	$("#msg_error").css("opacity", 0);	
}

function executeInitialAnimation() {
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

function authenticate(user, password) {
	if (user == "edson@kanri.com" && password == "1234") {
		return true;
	}
	else {
		return false;
	}
}

function shakeWindow(animationFinished) {
	$("#bkg_login").animate({left: "+=20"}, 80, function() {
	$("#bkg_login").animate({left: "-=35"}, 70, function() {
	$("#bkg_login").animate({left: "+=25"}, 75, function() {
	$("#bkg_login").animate({left: "-=15"}, 80, function() {
	$("#bkg_login").animate({left: "+=10"}, 85, function() {
	$("#bkg_login").animate({left: "-=5"}, 90, animationFinished)})})})})});
}

function presentErrorMessage() {
	$(".control-group").addClass("error");
	$("#bkg_login").animate({height: "+=25"}, 100, function() {
		$("#msg_error").animate({top: "+=15", opacity: 0.7}, 100, function() {
			$("#msg_error").animate({top: "-=5", opacity: 1}, 50);
		});
	});
}

function hideErrorMessage() {
	$(".control-group").removeClass("error");
	$("#msg_error").animate({top: "+=5", opacity: 0.7}, 50, function() {
		$("#msg_error").animate({top: "-=15", opacity: 0}, 100, function() {
			$("#bkg_login").animate({height: "-=25"}, 100);	
		});
	});
}

function animateErrorMessage() {
	$("#msg_error").animate({top: "-=15"}, 120, function() {
		$("#msg_error").animate({top: "+=15"}, 100, function() {
			$("#msg_error").animate({top: "-=10"}, 100, function() {
				$("#msg_error").animate({top: "+=10"}, 70);
			});
		});	
	});	
}

