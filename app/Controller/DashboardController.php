<?php

class DashboardController extends AppController {

	public $uses = array('Model',
						 'AppModel',
						 'Candidate',
						 'Event');

	public function index() {
		if ($this->Auth->user('type') == 0) {
			$birthdays = $this->Candidate->find('all', array('conditions' => array('DAY(Candidate.birthdate)' => date('d'), 'MONTH(Candidate.birthdate)' => date('m')), 'order' => 'Candidate.name ASC', 'fields' => array('Candidate.id', 'Candidate.name', 'Candidate.birthdate', 'Candidate.personal_email'))); 
			$this->set('birthdays', $birthdays);
		}
		$this->set('events', $this->Event->findRecent());
	}
	
}