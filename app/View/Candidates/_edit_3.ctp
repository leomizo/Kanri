<div class="row-fluid">
	<?php echo $this->Form->create('Candidate', array('class' => 'form-horizontal', 'url' => array('?' => array('step' => 3)))); ?>
		<fieldset>
			<legend>Cursos e especializações</legend>
			<div class="control-group">
				<div class="controls">
					<ul id="course-list">
						<?php foreach ($this->request->data['CandidateCourse'] as $course): ?>
						<li style='margin-bottom: 10px' editing='false'>
							<strong>
								<span class='course-name'>
									<?php echo $course['Course']['name']; ?>
								</span>
							</strong>
							<br />
							<span class='course-institution'>
								<?php echo $course['institution']; ?>
							</span>
							<br />
							Conclusão em: 
							<span class='course-year'>
								<?php echo $course['conclusion_year']; ?>
							</span>
							<br />
							<button type='button' class='btn btn-primary btn-mini course-edit-btn' style='margin-top: 5px' onclick='Candidate.editCandidateCourse(this)'><i class='icon-edit icon-white'></i>
							</button>
							<button class='btn btn-danger btn-mini course-remove-btn' type='button' onclick='Candidate.removeCandidateCourse(this)' style='margin-top: 5px'><i class='icon-remove icon-white'></i></button>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('CandidateCourse', 'Curso / Especialização: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<div class="input-append">
						<span id="course-name-input" class="input-xxlarge uneditable-input"></span>
						<button class="btn" type="button" data-toggle="modal" data-target="#course-modal"><i class="icon-search"></i></button>
					</div>
					<input type='hidden' id='course-input' />
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label(null, 'Instituição: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<input type='text' class='input-xxlarge' id='course-institution-input' onkeyup ='Candidate.checkCourseData()' />
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label(null, 'Ano de conclusão: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<input type='text' class='input-small' id='course-year-input' onkeyup ='Candidate.checkCourseData()' placeholder='AAAA' />
				</div>
				<input type='hidden' id='course-candidate-input' value='<?php echo $this->request->data["Candidate"]["id"]; ?>' />
				<br />
				<div class="controls">
					<button type='button' class="btn btn-primary disabled" id="add-course-btn" onclick='Candidate.addCandidateCourse()'><i class="icon-plus icon-white"></i> Adicionar curso / especialização</button>
					<button type='button' class="btn btn-primary" id="update-course-btn" style="display: none" onclick="Candidate.updateCandidateCourse()"><i class="icon-edit icon-white"></i> Atualizar curso / especialização</a>
					<button type='button' class="btn" id="update-course-cancel-btn" style="display: none; margin-left: 10px" onclick="Candidate.cancelEditCandidateCourse()">Cancelar</a>
				</div>
				<div id='candidate-course-inputs'>
					<?php foreach ($this->request->data['CandidateCourse'] as $index => $course): ?>
					<input type="hidden" name="data[<?php echo $index; ?>][CandidateCourse][course_id]" class="course-id-input" value="<?php echo $course['Course']['id']; ?>" index="<?php echo $index; ?>" />
					<input type="hidden" name="data[<?php echo $index; ?>][CandidateCourse][institution]" class="course-institution-input" value="<?php echo $course['institution']; ?>" index="<?php echo $index; ?>" />
					<input type="hidden" name="data[<?php echo $index; ?>][CandidateCourse][conclusion_year]" class="course-year-input" value="<?php echo $course['conclusion_year']; ?>" index="<?php echo $index; ?>" />
					<input type="hidden" name="data[<?php echo $index; ?>][CandidateCourse][candidate_id]" class="course-candidate-input" value="<?php echo $course['candidate_id']; ?>" index="<?php echo $index; ?>" />
					<?php endforeach; ?>
				</div>
			</div>
		</fieldset>
		<div class="form-actions" style="padding-left: 20px">
			<?php echo $this->Form->submit('Salvar dados', array('class' => 'btn btn-primary', 'div' => false));
				  echo $this->Html->link('Etapa anterior', array('action' => 'new_edit', '?' => array('step' => 2), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px'));
				  echo $this->Html->link('Pular etapa', array('action' => 'new_edit', '?' => array('step' => 4), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px')); 
				  echo $this->Html->link('Visualizar candidato', array('action' => 'show', $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px'));?>
		</div>
	<?php echo $this->Form->end(); ?>
</div>

