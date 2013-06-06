<?php $this->Paginator->options(array('url' => array('action' => 'get_jobs', '?' => array('search' => $this->request->query['search'])), 'class' => 'pagination-link', 'paginated-content' => '#job-content', 'onclick' => 'return Info.handleAsynchronousPagination(this)')); ?>

<table class="table table-striped table-bordered" id="job-table" style='margin-bottom: 0'>
	<tbody>
		<?php if (isset($jobs)) foreach ($jobs as $job): ?>
		<tr class='table-simple-form'>
			<td>
				<?php echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-edit icon-white')), array('class' => 'btn btn-mini btn-primary edit-btn', 'type' => 'button', 'onclick' => 'Info.Job.edit(this)'));
					  echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-remove icon-white')), array('class' => 'btn btn-mini btn-danger remove-btn', 'type' => 'button', 'onclick' => 'Info.Job.delete(this)')); ?>
			</td>
			<td>
				<?php echo $this->Html->tag('span', $job['Job']['name'], array('class' => 'job-name'));
					  echo $this->Html->tag('input', null, array('class' => 'job-id', 'type' => 'hidden', 'value' => $job['Job']['id']));
					  echo $this->Html->tag('input', null, array('class' => 'job-input', 'type' => 'text', 'value' => $job['Job']['name'], 'style' => 'display: none; margin-bottom: 0')); 
					  echo $this->Form->button('OK', array('class' => 'btn btn-mini btn-primary confirm-btn', 'style' => 'display: none', 'type' => 'button', 'onclick' => 'Info.Job.update(this)'));
					  echo $this->Form->button('Cancelar', array('class' => 'btn btn-mini btn-danger cancel-btn', 'style' => 'display: none', 'type' => 'button', 'onclick' => 'Info.Job.cancel(this)')); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<div class="pagination pagination-centered" style='margin-top: 0'>
	<ul class='pager' style='margin-right: 15px'>
		<?php echo $this->Paginator->prev("← Anterior", array('tag' => 'li', 'class' => 'previous', 'model' => 'Job'), null, array('class' => 'hidden-element')); ?>
	</ul>
	<ul>
		<?php echo $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active', 'separator' => false, 'first' => 'Primeiro', 'last' => 'Último', 'model' => 'Job')); ?>
	</ul>
	<ul class='pager' style='margin-left: 15px'>
		<?php echo $this->Paginator->next("Próximo →", array('tag' => 'li', 'class' => 'next', 'model' => 'Job'), null, array('class' => 'hidden-element')); ?>
	</ul>
</div>

