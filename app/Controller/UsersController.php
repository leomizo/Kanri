<?php

class UsersController extends AppController {

	public $helpers = array('Html', 'Form');

	public function index($success_message = null) {
		if ($success_message) $this->Set('success_message', $success_message);
		$search = $this->request->query['search'];
		$sort = $this->request->query['sort'];
		$asc = $this->request->query['asc'] == 'desc' ? 'desc' : 'asc';
		
		$this->paginate = $this->User->pagination($search, $sort, $asc);
		$this->set('users', $this->paginate('User'));
	}

	public function show($id = null) {
		if ($id) {
			$user = $this->User->findById($id);
			if ($user) {
				$this->Set('user', $user);
			}
		}
	}

	public function add() {
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->redirect(array('controller' => 'users', 'action' => 'index', 'add'));
			}
			else {
				$this->Set('alert', true);
			}
		}
	}

	public function edit($id = null) {
		if ($id) {
			$user = $this->User->findById($id);
			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				if ($this->User->save($this->request->data)) {
					$this->redirect(array('controller' => 'users', 'action' => 'index', 'edit'));
				}
				else {
					$this->Set('alert', true);
				}
			}
			else if ($user) {
				$this->request->data = $user;	
			}
		}
	}

	public function delete($id = null) {
		if ($this->request->is('post') && $id > 0) {
			$this->User->delete($id);
			$this->redirect(array('controller' => 'users', 'action' => 'index', 'delete'));
		}
	}

	public function permissions() {

	}

}