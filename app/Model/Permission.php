<?php

App::uses('AppModel', 'Model');

class Permission extends AppModel {

	public $belongsTo = array('User');

	public function getPermissions() {
		$this->deleteAll(array('Permission.end <' => date('Y-m-d H:i:s')));
		return $this->find('all', array('order' => 'Permission.end DESC',
										'recursive' => 2));
	}

	public function userIsPrivileged($userId) {
		$now = date('Y-m-d H:i:s');
		$permission = $this->find('first', array('fields' => array('Permission.id'), 'conditions' => array('Permission.user_id' => $userId, 'Permission.start <=' => $now, 'Permission.end >=' => $now)));
		return !empty($permission);
	}

}