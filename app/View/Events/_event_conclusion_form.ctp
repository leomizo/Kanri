<div class="control-group">
	<?php if ($edit) echo $this->Form->input('EventConclusion.id', array('div' => false, 'label' => false, 'type' => 'hidden')); ?>
	<?php echo $this->Form->label('EventConclusion.result', 'Resultado:', array('div' => false, 'class' => 'control-label')); ?>
	<div class="controls">
		<label class="radio inline">
			<input type="radio" name="data[EventConclusion][result]" value="1" <?php if (!$edit || $this->request->data['EventConclusion']['result'] == 1) echo 'checked'; ?> />Positivo
		</label>
		<label class="radio inline">
			<input type="radio" name="data[EventConclusion][result]" value="0" <?php if ($edit && $this->request->data['EventConclusion']['result'] == 0) echo 'checked'; ?> />Negativo
		</label>
	</div>
</div>

<div class="control-group">
	<?php echo $this->Form->label('EventConclusion.comments', 'Comentários', array('div' => false, 'class' => 'control-label')); ?>
	<div class="controls">
		<?php echo $this->Form->input('EventConclusion.comments', array('div' => false, 'label' => false, 'class' => 'span10')); ?>
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