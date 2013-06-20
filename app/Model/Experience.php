<?php

App::uses('AppModel', 'Model');

class Experience extends AppModel {
	
	public $belongsTo = array('Job', 'Workplace');

	public function afterFind($results, $primary = null) {
		foreach ($results as &$experience) {
			list($year, $month, $day) = split('-', $experience['Experience']['start_date']);
			$experience['Experience']['start_date_string'] = monthNumberToMonthString($month).'/'.$year;
			$experience['Experience']['start_date_edit'] = $month.'/'.$year;
			list($year, $month, $day) = split('-', $experience['Experience']['final_date']);
			$experience['Experience']['final_date_string'] = monthNumberToMonthString($month).'/'.$year;
			$experience['Experience']['final_date_edit'] = $month.'/'.$year;
		}
		return $results;
	}

	public function beforeSave($options = array()) {
	
		if (isset($this->data['Experience'])) {
			list($month, $year) = split('/', $this->data['Experience']['start_date']);
			$this->data['Experience']['start_date'] = $year.'-'.$month.'-01';
			list($month, $year) = split('/', $this->data['Experience']['final_date']);
			$this->data['Experience']['final_date'] = $year.'-'.$month.'-01';
		}

		return true;
	}
}