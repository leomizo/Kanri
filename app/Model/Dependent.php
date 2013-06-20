<?php

App::uses('AppModel', 'Model');

class Dependent extends AppModel {
	
	public function afterFind($results, $primary = false) {
		foreach ($results as &$dependent) {
			$dependent['Dependent']['age'] = age_from_dob($dependent['Dependent']['birthdate']);
			if (isset($dependent['Dependent']['gender'])) {
				switch ($dependent['Dependent']['gender']) {
					case 0:
						$dependent['Dependent']['gender_string'] = 'Masculino';
						break;
					case 1:
						$dependent['Dependent']['gender_string'] = 'Feminino';
						break;
					default:
						$dependent['Dependent']['gender_string'] = '-';
						break;
				}
			}
		}
		return $results;
	}

	public function beforeSave($options = array()) {
		$birthdate = getdate();
		$birthdate['year'] -= $this->data['Dependent']['age'];
		$this->data['Dependent']['birthdate'] = $birthdate['year'].'-'.$birthdate['mon'].'-'.$birthdate['mday'];
		unset($this->data['Dependent']['age']);
		return true;
	}

}