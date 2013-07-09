<div class="row-fluid">
	<?php echo $this->Form->create('Candidate', array('class' => 'form-horizontal', 'url' => array('?' => array('step' => 1)))); ?>
		<fieldset>
			<legend>Formação acadêmica</legend>
			<div class="control-group">
				<div class="controls">
					<ul id="formation-list">
						<?php foreach ($this->request->data['CandidateFormation'] as $formation): ?>
						<li style='margin-bottom: 10px' editing='false'>
							<strong>
								<span class='formation-name'>
									<?php echo $formation['Formation']['name']; ?>
								</span>
							</strong>
							<br />
							<span class='formation-institution'>
								<?php echo $formation['institution']; ?>
							</span>
							<br />
							Conclusão em: 
							<span class='formation-year'>
								<?php echo $formation['conclusion_year']; ?>
							</span>
							<br />
							<button type='button' class='btn btn-primary btn-mini formation-edit-btn' style='margin-top: 5px' onclick='Candidate.editCandidateFormation(this)'><i class='icon-edit icon-white'></i>
							</button>
							<button class='btn btn-danger btn-mini formation-remove-btn' type='button' onclick='Candidate.removeCandidateFormation(this)' style='margin-top: 5px'><i class='icon-remove icon-white'></i>
							</button>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label(null, 'Tipo de formação: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<div class="input-append">
						<span id="formation-name-input" class="input-xxlarge uneditable-input"></span>
						<button class="btn" type="button" data-toggle="modal" data-target="#formation-modal"><i class="icon-search"></i></button>
					</div>
					<input type='hidden' id='formation-input' />
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label(null, 'Instituição: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<input type='text' class='input-xxlarge' id='formation-institution-input' onkeyup ='Candidate.checkFormationData()' />
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label(null, 'Ano de conclusão: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<input type='text' class='input-small' id='formation-year-input' onkeyup ='Candidate.checkFormationData()' placeholder='AAAA' />
				</div>
				<input type='hidden' id='formation-candidate-input' value='<?php echo $this->request->data["Candidate"]["id"]; ?>' />
				<br />
				<div class="controls">
					<button type='button' class="btn btn-primary disabled" id="add-formation-btn" onclick='Candidate.addCandidateFormation()'><i class="icon-plus icon-white"></i> Adicionar formação</button>
					<button type='button' class="btn btn-primary" id="update-formation-btn" style="display: none" onclick="Candidate.updateCandidateFormation()"><i class="icon-edit icon-white"></i> Atualizar formação</a>
					<button type='button' class="btn" id="update-formation-cancel-btn" style="display: none; margin-left: 10px" onclick="Candidate.cancelEditCandidateFormation()">Cancelar</a>
				</div>
			</div>
			<div id='candidate-formation-inputs'>
				<?php foreach ($this->request->data['CandidateFormation'] as $index => $formation): ?>
					<input type="hidden" name="data[<?php echo $index; ?>][CandidateFormation][formation_id]" class="formation-id-input" value="<?php echo $formation['Formation']['id']; ?>" index="<?php echo $index; ?>" />
					<input type="hidden" name="data[<?php echo $index; ?>][CandidateFormation][institution]" class="formation-institution-input" value="<?php echo $formation['institution']; ?>" index="<?php echo $index; ?>" />
					<input type="hidden" name="data[<?php echo $index; ?>][CandidateFormation][conclusion_year]" class="formation-year-input" value="<?php echo $formation['conclusion_year']; ?>" index="<?php echo $index; ?>" />
					<input type="hidden" name="data[<?php echo $index; ?>][CandidateFormation][candidate_id]" class="formation-candidate-input" value="<?php echo $formation['candidate_id']; ?>" index="<?php echo $index; ?>" />
				<?php endforeach; ?>
			</div>
		</fieldset>
		<div class="form-actions" style="padding-left: 20px">
			<?php echo $this->Form->submit('Salvar dados', array('class' => 'btn btn-primary', 'div' => false));
				  echo $this->Html->link('Etapa anterior', array('action' => 'new_edit', '?' => array('step' => 0), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px'));
				  echo $this->Html->link('Pular etapa', array('action' => 'new_edit', '?' => array('step' => 2), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px')); 
				  echo $this->Html->link('Visualizar candidato', array('action' => 'show', $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px'));?>
		</div>
	<?php echo $this->Form->end(); ?>
</div>

