<?php $this->Paginator->options(array('url' => array('action' => 'get_'.$modal_table.'s', '?' => array('search' => $this->request->query['search'])), 'class' => 'pagination-link', 'paginated-content' => '#'.$modal_table.'-content', 'onclick' => 'return Candidate.handleAsynchronousPagination(this)')); ?>

<table class="table table-striped">
	<tbody>
		<?php foreach ($modal_data as $entry): ?>
		<tr>
			<td>
				<?php echo $this->Html->link($entry[ucfirst($modal_table)]['name'], "", array('name-input' => '#'.$modal_table.'-name-input', 'id-input' => '#'.$modal_table.'-input', 'entry-id' => $entry[ucfirst($modal_table)]['id'], 'onclick' => 'return Candidate.handleModalSelection(this)')); ?>
			</td>
		</tr>
		<?php endforeach; ?>	
	</tbody>
</table>

<div class="pagination pagination-centered" style='margin-top: 0'>
	<ul class='pager' style='margin-right: 15px'>
		<?php echo $this->Paginator->prev("← Anterior", array('tag' => 'li', 'class' => 'previous', 'model' => 'Formation'), null, array('class' => 'hidden-element')); ?>
	</ul>
	<ul>
		<?php echo $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active', 'separator' => false, 'first' => 'Primeiro', 'last' => 'Último', 'model' => 'Formation')); ?>
	</ul>
	<ul class='pager' style='margin-left: 15px'>
		<?php echo $this->Paginator->next("Próximo →", array('tag' => 'li', 'class' => 'next', 'model' => 'Formation'), null, array('class' => 'hidden-element')); ?>
	</ul>
</div>
