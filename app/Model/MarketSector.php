<?php

App::uses('AppModel', 'Model');

class MarketSector extends AppModel {

	public $hasMany = 'Workplace';

	public function pagination($query = null, $page = 1) {
		$pagination = array('limit' => 5, 'page' => $page, 'order' => array('MarketSector.name' => 'asc'), 'paramType' => 'querystring');
		if ($query) $pagination['conditions'] = array('MarketSector.name LIKE' => '%'.$query.'%');
		return $pagination;
	}

	public function select_data($include_add_option = false) {
		$data = array();
		$sectors = $this->find('all', array('order' => array('MarketSector.name' => 'asc')));
		foreach ($sectors as $sector) {
			$data[$sector['MarketSector']['id']] = $sector['MarketSector']['name'];
		}
		if ($include_add_option) $data['null'] = "Outro...";
		return $data;
	}

}