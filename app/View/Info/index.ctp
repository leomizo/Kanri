<?php $this->set('bodyAttr', 'data-spy="scroll" data-target=".navbar-fixed-bottom" data-offset="40"'); ?>

<?php $this->Html->script('info.js', array('inline' => false)); ?>

<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li>
					<a href="#info-language">Línguas</a>
				</li>
				<li>
					<a href="#info-market-sector">Segmentos</a>
				</li>
				<li>
					<a href="#info-job">Cargos</a>
				</li>
				<li>
					<a href="#info-formation">Formações</a>
				</li>
				<li>
					<a href="#info-course">Cursos e Especializações</a>
				</li>
				<li>
					<a href="#info-workplace">Locais de trabalho</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<div id="info-language" style="margin: 0 0 43px 0; height: 1px;"></div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Idiomas</h2>
	</div>

	<div class='row-fluid' id='language-message'>

	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create(null, array('class' => 'form-search well'));
			  echo $this->Form->label(null, 'Buscar idioma: ', array('style' => 'margin-right: 10px'));
			  echo $this->Html->tag('input', null, array('class' => 'input-medium search-query', 'type' => 'text', 'id' => 'language-search-input', 'style' => 'margin-right: 10px'));
			  echo $this->Form->button('Buscar', array('class' => 'btn', 'type' => 'button', 'onclick' => 'Info.Language.search()'));
			  echo $this->Form->end(); ?>
	</div>

	<div class="row-fluid" id="language-content">
		<?php include '_languages.ctp'; ?>
	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create('Language', array('class' => 'form-horizontal well', 'onsubmit' => 'return Info.Language.add(this)')); ?>
			<div class='control-group' style='margin-bottom: 0'>
			    <?php echo $this->Form->label('Language', 'Adicionar idioma: ', array('class' => 'control-label', 'style' => 'margin-right: 10px; text-align: left')); ?>
			    <div class='controls' style='margin-left: 0'>
			  		<?php echo $this->Form->input('name', array('class' => 'input-large', 'id' => 'language-add-input', 'style' => 'margin-right: 10px', 'div' => false, 'label' => false));
			  			  echo $this->Form->submit('Adicionar', array('class' => 'btn btn-primary', 'div' => false)); ?>
				</div>  	
			</div>
		<?php echo $this->Form->end(); ?>	
	</div>

</div>

<div id="info-market-sector" style="margin: 0 0 43px 0; height: 1px;"></div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Segmentos</h2>
	</div>

	<div class='row-fluid' id='market-sector-message'>

	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create(null, array('class' => 'form-search well'));
			  echo $this->Form->label(null, 'Buscar segmento: ', array('style' => 'margin-right: 10px'));
			  echo $this->Html->tag('input', null, array('class' => 'input-medium search-query', 'type' => 'text', 'id' => 'market-sector-search-input', 'style' => 'margin-right: 10px'));
			  echo $this->Form->button('Buscar', array('class' => 'btn', 'type' => 'button', 'onclick' => 'Info.MarketSector.search()'));
			  echo $this->Form->end(); ?>
	</div>

	<div class="row-fluid" id='market-sector-content'>
		<?php include '_market_sectors.ctp'; ?>	
	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create('MarketSector', array('class' => 'form-horizontal well', 'onsubmit' => 'return Info.MarketSector.add(this)')); ?>
			<div class='control-group' style='margin-bottom: 0'>
			    <?php echo $this->Form->label('MarketSector', 'Adicionar segmento: ', array('class' => 'control-label', 'style' => 'margin-right: 10px; text-align: left')); ?>
			    <div class='controls' style='margin-left: 0'>
			  		<?php echo $this->Form->input('name', array('class' => 'input-large', 'id' => 'market-sector-add-input', 'style' => 'margin-right: 10px', 'div' => false, 'label' => false));
			  			  echo $this->Form->submit('Adicionar', array('class' => 'btn btn-primary', 'div' => false)); ?>
				</div>  	
			</div>
		<?php echo $this->Form->end(); ?>
	</div>

</div>

<div id="info-job" style="margin: 0 0 43px 0; height: 1px;"></div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Cargos</h2>
	</div>

	<div class='row-fluid' id='job-message'>

	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create(null, array('class' => 'form-search well'));
			  echo $this->Form->label(null, 'Buscar cargo: ', array('style' => 'margin-right: 10px'));
			  echo $this->Html->tag('input', null, array('class' => 'input-medium search-query', 'type' => 'text', 'id' => 'job-search-input', 'style' => 'margin-right: 10px'));
			  echo $this->Form->button('Buscar', array('class' => 'btn', 'type' => 'button', 'onclick' => 'Info.Job.search()'));
			  echo $this->Form->end(); ?>
	</div>

	<div class="row-fluid" id="job-content">
		<?php include '_jobs.ctp'; ?>
	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create('Job', array('class' => 'form-horizontal well', 'onsubmit' => 'return Info.Job.add(this)')); ?>
			<div class='control-group' style='margin-bottom: 0'>
			    <?php echo $this->Form->label('Job', 'Adicionar cargo: ', array('class' => 'control-label', 'style' => 'margin-right: 10px; text-align: left')); ?>
			    <div class='controls' style='margin-left: 0'>
			  		<?php echo $this->Form->input('name', array('class' => 'input-large', 'id' => 'job-add-input', 'style' => 'margin-right: 10px', 'div' => false, 'label' => false));
			  			  echo $this->Form->submit('Adicionar', array('class' => 'btn btn-primary', 'div' => false)); ?>
				</div>  	
			</div>
		<?php echo $this->Form->end(); ?>	
	</div>

</div>

<div id="info-formation" style="margin: 0 0 43px 0; height: 1px;"></div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Formações acadêmicas</h2>
	</div>

	<div class='row-fluid' id='formation-message'>

	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create(null, array('class' => 'form-search well'));
			  echo $this->Form->label(null, 'Buscar formação acadêmica: ', array('style' => 'margin-right: 10px'));
			  echo $this->Html->tag('input', null, array('class' => 'input-medium search-query', 'type' => 'text', 'id' => 'formation-search-input', 'style' => 'margin-right: 10px'));
			  echo $this->Form->button('Buscar', array('class' => 'btn', 'type' => 'button', 'onclick' => 'Info.Formation.search()'));
			  echo $this->Form->end(); ?>
	</div>

	<div class="row-fluid" id="formation-content">
		<?php include '_formations.ctp'; ?>
	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create('Formation', array('class' => 'form-horizontal well', 'onsubmit' => 'return Info.Formation.add(this)')); ?>
			<div class='control-group' style='margin-bottom: 0'>
			    <?php echo $this->Form->label('Formation', 'Adicionar formação acadêmica: ', array('class' => 'control-label', 'style' => 'margin-right: 10px; text-align: left')); ?>
			    <div class='controls' style='margin-left: 0'>
			  		<?php echo $this->Form->input('name', array('class' => 'input-xxlarge', 'id' => 'formation-add-input', 'style' => 'margin-right: 10px', 'div' => false, 'label' => false));
			  			  echo $this->Form->submit('Adicionar', array('class' => 'btn btn-primary', 'div' => false)); ?>
				</div>  	
			</div>
		<?php echo $this->Form->end(); ?>	
	</div>

</div>

<div id="info-course" style="margin: 0 0 43px 0; height: 1px;"></div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Cursos e especializações</h2>
	</div>

	<div class='row-fluid' id='course-message'>

	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create(null, array('class' => 'form-search well'));
			  echo $this->Form->label(null, 'Buscar curso/especialização: ', array('style' => 'margin-right: 10px'));
			  echo $this->Html->tag('input', null, array('class' => 'input-medium search-query', 'type' => 'text', 'id' => 'course-search-input', 'style' => 'margin-right: 10px'));
			  echo $this->Form->button('Buscar', array('class' => 'btn', 'type' => 'button', 'onclick' => 'Info.Course.search()'));
			  echo $this->Form->end(); ?>
	</div>

	<div class="row-fluid" id="course-content">
		<?php include '_courses.ctp'; ?>
	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create('Course', array('class' => 'form-horizontal well', 'onsubmit' => 'return Info.Course.add(this)')); ?>
			<div class='control-group' style='margin-bottom: 0'>
			    <?php echo $this->Form->label('Course', 'Adicionar curso/especialização: ', array('class' => 'control-label', 'style' => 'margin-right: 10px; text-align: left')); ?>
			    <div class='controls' style='margin-left: 0'>
			  		<?php echo $this->Form->input('name', array('class' => 'input-xxlarge', 'id' => 'course-add-input', 'style' => 'margin-right: 10px', 'div' => false, 'label' => false));
			  			  echo $this->Form->submit('Adicionar', array('class' => 'btn btn-primary', 'div' => false)); ?>
				</div>  	
			</div>
		<?php echo $this->Form->end(); ?>	
	</div>

</div>

<div id="info-workplace" style="margin: 0 0 43px 0; height: 1px;"></div>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2>Locais de trabalho</h2>
	</div>

	<div class='row-fluid' id='workplace-message'>

	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create(null, array('class' => 'form-search well'));
			  echo $this->Form->label(null, 'Buscar local de trabalho: ', array('style' => 'margin-right: 10px'));
			  echo $this->Html->tag('input', null, array('class' => 'input-medium search-query', 'type' => 'text', 'id' => 'workplace-search-input', 'style' => 'margin-right: 10px'));
			  echo $this->Form->label(null, 'Ordenar por: ', array('style' => 'margin-right: 10px'));
			  echo $this->Form->input(null, array('options' => array('name' => 'Nome', 'MarketSector.name' => 'Segmento', 'nationality' => 'Nacionalidade'), 'div' => false, 'label' => false, 'multiple' => false, 'style' => 'margin-right: 10px', 'id' => 'workplace-sort-input'));
			  echo $this->Form->button('Buscar', array('class' => 'btn', 'type' => 'button', 'onclick' => 'Info.Workplace.search()'));
			  echo $this->Form->end(); ?>
	</div>

	<div class="row-fluid" id="workplace-content">
		<?php include '_workplaces.ctp'; ?>
	</div>

	<div class="row-fluid">
		<?php echo $this->Form->create('Workplace', array('class' => 'form-horizontal well', 'onsubmit' => 'return Info.Workplace.add(this)', 'autocomplete' => 'off', 'style' => 'padding-bottom: 0')); ?>
			<div class='control-group'>
			    <?php echo $this->Form->label('name', 'Nome: ', array('class' => 'control-label')); ?>
			    <div class='controls'>
			  		<?php echo $this->Form->input('name', array('class' => 'input-xlarge', 'id' => 'workplace-name-input', 'style' => 'margin-right: 10px', 'div' => false, 'label' => false)); ?>
				</div>  	
			</div>
			<div class='control-group'>
			    <?php echo $this->Form->label('MarketSector.name', 'Segmento: ', array('class' => 'control-label')); ?>
			    <div class='controls'>
			    	<?php echo $this->Form->input('MarketSector.id', array('class' => 'input-large', 'id' => 'workplace-market-sector-input', 'style' => 'margin-right: 10px', 'div' => false, 'label' => false, 'options' => $workplace_market_sectors, 'onchange' => 'Info.Workplace.addNewMarketSector()')); ?>
			  		<?php echo $this->Form->label('MarketSector.name', 'Qual?', array('id' => 'workplace-market-sector-name-label', 'style' => 'display: none; margin-right: 10px'));
			  			  echo $this->Form->input('MarketSector.name', array('class' => 'input-large', 'id' => 'workplace-market-sector-name-input', 'style' => 'margin-right: 10px; display: none', 'div' => false, 'label' => false)); ?>
				</div>  	
			</div>
			<div class='control-group'>
			    <?php echo $this->Form->label('nationality', 'Nacionalidade: ', array('class' => 'control-label')); ?>
			    <div class='controls'>
			  		<?php echo $this->Form->input('nationality', array('class' => 'input-large', 'id' => 'workplace-nationality-input', 'style' => 'margin-right: 10px', 'div' => false, 'label' => false)); ?>
				</div>  	
			</div>
			<div class='control-group'>
				<div class='controls'>
					<?php echo $this->Form->submit('Adicionar local de trabalho', array('class' => 'btn btn-primary')); ?>
				</div>
			</div>
		<?php echo $this->Form->end(); ?>	
	</div>
</div>

<script type="text/javascript">
	$(function(){Info.Workplace.addNewMarketSector()});
</script>
