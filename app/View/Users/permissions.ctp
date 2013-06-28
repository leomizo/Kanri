<?php $this->Html->script('permission.js', array('inline' => false)); ?>

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
				<?php foreach ($permissions as $permission): ?>
				<tr permission-id="<?php echo $permission['Permission']['id']; ?>" user-id="<?php echo $permission['User']['id']; ?>" start="<?php echo date('d/m/Y H:i:s', strtotime($permission['Permission']['start'])); ?>" end="<?php echo date('d/m/Y H:i:s', strtotime($permission['Permission']['end'])); ?>" >
					<td><?php echo $this->Html->link($permission['User']['name'], array('controller' => 'users', 'action' => 'show', $permission['User']['id'])); ?></td>
					<td>De <?php echo formatDate($permission['Permission']['start']); ?> até <?php echo formatDate($permission['Permission']['end']); ?></td>
					<td class='permission-options'>
						<button class="btn btn-mini" onclick='Permission.editPermission(this)'>Editar</button>
						<?php echo $this->Form->postLink('Revogar', array('controller' => 'permissions', 'action' => 'delete', $permission['Permission']['id']), array('class' => 'btn btn-mini btn-danger'), 'Você está certo disso?'); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2 id='permission-form-title'>Conceder permissão</h2>
	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create('Permission', array('class' => 'form-horizontal', 'controller' => 'permissions', 'action' => 'add', 'id' => 'permission-form')); ?>
			<?php echo $this->Form->input('Permission.id', array('type' => 'hidden', 'value' => '-1')); ?>
			<div class="control-group">
				<?php echo $this->Form->label('Permission.user_id', "Usuário beneficiário: ", array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Permission.user_id', array('div' => false, 'label' => false, 'options' => $users, 'required' => true)); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Permission.start', "Início: ", array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls date-time-picker input-append" style="position: absolute; left: 20px;">
					<input data-format="dd/MM/yyyy hh:mm:ss" name='data[Permission][start]' id='PermissionStart' type="text" required='required' />
				    <span class="add-on">
				      	<i class="icon-calendar"></i>
				    </span>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Permission.end', "Fim: ", array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls date-time-picker input-append" style="position: absolute; left: 20px;">
					<input data-format="dd/MM/yyyy hh:mm:ss" name='data[Permission][end]' id='PermissionEnd' type="text" required='required' />
				    <span class="add-on">
				      	<i class="icon-calendar"></i>
				    </span>
				</div>
			</div>
			<div class="form-actions" style='padding-left: 30px'>
				<button type='submit' id='permission-submit-btn' class="btn btn-primary">Conceder</button>
				<button type='submit' id='permission-cancel-edit-btn' class="btn" style="display: none" onclick="Permission.cancelPermissionEdit()">Cancelar</button>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>

</div>