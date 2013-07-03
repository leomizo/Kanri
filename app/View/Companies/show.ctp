<?php if ($visibility == 0 || $visibility == 2): ?>
<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<ul id="context-options" class="nav">
				<li class="active">
					<?php echo $this->Html->link('Visualizar empresas', '/companies'); ?>
				</li>
				<li>
					<?php echo $this->Html->link('Adicionar empresa', '/companies/add'); ?>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php endif; ?>

<div class="content-block container-fluid">

	<div class="row-fluid content-title">
		<h2><?php echo $company['Company']['name']; ?></h2>
	</div>

	<div class="row-fluid">
		<div class="span12" style="padding-left: 20px">
			<dl class="dl-horizontal">
				<dt>Contato:</dt>
				<dd><?php echo $company['Company']['contact_name']; ?></dd>
				<dt>E-mail: </dt>
				<dd><?php echo $company['Company']['contact_email']; ?></dd>
				<dt>Telefone: </dt>
				<dd><?php echo $company['Company']['contact_telephone']; ?></dd>
				<dt>Endereço: </dt>
				<dd><?php echo $company['Company']['address']; ?></dd>
				<dt>CNPJ: </dt>
				<dd><?php echo $company['Company']['cnpj']; ?></dd>
				<dt>Inscrição estadual: </dt>
				<dd><?php echo $company['Company']['state_inscription']; ?></dd>
				<dt>Inscrição municipal: </dt>
				<dd><?php echo $company['Company']['city_inscription']; ?></dd>
			</dl>
		</div>
	</div>

	<div class="row-fluid">
		<div class="form-actions">
			<?php if ($visibility == 0 || $visibility == 2) {
					  echo $this->Html->link('Editar', array('controller' => 'companies', 'action' => 'edit', $company['Company']['id']), array('class' => 'btn btn-primary', 'style' => 'margin-right: 6px'));
					  echo $this->Form->postLink('Remover', array('controller' => 'companies', 'action' => 'delete', $company['Company']['id']), array('class' => 'btn btn-danger'), 'Você está certo disso?'); 
				  }
				  echo $this->Form->button('Voltar', array('type' => 'button', 'class' => 'btn', 'style' => 'margin-left: 6px', 'onclick' => 'parent.history.back()')); ?>
		</div>
	</div>
</div>