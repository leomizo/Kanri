<?php

class UsersController extends AppController {

	public $helpers = array('Html', 'Form');
	public $uses = array('User', 'Permission');

	public function index($success_message = null) {
		if ($this->UserVisibility == 0) {
			if ($success_message) $this->Set('success_message', $success_message);
			$search = $this->request->query['search'];
			$sort = $this->request->query['sort'];
			$asc = $this->request->query['asc'] == 'desc' ? 'desc' : 'asc';
			
			$this->paginate = $this->User->pagination($search, $sort, $asc);
			$this->set('users', $this->paginate('User'));
		}
		else throw new ForbiddenException();
	}

	public function show($id = null) {
		if ($this->UserVisibility == 0) {
			if ($id) {
				$user = $this->User->findById($id);
				if ($user) {
					$this->Set('user', $user);
				}
			}
		}
		else throw new ForbiddenException();
	}

	public function add() {
		if ($this->UserVisibility == 0) {
			if ($this->request->is('post')) {
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$this->redirect(array('controller' => 'users', 'action' => 'index', 'add'));
				}
				else {
					$this->set('alert', true);
				}
			}
		}
		else throw new ForbiddenException();
	}

	public function edit($id = null) {
		if ($this->UserVisibility == 0) {
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
		else throw new ForbiddenException();
	}

	public function delete($id = null) {
		if ($this->UserVisibility == 0) {
			if ($this->request->is('post') && $id > 0) {
				$this->User->delete($id);
				$this->redirect(array('controller' => 'users', 'action' => 'index', 'delete'));
			}
		}
		else throw new ForbiddenException();
	}

	public function permissions() {
		if ($this->UserVisibility == 0) {
			$this->set('permissions', $this->Permission->getPermissions());
			$this->set('users', $this->User->getAuxiliaryUsers());
		}
		else throw new ForbiddenException();
	}

	public function login() {
		$this->layout = 'login';
		$this->Session->destroy();
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->response->body($this->Auth->redirect());
				$this->response->statusCode(200);
	        } 
	        else {
	           $this->response->statusCode(500);
	        }
	        return $this->response;
		}
	}

	public function logout() {
	    $this->redirect($this->Auth->logout());
	}

}