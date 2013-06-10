<?php

App::uses('AppModel', 'Model');

class CandidateLanguage extends AppModel {

	public $belongsTo = array('Candidate', 'Language');
	
}