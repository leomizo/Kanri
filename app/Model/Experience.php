<?php

App::uses('AppModel', 'Model');

class Experience extends AppModel {
	
	public $belongsTo = array('Job', 'Workplace', 'Candidate');
	
}