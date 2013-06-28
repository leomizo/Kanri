<?php $this->Html->script('process.js', array('inline' => false)); ?>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Processos</h2>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<?php if (isset($success_message)): ?>
				<div class='alert alert-success'>
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Sucesso!</strong> Processo <?php if ($success_message == 'add') echo 'adicionado'; elseif ($success_message == 'delete') echo 'deletado' ?> com sucesso!
				</div>
			<?php endif; ?>
			<?php echo $this->Form->create(null, array('class' => 'form-search well search-box', 'type' => 'get', 'action' => 'index'));
				  echo $this->Form->input("Buscar candidato / empresa: ", array('div' => false, 'class' => 'input-large search-query', 'label' => array('class' => 'control-label'), 'name' => 'search', 'id' => 'search-input', 'value' => isset($this->request->query['search']) ? $this->request->query['search'] : ''));
				  echo $this->Form->submit("Buscar", array('class' => 'btn', 'div' => false));
				  echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-plus icon-white')).' Abrir novo processo', array('type' => 'button', 'class' => 'btn btn-success pull-right', 'escape' => false, 'data-toggle' => 'modal', 'data-target' => '#process-modal'));
				  echo $this->Form->end();
			?>
		</div>
	</div>

	<div class="row-fluid">
		<table class="table table-striped table-bordered table-sortable">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort("Company.name", 'Empresa'); ?></th>
					<th><?php echo $this->Paginator->sort("Candidate.first_name", 'Candidato'); ?></th>
					<th><?php echo $this->Paginator->sort("last_occurrence", 'Data do evento mais recente'); ?></th>
					<th style="width: 120px">Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($processes as $process): ?>
				<tr>
					<td>
						<?php echo $this->Html->link($process['Company']['name'], array('controller' => 'companies', 'action' => 'show', $process['Company']['id'])); ?>
					</td>
					<td>
						<?php echo $this->Html->link($process['Candidate']['first_name'].' '.$process['Candidate']['middle_names'].' '.$process['Candidate']['last_name'], array('controller' => 'candidates', 'action' => 'show', $process['Candidate']['id'])); ?>
					</td>
					<td><?php echo formatDate($process[0]['last_occurrence']); ?></td>
					<td>
						<?php echo $this->Html->link('Eventos', array('action' => 'events', $process['Process']['id']), array('class' => 'btn btn-mini btn-primary')); 
							  echo $this->Form->postLink('Remover', array('controller' => 'processes', 'action' => 'delete', $process['Process']['id']), array('class' => 'btn btn-mini btn-danger', 'style' => 'margin-left: 5px'), 'Você está certo disso?');
						?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="pagination pagination-centered">
			<ul class='pager'>
				<?php echo $this->Paginator->prev("← Anterior", array('tag' => 'li', 'class' => 'previous', 'style' => 'margin-right: 15px', 'model' => 'Process'), null, array('class' => 'hidden-element')); ?>
			</ul>
			<ul>
				<?php echo $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active', 'separator' => false, 'first' => 'Primeiro', 'last' => 'Último', 'model' => 'Process')); ?>
			</ul>
			<ul class='pager'>
				<?php echo $this->Paginator->next("Próximo →", array('tag' => 'li', 'class' => 'previous', 'style' => 'margin-left: 15px', 'model' => 'Process'), null, array('class' => 'hidden-element')); ?>
			</ul>
		</div>
	</div>
</div>

<div id="process-modal" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3>Selecione uma empresa</h3>
    	<form class="form-search" style="margin: 10px 0 0 0">
		  	<input type="text" class="input-medium search-query" style="width: 415px">
		  	<button type="submit" class="btn" style="margin-left: 5px">Buscar</button>
		</form>
  	</div>
  	<div class="modal-body">
  		<div id='company-content'>
  			<?php include '_company_table.ctp' ?>
  		</div>
  		<div id='candidate-content'>
  			<?php $visible = false;
  				  include '_candidate_table.ctp'; ?>
  		</div>
  	</div>
  	<div class="modal-footer">
  		<?php echo $this->Form->create("Process", array('action' => 'add')); ?>
  		<dl class="dl-horizontal pull-left">
  			<dt style="width: 80px">Empresa:</dt>
  			<dd id="company-name-input" style="margin-left: 100px; text-align: left"></dd>
  			<dt style="width: 80px">Candidato:</dt>
  			<dd id="candidate-name-input" style="margin-left: 100px; text-align: left"></dd>
  		</dl>
  		<?php echo $this->Form->input("Process.candidate_id", array('div' => false, 'label' => false, 'type' => 'hidden', 'id' => 'candidate-input')); 
  			  echo $this->Form->input("Process.company_id", array('div' => false, 'label' => false, 'type' => 'hidden', 'id' => 'company-input')); ?>
  		<button type='button' id="process-return-btn" class="btn" style="position: relative; top: 20px; display: none" onclick='Process.returnToCompanySelection()'>Voltar</button>
  		<button type='submit' id="process-ok-btn" class="btn btn-primary" style="position: relative; top: 20px; display: none">OK</button>
    	<button class="btn" data-dismiss="modal" aria-hidden="true" style="position: relative; top: 20px">Cancelar</button>
    	<?php echo $this->Form->end(); ?>
  	</div>
</div>