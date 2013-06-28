<?php

App::uses('AppModel', 'Model');

class Event extends AppModel {

	public $hasOne = array('EventContact' => array("dependent" => true),
	 					   'EventInterview' => array("dependent" => true),
	 					   'EventFeedback' => array("dependent" => true),
	 					   'EventConclusion' => array("dependent" => true));

	public function afterFind($results, $primary = false) {
		foreach ($results as &$event) {
			switch ($event['Event']['event_type']) {
				case 0:
					$event['Event']['event_type_string'] = 'Abertura do processo';		
					break;
				case 1:
					$event['Event']['event_type_string'] = 'Contato com o candidato';		
					break;
				case 2:
					$event['Event']['event_type_string'] = 'Contato com a empresa';		
					break;
				case 3:
					$event['Event']['event_type_string'] = 'Entrevista com o candidato';		
					break;
				case 4:
					$event['Event']['event_type_string'] = 'Entrevista do candidato na empresa';		
					break;
				case 5:
					$event['Event']['event_type_string'] = 'Feedback do candidato';		
					break;
				case 6:
					$event['Event']['event_type_string'] = 'Feedback da empresa';		
					break;
				case 7:
					$event['Event']['event_type_string'] = 'Conclusão do processo';		
					break;
				default:
					$event['Event']['event_type_string'] = '';
					break;
			}
		}
		return $results;
	}

	public function findRecent() {
		$options = array(
			'order' => 'Event.occurrence DESC',
			'limit' => 5,
			'joins' => array(
				array('table' => 'processes', 'alias' => 'Process', 'type' => 'INNER', 'conditions' => array('Process.id = Event.process_id')),
				array('table' => 'candidates', 'alias' => 'Candidate', 'type' => 'INNER', 'conditions' => array('Candidate.id = Process.candidate_id')),
				array('table' => 'companies', 'alias' => 'Company', 'type' => 'INNER', 'conditions' => array('Company.id = Process.company_id'))
			),
			'recursive' => -1,
			'fields' => array('CONCAT(Candidate.first_name, " ", Candidate.middle_names, " ", Candidate.last_name) as candidate_name', 'Candidate.id', 'Company.name', 'Company.id', 'Process.id', 'Event.id', 'Event.occurrence', 'Event.event_type')
		);
		return $this->find('all', $options);
	}
	

}