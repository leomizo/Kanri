<?php

App::uses('AppModel', 'Model');

class Process extends AppModel {

	public $belongsTo = array("Candidate", "Company");
	public $hasMany = array("Event");

}