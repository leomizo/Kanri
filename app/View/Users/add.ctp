<?php $this->Html->script('users.js', array('inline' => false)); ?>

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
		<?php if (isSet($alert)): ?>
			<div class='alert alert-error'>
				<button type="button" class="close" data-dismiss="alert">&times;</button>
  				<strong>Erro!</strong> Não foi possível adicionar o usuário. Por favor, reveja as informações!
			</div>
		<?php endif; ?>
		<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'onsubmit' => 'return Users.validatePasswordConfirmation()')); ?>
			<?php $this->Form->inputDefaults(array('errorMessage' => false)); ?>
			<div class="control-group">
				<?php echo $this->Form->label('User.name', '* Nome do usuário: ', array("class" => 'control-label')); ?>
				<div class='controls'>
					  <?php echo $this->Form->input('User.name', array('div' => false, 'label' => false, 'required' => 'required')); ?>
				</div>
			</div>
			<div class="control-group <?php if ($this->Form->isFieldError('User.email')) echo 'error' ?>">
				<?php echo $this->Form->label('User.email', '* E-mail: ', array("class" => 'control-label')); ?>
				<div class='controls'>
					  <?php echo $this->Form->input('User.email', array('div' => false, 'label' => false));
					  		if ($this->Form->isFieldError('User.email')) echo $this->Form->error('User.email', $this->validationErrors['User']['email'][0], array('class' => 'help-inline', 'wrap' => 'span'))
					  ?>
				</div>
			</div>
			<div class="control-group <?php if ($this->Form->isFieldError('User.password')) echo 'error' ?>">
				<?php echo $this->Form->label('User.password', '* Senha: ', array("class" => 'control-label')); ?>
				<div class='controls'>
					  <?php echo $this->Form->input('User.password', array('div' => false, 'label' => false));
					  		if ($this->Form->isFieldError('User.password')) echo $this->Form->error('User.password', $this->validationErrors['User']['password'][0], array('class' => 'help-inline', 'wrap' => 'span'))
					  ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('User.password_confirm', '* Confirmar senha: ', array("class" => 'control-label')); ?>
				<div class='controls'>
					  <input id='UserPasswordConfirm' type='password' required='required' />
					  <span class='help-inline' style='display: none'>As senhas não batem!</span>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('User.user_type', 'Tipo de usuário: ', array("class" => 'control-label')) ?>
				<div class="controls">
					<label class="radio inline">
					  	<input type="radio" name="data[User][type]" id="UserTypePrincipal" value="0" />
					  	Administrador principal
					</label>
					<label class="radio inline">
					  	<input type="radio" name="data[User][type]" id="UserTypeAuxiliary" value="1" checked/>
					  	Administrador auxiliar
					</label>
				</div>
			</div>

			<div class="form-actions" style="padding-left: 20px">
				<?php echo $this->Form->submit('Adicionar', array('div' => false, 'class' => 'btn btn-primary')); 
				      echo $this->Html->link('Voltar', '/users', array('class' => 'btn', 'style' => 'margin-left: 10px')); ?>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>

</div>

<script></script>
