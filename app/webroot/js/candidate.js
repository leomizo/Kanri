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

// Courses

Candidate.searchCourse = function(form) {
	$('#course-content').load('get_courses?search=' + $(form).children('input').val());
	return false;
}

Candidate.addCourse = function() {
	$.post('/courses/add', {Course: {name: $('#course-new-input').val()}}, function(data) {
		$('#course-name-input').text($('#course-new-input').val());
		$('#course-new-input').val("");
		$('#course-input').val($.parseJSON(data).id);
		$('#course-modal').modal('hide');
		$('#course-content').load('get_courses');
	}).fail(function() {

	});
}

Candidate.addCandidateCourse = function() {
	$("#course-list").append("<li style='margin-bottom: 10px' editing='false'><strong><span class='course-name'>" + $("#course-name-input").text() + "</span></strong><br /><span class='course-institution'>" + $("#course-institution-input").val() + "</span><br />Conclusão em: <span class='course-year'>" + $("#course-year-input").val() + "</span><br /><button type='button' class='btn btn-primary btn-mini course-edit-btn' style='margin-right: 5px; margin-top: 5px' onclick='Candidate.editCandidateCourse(this)'><i class='icon-edit icon-white'></i></button><button class='btn btn-danger btn-mini course-remove-btn' type='button' onclick='Candidate.removeCandidateCourse(this)' style='margin-top: 5px'><i class='icon-remove icon-white'></i></button></li>");
	
	var courseIndex = $('#candidate-course-inputs > .course-id-input').length;
	$('#candidate-course-inputs').append('<input type="hidden" name="data[CandidateCourse][' + courseIndex + '][course_id]" class="course-id-input" value="' + $('#course-input').val() + '" index="' + courseIndex + '" />');
	$('#candidate-course-inputs').append('<input type="hidden" name="data[CandidateCourse][' + courseIndex + '][institution]" class="course-institution-input" value="' + $('#course-institution-input').val() + '" index="' + courseIndex + '" />');
	$('#candidate-course-inputs').append('<input type="hidden" name="data[CandidateCourse][' + courseIndex + '][conclusion_year]" class="course-year-input" value="' + $('#course-year-input').val() + '" index="' + courseIndex + '" />');

	$("#course-name-input").text("");
	$("#course-input").val("");
	$("#course-institution-input").val("");
	$("#course-year-input").val("");
}

Candidate.editCandidateCourse = function(btn) {
	var courseIndex = $('.course-edit-btn').index(btn);
	$("#course-name-input").text($(btn).parent("li").find(".course-name").text());
	$('#course-input').val($('#candidate-course-inputs > .course-id-input[index="' + courseIndex + '"]').val());
	$("#course-institution-input").val($('#candidate-course-inputs > .course-institution-input[index="' + courseIndex + '"]').val());
	$("#course-year-input").val($('#candidate-course-inputs > .course-year-input[index="' + courseIndex + '"]').val());
	$("#add-course-btn").hide();
	$("#update-course-btn").show();
	$("#update-course-cancel-btn").show();
	$(btn).parent("li").attr("editing", "true");
	$(btn).parent("li").children("button").hide();
	$('#course-list > li[editing="false"]').hide("70");
}

Candidate.updateCandidateCourse = function() {
	$("#course-list > li[editing='true']").find(".course-name").text($("#course-name-input").text());
	$("#course-list > li[editing='true']").children(".course-institution").text($("#course-institution-input").val());
	$("#course-list > li[editing='true']").children(".course-year").text($("#course-year-input").val());

	var courseIndex = $('#course-list > li').index($('#course-list > li[editing="true"]'));
	$('#candidate-course-inputs > .course-id-input[index="' + courseIndex + '"]').val($('#course-input').val());
	$('#candidate-course-inputs > .course-institution-input[index="' + courseIndex + '"]').val($('#course-institution-input').val());
	$('#candidate-course-inputs > .course-year-input[index="' + courseIndex + '"]').val($('#course-year-input').val());

	Candidate.cancelEditCandidateCourse();
}

Candidate.cancelEditCandidateCourse = function() {
	$('#course-list > li[editing="true"]').attr("editing", "false");
	$('#course-list > li[editing="false"], #course-list > li > button').show("70");
	$("#add-course-btn").show();
	$("#update-course-btn").hide();
	$("#update-course-cancel-btn").hide();
	$("#course-name-input").text("");
	$("#course-input").val("");
	$("#course-institution-input").val("");
	$("#course-year-input").val("");
}

Candidate.removeCandidateCourse = function(btn) {
	var courseIndex = $('.course-remove-btn').index(btn);
	$(btn).parents('li').hide("100", function() {
		$(btn).parents('li').remove();	
	});
	$('#candidate-course-inputs > input[index="' + courseIndex + '"]').remove();
	Candidate.correctCandidateCourseIndexes();
}

Candidate.correctCandidateCourseIndexes = function() {
	$('.course-id-input').each(function() {
		$(this).attr('name', 'data[CandidateCourse][' + $('.course-id-input').index(this) + '][course_id]');
		$(this).attr('index', $('.course-id-input').index(this));
	});
	$('.course-institution-input').each(function() {
		$(this).attr('name', 'data[CandidateCourse][' + $('.course-institution-input').index(this) + '][institution]');
		$(this).attr('index', $('.course-institution-input').index(this));
	});
	$('.course-year-input').each(function() {
		$(this).attr('name', 'data[CandidateCourse][' + $('.course-year-input').index(this) + '][conclusion_year]');
		$(this).attr('index', $('.course-year-input').index(this));
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
		$(this).attr('name', 'data[CandidateLanguage][' + $('.language-input').index(this) + '][Language][name]');
		$(this).attr('index', $('.language-input').index(this));
	});
	$('.language-id-input').each(function() {
		$(this).attr('name', 'data[CandidateLanguage][' + $('.language-input').index(this) + '][language_id]');
		$(this).attr('index', $('.language-input').index(this));
	});
	$('.language-level-input').each(function() {
		$(this).attr('name', 'data[CandidateLanguage][' + $('.language-level-input').index(this) + '][level]');
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

// Jobs

Candidate.searchJob = function(form) {
	$('#job-content').load('get_jobs?search=' + $(form).children('input').val());
	return false;
}

Candidate.addJob = function() {
	$.post('/jobs/add', {Job: {name: $('#job-new-input').val()}}, function(data) {
		$('#job-input').val($.parseJSON(data).id);
		$('#job-name-input').text($('#job-new-input').val());
		$('#job-new-input').val("");
		$('#job-modal').modal('hide');
		$('#job-content').load('get_jobs');
	}).fail(function() {

	});
}

// Workplaces

Candidate.searchWorkplace = function(form) {
	$('#workplace-content').load('get_workplaces?search=' + $(form).children('input').val());
	return false;
}

Candidate.selectWorkplaceMarketSector = function(select) {
	if ($(select).val() == 'null') {
		$("#workplace-market-sector-new-input").hide("100");
		$("#workplace-market-sector-add-input").show("100");
	}
	else {
		$("#workplace-market-sector-add-input").hide("100");
		$("#workplace-market-sector-new-input").show("100");
	}
}

Candidate.cancelWorkplaceMarketSectorAdd = function() {
	$("#workplace-market-sector-new-input")[0].selectedIndex = 0;
	Candidate.selectWorkplaceMarketSector($("#workplace-market-sector-new-input"));	
}

Candidate.addWorkplace = function() {
	var newWorkplace = {
		Workplace: {
			name: $('#workplace-name-new-input').val(),
			nationality: $('#workplace-nationality-new-input').val()
		}
	};

	if ($("#workplace-market-sector-new-input").val() == 'null') {
		newWorkplace.MarketSector = {
			name: $("#workplace-market-sector-add-input").children('input').val(),
			id: 'null'
		};
	}
	else {
		newWorkplace.MarketSector = {
			id:	$("#workplace-market-sector-new-input").val()
		};
	}

	$.post('/workplaces/add', newWorkplace, function(data) {
		data = $.parseJSON(data);
		$("#workplace-input").text($('#workplace-name-new-input').val());
		$("#workplace-id-input").text(data.id);
		$("#workplace-nationality-input").text($('#workplace-nationality-new-input').val());
		if (data.new_sector) $("#workplace-market-sector-input").text($('#workplace-market-sector-add-input > input').val());
		else $("#workplace-market-sector-input").text($('#workplace-market-sector-new-input > option:selected').text());
		$('#workplace-name-new-input, #workplace-nationality-new-input, #workplace-market-sector-add-input > input').val("");
		$('#workplace-modal').modal('hide');
		$('#workplace-content').load('get_workplaces');
		$('#workplace-market-sector-new-input').load('/market_sectors/refresh_select?add=true');
		Candidate.cancelWorkplaceMarketSectorAdd();
	}).fail(function() {

	});
}

Candidate.handleWorkplaceSelection = function(link) {
	$("#workplace-input").text($(link).text());
	$("#workplace-id-input").text($(link).attr('workplace-id'));
	$("#workplace-nationality-input").text($(link).parents('tr').children('td:nth-of-type(2)').text());
	$("#workplace-market-sector-input").text($(link).parents('tr').children('td:nth-of-type(3)').text());
	$(link).parents('.modal').modal('hide');
	return false;
}

// Experiences

Candidate.addExperience = function() {
	var experienceIndex = $(".form-workplace").length;
	$("#experience-inputs").append("<input class='form-workplace' name='data[Experience][" + experienceIndex + "][workplace_id]' type='hidden' value='" + $("#workplace-id-input").text() + "' workplace-id='" + $("#workplace-id-input").text() + "' index='" + experienceIndex + "' />");
	$("#experience-inputs").append("<input class='form-job' name='data[Experience][" + experienceIndex + "][job_id]' type='hidden' value='" + $("#job-input").val() + "' workplace-id='" + $("#workplace-id-input").text() + "' index='" + experienceIndex + "' />");
	$("#experience-inputs").append("<input class='form-start' name='data[Experience][" + experienceIndex + "][start_date]' type='hidden' value='" + $("#experience-start-input").val() + "' workplace-id='" + $("#workplace-id-input").text() + "' index='" + experienceIndex + "' />");
	$("#experience-inputs").append("<input class='form-end' name='data[Experience][" + experienceIndex + "][end_date]' type='hidden' value='" + $("#experience-end-input").val() + "' workplace-id='" + $("#workplace-id-input").text() + "' index='" + experienceIndex + "' />");
	$("#experience-inputs").append("<input class='form-report' name='data[Experience][" + experienceIndex + "][report]' type='hidden' value='" + $("#experience-report-input").val() + "' workplace-id='" + $("#workplace-id-input").text() + "' index='" + experienceIndex + "' />");
	$("#experience-inputs").append("<input class='form-team' name='data[Experience][" + experienceIndex + "][team]' type='hidden' value='" + $("#experience-team-input").val() + "' workplace-id='" + $("#workplace-id-input").text() + "' index='" + experienceIndex + "' />");

	if ($("#experience-list > li[workplace-id='" + $("#workplace-id-input").text() + "']").length == 0) {
		$("#experience-list").append("<li workplace-id='" + $("#workplace-id-input").text() + "' workplace-name='" + $("#workplace-input").text() + "' workplace-nationality='" + $("#workplace-nationality-input").text() + "' workplace-market-sector='" + $("#workplace-market-sector-input").text() + "' editing='false'><strong>Empresa: " + $("#workplace-input").text() + "</strong><br /><span class='workplace-details'>Empresa " + $("#workplace-nationality-input").text() + " - Segmento " + $("#workplace-market-sector-input").text() + "</span><br /><button class='btn btn-primary btn-mini workplace-edit-btn' style='margin-right: 4px' onclick='Candidate.editWorkplace(this)' type='button'><i class='icon-edit icon-white'></i></button><button class='btn btn-danger btn-mini workplace-remove-btn' onclick='Candidate.removeWorkplace(this)'><i class='icon-remove icon-white'></i></button><ul class='achievement-list'></ul></li>");
	}

	var achievements_list = $("#experience-list > li[workplace-id='" + $("#workplace-id-input").text() + "'] > ul.achievement-list");

	var experience_period = $("#experience-start-input").val() + " a " + $("#experience-end-input").val();

	var experience_report = "<span class='experience-report just-added'>Reporte: " + $("#experience-report-input").val() + "</span><br class='experience-report-break just-added'/>";
	
	var experience_team = "<span class='experience-team just-added'>Equipe: " + $("#experience-team-input").val() + "</span><br class='experience-team-break just-added' />";

	$(achievements_list).append("<li index='" + experienceIndex + "' experience-job-name='" + $("#job-name-input").text() + "' experience-job-id='" + $("#job-input").val() + "' experience-start='" + $("#experience-start-input").val() + "' experience-end='" + $("#experience-end-input").val() + "' experience-report='" + $("#experience-report-input").val() + "' experience-team='" + $("#experience-team-input").val() + "' editing='false'><strong class='experience-period'>" + experience_period + "</strong><br /><strong class='experience-job'>" + $("#job-name-input").text() + "</strong><br />" + experience_report + experience_team + "<button type='button' class='btn btn-primary btn-mini experience-edit-btn' style='margin-right: 4px' onclick='Candidate.editExperience(this)'><i class='icon-edit icon-white'></i></button><button type='button' class='btn btn-danger btn-mini experience-remove-btn' onclick='Candidate.removeExperience(this)'><i class='icon-remove icon-white'></i></button></li>");

	if ($("#experience-team-input").val() == "") {
		$(achievements_list).find(".experience-team.just-added, .experience-team-break.just-added").hide();

	}

	if ($("#experience-report-input").val() == "") {
		$(achievements_list).find(".experience-report.just-added, .experience-report-break.just-added").hide();
	}

	$(".just-added").removeClass('just-added');

	$("#job-name-input").text("");
	$("#job-input").val("");
	$("#experience-start-input").val("");
	$("#experience-end-input").val("");
	$("#experience-report-input").val("");
	$("#experience-team-input").val("");
}

Candidate.editWorkplace = function(btn) {
	$("#job-group, #period-group, #details-group").hide();
	$("#workplace-edit-btn").show();
	$("#workplace-cancel-btn").show();
	$("#add-experience-btn").hide();
	
	$("#workplace-input").text($(btn).parents("li").attr("workplace-name"));
	$("#workplace-nationality-input").text($(btn).parents("li").attr("workplace-nationality"));
	$("#workplace-market-sector-input").text($(btn).parents("li").attr("workplace-market-sector"));

	$(btn).parent("li").attr("editing", "true");
	$("#experience-list > li[editing='false'], li[editing='true'] > .workplace-edit-btn, li[editing='true'] > .workplace-remove-btn, li[editing='true'] > .achievement-list > li > .experience-edit-btn, li[editing='true'] > .achievement-list > li > .experience-remove-btn").hide("50");
}

Candidate.updateWorkplace = function() {

	var formerWorkplaceId = $("#experience-list > li[editing='true']").attr("workplace-id");

	$("#experience-list > li[editing='true']").attr("workplace-id", $("#workplace-id-input").text());
	$("#experience-list > li[editing='true']").attr("workplace-name", $("#workplace-input").text());
	$("#experience-list > li[editing='true']").attr("workplace-nationality", $("#workplace-nationality-input").text());
	$("#experience-list > li[editing='true']").attr("workplace-market-sector", $("#workplace-market-sector-input").text());

	$("#experience-list > li[editing='true'] > strong").text("Empresa: " + $("#workplace-input").text());
	$("#experience-list > li[editing='true'] > .workplace-details").text("Empresa " + $("#workplace-nationality-input").text() + " - Segmento " + $("#workplace-market-sector-input").text());

	$(".experience-input[workplace-id='" + formerWorkplaceId + "']").val($("#workplace-id-input").text());
	$("input[workplace-id='" + formerWorkplaceId  + "']").attr('workplace-id', $("#workplace-id-input").text());

	$("#job-name-input").text("");
	$("#job-input").val("");
	$("#experience-start-input").val("");
	$("#experience-end-input").val("");
	$("#experience-report-input").val("");
	$("#experience-team-input").val("");

	Candidate.cancelWorkplaceEdit();
}

Candidate.cancelWorkplaceEdit = function() {
	$("#workplace-edit-btn").hide();
	$("#workplace-cancel-btn").hide();
	$("#add-experience-btn").show();
	$("#job-group, #period-group, #details-group").show();
	$("#experience-list > li[editing='false'], li[editing='true'] > .workplace-edit-btn, li[editing='true'] > .workplace-remove-btn, li[editing='true'] > .achievement-list > li > .experience-edit-btn, li[editing='true'] > .achievement-list > li > .experience-remove-btn").show("50");
	$("#experience-list > li[editing='true']").attr("editing", "false");
}

Candidate.editExperience = function(btn) {
	$("#workplace-group").hide();
	$("#experience-edit-btn").show();
	$("#experience-cancel-btn").show();
	$("#add-experience-btn").hide();

	$("#job-name-input").text($(btn).parents("li").attr("experience-job-name"));
	$("#job-input").val($(btn).parents("li").attr("experience-job-id"));
	$("#experience-start-input").val($(btn).parents("li").attr("experience-start"));
	$("#experience-end-input").val($(btn).parents("li").attr("experience-end"));
	$("#experience-report-input").val($(btn).parents("li").attr("experience-report"));
	$("#experience-team-input").val($(btn).parents("li").attr("experience-team"));

	$(btn).parent("li").attr("editing", "true");

	$("#experience-list > li:not(:has(li[editing='true'])), .achievement-list:has(li[editing='true']) > li[editing='false'], li[editing='true'] > .experience-edit-btn, li[editing='true'] > .experience-remove-btn, #experience-list > li:has(li[editing='true']) > button").hide('50');

}

Candidate.cancelExperienceEdit = function() {
	$("#experience-edit-btn").hide();
	$("#experience-cancel-btn").hide();
	$("#add-experience-btn").show();
	$("#workplace-group").show();
	$("#experience-list > li:not(:has(li[editing='true'])), .achievement-list:has(li[editing='true']) > li[editing='false'], li[editing='true'] > .experience-edit-btn, li[editing='true'] > .experience-remove-btn, #experience-list > li:has(li[editing='true']) > button").show('50');
	$("li[editing='true']").attr("editing", "false");

	$("#job-name-input").text("");
	$("#job-input").val("");
	$("#experience-start-input").val("");
	$("#experience-end-input").val("");
	$("#experience-report-input").val("");
	$("#experience-team-input").val("");
}

Candidate.updateExperience = function() {
	var experienceIndex = $("li[editing='true']").attr('index');
	$("li[editing='true']").attr("experience-job-name", $("#job-name-input").text());
	$("li[editing='true']").attr("experience-job-id", $("#job-input").val());
	$("li[editing='true']").attr("experience-start", $("#experience-start-input").val());
	$("li[editing='true']").attr("experience-end", $("#experience-end-input").val());
	$("li[editing='true']").attr("experience-report", $("#experience-report-input").val());
	$("li[editing='true']").attr("experience-team", $("#experience-team-input").val());

	$("li[editing='true']").children(".experience-period").text($("#experience-start-input").val() + " a " + $("#experience-end-input").val());
	$("li[editing='true']").children(".experience-job").text($("#job-name-input").text());
	$("li[editing='true']").children(".experience-team").text("Equipe: " + $("#experience-team-input").val());
	$("li[editing='true']").children(".experience-report").text("Reporte: " + $("#experience-report-input").val());

	$(".form-job[index='" + experienceIndex + "']").val($("#job-input").val());
	$(".form-start[index='" + experienceIndex + "']").val($("#experience-start-input").val());
	$(".form-end[index='" + experienceIndex + "']").val($("#experience-end-input").val());
	$(".form-report[index='" + experienceIndex + "']").val($("#experience-report-input").val());
	$(".form-team[index='" + experienceIndex + "']").val($("#experience-team-input").val());

	if ($("#experience-team-input").val() == "") {
		$("li[editing='true']").find(".experience-team, .experience-team-break").hide();
	}
	else {
		$("li[editing='true']").find(".experience-team, .experience-team-break").show();
	}

	if ($("#experience-report-input").val() == "") {
		$("li[editing='true']").find(".experience-report, .experience-report-break").hide();
	}
	else {
		$("li[editing='true']").find(".experience-report, .experience-report-break").show();
	}

	Candidate.cancelExperienceEdit();
}

Candidate.removeWorkplace = function(btn) {
	$("#experience-inputs > input[workplace-id='" + $(btn).parent('li').attr('workplace-id') + "']").remove();
	$(btn).parent('li').remove();
	Candidate.correctExperienceIndexes();
}

Candidate.removeExperience = function(btn) {
	$("#experience-inputs > input[index='" + $(btn).parent('li').attr('index') + "']").remove();
	$(btn).parent('li').remove();
	Candidate.correctExperienceIndexes();
}

Candidate.correctExperienceIndexes = function() {
	$("#experience-list > li > .achievement-list > li").each(function() {
		$(this).attr('index', $("#experience-list > li > .achievement-list > li").index(this));
	});
	$("#experience-inputs > .form-workplace").each(function() {
		$(this).attr('index', $("#experience-inputs > .form-workplace").index(this));
		$(this).attr('name', 'data[Experience][' + $("#experience-inputs > .form-workplace").index(this) + '][workplace_id]');
	});
	$("#experience-inputs > .form-job").each(function() {
		$(this).attr('index', $("#experience-inputs > .form-job").index(this));
		$(this).attr('name', 'data[Experience][' + $("#experience-inputs > .form-job").index(this) + '][job_id]');
	});
	$("#experience-inputs > .form-start").each(function() {
		$(this).attr('index', $("#experience-inputs > .form-start").index(this));
		$(this).attr('name', 'data[Experience][' + $("#experience-inputs > .form-start").index(this) + '][start_date]');
	});
	$("#experience-inputs > .form-end").each(function() {
		$(this).attr('index', $("#experience-inputs > .form-end").index(this));
		$(this).attr('name', 'data[Experience][' + $("#experience-inputs > .form-end").index(this) + '][end_date]');
	});
	$("#experience-inputs > .form-report").each(function() {
		$(this).attr('index', $("#experience-inputs > .form-report").index(this));
		$(this).attr('name', 'data[Experience][' + $("#experience-inputs > .form-report").index(this) + '][report]');
	});
	$("#experience-inputs > .form-team").each(function() {
		$(this).attr('index', $("#experience-inputs > .form-team").index(this));
		$(this).attr('name', 'data[Experience][' + $("#experience-inputs > .form-team").index(this) + '][team]');
	});
}



