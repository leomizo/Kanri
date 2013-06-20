<?php $this->Html->script('candidate.js', array('inline' => false)); ?>

<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li>
					<a href="candidate_index.html">Visualizar candidatos</a>
				</li>
				<li class="active">
					<a href="candidate_search.html">Busca avançada de candidatos</a>
				</li>
				<li>
					<a href="candidate_add.html">Adicionar candidato</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Busca avançada de candidatos</h2>
	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create(null, array('class' => 'form-horizontal')); ?>
			<fieldset class="control-group">
				<legend>Filtro por nomes</legend>
				<label class="control-label">Nomes</label>
				<div class="controls">
					<input name="data[name]" type="text" />
				</div>
			</fieldset>

			<fieldset class="control-group">
				<legend>Filtro por cargo</legend>
				<label class="control-label">Cargo</label>
				<div class="controls">
					<div class="input-append">
						<span id="job-name-input" class="input-xlarge  uneditable-input" type="text"></span>
						<input type='hidden' name='data[job]' id="job-input" />
						<button class="btn" type="button" data-toggle="modal" data-target="#job-modal"><i class="icon-search"></i></button>
					</div>
				</div>
			</fieldset>

			<fieldset class="control-group">
				<legend>Filtro por local de trabalho</legend>
				<div class="pull-left" style="margin-right: 10px;">
					<label class="control-label">Nacionalidade da empresa</label>
					<div class="controls">
						<input name="data[nationality]" type="text" />
					</div>
				</div>
				<div class="pull-left">
					<label class="control-label">Segmento da empresa</label>
					<div class="controls">
						<?php echo $this->Form->input(null, array('div' => false, 'label' => false, 'options' => $market_sectors, 'empty' => 'Todos', 'name' => 'data[market_sector]')); ?>
					</div>
				</div>
			</fieldset>

			<fieldset class="control-group">
				<legend>Filtro por local de residência</legend>
				<div class="controls">
					<h4>Locais selecionados:</h4>
					<ul id="location-list"></ul>	
				</div>
				<div id="country-select" class="controls" style="margin-left: 0; margin-top: 20px">
					<label class="control-label">País</label>
					<div class="controls">
						<?php echo $this->Form->input(null, array('div' => false, 'label' => false, 'options' => $countries, 'empty' => 'Todos', 'onchange' => 'Candidate.selectSearchCountry()', 'name' => false)); ?>
					</div>
				</div>
				<div id="state-select" class="controls" style="margin-left: 0; margin-top: 20px; display: none">
					<label class="control-label">Estado / Província</label>
					<div class="controls">
						<?php echo $this->Form->input(null, array('div' => false, 'label' => false, 'options' => array(), 'empty' => 'Todos', 'onchange' => 'Candidate.selectSearchState()', 'name' => false)); ?>
					</div>
				</div>
				<div id="city-select" class="controls" style="margin-left: 0; margin-top: 20px; display: none">
					<label class="control-label">Cidade</label>
					<div class="controls">
						<?php echo $this->Form->input(null, array('div' => false, 'label' => false, 'options' => array(), 'empty' => 'Todos', 'name' => false)); ?>
					</div>
				</div>
				<br />
				<div class="controls">
					<button type='button' class="btn btn-primary disabled" id='add-location-btn' onclick="Candidate.addSearchLocation(this)"><i class="icon-plus icon-white"></i> Adicionar local</button>
					<button type='button' class="btn btn-danger" onclick="Candidate.removeAllSearchLocations()"><i class="icon-remove icon-white"></i> Remover todos os locais</button>
				</div>
				<div id='location-inputs'></div>
			</fieldset>

			<fieldset class="control-group">
				<legend>Filtro por faixa etária</legend>
				<label class="control-label">Faixa etária</label>
				<div class="controls">
					<?php echo $this->Form->select('age', array("0" => "Até 29 anos", "1" => "De 30 a 39 anos", "2" => "De 40 a 49 anos", "3" => "50 anos ou mais"), array('div' => false, 'label' => false, 'multiple' => true)); ?>
				</div>
			</fieldset>

			<fieldset class="control-group">
				<legend>Filtro por sexo</legend>
				<label class="control-label">Sexo</label>
				<div class="controls">
					<label class="checkbox inline">
					  	<input name='data[gender_male]' type="checkbox" value="true" checked /> Masculino
					</label>
					<label class="checkbox inline">
					  	<input name='data[gender_female]' type="checkbox" value="true" checked /> Feminino
					</label>
				</div>
			</fieldset>

			<fieldset class="control-group">
				<legend>Filtro por idioma</legend>
				<div class="controls">
					<table style="width: 680px" id="language-table" class="table table-striped table-bordered" languages='<?php echo $languages; ?>'>
						<thead>
							<tr>
								<th>Idioma</th>
								<th>Nível mínimo</th>
								<th></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
					<button type='button' class="btn btn-primary" onclick='Candidate.addSearchLanguage()'><i class="icon-plus icon-white"></i> Adicionar idioma</button>
				</div>
				<div class='language-inputs'></div>
			</fieldset>

			<fieldset class="control-group">
				<legend>Filtro por salário</legend>
				<label class="control-label">Limite máximo de salário (em R$)</label>
				<div class="controls">
					<input class="currency-input" type="text" value="0.00" name='data[income]' />
					<span style="margin-left: 20px;">(sem limite = 0.00)</span>
				</div>
			</fieldset>

			<fieldset class="control-group">
				<legend>Filtro por formação</legend>
				<label class="control-label">Formação</label>
				<div class="controls">
					<div class="input-append">
						<span id="formation-name-input" class="input-xxlarge uneditable-input"></span>
						<input type='hidden' name='data[formation]' id='formation-input' />
						<button class="btn" type="button" data-toggle="modal" data-target="#formation-modal"><i class="icon-search"></i></button>
					</div>
				</div>
			</fieldset>

			<fieldset class="control-group">
				<legend>Filtro por informação adicional</legend>
				<label class="control-label">Informação adicional</label>
				<div class="controls">
					<input name='data[additional]' type="text" />
					<span style="margin-left: 20px;">Exemplos: CRC ativo, OAB, etc...</span>
				</div>
			</fieldset>

			<div class="form-actions" style="padding-left: 20px">
				<?php echo $this->Form->submit('Buscar', array('div' => false, 'class' => 'btn btn-primary'));
					  echo $this->Html->link('Voltar', array('action' => 'index'), array('class' => 'btn', 'style' => 'margin-left: 10px')) ?>
			</div>

		<?php echo $this->Form->end(); ?>
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
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  	</div>
</div>

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
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  	</div>
</div>