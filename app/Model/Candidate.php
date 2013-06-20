<?php

App::uses('AppModel', 'Model');

class Candidate extends AppModel {

	public $belongsTo = array('City');
	public $hasOne = array('Curriculum' => array('dependent' => true));
	public $hasMany = array('Dependent' => array('dependent' => true), 
						    'CandidateFormation' => array('dependent' => true),
						    'CandidateLanguage' => array('dependent' => true),
						    'CandidateCourse' => array('dependent' => true),
						    'Experience' => array('dependent' => true));

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
				$candidate['Candidate']['current_job'] = $candidate["Experience"][0]['Job']['name'];
				$candidate['Experience'] = $experiences;
			}
		}
		return $results;
	}

	public function beforeSave($options = array()) {
		$this->data['Candidate']['birthdate'] = date('Y-m-d', strtotime($this->data['Candidate']['birthdate']));
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

	public function performSearch($parameters = array()) {

		$conditions = array();
		$joins = array();
		$groups = array();

		$joined_experiences = false;
		$joined_workplaces = false;

		if ($parameters['name'] != '') array_push($conditions, array("OR" => array('Candidate.first_name LIKE' => '%'.$parameters['name'].'%',
										   'Candidate.middle_names LIKE' => '%'.$parameters['name'].'%',
										   'Candidate.last_name LIKE' => '%'.$parameters['name'].'%')));

		if ($parameters['job'] != '') {
			array_push($joins, array("table" => "experiences", "alias" => "Experience", "type" => "INNER", "conditions" => array("Experience.candidate_id = Candidate.id")));
			array_push($conditions, array("Experience.job_id" => $parameters["job"]));
			$joined_experiences = true;
		}

		if ($parameters['nationality'] != '') {
			if (!$joined_experiences) {
				array_push($joins, array("table" => "experiences", "alias" => "Experience", "type" => "INNER", "conditions" => array("Experience.candidate_id = Candidate.id")));
				$joined_experiences = true;
			}
			array_push($joins, array("table" => "workplaces", "alias" => "Workplace", "type" => "INNER", "conditions" => array("Experience.workplace_id = Workplace.id")));
			array_push($conditions, array("Workplace.nationality" => $parameters["nationality"]));
			$joined_workplaces = true;
		}

		if ($parameters['market_sector'] != '') {
			if (!$joined_experiences) {
				array_push($joins, array("table" => "experiences", "alias" => "Experience", "type" => "INNER", "conditions" => array("Experience.candidate_id = Candidate.id")));
				$joined_experiences = true;
			}
			if (!$joined_workplaces) {
				array_push($joins, array("table" => "workplaces", "alias" => "Workplace", "type" => "INNER", "conditions" => array("Experience.workplace_id = Workplace.id")));
				$joined_workplaces = true;
			}
			array_push($conditions, array("Workplace.market_sector_id" => $parameters["market_sector"]));
		}

		if (isset($parameters["language"])) {
			array_push($joins, array("table" => "candidate_languages", "alias" => "CandidateLanguage", "type" => "INNER", "conditions" => array("CandidateLanguage.candidate_id = Candidate.id")));
			array_push($groups, "Candidate.id HAVING COUNT(Candidate.id) = ".count($parameters["language"]));
			$language_queries = array();
			foreach ($parameters["language"] as $language) {
				array_push($language_queries, array("AND" => array("CandidateLanguage.language_id" => $language["id"], "CandidateLanguage.level >=" => $language["level"])));
			}
			array_push($conditions, array("OR" => $language_queries));
		}

		if ($parameters['formation'] != '') {
			array_push($joins, array("table" => "candidate_formations", "alias" => "CandidateFormation", "type" => "INNER", "conditions" => array("CandidateFormation.candidate_id = Candidate.id")));
			array_push($conditions, array("CandidateFormation.formation_id" => $parameters['formation']));
		}

		if (isset($parameters['location'])) {
			array_push($joins, array("table" => "cities", "alias" => "CandidateCity", "type" => "INNER", "conditions" => array("CandidateCity.id = Candidate.city_id")));
			array_push($joins, array("table" => "states", "alias" => "State", "type" => "INNER", "conditions" => array("State.id = CandidateCity.state_id")));
			array_push($joins, array("table" => "countries", "alias" => "Country", "type" => "INNER", "conditions" => array("Country.id = State.country_id")));
			$location_queries = array();
			foreach ($parameters['location'] as $country) {
				if (is_array($country)) {
					foreach ($country as $state) {
						if (is_array($state)) {
							foreach ($state as $city) {
								array_push($location_queries, array("CandidateCity.id" => $city));
							}
						}
						else array_push($location_queries, array("State.id" => $state));
					}
				}
				else array_push($location_queries, array("Country.id" => $country));
			}
			array_push($conditions, array("OR" => $location_queries));
		}

		if (!isset($parameters['gender_male'])) array_push($conditions, array("Candidate.gender !=" => "0"));
		if (!isset($parameters['gender_female'])) array_push($conditions, array("Candidate.gender !=" => "1"));

		if ($parameters['additional'] != '') array_push($conditions, array("Candidate.additional_info LIKE" => '%'.$parameters['additional'].'%'));

		if ($parameters['income'] != '0.00') array_push($conditions, array("(Candidate.income_clt + Candidate.income_pj) <" => $parameters['income']));
		
		if ($parameters['age'] != '') {
			if (count($parameters['age']) == 1) array_push($conditions, $this->ageGroupToQuery($parameters['age'][0]));
			else {
				$age_queries = array();
				foreach ($parameters['age'] as $age_group) {
					array_push($age_queries, $this->ageGroupToQuery($age_group));
				}
				array_push($conditions, array("OR" => $age_queries));
			}
		}

		return $this->find('all', array('fields' => array("Candidate.id"), 'conditions' => array("AND" => $conditions), "joins" => $joins, "group" => $groups, 'recursive' => -1));
		
	}

	function ageGroupToQuery($index) {
		switch ($index) {
			case 0:
				$min_date = date('Y-m-d', strtotime("-30 years +1 day"));
				return array("Candidate.birthdate >=" => $min_date);
				break;
			case 1:
				$min_date = date('Y-m-d', strtotime("-40 years +1 day"));
				$max_date = date('Y-m-d', strtotime("-30 years"));
				return array("Candidate.birthdate BETWEEN ? AND ?" => array($min_date, $max_date));
				break;
			case 2:
				$min_date = date('Y-m-d', strtotime("-50 years +1 day"));
				$max_date = date('Y-m-d', strtotime("-40 years"));
				return array("Candidate.birthdate BETWEEN ? AND ?" => array($min_date, $max_date));
				break;
			case 3:
				$max_date = date('Y-m-d', strtotime("-50 years"));
				return array("Candidate.birthdate <=" => $max_date);
				break;
			default:
				return null;
				break;
		}
	}

}