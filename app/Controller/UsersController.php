<?php
App::uses('AppController', 'Controller');


class UsersController extends AppController
{

	public $name = 'Users';

	################################################
	//CONTROLLER DE AUTORIZAÇÃO //
	################################################

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

	public function isAuthorized($user)
	{
		if (in_array($this->action, array('edit', 'delete'))) {
			if ($user['Groups']['level'] < 3) { // PRIORIDADES => 3 = ADM , 2 = POSTERS , 1 = USERS
				return false;
			}
		}
		return true;
	}
	################################################
	//CONTROLLER DE LOGIN //
	################################################

	public function login()
	{
		$this->layout = 'login';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				// VERIFICAÇÃO SE O USUARIO ESTA COM A SENHA INICIAL
				App::import("Model", "User");
				$model = new User();
				$senhaDigitada = AuthComponent::password($this->request['data']['User']['password']);
				$query = "SELECT password_ini from users where username = '" . $this->request['data']['User']['username'] . "' and password = '" . $senhaDigitada . "'";
				$resultadoQuery = $model->query($query);
				$senhaConsultada = $resultadoQuery[0]['users']['password_ini']; // DADOS DA CONSULTA DO CAMPO DA FLAG
				if ($senhaConsultada == 'DEFAULT') { // FOI DADO O NOME DE DEFAULT A PRIMEIRA FLAG INICIAL, CASO SEJA VDD, VAI PARA TROCA DE SENHA
					return $this->redirect(array('action' => 'changePassword'));
				} // FIM DA VERIFICAÇÃO 
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Seu usuario ou senha está incorreto');
			}
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Seu usuario ou senha está incorreto');
			}
		}
	}

	################################################
	//CONTROLLER DE LOGOUT //
	################################################

	public function logout()
	{
		$this->redirect($this->Auth->logout());
	}
	public $components = array('Paginator');

	################################################
	//CONTROLLER DE INDEX //
	################################################

	public function index()
	{
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

	################################################
	//CONTROLLER DE VIEW //
	################################################

	public function view($id = null)
	{
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	################################################
	//CONTROLLER DE CRIAÇÃO //
	################################################

	public function add()
	{
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Groups->find('list');
		$this->set(compact('groups'));
	}

	################################################
	//CONTROLLER DE EDIÇÃO //
	################################################

	public function edit($id = null)
	{
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Groups->find('list');
		$this->set(compact('groups'));
	}

	################################################
	//CONTROLLER DE DELEÇÃO //
	################################################

	public function delete($id = null)
	{
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	################################################
	//CONTROLLER DE ALTERAR SENHA //
	################################################

	public function changePassword()
	{
		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $this->Auth->user('id')
			)
		));
		$id = $user['User']['id'];

		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save(array('User' => array(
				'id' => $id, 'password' => $this->request->data['User']['password'], 'groups_id' => $this->request->data['User']['groups_id'], 'password_ini' => $this->request->data['User']['password_ini']
			)))) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}
}
