<?php

App::uses('AppModel', 'Model');

class Job extends AppModel {

	public function pagination($query = null, $page = 1) {
		$pagination = array('limit' => 5, 'page' => $page, 'order' => array('Job.name' => 'asc'), 'paramType' => 'querystring');
		if ($query) $pagination['conditions'] = array('Job.name LIKE' => '%'.$query.'%');
		return $pagination;
	}

}