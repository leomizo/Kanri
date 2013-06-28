<?php

class CompaniesController extends AppController {

	public $helpers = array('Html', 'Form');

	public function index($success_message = null) {
		if ($success_message) $this->Set('success_message', $success_message);
		
		$search = $this->request->query['search'];
		$sort = $this->request->query['sort'];
		$asc = $this->request->query['asc'] == 'desc' ? 'desc' : 'asc';
		
		$this->paginate = $this->Company->pagination($search, $sort, $asc);
		$this->set('companies', $this->paginate('Company'));
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
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			if ($this->request->is('post')) {
				if ($this->Company->save($this->request->data)) {
					$this->redirect(array('controller' => 'companies', 'action' => 'index', 'add'));
				}
				else {
					$this->Set('alert', true);
				}
			}
		}
		else throw new ForbiddenException();
	}

	public function edit($id = null) {
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			if ($id) {
				$company = $this->Company->findById($id);
				if ($this->request->is('post') || $this->request->is('put')) {
					$this->Company->id = $id;
					if ($this->Company->save($this->request->data)) {
						$this->redirect(array('controller' => 'companies', 'action' => 'index', 'edit'));
					}
					else {
						$this->Set('alert', true);
					}
				}
				else if ($company) {
					$this->request->data = $company;	
				}
			}
		}
		else throw new ForbiddenException();
	}

	public function delete($id = null) {
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			if ($this->request->is('post') && $id > 0) {
				$this->Company->delete($id);
				$this->redirect(array('controller' => 'companies', 'action' => 'index', 'delete'));
			}
		}
		else throw new ForbiddenException();
	}
	
}