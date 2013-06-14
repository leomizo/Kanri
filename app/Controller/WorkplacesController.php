<?php

class WorkplacesController extends AppController {

	public function add() {
		if ($this->request->is('post')) {
			if ($this->request->data['MarketSector']['id'] != "null") {
				unset($this->request->data['MarketSector']['name']);
				$new_sector = false;
			}
			else {
				unset($this->request->data['MarketSector']['id']);
				$new_sector = true;
			}
			$this->log($this->request->data, 'debug');
			if ($this->Workplace->saveAll($this->request->data)) {
				$this->response->statusCode(200);
				$this->response->body(json_encode(array('new_sector' => $new_sector, 'id' => $this->Workplace->id)));
				return $this->response;
			} else throw new InternalErrorException();
		}
	}

	public function edit() {
		if ($this->request->is('post')) {
			if ($this->request->data['MarketSector']['id'] != "null") {
				unset($this->request->data['MarketSector']['name']);
				$new_sector = false;
			}
			else {
				unset($this->request->data['MarketSector']['id']);
				$new_sector = true;
			}
			if($this->Workplace->saveAll($this->request->data)) {
				$this->response->statusCode(200);
				$this->response->body(json_encode(array('id' => $this->Workplace->MarketSector->id, 'new_sector' => $new_sector)));
				return $this->response;
			} else throw new InternalErrorException();
		}
	}

	public function delete() {
		if ($this->request->is('post')) {
			if($this->Workplace->delete($this->request->data["id"])) {
				$this->response->statusCode(200);
				return $this->response;
			} else throw new InternalErrorException();
		}
	}

}