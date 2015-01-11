<?php

App::uses('AppModel', 'Model');

class CandidateBirthday extends AppModel {

	public $belongsTo = array('Candidate');

	public function findBirthdays() {
		
	}
	
}