<?php

class PermissionsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		if ($this->UserVisibility != 0) throw new ForbiddenException();
	}

	public function add() {
		if ($this->request->is('post')) {
			unset($this->request->data['Permission']['id']);
			$start = $this->request->data['Permission']['start'];
			$this->request->data['Permission']['start'] = date('Y-m-d H:i:s', mktime(substr($start, 11, 2), substr($start, 14, 2), substr($start, 17, 2), substr($start, 3, 2), substr($start, 0, 2), substr($start, 6, 4)));
			$end = $this->request->data['Permission']['end'];
			$this->request->data['Permission']['end'] = date('Y-m-d H:i:s', mktime(substr($end, 11, 2), substr($end, 14, 2), substr($end, 17, 2), substr($end, 3, 2), substr($end, 0, 2), substr($end, 6, 4)));
			if($this->Permission->save($this->request->data)) {
				$this->redirect(array('controller' => 'users', 'action' => 'permissions'));
			} else throw new InternalErrorException();
		}
	}

	public function edit() {
		if ($this->request->is('post')) {
			$start = $this->request->data['Permission']['start'];
			$this->request->data['Permission']['start'] = date('Y-m-d H:i:s', mktime(substr($start, 11, 2), substr($start, 14, 2), substr($start, 17, 2), substr($start, 3, 2), substr($start, 0, 2), substr($start, 6, 4)));
			$end = $this->request->data['Permission']['end'];
			$this->request->data['Permission']['end'] = date('Y-m-d H:i:s', mktime(substr($end, 11, 2), substr($end, 14, 2), substr($end, 17, 2), substr($end, 3, 2), substr($end, 0, 2), substr($end, 6, 4)));
			if($this->Permission->save($this->request->data)) {
				$this->redirect(array('controller' => 'users', 'action' => 'permissions'));
			} else throw new InternalErrorException();
		}
	}

	public function delete($id = null) {
		if ($this->request->is('post') && $id > 0) {
			if($this->Permission->delete($id)) {
				$this->redirect(array('controller' => 'users', 'action' => 'permissions'));
			} else throw new InternalErrorException();
		}
	}

}