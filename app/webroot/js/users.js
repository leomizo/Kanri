var Users = {};

Users.load = function() {

	$("#UserAddForm").submit(function(e) {
		e.preventDefault();
		if ($("#UserPassword").val() != $("#UserPasswordConfirm").val()) {
			Users.showPasswordConfirmationError();
		}
		else {
			this.submit();
		}
	});

}

Users.showPasswordConfirmationError = function() {
	Kanri.shakeElement($("#UserPasswordConfirm").parents(".control-group"));
	$("#UserPasswordConfirm").parents(".control-group").addClass("error");
	$("#UserPasswordConfirm").parent(".controls").children(".help-inline").show();
}

$(function(){Users.load()});

