<li>
	<strong>Resultado: </strong><?php if ($event['EventConclusion']['result']) echo 'Positivo'; else echo 'Negativo'; ?>
	<br />
	<strong>Comentários: </strong><?php echo $event['EventConclusion']['comments']; ?>
</li>