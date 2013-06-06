<?php

class InfoController extends AppController {

	public $helpers = array('Html', 'Form');
	public $uses = array('Model', 
						 'AppModel', 
						 'Language', 
						 'MarketSector',
						 'Job',
						 'Formation',
						 'Course',
						 'Workplace');
	
	public function index() {
		$this->paginate = $this->Language->pagination($search);
		$this->set('languages', $this->paginate('Language'));
		$this->paginate = $this->MarketSector->pagination($search);
		$this->set('market_sectors', $this->paginate('MarketSector'));
		$this->paginate = $this->Job->pagination($search);
		$this->set('jobs', $this->paginate('Job'));
		$this->paginate = $this->Formation->pagination($search);
		$this->set('formations', $this->paginate('Formation'));
		$this->paginate = $this->Course->pagination($search);
		$this->set('courses', $this->paginate('Course'));
		$this->paginate = $this->Workplace->pagination($search);
		$this->set('workplaces', $this->paginate('Workplace'));
		$this->set('workplace_market_sectors', $this->MarketSector->select_data(true));
	}

	public function get_languages() {
		$search = $this->request->query['search'];
		$page = $this->request->query['page'] ? $this->request->query['page'] : 1;
		$this->paginate = $this->Language->pagination($search, $page);
		$this->set('languages', $this->paginate('Language'));
		$this->render('_languages', false);
	}

	public function get_market_sectors() {
		$search = $this->request->query['search'];
		$page = $this->request->query['page'] ? $this->request->query['page'] : 1;
		$this->paginate = $this->MarketSector->pagination($search, $page);
		$this->set('market_sectors', $this->paginate('MarketSector'));
		$this->render('_market_sectors', false);
	}

	public function get_jobs() {
		$search = $this->request->query['search'];
		$page = $this->request->query['page'] ? $this->request->query['page'] : 1;
		$this->paginate = $this->Job->pagination($search, $page);
		$this->set('jobs', $this->paginate('Job'));
		$this->render('_jobs', false);
	}

	public function get_formations() {
		$search = $this->request->query['search'];
		$page = $this->request->query['page'] ? $this->request->query['page'] : 1;
		$this->paginate = $this->Formation->pagination($search, $page);
		$this->set('formations', $this->paginate('Formation'));
		$this->render('_formations', false);
	}

	public function get_courses() {
		$search = $this->request->query['search'];
		$page = $this->request->query['page'] ? $this->request->query['page'] : 1;
		$this->paginate = $this->Course->pagination($search, $page);
		$this->set('courses', $this->paginate('Course'));
		$this->render('_courses', false);
	}

	public function get_workplaces() {
		$search = $this->request->query['search'];
		$sort = $this->request->query['sort'];
		$page = $this->request->query['page'] ? $this->request->query['page'] : 1;
		$this->paginate = $this->Workplace->pagination($search, $sort, $page);
		$this->set('workplaces', $this->paginate('Workplace'));
		$this->render('_workplaces', false);
	}


	
}