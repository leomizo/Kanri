<?php

class ProcessesController extends AppController {

	public function index($success_message = null) {
		if ($success_message) $this->set('success_message', $success_message);

		$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
		$this->paginate = $this->Process->pagination($search);
		$this->set('processes', $this->paginate('Process'));

		$this->paginate = $this->Process->Candidate->ajaxPagination();
		$this->set('candidates', $this->paginate('Candidate'));

		$this->paginate = $this->Process->Company->ajaxPagination();
		$this->set('companies', $this->paginate('Company'));
	}

	public function view($id, $is_company = false) {
		if ($is_company) {
			$this->Process->Company->id = $id;
			$this->set('title', $this->Process->Company->field('name'));
		}
		else {
			$this->Process->Candidate->id = $id;
			$this->set('title', $this->Process->Candidate->field('name'));
		}
		$this->set('processes', $this->Process->view($id, $is_company));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Process']['Event'][0]['event_type'] = 0;
			$this->request->data['Process']['Event'][0]['occurrence'] = date('Y-m-d H:i:s');
			$this->request->data['Process']['last_occurrence'] = date('Y-m-d H:i:s');
			if ($this->Process->saveAll($this->request->data, array('deep' => true))) {
				$this->redirect(array('action' => 'index', 'add'));
			}
		}
	}

	public function delete($id = null) {
		if ($this->request->is('post') && $id > 0) {
			$this->Process->delete($id);
			$this->redirect(array('controller' => 'processes', 'action' => 'index', 'delete'));
		}
	}

	public function events($process_id, $success_message = null) {
		$process = $this->Process->find('first', array('fields' => array('Company.name', 'CONCAT(Candidate.first_name, " ", Candidate.middle_names, " ", Candidate.last_name) as Candidate_name', 'Process.id'), 'conditions' => array('Process.id' => $process_id), 'recursive' => 2));
		$this->set('process', $process);
		if ($success_message) $this->set('success_message', $success_message);
	}

	public function get_companies() {
		$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
		$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
		$this->paginate = $this->Process->Company->ajaxPagination($search, $page);
		$this->set('companies', $this->paginate('Company'));
		$this->render('_company_table', false);
	}

	public function get_candidates() {
		$search = isset($this->request->query['search']) ? $this->request->query['search'] : null;
		$page = isset($this->request->query['page']) ? $this->request->query['page'] : 1;
		$this->paginate = $this->Process->Candidate->ajaxPagination($search, $page);
		$this->set('candidates', $this->paginate('Candidate'));
		$this->set('visible', true);
		$this->render('_candidate_table', false);
	}

}