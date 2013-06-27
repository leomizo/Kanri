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

	public function beforeSave($options = array()) {
        if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }

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

	public function pagination($query = null, $sort = null, $asc = 'asc') {
		$pagination = array('limit' => 10);
		if ($query) $pagination['conditions'] = array('User.name LIKE' => '%'.$query.'%');
		if ($sort) $pagination['order'] = array('User.'.$sort => $asc);
		else $pagination['order'] = array("User.name" => 'asc');
		return $pagination;
	}

}