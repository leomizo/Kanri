<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li>
					<?php echo $this->Html->link('Visualizar usuário', '/users'); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Adicionar usuário', '/users/add'); ?>
				</li>
				<li class="active">
					<?php echo $this->Html->link('Permissões', '/users/permissions'); ?>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Permissões concedidas</h2>
	</div>

	<div class="row-fluid">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Usuário beneficiário</th>
					<th>Período de concessão</th>
					<th style="width: 110px">Opções</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a href="users_show.html">Leilly Tamamaro</a></td>
					<td>De 20/05/2013 às 14:00h até 21/05/2013 às 23:59h</td>
					<td>
						<button class="btn btn-mini">Editar</button>
						<button class="btn btn-mini btn-danger">Revogar</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Conceder permissão</h2>
	</div>

	<div class="row-fluid">
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label">Usuário beneficiário:</label>
				<div class="controls">
					<select>
						<option>Leilly Tamamaro</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Início:</label>
				<div class="controls date-time-picker input-append" style="position: absolute; left: 20px;">
					<input data-format="dd/MM/yyyy hh:mm:ss" type="text" />
				    <span class="add-on">
				      	<i class="icon-calendar"></i>
				    </span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Fim:</label>
				<div class="controls date-time-picker input-append" style="position: absolute; left: 20px;">
					<input data-format="dd/MM/yyyy hh:mm:ss" type="text" />
				    <span class="add-on">
				      	<i class="icon-calendar"></i>
				    </span>
				</div>
			</div>
		</form>
	</div>

	<div class="row-fluid">
		<div class="form-actions">
			<button class="btn btn-primary">Conceder</button>
		</div>
	</div>

</div>