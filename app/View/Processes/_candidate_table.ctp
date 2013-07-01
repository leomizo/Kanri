<?php $this->Paginator->options(array('url' => array('action' => 'get_candidates', '?' => array('search' => isset($this->request->query['search']) ? $this->request->query['search'] : '')), 'class' => 'pagination-link', 'paginated-content' => '#candidate-content', 'onclick' => 'return Process.handleAsynchronousPagination(this, true)')); ?>

<table id="candidate-table" class="table table-striped" style="position: relative;<?php if (!$visible) echo 'opacity: 0; display: none; left: 100px' ?>">
	<tbody>
		<?php foreach ($candidates as $candidate): ?>
		<tr>
			<td>
				<?php echo $this->Html->link($candidate['Candidate']['name'], '', array('class' => 'candidate-selector', 'onclick' => 'return Process.selectCandidate(this)', 'city' => $candidate['City']['name'], 'age' => $candidate['Candidate']['age'], 'candidate-id' => $candidate['Candidate']['id'])); ?>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
<div id='candidate-pagination' class="pagination pagination-centered" style='position: relative; margin-top: 0; <?php if (!$visible) echo "opacity: 0; display: none; left: 100px" ?>'>
	<ul class='pager' style='margin-right: 15px'>
		<?php echo $this->Paginator->prev("← Anterior", array('tag' => 'li', 'class' => 'previous', 'model' => 'Candidate'), null, array('class' => 'hidden-element')); ?>
	</ul>
	<ul>
		<?php echo $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active', 'separator' => false, 'first' => 'Primeiro', 'last' => 'Último', 'model' => 'Candidate')); ?>
	</ul>
	<ul class='pager' style='margin-left: 15px'>
		<?php echo $this->Paginator->next("Próximo →", array('tag' => 'li', 'class' => 'next', 'model' => 'Candidate'), null, array('class' => 'hidden-element')); ?>
	</ul>
</div>