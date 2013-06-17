<?php

App::uses('AppModel', 'Model');

class State extends AppModel {

	public $belongsTo = array('Country');

	public function getStatesByCountry($country_id) {
		return $this->find('list', array('fields' => array('State.name'), 'conditions' => array('State.country_id' => $country_id), 'order' => array('State.name' => 'asc')));
	}
	
}