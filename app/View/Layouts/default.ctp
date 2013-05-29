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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
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

			echo $this->Html->script(array('jquery-2.0.0.min.js', 'bootstrap.min.js', 'bootstrap-datetimepicker.min.js','layout.js'));
			echo $this->fetch('script');

		?>
	</head>

	<body>
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
							<li><a href="candidate_index.html">Visualizar candidatos</a></li>
							<li><a href="candidate_search.html">Busca avançada de candidatos</a></li>
							<li><a href="candidate_add.html">Adicionar candidato</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-globe"></i> | Empresas</a>
						<ul class="dropdown-menu">
							<li><a href="company_index.html">Visualizar empresas</a></li>
							<li><a href="company_add.html">Adicionar empresa</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-plus"></i> | Informações suplementares</a>
						<ul class="dropdown-menu">
							<li><a href="info_index.html#info-language">Línguas</a></li>
							<li><a href="info_index.html#info-area">Segmentos</a></li>
							<li><a href="info_index.html#info-job">Cargos</a></li>
							<li><a href="info_index.html#info-formation">Formações</a></li>
							<li><a href="info_index.html#info-misc">Cursos e Especializações</a></li>
							<li><a href="info_index.html#info-local">Locais de trabalho</a></li>
						</ul>
					</li>
					<li>
						<a href="process_index.html"><i class="icon-eye-open"></i> | Processos</a>
					</li>
				</ul>
				<ul class="nav pull-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> | Usuários e permissões</a>
						<ul class="dropdown-menu">
							<li>
								<?php echo 
									$this->Html->link('Visualizar usuário', array('controller' => 'users', 'action' => 'index'));
								?>
							</li>
							<li>
								<?php echo 
									$this->Html->link('Adicionar usuário', array('controller' => 'users', 'action' => 'add'));
								?>
							</li>
							<li class="divider"></li>
							<li>
								<?php echo 
									$this->Html->link('Permissões...', array('controller' => 'users', 'action' => 'permissions'));
								?>
							</li>
							
						</ul>
					</li>
					<li>
						<a href="login.html"><i class="icon-off"></i> | Logout</a>
					</li>
				</ul>
			</div>
		</div>

		<?php echo $this->fetch('content'); ?>
		
	</body>

</html>
