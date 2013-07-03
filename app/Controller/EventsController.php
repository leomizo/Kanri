<?php

class EventsController extends AppController {

	public function add() {
		if ($this->request->is('post')) {
			unset($this->request->data['Event']['id']);
			$process_id = $this->request->data['Event']['process_id'];
			$occurrence = $this->request->data['Event']['occurrence'];
			$this->request->data['Event']['occurrence'] = date('Y-m-d H:i:s', mktime(substr($occurrence, 11, 2), substr($occurrence, 14, 2), substr($occurrence, 17, 2), substr($occurrence, 3, 2), substr($occurrence, 0, 2), substr($occurrence, 6, 4)));
			if ($this->Event->saveAll($this->request->data)) {
				$this->redirect(array('controller' => 'processes', 'action' => 'events', $process_id, 'add'));
			}
		}
	}

	public function edit() {
		if ($this->request->is('post')) {
			$process_id = $this->request->data['Event']['process_id'];
			$occurrence = $this->request->data['Event']['occurrence'];
			$this->request->data['Event']['occurrence'] = date('Y-m-d H:i:s', mktime(substr($occurrence, 11, 2), substr($occurrence, 14, 2), substr($occurrence, 17, 2), substr($occurrence, 3, 2), substr($occurrence, 0, 2), substr($occurrence, 6, 4)));
			if ($this->Event->saveAll($this->request->data)) {
				$this->redirect(array('controller' => 'processes', 'action' => 'events', $process_id, 'edit'));
			}
		}
	}

	public function delete($id = null, $process_id = null) {
		if ($this->request->is('post') && $id > 0 && $process_id > 0) {
			$this->Event->delete($id);
			$this->redirect(array('controller' => 'processes', 'action' => 'events', $process_id, 'delete'));
		}
	}

	public function load_event_contact_form($id = null) {
		if ($id) {
			$this->request->data = $this->Event->EventContact->findByEventId($id);
			$this->set('edit', true);
		} else $this->set('edit', false);
		$this->render('_event_contact_form', false);
	}

	public function load_event_interview_form($id = null) {
		if ($id) {
			$this->request->data = $this->Event->EventInterview->findByEventId($id);
			$this->set('edit', true);
		} else $this->set('edit', false);
		$this->render('_event_interview_form', false);
	}

	public function load_event_feedback_form($id = null) {
		if ($id) {
			$this->request->data = $this->Event->EventFeedback->findByEventId($id);
			$this->set('edit', true);
		} else $this->set('edit', false);
		$this->render('_event_feedback_form', false);
	}

	public function load_event_conclusion_form($id = null) {
		if ($id) {
			$this->request->data = $this->Event->EventConclusion->findByEventId($id);
			$this->set('edit', true);
		} else $this->set('edit', false);
		$this->render('_event_conclusion_form', false);
	}

}