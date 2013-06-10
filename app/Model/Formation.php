<?php

App::uses('AppModel', 'Model');

class Formation extends AppModel {

	public $hasMany = array('CandidateFormation');

	public function pagination($query = null, $page = 1) {
		$pagination = array('limit' => 5, 'page' => $page, 'order' => array('Formation.name' => 'asc'), 'paramType' => 'querystring');
		if ($query) $pagination['conditions'] = array('Formation.name LIKE' => '%'.$query.'%');
		return $pagination;
	}

}