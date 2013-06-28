<?php $this->Paginator->options(array('url' => array('action' => 'get_market_sectors', '?' => array('search' => isset($this->request->query['search']) ? $this->request->query['search'] : '')), 'class' => 'pagination-link', 'paginated-content' => '#market-sector-content', 'onclick' => 'return Info.handleAsynchronousPagination(this)')); ?>

<table class="table table-striped table-bordered" id="market-sector-table" style='margin-bottom: 0'>
	<tbody>
		<?php if (isset($market_sectors)) foreach ($market_sectors as $market_sector): ?>
		<tr class='table-simple-form'>
			<td>
				<?php echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-edit icon-white')), array('class' => 'btn btn-mini btn-primary edit-btn', 'type' => 'button', 'onclick' => 'Info.MarketSector.edit(this)'));
					  echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-remove icon-white')), array('class' => 'btn btn-mini btn-danger remove-btn', 'type' => 'button', 'onclick' => 'Info.MarketSector.delete(this)')); ?>
			</td>
			<td>
				<?php echo $this->Html->tag('span', $market_sector['MarketSector']['name'], array('class' => 'market-sector-name'));
					  echo $this->Html->tag('input', null, array('class' => 'market-sector-id', 'type' => 'hidden', 'value' => $market_sector['MarketSector']['id']));
					  echo $this->Html->tag('input', null, array('class' => 'market-sector-input', 'type' => 'text', 'value' => $market_sector['MarketSector']['name'], 'style' => 'display: none; margin-bottom: 0')); 
					  echo $this->Form->button('OK', array('class' => 'btn btn-mini btn-primary confirm-btn', 'style' => 'display: none', 'type' => 'button', 'onclick' => 'Info.MarketSector.update(this)'));
					  echo $this->Form->button('Cancelar', array('class' => 'btn btn-mini btn-danger cancel-btn', 'style' => 'display: none', 'type' => 'button', 'onclick' => 'Info.MarketSector.cancel(this)')); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<div class="pagination pagination-centered" style='margin-top: 0'>
	<ul class='pager' style='margin-right: 15px'>
		<?php echo $this->Paginator->prev("← Anterior", array('tag' => 'li', 'class' => 'previous', 'model' => 'MarketSector'), null, array('class' => 'hidden-element')); ?>
	</ul>
	<ul>
		<?php echo $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active', 'separator' => false, 'first' => 'Primeiro', 'last' => 'Último', 'model' => 'MarketSector')); ?>
	</ul>
	<ul class='pager' style='margin-left: 15px'>
		<?php echo $this->Paginator->next("Próximo →", array('tag' => 'li', 'class' => 'next', 'model' => 'MarketSector'), null, array('class' => 'hidden-element')); ?>
	</ul>
</div>

