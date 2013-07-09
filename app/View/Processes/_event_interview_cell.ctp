<li style='text-align: justify; padding-right: 10px'>
	<strong>Comparecimento: </strong><?php if ($event['EventInterview']['attendance']) echo 'Sim'; else echo 'Não'; ?>
	<br />
	<strong>Tipo de contato: </strong><?php echo $event['EventInterview']['contact_type_string']; ?>
	<br />
	<?php if (!$event['EventInterview']['attendance']): ?>
	<strong>Justificativa: </strong><?php echo $event['EventInterview']['attendance_justification']; ?>
	<br />
	<?php endif; ?>	
	<strong>Comentários: </strong><?php echo $event['EventInterview']['description']; ?>
</li>