<?php $this->Paginator->options(array('url' => array('action' => 'get_workplaces', '?' => array('search' => isset($this->request->query['search']) ? $this->request->query['search'] : '')), 'class' => 'pagination-link', 'paginated-content' => '#workplace-content', 'onclick' => 'return Candidate.handleAsynchronousPagination(this)')); ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Nacionalidade</th>
			<th>Segmento</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($workplaces as $workplace): ?>
		<tr>
			<td>
				<?php echo $this->Html->link($workplace['Workplace']['name'], "", array('onclick' => 'return Candidate.handleWorkplaceSelection(this)', 'workplace-id' => $workplace['Workplace']['id'])); ?>
			</td>
			<td>
				<?php echo $workplace['Workplace']['nationality']; ?>
			</td>
			<td>
				<?php echo $workplace['MarketSector']['name']; ?>
			</td>
		</tr>
		<?php endforeach; ?>	
	</tbody>
</table>

<div class="pagination pagination-centered" style='margin-top: 0'>
	<ul class='pager' style='margin-right: 15px'>
		<?php echo $this->Paginator->prev("← Anterior", array('tag' => 'li', 'class' => 'previous', 'model' => 'Workplace'), null, array('class' => 'hidden-element')); ?>
	</ul>
	<ul>
		<?php echo $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active', 'separator' => false, 'first' => 'Primeiro', 'last' => 'Último', 'model' => 'Workplace')); ?>
	</ul>
	<ul class='pager' style='margin-left: 15px'>
		<?php echo $this->Paginator->next("Próximo →", array('tag' => 'li', 'class' => 'next', 'model' => 'Workplace'), null, array('class' => 'hidden-element')); ?>
	</ul>
</div>