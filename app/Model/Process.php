<?php

App::uses('AppModel', 'Model');

class Process extends AppModel {

	public $belongsTo = array("Candidate", "Company");
	public $hasMany = array("Event" => array("dependent" => true,
											 "order" => array("Event.occurrence" => 'desc')));

	public function pagination($search = null) {
		$pagination = array('limit' => 10);
		if ($search) $pagination['conditions'] = array("OR" => array('CONCAT(Candidate.first_name, " ", Candidate.middle_names, " ", Candidate.last_name) LIKE' => '%'.$search.'%', 'Company.name LIKE' => '%'.$search.'%'));
		$pagination['fields'] = array('Candidate.id', 'Candidate.first_name', 'Candidate.middle_names', 'Candidate.last_name', 'Company.id', 'Company.name', 'Process.id', 'MAX(Event.occurrence) as last_occurrence');
		$pagination['joins'] = array(array('table' => 'candidates', 'alias' => 'Candidate', 'type' => 'INNER', 'conditions' => array("Candidate.id = Process.candidate_id")), array('table' => 'companies', 'alias' => 'Company', 'type' => 'INNER', 'conditions' => array("Company.id = Process.company_id")), array('table' => 'events', 'alias' => 'Event', 'type' => 'INNER', 'conditions' => array('Process.id = Event.process_id')));
		$pagination['group'] = 'Event.process_id';
		$pagination['order'] = 'last_occurrence DESC';
		$pagination['recursive'] = -1;
		return $pagination;
	}

}