var Permission = {};

Permission.editPermission = function(btn) {
	var cell = $(btn).parents('tr');
	cell.addClass('error');
	$('#permission-form-title').text("Editar permissão");
	$('#PermissionId').val(cell.attr('permission-id'));
	$('#PermissionUserId')[0].selectedIndex = $('#PermissionUserId > option').index($('#PermissionUserId > option[value="' + cell.attr('user-id') + '"]'));
	$('#PermissionStart').val(cell.attr('start'));
	$('#PermissionEnd').val(cell.attr('end'));
	$('#permission-form').attr('action', '/permissions/edit');
	$('.permission-options > button, .permission-options > a').hide();
	$("#permission-cancel-edit-btn").show();
	$("#permission-submit-btn").text("Atualizar");
}

Permission.cancelPermissionEdit = function() {
	$('tr.error').removeClass('error');
	$('#permission-form-title').text("Conceder permissão");
	$('#PermissionId').val("-1");
	$('#PermissionUserId')[0].selectedIndex = 0;
	$('#PermissionStart').val("");
	$('#PermissionEnd').val("");
	$('#permission-form').attr('action', '/permissions/add');
	$('.permission-options > button, .permission-options > a').show();
	$("#permission-cancel-edit-btn").hide();
	$("#permission-submit-btn").text("Conceder");
}