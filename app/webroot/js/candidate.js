var Candidate = {};

Candidate.selectCountry = function(select) {
	$('#state-input, #state-label, #state-name-input, #state-name-label, #state-divider').hide();
	$('#city-input, #city-label, #city-name-input, #city-name-label, #city-divider').hide();
	$('#country-name-input, #state-name-input, #city-name-input').val("");
	if ($(select).val() == 'null') {
		$("#country-name-label").css('display', 'inline');
		$("#country-name-input").show("150");
		$('#state-label, #state-name-input, #state-divider').show();
		$('#city-label, #city-name-input, #city-divider').show();
	}
	else if ($(select).val() != '') {
		$("#country-name-label, #country-name-input").hide("100");
		$("#state-input").load('/states/get_states_by_country/' + $(select).val(), function() {
			$('#state-label, #state-divider, #state-input').show();
		});
	}
}

Candidate.selectState = function(select) {
	$('#city-input, #city-label, #city-name-input, #city-name-label, #city-divider').hide();
	$('#state-name-input, #city-name-input').val("");
	if ($(select).val() == 'null') {
		$("#state-name-label").css('display', 'inline');
		$("#state-name-input").show("150");
		$('#city-label, #city-name-input, #city-divider').show();
	}
	else if ($(select).val() != '') {
		$("#state-name-label, #state-name-input").hide("100");
		$("#city-input").load('/cities/get_cities_by_state/' + $(select).val(), function() {
			$('#city-label, #city-divider, #city-input').show();
		});
	}
}

Candidate.selectCity = function(select) {
	$('#city-name-input').val("");
	if ($(select).val() == 'null') {
		$("#city-name-label").css('display', 'inline');
		$("#city-name-input").show("150");
	}
}