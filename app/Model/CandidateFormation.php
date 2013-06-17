<?php

App::uses('AppModel', 'Model');

class CandidateFormation extends AppModel {

	public $belongsTo = array('Formation');
	
}