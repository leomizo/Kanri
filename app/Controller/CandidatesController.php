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
		
		$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
		
		$this->paginate = $this->Candidate->pagination($search);
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
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			if ($this->request->is('post')) {
				if ($this->request->data['City']['State']['Country']['id'] == 'null' || $this->request->data['City']['State']['Country']['id'] == '') {
					unset($this->request->data['City']['State']['Country']['id']);
				}
				else {
					unset($this->request->data['City']['State']['Country']['name']);
				}
				if (isset($this->request->data['City']['State']['id']) && ($this->request->data['City']['State']['id'] == 'null' || $this->request->data['City']['State']['id'] == '')) {
					unset($this->request->data['City']['State']['id']);
				}
				else {
					unset($this->request->data['City']['State']['name']);
				}
				if (isset($this->request->data['City']['id']) && ($this->request->data['City']['id'] == 'null' || $this->request->data['City']['id'] == '')) {
					unset($this->request->data['City']['id']);
				}
				else {
					unset($this->request->data['City']['name']);
				}
				if ($this->Candidate->saveAll($this->request->data, array('deep' => true))) {
					$this->redirect(array('controller' => 'candidates', 'action' => 'edit', '?' => array('step' => 1), $this->Candidate->id));
				}
				else {
					$this->set('alert', true);
				}
			}
			else {
				$countries = $this->Country->getCountryNames();
				$countries['null'] = 'Outro...';
				$this->set('countries', $countries);
			}
		}
		else throw new ForbiddenException();
	}

	public function edit($id = null) {
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			$step = isset($this->request->query['step']) ? $this->request->query['step'] : 0;
			if ($id > 0) {
				if ($this->request->is('post') || $this->request->is('put')) {
					switch ($step) {
						case 0:
							if ($this->request->data['City']['State']['Country']['id'] == 'null' || $this->request->data['City']['State']['Country']['id'] == '') {
								unset($this->request->data['City']['State']['Country']['id']);
							}
							else {
								unset($this->request->data['City']['State']['Country']['name']);
							}
							if (isset($this->request->data['City']['State']['id']) && ($this->request->data['City']['State']['id'] == 'null' || $this->request->data['City']['State']['id'] == '')) {
								unset($this->request->data['City']['State']['id']);
							}
							else {
								unset($this->request->data['City']['State']['name']);
							}
							if (isset($this->request->data['City']['id']) && ($this->request->data['City']['id'] == 'null' || $this->request->data['City']['id'] == '')) {
								unset($this->request->data['City']['id']);
							}
							else {
								unset($this->request->data['City']['name']);
							}
							if ($this->Candidate->saveAll($this->request->data, array('deep' => true))) {
								$this->Candidate->Dependent->deleteAll(array('Dependent.candidate_id' => $id, 'Dependent.created <' => date('Y-m-d H:i:s')));
								$this->redirect(array('?' => array('step' => 1), $id));
							}
							else {
								$this->set('alert', true);
							}
							break;
						case 1:
							if ($this->Candidate->CandidateFormation->saveMany($this->request->data)) {
								$this->Candidate->CandidateFormation->deleteAll(array('CandidateFormation.candidate_id' => $id, 'CandidateFormation.created <' => date('Y-m-d H:i:s')));
								$this->redirect(array('?' => array('step' => 2), $id));
							}
							else {
								$this->set('alert', true);
							}
							break;
						case 2:
							unset($this->request->data['language-level']);
							if ($this->Candidate->CandidateLanguage->saveMany($this->request->data, array('deep' => true))) {
								$this->Candidate->CandidateLanguage->deleteAll(array('CandidateLanguage.candidate_id' => $id, 'CandidateLanguage.created <' => date('Y-m-d H:i:s')));
								$this->redirect(array('?' => array('step' => 3), $id));
							}
							else {
								$this->set('alert', true);
							}
							break;
						case 3:
							if ($this->Candidate->CandidateCourse->saveMany($this->request->data)) {
								$this->Candidate->CandidateCourse->deleteAll(array('CandidateCourse.candidate_id' => $id, 'CandidateCourse.created <' => date('Y-m-d H:i:s')));
								$this->redirect(array('?' => array('step' => 4), $id));
							}
							else {
								$this->set('alert', true);
							}
							break;
						case 4:
							if ($this->Candidate->saveAll($this->request->data)) {
								$this->Candidate->Remuneration->deleteAll(array('Remuneration.candidate_id' => $id, 'Remuneration.created <' => date('Y-m-d H:i:s')));
								$this->redirect(array('?' => array('step' => 5), $id));
							}
							else {
								$this->set('alert', true);
							}
							break;
						case 5:
							if ($this->Candidate->Experience->saveMany($this->request->data, array('deep' => true))) {
								$this->Candidate->Experience->deleteAll(array('Experience.candidate_id' => $id, 'Experience.created <' => date('Y-m-d H:i:s')));
								$this->redirect(array('?' => array('step' => 6), $id));
							}
							else {
								$this->set('alert', true);	
							}
							break;
						case 6:
							if ($this->request->data['Curriculum']['size'] <= 0  || !checkFile($this->request->data['Curriculum']['type'])) {
								unset($this->request->data['Curriculum']);
								$curriculum = false;
							}
							else $curriculum = true;
							if ($this->Candidate->saveAll($this->request->data)) {
								if ($curriculum) $this->Candidate->Curriculum->deleteAll(array('Curriculum.candidate_id' => $id, 'Curriculum.created <' => date('Y-m-d H:i:s')));
								$this->redirect(array('action' => 'index'));
							}
							else {
								$this->set('alert', true);
							}
							break;
					}
				}
				else {
					$this->set('step', $step);
					$candidate = $this->Candidate->find('first', array('conditions' => array('Candidate.id' => $id), 'recursive' => 3));
					switch ($step) {
						case 0:
							$countries = $this->Country->getCountryNames();
							$countries['null'] = 'Outro...';
							$this->set('countries', $countries);

							$states = $this->State->getStatesByCountry($candidate['City']['State']['Country']['id']);
							$states['null'] = 'Outro...';
							$this->set('states', $states);

							$cities = $this->City->getCitiesByState($candidate['City']['State']['id']);
							$cities['null'] = 'Outro...';
							$this->set('cities', $cities);
							break;
						case 1:
							$this->paginate = $this->Formation->pagination();
							$this->set('formations', $this->paginate('Formation'));
							break;
						case 2:
							$languages = $this->Language->getLanguageNames();
							$languages['null'] = 'Outro...';
							$this->set('languages', $languages);
							break;
						case 3:
							$this->paginate = $this->Course->pagination();
							$this->set('courses', $this->paginate('Course'));
							break;
						case 5:
							$this->paginate = $this->Workplace->pagination();
							$this->set('workplaces', $this->paginate('Workplace'));

							$this->paginate = $this->Job->pagination();
							$this->set('jobs', $this->paginate('Job'));

							$this->set('market_sectors', $this->MarketSector->select_data(true));
							break;
					}
					$this->request->data = $candidate;
				}
			}
			else throw new InternalErrorException();
		}
		else throw new ForbiddenException();
	}

	public function delete($id = null) {
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			if ($this->request->is('post') && $id > 0) {
				$this->Candidate->delete($id);
				$this->redirect(array('controller' => 'candidates', 'action' => 'index', 'delete'));
			}
		} else throw new ForbiddenException();
	}

	public function search() {
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

	public function results() {
		if ($this->request->is('post')) {
			$candidate_list = $this->Candidate->performSearch($this->request->data);
			if (count($candidate_list) > 0) {
				$this->paginate = $this->Candidate->searchPagination($candidate_list);
				$this->set('candidates', $this->paginate('Candidate'));
				$this->Session->write('Search', $candidate_list);
			}
			else $this->set('candidates', array());
		}
		else {
			if ($this->Session->check('Search')) {
				$this->paginate = $this->Candidate->searchPagination($this->Session->read('Search'));
				$this->set('candidates', $this->paginate('Candidate'));
			}
		}
	}

	public function get_formations() {
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
			$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
			$this->paginate = $this->Formation->pagination($search, $page);
			$this->set('modal_data', $this->paginate('Formation'));
			$this->set('modal_table', 'formation');
			$this->render('_modal_content', false);
		}
	}

	public function get_courses() {
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
			$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
			$this->paginate = $this->Course->pagination($search, $page);
			$this->set('modal_data', $this->paginate('Course'));
			$this->set('modal_table', 'course');
			$this->render('_modal_content', false);
		}
	}

	public function get_jobs() {
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
			$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
			$this->paginate = $this->Job->pagination($search, $page);
			$this->set('modal_data', $this->paginate('Job'));
			$this->set('modal_table', 'job');
			$this->render('_modal_content', false);
		}
	}

	public function get_workplaces() {
		if ($this->UserVisibility == 0 || $this->UserVisibility == 2) {
			$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
			$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
			$this->paginate = $this->Workplace->pagination($search, null, $page);
			$this->set('workplaces', $this->paginate('Workplace'));
			$this->render('_modal_workplace', false);
		}
	}

	public function curriculum($id) {
		$this->set('curriculum', $this->Candidate->Curriculum->findByCandidateId($id));
	}

	public function report($id) {
		$this->layout = false;
		$candidate = $this->Candidate->find('first', array('conditions' => array('Candidate.id' => $id), 'recursive' => 3));
		if ($candidate) {
			$this->Set('candidate', $candidate);
		}
	}
	
}