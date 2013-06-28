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
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<?php $this->Html->css('error.css', null, array('inline' => false)); ?>
<?php $this->Html->script('error.js', array('inline' => false)); ?>

<?php if ($error instanceof ForbiddenException): ?>
	<div class="content-block" id='message-container'>
		<?php echo $this->Html->image('warning-icon', array('id' => 'message-icon')); ?>
		<br />
		<h2>Sem permissão para executar ação!</h2>
	</div>
<?php else : ?>
	<div class="content-block" id='message-container'>
		<?php echo $this->Html->image('error-icon', array('id' => 'message-icon')); ?>
		<br />
		<h2>404: Página não encontrada!</h2>
	</div>
<?php endif; ?>
