<?php

class CitiesController extends AppController {

	public function get_cities_by_state($state_id) {
		$cities = $this->City->getCitiesByState($state_id);
		if ($this->request->query['add'] != 'false') $cities['null'] = 'Outra...';
		$this->set('options', $cities);
		$this->render('_select', false);
	}

}