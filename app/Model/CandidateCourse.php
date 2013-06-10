<?php

App::uses('AppModel', 'Model');

class CandidateCourse extends AppModel {

	public $belongsTo = array('Candidate', 'Course');
	
}