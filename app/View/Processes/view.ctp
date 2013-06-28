<?php $this->Html->script('process.js', array('inline' => false)); ?>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Processos de <?php echo $title; ?></h2>
	</div>

	<div class="row-fluid">
		<table class="table table-striped table-bordered table-sortable">
			<thead>
				<tr>
					<th>Empresa</th>
					<th>Candidato</th>
					<th>Data do evento mais recente</th>
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
	</div>
</div>
