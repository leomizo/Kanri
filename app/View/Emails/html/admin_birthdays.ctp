<span>Olá <?php echo $admin_name; ?>,</span>
<br /><br />
<span>Os seguintes candidatos fazem aniversário hoje (<?php echo date('d/m/Y'); ?>):</span>
<br />
<br />
<ul>
	<?php foreach ($candidates as $candidate): ?>
		<li>
			<?php echo $candidate['Candidate']['name'].' - '.$candidate['Candidate']['age']; ?>
		</li>
	<?php endforeach; ?>
</ul>
<br />
<br />
<span>Acesse o Kanri para enviar os e-mails padrão.</span>
<br /><br />
<span>Atenciosamente,</span>
<br/><br />
<span>Kanri</span>
