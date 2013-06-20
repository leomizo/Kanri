<?php

App::uses('AppModel', 'Model');

class Curriculum extends AppModel {

	public function beforeSave($options = array()) {
		if ($this->data['Curriculum']['size'] > 0) {
			$fp = fopen($this->data['Curriculum']['tmp_name'], 'r');
			$this->data['Curriculum']['content'] = fread($fp, filesize($this->data['Curriculum']['tmp_name']));
			fclose($fp);
			unset($this->data['Curriculum']['error'], $this->data['Curriculum']['tmp_name']);
		}
		return true;
	}

}