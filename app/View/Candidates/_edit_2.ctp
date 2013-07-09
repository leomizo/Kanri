<div class="row-fluid">
	<?php echo $this->Form->create('Candidate', array('class' => 'form-horizontal', 'url' => array('?' => array('step' => 2)))); ?>
		<fieldset>
				<legend>Idiomas</legend>
				<div class="control-group">
					<div class="controls">
						<ul id="language-list">
							<?php foreach($this->request->data['CandidateLanguage'] as $language): ?>
							<li style='margin-bottom: 5px'>
								<strong><?php echo $language['Language']['name'].':'; ?></strong>
								<?php echo $language['level_string']; ?>
								<button type='button' class='btn btn-danger btn-mini btn-micro language-remove-btn' onclick='Candidate.removeCandidateLanguage(this)'>X</button>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="control-group">
					<?php echo $this->Form->label(null, 'Idioma: ', array('div' => false, 'class' => 'control-label')); ?>
					<div class="controls">
						<select id='language-input' onchange='Candidate.selectLanguage(this)'>
							<option>Selecione...</option>
							<?php foreach ($languages as $language_id => $language): ?>
							<option value='<?php echo $language_id; ?>'><?php echo $language; ?></option>
							<?php endforeach; ?>
						</select>
						<?php echo $this->Form->label(null, 'Qual? ', array('div' => false, 'style' => 'display: none; margin-left: 10px; margin-right: 10px', 'id' => 'language-name-label')); ?>
						<input id='language-name-input' class='input-xlarge' style='display: none' type='text' onkeyup='Candidate.checkLanguageData()' /> 
						<input id='language-candidate-input' type='hidden' value='<?php echo $this->request->data['Candidate']['id']; ?>' />   
					</div>
					<div class="control-group-internal-divider"></div>
					<?php echo $this->Form->label(null, 'Nível ', array('div' => false, 'class' => 'control-label')); ?>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="language-level" value="0" label="Básico" checked />Básico
						</label>
						<label class="radio inline">
							<input type="radio" name="language-level" value="1" label="Intermediário" /> Intermediário
						</label>
						<label class="radio inline">
							<input type="radio" name="language-level" value="2" label="Avançado" /> Avançado
						</label>
						<label class="radio inline">
							<input type="radio" name="language-level" value="3" label="Fluente" /> Fluente
						</label>
					</div>
					<br />
					<div class="controls">
						<?php echo $this->Form->button($this->Html->tag('i', '', array('class' => 'icon-plus icon-white')).' Adicionar idioma', array('class' => 'btn btn-primary disabled', 'type' => 'button', 'onclick' => "Candidate.addCandidateLanguage()", 'id' => 'add-language-btn')); ?>
					</div>
					<div id='candidate-language-inputs'>
						<?php foreach($this->request->data['CandidateLanguage'] as $index => $language): ?>
							<input type="hidden" class="language-input language-id-input" name="data[<?php echo $index; ?>][CandidateLanguage][language_id]" value="<?php echo $language['Language']['id']; ?>" index="<?php echo $index; ?>" />
							<input type="hidden" class="language-level-input" name="data[<?php echo $index; ?>][CandidateLanguage][level]" value="<?php echo $language['level']; ?>" index="<?php echo $index; ?>" />
							<input type="hidden" class="language-candidate-input" name="data[<?php echo $index; ?>][CandidateLanguage][candidate_id]" value="<?php echo $language['candidate_id']; ?>" index="<?php echo $index; ?>" />
						<?php endforeach; ?>
					</div>
				</div>
			</fieldset>
		<div class="form-actions" style="padding-left: 20px">
			<?php echo $this->Form->submit('Salvar dados', array('class' => 'btn btn-primary', 'div' => false));
				  echo $this->Html->link('Etapa anterior', array('action' => 'edit', '?' => array('step' => 1), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px'));
				  echo $this->Html->link('Pular etapa', array('action' => 'edit', '?' => array('step' => 3), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px')); 
				  echo $this->Html->link('Visualizar candidato', array('action' => 'show', $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px'));?>
		</div>
	<?php echo $this->Form->end(); ?>
</div>

