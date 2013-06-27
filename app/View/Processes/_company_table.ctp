<?php $this->Paginator->options(array('url' => array('action' => 'get_companies', '?' => array('search' => $this->request->query['search'])), 'class' => 'pagination-link', 'paginated-content' => '#company-content', 'onclick' => 'return Process.handleAsynchronousPagination(this, false)')); ?>

<table id="company-table" class="table table-striped" style="position: relative">
	<tbody>
		<?php foreach ($companies as $company): ?>
		<tr>
			<td>
				<?php echo $this->Html->link($company['Company']['name'], '', array('onclick' => 'return Process.selectCompany(this)', 'company-id' => $company['Company']['id'])); ?>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
<div id='company-pagination' class="pagination pagination-centered" style='position: relative; margin-top: 0'>
	<ul class='pager' style='margin-right: 15px'>
		<?php echo $this->Paginator->prev("← Anterior", array('tag' => 'li', 'class' => 'previous', 'model' => 'Company'), null, array('class' => 'hidden-element')); ?>
	</ul>
	<ul>
		<?php echo $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active', 'separator' => false, 'first' => 'Primeiro', 'last' => 'Último', 'model' => 'Company')); ?>
	</ul>
	<ul class='pager' style='margin-left: 15px'>
		<?php echo $this->Paginator->next("Próximo →", array('tag' => 'li', 'class' => 'next', 'model' => 'Company'), null, array('class' => 'hidden-element')); ?>
	</ul>
</div>