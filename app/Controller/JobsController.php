<?php

class JobsController extends AppController {

	public function add() {
		if ($this->request->is('post')) {
			if($this->Job->save($this->request->data)) {
				$this->response->statusCode(200);
				$this->response->body(json_encode(array('id' => $this->Job->id)));
				return $this->response;
			} else throw new InternalErrorException();
		}
	}

	public function edit() {
		if ($this->request->is('post')) {
			if($this->Job->save($this->request->data)) {
				$this->response->statusCode(200);
				return $this->response;
			} else throw new InternalErrorException();
		}
	}

	public function delete() {
		if ($this->request->is('post')) {
			if($this->Job->delete($this->request->data["id"])) {
				$this->response->statusCode(200);
				return $this->response;
			} else throw new InternalErrorException();
		}
	}

}