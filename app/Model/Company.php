<?php

App::uses('AppModel', 'Model');

class Company extends AppModel {

	public function pagination($search = null) {
		$pagination = array('limit' => 10);
		if ($search) $pagination['conditions'] = array('Company.name LIKE' => '%'.$search.'%');
		return $pagination;
	}

	public function ajaxPagination($query = null, $page = 1) {
		$pagination = array('limit' => 5, 'page' => $page, 'order' => array('Company.name' => 'asc'), 'paramType' => 'querystring');
		if ($query) $pagination['conditions'] = array('Company.name LIKE' => '%'.$query.'%');
		return $pagination;
	}

}