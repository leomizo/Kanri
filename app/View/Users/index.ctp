<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li class="active">
					<?php echo $this->Html->link('Visualizar usuário', '/users'); ?>
				</li>
				<li>
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
		<h2>Usuários</h2>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<form class="form-search well search-box">
			  	<label class="control-label" for="inputUserSearch">Buscar usuário: </label>
			  	<input type="text" id="inputUserSearch" class="input-medium search-query" />
				<button type="submit" class="btn">Buscar</button>
				<?php echo 
					$this->Html->link($this->Html->tag('i', '', array('class' => 'icon-plus icon-white')).' Adicionar novo usuário', 'add', array('class' => 'btn btn-success pull-right', 'escape' => false));
				?>
			</form>
		</div>
	</div>

	<div class="row-fluid">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Tipo de usuário</th>
					<th style="width: 110px">Opções</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a href="users_show.html">Edson Tamamaro</a></td>
					<td>edson@kanri.com</td>
					<td>Administrador principal</td>
					<td>
						<button class="btn btn-mini">Editar</button>
						<button class="btn btn-mini btn-danger">Remover</button>
					</td>
				</tr>
				<tr>
					<td><a href="#">Leilly Tamamaro</a></td>
					<td>leilly@kanri.com</td>
					<td>Administrador auxiliar</td>
					<td>
						<button class="btn btn-mini">Editar</button>
						<button class="btn btn-mini btn-danger">Remover</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>