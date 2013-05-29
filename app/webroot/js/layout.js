$(function() {

	$("#context-options").css("margin-left", - parseInt($("#context-options").css("width")) / 2);

	$(".simple-data-table > tbody").on("click", "tr > td > .edit-btn", function() {
		$(this).parent("td").children("button").hide();
		var td = $(this).parents("tr").children("td")[1];
		$(td).children("span").hide();
		$(td).children("input").val($(td).children("span").text());
		$(td).children("input").show();
		$(td).children("button").show(); 
	});

	$(".simple-data-table > tbody").on("click", "tr > td > .confirm-btn", function() {
		$(this).parent("td").children("button").hide();
		$(this).parent("td").children("input").hide();
		$(this).parent("td").children("span").text($(this).parent("td").children("input").val());
		$(this).parent("td").children("span").show();
		$(this).parent("td").children(".remove-btn").addClass("cancel-btn").removeClass("remove-btn");
		$($(this).parents("tr").children("td")[0]).children("button").show();
	});

	$(".simple-data-table > tbody").on("click", "tr > td > .cancel-btn", function() {
		$(this).parent("td").children("button").hide();
		$(this).parent("td").children("input").hide();
		$(this).parent("td").children("span").show();
		$($(this).parents("tr").children("td")[0]).children("button").show();
	});

	$(".add-btn").click(function() {
		var table = $(this).parents(".content-block").find(".content-table > tbody");
		$(table).append('<tr><td style="width: 60px"><button class="btn btn-mini btn-primary edit-btn"><i class="icon-edit icon-white"></i></button><button class="btn btn-mini btn-danger remove-btn" style="margin-left: 4px"><i class="icon-remove icon-white"></i></button></td><td><span></span><input type="text" style="margin-bottom: 0" /><button type="button" class="btn btn-mini btn-primary confirm-btn" style="margin-left: 4px">OK</button><button type="button" class="btn btn-mini btn-danger remove-btn" style="margin-left: 4px">Cancelar</button></td></tr>');	
		$(table).children("tr").last().children("td").first().children(".edit-btn").click();
	});

	$(".simple-data-table > tbody").on("click", "tr > td > .remove-btn", function() {
		$(this).parents("tr").remove();
	});

	if ($(".date-time-picker").length > 0) {
		$(".date-time-picker").datetimepicker({
			language: 'pt-BR'
		});
	}

	$("input.currency-input").on("keyup input paste", function() {
		$(this).val($(this).val().replace(/[^0-9.]/g, ""));
	});

	$(".modal-selector").click(function() {
		$($(this).attr('target-input')).val($(this).text());
		$($(this).attr('target-input')).text($(this).text());
		$(this).parents(".modal").modal('hide');
	});

});