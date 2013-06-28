<?php if ($visibility == 0 || $visibility == 2): ?>
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
<?php endif; ?>

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
			<?php echo $this->Form->create(null, array('class' => 'form-search well search-box', 'type' => 'get', 'action' => 'index'));
				  echo $this->Form->input("Buscar empresa: ", array('div' => false, 'class' => 'input-large search-query', 'label' => array('class' => 'control-label'), 'name' => 'search', 'id' => 'search-input', 'value' => ($this->request->query['search'] ? $this->request->query['search'] : '')));
				  echo $this->Form->submit("Buscar", array('class' => 'btn', 'div' => false));
				  if ($visibility == 0 || $visibility == 2) {
				  	  echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-plus icon-white')).' Adicionar nova empresa', 'add', array('class' => 'btn btn-success pull-right', 'escape' => false));
				  }
				  echo $this->Form->end();
			?>
		</div>
	</div>

	<div class="row-fluid">
		<table class="table table-striped table-bordered table-sortable">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort("name", "Nome da empresa"); ?></th>
					<th><?php echo $this->Paginator->sort("contact_name", "Contato"); ?></th>
					<th><?php echo $this->Paginator->sort("contact_email", "E-mail"); ?></th>
					<th><?php echo $this->Paginator->sort("contact_telephone", "Telefone"); ?></th>
					<th style="width: <?php if ($visibility == 0 || $visibility == 2) echo '200px'; else echo '87px'; ?>">Opções</th>
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
						<?php if ($visibility == 0 || $visibility == 2) {
								  echo $this->Html->link('Editar', array('controller' => 'companies', 'action' => 'edit', $company['Company']['id']), array("class" => 'btn btn-mini', 'style' => 'margin-right: 5px')); 
								  echo $this->Form->postLink('Remover', array('controller' => 'companies', 'action' => 'delete', $company['Company']['id']), array('class' => 'btn btn-mini btn-danger', 'style' => 'margin-right: 5px'), 'Você está certo disso?'); 
							  }
							  echo $this->Html->link('Ver processos', array('controller' => 'processes', 'action' => 'view', $company['Company']['id'], true), array("class" => 'btn btn-mini btn-primary')); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="pagination pagination-centered">
			<ul class='pager'>
				<?php echo $this->Paginator->prev("← Anterior", array('tag' => 'li', 'class' => 'previous', 'style' => 'margin-right: 15px'), null, array('class' => 'hidden-element')); ?>
			</ul>
			<ul>
				<?php echo $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active', 'separator' => false, 'first' => 'Primeiro', 'last' => 'Último')); ?>
			</ul>
			<ul class='pager'>
				<?php echo $this->Paginator->next("Próximo →", array('tag' => 'li', 'class' => 'previous', 'style' => 'margin-left: 15px'), null, array('class' => 'hidden-element')); ?>
			</ul>
		</div>
	</div>
</div>