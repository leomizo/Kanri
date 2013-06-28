<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li class="active">
					<?php echo $this->Html->link('Visualizar candidatos', '/candidates'); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Busca avançada de candidatos', '/candidates/search'); ?>
				</li>
				<?php if ($visibility == 0 || $visibility == 2): ?>
				<li>
					<?php echo $this->Html->link('Adicionar candidatos', '/candidates/add'); ?>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2><?php echo $candidate['Candidate']['first_name'].' '.$candidate['Candidate']['middle_names'].' '.$candidate['Candidate']['last_name'] ?></h2>
	</div>

	<div class="row-fluid">
		<legend>Dados pessoais</legend>
		<div class="span12" style="padding-left: 20px">
			<dl class="dl-horizontal">
				<dt>Primeiro nome: </dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['first_name']); ?></dd>
				<dt>Outros nomes: </dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['middle_names']); ?></dd>
				<dt>Sobrenome:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['last_name']); ?></dd>
				<br />
				<dt>Sexo:</dd>
				<dd><?php echo avoid_blank($candidate['Candidate']['gender_string']); ?></dd>
				<dt>Estado civil:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['civil_state_string']); ?></dd>
				<br />
				<dt>Naturalidade:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['place_birth']); ?></dd>
				<br />
				<dt>Dependentes:</dt>
				<dd>
					<table style='width: 350px' class='table table-bordered table-striped'>
						<thead>
							<tr>
								<th style='text-align: center'>Idade</th>
								<th style='text-align: center'>Sexo</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($candidate['Dependent'] as $dependent): ?>
							<tr>
								<td style='text-align: center'><?php echo $dependent['age']; ?></td>
								<td style='text-align: center'><?php echo $dependent['gender_string']; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</dd>
				<br />
				<dt>Data de nascimento:</dt>
				<dd><?php echo $candidate['Candidate']['birthdate'].' - '.$candidate['Candidate']['age']; ?></dd>
				<br />
				<dt>Endereço residencial:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['address']); ?></dd>
				<dt>Bairro:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['neighborhood']); ?></dd>
				<dt>CEP ou Zip Code:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['zip_code']); ?></dd>
				<dt>País:</dt>
				<dd><?php echo avoid_blank($candidate['City']['State']['Country']['name']); ?></dd>
				<dt>Estado/Província:</dt>
				<dd><?php echo avoid_blank($candidate['City']['State']['name']); ?></dd>
				<dt>Cidade:</dt>
				<dd><?php echo avoid_blank($candidate['City']['name']); ?></dd>
				<br />
				<dt>Telefone residencial:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['home_phone']); ?></dd>
				<dt>Telefone comercial:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['work_phone']); ?></dd>
				<dt>Telefone celular:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['mobile_phone']); ?></dd>
				<br />
				<dt>E-mail pessoal:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['personal_email']); ?></dd>
				<dt>E-mail comercial:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['work_email']); ?></dd>
				<dt>Nome Skype:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['skype_name']); ?></dd>
			</dl>
		</div>
	</div>

	<div class="row-fluid">
		<legend>Formação acadêmica</legend>
		<div class="span12" style="padding-left: 20px">
			<ul class="experience-list">
				<?php foreach ($candidate['CandidateFormation'] as $formation): ?>
				<li>
					<strong><?php echo $formation['Formation']['name']; ?></strong>
					<br />
					<span><?php echo $formation['institution']; ?></span>
					<br />
					<span><?php echo 'Conclusão em '.$formation['conclusion_year']; ?></span>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div class="row-fluid">
		<legend>Idiomas</legend>
		<div class="span12" style="padding-left: 20px">
			<dl class="dl-horizontal">
				<?php foreach ($candidate['CandidateLanguage'] as $language): ?>
				<dt><?php echo $language['Language']['name'].':'; ?></dt>
				<dd><?php echo $language['level_string']; ?></dt>
				<?php endforeach; ?>
			</dl>
		</div>
	</div>

	<div class="row-fluid">
		<legend>Experiência internacional</legend>
		<div class="span11" style="margin-left: 0;">
			<dl class="dl-horizontal">
				<dd><?php echo $candidate['Candidate']['international_experience']; ?></dd>
			</dl>
		</div>
	</div>

	<div class="row-fluid">
		<legend>Remuneração</legend>
		<div class="span12" style="padding-left: 20px">
			<dl class="dl-horizontal">
				<?php if ($candidate['Candidate']['income_type'] == 0 || $candidate['Candidate']['income_type'] == 2): ?>
				<dt>Salário CLT:</dt>
				<dd><?php echo formatCurrency($candidate['Candidate']['income_clt']); ?></dd>
				<?php endif; ?>
				<?php if ($candidate['Candidate']['income_type'] == 1 || $candidate['Candidate']['income_type'] == 2): ?>
				<dt>Salário PJ:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['income_pj']); ?></dd>
				<?php endif; ?>
				<dt>Bônus</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['income_bonus']); ?></dd>
				<br />
				<dt>Seguro saúde:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['health_insurance_name']); ?></dd>
				<dt>Tipo de acomodação:</dt>
				<dd>
					<?php if ($candidate['Candidate']['health_insurance_name'] != '') echo avoid_blank($candidate['Candidate']['health_insurance_type_string']); else echo '-'; ?>
				</dd>
				<br />
				<dt>Seguro de vida:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['life_insurance_name']); ?></dd>
				<dt>Tipo:</dt>
				<dd>
					<?php if ($candidate['Candidate']['life_insurance_name'] != '') echo avoid_blank($candidate['Candidate']['life_insurance_type_string']); else echo '-'; ?>
				</dd>
				<dt>Cobertura:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['life_insurance_coverage']); ?></dd>
				<br />
				<dt>Seguro odontológico:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['dental_insurance']); ?></dd>
				<dt>Previdência privada:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['private_pension']); ?></dd>
				<br />
				<dt>Vale Refeição:</dt>
				<dd><?php if ($candidate['Candidate']['meal_ticket_value'] != '') echo formatCurrency($candidate['Candidate']['meal_ticket_value']).' '.$candidate['Candidate']['meal_ticket_type_string']; else echo '-'; ?></dd>
				<br />
				<dt>Veículo:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['vehicle_description']); ?></dd>
				<dt>Tipo:</dt>
				<dd><?php if ($candidate['Candidate']['vehicle_description'] != '') echo avoid_blank($candidate['Candidate']['vehicle_type_string']); else echo '-'; ?></dd>
				<br />
				<dt>Vale combustível:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['fuel_voucher']); ?></dd>
				<br />
				<dt>Cesta básica:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['market_basket']); ?></dd>
				<br />
				<dt>Treinamentos:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['training_courses']); ?></dd>
				<br />
				<dt>PLR:</dt>
				<dd><?php echo avoid_blank($candidate['Candidate']['profit_sharing']); ?></dd>
			</dl>
		</div>
	</div>

	<div class="row-fluid">
		<legend>Comentários do consultor</legend>
		<div class="span11" style="margin-left: 0;">
			<dl class="dl-horizontal">
				<dd><?php echo $candidate['Candidate']['comments']; ?></dd>
			</dl>
		</div>
	</div>

	<div class="row-fluid">
		<legend>Experiências profissionais</legend>
		<div class="span12" style="padding-left: 20px">
			<ul class="experience-list">
				<?php foreach ($candidate['Experience'] as $workplace): ?>
				<li>
					<strong>Empresa: <?php echo $workplace[0]['Workplace']['name']; ?></strong>
					<br />
					<span><?php echo 'Empresa '.$workplace[0]['Workplace']['nationality'].' - Segmento '.$workplace[0]['Workplace']['MarketSector']['name']; ?></span>
					<ul>
						<?php foreach ($workplace as $experience): ?>
						<li>
							<strong><?php if ($experience['final_date'] && $experience['final_date'] != '') echo $experience['start_date_string'].' a '.$experience['final_date_string']; else echo $experience['start_date_string']; ?></strong>
							<br />
							<strong><?php echo $experience['Job']['name']; ?></strong>
							<br />
							<?php if ($experience['report'] != ''): ?>
							<span>Reporte: <?php echo $experience['report']; ?></span>
							<br />
							<?php endif; ?>
							<?php if ($experience['team'] != ''): ?>
							<span>Equipe: <?php echo $experience['team']; ?></span>
							<br />
							<?php endif; ?>
						</li>
						<?php endforeach; ?>
					</ul>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<div class="row-fluid">
		<legend>Currículo</legend>
		<?php if (isset($candidate['Curriculum']['name'])): ?>
		<span style="margin-left: 40px">
			<?php echo $this->Html->image('pdficon_large.png');
				  echo $this->Html->link($candidate['Curriculum']['name'], array('action' => 'curriculum', $candidate['Candidate']['id']), array('style' => 'margin-left: 10px')); ?>
		</span>
		<?php endif; ?>
	</div>

	<div class="row-fluid">
		<div class="form-actions">
			<?php if ($visibility == 0 || $visibility == 2) {
				  	  echo $this->Html->link('Editar', array('action' => 'edit', $candidate['Candidate']['id']), array('class' => 'btn btn-primary')); 
				  	  echo $this->Form->postLink('Remover', array('action' => 'delete', $candidate['Candidate']['id']), array('class' => 'btn btn-danger', 'style' => 'margin-left: 5px'), 'Você está certo disso?');
				  }
				  echo $this->Form->button('Voltar', array('type' => 'button', 'class' => 'btn', 'style' => 'margin-left: 5px', 'onclick' => 'parent.history.back()'));
			?>
		</div>
	</div>
</div>