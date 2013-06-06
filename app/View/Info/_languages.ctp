<?php $this->Paginator->options(array('url' => array('action' => 'get_languages', '?' => array('search' => $this->request->query['search'])), 'class' => 'pagination-link', 'paginated-content' => '#language-content', 'onclick' => 'return Info.handleAsynchronousPagination(this)')); ?>

<table class="table table-striped table-bordered" id="language-table" style='margin-bottom: 0'>
	<tbody>
		<?php if (isset($languages)) foreach ($languages as $language): ?>
		<tr class='table-simple-form'>
			<td>
				<?php echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-edit icon-white')), array('class' => 'btn btn-mini btn-primary edit-btn', 'type' => 'button', 'onclick' => 'Info.Language.edit(this)'));
					  echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-remove icon-white')), array('class' => 'btn btn-mini btn-danger remove-btn', 'type' => 'button', 'onclick' => 'Info.Language.delete(this)')); ?>
			</td>
			<td>
				<?php echo $this->Html->tag('span', $language['Language']['name'], array('class' => 'language-name'));
					  echo $this->Html->tag('input', null, array('class' => 'language-id', 'type' => 'hidden', 'value' => $language['Language']['id']));
					  echo $this->Html->tag('input', null, array('class' => 'language-input', 'type' => 'text', 'value' => $language['Language']['name'], 'style' => 'display: none; margin-bottom: 0')); 
					  echo $this->Form->button('OK', array('class' => 'btn btn-mini btn-primary confirm-btn', 'style' => 'display: none', 'type' => 'button', 'onclick' => 'Info.Language.update(this)'));
					  echo $this->Form->button('Cancelar', array('class' => 'btn btn-mini btn-danger cancel-btn', 'style' => 'display: none', 'type' => 'button', 'onclick' => 'Info.Language.cancel(this)')); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<div class="pagination pagination-centered" style='margin-top: 0'>
	<ul class='pager' style='margin-right: 15px'>
		<?php echo $this->Paginator->prev("← Anterior", array('tag' => 'li', 'class' => 'previous', 'model' => 'Language'), null, array('class' => 'hidden-element')); ?>
	</ul>
	<ul>
		<?php echo $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active', 'separator' => false, 'first' => 'Primeiro', 'last' => 'Último', 'model' => 'Language')); ?>
	</ul>
	<ul class='pager' style='margin-left: 15px'>
		<?php echo $this->Paginator->next("Próximo →", array('tag' => 'li', 'class' => 'next', 'model' => 'Language'), null, array('class' => 'hidden-element')); ?>
	</ul>
</div>

