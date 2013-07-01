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

	public function beforeFilter() {
		parent::beforeFilter();
		if ($this->UserVisibility != 0 && $this->UserVisibility != 2) throw new ForbiddenException();
	}
	
	public function index() {
		$this->paginate = $this->Language->pagination();
		$this->set('languages', $this->paginate('Language'));
		$this->paginate = $this->MarketSector->pagination();
		$this->set('market_sectors', $this->paginate('MarketSector'));
		$this->paginate = $this->Job->pagination();
		$this->set('jobs', $this->paginate('Job'));
		$this->paginate = $this->Formation->pagination();
		$this->set('formations', $this->paginate('Formation'));
		$this->paginate = $this->Course->pagination();
		$this->set('courses', $this->paginate('Course'));
		$this->paginate = $this->Workplace->pagination();
		$this->set('workplaces', $this->paginate('Workplace'));
		$this->set('workplace_market_sectors', $this->MarketSector->select_data(true));
	}

	public function get_languages() {
		$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
		$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
		$this->paginate = $this->Language->pagination($search, $page);
		$this->set('languages', $this->paginate('Language'));
		$this->render('_languages', false);
	}

	public function get_market_sectors() {
		$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
		$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
		$this->paginate = $this->MarketSector->pagination($search, $page);
		$this->set('market_sectors', $this->paginate('MarketSector'));
		$this->render('_market_sectors', false);
	}

	public function get_jobs() {
		$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
		$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
		$this->paginate = $this->Job->pagination($search, $page);
		$this->set('jobs', $this->paginate('Job'));
		$this->render('_jobs', false);
	}

	public function get_formations() {
		$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
		$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
		$this->paginate = $this->Formation->pagination($search, $page);
		$this->set('formations', $this->paginate('Formation'));
		$this->render('_formations', false);
	}

	public function get_courses() {
		$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
		$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
		$this->paginate = $this->Course->pagination($search, $page);
		$this->set('courses', $this->paginate('Course'));
		$this->render('_courses', false);
	}

	public function get_workplaces() {
		$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
		$sort = isset($this->request->query['sort']) ? $this->request->query['sort'] : null;
		$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
		$this->paginate = $this->Workplace->pagination($search, $sort, $page);
		$this->set('workplaces', $this->paginate('Workplace'));
		$this->render('_workplaces', false);
	}


	
}