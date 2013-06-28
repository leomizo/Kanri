<?php

class CoursesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		if ($this->UserVisibility != 0 && $this->UserVisibility != 2) throw new ForbiddenException();
	}

	public function add() {
		if ($this->request->is('post')) {
			if($this->Course->save($this->request->data)) {
				$this->response->statusCode(200);
				$this->response->body(json_encode(array('id' => $this->Course->id)));
				return $this->response;
			} else throw new InternalErrorException();
		}
	}

	public function edit() {
		if ($this->request->is('post')) {
			if($this->Course->save($this->request->data)) {
				$this->response->statusCode(200);
				return $this->response;
			} else throw new InternalErrorException();
		}
	}

	public function delete() {
		if ($this->request->is('post')) {
			if($this->Course->delete($this->request->data["id"])) {
				$this->response->statusCode(200);
				return $this->response;
			} else throw new InternalErrorException();
		}
	}

}