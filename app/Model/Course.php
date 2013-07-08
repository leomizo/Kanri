<?php

App::uses('AppModel', 'Model');

class Course extends AppModel {

	public function pagination($query = null, $page = 1) {
		$pagination = array('limit' => 5, 'fields' => array('Course.id, Course.name'), 'page' => $page, 'order' => array('Course.name' => 'asc'), 'paramType' => 'querystring');
		if ($query) $pagination['conditions'] = array('Course.name LIKE' => '%'.$query.'%');
		return $pagination;
	}

}