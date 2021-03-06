<?php

App::uses('AppModel', 'Model');

class Formation extends AppModel {

	public function pagination($query = null, $page = 1) {
		$pagination = array('limit' => 5, 'fields' => array('Formation.id, Formation.name'), 'page' => $page, 'order' => array('Formation.name' => 'asc'), 'paramType' => 'querystring');
		if ($query) $pagination['conditions'] = array('Formation.name LIKE' => '%'.$query.'%');
		return $pagination;
	}

}