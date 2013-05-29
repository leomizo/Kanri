<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li>
					<?php echo $this->Html->link('Visualizar usuário', '/users'); ?>
				</li>
				<li class="active">
					<?php echo $this->Html->link('Adicionar usuário', '/users/add'); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Permissões', '/users/permissions'); ?>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Adicionar usuário</h2>
	</div>

	<div class="row-fluid">
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="inputUserName">Nome do usuário:</label>
				<div class="controls">
					<input type="text" id="inputUserName" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputUserEmail">E-mail:</label>
				<div class="controls">
					<input type="text" id="inputUserEmail" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputUserPassword">Senha:</label>
				<div class="controls">
					<input type="password" id="inputUserPassword" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputUserPassword">Confirmar senha:</label>
				<div class="controls">
					<input type="password" id="inputUserPassword" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Tipo de usuário:</label>
				<div class="controls">
					<label class="radio inline">
					  	<input type="radio" name="userType" id="inputUserTypePrincipal" value="principal" />
					  	Administrador principal
					</label>
					<label class="radio inline">
					  	<input type="radio" name="userType" id="inputUserTypeAuxiliary" value="auxiliary" cheked/>
					  	Administrador auxiliar
					</label>
				</div>
			</div>
		</form>
	</div>

	<div class="row-fluid">
		<div class="form-actions">
			<button class="btn btn-primary">Adicionar</button>
			<a href="users_index.html" class="btn">Voltar</a>
		</div>
	</div>
</div>