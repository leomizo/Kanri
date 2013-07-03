<?php

App::uses('CakeEmail', 'Network/Email');

class BirthdayShell extends AppShell {

	public $uses = array('Users', 'Candidate', 'CandidateBirthday');

	public function main() {
		$candidates = $this->Candidate->find('all', array('conditions' => array('DAY(Candidate.birthdate)' => date('d'), 'MONTH(Candidate.birthdate)' => date('m')), 'order' => 'Candidate.name ASC', 'fields' => array('Candidate.id', 'Candidate.name', 'Candidate.birthdate', 'Candidate.personal_email'), 'recursive' => -1));
		foreach ($candidates as $candidate) {
			$data = array('CandidateBirthday' => array('candidate_id' => $candidate['Candidate']['id'],'status' => 0));
			$this->CandidateBirthday->save($data);
		}
		$admins = $this->Users->find('all', array('conditions' => array('type' => 0)));
		foreach ($admins as $admin) {
			CakeEmail::deliver($admin['User']['email'], 'Candidatos aniversariantes de '.date('d/m/Y'), array('admin_name' => $admin['User']['name'], 'candidates' => $candidates), array('from' => array('kanri@kanri.comeze.com' => 'Kanri'), 'layout' => null, 'template' => 'admin_birthdays', 'domain' => 'kanri.comeze.com'));
		}
	}
}