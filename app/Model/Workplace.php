<?php

App::uses('AppModel', 'Model');

class Workplace extends AppModel {

	public $belongsTo = array('MarketSector');

	public function pagination($query = null, $sort = null, $page = 1) {
		$pagination = array('limit' => 5, 'page' => $page, 'paramType' => 'querystring');
		if ($query) $pagination['conditions'] = array('Workplace.name LIKE' => '%'.$query.'%');
		if ($sort) $pagination['order'] = array('Workplace.'.$sort => $asc);
		else $pagination['order'] = array("Workplace.name" => 'asc');
		return $pagination;
	}

}