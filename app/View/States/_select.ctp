	<option value=''>Selecione...</option>
<?php if (isset($options)) foreach ($options as $key => $value): ?>
	<option value=<?php echo $key; ?>><?php echo $value; ?></option>
<?php endforeach; ?>