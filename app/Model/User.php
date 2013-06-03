<?php

App::uses('AppModel', 'Model');

class User extends AppModel {

	public $validate = array(
		'email' => array(
			'rule' => 'email',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'E-mail inválido!'
		),
		'password' => array(
			'rule' => array('minLength', 6),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'A senha deve ter 6 caracteres no mínimo!'
		)
	);

	public function afterFind($results, $primary = false) {
		foreach ($results as &$user) {
			$user['User']['user_type'] = $this->getTypeEnumName($user['User']['type']);
		}
		return $results;
	}

	public function getTypeEnumName($enumIndex) {
		switch ($enumIndex) {
			case 0:
				return 'Administrador principal';
				break;
			case 1:
				return 'Administrador auxiliar';
				break;
			default:
				return '';
				break;
		}
	}

	public function search($query = null, $sort = null, $asc = true) {
		if ($query) {
			$options = array('conditions' => array('User.name LIKE' => '%'.$query.'%'));
		} 
		else $options = null;
		if ($sort) {
			if ($options) $options['order'] = array('User.'.$sort => ($asc ? 'asc' : 'desc'));
			else $options = array('order' => array('User.'.$sort => ($asc ? 'asc' : 'desc')));
		}
		return $this->find('all', $options);
	}

}