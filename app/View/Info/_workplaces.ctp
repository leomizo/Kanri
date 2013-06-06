<?php $this->Paginator->options(array('url' => array('action' => 'get_workplaces', '?' => array('search' => $this->request->query['search'])), 'class' => 'pagination-link', 'paginated-content' => '#workplace-content', 'onclick' => 'return Info.handleAsynchronousPagination(this)')); ?>

<table class="table table-striped table-bordered" id="workplace-table" style='margin-bottom: 0'>
	<tbody>
		<?php if (isset($workplaces)) foreach ($workplaces as $workplace): ?>
		<tr class='table-simple-form'>
			<td>
				<?php echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-edit icon-white')), array('class' => 'btn btn-mini btn-primary edit-btn', 'type' => 'button', 'onclick' => 'Info.Workplace.edit(this)')); 
					  echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-remove icon-white')), array('class' => 'btn btn-mini btn-danger remove-btn', 'type' => 'button', 'onclick' => 'Info.Workplace.delete(this)')); ?>
			</td>
			<td>
			<?php echo $this->Form->create('Workplace', array('style' => 'margin-bottom: 0', 'onsubmit' => 'return Info.Workplace.update(this)', 'autocomplete' => 'off')); ?>
				<div style="margin-top: 5px; margin-bottom: 5px">
				<?php echo $this->Form->label('name', 'Empresa: ', array('div' => false, 'style' => 'font-weight: bold; display: inline'));
					  echo $this->Html->tag('span', $workplace['Workplace']['name'], array('class' => 'workplace-name'));
				      echo $this->Form->input('name', array('value' => $workplace['Workplace']['name'], 'style' => 'display: none', 'div' => false, 'label' => false, 'class' => 'workplace-name-input'));
				      echo $this->Form->input('id', array('value' => $workplace['Workplace']['id'], 'type' => 'hidden', 'class' => 'workplace-id')); ?>
				</div>
				<div style="margin-top: 5px; margin-bottom: 5px">
				<?php echo $this->Form->label('MarketSector.id', 'Segmento: ', array('div' => false, 'style' => 'font-weight: bold; display: inline'));
				      echo $this->Html->tag('span', $workplace['MarketSector']['name'], array('class' => 'workplace-market-sector-name'));
				      echo $this->Form->input('MarketSector.id', array('style' => 'display: none', 'div' => false, 'label' => false, 'class' => 'workplace-market-sector-input', 'options' => array(), 'onchange' => 'Info.Workplace.editNewMarketSector(this)', 'current' => $workplace['MarketSector']['id'])); 
				      echo $this->Form->label('MarketSector.name', 'Qual? ', array('div' => false, 'style' => 'display: none; margin-left: 10px', 'class' => 'workplace-market-sector-name-label'));
				      echo $this->Form->input('MarketSector.name', array('style' => 'display: none; margin-left: 10px', 'div' => false, 'label' => false, 'class' => 'workplace-market-sector-name-input')); ?>
				</div>	
				<div style="margin-top: 5px; margin-bottom: 5px">
				<?php echo $this->Form->label('nationality', 'Nacionalidade: ', array('div' => false, 'style' => 'font-weight: bold; display: inline'));
					  echo $this->Html->tag('span', $workplace['Workplace']['nationality'], array('class' => 'workplace-nationality')); 
					  echo $this->Form->input('nationality', array('value' => $workplace['Workplace']['nationality'], 'style' => 'display: none', 'div' => false, 'label' => false, 'class' => 'workplace-nationality-input')); ?>
				</div>
				<?php echo $this->Form->button('OK', array('class' => 'btn btn-mini btn-primary confirm-btn', 'onclick' => 'Info.Workplace.update(this)', 'style' => 'display: none'));
					  echo $this->Form->button('Cancelar', array('class' => 'btn btn-mini btn-danger cancel-btn', 'onclick' => 'Info.Workplace.cancel(this)', 'style' => 'display: none', 'type' => 'button')); ?>
			<?php echo $this->Form->end(); ?>
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

