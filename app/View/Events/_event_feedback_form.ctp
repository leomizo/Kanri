<div class="control-group">
	<?php if ($edit) echo $this->Form->input('EventFeedback.id', array('div' => false, 'label' => false, 'type' => 'hidden')); ?>
	<?php echo $this->Form->label('EventFeedback.feedback', 'Feedback', array('div' => false, 'class' => 'control-label')); ?>
	<div class="controls">
		<label class="radio inline">
			<input type="radio" name="data[EventFeedback][feedback]" value="0" <?php if ($edit && $this->request->data['EventFeedback']['feedback'] == 0) echo 'checked'; ?> />Ruim
		</label>
		<label class="radio inline">
			<input type="radio" name="data[EventFeedback][feedback]" value="1" <?php if ($edit && $this->request->data['EventFeedback']['feedback'] == 1) echo 'checked'; ?> />Regular
		</label>
		<label class="radio inline">
			<input type="radio" name="data[EventFeedback][feedback]" value="2" <?php if ($edit && $this->request->data['EventFeedback']['feedback'] == 2) echo 'checked'; ?> />Bom
		</label>
		<label class="radio inline">
			<input type="radio" name="data[EventFeedback][feedback]" value="3" <?php if (!$edit || $this->request->data['EventFeedback']['feedback'] >= 3) echo 'checked'; ?> />Ótimo
		</label>
	</div>
</div>

<div class="control-group">
	<?php echo $this->Form->label('EventFeedback.comments', 'Comentários', array('div' => false, 'class' => 'control-label')); ?>
	<div class="controls">
		<?php echo $this->Form->input('EventFeedback.comments', array('div' => false, 'label' => false)); ?>
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