<?php

App::uses('AppModel', 'Model');

class EventInterview extends AppModel {

	public function afterFind($results, $primary = false) {
		if (isset($results['contact_type'])) {
			switch ($results['contact_type']) {
				case 0:
					$results['contact_type_string'] = 'Telefone';
					break;
				case 1:
					$results['contact_type_string'] = 'Skype';
					break;
				case 2:
					$results['contact_type_string'] = 'Pessoal';
					break;
				default:
					$results['contact_type_string'] = $results['contact_type_description'];
					break;
			}
		}
		return $results;
	}

}