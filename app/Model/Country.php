<?php

App::uses('AppModel', 'Model');

class Country extends AppModel {

	public $hasMany = array('State');

	public function getCountryNames() {
		return $this->find('list', array('fields' => array('Country.name'), 'order' => array('Country.name' => 'asc')));
	}

}