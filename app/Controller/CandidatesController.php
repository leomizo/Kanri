<?php

class CandidatesController extends AppController {

	public $helpers = array('Html', 'Form');
	public $uses = array('Model', 
						 'AppModel',
						 'Candidate',
						 'Country', 
						 'Formation', 
						 'Language', 
						 'Course', 
						 'Job', 
						 'Workplace',
						 'MarketSector',
						 'Curriculum',
						 'City',
						 'State',
						 'Country');

	public function index($success_message = null) {
		if ($success_message) $this->Set('success_message', $success_message);
		
		$search = $this->request->query['search'];
		$sort = $this->request->query['sort'];
		$asc = $this->request->query['asc'] == 'desc' ? 'desc' : 'asc';
		
		$this->paginate = $this->Candidate->pagination($search, $sort, $asc);
		$this->set('candidates', $this->paginate('Candidate'));

	}

	public function show($id) {
		if ($id) {
			$candidate = $this->Candidate->find('first', array('conditions' => array('Candidate.id' => $id), 'recursive' => 3));
			if ($candidate) {
				$this->Set('candidate', $candidate);
			}
		}
	}

	public function add() {
		if ($this->request->is('post')) {

			unset($this->request->data['language-level']);

			if ($this->request->data['City']['State']['Country']['id'] == 'null' || $this->request->data['City']['State']['Country']['id'] == '') {
				unset($this->request->data['City']['State']['Country']['id']);
			}
			else {
				unset($this->request->data['City']['State']['Country']['name']);
			}
			if ($this->request->data['City']['State']['id'] == 'null' || $this->request->data['City']['State']['id'] == '') {
				unset($this->request->data['City']['State']['id']);
			}
			else {
				unset($this->request->data['City']['State']['name']);
			}
			if ($this->request->data['City']['id'] == 'null' || $this->request->data['City']['id'] == '') {
				unset($this->request->data['City']['id']);
			}
			else {
				unset($this->request->data['City']['name']);
			}

			if ($this->request->data['Curriculum']['size'] <= 0) {
				unset($this->request->data['Curriculum']);
			}

			if ($this->Candidate->saveAll($this->request->data, array('deep' => true))) {
				$this->redirect(array('controller' => 'candidates', 'action' => 'index', 'add'));
			}
			else {
				$this->Set('alert', true);
			}
		}
		else {
			$countries = $this->Country->getCountryNames();
			$countries['null'] = 'Outro...';
			$this->set('countries', $countries);

			$this->paginate = $this->Formation->pagination();
			$this->set('formations', $this->paginate('Formation'));

			$this->paginate = $this->Course->pagination();
			$this->set('courses', $this->paginate('Course'));

			$languages = $this->Language->getLanguageNames();
			$languages['null'] = 'Outro...';
			$this->set('languages', $languages);

			$this->paginate = $this->Workplace->pagination();
			$this->set('workplaces', $this->paginate('Workplace'));

			$this->paginate = $this->Job->pagination();
			$this->set('jobs', $this->paginate('Job'));

			$this->set('market_sectors', $this->MarketSector->select_data(true));
		}
	}

	public function edit($id = null) {
		if ($id) {
			$candidate = $this->Candidate->find('first', array('conditions' => array('Candidate.id' => $id), 'recursive' => 3));
			if ($this->request->is('post') || $this->request->is('put')) {
				
				unset($this->request->data['language-level']);

				if ($this->request->data['City']['State']['Country']['id'] == 'null' || $this->request->data['City']['State']['Country']['id'] == '') {
					unset($this->request->data['City']['State']['Country']['id']);
				}
				else {
					unset($this->request->data['City']['State']['Country']['name']);
				}
				if ($this->request->data['City']['State']['id'] == 'null' || $this->request->data['City']['State']['id'] == '') {
					unset($this->request->data['City']['State']['id']);
				}
				else {
					unset($this->request->data['City']['State']['name']);
				}
				if ($this->request->data['City']['id'] == 'null' || $this->request->data['City']['id'] == '') {
					unset($this->request->data['City']['id']);
				}
				else {
					unset($this->request->data['City']['name']);
				}

				if ($this->request->data['Curriculum']['size'] <= 0) {
					unset($this->request->data['Curriculum']);
				}
				else $curriculum = $candidate['Curriculum']['id'];

				$formations = $this->Candidate->CandidateFormation->find('list', array('fields' => array('CandidateFormation.id'), 'conditions' => array('CandidateFormation.candidate_id' => $id, 'CandidateFormation.created <' => date('Y-m-d H:i:s'))));
				$languages = $this->Candidate->CandidateLanguage->find('list', array('fields' => array('CandidateLanguage.id'), 'conditions' => array('CandidateLanguage.candidate_id' => $id, 'CandidateLanguage.created <' => date('Y-m-d H:i:s'))));
				$courses = $this->Candidate->CandidateCourse->find('list', array('fields' => array('CandidateCourse.id'), 'conditions' => array('CandidateCourse.candidate_id' => $id, 'CandidateCourse.created <' => date('Y-m-d H:i:s'))));
				$dependents = $this->Candidate->Dependent->find('list', array('fields' => array('Dependent.id'), 'conditions' => array('Dependent.candidate_id' => $id, 'Dependent.created <' => date('Y-m-d H:i:s'))));
				$experiences = $this->Candidate->Experience->find('list', array('fields' => array('Experience.id'), 'conditions' => array('Experience.candidate_id' => $id, 'Experience.created <' => date('Y-m-d H:i:s'))));

				if ($this->Candidate->saveAll($this->request->data)) {
					foreach ($formations as $formation) {
						$this->Candidate->CandidateFormation->delete($formation);
					}
					foreach ($languages as $language) {
						$this->Candidate->CandidateLanguage->delete($language);
					}
					foreach ($courses as $course) {
						$this->Candidate->CandidateCourse->delete($course);
					}
					foreach ($dependents as $dependent) {
						$this->Candidate->Dependent->delete($dependent);
					}
					foreach ($experiences as $experience) {
						$this->Candidate->Experience->delete($experience);
					}
					if (isset($curriculum)) $this->Candidate->Curriculum->delete($curriculum);
					$this->redirect(array('controller' => 'candidates', 'action' => 'index', 'edit'));
				}
				else {
					$this->Set('alert', true);
				}
			}
			else if ($candidate) {
				$countries = $this->Country->getCountryNames();
				$countries['null'] = 'Outro...';
				$this->set('countries', $countries);

				$this->paginate = $this->Formation->pagination();
				$this->set('formations', $this->paginate('Formation'));

				$this->paginate = $this->Course->pagination();
				$this->set('courses', $this->paginate('Course'));

				$languages = $this->Language->getLanguageNames();
				$languages['null'] = 'Outro...';
				$this->set('languages', $languages);

				$this->paginate = $this->Workplace->pagination();
				$this->set('workplaces', $this->paginate('Workplace'));

				$this->paginate = $this->Job->pagination();
				$this->set('jobs', $this->paginate('Job'));

				$this->set('market_sectors', $this->MarketSector->select_data(true));

				$states = $this->State->getStatesByCountry($candidate['City']['State']['Country']['id']);
				$states['null'] = 'Outro...';
				$this->set('states', $states);

				$cities = $this->City->getCitiesByState($candidate['City']['State']['id']);
				$cities['null'] = 'Outro...';
				$this->set('cities', $cities);

				$this->request->data = $candidate;	
			}
		}
	}

	public function delete($id = null) {
		if ($this->request->is('post') && $id > 0) {
			$this->Candidate->delete($id);
			$this->redirect(array('controller' => 'candidates', 'action' => 'index', 'delete'));
		}
	}

	public function search() {
		if ($this->request->is('post')) {
			//var_dump($this->request->data);
			var_dump($this->Candidate->performSearch($this->request->data));
		}
		else {
			$this->set('market_sectors', $this->MarketSector->select_data());

			$countries = $this->Country->getCountryNames();
			$this->set('countries', $countries);

			$this->paginate = $this->Formation->pagination();
			$this->set('formations', $this->paginate('Formation'));

			$this->paginate = $this->Job->pagination();
			$this->set('jobs', $this->paginate('Job'));

			$languages = json_encode($this->Language->getLanguageNames());
			$this->set('languages', $languages);
		}
	}

	public function get_formations() {
		$search = $this->request->query['search'];
		$page = $this->request->query['page'] ? $this->request->query['page'] : 1;
		$this->paginate = $this->Formation->pagination($search, $page);
		$this->set('modal_data', $this->paginate('Formation'));
		$this->set('modal_table', 'formation');
		$this->render('_modal_content', false);
	}

	public function get_courses() {
		$search = $this->request->query['search'];
		$page = $this->request->query['page'] ? $this->request->query['page'] : 1;
		$this->paginate = $this->Course->pagination($search, $page);
		$this->set('modal_data', $this->paginate('Course'));
		$this->set('modal_table', 'course');
		$this->render('_modal_content', false);
	}

	public function get_jobs() {
		$search = $this->request->query['search'];
		$page = $this->request->query['page'] ? $this->request->query['page'] : 1;
		$this->paginate = $this->Job->pagination($search, $page);
		$this->set('modal_data', $this->paginate('Job'));
		$this->set('modal_table', 'job');
		$this->render('_modal_content', false);
	}

	public function get_workplaces() {
		$search = $this->request->query['search'];
		$page = $this->request->query['page'] ? $this->request->query['page'] : 1;
		$this->paginate = $this->Workplace->pagination($search, null, $page);
		$this->set('workplaces', $this->paginate('Workplace'));
		$this->render('_modal_workplace', false);
	}

	public function curriculum($id) {
		$this->Candidate->id = $id;
		$curriculum = $this->Curriculum->findById($this->Candidate->field('curriculum_id'));
		$this->set('curriculum', $curriculum);
	}
	
}