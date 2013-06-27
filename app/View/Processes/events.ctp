<?php $this->Html->script('process.js', array('inline' => false)); ?>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Processo: <?php echo $process['Company']['name'].' e '.$process[0]['Candidate_name']; ?></h2>
		<?php if (isset($success_message)): ?>
			<div class='alert alert-success'>
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Sucesso!</strong> Evento <?php if ($success_message == 'edit') echo 'atualizado'; elseif ($success_message == 'add') echo 'adicionado'; elseif ($success_message == 'delete') echo 'deletado' ?> com sucesso!
			</div>
		<?php endif; ?>
	</div>

	<div class="row-fluid">
		<div class="span12 well">
			<h4 id='event-form-title'>Adicionar evento</h4>
			<?php echo $this->Form->create('Event', array('class' => 'form-horizontal', 'id' => 'event-form', 'style' => 'margin-bottom: 0; margin-top: 20px', 'controller' => 'events', 'action' => 'add')); ?>
				<div class="control-group">
					<?php echo $this->Form->input('Event.process_id', array('div' => false, 'label' => false, 'type' => 'hidden', 'value' => $process['Process']['id'])); ?>
					<?php echo $this->Form->input('Event.id', array('div' => false, 'label' => false, 'type' => 'hidden', 'value' => "-1")); ?>
					<?php echo $this->Form->label('Event.event_type', 'Tipo de evento', array('div' => false, 'class' => 'control-label')); ?>
					<div class="controls pull-left" style="margin-left: 20px; margin-right: 33px">
						<?php echo $this->Form->input('Event.event_type', array('div' => false, 'label' => false, 'class' => 'input-xlarge', 'onchange' => 'Process.selectEventType(this)', 'options' => array("1" => "Contato com o candidato", "2" => "Contato com a empresa", "3" => "Entrevista com o candidato", "4" => "Entrevista do candidato na empresa", "5" => "Feedback do candidato", "6" =>  "Feedback da empresa", "7" => "Conclusão do processo"), 'empty' => 'Selecione...')); ?>
					</div>
					<?php echo $this->Form->label('Event.occurrence', 'Data e horário', array('div' => false, 'class' => 'control-label')); ?>
					<div class="controls date-time-picker input-append" style="margin-left: 20px">
						<input name='data[Event][occurrence]' data-format="dd/MM/yyyy hh:mm:ss" type="text" required='required' id='EventOccurrence'/>
					    <span class="add-on">
					      	<i class="icon-calendar"></i>
					    </span>
					</div>
				</div>
				<div id='loadable-form'>

				</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>

	<div class="row-fluid">
		<h3>Eventos</h3>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width: 250px">Data de ocorrência</th>
					<th>Descrição</th>
					<th style="width: 110px">Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($process['Event'] as $event): ?>
				<tr editing='false'>
					<td style="text-align: center; vertical-align: middle">
						<div class='event-cell'>
							<?php echo formatDate($event['occurrence']); ?>
						</div>
					</td>
					<td>
						<div class='event-cell'>
							<h4 style='margin-left: 10px'><?php echo $event['event_type_string']; ?></h4>
							<div class="event-info">
								<span class='event-id' style='display: none'><?php echo $event['id']; ?></span>
								<span class='event-type' style='display: none'><?php echo $event['event_type']; ?></span>
								<span class='event-occurrence' style='display: none'><?php echo date('d/m/Y H:i:s', strtotime($event['occurrence'])); ?></span>
								<ul style="list-style-type: none">
									<?php switch ($event['event_type']):
										  case 1: ?>
										  	  <?php include '_event_contact_cell.ctp'; ?>
									<?php break;
										  case 2: ?>
										  	  <?php include '_event_contact_cell.ctp'; ?>
									<?php break;
										  case 3: ?>
										  	  <?php include '_event_interview_cell.ctp'; ?>
									<?php break;
										  case 4: ?>
											  <?php include '_event_interview_cell.ctp'; ?>
									<?php break;
										  case 5: ?>
										  	  <?php include '_event_feedback_cell.ctp'; ?>
									<?php break;
										  case 6: ?>
										  	  <?php include '_event_feedback_cell.ctp'; ?>
									<?php break;
										  case 7: ?>
										  	  <?php include '_event_conclusion_cell.ctp'; ?>
									<?php break;
										  endswitch ;?>
								</ul>
							</div>
						</div>
					</td>
					<td style="text-align: center; vertical-align: middle">
						<div class="event-info">
							<?php if ($event['event_type'] != 0): ?>
							<?php echo $this->Form->button('Editar', array('class' => 'btn btn-mini btn-primary', 'onclick' => 'Process.editEvent(this)'));
								  echo $this->Form->postLink('Remover', array('controller' => 'events', 'action' => 'delete', $event['id'], $event['process_id']), array('class' => 'btn btn-mini btn-danger', 'style' => 'margin-left: 5px'), 'Você está certo disso?'); ?>
							<?php endif; ?>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>