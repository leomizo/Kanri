<?php

App::uses('AppModel', 'Model');

class City extends AppModel {

	public $belongsTo = array('State');
	public $hasMany = array('Candidate');

	public function getCitiesByState($state_id) {
		return $this->find('list', array('fields' => array('City.name'), 'conditions' => array('City.state_id' => $state_id), 'order' => array('City.name' => 'asc')));
	}
	
}