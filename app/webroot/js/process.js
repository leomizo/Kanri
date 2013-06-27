var Process = {};

Process.onload = function() {
	Process.initializePopovers();
}

Process.initializePopovers = function() {
	$('.candidate-selector').each(function() {
		$(this).popover({
			trigger: 'hover',
			title: '',
			html: true,
			content: '<strong>Idade: </strong>' + $(this).attr('age') + '<br /><strong>Cidade: </strong>' + $(this).attr('city') + '<br /><strong>Cargo: </strong>' + $(this).attr('job')
		});
	}); 
}

Process.handleAsynchronousPagination = function(link, popovers) {
	$($(link).attr('paginated-content')).load($(link).attr('href'), function() {
		if (popovers) Process.initializePopovers();	
	});
	return false;
}

Process.selectCompany = function(link) {
	$("#company-name-input").text($(link).text());
	$("#company-input").val($(link).attr('company-id'));
	$(link).parents("table").animate({left: "-100px", opacity: 0}, 300, function() {
		$("#process-modal * h3").text("Selecione um candidato");
		$(this).hide();
		$("#company-pagination").hide();
		$("#candidate-table, #candidate-pagination").show();
		$("#candidate-table, #candidate-pagination").animate({left: 0, opacity: 1}, 300);
		$("#process-return-btn").show();
	});
	$("#company-pagination").animate({left: "-100px", opacity: 0}, 300);
	return false;
}

Process.returnToCompanySelection = function() {
	$("#candidate-table, #candidate-pagination").animate({left: "100px", opacity: 0}, 300, function() {
		$("#process-modal * h3").text("Selecione uma empresa");
		$(this).hide();
		$("#candidate-pagination").hide();
		$("#company-table, #company-pagination").show();
		$("#company-table, #company-pagination").animate({left: 0, opacity: 1}, 300);
		$("#process-return-btn").hide();
	});
}

Process.selectCandidate = function(link) {
	$("#candidate-name-input").text($(link).text());
	$("#candidate-input").val($(link).attr('candidate-id'));
	$("#process-ok-btn").show();
	return false;
}

Process.selectEventType = function(select) {
	if ($(select).val() == '') {
		$("#loadable-form").empty();
	} 
	else if ($(select).val() == 1 || $(select).val() == 2) {
		$("#loadable-form").load('/events/load_event_contact_form');
	}
	else if ($(select).val() == 3 || $(select).val() == 4) {
		$("#loadable-form").load('/events/load_event_interview_form');
	}
	else if ($(select).val() == 5 || $(select).val() == 6) {
		$("#loadable-form").load('/events/load_event_feedback_form');
	}
	else if ($(select).val() == 7) {
		$("#loadable-form").load('/events/load_event_conclusion_form');
	}
}

Process.editEvent = function(btn) {
	var cell = $(btn).parents('tr');
	cell.attr('editing', 'true');
	cell.addClass('info');
	$('tr[editing="false"] > td > div.event-cell').hide("150");
	$('tr[editing="false"]').hide("10");
	cell.find("button, a").hide();

	var event_type = cell.find('.event-type').text();
	$("#event-form-title").text("Atualizar evento");
	$("#EventId").val(cell.find('.event-id').text());
	$("#EventEventType")[0].selectedIndex = event_type;
	$("#EventEventType").prop("disabled", true);
	$("#EventOccurrence").val(cell.find('.event-occurrence').text());

	$("#event-form").attr('action', '/events/edit');

	if (event_type == 1 || event_type == 2) {
		$("#loadable-form").load('/events/load_event_contact_form/' + cell.find('.event-id').text());
	}
	else if (event_type == 3 || event_type == 4) {
		$("#loadable-form").load('/events/load_event_interview_form/' + cell.find('.event-id').text());
	}
	else if (event_type == 5 || event_type == 6) {
		$("#loadable-form").load('/events/load_event_feedback_form/' + cell.find('.event-id').text());
	}
	else if (event_type == 7) {
		$("#loadable-form").load('/events/load_event_conclusion_form/' + cell.find('.event-id').text());
	}
}

Process.cancelEventEdit = function() {
	var cell = $('tr[editing="true"]');
	cell.find("button, a").show();
	$('tr[editing="false"]').show("100");
	$('tr[editing="false"] > td > div.event-cell').show("150");
	cell.attr('editing', 'false');
	cell.removeClass('info');

	$("#event-form-title").text("Adicionar evento");
	$("#EventId").val("-1");
	$("#EventEventType")[0].selectedIndex = 0;
	$("#EventEventType").prop("disabled", false);
	$("#EventOccurrence").val("");
	$("#loadable-form").empty();

	$("#event-form").attr('action', '/events/add');
}

$(function(){Process.onload()});

