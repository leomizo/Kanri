<?php

App::uses('CakeEmail', 'Network/Email');

class DashboardController extends AppController {

	public $uses = array('Model',
						 'AppModel',
						 'Candidate',
						 'CandidateBirthday',
						 'Event',
						 'User');

	public function index() {
		if ($this->Auth->user('type') == 0) {
			$candidates = $this->Candidate->find('all', array('conditions' => array('DAY(Candidate.birthdate)' => date('d'), 'MONTH(Candidate.birthdate)' => date('m')), 'order' => 'Candidate.name ASC', 'fields' => array('Candidate.id', 'Candidate.name', 'Candidate.birthdate', 'Candidate.personal_email'), 'recursive' => -1));
			$candidate_birthday_count = $this->CandidateBirthday->find('count', array('conditions' => array('DAY(Candidate.birthdate)' => date('d'), 'MONTH(Candidate.birthdate)' => date('m'))));
			if ($candidate_birthday_count == 0) {
				$this->CandidateBirthday->deleteAll(array('CandidateBirthday.id >' => 0));
				if (!empty($candidates)) {
					foreach ($candidates as $candidate) {
						$data = array('CandidateBirthday' => array('candidate_id' => $candidate['Candidate']['id'],'status' => 0));
						$this->CandidateBirthday->save($data);
					}
					// $users = $this->User->find('all', array('conditions' => array('type' => 0), 'fields' => array('User.id', 'User.email', 'User.name')));
					// foreach ($users as $admin) {
					// 	CakeEmail::deliver($admin['User']['email'], 'Candidatos aniversariantes de '.date('d/m/Y'), array('admin_name' => $admin['User']['name'], 'candidates' => $candidates), array('from' => array('kanri@kanri.com' => 'Kanri'), 'layout' => null, 'template' => 'admin_birthdays', 'domain' => 'kanri.com', 'emailFormat' => 'html'));
					// }
				}
			} 
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
			CakeEmail::deliver($candidate['Candidate']['personal_email'], 'Feliz aniversário!', array('name' => $candidate['Candidate']['first_name']), array('from' => array('kanri@kanri.com' => 'Kanri'), 'layout' => null, 'template' => 'candidate_birthday', 'domain' => 'kanri.com', 'emailFormat' => 'html'));
			$birthday = array('CandidateBirthday' => array('id' => $id, 'status' => 1));
			if ($this->CandidateBirthday->save($birthday)) $this->redirect(array("action" => "index"));
		}
	}
	
}