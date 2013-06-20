<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li class="active">
					<?php echo $this->Html->link('Visualizar candidatos', '/candidates'); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Busca avançada de candidatos', '/candidates/search'); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Adicionar candidatos', '/candidates/add'); ?>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Candidatos</h2>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<form class="form-search well search-box">
			  	<label class="control-label" for="inputUserSearch">Buscar candidato: </label>
			  	<input type="text" id="inputUserSearch" class="input-medium search-query" />
				<button type="submit" class="btn">Buscar</button>
				<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-plus icon-white')).' Adicionar novo candidato', array('action' => 'add'), array('class' => 'btn btn-success pull-right', 'escape' => false)); ?>
				<a href="candidate_search.html" class="btn btn-primary pull-right"><i class="icon-search icon-white"></i> Busca avançada de candidatos</a>
			</form>
		</div>
	</div>

	<div class="row-fluid">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nome do candidato</th>
					<th>Idade</th>
					<th>Cidade</th>
					<th>Cargo atual</th>
					<th style="width: 200px">Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php $this->log($candidates, 'debug'); ?>
				<?php if (isset($candidates)) foreach ($candidates as $candidate): ?>

				<tr>
					<td>
						<?php echo $this->Html->link($candidate['Candidate']['first_name'].' '.$candidate['Candidate']['middle_names'].' '.$candidate['Candidate']['last_name'], array('controller' => 'candidates', 'action' => 'show', $candidate['Candidate']['id'])); ?>
					</td>
					<td>
						<?php echo $candidate['Candidate']['age']; ?>
					</td>
					<td>
						<?php echo $candidate['City']['name']; ?>
					</td>
					<td>
						<?php echo $candidate['Candidate']['current_job']; ?>
					</td>
					<td>
						<?php echo $this->Html->link('Editar', array('controller' => 'candidates', 'action' => 'edit', $candidate['Candidate']['id']), array('class' => 'btn btn-mini', 'style' => 'margin-right: 6px'));
						      echo $this->Form->postLink('Remover', array('controller' => 'candidates', 'action' => 'delete', $candidate['Candidates']['id']), array('class' => 'btn btn-mini btn-danger'), 'Você está certo disso?'); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>