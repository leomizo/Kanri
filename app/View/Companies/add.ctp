<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li>
					<?php echo $this->Html->link('Visualizar empresas', '/companies'); ?>
				</li>
				<li class="active">
					<?php echo $this->Html->link('Adicionar empresa', '/companies/add'); ?>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Adicionar empresa</h2>
	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create('Company', array('class' => 'form-horizontal')); ?>
			<?php $this->Form->inputDefaults(array('errorMessage' => false)); ?>
			<div class="control-group">
				<?php echo $this->Form->label('Company.name', '* Nome da empresa: ', array("class" => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Company.name', array('div' => false, 'label' => false, 'required' => 'required')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Company.contact_name', '* Contato: ', array("class" => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Company.contact_name', array('div' => false, 'label' => false, 'required' => 'required')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Company.contact_email', '* E-mail: ', array("class" => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Company.contact_email', array('div' => false, 'label' => false, 'required' => 'required')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Company.contact_telephone', '* Telefone: ', array("class" => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Company.contact_telephone', array('div' => false, 'label' => false, 'required' => 'required')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Company.address', '* Endereço: ', array("class" => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Company.address', array('div' => false, 'label' => false, 'required' => 'required', 'class' => 'input-xxlarge')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Company.cnpj', '* CNPJ: ', array("class" => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Company.cnpj', array('div' => false, 'label' => false, 'required' => 'required')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Company.state_inscription', 'Inscrição estadual: ', array("class" => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Company.state_inscription', array('div' => false, 'label' => false)); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Company.city_inscription', 'Inscrição municipal: ', array("class" => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Company.city_inscription', array('div' => false, 'label' => false)); ?>
				</div>
			</div>
			<div class="form-actions" style="padding-left: 20px">
				<?php echo $this->Form->submit('Adicionar', array('div' => false, 'class' => 'btn btn-primary')); 
				      echo $this->Html->link('Voltar', '/companies', array('class' => 'btn', 'style' => 'margin-left: 10px')); ?>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>