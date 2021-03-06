<?php

class FormationsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		if ($this->UserVisibility != 0 && $this->UserVisibility != 2) throw new ForbiddenException();
	}

	public function add() {
		if ($this->request->is('post')) {
			if($this->Formation->save($this->request->data)) {
				$this->response->statusCode(200);
				$this->response->body(json_encode(array('id' => $this->Formation->id)));
				return $this->response;
			} else throw new InternalErrorException();
		}
	}

	public function edit() {
		if ($this->request->is('post')) {
			if($this->Formation->save($this->request->data)) {
				$this->response->statusCode(200);
				return $this->response;
			} else throw new InternalErrorException();
		}
	}

	public function delete() {
		if ($this->request->is('post')) {
			if($this->Formation->delete($this->request->data["id"])) {
				$this->response->statusCode(200);
				return $this->response;
			} else throw new InternalErrorException();
		}
	}

}