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
		<h2><?php echo $user['User']['name']; ?></h2>
	</div>

	<div class="row-fluid">
		<div class="span12" style="padding-left: 20px">
			<dl class="dl-horizontal">
				<dt>E-mail: </dt>
				<dd><?php echo $user['User']['email']; ?></dd>
				<dt>Tipo de usuário: </dt>
				<dd><?php echo $user['User']['user_type']; ?></dd>
			</dl>
		</div>
	</div>

	<div class="row-fluid">
		<div class="form-actions">
			<?php echo $this->Html->link('Editar', array('controller' => 'users', 'action' => 'edit', $user['User']['id']), array('class' => 'btn btn-primary', 'style' => 'margin-right: 6px'));
				  echo $this->Form->postLink('Remover', array('controller' => 'users', 'action' => 'delete', $user['User']['id']), array('class' => 'btn btn-danger', 'style' => 'margin-right: 6px'), 'Você está certo disso?'); 
				  echo $this->Html->link('Voltar', array('controller' => 'users', 'action' => 'index'), array('class' => 'btn', 'style' => 'margin-right: 6px')); ?>
		</div>
	</div>
</div>