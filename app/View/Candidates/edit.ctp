<?php $this->Html->script('candidate.js', array('inline' => false)); ?>

<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li <?php if ($step == 0) echo 'class="active"'; ?>>
					<?php echo $this->Html->link('Dados pessoais', array('action' => 'edit', '?' => array('step' => 0), $this->request->data['Candidate']['id'])); ?>
				</li>
				<li <?php if ($step == 1) echo 'class="active"'; ?>>
					<?php echo $this->Html->link('Formação acadêmica', array('action' => 'edit', '?' => array('step' => 1), $this->request->data['Candidate']['id'])); ?>
				</li>
				<li <?php if ($step == 2) echo 'class="active"'; ?>>
					<?php echo $this->Html->link('Idiomas', array('action' => 'edit', '?' => array('step' => 2), $this->request->data['Candidate']['id'])); ?>
				</li>
				<li <?php if ($step == 3) echo 'class="active"'; ?>>
					<?php echo $this->Html->link('Cursos / especializações', array('action' => 'edit', '?' => array('step' => 3), $this->request->data['Candidate']['id'])); ?>
				</li>
				<li <?php if ($step == 4) echo 'class="active"'; ?>>
					<?php echo $this->Html->link('Remuneração', array('action' => 'edit', '?' => array('step' => 4), $this->request->data['Candidate']['id'])); ?>
				</li>
				<li <?php if ($step == 5) echo 'class="active"'; ?>>
					<?php echo $this->Html->link('Realizações', array('action' => 'edit', '?' => array('step' => 5), $this->request->data['Candidate']['id'])); ?>
				</li>
				<li <?php if ($step == 6) echo 'class="active"'; ?>>
					<?php echo $this->Html->link('Outras informações e Currículo', array('action' => 'edit', '?' => array('step' => 6), $this->request->data['Candidate']['id'])); ?>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2><?php echo $this->request->data['Candidate']['name']; ?></h2>
	</div>

  <?php include '_edit_'.$step.'.ctp' ?>

</div>

<?php if ($step == 1): ?>
<div id="formation-modal" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3>Tipo de Formação</h3>
    	<?php echo $this->Form->create('FormationSearch', array('class' => 'form-search', 'style' => 'margin: 10px 0 0 0', 'onsubmit' => 'return Candidate.searchFormation(this)'));
    		  echo $this->Form->input(null, array('div' => false, 'label' => false, 'type' => 'text', 'class' => 'input-medium search-query', 'style' => 'width: 415px'));
    		  echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn', 'style' => 'margin-left: 5px'));
		      echo $this->Form->end(); ?>
  	</div>
  	<div class="modal-body" id='formation-content'>
  		<?php $modal_data = $formations;
			  $modal_table = 'formation';
			  include '_modal_content.ctp'; ?>
  	</div>
  	<div class="modal-footer">
  		<form class="form-horizontal">
  			<div class="control-group">
  				<label class="control-label" style="width: auto; margin-right: 15px; margin-left: 5px">Nova formação</label>
  				<div class="controls" style="text-align: left; margin-left: 0">
  					<input id="formation-new-input" type="text" class="span5" style="width: 397px" />
  				</div>
  			</div>
  		</form>
  		<button type='button' class="btn btn-primary" onclick='Candidate.addFormation()'>Adicionar formação</button>
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  	</div>
</div>
<?php endif; ?>

<?php if ($step == 3): ?>
<div id="course-modal" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3>Curso / Especialização</h3>
    	<?php echo $this->Form->create('CourseSearch', array('class' => 'form-search', 'style' => 'margin: 10px 0 0 0', 'onsubmit' => 'return Candidate.searchCourse(this)'));
    		  echo $this->Form->input(null, array('div' => false, 'label' => false, 'type' => 'text', 'class' => 'input-medium search-query', 'style' => 'width: 415px'));
    		  echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn', 'style' => 'margin-left: 5px'));
		      echo $this->Form->end(); ?>
  	</div>
  	<div class="modal-body" id='course-content'>
  		<?php $modal_data = $courses;
			  $modal_table = 'course';
			  include '_modal_content.ctp'; ?>
  	</div>
  	<div class="modal-footer">
  		<form class="form-horizontal">
  			<div class="control-group">
  				<label class="control-label" style="width: auto; margin-right: 15px; margin-left: 5px">Adicionar novo:</label>
  				<div class="controls" style="text-align: left; margin-left: 0">
  					<input id="course-new-input" type="text" class="span5" style="width: 397px" />
  				</div>
  			</div>
  		</form>
  		<button type='button' class="btn btn-primary" onclick='Candidate.addCourse()'>Adicionar curso / especialização</button>
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  	</div>
</div>
<?php endif; ?>

<?php if ($step == 5): ?>
<div id="workplace-modal" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3>Local de trabalho</h3>
    	<?php echo $this->Form->create('WorkplaceSearch', array('class' => 'form-search', 'style' => 'margin: 10px 0 0 0', 'onsubmit' => 'return Candidate.searchWorkplace(this)'));
    		  echo $this->Form->input(null, array('div' => false, 'label' => false, 'type' => 'text', 'class' => 'input-medium search-query', 'style' => 'width: 415px'));
    		  echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn', 'style' => 'margin-left: 5px'));
		      echo $this->Form->end(); ?>
  	</div>
  	<div id='workplace-content' class="modal-body" style="max-height: 300px">
		<?php include '_modal_workplace.ctp'; ?>
  	</div>
  	<div class="modal-footer">
  		<form>
  			<div style="float: left">
				<label style="line-height: 30px; float: left; margin-right: 49px">Empresa</label>
				<input id="workplace-name-new-input" type="text" style="float: left"/>
			</div>
			<div style="float: left">
				<label style="line-height: 30px; float: left; margin-right: 41px">Segmento</label>
				<?php echo $this->Form->input(null, array('div' => false, 'label' => false, 'options' => $market_sectors, 'class' => 'pull-left', 'id' => 'workplace-market-sector-new-input', 'empty' => 'Selecione...', 'onchange' => 'Candidate.selectWorkplaceMarketSector(this)')); ?>
				<div class="input-append" style="float: left; display: none" id="workplace-market-sector-add-input">
					<input type="text" />
					<span onclick="Candidate.cancelWorkplaceMarketSectorAdd()" class="add-on" style="cursor: pointer">X</span>
				</div>
			</div>
			<div style="float: left">
				<label style="line-height: 30px; float: left; margin-right: 15px">Nacionalidade</label>
				<input id="workplace-nationality-new-input" type="text" style="float: left"/>
			</div>
  		</form>
  		
    	<a id="add-new-work-local" class="btn btn-primary" style="float:left; margin-left: 25px" onclick="Candidate.addWorkplace()"><i class="icon-plus icon-white"></i> Adicionar novo local</a>
  	</div>
</div>

<div id="job-modal" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3>Cargo</h3>
    	<?php echo $this->Form->create('JobSearch', array('class' => 'form-search', 'style' => 'margin: 10px 0 0 0', 'onsubmit' => 'return Candidate.searchJob(this)'));
    		  echo $this->Form->input(null, array('div' => false, 'label' => false, 'type' => 'text', 'class' => 'input-medium search-query', 'style' => 'width: 415px'));
    		  echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn', 'style' => 'margin-left: 5px'));
		      echo $this->Form->end(); ?>
  	</div>
  	<div class="modal-body" id='job-content'>
  		<?php $modal_data = $jobs;
			  $modal_table = 'job';
			  include '_modal_content.ctp'; ?>
  	</div>
  	<div class="modal-footer">
  		<form class="form-horizontal">
  			<div class="control-group">
  				<label class="control-label" style="width: auto; margin-right: 15px; margin-left: 5px">Novo cargo</label>
  				<div class="controls" style="text-align: left; margin-left: 0">
  					<input id="job-new-input" type="text" class="span5" style="width: 397px" />
  				</div>
  			</div>
  		</form>
  		<button type='button' class="btn btn-primary" onclick='Candidate.addJob()'>Adicionar cargo</button>
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  	</div>
</div>
<?php endif; ?>