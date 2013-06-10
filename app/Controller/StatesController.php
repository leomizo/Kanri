<?php

class StatesController extends AppController {

	public function get_states_by_country($country_id) {
		$states = $this->State->getStatesByCountry($country_id);
		$states['null'] = 'Outro...';
		$this->set('options', $states);
		$this->render('_select', false);
	}

}