<?php

class PermissionsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		if ($this->UserVisibility != 0) throw new ForbiddenException();
	}

	public function add() {
		if ($this->request->is('post')) {
			unset($this->request->data['Permission']['id']);
			$start = date_parse_from_format('d/m/Y H:i:s', $this->request->data['Permission']['start']);
			$this->request->data['Permission']['start'] = date('Y-m-d H:i:s', mktime($start['hour'], $start['minute'], $start['second'], $start['month'], $start['day'], $start['year']));
			$end = date_parse_from_format('d/m/Y H:i:s', $this->request->data['Permission']['end']);
			$this->request->data['Permission']['end'] = date('Y-m-d H:i:s', mktime($end['hour'], $end['minute'], $end['second'], $end['month'], $end['day'], $end['year']));
			if($this->Permission->save($this->request->data)) {
				$this->redirect(array('controller' => 'users', 'action' => 'permissions'));
			} else throw new InternalErrorException();
		}
	}

	public function edit() {
		if ($this->request->is('post')) {
			$start = date_parse_from_format('d/m/Y H:i:s', $this->request->data['Permission']['start']);
			$this->request->data['Permission']['start'] = date('Y-m-d H:i:s', mktime($start['hour'], $start['minute'], $start['second'], $start['month'], $start['day'], $start['year']));
			$end = date_parse_from_format('d/m/Y H:i:s', $this->request->data['Permission']['end']);
			$this->request->data['Permission']['end'] = date('Y-m-d H:i:s', mktime($end['hour'], $end['minute'], $end['second'], $end['month'], $end['day'], $end['year']));
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