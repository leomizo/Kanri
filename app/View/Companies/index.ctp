<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li class="active">
					<?php echo $this->Html->link('Visualizar empresas', '/companies'); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Adicionar empresa', '/companies/add'); ?>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Empresas</h2>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<?php if (isset($success_message)): ?>
				<div class='alert alert-success'>
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Sucesso!</strong> Empresa <?php if ($success_message == 'edit') echo 'atualizada'; elseif ($success_message == 'add') echo 'adicionada'; elseif ($success_message == 'delete') echo 'deletada' ?> com sucesso!
				</div>
			<?php endif; ?>
			<form class="form-search well search-box">
			  	<label class="control-label" for="inputUserSearch">Buscar empresa: </label>
			  	<input type="text" id="inputUserSearch" class="input-medium search-query" />
				<button type="submit" class="btn">Buscar</button>
				<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-plus icon-white')).' Adicionar nova empresa', 'add', array('class' => 'btn btn-success pull-right', 'escape' => false)); ?>
			</form>
		</div>
	</div>

	<div class="row-fluid">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nome da empresa</th>
					<th>Contato</th>
					<th>E-mail</th>
					<th>Telefone</th>
					<th style="width: 200px">Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($companies as $company): ?>
				<tr>
					<td>
						<?php echo $this->Html->link($company['Company']['name'], array('controller' => 'companies', 'action' => 'show', $company['Company']['id'])); ?>
					</td>
					<td><?php echo $company['Company']['contact_name']; ?></td>
					<td><?php echo $company['Company']['contact_email']; ?></td>
					<td><?php echo $company['Company']['contact_telephone']; ?></td>
					<td>
						<?php echo $this->Html->link('Editar', array('controller' => 'companies', 'action' => 'edit', $company['Company']['id']), array("class" => 'btn btn-mini', 'style' => 'margin-right: 5px')); 
							  echo $this->Form->postLink('Remover', array('controller' => 'users', 'action' => 'delete', $company['Company']['id']), array('class' => 'btn btn-mini btn-danger', 'style' => 'margin-right: 5px'), 'Você está certo disso?'); 
							  echo $this->Html->link('Ver processos', array('controller' => 'companies', 'action' => 'delete', $company['Company']['id']), array("class" => 'btn btn-mini btn-primary')); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>