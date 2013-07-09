<div class="row-fluid">
	<?php echo $this->Form->create('Candidate', array('class' => 'form-horizontal', 'type' => 'file', 'url' => array('?' => array('step' => 6)))); ?>
		<?php echo $this->Form->input('Candidate.id', array('type' => 'hidden', 'div' => false, 'label' => 'false')); ?>
		<fieldset>
			<legend>Informações adicionais</legend>
			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('Candidate.additional_info', array('div' => false, 'label' => false, 'class' => 'input-xxlarge', 'placeholder' => 'Ex: CRC ativo, OAB, etc...')); ?>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Experiência internacional</legend>
			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('Candidate.international_experience', array('div' => false, 'label' => false, 'class' => 'span10')); ?>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Comentários do consultor</legend>
			<div class="control-group">
				<div class="controls">
					<?php echo $this->Form->input('Candidate.comments', array('div' => false, 'label' => false, 'class' => 'span10')); ?>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Currículo</legend>
			<div class='control-group'>
				<?php if (isset($this->request->data['Curriculum']['name'])): ?>
				<label class='control-label'>Currículo existente: </label>
				<div class='controls'>
					<?php if ($this->request->data['Curriculum']['type'] == "application/pdf") echo $this->Html->image('pdf-icon.png');
			  			  else if ($this->request->data['Curriculum']['type'] == "application/msword" || $this->request->data['Curriculum']['type'] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") echo $this->Html->image('word-icon.png');
			  			  echo $this->Html->link($this->request->data['Curriculum']['name'], array('action' => 'curriculum', $this->request->data['Candidate']['id']), array('style' => 'margin-left: 10px')); ?>
				</div>
				<div class='control-group-internal-divider'></div>
				<label class='control-label'>Atualizar currículo: </label>
				<?php else: ?>
				<label class='control-label'>Adicionar currículo: </label>
				<?php endif; ?>
				<div class='controls'>
					<input name='data[Curriculum]' type='file' />
				</div>
			</div>
		</fieldset>
		<div class="form-actions" style="padding-left: 20px">
			<?php echo $this->Form->submit('Salvar dados', array('class' => 'btn btn-primary', 'div' => false));
				  echo $this->Html->link('Etapa anterior', array('action' => 'edit', '?' => array('step' => 5), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px')); 
				  echo $this->Html->link('Visualizar candidato', array('action' => 'show', $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px'));?>
		</div>
	<?php echo $this->Form->end(); ?>
</div>

