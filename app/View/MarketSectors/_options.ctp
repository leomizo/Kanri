	<option>Selecione...</option>
<?php if (isset($data)) foreach ($data as $key => $value): ?>
	<option value=<?php echo $key; ?>><?php echo $value; ?></option>
<?php endforeach; ?>