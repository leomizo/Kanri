<li>
	<strong>Razão do contato: </strong><?php echo $event['EventContact']['contact_reason']; ?>
	<br />
	<strong>Quem realizou o contato: </strong><?php echo $event['EventContact']['contact_sender']; ?>
	<br />
	<strong>Pessoa com que foi feito o contato: </strong><?php echo $event['EventContact']['contact_receiver']; ?>
	<br />
	<strong>Tipo de contato: </strong><?php echo $event['EventContact']['contact_type_string']; ?>
	<br />
	<strong>Comentários: </strong><?php echo $event['EventContact']['description']; ?>
</li>