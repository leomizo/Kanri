<?php

class CandidatesController extends AppController {

	public $helpers = array('Html', 'Form');
	public $uses = array('Country');

	public function index($success_message = null) {
		if ($success_message) $this->Set('success_message', $success_message);
		
		$search = $this->request->query['search'];
		$sort = $this->request->query['sort'];
		$asc = $this->request->query['asc'] == 'desc' ? 'desc' : 'asc';
		
		$this->paginate = $this->Candidate->pagination($search, $sort, $asc);
		$this->set('candidate', $this->paginate('Candidate'));
	}

	public function show($id) {
		if ($id) {
			$candidate = $this->Candidate->findById($id);
			if ($candidate) {
				$this->Set('candidate', $candidate);
			}
		}
	}

	public function add() {
		if ($this->request->is('post')) {
			if ($this->Candidate->save($this->request->data)) {
				$this->redirect(array('controller' => 'candidates', 'action' => 'index', 'add'));
			}
			else {
				$this->Set('alert', true);
			}
		}
		else {
			$countries = $this->Country->getCountryNames();
			$countries['null'] = 'Outro...';
			$this->set('countries', $countries);
		}
	}

	public function edit($id = null) {
		if ($id) {
			$candidate = $this->Candidate->findById($id);
			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Candidate->id = $id;
				if ($this->Candidate->save($this->request->data)) {
					$this->redirect(array('controller' => 'candidates', 'action' => 'index', 'edit'));
				}
				else {
					$this->Set('alert', true);
				}
			}
			else if ($candidate) {
				$this->request->data = $candidate;	
			}
		}
	}

	public function delete($id = null) {
		if ($this->request->is('post') && $id > 0) {
			$this->Candidate->delete($id);
			$this->redirect(array('controller' => 'candidates', 'action' => 'index', 'delete'));
		}
	}
	
}