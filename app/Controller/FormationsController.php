<?php

class FormationsController extends AppController {

	public function add() {
		if ($this->request->is('post')) {
			if($this->Formation->save($this->request->data)) {
				$this->response->statusCode(200);
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