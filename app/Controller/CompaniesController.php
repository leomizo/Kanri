<?php

class CompaniesController extends AppController {

	public $helpers = array('Html', 'Form');

	public function index($success_message = null) {
		if ($success_message) $this->Set('success_message', $success_message);
		$this->set('companies', $this->Company->find('all'));
	}

	public function show($id) {
		if ($id) {
			$company = $this->Company->findById($id);
			if ($company) {
				$this->Set('company', $company);
			}
		}
	}

	public function add() {
		if ($this->request->is('post')) {
			if ($this->Company->save($this->request->data)) {
				$this->redirect(array('controller' => 'companies', 'action' => 'index', 'add'));
			}
			else {
				$this->Set('alert', true);
			}
		}
	}

	public function edit() {

	}

	public function delete() {

	}
	
}