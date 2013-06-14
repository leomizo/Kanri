<?php

class CandidatesController extends AppController {

	public $helpers = array('Html', 'Form');
	public $uses = array('Country', 
						 'Formation', 
						 'Language', 
						 'Course', 
						 'Job', 
						 'Workplace',
						 'MarketSector');

	public function index($success_message = null) {
		if ($success_message) $this->Set('success_message', $success_message);
		
		$search = $this->request->query['search'];
		$sort = $this->request->query['sort'];
		$asc = $this->request->query['asc'] == 'desc' ? 'desc' : 'asc';
		
		$this->paginate = $this->Candidate->pagination($search, $sort, $asc);
		$this->set('candidate', $this->paginate('Candidate'));
	}

	public function show($id) {
		if ($id) {
			$candidate = $this->Candidate->findById($id);
			if ($candidate) {
				$this->Set('candidate', $candidate);
			}
		}
	}

	public function add() {
		if ($this->request->is('post')) {
			if ($this->Candidate->save($this->request->data)) {
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
			$candidate = $this->Candidate->findById($id);
			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Candidate->id = $id;
				if ($this->Candidate->save($this->request->data)) {
					$this->redirect(array('controller' => 'candidates', 'action' => 'index', 'edit'));
				}
				else {
					$this->Set('alert', true);
				}
			}
			else if ($candidate) {
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
	
}