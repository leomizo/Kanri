<?php

App::uses('AppModel', 'Model');

class Candidate extends AppModel {

	public $belongsTo = array('City', 'Curriculum');
	public $hasMany = array('Dependent', 
						    'CandidateFormation',
						    'CandidateLanguage',
						    'CandidateCourse',
						    'Experience');

	public function afterFind($results, $primary = null) {
		foreach ($results as &$candidate) {
			if (isset($candidate['Candidate']['birthdate'])) {
				$candidate['Candidate']['age'] = age_from_dob($candidate['Candidate']['birthdate']).' anos';
				$candidate['Candidate']['birthdate'] = date('d/m/Y', strtotime($candidate['Candidate']['birthdate']));
			}
			if (isset($candidate['Candidate']['gender'])) {
				switch ($candidate['Candidate']['gender']) {
					case 0:
						$candidate['Candidate']['gender_string'] = 'Masculino';
						break;
					case 1:
						$candidate['Candidate']['gender_string'] = 'Feminino';
						break;
					default:
						$candidate['Candidate']['gender_string'] = '-';
						break;
				}
			}
			if (isset($candidate['Candidate']['civil_state'])) {
				switch ($candidate['Candidate']['civil_state']) {
					case 0:
						$candidate['Candidate']['civil_state_string'] = 'Solteiro';
						break;
					case 1:
						$candidate['Candidate']['civil_state_string'] = 'Casado';
						break;
					case 2:
						$candidate['Candidate']['civil_state_string'] = 'Divorciado';
						break;
					case 3:
						$candidate['Candidate']['civil_state_string'] = 'Viúvo';
						break;
					default:
						$candidate['Candidate']['civil_state_string'] = '-';
						break;
				}
			}
			if (isset($candidate['Candidate']['health_insurance_type'])) {
				switch ($candidate['Candidate']['health_insurance_type']) {
					case 0:
						$candidate['Candidate']['health_insurance_type_string'] = 'Quarto privativo';
						break;
					case 1:
						$candidate['Candidate']['health_insurance_type_string'] = 'Quarto coletivo';
						break;
					case 2:
						$candidate['Candidate']['health_insurance_type_string'] = 'Enfermaria';
						break;
					default:
						$candidate['Candidate']['health_insurance_type_string'] = '-';
						break;
				}
			}
			if (isset($candidate['Candidate']['life_insurance_type'])) {
				switch ($candidate['Candidate']['life_insurance_type']) {
					case 0:
						$candidate['Candidate']['life_insurance_type_string'] = 'Reais';
						break;
					case 1:
						$candidate['Candidate']['life_insurance_type_string'] = 'Múltiplo de salário';
						break;
					default:
						$candidate['Candidate']['life_insurance_type_string'] = '-';
						break;
				}
			}
			if (isset($candidate['Candidate']['meal_ticket_type'])) {
				switch ($candidate['Candidate']['meal_ticket_type']) {
					case 0:
						$candidate['Candidate']['meal_ticket_type_string'] = 'por dia';
						break;
					case 1:
						$candidate['Candidate']['meal_ticket_type_string'] = 'por mês';
						break;
					default:
						$candidate['Candidate']['meal_ticket_type_string'] = '';
						break;
				}
			}
			if (isset($candidate['Candidate']['vehicle_type'])) {
				switch ($candidate['Candidate']['vehicle_type']) {
					case 0:
						$candidate['Candidate']['vehicle_type_string'] = 'Veículo';
						break;
					case 1:
						$candidate['Candidate']['vehicle_type_string'] = 'Valor (em R$)';
						break;
					default:
						$candidate['Candidate']['vehicle_type_string'] = '-';
						break;
				}
			}
			if (isset($candidate['Experience'])) {
				$experiences = array();
				usort($candidate['Experience'], 'sortByStartDate');
				foreach ($candidate['Experience'] as $experience) {
					if (!isset($experiences[$experience['workplace_id']])) {
						$experiences[$experience['workplace_id']] = array();
					}
					array_push($experiences[$experience['workplace_id']], $experience);
				}
				foreach ($experiences as $key => &$value) {
					usort($value, 'sortByStartDate');
				}
				$candidate['Experience'] = $experiences;
			}
		}
		return $results;
	}

	public function beforeSave($options = array()) {
		$this->data['Candidate']['birthdate'] = date('Y-m-d', strtotime($this->data['Candidate']['birthdate']));
		if ($this->data['City']['State']['Country']['id'] == 'null' || $this->data['City']['State']['Country']['id'] == '') {
			unset($this->data['City']['State']['Country']['id']);
		}
		else {
			unset($this->data['City']['State']['Country']['name']);
		}
		if ($this->data['City']['State']['id'] == 'null' || $this->data['City']['State']['id'] == '') {
			unset($this->data['City']['State']['id']);
		}
		else {
			unset($this->data['City']['State']['name']);
		}
		if ($this->data['City']['id'] == 'null' || $this->data['City']['id'] == '') {
			unset($this->data['City']['id']);
		}
		else {
			unset($this->data['City']['name']);
		}

		return true;
	}

	public function pagination($search = null, $sort = null, $asc = 'asc') {
		$pagination = array('limit' => 10);
		if ($search) $pagination['conditions'] = array('Candidate.first_name LIKE' => '%'.$search.'%');
		if ($sort) $pagination['order'] = array('Candidate.'.$sort => $asc);
		else $pagination['order'] = array("Candidate.first_name" => 'asc');
		$pagination['fields'] = array('Candidate.first_name', 'Candidate.middle_names', 'Candidate.last_name', 'Candidate.city_id', 'Candidate.birthdate');
		$pagination['recursive'] = 3;
		return $pagination;
	}

}