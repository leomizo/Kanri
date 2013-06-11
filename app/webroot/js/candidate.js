var Candidate = {};

Candidate.handleAsynchronousPagination = function(link) {
	$($(link).attr('paginated-content')).load($(link).attr('href'));
	return false;
}

Candidate.handleModalSelection = function(link) {
	$($(link).attr('name-input')).text($(link).text());
	$($(link).attr('id-input')).val($(link).attr('entry-id'));
	$(link).parents('.modal').modal('hide');
	return false;
}

// Dependents

Candidate.addDependent = function() {
	var dependentIndex = $('#dependent-table > tr').length;
	$('#dependent-table').append('<tr><td style="text-align: center">' + $('#dependent-age-input').val() + '</td><td style="text-align: center">' + $('#dependent-gender-input option:selected').text() + '</td><td><button type="button" class="btn btn-mini btn-danger" onclick="Candidate.removeDependent(this)"><i class="icon-remove icon-white"></i></button></td></tr>');
	$('#dependent-inputs').append('<input class="candidate-dependent-age" type="hidden" name="data[Dependent][' + dependentIndex + '][age]" value="' + $('#dependent-age-input').val() + '" index="' + dependentIndex + '" />');
	$('#dependent-inputs').append('<input class="candidate-dependent-gender" type="hidden" name="data[Dependent][' + dependentIndex + '][gender]" value="' + $('#dependent-gender-input').val() + '" index="' + dependentIndex + '" />');
	$('#dependent-age-input').val("");
}

Candidate.removeDependent = function(btn) {
	var dependentIndex = $("#dependent-table > tr > td > button").index(btn);
	$('.candidate-dependent-age[index="' + dependentIndex +'"]').remove();
	$('.candidate-dependent-gender[index="' + dependentIndex +'"]').remove();
	$(btn).parents('tr').remove();
	Candidate.correctDependentIndexes();
}

Candidate.correctDependentIndexes = function() {
	$('.candidate-dependent-age').each(function() {
		$(this).attr('name', 'data[Dependent][' + $('.candidate-dependent-age').index(this) + '][age]');
		$(this).attr('index', $('.candidate-dependent-age').index(this));
	});
	$('.candidate-dependent-gender').each(function() {
		$(this).attr('name', 'data[Dependent][' + $('.candidate-dependent-gender').index(this) + '][gender]');
		$(this).attr('index', $('.candidate-dependent-age').index(this));
	});
}

// Locations

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

// Formations

Candidate.searchFormation = function(form) {
	$('#formation-content').load('get_formations?search=' + $(form).children('input').val());
	return false;
}

Candidate.addFormation = function() {
	$.post('/formations/add', {Formation: {name: $('#formation-new-input').val()}}, function(data) {
		$('#formation-name-input').text($('#formation-new-input').val());
		$('#formation-new-input').val("");
		$('#formation-input').val($.parseJSON(data).id);
		$('#formation-modal').modal('hide');
		$('#formation-content').load('get_formations');
	}).fail(function() {

	});
}

Candidate.addCandidateFormation = function() {
	$("#formation-list").append("<li style='margin-bottom: 10px' editing='false'><strong><span class='formation-name'>" + $("#formation-name-input").text() + "</span></strong><br /><span class='formation-institution'>" + $("#formation-institution-input").val() + "</span><br />Conclusão em: <span class='formation-year'>" + $("#formation-year-input").val() + "</span><br /><button type='button' class='btn btn-primary btn-mini formation-edit-btn' style='margin-right: 5px; margin-top: 5px' onclick='Candidate.editCandidateFormation(this)'><i class='icon-edit icon-white'></i></button><button class='btn btn-danger btn-mini formation-remove-btn' type='button' onclick='Candidate.removeCandidateFormation(this)' style='margin-top: 5px'><i class='icon-remove icon-white'></i></button></li>");
	
	var formationIndex = $('#candidate-formation-inputs > .formation-id-input').length;
	$('#candidate-formation-inputs').append('<input type="hidden" name="data[CandidateFormation][' + formationIndex + '][formation_id]" class="formation-id-input" value="' + $('#formation-input').val() + '" index="' + formationIndex + '" />');
	$('#candidate-formation-inputs').append('<input type="hidden" name="data[CandidateFormation][' + formationIndex + '][institution]" class="formation-institution-input" value="' + $('#formation-institution-input').val() + '" index="' + formationIndex + '" />');
	$('#candidate-formation-inputs').append('<input type="hidden" name="data[CandidateFormation][' + formationIndex + '][conclusion_year]" class="formation-year-input" value="' + $('#formation-year-input').val() + '" index="' + formationIndex + '" />');

	$("#formation-name-input").text("");
	$("#formation-input").val("");
	$("#formation-institution-input").val("");
	$("#formation-year-input").val("");
}

Candidate.editCandidateFormation = function(btn) {
	var formationIndex = $('.formation-edit-btn').index(btn);
	$("#formation-name-input").text($(btn).parent("li").find(".formation-name").text());
	$('#formation-input').val($('#candidate-formation-inputs > .formation-id-input[index="' + formationIndex + '"]').val());
	$("#formation-institution-input").val($('#candidate-formation-inputs > .formation-institution-input[index="' + formationIndex + '"]').val());
	$("#formation-year-input").val($('#candidate-formation-inputs > .formation-year-input[index="' + formationIndex + '"]').val());
	$("#add-formation-btn").hide();
	$("#update-formation-btn").show();
	$("#update-formation-cancel-btn").show();
	$(btn).parent("li").attr("editing", "true");
	$(btn).parent("li").children("button").hide();
	$('#formation-list > li[editing="false"]').hide("70");
}

Candidate.updateCandidateFormation = function() {
	$("#formation-list > li[editing='true']").find(".formation-name").text($("#formation-name-input").text());
	$("#formation-list > li[editing='true']").children(".formation-institution").text($("#formation-institution-input").val());
	$("#formation-list > li[editing='true']").children(".formation-year").text($("#formation-year-input").val());

	var formationIndex = $('#formation-list > li').index($('#formation-list > li[editing="true"]'));
	$('#candidate-formation-inputs > .formation-id-input[index="' + formationIndex + '"]').val($('#formation-input').val());
	$('#candidate-formation-inputs > .formation-institution-input[index="' + formationIndex + '"]').val($('#formation-institution-input').val());
	$('#candidate-formation-inputs > .formation-year-input[index="' + formationIndex + '"]').val($('#formation-year-input').val());

	Candidate.cancelEditCandidateFormation();
}

Candidate.cancelEditCandidateFormation = function() {
	$('#formation-list > li[editing="true"]').attr("editing", "false");
	$('#formation-list > li[editing="false"], #formation-list > li > button').show("70");
	$("#add-formation-btn").show();
	$("#update-formation-btn").hide();
	$("#update-formation-cancel-btn").hide();
	$("#formation-name-input").text("");
	$("#formation-input").val("");
	$("#formation-institution-input").val("");
	$("#formation-year-input").val("");
}

Candidate.removeCandidateFormation = function(btn) {
	var formationIndex = $('.formation-remove-btn').index(btn);
	$(btn).parents('li').hide("100", function() {
		$(btn).parents('li').remove();	
	});
	$('#candidate-formation-inputs > input[index="' + formationIndex + '"]').remove();
	Candidate.correctCandidateFormationIndexes();
}

Candidate.correctCandidateFormationIndexes = function() {
	$('.formation-id-input').each(function() {
		$(this).attr('name', 'data[CandidateFormation][' + $('.formation-id-input').index(this) + '][formation_id]');
		$(this).attr('index', $('.formation-id-input').index(this));
	});
	$('.formation-institution-input').each(function() {
		$(this).attr('name', 'data[CandidateFormation][' + $('.formation-institution-input').index(this) + '][institution]');
		$(this).attr('index', $('.formation-institution-input').index(this));
	});
	$('.formation-year-input').each(function() {
		$(this).attr('name', 'data[CandidateFormation][' + $('.formation-year-input').index(this) + '][conclusion_year]');
		$(this).attr('index', $('.formation-year-input').index(this));
	});
}

// Languages

Candidate.selectLanguage = function(select) {
	if ($(select).val() == 'null') {
		$('#language-name-label').css('display', 'inline');
		$('#language-name-input').show(150);
	}
	else {
		$('#language-name-input, #language-name-label').hide(100);
		$('#language-name-input').val("");
	}
}

Candidate.addCandidateLanguage = function() {
	var languageIndex = $("#candidate-language-inputs > .language-level-input").length;
	if ($("#language-input").val() == 'null') {
		$("#language-list").append("<li style='margin-bottom: 5px'><strong>" + $("#language-name-input").val() + ": </strong> " + $("input[name='language-level']:checked").attr('label') + "<button type='button' class='btn btn-danger btn-mini btn-micro language-remove-btn' style='margin-left: 5px' onclick='Candidate.removeCandidateLanguage(this)'>X</button></li>");
		$("#candidate-language-inputs").append('<input type="hidden" class="language-input language-name-input" name="data[CandidateLanguage][' + languageIndex + '][Language][name]" value="' + $("#language-name-input").val() + '" index="' + languageIndex + '" />');
	}
	else {
		$("#language-list").append("<li style='margin-bottom: 5px'><strong>" + $("#language-input > option:selected").text() + ": </strong> " + $("input[name='language-level']:checked").attr('label') + "<button type='button' class='btn btn-danger btn-mini btn-micro language-remove-btn' style='margin-left: 5px' onclick='Candidate.removeCandidateLanguage(this)'>X</button></li>");
		$("#candidate-language-inputs").append('<input type="hidden" class="language-input language-id-input" name="data[CandidateLanguage][' + languageIndex + '][language_id]" value="' + $("#language-input").val() + '" index="' + languageIndex + '" />');
	}
	$("#candidate-language-inputs").append('<input type="hidden" class="language-level-input" name="data[CandidateLanguage][' + languageIndex + '][level]" value="' + $("input[name='language-level']:checked").val() + '" index="' + languageIndex + '" />');
	$("#language-input")[0].selectedIndex = 0;
	Candidate.selectLanguage($("#language-input")[0]);
}

Candidate.removeCandidateLanguage = function(btn) {
	var languageIndex = $('.language-remove-btn').index(btn);
	$("#candidate-language-inputs > input[index='" + languageIndex + "']").remove();
	$(btn).parents('li').remove();
	Candidate.correctCandidateLanguageIndexes();
}

Candidate.correctCandidateLanguageIndexes = function() {
	$('.language-name-input').each(function() {
		$(this).attr('name', 'data[CandidateFormation][' + $('.language-input').index(this) + '][Language][name]');
		$(this).attr('index', $('.language-input').index(this));
	});
	$('.language-id-input').each(function() {
		$(this).attr('name', 'data[CandidateFormation][' + $('.language-input').index(this) + '][language_id]');
		$(this).attr('index', $('.language-input').index(this));
	});
	$('.language-level-input').each(function() {
		$(this).attr('name', 'data[CandidateFormation][' + $('.language-level-input').index(this) + '][level]');
		$(this).attr('index', $('.language-level-input').index(this));
	});
}

// Income

Candidate.selectIncomeType = function(select) {
	$(".income-clt-field, .income-pj-field").hide();
	$("input.income-clt-field, input.income-pj-field").val("");
	switch (parseInt($(select).val())) {
	case 0:
		$(".income-clt-field").show();
		break;
	case 1:
		$(".income-pj-field").show();
		break;
	case 2:
		$(".income-clt-field, .income-pj-field").show();
		break;
	}
}



