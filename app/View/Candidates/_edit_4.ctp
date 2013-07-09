<div class="row-fluid">
	<?php echo $this->Form->create('Candidate', array('class' => 'form-horizontal', 'url' => array('?' => array('step' => 4)))); ?>
		<fieldset>
			<legend>Remuneração</legend>
			<div class="control-group">
				<?php echo $this->Form->input('Candidate.id', array('type' => 'hidden', 'div' => false, 'label' => 'false')); ?>
				<?php echo $this->Form->label('Candidate.income_type', 'Tipo de salário: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Candidate.income_type', array('div' => false, 'label' => false, 'class' => 'input-medium', 'options' => array('0' => 'CLT', '1' => 'PJ', '2' => 'CLT e PJ'), 'empty' => 'Selecione...', 'onchange' => 'Candidate.selectIncomeType(this)')); ?>
				</div>
				<div class="control-group-internal-divider income-clt-field" style='display: none'></div>
				<?php echo $this->Form->label('Candidate.income_clt', 'Salário CLT (em R$): ', array('div' => false, 'class' => 'control-label income-clt-field', 'style' => 'display: none')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Candidate.income_clt', array('div' => false, 'label' => false, 'style' => 'display: none', 'class' => 'income-clt-field', 'step' => '0.01', 'min' => '0')); ?>
				</div>
				<div class="control-group-internal-divider income-pj-field" style='display: none'></div>
				<?php echo $this->Form->label('Candidate.income_pj', 'Salário PJ (em R$): ', array('div' => false, 'class' => 'control-label income-pj-field', 'style' => 'display: none')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Candidate.income_pj', array('div' => false, 'label' => false, 'style' => 'display: none', 'class' => 'income-pj-field', 'step' => '0.01', 'min' => '0')); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label('Candidate.income_bonus', 'Bônus: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.income_bonus', array('div' => false, 'label' => false, 'class' => 'input-xxlarge')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Candidate.health_insurance_name', 'Seguro de saúde: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.health_insurance_name', array('div' => false, 'label' => false, 'class' => 'input-xxlarge')); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label('Candidate.health_insurance_type', 'Acomodação: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.health_insurance_type', array('div' => false, 'label' => false, 'options' => array('0' => 'Quarto privativo', '1' => 'Quarto coletivo', '2' => 'Enfermaria'), 'empty' => 'Selecione...')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Candidate.life_insurance_name', 'Seguro de vida: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.life_insurance_name', array('div' => false, 'label' => false, 'class' => 'input-xxlarge')); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label('Candidate.life_insurance_coverage', 'Cobertura: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.life_insurance_coverage', array('div' => false, 'label' => false, 'class' => 'input-large'));
						  echo $this->Form->input('Candidate.life_insurance_type', array('div' => false, 'label' => false, 'style' => 'margin-left: 10px', 'options' => array('0' => 'R$', '1' => 'Múltiplo de salário'))); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Candidate.dental_insurance', 'Seguro odontológico: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.dental_insurance', array('div' => false, 'label' => false, 'class' => 'input-xxlarge')); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label('Candidate.private_pension', 'Previdência privada: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.private_pension', array('div' => false, 'label' => false, 'class' => 'input-xxlarge')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Candidate.meal_ticket_value', 'Vale refeição: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Candidate.meal_ticket_type', array('div' => false, 'label' => false, 'options' => array('0' => 'R$/dia', '1' => 'R$/mês', '2' => 'Outro'), 'class' => 'input-small'));
						  echo $this->Form->input('Candidate.meal_ticket_value', array('div' => false, 'label' => false, 'style' => 'margin-left: 10px', 'class' => 'input-xlarge')); ?>	
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label('Candidate.vehicle_description', 'Veículo: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $this->Form->input('Candidate.vehicle_type', array('div' => false, 'label' => false, 'options' => array('0' => 'Veículo', '1' => 'Valor (em R$)')));
						  echo $this->Form->input('Candidate.vehicle_description', array('div' => false, 'label' => false, 'style' => 'margin-left: 10px', 'class' => 'input-xlarge')); ?>	
				</div>	
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label('Candidate.fuel_voucher', 'Vale combustível: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.fuel_voucher', array('div' => false, 'label' => false, 'class' => 'input-xlarge')); ?>
				</div>
				<div class="control-group-internal-divider"></div>
				<?php echo $this->Form->label('Candidate.market_basket', 'Cesta básica: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.market_basket', array('div' => false, 'label' => false, 'class' => 'input-xlarge')); ?>
				</div>	
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Candidate.training_courses', 'Treinamentos: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.training_courses', array('div' => false, 'label' => false, 'class' => 'input-xxlarge')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $this->Form->label('Candidate.profit_sharing', 'PLR: ', array('div' => false, 'class' => 'control-label')); ?>
				<div class='controls'>
					<?php echo $this->Form->input('Candidate.profit_sharing', array('div' => false, 'label' => false, 'class' => 'input-xlarge')); ?>
				</div>
			</div>
			<legend>Outras remunerações</legend>
			<?php foreach ($this->request->data['Remuneration'] as $index => $remuneration): ?>
			<div class='control-group custom-remuneration'>
				<label class='control-label' editing='false'><?php echo $remuneration['type']; ?></label>
				<div class='controls'>
					<input type='hidden' class='remuneration-name-input' name='data[Remuneration][<?php echo $index; ?>][type]' value='<?php echo $remuneration['type']; ?>' />
					<input type='text' class='input-xxlarge remuneration-value-input' name='data[Remuneration][<?php echo $index; ?>][value]' value='<?php echo $remuneration['value']; ?>' />
					<button type='button' class='btn btn-primary btn-mini remuneration-edit-btn' style='margin-left: 6px' onclick='Candidate.editRemuneration(this)'><i class='icon-edit icon-white'></i></button>
					<button type='button' class='btn btn-danger btn-mini remuneration-remove-btn' style='margin-left: 1px' onclick='Candidate.removeRemuneration(this)'><i class='icon-remove icon-white'></i></button>
				</div>
			</div>
			<?php endforeach; ?>
		</fieldset>
		<div class='well form-inline'>
			<label style='margin-left: 10px' id='remuneration-label'>Nova remuneração:</label>
			<input type='text' id='remuneration-name-input' style='margin-left: 18px' class='input-xlarge shakeable' />
			<button type='button' class='btn btn-success' id='add-remuneration-btn' style='margin-left: 10px' onclick='Candidate.addRemuneration()'>
				<i class='icon-plus icon-white'></i>
				Adicionar nova remuneração
			</button>
			<button type='button' class='btn btn-primary' id='update-remuneration-btn' style='margin-left: 10px; display: none' onclick='Candidate.updateRemuneration()'>
				<i class='icon-edit icon-white'></i>
				Atualizar remuneração
			</button>
			<button type='button' class='btn' id='cancel-remuneration-edit-btn' style='margin-left: 10px; display: none' onclick='Candidate.cancelRemunerationEdit()'>
				Cancelar
			</button>
		</div>
		<div class="form-actions" style="padding-left: 20px">
			<?php echo $this->Form->submit('Salvar dados', array('class' => 'btn btn-primary', 'div' => false));
				  echo $this->Html->link('Etapa anterior', array('action' => 'edit', '?' => array('step' => 3), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px'));
				  echo $this->Html->link('Pular etapa', array('action' => 'edit', '?' => array('step' => 5), $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px')); 
				  echo $this->Html->link('Visualizar candidato', array('action' => 'show', $this->request->data['Candidate']['id']), array('class' => 'btn', 'style' => 'margin-left: 10px'));?>
		</div>
	<?php echo $this->Form->end(); ?>
</div>

