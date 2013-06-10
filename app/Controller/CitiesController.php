<?php

class CitiesController extends AppController {

	public function get_cities_by_state($state_id) {
		$cities = $this->City->getCitiesByState($state_id);
		$cities['null'] = 'Outra...';
		$this->set('options', $cities);
		$this->render('_select', false);
	}

}