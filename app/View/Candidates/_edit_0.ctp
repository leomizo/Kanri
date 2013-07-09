<div class="row-fluid">
	<?php echo $this->Form->create('Candidate', array('class' => 'form-horizontal', 'url' => array('?' => array('step' => 0)))); ?>
		<fieldset>
			<legend>Dados pessoais</legend>
			<div class="control-group">
				<?php echo $this->Form->label('Candidate.first_name', '* Primeiro nome: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.first_name', array('div' => false, 'label' => false, 'required' => 'required')); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label('Candidate.middle_names', 'Nomes complementares: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.middle_names', array('div' => false, 'label' => false, 'class' => 'input-xxlarge')); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label('Candidate.last_name', '* Sobrenome: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.last_name', array('div' => false, 'label' => false, 'required' => 'required')); ?>
				</div>
				<?php echo $this->Form->input('Candidate.id', array('div' => false, 'label' => false, 'type' => 'hidden')); ?>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Candidate.gender', 'Sexo: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<label class="radio inline">
						<input type="radio" name="data[Candidate][gender]" id="CandidateGenderMale" value="0" <?php if ($this->request->data['Candidate']['gender'] == 0) echo 'checked'; ?> />Masculino
					</label>
					<label class="radio inline">
						<input type="radio" name="data[Candidate][gender]" id="CandidateGenderFemale" value="1" <?php if ($this->request->data['Candidate']['gender'] == 1) echo 'checked'; ?> />Feminino
					</label>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label('Candidate.civil_state', 'Estado civil: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Candidate.civil_state', array('options' => array('0' => 'Solteiro', '1' => 'Casado', '2' => 'Divorciado', '3' => 'Viúvo'), 'div' => false, 'label' => false)); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Candidate.place_birth', 'Naturalidade: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.place_birth', array('div' => false, 'label' => false)); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label(null, 'Dependentes: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<table class='table table-striped table-bordered' style='width: 350px'>
						<thead>
							<tr>
								<th style='text-align: center'>Idade</th>
								<th style='text-align: center'>Sexo</th>
								<th style='width: 28px'></th>
							</tr>
						</thead>
						<tbody id='dependent-table'>
							<?php foreach ($this->request->data['Dependent'] as $dependent): ?>
							<tr>
								<td style="text-align: center">
									<?php echo $dependent['age']; ?>
								</td>
								<td style="text-align: center">
									<?php echo $dependent['gender_string']; ?>
								</td>
								<td>
									<button type="button" class="btn btn-mini btn-danger" onclick="Candidate.removeDependent(this)"><i class="icon-remove icon-white"></i></button>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<?php echo $this->Form->label(null, 'Idade: ', array('div' => false, 'style' => 'display: inline'));
						  echo $this->Form->input(null, array('div' => false, 'label' => false, 'class' => 'input-small shakeable', 'style' => 'margin-left: 10px', 'id' => 'dependent-age-input', 'name' => false, 'value' => '', 'onkeyup' => 'Candidate.checkDependentData()'));
						  echo $this->Form->label(null, 'Sexo: ', array('div' => false, 'style' => 'display: inline; margin-left: 10px'));
						  echo $this->Form->input(null, array('div' => false, 'label' => false, 'options' => array('0' => 'Masculino', '1' => 'Feminino'), 'style' => 'margin-left: 10px', 'id' => 'dependent-gender-input', 'name' => false));
					      echo $this->Form->button('Adicionar dependente', array('class' => 'btn btn-primary', 'style' => 'margin-left: 10px', 'onclick' => 'Candidate.addDependent()', 'type' => 'button')); ?>
					<div id='dependent-inputs' style='display: none'>
						<?php foreach ($this->request->data['Dependent'] as $index => $dependent): ?>
							<input class="candidate-dependent-age" type="hidden" name="data[Dependent][<?php echo $index; ?>][age]" value="<?php echo $dependent['age']; ?>" index="<?php echo $index; ?>" />
							<input class="candidate-dependent-gender" type="hidden" name="data[Dependent][<?php echo $index; ?>][gender]" value="<?php echo $dependent['gender']; ?>" index="<?php echo $index; ?>" />
						<?php endforeach; ?>	
					</div>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Candidate.birthdate', '* Data de nascimento: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.birthdate', array('div' => false, 'label' => false, 'placeholder' => 'dd/MM/yyyy', 'type' => 'text', 'required' => 'required')); ?>
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
				<?php echo $this->Form->label('City.State.Country.id', '* País: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('City.State.Country.id', array('div' => false, 'label' => false, 'options' => $countries, 'empty' => 'Selecione...', 'onchange' => 'Candidate.selectCountry(this)', 'required' => 'required'));
						  echo $this->Form->label('City.State.Country.name', 'Qual? ', array('div' => false, 'style' => 'display: none; margin-left: 10px', 'id' => 'country-name-label'));
						  echo $this->Form->input('City.State.Country.name', array('div' => false, 'label' => false, 'style' => 'display: none; margin-left: 10px', 'id' => 'country-name-input')); ?>
				</div>
				<div class="control-group-internal-divider" id='state-divider'></div>
				<?php echo $this->Form->label('City.State.id', '* Estado / Província: ', array('div' => false, 'class' => 'control-label', 'id' => 'state-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('City.State.id', array('div' => false, 'label' => false, 'options' => $states, 'empty' => 'Selecione...', 'onchange' => 'Candidate.selectState(this)', 'id' => 'state-input', 'required' => 'required'));
						  echo $this->Form->label('City.State.name', 'Qual? ', array('div' => false, 'style' => 'display: none; margin-left: 10px; margin-right: 10px', 'id' => 'state-name-label'));
						  echo $this->Form->input('City.State.name', array('div' => false, 'label' => false, 'style' => 'display: none', 'id' => 'state-name-input')); ?>
				</div>
				<div class="control-group-internal-divider" id='city-divider'></div>
				<?php echo $this->Form->label('City.id', '* Cidade: ', array('div' => false, 'class' => 'control-label', 'id' => 'city-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('City.id', array('div' => false, 'label' => false, 'options' => $cities, 'empty' => 'Selecione...', 'onchange' => 'Candidate.selectCity(this)', 'id' => 'city-input', 'required' => 'required'));
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
				<?php echo $this->Form->label('Candidate.personal_email', '* E-mail pessoal: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.personal_email', array('div' => false, 'label' => false, 'required' => 'required')); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label('Candidate.work_email', 'E-mail comercial: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.work_email', array('div' => false, 'label' => false)); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label('Candidate.skype_name', 'Nome Skype: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.skype_name', array('div' => false, 'label' => false)); ?>
				</div>
			</div>
		</fieldset>
		<div class="form-actions" style="padding-left: 20px">
			<?php echo $this->Form->submit('Salvar dados', array('class' => 'btn btn-primary', 'div' => false));
				  echo $this->Html->link('Pular etapa', array('action' => 'edit', '?' => array('step' => 1), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px')); 
				  echo $this->Html->link('Visualizar candidato', array('action' => 'show', $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px')); ?>
		</div>
	<?php $this->Form->end(); ?>
</div>

