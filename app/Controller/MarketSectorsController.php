<?php

class MarketSectorsController extends AppController {

	public function add() {
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			if ($this->request->is('post')) {
				if($this->MarketSector->save($this->request->data)) {
					$this->response->statusCode(200);
					return $this->response;
				} else throw new InternalErrorException();
			}
		}
		else throw new ForbiddenException();
	}

	public function edit() {
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			if ($this->request->is('post')) {
				if($this->MarketSector->save($this->request->data)) {
					$this->response->statusCode(200);
					return $this->response;
				} else throw new InternalErrorException();
			}
		}
		else throw new ForbiddenException();
	}

	public function delete() {
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			if ($this->request->is('post')) {
				if($this->MarketSector->delete($this->request->data["id"])) {
					$this->response->statusCode(200);
					return $this->response;
				} else throw new InternalErrorException();
			}
		}
		else throw new ForbiddenException();
	}

	public function refresh_select() {
		$include_add_option = $this->request->query['add'] == 'true';
		$this->set('data', $this->MarketSector->select_data($include_add_option));
		$this->render('_options', false);
	}

}