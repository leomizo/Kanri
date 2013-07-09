<div class="row-fluid">
	<?php echo $this->Form->create('Candidate', array('class' => 'form-horizontal', 'url' => array('?' => array('step' => 5)))); ?>
		<fieldset>
			<legend>Experiênciais profissionais</legend>
			<div class="control-group">
				<div class="controls">
					<h4>Principais realizações</h4>
					<ul id="experience-list" class="experience-list">
						<?php $index = 0; ?> 
						<?php foreach ($this->request->data['Experience'] as $workplace_id => $workplace): ?>
							<li workplace-id="<?php echo $workplace_id; ?>" workplace-name="<?php echo $workplace[0]['Workplace']['name']; ?>" workplace-nationality="<?php echo $workplace[0]['Workplace']['nationality']; ?>" workplace-market-sector="<?php echo $workplace[0]['Workplace']['MarketSector']['name']; ?>" editing="false">
								<strong>Empresa: <?php echo $workplace[0]['Workplace']['name']; ?></strong>
								<br />
								<span class='workplace-details'><?php echo 'Empresa '.$workplace[0]['Workplace']['nationality'].' - Segmento '.$workplace[0]['Workplace']['MarketSector']['name']; ?></span>
								<br />
								<button class='btn btn-primary btn-mini workplace-edit-btn' onclick='Candidate.editWorkplace(this)' type='button'><i class='icon-edit icon-white'></i></button>
								<button class='btn btn-danger btn-mini workplace-remove-btn' onclick='Candidate.removeWorkplace(this)'><i class='icon-remove icon-white'></i></button>
								<ul class='achievement-list'>
									<?php foreach ($workplace as $experience): ?>
									<li index="<?php echo $index; ?>" experience-job-name="<?php echo $experience['Job']['name']; ?>" experience-job-id="<?php echo $experience['Job']['id']; ?>" experience-start="<?php echo $experience['start_date_edit']; ?>" experience-end="<?php echo $experience['final_date_edit']; ?>" experience-report="<?php echo $experience['report']; ?>" experience-team="<?php echo $experience['team']; ?>" editing="false">
										<strong class='experience-period'><?php if ($experience['final_date'] && $experience['final_date'] != '' && $experience['final_date'] != "0000-00-00") echo $experience['start_date_edit'].' a '.$experience['final_date_edit']; else echo $experience['start_date_edit'].' a atual'; ?></strong>
										<br />
										<strong class='experience-job'><?php echo $experience['Job']['name']; ?></strong>
										<br />
										<span class='experience-report' <?php if ($experience['report'] == '') echo "style='display: none'"; ?>>Reporte: <?php echo $experience['report']; ?></span>
										<br class='experience-report-break' <?php if ($experience['report'] == '') echo "style='display: none'"; ?> />
										<span class='experience-team' <?php if ($experience['team'] == '') echo "style='display: none'"; ?>>Equipe: <?php echo $experience['team']; ?></span>
										<br class='experience-team-break' <?php if ($experience['team'] == '') echo "style='display: none'"; ?> />
										<button type='button' class='btn btn-primary btn-mini experience-edit-btn' onclick='Candidate.editExperience(this)'><i class='icon-edit icon-white'></i>
										</button>
										<button type='button' class='btn btn-danger btn-mini experience-remove-btn' onclick='Candidate.removeExperience(this)'><i class='icon-remove icon-white'></i>
										</button>
										<button type='button' class='btn btn-info btn-mini experience-add-description-btn' onclick='Candidate.addExperienceDescription(this)'>
											Adicionar descrição
										</button>
										<button type='button' class='btn btn-warning btn-mini experience-add-result-btn' onclick='Candidate.addExperienceResult(this)'>
											Adicionar resultado
										</button>
										<br />
										<?php $descriptionIndex = 0; ?>
										<ul class='description-list'>
											<?php foreach ($experience['ExperienceDescription'] as $description): ?>
												<?php if ($description['type'] == 0): ?>
													<li style="margin-top: 5px; margin-bottom: 5px" class="description-item">
														<input type="hidden" name="data[<?php echo $index; ?>][Experience][ExperienceDescription][<?php echo $descriptionIndex; ?>][type]" value="0" />
														<textarea class="span10" name="data[<?php echo $index; ?>][Experience][ExperienceDescription][<?php echo $descriptionIndex; ?>][description]"><?php echo $description['description']; ?></textarea>
														<button type="button" class="btn btn-mini btn-danger" style="margin-left: 5px" onclick="Candidate.removeExperienceDescription(this)"><i class="icon-remove icon-white"></i></button>
													</li>
													<?php $descriptionIndex = $descriptionIndex + 1; ?>
												<?php endif; ?>
											<?php endforeach; ?>
										</ul>
										<?php
											$hasResult = false; 
											foreach ($experience['ExperienceDescription'] as $description) {
												if ($description['type'] == 1) {
													$hasResult = true;
												    break;
												}
											} ?>
										<strong class='result-toggle' <?php if (!$hasResult) echo "style='display: none'"; ?>>Resultados obtidos: </strong>
										<br class='result-toggle' <?php if (!$hasResult) echo "style='display: none'"; ?> />
										<ul class='result-list'>
											<?php foreach ($experience['ExperienceDescription'] as $description): ?>
												<?php if ($description['type'] == 1): ?>
													<li style="margin-top: 5px; margin-bottom: 5px" class="description-item">
														<input type="hidden" name="data[<?php echo $index; ?>][Experience][ExperienceDescription][<?php echo $descriptionIndex; ?>][type]" value="1" />
														<textarea class="span10" name="data[<?php echo $index; ?>][Experience][ExperienceDescription][<?php echo $descriptionIndex; ?>][description]"><?php echo $description['description']; ?></textarea>
														<button type="button" class="btn btn-mini btn-danger" style="margin-left: 5px" onclick="Candidate.removeExperienceDescription(this)"><i class="icon-remove icon-white"></i></button>
													</li>
													<?php $descriptionIndex = $descriptionIndex + 1; ?>
												<?php endif; ?>
											<?php endforeach; ?>	
										</ul>
									</li>
									<?php $index += 1; ?>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div id="workplace-group" class="control-group">
				<input type='hidden' id='experience-candidate-input' value='<?php echo $this->request->data["Candidate"]["id"]; ?>' />
				<?php echo $this->Form->label(null, 'Local de trabalho: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<div class="input-append">
						<?php echo $this->Html->tag('span', '', array('id' => 'workplace-input', 'class' => 'input-xxlarge uneditable-input')); 
							  echo $this->Html->tag('span', '', array('id' => 'workplace-id-input', 'style' => 'display: none')); 
							  echo $this->Html->tag('span', '', array('id' => 'workplace-nationality-input', 'style' => 'display: none')); 
							  echo $this->Html->tag('span', '', array('id' => 'workplace-market-sector-input', 'style' => 'display: none')); ?>
						<button class="btn" type="button" data-toggle="modal" data-target="#workplace-modal"><i class="icon-search"></i></button>
					</div>
				</div>
			</div>
			<div id="job-group" class="control-group">
				<?php echo $this->Form->label(null, 'Cargo: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<div class="input-append">
						<?php echo $this->Html->tag('span', '', array('id' => 'job-name-input', 'class' => 'input-xlarge uneditable-input'));
							  echo $this->Html->tag('input', null, array('id' => 'job-input', 'type' => 'hidden', 'value' => '')); ?>
						<button class="btn" type="button" data-toggle="modal" data-target="#job-modal"><i class="icon-search"></i></button>
					</div>
				</div>
			</div>
			<div id="period-group" class="control-group">
				<?php echo $this->Form->label(null, 'Início: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input(null, array('id' => 'experience-start-input', 'type' => 'text', 'placeholder' => 'MM/aaaa', 'div' => false, 'label' => false, 'name' => false, 'value' => '', 'onkeyup' => "Candidate.checkExperienceData()", 'class' => 'input-small')); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label(null, 'Final: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input(null, array('id' => 'experience-end-input', 'type' => 'text', 'placeholder' => 'MM/aaaa', 'div' => false, 'label' => false, 'name' => false, 'value' => '', 'class' => 'input-small')); ?>
				</div>
			</div>
			<div id="details-group" class="control-group">
				<?php echo $this->Form->label(null, 'Reporte: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input(null, array('id' => 'experience-report-input', 'type' => 'text', 'div' => false, 'label' => false, 'name' => false, 'value' => '', 'class' => 'input-xlarge')); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label(null, 'Equipe: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input(null, array('id' => 'experience-team-input', 'type' => 'text', 'div' => false, 'label' => false, 'name' => false, 'value' => '', 'class' => 'input-xlarge')); ?>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button id="add-experience-btn" class="btn btn-primary disabled" type='button' onclick='Candidate.addExperience()'><i class="icon-plus icon-white"></i> Adicionar experiência profissional</button>
					<button type='button' id="workplace-edit-btn" class="btn btn-primary" style="display: none" onclick="Candidate.updateWorkplace()"><i class="icon-edit icon-white"></i> Atualizar local de trabalho</button>
					<button type='button' id="experience-edit-btn" class="btn btn-primary" style="display: none" onclick="Candidate.updateExperience()"><i class="icon-edit icon-white"></i> Atualizar realização</button>
					<button type='button' id="workplace-cancel-btn" class="btn" style="display: none" onclick='Candidate.cancelWorkplaceEdit()'>Cancelar</button>
					<button type='button' id="experience-cancel-btn" onclick="Candidate.cancelExperienceEdit()" class="btn" style="display: none">Cancelar</button>
				</div>
			</div>
			<div id='experience-inputs' style='display: none'>
				<?php $index = 0; ?>
				<?php foreach ($this->request->data['Experience'] as $workplace_id => $workplace): ?>
					<?php foreach ($workplace as $experience): ?>
						<input class='form-workplace' name='data[<?php echo $index; ?>][Experience][workplace_id]' type='hidden' value='<?php echo $workplace_id; ?>' workplace-id='<?php echo $workplace_id; ?>' index='<?php echo $index; ?>' />
						<input class='form-job' name='data[<?php echo $index; ?>][Experience][job_id]' type='hidden' value='<?php echo $experience["Job"]["id"]; ?>' workplace-id='<?php echo $workplace_id; ?>' index='<?php echo $index; ?>' />
						<input class='form-start' name='data[<?php echo $index; ?>][Experience][start_date]' type='hidden' value='<?php echo $experience["start_date_edit"]; ?>' workplace-id='<?php echo $workplace_id; ?>' index='<?php echo $index; ?>' />
						<input class='form-end' name='data[<?php echo $index; ?>][Experience][final_date]' type='hidden' value='<?php echo $experience["final_date_edit"]; ?>' workplace-id='<?php echo $workplace_id; ?>' index='<?php echo $index; ?>' />
						<input class='form-report' name='data[<?php echo $index; ?>][Experience][report]' type='hidden' value='<?php echo $experience["report"]; ?>' workplace-id='<?php echo $workplace_id; ?>' index='<?php echo $index; ?>' />
						<input class='form-team' name='data[<?php echo $index; ?>][Experience][team]' type='hidden' value='<?php echo $experience["team"]; ?>' workplace-id='<?php echo $workplace_id; ?>' index='<?php echo $index; ?>' />
						<input class='form-candidate' name='data[<?php echo $index; ?>][Experience][candidate_id]' type='hidden' value='<?php echo $experience["candidate_id"]; ?>' workplace-id='<?php echo $workplace_id; ?>' index='<?php echo $index; ?>' />
						<?php $index += 1; ?>
					<?php endforeach; ?>
				<?php endforeach; ?>
			</div>
		</fieldset>
		<div class="form-actions" style="padding-left: 20px">
			<?php echo $this->Form->submit('Salvar dados', array('class' => 'btn btn-primary', 'div' => false));
				  echo $this->Html->link('Etapa anterior', array('action' => 'edit', '?' => array('step' => 4), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px'));
				  echo $this->Html->link('Pular etapa', array('action' => 'edit', '?' => array('step' => 5), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px'));
				  echo $this->Html->link('Visualizar candidato', array('action' => 'show', $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px')); ?>
		</div>
	<?php echo $this->Form->end(); ?>
</div>

