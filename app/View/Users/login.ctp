<div id="main_container" class="container">
	<?php echo $this->Html->image('login_ico_kanri.png', array('id' => 'ico_kanri')); ?>
	<h1>Kanri</h1>
	<div id="bkg_login" class="container">
		<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'id' => 'form_login')); ?>
			<div class="control-group">
				<?php echo $this->Form->label('email', 'E-mail', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('email', array('class' => 'input-large', 'div' => false, 'label' => false, 'onfocus' => 'Login.removeErrorCondition()')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('password', 'Senha', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('password', array('class' => 'input-large', 'div' => false, 'label' => false, 'onfocus' => 'Login.removeErrorCondition()')); 
						  echo $this->Form->button('Entrar', array('type' => 'button', 'class' => 'btn btn-primary', 'id' => 'btn_login', 'onclick' => 'Login.authenticate()')); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>
		<p id="msg_error">Usuário e/ou senha incorretos!</p>
	</div>
</div>