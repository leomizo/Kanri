<?php

App::uses('AppModel', 'Model');

class Dependent extends AppModel {
	
	public $belongsTo = array('Candidate');
}