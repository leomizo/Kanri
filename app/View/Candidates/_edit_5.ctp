<div class="row-fluid">
	<?php echo $this->Form->create('Candidate', array('class' => 'form-horizontal', 'url' => array('?' => array('step' => 5)))); ?>
		<fieldset>
			<legend>Experiênciais profissionais</legend>
			<div class="control-group">
				<div class="controls">
					<h4>Principais realizações</h4>
					<ul id="experience-list" class="experience-list">
					</ul>
				</div>
			</div>
			<div id="workplace-group" class="control-group">
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
							  echo $this->Html->tag('input', null, array('id' => 'job-input', 'type' => 'hidden')); ?>
						<button class="btn" type="button" data-toggle="modal" data-target="#job-modal"><i class="icon-search"></i></button>
					</div>
				</div>
			</div>
			<div id="period-group" class="control-group">
				<?php echo $this->Form->label(null, 'Início: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input(null, array('id' => 'experience-start-input', 'type' => 'text', 'placeholder' => 'MM/aaaa', 'div' => false, 'label' => false, 'name' => false, 'onkeyup' => "Candidate.checkExperienceData()")); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label(null, 'Final: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input(null, array('id' => 'experience-end-input', 'type' => 'text', 'placeholder' => 'MM/aaaa', 'div' => false, 'label' => false, 'name' => false)); ?>
				</div>
			</div>
			<div id="details-group" class="control-group">
				<?php echo $this->Form->label(null, 'Reporte: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input(null, array('id' => 'experience-report-input', 'type' => 'text', 'div' => false, 'label' => false, 'name' => false)); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label(null, 'Equipe: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input(null, array('id' => 'experience-team-input', 'type' => 'text', 'div' => false, 'label' => false, 'name' => false)); ?>
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
			<div id='experience-inputs' style='display: none'></div>
		</fieldset>
		<div class="form-actions" style="padding-left: 20px">
			<?php echo $this->Form->submit('Salvar dados', array('class' => 'btn btn-primary', 'div' => false));
				  echo $this->Html->link('Etapa anterior', array('action' => 'new_edit', '?' => array('step' => 4), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px'));
				  echo $this->Html->link('Pular etapa', array('action' => 'new_edit', '?' => array('step' => 5), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px')); ?>
		</div>
	<?php echo $this->Form->end(); ?>
</div>

