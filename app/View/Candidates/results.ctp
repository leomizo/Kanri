<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li>
					<?php echo $this->Html->link('Visualizar candidatos', '/candidates'); ?>
				</li>
				<li class="active">
					<?php echo $this->Html->link('Busca avançada de candidatos', '/candidates/search'); ?>
				</li>
				<?php if ($visibility == 0 || $visibility == 2): ?>
				<li>
					<?php echo $this->Html->link('Adicionar candidatos', '/candidates/add'); ?>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Resultado da busca</h2>
	</div>

	<div class="row-fluid">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nome do candidato</th>
					<th>Idade</th>
					<th>Cidade</th>
					<th>Cargo mais recente</th>
					<th style="width: <?php if ($visibility == 0 || $visibility == 2) echo '200px'; else echo '95px'; ?>">Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php if (isset($candidates)) foreach ($candidates as $candidate): ?>
				<tr>
					<td>
						<?php echo $this->Html->link($candidate['Candidate']['name'], array('controller' => 'candidates', 'action' => 'show', $candidate['Candidate']['id'])); ?>
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
						<?php if ($visibility == 0 || $visibility == 2) {
								    echo $this->Html->link('Editar', array('controller' => 'candidates', 'action' => 'edit', $candidate['Candidate']['id']), array('class' => 'btn btn-mini', 'style' => 'margin-right: 6px'));
							        echo $this->Form->postLink('Remover', array('controller' => 'candidates', 'action' => 'delete', $candidate['Candidates']['id']), array('class' => 'btn btn-mini btn-danger'), 'Você está certo disso?');
						  	  }
						      echo $this->Html->link('Ver processos', array('controller' => 'processes', 'action' => 'view', $candidate['Candidate']['id']), array('class' => 'btn btn-mini btn-primary', 'style' => 'margin-left: 4px')); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="pagination pagination-centered">
			<ul class='pager'>
				<?php echo $this->Paginator->prev("← Anterior", array('tag' => 'li', 'class' => 'previous', 'style' => 'margin-right: 15px'), null, array('class' => 'hidden-element')); ?>
			</ul>
			<ul>
				<?php echo $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active', 'separator' => false, 'first' => 'Primeiro', 'last' => 'Último')); ?>
			</ul>
			<ul class='pager'>
				<?php echo $this->Paginator->next("Próximo →", array('tag' => 'li', 'class' => 'previous', 'style' => 'margin-left: 15px'), null, array('class' => 'hidden-element')); ?>
			</ul>
		</div>
	</div>
</div>