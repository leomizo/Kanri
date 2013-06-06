var Info = {Language:{},MarketSector:{},Job:{},Formation:{},Course:{},Workplace:{}};

Info.handleAsynchronousPagination = function(link) {
	$($(link).attr('paginated-content')).load($(link).attr('href'));
	return false;
}

// Language

Info.Language.add = function(form) {
	var language_data = $('input.language-add-input').val();
	if (language_data != "") {
		$.post('languages/add', $(form).serialize(), function() {
			$('#language-content').load('/info/get_languages');
			$('#language-add-input').val("");
			$('#language-search-input').val("");
			Info.Language.showMessage('Sucesso!', 'Idioma adicionado com sucesso!');
		}).fail(function() {
			Info.Language.showMessage('Erro!', 'Não foi possível adicionar idioma!', true);
		});
	}
	return false;
}


Info.Language.update = function(btn) {
	var cell = $(btn).parents('tr');
	var language_data = cell.find('input.language-input').val();
	var language_id = cell.find('input.language-id').val();
	if (language_data != "") {
		$.post('languages/edit', {Language: {id: language_id, name: language_data}}, function() {
			cell.find('span.language-name').text(language_data);
			Info.Language.cancel(btn);
			Info.Language.showMessage('Sucesso!', 'Idioma atualizado com sucesso!');
		}).fail(function() {
			Info.Language.showMessage('Erro!', 'Não foi possível atualizar idioma!', true);
		});
	}
}

Info.Language.delete = function(btn) {
	if (confirm('Você está certo disso?')) {
		$.post('languages/delete', {id: $(btn).parents('tr').find('input.language-id').val()}, function() {
			$(btn).parents('tr').remove();
			Info.Language.showMessage('Sucesso!', 'Idioma removido com sucesso!');
		}).fail(function() {
			Info.Language.showMessage('Erro!', 'Não foi possível remover idioma!', true);
		});
	}
}

Info.Language.cancel = function(btn) {
	var cell = $(btn).parents('tr');
	cell.find('span.language-name, button.edit-btn, button.remove-btn').show();
	cell.find('input.language-input, button.confirm-btn, button.cancel-btn').hide();
	cell.find('input.language-input').val(cell.find('span.language-name').text());
}

Info.Language.edit = function(btn) {
	var cell = $(btn).parents('tr');
	cell.find('span.language-name, button.edit-btn, button.remove-btn').hide();
	cell.find('input.language-input, button.confirm-btn, button.cancel-btn').show();
}

Info.Language.search = function() {
	$('#language-content').load('/info/get_languages?search=' + $('#language-search-input').val());
}

Info.Language.showMessage = function(title, message, error) {
	var type = error ? 'alert-error' : 'alert-success';  
	$('#language-message').empty();
	$('#language-message').append('<div class="alert ' + type + '"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>' + title + '</strong> ' + message + '</div>');
}

// Market Sector

Info.MarketSector.add = function(form) {
	var market_sector_data = $('input.market-sector-add-input').val();
	if (market_sector_data != "") {
		$.post('market_sectors/add', $(form).serialize(), function() {
			$('#market-sector-content').load('/info/get_market_sectors');
			$('#market-sector-add-input').val("");
			$('#market-sector-search-input').val("");
			Info.MarketSector.showMessage('Sucesso!', 'Segmento adicionado com sucesso!');
			Info.MarketSector.updateWorkplaceSelect();
		}).fail(function() {
			Info.MarketSector.showMessage('Erro!', 'Não foi possível adicionar segmento!', true);
		});
	}
	return false;
}


Info.MarketSector.update = function(btn) {
	var cell = $(btn).parents('tr');
	var market_sector_data = cell.find('input.market-sector-input').val();
	var market_sector_id = cell.find('input.market-sector-id').val();
	if (market_sector_data != "") {
		$.post('market_sectors/edit', {MarketSector: {id: market_sector_id, name: market_sector_data}}, function() {
			cell.find('span.market-sector-name').text(market_sector_data);
			Info.MarketSector.cancel(btn);
			Info.MarketSector.showMessage('Sucesso!', 'Segmento atualizado com sucesso!');
			Info.MarketSector.updateWorkplaceSelect();
			$("#workplace-content").load('/info/get_workplaces');
		}).fail(function() {
			Info.MarketSector.showMessage('Erro!', 'Não foi possível atualizar segmento!', true);
		});
	}
}

Info.MarketSector.delete = function(btn) {
	if (confirm('Você está certo disso?')) {
		$.post('market_sectors/delete', {id: $(btn).parents('tr').find('input.market-sector-id').val()}, function() {
			$(btn).parents('tr').remove();
			Info.MarketSector.showMessage('Sucesso!', 'Segmento removido com sucesso!');
			Info.MarketSector.updateWorkplaceSelect();
		}).fail(function() {
			Info.MarketSector.showMessage('Erro!', 'Não foi possível remover segmento!', true);
		});
	}
}

Info.MarketSector.cancel = function(btn) {
	var cell = $(btn).parents('tr');
	cell.find('span.market-sector-name, button.edit-btn, button.remove-btn').show();
	cell.find('input.market-sector-input, button.confirm-btn, button.cancel-btn').hide();
	cell.find('input.market-sector-input').val(cell.find('span.market-sector-name').text());
}

Info.MarketSector.edit = function(btn) {
	var cell = $(btn).parents('tr');
	cell.find('span.market-sector-name, button.edit-btn, button.remove-btn').hide();
	cell.find('input.market-sector-input, button.confirm-btn, button.cancel-btn').show();
}

Info.MarketSector.search = function() {
	$('#market-sector-content').load('/info/get_market_sectors?search=' + $('#market-sector-search-input').val());
}

Info.MarketSector.showMessage = function(title, message, error) {
	var type = error ? 'alert-error' : 'alert-success';  
	$('#market-sector-message').empty();
	$('#market-sector-message').append('<div class="alert ' + type + '"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>' + title + '</strong> ' + message + '</div>');
}

Info.MarketSector.updateWorkplaceSelect = function() {
	$("#workplace-market-sector-input").load('market_sectors/refresh_select?add=true');
}

// Job

Info.Job.add = function(form) {
	var job_data = $('input.job-add-input').val();
	if (job_data != "") {
		$.post('jobs/add', $(form).serialize(), function() {
			$('#job-content').load('/info/get_jobs');
			$('#job-add-input').val("");
			$('#job-search-input').val("");
			Info.Job.showMessage('Sucesso!', 'Cargo adicionado com sucesso!');
		}).fail(function() {
			Info.Job.showMessage('Erro!', 'Não foi possível adicionar cargo!', true);
		});
	}
	return false;
}


Info.Job.update = function(btn) {
	var cell = $(btn).parents('tr');
	var job_data = cell.find('input.job-input').val();
	var job_id = cell.find('input.job-id').val();
	if (job_data != "") {
		$.post('jobs/edit', {Job: {id: job_id, name: job_data}}, function() {
			cell.find('span.job-name').text(job_data);
			Info.Job.cancel(btn);
			Info.Job.showMessage('Sucesso!', 'Cargo atualizado com sucesso!');
		}).fail(function() {
			Info.Job.showMessage('Erro!', 'Não foi possível atualizar cargo!', true);
		});
	}
}

Info.Job.delete = function(btn) {
	if (confirm('Você está certo disso?')) {
		$.post('jobs/delete', {id: $(btn).parents('tr').find('input.job-id').val()}, function() {
			$(btn).parents('tr').remove();
			Info.Job.showMessage('Sucesso!', 'Cargo removido com sucesso!');
		}).fail(function() {
			Info.Job.showMessage('Erro!', 'Não foi possível remover cargo!', true);
		});
	}
}

Info.Job.cancel = function(btn) {
	var cell = $(btn).parents('tr');
	cell.find('span.job-name, button.edit-btn, button.remove-btn').show();
	cell.find('input.job-input, button.confirm-btn, button.cancel-btn').hide();
	cell.find('input.job-input').val(cell.find('span.job-name').text());
}

Info.Job.edit = function(btn) {
	var cell = $(btn).parents('tr');
	cell.find('span.job-name, button.edit-btn, button.remove-btn').hide();
	cell.find('input.job-input, button.confirm-btn, button.cancel-btn').show();
}

Info.Job.search = function() {
	$('#job-content').load('/info/get_jobs?search=' + $('#job-search-input').val());
}

Info.Job.showMessage = function(title, message, error) {
	var type = error ? 'alert-error' : 'alert-success';  
	$('#job-message').empty();
	$('#job-message').append('<div class="alert ' + type + '"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>' + title + '</strong> ' + message + '</div>');
}

// Formation

Info.Formation.add = function(form) {
	var Formation_data = $('input.formation-add-input').val();
	if (Formation_data != "") {
		$.post('formations/add', $(form).serialize(), function() {
			$('#formation-content').load('/info/get_formations');
			$('#formation-add-input').val("");
			$('#formation-search-input').val("");
			Info.Formation.showMessage('Sucesso!', 'Formação acadêmica adicionada com sucesso!');
		}).fail(function() {
			Info.Formation.showMessage('Erro!', 'Não foi possível adicionar formação acad!', true);
		});
	}
	return false;
}


Info.Formation.update = function(btn) {
	var cell = $(btn).parents('tr');
	var Formation_data = cell.find('input.formation-input').val();
	var Formation_id = cell.find('input.formation-id').val();
	if (Formation_data != "") {
		$.post('formations/edit', {Formation: {id: Formation_id, name: Formation_data}}, function() {
			cell.find('span.formation-name').text(Formation_data);
			Info.Formation.cancel(btn);
			Info.Formation.showMessage('Sucesso!', 'Formação acadêmica atualizada com sucesso!');
		}).fail(function() {
			Info.Formation.showMessage('Erro!', 'Não foi possível atualizar formação acad!', true);
		});
	}
}

Info.Formation.delete = function(btn) {
	if (confirm('Você está certo disso?')) {
		$.post('formations/delete', {id: $(btn).parents('tr').find('input.formation-id').val()}, function() {
			$(btn).parents('tr').remove();
			Info.Formation.showMessage('Sucesso!', 'Formação acadêmica removida com sucesso!');
		}).fail(function() {
			Info.Formation.showMessage('Erro!', 'Não foi possível remover formação acad!', true);
		});
	}
}

Info.Formation.cancel = function(btn) {
	var cell = $(btn).parents('tr');
	cell.find('span.formation-name, button.edit-btn, button.remove-btn').show();
	cell.find('input.formation-input, button.confirm-btn, button.cancel-btn').hide();
	cell.find('input.formation-input').val(cell.find('span.formation-name').text());
}

Info.Formation.edit = function(btn) {
	var cell = $(btn).parents('tr');
	cell.find('span.formation-name, button.edit-btn, button.remove-btn').hide();
	cell.find('input.formation-input, button.confirm-btn, button.cancel-btn').show();
}

Info.Formation.search = function() {
	$('#formation-content').load('/info/get_formations?search=' + $('#formation-search-input').val());
}

Info.Formation.showMessage = function(title, message, error) {
	var type = error ? 'alert-error' : 'alert-success';  
	$('#formation-message').empty();
	$('#formation-message').append('<div class="alert ' + type + '"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>' + title + '</strong> ' + message + '</div>');
}

// Course

Info.Course.add = function(form) {
	var course_data = $('input.course-add-input').val();
	if (course_data != "") {
		$.post('courses/add', $(form).serialize(), function() {
			$('#course-content').load('/info/get_courses');
			$('#course-add-input').val("");
			$('#course-search-input').val("");
			Info.Course.showMessage('Sucesso!', 'Curso/especialização adicionado com sucesso!');
		}).fail(function() {
			Info.Course.showMessage('Erro!', 'Não foi possível adicionar curso/especialização!', true);
		});
	}
	return false;
}

Info.Course.update = function(btn) {
	var cell = $(btn).parents('tr');
	var course_data = cell.find('input.course-input').val();
	var course_id = cell.find('input.course-id').val();
	if (course_data != "") {
		$.post('courses/edit', {Course: {id: course_id, name: course_data}}, function() {
			cell.find('span.course-name').text(course_data);
			Info.Course.cancel(btn);
			Info.Course.showMessage('Sucesso!', 'Curso/especialização atualizado com sucesso!');
		}).fail(function() {
			Info.Course.showMessage('Erro!', 'Não foi possível atualizar curso/especialização!', true);
		});
	}
}

Info.Course.delete = function(btn) {
	if (confirm('Você está certo disso?')) {
		$.post('courses/delete', {id: $(btn).parents('tr').find('input.course-id').val()}, function() {
			$(btn).parents('tr').remove();
			Info.Course.showMessage('Sucesso!', 'Curso/especialização removido com sucesso!');
		}).fail(function() {
			Info.Course.showMessage('Erro!', 'Não foi possível remover curso/especialização!', true);
		});
	}
}

Info.Course.cancel = function(btn) {
	var cell = $(btn).parents('tr');
	cell.find('span.course-name, button.edit-btn, button.remove-btn').show();
	cell.find('input.course-input, button.confirm-btn, button.cancel-btn').hide();
	cell.find('input.course-input').val(cell.find('span.course-name').text());
}

Info.Course.edit = function(btn) {
	var cell = $(btn).parents('tr');
	cell.find('span.course-name, button.edit-btn, button.remove-btn').hide();
	cell.find('input.course-input, button.confirm-btn, button.cancel-btn').show();
}

Info.Course.search = function() {
	$('#course-content').load('/info/get_courses?search=' + $('#course-search-input').val());
}

Info.Course.showMessage = function(title, message, error) {
	var type = error ? 'alert-error' : 'alert-success';  
	$('#course-message').empty();
	$('#course-message').append('<div class="alert ' + type + '"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>' + title + '</strong> ' + message + '</div>');
}

// Workplace

Info.Workplace.add = function(form) {
	$.post('workplaces/add', $(form).serialize(), function(data) {
		data = $.parseJSON(data);
		$("#workplace-name-input, #workplace-nationality-input, #workplace-market-sector-name-input").val("");
		$("#workplace-market-sector-name-input, #workplace-market-sector-name-label").hide();
		if (data.new_sector) {
			Info.MarketSector.updateWorkplaceSelect();
			$('#market-sector-content').load('/info/get_market_sectors');	
		}
		$("#workplace-content").load('/info/get_workplaces');
		Info.Workplace.showMessage('Sucesso!', 'Local de trabalho adicionado com sucesso!');
	}).fail(function() {
		Info.Workplace.showMessage('Erro!', 'Não foi possível adicionar local de trabalho!', true);
	});
	return false;
}

Info.Workplace.update = function(form) {
	$.post('workplaces/edit', $(form).serialize(), function(data) {
		data = $.parseJSON(data);
		var cell = $(form).parents('tr');
		cell.find('span.workplace-name').text(cell.find('input.workplace-name-input').val());
		cell.find('span.workplace-nationality').text(cell.find('input.workplace-nationality-input').val());
		if (cell.find('select.workplace-market-sector-input > option[value="' + data.id + '"]').length > 0)
			cell.find('span.workplace-market-sector-name').text(cell.find('select.workplace-market-sector-input > option[value="' + data.id + '"]').text());
		else 
			cell.find('span.workplace-market-sector-name').text(cell.find('input.workplace-market-sector-name-input').val());
		cell.find('select.workplace-market-sector-input').attr('current', data.id);
		Info.Workplace.cancel(form);
		if (data.new_sector) {
			Info.MarketSector.updateWorkplaceSelect();
			$('#market-sector-content').load('/info/get_market_sectors');	
		}
		Info.Workplace.showMessage('Sucesso!', 'Local de trabalho atualizado com sucesso!');
	}).fail(function() {
		Info.Workplace.showMessage('Erro!', 'Não foi possível atualizar local de trabalho!', true);
	});
	return false;
}

Info.Workplace.delete = function(btn) {
	if (confirm('Você está certo disso?')) {
		$.post('workplaces/delete', {id: $(btn).parents('tr').find('input.workplace-id').val()}, function() {
			$(btn).parents('tr').remove();
			Info.Workplace.showMessage('Sucesso!', 'Local de trabalho removido com sucesso!');
		}).fail(function() {
			Info.Workplace.showMessage('Erro!', 'Não foi possível remover local de trabalho!', true);
		});
	}
}

Info.Workplace.edit = function(btn) {
	var cell = $(btn).parents('tr');
	cell.find('span.workplace-name, span.workplace-market-sector-name, span.workplace-nationality, button.edit-btn, button.remove-btn').hide();
	cell.find('input.workplace-name-input, select.workplace-market-sector-input, input.workplace-nationality-input, button.confirm-btn, button.cancel-btn').show();
	cell.find('select.workplace-market-sector-input').load('market_sectors/refresh_select?add=true', function() {
		cell.find('select.workplace-market-sector-input > option[value="' + cell.find('select.workplace-market-sector-input').attr('current') + '"]').attr('selected', 'selected');
	});
}

Info.Workplace.cancel = function(btn) {
	var cell = $(btn).parents('tr');
	cell.find('span.workplace-name, span.workplace-nationality, span.workplace-market-sector-name, button.edit-btn, button.remove-btn').show();
	cell.find('input.workplace-name-input, select.workplace-market-sector-input, input.workplace-nationality-input, button.confirm-btn, button.cancel-btn, input.workplace-market-sector-name-input, label.workplace-market-sector-name-label').hide();
	cell.find('input.workplace-name-input').val(cell.find('span.workplace-name').text());
	cell.find('input.workplace-nationality-input').val(cell.find('span.workplace-nationality').text());	
	cell.find('input.workplace-market-sector-name-input').val("");
}

Info.Workplace.search = function() {
	$('#workplace-content').load('/info/get_workplaces?search=' + $('#workplace-search-input').val() + '&sort=' + $('#workplace-sort-input').val());
}

Info.Workplace.showMessage = function(title, message, error) {
	var type = error ? 'alert-error' : 'alert-success';  
	$('#workplace-message').empty();
	$('#workplace-message').append('<div class="alert ' + type + '"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>' + title + '</strong> ' + message + '</div>');
}

Info.Workplace.addNewMarketSector = function() {
	if ($('#workplace-market-sector-input').val() == 'null') {
		$('#workplace-market-sector-name-label').css('display', 'inline-block');
		$("#workplace-market-sector-name-input").show('200');
	}
	else {
		$("#workplace-market-sector-name-input, #workplace-market-sector-name-label").hide("100");
		$("#workplace-market-sector-name-input").val("");
	}
}

Info.Workplace.editNewMarketSector = function(select) {
	if ($(select).val() == 'null') {
		$(select).parent('div').children('label.workplace-market-sector-name-label').css('display', 'inline-block');
		$(select).parent('div').children("input.workplace-market-sector-name-input").show('200');
	}
	else {
		$(select).parent('div').children("input.workplace-market-sector-name-input, label.workplace-market-sector-name-label").hide("100");
		$(select).parent('div').children("input.workplace-market-sector-name-input").val("");
	}
}

