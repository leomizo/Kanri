<?php $this->Html->script('candidate.js', array('inline' => false)); ?>

<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li>
					<?php echo $this->Html->link('Visualizar candidatos', '/candidates'); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Busca avançada de candidatos', '/candidates/search'); ?>
				</li>
				<li class="active">
					<?php echo $this->Html->link('Adicionar candidatos', '/candidates/add'); ?>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Adicionar candidato</h2>
	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create('Candidate', array('class' => 'form-horizontal')); ?>
			<fieldset>
				<legend>Dados pessoais</legend>
				<div class="control-group">
					<?php echo $this->Form->label('first_name', 'Primeiro nome: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('first_name', array('div' => false, 'label' => false)); ?>
					</div>
					<div class="control-group-internal-divider"></div>
					<?php echo $this->Form->label('middle_names', 'Nomes complementares: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('middle_names', array('div' => false, 'label' => false, 'class' => 'input-xxlarge')); ?>
					</div>
					<div class="control-group-internal-divider"></div>
					<?php echo $this->Form->label('last_name', 'Sobrenome: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('last_name', array('div' => false, 'label' => false)); ?>
					</div>
				</div>
				<div class="control-group">
					<?php echo $this->Form->label('gender', 'Sexo: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="data[Candidate][gender]" id="CandidateGenderMale" value="0" checked/>Masculino
						</label>
						<label class="radio inline">
							<input type="radio" name="data[Candidate][gender]" id="CandidateGenderFemale" value="1" />Feminino
						</label>
					</div>
					<div class="control-group-internal-divider"></div>
					<?php echo $this->Form->label('civil_state', 'Estado civil: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class="controls">
						<?php echo $this->Form->input('civil_state', array('options' => array('0' => 'Solteiro', '1' => 'Casado', '2' => 'Divorciado', '3' => 'Viúvo'), 'div' => false, 'label' => false)); ?>
					</div>
				</div>
				<div class="control-group">
					<?php echo $this->Form->label('place_birth', 'Naturalidade: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('place_birth', array('div' => false, 'label' => false)); ?>
					</div>
				</div>
				<div class="control-group">
					<?php echo $this->Form->label('Dependent', 'Dependentes: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class="controls">
						<table class='table table-striped table-bordered' style='width: 350px'>
							<thead>
								<tr>
									<th style='text-align: center'>Sexo</th>
									<th style='text-align: center'>Idade</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
						<?php echo $this->Form->label(null, 'Idade: ', array('div' => false, 'style' => 'display: inline'));
							  echo $this->Form->input(null, array('div' => false, 'label' => false, 'class' => 'input-small', 'style' => 'margin-left: 10px'));
							  echo $this->Form->label(null, 'Sexo: ', array('div' => false, 'style' => 'display: inline; margin-left: 10px'));
							  echo $this->Form->input(null, array('div' => false, 'label' => false, 'options' => array('0' => 'Masculino', '1' => 'Feminino'), 'style' => 'margin-left: 10px'));
						      echo $this->Form->button('Adicionar dependente', array('class' => 'btn btn-primary', 'style' => 'margin-left: 10px')); ?>
					</div>
				</div>
				<div class="control-group">
					<?php echo $this->Form->label('Candidate.birthdate', 'Data de nascimento: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('Candidate.birthdate', array('div' => false, 'label' => false, 'placeholder' => 'dd/MM/yyyy')); ?>
					</div>
				</div>
				<div class="control-group">
					<?php echo $this->Form->label('Candidate.address', 'Endereço residencial: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('Candidate.address', array('div' => false, 'label' => false, 'class' => 'input-xxlarge')); ?>
					</div>
					<div class="control-group-internal-divider"></div>
					<?php echo $this->Form->label('Candidate.neighborhood', 'Bairro: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('Candidate.neighborhood', array('div' => false, 'label' => false)); ?>
					</div>
					<div class="control-group-internal-divider"></div>
					<?php echo $this->Form->label('Candidate.zip_code', 'CEP ou Zip Code: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('Candidate.zip_code', array('div' => false, 'label' => false)); ?>
					</div>
					<div class="control-group-internal-divider"></div>
					<?php echo $this->Form->label('Country.id', 'País: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('Country.id', array('div' => false, 'label' => false, 'options' => $countries, 'empty' => 'Selecione...', 'onchange' => 'Candidate.selectCountry(this)'));
							  echo $this->Form->label('Country.name', 'Qual? ', array('div' => false, 'style' => 'display: none; margin-left: 10px', 'id' => 'country-name-label'));
							  echo $this->Form->input('Country.name', array('div' => false, 'label' => false, 'style' => 'display: none; margin-left: 10px', 'id' => 'country-name-input')); ?>
					</div>
					<div class="control-group-internal-divider" id='state-divider' style='display: none'></div>
					<?php echo $this->Form->label('State.id', 'Estado / Província: ', array('div' => false, 'class' => 'control-label', 'style' => 'display: none', 'id' => 'state-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('State.id', array('div' => false, 'label' => false, 'options' => array(), 'onchange' => 'Candidate.selectState(this)', 'id' => 'state-input', 'style' => 'display: none'));
							  echo $this->Form->label('State.name', 'Qual? ', array('div' => false, 'style' => 'display: none; margin-left: 10px; margin-right: 10px', 'id' => 'state-name-label'));
							  echo $this->Form->input('State.name', array('div' => false, 'label' => false, 'style' => 'display: none', 'id' => 'state-name-input')); ?>
					</div>
					<div class="control-group-internal-divider" id='city-divider' style='display: none'></div>
					<?php echo $this->Form->label('City.id', 'Cidade: ', array('div' => false, 'class' => 'control-label', 'style' => 'display: none', 'id' => 'city-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('City.id', array('div' => false, 'label' => false, 'options' => array(), 'onchange' => 'Candidate.selectCity(this)', 'id' => 'city-input', 'style' => 'display: none'));
							  echo $this->Form->label('City.name', 'Qual? ', array('div' => false, 'style' => 'display: none; margin-left: 10px; margin-right: 10px', 'id' => 'city-name-label'));
							  echo $this->Form->input('City.name', array('div' => false, 'label' => false, 'style' => 'display: none', 'id' => 'city-name-input')); ?>
					</div>
				</div>
				<div class="control-group">
					<?php echo $this->Form->label('Candidate.home_phone', 'Telefone residencial: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('Candidate.home_phone', array('div' => false, 'label' => false)); ?>
					</div>
					<div class="control-group-internal-divider"></div>
					<?php echo $this->Form->label('Candidate.work_phone', 'Telefone comercial: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('Candidate.work_phone', array('div' => false, 'label' => false)); ?>
					</div>
					<div class="control-group-internal-divider"></div>
					<?php echo $this->Form->label('Candidate.mobile_phone', 'Celular: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('Candidate.mobile_phone', array('div' => false, 'label' => false)); ?>
					</div>
				</div>
				<div class="control-group">
					<?php echo $this->Form->label('Candidate.personal_email', 'E-mail pessoal: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('Candidate.personal_email', array('div' => false, 'label' => false)); ?>
					</div>
					<div class="control-group-internal-divider"></div>
					<?php echo $this->Form->label('Candidate.work_email', 'E-mail comercial: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class='controls'>
						<?php echo $this->Form->input('Candidate.work_email', array('div' => false, 'label' => false)); ?>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend>Formação acadêmica</legend>
				<div class="control-group">
					<div class="controls">
						<ul id="formation-list"></ul>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Tipo de formação: </label>
					<div class="controls">
						<div class="input-append">
							<span id="formation-input" class="input-xxlarge uneditable-input"></span>
							<button class="btn" type="button" data-toggle="modal" data-target="#formation-modal"><i class="icon-search"></i></button>
						</div>
					</div>
					<div class="control-group-internal-divider"></div>
					<label class="control-label">Instituição: </label>
					<div class="controls">
						<input id="formation-local-input" type="text" class="span5"/>
					</div>
					<div class="control-group-internal-divider"></div>
					<label class="control-label">Ano de conclusão: </label>
					<div class="controls">
						<input id="formation-year-input" type="text" class="input-small" placeholder="AAAA"/>
					</div>
					<br />
					<div class="controls">
						<a class="btn btn-primary" id="add-formation-btn"><i class="icon-plus icon-white"></i> Adicionar formação</a>
						<a class="btn btn-primary" id="update-formation-btn" style="display: none"><i class="icon-edit icon-white"></i> Atualizar formação</a>
						<a class="btn" id="update-formation-cancel-btn" style="display: none">Cancelar</a>
					</div>

				</div>
			</fieldset>

			<fieldset>
				<legend>Idiomas</legend>
				<div class="control-group">
					<div class="controls">
						<ul id="language-list"></ul>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Idioma </label>
					<div class="controls">
						<select id="language-select">
							<option>Inglês</option>
							<option>Espanhol</option>
							<option>Francês</option>
							<option>Alemão</option>
							<option>Outro...</option>
						</select>
						<input id="language-input" class="input-xlarge" style="display: none" type="text" />
						<a id="language-cancel-btn" class="btn btn-danger" style="display: none">Cancelar</a>
					</div>
					<div class="control-group-internal-divider"></div>
					<label class="control-label">Nível</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="language-level" value="Básico" checked>Básico
						</label>
						<label class="radio inline">
							<input type="radio" name="language-level" value="Intermediário"> Intermediário
						</label>
						<label class="radio inline">
							<input type="radio" name="language-level" value="Avançado"> Avançado
						</label>
						<label class="radio inline">
							<input type="radio" name="language-level" value="Fluente"> Fluente
						</label>
					</div>
					<br />
					<div class="controls">
						<a id="add-language-btn" class="btn btn-primary"><i class="icon-plus icon-white"></i> Adicionar idioma</a>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend>Experiência internacional</legend>
				<div class="control-group">
					<label class="control-label">Experiência internacional</label>
					<div class="controls">
						<textarea rows="5"></textarea>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend>Remuneração</legend>
				<div class="control-group">
					<label class="control-label">Salário (em R$)</label>
					<div class="controls">
						<input type="text" />
						<select class="input-medium" style="margin-left: 15px">
							<option>CLT</option>
							<option>PJ</option>
							<option>CLT e PJ</option>
						</select>
					</div>
					<div class="control-group-internal-divider"></div>
					<label class="control-label">Bônus</label>
					<div class="controls">
						<input type="text" class="input-xlarge" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Seguro de saúde</label>
					<div class="controls">
						<input type="text" class="input-xxlarge" />
					</div>
					<div class="control-group-internal-divider"></div>
					<label class="control-label">Seguro de vida</label>
					<div class="controls">
						<input type="text" class="input-xxlarge" />
					</div>
					<div class="control-group-internal-divider"></div>
					<label class="control-label">Seguro odontológico</label>
					<div class="controls">
						<input type="text" class="input-xxlarge" />
					</div>
					<div class="control-group-internal-divider"></div>
					<label class="control-label">Previdência privada</label>
					<div class="controls">
						<input type="text" class="input-xxlarge" />
					</div>	
				</div>
				<div class="control-group">
					<label class="control-label">Vale refeição (R$ / mês)</label>
					<div class="controls">
						<input type="text" />
					</div>
					<div class="control-group-internal-divider"></div>
					<label class="control-label">Veículo</label>
					<div class="controls">
						<input type="text" />
					</div>	
					<div class="control-group-internal-divider"></div>
					<label class="control-label">Vale combustível</label>
					<div class="controls">
						<input type="text" />
					</div>
					<div class="control-group-internal-divider"></div>
					<label class="control-label">Cesta básica</label>
					<div class="controls">
						<input type="text" />
					</div>		
				</div>
				<div class="control-group">
					<label class="control-label">Treinamentos</label>
					<div class="controls">
						<input type="text" class="input-xxlarge" /> 
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">PLR</label>
					<div class="controls">
						<input type="text" /> 
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend>Comentários do consultor</legend>
				<div class="controls">
					<textarea></textarea>
				</div>
			</fieldset>

			<fieldset>
				<legend>Experiênciais profissionais</legend>
				<div class="control-group">
					<div class="controls">
						<h4>Principais realizações</h4>
						<ul id="experience-list" class="experience-list">
						</ul>
					</div>
				</div>
				<div id="work-local-group" class="control-group">
					<label class="control-label">Local de trabalho</label>
					<div class="controls">
						<div class="input-append">
							<span id="work-local-input" class="input-xxlarge uneditable-input"></span>
							<span id="work-local-nationality-input" style="display: none"></span>
							<span id="work-local-area-input" style="display: none"></span>
							<button class="btn" type="button" data-toggle="modal" data-target="#work-local-modal"><i class="icon-search"></i></button>
						</div>
					</div>
				</div>
				<div id="work-achievement-job-group" class="control-group">
					<label class="control-label">Cargo</label>
					<div class="controls">
						<div class="input-append">
							<span id="work-job-input" class="input-xlarge  uneditable-input" type="text"></span>
							<button class="btn" type="button" data-toggle="modal" data-target="#work-job-modal"><i class="icon-search"></i></button>
						</div>
					</div>
				</div>
				<div id="work-achievement-period-group" class="control-group">
					<label class="control-label">Início:</label>
					<div class="controls">
						<input id="work-achievement-start-input" type="text" placeholder="MM/aaaa" />
					</div>
					<div class="control-group-internal-divider"></div>
					<label class="control-label">Final:</label>
					<div class="controls">
						<input id="work-achievement-end-input" type="text" placeholder="MM/aaaa" />
					</div>
				</div>
				<div id="work-achievement-details-group" class="control-group">
					<label class="control-label">Reporte</label>
					<div class="controls">
						<input id="work-achievement-report-input" type="text" />
					</div>
					<div class="control-group-internal-divider"></div>
					<label class="control-label">Equipe</label>
					<div class="controls">
						<input id="work-achievement-team-input" type="text" />
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<a id="add-experience-btn" class="btn btn-primary"><i class="icon-plus icon-white"></i> Adicionar experiência profissional</a>
						<a id="edit-work-local-btn" class="btn btn-primary" style="display: none"><i class="icon-edit icon-white"></i> Atualizar local de trabalho</a>
						<a id="edit-work-achievement-btn" class="btn btn-primary" style="display: none"><i class="icon-edit icon-white"></i> Atualizar realização</a>
						<a id="edit-work-local-cancel-btn" class="btn" style="display: none">Cancelar</a>
						<a id="edit-work-achievement-cancel-btn" class="btn" style="display: none">Cancelar</a>
					</div>
				</div>
			</fieldset>
			
			<fieldset>
				<legend>Adicionar currículo</legend>
				
			</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>

	<div class="row-fluid">
		<div class="form-actions">
			<button class="btn btn-primary">Adicionar</button>
			<a href="candidate_index.html" class="btn">Voltar</a>
		</div>
	</div>
</div>

<div id="formation-modal" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3>Tipo de Formação</h3>
    	<form class="form-search" style="margin: 10px 0 0 0">
		  	<input type="text" class="input-medium search-query" style="width: 415px">
		  	<button type="submit" class="btn" style="margin-left: 5px">Buscar</button>
		</form>
  	</div>
  	<div class="modal-body">
		<table class="table table-striped">
			<tbody>
				<tr><td><a class="modal-selector" target-input="#formation-input">Graduação em Administração</a></td></tr>
				<tr><td><a class="modal-selector" target-input="#formation-input">Pós-graduação em Contabilidade</a></td></tr>
				<tr><td><a class="modal-selector" target-input="#formation-input">MBA em TI</a></td></tr>
				<tr><td><a class="modal-selector" target-input="#formation-input">Mestrado em Economia</a></td></tr>
			</tbody>
		</table>
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
  		<a id="formation-new-add" class="btn btn-primary">Adicionar formação</a>
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  	</div>
</div>

<div id="work-local-modal" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3>Local de trabalho</h3>
    	<form class="form-search" style="margin: 10px 0 0 0">
		  	<input type="text" class="input-medium search-query" style="width: 415px">
		  	<button type="submit" class="btn" style="margin-left: 5px">Buscar</button>
		</form>
  	</div>
  	<div class="modal-body" style="max-height: 300px">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Empresa</th>
					<th>Nacionalidade</th>
					<th>Segmento</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<a class="modal-selector" target-input="#work-local-input">Philips</a>
					</td>
					<td>Holandesa</td>
					<td>Elétrico/Eletrônico</td>
				</tr>
				<tr>
					<td>
						<a class="modal-selector" target-input="#work-local-input">Honda</a>
					</td>
					<td>Japonesa</td>
					<td>Automobilístico</td>
				</tr>
				<tr>
					<td>
						<a class="modal-selector" target-input="#work-local-input">Banco Safra</a>
					</td>
					<td>Brasileira</td>
					<td>Bancário</td>
				</tr>
				<tr>
					<td>
						<a class="modal-selector" target-input="#work-local-input">Bain & Company</a>
					</td>
					<td>Americana</td>
					<td>Consultoria</td>
				</tr>
			</tbody>
		</table>
  	</div>
  	<div class="modal-footer">
  		<form>
  			<div style="float: left">
					<label style="line-height: 30px; float: left; margin-right: 49px">Empresa</label>
					<input id="work-local-new-input" type="text" style="float: left"/>
				</div>
				<div style="float: left">
					<label style="line-height: 30px; float: left; margin-right: 41px">Segmento</label>
					<select id="work-local-area-select">
						<option>Elétrico/Eletrônico</option>
					<option>Automobilístico</option>
					<option>Bancário</option>
					<option>Telecomunicações</option>
					<option>Consultoria</option>
					<option>Outro...</option>
					</select>
					<div class="input-append" style="float: left; display: none">
						<input id="work-local-new-area-input" type="text" />
						<span id="work-local-area-cancel" class="add-on" style="cursor: pointer">X</span>
					</div>
				</div>
				<div style="float: left">
					<label style="line-height: 30px; float: left; margin-right: 15px">Nacionalidade</label>
					<input id="work-local-new-nationality-input" type="text" style="float: left"/>
				</div>
  		</form>
  		
    	<a id="add-new-work-local" class="btn btn-primary" style="float:left; margin-left: 25px"><i class="icon-plus icon-white"></i> Adicionar novo local</a>
  	</div>
</div>

<div id="work-job-modal" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="static">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3>Cargo</h3>
    	<form class="form-search" style="margin: 10px 0 0 0">
		  	<input type="text" class="input-medium search-query" style="width: 415px">
		  	<button type="submit" class="btn" style="margin-left: 5px">Buscar</button>
		</form>
  	</div>
  	<div class="modal-body">
		<table class="table table-striped">
			<tbody>
				<tr><td><a class="modal-selector" target-input="#work-job-input">Analista</a></td></tr>
				<tr><td><a class="modal-selector" target-input="#work-job-input">Administrador</a></td></tr>
				<tr><td><a class="modal-selector" target-input="#work-job-input">Engenheiro</a></td></tr>
				<tr><td><a class="modal-selector" target-input="#work-job-input">Contador</a></td></tr>
			</tbody>
		</table>
  	</div>
  	<div class="modal-footer">
  		<form class="form-horizontal">
  			<div class="control-group">
  				<label class="control-label" style="width: auto; margin-right: 15px; margin-left: 5px">Novo cargo</label>
  				<div class="controls" style="text-align: left; margin-left: 0">
  					<input id="job-new-input" type="text" class="span5" style="width: 420px" />
  				</div>
  			</div>
  		</form>
  		<a id="job-new-add" class="btn btn-primary">Adicionar cargo</a>
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  	</div>
</div>