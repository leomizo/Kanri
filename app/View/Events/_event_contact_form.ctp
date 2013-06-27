<div class="control-group">
	<?php if ($edit) echo $this->Form->input('EventContact.id', array('div' => false, 'label' => false, 'type' => 'hidden')); ?>
	<?php echo $this->Form->label('EventContact.contact_reason', 'Razão do contato', array('div' => false, 'class' => 'control-label')); ?>
	<div class="controls pull-left" style="margin-left: 20px; margin-right: 20px">
		<?php echo $this->Form->input('EventContact.contact_reason', array('div' => false, 'label' => false, 'class' => 'input-xlarge')); ?>
	</div>
	<?php echo $this->Form->label('EventContact.contact_sender', 'Quem realizou o contato', array('div' => false, 'class' => 'control-label')); ?>
	<div class="controls pull-left" style="margin-left: 20px">
		<?php echo $this->Form->input('EventContact.contact_sender', array('div' => false, 'label' => false, 'class' => 'input-xlarge')); ?>
	</div>
</div>

<div class="control-group" style="margin-bottom: 0">
	<?php echo $this->Form->label('EventContact.contact_receiver', 'Pessoa com que foi feito o contato', array('div' => false, 'class' => 'control-label')); ?>
	<div class="controls pull-left" style="margin-left: 20px; margin-right: 20px">
		<?php echo $this->Form->input('EventContact.contact_receiver', array('div' => false, 'label' => false, 'class' => 'input-xlarge')); ?>
	</div>
	<?php echo $this->Form->label('EventContact.contact_type', 'Tipo de contato', array('div' => false, 'class' => 'control-label')); ?>
	<div class="controls pull-left" style="margin-left: 20px">
		<label class="radio inline">
			<input type="radio" name="data[EventContact][contact_type]" value="0" <?php if (!$edit || $this->request->data['EventContact']['contact_type'] == 0) echo 'checked' ?> />E-mail
		</label>
		<label class="radio inline">
			<input type="radio" name="data[EventContact][contact_type]" value="1" <?php if ($edit && $this->request->data['EventContact']['contact_type'] == 1) echo 'checked' ?> />Telefone
		</label>
		<label class="radio inline">
			<input type="radio" name="data[EventContact][contact_type]" value="2" <?php if ($edit && $this->request->data['EventContact']['contact_type'] == 2) echo 'checked' ?> />Skype
		</label>
		<label class="radio inline">
			<input type="radio" name="data[EventContact][contact_type]" value="3" <?php if ($edit && $this->request->data['EventContact']['contact_type'] == 3) echo 'checked' ?> />Pessoal
		</label>
		<label style="margin-top: 10px">
			<input type="radio" name="data[EventContact][contact_type]" value="4" <?php if ($edit && $this->request->data['EventContact']['contact_type'] >= 4) echo 'checked' ?> />
			<span style="margin-left: 7px; vertical-align: -4px">Outro:</span>
			<?php echo $this->Form->input('EventContact.contact_type_description', array('div' => false, 'label' => false, 'class' => 'input-xlarge', 'style' => 'margin-left: 10px')); ?>
		</label>
	</div>
</div>

<div class="control-group" style="margin-bottom: 0">
	<div class="controls">
		<?php if (!$edit): ?>
			<?php echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-plus icon-white')).' Adicionar evento', array('class' => 'btn btn-primary', 'escape' => false)); ?>
		<?php else: ?>
			<?php echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-edit icon-white')).' Atualizar evento', array('class' => 'btn btn-primary', 'escape' => false));
				  echo $this->Form->button('Cancelar', array('type' => 'button', 'class' => 'btn', 'style' => 'margin-left: 10px', 'escape' => false, 'onclick' => 'Process.cancelEventEdit()')); ?>
		<?php endif; ?>
	</div>
</div>