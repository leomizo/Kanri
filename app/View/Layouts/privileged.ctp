<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

?>

<!DOCTYPE html>
<html>

	<head>
		<?php echo $this->Html->charset(); ?>
		<title>Kanri</title>
		<?php
			echo $this->fetch('meta');

			echo $this->Html->css(array('bootstrap.min.css', 'bootstrap-datetimepicker.min.css', 'layout.css'));
			echo $this->fetch('css');

			echo $this->Html->script(array('jquery-2.0.0.min.js', 'bootstrap.min.js', 'bootstrap-datetimepicker.min.js','kanri.js'));
			echo $this->fetch('script');

		?>
	</head>

	<body <?php if (isset($bodyAttr)) echo $bodyAttr; ?>>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<a id="logo" class="brand" href="/dashboard">
					<?php echo $this->Html->Image('layout-ico-kanri.png', array('id' => 'img-logo', 'width' => '40', 'height' => '19', 'alt' => 'logo')); ?>
					Kanri
				</a>
				<ul class="nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase"></i> | Candidatos</a>
						<ul class="dropdown-menu">
							<li>
								<?php echo $this->Html->link('Visualizar candidatos', array('controller' => 'candidates', 'action' => 'index'));
								?>
							</li>
							<li>
								<?php echo $this->Html->link('Busca avançado de candidatos', array('controller' => 'candidates', 'action' => 'search'));
								?>
							</li>
							<li>
								<?php echo $this->Html->link('Adicionar candidato', array('controller' => 'candidates', 'action' => 'add'));
								?>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-globe"></i> | Empresas</a>
						<ul class="dropdown-menu">
							<li>
								<?php echo $this->Html->link('Visualizar empresa', array('controller' => 'companies', 'action' => 'index'));
								?>
							</li>
							<li>
								<?php echo $this->Html->link('Adicionar empresa', array('controller' => 'companies', 'action' => 'add'));
								?>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-plus"></i> | Informações suplementares</a>
						<ul class="dropdown-menu">
							<li>
								<?php echo $this->Html->link('Idiomas', array('controller' => 'info', 'action' => 'index', '#' => 'info-language'));
								?>
							</li>
							<li>
								<?php echo $this->Html->link('Segmentos', array('controller' => 'info', 'action' => 'index', '#' => 'info-market-sector'));
								?>
							</li>
							<li>
								<?php echo $this->Html->link('Cargos', array('controller' => 'info', 'action' => 'index', '#' => 'info-job'));
								?>
							</li>
							<li>
								<?php echo $this->Html->link('Formações acadêmicas', array('controller' => 'info', 'action' => 'index', '#' => 'info-formation'));
								?>
							</li>
							<li>
								<?php echo $this->Html->link('Cursos e Especializações', array('controller' => 'info', 'action' => 'index', '#' => 'info-course'));
								?>
							</li>
							<li>
								<?php echo $this->Html->link('Locais de trabalho', array('controller' => 'info', 'action' => 'index', '#' => 'info-workplace'));
								?>
							</li>
						</ul>
					</li>
					<li>
						<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-eye-open')).' | Processos', array('controller' => 'processes', 'action' => 'index'), array('escape' => false)); ?>
					</li>
				</ul>
				<ul class="nav pull-right">
					<li>
						<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-off')).' | Logout', array('controller' => 'users', 'action' => 'logout'), array('escape' => false)); ?>
					</li>
				</ul>
			</div>
		</div>

		<?php echo $this->fetch('content'); ?>
		
	</body>

</html>
