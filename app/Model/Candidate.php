<?php

App::uses('AppModel', 'Model');

class Candidate extends AppModel {

	public $belongsTo = array('City');

	public $hasMany = array('Dependent', 
						    'CandidateFormation',
						    'CandidateLanguage',
						    'CandidateCourse',
						    'Experience');

	public function afterFind($results, $primary = false) {
		$today = new DateTime();
		foreach ($results as &$candidate) {
			$candidate['Candidate']['name'] = $candidate['Candidate']['first_name'].$candidate['Candidate']['middle_names'].$candidate['Candidate']['last_name'];
			$candidate['Candidate']['location'] = $candidate['Candidate']['City']['name'].', '.$candidate['Candidate']['City']['State']['name'].' - '.$candidate['Candidate']['City']['State']['Country']['name'];
			$candidate['Candidate']['age'] = $today->diff(new DateTime($candidate['Candidate']['data_birth']))->format('%y anos');
		}
		return $results;
	}

	public function pagination($search = null, $sort = null, $asc = 'asc') {
		$pagination = array('limit' => 10);
		if ($search) $pagination['conditions'] = array('Candidate.first_name LIKE' => '%'.$search.'%');
		if ($sort) $pagination['order'] = array('Candidate.'.$sort => $asc);
		else $pagination['order'] = array("Candidate.first_name" => 'asc');
		return $pagination;
	}

	
}