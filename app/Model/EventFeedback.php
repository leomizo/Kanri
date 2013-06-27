<?php

App::uses('AppModel', 'Model');

class EventFeedback extends AppModel {

	public function afterFind($results, $primary = false) {
		if (isset($results['feedback'])) {
			switch ($results['feedback']) {
				case 0:
					$results['feedback_string'] = 'Ruim';
					break;
				case 1:
					$results['feedback_string'] = 'Regular';
					break;
				case 2:
					$results['feedback_string'] = 'Bom';
					break;
				case 3:
					$results['feedback_string'] = 'Ótimo';
					break;
			}
		}
		return $results;
	}

}