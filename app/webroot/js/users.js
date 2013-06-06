var Users = {};

Users.validatePasswordConfirmation = function() {
	if ($("#UserPassword").val() != $("#UserPasswordConfirm").val()) {
		Users.showPasswordConfirmationError();
		return false;
	}
	else return true;
}

Users.showPasswordConfirmationError = function() {
	Kanri.shakeElement($("#UserPasswordConfirm").parents(".control-group"));
	$("#UserPasswordConfirm").parents(".control-group").addClass("error");
	$("#UserPasswordConfirm").parent(".controls").children(".help-inline").show();
}

