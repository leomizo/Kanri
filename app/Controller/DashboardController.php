<?php

App::uses('CakeEmail', 'Network/Email');

class DashboardController extends AppController {

	public $uses = array('Model',
						 'AppModel',
						 'Candidate',
						 'CandidateBirthday',
						 'Event');

	public function index() {
		if ($this->Auth->user('type') == 0) {
			$birthdays = $this->CandidateBirthday->find('all', array('fields' => array('CandidateBirthday.id', 'CandidateBirthday.status', 'Candidate.id', 'CONCAT(Candidate.first_name, " ", Candidate.middle_names, " ", Candidate.last_name) as name', 'Candidate.birthdate', 'Candidate.personal_email')));
			$this->set('birthdays', $birthdays);
		}
		$this->set('events', $this->Event->findRecent());
	}

	public function ignore_candidate_birthday($id = null) {
		if ($this->request->is('post') && $id && $id > 0) {
			$birthday = array('CandidateBirthday' => array('id' => $id, 'status' => 2));
			if ($this->CandidateBirthday->save($birthday)) $this->redirect(array("action" => "index"));
		}
	}

	public function send_candidate_birthday_email($id = null, $candidate_id = null) {
		if ($this->request->is('post') && $id && $id > 0 && $candidate_id && $candidate_id > 0) {
			$candidate = $this->Candidate->findById($candidate_id);
			CakeEmail::deliver($candidate['Candidate']['personal_email'], 'Feliz aniversário!', array('name' => $candidate['Candidate']['first_name']), array('from' => array('kanri@kanri.comeze.com' => 'Kanri'), 'layout' => null, 'template' => 'candidate_birthday'));
			$birthday = array('CandidateBirthday' => array('id' => $id, 'status' => 1));
			if ($this->CandidateBirthday->save($birthday)) $this->redirect(array("action" => "index"));
		}
	}
	
}