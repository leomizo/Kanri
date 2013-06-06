<?php $this->Paginator->options(array('url' => array('action' => 'get_courses', '?' => array('search' => $this->request->query['search'])), 'class' => 'pagination-link', 'paginated-content' => '#course-content', 'onclick' => 'return Info.handleAsynchronousPagination(this)')); ?>

<table class="table table-striped table-bordered" id="course-table" style='margin-bottom: 0'>
	<tbody>
		<?php if (isset($courses)) foreach ($courses as $course): ?>
		<tr class='table-simple-form'>
			<td>
				<?php echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-edit icon-white')), array('class' => 'btn btn-mini btn-primary edit-btn', 'type' => 'button', 'onclick' => 'Info.Course.edit(this)'));
					  echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-remove icon-white')), array('class' => 'btn btn-mini btn-danger remove-btn', 'type' => 'button', 'onclick' => 'Info.Course.delete(this)')); ?>
			</td>
			<td>
				<?php echo $this->Html->tag('span', $course['Course']['name'], array('class' => 'course-name'));
					  echo $this->Html->tag('input', null, array('class' => 'course-id', 'type' => 'hidden', 'value' => $course['Course']['id']));
					  echo $this->Html->tag('input', null, array('class' => 'course-input', 'type' => 'text', 'value' => $course['Course']['name'], 'style' => 'display: none; margin-bottom: 0')); 
					  echo $this->Form->button('OK', array('class' => 'btn btn-mini btn-primary confirm-btn', 'style' => 'display: none', 'type' => 'button', 'onclick' => 'Info.Course.update(this)'));
					  echo $this->Form->button('Cancelar', array('class' => 'btn btn-mini btn-danger cancel-btn', 'style' => 'display: none', 'type' => 'button', 'onclick' => 'Info.Course.cancel(this)')); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<div class="pagination pagination-centered" style='margin-top: 0'>
	<ul class='pager' style='margin-right: 15px'>
		<?php echo $this->Paginator->prev("← Anterior", array('tag' => 'li', 'class' => 'previous', 'model' => 'Course'), null, array('class' => 'hidden-element')); ?>
	</ul>
	<ul>
		<?php echo $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active', 'separator' => false, 'first' => 'Primeiro', 'last' => 'Último', 'model' => 'Course')); ?>
	</ul>
	<ul class='pager' style='margin-left: 15px'>
		<?php echo $this->Paginator->next("Próximo →", array('tag' => 'li', 'class' => 'next', 'model' => 'Course'), null, array('class' => 'hidden-element')); ?>
	</ul>
</div>

