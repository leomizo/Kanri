<?php

App::uses('AppModel', 'Model');

class CandidateLanguage extends AppModel {

	public $belongsTo = array('Language');

	public function afterFind($results, $primary = null) {
		foreach ($results as &$language) {
			if (isset($language['CandidateLanguage']['level'])) {
				switch ($language['CandidateLanguage']['level']) {
					case 0:
						$language['CandidateLanguage']['level_string'] = 'Básico';
						break;
					case 1:
						$language['CandidateLanguage']['level_string'] = 'Intermediário';
						break;
					case 2:
						$language['CandidateLanguage']['level_string'] = 'Avançado';
						break;
					case 3:
						$language['CandidateLanguage']['level_string'] = 'Fluente';
						break;
					default:
						$language['CandidateLanguage']['level_string'] = '-';
						break;
				}
			}
		}
		return $results;
	}
	
}