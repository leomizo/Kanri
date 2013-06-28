<?php $this->Html->css('dashboard.css', null, array('inline' => false)); ?>

<div class="container-fluid">

	<div class="row-fluid">
		<div class="span10 offset1 dashboard-block dashboard-title" style="text-align: center">
			<img src="img/dashboard_ico_kanri.png" width="70" height="34" />
			<h3 style="margin: 0">Kanri</h3>
		</div>
	</div>

	<?php if ($visibility == 0 || $visibility == 2): ?>
	<div class="row-fluid">
		<div class="span10 offset1 dashboard-block">
			<h3>Candidatos aniversariantes</h3>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nome do candidato</th>
						<th>Idade</th>
						<th>E-mail pessoal</th>
						<th style="width: 150px">Enviar e-mail padrão?</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($birthdays as $candidate): ?>
					<tr>
						<td><?php echo $this->Html->link($candidate['Candidate']['name'], array('controller' => 'candidates', 'action' => 'show', $candidate['Candidate']['id'])); ?></td>
						<td><?php echo $candidate['Candidate']['age']; ?></td>
						<td><?php echo $candidate['Candidate']['personal_email']; ?></td>
						<td style="text-align: center">
							<a href="#" class="btn btn-primary btn-mini">Enviar</a>
							<a href="#" class="btn btn-danger btn-mini">Ignorar</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php endif; ?>

	<div class="row-fluid">
		<div class="span10 offset1 dashboard-block">
			<h3>Eventos recentes</h3>
			<table class="table table-striped table-bordered">
				<tbody>
					<?php foreach ($events as $event): ?>
					<tr>
						<td class="event-cell">
							<p>
								<strong class="event-day">Dia: </strong><?php echo formatDay($event['Event']['occurrence']); ?>
								<strong class="event-hour">Horário: </strong><?php echo formatHour($event['Event']['occurrence']); ?>
							</p>
							<p>
								<strong>Processo:</strong>
								Candidato <?php echo $this->Html->link($event[0]['candidate_name'], array('controller' => 'candidates', 'action' => 'show', $event['Candidate']['id'])); ?> e empresa <?php echo $this->Html->link($event['Company']['name'], array('controller' => 'companies', 'action' => 'show', $event['Company']['id'])); ?>
							</p>
							<p>
								<strong>Evento:</strong>
								<?php echo $event['Event']['event_type_string']; ?>
							</p>
						</td>
						<td style="width: 150px; vertical-align: middle">
							<?php echo $this->Html->link('Ver detalhes >>', array('controller' => 'processes', 'action' => 'events', $event['Process']['id']), array('class' => 'btn pull-right event-btn')); ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
