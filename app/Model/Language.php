<?php

App::uses('AppModel', 'Model');

class Language extends AppModel {

	public $hasMany = array('CandidateLanguage');

	public function pagination($query = null, $page = 1) {
		$pagination = array('limit' => 5, 'page' => $page, 'order' => array('Language.name' => 'asc'), 'paramType' => 'querystring');
		if ($query) $pagination['conditions'] = array('Language.name LIKE' => '%'.$query.'%');
		return $pagination;
	}

}